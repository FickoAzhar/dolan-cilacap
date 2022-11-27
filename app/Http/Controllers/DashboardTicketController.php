<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class DashboardTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //untuk menampilkan halaman dashboard tiket
     public function index()
    {
        return view('pages.dashboard.ticket.index', [
            'title' => 'Ticket',
            'tickets' => Ticket::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //ubtuk menambahkan tiket di dashboard(belum digunakan)
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
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tickets  $ticket
     * @return \Illuminate\Http\Response
     */
    //untuk menampilkan tiket di dashboard(belum digunakan)
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
    //untuk update tiket
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
    //untuk hapus tiket
    public function destroy($id)
    {
        $ticket=Ticket::find($id);
        $ticket->delete();

        return redirect('/dashboard/tickets')->with('success', 'Data Berhasil dihapus!');
    }
}