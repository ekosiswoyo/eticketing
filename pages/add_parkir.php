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
            <!-- <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div> -->
            <!-- /.box-header -->
            <!-- form start -->
            <form action="" method="post">
              <div class="box-body">
              <label class="radio-inline" for="hasil-0">
                <input type="radio" onclick="document.getElementById('plat').disabled = false;document.getElementById('jenis').disabled = false;" name="hasil" id="hasil-0" value="1" checked="checked" required>
                Berkendara
            </label> 
            <label class="radio-inline" for="hasil-1">
                <input type="radio" name="hasil" id="hasil-1" value="0"  onclick="document.getElementById('plat').disabled = true;document.getElementById('jenis').disabled = true;" required >
                Tidak Berkendara
            </label>
             

            <input value="<?php echo $_SESSION['username'];?>" name="id_user" type="hidden">
                <div class="form-group">
                  <label for="exampleInputEmail1">No Kendaraan</label>
                  <input type="text" name="plat" id="plat" class="form-control" id="exampleInputEmail1" placeholder="No Kendaraan" required>
                </div>
                 <div class="form-group">
                   <label for="exampleInputPassword1">Jenis Kendaraan</label><br>
                    <select required name="jenis" id="jenis" class="form-control" >
                      <option value="">- Pilih Jenis Kendaraan -</option>
                      <option value="Sepeda">Sepeda</option>
                      <option value="Motor">Motor</option>
                      <option value="Mobil">Mobil</option>
                      <option value="Bus">Bus</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Orang</label>
                  <input type="number" name="jml_orang" id="jml" class="form-control" id="exampleInputPassword1" placeholder="Jumlah Orang" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong!')" oninput="setCustomValidity('')">
                </div>
               
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="parkir" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>



        </div>
      
        <!--/.col (left) -->
        <!-- right column -->
       
        <!--/.col (right) -->
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
    }else if($jenis == 'Bus'){
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
       echo "<script>window.location='new_parkir.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }
}
}

?>