-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Apr 2023 pada 19.03
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int(20) NOT NULL,
  `nama_akun` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `nama_akun`, `username`, `password`, `level`) VALUES
(7, 'Aditya', 'aditya', '$2y$10$5TvhYrGz6DBN1', '1'),
(10, 'Pratama', 'pratama', '$2y$10$gS09.nG6pPS8v', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `stok_barang` varchar(20) NOT NULL,
  `harga_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `stok_barang`, `harga_barang`) VALUES
(2, 'Mouse', '10', '150000'),
(4, 'Mousepad', '100', '35000'),
(9, 'Router', '5', '350000'),
(10, 'Kabel USB', '15', '15000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `nama_dokumen` varchar(50) NOT NULL,
  `surat_waralaba` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_dokumen`
--

INSERT INTO `tb_dokumen` (`id_dokumen`, `nama_dokumen`, `surat_waralaba`) VALUES
(22, 'Surat Izin Distributor Perorangan', '6425ab27786f4.jpg'),
(23, 'Surat Izin', '64259b100705a.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `id_toko`, `jumlah`, `tanggal`) VALUES
(1, 37, '30000000', '2023-03-02'),
(2, 37, '900000000', '2023-03-11'),
(3, 38, '80000000', '2023-03-04'),
(4, 38, '40000', '2023-03-04'),
(5, 40, '60000000', '2023-04-01'),
(6, 40, '50000000', '2023-02-18'),
(7, 39, '50000000', '2023-03-05'),
(9, 45, '85000000', '2023-03-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_toko`
--

CREATE TABLE `tb_toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(20) NOT NULL,
  `alamat_toko` varchar(20) NOT NULL,
  `pemilik_toko` varchar(20) NOT NULL,
  `status_toko` varchar(20) NOT NULL,
  `foto_toko` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_toko`
--

INSERT INTO `tb_toko` (`id_toko`, `nama_toko`, `alamat_toko`, `pemilik_toko`, `status_toko`, `foto_toko`) VALUES
(37, 'Alfa Bravo Komputer', 'Bekasi', 'Muhammad', 'Aktif', '64216947639fb.jpg'),
(38, 'Super Komputer', 'Jakarta', 'Hasbunallah', 'Aktif', '642169396acdb.jpg'),
(39, 'Ried Komputer', 'Tangerang', 'Aditya', 'Aktif', '6421692b7b1ea.jpg'),
(40, 'Tangerang Komputer', 'Tangerang', 'Aditya', 'Aktif', '64041ae54279f.jpg'),
(41, 'Green Computer', 'Bekasi', 'Abdullah', 'Aktif', '6422ee46ec57c.jpg'),
(45, 'Beta Komputer', 'Jakarta', 'Aditya', 'Aktif', '64258fec08aba.png'),
(47, 'Captain Computer', 'Karawang', 'Abdul', 'Aktif', '6425ab13647b1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indeks untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
