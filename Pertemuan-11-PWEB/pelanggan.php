<?php
include 'config.php';

$sql = "SELECT * FROM pelanggan";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Nama</th><th>Alamat</th><th>Telepon</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nama"]. "</td><td>" . $row["alamat"]. "</td><td>" . $row["telepon"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
