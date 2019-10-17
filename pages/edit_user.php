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

$id_user = $_GET['id_user'];
$sqlus = mysqli_query($connect, "SELECT * FROM tb_user WHERE id_user='$id_user'");
$editus = mysqli_fetch_array($sqlus);
?>
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
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">ID User</label>
                      <input type="text" name="id_user" class="form-control" id="exampleInputEmail1" placeholder="ID User" value="<?php echo $editus['id_user'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama User</label>
                      <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Nama User"  value="<?php echo $editus['nama_user'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password"  value="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Level User</label><br>
                    <select name="level" class="form-control">
                      <option value="<?php echo $editus['level'];?>"><?php echo $editus['level'];?></option>
                      <option>- Pilih Level User -</option>
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
                  <th>Aksi</th>
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
                  <td><center>
                                <a class='fa fa-fw fa-edit' title='Ubah' href='edit_user.php?id_user=<?php echo $data['id_user'];?>'></a>
                                <a class='fa fa-fw fa-eraser' title='Hapus' href='delete_user.php?id_user="<?php echo $data['id_user'];?>"'></a>
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
  
  if($password == NULL){
    $sql = "update tb_user set level='$level', nama_user='$nama_user' where id_user='$id_user'";
    $query = mysqli_query($connect, $sql);
    if($query){
       echo "<script>window.location='add_user.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }
  }else{
    $sql = "update tb_user set password='$password',level='$level', nama_user='$nama_user' where id_user='$id_user'";
    $query = mysqli_query($connect, $sql);
    if($query){
       echo "<script>window.location='add_user.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }
  }

    

}

?>