-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 22 Agu 2021 pada 21.08
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
('BRG002', 'Spidol', 120000, 90, 'KAT001', 80000),
('BRG003', 'Pencil', 25000, 90, 'KAT001', 17000);

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
('TKL001', '2021-08-23', 'Sabrina', '0812882992', 2750000, 'admin');

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
('TMS001', '123', 'PT Supplier Termurah', '2021-08-23', 'admin', 21700000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailkeluar`
--

CREATE TABLE `tb_detailkeluar` (
  `kodetransaksi` varchar(11) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `hargabarang` int(11) NOT NULL,
  `jumlahbarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detailkeluar`
--

INSERT INTO `tb_detailkeluar` (`kodetransaksi`, `kodebarang`, `namabarang`, `hargabarang`, `jumlahbarang`) VALUES
('TKL001', 'BRG002', 'Spidol', 120000, 10),
('TKL001', 'BRG003', 'Pencil', 25000, 10),
('TKL001', 'BRG004', 'Buku', 130000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailmasuk`
--

CREATE TABLE `tb_detailmasuk` (
  `kodetransaksi` varchar(11) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `jumlahbarang` int(11) NOT NULL,
  `hargabarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detailmasuk`
--

INSERT INTO `tb_detailmasuk` (`kodetransaksi`, `kodebarang`, `namabarang`, `jumlahbarang`, `hargabarang`) VALUES
('TMS001', 'BRG002', 'Spidol', 100, 100000),
('TMS001', 'BRG003', 'Pencil', 100, 17000),
('TMS001', 'BRG004', 'Buku', 100, 100000);

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
('KAT001', 'Alat Tulis', 'Ini adalah kategori alat tulis'),
('KAT002', 'tes', 'tes');

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
  ADD PRIMARY KEY (`kodetransaksi`,`kodebarang`);

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
  ADD CONSTRAINT `tb_detailkeluar_ibfk_1` FOREIGN KEY (`kodetransaksi`) REFERENCES `tb_barangkeluar` (`kodetransaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detailmasuk`
--
ALTER TABLE `tb_detailmasuk`
  ADD CONSTRAINT `tb_detailmasuk_ibfk_2` FOREIGN KEY (`kodetransaksi`) REFERENCES `tb_barangmasuk` (`kodetransaksi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
