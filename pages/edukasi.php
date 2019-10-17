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
                  <!-- <th>Jumlah Pengunjung</th> -->
                  <th>Total Biaya</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th>Aksi</th>
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
                  <!-- <td><?php echo $data['jml_orang'];?>
                  </td> -->
                  <td><?php echo rupiah($data['total']);?></td>
                  
                  <td><?php echo date('d-m-Y', strtotime($data['tanggal']));?></td>
                  
                  <td><?php echo $data['jam'];?></td>
                  <td><center>
                                <a class='fa fa-fw fa-edit' title='Ubah' href='edit_edukasi.php?id_edukasi="<?php echo $data['id_edukasi'];?>"'></a>
                                <a class='fa fa-fw fa-eraser' title='Hapus' href='delete_edukasi.php?id_edukasi="<?php echo $data['id_edukasi'];?>"' onclick="javascript: return confirm('Anda yakin hapus ?')"></a>
                              </center></td>
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


?>