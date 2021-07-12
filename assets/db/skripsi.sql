-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2021 pada 07.13
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `no_akun` int(11) NOT NULL,
  `nama_akun` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `no_akun`, `nama_akun`) VALUES
(1, 111, 'KAS'),
(2, 112, 'ASURANSI DIBAYAR DI MUKA'),
(3, 113, 'PIUTANG DAGANG'),
(4, 114, 'PERSEDIAAN BARANG DAGANG'),
(5, 115, 'PERLENGKAPAN'),
(26, 116, 'SEWA DI BAYAR DI MUKA'),
(6, 121, 'PERALATAN'),
(7, 122, 'AKUMULASI PENYUSUTAN PERALATAN'),
(8, 211, 'UTANG DAGANG'),
(9, 221, 'UTANG BANK'),
(27, 222, 'UTANG GAJI'),
(10, 311, 'MODAL PEMILIK'),
(11, 312, 'PRIVE'),
(12, 411, 'PENJUALAN'),
(13, 412, 'RETUR PENJUALAN'),
(14, 413, 'POTONGAN PENJUALAN'),
(15, 511, 'PEMBELIAN'),
(16, 512, 'RETUR PEMBELIAN'),
(17, 513, 'POTONGAN PEMBELIAN'),
(22, 514, 'IKHTISAR LABA-RUGI'),
(18, 611, 'BEBAN SEWA'),
(19, 613, 'BEBAN IKLAN'),
(20, 614, 'BEBAN GAJI'),
(21, 620, 'BEBAN MACAM MACAM'),
(23, 621, 'BEBAN PERLENGKAPAN'),
(24, 622, 'BEBAN PENYUSUTAN PERALATAN'),
(25, 623, 'BEBAN ASURANSI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_pemasukan_kas`
--

CREATE TABLE `jurnal_pemasukan_kas` (
  `id_jkm` int(11) NOT NULL,
  `no_akun` int(11) NOT NULL,
  `id_piutang_dagang` int(11) NOT NULL,
  `id_utang_dagang` int(11) NOT NULL,
  `id_syarat` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `no_transaksi` varchar(100) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal_pemasukan_kas`
--

INSERT INTO `jurnal_pemasukan_kas` (`id_jkm`, `no_akun`, `id_piutang_dagang`, `id_utang_dagang`, `id_syarat`, `tanggal`, `debet`, `kredit`, `no_transaksi`, `id_pengguna`) VALUES
(32, 311, 0, 0, 0, '2021-05-01', 0, 10000000, '1620978244', 1),
(33, 111, 0, 0, 0, '2021-05-01', 10000000, 0, '1620978244', 1),
(34, 411, 0, 0, 0, '2021-05-11', 0, 1000000, '1620978369', 1),
(35, 111, 0, 0, 0, '2021-05-11', 1000000, 0, '1620978369', 1),
(36, 113, 2, 0, 0, '2021-05-19', 0, 2800000, '1620978446', 1),
(37, 413, 0, 0, 0, '2021-05-19', 84000, 0, '1620978446', 1),
(38, 111, 0, 0, 0, '2021-05-19', 2716000, 0, '1620978446', 1),
(39, 113, 1, 0, 0, '2021-05-22', 0, 3500000, '1620978510', 1),
(40, 413, 0, 0, 0, '2021-05-22', 105000, 0, '1620978510', 1),
(41, 111, 0, 0, 0, '2021-05-22', 3395000, 0, '1620978510', 1),
(42, 113, 1, 0, 0, '2021-05-23', 0, 3400000, '1620978569', 1),
(43, 413, 0, 0, 0, '2021-05-23', 68000, 0, '1620978569', 1),
(44, 111, 0, 0, 0, '2021-05-23', 3332000, 0, '1620978569', 1),
(45, 411, 0, 0, 0, '2021-05-29', 0, 1700000, '1620978613', 1),
(46, 111, 0, 0, 0, '2021-05-29', 1700000, 0, '1620978613', 1),
(47, 111, 0, 0, 0, '2021-06-19', 10000000, 0, '32443534543', 1),
(48, 112, 0, 0, 0, '2021-06-19', 1200000, 0, '232432435', 1),
(49, 221, 0, 0, 0, '2021-06-19', 0, 5000000, '234365346', 1),
(50, 311, 0, 0, 0, '2021-06-19', 0, 14700000, '35456567', 1),
(51, 312, 0, 0, 0, '2021-06-19', 4500000, 0, '43565675678', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_pembelian`
--

CREATE TABLE `jurnal_pembelian` (
  `id_jb` int(11) NOT NULL,
  `no_akun` int(11) NOT NULL,
  `id_utang_dagang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `no_faktur` int(11) NOT NULL,
  `id_syarat` int(11) NOT NULL,
  `no_transaksi` varchar(100) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal_pembelian`
--

INSERT INTO `jurnal_pembelian` (`id_jb`, `no_akun`, `id_utang_dagang`, `tanggal`, `debet`, `kredit`, `no_faktur`, `id_syarat`, `no_transaksi`, `id_pengguna`) VALUES
(23, 121, 0, '2021-05-14', 1500000, 0, 123, 0, '1620981071', 1),
(24, 211, 3, '2021-05-14', 0, 1500000, 123, 0, '1620981071', 1),
(25, 511, 0, '2021-05-07', 3200000, 0, 652, 0, '1621007138', 1),
(26, 211, 3, '2021-05-07', 0, 3200000, 652, 0, '1621007138', 1),
(27, 511, 0, '2021-05-14', 2600000, 0, 365, 0, '1621007169', 1),
(28, 211, 2, '2021-05-14', 0, 2600000, 365, 0, '1621007169', 1),
(29, 511, 0, '2021-05-28', 2200000, 0, 369, 0, '1621007191', 1),
(30, 211, 1, '2021-05-28', 0, 2200000, 369, 0, '1621007191', 1),
(31, 115, 0, '2021-06-19', 1000000, 0, 234, 0, '345456547', 1),
(32, 121, 0, '2021-06-19', 500000, 0, 0, 0, '3435346', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_pengeluaran_kas`
--

CREATE TABLE `jurnal_pengeluaran_kas` (
  `id_jkk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_akun` int(11) NOT NULL,
  `id_piutang_dagang` int(11) NOT NULL,
  `id_utang_dagang` int(11) NOT NULL,
  `id_syarat` int(11) NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `no_transaksi` varchar(100) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal_pengeluaran_kas`
--

INSERT INTO `jurnal_pengeluaran_kas` (`id_jkk`, `tanggal`, `no_akun`, `id_piutang_dagang`, `id_utang_dagang`, `id_syarat`, `debet`, `kredit`, `no_transaksi`, `id_pengguna`) VALUES
(20, '2021-05-02', 611, 0, 0, 0, 1200000, 0, '1620978976', 1),
(21, '2021-05-02', 111, 0, 0, 0, 0, 1200000, '1620978976', 1),
(22, '2021-05-14', 115, 0, 0, 0, 500000, 0, '1620980015', 1),
(23, '2021-05-14', 111, 0, 0, 0, 0, 500000, '1620980015', 1),
(24, '2021-05-05', 211, 0, 3, 0, 2700000, 0, '1620980047', 1),
(25, '2021-05-05', 111, 0, 0, 0, 0, 2700000, '1620980047', 1),
(26, '2021-05-14', 613, 0, 0, 0, 150000, 0, '1620980081', 1),
(27, '2021-05-14', 111, 0, 0, 0, 0, 150000, '1620980081', 1),
(28, '2021-05-24', 211, 0, 2, 0, 800000, 0, '1620980115', 1),
(29, '2021-05-24', 111, 0, 0, 0, 0, 800000, '1620980115', 1),
(30, '2021-05-14', 211, 0, 1, 0, 2200000, 0, '1620980135', 1),
(31, '2021-05-14', 111, 0, 0, 0, 0, 2200000, '1620980135', 1),
(32, '2021-05-14', 614, 0, 0, 0, 1200000, 0, '1620980176', 1),
(33, '2021-05-14', 111, 0, 0, 0, 0, 1200000, '1620980176', 1),
(34, '2021-05-31', 620, 0, 0, 0, 150000, 0, '1620980212', 1),
(35, '2021-05-31', 111, 0, 0, 0, 0, 150000, '1620980212', 1),
(36, '2021-06-19', 113, 0, 0, 0, 500000, 0, '2343435', 1),
(37, '2021-06-19', 122, 0, 0, 0, 0, 1000000, '12432543654', 1),
(38, '2021-06-19', 211, 0, 0, 0, 0, 2000000, '353465476', 1),
(56, '2021-07-11', 620, 0, 0, 0, 5000, 0, '1626001328', 1),
(57, '2021-07-11', 111, 0, 0, 0, 0, 5000, '1626001328', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_penjualan`
--

CREATE TABLE `jurnal_penjualan` (
  `id_jj` int(11) NOT NULL,
  `no_akun` int(11) NOT NULL,
  `id_piutang_dagang` int(11) NOT NULL,
  `no_faktur` int(11) NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_syarat` int(11) NOT NULL,
  `no_transaksi` varchar(100) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal_penjualan`
--

INSERT INTO `jurnal_penjualan` (`id_jj`, `no_akun`, `id_piutang_dagang`, `no_faktur`, `debet`, `kredit`, `tanggal`, `id_syarat`, `no_transaksi`, `id_pengguna`) VALUES
(1, 411, 0, 251, 0, 2800000, '2021-05-10', 0, '1621007313', 1),
(2, 113, 2, 251, 2800000, 0, '2021-05-10', 0, '1621007313', 1),
(3, 411, 0, 242, 0, 3700000, '2021-05-13', 0, '1621007374', 1),
(4, 113, 1, 242, 3700000, 0, '2021-05-13', 0, '1621007374', 1),
(5, 411, 0, 253, 0, 3400000, '2021-05-14', 0, '1621007389', 1),
(6, 113, 2, 253, 3400000, 0, '2021-05-14', 0, '1621007389', 1),
(7, 411, 0, 254, 0, 2700000, '2021-05-25', 0, '1621007418', 1),
(8, 113, 1, 254, 2700000, 0, '2021-05-25', 0, '1621007418', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_penyesuaian`
--

CREATE TABLE `jurnal_penyesuaian` (
  `id_jps` int(11) NOT NULL,
  `no_akun` int(11) NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_transaksi` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal_penyesuaian`
--

INSERT INTO `jurnal_penyesuaian` (`id_jps`, `no_akun`, `debet`, `kredit`, `tanggal`, `no_transaksi`, `id_pengguna`) VALUES
(1, 514, 5000000, 0, '2021-06-02', 1622615147, 1),
(2, 114, 0, 5000000, '2021-06-02', 1622615147, 1),
(3, 114, 4000000, 0, '2021-06-02', 1622615522, 1),
(4, 514, 0, 4000000, '2021-06-02', 1622615522, 1),
(7, 614, 2000000, 0, '2021-06-02', 1622615653, 1),
(8, 222, 0, 2000000, '2021-06-02', 1622615653, 1),
(17, 621, 500000, 0, '2021-06-02', 1622616009, 1),
(18, 115, 0, 500000, '2021-06-02', 1622616009, 1),
(19, 622, 200000, 0, '2021-06-02', 1622616039, 1),
(20, 122, 0, 200000, '2021-06-02', 1622616039, 1),
(21, 623, 100000, 0, '2021-06-02', 1622616061, 1),
(22, 112, 0, 100000, '2021-06-02', 1622616061, 1),
(25, 116, 1100000, 0, '2021-06-02', 1622616177, 1),
(26, 611, 0, 1100000, '2021-06-02', 1622616177, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_umum`
--

CREATE TABLE `jurnal_umum` (
  `id_ju` int(11) NOT NULL,
  `no_akun` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `no_transaksi` varchar(100) NOT NULL,
  `id_piutang_dagang` int(11) NOT NULL,
  `id_utang_dagang` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal_umum`
--

INSERT INTO `jurnal_umum` (`id_ju`, `no_akun`, `tanggal`, `debet`, `kredit`, `no_transaksi`, `id_piutang_dagang`, `id_utang_dagang`, `id_pengguna`) VALUES
(1, 211, '2021-05-09', 1000000, 0, '1621007466', 0, 2, 1),
(2, 512, '2021-05-09', 0, 1000000, '1621007466', 0, 0, 1),
(3, 412, '2021-05-16', 200000, 0, '1621007505', 0, 0, 1),
(4, 113, '2021-05-16', 0, 200000, '1621007505', 1, 0, 1),
(5, 114, '2021-06-19', 5000000, 0, '435456765', 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hakakses` int(11) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama`, `hakakses`, `status`) VALUES
(1, 'sholikhudin', 'sholikhudin', 'Muhamad Sholikhudin', 2, 'Aktif'),
(2, 'yudha', 'yudha', 'Yudha Prasetyo', 3, 'Aktif'),
(3, 'yusuf', 'yusuf', 'Yusuf Hidayat', 1, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang_dagang`
--

CREATE TABLE `piutang_dagang` (
  `id_piutang_dagang` int(11) NOT NULL,
  `no_piutang_dagang` varchar(100) NOT NULL,
  `nama_piutang_dagang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `piutang_dagang`
--

INSERT INTO `piutang_dagang` (`id_piutang_dagang`, `no_piutang_dagang`, `nama_piutang_dagang`) VALUES
(0, '0', '0'),
(1, '112.4', 'Toko Sahara1'),
(2, '112.1', 'Toko Abadi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `syarat`
--

CREATE TABLE `syarat` (
  `id_syarat` int(11) NOT NULL,
  `syarat` varchar(50) NOT NULL,
  `persen` float(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `syarat`
--

INSERT INTO `syarat` (`id_syarat`, `syarat`, `persen`) VALUES
(0, '0/10, n/30', 0),
(1, '1/10, n/30', 0),
(2, '2/10, n/30', 0),
(3, '3/10, n/30', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `utang_dagang`
--

CREATE TABLE `utang_dagang` (
  `id_utang_dagang` int(11) NOT NULL,
  `no_utang_dagang` varchar(100) NOT NULL,
  `nama_utang_dagang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `utang_dagang`
--

INSERT INTO `utang_dagang` (`id_utang_dagang`, `no_utang_dagang`, `nama_utang_dagang`) VALUES
(0, '0', '0'),
(1, '122.3', 'Toko Sahid'),
(2, '211.1', 'PT. WING INDONESIA'),
(3, '211.2', 'PT. INDOFOOD CBC SUKSES MAKMUR');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`no_akun`);

--
-- Indeks untuk tabel `jurnal_pemasukan_kas`
--
ALTER TABLE `jurnal_pemasukan_kas`
  ADD PRIMARY KEY (`id_jkm`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `no_akun` (`no_akun`),
  ADD KEY `id_piutang_dagang` (`id_piutang_dagang`),
  ADD KEY `id_syarat` (`id_syarat`);

--
-- Indeks untuk tabel `jurnal_pembelian`
--
ALTER TABLE `jurnal_pembelian`
  ADD PRIMARY KEY (`id_jb`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `no_akun` (`no_akun`),
  ADD KEY `id_utang_dagang` (`id_utang_dagang`);

--
-- Indeks untuk tabel `jurnal_pengeluaran_kas`
--
ALTER TABLE `jurnal_pengeluaran_kas`
  ADD PRIMARY KEY (`id_jkk`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `no_akun` (`no_akun`),
  ADD KEY `id_utang_dagang` (`id_utang_dagang`),
  ADD KEY `id_syarat` (`id_syarat`);

--
-- Indeks untuk tabel `jurnal_penjualan`
--
ALTER TABLE `jurnal_penjualan`
  ADD PRIMARY KEY (`id_jj`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `no_akun` (`no_akun`),
  ADD KEY `id_piutang_dagang` (`id_piutang_dagang`),
  ADD KEY `id_syarat` (`id_syarat`);

--
-- Indeks untuk tabel `jurnal_penyesuaian`
--
ALTER TABLE `jurnal_penyesuaian`
  ADD PRIMARY KEY (`id_jps`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `no_akun` (`no_akun`);

--
-- Indeks untuk tabel `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
  ADD PRIMARY KEY (`id_ju`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `no_akun` (`no_akun`),
  ADD KEY `id_piutang_dagang` (`id_piutang_dagang`),
  ADD KEY `id_utang_dagang` (`id_utang_dagang`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `piutang_dagang`
--
ALTER TABLE `piutang_dagang`
  ADD PRIMARY KEY (`id_piutang_dagang`);

--
-- Indeks untuk tabel `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`id_syarat`);

--
-- Indeks untuk tabel `utang_dagang`
--
ALTER TABLE `utang_dagang`
  ADD PRIMARY KEY (`id_utang_dagang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jurnal_pemasukan_kas`
--
ALTER TABLE `jurnal_pemasukan_kas`
  MODIFY `id_jkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `jurnal_pembelian`
--
ALTER TABLE `jurnal_pembelian`
  MODIFY `id_jb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `jurnal_pengeluaran_kas`
--
ALTER TABLE `jurnal_pengeluaran_kas`
  MODIFY `id_jkk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `jurnal_penjualan`
--
ALTER TABLE `jurnal_penjualan`
  MODIFY `id_jj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jurnal_penyesuaian`
--
ALTER TABLE `jurnal_penyesuaian`
  MODIFY `id_jps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
  MODIFY `id_ju` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `piutang_dagang`
--
ALTER TABLE `piutang_dagang`
  MODIFY `id_piutang_dagang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `syarat`
--
ALTER TABLE `syarat`
  MODIFY `id_syarat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `utang_dagang`
--
ALTER TABLE `utang_dagang`
  MODIFY `id_utang_dagang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jurnal_pemasukan_kas`
--
ALTER TABLE `jurnal_pemasukan_kas`
  ADD CONSTRAINT `jurnal_pemasukan_kas_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `jurnal_pemasukan_kas_ibfk_2` FOREIGN KEY (`no_akun`) REFERENCES `akun` (`no_akun`),
  ADD CONSTRAINT `jurnal_pemasukan_kas_ibfk_3` FOREIGN KEY (`id_piutang_dagang`) REFERENCES `piutang_dagang` (`id_piutang_dagang`),
  ADD CONSTRAINT `jurnal_pemasukan_kas_ibfk_4` FOREIGN KEY (`id_syarat`) REFERENCES `syarat` (`id_syarat`);

--
-- Ketidakleluasaan untuk tabel `jurnal_pembelian`
--
ALTER TABLE `jurnal_pembelian`
  ADD CONSTRAINT `jurnal_pembelian_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `jurnal_pembelian_ibfk_2` FOREIGN KEY (`no_akun`) REFERENCES `akun` (`no_akun`),
  ADD CONSTRAINT `jurnal_pembelian_ibfk_3` FOREIGN KEY (`id_utang_dagang`) REFERENCES `utang_dagang` (`id_utang_dagang`);

--
-- Ketidakleluasaan untuk tabel `jurnal_pengeluaran_kas`
--
ALTER TABLE `jurnal_pengeluaran_kas`
  ADD CONSTRAINT `jurnal_pengeluaran_kas_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `jurnal_pengeluaran_kas_ibfk_2` FOREIGN KEY (`no_akun`) REFERENCES `akun` (`no_akun`),
  ADD CONSTRAINT `jurnal_pengeluaran_kas_ibfk_3` FOREIGN KEY (`id_utang_dagang`) REFERENCES `utang_dagang` (`id_utang_dagang`),
  ADD CONSTRAINT `jurnal_pengeluaran_kas_ibfk_4` FOREIGN KEY (`id_syarat`) REFERENCES `syarat` (`id_syarat`);

--
-- Ketidakleluasaan untuk tabel `jurnal_penjualan`
--
ALTER TABLE `jurnal_penjualan`
  ADD CONSTRAINT `jurnal_penjualan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `jurnal_penjualan_ibfk_2` FOREIGN KEY (`no_akun`) REFERENCES `akun` (`no_akun`),
  ADD CONSTRAINT `jurnal_penjualan_ibfk_3` FOREIGN KEY (`id_piutang_dagang`) REFERENCES `piutang_dagang` (`id_piutang_dagang`);

--
-- Ketidakleluasaan untuk tabel `jurnal_penyesuaian`
--
ALTER TABLE `jurnal_penyesuaian`
  ADD CONSTRAINT `jurnal_penyesuaian_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `jurnal_penyesuaian_ibfk_2` FOREIGN KEY (`no_akun`) REFERENCES `akun` (`no_akun`);

--
-- Ketidakleluasaan untuk tabel `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
  ADD CONSTRAINT `jurnal_umum_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `jurnal_umum_ibfk_2` FOREIGN KEY (`no_akun`) REFERENCES `akun` (`no_akun`),
  ADD CONSTRAINT `jurnal_umum_ibfk_3` FOREIGN KEY (`id_piutang_dagang`) REFERENCES `piutang_dagang` (`id_piutang_dagang`),
  ADD CONSTRAINT `jurnal_umum_ibfk_4` FOREIGN KEY (`id_utang_dagang`) REFERENCES `utang_dagang` (`id_utang_dagang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
