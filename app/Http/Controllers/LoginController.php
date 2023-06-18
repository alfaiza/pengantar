<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //halaman login
    public function index(){
        return view('login');
    }

    Public function proseslogin(Request $request){
       
        // $request->validate([
        //     'nip' => 'required',
        //     'password' => 'required',
        // ]);
   
        // $credentials = $request->only('nip', 'password');
        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('rekaprealisasi')
        //                 ->withSuccess('Signed in');
        
  
        // return redirect('login')->with('loginError','Login details are not valid');
        $request->all();
        $credentials = $request->validate([
            'nip' => 'required|integer',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/laporan/show');
        }

        return back()->with('loginError', 'Gagal Login! Hubungi Admin');

    }

    public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }

    public function registrasi(){
            return view('registrasi');
        }
}
