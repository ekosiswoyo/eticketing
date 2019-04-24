<?php
error_reporting(0);
session_start();
if(empty($_SESSION['username'])){
    header('location: ../index.php');
    exit(); 
}include ('../config.php');
include('header.php');

$id_aquarium = $_GET['id_aquarium'];
$sqlaq = mysqli_query($connect, "SELECT * FROM tb_aquarium WHERE id_aquarium=$id_aquarium");
$editaq = mysqli_fetch_array($sqlaq);
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
               

                       <input value="<?php echo $_SESSION['username'];?>" name="id_user" type="hidden">

                <div class="form-group">
                  <label for="exampleInputEmail1">ID TIKET</label>
                  <input type="text" name="aquarium" class="form-control" id="exampleInputEmail1" placeholder="No Kendaraan" value="<?php echo $editaq['id_aquarium']; ?>" readonly>
                </div>
                 
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Orang</label>
                  <input type="number" name="jml_orang" class="form-control" id="exampleInputPassword1" placeholder="Jumlah Orang" value="<?php echo $editaq['jml_orang']; ?>" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong!')" oninput="setCustomValidity('')"> 
                </div>
               
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Submit</button>
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
          $sql = mysqli_query($connect, "SELECT * FROM tb_aquarium order by id_aquarium desc limit 1");
          $data = mysqli_fetch_array($sql);

          ?>
          <tr><th width='130px' scope='row' style="text-align:center;">NO. TIKET</th> <th width='130px' scope='row' style="text-align:center;">Total Biaya</th></tr>
          <tr><th width='130px' scope='row' style="text-align:center;font-size: 40px;"><?php echo $data['id_aquarium'];?> </th> <th width='130px' scope='row'  style="text-align:center;font-size: 40px;"><?php echo rupiah($data['total']);?></th></tr>

        </tbody>
        </table>
       
        <center><p>Jumlah Pengunjung <?php echo $data['jml_orang'];?> Orang</p><p>Tanggal <?php echo $data['tanggal'];?></p>
 <a href="cetak_aquarium.php" ><button class="btn btn-primary">Cetak</button></a><hr></center>
  
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
                  <th>Aksi</th>
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
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
 
}
if(isset($_POST['update'])){
  
  $id_user = $_POST['id_user'];
    $id_aquarium = $_POST['aquarium'];
    $jml_orang = $_POST['jml_orang'];
    $biayaorang = $jml_orang*4000;
    $sql = "update tb_aquarium set jml_orang='$jml_orang',total='$biayaorang' where id_aquarium='$id_aquarium'";
    $query = mysqli_query($connect, $sql);

    if($query){
       echo "<script>window.location='add_aquarium.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

}

?>
