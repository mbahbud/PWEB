<?php

include 'koneksi.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nama = $koneksi->real_escape_string($_POST['nama']);
    $nim = $koneksi->real_escape_string($_POST['nim']);
    $jurusan = $koneksi->real_escape_string($_POST['jurusan']);

    $sql = "INSERT INTO mahasiswa (nama, nim, jurusan) VALUES (?, ?, ?)";
    $stmt = $koneksi->prepare($sql);

    $stmt->bind_param("sss", $nama, $nim, $jurusan);

    if ($stmt->execute()) {
        $response = ['status' => 'success', 'message' => 'Mahasiswa berhasil didaftarkan!'];
    } else {
        $response = ['status' => 'error', 'message' => 'Pendaftaran gagal: ' . $stmt->error];
    }

    $stmt->close();
    $koneksi->close();

    echo json_encode($response);
    exit;
}

?>