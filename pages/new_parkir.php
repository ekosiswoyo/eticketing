<?php
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
date();
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
        Data Parkir Pengunjung
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Parkir</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
       
         <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
          <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Invoice
            <!-- <small class="pull-right">Date: 2/10/2014</small> -->
          </h2>
        </div>


            <!-- <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div> -->
            <!-- /.box-header -->
            <!-- form start -->
            <table class='table table-condensed table-bordered'>
        <tbody>
          <?php
          include ('../config.php');

// $id = $_GET['id_sekolah'];
$sql = mysqli_query($connect, "SELECT * FROM tb_parkir order by id desc limit 1");
$data = mysqli_fetch_array($sql);

?>
          <tr><th width='130px' scope='row' style="text-align:center;">No Kendaraan</th> <th width='130px' scope='row' style="text-align:center;">Total Biaya</th></tr>
          <tr><th width='130px' scope='row' style="text-align:center;font-size: 40px;"><?php echo $data['plat'];?> </th> <th width='130px' scope='row'  style="text-align:center;font-size: 40px;"><?php echo rupiah($data['total_biaya']);?></th></tr>

        </tbody>
        </table>
        <center><p><?php echo $data['jenis'];?> / <?php echo $data['tanggal'];?></p>
        <a href="add_parkir.php" target="_blank" ><button class="btn btn-primary">Input</button></a>&nbsp;
        <a href="cetak_parkir.php" target="_blank" ><button class="btn btn-primary">Cetak</button></a><hr></center>
          </div>

          

        </div>
         
        <!--/.col (left) -->
        <!-- right column -->
       
        <!--/.col (right) -->
      </div>
      <div class="row">
       <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Jumlah Pengunjung Pelabuhan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                <th>No</th>
                  <th>No Kendaraan</th>
                  <th>Jenis Kendaraan</th>
                  <th>Jumlah Pengunjung</th>
                  <th>Tiket Masuk</th>
                  <th>Biaya Parkir</th>
                  <th>Total Biaya</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <?php  if($_SESSION['level'] == "Administrator") { ?>
                  <th>Aksi</th>
                  <?php } ?>
                </tr>
                </thead>
                <tbody>
                
                <?php
                include '../config.php';
                $no=1;
                $query = mysqli_query($connect, "SELECT * FROM tb_parkir ORDER BY id DESC");
                while ($data = mysqli_fetch_array($query)) {
                ?>

                <tr>
                <td><?php echo $no++;?></td>
                  <td><?php echo $data['plat'];?></td>
                  <td><?php echo $data['jenis'];?>
                  </td>
                  <td><?php echo $data['jml_orang'];?></td>
                  <td><?php echo rupiah($data['biaya_orang']);?></td>
                  <td><?php echo rupiah($data['biaya_parkir']);?></td>
                  <td><?php echo rupiah($data['total_biaya']);?></td>
                  <td><?php echo $data['tanggal'];?></td>
                  <td><?php echo $data['jam'];?></td>
                  <?php  if($_SESSION['level'] == "Administrator") { ?>
                  <td><center>
                                <a class="fa fa-fw fa-edit" title="Ubah" href="edit_parkir.php?id_parkir=<?php echo $data['id'];?>"></a>
                                <a class="fa fa-fw fa-trash" title="Hapus" href="delete_parkir.php?id_parkir=<?php echo $data['id'];?>" onclick="javascript: return confirm('Anda yakin hapus ?')"></a>
                              </center></td>
                  <?php } ?>
                </tr>

                <?php 
               
                }
               
                ?>
               
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include 'footer.php';

date_default_timezone_set('Asia/Jakarta');
date();
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
 
}
if(isset($_POST['parkir'])){
    $id_user = $_POST['id_user'];
    $plat = $_POST['plat'];
    $jenis = $_POST['jenis'];
    $jml_orang = $_POST['jml_orang'];
    $biayaorang = $jml_orang*2000;
    $date = date('Y-m-d');
    $time = date('H:i:sa');

    if($jenis == 'Motor' && $jml_orang > 2){
       echo "<script>window.alert('TIDAK BOLEH LEBIH DARI 2 ORANG!')</script>";
    }else if($jenis == 'Sepeda' && $jml_orang > 2){
       echo "<script>window.alert('TIDAK BOLEH LEBIH DARI 2 ORANG!')</script>";
    }else{
    if($jenis == 'Sepeda'){
      $parkir = 1000;
      $biayaparkir = $parkir+$biayaorang;
    }else if($jenis == 'Motor'){
      $parkir = 2000;
      $biayaparkir = $parkir+$biayaorang;
    }else if($jenis == 'Mobil'){
      $parkir = 5000;
      $biayaparkir = $parkir+$biayaorang;
    }else if($jenis == 'Bis'){
      $parkir = 8000;
      $biayaparkir = $parkir+$biayaorang;
    }else{
      $biayaparkir = $biayaorang;
    }
   if($plat != NULL){
    $sql = "INSERT INTO tb_parkir (id_user,plat,jenis,jml_orang,biaya_orang,biaya_parkir,total_biaya,tanggal,jam) VALUES ('$id_user','$plat','$jenis','$jml_orang','$biayaorang','$parkir','$biayaparkir','$date','$time')";
   }else{
    $sql = "INSERT INTO tb_parkir (id_user,plat,jenis,jml_orang,biaya_orang,biaya_parkir,total_biaya,tanggal,jam) VALUES ('$id_user','-','-','$jml_orang','$biayaorang','$parkir','$biayaparkir','$date','$time')";
   }
    $query = mysqli_query($connect, $sql);

    if($query){
       echo "<script>window.alert('Data Berhasil di Simpan !')</script>";
       echo "<script>window.location='add_parkir.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }
}
}

?>