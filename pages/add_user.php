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
                <form role="form" method="post">
                  <div class="box-body">
                  
                <?php
                 
                 // mencari kode barang dengan nilai paling besar
                 $query = mysqli_query($connect,"SELECT max(id_user) as maxKode FROM tb_user");
                 $data = mysqli_fetch_array($query);
                 $kode = $data['maxKode'];
                  
                 // mengambil angka atau bilangan dalam kode anggota terbesar,
                 // dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
                 // misal 'BRG001', akan diambil '001'
                 // setelah substring bilangan diambil lantas dicasting menjadi integer
                 $noUrut = (int) substr($kode, 3, 3);
                  
                 // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                 $noUrut++;
                  
                 // membentuk kode anggota baru
                 // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
                 // misal sprintf("%03s", 12); maka akan dihasilkan '012'
                 // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
                 $char = "ID";
                 $kodeUser = $char . sprintf("%03s", $noUrut);
                 
                 ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">ID User</label>
                      <input type="text" name="id_user" class="form-control" id="exampleInputEmail1" placeholder="ID User" value="<?php echo $kodeUser;?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama User</label>
                      <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Nama User" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong!')" oninput="setCustomValidity('')"> 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong!')" oninput="setCustomValidity('')"> 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Level User</label><br>
                    <select name="level" class="form-control" required>
                      
                      <option value="Petugas Parkir">Petugas Parkir</option>
                      <option value="Petugas Wahana Edukasi">Petugas Wahana Edukasi</option>
                      <option value="Petugas Wahana Aqarium">Petugas Wahana Aqarium</option>
                      <option value="Administrator">Administrator</option>

                    </select>

                    </div>
                  
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="user" class="btn btn-primary">Submit</button>
                  </div>
                </form>
          </div>
          <!-- /.box -->
</div>
<div class="col-xs-6">
         
          <!-- /.box -->

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                <th>No</th>
                  <th>ID.User</th>
                  <th>Nama User</th>
                  <th>Level User</th>
                  <?php  if($_SESSION['level'] == "Administrator") { ?>
                  <th>Aksi</th>
                  <?php } ?>
                </tr>
                </thead>
                <tbody>
                
                <?php
                include '../config.php';
                $no=1;
                
                $query = mysqli_query($connect, "SELECT * FROM tb_user where level != 'Administrator'");
                while ($data = mysqli_fetch_array($query)) {
                ?>

                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $data['id_user'];?></td>
                  
                  <td><?php echo $data['nama_user'];?></td>
                  <td><?php echo $data['level'];?></td>
                  <?php  if($_SESSION['level'] == "Administrator") { ?>
                  <td><center>
                                <a class="fa fa-fw fa-edit" title="Ubah" href="edit_user.php?id_user=<?php echo $data['id_user'];?>"></a>
                                <a class="fa fa-fw fa-trash" title="Hapus" href="delete_user.php?id_user=<?php echo $data['id_user'];?>"></a>
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
</div>
         
          <!-- /.box -->

          
          <!-- /.box -->

         <!-- Input addon -->
          
          <!-- /.box -->
          <div class="row">
       
        <!-- /.col -->
      </div>
        </div>
        
        <!--/.col (left) -->
        <!-- right column -->
       
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>

    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php

 include('footer.php');
if(isset($_POST['user'])){
    $id_user = $_POST['id_user'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];
    $nama_user = $_POST['nama'];
    $sql = "INSERT INTO tb_user (id_user,password,level,nama_user) VALUES ('$id_user','$password','$level','$nama_user')";
    $query = mysqli_query($connect, $sql);

    if($query){
       echo "<script>window.location='add_user.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

}

?>