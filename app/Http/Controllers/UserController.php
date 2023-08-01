<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {

    }
    public function index()
    {
        // $showdata = Laporan::with('konfirmasi')->paginate(5); 
        // dd($showdata);

        $showdata = User::get();
        // dd($showdata);
        return view('admin.user',compact('showdata'));
    }
    public function prosesregistrasi(Request $request){
        $data = $request->all();
        $nip = $request->nip;
        $password = $request->password;
        
        $user = new User;
        $user->name = $data['name'];
        $user->nip = $data['nip'];
        $user->unit = $data['unit'];
        $user->password = Hash::make($password);
        $user->email = $data['email'];
        $user->bidang = $data['bidang'];

        // $user->save();
        if($user::where('nip',$nip)->count()){
            return redirect()->route('registrasi')->with('gagal','ELSE');
        }else{
            $user->save();
            return redirect()->route('login')->with('success','Berhasil di Registrasi');
        }
    }
    public function deleteuser($id){
        User::find($id)->delete();
        return redirect('/user')->with('status', 'User Berhasil Dihapus');
    }
}
