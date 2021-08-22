-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Mar 2021 pada 20.08
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_persediaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `nomorhp` varchar(13) NOT NULL,
  `level` enum('Admin','Pimpinan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`username`, `password`, `nama`, `alamat`, `nomorhp`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Sabrina', 'Jalan Lunjuk Jaya, Palembang', '082186427595', 'Admin'),
('pimpinan', '90973652b88fe07d05a4304f0a945de8', 'Pimpinan', 'Jalan Demang Lebar Daun', '08218728829', 'Pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `idbarang` varchar(20) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlahtersedia` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `hargamodal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`idbarang`, `namabarang`, `harga`, `jumlahtersedia`, `kategori`, `hargamodal`) VALUES
('BRG001', 'Pencil', 20000, 20, 'KAT001', 15000),
('BRG002', 'Spidol', 120000, 19, 'KAT001', 80000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barangkeluar`
--

CREATE TABLE `tb_barangkeluar` (
  `kodetransaksi` varchar(20) NOT NULL,
  `tanggaltransaksi` date NOT NULL,
  `konsumen` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `totalbelanja` int(11) NOT NULL,
  `penanggungjawab` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barangkeluar`
--

INSERT INTO `tb_barangkeluar` (`kodetransaksi`, `tanggaltransaksi`, `konsumen`, `kontak`, `totalbelanja`, `penanggungjawab`) VALUES
('KLR001', '2021-03-24', 'Sabrina', '08128829920', 280000, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barangmasuk`
--

CREATE TABLE `tb_barangmasuk` (
  `kodetransaksi` varchar(20) NOT NULL,
  `nonota` varchar(50) NOT NULL,
  `namasuplier` varchar(100) NOT NULL,
  `tanggaltransaksi` date NOT NULL,
  `penanggungjawab` varchar(20) NOT NULL,
  `totalbiaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barangmasuk`
--

INSERT INTO `tb_barangmasuk` (`kodetransaksi`, `nonota`, `namasuplier`, `tanggaltransaksi`, `penanggungjawab`, `totalbiaya`) VALUES
('MSK001', '09010', 'PJ Maju Jaya', '2021-03-23', 'admin', 700000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailkeluar`
--

CREATE TABLE `tb_detailkeluar` (
  `kodetransaksi` varchar(11) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `jumlahbarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detailkeluar`
--

INSERT INTO `tb_detailkeluar` (`kodetransaksi`, `kodebarang`, `jumlahbarang`) VALUES
('KLR001', 'BRG001', 2),
('KLR001', 'BRG002', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailmasuk`
--

CREATE TABLE `tb_detailmasuk` (
  `kodetransaksi` varchar(11) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `jumlahbarang` int(11) NOT NULL,
  `hargabarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detailmasuk`
--

INSERT INTO `tb_detailmasuk` (`kodetransaksi`, `kodebarang`, `jumlahbarang`, `hargabarang`) VALUES
('MSK001', 'BRG001', 10, 20000),
('MSK001', 'BRG002', 10, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `idkategori` varchar(20) NOT NULL,
  `namakategori` varchar(100) NOT NULL,
  `deskripsikategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`idkategori`, `namakategori`, `deskripsikategori`) VALUES
('KAT001', 'Alat Tulis', 'Ini adalah kategori alat tulis');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `tb_barangkeluar`
--
ALTER TABLE `tb_barangkeluar`
  ADD PRIMARY KEY (`kodetransaksi`),
  ADD KEY `penanggungjawab` (`penanggungjawab`);

--
-- Indeks untuk tabel `tb_barangmasuk`
--
ALTER TABLE `tb_barangmasuk`
  ADD PRIMARY KEY (`kodetransaksi`),
  ADD KEY `penanggungjawab` (`penanggungjawab`);

--
-- Indeks untuk tabel `tb_detailkeluar`
--
ALTER TABLE `tb_detailkeluar`
  ADD PRIMARY KEY (`kodetransaksi`,`kodebarang`),
  ADD KEY `kodebarang` (`kodebarang`);

--
-- Indeks untuk tabel `tb_detailmasuk`
--
ALTER TABLE `tb_detailmasuk`
  ADD PRIMARY KEY (`kodetransaksi`,`kodebarang`),
  ADD KEY `kodebahan` (`kodebarang`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_barangkeluar`
--
ALTER TABLE `tb_barangkeluar`
  ADD CONSTRAINT `tb_barangkeluar_ibfk_1` FOREIGN KEY (`penanggungjawab`) REFERENCES `tb_admin` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_barangmasuk`
--
ALTER TABLE `tb_barangmasuk`
  ADD CONSTRAINT `tb_barangmasuk_ibfk_1` FOREIGN KEY (`penanggungjawab`) REFERENCES `tb_admin` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detailkeluar`
--
ALTER TABLE `tb_detailkeluar`
  ADD CONSTRAINT `tb_detailkeluar_ibfk_1` FOREIGN KEY (`kodetransaksi`) REFERENCES `tb_barangkeluar` (`kodetransaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detailkeluar_ibfk_2` FOREIGN KEY (`kodebarang`) REFERENCES `tb_barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detailmasuk`
--
ALTER TABLE `tb_detailmasuk`
  ADD CONSTRAINT `tb_detailmasuk_ibfk_1` FOREIGN KEY (`kodebarang`) REFERENCES `tb_barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
