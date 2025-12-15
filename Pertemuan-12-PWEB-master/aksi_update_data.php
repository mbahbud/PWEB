<?php
include 'database_connection.php';

$id = $_POST['id'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_telepon = $_POST['no_telepon'];
$alamat = $_POST['alamat'];
$foto = $_FILES['foto']['name'];

if ($foto) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);
    move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
    $sql = "UPDATE siswa SET nis='$nis', nama='$nama', jenis_kelamin='$jenis_kelamin', no_telepon='$no_telepon', alamat='$alamat', foto='$foto' WHERE id=$id";
} else {
    $sql = "UPDATE siswa SET nis='$nis', nama='$nama', jenis_kelamin='$jenis_kelamin', no_telepon='$no_telepon', alamat='$alamat' WHERE id=$id";
}

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil diperbarui.";
    header("Location: tampil_data.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
