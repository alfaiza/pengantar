@extends('layout.navbar')
@section('splaporanopen', 'menu-open')
@section('splaporanaktif', 'active')
@section('cekspaktif', 'active')
@section('isibody')


<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

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
                  title: 'Laporan telah dihapus.'
                })
            @endif
          </script>
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><b>Laporan</b></h3>
  </div>          
  <!-- /.card-header -->
  <div class="card-body">
    
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Nomor Surat Pengantar</th>
        <th>Nomor Laporan</th>
        <th>Judul Laporan</th>
        <th>Tujuan</th>
        <th>Aksi</th>
        <th>Tanggal SP</th>
        <th>Tanggal Ekspedisi</th>
        <th>Tanggal Diterima</th>
        <th>Penerima</th>
        <th>Diinput oleh</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($showdata as $index => $row)
      <tr>
          <th>{{ $loop->iteration }}</th>
          <th>SP-{{ $row->id }}/PW23/1/2023</th>  
          <td>{{$row->laporan['nolaporan']}}</td>
          <td>{{$row->laporan['judullaporan']}}</td>
          <td>{{$row->tujuan}}</td>       
          
          <td>
            <a href="#" id= "delete" class="btn btn-danger delete" title="Hapus" data-id="{{$row->id}}" data-tujuan="{{$row->tujuan}}" data-alamat="{{$row->alamat}}"><i class="fas fa-trash"></i></a>
            <a href="/konfirmasi/{{$row->id}}/{{ $row->token }}" class="btn btn-success mt-1"><i class="fas fa-book"></i></a>
            <a href="/editlaporan/{{$row->laporan->id}}" class="btn btn-warning mt-1"><i class="fas fa-edit"></i></a>
            <a href="/cetakqr/{{$row->id}}" target="_blank" class="btn btn-success mt-1"><i class="fas fa-print"></i></a>
          </td>
          <td>{{$row->tglkirim}}</td>
          <td>{{$row->tglekspedisi}}</td>
          <td>{{$row->tglditerima}}</td>
          <td>{{$row->penerima}}</td>

          <td>{{$row->laporan['penginput']}}</td>

      </tr>
      @endforeach 
      </tbody>

    </table>
    

    

    
  </div>
  <!-- /.card-body -->
</div>

<!-- Page specific script -->

 <!-- DataTables  & Plugins -->
 <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
 <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
 <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
 <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
 <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
 <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
 <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
 <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
 <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
 <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthC  hange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example1').DataTable({
        "paging": true,
        "bDestroy": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
    });
  </script>

<script>
  $('.delete').click( function(){
    var spid = $(this).attr('data-id');
    var tujuan = $(this).attr('data-tujuan');
    var alamat = $(this).attr('data-alamat');

    swal.fire({
          title: "YAKIN?",
          text: "kamu akan menghapus data Surat Pengantar dengan tujuan "+tujuan+" dan alamat "+alamat+" ",
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
            window.location= "/destroytujuan/"+spid+""
            swal.fire({
              title:"Data berhasil dihapus!",
              icon: "success",
            });
          } else {
            swal.fire({
              icon:"",
              text:"Tujuan SP tidak jadi dihapus"});
          }
        });
    });
                  
</script>



    
@endsection