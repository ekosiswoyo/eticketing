<?php

include '../config.php';

$date = date('Y-m-d');
function rupiah($angka){
  
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
    return $hasil_rupiah;
   
  }
// memanggil library FPDF
require('../fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'LAPORAN',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'HARIAN',0,1,'C');
$pdf->SetFont('Arial','',9);
// $pdf->Cell(10,7,'sampai',0,0,'C');
// $pdf->Cell(20,7,$akhir,0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
// $mahasiswa1 = mysqli_query($connect, "SELECT MONTHNAME(tanggal) as bulan FROM tb_parkir group by month(tanggal)");

$pdf->SetFont('Arial','B',10);
$pdf->Cell(188,6,'Laporan Pengunjung Pelabuhan',1,1);
$pdf->Cell(10,6,'No',1,0);
$pdf->Cell(30,6,'NAMA USER',1,0);
$pdf->Cell(33,6,'JUMLAH ORANG',1,0);
$pdf->Cell(20,6,'TOTAL',1,1);

// while ($row = mysqli_fetch_array($mahasiswa1)){
//     $pdf->SetFont('Arial','B',10);
// $pdf->Cell(25,6,$row['bulan'],1,0);

// }
$no =1;
$pdf->SetFont('Arial','',10);

$parkir = mysqli_query($connect, "SELECT b.nama_user,sum(a.jml_orang) as jml_orang, sum(a.total_biaya) as total from tb_parkir a, tb_user b where tanggal='2019-07-03' and a.id_user=b.id_user group by a.id_user");
// $parkir1 = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where tanggal='$date'");
// $parkirs = mysqli_fetch_array($parkir1);
while ($parkird = mysqli_fetch_array($parkir)){
    $pdf->Cell(10,6,$no++,1,0);
    $pdf->Cell(30,6,$parkird['nama_user'],1,0);
    $pdf->Cell(45,6,$parkird['jml_orang'],1,0);
    $pdf->Cell(20,6,$parkird['total'],1,1);
}

// ========================

$pdf->SetFont('Arial','B',10);
$pdf->Cell(188,6,'Laporan Pengunjung Wisata Aquarium',1,1);
$pdf->Cell(10,6,'No',1,0);
$pdf->Cell(30,6,'NAMA USER',1,0);
$pdf->Cell(45,6,'NO.TIKET',1,0);
$pdf->Cell(48,6,'JUMLAH PENGUNJUNG',1,0);
$pdf->Cell(20,6,'TANGGAL',1,0);
$pdf->Cell(35,6,'TOTAL BIAYA',1,1);

// while ($row = mysqli_fetch_array($mahasiswa1)){
//     $pdf->SetFont('Arial','B',10);
// $pdf->Cell(25,6,$row['bulan'],1,0);

// }
$no =1;
$pdf->SetFont('Arial','',10);

$sql = mysqli_query($connect, "SELECT * from tb_aquarium a, tb_user b where tanggal='$date' and a.id_user=b.id_user");
$query = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where tanggal='$date'");
$jmlorgs = mysqli_fetch_array($query);
while ($row = mysqli_fetch_array($sql)){
    $pdf->Cell(10,6,$no++,1,0);
    $pdf->Cell(30,6,$row['nama_user'],1,0);
    $pdf->Cell(45,6,$row['id_aquarium'],1,0);
    $pdf->Cell(48,6,$row['jml_orang'],1,0);
    $pdf->Cell(20,6,$row['tanggal'],1,0);
    $pdf->Cell(35,6,rupiah($row['total']),1,1);
}
$pdf->Cell(153,6,'Total',1,0);
$pdf->Cell(35,6,rupiah($jmlorgs['total']),1,1);
$pdf->Cell(110,6,'',0,1);

// ========================

$pdf->SetFont('Arial','B',10);
$pdf->Cell(188,6,'Laporan Wisata Edukasi',1,1);
$pdf->Cell(10,6,'No',1,0);
$pdf->Cell(30,6,'NAMA USER',1,0);
$pdf->Cell(45,6,'NO.TIKET',1,0);
$pdf->Cell(48,6,'JUMLAH PENGUNJUNG',1,0);
$pdf->Cell(20,6,'TANGGAL',1,0);
$pdf->Cell(35,6,'JUMLAH HARGA',1,1);


// while ($row = mysqli_fetch_array($mahasiswa1)){
//     $pdf->SetFont('Arial','B',10);
// $pdf->Cell(25,6,$row['bulan'],1,0);

// }
$no =1;
$pdf->SetFont('Arial','',10);

$sql = mysqli_query($connect, "SELECT * from tb_edukasi a, tb_user b where tanggal='$date' and a.id_user=b.id_user");
$query = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where tanggal='$date'");
$jmlorgs = mysqli_fetch_array($query);
while ($row = mysqli_fetch_array($sql)){
    $pdf->Cell(10,6,$no++,1,0);
    $pdf->Cell(30,6,$row['nama_user'],1,0);
    $pdf->Cell(45,6,$row['id_edukasi'],1,0);
    $pdf->Cell(48,6,$row['jml_orang'],1,0);
    $pdf->Cell(20,6,$row['tanggal'],1,0);
    $pdf->Cell(35,6,rupiah($row['total']),1,1);
}
$pdf->Cell(153,6,'Total',1,0);
$pdf->Cell(35,6,rupiah($jmlorgs['total']),1,1);



$pdf->Output();
?>