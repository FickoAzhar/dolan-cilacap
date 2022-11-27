<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //menampilkan tiket saya
    public function index()
    {
        return view('pages.myticket', [
            'title' => 'Ticket Saya',
            'tickets' => Ticket::where('no_identitas', Auth::user()->no_identitas)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.ticket.create', [
            'title' => 'Tambah Ticket'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // pemesann tiket halaman pesanan
    {
        $request->validate([
            'name' => 'required|max:255',
            'no_identitas' => 'required|numeric|digits:16',
            'no_hp'=> 'required|numeric',
            'tempat_wisata'=> 'required',
            'tanggal_kunjungan'=> 'required',
            'dewasa'=> 'required|numeric',
            'anak'=> 'required|numeric',
            'harga_tiket' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        // $tiketDewasa = $request->harga_tiket*$request->dewasa;
        // $diskon = $request->harga_tiket/2;
        // $tiketAnak = $diskon*$request->anak;
        // $totlaHarga = $tiketDewasa + $tiketAnak;

        Ticket::create([
            'name' => $request->name,
            'no_identitas' => $request->no_identitas,
            'no_hp' => $request->no_hp,
            'tempat_wisata' => $request->tempat_wisata,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'dewasa' => $request->dewasa,
            'anak' => $request->anak,
            'harga_tiket' => $request->harga_tiket,
            'total' => $request->total,
        ]);

        Alert::success('Selamat!!!', 'Anda berhasil pesan ticket');
        return redirect('/myticket')->with('success', 'Tiket berhasil didapatkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tickets  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('pages.dashboard.tickets.show', ['ticket'=> $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        return view('pages.dashboard.ticket.edit', ['ticket'=>$ticket]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'name' => 'required|max:255',
            'no_identitas' => 'required|numeric|digits:16',
            'no_hp'=> 'required|numeric',
            'tempat_wisata'=> 'required',
            'tanggal_kunjungan'=> 'required',
            'dewasa'=> 'required|numeric',
            'anak'=> 'required|numeric',
            'harga_tiket' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        Ticket::where('id', $ticket->id)
        ->update([
            'name' => $request->name,
            'no_identitas' => $request->no_identitas,
            'no_hp' => $request->no_hp,
            'tempat_wisata' => $request->tempat_wisata,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'dewasa' => $request->dewasa,
            'anak' => $request->anak,
            'harga_tiket' => $request->harga_tiket,
            'total' => $request->total,
        ]);

        return redirect('/dashboard/tickets')->with('status', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket=Ticket::find($id);
        $ticket->delete();

        return redirect('/dashboard/tickets')->with('success', 'Data Berhasil dihapus!');
    }
}