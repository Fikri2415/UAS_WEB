<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: index.html");
  exit;
}

include 'php/config.php';

$result = $conn->query("SELECT * FROM booking ORDER BY tanggal DESC, waktu ASC");
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin - Booking Studio</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 12px 15px;
      border: 1px solid #ddd;
      text-align: center;
    }

    th {
      background-color: #00796b;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .logout {
      display: block;
      margin: 20px auto;
      width: max-content;
      padding: 10px 20px;
      background: #e53935;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      text-align: center;
    }

    .logout:hover {
      background: #c62828;
    }
  </style>
</head>
<body>

  <h1>Dashboard Admin - Data Booking Studio</h1>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Studio</th>
        <th>Tanggal</th>
        <th>Waktu</th>
        <th>No. Ponsel</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$no}</td>
                <td>{$row['nama']}</td>
                <td>{$row['studio']}</td>
                <td>{$row['tanggal']}</td>
                <td>{$row['waktu']}</td>
                <td>{$row['no_ponsel']}</td>
              </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>

  <a class="logout" href="index.html">Kembali ke Beranda</a>

</body>
</html>
