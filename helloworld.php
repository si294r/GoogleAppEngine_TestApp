<?php

echo 'Hello, world!1';
echo '<br/>';

$arr = [];

for ($i=1; $i<=1; $i++) {
	
	// The Socket API will be enabled for this application once billing has been enabled in the admin console
	// MySQL server has gone away in ..
	// Sukses setelah billing diaktifkan - 2016-03-07 21:28
	// $mysqli = new mysqli(null, 'alegrium', 'alegrium80889293', 'billionaire_dev', null, '/cloudsql/billionaire-1181:data');
	
	$mysqli = new mysqli(null, 'usertest', 'password', 'testdb', null, '/cloudsql/test-app-124310:testapp');
	// $mysqli = new mysqli(null, 'root', '', '', null, '/cloudsql/test-app-124310:testapp');
	$arr[$i] = $mysqli;

	// Error Server 500
	// $mysqli = new mysqli('173.194.252.243', 'alegrium', 'alegrium80889293', 'billionaire_dev');  

	$query = "select now() as col$i";

	if ($result = $mysqli->query($query)) {
		echo "Sukses : " . $query . "<br>";
	} else {
		var_dump($result);
		echo "Gagal : " . $query . "<br>";
	}		
}

for ($i=1; $i<=1; $i++) {
	$mysqli = $arr[$i];
	$mysqli->close();
}
