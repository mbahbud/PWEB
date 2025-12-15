<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pelanggan = $_POST['id_pelanggan'];
    $tanggal = $_POST['tanggal'];
    $total_harga = $_POST['total_harga'];
    $status = $_POST['status'];

    $sql = "INSERT INTO transaksi (id_pelanggan, tanggal, total_harga, status) 
            VALUES ('$id_pelanggan', '$tanggal', '$total_harga', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Transaksi berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post">
    ID Pelanggan: <input type="number" name="id_pelanggan" required><br>
    Tanggal: <input type="date" name="tanggal" required><br>
    Total Harga: <input type="number" name="total_harga" required><br>
    Status: 
    <select name="status">
        <option value="Selesai">Selesai</option>
        <option value="Proses">Proses</option>
    </select><br>
    <input type="submit" value="Tambah Transaksi">
</form>
