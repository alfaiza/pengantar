
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Surat Tanda Terima</title>
	<style type="text/css">
		body {font-family: arial;background-color: #ccc}
		.badansurat {width: 800px;margin: 0 auto;background-color: #FFFFFF;height: 1200px;padding-top: 50px;padding-left: 100px;padding-right: 100px}
	
		.tengah {text-align: center;line-height: 5px}
        h1{
            font-size:20px !important;
            }
        h2{
            font-size:14.667px !important;
            }
	</style>
</head>

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
<div class="badansurat">
	<table style="border-bottom: 5px solid #000000" width="100%" >
		<tr>
		<td height="90"><img src="{{ asset('/bpkp.png') }}" width="180px" height="" alt=""/></td>
		<td class="tengah">
		  <h1>BADAN PENGAWASAN KEUANGAN DAN PEMBANGUNAN</h1>
			<h1>PERWAKILAN PROVINSI NUSA TENGGARA BARAT</h1>
            <p></p>
			<p style="font-size: 12px">Jalan Majapahit 23A, Mataram 83116, Telepon (0370) 638248 Faksimile (0370) 623505 </p>
			<p style="font-size: 12px"><a style="font-style: italic">Email</a>: <a href="">ntb@bpkp.go.id</a>,<a style="font-style: italic"> Website: </a><a href="https://www.bpkp.go.id/ntb">www.bpkp.go.id/ntb</a> </p>
		</td>
		</tr>	
	</table>
    <table width="100%">
        <tr>
        <td>
        <p>Yth. {{ $data->tujuan }}</p>
        <p>{{ $data->alamat }}</p>
        </td>
        </tr>
    </table>

    <table style="text-align: center" width="100%">
        <tr>
        <td>
        <p>SURAT PENGANTAR</p>
        <p>Nomor TU.00/SP-{{ $data->id }}/PW23.1/2023</p>	
        </td>
        </tr>
    </table>
	
    <table border="" cellpadding="5" width="100%" style="border-collapse: collapse; vertical-align: top">
        <tr style="text-align: center">
            <td width="6%">No Urut</td>
            <td width="55%">Jenis Surat atau Barang yang di kirim</td>
            <td width="12%">Banyaknya</td>
            <td width="27%">Keterangan</td>
        </tr>
        
        <tr style="text-align: center">
            <td>(1)</td>
            <td>(2)</td>
            <td>(3)</td>
            <td>(4)</td>
        </tr>

        <tr>
            <td style="text-align: center">1.</td>
            <td><p style="text-align: justify">{{ $data->laporan->judullaporan }}</p></td>
            <td style="text-align: center">1 Laporan</td>
            <td>
                <p>{{ $data->laporan->nolaporan }}</p> 
                <p>Tanggal {{ \Carbon\Carbon::parse($data->laporan->tgllaporan)->locale('id')->translatedformat('j F Y') }}</p>
            </td>
        </tr>
    </table>
	
	
    <table width="100%">
        <tr>
            <td width="15%"></td>
            <td width="53%"></td>
            <td width="0%"></td>
            <td width="42%" high="27%">
            <p>Mataram, {{ \Carbon\Carbon::parse($data->tglkirim)->locale('id')->translatedformat('j F Y') }} <br>
            Subkoordinator Pengelolaan BMN,<br>
            Rumah Tangga dan Kearsipan</p>
            <br>
            <br>
            <p>Abdul Rahim Fahmi</p>
            </td>
            <td>        
            </td>
        </tr>
    </table>

    <br/>
    <br/>
    <table>
        <tr>
        <td><h3>Mohon untuk scan QR Code untuk mengkonfirmasi dokumen/barang yang telah diterima</h3></td>
        </tr>
        <tr>
        <td width="10%">{!! QrCode::size(100)->merge(public_path('bpkp.png'), 0.03,true)->generate($url.'/'.$data->id.'/'.$data->token) !!} </td>
    </tr>
    </table>
</div>
</body>
</html>
