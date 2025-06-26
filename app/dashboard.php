<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - Studio Musik</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }

    header {
      background-color: #1e1e2f;
      color: white;
      padding: 20px;
      text-align: center;
    }

    nav {
      display: flex;
      justify-content: space-between;
      background-color: #2c2c44;
      padding: 0 20px;
    }

    nav a {
      color: white;
      text-decoration: none;
      padding: 15px 20px;
      display: block;
    }

    nav a:hover {
      background-color: #44446b;
    }

    .login-btn {
      background-color: #4caf50;
      border-radius: 6px;
    }

    .login-btn:hover {
      background-color: #45a049;
    }

    main {
      padding: 20px;
    }

    .card {
      background-color: white;
      padding: 20px;
      margin: 10px 0;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      border-radius: 12px;
    }

    .studio, .studio-detail {
      margin-bottom: 20px;
    }

    .studio img {
      width: 150px;
      height: auto;
      border-radius: 10px;
      margin-right: 20px;
    }

    .studio-info {
      display: inline-block;
      vertical-align: top;
      max-width: calc(100% - 180px);
    }

    .btn {
      background-color: #4caf50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      margin-top: 10px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    form {
      background: white;
      padding: 20px;
      border-radius: 8px;
      width: 100%;
      max-width: 500px;
      margin: auto;
      box-shadow: 0 0 10px #ccc;
    }

    label {
      display: block;
      margin-top: 15px;
    }

    input, select {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
    }

    button[type="submit"] {
      margin-top: 20px;
      padding: 10px 15px;
      background: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
    }

  </style>
</head>
<body>

  <header>
    <h1>De'gunk a Agung</h1>
    <p>Selamat datang, <?= $_SESSION['username']; ?>!</p>
  </header>

 <nav>
  <div class="nav-left">
    <a href="#studio" onclick="showSection('studio')">Daftar Studio</a>
    <a href="#booking" onclick="showSection('booking')">Booking</a>
    <a href="penyewaan.php">Penyewaan</a> <!-- Tambahan tombol ini -->
  </div>
  <div class="nav-right">
    <a href="php/logout.php" class="login-btn">Logout</a>
  </div>
</nav>


  <main>
    <!-- Daftar Studio -->
    <section id="studio" class="card">
      <h2>Daftar Studio Musik</h2>

      <div class="studio">
        <img src="foto/images.jpeg" alt="Studio A">
        <div class="studio-info">
          <h3>Studio A</h3>
          <p>Fasilitas: Drum Set, Guitar Electrik, Bass, Ampli, Mic</p>
          <button class="btn" onclick="bookStudio('Studio A')">Booking</button>
        </div>
      </div>

      <div class="studio">
        <img src="foto/studio.jpeg" alt="Studio B">
        <div class="studio-info">
          <h3>Studio B</h3>
          <p>Fasilitas: Gitar Akustik, Ampli, Bass, Mic</p>
          <button class="btn" onclick="bookStudio('Studio B')">Booking</button>
        </div>
      </div>
    </section>

    <!-- Detail Studio -->
    <section class="card">
      <h2>Informasi Detail Studio</h2>

      <div class="studio-detail">
        <h3>Studio A</h3>
        <p><strong>Deskripsi:</strong> Cocok untuk latihan band, dilengkapi peredam & alat lengkap.</p>
        <p><strong>Harga:</strong> Rp100.000 / jam</p>
        <p><strong>Lokasi:</strong> Jl Cukang jati 62A/116 RT 05/RW01, Cibangkong, Bandung</p>
        <p><strong>Kontak:</strong> 0882-1845-8113</p>
      </div>

      <div class="studio-detail">
        <h3>Studio B</h3>
        <p><strong>Deskripsi:</strong> Ideal untuk solois atau latihan akustik. Ada piano dan sistem rekaman sederhana.</p>
        <p><strong>Harga:</strong> Rp50.000 / jam</p>
        <p><strong>Lokasi:</strong> Jl Cukang jati 62A/116 RT 05/RW01, Cibangkong, Bandung</p>
        <p><strong>Kontak:</strong> 0882-1845-8113</p>
      </div>
    </section>

    <!-- Form Booking -->
    <section id="booking" class="card" style="display: none;">
      <h2>Form Booking Studio</h2>
      <form action="php/tambah.php" method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required>
        <label>Studio:</label>
        <select name="studio">
          <option value="Studio A">Studio A</option>
          <option value="Studio B">Studio B</option>
        </select>
        <label>Tanggal:</label>
        <input type="date" name="tanggal" required>
        <label>Waktu:</label>
        <input type="text" name="waktu" placeholder="Contoh: 14:00 - 16:00" required>
        <label>Nomor Ponsel:</label>
        <input type="text" name="no_ponsel" placeholder="0812345678" required>
        <button type="submit">Simpan</button>
      </form>
    </section>
  </main>

  <script>
    function showSection(id) {
      document.getElementById('studio').style.display = 'none';
      document.getElementById('booking').style.display = 'none';
      document.getElementById(id).style.display = 'block';
    }

    function bookStudio(studioName) {
      alert('Kamu memilih booking untuk ' + studioName);
      showSection('booking');
    }
  </script>

</body>
</html>
