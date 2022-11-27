<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Destination;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //untuk menampilkan seluruh destinasi
    public function index()
    {
        return view('pages.dashboard.destination.index', [
            'title' => 'Destinasi',
            'destinations' => Destination::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //untuk menamipilkan halaman tambah destinasi wisata baru
    public function create()
    {
        return view('pages.dashboard.destination.create', [
            'title' => 'Tambah Destinasi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //untuk menambah destinasi baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'deskripsi' => 'required',
            'harga'=> 'required|numeric',
            'image'=> 'image|file',
            'video'=> 'required'
        ]);

        $imageName = time().'.'.$request->image->getClientOriginalName();
        $request->image->move(public_path('media'), $imageName);

        Destination::create([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'image' => $imageName,
            'video' => $request->video,
        ]);
        Alert::success('Berhasil!', 'Destinasi berhasil ditambahkan');
        return redirect('/dashboard/destinations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destinations  $destination
     * @return \Illuminate\Http\Response
     */
    
    public function show(Destination $destination)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    //untuk menampilkan halaman edit destination
    public function edit(Destination $destination)
    {
        return view('pages.dashboard.destination.edit', ['title' => 'Ubah Data', 'destination'=>$destination]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    //untuk edit destinasi
    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name' => 'required|max:255',
            'deskripsi' => 'required',
            'harga'=> 'required|numeric',
            'image'=> 'image|file|max:1024',
            'video'=> 'required'
        ]);
        

        if($request->image == "") {
            Destination::where('id', $destination->id)
            ->update([
                'name' => $request->name,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'video' => $request->video,
            ]);
            
        } else {
            File::delete('media/'.$destination->image);

            $imageName = time().'.'.$request->image->getClientOriginalName(); 
            $request->image->move(public_path('media'), $imageName);

            Destination::where('id', $destination->id)
            ->update([
                'name' => $request->name,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'image' => $imageName,
                'video' => $request->video,
            ]);
        }
        Alert::success('Berhasil!', 'Destinasi berhasil diupdate');
        return redirect('/dashboard/destinations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    //hapus destinasi
    public function destroy($id)
    {
        $destination=Destination::find($id);
        File::delete('media/'.$destination->image);
        $destination->delete();

        Alert::success('Berhasil', 'destinasi berhasil dihapus');
        return redirect('/dashboard/destinations');
    }
}