<?php
$host = "sql12.freesqldatabase.com";
$user = "sql12804591";
$pass = "-------";
$db = "sql12804591";

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>