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
        Data Pengunjung Wahana Edukasi
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Wahana Edukasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div> -->
            <!-- /.box-header -->
            <!-- form start -->
            <form action="" method="post">
              <div class="box-body">
               

                <?php
                 
                // mencari kode barang dengan nilai paling besar
                $query = mysqli_query($connect,"SELECT id_edukasi FROM tb_edukasi order by no_edukasi desc limit 1");
                $data = mysqli_fetch_array($query);
                $kodeEdukasi = $data['id_edukasi'];
                 
                // mengambil angka atau bilangan dalam kode anggota terbesar,
                // dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
                // misal 'BRG001', akan diambil '001'
                // setelah substring bilangan diambil lantas dicasting menjadi integer
                $noUrut = (int) substr($kodeEdukasi, 3, 3);
                 
                // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                $noUrut++;
                 
                // membentuk kode anggota baru
                // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
                // misal sprintf("%03s", 12); maka akan dihasilkan '012'
                // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
                $char = "ED";
                $kodeEdukasi = $char . sprintf("%03s", $noUrut);
                $abc = "ED001";
                $querys = mysqli_query($connect, "SELECT tanggal from tb_edukasi order by no_edukasi desc limit 1");
                $querydata = mysqli_fetch_array($querys);
                $date = $querydata['tanggal'];
                $now= date("Y-m-d");
                ?>
                 <input value="<?php echo $_SESSION['username'];?>" name="id_user" type="hidden">
                <div class="form-group">
                  <label for="exampleInputEmail1">ID TIKET</label>

                  <?php
                  if($now != $date){

                    ?>
                  <input type="text" name="edukasi" class="form-control" id="exampleInputEmail1" value="<?php echo $abc;?>" readonly>
                  <?php 
                }
                  else{
                    ?>
                    <input type="text" name="edukasi" class="form-control" id="exampleInputEmail1"  value="<?php echo $kodeEdukasi;?>" readonly>
                    <?php
                  }
                  ?>
                </div>
                 
         <!--        <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Orang</label>
                  <input type="number" name="jml_orang" class="form-control" id="exampleInputPassword1" placeholder="Jumlah Orang" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong!')" oninput="setCustomValidity('')">
                </div>
               
                -->
              </div>
              <!-- /.box-body -->
                
              <div class="box-footer">
                <button type="submit" name="parkir" class="btn btn-primary">Tiket Masuk</button>
              </div>
            </form>
          </div>



        </div>
    
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

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
    $id_edukasi = $_POST['edukasi'];
    $jml_orang = "1";
    $biayaorang = $jml_orang*4000;
    $date = date('Y-m-d');
    $time = date('H:i:sa');
   
    $sql = "INSERT INTO tb_edukasi (id_edukasi,id_user,jml_orang,total,tanggal,jam) VALUES ('$id_edukasi','$id_user','1','$biayaorang','$date','$time')";
    $query = mysqli_query($connect, $sql);

    if($query){
       echo "<script>window.location='new_edukasi.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

}

?>