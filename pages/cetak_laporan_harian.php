<?php

include '../config.php';
$tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
$dates = date('d-m-Y');
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
$pdf->Cell(270,7,'LAPORAN HARIAN',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(270,7,'WISATA BAHARI PELABUHAN PERIKANAN NUSANTARA PEKALONGAN',0,1,'C');
$pdf->Cell(270,7, $dates,0,1,'C');
$pdf->SetFont('Arial','',9);
// $pdf->Cell(10,7,'sampai',0,0,'C');
// $pdf->Cell(20,7,$akhir,0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
// $mahasiswa1 = mysqli_query($connect, "SELECT MONTHNAME(tanggal) as bulan FROM tb_parkir group by month(tanggal)");

$pdf->SetFont('Arial','B',10);
$pdf->Cell(156,6,'Laporan Kendaraan Pengunjung Pelabuhan',1,1);
$pdf->Cell(10,6,'No',1,0);
$pdf->Cell(30,6,'NAMA USER',1,0);
$pdf->Cell(45,6,'JENIS KENDARAAN',1,0);
$pdf->Cell(41,6,'JUMLAH ORANG',1,0);
$pdf->Cell(30,6,'TOTAL',1,1);

// while ($row = mysqli_fetch_array($mahasiswa1)){
//     $pdf->SetFont('Arial','B',10);
// $pdf->Cell(25,6,$row['bulan'],1,0);

// }
$no =1;
$pdf->SetFont('Arial','',10);

$parkir = mysqli_query($connect, "SELECT b.nama_user,a.jenis,sum(a.jml_orang) as jml_orang,sum(a.total_biaya) as total_biaya from tb_parkir a, tb_user b where a.tanggal='$tanggal' and a.id_user=b.id_user group by a.id_user, a.jenis");
$parkir1 = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where tanggal='$tanggal'");
$parkirs = mysqli_fetch_array($parkir1);
while ($parkird = mysqli_fetch_array($parkir)){
    $pdf->Cell(10,6,$no++,1,0);
    $pdf->Cell(30,6,$parkird['nama_user'],1,0);
    $pdf->Cell(45,6,$parkird['jenis'],1,0);
    $pdf->Cell(41,6,$parkird['jml_orang'],1,0);
    $pdf->Cell(30,6,rupiah($parkird['total_biaya']),1,1);
}

    $pdf->Cell(126,6,'TOTAL',1,0);
    $pdf->Cell(30,6,rupiah($parkirs['total']),1,1);

$pdf->Cell(110,6,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(156,6,'Laporan Pengunjung Wahana Pelabuhan Per Petugas',1,1);
$pdf->Cell(10,6,'No',1,0);
$pdf->Cell(30,6,'NAMA USER',1,0);
$pdf->Cell(45,6,'JENIS WAHANA/PARKIR',1,0);
$pdf->Cell(41,6,'JUMLAH',1,0);
$pdf->Cell(30,6,'TOTAL',1,1);

// while ($row = mysqli_fetch_array($mahasiswa1)){
//     $pdf->SetFont('Arial','B',10);
// $pdf->Cell(25,6,$row['bulan'],1,0);

// }
$no =1;
$pdf->SetFont('Arial','',10);

// $parkir = mysqli_query($connect, "SELECT b.nama_user,sum(a.jml_orang) as jml_orang, sum(a.total_biaya) as total from tb_parkir a, tb_user b where tanggal='$tanggal' and a.id_user=b.id_user group by a.id_user");
// $parkir1 = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where tanggal='$tanggal'");
// $parkirs = mysqli_fetch_array($parkir1);
// while ($parkird = mysqli_fetch_array($parkir)){
//     $pdf->Cell(10,6,$no++,1,0);
//     $pdf->Cell(30,6,$parkird['nama_user'],1,0);
//     $pdf->Cell(45,6,'PARKIR',1,0);
//     $pdf->Cell(33,6,$parkird['jml_orang'],1,0);
//     $pdf->Cell(30,6,rupiah($parkird['total']),1,1);
// }

$parkir = mysqli_query($connect, "SELECT b.nama_user,sum(a.jml_orang) as jml_orang, sum(a.total) as total from tb_aquarium a, tb_user b where a.tanggal='$tanggal' and a.id_user=b.id_user group by a.id_user");
$parkir1 = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where tanggal='$tanggal'");
$parkirs = mysqli_fetch_array($parkir1);
while ($parkird = mysqli_fetch_array($parkir)){
    $pdf->Cell(10,6,$no++,1,0);
    $pdf->Cell(30,6,$parkird['nama_user'],1,0);
    $pdf->Cell(45,6,'AQUARIUM',1,0);
    $pdf->Cell(41,6,$parkird['jml_orang'],1,0);
    $pdf->Cell(30,6,rupiah($parkird['total']),1,1);
}

    $pdf->Cell(126,6,'TOTAL WAHANA AQUARIUM',1,0);
    $pdf->Cell(30,6,rupiah($parkirs['total']),1,1);

$parkir = mysqli_query($connect, "SELECT b.nama_user,sum(a.jml_orang) as jml_orang, sum(a.total) as total from tb_edukasi a, tb_user b where a.tanggal='$tanggal' and a.id_user=b.id_user group by a.id_user");
$parkirred = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where tanggal='$tanggal'");
$parkirre = mysqli_fetch_array($parkirred);
while ($parkird = mysqli_fetch_array($parkir)){
    $pdf->Cell(10,6,$no++,1,0);
    $pdf->Cell(30,6,$parkird['nama_user'],1,0);
    $pdf->Cell(45,6,'EDUKASI',1,0);
    $pdf->Cell(41,6,$parkird['jml_orang'],1,0);
    $pdf->Cell(30,6,rupiah($parkird['total']),1,1);
}
 $pdf->Cell(126,6,'TOTAL WAHANA EDUKASI',1,0);
    $pdf->Cell(30,6,rupiah($parkirre['total']),1,1);
$pdf->Cell(110,6,'',0,1);
// =======
// ========================================

$pdf->SetFont('Arial','B',10);
$pdf->Cell(245,6,'Detail Laporan Pengunjung Pelabuhan',1,1);
$pdf->Cell(10,6,'No',1,0);
$pdf->Cell(30,6,'NAMA USER',1,0);
$pdf->Cell(45,6,'NO. KENDARAAN / TIKET',1,0);
$pdf->Cell(40,6,'JENIS KENDARAAN',1,0);
$pdf->Cell(45,6,'JENIS WAHANA/PARKIR',1,0);
$pdf->Cell(45,6,'JUMLAH PENGUNJUNG',1,0);
// $pdf->Cell(20,6,'TANGGAL',1,0);
$pdf->Cell(30,6,'TOTAL BIAYA',1,1);

// while ($row = mysqli_fetch_array($mahasiswa1)){
//     $pdf->SetFont('Arial','B',10);
// $pdf->Cell(25,6,$row['bulan'],1,0);

// }
$no =1;
$pdf->SetFont('Arial','',10);

$parkir = mysqli_query($connect, "SELECT * from tb_parkir a, tb_user b where a.tanggal='$tanggal' and a.id_user=b.id_user");
$parkir1 = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where tanggal='$tanggal'");
$parkirs = mysqli_fetch_array($parkir1);
while ($parkird = mysqli_fetch_array($parkir)){
    $pdf->Cell(10,6,$no++,1,0);
    $pdf->Cell(30,6,$parkird['nama_user'],1,0);
    $pdf->Cell(45,6,$parkird['plat'],1,0);
    $pdf->Cell(40,6,$parkird['jenis'],1,0);
    $pdf->Cell(45,6,'PARKIR',1,0);
    $pdf->Cell(45,6,$parkird['jml_orang'],1,0);
    // $_POST['tanggal']));
    // $pdf->Cell(20,6,date('d-m-Y',strtotime($parkird['tanggal'])),1,0);
    $pdf->Cell(30,6,rupiah($parkird['total_biaya']),1,1);
}

$sql = mysqli_query($connect, "SELECT * from tb_aquarium a, tb_user b where a.tanggal='$tanggal' and a.id_user=b.id_user");
$query = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where tanggal='$tanggal'");
$jmlorgs = mysqli_fetch_array($query);
while ($row = mysqli_fetch_array($sql)){
    $pdf->Cell(10,6,$no++,1,0);
    $pdf->Cell(30,6,$row['nama_user'],1,0);
    $pdf->Cell(45,6,$row['id_aquarium'],1,0);
    $pdf->Cell(40,6,' - ',1,0);
    $pdf->Cell(45,6,'AQUARIUM',1,0);
    $pdf->Cell(45,6,$row['jml_orang'],1,0);

    // $pdf->Cell(20,6,date('d-m-Y',strtotime($row['tanggal'])),1,0);
    $pdf->Cell(30,6,rupiah($row['total']),1,1);
}

$sql = mysqli_query($connect, "SELECT * from tb_edukasi a, tb_user b where a.tanggal='$tanggal' and a.id_user=b.id_user");
$query = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where tanggal='$tanggal'");
$jmlorgs = mysqli_fetch_array($query);
while ($row = mysqli_fetch_array($sql)){
    $pdf->Cell(10,6,$no++,1,0);
    $pdf->Cell(30,6,$row['nama_user'],1,0);
    $pdf->Cell(45,6,$row['id_edukasi'],1,0);
    $pdf->Cell(40,6,' - ',1,0);
    $pdf->Cell(45,6,'EDUKASI',1,0);
    $pdf->Cell(45,6,$row['jml_orang'],1,0);

    // $pdf->Cell(20,6,date('d-m-Y',strtotime($row['tanggal'])),1,0);
    $pdf->Cell(30,6,rupiah($row['total']),1,1);
}

$pdf->Cell(110,6,'',0,1);



$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,7,'',0,0,'R');
$pdf->Cell(100,7,'',0,0,'R');
$pdf->Cell(70,7,'Pekalongan,.....................',0,1);
$pdf->Cell(120,27,'',0,1);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(100,7,'',0,0,'R');
$pdf->Cell(100,7,'',0,0,'R');
$pdf->Cell(70,7,'Bpk. Kunaedi',0,1);
$pdf->SetFont('Arial','',9);
$pdf->Output();
?>