-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 08 Sep 2020 pada 03.53
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_haleyorapower`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `alamat` text NOT NULL,
  `nomorhp` varchar(13) NOT NULL,
  `level` enum('Admin','Pimpinan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`username`, `password`, `nama`, `tanggallahir`, `alamat`, `nomorhp`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2000-02-08', 'Jalan Lunjuk Jaya', '089238238292', 'Admin'),
('pimpinan', '90973652b88fe07d05a4304f0a945de8', 'Pimpinan', '1985-07-20', 'Jalan Angkatan 45 Lorong Harapan Palembang', '081298922292', 'Pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kodebarang` varchar(20) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `deskripsibarang` text NOT NULL,
  `jumlahbarang` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`kodebarang`, `namabarang`, `deskripsibarang`, `jumlahbarang`, `satuan`) VALUES
('KBR001', 'Kabel TIC 35', 'Ini adalah kabel TIC 35', 90, 'Meter'),
('KBR002', 'Sepatu Kabel AL-CU 70', 'Ini adalah sepatu kabel AL-CU 70', 90, 'Buah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailmasuk`
--

CREATE TABLE `tbl_detailmasuk` (
  `kodetransaksi` varchar(20) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `jumlahbarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detailmasuk`
--

INSERT INTO `tbl_detailmasuk` (`kodetransaksi`, `kodebarang`, `jumlahbarang`) VALUES
('TRM001', 'KBR001', 8),
('TRM001', 'KBR002', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailtransaksi`
--

CREATE TABLE `tbl_detailtransaksi` (
  `kodetransaksi` varchar(20) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `jumlahbarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detailtransaksi`
--

INSERT INTO `tbl_detailtransaksi` (`kodetransaksi`, `kodebarang`, `jumlahbarang`) VALUES
('TRS001', 'KBR001', 6),
('TRS001', 'KBR002', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_masuk`
--

CREATE TABLE `tbl_masuk` (
  `kodetransaksi` varchar(20) NOT NULL,
  `tanggaltransaksi` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomorhp` varchar(13) NOT NULL,
  `penanggungjawab` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_masuk`
--

INSERT INTO `tbl_masuk` (`kodetransaksi`, `tanggaltransaksi`, `nama`, `nomorhp`, `penanggungjawab`) VALUES
('TRM001', '2020-09-08', 'Henry Sujana', '081288239221', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `kodetransaksi` varchar(20) NOT NULL,
  `tanggaltransaksi` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomorhp` varchar(13) NOT NULL,
  `pekerjaan` text NOT NULL,
  `penanggungjawab` varchar(50) NOT NULL,
  `penyulang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`kodetransaksi`, `tanggaltransaksi`, `nama`, `nomorhp`, `pekerjaan`, `penanggungjawab`, `penyulang`) VALUES
('TRS001', '2020-09-05', 'Henry Sujana', '082182823292', 'Pemasangan Pentahanan / Tombak Baru di Tiang CO Jaring KPW 1 Titik', 'admin', 'PIRAMID');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kodebarang`);

--
-- Indeks untuk tabel `tbl_detailmasuk`
--
ALTER TABLE `tbl_detailmasuk`
  ADD PRIMARY KEY (`kodetransaksi`,`kodebarang`);

--
-- Indeks untuk tabel `tbl_detailtransaksi`
--
ALTER TABLE `tbl_detailtransaksi`
  ADD PRIMARY KEY (`kodetransaksi`,`kodebarang`);

--
-- Indeks untuk tabel `tbl_masuk`
--
ALTER TABLE `tbl_masuk`
  ADD PRIMARY KEY (`kodetransaksi`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`kodetransaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
