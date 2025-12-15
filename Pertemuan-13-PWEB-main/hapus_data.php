<?php
include 'database_connection.php';

$id = $_GET['id']; 

$sql = "DELETE FROM siswa WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus.";
    header("Location: tampil_data.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
