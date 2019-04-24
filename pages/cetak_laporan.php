<?php

include '../config.php';
include 'query.php';
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
$pdf->Cell(190,7,'BULANAN',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
// $mahasiswa1 = mysqli_query($connect, "SELECT MONTHNAME(tanggal) as bulan FROM tb_parkir group by month(tanggal)");

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0);
$pdf->Cell(15,6,'BLN',1,0);
$pdf->Cell(25,6,'ORANG',1,0);
$pdf->Cell(25,6,'SEPEDA',1,0);
$pdf->Cell(30,6,'SEPEDA MOTOR',1,0);
$pdf->Cell(25,6,'MOBIL',1,0);
$pdf->Cell(25,6,'BUS',1,0);
$pdf->Cell(40,6,'WAHANA AQUARIUM',1,0);
$pdf->Cell(43,6,'WAHANA EDUKASI AIR',1,1);

// while ($row = mysqli_fetch_array($mahasiswa1)){
//     $pdf->SetFont('Arial','B',10);
// $pdf->Cell(25,6,$row['bulan'],1,0);

// }
$no =1;
$pdf->SetFont('Arial','',10);

$mahasiswa = mysqli_query($connect, "SELECT sum(total_biaya) as total, MONTHNAME(tanggal) as bulan,jenis FROM tb_parkir group by month(tanggal)");


