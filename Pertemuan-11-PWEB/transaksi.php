<?php
include 'config.php';

$sql = "SELECT transaksi.id, pelanggan.nama, transaksi.tanggal, transaksi.total_harga, transaksi.status 
        FROM transaksi 
        JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID Transaksi</th><th>Nama Pelanggan</th><th>Tanggal</th><th>Total Harga</th><th>Status</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nama"]. "</td><td>" . $row["tanggal"]. "</td><td>" . $row["total_harga"]. "</td><td>" . $row["status"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
