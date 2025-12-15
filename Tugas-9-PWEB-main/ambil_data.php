<?php

error_reporting(0); 
ini_set('display_errors', 0);

include 'koneksi.php';

header('Content-Type: application/json'); 

$sql = "SELECT id, nama, nim, jurusan FROM mahasiswa ORDER BY id DESC";
$result = $koneksi->query($sql);

$data_mahasiswa = [];
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data_mahasiswa[] = $row;
    }
}

$koneksi->close();

echo json_encode($data_mahasiswa);
exit;

?>