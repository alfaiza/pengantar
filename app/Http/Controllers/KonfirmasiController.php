<?php

namespace App\Http\Controllers;

use App\Models\Konfirmasi;
use BaconQrCode\Renderer\Path\Path;
use Illuminate\Http\Request;

class KonfirmasiController extends Controller
{

    public function tampilkansp($id){
        $data = Konfirmasi::with('laporan')->find($id);
        // $data2['pesertas'] = Konfirmasi::orderBy('id','desc')->paginate(5);
        // dd($data);
        return view ('konfirmasi', compact('data'));
    }

    public function tampilkansptoken($id, $token){
        $data = Konfirmasi::with('laporan')->find($id);
        // $data2['pesertas'] = Konfirmasi::orderBy('id','desc')->paginate(5);
        // dd($data);
        return view ('konfirmasi', compact('data'));
    }
    public function konfirmasi(Request  $request, $id){
        $data = Konfirmasi::find($id);
        $data->penerima = $request->penerima;
        $data->tglditerima = $request->tglditerima;
        $data->save();

        return redirect()->back()->with('success', 'data berhasil diinput');
    }

    public function cetakqr($id){
        $data = Konfirmasi::with('laporan')->find($id);
        $img = asset('img/logobpkp.jpg');
        $url = url('konfirmasi/');
        // dd($img);
        return view ('qrcode', compact('data','url','img'));    
    }

    public function deletepeserta(Request $request){
        Konfirmasi::where('id',$request->id)->delete();
        // dd($bungkus);
   
        return response()->json(['success' => true]);

    }

    public function destroytujuan($id){
        Konfirmasi::find($id)->delete();
        return redirect('/laporan/show')->with('status', 'Tujuan Berhasil Di Hapus');
    }
}
