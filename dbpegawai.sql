-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2022 at 03:48 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `tgl_absen` date NOT NULL,
  `masuk` time NOT NULL,
  `terlambat` decimal(6,2) DEFAULT NULL,
  `pulang` time DEFAULT NULL,
  `lembur` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`tgl_absen`, `masuk`, `terlambat`, `pulang`, `lembur`) VALUES
('2022-07-26', '11:07:00', '3.07', '17:15:00', '0.15'),
('2022-11-04', '07:06:00', '0.06', '19:06:00', '2.06'),
('2022-11-04', '07:17:00', '0.17', '20:18:00', '3.18'),
('2022-06-06', '07:19:00', '0.19', '17:00:00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
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
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `karyawan`, `dari`, `sampai`, `lama`, `keterangan`, `status`) VALUES
(1, 'NIP002', '2022-08-08', '2022-08-12', 5, 3, 'Y'),
(2, 'NIP003', '2022-08-08', '2022-08-09', 2, 2, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'admin'),
(2, 'produksi');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_cuti`
--

CREATE TABLE `jumlah_cuti` (
  `id` int(11) NOT NULL,
  `karyawan` varchar(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tahun_berlaku` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jumlah_cuti`
--

INSERT INTO `jumlah_cuti` (`id`, `karyawan`, `jumlah`, `tahun_berlaku`) VALUES
(1, 'NIP002', 7, 2022),
(2, 'NIP003', 10, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nip` varchar(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama_karyawan`, `gender`, `divisi`) VALUES
('NIP001', 'admin', 'L', 1),
('NIP002', 'M2V Rimuru', 'L', 2),
('NIP003', 'Hanif', 'L', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id_absen` int(11) NOT NULL,
  `nip` int(10) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `masuk` time NOT NULL,
  `terlambat` decimal(6,2) DEFAULT NULL,
  `pulang` time DEFAULT NULL,
  `lembur` decimal(6,2) DEFAULT NULL,
  `tgl_absen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`id_absen`, `nip`, `nama_pegawai`, `masuk`, `terlambat`, `pulang`, `lembur`, `tgl_absen`) VALUES
(1, 263001, 'Untoro R', '08:30:00', '30.00', '19:06:56', '2.06', '2022-09-16'),
(16, 263001, 'Husna Hulzanah', '08:00:00', '0.00', '20:34:27', '3.34', '2022-09-29'),
(17, 263001, 'Husna Hulzanah', '08:15:00', '0.15', '19:44:38', '2.24', '2022-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kehadiran`
--

CREATE TABLE `tb_kehadiran` (
  `no` int(5) NOT NULL,
  `nip` int(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_masuk` int(6) DEFAULT NULL,
  `jam_keluar` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kehadiran`
--

INSERT INTO `tb_kehadiran` (`no`, `nip`, `tanggal`, `jam_masuk`, `jam_keluar`) VALUES
(12, 263001, '2022-09-16', 8, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluarga`
--

CREATE TABLE `tb_keluarga` (
  `no` int(5) NOT NULL,
  `nik` int(10) NOT NULL,
  `nama` varchar(15) DEFAULT NULL,
  `hubungan` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(35) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(30) DEFAULT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keluarga`
--

INSERT INTO `tb_keluarga` (`no`, `nik`, `nama`, `hubungan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pekerjaan`) VALUES
(6, 317502344, 'Hafif', 'Suami', 'Jakarta', '1985-03-03', 'Laki - laki', 'Karyawan Swasta'),
(12, 317502577, 'Husna Hulzanah', 'Anak Kandung', 'Bogor', '2010-04-01', 'Perempuan\r\n', 'Pelajar\r\n'),
(15, 317502122, 'Adistty', 'Anak Kandung', 'Bogor', '2015-03-28', 'Laki - Laki', 'Pelajar\r\n'),
(18, 317502134, 'Absgfeu Hjjbd', 'Anak Kandung', 'Jakarta', '2018-06-28', 'Perempuan', '-'),
(19, 317502563, 'Absgfeu Hgjhg', 'Anak Kandung', 'Jakarta ', '2020-10-28', 'Laki - Laki', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `no` int(5) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama_karyawan` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `divisi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`no`, `nip`, `nama_karyawan`, `jabatan`, `divisi`) VALUES
(6, '273001', 'Hafif', 'Technical Support', 'Umum'),
(9, '273003', 'Mas Untoro', 'Technical Support', 'Ketenagakerjaan\r\n'),
(10, '263001', 'Untoro R', 'Technical Support', 'Staff'),
(12, '283001', 'Husna Hulzanah', 'Accounting', 'Personalia\r\n'),
(14, '263008', 'Adistty R', 'Manager', 'Personalia'),
(15, '263003', 'Adistty', 'Finance', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan_formal`
--

CREATE TABLE `tb_pendidikan_formal` (
  `no` int(5) NOT NULL,
  `sekolah` varchar(35) DEFAULT NULL,
  `lokasi` varchar(20) DEFAULT NULL,
  `tanggal_ijazah` date DEFAULT NULL,
  `no_ijazah` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendidikan_formal`
--

INSERT INTO `tb_pendidikan_formal` (`no`, `sekolah`, `lokasi`, `tanggal_ijazah`, `no_ijazah`) VALUES
(6, 'SD Global Islamic School', 'Jakarta Timur', '1990-05-18', 776893727),
(12, 'SMPN 115 Jakarta', 'Jakarta Timur', '1993-05-28', 888893730),
(15, 'SMAN 8 Jakarta', 'Jakarta Timur', '1996-06-12', 889989370);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `no` int(5) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama_karyawan` varchar(100) DEFAULT NULL,
  `level` enum('admin','user','superuser') DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`no`, `nip`, `nama_karyawan`, `level`, `password`) VALUES
(1, '283005', 'admin1', 'admin', 'admin1_'),
(2, '273007', 'admin2', 'admin', 'admin2_'),
(3, '263006', 'user1', 'user', 'user1_');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
('NIP001', 'admin', '12345', 1),
('NIP002', 'm2v', '12345', 2),
('NIP003', 'hanif', '12345', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jumlah_cuti`
--
ALTER TABLE `jumlah_cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_keluarga`
--
ALTER TABLE `tb_keluarga`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_pendidikan_formal`
--
ALTER TABLE `tb_pendidikan_formal`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jumlah_cuti`
--
ALTER TABLE `jumlah_cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_keluarga`
--
ALTER TABLE `tb_keluarga`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_pendidikan_formal`
--
ALTER TABLE `tb_pendidikan_formal`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
