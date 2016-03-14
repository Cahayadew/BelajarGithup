-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Mei 2015 pada 14.04
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_bimbel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
`id_kelas` int(10) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `jenjang_kelas` varchar(5) NOT NULL,
  `tingkat_kelas` int(2) NOT NULL,
  `jurusan_kelas` varchar(3) DEFAULT NULL,
  `paket_kelas` varchar(15) NOT NULL,
  `kapasitas_kelas` int(2) NOT NULL,
  `hari_kelas` varchar(60) NOT NULL,
  `jam_kelas` varchar(60) NOT NULL,
  `id_tentor` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `jenjang_kelas`, `tingkat_kelas`, `jurusan_kelas`, `paket_kelas`, `kapasitas_kelas`, `hari_kelas`, `jam_kelas`, `id_tentor`) VALUES
(23, 'RT1', 'SMP', 7, '', 'Intensif UN', 15, 'Rabu & Sabtu', '13.00-14.30', 12),
(24, 'RB2', 'SD', 4, '', 'Gold', 20, 'Selasa & Jumat', '13.00-14.30', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE IF NOT EXISTS `tb_siswa` (
`id_siswa` int(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `hp_siswa` varchar(15) NOT NULL,
  `alamat_siswa` varchar(100) NOT NULL,
  `sekolah_siswa` varchar(100) NOT NULL,
  `foto_siswa` longblob NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `peringkat_siswa` int(2) NOT NULL,
  `anak_siswa` varchar(10) NOT NULL,
  `harga_siswa` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nama_siswa`, `hp_siswa`, `alamat_siswa`, `sekolah_siswa`, `foto_siswa`, `id_kelas`, `peringkat_siswa`, `anak_siswa`, `harga_siswa`) VALUES
(191, 'Joko Widodo', '087489378468', 'Jl Anyar 45 Solo', 'N 1 Anyar', 0x666f746f5f73697377612f42616c656b6f746120546173696b6d616c6179612e6a7067, 23, 1, 'Ya', 2000000),
(192, 'John C Maxwell', '087299018729', 'USA', 'New York', 0x666f746f5f73697377612f4170706c652053756e20426174752e6a7067, 23, 1, 'Tidak', 2500000),
(193, 'Ahmad Tantowi', '087872918928', 'Ujung Israel', 'N 1 Ujung Israel', 0x666f746f5f73697377612f42616c656b6f746120546173696b6d616c6179612e6a7067, 23, 0, 'Ya', 500000),
(194, 'Sinta Jojo', '087389189289', 'Bintaro Jakarta Selatan', 'N 88 Jakarta', 0x666f746f5f73697377612f426174752e6a7067, 23, 3, 'Tidak', 700000),
(195, 'Susilowati', '086179827897', 'Cikeas Timur', 'N 1 Cikeas', 0x666f746f5f73697377612f426f726f627564757220536c656d616e2e6a7067, 23, 2, 'Ya', 100000),
(196, 'Hamdan ATT', '08781972905', 'NTT', 'N1 NTT', 0x666f746f5f73697377612f426f726f627564757220536c656d616e2e6a7067, 23, 0, 'Tidak', 1000000),
(197, 'Syiami Ramadhan', '087982793901', 'Singosari Malang', 'N 5 Malang', 0x666f746f5f73697377612f426f73732053757261626179612e6a7067, 23, 3, 'Tidak', 700000),
(202, 'arinda', '085755879038', 'blitar', 'SMA 2 Blitar', 0x666f746f5f73697377612f4d757365756d203130204e6f762053757261626179612e6a7067, 23, 0, 'Ya', 500000),
(203, 'udin', '089283749', 'palangkaraya', 'SMA 1 Malang', 0x666f746f5f73697377612f494246204a616b617274612e6a7067, 23, 2, 'Tidak', 600000),
(204, 'andra', '0817287389', 'palangkaraya', 'SMA jakarta', 0x666f746f5f73697377612f44616461686120546173696b6d616c6179612e6a7067, 23, 2, 'Tidak', 600000),
(205, 'beni', '08747728837', 'bandung', 'SMA 4 tasikmalaya', 0x666f746f5f73697377612f4d65736a6964204a696e204d616c616e672e6a7067, 23, 0, 'Tidak', 1000000),
(206, 'zumaira', '0918828999', 'malang', 'SMA 2 malang', 0x666f746f5f73697377612f5572756720546173696b6d616c6179612e6a7067, 23, 3, 'Tidak', 700000),
(207, 'yajidq', '087787729847', 'surabaya', 'SMA 12 Madiun', 0x666f746f5f73697377612f494246204a616b617274612e6a7067, 23, 0, 'Tidak', 1000000),
(208, 'LATIFA', '0898100288829', 'TASIK', 'SMA 12 Madiun', 0x666f746f5f73697377612f416e636f6c204a616b617274612e6a7067, 23, 0, 'Tidak', 1000000),
(218, 'askfh', '9824', 'ajksg', 'agkjh', 0x666f746f5f73697377612f437562616e20526f6e646f20426174752e6a7067, 23, 0, 'Tidak', 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tentor`
--

CREATE TABLE IF NOT EXISTS `tb_tentor` (
`id_tentor` int(20) NOT NULL,
  `nama_tentor` varchar(50) NOT NULL,
  `hp_tentor` varchar(15) NOT NULL,
  `alamat_tentor` varchar(100) NOT NULL,
  `email_tentor` varchar(100) NOT NULL,
  `agama_tentor` varchar(10) DEFAULT NULL,
  `tl_tentor` date NOT NULL,
  `gaji_tentor` int(15) NOT NULL,
  `foto_tentor` longblob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tentor`
--

INSERT INTO `tb_tentor` (`id_tentor`, `nama_tentor`, `hp_tentor`, `alamat_tentor`, `email_tentor`, `agama_tentor`, `tl_tentor`, `gaji_tentor`, `foto_tentor`) VALUES
(12, 'Abdul Latif', '08998679773', 'Jl. Kertoraharjo Dalam 11G Malang', 'me@abdullatif.com', 'Islam', '1997-01-18', 8000000, 0x666f746f5f74656e746f722f416264756c204c617469662e6a7067);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
 ADD PRIMARY KEY (`id_kelas`), ADD KEY `id_tentor` (`id_tentor`), ADD KEY `id_tentor_2` (`id_tentor`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
 ADD PRIMARY KEY (`id_siswa`), ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_tentor`
--
ALTER TABLE `tb_tentor`
 ADD PRIMARY KEY (`id_tentor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=219;
--
-- AUTO_INCREMENT for table `tb_tentor`
--
ALTER TABLE `tb_tentor`
MODIFY `id_tentor` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
ADD CONSTRAINT `tb_kelas_ibfk_1` FOREIGN KEY (`id_tentor`) REFERENCES `tb_tentor` (`id_tentor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
