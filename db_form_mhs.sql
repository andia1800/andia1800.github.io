-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 12:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_form_mhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_beasiswa`
--

CREATE TABLE `tb_daftar_beasiswa` (
  `id` int(11) NOT NULL,
  `nama_mhs` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `nomorhp` varchar(225) NOT NULL,
  `semester` varchar(225) NOT NULL,
  `ipk` varchar(225) NOT NULL,
  `beasiswa` varchar(225) NOT NULL,
  `berkas` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_daftar_beasiswa`
--

INSERT INTO `tb_daftar_beasiswa` (`id`, `nama_mhs`, `email`, `nomorhp`, `semester`, `ipk`, `beasiswa`, `berkas`, `status`) VALUES
(43, 'Budi', 'budi123@gmail.com', '083153548080', '6', '3.3', 'Non-akademik', 'form disebel.png', 'belum di verifikasi'),
(44, 'Rita Andia', 'ritaandia5200@gmail.com', '083154638800', '7', '3.4', 'Akademik', 'Sertifikat_RITA ANDIA_Junior Web Developer.pdf', 'belum di verifikasi'),
(50, 'sai', 'sai001@gmail.com', '083154638800', '3', '3.2', 'Akademik', 'PRESENTASI VSGA.pdf', 'belum di verifikasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_daftar_beasiswa`
--
ALTER TABLE `tb_daftar_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_daftar_beasiswa`
--
ALTER TABLE `tb_daftar_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
