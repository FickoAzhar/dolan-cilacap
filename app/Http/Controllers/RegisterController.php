<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //menampilkan halaman register
    public function index() {
        return view('pages.auth.register', ['title' => 'Register']);
    }

    //function register berdasar request user
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email'=>'required|unique:users|email:dns',
            'password'=> 'required|min:4|max:255',
            'no_identitas' => 'required|digits:16|numeric',
            'no_hp' => 'required|digits:12|numeric',
        ]);

        $validated['password']= Hash::make($validated['password']);

        User::create($validated);

      
        return redirect('login')->with('success', 'Registrasi Berhasil');   

    }
}
