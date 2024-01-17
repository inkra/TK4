-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 17 Jan 2024 pada 15.47
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoelektronik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `Barang`
--

CREATE TABLE `Barang` (
  `IdBarang` int(11) NOT NULL,
  `NamaBarang` varchar(255) NOT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  `Satuan` varchar(50) DEFAULT NULL,
  `IdSupplier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Barang`
--

INSERT INTO `Barang` (`IdBarang`, `NamaBarang`, `Keterangan`, `Satuan`, `IdSupplier`) VALUES
(1, 'MacBook Air M1 2020', '13-inch, M1 chip, 256GB SSD', 'Unit', 1),
(2, 'Macbook Pro M1 2020', '14-inch, M1 Pro chip, 512GB SSD', 'Unit', 2),
(3, 'Macbook Pro M1 Max 2021', '16-inch, M1 Max chip, 1TB SSD', 'Unit', 3),
(4, 'Apple Magic Mouse', 'Wireless, Multi-Touch', 'Unit', 4),
(5, 'Apple AirPods', 'Pro with Active Noise Cancellation', 'Unit', 5),
(6, 'MacBook Case Accessories', 'Case accessories for MacBook', 'Unit', 6),
(7, 'MacBook Sleeve', 'Leather Sleeve for MacBook', 'Unit', 7),
(8, 'Apple Watch', 'Series 7, GPS + Cellular, 45mm', 'Unit', 8),
(9, 'iPhone 13 Pro', '128GB, Sierra Blue', 'Unit', 9),
(10, 'iPad Gen 11 GG', '12.9-inch, M1 cehip, 256GB', 'Unit', 10),
(11, 'Apple iPad PRO', 'GG', '1', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `HakAkses`
--

CREATE TABLE `HakAkses` (
  `IdAkses` int(11) NOT NULL,
  `NamaAkses` varchar(255) NOT NULL,
  `Keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `HakAkses`
--

INSERT INTO `HakAkses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES
(1, 'Administrator', 'Full access to all features'),
(2, 'Suppliers', 'Manage warehouse and barang table'),
(3, 'Customer', 'Access to pembelian table'),
(4, 'Kasir', 'Access to penjualan table'),
(5, 'Manager', 'Full access to all features but view only because just manage');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Pelanggan`
--

CREATE TABLE `Pelanggan` (
  `IdPelanggan` int(11) NOT NULL,
  `NamaPelanggan` varchar(255) DEFAULT NULL,
  `NoHpPelanggan` varchar(15) DEFAULT NULL,
  `AlamatPelanggan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Pelanggan`
--

INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `NoHpPelanggan`, `AlamatPelanggan`) VALUES
(1, 'Inkra Andini', '0811111111110', 'Jl. Jenderal Sudirman No. 1'),
(2, 'Dewi Rahayu', '082222222222', 'Jl. Pahlawan No. 2'),
(3, 'Ahmad Fauzi', '083333333333', 'Jl. Gatot Subroto No. 3'),
(4, 'Siti Nurhayati', '084444444444', 'Jl. A. Yani No. 4'),
(5, 'Iwan Santoso', '085555555555', 'Jl. Diponegoro No. 5'),
(6, 'Yuni Susanti', '086666666666', 'Jl. Imam Bonjol No. 6'),
(7, 'Arief Wijaya', '087777777777', 'Jl. Surya Kencana No. 7'),
(8, 'Ratna Sari', '088888888888', 'Jl. Merdeka No. 8'),
(9, 'Eko Prasetyo', '089999999999', 'Jl. Mangkubumi No. 9'),
(10, 'Retno Wulandari', '080000000000', 'Jl. Gajah Mada No. 10'),
(11, 'Irfan Kurniawan', '081111111112', 'Jl. Juanda No. 11'),
(12, 'Dian Puspita', '082222222223', 'Jl. Kartini No. 12'),
(13, 'Aldi Ramadhan', '083333333334', 'Jl. HOS Cokroaminoto No. 13'),
(14, 'Dina Susanti', '084444444445', 'Jl. Veteran No. 14'),
(15, 'Asep Hidayat', '085555555556', 'Jl. HR Rasuna Said No. 15'),
(16, 'Nur Fitriani', '086666666667', 'Jl. Hayam Wuruk No. 16'),
(17, 'Ferianto Nugroho', '087777777778', 'Jl. KH Agus Salim No. 17'),
(18, 'Dwi Astuti', '088888888889', 'Jl. Thamrin No. 18'),
(19, 'Yoga Prakoso', '089999999900', 'Jl. S. Parman No. 19'),
(20, 'Anisa Rahmawanto', '080000000011', 'Jl. Airlangga No. 20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Pembelian`
--

CREATE TABLE `Pembelian` (
  `IdPembelian` int(11) NOT NULL,
  `JumlahPembelian` int(11) NOT NULL,
  `HargaBeli` decimal(10,2) NOT NULL,
  `IdPengguna` int(11) DEFAULT NULL,
  `IdPelanggan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Pembelian`
--

INSERT INTO `Pembelian` (`IdPembelian`, `JumlahPembelian`, `HargaBeli`, `IdPengguna`, `IdPelanggan`) VALUES
(31, 5, '100000.00', 1, 1),
(32, 8, '150000.00', 2, 2),
(33, 10, '200000.00', 3, 3),
(34, 7, '120000.00', 1, 1),
(35, 12, '180000.00', 2, 2),
(36, 9, '160000.00', 3, 3),
(37, 6, '110000.00', 1, 1),
(38, 11, '190000.00', 2, 2),
(39, 4, '130000.00', 3, 3),
(40, 15, '250000.00', 1, 1),
(41, 8, '170000.00', 2, 2),
(42, 9, '200000.00', 3, 3),
(43, 5, '140000.00', 1, 1),
(44, 13, '220000.00', 2, 2),
(45, 7, '160000.00', 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `Pengguna`
--

CREATE TABLE `Pengguna` (
  `IdPengguna` int(11) NOT NULL,
  `NamaPengguna` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `NamaDepan` varchar(255) NOT NULL,
  `NamaBelakang` varchar(255) NOT NULL,
  `NoHP` varchar(20) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `IdAkses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Pengguna`
--

INSERT INTO `Pengguna` (`IdPengguna`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHP`, `Alamat`, `IdAkses`) VALUES
(1, 'admin1', '0192023a7bbd73250516f069df18b500', 'Sarah', 'Aulia', '081256162588', 'Jl Raya Kaligawe Km\r\n3/86, Jawa Tengah', 1),
(2, 'admin2', '0192023a7bbd73250516f069df18b500', 'Denandra', 'Putra', '081256875392', 'Jl Lodan Tmr 7, Dki\r\nJakarta', 1),
(3, 'supplier1', '49375313ae9e075247b1dada362090c5', 'Michael', 'Smith', '081298267181', 'Jl Gn Bulusaraung\r\n163, Sulawesi Selatan', 2),
(4, 'supplier2', '49375313ae9e075247b1dada362090c5', 'Leo', 'Putra', '081282767282', 'Jl Senayan Bl S/39, Dki\r\nJakarta', 2),
(5, 'customer1', 'f4ad231214cb99a985dff0f056a36242', 'Anindya', 'Oktavia', '081292778298', 'Jl Asem 1 E,\r\nDki Jakarta', 3),
(6, 'customer2', 'f4ad231214cb99a985dff0f056a36242', 'Sari', 'Putri', '081208172626', 'Jl Cikutra 149, Jawa\r\nBarat', 3),
(7, 'kasir1', 'de28f8f7998f23ab4194b51a6029416f', 'Dahlia', 'Putri', '081241628991', 'Jl Tmn Wijaya Kusuma 79,\r\nDki Jakarta', 4),
(8, 'kasir2', 'de28f8f7998f23ab4194b51a6029416f', 'Cassandra', 'Apprilia', '081299177271', 'Jl Kalasan 45-A, Dki\r\nJakarta', 4),
(9, 'manager1', '0795151defba7a4b5dfa89170de46277', 'Joko', 'Putra', '081200987278', 'Jl Kwini II 3, Jakarta', 5),
(10, 'customer3', 'f4ad231214cb99a985dff0f056a36242', 'Aulia', 'Putri', '081286159472', 'Jl Wijaya I 3 B, Dki\r\nJakarta', 3),
(11, 'customer4', '12cc15408468bd3663f4717e87acf491', 'Diandra', 'Adelia', '081282988182', 'Jl Rahayu 1 A,\r\nDki Jakarta', 3),
(12, 'customer5', '12cc15408468bd3663f4717e87acf491', 'Luftfianda', 'Ramadhan', '081282899132', 'Jl\r\nPertanian Raya, Dki Jakarta', 3),
(13, 'customer6', '12cc15408468bd3663f4717e87acf491', 'Retno', 'Citra', '081203098134', 'Jl Megawati 20 B,\r\nSumatera Utara', 3),
(14, 'customer7', '12cc15408468bd3663f4717e87acf491', 'Cahya', 'Adinda', '081282929030', 'Jl Cemara 2/7 RT\r\n001/02, Dki Jakarta', 3),
(80, 'user 1', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'users', '11', 'qq', 3),
(81, 'User 81', '2b2c3ac6fd5656c66b6349297f7c8f34', 'User', '81', '081', 'Jl,', 3),
(90, 'inkraandini', 'f4ad231214cb99a985dff0f056a36242', 'Inkra', 'Andini', '081456289021', 'Jl. Bunga Cempaka Putih, No 14A, Pasuruan', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `Penjualan`
--

CREATE TABLE `Penjualan` (
  `IdPenjualan` int(11) NOT NULL,
  `JumlahPenjualan` int(11) NOT NULL,
  `HargaJual` decimal(10,2) NOT NULL,
  `IdPengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Penjualan`
--

INSERT INTO `Penjualan` (`IdPenjualan`, `JumlahPenjualan`, `HargaJual`, `IdPengguna`) VALUES
(1, 1, '20000000.00', 7),
(2, 1, '15000000.00', 7),
(3, 2, '40000000.00', 7),
(4, 1, '12000000.00', 7),
(5, 1, '18000000.00', 7),
(6, 1, '20000000.00', 7),
(7, 1, '23000000.00', 8),
(8, 1, '24000000.00', 8),
(9, 1, '25000000.00', 8),
(10, 1, '15000000.00', 8),
(11, 1, '12000000.00', 8),
(12, 1, '25000000.00', 7),
(13, 1, '23000000.00', 7),
(14, 2, '40000000.00', 7),
(15, 1, '15000000.00', 7),
(16, 2, '30000000.00', 8),
(17, 1, '15000000.00', 8),
(18, 1, '17000000.00', 8),
(19, 1, '23000000.00', 7),
(20, 2, '18000000.00', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `Suppliers`
--

CREATE TABLE `Suppliers` (
  `IdSupplier` int(11) NOT NULL,
  `NamaSupplier` varchar(255) DEFAULT NULL,
  `NoHpSupplier` varchar(15) DEFAULT NULL,
  `AlamatSupplier` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Suppliers`
--

INSERT INTO `Suppliers` (`IdSupplier`, `NamaSupplier`, `NoHpSupplier`, `AlamatSupplier`) VALUES
(1, 'Digital Express', '093456789012', 'Jl Kb Sirih 32-34 Ged Dewan Pers, Dki Jakarta'),
(2, 'E-World Electronics', '094567890123', 'Jl Pahlawan 6, Jawa Timur'),
(3, 'Smart Gadget Solutions', '095678901234', 'Jl Bukit Dago Slt 53 A, Jawa Barat'),
(4, 'Future Innovations', '096789012345', 'Kompl Sunter Jaya Bl D-3/20, Dki Jakarta'),
(5, 'Smart Electroni', '08567890000000', 'Jl RS Fatmawati 15 Bl 4, Dki Jakarta'),
(6, 'Future Tech Solutions', '086789012345', 'Ds Jagul Ngancar 64174'),
(7, 'DigitalHub Superstore', '097890123456', 'Kompl Metro Permata Bl A-2/19, Dki Jakarta'),
(8, 'ElectroCity', '098901234567', 'Jl Margonda Raya 522, Dki Jakarta'),
(9, 'E-Commerce Electronics', '089012345678', 'Jl Banceuy 46 A, Jawa Barat'),
(10, 'Ultimate Tech Depot', '090123456789', 'Jl Kapuk Kamal Muara 20, Dki Jakarta');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `Barang`
--
ALTER TABLE `Barang`
  ADD PRIMARY KEY (`IdBarang`),
  ADD KEY `barang_IdSupplier_to_Suppliers_IdSupplier` (`IdSupplier`);

--
-- Indeks untuk tabel `HakAkses`
--
ALTER TABLE `HakAkses`
  ADD PRIMARY KEY (`IdAkses`);

--
-- Indeks untuk tabel `Pelanggan`
--
ALTER TABLE `Pelanggan`
  ADD PRIMARY KEY (`IdPelanggan`);

--
-- Indeks untuk tabel `Pembelian`
--
ALTER TABLE `Pembelian`
  ADD PRIMARY KEY (`IdPembelian`),
  ADD KEY `FK_Pembelian_Pengguna` (`IdPengguna`),
  ADD KEY `fk_Pembelian_Pelanggan` (`IdPelanggan`);

--
-- Indeks untuk tabel `Pengguna`
--
ALTER TABLE `Pengguna`
  ADD PRIMARY KEY (`IdPengguna`),
  ADD KEY `FK_Pengguna_HakAkses` (`IdAkses`);

--
-- Indeks untuk tabel `Penjualan`
--
ALTER TABLE `Penjualan`
  ADD PRIMARY KEY (`IdPenjualan`),
  ADD KEY `FK_Penjualan_Pengguna` (`IdPengguna`);

--
-- Indeks untuk tabel `Suppliers`
--
ALTER TABLE `Suppliers`
  ADD PRIMARY KEY (`IdSupplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `Pembelian`
--
ALTER TABLE `Pembelian`
  MODIFY `IdPembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `Barang`
--
ALTER TABLE `Barang`
  ADD CONSTRAINT `barang_IdSupplier_to_Suppliers_IdSupplier` FOREIGN KEY (`IdSupplier`) REFERENCES `Suppliers` (`IdSupplier`);

--
-- Ketidakleluasaan untuk tabel `Pembelian`
--
ALTER TABLE `Pembelian`
  ADD CONSTRAINT `FK_Pembelian_Pengguna` FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna` (`IdPengguna`),
  ADD CONSTRAINT `fk_Pembelian_Pelanggan` FOREIGN KEY (`IdPelanggan`) REFERENCES `Pelanggan` (`IdPelanggan`),
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna` (`IdPengguna`);

--
-- Ketidakleluasaan untuk tabel `Pengguna`
--
ALTER TABLE `Pengguna`
  ADD CONSTRAINT `FK_Pengguna_HakAkses` FOREIGN KEY (`IdAkses`) REFERENCES `HakAkses` (`IdAkses`),
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`IdAkses`) REFERENCES `HakAkses` (`IdAkses`);

--
-- Ketidakleluasaan untuk tabel `Penjualan`
--
ALTER TABLE `Penjualan`
  ADD CONSTRAINT `FK_Penjualan_Pengguna` FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna` (`IdPengguna`),
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna` (`IdPengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
