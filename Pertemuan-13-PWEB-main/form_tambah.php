<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <h2>Tambah Data Siswa</h2>
    <form action="aksi_tambah_data.php" method="POST" enctype="multipart/form-data">
        <label for="nis">NIS:</label><br>
        <input type="text" id="nis" name="nis" required><br><br>

        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label><br>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br><br>

        <label for="no_telepon">No Telepon:</label><br>
        <input type="text" id="no_telepon" name="no_telepon" required><br><br>

        <label for="alamat">Alamat:</label><br>
        <textarea id="alamat" name="alamat" required></textarea><br><br>

        <label for="foto">Foto Siswa:</label><br>
        <input type="file" id="foto" name="foto" accept="image/*" required><br><br>

        <input type="submit" value="Simpan Data">
    </form>
</body>
</html>
