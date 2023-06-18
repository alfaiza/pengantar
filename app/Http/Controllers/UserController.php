<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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

        // $user->save();
        if($user::where('nip',$nip)->count()){
            return redirect()->route('registrasi')->with('gagal','ELSE');
        }else{
            $user->save();
            return redirect()->route('login')->with('success','Berhasil di Registrasi');
        }
    }
}
