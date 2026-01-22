<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pengantar Surat</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
<div class="login-box">

      <div class="card-header">
        <h3 class="card-title">Konfirmasi Terima Dokumen</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="/konfirmasi/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Nomor SP</label>
            <input type="text" value="TU.00/SP-{{old('subunit', $data->idlaporan)}}/PW23/1/2026" readonly="readonly" class="form-control" id="exampleInputEmail1" placeholder="Nomor Laporan">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nomor Dokumen</label>
            <input type="text" value="{{old('subunit', $data->laporan->nolaporan)}}" readonly="readonly" class="form-control" id="exampleInputEmail1" placeholder="Nomor Laporan">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Judul Dokumen</label>
            <input type="text" value="{{old('subunit', $data->laporan->judullaporan)}}" readonly="readonly" class="form-control" id="exampleInputPassword1" placeholder="Judul Laporan">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Tujuan</label>
            <input type="text" value="{{old('subunit', $data->tujuan)}}" readonly="readonly" class="form-control" id="exampleInputPassword1" placeholder="Tujuan">
          </div>
          @if (is_null($data->penerima))

          <div class="form-group">
            <label for="exampleInputPassword1">Penerima</label>
            <input type="text" value="{{old('subunit', $data->penerima)}}" name="penerima" id="penerima" class="form-control" id="exampleInputPassword1" placeholder="Nama Penerima">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Jabatan</label>
            <input type="text" value="{{old('jabatanpenerima', $data->jabatanpenerima)}}" name="jabatanpenerima" id="jabatanpenerima" class="form-control" id="exampleInputPassword1" placeholder="Jabatan Penerima">
          </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Tanggal Diterima</label>
            <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" name = "tglditerima" id="tglditerima">
            
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Konfirmasi Terima</button>
            </div>
          @else
          <div class="form-group">
            <label for="exampleInputPassword1">Penerima</label>
            <input type="text" value="{{old('penerima', $data->penerima)}}" name="penerima" readonly="readonly" id="penerima" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Jabatan</label>
            <input type="text" value="{{old('jabatanpenerima', $data->jabatanpenerima)}}" name="jabatanpenerima" readonly="readonly" id="jabatanpenerima" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Tanggal Diterima</label>
            <input type="date" value="{{old('tglditerima', $data->tglditerima)}}" class="form-control"  readonly="readonly" name = "tglditerima" id="tglditerima">
            
            </div>     
            <div class="card-footer">
                <button type="button" class="btn btn-success">Telah konfirmasi diterima</button>
            </div>

          @endif

          
        

        </div>
        <!-- /.card-body -->

        
      </form>
</div>
</body>

