@extends('layout.navbar')
@section('splaporanopen', 'menu-open')
@section('splaporanaktif', 'active')
@section('cekalllaporan', 'active')
@section('isibody')

{{-- <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script> --}}
{{-- <script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script> --}}

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">




          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif

<div class="card">
  <div class="card-header">
    <h3 class="card-title"><b>Dokumen</b></h3>
  </div>          
  <!-- /.card-header -->
  <div class="card-body">
    
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Nomor Dokumen</th>
        <th>Judul Dokumen</th>
        <th>Tujuan</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($showdata as $index => $row)
      <tr>
          <th>{{ $loop->iteration }}</th>
          {{-- <th>SP-{{ $row->id }}/PW23/1/2024</th>   --}}
          <td>{{$row->nolaporan}} tanggal {{$row->tgllaporan}}</td>
          <td>{{$row->judullaporan}}</td>
          <td>{{$row->konfirmasi->count()}}</td>       
          
          <td>
            <a href="/editlaporan/{{$row->id}}" class="btn btn-warning mt-1"><i class="fas fa-edit"></i></a>
            <a href="#" id= "detail" class="btn btn-danger detail" title="detail" data-id="{{$row->id}}" data-laporan="{{$row->judullaporan}}" data-alamat="{{$row->nolaporan}}"><i class="fas fa-book"></i></a>
            {{-- <a href="#" id= "delete" class="btn btn-danger delete" title="Hapus" data-id="{{$row->id}}" data-tujuan="{{$row->tujuan}}" data-alamat="{{$row->alamat}}"><i class="fas fa-trash"></i></a>
            <a href="/tampilkansp/{{$row->id}}/{{ $row->token }}" class="btn btn-success mt-1"><i class="fas fa-book"></i></a>
            <a href="/editlaporan/{{$row->laporan->id}}" class="btn btn-warning mt-1"><i class="fas fa-edit"></i></a>
            <a href="/cetakqr/{{$row->id}}" target="_blank" class="btn btn-success"><i class="fas fa-print"></i></a> --}}
          </td>


      </tr>
      @endforeach 
      </tbody>
      {{-- {{ $showdata->links() }} --}}
      {{-- <table>
        {{ $showdata->links() }}
      </table> --}}
    </table>
    

    

    
  </div>
  <!-- /.card-body -->
</div>

<div class="modal fade" id="modal-xl">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Extra Large Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
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
            window.location= "destroy/"+spid+""
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




{{-- modal --}}
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    
  });
</script>    
@endsection
