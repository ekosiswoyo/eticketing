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
        Data Pengunjung Wahana Aquarium
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Wahana Aquarium</li>
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
          $sql = mysqli_query($connect, "SELECT * FROM tb_aquarium order by no_aquarium desc limit 1");
          $data = mysqli_fetch_array($sql);

          ?>
          <tr><th width='130px' scope='row' style="text-align:center;">NO. TIKET</th> <th width='130px' scope='row' style="text-align:center;">Total Biaya</th></tr>
          <tr><th width='130px' scope='row' style="text-align:center;font-size: 40px;"><?php echo $data['id_aquarium'];?> </th> <th width='130px' scope='row'  style="text-align:center;font-size: 40px;"><?php echo rupiah($data['total']);?></th></tr>

        </tbody>
        </table>

        <center><p>Jumlah Pengunjung <?php echo $data['jml_orang'];?> Orang</p><p>Tanggal <?php echo $data['tanggal'];?></p>
 <a href="add_aquarium.php" target="_blank" ><button class="btn btn-primary">Input</button></a>&nbsp;
 <a href="cetak_aquarium.php" target="_blank" ><button class="btn btn-primary">Cetak</button></a><hr></center>
  
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
              <h3 class="box-title">Data Jumlah Pengunjung Wahana Aquarium Pelabuhan</h3>
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
                  <th>Jam</th>
                  <?php  if($_SESSION['level'] == "Administrator") { ?>
                  <th>Aksi</th>
                  <?php } ?>
                </tr>
                </thead>
                <tbody>
                
                <?php
                include '../config.php';
                $no =1;
                $query = mysqli_query($connect, "SELECT * FROM tb_aquarium ORDER BY id_aquarium DESC");
                while ($data = mysqli_fetch_array($query)) {
                ?>

                <tr>
                <td><?php echo $no++;?></td>
                  <td><?php echo $data['id_aquarium'];?></td>
                  <td><?php echo $data['jml_orang'];?>
                  </td>
                  <td><?php echo rupiah($data['total']);?></td>
                  <td><?php echo $data['tanggal'];?></td>
                  <td><?php echo $data['jam'];?></td>
                  <?php  if($_SESSION['level'] == "Administrator") { ?>
                  <td><center>
                                <a class='fa fa-fw fa-edit' title='Ubah' href='edit_aquarium.php?id_aquarium="<?php echo $data['id_aquarium'];?>"'></a>
                                <a class='fa fa-fw fa-eraser' title='Hapus' href='delete_aquarium.php?id_aquarium="<?php echo $data['id_aquarium'];?>"' onclick="javascript: return confirm('Anda yakin hapus ?')"></a>
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
    $id_aquarium = $_POST['aquarium'];
    $jml_orang = $_POST['jml_orang'];
    $biayaorang = $jml_orang*4000;
    $date = date('Y-m-d');
    $time = date('H:i:sa');
    
    $sql = "INSERT INTO tb_aquarium (id_user,id_aquarium,jml_orang,total,tanggal,jam) VALUES ('$id_user','$id_aquarium','$jml_orang','$biayaorang','$date','$time')";
    $query = mysqli_query($connect, $sql);

    if($query){
       echo "<script>window.location='add_aquarium.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

}

?>