@extends('layout.navbar')
@section('splaporanopen', 'menu-open')
@section('splaporanaktif', 'active')
@section('inputlaporanaktif', 'active')
@section('isibody')
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>


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
        title: 'Laporan telah diupdate.'
      })
  @endif
</script>
<div class="container">

  <div class="card-header">
    <h3 class="card-title"><b>Edit Informasi Laporan</b></h3>
  </div>

  <div class="card-body">
    
    <form action="/updatelaporan/{{ $data->id }}" method="POST" enctype="multipart/form-data">

      @csrf 
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nomor Laporan</label>
          
          <div class="col-sm-6">
            <input type="text" class="form-control" id="nolaporan" name="nolaporan" value="{{$data->nolaporan}}" placeholder="Nomor Laporan" required>
          </div>
          <label class="col-sm-2 col-form-label">Tanggal Laporan</label>
              <div class="col-sm-2">
                <input type="date" class="form-control" id="tgllaporan" name="tgllaporan" value="{{$data->tgllaporan}}" placeholder="Bidang/Sub Unit" required>
              </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Judul Laporan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="judullaporan" name="judullaporan" value="{{$data->judullaporan}}" placeholder="Ketik judul laporan" required>
          </div>
        </div>

        @foreach ($data->konfirmasi as $item)
        <div class="form-group row rowpeserta">
            <label class="col-sm-2 col-form-label jumlahpeserta">Tujuan <div class="count"></div></label>
            <input type="hidden" name="id[]" id="id" value={{$item->id}}>
            <input type="hidden"  name="idlaporan[]" id="idpks" value="{{$data->id}}">
            <div class="col-sm-10">
              <input type="text" class="form-control" id="tujuan" name="tujuan[]" value="{{old('tujuan', $item->tujuan)}}" placeholder="nama mitra kerja tujuan" required>
            </div>
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="alamat" name="alamat[]" value="{{old('alamat', $item->alamat)}}" placeholder="masukan alamat tujuan" required>
            </div>
            <label class="col-sm-2 col-form-label">Tanggal Pengiriman/SP</label>
            <div class="col-sm-2">
              <input type="date" value="{{old('alamat', $item->tglkirim)}}" class="form-control" id="tglkirim" name="tglkirim[]" required>
            </div>
            <label class="col-sm-2 col-form-label">Tanggal Ekspedisi</label>
            <div class="col-sm-2">
              <input type="date" value="{{old('alamat', $item->tglekspedisi)}}"class="form-control" id="tglekspedisi" name="tglekspedisi[]">
            </div>

            
            <div class="col-sm-12">
              <button type="button" class="addtujuan btn btn-primary" style="float: right;">Add</button>
              <a href="javascript:void(0)" class="btn btn-danger remove" data-id="{{ $item->id }}" style="float: right;"><i class="fas fa-trash"></i></a>
            </div>
            
        </div>
        @endforeach
        {{-- <input type="hidden" id="token" name="token" value="3487"> --}}
        <input type="hidden" class="token" id="token" name="token[]">
        <div class="peserta"></div>

               

        <div class="form-group row">
          <div class="col-sm-12">
            <input type="submit" class="btn btn-success form-control" value="Update">
          </div>
        </div>
    </form>
  </div>
</div>

<!-- bs-custom-file-input -->
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
  $(function () {
    bsCustomFileInput.init();
  });
</script>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
  $('.addtujuan').live('click', function(){
    addtujuan();
  });
  function addtujuan(){
    var peserta = '<input type="hidden" name="id[]" id="id" value=""><input type="hidden" name="idlaporan[]" id="idlaporan" value="{{$data->id}}"><input type="hidden" class="token" id="token" name="token[]" readonly><div><div class="form-group row"><label class="col-sm-2 col-form-label">Tujuan</label><div class="col-sm-10"><input type="text" class="form-control" id="tujuan" name="tujuan[]" placeholder="masukan mitra kerja tujuan" required></div><label class="col-sm-2 col-form-label">Alamat</label><div class="col-sm-10"><input type="text" class="form-control" id="alamat" name="alamat[]" placeholder="masukan alamat tujuan" required></div><label class="col-sm-2 col-form-label">Tanggal Pengiriman/SP</label><div class="col-sm-2"><input type="date" class="form-control" id="tglkirim" name="tglkirim[]" required></div><label class="col-sm-2 col-form-label">Tanggal Ekspedisi</label><div class="col-sm-2"><input type="date" value="{{old('alamat', $item->tglekspedisi)}}" class="form-control" id="tglekspedisi" name="tglekspedisi[]" ></div><div class="col-sm-2"></div><div class="col-sm-12"><button type="button" class="addtujuan btn btn-primary" style="float: right;"><i class="fas fa-plus"></i></i></button><button type="button" class="remove btn btn-danger" style="float: right;"><i class="fas fa-trash-alt"></i></button></div></div></div>';
    var peserta = '<input type="hidden" name="id[]" id="id" value=""><input type="hidden" name="idlaporan[]" id="idlaporan" value="{{$data->id}}"><input type="hidden" class="token" id="token" name="token[]" readonly><div><div class="form-group row"><label class="col-sm-2 col-form-label">Tujuan</label><div class="col-sm-10"><input type="text" class="form-control" id="tujuan" name="tujuan[]" placeholder="masukan mitra kerja tujuan" required></div><label class="col-sm-2 col-form-label">Alamat</label><div class="col-sm-10"><input type="text" class="form-control" id="alamat" name="alamat[]" placeholder="masukan alamat tujuan" required></div><label class="col-sm-2 col-form-label">Tanggal Pengiriman/SP</label><div class="col-sm-2"><input type="date" class="form-control" id="tglkirim" name="tglkirim[]" required></div><label class="col-sm-2 col-form-label">Tanggal Ekspedisi</label><div class="col-sm-2"><input type="date" value="{{old('alamat', $item->tglekspedisi)}}" class="form-control" id="tglekspedisi" name="tglekspedisi[]" ></div><div class="col-sm-2"></div><div class="col-sm-12"><button type="button" class="addtujuan btn btn-primary" style="float: right;"><i class="fas fa-plus"></i></i></button><button type="button" class="remove btn btn-danger" style="float: right;"><i class="fas fa-trash-alt"></i></button></div></div></div>';
    
    $('.peserta').append(peserta);
  };
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

  $('.remove').live('click', function () {
        if (confirm("Delete Record?") == true) {
            //hapus tampilan
            $(this).parent().parent().remove();
            let id = $(this).data('id');
            // ajax
            $.ajax({
              type:"POST",
              url: "{{ url('deletetujuan') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
                window.location.reload();
              }           
            });
          }
      });
</script>
<script>
  function token() {
    var randomString = Math.random().toString(36).substring(7);
    document.getElementById("token").value = randomString;
  }
</script>

<script>
  function generateRandomString($length = 10) {
  $characters = 
  '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
  document.getElementById("randomStringInput").value = randomString;
  }
</script>



@endsection
