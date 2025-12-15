<?php
// Pastikan tidak ada spasi atau baris kosong sebelum tag <?php

// Konfigurasi koneksi database
$host = "localhost";
$user = "root";      // Ganti sesuai konfigurasi XAMPP/WAMP Anda
$pass = "";          // Ganti sesuai konfigurasi XAMPP/WAMP Anda
$db   = "informasi_siswa"; 

// Buat koneksi
$koneksi = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi ke database GAGAL: " . $koneksi->connect_error);
}

$koneksi->set_charset("utf8");
?>