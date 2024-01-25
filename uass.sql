-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2024 pada 10.32
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uass`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `uas`
--

CREATE TABLE `uas` (
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` int(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `motor` varchar(50) NOT NULL,
  `jmlh_hari` int(50) NOT NULL,
  `biaya_total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `uas`
--

INSERT INTO `uas` (`email`, `nama`, `no_hp`, `bank`, `motor`, `jmlh_hari`, `biaya_total`) VALUES
('abbbucekutttt@gmail.com', 'Abee', 2147483647, 'BCA', 'Vario', 3, 450000),
('donisurbakti2@gmail.com', 'Doni Bastanta Surbakti', 2324557, 'BRI', 'Pcx', 2, 400000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `uas`
--
ALTER TABLE `uas`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
