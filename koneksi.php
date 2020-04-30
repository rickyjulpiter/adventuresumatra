<?php

// $svr_name = "localhost";
// $user = "root";
// $password = "";
// $dbname = "ravelinotravel";


$svr_name = "localhost";
$user = "u4502442_ravelinotravel";
$password = "HB1~LE#fJhN@";
$dbname = "u4502442_ravelinotravel";


$koneksi = mysqli_connect($svr_name, $user, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
