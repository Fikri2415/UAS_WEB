<?php
include "config.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM penyewaan WHERE id=$id");

header("Location: ../penyewaan.php");
?>