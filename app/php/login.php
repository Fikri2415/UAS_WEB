<?php
session_start();
include "config.php"; // koneksi database

$username = $_POST['username'];
$password = $_POST['password'];

// Cek apakah username ada
$query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
$data = mysqli_fetch_array($query);


if ($data && password_verify($password, $data['password'])) {
    $_SESSION['username'] = $data['username']; // simpan session login
    header("Location: ../dashboard.php");
    exit();
} else {
    echo "<script>alert('Login gagal! Username atau password salah.'); window.location.href = '../index.html';</script>";
}
?>
