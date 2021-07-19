-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 06:52 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simnik`
--

-- --------------------------------------------------------

--
-- Table structure for table `detil_kandungan`
--

CREATE TABLE `detil_kandungan` (
  `id_detkan` varchar(6) NOT NULL,
  `id_kandungan` varchar(6) NOT NULL,
  `id_obt` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_alergi`
--

CREATE TABLE `tb_alergi` (
  `id_alergi` varchar(6) NOT NULL,
  `id_obt` varchar(6) NOT NULL,
  `kode_alergi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dftr`
--

CREATE TABLE `tb_dftr` (
  `id_dftr` varchar(6) NOT NULL,
  `tgl_dftr` datetime NOT NULL,
  `umur` int(11) NOT NULL,
  `jenis_pasien` int(11) NOT NULL,
  `poli_tujuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hak`
--

CREATE TABLE `tb_hak` (
  `id_hak` int(3) NOT NULL,
  `nm_hak` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kandungan`
--

CREATE TABLE `tb_kandungan` (
  `id_kandungan` varchar(6) NOT NULL,
  `desc_kandungan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lab`
--

CREATE TABLE `tb_lab` (
  `id_lab` varchar(3) NOT NULL,
  `nm_lab` varchar(30) NOT NULL,
  `trf_lab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_obt`
--

CREATE TABLE `tb_obt` (
  `id_obt` varchar(6) NOT NULL,
  `nm_obt` varchar(30) NOT NULL,
  `hrg_obt` int(11) NOT NULL,
  `stok_obt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(6) NOT NULL,
  `id_user` varchar(3) NOT NULL,
  `no_reg_pasien` varchar(8) NOT NULL,
  `nm_pasien` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lhr_pasien` datetime NOT NULL,
  `kk_pasien` varchar(30) NOT NULL,
  `j_kel_pasien` int(11) NOT NULL,
  `almt_paisen` varchar(50) NOT NULL,
  `kota_pasien` varchar(20) NOT NULL,
  `kec_pasien` varchar(20) NOT NULL,
  `desa_pasien` varchar(20) NOT NULL,
  `pkjr_pasien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` varchar(6) NOT NULL,
  `id_periksa` varchar(6) NOT NULL,
  `tot_id_pembayaran` varchar(6) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `tgl_pembayaran` datetime NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran_resep`
--

CREATE TABLE `tb_pembayaran_resep` (
  `id_pembayaran_resep` varchar(6) NOT NULL,
  `id_periksa` varchar(6) NOT NULL,
  `tot_id_pembayaran_resep` varchar(6) NOT NULL,
  `total_pembayaran_resep` int(11) NOT NULL,
  `tgl_pembayaran_resep` datetime NOT NULL,
  `status_pembayaran_resep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_periksa`
--

CREATE TABLE `tb_periksa` (
  `id_periksa` varchar(6) NOT NULL,
  `id_pasien` varchar(6) NOT NULL,
  `id_dftr` varchar(6) NOT NULL,
  `id_pnykt` varchar(6) NOT NULL,
  `id_tindakan` varchar(6) NOT NULL,
  `id_lab` varchar(6) NOT NULL,
  `id_alergi` varchar(6) NOT NULL,
  `id_obt` varchar(6) NOT NULL,
  `anamnesa` text NOT NULL,
  `status_periksa` int(11) NOT NULL,
  `catatan_periksa` text NOT NULL,
  `tot_biaya_periksa` int(11) NOT NULL,
  `tot_biaya_resep` int(11) NOT NULL,
  `tgl_periksa` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pnykt`
--

CREATE TABLE `tb_pnykt` (
  `id_pnykt` varchar(6) NOT NULL,
  `nm_pnykt` varchar(30) NOT NULL,
  `kd_pnykt` varchar(6) NOT NULL,
  `jenis_pnykt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tindakan`
--

CREATE TABLE `tb_tindakan` (
  `id_tindakan` varchar(3) NOT NULL,
  `nm_tindakan` varchar(30) NOT NULL,
  `kd_tindakan` varchar(5) NOT NULL,
  `tarifdlm_tindakan` int(11) NOT NULL,
  `tarifluar_tindakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(3) NOT NULL,
  `id_hak` int(1) NOT NULL,
  `nm_user` varchar(30) NOT NULL,
  `pass_user` varchar(20) NOT NULL,
  `j_kel` enum('Laki-Laki','Perempuan') NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `total_periksa`
--

CREATE TABLE `total_periksa` (
  `id_periksa` varchar(6) NOT NULL,
  `id_pembayaran` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `total_resep`
--

CREATE TABLE `total_resep` (
  `id_periksa` varchar(6) NOT NULL,
  `id_pembayaran_resep` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detil_kandungan`
--
ALTER TABLE `detil_kandungan`
  ADD PRIMARY KEY (`id_detkan`),
  ADD KEY `id_kandungan` (`id_kandungan`),
  ADD KEY `id_obt` (`id_obt`);

--
-- Indexes for table `tb_alergi`
--
ALTER TABLE `tb_alergi`
  ADD PRIMARY KEY (`id_alergi`),
  ADD KEY `id_obt` (`id_obt`);

--
-- Indexes for table `tb_dftr`
--
ALTER TABLE `tb_dftr`
  ADD PRIMARY KEY (`id_dftr`);

--
-- Indexes for table `tb_hak`
--
ALTER TABLE `tb_hak`
  ADD PRIMARY KEY (`id_hak`);

--
-- Indexes for table `tb_kandungan`
--
ALTER TABLE `tb_kandungan`
  ADD PRIMARY KEY (`id_kandungan`);

--
-- Indexes for table `tb_lab`
--
ALTER TABLE `tb_lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `tb_obt`
--
ALTER TABLE `tb_obt`
  ADD PRIMARY KEY (`id_obt`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_periksa` (`id_periksa`);

--
-- Indexes for table `tb_pembayaran_resep`
--
ALTER TABLE `tb_pembayaran_resep`
  ADD PRIMARY KEY (`id_pembayaran_resep`),
  ADD KEY `id_periksa` (`id_periksa`);

--
-- Indexes for table `tb_periksa`
--
ALTER TABLE `tb_periksa`
  ADD PRIMARY KEY (`id_periksa`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dftr` (`id_dftr`),
  ADD KEY `id_pnykt` (`id_pnykt`),
  ADD KEY `id_tindakan` (`id_tindakan`),
  ADD KEY `id_lab` (`id_lab`),
  ADD KEY `id_obt` (`id_obt`),
  ADD KEY `id_alergi` (`id_alergi`);

--
-- Indexes for table `tb_pnykt`
--
ALTER TABLE `tb_pnykt`
  ADD PRIMARY KEY (`id_pnykt`);

--
-- Indexes for table `tb_tindakan`
--
ALTER TABLE `tb_tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_hak` (`id_hak`);

--
-- Indexes for table `total_periksa`
--
ALTER TABLE `total_periksa`
  ADD KEY `id_pembayaran` (`id_pembayaran`),
  ADD KEY `id_periksa` (`id_periksa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_hak`
--
ALTER TABLE `tb_hak`
  MODIFY `id_hak` int(3) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_kandungan`
--
ALTER TABLE `detil_kandungan`
  ADD CONSTRAINT `detil_kandungan_ibfk_1` FOREIGN KEY (`id_kandungan`) REFERENCES `tb_kandungan` (`id_kandungan`),
  ADD CONSTRAINT `detil_kandungan_ibfk_2` FOREIGN KEY (`id_obt`) REFERENCES `tb_obt` (`id_obt`);

--
-- Constraints for table `tb_alergi`
--
ALTER TABLE `tb_alergi`
  ADD CONSTRAINT `tb_alergi_ibfk_1` FOREIGN KEY (`id_obt`) REFERENCES `tb_obt` (`id_obt`);

--
-- Constraints for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD CONSTRAINT `tb_pasien_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_periksa`) REFERENCES `tb_periksa` (`id_periksa`);

--
-- Constraints for table `tb_pembayaran_resep`
--
ALTER TABLE `tb_pembayaran_resep`
  ADD CONSTRAINT `tb_pembayaran_resep_ibfk_1` FOREIGN KEY (`id_periksa`) REFERENCES `tb_periksa` (`id_periksa`);

--
-- Constraints for table `tb_periksa`
--
ALTER TABLE `tb_periksa`
  ADD CONSTRAINT `tb_periksa_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  ADD CONSTRAINT `tb_periksa_ibfk_2` FOREIGN KEY (`id_dftr`) REFERENCES `tb_dftr` (`id_dftr`),
  ADD CONSTRAINT `tb_periksa_ibfk_3` FOREIGN KEY (`id_pnykt`) REFERENCES `tb_pnykt` (`id_pnykt`),
  ADD CONSTRAINT `tb_periksa_ibfk_4` FOREIGN KEY (`id_tindakan`) REFERENCES `tb_tindakan` (`id_tindakan`),
  ADD CONSTRAINT `tb_periksa_ibfk_5` FOREIGN KEY (`id_lab`) REFERENCES `tb_lab` (`id_lab`),
  ADD CONSTRAINT `tb_periksa_ibfk_6` FOREIGN KEY (`id_obt`) REFERENCES `tb_obt` (`id_obt`),
  ADD CONSTRAINT `tb_periksa_ibfk_7` FOREIGN KEY (`id_alergi`) REFERENCES `tb_alergi` (`id_alergi`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_hak`) REFERENCES `tb_hak` (`id_hak`);

--
-- Constraints for table `total_periksa`
--
ALTER TABLE `total_periksa`
  ADD CONSTRAINT `total_periksa_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `tb_pembayaran` (`id_pembayaran`),
  ADD CONSTRAINT `total_periksa_ibfk_2` FOREIGN KEY (`id_periksa`) REFERENCES `tb_periksa` (`id_periksa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
