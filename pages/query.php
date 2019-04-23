<?php
include '../config.php';

// =============================== JAN ===============================
$orangjan = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=1");
$orangjans = mysqli_fetch_array($orangjan);
$spdjan = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=1 AND  jenis='Sepeda'");
$spdjans = mysqli_fetch_array($spdjan);
$mtrjan = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=1 AND  jenis='Motor'");
$mtrjans = mysqli_fetch_array($mtrjan);
$mbljan = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=1 AND  jenis='Mobil'");
$mbljans = mysqli_fetch_array($mbljan);
$busjan = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=1 AND  jenis='Bus'");
$busjans = mysqli_fetch_array($busjan);
$totaqrjan = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=1");
$totaqrjans = mysqli_fetch_array($totaqrjan);
$totedujan = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=1");
$totedujans = mysqli_fetch_array($totedujan);

// =============================== FEB ===============================

$orangfeb = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=2");
$orangfebs = mysqli_fetch_array($orangfeb);
$spdfeb = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=2 AND  jenis='Sepeda'");
$spdfebs = mysqli_fetch_array($spdfeb);
$mtrfeb = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=2 AND  jenis='Motor'");
$mtrfebs = mysqli_fetch_array($mtrfeb);
$mblfeb = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=2 AND  jenis='Mobil'");
$mblfebs = mysqli_fetch_array($mblfeb);
$busfeb = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=2 AND  jenis='Bus'");
$busfebs = mysqli_fetch_array($busfeb);
$totaqrfeb = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=2");
$totaqrfebs = mysqli_fetch_array($totaqrfeb);
$totedufeb = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=2");
$totedufebs = mysqli_fetch_array($totedufeb);

// ================================ MAR ===============================

$orangmar = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=3");
$orangmars = mysqli_fetch_array($orangmar);
$spdmar = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=3 AND  jenis='Sepeda'");
$spdmars = mysqli_fetch_array($spdmar);
$mtrmar = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=3 AND  jenis='Motor'");
$mtrmars = mysqli_fetch_array($mtrmar);
$mblmar = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=3 AND  jenis='Mobil'");
$mblmars = mysqli_fetch_array($mblmar);
$busmar = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=3 AND  jenis='Bus'");
$busmars = mysqli_fetch_array($busmar);
$totaqrmar = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=3");
$totaqrmars = mysqli_fetch_array($totaqrmar);
$totedumar = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=3");
$totedumars = mysqli_fetch_array($totedumar);

// ================================ APR ===============================

$orangapr = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=4");
$orangaprs = mysqli_fetch_array($orangapr);
$spdapr = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=4 AND  jenis='Sepeda'");
$spdaprs = mysqli_fetch_array($spdapr);
$mtrapr = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=4 AND  jenis='Motor'");
$mtraprs = mysqli_fetch_array($mtrapr);
$mblapr = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=4 AND  jenis='Mobil'");
$mblaprs = mysqli_fetch_array($mblapr);
$busapr = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=4 AND  jenis='Bus'");
$busaprs = mysqli_fetch_array($busapr);
$totaqrapr = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=4");
$totaqraprs = mysqli_fetch_array($totaqrapr);
$toteduapr = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=4");
$toteduaprs = mysqli_fetch_array($toteduapr);

// ================================ MEI ===============================

$orangmei = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=5");
$orangmeis = mysqli_fetch_array($orangmei);
$spdmei = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=5 AND  jenis='Sepeda'");
$spdmeis = mysqli_fetch_array($spdmei);
$mtrmei = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=5 AND  jenis='Motor'");
$mtrmeis = mysqli_fetch_array($mtrmei);
$mblmei = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=5 AND  jenis='Mobil'");
$mblmeis = mysqli_fetch_array($mblmei);
$busmei = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=5 AND  jenis='Bus'");
$busmeis = mysqli_fetch_array($busmei);
$totaqrmei = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=5");
$totaqrmeis = mysqli_fetch_array($totaqrmei);
$totedumei = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=5");
$totedumeis = mysqli_fetch_array($totedumei);

// ================================ JUN ===============================

$orangjun = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=6");
$orangjuns = mysqli_fetch_array($orangjun);
$spdjun = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=6 AND  jenis='Sepeda'");
$spdjuns = mysqli_fetch_array($spdjun);
$mtrjun = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=6 AND  jenis='Motor'");
$mtrjuns = mysqli_fetch_array($mtrjun);
$mbljun = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=6 AND  jenis='Mobil'");
$mbljuns = mysqli_fetch_array($mbljun);
$busjun = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=6 AND  jenis='Bus'");
$busjuns = mysqli_fetch_array($busjun);
$totaqrjun = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=6");
$totaqrjuns = mysqli_fetch_array($totaqrjun);
$totedujun = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=6");
$totedujuns = mysqli_fetch_array($totedujun);

// ================================ JUL ===============================

