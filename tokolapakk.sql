-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2019 pada 16.20
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokolapak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `kd_admin` varchar(20) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`kd_admin`, `username`, `email`, `password`, `role`) VALUES
('Admin-1', 'prio', 'prio@gmail.com', '$2y$10$KMM.eiclE1xu60cLqkyb3uFpDNMZkWUVmjmbb8OLvBi5ZmBZPslOC', 1),
('Admin-2', 'prioarief_', 'prioarief@gmail.com', '$2y$10$atTTGLSKziGKd7Xhod.fE./BZcKeEG/xAsY/ZaegGEvjTIZkOZVD6', 1),
('Admin-3', 'priodybala', 'dybala@gmail.com', '$2y$10$oRwsPOb6zRy8AG.EZorjhu5X3wE/I5E6tPZVLsq.k8xVli7rnQYym', 1),
('Admin-4', 'prioa', 'priodyabalaa@gmail.com', '$2y$10$fg7sb9vpPtKlnPYbLshPSecqihh1ADPsRBwIcp2B9MstFxnnHIlsm', 1),
('Admin-5', 'Prio Arief Gunawan', 'admin@gmail.com', '$2y$10$SSpvDGpS4SA7tjQb0rb2w.4eHofUXycUwqMRknRLoTvL6fUBEkuwe', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kd_brg` varchar(20) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `bahan` varchar(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `kd_kategori` varchar(20) NOT NULL,
  `diskon` int(11) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kd_brg`, `nama_brg`, `gambar`, `bahan`, `warna`, `harga`, `keyword`, `kd_kategori`, `diskon`, `ukuran`, `berat`, `stok`) VALUES
