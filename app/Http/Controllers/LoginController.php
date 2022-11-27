<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //menampilkan halaman auth
    public function index() {
        return view('pages.auth.login', ['title' => 'Login']);
    }

    //validasi login request
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if( auth()->user()->is_admin ){
                return redirect()->intended('dashboard');
            }
            else{
                return redirect()->intended('/');
            }
        }

        return back()->with('loginError', 'Email atau password salah!');
    }

    //function logout
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