// while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(10,6,'1',1,0);
    $pdf->Cell(15,6,'JAN',1,0);
    $pdf->Cell(25,6,rupiah($orangjans['total']),1,0);
    $pdf->Cell(25,6,rupiah($spdjans['total']),1,0);
    $pdf->Cell(30,6,rupiah($mtrjans['total']),1,0);
    $pdf->Cell(25,6,rupiah($mbljans['total']),1,0);
    $pdf->Cell(25,6,rupiah($busjans['total']),1,0);
    $pdf->Cell(40,6,rupiah($totaqrjans['total']),1,0);
    $pdf->Cell(43,6,rupiah($totedujans['total']),1,1);

    $pdf->Cell(10,6,'2',1,0);
    $pdf->Cell(15,6,'FEB',1,0);
    $pdf->Cell(25,6,rupiah($orangfebs['total']),1,0);
    $pdf->Cell(25,6,rupiah($spdfebs['total']),1,0);
    $pdf->Cell(30,6,rupiah($mtrfebs['total']),1,0);
    $pdf->Cell(25,6,rupiah($mblfebs['total']),1,0);
    $pdf->Cell(25,6,rupiah($busfebs['total']),1,0);
    $pdf->Cell(40,6,rupiah($totaqrfebs['total']),1,0);
    $pdf->Cell(43,6,rupiah($totedufebs['total']),1,1);

    $pdf->Cell(10,6,'3',1,0);
    $pdf->Cell(15,6,'MRT',1,0);
    $pdf->Cell(25,6,rupiah($orangmars['total']),1,0);
    $pdf->Cell(25,6,rupiah($spdmars['total']),1,0);
    $pdf->Cell(30,6,rupiah($mtrmars['total']),1,0);
    $pdf->Cell(25,6,rupiah($mblmars['total']),1,0);
    $pdf->Cell(25,6,rupiah($busmars['total']),1,0);
    $pdf->Cell(40,6,rupiah($totaqrmars['total']),1,0);
    $pdf->Cell(43,6,rupiah($totedumars['total']),1,1);

    $pdf->Cell(10,6,'4',1,0);
    $pdf->Cell(15,6,'APR',1,0);
    $pdf->Cell(25,6,rupiah($orangaprs['total']),1,0);
    $pdf->Cell(25,6,rupiah($spdaprs['total']),1,0);
    $pdf->Cell(30,6,rupiah($mtraprs['total']),1,0);
    $pdf->Cell(25,6,rupiah($mblaprs['total']),1,0);
    $pdf->Cell(25,6,rupiah($busaprs['total']),1,0);
    $pdf->Cell(40,6,rupiah($totaqraprs['total']),1,0);
    $pdf->Cell(43,6,rupiah($toteduaprs['total']),1,1);

    $pdf->Cell(10,6,'5',1,0);
    $pdf->Cell(15,6,'MEI',1,0);
    $pdf->Cell(25,6,rupiah($orangmeis['total']),1,0);
    $pdf->Cell(25,6,rupiah($spdmeis['total']),1,0);
    $pdf->Cell(30,6,rupiah($mtrmeis['total']),1,0);
    $pdf->Cell(25,6,rupiah($mblmeis['total']),1,0);
    $pdf->Cell(25,6,rupiah($busmeis['total']),1,0);
    $pdf->Cell(40,6,rupiah($totaqrmeis['total']),1,0);
    $pdf->Cell(43,6,rupiah($totedumeis['total']),1,1);

    $pdf->Cell(10,6,'6',1,0);
    $pdf->Cell(15,6,'JUN',1,0);
    $pdf->Cell(25,6,rupiah($orangjuns['total']),1,0);
    $pdf->Cell(25,6,rupiah($spdjuns['total']),1,0);
    $pdf->Cell(30,6,rupiah($mtrjuns['total']),1,0);
    $pdf->Cell(25,6,rupiah($mbljuns['total']),1,0);
    $pdf->Cell(25,6,rupiah($busjuns['total']),1,0);
    $pdf->Cell(40,6,rupiah($totaqrjuns['total']),1,0);
    $pdf->Cell(43,6,rupiah($totedujuns['total']),1,1);

    $pdf->Cell(10,6,'7',1,0);
    $pdf->Cell(15,6,'JUL',1,0);
    $pdf->Cell(25,6,rupiah($orangjuls['total']),1,0);
    $pdf->Cell(25,6,rupiah($spdjuls['total']),1,0);
    $pdf->Cell(30,6,rupiah($mtrjuls['total']),1,0);
    $pdf->Cell(25,6,rupiah($mbljuls['total']),1,0);
    $pdf->Cell(25,6,rupiah($busjuls['total']),1,0);
    $pdf->Cell(40,6,rupiah($totaqrjuls['total']),1,0);
    $pdf->Cell(43,6,rupiah($totedujuls['total']),1,1);

    $pdf->Cell(10,6,'8',1,0);
    $pdf->Cell(15,6,'AGST',1,0);
    $pdf->Cell(25,6,rupiah($orangagss['total']),1,0);
    $pdf->Cell(25,6,rupiah($spdagss['total']),1,0);
    $pdf->Cell(30,6,rupiah($mtragss['total']),1,0);
    $pdf->Cell(25,6,rupiah($mblagss['total']),1,0);
    $pdf->Cell(25,6,rupiah($busagss['total']),1,0);
    $pdf->Cell(40,6,rupiah($totaqragss['total']),1,0);
    $pdf->Cell(43,6,rupiah($toteduagss['total']),1,1);

    $pdf->Cell(10,6,'9',1,0);
    $pdf->Cell(15,6,'SEPT',1,0);
    $pdf->Cell(25,6,rupiah($orangseps['total']),1,0);
    $pdf->Cell(25,6,rupiah($spdseps['total']),1,0);
    $pdf->Cell(30,6,rupiah($mtrseps['total']),1,0);
    $pdf->Cell(25,6,rupiah($mblseps['total']),1,0);
    $pdf->Cell(25,6,rupiah($busseps['total']),1,0);
    $pdf->Cell(40,6,rupiah($totaqrseps['total']),1,0);
    $pdf->Cell(43,6,rupiah($toteduseps['total']),1,1);
    
    $pdf->Cell(10,6,'10',1,0);
    $pdf->Cell(15,6,'OKT',1,0);
    $pdf->Cell(25,6,rupiah($orangokts['total']),1,0);
    $pdf->Cell(25,6,rupiah($spdokts['total']),1,0);
    $pdf->Cell(30,6,rupiah($mtrokts['total']),1,0);
    $pdf->Cell(25,6,rupiah($mblokts['total']),1,0);
    $pdf->Cell(25,6,rupiah($busokts['total']),1,0);
    $pdf->Cell(40,6,rupiah($totaqrokts['total']),1,0);
    $pdf->Cell(43,6,rupiah($toteduokts['total']),1,1);

    $pdf->Cell(10,6,'11',1,0);
    $pdf->Cell(15,6,'NOV',1,0);
    $pdf->Cell(25,6,rupiah($orangnovs['total']),1,0);
    $pdf->Cell(25,6,rupiah($spdnovs['total']),1,0);
    $pdf->Cell(30,6,rupiah($mtrnovs['total']),1,0);
    $pdf->Cell(25,6,rupiah($mblnovs['total']),1,0);
    $pdf->Cell(25,6,rupiah($busnovs['total']),1,0);
    $pdf->Cell(40,6,rupiah($totaqrnovs['total']),1,0);
    $pdf->Cell(43,6,rupiah($totedunovs['total']),1,1);

    $pdf->Cell(10,6,'12',1,0);
    $pdf->Cell(15,6,'DES',1,0);
    $pdf->Cell(25,6,rupiah($orangdess['total']),1,0);
    $pdf->Cell(25,6,rupiah($spddess['total']),1,0);
    $pdf->Cell(30,6,rupiah($mtrdess['total']),1,0);
    $pdf->Cell(25,6,rupiah($mbldess['total']),1,0);
    $pdf->Cell(25,6,rupiah($busdess['total']),1,0);
    $pdf->Cell(40,6,rupiah($totaqrdess['total']),1,0);
    $pdf->Cell(43,6,rupiah($totedudess['total']),1,1);

    $pdf->Cell(25,6,'JUMLAH',1,0);
    $pdf->Cell(25,6,rupiah($jmlorgs['total']),1,0);
    $pdf->Cell(25,6,rupiah($jmlspds['total']),1,0);
    $pdf->Cell(30,6,rupiah($jmlmtrs['total']),1,0);
    $pdf->Cell(25,6,rupiah($jmlmbls['total']),1,0);
    $pdf->Cell(25,6,rupiah($jmlbuss['total']),1,0);
    $pdf->Cell(40,6,rupiah($jmlaqrs['total']),1,0);
    $pdf->Cell(43,6,rupiah($jmledus['total']),1,1);
// }

$pdf->Output();
?>