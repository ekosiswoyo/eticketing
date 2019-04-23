<?php
error_reporting(0);
session_start();
if(empty($_SESSION['username'])){
    header('location: ../index.php');
    exit(); 
}include ('../config.php');
// $id = $_GET['id_sekolah'];
// $sql = mysqli_query($connect, "SELECT * FROM profil WHERE id_sekolah='1'");
// $data = mysqli_fetch_array($sql);
// echo $data['nama'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>eTicketing | Ubah Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
<div class="login-logo">
    <a href="index2.html">SI<b>TICKETING</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Ubah Password</p>

    <form action="" method="post">
    <div class="form-group has-feedback">
        <input type="password" class="form-control" name="lama" placeholder="Password Lama">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="baru" placeholder="Password Baru">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="konfirmasi" placeholder="Konfirmasi Password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
       
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="ubah" class="btn btn-primary btn-block btn-flat">Ubah</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
<?php
	//mengatasi error notice dan warning
	//error ini biasa muncul jika dijalankan di localhost, jika online tidak ada masalah
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	
	//koneksi ke database

	//proses jika tombol rubah di klik
	if(isset($_POST['ubah'])){
		//membuat variabel untuk menyimpan data inputan yang di isikan di form
		$lama			= $_POST['lama'];
		$baru			= $_POST['baru'];
		$konfirmasi	= $_POST['konfirmasi'];
		
		//cek dahulu ke database dengan query SELECT
		//kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
		//encrypt -> md5($password_lama)
		$password_lama	= md5($lama);
		$cek 			= mysqli_query($connect, "SELECT * FROM tb_user WHERE password='$password_lama'");
		
		if($cek->num_rows){
			//kondisi ini jika password lama yang dimasukkan sama dengan yang ada di database
			//membuat kondisi minimal password adalah 5 karakter
			if(strlen($baru) >= 5){
				//jika password baru sudah 5 atau lebih, maka lanjut ke bawah
				//membuat kondisi jika password baru harus sama dengan konfirmasi password
				if($baru == $konfirmasi){
					//jika semua kondisi sudah benar, maka melakukan update kedatabase
					//query UPDATE SET password = encrypt md5 password_baru
					//kondisi WHERE id user = session id pada saat login, maka yang di ubah hanya user dengan id tersebut
					$password_baru 	= md5($baru);
					$id_user 		= $_SESSION['username']; //ini dari session saat login
					
					$update 		=  mysqli_query($connect, "UPDATE tb_user SET password='$password_baru' WHERE id_user='$id_user'");
					if($update){
						//kondisi jika proses query UPDATE berhasil
						echo "<script>window.alert('Password Berhasil di Ubah')</script>";
                        echo "<script>window.location='../index.php';</script>";
					}else{
						//kondisi jika proses query gagal
                        echo "<script>window.alert('Gagal mengubah password')</script>";

					}					
				}else{
					//kondisi jika password baru beda dengan konfirmasi password
                    echo "<script>window.alert('Konfirmasi password tidak cocok')</script>";
				}
			}else{
				//kondisi jika password baru yang dimasukkan kurang dari 5 karakter
                echo "<script>window.alert('Minimal 5 Karakter')</script>";
			}
		}else{
			//kondisi jika password lama tidak cocok dengan data yang ada di database
            echo "<script>window.alert('Password lama tidak cocok')</script>";

		}
	}
	?>