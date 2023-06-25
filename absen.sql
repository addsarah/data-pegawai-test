-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Nov 2022 pada 09.31
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `karyawan` varchar(11) NOT NULL,
  `masuk` time NOT NULL,
  `terlambat` decimal(6,2) DEFAULT NULL,
  `pulang` time DEFAULT NULL,
  `lembur` decimal(6,2) DEFAULT NULL,
  `tgl_absen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absen`, `karyawan`, `masuk`, `terlambat`, `pulang`, `lembur`, `tgl_absen`) VALUES
(1, 'NIP002', '11:07:00', '3.07', '17:15:00', '0.15', '2022-07-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL,
  `karyawan` varchar(11) NOT NULL,
  `dari` date NOT NULL,
  `sampai` date NOT NULL,
  `lama` int(11) NOT NULL,
  `keterangan` int(11) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `karyawan`, `dari`, `sampai`, `lama`, `keterangan`, `status`) VALUES
(1, 'NIP002', '2022-08-08', '2022-08-12', 5, 3, 'Y'),
(2, 'NIP003', '2022-08-08', '2022-08-09', 2, 2, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'admin'),
(2, 'produksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_cuti`
--

CREATE TABLE `jumlah_cuti` (
  `id` int(11) NOT NULL,
  `karyawan` varchar(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tahun_berlaku` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jumlah_cuti`
--

INSERT INTO `jumlah_cuti` (`id`, `karyawan`, `jumlah`, `tahun_berlaku`) VALUES
(1, 'NIP002', 7, 2022),
(2, 'NIP003', 10, 2022);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `nip` varchar(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama_karyawan`, `gender`, `divisi`) VALUES
('NIP001', 'admin', 'L', 1),
('NIP002', 'M2V Rimuru', 'L', 2),
('NIP003', 'Hanif', 'L', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
('NIP001', 'admin', '12345', 1),
('NIP002', 'm2v', '12345', 2),
('NIP003', 'hanif', '12345', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `jumlah_cuti`
--
ALTER TABLE `jumlah_cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jumlah_cuti`
--
ALTER TABLE `jumlah_cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
