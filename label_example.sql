-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2020 at 07:51 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.26-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `label_example`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(25) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `tgl_ingat_1` date DEFAULT NULL,
  `tgl_ingat_2` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `alamat`, `status`, `tgl_mulai`, `tgl_akhir`, `tgl_ingat_1`, `tgl_ingat_2`) VALUES
(3, 'Adhi Setyo Wibisono', 'Ds. Pliwetan', 'AKTIF', '2020-06-08', '2020-06-10', '2020-07-10', '2020-07-10'),
(4, 'Agus Prasetyo', 'Ds. Gesikharjo Kec. Palang', 'TIDAK AKTIF', '2020-06-08', '2020-06-20', '2020-07-20', '2020-07-20'),
(5, 'Arif Budi Kusuma', 'Ds. Bejagung', 'AKTIF', '2020-06-08', NULL, NULL, NULL),
(6, 'Anwar Adi Setiyono', 'Kel. Latsari', 'AKTIF', '2020-06-08', NULL, NULL, NULL),
(7, 'Eko Prastiyo', 'Ds. Sugiharjo', 'TIDAK AKTIF', '2020-06-08', NULL, NULL, NULL),
(8, 'Rahma Hidayatul Husna', 'Ds. Sambongrejo Kec. Merakurak Kab. Tuban', 'AKTIF', '2020-06-08', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
