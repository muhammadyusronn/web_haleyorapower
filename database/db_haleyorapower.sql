-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 13 Agu 2020 pada 09.50
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
-- Database: `db_persediaanbarang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpembelian`
--

CREATE TABLE `detailpembelian` (
  `kodepembayaran` varchar(11) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `jumlahbarang` int(11) NOT NULL,
  `hargabarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailpembelian`
--

INSERT INTO `detailpembelian` (`kodepembayaran`, `kodebarang`, `jumlahbarang`, `hargabarang`) VALUES
('PBL001', 'KBR001', 200, 5000),
('PBL002', 'KBR001', 200, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `kodepembayaran` varchar(11) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `jumlahbarang` int(11) NOT NULL,
  `hargabarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailpenjualan`
--

INSERT INTO `detailpenjualan` (`kodepembayaran`, `kodebarang`, `jumlahbarang`, `hargabarang`) VALUES
('PNJ001', 'KBR001', 100, 9500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `kodepembayaran` varchar(20) NOT NULL,
  `iddistributor` int(11) NOT NULL,
  `tanggaltransaksi` date NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `penanggungjawab` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`kodepembayaran`, `iddistributor`, `tanggaltransaksi`, `pembayaran`, `penanggungjawab`) VALUES
('PBL001', 3, '2020-07-20', 1000000, 'admin'),
('PBL002', 3, '2020-07-21', 1000000, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `kodepembayaran` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `nomorhp` varchar(13) NOT NULL,
  `tanggaltransaksi` date NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `penanggungjawab` varchar(50) NOT NULL,
  `diskon` int(11) NOT NULL,
  `totalbelanja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`kodepembayaran`, `nama`, `alamat`, `nomorhp`, `tanggaltransaksi`, `pembayaran`, `penanggungjawab`, `diskon`, `totalbelanja`) VALUES
('PNJ001', 'Fransiska', 'Jalan Angkatan 45 Lorong Harapan Palembang', '082186427595', '2020-07-21', 475000, 'admin', 50, 950000);

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
  `hargabarang` int(11) NOT NULL,
  `deskripsibarang` text NOT NULL,
  `jumlahbarang` int(11) NOT NULL,
  `kodejenisbarang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`kodebarang`, `namabarang`, `hargabarang`, `deskripsibarang`, `jumlahbarang`, `kodejenisbarang`) VALUES
('KBR001', 'Beras Mantap Nian', 9500, 'Ini adalah beras mantap nian', 200, 'KAT001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_distributor`
--

CREATE TABLE `tbl_distributor` (
  `iddistributor` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `nomorhp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_distributor`
--

INSERT INTO `tbl_distributor` (`iddistributor`, `nama`, `alamat`, `nomorhp`) VALUES
(3, 'Agen Sembako Jaya', 'Jalan Angkatan 45 Lorong Harapan Palembang', '081882823921');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenisbarang`
--

CREATE TABLE `tbl_jenisbarang` (
  `kodejenisbarang` varchar(20) NOT NULL,
  `namajenisbarang` varchar(100) NOT NULL,
  `deskripsijenisbarang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jenisbarang`
--

INSERT INTO `tbl_jenisbarang` (`kodejenisbarang`, `namajenisbarang`, `deskripsijenisbarang`) VALUES
('KAT001', 'Sembako', 'Ini adalah jenis barang sembako');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailpembelian`
--
ALTER TABLE `detailpembelian`
  ADD PRIMARY KEY (`kodepembayaran`,`kodebarang`);

--
-- Indeks untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`kodepembayaran`,`kodebarang`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kodepembayaran`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kodepembayaran`);

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
-- Indeks untuk tabel `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  ADD PRIMARY KEY (`iddistributor`);

--
-- Indeks untuk tabel `tbl_jenisbarang`
--
ALTER TABLE `tbl_jenisbarang`
  ADD PRIMARY KEY (`kodejenisbarang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  MODIFY `iddistributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
