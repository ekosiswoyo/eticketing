<?php
include '../config.php';
$tahun = $_POST['tahun'];

// =============================== JAN ===============================
$orangjan = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=1 and year(tanggal)=$tahun");
$orangjans = mysqli_fetch_array($orangjan);
$spdjan = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=1 AND  jenis='Sepeda' and year(tanggal)=$tahun");
$spdjans = mysqli_fetch_array($spdjan);
$mtrjan = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=1 AND  jenis='Motor' and year(tanggal)=$tahun");
$mtrjans = mysqli_fetch_array($mtrjan);
$mbljan = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=1 AND  jenis='Mobil' and year(tanggal)=$tahun");
$mbljans = mysqli_fetch_array($mbljan);
$busjan = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=1 AND  jenis='Bus' and year(tanggal)=$tahun");
$busjans = mysqli_fetch_array($busjan);
$totaqrjan = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=1 and year(tanggal)=$tahun");
$totaqrjans = mysqli_fetch_array($totaqrjan);
$totedujan = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=1 and year(tanggal)=$tahun");
$totedujans = mysqli_fetch_array($totedujan);

// =============================== FEB ===============================

$orangfeb = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=2 and year(tanggal)=$tahun");
$orangfebs = mysqli_fetch_array($orangfeb);
$spdfeb = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=2 AND  jenis='Sepeda' and year(tanggal)=$tahun");
$spdfebs = mysqli_fetch_array($spdfeb);
$mtrfeb = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=2 AND  jenis='Motor' and year(tanggal)=$tahun");
$mtrfebs = mysqli_fetch_array($mtrfeb);
$mblfeb = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=2 AND  jenis='Mobil' and year(tanggal)=$tahun");
$mblfebs = mysqli_fetch_array($mblfeb);
$busfeb = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=2 AND  jenis='Bus' and year(tanggal)=$tahun");
$busfebs = mysqli_fetch_array($busfeb);
$totaqrfeb = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=2 and year(tanggal)=$tahun");
$totaqrfebs = mysqli_fetch_array($totaqrfeb);
$totedufeb = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=2 and year(tanggal)=$tahun");
$totedufebs = mysqli_fetch_array($totedufeb);

// ================================ MAR ===============================

$orangmar = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=3 and year(tanggal)=$tahun");
$orangmars = mysqli_fetch_array($orangmar);
$spdmar = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=3 AND  jenis='Sepeda' and year(tanggal)=$tahun");
$spdmars = mysqli_fetch_array($spdmar);
$mtrmar = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=3 AND  jenis='Motor' and year(tanggal)=$tahun");
$mtrmars = mysqli_fetch_array($mtrmar);
$mblmar = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=3 AND  jenis='Mobil' and year(tanggal)=$tahun");
$mblmars = mysqli_fetch_array($mblmar);
$busmar = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=3 AND  jenis='Bus' and year(tanggal)=$tahun");
$busmars = mysqli_fetch_array($busmar);
$totaqrmar = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=3 and year(tanggal)=$tahun");
$totaqrmars = mysqli_fetch_array($totaqrmar);
$totedumar = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=3 and year(tanggal)=$tahun");
$totedumars = mysqli_fetch_array($totedumar);

// ================================ APR ===============================

$orangapr = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=4 and year(tanggal)=$tahun");
$orangaprs = mysqli_fetch_array($orangapr);
$spdapr = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=4 AND  jenis='Sepeda' and year(tanggal)=$tahun");
$spdaprs = mysqli_fetch_array($spdapr);
$mtrapr = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=4 AND  jenis='Motor' and year(tanggal)=$tahun");
$mtraprs = mysqli_fetch_array($mtrapr);
$mblapr = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=4 AND  jenis='Mobil' and year(tanggal)=$tahun");
$mblaprs = mysqli_fetch_array($mblapr);
$busapr = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=4 AND  jenis='Bus' and year(tanggal)=$tahun");
$busaprs = mysqli_fetch_array($busapr);
$totaqrapr = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=4 and year(tanggal)=$tahun");
$totaqraprs = mysqli_fetch_array($totaqrapr);
$toteduapr = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=4 and year(tanggal)=$tahun");
$toteduaprs = mysqli_fetch_array($toteduapr);

// ================================ MEI ===============================

