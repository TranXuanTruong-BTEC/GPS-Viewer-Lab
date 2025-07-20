<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ip = $_SERVER['REMOTE_ADDR'];
    $lat = $_POST['lat'] ?? 'N/A';
    $lon = $_POST['lon'] ?? 'N/A';
    $time = date("Y-m-d H:i:s");
    $map = "https://www.google.com/maps?q={$lat},{$lon}";
    $log = "=== $time | IP: $ip | Lat: $lat | Lon: $lon | Maps: $map\n";
    file_put_contents(__DIR__ . '/../../data/location.txt', $log, FILE_APPEND);
}
?>
