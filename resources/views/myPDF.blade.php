
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
		<td height="127"><img src="{{ asset('/bpkp.png') }}" width="180px" height="" alt=""/></td>
		<td class="tengah">
		  <h1>BADAN PENGAWASAN KEUANGAN DAN PEMBANGUNAN</h1>
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
        <p>Yth. {{ $tujuan }}</p>
        <p>{{ $alamat }}</p>
        </td>
        </tr>
    </table>


	
    
	
	

    <table>
        <tr width="10%">{!! QrCode::size(100)->merge(public_path('bpkp.png'), 0.03,true)->generate($url.'/'.$id.'/'.$token) !!} </tr>
        <td>Scan barcode untuk melakukan konfirmasi penerimaan.</td>
    </table>
</div>
</body>
</html>
