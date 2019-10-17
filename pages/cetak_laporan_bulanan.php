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
        Laporan Bulanan
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
        <div class="col-md-12">

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Laporan Bulanan </h3>
            </div>
            <div class="box-body">
                <form method="post" action="cetak_laporan_bulan.php" target="_blank">
              <!-- Date dd/mm/yyyy -->
              <div class="form-group col-md-6">
                <label>Pilih Bulan :</label>

                 <select name="bulan" class="form-control">
                 <?php
                include '../config.php';
                $query = mysqli_query($connect, "SELECT MONTH(tanggal) as bulan FROM tb_parkir group by MONTH(tanggal) desc");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <option value="<?php echo $data['bulan']; ?>"><?php echo $data['bulan']; ?></option>
                <?php } ?>

                 </select>
                <!-- /.input group -->
              </div>
              <div class="form-group col-md-6">
                <label>Pilih Tahun :</label>

                 <select name="tahun" class="form-control">
                 <?php
                include '../config.php';
                $query = mysqli_query($connect, "SELECT YEAR(tanggal) as tahun FROM tb_parkir group by YEAR(tanggal) desc");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <option value="<?php echo $data['tahun']; ?>"><?php echo $data['tahun']; ?></option>
                <?php } ?>

                 </select>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date mm/dd/yyyy -->
             
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