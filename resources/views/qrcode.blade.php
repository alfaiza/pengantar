<!DOCTYPE html>
<html lang="en">
    <head>
        <title> KOP SURAT </title>
        <style type= "text/css">
        body {font-family: arial; background-color : #ccc }
        .rangkasurat {width : 980px;margin:0 auto;background-color : #fff;height: 1300px;padding: 20px;}
        table {border-bottom : 5px solid # 000; padding: 2px}
        .tengah {text-align : center;line-height: 5px;}
         </style >
    </head>
<body>
    <div class = "rangkasurat">
        <table width = "100%">
            <tr>
                    <td> <img src="{{ asset('img/logobpkp.jpg') }}" width="140px"> </td>
                    <td class = "tengah">
                          <h2>BADAN PENGAWASAN KEUANGAN DAN PEMBANGUNAN</h2>
                          <h2>PERWAKILAN BPKP PROVINSI NTB</h2>
                          <b>Jalan Majapahit No 32 Kota Mataram</b>
                    </td>
                    <td class="center"></td>
            </tr>
            
            
        </table >
        <tr>
            <h3>{{ $data->laporan->judullaporan }}</h3>
            <h3>{{ $data->laporan->nolaporan }}</h3>
            <h3>tanggal {{ $data->laporan->tgllaporan }}</h3>
            {!! QrCode::size(300)->generate($url.'/'.$data->id.'/'.$data->token) !!}
            <h3>Scan barcode ini untuk mengirim<b>konfirmasi tanda terima</b> </h3>
        </tr>    
   </div>
    
</body>
</html>
