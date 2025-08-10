<?php
$name = "Haikal";
$host = "localhost";
$username = "root";
$password = "";
$database_name = "iotwebsite";

$connection = mysqli_connect($host, $username, $password, $database_name);
if($connection->connect_error){
    die("Connection failed: ". $connection->connect_error); 
}
$sql = "SELECT status, time FROM wifi_status ORDER BY time DESC limit 1";
$result = $connection->query($sql);
$status = 'not connected';
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $last_updt = strtotime($row['time']);
    $now = time();
    $diff = $now - $last_updt;
    if($diff < 10 && $row['status'] == 'connected'):
        $status = "connected";
    else:
        $status = "not_connected";
        if($row['status'] != 'not_connected'):
            $connection->query("INSERT INTO wifi_status(status) VALUES ('$status')");
        endif;
    endif;
}
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring App</title>
    <link rel="icon" href="asset/temperature.ico">
    <!-- Fastbootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet"
        integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!-- Fastbootstrap -->

    <!-- Icon -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <!-- Icon -->

    <!-- Jquery -->
    <script type="text/javascript" src="js/jQuery3.5.1.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() {
            $("#suhu").load("temperature.php");
            $('#kelembapan').load("humidity.php");
            $('#ketinggian').load("level.php");
        }, 500);
    });
    </script>
    <!-- Jquery -->
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-info-subtle">
        <div class="container-fluid d-flex flex-row gap-6 font-monospace">
            <img src="asset/temp.png" alt="Logo" width="36" class="d-inline-block align-text-top">
            <a class="navbar-brand" href="#" class="fst-normal text-center">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Device</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Content -->
    <div class="container text-center font-monospace">
        <div class="row mb-4 mt-4">
            <div class="col">
                <div class="card shadow-lg rounded-3">
                    <div class="card-body">
                        <h5 class="card-title h-50">Hello, <?php echo $name."!"?></h5>
                        <p id="wifiStatus" class="text-primary fw-semibol tracking wide">-</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4 mt-4">
            <div class="col">
                <div class="card shadow-lg rounded-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class='bx  bx-wifi'></i> </h5>
                        <?php if($status == "connected"): ?>
                        <p id="wifiStatus" class="text-success fw-semibold">Connected to WiFi</p>
                        <?php else: ?>
                        <p id="wifiStatus" class="text-danger fw-semibold">Not Connected to WiFi</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4 mt-4">
            <div class="col">
                <div class="card shadow-lg rounded-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class='bx  bx-thermometer'></i></h5>
                        <p id="suhu" class="text-success fw-semibold">--</p>
                        <p>C</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg rounded-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class='bx  bx-wind'></i></h5>
                        <p id="kelembapan" class="text-primary fw-semibold">--</p>
                        <p>%</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4 mt-4">
            <div class="col">
                <div class="card shadow-lg rounded-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class='bx  bx-water-drop'></i></h5>
                        <div class="progress" style="height: 20px;">
                            <div class="progress-bar bg-primary" role="progressbar" id="ketinggian"
                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5 mt-4 justify-content-center">
            <div class="col-auto">
                <div class="card shadow-sm rounded-3 p-1 d-flex align-items-center justify-content-center">
                    <div class="form-check form-switch m-0">
                        <input class="form-check-input" type="checkbox" id="darkModeSwitch" checked>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->


    <!-- Footer -->
    <div class="container my-4 align-content-end">
        <section class="">
            <!-- Footer -->
            <footer class="text-center">
                <div class="text-center p-3">
                    © 2025 Copyright:
                    <a class="font-monospace" href="https://mdbootstrap.com/">kalhaikl</a>
                </div>
            </footer>
        </section>
    </div>
    <!-- Footer -->
</body>

<!-- Dark mode -->
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const htmlElement = document.documentElement;
    const switchElement = document.getElementById('darkModeSwitch');

    // Set the default theme to dark if no setting is found in local storage
    const currentTheme = localStorage.getItem('bsTheme') || 'dark';
    htmlElement.setAttribute('data-bs-theme', currentTheme);
    switchElement.checked = currentTheme === 'dark';

    switchElement.addEventListener('change', function() {
        if (this.checked) {
            htmlElement.setAttribute('data-bs-theme', 'dark');
            localStorage.setItem('bsTheme', 'dark');
        } else {
            htmlElement.setAttribute('data-bs-theme', 'light');
            localStorage.setItem('bsTheme', 'light');
        }
    });
});
</script>
<!-- Dark mode -->

<!-- Time -->
<script>
function updateClock() {
    const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    const now = new Date();
    const day = days[now.getDay()];
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    const timeString = `${day} - ${hours}:${minutes}:${seconds}`;
    document.getElementById('wifiStatus').innerText = timeString;
}
updateClock();
setInterval(updateClock, 1000);
</script>
<!-- Time -->

</html>