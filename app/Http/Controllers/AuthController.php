<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
            'password.required' => 'Password harus diisi',
            'email.required' => 'Email harus diisi',
        ]);
        if(Auth::attempt($validatedData)){
            // dd(Auth::user());
            $request->session()->regenerate();
            // if(Auth::user()->role == "Petugas"){
            //     return view('dashboard');
            // }
            // if(Auth::user()->role == "Pelanggan"){
            //     return view('');
            // }
            return redirect('dashboard');
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'E-mail atau Password salah');
        return redirect('/');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
