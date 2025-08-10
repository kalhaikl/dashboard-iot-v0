<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "iotwebsite";

$connection = mysqli_connect($host, $username, $password, $database);
$suhu = $_GET['suhu'];
$kelembapan = $_GET['kelembapan'];
$ketinggian = $_GET['ketinggian'];

mysqli_query($connection, "ALTER TABLE monitoring1 AUTO_INCREMENT=1");
$save = mysqli_query($connection, "INSERT INTO monitoring1(suhu, kelembapan, ketinggian) VALUES ('$suhu', '$kelembapan', '$ketinggian')");
 

if($save){
    echo "Succesful send datas";
} else {
    echo "Unsuccesful send datas";
}
?>