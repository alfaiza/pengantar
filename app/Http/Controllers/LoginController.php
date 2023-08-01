<?php

namespace App\Http\Controllers;

use App\Models\Konfirmasi;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function dashboard()
    {
        $laporansp = Laporan::get();
        $jumlahsp = Konfirmasi::get();
        $ekspedisi = Konfirmasi::whereNotNull('tglekspedisi')->count();
        $diterima = Konfirmasi::whereNotNull('tglditerima')->count();
        return view('admin.dashboard',compact('laporansp','ekspedisi','jumlahsp','diterima'));
    }

    public function edituser($id)
    {
        $data = User::find($id);
        // dd($data);
        return view ('admin.edituser', compact('data'));
    }

    public function updateuser(Request  $request, $id)
    {
        $ambildata = $request->all();
        $data = User::find($id);
        $password = $request->password;
        $data->password = Hash::make($password);
        $data->name=$request->input('name');
        $data->nip=$request->input('nip');
        $data->bidang=$request->input('bidang');
        $data->email=$request->input('email');
        $data->save();
        // dd($data);
        return redirect ('user')->with('success','User Berhasil diupdate');
    }
    
}
