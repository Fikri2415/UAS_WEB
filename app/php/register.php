<?php
include 'config.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Cek apakah username sudah ada
$sql_check = "SELECT * FROM admin WHERE username='$username'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
  echo "<script>alert('Username sudah digunakan!'); window.location.href='../register.html';</script>";
} else {
  $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='../index.html';</script>";
  } else {
    echo "Error: " . $conn->error;
  }
}

$conn->close();
?>
