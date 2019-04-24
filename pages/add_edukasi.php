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
        <div class="col-md-6">
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
                $query = mysqli_query($connect,"SELECT max(id_edukasi) as maxKode FROM tb_edukasi");
                $data = mysqli_fetch_array($query);
                $kodeEdukasi = $data['maxKode'];
                 
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
                
                ?>
                 <input value="<?php echo $_SESSION['username'];?>" name="id_user" type="hidden">
                <div class="form-group">
                  <label for="exampleInputEmail1">ID TIKET</label>
                  <input type="text" name="edukasi" class="form-control" id="exampleInputEmail1" placeholder="No Kendaraan" value="<?php echo $kodeEdukasi;?>" readonly>
                </div>
                 
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Orang</label>
                  <input type="number" name="jml_orang" class="form-control" id="exampleInputPassword1" placeholder="Jumlah Orang">
                </div>
               
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="parkir" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>



        </div>
         <div class="col-md-6">
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
          $sql = mysqli_query($connect, "SELECT * FROM tb_edukasi order by id_edukasi desc limit 1");
          $data = mysqli_fetch_array($sql);

          ?>
          <tr><th width='130px' scope='row' style="text-align:center;">NO. TIKET</th> <th width='130px' scope='row' style="text-align:center;">Total Biaya</th></tr>
          <tr><th width='130px' scope='row' style="text-align:center;font-size: 40px;"><?php echo $data['id_edukasi'];?> </th> <th width='130px' scope='row'  style="text-align:center;font-size: 40px;"><?php echo rupiah($data['total']);?></th></tr>

        </tbody>
        </table>
        <center><p>Jumlah Pengunjung <?php echo $data['jml_orang'];?> Orang</p><p>Tanggal <?php echo $data['tanggal'];?></p></center>
        <a href="cetak_edukasi.php" ><button class="btn btn-primary">Cetak</button></a><hr>
        </center>
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
              <h3 class="box-title">Data Jumlah Pengunjung Wahana Edukasi Pelabuhan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                <th>No</th>
                  <th>No. TIKET</th>
                  <th>Jumlah Pengunjung</th>
                  <th>Total Biaya</th>
                  <th>Tanggal</th>
                  <?php  if($_SESSION['level'] == "Administrator") { ?>
                  <th>Aksi</th>
                  <?php } ?>
                </tr>
                </thead>
                <tbody>
                
                <?php
                include '../config.php';
                $no = 1;
                $query = mysqli_query($connect, "SELECT * FROM tb_edukasi ORDER BY id_edukasi DESC");
                while ($data = mysqli_fetch_array($query)) {
                ?>

                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $data['id_edukasi'];?></td>
                  <td><?php echo $data['jml_orang'];?>
                  </td>
                  <td><?php echo rupiah($data['total']);?></td>
                  <td><?php echo $data['tanggal'];?></td>
                  <?php  if($_SESSION['level'] == "Administrator") { ?>
                  <td><center>
                                <a class='fa fa-fw fa-edit' title='Ubah' href='edit_edukasi.php?id_edukasi="<?php echo $data['id_edukasi'];?>"'></a>
                                <a class='fa fa-fw fa-eraser' title='Hapus' href='delete_edukasi.php?id_edukasi="<?php echo $data['id_edukasi'];?>"'></a>
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

<?php

include 'footer.php';
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
 
}
if(isset($_POST['parkir'])){
  
  $id_user = $_POST['id_user'];
    $id_edukasi = $_POST['edukasi'];
    $jml_orang = $_POST['jml_orang'];
    $biayaorang = $jml_orang*4000;
    $date = date('Y-m-d H:i:s');
   
    $sql = "INSERT INTO tb_edukasi (id_edukasi,id_user,jml_orang,total,tanggal) VALUES ('$id_edukasi','$id_user','$jml_orang','$biayaorang','$date')";
    $query = mysqli_query($connect, $sql);

    if($query){
       echo "<script>window.location='add_edukasi.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

}

?>