('Product-01', 'Sepatu HypeBest', '0b8f15b70022261db241515a8c4a745b.jpg', 'sutra', 'gold', 1000000, 'sepatu', 'Cat-1', 0, 10, 1, 16),
('Product-03', 'Sepatu Merah', 'fa3720cfff95a6bb6ae0d9c60779f323.jpg', 'plastik', 'merah', 5000000, 'sepatu', 'Cat-1', 0, 41, 1, 15),
('Product-04', 'Sepatu bebas', '1c1bc22cac4eb936429cc2f7fc66ffa6.jpg', 'metal', 'oren', 100000, 'sepatu', 'Cat-1', 0, 32, 1, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_kirim`
--

CREATE TABLE `biaya_kirim` (
  `kd_bk` varchar(20) NOT NULL,
  `kd_jp` varchar(20) NOT NULL,
  `kd_kota` varchar(20) NOT NULL,
  `biaya_kirim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya_kirim`
--

INSERT INTO `biaya_kirim` (`kd_bk`, `kd_jp`, `kd_kota`, `biaya_kirim`) VALUES
('BK-01', 'JP-01', 'Kota-01', 10000),
('BK-02', 'JP-05', 'Kota-01', 12000),
('BK-03', 'JP-01', 'Kota-04', 12000),
('BK-04', 'JP-03', 'Kota-01', 20000);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_product`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_product` (
`kd_brg` varchar(20)
,`nama_brg` varchar(50)
,`gambar` varchar(100)
,`bahan` varchar(20)
,`warna` varchar(20)
,`harga` int(11)
,`keyword` varchar(50)
,`diskon` int(11)
,`ukuran` int(11)
,`berat` int(11)
,`stok` int(11)
,`nama_kategori` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `kd_trans` int(20) NOT NULL,
  `kd_brg` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `kd_trans`, `kd_brg`, `jumlah`) VALUES
(31, 32, 'Product-03', 1),
(32, 33, 'Product-03', 1),
(33, 34, 'Product-01', 1),
(34, 34, 'Product-04', 1),
(35, 35, 'Product-03', 5);

--
-- Trigger `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `penjualan` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN
	UPDATE barang SET stok=stok-NEW.jumlah
    WHERE kd_brg = NEW.kd_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa_pengiriman`
--

CREATE TABLE `jasa_pengiriman` (
  `kd_jasa` varchar(20) NOT NULL,
  `nama_jasa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jasa_pengiriman`
--

INSERT INTO `jasa_pengiriman` (`kd_jasa`, `nama_jasa`) VALUES
('Jasa-01', 'JNE'),
('Jasa-02', 'J&T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pengiriman`
--

CREATE TABLE `jenis_pengiriman` (
  `kd_jp` varchar(20) NOT NULL,
  `nama_jp` varchar(50) NOT NULL,
  `kd_jasa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pengiriman`
--

INSERT INTO `jenis_pengiriman` (`kd_jp`, `nama_jp`, `kd_jasa`) VALUES
('JP-01', 'Reguler', 'Jasa-01'),
('JP-03', 'YES', 'Jasa-01'),
('JP-04', 'OKE', 'Jasa-01'),
('JP-05', 'Express', 'Jasa-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kd_kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nama_kategori`) VALUES
('Cat-1', 'Fashion'),
('Cat-3', 'Sports'),
('Cat-4', 'Laptop'),
('Cat-5', 'Handphone');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `kd_keranjang` varchar(10) NOT NULL,
  `kd_brg` varchar(10) NOT NULL,
  `kd_konsumen` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `kd_konsumen` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`kd_konsumen`, `email`, `password`, `username`, `created_at`) VALUES
('Kon-001', 'demo@demo.com', '$2y$10$AKLdPYwxGYMSvElJXuyVXeUXT5ErM8dAbh3kk6gjTEMh5WHBViwqW', 'demo', '1574858565'),
('Kon-002', 'p@gmail.com', '$2y$10$4ws30c5gQiXc7F1z9Wlyp.RgnP2qDxsHtdbSxDU/6KiUrmPqOZ9Pe', 'arief', '1574858654'),
('Kon-003', 'prio@gmail.com', '$2y$10$DET5mDnYPQ7gjuUbjTdy.OuE8LlqBcaXMTEFiGKu42x0mHOLCDzPa', 'prio', '1574958539');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `kd_kota` varchar(20) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `kd_prov` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`kd_kota`, `nama_kota`, `kd_prov`) VALUES
('Kota-01', 'Kota Tangerang', 'Prov-01'),
('Kota-02', 'Kota Tangerang Selatan', 'Prov-01'),
('Kota-03', 'Kabupaten Tangerang', 'Prov-01'),
('Kota-04', 'Kota Bandung', 'Prov-03');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `ongkir`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `ongkir` (
`biaya_kirim` int(11)
,`nama_jp` varchar(50)
,`nama_jasa` varchar(50)
,`kd_kota` varchar(20)
,`nama_kota` varchar(100)
,`kd_prov` varchar(20)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `kd_kirim` varchar(20) NOT NULL,
  `kd_trans` varchar(20) NOT NULL,
  `no_resi` varchar(25) NOT NULL,
  `tgl_terima` date NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `kd_prov` varchar(20) NOT NULL,
  `nama_prov` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`kd_prov`, `nama_prov`) VALUES
('Prov-01', 'Banten'),
('Prov-02', 'DKI Jakarta'),
('Prov-03', 'Jawa Barat'),
('Prov-04', 'Jawa Timur'),
('Prov-05', 'Kalimantan Timur'),
('Prov-06', 'Jawa Tengah'),
('Prov-07', 'Kalimantan Barat'),
('Prov-08', 'Kalimantan Tengah'),
('Prov-09', 'Kalimantan Selatan'),
('Prov-10', 'Papua'),
('Prov-11', 'Papua Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `kd_brg` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id`, `kd_brg`, `jumlah`) VALUES
(1, 'Product-03', 10),
(2, 'Product-01', 15);

--
-- Trigger `stok`
--
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `stok` FOR EACH ROW BEGIN
	UPDATE barang SET stok=stok+NEW.jumlah
    WHERE kd_brg = NEW.kd_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `tampilkeranjang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `tampilkeranjang` (
`kd_keranjang` varchar(10)
,`kd_brg` varchar(10)
,`kd_konsumen` varchar(10)
,`jumlah` int(11)
,`nama_brg` varchar(50)
,`gambar` varchar(100)
,`harga` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_trans` int(20) NOT NULL,
  `tgl_trans` int(50) NOT NULL,
  `kd_konsumen` varchar(20) NOT NULL,
  `biaya_kirim` int(11) NOT NULL,
  `resi` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kd_trans`, `tgl_trans`, `kd_konsumen`, `biaya_kirim`, `resi`, `status`, `sub_total`, `alamat`) VALUES
(32, 1574862804, 'Kon-001', 10000, 'TokoLapak-wyiwr1574862756', 'Di Terima', 5010000, 'Margasari'),
(33, 1574870829, 'Kon-001', 20000, 'TokoLapak-pnfsi1574870791', 'Di Terima', 5020000, 'Jl H Ahmad no 96'),
(34, 1574949943, 'Kon-001', 12000, 'TokoLapak-djdfh1574949910', 'Di kirim', 1112000, 'Margasari Karawaci Kota Tangerang'),
(35, 1574961464, 'Kon-003', 10000, 'TokoLapak-ezspb1574961441', 'Di kirim', 25010000, 'Margasari');

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_product`
--
DROP TABLE IF EXISTS `detail_product`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `detail_product`  AS  select `b`.`kd_brg` AS `kd_brg`,`b`.`nama_brg` AS `nama_brg`,`b`.`gambar` AS `gambar`,`b`.`bahan` AS `bahan`,`b`.`warna` AS `warna`,`b`.`harga` AS `harga`,`b`.`keyword` AS `keyword`,`b`.`diskon` AS `diskon`,`b`.`ukuran` AS `ukuran`,`b`.`berat` AS `berat`,`b`.`stok` AS `stok`,`k`.`nama_kategori` AS `nama_kategori` from (`barang` `b` join `kategori` `k`) where (`k`.`kd_kategori` = `b`.`kd_kategori`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `ongkir`
--
DROP TABLE IF EXISTS `ongkir`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `ongkir`  AS  select `bk`.`biaya_kirim` AS `biaya_kirim`,`jepe`.`nama_jp` AS `nama_jp`,`jape`.`nama_jasa` AS `nama_jasa`,`kota`.`kd_kota` AS `kd_kota`,`kota`.`nama_kota` AS `nama_kota`,`kota`.`kd_prov` AS `kd_prov` from (((`biaya_kirim` `bk` join `jenis_pengiriman` `jepe`) join `jasa_pengiriman` `jape`) join `kota`) where ((`bk`.`kd_jp` = `jepe`.`kd_jp`) and (`jape`.`kd_jasa` = `jepe`.`kd_jasa`) and (`bk`.`kd_kota` = `kota`.`kd_kota`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `tampilkeranjang`
--
DROP TABLE IF EXISTS `tampilkeranjang`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `tampilkeranjang`  AS  select `k`.`kd_keranjang` AS `kd_keranjang`,`k`.`kd_brg` AS `kd_brg`,`k`.`kd_konsumen` AS `kd_konsumen`,`k`.`jumlah` AS `jumlah`,`b`.`nama_brg` AS `nama_brg`,`b`.`gambar` AS `gambar`,`b`.`harga` AS `harga` from (`keranjang` `k` join `barang` `b`) where (`b`.`kd_brg` = `k`.`kd_brg`) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_brg`),
  ADD KEY `kd_kategori` (`kd_kategori`);

--
-- Indeks untuk tabel `biaya_kirim`
--
ALTER TABLE `biaya_kirim`
  ADD PRIMARY KEY (`kd_bk`),
  ADD KEY `kd_jp` (`kd_jp`),
  ADD KEY `kd_kota` (`kd_kota`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_brg` (`kd_brg`),
  ADD KEY `kd_trans` (`kd_trans`);

--
-- Indeks untuk tabel `jasa_pengiriman`
--
ALTER TABLE `jasa_pengiriman`
  ADD PRIMARY KEY (`kd_jasa`);

--
-- Indeks untuk tabel `jenis_pengiriman`
--
ALTER TABLE `jenis_pengiriman`
  ADD PRIMARY KEY (`kd_jp`),
  ADD KEY `kd_jasa` (`kd_jasa`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`kd_keranjang`),
  ADD KEY `kd_brg` (`kd_brg`),
  ADD KEY `kd_konsumen` (`kd_konsumen`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`kd_konsumen`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kd_kota`),
  ADD KEY `kd_prov` (`kd_prov`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`kd_kirim`),
  ADD KEY `kd_trans` (`kd_trans`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`kd_prov`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_brg` (`kd_brg`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_trans`),
  ADD KEY `kd_konsumen` (`kd_konsumen`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kd_trans` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `biaya_kirim`
--
ALTER TABLE `biaya_kirim`
  ADD CONSTRAINT `biaya_kirim_ibfk_1` FOREIGN KEY (`kd_kota`) REFERENCES `kota` (`kd_kota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `biaya_kirim_ibfk_2` FOREIGN KEY (`kd_jp`) REFERENCES `jenis_pengiriman` (`kd_jp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`kd_trans`) REFERENCES `transaksi` (`kd_trans`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jenis_pengiriman`
--
ALTER TABLE `jenis_pengiriman`
  ADD CONSTRAINT `jenis_pengiriman_ibfk_1` FOREIGN KEY (`kd_jasa`) REFERENCES `jasa_pengiriman` (`kd_jasa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`kd_konsumen`) REFERENCES `konsumen` (`kd_konsumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`kd_brg`) REFERENCES `barang` (`kd_brg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`kd_brg`) REFERENCES `barang` (`kd_brg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kd_konsumen`) REFERENCES `konsumen` (`kd_konsumen`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
