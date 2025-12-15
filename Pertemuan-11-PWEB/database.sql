CREATE DATABASE laundry;

USE laundry;

CREATE TABLE pelanggan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    alamat VARCHAR(255),
    telepon VARCHAR(15)
);

CREATE TABLE transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pelanggan INT,
    tanggal DATE,
    total_harga DECIMAL(10, 2),
    status ENUM('Selesai', 'Proses'),
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id)
);