$orangjul = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=7");
$orangjuls = mysqli_fetch_array($orangjul);
$spdjul = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=7 AND  jenis='Sepeda'");
$spdjuls = mysqli_fetch_array($spdjul);
$mtrjul = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=7 AND  jenis='Motor'");
$mtrjuls = mysqli_fetch_array($mtrjul);
$mbljul = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=7 AND  jenis='Mobil'");
$mbljuls = mysqli_fetch_array($mbljul);
$busjul = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=7 AND  jenis='Bus'");
$busjuls = mysqli_fetch_array($busjul);
$totaqrjul = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=7");
$totaqrjuls = mysqli_fetch_array($totaqrjul);
$totedujul = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=7");
$totedujuls = mysqli_fetch_array($totedujul);

// ================================ AGS ===============================

$orangags = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=8");
$orangagss = mysqli_fetch_array($orangags);
$spdags = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=8 AND  jenis='Sepeda'");
$spdagss = mysqli_fetch_array($spdags);
$mtrags = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=8 AND  jenis='Motor'");
$mtragss = mysqli_fetch_array($mtrags);
$mblags = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=8 AND  jenis='Mobil'");
$mblagss = mysqli_fetch_array($mblags);
$busags = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=8 AND  jenis='Bus'");
$busagss = mysqli_fetch_array($busags);
$totaqrags = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=8");
$totaqragss = mysqli_fetch_array($totaqrags);
$toteduags = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=8");
$toteduagss = mysqli_fetch_array($toteduags);

// ================================ SEP ===============================

$orangsep = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=9");
$orangseps = mysqli_fetch_array($orangsep);
$spdsep = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=9 AND  jenis='Sepeda'");
$spdseps = mysqli_fetch_array($spdsep);
$mtrsep = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=9 AND  jenis='Motor'");
$mtrseps = mysqli_fetch_array($mtrsep);
$mblsep = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=9 AND  jenis='Mobil'");
$mblseps = mysqli_fetch_array($mblsep);
$bussep = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=9 AND  jenis='Bus'");
$busseps = mysqli_fetch_array($bussep);
$totaqrsep = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=9");
$totaqrseps = mysqli_fetch_array($totaqrsep);
$totedusep = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=9");
$toteduseps = mysqli_fetch_array($totedusep);

// ================================ OKT ===============================

$orangokt = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=10");
$orangokts = mysqli_fetch_array($orangokt);
$spdokt = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=10 AND  jenis='Sepeda'");
$spdokts = mysqli_fetch_array($spdokt);
$mtrokt = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=10 AND  jenis='Motor'");
$mtrokts = mysqli_fetch_array($mtrokt);
$mblokt = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=10 AND  jenis='Mobil'");
$mblokts = mysqli_fetch_array($mblokt);
$busokt = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=10 AND  jenis='Bus'");
$busokts = mysqli_fetch_array($busokt);
$totaqrokt = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=10");
$totaqrokts = mysqli_fetch_array($totaqrokt);
$toteduokt = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=10");
$toteduokts = mysqli_fetch_array($toteduokt);

// ================================ NOV ===============================

$orangnov = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=11");
$orangnovs = mysqli_fetch_array($orangnov);
$spdnov = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=11 AND  jenis='Sepeda'");
$spdnovs = mysqli_fetch_array($spdnov);
$mtrnov = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=11 AND  jenis='Motor'");
$mtrnovs = mysqli_fetch_array($mtrnov);
$mblnov = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=11 AND  jenis='Mobil'");
$mblnovs = mysqli_fetch_array($mblnov);
$busnov = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=11 AND  jenis='Bus'");
$busnovs = mysqli_fetch_array($busnov);
$totaqrnov = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=11");
$totaqrnovs = mysqli_fetch_array($totaqrnov);
$totedunov = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=11");
$totedunovs = mysqli_fetch_array($totedunov);

// ================================ DES ===============================

$orangdes = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=12");
$orangdess = mysqli_fetch_array($orangdes);
$spddes = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=12 AND  jenis='Sepeda'");
$spddess = mysqli_fetch_array($spddes);
$mtrdes = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=12 AND  jenis='Motor'");
$mtrdess = mysqli_fetch_array($mtrdes);
$mbldes = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=12 AND  jenis='Mobil'");
$mbldess = mysqli_fetch_array($mbldes);
$busdes = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where month(tanggal)=12 AND  jenis='Bus'");
$busdess = mysqli_fetch_array($busdes);
$totaqrdes = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=12");
$totaqrdess = mysqli_fetch_array($totaqrdes);
$totedudes = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=12");
$totedudess = mysqli_fetch_array($totedudes);

// ================================ JUMLAH ORANG =====================

$jmlorg = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir");
$jmlorgs = mysqli_fetch_array($jmlorg);
$jmlspd = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where  jenis='Sepeda'");
$jmlspds = mysqli_fetch_array($jmlspd);
$jmlmtr = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where jenis='Motor'");
$jmlmtrs = mysqli_fetch_array($jmlmtr);
$jmlmbl = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where jenis='Mobil'");
$jmlmbls = mysqli_fetch_array($jmlmbl);
$jmlbus = mysqli_query($connect, "SELECT sum(biaya_parkir) as total FROM tb_parkir where jenis='Bus'");
$jmlbuss = mysqli_fetch_array($jmlbus);
$jmlaqr = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium");
$jmlaqrs = mysqli_fetch_array($jmlaqr);
$jmledu = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi");
$jmledus = mysqli_fetch_array($jmledu);
