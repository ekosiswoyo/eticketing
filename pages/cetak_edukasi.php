<?php

include '../config.php';
// include 'query.php';
function rupiah($angka){
  
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
    return $hasil_rupiah;
   
  }
$sql = mysqli_query($connect, "SELECT * FROM tb_edukasi order by no_edukasi desc limit 1");
$data = mysqli_fetch_array($sql);
// memanggil library FPDF
require('../fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm',array(110,80));// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(90,7,'TIKET WAHANA EDUKASI',0,1,'C');
$pdf->Cell(90,7,'WISATA BAHARI PNPP',0,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(90,7,$data['tanggal'],0,1,'C');


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
// $mahasiswa1 = mysqli_query($connect, "SELECT MONTHNAME(tanggal) as bulan FROM tb_parkir group by month(tanggal)");

$pdf->SetFont('Arial','B',10,'C');
$pdf->Cell(40,6,'NO TIKET',0,0);
$pdf->Cell(65,6,'TOTAL BIAYA',0,1);

// while ($row = mysqli_fetch_array($mahasiswa1)){
//     $pdf->SetFont('Arial','B',10);
// $pdf->Cell(25,6,$row['bulan'],1,0);

// }
$no =1;
$pdf->SetFont('Arial','',15);


// while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(40,8,$data['id_edukasi'],0,0);
    $pdf->Cell(65,8,rupiah($data['total']),0,1);
// }

$pdf->SetFont('Arial','',10);
// mencetak string 
$pdf->Cell(90,7,'Terima Kasih Atas Kunjungan Anda',0,1,'C');
$pdf->Output();
?>