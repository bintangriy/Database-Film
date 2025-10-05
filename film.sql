-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Okt 2025 pada 10.03
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `film`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_film`
--

CREATE TABLE `data_film` (
  `ID` int(11) NOT NULL,
  `Judul` varchar(255) DEFAULT NULL,
  `Tahun` int(4) DEFAULT NULL,
  `Rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_film`
--

INSERT INTO `data_film` (`ID`, `Judul`, `Tahun`, `Rating`) VALUES
(1000001, 'Sangkuriang', 2014, 6),
(1000002, 'Si Kancil Anak Baik', 2022, 8),
(10000021, 'Perjuangan Windah Barusadar Mencari Bendera', 2045, 10);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_film`
--
ALTER TABLE `data_film`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
