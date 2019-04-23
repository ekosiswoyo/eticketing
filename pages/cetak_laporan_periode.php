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
        Laporan Per Periode
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

      <div class="row">
        <div class="col-md-6">

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Laporan Periode </h3>
            </div>
            <div class="box-body">
                <form method="post" action="cetak_laporan_harian.php">
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>Tanggal Awal :</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="awal" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date mm/dd/yyyy -->
              <div class="form-group">
              <label>Tanggal Akhir :</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="akhir" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Cetak</button>
              </div>
</form>
              <!-- /.form group -->

              <!-- phone mask -->
              
              <!-- /.form group -->

              <!-- phone mask -->
             
              <!-- /.form group -->

              <!-- IP mask -->
              
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
     
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <?php
include 'footer.php';
?>