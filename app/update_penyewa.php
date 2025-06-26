<?php
$conn = new mysqli("mariadb", "user", "userpass", "studio_db");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id = $_POST['id'];
$nama = $_POST['nama'];
$studio = $_POST['studio'];
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];
$nomor_ponsel = $_POST['nomor_ponsel'];

$sql = "UPDATE penyewaan SET 
    nama='$nama',
    studio='$studio',
    tanggal='$tanggal',
    waktu='$waktu',
    no_ponsel='$nomor_ponsel'
    WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil diperbarui. <a href='penyewaan.php'>Kembali ke daftar</a>";
} else {
    echo "Error saat memperbarui data: " . $conn->error;
}

$conn->close();
?>
