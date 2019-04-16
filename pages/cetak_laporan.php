<?php
// memanggil library FPDF
require('../fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'LAPORAN',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'BULANAN',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0);
$pdf->Cell(25,6,'BLN',1,0);
$pdf->Cell(27,6,'Orang',1,0);
$pdf->Cell(25,6,'Sepeda',1,1);
$no =1;
$pdf->SetFont('Arial','',10);

include '../config.php';
$mahasiswa = mysqli_query($connect, "select * from tb_parkir");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(10,6,$no++,1,0);
    $pdf->Cell(20,6,$row['plat'],1,0);
    $pdf->Cell(85,6,$row['jenis'],1,0);
    $pdf->Cell(27,6,$row['jml_orang'],1,0);
    $pdf->Cell(25,6,$row['biaya_orang'],1,1); 
}

$pdf->Output();
?>