<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "IoTwebsite";

$connection = mysqli_connect($host, $username, $password, $database);

$sql = mysqli_query($connection, "SELECT * FROM monitoring1 order by id desc");

$data = mysqli_fetch_array($sql);
$kelembapan = $data['kelembapan'];

if($kelembapan== "") $kelembapan = 0;
echo $kelembapan;
?>