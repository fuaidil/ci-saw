-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2023 at 12:49 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci-saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `kode_kriteria` varchar(5) NOT NULL,
  `nama_kriteria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_bobot` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nilai_bobot` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_alternatif`
--

CREATE TABLE `data_alternatif` (
  `id_alternatif` int NOT NULL,
  `nama_barang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `C1` int NOT NULL,
  `C2` int NOT NULL,
  `C3` int NOT NULL,
  `C4` int NOT NULL,
  `C5` int NOT NULL,
  `C6` int NOT NULL,
  `C7` int NOT NULL,
  `C8` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_alternatif`
--

INSERT INTO `data_alternatif` (`id_alternatif`, `nama_barang`, `C1`, `C2`, `C3`, `C4`, `C5`, `C6`, `C7`, `C8`) VALUES
(1, ' Xiaomi Redmi 4', 1000000, 13, 3, 32, 8, 3600, 4, 181),
(2, ' Samsung J5 Pro', 2000000, 20, 4, 64, 8, 3200, 4, 152),
(3, ' Samsung A10', 1600000, 13, 4, 64, 8, 4000, 4, 181),
(4, ' Oppo F7', 1500000, 24, 4, 64, 8, 3000, 4, 139),
(5, ' Xiaomi Note 5', 900000, 13, 3, 32, 8, 4230, 4, 168),
(6, ' Lenovo K5 Plus', 1900000, 13, 3, 16, 8, 3000, 4, 150),
(7, ' Oppo F1 Plus', 2500000, 24, 4, 32, 8, 3200, 4, 140),
(8, ' Oppo A5 ', 1600000, 24, 4, 64, 8, 4000, 4, 140),
(9, ' Samsung Galaxy A20', 1200000, 20, 3, 64, 8, 3600, 4, 180),
(10, ' Samsung Galaxy A10', 800000, 20, 3, 32, 8, 4000, 4, 180);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_usaha`
--

CREATE TABLE `jenis_usaha` (
  `kode_jenis_usaha` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_usaha`
--

INSERT INTO `jenis_usaha` (`kode_jenis_usaha`, `nama`) VALUES
('JU001', 'Apotek'),
('JU002', 'Bengkel'),
('JU003', 'Bengkel Motor'),
('JU004', 'Barang Campuran'),
('JU005', 'Cellular'),
('JU006', 'Jual Kayu Bangunan'),
('JU007', 'Penjahitan'),
('JU008', 'Perdagangan'),
('JU009', 'Toko Meubel');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kode_kriteria` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `nilai_kriteria` double NOT NULL,
  `tipe_kriteria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `nama_kriteria`, `nilai_kriteria`, `tipe_kriteria`) VALUES
('C1', 'Harga', 0.2, 'Cost'),
('C2', 'Kamera', 0.15, 'Benefit'),
('C3', 'RAM', 0.1, 'Benefit'),
('C4', 'Memori Internal', 0.1, 'Benefit'),
('C5', 'Prosesor', 0.1, 'Benefit'),
('C6', 'Baterai', 0.2, 'Benefit'),
('C7', 'Jaringan', 0.1, 'Benefit'),
('C8', 'Berat', 0.05, 'Cost');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id_mhs` int NOT NULL,
  `nim` bigint NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id_mhs`, `nim`, `nama`, `jurusan`, `alamat`) VALUES
(1, 210605110077, 'Fuaidil', 'Teknik Informatika', 'malang'),
(4, 210605110004, 'Khalif', 'Teknik Informatika', 'Bekasi'),
(7, 123, 'tes', 'Teknik Informatika', 'asd'),
(8, 333, 'Agus', 'Teknik Informatika', 'malang');

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `kode_umkm` varchar(5) NOT NULL,
  `nama_umkm` varchar(100) NOT NULL,
  `nama_pimpinan` varchar(100) NOT NULL,
  `jalan` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `jenis_usaha` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `umkm`
--

INSERT INTO `umkm` (`kode_umkm`, `nama_umkm`, `nama_pimpinan`, `jalan`, `desa`, `kecamatan`, `jenis_usaha`) VALUES
('UM001', 'Kios Lumintu', 'H. Toha Muhiddin', 'Jl. Galunggung', 'Sebani', 'Gadingrejo', 'JU004'),
('UM002', 'UD.Linggar Jati', 'Muhammad Bahrus Salim', 'Jl. Gatot Subroto 45', 'Bukir', 'Purworejo', 'JU006'),
('UM003', 'Nanda Motor', 'Rudi Santoso', 'Jl. Pattimura', 'Pohjentrek', 'Purworejo', 'JU002'),
('UM004', 'Zayaka Tailor', 'Maritza Salim', 'Jl. Mawar 78', 'Krapyak', 'Kraton', 'JU007');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD KEY `kode_kriteria` (`kode_kriteria`);

--
-- Indexes for table `data_alternatif`
--
ALTER TABLE `data_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `jenis_usaha`
--
ALTER TABLE `jenis_usaha`
  ADD PRIMARY KEY (`kode_jenis_usaha`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`kode_umkm`),
  ADD KEY `jenis_usaha` (`jenis_usaha`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_alternatif`
--
ALTER TABLE `data_alternatif`
  MODIFY `id_alternatif` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mhs` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bobot`
--
ALTER TABLE `bobot`
  ADD CONSTRAINT `bobot_ibfk_1` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode_kriteria`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `umkm`
--
ALTER TABLE `umkm`
  ADD CONSTRAINT `umkm_ibfk_1` FOREIGN KEY (`jenis_usaha`) REFERENCES `jenis_usaha` (`kode_jenis_usaha`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
