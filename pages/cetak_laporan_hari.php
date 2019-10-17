<?php
error_reporting(0);
session_start();
if(empty($_SESSION['username'])){
    header('location: ../index.php');
    exit(); 
}include ('../config.php');
include('header.php');
// $id = $_GET['id_sekolah'];
// $sql = mysqli_query($connect, "SELECT * FROM profil WHERE id_sekolah='1'");
// $data = mysqli_fetch_array($sql);
// echo $data['nama'];
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Harian
        <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="pages/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="pages/cetak_laporan_harian.php">Forms</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
    
      <!-- /.box -->

        <!-- /.col (left) -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Pilih Tanggal</h3>
            </div>

            <form method="post" action="cetak_laporan_harian.php" target="_blank">
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                <label>Tanggal:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="tanggal">
                </div>
                <!-- /.input group -->
              </div>


                <button type="submit" name="update" class="btn btn-primary">Cetak</button>
              <!-- /.form group -->

              

            </div>
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- iCheck -->
         
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
  
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

  <?php

include 'footer.php';
?>