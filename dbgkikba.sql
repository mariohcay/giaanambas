-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2021 at 12:47 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgkikba`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_ibadah`
--

CREATE TABLE `tb_ibadah` (
  `kodeIbadah` varchar(128) NOT NULL,
  `namaIbadah` varchar(256) NOT NULL,
  `temaIbadah` varchar(256) NOT NULL,
  `tanggalIbadah` date NOT NULL,
  `jamIbadah` varchar(128) NOT NULL,
  `kuota` int(3) NOT NULL,
  `link` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ibadah`
--

INSERT INTO `tb_ibadah` (`kodeIbadah`, `namaIbadah`, `temaIbadah`, `tanggalIbadah`, `jamIbadah`, `kuota`, `link`, `image`, `deskripsi`) VALUES
('IB02052021', 'Ibadah Minggu Paskah V', 'Bertumbuh dalam Kristus, Berbuah dalam Karya', '2021-05-02', '07.00', 75, 'https://www.youtube.com/embed/44zD2i5FSB4', 'Thumbnail-2 Mei 2021.jpg', 'Pelayan Firman:\r\nSdri. Nella Simamora\r\n\r\nPelayan Liturgi:\r\nPnt. Eltoni Hutabarat\r\nPenanggung Jawab Ibadah:\r\nMajelis Jemaat Bidang P2K\r\n\r\nPemandu Pujian:\r\nBp. Alfero Valentino, Sdri. Ericha\r\nPengiring :\r\nIbu Merryane\r\n\r\nPra Produksi – Produksi :\r\nTim Liturgi, Tim Multimedia dan Komisi Pemuda Remaja GKI Kebonagung'),
('IB09052021', 'Ibadah Minggu Paskah VI', 'Dipersatukan dalam Sang Pokok Anggur', '2021-05-09', '07.00', 75, 'https://www.youtube.com/embed/uKpsVIQx-pI', 'Thumbnail-9 Mei 2021.jpg', 'Pelayan Firman:\r\nPdt. Imanuel Gunawan Prasidi\r\n\r\nPelayan Liturgi:\r\nPnt. Wara Wirasthi\r\nPenanggung Jawab Ibadah:\r\nMajelis Jemaat Bidang P2K\r\n\r\nPemandu Pujian:\r\nSdri. Ericha, Sdr. Octavianus Surya G.\r\nPengiring :\r\nIbu Suliani\r\n\r\nPra Produksi – Produksi :\r\nTim Liturgi, Tim Multimedia dan Komisi Pemuda Remaja GKI Kebonagung'),
('IB13052021', 'Ibadah Kenaikan Tuhan Yesus ke Sorga', 'Menjadi Saksi dalam Hikmat-Nya', '2021-05-13', '17.00', 75, 'https://www.youtube.com/embed/kjXXKnG3bes', 'Thumbnail-13 Mei 2021.jpg', 'Pelayan Firman:\r\nPdt. Edi Wahono\r\n\r\nPelayan Liturgi:\r\nPnt. Sugianto\r\nPenanggung Jawab Ibadah:\r\nMajelis Jemaat Bidang P2K\r\n\r\nPemandu Pujian:\r\nBpk. Ajar, Sdri. Agnes Kristanti\r\nPengiring :\r\nIbu Merryane\r\n\r\nPra Produksi – Produksi :\r\nTim Liturgi, Tim Multimedia dan Komisi Pemuda Remaja GKI Kebonagung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jemaat`
--

CREATE TABLE `tb_jemaat` (
  `id` varchar(128) NOT NULL,
  `username` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `jenisKelamin` varchar(128) NOT NULL,
  `tempatLahir` varchar(256) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `telepon` varchar(128) NOT NULL,
  `lingkungan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jemaat`
--

INSERT INTO `tb_jemaat` (`id`, `username`, `nama`, `jenisKelamin`, `tempatLahir`, `tanggalLahir`, `alamat`, `email`, `password`, `telepon`, `lingkungan`) VALUES
('JM100001', 'mariohcay', 'Mario Hendral Christanto Ay', 'Laki-laki', 'Malang', '1998-06-21', 'Jl. Kauman 99 RT.20 RW.03 Kebonagung Pakisaji Malang', 'mariohcay@gmail.com', '$2y$10$CmspJqCer5SOUhiDqSFX8uu/nE6SrqeOS4XNzqLy9YpaJQuRwfjoO', '085767988232', 'D'),
('JM100002', 'Agneskristianti', 'Agnes Kristianti Novilda', 'Perempuan', 'Malang', '1996-11-07', 'Perum metro residence no B5 - bandulan gang 8 - malang', 'agnesnovilda@gmail.com', '$2y$10$VYJab8jupvYEt5j7nnbPXOr6itJyoRdLHT6Va31SWNAooYazDAeHC', '082141280525', 'C'),
('JM100003', 'Rivaldianjar', 'Rivaldi Anjar Saputra', 'Laki-laki', 'Malang', '1995-01-06', 'Metro Residence B5, Bandulan', 'valdianjar161@gmail.com', '$2y$10$b12VRx0at2os8wgy.uc5cu2GpxZzxx/Exd.602N5cTkz0tB7wcqce', '08156122097', 'C'),
('JM100004', 'Suryabstrak', 'Octavianus surya gumilang', 'Laki-laki', 'Malang', '2000-10-26', 'Jl.kauman no.122 Rt.18 Rw.03 Kebonagung, Pakisaji, Malang', 'suryagumilang09@gmail.com', '$2y$10$aEYb2RqPIWvgcGh4NSQo1egyD0vxrlOr99DbPGvZJRrLqWyj6djZO', '089505742900', 'D'),
('JM100005', 'Marsell11', 'Marsellino Prawiro Halim', 'Laki-laki', 'Pasuruan', '2000-03-14', 'Jl. Kebonsari no. 14', 'satria.marsel@gmail.com', '$2y$10$FBWra8H0kNn3uOkLNYpEl.Ud/ZPJ56yQJgBiW5TrZvEtzB3aiwYDG', '0895339113941', 'B'),
('JM100006', 'vashtibrina', 'Vashti Brina Wibiyanto', 'Perempuan', 'Malang', '1996-08-14', 'Perun Sari Madu E no 6, Sitirejo, Wagir - Malang', 'vashti.brina6@gmail.com', '$2y$10$ZOemmASphz6CzmHaXGwa2OK5CfzX8jeS7CYPScjGr5hyih/SVsj7i', '085852863323', 'E'),
('JM100007', 'Nelsmr', 'Nella Simamora', 'Perempuan', 'Kuningan', '1996-05-30', 'Jl. Magersari Utara No. 31 RT 02 RW 01 Kebonagung, Pakisaji, Malang, Jawa Timur, 65161', 'nelsmr96@gmail.com', '$2y$10$x.m7v8CNHialFIDMsK70feLEuY306J.ZXkJS46zXeOrLXEnbr8Fim', '08986816454', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kehadiran`
--

CREATE TABLE `tb_kehadiran` (
  `id` varchar(128) NOT NULL,
  `kodeIbadah` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kehadiran`
--

INSERT INTO `tb_kehadiran` (`id`, `kodeIbadah`, `status`) VALUES
('JM100001', 'IB13052021', 'TERDAFTAR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ibadah`
--
ALTER TABLE `tb_ibadah`
  ADD PRIMARY KEY (`kodeIbadah`);

--
-- Indexes for table `tb_jemaat`
--
ALTER TABLE `tb_jemaat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
