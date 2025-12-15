<?php
include 'database_connection.php';

$id = $_GET['id']; // Ambil ID dari URL
$sql = "SELECT * FROM siswa WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
</head>
<body>
    <h2>Edit Data Siswa</h2>
    <form action="aksi_update_data.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">

        <label for="nis">NIS:</label><br>
        <input type="text" id="nis" name="nis" value="<?= $row['nis']; ?>" required><br><br>

        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?= $row['nama']; ?>" required><br><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label><br>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-laki" <?= $row['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
            <option value="Perempuan" <?= $row['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
        </select><br><br>

        <label for="no_telepon">No Telepon:</label><br>
        <input type="text" id="no_telepon" name="no_telepon" value="<?= $row['no_telepon']; ?>" required><br><br>

        <label for="alamat">Alamat:</label><br>
        <textarea id="alamat" name="alamat" required><?= $row['alamat']; ?></textarea><br><br>

        <label for="foto">Foto:</label><br>
        <input type="file" id="foto" name="foto" accept="image/*"><br><br>

        <input type="submit" value="Update Data">
    </form>
</body>
</html>
