<?php

$mulai_tanam = '2016-01-19';

$tanggal_pupuk = array(-1, 14, 30, 45);

$tanggal_mulai_tanam = strtotime($mulai_tanam);
//$tanggal_pupuk_H_min1 = strtotime('-1 day', $tanggal_mulai_tanam);
//$tanggal_pupuk_H_14 = strtotime('14 day', $tanggal_mulai_tanam);
//$tanggal_pupuk_H_30 = strtotime('30 day', $tanggal_mulai_tanam);
//$tanggal_pupuk_H_45 = strtotime('45 day', $tanggal_mulai_tanam);
//$tanggal_panen = strtotime('90 day', $tanggal_mulai_tanam);

echo "<table border=1>";
echo "<tr>";
echo "<td style=\"width:200px\">Tanggal</td><td style=\"width:400px\">Deskripsi</td>";
echo "</tr>";
for ($i = -1; $i <= 90; $i++) {
    $tanggal = strtotime($i . ' day', $tanggal_mulai_tanam);
    if (in_array($i, $tanggal_pupuk)) {
        echo "<tr>";
        echo "<td>" . date('d F Y', $tanggal) . "</td><td>" . "Tanggal Pupuk H" . ($i < 0 ? $i : "+" . $i) . "</td>";
        echo "</tr>";
    } else 
    if ($i == 0) {
        echo "<tr>";
        echo "<td>" . date('d F Y', $tanggal) . "</td><td>" . "Tanggal Mulai Tanam" . "</td>";
        echo "</tr>";
    } else 
    if ($i == 90) {
        echo "<tr>";
        echo "<td>" . date('d F Y', $tanggal) . "</td><td>" . "Tanggal Panen H+90" . "</td>";
        echo "</tr>";
    }
    
    $result = file_get_contents("http://www.moonsighting.org.uk/scripts/hijri.js?return=json&date=".date('Y-m-d', $tanggal));
    $json = json_decode($result);
    $int = filter_var($json->islamic[1], FILTER_SANITIZE_NUMBER_INT);
//    var_dump($json->islamic);
//    var_dump($int);
//    break;
    if ($int == 13) {
        echo "<tr>";
        echo "<td>" . date('d F Y', $tanggal) . "</td><td>" . "Tanggal Semprot Pestisida (13 Bulan Hijriah)" . "</td>";
        echo "</tr>";
    }
}
//echo "<tr>";
//echo "<td>" . date('d F Y', $tanggal_pupuk_H_min1) . "</td><td>" . "Tanggal Pupuk H-1" . "</td>";
//echo "</tr>";
//echo "<tr>";
//echo "<td>" . date('d F Y', $tanggal_pupuk_H_14) . "</td><td>" . "Tanggal Pupuk H+14" . "</td>";
//echo "</tr>";
//echo "<tr>";
//echo "<td>" . date('d F Y', $tanggal_pupuk_H_30) . "</td><td>" . "Tanggal Pupuk H+30" . "</td>";
//echo "</tr>";
//echo "<tr>";
//echo "<td>" . date('d F Y', $tanggal_pupuk_H_45) . "</td><td>" . "Tanggal Pupuk H+45" . "</td>";
//echo "</tr>";
//echo "<tr>";
//echo "<td>" . date('d F Y', $tanggal_panen) . "</td><td>" . "Tanggal Panen H+90" . "</td>";
//echo "</tr>";
echo "</table>";
