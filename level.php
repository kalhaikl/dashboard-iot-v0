<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "IoTwebsite";

$connection = mysqli_connect($host, $username, $password, $database);

$sql = mysqli_query($connection, "SELECT * FROM monitoring1 order by id desc");

$data = mysqli_fetch_array($sql);
$ketinggian = $data['ketinggian'];

if($ketinggian== "") $ketinggian = 0;
echo "<script>
document.getElementById('ketinggian').style.width='{$ketinggian}%';
document.getElementById('ketinggian').setAttribute('aria-valuenow', '{$ketinggian}');
</script>";
?>