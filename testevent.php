<?php

$json = array();
$json['tanggal'] = date('Y-m-d H:i:s');

$memcache = new Memcache;

//if ($memcache->get("start") === false) {
//    $memcache->set("start", 150);
//}
//if ($memcache->get("end") === false) {
//    $memcache->set("end", 500);
//}

$start = $memcache->get("start");
$end = $memcache->get("end");

$json['event']['start'] = $start;
$json['event']['end'] = $end;

echo json_encode($json);
