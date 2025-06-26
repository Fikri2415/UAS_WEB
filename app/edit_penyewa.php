<?php
// Koneksi ke database
$conn = new mysqli("mariadb", "user", "userpass", "studio_db");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data penyewaan berdasarkan ID
$sql = "SELECT * FROM penyewaan WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Data tidak ditemukan!";
    exit;
}

$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Penyewaan</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 30px auto;
            width: 60%;
        }
        td, th {
            border: 1px solid #ccc;
            padding: 10px;
        }
        input[type="text"], input[type="date"], input[type="time"] {
            width: 95%;
            padding: 5px;
        }
        .btn {
            padding: 8px 16px;
            margin: 20px auto;
            background-color: #28a745;
            color: white;
            border: none;
            display: block;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Edit Data Penyewaan</h2>

<form action="update_penyewa.php" method="POST">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <table>
        <tr>
            <th>Nama</th>
            <td><input type="text" name="nama" value="<?= $data['nama'] ?>" required></td>
        </tr>
        <tr>
            <th>Studio</th>
            <td><input type="text" name="studio" value="<?= $data['studio'] ?>" required></td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td><input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required></td>
        </tr>
        <tr>
            <th>Waktu</th>
            <td><input type="time" name="waktu" value="<?= $data['waktu'] ?>" required></td>
        </tr>
        <tr>
            <th>Nomor Ponsel</th>
            <td><input type="text" name="nomor_ponsel" value="<?= $data['no_ponsel'] ?>" required></td>
        </tr>
    </table>

    <button class="btn" type="submit">Simpan Perubahan</button>
</form>

</body>
</html>
