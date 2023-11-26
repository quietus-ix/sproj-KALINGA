<?php

$sn = "localhost";
$dbun = "root";
$dbp = "";
$dbn = "db_kalinga";

$conn = mysqli_connect($sn, $dbun, $dbp, $dbn);

if (!$conn) {
   die("conn failed - err: " . mysqli_connect_error());
}