-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2023 pada 09.49
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
-- Database: `spk-ahp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_absen` varchar(50) DEFAULT NULL,
  `jam_absen` varchar(50) DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL,
  `surat_sakit` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id_absen`, `id_user`, `tanggal_absen`, `jam_absen`, `tgl_awal`, `tgl_akhir`, `keterangan`, `surat_sakit`, `status`) VALUES
(1, 1, '2023-10-16', '15:22:03', NULL, NULL, 'Telat', NULL, 1),
(2, 1, '2023-10-16', '15:22:06', '2023-10-16', '2023-10-20', 'Nikahan', NULL, 2),
(3, 1, '2023-10-16', '15:24:10', '2023-10-31', '2023-11-04', 'cuti tahunan', NULL, 3),
(4, 1, '2023-10-16', '15:26:14', '2023-11-03', '2023-11-09', 'batuk', 'perhitungan.png', 4),
(5, 4, '2023-10-21', '13:11:23', NULL, NULL, 'Telat', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `analisis`
--

CREATE TABLE `analisis` (
  `id_analisis` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `hasil_analisis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` int(11) NOT NULL,
  `no_permintaan` varchar(50) DEFAULT NULL,
  `biaya_paket` varchar(50) DEFAULT NULL,
  `biaya_paket_tambahan` varchar(50) DEFAULT NULL,
  `biaya_sewa_perangkat` varchar(50) DEFAULT NULL,
  `biaya_pembelian_cpe` varchar(50) DEFAULT NULL,
  `biaya_instalasi` varchar(50) DEFAULT NULL,
  `uang_jaminan` varchar(50) DEFAULT NULL,
  `biaya_pasang_baru` varchar(50) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `no_permintaan`, `biaya_paket`, `biaya_paket_tambahan`, `biaya_sewa_perangkat`, `biaya_pembelian_cpe`, `biaya_instalasi`, `uang_jaminan`, `biaya_pasang_baru`, `catatan`) VALUES
(1, '12345123', '250000', '0', '30000', '0', '0', '0', '150000', ''),
(2, '6532157816', '230000', '0', '30000', '0', '0', '0', '180000', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_penjualan` int(11) DEFAULT NULL,
  `tgl_berlangganan` varchar(20) NOT NULL,
  `durasi_langganan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `id_penjualan`, `tgl_berlangganan`, `durasi_langganan`) VALUES
(1, 1, 1, '2023-10-01', '12'),
(2, 1, 2, '2023-10-10', '6'),
(3, 2, 2, '2023-10-5', '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_kontrak_langganan` datetime DEFAULT NULL,
  `no_permintaan` varchar(50) DEFAULT NULL,
  `jenis_permohonan` varchar(50) DEFAULT NULL,
  `no_tlp_internet` varchar(50) DEFAULT NULL,
  `produk_layanan` varchar(50) DEFAULT NULL,
  `paket` varchar(50) DEFAULT NULL,
  `kecepatan` varchar(50) DEFAULT NULL,
  `perangkat` varchar(50) DEFAULT NULL,
  `fitur_tambahan` varchar(50) DEFAULT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `tipe_pelanggan` varchar(50) DEFAULT NULL,
  `no_ktp` int(11) DEFAULT NULL,
  `alamat_instalasi` text DEFAULT NULL,
  `alamat_pelanggan` text DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `no_tlpn` varchar(15) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_user`, `tgl_kontrak_langganan`, `no_permintaan`, `jenis_permohonan`, `no_tlp_internet`, `produk_layanan`, `paket`, `kecepatan`, `perangkat`, `fitur_tambahan`, `nama_pelanggan`, `tipe_pelanggan`, `no_ktp`, `alamat_instalasi`, `alamat_pelanggan`, `kode_pos`, `kota`, `no_tlpn`, `no_hp`, `email`) VALUES
(1, 1, '2023-10-17 15:00:00', '12345123', 'Pemasangan Baru', '0892786721', 'Indihome Reguler', '1 pay', '20 mbps', '0', '0', 'Andri', 'reguler', 2147483647, 'Jl. Jenderal Gatot Subroto Jakarta 10270. Gedung Nusantara', 'Jl. Jenderal Gatot Subroto Jakarta 10270. Gedung Nusantara', 67216, 'Jakarta', '0', '0898729871', 'andri@gmail.com'),
(2, 4, '2023-10-17 14:00:00', '6532157816', 'Pemasangan Baru', '62716821689', 'Indihome Reguler', '1 pay', '30 mbps', '0', '0', 'Yosef', 'reguler', 2147483647, 'Jl. Jenderal Gatot Subroto Jakarta 10270. Gedung Nusantara', 'Jl. Jenderal Gatot Subroto Jakarta 10270. Gedung Nusantara', 211121, 'Jakarta', '0', '0893267121', 'yosef@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `level_user` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `no_hp`, `alamat`, `level_user`) VALUES
(1, 'andri', 'andri', '12341234', '089128192832', 'Kuningan', 'sales'),
(2, 'hafiz', 'hafiz', '12341234', '089374651827', 'cirebon', 'pimpinan'),
(4, 'sales2', 'sales2', 'sales2', '089987656543', 'Kuningan, Jawa Barat', 'sales');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`id_analisis`);

--
-- Indeks untuk tabel `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `analisis`
--
ALTER TABLE `analisis`
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
