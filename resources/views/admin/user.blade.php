@extends('layout.navbar')
@section('useropen', 'menu-open')
@section('useractive', 'active')

@section('isibody')
<script>
  @if(Session::has('status'))
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    })
    
      Toast.fire({
        icon: 'success',
        title: 'User telah dihapus.'
      })
  @endif
</script>
<div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>User</b></h3>
    </div>          
    <!-- /.card-header -->
    <div class="card-body">
      <a href="/registrasi" id= "detail" class="btn btn-success" title="hapus user" data-id="" data-laporan="" data-alamat=""><i class="fas fa-plus"></i> tambah user</a>
            
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>NIP</th>
          <th>Bagian</th>
          <th>Aksi</th>
          
        </tr>
        </thead>
        <tbody>
        @foreach ($showdata as $index => $row)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <th>{{ $row->name }}</th>  
            <td>{{$row->email}}</td>
            <td>{{$row->nip}}</td>
            <td>{{$row->bidang}}</td>
            <td>
              <a href="/edituser/{{$row->id}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
              <a href="#" id= "delete" class="btn btn-danger delete" title="hapus user" data-id="{{$row->id}}" data-user="{{$row->name}}" data-bidang="{{$row->bidang}}"><i class="fas fa-trash"></i></a>
            
              {{-- <a href="#" id= "delete" class="btn btn-danger delete" title="Hapus" data-id="{{$row->id}}" data-tujuan="{{$row->tujuan}}" data-alamat="{{$row->alamat}}"><i class="fas fa-trash"></i></a>
              <a href="/konfirmasi/{{$row->id}}/{{ $row->token }}" class="btn btn-success mt-1"><i class="fas fa-book"></i></a>
              <a href="/editlaporan/{{$row->laporan->id}}" class="btn btn-warning mt-1"><i class="fas fa-edit"></i></a>
              <a href="/cetakqr/{{$row->id}}" target="_blank" class="btn btn-success"><i class="fas fa-print"></i></a> --}}
            </td>

  
        </tr>
        @endforeach 
        </tbody>
  
      </table>
      
  
      
  
      
    </div>
    <!-- /.card-body -->
  </div>
  <script>
    $('.delete').click( function(){
      var userid = $(this).attr('data-id');
      var user = $(this).attr('data-user');
      var bidang = $(this).attr('data-bidang');
  
      swal.fire({
            title: "YAKIN?",
            text: "kamu akan menghapus akun "+user+" dari bidang "+bidang+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
      })
          .then((result) => {
            if (result.isConfirmed) {
              window.location= "/deleteuser/"+userid+""
              swal.fire({
                title:"Data berhasil dihapus!",
                icon: "success",
              });
            } else {
              swal.fire({
                icon:"",
                text:"User tidak jadi dihapus"});
            }
          });
      });
                    
  </script>
@endsection