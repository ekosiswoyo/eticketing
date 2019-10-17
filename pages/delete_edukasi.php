<?php
include ('../config.php');
$id = $_GET['id_edukasi'];
$query = mysqli_query($connect,"DELETE FROM tb_edukasi WHERE id_edukasi=$id");

if($query){
       echo "<script>window.location='edukasi.php';</script>";
}else{
	echo "gagal";
}

?>