$orangmei = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=5 and year(tanggal)=$tahun");
$orangmeis = mysqli_fetch_array($orangmei);
$spdmei = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=5 AND  jenis='Sepeda' and year(tanggal)=$tahun");
$spdmeis = mysqli_fetch_array($spdmei);
$mtrmei = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=5 AND  jenis='Motor' and year(tanggal)=$tahun");
$mtrmeis = mysqli_fetch_array($mtrmei);
$mblmei = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=5 AND  jenis='Mobil' and year(tanggal)=$tahun");
$mblmeis = mysqli_fetch_array($mblmei);
$busmei = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=5 AND  jenis='Bus' and year(tanggal)=$tahun");
$busmeis = mysqli_fetch_array($busmei);
$totaqrmei = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=5 and year(tanggal)=$tahun");
$totaqrmeis = mysqli_fetch_array($totaqrmei);
$totedumei = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=5 and year(tanggal)=$tahun");
$totedumeis = mysqli_fetch_array($totedumei);

// ================================ JUN ===============================

$orangjun = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=6 and year(tanggal)=$tahun");
$orangjuns = mysqli_fetch_array($orangjun);
$spdjun = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=6 AND  jenis='Sepeda' and year(tanggal)=$tahun");
$spdjuns = mysqli_fetch_array($spdjun);
$mtrjun = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=6 AND  jenis='Motor' and year(tanggal)=$tahun");
$mtrjuns = mysqli_fetch_array($mtrjun);
$mbljun = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=6 AND  jenis='Mobil' and year(tanggal)=$tahun");
$mbljuns = mysqli_fetch_array($mbljun);
$busjun = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=6 AND  jenis='Bus' and year(tanggal)=$tahun");
$busjuns = mysqli_fetch_array($busjun);
$totaqrjun = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=6 and year(tanggal)=$tahun");
$totaqrjuns = mysqli_fetch_array($totaqrjun);
$totedujun = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=6 and year(tanggal)=$tahun");
$totedujuns = mysqli_fetch_array($totedujun);

// ================================ JUL ===============================

$orangjul = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=7 and year(tanggal)=$tahun");
$orangjuls = mysqli_fetch_array($orangjul);
$spdjul = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=7 AND  jenis='Sepeda' and year(tanggal)=$tahun");
$spdjuls = mysqli_fetch_array($spdjul);
$mtrjul = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=7 AND  jenis='Motor' and year(tanggal)=$tahun");
$mtrjuls = mysqli_fetch_array($mtrjul);
$mbljul = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=7 AND  jenis='Mobil' and year(tanggal)=$tahun");
$mbljuls = mysqli_fetch_array($mbljul);
$busjul = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=7 AND  jenis='Bus' and year(tanggal)=$tahun");
$busjuls = mysqli_fetch_array($busjul);
$totaqrjul = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=7 and year(tanggal)=$tahun");
$totaqrjuls = mysqli_fetch_array($totaqrjul);
$totedujul = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=7 and year(tanggal)=$tahun");
$totedujuls = mysqli_fetch_array($totedujul);

// ================================ AGS ===============================

$orangags = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=8 and year(tanggal)=$tahun");
$orangagss = mysqli_fetch_array($orangags);
$spdags = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=8 AND  jenis='Sepeda' and year(tanggal)=$tahun");
$spdagss = mysqli_fetch_array($spdags);
$mtrags = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=8 AND  jenis='Motor' and year(tanggal)=$tahun");
$mtragss = mysqli_fetch_array($mtrags);
$mblags = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=8 AND  jenis='Mobil' and year(tanggal)=$tahun");
$mblagss = mysqli_fetch_array($mblags);
$busags = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=8 AND  jenis='Bus' and year(tanggal)=$tahun");
$busagss = mysqli_fetch_array($busags);
$totaqrags = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=8 and year(tanggal)=$tahun");
$totaqragss = mysqli_fetch_array($totaqrags);
$toteduags = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=8 and year(tanggal)=$tahun");
$toteduagss = mysqli_fetch_array($toteduags);

// ================================ SEP ===============================

$orangsep = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=9 and year(tanggal)=$tahun");
$orangseps = mysqli_fetch_array($orangsep);
$spdsep = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=9 AND  jenis='Sepeda' and year(tanggal)=$tahun");
$spdseps = mysqli_fetch_array($spdsep);
$mtrsep = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=9 AND  jenis='Motor' and year(tanggal)=$tahun");
$mtrseps = mysqli_fetch_array($mtrsep);
$mblsep = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=9 AND  jenis='Mobil' and year(tanggal)=$tahun");
$mblseps = mysqli_fetch_array($mblsep);
$bussep = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=9 AND  jenis='Bus' and year(tanggal)=$tahun");
$busseps = mysqli_fetch_array($bussep);
$totaqrsep = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=9 and year(tanggal)=$tahun");
$totaqrseps = mysqli_fetch_array($totaqrsep);
$totedusep = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=9 and year(tanggal)=$tahun");
$toteduseps = mysqli_fetch_array($totedusep);

