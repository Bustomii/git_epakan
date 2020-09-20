-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2020 at 03:54 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epakan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pesanan` varchar(30) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(20) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `total_keuntungan` int(11) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `alamat_antar` text NOT NULL,
  `status` enum('belum bayar','diproses','dikirim','diterima','batal','diambil') NOT NULL DEFAULT 'belum bayar',
  `ambil` tinyint(1) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail`, `id_pesanan`, `id_penjual`, `id_pembeli`, `id_produk`, `harga`, `ongkir`, `total_keuntungan`, `jumlah`, `alamat_antar`, `status`, `ambil`, `created_at`, `updated_at`) VALUES
(325, 'UI190718030114', 34, 49, 42, 1000, 0, 1000, 1, 'Pembeli Mengambil Sendiri Pesanannya', 'belum bayar', 1, '2019-07-18 03:01:19', '2019-07-18 03:01:19'),
(326, 'GS190718094952', 34, 30, 43, 115000, 500000, 615000, 1, 'hajakak ,Bumi Waras ,Bandar Lampung', 'belum bayar', 0, '2019-07-18 09:49:55', '2019-07-18 09:49:55'),
(330, 'US190729010004', 22, 51, 36, 12000, 15000, 27000, 1, 'Blok C ,Bumi Waras ,Bandar Lampung', 'diterima', 0, '2019-07-29 01:00:10', '2019-07-29 01:02:47'),
(329, 'RF190729003016', 22, 51, 36, 12000, 0, 72000, 6, 'Pembeli Mengambil Sendiri Pesanannya', 'dikirim', 1, '2019-07-29 00:30:20', '2020-08-10 11:50:25'),
(328, 'CX190729002731', 22, 51, 36, 12000, 0, 12000, 1, 'Pembeli Mengambil Sendiri Pesanannya', 'diproses', 1, '2019-07-29 00:27:33', '2019-07-29 00:29:00'),
(327, 'YB190729000623', 22, 51, 36, 12000, 12000, 24000, 1, 'blok C ,Enggal ,Bandar Lampung', 'batal', 0, '2019-07-29 00:06:24', '2019-07-29 00:07:11'),
(296, 'ZJ190710085406', 34, 33, 42, 1000, 400000, 401000, 1, ',Tanjung Sari ,Lampung Selatan', 'belum bayar', 0, '2019-07-10 08:54:14', '2019-07-10 08:54:14'),
(359, 'RY200908150919', 34, 24, 34, 700000, 12350, 712350, 2, 'Balam', 'belum bayar', 2, '2020-09-08 15:09:19', '2020-09-08 15:09:19'),
(356, 'ZY200908103604', 34, 24, 34, 0, 0, 0, 1, 'belum', 'belum bayar', 0, '2020-09-08 10:36:04', '2020-09-08 10:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Bandar Lampung', '2019-06-28 21:45:22', '2019-06-28 21:45:22'),
(2, 'Metro', '2019-06-28 21:47:01', '2019-06-28 21:47:01'),
(3, 'Lampung Tengah', '2019-06-28 21:47:25', '2019-06-28 21:47:25'),
(4, 'Lampung Utara', '2019-06-28 21:47:57', '2019-06-28 21:47:57'),
(5, 'Lampung Timur', '2019-07-02 14:49:33', '2019-07-02 14:49:33'),
(6, 'Lampung Selatan', '2019-06-28 21:48:19', '2019-06-28 21:48:19'),
(7, 'Tanggamus', '2019-06-28 22:47:02', '2019-06-28 22:47:02'),
(8, 'Lampung Barat', '2019-06-28 22:54:57', '2019-06-28 22:54:57'),
(9, 'Tulang Bawang', '2019-06-28 22:59:46', '2019-06-28 22:59:46'),
(10, 'Way Kanan', '2019-06-28 23:07:19', '2019-06-28 23:07:19'),
(11, 'Pesisir Barat', '2019-06-28 23:14:11', '2019-06-28 23:14:11'),
(12, 'Pesawaran', '2019-06-28 23:20:34', '2019-06-28 23:20:34'),
(13, 'Tulang Bawang Barat', '2019-06-28 23:24:30', '2019-06-28 23:24:30'),
(14, 'Pringsewu', '2019-06-28 23:30:16', '2019-06-28 23:30:16'),
(15, 'Mesuji', '2019-06-28 23:36:40', '2019-06-28 23:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `id_kabupaten`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bumi Waras', '2019-06-28 21:50:49', '2020-08-11 16:09:13'),
(2, 1, 'Enggal', '2019-06-28 21:50:49', '2019-06-28 21:50:49'),
(3, 1, 'Kedamaian', '2019-06-28 21:51:43', '2019-06-28 21:51:43'),
(4, 1, 'Kedaton', '2019-06-28 21:51:43', '2019-06-28 21:51:43'),
(5, 1, 'Kemiling', '2019-06-28 21:52:15', '2019-06-28 21:52:15'),
(6, 1, 'Labuhan Ratu', '2019-06-28 21:52:15', '2019-06-28 21:52:15'),
(7, 1, 'Langkapura', '2019-06-28 21:54:27', '2019-06-28 21:54:27'),
(8, 1, 'Panjang', '2019-06-28 21:54:27', '2019-06-28 21:54:27'),
(9, 1, 'Rajabasa', '2019-06-28 21:54:55', '2019-06-28 21:54:55'),
(10, 1, 'Sukabumi', '2019-06-28 21:54:55', '2019-06-28 21:54:55'),
(11, 1, 'Sukarame', '2019-06-28 21:55:32', '2019-06-28 21:55:32'),
(12, 1, 'Tanjung Senang', '2019-06-28 21:55:32', '2019-06-28 21:55:32'),
(13, 1, 'Tanjungkarang Barat', '2019-06-28 21:56:18', '2019-06-28 21:56:18'),
(14, 1, 'Tanjungkarang Pusat', '2019-06-28 21:56:18', '2019-06-28 21:56:18'),
(15, 1, 'Tanjungkarang Timur', '2019-06-28 21:57:02', '2019-06-28 21:57:02'),
(16, 1, 'Telukbetung Barat', '2019-06-28 21:57:02', '2019-06-28 21:57:02'),
(17, 1, 'Teluk Betung Timur', '2019-06-28 21:58:30', '2019-06-28 21:58:30'),
(18, 1, 'Teluk Betung Utara', '2019-06-28 21:58:30', '2019-06-28 21:58:30'),
(19, 1, 'Way Halim', '2019-06-28 21:58:53', '2019-06-28 21:58:53'),
(20, 2, 'Metro Barat', '2019-06-28 22:01:22', '2019-06-28 22:01:22'),
(21, 2, 'Metro Pusat', '2019-06-28 22:01:22', '2019-06-28 22:01:22'),
(22, 2, 'Metro Selatan', '2019-06-28 22:03:40', '2019-06-28 22:03:40'),
(23, 2, 'Metro Timur', '2019-06-28 22:03:40', '2019-06-28 22:03:40'),
(24, 2, 'Metro Utara', '2019-06-28 22:04:09', '2019-06-28 22:04:09'),
(25, 3, 'Anak Ratu Aji', '2019-06-28 22:06:39', '2019-06-28 22:06:39'),
(26, 3, 'Anak Tuha', '2019-06-28 22:06:39', '2019-06-28 22:06:39'),
(27, 3, 'Bandar Mataram', '2019-06-28 22:07:10', '2019-06-28 22:07:10'),
(28, 3, 'Bandar Surabaya', '2019-06-28 22:07:10', '2019-06-28 22:07:10'),
(29, 3, 'Bangun Rejo', '2019-06-28 22:07:35', '2019-06-28 22:07:35'),
(30, 3, 'Bekri', '2019-06-28 22:07:35', '2019-06-28 22:07:35'),
(31, 3, 'Bumi Nabung', '2019-06-28 22:08:10', '2019-06-28 22:08:10'),
(32, 3, 'Bumi Ratu Nuban', '2019-06-28 22:08:10', '2019-06-28 22:08:10'),
(33, 3, 'Gunung Sugih', '2019-06-28 22:08:55', '2019-06-28 22:08:55'),
(34, 3, 'Kalirejo', '2019-06-28 22:08:55', '2019-06-28 22:08:55'),
(35, 3, 'Kota Gajah', '2019-06-28 22:09:26', '2019-06-28 22:09:26'),
(36, 3, 'Padang Ratu', '2019-06-28 22:09:26', '2019-06-28 22:09:26'),
(37, 3, 'Pubian', '2019-06-28 22:09:53', '2019-06-28 22:09:53'),
(38, 3, 'Punggur', '2019-06-28 22:09:53', '2019-06-28 22:09:53'),
(39, 3, 'Putra Rumbia', '2019-06-28 22:10:25', '2019-06-28 22:10:25'),
(40, 3, 'Rumbia', '2019-06-28 22:10:25', '2019-06-28 22:10:25'),
(41, 3, 'Selagai Lingga', '2019-06-28 22:11:44', '2019-06-28 22:11:44'),
(42, 3, 'Sendang Agung', '2019-06-28 22:11:44', '2019-06-28 22:11:44'),
(43, 3, 'Seputih Agung', '2019-06-28 22:12:21', '2019-06-28 22:12:21'),
(44, 3, 'Seputih Banyak', '2019-06-28 22:12:21', '2019-06-28 22:12:21'),
(45, 3, 'Seputih Mataram', '2019-06-28 22:12:53', '2019-06-28 22:12:53'),
(46, 3, 'Seputih Raman', '2019-06-28 22:12:53', '2019-06-28 22:12:53'),
(47, 3, 'Seputih Surabaya', '2019-06-28 22:13:28', '2019-06-28 22:13:28'),
(48, 3, 'Terbanggi Besar', '2019-06-28 22:13:28', '2019-06-28 22:13:28'),
(49, 3, 'Terusan Nunyai', '2019-06-28 22:13:51', '2019-06-28 22:13:51'),
(50, 4, 'Abung Barat', '2019-06-28 22:14:39', '2019-06-28 22:14:39'),
(51, 4, 'Abung Kunang', '2019-06-28 22:14:39', '2019-06-28 22:14:39'),
(52, 4, 'Abung Pekurun', '2019-06-28 22:15:12', '2019-06-28 22:15:12'),
(53, 4, 'Abung Selatan', '2019-06-28 22:15:12', '2019-06-28 22:15:12'),
(54, 4, 'Abung Semuli', '2019-06-28 22:15:46', '2019-06-28 22:15:46'),
(55, 4, 'Abung Surakarta', '2019-06-28 22:15:46', '2019-06-28 22:15:46'),
(56, 4, 'Abung Tengah', '2019-06-28 22:16:51', '2019-06-28 22:16:51'),
(57, 4, 'Abung Timur', '2019-06-28 22:16:51', '2019-06-28 22:16:51'),
(58, 4, 'Abung Tinggi', '2019-06-28 22:17:41', '2019-06-28 22:17:41'),
(59, 4, 'Blambangan Pagar', '2019-06-28 22:17:41', '2019-06-28 22:17:41'),
(60, 4, 'Bukit Kemuning', '2019-06-28 22:18:16', '2019-06-28 22:18:16'),
(61, 4, 'Bunga Mayang', '2019-06-28 22:18:16', '2019-06-28 22:18:16'),
(62, 4, 'Hulu Sungkai', '2019-06-28 22:18:43', '2019-06-28 22:18:43'),
(63, 4, 'Kotabumi', '2019-06-28 22:18:43', '2019-06-28 22:18:43'),
(64, 4, 'Kotabumi Selatan', '2019-06-28 22:19:29', '2019-06-28 22:19:29'),
(65, 4, 'Kotabumi Utara', '2019-06-28 22:19:29', '2019-06-28 22:19:29'),
(66, 4, 'Muara Sungkai', '2019-06-28 22:21:34', '2019-06-28 22:21:34'),
(67, 4, 'Sungkai Barat', '2019-06-28 22:21:34', '2019-06-28 22:21:34'),
(68, 4, 'Sungkai Jaya', '2019-06-28 22:22:57', '2019-06-28 22:22:57'),
(69, 4, 'Sungkai Selatan', '2019-06-28 22:22:57', '2019-06-28 22:22:57'),
(70, 4, 'Sungkai Tengah', '2019-06-28 22:23:31', '2019-06-28 22:23:31'),
(71, 4, 'Sungkai Utara', '2019-06-28 22:23:31', '2019-06-28 22:23:31'),
(72, 4, 'Sungkai Raja', '2019-06-28 22:23:57', '2019-06-28 22:23:57'),
(73, 5, 'Bandar Sribhawono', '2019-06-28 22:25:04', '2019-06-28 22:25:04'),
(74, 5, 'Batanghari', '2019-06-28 22:25:04', '2019-06-28 22:25:04'),
(75, 5, 'Batanghari Nuban', '2019-06-28 22:25:49', '2019-06-28 22:25:49'),
(76, 5, 'Braja Selebah', '2019-06-28 22:25:49', '2019-06-28 22:25:49'),
(77, 5, 'Bumi Agung', '2019-06-28 22:26:19', '2019-06-28 22:26:19'),
(78, 5, 'Gunung Pelindung', '2019-06-28 22:26:19', '2019-06-28 22:26:19'),
(79, 5, 'Jabung', '2019-06-28 22:26:43', '2019-06-28 22:26:43'),
(80, 5, 'Labuhan Maringgai', '2019-06-28 22:26:43', '2019-06-28 22:26:43'),
(81, 5, 'Labuhan Ratu', '2019-06-28 22:27:14', '2019-06-28 22:27:14'),
(82, 5, 'Marga Sekampung', '2019-06-28 22:27:14', '2019-06-28 22:27:14'),
(83, 5, 'Marga Tiga', '2019-06-28 22:27:47', '2019-06-28 22:27:47'),
(84, 5, 'Mataram Baru', '2019-06-28 22:27:47', '2019-06-28 22:27:47'),
(85, 5, 'Melinting', '2019-06-28 22:28:12', '2019-06-28 22:28:12'),
(86, 5, 'Metro Kibang', '2019-06-28 22:28:12', '2019-06-28 22:28:12'),
(87, 5, 'Pasir Sakti', '2019-06-28 22:28:46', '2019-06-28 22:28:46'),
(88, 5, 'Pekalongan', '2019-06-28 22:28:46', '2019-06-28 22:28:46'),
(89, 5, 'Purbolinggo', '2019-06-28 22:29:32', '2019-06-28 22:29:32'),
(90, 5, 'Raman Utara', '2019-06-28 22:29:32', '2019-06-28 22:29:32'),
(91, 5, 'Sekampung', '2019-06-28 22:30:12', '2019-06-28 22:30:12'),
(92, 5, 'Sekampung Udik', '2019-06-28 22:30:12', '2019-06-28 22:30:12'),
(93, 5, 'Sukadana', '2019-06-28 22:30:42', '2019-06-28 22:30:42'),
(94, 5, 'Waway Karya', '2019-06-28 22:30:42', '2019-06-28 22:30:42'),
(95, 5, 'Way Bungur', '2019-06-28 22:31:18', '2019-06-28 22:31:18'),
(96, 5, 'Way Jepara', '2019-06-28 22:31:18', '2019-06-28 22:31:18'),
(97, 6, 'Bakauheni', '2019-06-28 22:31:55', '2019-06-28 22:31:55'),
(98, 6, 'Candipuro', '2019-06-28 22:31:55', '2019-06-28 22:31:55'),
(99, 6, 'Jati Agung', '2019-06-28 22:32:48', '2019-06-28 22:32:48'),
(100, 6, 'Kalianda', '2019-06-28 22:32:48', '2019-06-28 22:32:48'),
(101, 6, 'Katibung', '2019-06-28 22:33:22', '2019-06-28 22:33:22'),
(102, 6, 'Ketapang', '2019-06-28 22:33:22', '2019-06-28 22:33:22'),
(103, 6, 'Merbau Mataram', '2019-06-28 22:34:39', '2019-06-28 22:34:39'),
(104, 6, 'Natar', '2019-06-28 22:34:39', '2019-06-28 22:34:39'),
(105, 6, 'Palas', '2019-06-28 22:35:12', '2019-06-28 22:35:12'),
(106, 6, 'Penengahan', '2019-06-28 22:35:12', '2019-06-28 22:35:12'),
(107, 6, 'Rajabasa', '2019-06-28 22:35:48', '2019-06-28 22:35:48'),
(108, 6, 'Sidomulyo', '2019-06-28 22:35:48', '2019-06-28 22:35:48'),
(109, 6, 'Sragi', '2019-06-28 22:37:35', '2019-06-28 22:37:35'),
(110, 6, 'Tanjung Bintang', '2019-06-28 22:37:35', '2019-06-28 22:37:35'),
(111, 6, 'Tanjung Sari', '2019-06-28 22:38:27', '2019-06-28 22:38:27'),
(112, 6, 'Way Panji', '2019-06-28 22:38:27', '2019-06-28 22:38:27'),
(113, 6, 'Wai Sulai', '2019-06-28 22:38:51', '2019-06-28 22:38:51'),
(114, 7, 'Air Naningan', '2019-06-28 22:48:15', '2019-06-28 22:48:15'),
(115, 7, 'Bandar Negeri Semuong', '2019-06-28 22:48:15', '2019-06-28 22:48:15'),
(116, 7, 'Bulok', '2019-06-28 22:48:43', '2019-06-28 22:48:43'),
(117, 7, 'Cukuh Balak', '2019-06-28 22:48:43', '2019-06-28 22:48:43'),
(118, 7, 'Gisting', '2019-06-28 22:49:16', '2019-06-28 22:49:16'),
(119, 7, 'Gunung Alip', '2019-06-28 22:49:16', '2019-06-28 22:49:16'),
(120, 7, 'Kelumbayan', '2019-06-28 22:50:04', '2019-06-28 22:50:04'),
(121, 7, 'Kelumbayan Barat', '2019-06-28 22:50:04', '2019-06-28 22:50:04'),
(122, 7, 'Kota Agung', '2019-06-28 22:50:38', '2019-06-28 22:50:38'),
(123, 7, 'Kota Agung Barat', '2019-06-28 22:50:38', '2019-06-28 22:50:38'),
(124, 7, 'Kota Agung Timur', '2019-06-28 22:51:18', '2019-06-28 22:51:18'),
(125, 7, 'Limau', '2019-06-28 22:51:18', '2019-06-28 22:51:18'),
(126, 7, 'Pematang Sawa', '2019-06-28 22:51:59', '2019-06-28 22:51:59'),
(127, 7, 'Pugung', '2019-06-28 22:51:59', '2019-06-28 22:51:59'),
(128, 7, 'Pulau Punggung', '2019-06-28 22:52:30', '2019-06-28 22:52:30'),
(129, 7, 'Semaka', '2019-06-28 22:52:30', '2019-06-28 22:52:30'),
(130, 7, 'Sumber Rejo', '2019-06-28 22:53:09', '2019-06-28 22:53:09'),
(131, 7, 'Talang Padang', '2019-06-28 22:53:09', '2019-06-28 22:53:09'),
(132, 7, 'Ulu Belu', '2019-06-28 22:54:00', '2019-06-28 22:54:00'),
(133, 7, 'Wonosobo', '2019-06-28 22:54:00', '2019-06-28 22:54:00'),
(134, 8, 'Air Hitam', '2019-06-28 22:55:36', '2019-06-28 22:55:36'),
(135, 8, 'Balik Bukit', '2019-06-28 22:55:36', '2019-06-28 22:55:36'),
(136, 8, 'Bandar Negeri Suoh', '2019-06-28 22:56:07', '2019-06-28 22:56:07'),
(137, 8, 'Batu Brak', '2019-06-28 22:56:07', '2019-06-28 22:56:07'),
(138, 8, 'Batu Ketulis', '2019-06-28 22:56:31', '2019-06-28 22:56:31'),
(139, 8, 'Belalau', '2019-06-28 22:56:31', '2019-06-28 22:56:31'),
(140, 8, 'Gedung Surian', '2019-06-28 22:57:15', '2019-06-28 22:57:15'),
(141, 8, 'Kebun Tebu', '2019-06-28 22:57:15', '2019-06-28 22:57:15'),
(142, 8, 'Lumbok Seminung', '2019-06-28 22:57:50', '2019-06-28 22:57:50'),
(143, 8, 'Pagar Dewa', '2019-06-28 22:57:50', '2019-06-28 22:57:50'),
(144, 8, 'Sekincau', '2019-06-28 22:58:15', '2019-06-28 22:58:15'),
(145, 8, 'Sukau', '2019-06-28 22:58:15', '2019-06-28 22:58:15'),
(146, 8, 'Sumber Jaya', '2019-06-28 22:58:43', '2019-06-28 22:58:43'),
(147, 8, 'Suoh', '2019-06-28 22:58:43', '2019-06-28 22:58:43'),
(148, 8, 'Way Tenong', '2019-06-28 22:59:07', '2019-06-28 22:59:07'),
(149, 9, 'Banjar Agung', '2019-06-28 23:00:57', '2019-06-28 23:00:57'),
(150, 9, 'Banjar Baru', '2019-06-28 23:00:57', '2019-06-28 23:00:57'),
(151, 9, 'Banjar Margo', '2019-06-28 23:01:39', '2019-06-28 23:01:39'),
(152, 9, 'Dente Teladas', '2019-06-28 23:01:39', '2019-06-28 23:01:39'),
(153, 9, 'Gedung Aji', '2019-06-28 23:02:13', '2019-06-28 23:02:13'),
(154, 9, 'Gedung Aji Baru', '2019-06-28 23:02:13', '2019-06-28 23:02:13'),
(155, 9, 'Gedung Meneng', '2019-06-28 23:03:35', '2019-06-28 23:03:35'),
(156, 9, 'Menggala', '2019-06-28 23:03:35', '2019-06-28 23:03:35'),
(157, 9, 'Menggala Timur', '2019-06-28 23:04:11', '2019-06-28 23:04:11'),
(158, 9, 'Meraksa Aji', '2019-06-28 23:04:11', '2019-06-28 23:04:11'),
(159, 9, 'Penawar Aji', '2019-06-28 23:04:54', '2019-06-28 23:04:54'),
(160, 9, 'Penawar Tama', '2019-06-28 23:04:54', '2019-06-28 23:04:54'),
(161, 9, 'Rawa Jitu Selatan', '2019-06-28 23:05:55', '2019-06-28 23:05:55'),
(162, 9, 'Rawa Jitu Timur', '2019-06-28 23:05:55', '2019-06-28 23:05:55'),
(163, 9, 'Rawapitu', '2019-06-28 23:06:41', '2019-06-28 23:06:41'),
(164, 10, 'Bahuga', '2019-06-28 23:08:19', '2019-06-28 23:08:19'),
(165, 10, 'Banjit', '2019-06-28 23:08:19', '2019-06-28 23:08:19'),
(166, 10, 'Baradatu', '2019-06-28 23:08:51', '2019-06-28 23:08:51'),
(167, 10, 'Blambangan Umpu', '2019-06-28 23:08:51', '2019-06-28 23:08:51'),
(168, 10, 'Buay Bahuga', '2019-06-28 23:09:25', '2019-06-28 23:09:25'),
(169, 10, 'Bumi Agung', '2019-06-28 23:09:25', '2019-06-28 23:09:25'),
(170, 10, 'Gunung Labuhan', '2019-06-28 23:09:57', '2019-06-28 23:09:57'),
(171, 10, 'Kasui', '2019-06-28 23:09:57', '2019-06-28 23:09:57'),
(172, 10, 'Negara Batin', '2019-06-28 23:11:07', '2019-06-28 23:11:07'),
(173, 10, 'Negeri Agung', '2019-06-28 23:11:07', '2019-06-28 23:11:07'),
(174, 10, 'Negeri Besar', '2019-06-28 23:11:57', '2019-06-28 23:11:57'),
(175, 10, 'Pakuan Ratu', '2019-06-28 23:11:57', '2019-06-28 23:11:57'),
(176, 10, 'Rebang Tangkas', '2019-06-28 23:12:35', '2019-06-28 23:12:35'),
(177, 10, 'Way Tuba', '2019-06-28 23:12:35', '2019-06-28 23:12:35'),
(178, 11, 'Bengkunat', '2019-06-28 23:16:47', '2019-06-28 23:16:47'),
(179, 11, 'Karya Penggawa', '2019-06-28 23:16:47', '2019-06-28 23:16:47'),
(180, 11, 'Krui Selatan', '2019-06-28 23:17:18', '2019-06-28 23:17:18'),
(181, 11, 'Lemong', '2019-06-28 23:17:18', '2019-06-28 23:17:18'),
(182, 11, 'Ngambur', '2019-06-28 23:17:53', '2019-06-28 23:17:53'),
(183, 11, 'Ngaras', '2019-06-28 23:17:53', '2019-06-28 23:17:53'),
(184, 11, 'Pesisir Selatan', '2019-06-28 23:18:53', '2019-06-28 23:18:53'),
(185, 11, 'Pesisir Tengah', '2019-06-28 23:18:53', '2019-06-28 23:18:53'),
(186, 11, 'Pesisir Utara', '2019-06-28 23:19:28', '2019-06-28 23:19:28'),
(187, 11, 'Pulau Pisang', '2019-06-28 23:19:28', '2019-06-28 23:19:28'),
(188, 11, 'Way Krui', '2019-06-28 23:19:48', '2019-06-28 23:19:48'),
(189, 12, 'Gedong Tataan', '2019-06-28 23:21:27', '2019-06-28 23:21:27'),
(190, 12, 'Kedondong', '2019-06-28 23:21:27', '2019-06-28 23:21:27'),
(191, 12, 'Marga Punduh', '2019-06-28 23:21:53', '2019-06-28 23:21:53'),
(192, 12, 'Negeri Katon', '2019-06-28 23:21:53', '2019-06-28 23:21:53'),
(193, 12, 'Padang Cermin', '2019-06-28 23:22:36', '2019-06-28 23:22:36'),
(194, 12, 'Punduh Pidada', '2019-06-28 23:22:36', '2019-06-28 23:22:36'),
(195, 12, 'Tegineneng', '2019-06-28 23:23:06', '2019-06-28 23:23:06'),
(196, 12, 'Teluk Pandan', '2019-06-28 23:23:06', '2019-06-28 23:23:06'),
(197, 12, 'Way Khilau', '2019-06-28 23:23:34', '2019-06-28 23:23:34'),
(198, 12, 'Way Lima', '2019-06-28 23:23:34', '2019-06-28 23:23:34'),
(199, 12, 'Way Ratai', '2019-06-28 23:23:52', '2019-06-28 23:23:52'),
(200, 13, 'Batu Putih', '2019-06-28 23:26:13', '2019-06-28 23:26:13'),
(201, 13, 'Gunung Agung', '2019-06-28 23:26:13', '2019-06-28 23:26:13'),
(202, 13, 'Gunung Terang', '2019-06-28 23:26:47', '2019-06-28 23:26:47'),
(203, 13, 'Lambu Kibang', '2019-06-28 23:26:47', '2019-06-28 23:26:47'),
(204, 13, 'Pagar Dewa', '2019-06-28 23:27:24', '2019-06-28 23:27:24'),
(205, 13, 'Tulang Bawang Tengah', '2019-06-28 23:27:24', '2019-06-28 23:27:24'),
(206, 13, 'Tulang Bawang Udik', '2019-06-28 23:28:13', '2019-06-28 23:28:13'),
(207, 13, 'Tumijajar', '2019-06-28 23:28:13', '2019-06-28 23:28:13'),
(208, 13, 'Way Kenanga', '2019-06-28 23:29:31', '2019-06-28 23:29:31'),
(209, 14, 'Adiluwih', '2019-06-28 23:32:51', '2019-06-28 23:32:51'),
(210, 14, 'Ambarawa', '2019-06-28 23:32:51', '2019-06-28 23:32:51'),
(211, 14, 'Banyumas', '2019-06-28 23:33:31', '2019-06-28 23:33:31'),
(212, 14, 'Gading Rejo', '2019-06-28 23:33:31', '2019-06-28 23:34:13'),
(213, 14, 'Pagelaran', '2019-06-28 23:35:04', '2019-06-28 23:35:04'),
(214, 14, 'Pagelaran Utara', '2019-06-28 23:35:04', '2019-06-28 23:35:04'),
(215, 14, 'Pardasuka', '2019-06-28 23:35:45', '2019-06-28 23:35:45'),
(216, 14, 'Pringsewu', '2019-06-28 23:35:45', '2019-06-28 23:35:45'),
(217, 14, 'Sukoharjo', '2019-06-28 23:36:06', '2019-06-28 23:36:06'),
(218, 15, 'Mesuji', '2019-06-28 23:37:44', '2019-06-28 23:37:44'),
(219, 15, 'Mesuji Timur', '2019-06-28 23:37:44', '2019-06-28 23:37:44'),
(220, 15, 'Panca Jaya', '2019-06-28 23:38:40', '2019-06-28 23:38:40'),
(221, 15, 'Rawa Jitu Utara', '2019-06-28 23:38:40', '2019-06-28 23:38:40'),
(222, 15, 'Simpang Pematang', '2019-06-28 23:39:22', '2019-06-28 23:39:22'),
(223, 15, 'Tanjung Raya', '2019-06-28 23:39:22', '2019-06-28 23:39:22'),
(224, 15, 'Way Serdang', '2019-06-28 23:39:40', '2019-06-28 23:39:40'),
(225, 1, 'Teluk Betung Selatan', '2019-06-28 23:57:21', '2019-06-28 23:57:21'),
(226, 3, 'Trimurjo', '2019-06-29 00:05:56', '2019-06-29 00:05:56'),
(227, 3, 'Way Pangubuan', '2019-06-29 00:05:56', '2019-06-29 00:05:56'),
(228, 3, 'Way Seputih', '2019-06-29 00:07:07', '2019-06-29 00:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_produk`, `jumlah`, `id_pengguna`, `created_at`, `updated_at`) VALUES
(122, 41, 1, 24, '2020-08-13 06:29:38', '2020-08-13 06:29:38'),
(123, 35, 1, 24, '2020-08-17 09:28:00', '2020-08-17 09:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
(4, '2016_06_01_000004_create_oauth_clients_table', 4),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_pesanan` varchar(30) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `isi` text NOT NULL,
  `status` enum('dilihat','belum') NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_pesanan`, `id_produk`, `isi`, `status`, `id_pengguna`, `created_at`, `updated_at`) VALUES
(26, 'US190729010004', 36, 'Pesanan Telah Diterima', 'dilihat', 51, '2019-07-28 18:02:30', '2019-07-28 18:03:04'),
(25, 'US190729010004', 36, 'Pesanan Telah Diterima Oleh Pembeli', 'belum', 22, '2019-07-28 18:00:09', '2019-07-28 18:02:48'),
(24, 'RF190729003016', 36, 'Ada Pesanan Masuk', 'belum', 22, '2019-07-28 17:30:20', '2019-07-28 17:30:20'),
(23, 'CX190729002731', 36, 'Ada Pesanan Masuk', 'belum', 22, '2019-07-28 17:27:33', '2019-07-28 17:27:33'),
(22, 'YB190729000623', 36, 'Pesanan Dibatalkan', 'dilihat', 51, '2019-07-28 17:07:11', '2019-07-28 18:04:05'),
(21, 'YB190729000623', 36, 'Pesanan Dibatalkan', 'belum', 22, '2019-07-28 17:06:24', '2019-07-28 17:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('32483859676f62987b7b46ec58e719538633226f9ee3ab251802038ec94dc20b7525ae156f60be31', 44, 1, 'MyApp', '[]', 0, '2019-07-23 16:40:38', '2019-07-23 16:40:38', '2020-07-23 23:40:38'),
('db4f4ee6e73d682e0ffd54e3a8d4ba51411d3d186bf087018bb992eaca853cc5e06ffae06aa74818', 50, 1, 'MyApp', '[]', 0, '2019-07-28 16:48:04', '2019-07-28 16:48:04', '2020-07-28 23:48:04'),
('7e30952d5d4a2d72463473e1d4152f37b47a26714852e7920aa757168f2e886ca3a0157e2238ec70', 51, 1, 'MyApp', '[]', 0, '2019-07-28 16:58:44', '2019-07-28 16:58:44', '2020-07-28 23:58:44'),
('491238cb830a4cb62b2950de52fe5b74de9c3df0ad722c8cf2f9fc839a841f33cf707ba64803e9c9', 52, 1, 'MyApp', '[]', 0, '2019-07-29 17:33:38', '2019-07-29 17:33:38', '2020-07-30 00:33:38'),
('d1be2fce3f48b6bf639781af6d4564a7d2d6fc4cf4b65c510f2552f043509a3207c2a7e1f1b78c99', 24, 1, 'MyApp', '[]', 0, '2019-07-29 09:32:14', '2019-07-29 09:32:14', '2020-07-29 16:32:14'),
('665d5129782c4ad0b2098ac646983042416e4f862eb772d0831fa2976188533d26034b3de85efec4', 53, 1, 'MyApp', '[]', 0, '2019-07-30 15:48:44', '2019-07-30 15:48:44', '2020-07-30 22:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'drpakU9ZW8NwqMGjrWbiFhq361wJftQu3p1OGyZh', 'http://localhost', 1, 0, 0, '2019-07-22 12:12:54', '2019-07-22 12:12:54'),
(2, NULL, 'Laravel Password Grant Client', 'XrdAJsItnGhjtIDx3KFDWTSLT0z92WMxctjTtK7p', 'http://localhost', 0, 1, 0, '2019-07-22 12:12:54', '2019-07-22 12:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-07-22 12:12:54', '2019-07-22 12:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `ongkir` int(8) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `id_kecamatan`, `id_penjual`, `ongkir`, `created_at`, `updated_at`) VALUES
(165, 81, 24, 2323341, '2020-09-05 18:24:20', '2020-09-05 18:24:20'),
(175, 20, 56, 12322236, '2020-09-08 15:06:25', '2020-09-08 15:06:25'),
(162, 107, 24, 2423122, '2020-09-05 18:17:37', '2020-09-05 18:17:37'),
(176, 6, 24, 2434678, '2020-09-09 11:20:47', '2020-09-09 11:20:47'),
(170, 17, 24, 12345, '2020-09-07 01:39:39', '2020-09-07 01:39:39'),
(160, 34, 24, 123543534, '2020-09-05 17:52:00', '2020-09-05 18:03:06'),
(161, 2, 24, 12354, '2020-09-05 17:53:32', '2020-09-07 02:02:09'),
(172, 4, 24, 11111, '2020-09-07 02:10:34', '2020-09-07 02:10:34'),
(173, 5, 24, 100, '2020-09-07 02:13:06', '2020-09-07 02:16:48'),
(156, 1, 24, 1235000, '2020-09-05 13:52:39', '2020-09-09 11:21:24'),
(171, 3, 24, 19000, '2020-09-07 02:05:02', '2020-09-07 02:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `token` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id`, `email`, `password`, `remember_token`, `token`, `created_at`, `updated_at`) VALUES
(1, 'epakan.id@gmail.com', '$2y$10$E8jDBo88B3Wwy2WTZ01lGOEEQZC4JArh5jjwojji4Mr1yUlvt0jD6', '', 'eKTgKVvKkq8:APA91bHDzisTC2ufDAZU6lkVDryRfoKvFMTpOkaeKmUVZopXtXw6l5lY3XXkqDd8cGLquuTJIbYPvckHVQwZn6w9V3m0apaa2qk4Tqc7u0YpTlBagxporxKMbeiAqImYdHwwzx9VoLzL', '2019-05-29 07:15:38', '2019-07-14 12:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `token` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `daerah` enum('Bandar Lampung','Metro','Lampung Barat','Lampung Selatan','Lampung Tengah','Lampung Timur','Lampung Utara','Mesuji','Pesawaran','Pringsewu','Tanggamus','Tulang Bawang','Tulang Bawang Barat','Way Kanan','Pesisir Barat') DEFAULT NULL,
  `foto` varchar(100) DEFAULT 'Logo.jpg',
  `saldo` int(10) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `email` varchar(30) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `lat_toko` double DEFAULT NULL,
  `lng_toko` double DEFAULT NULL,
  `kode_verifikasi` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `no_telp`, `token`, `alamat`, `daerah`, `foto`, `saldo`, `created_at`, `updated_at`, `email`, `password`, `remember_token`, `status`, `lat_toko`, `lng_toko`, `kode_verifikasi`) VALUES
(22, 'Fachry Maulana Prabowo', '085805319223', 'fntwl3cUf8c:APA91bFgLuZkqeSMyxl3IGYDpfJkHPtsH5tsDUd9rkd3OtdqhtVxxXExjHERgDRjgPmbj9ZdNdEGjmf4D0aTlIAvGered4DWGx_1GlEQbQBddBpQ_6FcPS7TIm0YcoBb47s7AvleWaFq', 'Tanjung Senang', 'Bandar Lampung', 'foto_pengguna_22_93502377.png', 1710095, '2020-08-25 08:50:48', '2020-08-25 08:50:48', 'yamin@gmail.com', '$2y$10$gPMty3Il3r4J01ZI/DPl0e/L6KpL7xHnRnU5BVvwG8VoV2vRy6rnO', NULL, 1, -5.3592165234023215, 105.26252601295711, '0341'),
(24, 'Ahmad Paruhum', '081368986989', 'fe33REw1sxs:APA91bEEIRmif2ZrHtCN8n1wTk11u7BjRAhB2B8RDQPEUq3XZzV5n-xo_w2EcTlZaag3B_nYmdqxnvbIMAihm5z6eDJdJkio1pGHk_G_jJ_LNYaKgGxX46usgNoRNvyJmnX7J9Ubf7ub', 'lampung barat', 'Lampung Selatan', 'foto_pengguna_24_787928382.jpg', 25650, '2020-09-09 04:17:06', '2020-09-09 04:17:06', 'ahmad_paruhum@gmail.com', '$2y$10$6av35k2/i2bZbjrnE5akkuYIKeXUFMJ9AB5wg80T5xpccsrymS/lS', NULL, 0, NULL, NULL, '8870'),
(25, 'Ryan Fajar Kurniawan', '082281851336', 'ds6t8BcxgNY:APA91bE50PWMhUfrNxNu4qrwO34S-kEvzlPcydFkxcp36bezkg30feMu398-z5R3k5DejQ61sYkyXgT0A6OpZjVgxnvDKDJ-gqA_yfkDLedP1wxZFFu06mHn2qGsxyWsq77qhxEl71JX', 'endang sari, harapan rejo, seputih agung', 'Lampung Tengah', 'Logo.jpg', 0, '2019-07-06 11:06:36', '2019-07-06 11:06:36', 'ryan.fk06@gmail.com', '$2y$10$AKTLRWArUQO1lZAFOw3YPuBvcNZ21VofRtb91X50NZnynNWnK33w.', NULL, 0, NULL, NULL, '7212'),
(30, 'Rashan Pratama', '089656806311', 'dGqKJQbbKSQ:APA91bHfXe3dICzSXmBgS6RRxjYS9xAC7pabc8hEKI63pNjUJl7Sf-TKTVmPv8ATUqvFOjXEMqbac1Jh4zBIrlUCBERJRHaolwrY2faGTEDytDGbVR7u7ci4YylmVaU-iXNSv3GQefip', 'Bandar Lampung', 'Lampung Barat', 'Logo.jpg', 0, '2019-07-17 06:11:59', '2019-07-17 06:11:59', 'rashan.pratama@gmail.com', '$2y$10$rOBd/wBTqUOSaXYZJNt60.4QJhHeTasEYJdHIW8kZu.W2NYuwxzBC', NULL, 0, NULL, NULL, '7812'),
(34, 'Raman Farm', '081272351473', 'fwq4Sjx-GSw:APA91bHuuuWCi0JizWAkuHxtYCpP7hR9YMEDGXz_71egzwZ5HSNI7_X3IInPwWatADikUm0S_SMSCfBJjFaOqsVFdHuWtM9NPimcoSRP9oKHCvN-3kaz-5aMiVKG6t6QSddaTEZEVIDf', 'Lampung Tengah', 'Lampung Tengah', 'foto_pengguna_34_210326056.png', 1187500, '2019-07-07 13:36:41', '2019-07-07 13:36:14', NULL, '$2y$10$gg/FN92M3MOxv5YGMbcgSujyLsmd.xYb5InuS1Tl5IWfSRnOT0x2O', NULL, 1, NULL, NULL, '2152'),
(47, 'Onel Keren', '081373175217', 'dDnUxJhjKts:APA91bGgf4RIf6byS5BBhoiJQx50scuzdkxqsZSX_GwXl3itPVdELKIr8hlgVTCAqf5MYSLHqaFWOBepBxQGPxhGrDHzqQTcnHsNtFC2nmPa_Ln4nKM8VnwjEut0-r_vtE3q3mdTBUFh', 'Jl. Siworatu, Sekret Himalow, Gd. Meneng. kec. Rajabasa', 'Bandar Lampung', 'foto_pengguna_47_749794591.png', 0, '2019-11-11 05:18:41', '2019-11-11 05:18:41', NULL, '$2y$10$HGX2EFKibFWBFQ0F1IjxHeVW4p60eWcCnhFvF/R9cVPyKHy7.R3qe', NULL, 0, NULL, NULL, '7742'),
(48, 'septiyan dwi nurhidayat', '085203050022', 'dq-JuAv1hAA:APA91bFWZ7XvElHLSs5k4cQBsm3GryCnLvhPO266qMdSANnVBcI0K21chWdLvE1IrZIyMFlHLN2JJ71w2uw9vrH-lCtgp3Md-cMuZwalBqf7LHsEaRhaAdK4o0AFXDmUwC6Ky4qZDYnP', 'ds kenep kec balen kab bojonegoro', 'Bandar Lampung', 'Logo.jpg', 0, '2019-07-17 03:55:02', '2019-07-17 03:55:02', NULL, NULL, NULL, 0, NULL, NULL, '7010'),
(49, 'Ivan', '085383099768', 'eDwDAH--qFM:APA91bGjPhxJVNtmZpT1CiMlieyqq-4oy_Sj3iNuxICQMR9VaGGW31zUecy8ZOco8ObRSlZ98u1074wGzlIM8h0TBcTlmf8mifxXkeekYFEs8ijqUANHQP-X60KdkjFeKYsm6fr0RMmS', 'Lampung Tengah', 'Bandar Lampung', 'Logo.jpg', 0, '2019-07-17 19:58:36', '2019-07-17 19:58:36', NULL, NULL, NULL, 0, NULL, NULL, '7067'),
(51, 'Fachry Maulana', '081364673828', 'c_sidjH6Zn4:APA91bEVOSQdwqvNL0nJUwaq_Q62sSIn7FtH5bANWtF86iZOqrJ53-E_vpOYlQfXM5jxfS5isuJ0QY6M4OeT9wH8WoBgMxI87fW7kEFHiNZI68EB-mAONi8WXlBx7xMSwO3fHRO-Gy4U', 'Panorama alam', 'Bandar Lampung', 'foto_pengguna_51_989880240.png', 0, '2019-08-02 10:22:00', '2019-08-02 10:22:00', NULL, '$2y$10$fhGvrtPT9Zmf7SfUWuvevOMPPnVGQ5bZNIXk5g2bZfNpaIJKIUIUu', NULL, 1, -5.362232160320928, 105.25879506021738, '3652'),
(52, 'Andi arisetiawan', '085768003865', 'ePFjNpuadqE:APA91bGhZ6Xu8Pg7FOxbHYIVr9BA9j0-plZCAe3ns6vBvZlsi6SSDpPRjE60ONbGuvqyUQWimUF0fKvX8-jPiBT5Hs7WAEZ3W1Khj0DNAc3EGC5Bf3R3p191UOY9mWk1G5trnKkBvlwt', 'kampung purwodadi kecamatan Bangun Rejo kabupaten Lampung tengah', 'Lampung Tengah', 'Logo.jpg', 0, '2019-07-29 17:33:38', '2019-07-29 17:33:38', NULL, NULL, NULL, 0, NULL, NULL, '5420'),
(53, 'budi', '085366717537', 'csmvFhuQqcc:APA91bHyNLaGzh04k2mq9nO1ELZQk4hu1vN3AyN3D6OL6eYLudbpDd7LqTyXZbQY_axo8sZ_i3slWrwqYouXuE5GdkCQfIH3UQbBSxeZwpr4t9XFGe3wz63OrlXo_P-FC2J56ekNn2t5', 'kemiling', 'Bandar Lampung', 'Logo.jpg', 0, '2019-07-30 15:48:21', '2019-07-30 15:48:21', NULL, NULL, NULL, 0, NULL, NULL, '2781'),
(54, 'dimas', '085758762601', NULL, 'kosan ceria', 'Lampung Barat', 'Logo.jpg', 0, '2020-02-07 12:41:58', '2020-02-07 12:41:58', NULL, NULL, NULL, 0, NULL, NULL, '6075'),
(55, 'Epakan', '085769149310', NULL, 'Balam', 'Bandar Lampung', 'Logo.jpg', 0, '2020-09-03 19:40:48', '2020-09-03 19:40:48', NULL, NULL, NULL, 0, NULL, NULL, '4358'),
(56, 'Epakan Mitra', '0811111111', NULL, 'Balam', 'Bandar Lampung', 'Logo.jpg', 0, '2020-09-09 01:51:15', '2020-09-09 01:51:15', NULL, NULL, NULL, 0, NULL, NULL, '3868');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(30) NOT NULL,
  `foto` text DEFAULT NULL,
  `ongkir` int(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `total_bayar` int(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `status` enum('belum','lunas') NOT NULL DEFAULT 'belum',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `foto`, `ongkir`, `harga`, `total_bayar`, `id_pengguna`, `status`, `created_at`, `updated_at`) VALUES
('US190729010004', 'foto_pesanan_51_738232571.png', 15000, 12000, 27000, 51, 'lunas', '2019-07-28 18:00:09', '2019-07-28 18:01:20'),
('ZJ190710085406', NULL, 400000, 1000, 401000, 33, 'belum', '2019-07-10 01:54:12', '2019-07-10 01:54:12'),
('RF190729003016', 'foto_pesanan_51_758686014.png', 0, 12000, 72000, 51, 'belum', '2019-02-23 17:00:00', '2019-07-28 17:31:36'),
('CX190729002731', 'foto_pesanan_51_36940820.png', 0, 12000, 12000, 51, 'lunas', '2019-07-28 17:27:33', '2019-07-28 17:29:00'),
('RY200908150919', NULL, 12350, 700000, 712350, 24, 'belum', '2020-09-08 08:09:19', '2020-09-08 08:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `harga` int(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `status` enum('pre sale','siap antar') NOT NULL,
  `kategori` enum('Pakan Sapi','Pakan Kuda','Pakan Domba & Kambing','Pakan Ayam','Pakan Kerbau','Suplemen','Hijauan','Bahan Mentah Pakan','Produk Peternak Binaan') NOT NULL,
  `lokasi` enum('Bandar Lampung','Metro','Lampung Barat','Lampung Selatan','Lampung Tengah','Lampung Timur','Lampung Utara','Mesuji','Pesawaran','Pringsewu','Tanggamus','Tulang Bawang','Tulang Bawang Barat','Way Kanan','Pesisir Barat') DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `foto2` text DEFAULT NULL,
  `foto3` text DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `iklan` tinyint(1) NOT NULL DEFAULT 1,
  `minimum` int(4) NOT NULL,
  `stok` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_pengguna`, `nama`, `jenis`, `harga`, `satuan`, `status`, `kategori`, `lokasi`, `foto`, `foto2`, `foto3`, `deskripsi`, `iklan`, `minimum`, `stok`, `created_at`, `updated_at`) VALUES
(50, 24, 'pakan ayaaaaaam', NULL, 120000, 'kg', 'siap antar', 'Pakan Sapi', 'Lampung Barat', '258003219.jpg', '175062533.jpg', '485026165.jpg', 'mantap gan', 1, 50, 400, '2020-03-17 14:55:59', '2020-03-17 14:55:59'),
(35, 34, 'Ampas Singkong Kering', NULL, 110000, '50 Kg', 'pre sale', 'Pakan Sapi', NULL, 'foto_produk_34_1_803379721.png', 'foto_produk_34_2_756840955.png', 'foto_produk_34_3_810366497.png', 'Ampas singkong sangat cocok untuk sapi penggemukan. Agar sapi tidak merasa bosan, ampas singkong dapat dicampur dengan rumput atau dqpat juga dicampur dengan bekatul.', 1, 50, 50, '2019-08-26 15:51:41', '2019-07-08 06:29:35'),
(34, 34, 'Bungkil Kedelai', NULL, 350000, '50 Kg', 'siap antar', 'Bahan Mentah Pakan', NULL, 'foto_produk_34_1_373173771.png', 'foto_produk_34_2_894991910.png', 'foto_produk_34_3_536788625.png', 'Bungkil kedelai bermanfaat sebagai sumber protein bagi ternak dan mengandung asam amino yang seimbang untuk pertumbuhan ternak terutama ayam.', 1, 50, 100, '2019-07-08 06:24:01', '2019-07-08 06:24:01'),
(33, 34, 'Bungkil Kopra', NULL, 175000, '50 Kg', 'siap antar', 'Bahan Mentah Pakan', NULL, 'foto_produk_34_1_531893279.png', 'foto_produk_34_2_919790077.png', 'foto_produk_34_3_187839085.png', 'Bungkil kopra merupakan inti dari kelapa sawit. Bungkil kopra biasanya dimanfaatkan untuk formulasi pakan ternak sebagai pensuplai energi.', 1, 50, 45, '2019-07-08 06:54:11', '2019-07-08 06:54:11'),
(38, 22, 'Haha', NULL, 100, 'kg', 'pre sale', 'Pakan Sapi', 'Mesuji', '', 'foto_produk_22_2_788449595.png', 'foto_produk_22_3_151731730.png', 'haha', 0, 100, 89, '2019-08-26 15:53:10', '2019-07-20 10:57:34'),
(39, 34, 'Corn Gluten Feed', NULL, 210000, '50 Kg', 'pre sale', 'Bahan Mentah Pakan', NULL, 'foto_produk_34_1_873246044.png', 'foto_produk_34_2_263489832.png', 'foto_produk_34_3_755811545.png', 'CGF memiliki kandungan gizi tinggi dan sangat bagus memenuhi kebutuhan nutrisi ternak', 1, 50, 8000, '2019-07-08 06:01:06', '2019-07-08 06:01:06'),
(40, 22, 'halah', NULL, 1000, 'Kg', 'pre sale', 'Pakan Sapi', NULL, 'foto_produk_22_1_175851540.png', 'foto_produk_22_2_120950506.png', 'foto_produk_22_3_318551655.png', 'halah', 0, 100, 200, '2019-07-05 03:25:28', '2019-07-05 03:25:28'),
(41, 22, 'Pakan Sapi', NULL, 10000, '50 Kg', 'siap antar', 'Pakan Sapi', NULL, 'foto_produk_22_1_114233692.png', 'foto_produk_22_2_90351132.png', 'foto_produk_22_3_724138793.png', 'Protein 10%', 0, 50, 993, '2019-07-23 13:23:06', '2019-07-20 10:57:31'),
(42, 34, 'Silase daun singkong', NULL, 1000, 'Kg', 'siap antar', 'Pakan Domba & Kambing', NULL, 'foto_produk_34_1_650228773.png', 'foto_produk_34_2_288920176.png', 'foto_produk_34_3_99156262.png', 'Hasil fermentasi dari daun singkong yang tinggi akan kandungan protein dan sangat cocok untuk pakan domba dan kambing', 1, 50, 2000, '2019-07-08 10:34:28', '2019-07-08 10:34:28'),
(43, 34, 'Konsentrat B', NULL, 115000, '50 kg', 'siap antar', 'Pakan Sapi', NULL, 'foto_produk_34_1_83400869.png', 'foto_produk_34_2_43046392.png', 'foto_produk_34_3_630510129.png', 'merupakan sumber protein, vitamin dan mineral yg berasal dari berbagai macam bahan baku seperti bungkil kopra, bungkil sawit, CGF dan mineral premik. memiliki kandungan protein  12%', 1, 50, 200, '2019-07-08 22:44:19', '2019-07-08 22:44:19'),
(45, 34, 'Pakan konsentrat A', NULL, 3200, 'kg', 'siap antar', 'Pakan Sapi', NULL, 'foto_produk_34_1_60263876.png', 'foto_produk_34_2_121610842.png', 'foto_produk_34_3_577763313.png', 'pakan konsentrat sapi penggemukan kandungan PK min 14%', 1, 50, 200, '2019-07-15 04:04:45', '2019-07-15 04:04:45'),
(49, 51, 'Produk 1 Ubag', NULL, 12000, 'Kg', 'siap antar', 'Pakan Kerbau', NULL, 'foto_produk_51_1_408691911.png', 'foto_produk_51_2_404801958.png', 'foto_produk_51_3_5876935.png', 'Protein 10%\nLemak 5%', 0, 5, 100, '2019-07-28 18:07:02', '2019-07-28 18:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `request_mitra`
--

CREATE TABLE `request_mitra` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL,
  `tipe` enum('peternak','produsen','petani','supplier') DEFAULT NULL,
  `foto_peternakan` varchar(255) DEFAULT NULL,
  `foto_cppb` varchar(255) DEFAULT NULL,
  `foto_sertifikat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Belum Aktif'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_mitra`
--

INSERT INTO `request_mitra` (`id`, `id_pengguna`, `nama`, `nik`, `foto_ktp`, `tipe`, `foto_peternakan`, `foto_cppb`, `foto_sertifikat`, `created_at`, `updated_at`, `status`) VALUES
(4, 44, 'ali', '11111111', 'foto_ktp894432709.png', 'peternak', 'foto_peternakan356000853.png', NULL, NULL, '2019-06-26 09:45:35', '2020-09-08 08:46:14', 'Aktif'),
(5, 34, 'Dinora Refiasari', '12345678910', 'foto_ktp862363186.png', 'produsen', NULL, 'foto_cppb679169675.png', NULL, '2019-07-01 14:59:52', '2020-09-08 08:46:17', 'Aktif'),
(7, 24, 'Ahmad Paruhum', '123456789', 'foto_ktp516282506.png', 'peternak', 'foto_peternakan498013108.png', 'foto_cppb228439647.png', 'foto_sertifikat873519547.png', '2020-03-16 17:00:00', '2020-09-08 08:46:24', 'Aktif'),
(52, 56, 'Epakan Mitra', '345657694', 'D:\\Program Files\\xampp\\htdocs\\git_epakan\\public\\uploads\\request_mitra\\349614c77cdeb177e940ee3b0022af83.png', NULL, 'D:\\Program Files\\xampp\\htdocs\\git_epakan\\public\\uploads\\request_mitra\\24916da539d4cbb478f2b982375e0c2a.png', 'D:\\Program Files\\xampp\\htdocs\\git_epakan\\public\\uploads\\request_mitra\\c2f6e40bb0666b692dd9fabfbe8e034a.png', 'D:\\Program Files\\xampp\\htdocs\\git_epakan\\public\\uploads\\request_mitra\\ff6137f7def3a1af6dc5936ae64c6254.png', '2020-09-09 03:42:31', '2020-09-09 03:42:31', 'Belum Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `saldo_cair`
--

CREATE TABLE `saldo_cair` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `saldo` int(8) NOT NULL,
  `status` enum('belum cair','sudah cair') NOT NULL DEFAULT 'belum cair',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo_cair`
--

INSERT INTO `saldo_cair` (`id`, `id_pengguna`, `saldo`, `status`, `created_at`, `updated_at`) VALUES
(1, 22, 1, 'sudah cair', '2019-05-04 04:05:43', '2019-05-09 06:04:36'),
(2, 22, 15000, 'sudah cair', '2019-05-03 21:13:40', '2019-05-09 06:04:38'),
(3, 6, 15000, 'sudah cair', '2019-05-12 00:25:44', '2019-05-13 21:48:01'),
(4, 22, 984999, 'sudah cair', '2019-05-12 00:27:57', '2019-05-12 07:28:24'),
(5, 22, 1429750, 'belum cair', '2019-06-29 11:04:27', '2019-06-29 11:04:27'),
(6, 34, 100000, 'belum cair', '2019-07-03 02:29:23', '2019-07-03 02:29:23'),
(7, 22, 1710095, 'belum cair', '2019-07-28 18:03:35', '2019-07-28 18:03:35'),
(10, 24, 28215, 'belum cair', '2020-09-08 08:07:53', '2020-09-08 08:07:53'),
(11, 24, 2590650, 'belum cair', '2020-09-09 04:17:34', '2020-09-09 04:17:34');

--
-- Triggers `saldo_cair`
--
DELIMITER $$
CREATE TRIGGER `tg_saldo_cair` AFTER UPDATE ON `saldo_cair` FOR EACH ROW BEGIN
UPDATE pengguna SET saldo = saldo - NEW.saldo
WHERE id = NEW.id_pengguna;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `saldo_masuk`
--

CREATE TABLE `saldo_masuk` (
  `id` int(11) NOT NULL,
  `id_pesanan` varchar(30) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `saldo` int(8) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_saldo` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo_masuk`
--

INSERT INTO `saldo_masuk` (`id`, `id_pesanan`, `id_pengguna`, `saldo`, `created_at`, `updated_at`, `status_saldo`) VALUES
(47, 'MJ190703144915', 22, 15200, '2019-07-03 07:52:48', '2019-07-03 07:52:48', 0),
(46, 'ZV190702180536', 22, 34200, '2019-07-02 11:09:36', '2019-07-02 11:09:36', 0),
(45, 'KH190702151326', 34, 142500, '2019-07-02 08:17:35', '2019-07-02 08:17:35', 0),
(44, 'GL190702151011', 34, 1045000, '2019-07-02 08:12:15', '2019-07-02 08:12:15', 0),
(43, 'IM190701003024', 22, 11400, '2019-06-30 17:32:10', '2019-06-30 17:32:10', 0),
(42, 'IM190701003024', 22, 11400, '2019-06-30 17:32:10', '2019-06-30 17:32:10', 0),
(41, 'IM190701003024', 22, 99750, '2019-06-30 17:32:10', '2019-06-30 17:32:10', 0),
(40, 'MX190628172843', 22, 19000, '2019-06-28 10:34:46', '2019-06-28 10:34:46', 0),
(39, 'OK190628172617', 22, 20900, '2019-06-28 10:27:09', '2019-06-28 10:27:09', 0),
(38, 'ET190628172221', 22, 11400, '2019-06-28 10:23:10', '2019-06-28 10:23:10', 0),
(37, 'SO190628171633', 22, 11400, '2019-06-28 10:17:28', '2019-06-28 10:17:28', 0),
(36, 'ZG190628171021', 22, 11400, '2019-06-28 10:11:23', '2020-09-07 03:50:54', 0),
(35, 'ZG190628171021', 22, 11400, '2019-06-28 10:11:19', '2019-06-28 10:11:19', 0),
(34, 'BB190628002706', 22, 109250, '2019-06-27 17:31:01', '2019-06-27 17:31:01', 0),
(33, 'UM190628000047', 22, 28500, '2019-06-27 17:01:40', '2019-06-27 17:01:40', 0),
(32, 'UM190628000047', 22, 199500, '2019-06-27 17:01:40', '2019-06-27 17:01:40', 0),
(31, 'IK190627231257', 22, 23750, '2019-06-27 16:37:53', '2019-06-27 16:37:53', 0),
(30, 'IK190627231257', 22, 99750, '2019-06-27 16:37:53', '2019-06-27 16:37:53', 0),
(48, 'MT190715024515', 22, 9500, '2019-07-14 19:58:13', '2019-07-14 19:58:13', 0),
(49, 'KZ190715212024', 22, 9500, '2019-07-15 14:29:56', '2019-07-15 14:29:56', 0),
(50, 'UV190715183828', 22, 9500, '2019-07-15 14:30:03', '2019-07-15 14:30:03', 0),
(51, 'KF190715212241', 22, 9500, '2019-07-15 19:00:27', '2019-07-15 19:00:27', 0),
(52, 'RG190716014127', 22, 9500, '2019-07-15 19:03:19', '2019-07-15 19:03:19', 0),
(53, 'RG190716014127', 22, 14345, '2019-07-15 19:03:19', '2019-07-15 19:03:19', 0),
(54, 'MK190716020815', 22, 11400, '2019-07-15 19:10:00', '2019-07-15 19:10:00', 0),
(55, 'AD190718001125', 22, 9500, '2019-07-23 13:23:06', '2019-07-23 13:23:06', 0),
(56, 'US190729010004', 24, 2565000, '2019-07-28 18:02:47', '2020-09-09 04:17:34', 2565000),
(57, 'US190729010004', 24, 25650, '2019-07-28 18:02:47', '2020-09-09 04:17:34', 25650);

--
-- Triggers `saldo_masuk`
--
DELIMITER $$
CREATE TRIGGER `tg_saldo_masuk` AFTER INSERT ON `saldo_masuk` FOR EACH ROW BEGIN
UPDATE pengguna SET saldo = saldo + NEW.saldo
WHERE id = NEW.id_pengguna;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stok_kurang`
--

CREATE TABLE `stok_kurang` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(6) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_kurang`
--

INSERT INTO `stok_kurang` (`id`, `id_produk`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 29, 2, '2019-06-28 16:59:48', '2019-06-28 16:59:48'),
(2, 29, 2, '2019-06-28 16:59:56', '2019-06-28 16:59:56'),
(3, 29, 2, '2019-06-28 17:00:33', '2019-06-28 17:00:33'),
(4, 29, 2, '2019-06-28 17:03:58', '2019-06-28 17:03:58'),
(5, 29, 3, '2019-06-28 17:05:01', '2019-06-28 17:05:01'),
(6, 29, 1, '2019-06-28 17:11:20', '2019-06-28 17:11:20'),
(7, 29, 1, '2019-06-28 17:11:23', '2019-06-28 17:11:23'),
(8, 29, 1, '2019-06-28 17:17:28', '2019-06-28 17:17:28'),
(9, 29, 1, '2019-06-28 17:23:10', '2019-06-28 17:23:10'),
(10, 29, 1, '2019-06-28 17:27:09', '2019-06-28 17:27:09'),
(11, 28, 1, '2019-06-28 17:34:46', '2019-06-28 17:34:46'),
(12, 24, 1, '2019-07-01 00:32:10', '2019-07-01 00:32:10'),
(13, 29, 1, '2019-07-01 00:32:10', '2019-07-01 00:32:10'),
(14, 28, 1, '2019-07-01 00:32:10', '2019-07-01 00:32:10'),
(15, 33, 4, '2019-07-02 15:12:15', '2019-07-02 15:12:15'),
(16, 33, 1, '2019-07-02 15:17:35', '2019-07-02 15:17:35'),
(17, 36, 3, '2019-07-02 18:09:36', '2019-07-02 18:09:36'),
(18, 38, 10, '2019-07-03 14:52:48', '2019-07-03 14:52:48'),
(19, 41, 1, '2019-07-15 02:58:13', '2019-07-15 02:58:13'),
(20, 41, 1, '2019-07-15 21:29:56', '2019-07-15 21:29:56'),
(21, 41, 1, '2019-07-15 21:30:04', '2019-07-15 21:30:04'),
(22, 41, 1, '2019-07-16 02:00:27', '2019-07-16 02:00:27'),
(23, 41, 1, '2019-07-16 02:03:19', '2019-07-16 02:03:19'),
(24, 38, 1, '2019-07-16 02:03:19', '2019-07-16 02:03:19'),
(25, 41, 1, '2019-07-16 02:10:00', '2019-07-16 02:10:00'),
(26, 41, 1, '2019-07-23 20:23:06', '2019-07-23 20:23:06'),
(27, 36, 1, '2019-07-29 01:02:47', '2019-07-29 01:02:47');

--
-- Triggers `stok_kurang`
--
DELIMITER $$
CREATE TRIGGER `tg_stok_kurang` AFTER INSERT ON `stok_kurang` FOR EACH ROW BEGIN
UPDATE produk SET stok = stok - NEW.jumlah
WHERE id = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `versi`
--

CREATE TABLE `versi` (
  `id_versi` int(11) NOT NULL,
  `version_code` int(11) NOT NULL,
  `version_name` varchar(30) NOT NULL,
  `force_update` enum('iya','tidak') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `versi`
--

INSERT INTO `versi` (`id_versi`, `version_code`, `version_name`, `force_update`, `created_at`, `updated_at`) VALUES
(1, 7, '1.7', 'iya', '2019-05-17 03:45:33', '2019-07-06 11:37:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_mitra`
--
ALTER TABLE `request_mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saldo_cair`
--
ALTER TABLE `saldo_cair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saldo_masuk`
--
ALTER TABLE `saldo_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_kurang`
--
ALTER TABLE `stok_kurang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `versi`
--
ALTER TABLE `versi`
  ADD PRIMARY KEY (`id_versi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4001;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `request_mitra`
--
ALTER TABLE `request_mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `saldo_cair`
--
ALTER TABLE `saldo_cair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `saldo_masuk`
--
ALTER TABLE `saldo_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `stok_kurang`
--
ALTER TABLE `stok_kurang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `versi`
--
ALTER TABLE `versi`
  MODIFY `id_versi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
