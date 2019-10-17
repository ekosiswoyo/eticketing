<?php
include ('../config.php');
$id = $_GET['id_user'];
$query = mysqli_query($connect,"DELETE FROM tb_user WHERE id_user='$id'");

if($query){
       echo "<script>window.location='add_user.php';</script>";
}else{
	echo "gagal";
}

?>

