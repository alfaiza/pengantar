<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Surat Tanda Terima</title>
	<style type="text/css">
		body {font-family: arial;background-color: #ccc}
		.badansurat {width: 980px;margin: 0 auto;background-color: #FFFFFF;height: 800px;padding-top: 50px;padding-left: 100px;padding-right: 100px}
	
		.tengah {text-align: center;line-height: 5px}
	
	</style>
</head>

<body>
<div class="badansurat">
	<table style="border-bottom: 5px solid #000000" width="100%" >
		<tr>
		<td height="127"><img src="{{ asset('/bpkp.png') }}" width="180px" height="" alt=""/></td>
		<td class="tengah">
		  <h2>BADAN PENGAWASAN KEUANGAN DAN PEMBANGUNAN</h2>
			<h2>PERWAKILAN PROVINSI NUSA TENGGARA BARAT</h2>
			<p style="font-size: 15px">Jalan Majapahit 23A, Mataram 83116</p>
			<p style="font-size: 15px">Telepon (0370) 638248 Faksimile (0370) 623505 </p>
			<p><a style="font-style: italic">Email</a>: <a href="">ntb@bpkp.go.id</a>,<a style="font-style: italic"> Website: </a><a href="https://www.bpkp.go.id/ntb">www.bpkp.go.id/ntb</a></p>
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
	
    <table border="" cellpadding="7" width="100%" style="border-collapse: collapse; vertical-align: top">
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
                <p>Tgl {{ $data->laporan->tgllaporan }}</p>
            </td>
        </tr>
    </table>
	
	
    <table width="100%">
        <tr>
            <td width="6%">{!! QrCode::size(100)->merge(public_path('bpkp.png'), 0.03,true)->generate($url.'/'.$data->id.'/'.$data->token) !!}</td>
            <td width="55%"></td>
            <td width="12%"></td>
            <td width="27%" high="27%">
            <p>Mataram, Mei 2023 </br>
            Subkoordinator Pengelola BMN,</br>
            Rumah Tangga dan Kearsipan</p>
            </br>
            </br>
            <p>Abdul Rahim Fahmi</p>
            </td>
            <td>
                
        
            </td>
        </tr>

        
    </table>
    <tr>
        
        {{-- <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->merge(public_path('bpkp.png'), 0.03,true)->generate($url.'/'.$data->id.'/'.$data->token)) }}"> --}}
        
        
    </tr>
</div>
</body>
</html>
