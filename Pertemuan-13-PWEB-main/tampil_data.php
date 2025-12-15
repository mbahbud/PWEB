<?php
include 'database_connection.php'; 

$sql = "SELECT * FROM siswa";
$result = $conn->query($sql);

echo "<h2>Data Siswa</h2>";
echo "<table border='1'>
<tr>
    <th>ID</th>
    <th>NIS</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>No Telepon</th>
    <th>Alamat</th>
    <th>Foto</th>
    <th>Aksi</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>" . $row["id"] . "</td>
    <td>" . $row["nis"] . "</td>
    <td>" . $row["nama"] . "</td>
    <td>" . $row["jenis_kelamin"] . "</td>
    <td>" . $row["no_telepon"] . "</td>
    <td>" . $row["alamat"] . "</td>
    <td><img src='uploads/" . $row["foto"] . "' width='100'></td>
    <td><a href='form_edit_data.php?id=" . $row["id"] . "'>Edit</a> | <a href='aksi_hapus_data.php?id=" . $row["id"] . "'>Hapus</a></td>
    </tr>";
}
echo "</table>";

$conn->close();
?>
