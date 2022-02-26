-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2020 pada 11.33
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_dora`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin1`
--

CREATE TABLE `admin1` (
  `id_card` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `notlpn` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin1`
--

INSERT INTO `admin1` (`id_card`, `nama`, `notlpn`, `username`, `password`) VALUES
(1, 'Shinta', '085710310384', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`) VALUES
(1, 'BNI'),
(2, 'CIMB'),
(3, 'Bank Mandiri'),
(4, 'BCA'),
(5, 'BJB '),
(6, 'BRI'),
(7, 'Bank Danamon'),
(8, 'Bank Permata');

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE `makanan` (
  `br_id` int(15) NOT NULL,
  `br_nm` varchar(50) NOT NULL,
  `br_item` int(4) NOT NULL,
  `br_hrg` int(10) NOT NULL,
  `br_berat` int(11) NOT NULL,
  `br_stok` int(9) NOT NULL,
  `br_satuan` varchar(20) NOT NULL,
  `ket` varchar(250) NOT NULL,
  `br_sts` varchar(2) NOT NULL,
  `br_gbr` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `makanan`
--

INSERT INTO `makanan` (`br_id`, `br_nm`, `br_item`, `br_hrg`, `br_berat`, `br_stok`, `br_satuan`, `ket`, `br_sts`, `br_gbr`) VALUES
(6, 'Keripik Ubi Ungu ', 1, 25000, 500, 14, 'pcs ', 'Keripik Ubi Ungu yang sangat enak. ', 'Y', 'WhatsApp Image 2020-06-03 at 00.17.24.jpeg'),
(3, 'keripik singkong   ', 1, 25000, 500, 24, 'pcs   ', 'Keripik singkong yang sangat enak. Homemade   ', 'Y', 'WhatsApp Image 2020-06-03 at 00.17.24 (2).jpeg'),
(5, 'keripik pisang ', 1, 20000, 500, 36, 'pcs ', 'Keripik pisang ', 'Y', 'WhatsApp Image 2020-06-03 at 00.17.24 (1).jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `notlpn` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `email`, `notlpn`, `alamat`, `username`, `password`) VALUES
(1, 'Shinta', 'shintawahyu554@gmail.com', '085710310384', 'Perum Bumi Jayakarta Pertiwi A.3/4 RT:002 RW:011. Gangdoang, Cileungsi. Bogor. Jawa Barat', 'nata', 'qwerty');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `nama_bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 115, 'Shinta', 'BCA', 68000, '2020-08-08', '2020080809555494392745_711997119545682_6622060935810908160_n.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `alamat_tujuan` varchar(200) NOT NULL,
  `jenis_pengiriman` varchar(50) NOT NULL,
  `jenis_paket` varchar(20) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `total_berat` int(11) NOT NULL,
  `id_bank` int(20) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `kode_pembayaran` varchar(20) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(20) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `nomor_resi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `nama`, `email`, `nama_kota`, `alamat_tujuan`, `jenis_pengiriman`, `jenis_paket`, `ongkir`, `total_berat`, `id_bank`, `nama_bank`, `kode_pembayaran`, `tanggal_pembelian`, `total_pembelian`, `status`, `nomor_resi`) VALUES
(115, 1, 'Shinta', 'shintawahyu554@gmail.com', 'Bogor', 'Perum Bumi Jayakarta Pertiwi A.3/4 RT:002 RW:011. Gangdoang, Cileungsi. Bogor. Jawa Barat', 'jne', 'CTCYES', 18000, 1000, 4, 'BCA', '', '2020-08-08', 68000, 'barang dikirim', 'jne202008080001'),
(116, 1, 'Shinta', 'shintawahyu554@gmail.com', 'Bogor', 'Perum Bumi Jayakarta Pertiwi A.3/4 RT:002 RW:011. Gangdoang, Cileungsi. Bogor. Jawa Barat', 'tiki', 'ONS', 18000, 500, 6, 'BRI', '', '2020-08-08', 38000, 'pending', 'tiki202008080002'),
(117, 1, 'Shinta', 'shintawahyu554@gmail.com', 'Bogor', 'Perum Bumi Jayakarta Pertiwi A.3/4 RT:002 RW:011. Gangdoang, Cileungsi. Bogor. Jawa Barat', 'tiki', 'ONS', 18000, 500, 7, 'Bank Danamon', '', '2020-08-10', 43000, 'pending', 'tiki202008100003'),
(118, 1, 'Shinta', 'shintawahyu554@gmail.com', 'Bogor', 'Perum Bumi Jayakarta Pertiwi A.3/4 RT:002 RW:011. Gangdoang, Cileungsi. Bogor. Jawa Barat', 'tiki', 'ONS', 18000, 1000, 7, 'Bank Danamon', '', '2020-09-06', 68000, 'pending', 'tiki202009070004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_barang`
--

CREATE TABLE `pembelian_barang` (
  `id_pembelian_barang` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `br_id` int(15) NOT NULL,
  `br_nm` varchar(50) NOT NULL,
  `br_hrg` int(10) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `br_jmlh` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_barang`
--

INSERT INTO `pembelian_barang` (`id_pembelian_barang`, `id_pembelian`, `br_id`, `br_nm`, `br_hrg`, `total_harga`, `br_jmlh`) VALUES
(126, 115, 6, 'Keripik Ubi Ungu ', 25000, 50000, '2'),
(127, 116, 5, 'keripik pisang ', 20000, 20000, '1'),
(128, 117, 6, 'Keripik Ubi Ungu ', 25000, 25000, '1'),
(129, 118, 6, 'Keripik Ubi Ungu ', 25000, 50000, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resi_pengiriman`
--

CREATE TABLE `resi_pengiriman` (
  `nomor_resi` varchar(100) NOT NULL,
  `jenis_pengiriman` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resi_pengiriman`
--

INSERT INTO `resi_pengiriman` (`nomor_resi`, `jenis_pengiriman`) VALUES
('tiki202009070004', 'tiki'),
('tiki202008100003', 'tiki'),
('tiki202008080002', 'tiki'),
('jne202008080001', 'jne');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin1`
--
ALTER TABLE `admin1`
  ADD PRIMARY KEY (`id_card`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`br_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `resi_pengiriman` (`nomor_resi`);

--
-- Indeks untuk tabel `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD PRIMARY KEY (`id_pembelian_barang`);

--
-- Indeks untuk tabel `resi_pengiriman`
--
ALTER TABLE `resi_pengiriman`
  ADD PRIMARY KEY (`nomor_resi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin1`
--
ALTER TABLE `admin1`
  MODIFY `id_card` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `makanan`
--
ALTER TABLE `makanan`
  MODIFY `br_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT untuk tabel `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  MODIFY `id_pembelian_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
