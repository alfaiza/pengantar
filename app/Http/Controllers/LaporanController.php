<?php

namespace App\Http\Controllers;

use App\Models\Konfirmasi;
use App\Models\Laporan;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
class LaporanController extends Controller
{
    public function create()
    {
        return view('inputlaporan');
    }
    public function store(Request $request)
    {
        
        $data = $request->all();
        $laporan = new Laporan();
        $laporan->nolaporan = $data['nolaporan'];
        $laporan->tgllaporan = $data['tgllaporan'];
        $laporan->judullaporan = $data['judullaporan'];
        // $laporan->nolaporan = $data['pengirim'];
        // $laporan->nolaporan = $data['tglkirim'];
        $laporan->save();
        // dd($data);

        if (count($data['tujuan'])>0){
            foreach ($data['tujuan'] as $item => $value){
                $token = Str::random(16);
                $data2 = array(
                    'idlaporan' => $laporan->id,
                    'tujuan' => $data['tujuan'][$item],
                    'alamat' => $data['alamat'][$item],
                    'token' => $token
                    
                   
                );
                //
                
                Konfirmasi::create($data2);
                // $token = new Konfirmasi;
                // $token->token = Str::random(16);
                // $token->save();
               
            }
        }

        return redirect()->back()->with('success', 'data berhasil diinput');
    }

    public function show()
    {
        // $showdata = Laporan::with('konfirmasi')->paginate(5); 
        // dd($showdata);

        $showdata = Konfirmasi::with('laporan')->orderBy('id','desc')->get();
        // dd($showdata);
        return view('splaporan',compact('showdata'));
    }

    public function suratpengantar()
    {
        $showdata = Konfirmasi::with('laporan')->paginate(5);
        // dd($showdata);
        return view('suratpengantar',compact('showdata'),['showdata'=>$showdata]);
    }

    public function destroy($id){
        
        // dd($notulen);
        
        Konfirmasi::find($id)->delete();
        return redirect('/laporan/show')->with('status', 'Data Surat Pengantar Berhasil Dihapus');
    }

}
