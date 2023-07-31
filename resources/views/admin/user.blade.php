@extends('layout.navbar')
@section('useropen', 'menu-open')
@section('useractive', 'active')

@section('isibody')

<div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>User</b></h3>
    </div>          
    <!-- /.card-header -->
    <div class="card-body">
      
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>NIP</th>
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
            <td>
              <a href="/edituser/{{$row->id}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
              <a href="#" id= "detail" class="btn btn-danger detail" title="hapus user" data-id="{{$row->id}}" data-laporan="{{$row->judullaporan}}" data-alamat="{{$row->nolaporan}}"><i class="fas fa-trash"></i></a>
            
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
@endsection