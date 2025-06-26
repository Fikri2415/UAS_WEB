<?php
include "config.php";

// Tangkap semua data dari form
$nama = $_POST['nama'];
$studio = $_POST['studio'];
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];
$no_ponsel = $_POST['no_ponsel'];

// Query insert dengan no_ponsel
$sql = "INSERT INTO penyewaan (nama, studio, tanggal, waktu, no_ponsel) 
        VALUES ('$nama', '$studio', '$tanggal', '$waktu', '$no_ponsel')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../penyewaan.php");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
