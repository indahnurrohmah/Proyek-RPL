-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 03:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vet`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambul`
--

CREATE TABLE `ambul` (
  `id_ambul` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_pemeriksaan` varchar(20) NOT NULL,
  `sikap_berdiri` varchar(20) NOT NULL,
  `turgor_kulit` varchar(20) NOT NULL,
  `mukosa_mata` varchar(20) NOT NULL,
  `cermin_hidung` varchar(20) NOT NULL,
  `intergumen` varchar(20) NOT NULL,
  `alat_gerak` varchar(20) NOT NULL,
  `sirkulasi` varchar(20) NOT NULL,
  `pencernaan` varchar(20) NOT NULL,
  `genetal` varchar(20) NOT NULL,
  `diagnosa` text NOT NULL,
  `prognosa` text NOT NULL,
  `pengobatan` varchar(20) NOT NULL,
  `pemeriksaan_ulang` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ambul`
--

INSERT INTO `ambul` (`id_ambul`, `id_dokter`, `id_pemeriksaan`, `sikap_berdiri`, `turgor_kulit`, `mukosa_mata`, `cermin_hidung`, `intergumen`, `alat_gerak`, `sirkulasi`, `pencernaan`, `genetal`, `diagnosa`, `prognosa`, `pengobatan`, `pemeriksaan_ulang`, `tanggal`) VALUES
(8, 1, '2023060922305114', 'Ambruk', 'Lambat', 'Pucat', 'Basah', 'Kemerahan', 'Tidak Sakit', 'Tidak Ada', 'Normal', 'Normal', 'Infeksi Bakteri', 'Fausta', 'Antibiotik', 'Perlu', '2023-06-09 23:20:00'),
(9, 1, '2023060922305114', 'Tegak', 'Cepat Kembali', 'Merah Muda', 'Basah', '-', 'Tidak Sakit', 'Tidak Ada', 'Normal', 'Normal', 'Infeksi Bakteri', 'Fausta', 'Antibiotik', 'Perlu', '2023-06-10 08:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `data_checkup`
--

CREATE TABLE `data_checkup` (
  `id_dataCheckUp` int(11) NOT NULL,
  `id_pemeriksaan` varchar(20) DEFAULT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_penitipan` int(11) DEFAULT NULL,
  `perawatan` varchar(20) NOT NULL,
  `habitus` varchar(20) NOT NULL,
  `gizi` varchar(20) NOT NULL,
  `suhu` varchar(10) NOT NULL,
  `napas` varchar(10) NOT NULL,
  `nadi` varchar(10) NOT NULL,
  `pertumbuhan_badan` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_checkup`
--

INSERT INTO `data_checkup` (`id_dataCheckUp`, `id_pemeriksaan`, `id_dokter`, `id_penitipan`, `perawatan`, `habitus`, `gizi`, `suhu`, `napas`, `nadi`, `pertumbuhan_badan`, `tanggal`) VALUES
(14, '2023060922305114', 1, NULL, 'Liar', 'Pendiam', 'Buruk', '39', '30', '132', 'Buruk', '2023-06-09 22:54:00'),
(15, NULL, 1, 6, 'Liar', 'Pendiam', 'Buruk', '40', '28', '131', 'Buruk', '2023-06-09 08:45:00'),
(16, '2023060922305114', 1, NULL, 'Liar', 'Pendiam', 'Buruk', '38', '20', '130', 'Sedang', '2023-06-10 08:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `data_pemeriksaan`
--

CREATE TABLE `data_pemeriksaan` (
  `id_pemeriksaan` varchar(20) NOT NULL,
  `id_hewan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pemeriksaan`
--

INSERT INTO `data_pemeriksaan` (`id_pemeriksaan`, `id_hewan`) VALUES
('2023060922305114', 14),
('2023061008322314', 14),
('2023061008404014', 14),
('2023061008404614', 14),
('2023061008441316', 16),
('2023061008462717', 17);

-- --------------------------------------------------------

--
-- Table structure for table `data_penitipan`
--

CREATE TABLE `data_penitipan` (
  `id_penitipan` int(11) NOT NULL,
  `id_hewan` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_penitipan`
--

INSERT INTO `data_penitipan` (`id_penitipan`, `id_hewan`, `tanggal_masuk`, `tanggal_keluar`) VALUES
(6, 14, '2023-06-09', '2023-06-12'),
(9, 16, '2023-06-11', '2023-06-14'),
(10, 17, '2023-06-11', '2023-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `dokter_hewan`
--

CREATE TABLE `dokter_hewan` (
  `id_dokter` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `spesialisasi` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter_hewan`
--

INSERT INTO `dokter_hewan` (`id_dokter`, `nama`, `spesialisasi`, `password`) VALUES
(1, 'Damian Wayne', 'Cardiology', 'nightwing');

-- --------------------------------------------------------

--
-- Table structure for table `hewan`
--

CREATE TABLE `hewan` (
  `id_hewan` int(11) NOT NULL,
  `nama_hewan` varchar(30) NOT NULL,
  `nama_pemilik` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_wa_pemilik` varchar(20) NOT NULL,
  `umur` varchar(30) NOT NULL,
  `spesies` varchar(20) NOT NULL,
  `ras` varchar(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `berat` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(6) NOT NULL,
  `tanda_khusus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hewan`
--

INSERT INTO `hewan` (`id_hewan`, `nama_hewan`, `nama_pemilik`, `alamat`, `no_wa_pemilik`, `umur`, `spesies`, `ras`, `warna`, `berat`, `jenis_kelamin`, `tanda_khusus`) VALUES
(14, 'Mulia', 'Jason', 'Jalan Damai, Sleman', '081112225768', '1 Tahun 2 Bulan', 'Kucing', 'Busok', 'Abu-abu', '1.6 kg', 'Betina', 'Ekor bengkok'),
(16, 'Mollie', 'Cassandra', 'Jalan Gotham', '089998881234', '2 Tahun 3 Bulan', 'Anjing', 'Bull', 'Hitam', '3.6 kg', 'Jantan', 'Loreng Putih'),
(17, 'Muliasari', 'Tes', 'Tes', '02919320', 'tes', 'Kucing', 'tes', 'tes', 'tes', 'tes', 'tes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambul`
--
ALTER TABLE `ambul`
  ADD PRIMARY KEY (`id_ambul`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_pemeriksaan` (`id_pemeriksaan`);

--
-- Indexes for table `data_checkup`
--
ALTER TABLE `data_checkup`
  ADD PRIMARY KEY (`id_dataCheckUp`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_penitipan` (`id_penitipan`),
  ADD KEY `id_pemeriksaan` (`id_pemeriksaan`);

--
-- Indexes for table `data_pemeriksaan`
--
ALTER TABLE `data_pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`),
  ADD KEY `id_hewan` (`id_hewan`);

--
-- Indexes for table `data_penitipan`
--
ALTER TABLE `data_penitipan`
  ADD PRIMARY KEY (`id_penitipan`),
  ADD KEY `id_hewan` (`id_hewan`);

--
-- Indexes for table `dokter_hewan`
--
ALTER TABLE `dokter_hewan`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `hewan`
--
ALTER TABLE `hewan`
  ADD PRIMARY KEY (`id_hewan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambul`
--
ALTER TABLE `ambul`
  MODIFY `id_ambul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_checkup`
--
ALTER TABLE `data_checkup`
  MODIFY `id_dataCheckUp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `data_penitipan`
--
ALTER TABLE `data_penitipan`
  MODIFY `id_penitipan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dokter_hewan`
--
ALTER TABLE `dokter_hewan`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hewan`
--
ALTER TABLE `hewan`
  MODIFY `id_hewan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ambul`
--
ALTER TABLE `ambul`
  ADD CONSTRAINT `ambul_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter_hewan` (`id_dokter`),
  ADD CONSTRAINT `ambul_ibfk_2` FOREIGN KEY (`id_pemeriksaan`) REFERENCES `data_pemeriksaan` (`id_pemeriksaan`);

--
-- Constraints for table `data_checkup`
--
ALTER TABLE `data_checkup`
  ADD CONSTRAINT `data_checkup_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter_hewan` (`id_dokter`),
  ADD CONSTRAINT `data_checkup_ibfk_3` FOREIGN KEY (`id_penitipan`) REFERENCES `data_penitipan` (`id_penitipan`),
  ADD CONSTRAINT `data_checkup_ibfk_4` FOREIGN KEY (`id_pemeriksaan`) REFERENCES `data_pemeriksaan` (`id_pemeriksaan`);

--
-- Constraints for table `data_pemeriksaan`
--
ALTER TABLE `data_pemeriksaan`
  ADD CONSTRAINT `data_pemeriksaan_ibfk_1` FOREIGN KEY (`id_hewan`) REFERENCES `hewan` (`id_hewan`);

--
-- Constraints for table `data_penitipan`
--
ALTER TABLE `data_penitipan`
  ADD CONSTRAINT `data_penitipan_ibfk_1` FOREIGN KEY (`id_hewan`) REFERENCES `hewan` (`id_hewan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
