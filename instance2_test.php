<?php

$mysqli = new mysqli('localhost', 'root', 'password', 'testdb');

$query = "select now() as col1";

if ($result = $mysqli->query($query)) {

    $json['server_date'] = date('Y-m-d H:i:s');
    if ($row = $result->fetch_assoc()) {
        $json['database_date'] = $row['col1'];
    } else {
        $json['database_date'] = null;
    }
    echo "Sukses : " . json_encode($json);
    
    $result->free();

} else {
    //var_dump($result);
    echo "Gagal : " . $query;
}		

$mysqli->close();
