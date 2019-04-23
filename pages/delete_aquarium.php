<?php
include ('../config.php');
$id = $_GET['id_aquarium'];
$query = mysqli_query($connect,"DELETE FROM tb_aquarium WHERE id_aquarium=$id");

if($query){
       echo "<script>window.location='add_aquarium.php';</script>";
}else{
	echo "gagal";
}

?>

