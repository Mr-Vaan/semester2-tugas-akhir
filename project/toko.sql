-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2022 pada 19.17
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `umur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `umur`) VALUES
(1, 'Muhammad Ivan Chriana', '19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kd_barang` varchar(15) NOT NULL,
  `nm_barang` varchar(40) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `distributor` varchar(40) NOT NULL,
  `ket` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`kd_barang`, `nm_barang`, `harga`, `stok`, `distributor`, `ket`, `foto`) VALUES
('B001', 'Indomie', 4000, 100, 'RDP55', 'ada', ''),
('B002', 'Garam', 8000, 100, 'RDP55', 'ada', ''),
('B003', 'Telur', 10000, 100, 'RDP55', 'ada', '2448-TI.PNG'),
('B004', 'Minyak', 100000, 50, 'RDP55', 'ada', '738-cirebon.png'),
('KD2755', 'Nabati Coklat', 3000, 6500, 'DIS8944', 'Ada', '2365-nabati.jpg'),
('KD3110', 'AEROX', 15000000, 110, 'DIS1235', 'ada', '9646-aerox.jpg'),
('KD3223', 'Tepung', 10000, 100, 'DIS2341', 'ada', ''),
('KD3239', 'Garam', 10000, 100, 'DIS1238', 'ada', ''),
('KD4361', 'NMAX 135 CC', 30000000, 105, 'DIS1235', 'ada', '2622-nmax.jpg'),
('KD4474', 'JUPITER MX', 9500000, 105, 'DIS1235', 'ada', '3430-jupitermx.jpg'),
('KD4612', 'Nugget', 40000, 6020, 'DIS3004', 'ada', '2500-nugget.jpg'),
('KD4881', 'BEAT', 1100000, 300, 'DIS2183', 'ada', '7982-beat.jpg'),
('KD6542', 'Honda U-GO', 16000000, 100, 'DIS2183', 'ada', '5160-Honda U-Go.jpg'),
('KD6899', 'Nabati Keju', 3000, 6000, 'DIS8944', 'ada', '7395-nabati-keju.jpg'),
('KD7283', 'Ketan', 10000, 10, 'DIS3248', 'ada', '2589-CamScanner 11-01-2021 14.12.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_keluar`
--

CREATE TABLE `tbl_barang_keluar` (
  `no_ref` varchar(30) NOT NULL,
  `kd_barang` varchar(30) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah` int(5) NOT NULL,
  `total` double NOT NULL,
  `diskon` int(5) NOT NULL,
  `penerima` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang_keluar`
--

INSERT INTO `tbl_barang_keluar` (`no_ref`, `kd_barang`, `tanggal_keluar`, `jumlah`, `total`, `diskon`, `penerima`) VALUES
('REFO1657972445', 'KD4612', '2022-07-16', 15, 480000, 20, 'Mas Ivan'),
('REFO1657981853', 'KD4361', '2022-07-16', 1, 18000000, 40, 'Ivan'),
('REFO1657981881', 'KD3110', '2022-07-16', 2, 21000000, 30, 'Pak Ivan'),
('REFO1657984661', 'KD6542', '2022-07-16', 1, 14400000, 10, 'Pak Jaja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `no_ref` varchar(30) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `kd_distributor` varchar(10) NOT NULL,
  `jumlah` double NOT NULL,
  `tgl_masuk` date NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `ket` text NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`no_ref`, `kd_barang`, `kd_distributor`, `jumlah`, `tgl_masuk`, `penerima`, `ket`, `total`) VALUES
('REF1654625686', 'KD4999', 'DIS3004', 5, '2022-07-05', 'Ivan', 'Butuh', 150000),
('REF1654625729', 'KD6635', 'DIS3004', 10, '2022-07-11', 'Rosidik', 'butuh', 400000),
('REF1657826082', 'KD4612', 'DIS3004', 15, '2022-07-15', 'Pak Romli', 'cash', 600000),
('REF1657831825', 'KD4474', 'DIS1235', 20, '2022-07-16', 'Pak Jajang', 'KARAWANG', 190000000),
('REF1657833242', 'KD9945', 'DIS8944', 50, '0000-00-00', 'Mas Ivan', 'CRB', 150000),
('REF1657833974', 'KD4361', 'DIS1235', 5, '2022-07-12', 'Mas Ivan', 'JAKARTA', 150000000),
('REF1657874277', 'KD6733', 'DIS8944', 30, '2022-07-16', 'Mas Ivan', 'KARAWANG', 90000),
('REF1657874673', 'KD3110', 'DIS1235', 10, '2022-07-14', 'Pak Jaja', 'ada', 150000000),
('REF1657985197', 'KD2755', 'DIS8944', 300, '2022-07-16', 'Ivan', 'JAKARTA', 900000),
('REF1657986704', 'KD4474', 'DIS1235', 10, '2022-07-16', 'Pak Sulthon', 'JAKARTA', 95000000),
('REF16823Y12384234', 'KD7233', 'DIS9843', 5, '2022-06-07', 'Ivan C', 'ok', 300000),
('REF16823Y123871', 'KD7238', 'DIS9812', 12, '2022-06-07', 'Ivan', 'ada', 120000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_distributor`
--

CREATE TABLE `tbl_distributor` (
  `kd_distributor` varchar(15) NOT NULL,
  `nm_distributor` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `pemilik` varchar(30) NOT NULL,
  `tipe_produk` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_distributor`
--

INSERT INTO `tbl_distributor` (`kd_distributor`, `nm_distributor`, `alamat`, `nohp`, `pemilik`, `tipe_produk`) VALUES
('DIS1000', 'PT. Kominfo Indonesia', 'Jakarta', '082374128232', 'Ridwan Kamil', 'Website'),
('DIS1235', 'PT. Yamaha', 'Semarang', '082245783265', 'Yamanto', 'Motor'),
('DIS2183', 'PT Honda Prospect Motor', 'Karawang', '083192874573', 'Jajang', 'Motor'),
('DIS3004', 'PT. IndoFOOD', 'Banten', '083242378221', 'Juragan Empang', 'Makanan'),
('DIS8944', 'PT.Nabati Persero', 'Karawang', '083145764487', 'Solkinto', 'Makanan'),
('DIS9000', 'PT. Hyundai Groups', 'Karawang', '082291823145', 'Chen Hyu Wong', 'Motor dan Mobil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nm_user` varchar(40) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nm_user`, `status`) VALUES
(1, 'admin', '12345', 'Muhammad Ivan Chriana', 'Administrator'),
(2, 'dwi', '12345', 'Dwi Pramana Putra', 'Pegawai'),
(3, 'rizal', '12345', 'Rizal Matovani', 'Pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indeks untuk tabel `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  ADD PRIMARY KEY (`no_ref`);

--
-- Indeks untuk tabel `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD PRIMARY KEY (`no_ref`);

--
-- Indeks untuk tabel `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  ADD PRIMARY KEY (`kd_distributor`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
