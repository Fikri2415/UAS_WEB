<?php
$host = "mariadb"; // ini harus sama dengan service name di docker-compose.yml
$user = "user";     // sama kayak MYSQL_USER
$pass = "userpass"; // sama kayak MYSQL_PASSWORD
$db   = "studio_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
