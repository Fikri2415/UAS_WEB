<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Penyewaan</title>
  <style>
    table { width: 80%; margin: auto; border-collapse: collapse; margin-top: 40px; }
    th, td { padding: 12px; border: 1px solid #ccc; text-align: center; }
    th { background-color: #f2f2f2; }
    .action a { margin: 0 5px; color: blue; text-decoration: none; }
  </style>
</head>
<body>
  <h2 style="text-align: center;">Daftar Penyewaan Studio</h2>
  <table>
    <thead>
      <tr>
        <th>Nama</th>
        <th>Studio</th>
        <th>Tanggal</th>
        <th>Waktu</th>
        <th>Nomor Ponsel</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
              <?php
          include 'php/config.php';
          $query = mysqli_query($conn, "SELECT * FROM penyewaan");
          while ($row = mysqli_fetch_assoc($query)) {
              echo "<tr>
                      <td>{$row['nama']}</td>
                      <td>{$row['studio']}</td>
                      <td>{$row['tanggal']}</td>
                      <td>{$row['waktu']}</td>
                      <td>{$row['no_ponsel']}</td>
                      <td>
                          <a href='edit_penyewa.php?id={$row['id']}'>Edit</a>
                          <a href='php/hapus.php?id={$row['id']}'>Hapus</a>
                      </td>
                    </tr>";
          }
          ?>
    </tbody>
  </table>
  <style>
    button { margin-top: 20px; padding: 10px 15px; background: #4CAF50; color: white; border: none; border-radius: 4px; }
  </style>
  <a href="dashboard.php"><button type="submit">Kembali</button></a>
</body>
</html>