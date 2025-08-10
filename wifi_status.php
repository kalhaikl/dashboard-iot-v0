<?php

$host = "localhost";
$username = "root";
$password = "";
$database_name = "iotwebsite";

$connection = mysqli_connect($host, $username, $password, $database_name);
if($connection->connect_error){
    die("Connection failed: ". $connection->connect_error); 
}
$status = $_POST['status'];

if($status == 'connected' || $status == 'not connected'){
    $sql = "INSERT INTO wifi_status(status) VALUES('$status')";
    if($connection->query($sql) == TRUE){
        echo "Status updated!";
    } else {
        echo "Status failed!";
    }
} else{
    echo "Invalid status";
}
$conn->close();

?>