<?php
error_reporting(0);
session_start();
if(empty($_SESSION['username'])){
    header('location: ../index.php');
    exit(); 
}include ('../config.php');
include('header.php');

$id_parkir = $_GET['id_parkir'];
$sqlaq = mysqli_query($connect, "SELECT * FROM tb_parkir WHERE id=$id_parkir");
$editaq = mysqli_fetch_array($sqlaq);
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
              <label class="radio-inline" for="hasil-0">
                <input type="radio" onclick="document.getElementById('plat').disabled = false;document.getElementById('jenis').disabled = false;" name="hasil" id="hasil-0" value="1" selected required>
                Berkendara
            </label> 
            <label class="radio-inline" for="hasil-1">
                <input type="radio" name="hasil" id="hasil-1" value="0"  onclick="document.getElementById('plat').disabled = true;document.getElementById('jenis').disabled = true;" required >
                Tidak Berkendara
            </label>
             

            <input value="<?php echo $_SESSION['username'];?>" name="id_user" type="hidden">
            <input value="<?php echo $editaq['id']; ?>" name="id_parkir" type="hidden">
                <div class="form-group">
                  <label for="exampleInputEmail1">No Kendaraan</label>
                  <input type="text" name="plat" id="plat" class="form-control" id="exampleInputEmail1" placeholder="No Kendaraan" value="<?php echo $editaq['plat']; ?>">
                </div>
                 <div class="form-group">
                   <label for="exampleInputPassword1">Jenis Kendaraan</label><br>
                    <select name="jenis" id="jenis" class="form-control">
                    <option value="<?php echo $editaq['jenis']; ?>"><?php echo $editaq['jenis']; ?></option>
                      <option>- Pilih Jenis Kendaraan -</option>
                      <option value="Sepeda">Sepeda</option>
                      <option value="Motor">Motor</option>
                      <option value="Mobil">Mobil</option>
                      <option value="Bus">Bus</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Orang</label>
                  <input type="number" name="jml_orang" class="form-control" id="exampleInputPassword1" placeholder="Jumlah Orang" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong!')" oninput="setCustomValidity('')" value="<?php echo $editaq['jml_orang']; ?>">
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
$sql = mysqli_query($connect, "SELECT * FROM tb_parkir order by id desc limit 1");
$data = mysqli_fetch_array($sql);

?>
          <tr><th width='130px' scope='row' style="text-align:center;">No Kendaraan</th> <th width='130px' scope='row' style="text-align:center;">Total Biaya</th></tr>
          <tr><th width='130px' scope='row' style="text-align:center;font-size: 40px;"><?php echo $data['plat'];?> </th> <th width='130px' scope='row'  style="text-align:center;font-size: 40px;"><?php echo rupiah($data['total_biaya']);?></th></tr>

        </tbody>
        </table>
        <center><p><?php echo $data['jenis'];?> / <?php echo $data['tanggal'];?></p>
        <a href="cetak_parkir.php" ><button class="btn btn-primary">Cetak</button></a><hr></center>
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
                                <a class="fa fa-fw fa-eraser" title="Hapus" href="delete_parkir.php?id_parkir=<?php echo $data['id'];?>" onclick="javascript: return confirm('Anda yakin hapus ?')"></a>
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
if(isset($_POST['parkir'])){
    $id_user = $_POST['id_user'];
    $id_parkir = $_POST['id_parkir'];

    $plat = $_POST['plat'];
    $jenis = $_POST['jenis'];
    $jml_orang = $_POST['jml_orang'];
    $biayaorang = $jml_orang*2000;
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
    $sql = "update tb_parkir set id_user='$id_user', plat='$plat',jenis='$jenis',jml_orang='$jml_orang',biaya_orang='$biayaorang',biaya_parkir='$parkir',total_biaya='$biayaparkir' where id='$id_parkir'";
   }else{
    $sql = "update tb_parkir set id_user='$id_user', plat='TIDAK BERKENDARA',jenis='TIDAK BERKENDARA',jml_orang='$jml_orang',biaya_orang='$biayaorang',biaya_parkir='$parkir',total_biaya='$biayaparkir' where id='$id_parkir'";
   }
    $query = mysqli_query($connect, $sql);

    if($query){
       echo "<script>window.alert('Data Berhasil di Simpan !')</script>";
       echo "<script>window.location='add_parkir.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

}

?>