<?php
include 'config.php';

$successMessage = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $sql = "INSERT INTO pelanggan (nama, alamat, telepon) VALUES ('$nama', '$alamat', '$telepon')";

    if ($conn->query($sql) === TRUE) {
        $successMessage = 'Pelanggan berhasil ditambahkan!';
    } else {
        $errorMessage = 'Error: ' . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #45a049;
        }

        .success-notification {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 20px;
            font-weight: bold;
            display: none;
        }

        .success-notification.show {
            display: block;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Tambah Pelanggan</h1>

        <?php if (!empty($successMessage)): ?>
            <div class="success-notification show">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br>
            
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required><br>
            
            <label for="telepon">Telepon:</label>
            <input type="text" id="telepon" name="telepon" required><br>

            <input type="submit" value="Tambah Pelanggan">
        </form>

        <a href="index.php">Kembali ke halaman utama</a>
    </div>

</body>
</html>

<?php
$conn->close();
?>