// ================================ OKT ===============================

$orangokt = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=10 and year(tanggal)=$tahun");
$orangokts = mysqli_fetch_array($orangokt);
$spdokt = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=10 AND  jenis='Sepeda' and year(tanggal)=$tahun");
$spdokts = mysqli_fetch_array($spdokt);
$mtrokt = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=10 AND  jenis='Motor' and year(tanggal)=$tahun");
$mtrokts = mysqli_fetch_array($mtrokt);
$mblokt = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=10 AND  jenis='Mobil' and year(tanggal)=$tahun");
$mblokts = mysqli_fetch_array($mblokt);
$busokt = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=10 AND  jenis='Bus' and year(tanggal)=$tahun");
$busokts = mysqli_fetch_array($busokt);
$totaqrokt = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=10 and year(tanggal)=$tahun");
$totaqrokts = mysqli_fetch_array($totaqrokt);
$toteduokt = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=10 and year(tanggal)=$tahun");
$toteduokts = mysqli_fetch_array($toteduokt);

// ================================ NOV ===============================

$orangnov = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=11 and year(tanggal)=$tahun");
$orangnovs = mysqli_fetch_array($orangnov);
$spdnov = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=11 AND  jenis='Sepeda' and year(tanggal)=$tahun");
$spdnovs = mysqli_fetch_array($spdnov);
$mtrnov = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=11 AND  jenis='Motor' and year(tanggal)=$tahun");
$mtrnovs = mysqli_fetch_array($mtrnov);
$mblnov = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=11 AND  jenis='Mobil' and year(tanggal)=$tahun");
$mblnovs = mysqli_fetch_array($mblnov);
$busnov = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=11 AND  jenis='Bus' and year(tanggal)=$tahun");
$busnovs = mysqli_fetch_array($busnov);
$totaqrnov = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=11 and year(tanggal)=$tahun");
$totaqrnovs = mysqli_fetch_array($totaqrnov);
$totedunov = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=11 and year(tanggal)=$tahun");
$totedunovs = mysqli_fetch_array($totedunov);

// ================================ DES ===============================

$orangdes = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where month(tanggal)=12 and year(tanggal)=$tahun");
$orangdess = mysqli_fetch_array($orangdes);
$spddes = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=12 AND  jenis='Sepeda' and year(tanggal)=$tahun");
$spddess = mysqli_fetch_array($spddes);
$mtrdes = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=12 AND  jenis='Motor' and year(tanggal)=$tahun");
$mtrdess = mysqli_fetch_array($mtrdes);
$mbldes = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=12 AND  jenis='Mobil' and year(tanggal)=$tahun");
$mbldess = mysqli_fetch_array($mbldes);
$busdes = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where month(tanggal)=12 AND  jenis='Bus' and year(tanggal)=$tahun");
$busdess = mysqli_fetch_array($busdes);
$totaqrdes = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where month(tanggal)=12 and year(tanggal)=$tahun");
$totaqrdess = mysqli_fetch_array($totaqrdes);
$totedudes = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi where month(tanggal)=12 and year(tanggal)=$tahun");
$totedudess = mysqli_fetch_array($totedudes);

// ================================ JUMLAH ORANG =====================

$jmlorg = mysqli_query($connect, "SELECT sum(biaya_orang) as total FROM tb_parkir where year(tanggal)=$tahun");
$jmlorgs = mysqli_fetch_array($jmlorg);
$jmlspd = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where  jenis='Sepeda' and year(tanggal)=$tahun");
$jmlspds = mysqli_fetch_array($jmlspd);
$jmlmtr = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where jenis='Motor' and year(tanggal)=$tahun");
$jmlmtrs = mysqli_fetch_array($jmlmtr);
$jmlmbl = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where jenis='Mobil' and year(tanggal)=$tahun");
$jmlmbls = mysqli_fetch_array($jmlmbl);
$jmlbus = mysqli_query($connect, "SELECT sum(total_biaya) as total FROM tb_parkir where jenis='Bus' and year(tanggal)=$tahun");
$jmlbuss = mysqli_fetch_array($jmlbus);
$jmlaqr = mysqli_query($connect, "SELECT sum(total) as total FROM tb_aquarium where year(tanggal)=$tahun");
$jmlaqrs = mysqli_fetch_array($jmlaqr);
$jmledu = mysqli_query($connect, "SELECT sum(total) as total FROM tb_edukasi  where year(tanggal)=$tahun");
$jmledus = mysqli_fetch_array($jmledu);
