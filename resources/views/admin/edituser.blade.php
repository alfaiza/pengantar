<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit User</title>

  {{-- <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</head>
<script>
    @if(Session::has('success'))
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      })
      
        Toast.fire({
          icon: 'success',
          title: 'User telah ditambahkan.'
        })
    @endif
  </script>
<body class="hold-transition login-page">
    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }} 
        
          <a href="https://wa.me/6282316567767" class="alert-link"><i class="fab fa-whatsapp"></i></a>
       
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    
<div class="login-box">
  <div class="login-logo">
    <a>EDIT USER</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form action="/updateuser/{{ $data->id }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" name="name" id="name" autofocus required value="{{$data->name}}">
            <div class="input-group-append">
              <div class="input-group-text">
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" id="email" autofocus required value="{{$data->email}}">
            <div class="input-group-append">
              <div class="input-group-text">
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
          <input type="nip" class="form-control @error('nip') is-invalid @enderror" placeholder="NIP" name="nip" id="nip" autofocus required value="{{$data->nip}}">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="name" class="form-control @error('unit') is-invalid @enderror" placeholder="Unit" name="unit" id="unit" required value="{{ $data->unit }}">
            <div class="input-group-append">
              <div class="input-group-text">
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="name" class="form-control @error('bidang') is-invalid @enderror" placeholder="Nama" name="bidang" id="bidang" required value="{{ $data->bidang}}">
            <div class="input-group-append">
              <div class="input-group-text">
              </div>
            </div>
        </div>
        
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Update</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
