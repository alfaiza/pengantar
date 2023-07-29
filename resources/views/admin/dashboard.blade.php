@extends('layout.navbar')
@section('dashboardopen', 'menu-open')
@section('dashboardaktif', 'active')

@section('isibody')
 <!-- Content Wrapper. Contains page content -->

   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Monitoring Laporan</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="http://pengantar.test/">Home</a></li>
             <li class="breadcrumb-item active">Dashboard</li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <!-- Small boxes (Stat box) -->
       <div class="row">
         <div class="col-lg-3 col-6">
           <!-- small box -->
           <div class="small-box bg-info">
             <div class="inner">
               <h3>150</h3>

               <p>Jumlah Laporan</p>
             </div>
             <div class="icon">
               <i class="ion ion-android-document"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
           <!-- small box -->
           <div class="small-box bg-success">
             <div class="inner">
               <h3>53<sup style="font-size: 20px"></sup></h3>

               <p>Laporan Masuk</p>
             </div>
             <div class="icon">
               <i class="ion ion-archive"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
           <!-- small box -->
           <div class="small-box bg-warning">
             <div class="inner">
               <h3>44</h3>

               <p>Laporan Dikirim</p>
             </div>
             <div class="icon">
               <i class="ion ion-android-send"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
           <!-- small box -->
           <div class="small-box bg-danger">
             <div class="inner">
               <h3>65</h3>

               <p>Laporan Diterima</p>
             </div>
             <div class="icon">
               <i class="ion ion-compose"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
       </div>
       <!-- /.row -->
       <!-- Main row -->
       <div class="row">
         <!-- Left col -->
         <section class="col-lg-7 connectedSortable">
           <!-- Custom tabs (Charts with tabs)-->
           
           <!-- /.card -->

           <!-- DIRECT CHAT -->
           
           <!--/.direct-chat -->

           <!-- TO DO List -->
           <!-- /.card -->
         </section>
         <!-- /.Left col -->
         <!-- right col (We are only adding the ID to make the widgets sortable)-->
         <section class="col-lg-5 connectedSortable">

  

           <!-- Calendar -->
          
           <!-- /.card -->
         </section>
         <!-- right col -->
       </div>
       <!-- /.row (main row) -->
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 <!-- /.content-wrapper -->


@endsection