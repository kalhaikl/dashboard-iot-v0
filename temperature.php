<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "IoTwebsite";

$connection = mysqli_connect($host, $username, $password, $database);

$sql = mysqli_query($connection, "SELECT * FROM monitoring1 ORDER BY id DESC");

$data = mysqli_fetch_array($sql);
$suhu = $data['suhu'];

if($suhu == "") $suhu = 0;
echo $suhu;


?>