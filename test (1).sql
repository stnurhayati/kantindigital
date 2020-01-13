-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jan 2020 pada 09.39
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `qw_laporan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `qw_laporan` (
`id_menu` int(11)
,`nama_menu` varchar(30)
,`jenis` varchar(15)
,`harga` int(11)
,`id_transaksi` varchar(30)
,`jumlah` int(11)
,`tanggal_pesan` date
,`stasus` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `qw_pesanan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `qw_pesanan` (
`id_pesan` int(11)
,`no_meja` int(11)
,`id_transaksi` varchar(30)
,`id_menu` int(11)
,`jumlah` int(11)
,`tanggal_pesan` date
,`stat_pesanan` int(11)
,`stasus` int(11)
,`nama_menu` varchar(30)
,`harga` int(11)
,`jml` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_pesan` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `id_transaksi` varchar(30) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_pesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_pesan`, `no_meja`, `id_transaksi`, `id_menu`, `jumlah`, `tanggal_pesan`) VALUES
(39, 0, 'TR010811', 15, 2, '2020-01-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `nama_menu`, `jenis`, `harga`, `foto`, `stok`) VALUES
(15, 'mie ayam', 'Makanan', 10000, 'download (3).jpg', 43),
(16, 'teh tarik', 'Minuman', 7000, 'te tarik.jpg', 90),
(17, 'Soto Ayam', 'Makanan', 15000, 'soto.jpg', 65),
(18, 'Coffe', 'Minuman', 7000, 'kopi.png', 132),
(19, 'Seblak', 'Makanan', 12000, 'seblak.jpg', 56);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `level`, `username`, `password`) VALUES
(19, 'Siti Nurhayati', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500'),
(21, 'dino', 'Kasir', 'dino123', '34adbae6e21f964a24731f0bde20bff5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesan` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `id_transaksi` varchar(30) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `stat_pesanan` int(11) NOT NULL,
  `stasus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur untuk view `qw_laporan`
--
DROP TABLE IF EXISTS `qw_laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qw_laporan`  AS  select `tb_menu`.`id_menu` AS `id_menu`,`tb_menu`.`nama_menu` AS `nama_menu`,`tb_menu`.`jenis` AS `jenis`,`tb_menu`.`harga` AS `harga`,`tb_pesanan`.`id_transaksi` AS `id_transaksi`,`tb_pesanan`.`jumlah` AS `jumlah`,`tb_pesanan`.`tanggal_pesan` AS `tanggal_pesan`,`tb_pesanan`.`stasus` AS `stasus` from (`tb_menu` join `tb_pesanan` on(`tb_menu`.`id_menu` = `tb_pesanan`.`id_menu`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `qw_pesanan`
--
DROP TABLE IF EXISTS `qw_pesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qw_pesanan`  AS  select `tb_pesanan`.`id_pesan` AS `id_pesan`,`tb_pesanan`.`no_meja` AS `no_meja`,`tb_pesanan`.`id_transaksi` AS `id_transaksi`,`tb_pesanan`.`id_menu` AS `id_menu`,`tb_pesanan`.`jumlah` AS `jumlah`,`tb_pesanan`.`tanggal_pesan` AS `tanggal_pesan`,`tb_pesanan`.`stat_pesanan` AS `stat_pesanan`,`tb_pesanan`.`stasus` AS `stasus`,`tb_menu`.`nama_menu` AS `nama_menu`,`tb_menu`.`harga` AS `harga`,`tb_menu`.`harga` * `tb_pesanan`.`jumlah` AS `jml` from (`tb_pesanan` join `tb_menu` on(`tb_pesanan`.`id_menu` = `tb_menu`.`id_menu`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_transaksi` (`id_transaksi`,`id_menu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD CONSTRAINT `tb_keranjang_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `tb_menu` (`id_menu`);

--
-- Ketidakleluasaan untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD CONSTRAINT `tb_pesanan_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `tb_menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
