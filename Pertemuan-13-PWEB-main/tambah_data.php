<?php
include 'database_connection.php'; 

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_telepon = $_POST['no_telepon'];
$alamat = $_POST['alamat'];
$foto = $_FILES['foto']['name'];

$target_dir = "uploads/"; 
$target_file = $target_dir . basename($foto);

if (getimagesize($_FILES['foto']['tmp_name']) !== false) {
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO siswa (nis, nama, jenis_kelamin, no_telepon, alamat, foto)
                VALUES ('$nis', '$nama', '$jenis_kelamin', '$no_telepon', '$alamat', '$foto')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan.";
            header("Location: tampil_data.php"); 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "File is not an image.";
}

$conn->close(); 
?>
