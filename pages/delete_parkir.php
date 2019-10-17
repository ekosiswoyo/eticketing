<?php
include ('../config.php');
$id = $_GET['id_parkir'];
$query = mysqli_query($connect,"DELETE FROM tb_parkir WHERE id=$id")  or die();

if($query){
       echo "<script>window.location='parkir.php';</script>";
}else{
	echo "gagal";
}

?>

