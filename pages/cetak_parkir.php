<?php

include '../config.php';
include 'query.php';
function rupiah($angka){
  
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
    return $hasil_rupiah;
   
  }
$parkir =  mysqli_query($connect, "SELECT * FROM tb_parkir order by id desc limit 1");
$data = mysqli_fetch_array($parkir);
// memanggil library FPDF
require('../fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'TIKET PARKIR',0,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(190,7,$data['tanggal'],0,1,'C');


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
// $mahasiswa1 = mysqli_query($connect, "SELECT MONTHNAME(tanggal) as bulan FROM tb_parkir group by month(tanggal)");

$pdf->SetFont('Arial','B',10,'C');
$pdf->Cell(60,6,'NO KENDARAAN',1,0);
$pdf->Cell(60,6,'TOTAL BIAYA',1,1);

// while ($row = mysqli_fetch_array($mahasiswa1)){
//     $pdf->SetFont('Arial','B',10);
// $pdf->Cell(25,6,$row['bulan'],1,0);

// }
$no =1;
$pdf->SetFont('Arial','',15);


// while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(60,8,$data['plat'],1,0);
    $pdf->Cell(60,8,rupiah($data['total_biaya']),1,1);
    $pdf->SetFont('Arial','',8,'C');
    $pdf->Cell(120,6,$data['jenis'],1,1);
// }

$pdf->Output();
?>