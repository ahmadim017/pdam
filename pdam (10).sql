-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2024 at 02:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdam`
--

-- --------------------------------------------------------

--
-- Table structure for table `aanwizings`
--

CREATE TABLE `aanwizings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `baanwizing` varchar(255) NOT NULL,
  `tglaanwizing` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `administrasis`
--

CREATE TABLE `administrasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `namadirektur` varchar(255) DEFAULT NULL,
  `telpon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_badanusaha` int(11) NOT NULL,
  `alamat` longtext NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nopkp` varchar(255) NOT NULL,
  `filenpwp` varchar(255) DEFAULT NULL,
  `filepkp` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `kodepos` varchar(255) DEFAULT NULL,
  `kantorcabang` enum('ya','tidak') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrasis`
--

INSERT INTO `administrasis` (`id`, `id_user`, `npwp`, `nama`, `namadirektur`, `telpon`, `email`, `id_badanusaha`, `alamat`, `id_provinsi`, `id_kabupaten`, `nopkp`, `filenpwp`, `filepkp`, `website`, `kodepos`, `kantorcabang`, `created_at`, `updated_at`) VALUES
(2, 11, '55.173.039.372-1.000', 'tes123', 'Ahmad S.Kom', '089685211061', 'ahmadmuhrani0507@gmail.com', 1, 'PERUM BDL II PERUSDA JL.JAMRUT 11 RT.31', 64, 6409, '12345678', '1708912039.jpg', '1708656940.pdf', NULL, '76141', 'tidak', '2024-02-22 18:55:40', '2024-02-25 17:47:19'),
(3, 16, '45.725.623.332-2.001', 'Berkah Makmur', 'Ahmad S.Kom', '089685211061', 'ahmadmuhrani07@gmail.com', 1, 'PERUM BDL II PERUSDA JL.JAMRUT 11 RT.31', 52, 5202, '12345678', '1714355398.PNG', '1714355398.jpeg', NULL, NULL, 'tidak', '2024-04-28 17:49:58', '2024-04-28 17:49:58'),
(4, 17, '82.179.892.372-6.000', 'Wira', 'Ahmad S.Kom', '089685211061', 'wira@gmail.com', 1, 'PERUM BDL II PERUSDA JL.JAMRUT 11 RT.31', 51, 5101, '12345678', '1717562162.png', '1717562162.jpeg', NULL, '76141', 'tidak', '2024-06-04 20:36:02', '2024-06-04 20:36:02'),
(5, 18, '13.456.781.000-0.021', 'maju jaya', 'Ahmad S.Kom', '089685211061', 'majumundur@gmail.com', 1, 'jln proklamasi RT.20', 35, 3517, '12345678', '1717979986.jpg', '1717979986.jpg', NULL, '76141', 'tidak', '2024-06-09 16:39:46', '2024-06-09 16:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `aktapendirians`
--

CREATE TABLE `aktapendirians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `tglsurat` date NOT NULL,
  `notaris` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `modal` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aktapendirians`
--

INSERT INTO `aktapendirians` (`id`, `id_user`, `nomor`, `tglsurat`, `notaris`, `lokasi`, `file`, `modal`, `created_at`, `updated_at`) VALUES
(2, 11, '012/2023', '2024-02-29', 'Astry Lena', 'Penajam Paser Utara', '1709166733.pdf', 1000000, '2024-02-28 16:32:13', '2024-02-28 16:32:13'),
(3, 16, '012/2023', '2024-04-29', 'Astry Lena', 'Penajam Paser Utara', '1714355672.PNG', 1000000000, '2024-04-28 17:54:32', '2024-04-28 17:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `aktaperubahans`
--

CREATE TABLE `aktaperubahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `tglsurat` varchar(255) NOT NULL,
  `notaris` varchar(255) NOT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aktaperubahans`
--

INSERT INTO `aktaperubahans` (`id`, `id_user`, `nomor`, `tglsurat`, `notaris`, `dokumen`, `created_at`, `updated_at`) VALUES
(2, 11, '012/2023', '2024-02-29', 'Astry Lena', '1709166771.jpg', '2024-02-28 16:32:51', '2024-02-28 16:32:51'),
(3, 16, '012/2023', '2024-04-29', 'Astry Lena', '1714355785.jpeg', '2024-04-28 17:56:25', '2024-04-28 17:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `badanusahas`
--

CREATE TABLE `badanusahas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badanusahas`
--

INSERT INTO `badanusahas` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'PT', NULL, NULL),
(2, 'CV', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banegoisasis`
--

CREATE TABLE `banegoisasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nosurat` varchar(255) NOT NULL,
  `tglsurat` date NOT NULL,
  `hasilnegoisasi` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bapembukaanpenawarans`
--

CREATE TABLE `bapembukaanpenawarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_paket` int(11) NOT NULL,
  `bapembukaanpenawaran` varchar(255) NOT NULL,
  `tglpembukaanpenawaran` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bidangusahas`
--

CREATE TABLE `bidangusahas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `namabidangusaha` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detailtenders`
--

CREATE TABLE `detailtenders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_paket` int(11) NOT NULL,
  `metodepengadaan` varchar(11) NOT NULL,
  `jenistender` enum('terbuka','tertutup') DEFAULT NULL,
  `bapembukaanpenawaran` varchar(255) DEFAULT NULL,
  `tglpembukaanpenawaran` date DEFAULT NULL,
  `baevaluasi` varchar(255) DEFAULT NULL,
  `tglbaevaluasi` date DEFAULT NULL,
  `baklarifikasi` varchar(255) DEFAULT NULL,
  `tglbaklarifikasi` date DEFAULT NULL,
  `memenuhiklarifikasi` enum('ya','tidak') NOT NULL DEFAULT 'tidak',
  `id_user` int(11) DEFAULT NULL,
  `banegoisasi` varchar(255) DEFAULT NULL,
  `tglnegoisasi` date DEFAULT NULL,
  `hasilnegoisasi` bigint(20) DEFAULT NULL,
  `penetapaanpemenang` enum('ya','tidak') DEFAULT 'tidak',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailtenders`
--

INSERT INTO `detailtenders` (`id`, `id_paket`, `metodepengadaan`, `jenistender`, `bapembukaanpenawaran`, `tglpembukaanpenawaran`, `baevaluasi`, `tglbaevaluasi`, `baklarifikasi`, `tglbaklarifikasi`, `memenuhiklarifikasi`, `id_user`, `banegoisasi`, `tglnegoisasi`, `hasilnegoisasi`, `penetapaanpemenang`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 918611, 'Tender', 'terbuka', '690/4.i/Tender-BK/Pokja/2024', '2024-06-12', '027/BAevaluasi/2024', '2024-06-27', '027/baklarifikasi/2024', '2024-06-27', 'ya', 16, '027/nego/2024', '2024-06-27', 825000000, 'tidak', 14, '2024-05-28 18:56:29', '2024-06-26 23:41:05'),
(2, 170161, 'Tender', 'tertutup', NULL, NULL, NULL, NULL, NULL, NULL, 'tidak', NULL, NULL, NULL, NULL, 'tidak', 14, '2024-06-05 19:15:18', '2024-06-05 19:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `doklainnyas`
--

CREATE TABLE `doklainnyas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_paket` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `name_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokumenlainnyas`
--

CREATE TABLE `dokumenlainnyas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `namadokumen` varchar(255) NOT NULL,
  `nomordokumen` varchar(255) DEFAULT NULL,
  `filedokumen` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumenlainnyas`
--

INSERT INTO `dokumenlainnyas` (`id`, `id_user`, `namadokumen`, `nomordokumen`, `filedokumen`, `created_at`, `updated_at`) VALUES
(1, 11, 'nib', '123/2023', '1709193833.jpeg', '2024-02-29 00:03:53', '2024-02-29 00:03:53'),
(2, 16, 'nib', '123/2023', '1714355889.jpg', '2024-04-28 17:58:09', '2024-04-28 17:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasiakhirs`
--

CREATE TABLE `evaluasiakhirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nilaiakhir` double(8,2) DEFAULT NULL,
  `status` enum('ya','tidak') NOT NULL DEFAULT 'tidak',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluasiakhirs`
--

INSERT INTO `evaluasiakhirs` (`id`, `id_paket`, `id_user`, `nilaiakhir`, `status`, `created_at`, `updated_at`) VALUES
(1, 918611, 11, 99.60, 'ya', '2024-06-19 23:48:21', '2024-06-20 18:24:57'),
(2, 918611, 16, 100.00, 'ya', '2024-06-20 00:17:30', '2024-06-20 00:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasibiayas`
--

CREATE TABLE `evaluasibiayas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `hargaterkoreksi` bigint(20) DEFAULT NULL,
  `persenhps` double(8,2) DEFAULT NULL,
  `nilaiharga` double(8,2) DEFAULT NULL,
  `keterangan` longtext DEFAULT NULL,
  `status` enum('ya','tidak') DEFAULT 'tidak',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluasibiayas`
--

INSERT INTO `evaluasibiayas` (`id`, `id_paket`, `id_user`, `hargaterkoreksi`, `persenhps`, `nilaiharga`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(2, 918611, 16, 845000000, 93.89, 100.00, NULL, 'ya', '2024-06-18 22:32:30', '2024-06-19 22:40:03'),
(3, 918611, 11, 823000000, 91.44, 102.67, NULL, 'ya', '2024-06-19 22:36:04', '2024-06-20 18:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasipenelitians`
--

CREATE TABLE `evaluasipenelitians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_persyaratankualifikasi` int(11) NOT NULL,
  `status` enum('ya','tidak','null') NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluasipenelitians`
--

INSERT INTO `evaluasipenelitians` (`id`, `id_paket`, `id_user`, `id_persyaratankualifikasi`, `status`, `created_at`, `updated_at`) VALUES
(1, 918611, 11, 4, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(2, 918611, 11, 5, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(3, 918611, 11, 6, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(4, 918611, 11, 7, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(5, 918611, 11, 8, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(6, 918611, 11, 9, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(7, 918611, 11, 10, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(8, 918611, 11, 11, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(9, 918611, 11, 12, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(10, 918611, 11, 13, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(11, 918611, 11, 14, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(12, 918611, 11, 15, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(13, 918611, 11, 16, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(14, 918611, 11, 17, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(15, 918611, 11, 18, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(16, 918611, 11, 19, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(17, 918611, 11, 20, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(18, 918611, 11, 28, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(19, 918611, 11, 21, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(20, 918611, 11, 22, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(21, 918611, 11, 23, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(22, 918611, 11, 24, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(23, 918611, 11, 25, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(24, 918611, 11, 26, 'ya', '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(25, 918611, 11, 1, 'ya', '2024-06-18 19:50:39', '2024-06-18 19:50:39'),
(26, 918611, 11, 2, 'ya', '2024-06-18 19:50:39', '2024-06-18 19:50:39'),
(27, 918611, 11, 3, 'ya', '2024-06-18 19:50:39', '2024-06-18 19:50:39'),
(28, 918611, 11, 27, 'ya', '2024-06-18 19:50:39', '2024-06-18 19:50:39'),
(29, 918611, 16, 27, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(30, 918611, 16, 4, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(31, 918611, 16, 5, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(32, 918611, 16, 6, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(33, 918611, 16, 7, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(34, 918611, 16, 8, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(35, 918611, 16, 9, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(36, 918611, 16, 10, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(37, 918611, 16, 11, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(38, 918611, 16, 12, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(39, 918611, 16, 13, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(40, 918611, 16, 14, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(41, 918611, 16, 15, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(42, 918611, 16, 16, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(43, 918611, 16, 17, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(44, 918611, 16, 18, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(45, 918611, 16, 19, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(46, 918611, 16, 20, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(47, 918611, 16, 28, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(48, 918611, 16, 21, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(49, 918611, 16, 22, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(50, 918611, 16, 23, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(51, 918611, 16, 24, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(52, 918611, 16, 25, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57'),
(53, 918611, 16, 26, 'ya', '2024-06-18 22:31:57', '2024-06-18 22:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasiteknis`
--

CREATE TABLE `evaluasiteknis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategoriteknis` int(11) NOT NULL,
  `persyaratan` varchar(255) NOT NULL,
  `bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluasiteknis`
--

INSERT INTO `evaluasiteknis` (`id`, `id_kategoriteknis`, `persyaratan`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 1, 'Karakteristik fisik ', 5, NULL, NULL),
(2, 1, 'Detail Desain', 5, NULL, NULL),
(3, 1, 'Toleransi', 5, NULL, NULL),
(4, 1, 'Material yang digunakan', 5, NULL, NULL),
(5, 1, 'Persyaratan Pemeliharaan', 5, NULL, NULL),
(6, 1, 'Persyaratan Operasi', 5, NULL, NULL),
(7, 1, 'Surat Dukungan Pabrik', 10, NULL, NULL),
(8, 1, 'Letter Of Intent', 10, NULL, NULL),
(9, 1, 'Surat Perjanjian dari Pabrik', 10, NULL, NULL),
(10, 1, 'Principal (khusus untuk barang inport)', 10, NULL, NULL),
(11, 1, 'Dilengkapi dengan contoh', 5, NULL, NULL),
(12, 1, 'Brosur', 3, NULL, NULL),
(13, 1, 'Gambar', 2, NULL, NULL),
(14, 2, 'Jadwal dan jangka waktu pelaksanaan pekerjaan sampai dengan Serah Terima Pekerjaan', 20, NULL, NULL),
(15, 3, 'Identitas', 8, NULL, NULL),
(16, 3, 'Type', 6, NULL, NULL),
(17, 3, 'Merk', 6, NULL, NULL),
(18, 4, 'Layanan Purna Jual', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `izinusahas`
--

CREATE TABLE `izinusahas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_klasifikasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenisizin` varchar(255) NOT NULL,
  `nomorizin` varchar(255) NOT NULL,
  `berlaku` date NOT NULL,
  `instansipemberi` varchar(255) NOT NULL,
  `kualifikasi` varchar(255) NOT NULL,
  `modalusaha` bigint(20) NOT NULL,
  `fileizin` varchar(255) NOT NULL,
  `keterangan` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `izinusahas`
--

INSERT INTO `izinusahas` (`id`, `id_klasifikasi`, `id_user`, `jenisizin`, `nomorizin`, `berlaku`, `instansipemberi`, `kualifikasi`, `modalusaha`, `fileizin`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 1, 11, 'SIUP', '012/45/2024', '2024-03-08', 'DPMPTSP Penajam Paser Utara', 'Menengah', 1000000000, '1709866048.jpg', 'SIUP', '2024-03-07 18:47:28', '2024-03-07 18:47:28'),
(5, 1, 16, 'SIUP', '012/45/2024', '2024-04-29', 'DPMPTSP Penajam Paser Utara', 'Menengah', 1000000000, '1714355532.pdf', 'SIUP', '2024-04-28 17:52:12', '2024-04-28 17:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `jadwalnontenders`
--

CREATE TABLE `jadwalnontenders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwalnontenders`
--

INSERT INTO `jadwalnontenders` (`id`, `kegiatan`, `created_at`, `updated_at`) VALUES
(1, 'Undangan', NULL, NULL),
(2, 'Pemasukan Dokumen Penawaran', NULL, NULL),
(3, 'Pembukaan Dokumen Penawaran', NULL, NULL),
(4, 'Berita Acara Negoisasi', NULL, NULL),
(5, 'Berita Acara Pengadaan Langsung', NULL, NULL),
(6, 'Penandatanganan SPK', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwalpenunjukanlangsungs`
--

CREATE TABLE `jadwalpenunjukanlangsungs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwalpenunjukanlangsungs`
--

INSERT INTO `jadwalpenunjukanlangsungs` (`id`, `kegiatan`, `created_at`, `updated_at`) VALUES
(1, 'Undangan', NULL, NULL),
(2, 'Penjelasan Pekerjaan', NULL, NULL),
(3, 'Pemasukan Dokumen Penawaran', NULL, NULL),
(4, 'Pembukaan Dokumen Penawaran', NULL, NULL),
(5, 'Berita Acara Koreksi Aritmatika', NULL, NULL),
(6, 'Evaluasi Dokumen Penawaran', NULL, NULL),
(7, 'Klarifikasi Teknis dan Negosiasi Biaya', NULL, NULL),
(8, 'Berita Acara Pengadaan Langsung', NULL, NULL),
(9, 'Penetapan Pemenang ', NULL, NULL),
(10, 'Pengumuman Pemenang', NULL, NULL),
(11, 'Penandatanganan SPK', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_paket` int(11) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `tglpelaksanaan` date NOT NULL,
  `waktumulai` time NOT NULL,
  `waktuselesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `id_paket`, `kegiatan`, `tglpelaksanaan`, `waktumulai`, `waktuselesai`, `created_at`, `updated_at`) VALUES
(36, 5809706, 'Undangan', '2024-05-28', '08:00:00', '12:00:00', '2024-05-27 21:20:53', '2024-05-27 21:20:53'),
(37, 5809706, 'Penjelasan Pekerjaan', '2024-05-29', '08:00:00', '12:00:00', '2024-05-27 21:20:53', '2024-05-27 21:20:53'),
(38, 5809706, 'Pemasukan Dokumen Penawaran', '2024-05-30', '08:00:00', '12:00:00', '2024-05-27 21:20:53', '2024-05-27 21:20:53'),
(39, 5809706, 'Pembukaan Dokumen Penawaran', '2024-05-31', '08:00:00', '12:00:00', '2024-05-27 21:20:53', '2024-05-27 21:20:53'),
(40, 5809706, 'Berita Acara Koreksi Aritmatika', '2024-06-03', '08:00:00', '12:00:00', '2024-05-27 21:20:53', '2024-05-27 21:20:53'),
(41, 5809706, 'Evaluasi Dokumen Penawaran', '2024-06-04', '08:00:00', '12:00:00', '2024-05-27 21:20:53', '2024-05-27 21:20:53'),
(42, 5809706, 'Klarifikasi Teknis dan Negosiasi Biaya', '2024-06-05', '08:00:00', '12:00:00', '2024-05-27 21:20:53', '2024-05-27 21:20:53'),
(43, 5809706, 'Berita Acara Pengadaan Langsung', '2024-06-06', '08:00:00', '12:00:00', '2024-05-27 21:20:53', '2024-05-27 21:20:53'),
(44, 5809706, 'Penetapan Pemenang', '2024-06-07', '08:00:00', '12:00:00', '2024-05-27 21:20:53', '2024-05-27 21:20:53'),
(45, 5809706, 'Pengumuman Pemenang', '2024-06-10', '08:00:00', '12:00:00', '2024-05-27 21:20:53', '2024-05-27 21:20:53'),
(46, 5809706, 'Penandatanganan SPK', '2024-06-11', '08:00:00', '12:00:00', '2024-05-27 21:20:53', '2024-05-27 21:20:53'),
(47, 918611, 'Pengumuman Tender', '2024-05-29', '08:00:00', '12:00:00', '2024-05-27 23:32:10', '2024-05-27 23:32:50'),
(48, 918611, 'BA Penjelasan Aanwizing', '2024-06-05', '08:00:00', '15:00:00', '2024-05-27 23:32:10', '2024-05-27 23:32:51'),
(49, 918611, 'BA Peninjauan Lapangan', '2024-05-31', '08:00:00', '12:00:00', '2024-05-27 23:32:10', '2024-05-27 23:32:51'),
(50, 918611, 'Pemasukan Penawaran', '2024-06-03', '08:00:00', '12:00:00', '2024-05-27 23:32:10', '2024-05-27 23:32:51'),
(51, 918611, 'BA Pemasukan Penawaran', '2024-06-04', '08:00:00', '12:00:00', '2024-05-27 23:32:10', '2024-05-27 23:32:51'),
(52, 918611, 'Pembukaan Dokumen Penawaran', '2024-06-05', '08:00:00', '12:00:00', '2024-05-27 23:32:10', '2024-05-27 23:32:51'),
(53, 918611, 'BA Penelitian', '2024-06-06', '08:00:00', '12:00:00', '2024-05-27 23:32:10', '2024-05-27 23:32:51'),
(54, 918611, 'BA Evaluasi', '2024-06-07', '08:00:00', '12:00:00', '2024-05-27 23:32:10', '2024-05-27 23:32:51'),
(55, 918611, 'Undangan Penyedia Terpilih', '2024-06-10', '08:00:00', '12:00:00', '2024-05-27 23:32:10', '2024-05-27 23:32:51'),
(56, 918611, 'BA Klarifikasi & Verifikasi', '2024-06-11', '08:00:00', '12:00:00', '2024-05-27 23:32:10', '2024-05-27 23:32:51'),
(57, 918611, 'BA Negosiasi', '2024-06-12', '08:00:00', '12:00:00', '2024-05-27 23:32:10', '2024-05-27 23:32:51'),
(58, 918611, 'Penetapan Pemenang', '2024-06-13', '08:00:00', '12:00:00', '2024-05-27 23:32:10', '2024-05-27 23:32:51'),
(59, 918611, 'Pengumuman Pemenang', '2024-06-14', '08:00:00', '12:00:00', '2024-05-27 23:32:10', '2024-05-27 23:32:51'),
(60, 918611, 'Masa Sanggah', '2024-06-17', '08:00:00', '12:00:00', '2024-05-27 23:32:10', '2024-05-27 23:32:51'),
(61, 918611, 'laporan ke PPK', '2024-06-18', '08:00:00', '12:00:00', '2024-05-27 23:32:10', '2024-05-27 23:32:51'),
(62, 918611, 'BA Serah terima berkas', '2024-06-19', '08:00:00', '12:00:00', '2024-05-27 23:32:10', '2024-05-27 23:32:51'),
(63, 918611, 'SPK', '2024-06-20', '08:00:00', '12:10:00', '2024-05-27 23:32:10', '2024-05-27 23:34:24'),
(64, 170161, 'Pengumuman Tender', '2024-06-06', '08:00:00', '12:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54'),
(65, 170161, 'BA Penjelasan Aanwizing', '2024-06-07', '08:00:00', '15:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54'),
(66, 170161, 'BA Peninjauan Lapangan', '2024-06-10', '08:00:00', '15:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54'),
(67, 170161, 'Pemasukan Penawaran', '2024-06-11', '08:00:00', '15:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54'),
(68, 170161, 'BA Pemasukan Penawaran', '2024-06-13', '08:00:00', '15:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54'),
(69, 170161, 'Pembukaan Dokumen Penawaran', '2024-06-14', '08:00:00', '15:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54'),
(70, 170161, 'BA Penelitian', '2024-06-17', '08:00:00', '15:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54'),
(71, 170161, 'BA Evaluasi', '2024-06-18', '08:00:00', '15:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54'),
(72, 170161, 'Undangan Penyedia Terpilih', '2024-06-19', '08:00:00', '15:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54'),
(73, 170161, 'BA Klarifikasi & Verifikasi', '2024-06-20', '08:00:00', '15:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54'),
(74, 170161, 'BA Negosiasi', '2024-06-24', '08:00:00', '15:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54'),
(75, 170161, 'Penetapan Pemenang', '2024-06-25', '08:00:00', '15:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54'),
(76, 170161, 'Pengumuman Pemenang', '2024-06-26', '08:00:00', '15:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54'),
(77, 170161, 'Masa Sanggah', '2024-06-27', '08:00:00', '15:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54'),
(78, 170161, 'laporan ke PPK', '2024-06-28', '08:00:00', '15:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54'),
(79, 170161, 'BA Serah terima berkas', '2024-07-01', '08:00:00', '15:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54'),
(80, 170161, 'SPK', '2024-07-02', '08:00:00', '15:00:00', '2024-06-05 19:14:54', '2024-06-05 19:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `jadwaltenders`
--

CREATE TABLE `jadwaltenders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwaltenders`
--

INSERT INTO `jadwaltenders` (`id`, `kegiatan`, `created_at`, `updated_at`) VALUES
(1, 'Pengumuman Tender', NULL, NULL),
(2, 'BA Penjelasan Aanwizing', NULL, NULL),
(3, ' BA Peninjauan Lapangan', NULL, NULL),
(4, 'Pemasukan Penawaran', NULL, NULL),
(5, 'BA Pemasukan Penawaran', NULL, NULL),
(6, 'Pembukaan Dokumen Penawaran', NULL, NULL),
(7, 'BA Penelitian', NULL, NULL),
(8, 'BA Evaluasi', NULL, NULL),
(9, 'Undangan Penyedia Terpilih ', NULL, NULL),
(10, 'BA Klarifikasi & Verifikasi', NULL, NULL),
(11, 'BA Negosiasi', NULL, NULL),
(12, 'Penetapan Pemenang', NULL, NULL),
(13, 'Pengumuman Pemenang', NULL, NULL),
(14, 'Masa Sanggah', NULL, NULL),
(15, 'laporan ke PPK', NULL, NULL),
(16, 'BA Serah terima berkas', NULL, NULL),
(17, 'SPK', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jawabans`
--

CREATE TABLE `jawabans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_penjelasan` int(11) NOT NULL,
  `verifikator` int(11) NOT NULL,
  `jawaban` longtext NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jawabans`
--

INSERT INTO `jawabans` (`id`, `id_paket`, `id_penjelasan`, `verifikator`, `jawaban`, `file`, `created_at`, `updated_at`) VALUES
(3, 5809706, 4, 14, 'iya benar pekerjaan di laksanakan 30 hari kalender setelah kontrak', NULL, '2024-05-28 17:04:21', '2024-05-28 17:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `id_provinsi`, `name`) VALUES
(1101, 11, 'KAB. ACEH SELATAN'),
(1102, 11, 'KAB. ACEH TENGGARA'),
(1103, 11, 'KAB. ACEH TIMUR'),
(1104, 11, 'KAB. ACEH TENGAH'),
(1105, 11, 'KAB. ACEH BARAT'),
(1106, 11, 'KAB. ACEH BESAR'),
(1107, 11, 'KAB. PIDIE'),
(1108, 11, 'KAB. ACEH UTARA'),
(1109, 11, 'KAB. SIMEULUE'),
(1110, 11, 'KAB. ACEH SINGKIL'),
(1111, 11, 'KAB. BIREUEN'),
(1112, 11, 'KAB. ACEH BARAT DAYA'),
(1113, 11, 'KAB. GAYO LUES'),
(1114, 11, 'KAB. ACEH JAYA'),
(1115, 11, 'KAB. NAGAN RAYA'),
(1116, 11, 'KAB. ACEH TAMIANG'),
(1117, 11, 'KAB. BENER MERIAH'),
(1118, 11, 'KAB. PIDIE JAYA'),
(1171, 11, 'KOTA BANDA ACEH'),
(1172, 11, 'KOTA SABANG'),
(1173, 11, 'KOTA LHOKSEUMAWE'),
(1174, 11, 'KOTA LANGSA'),
(1175, 11, 'KOTA SUBULUSSALAM'),
(1201, 12, 'KAB. TAPANULI TENGAH'),
(1202, 12, 'KAB. TAPANULI UTARA'),
(1203, 12, 'KAB. TAPANULI SELATAN'),
(1204, 12, 'KAB. NIAS'),
(1205, 12, 'KAB. LANGKAT'),
(1206, 12, 'KAB. KARO'),
(1207, 12, 'KAB. DELI SERDANG'),
(1208, 12, 'KAB. SIMALUNGUN'),
(1209, 12, 'KAB. ASAHAN'),
(1210, 12, 'KAB. LABUHANBATU'),
(1211, 12, 'KAB. DAIRI'),
(1212, 12, 'KAB. TOBA SAMOSIR'),
(1213, 12, 'KAB. MANDAILING NATAL'),
(1214, 12, 'KAB. NIAS SELATAN'),
(1215, 12, 'KAB. PAKPAK BHARAT'),
(1216, 12, 'KAB. HUMBANG HASUNDUTAN'),
(1217, 12, 'KAB. SAMOSIR'),
(1218, 12, 'KAB. SERDANG BEDAGAI'),
(1219, 12, 'KAB. BATU BARA'),
(1220, 12, 'KAB. PADANG LAWAS UTARA'),
(1221, 12, 'KAB. PADANG LAWAS'),
(1222, 12, 'KAB. LABUHANBATU SELATAN'),
(1223, 12, 'KAB. LABUHANBATU UTARA'),
(1224, 12, 'KAB. NIAS UTARA'),
(1225, 12, 'KAB. NIAS BARAT'),
(1271, 12, 'KOTA MEDAN'),
(1272, 12, 'KOTA PEMATANGSIANTAR'),
(1273, 12, 'KOTA SIBOLGA'),
(1274, 12, 'KOTA TANJUNG BALAI'),
(1275, 12, 'KOTA BINJAI'),
(1276, 12, 'KOTA TEBING TINGGI'),
(1277, 12, 'KOTA PADANG SIDEMPUAN'),
(1278, 12, 'KOTA GUNUNGSITOLI'),
(1301, 13, 'KAB. PESISIR SELATAN'),
(1302, 13, 'KAB. SOLOK'),
(1303, 13, 'KAB. SIJUNJUNG'),
(1304, 13, 'KAB. TANAH DATAR'),
(1305, 13, 'KAB. PADANG PARIAMAN'),
(1306, 13, 'KAB. AGAM'),
(1307, 13, 'KAB. LIMA PULUH KOTA'),
(1308, 13, 'KAB. PASAMAN'),
(1309, 13, 'KAB. KEPULAUAN MENTAWAI'),
(1310, 13, 'KAB. DHARMASRAYA'),
(1311, 13, 'KAB. SOLOK SELATAN'),
(1312, 13, 'KAB. PASAMAN BARAT'),
(1371, 13, 'KOTA PADANG'),
(1372, 13, 'KOTA SOLOK'),
(1373, 13, 'KOTA SAWAHLUNTO'),
(1374, 13, 'KOTA PADANG PANJANG'),
(1375, 13, 'KOTA BUKITTINGGI'),
(1376, 13, 'KOTA PAYAKUMBUH'),
(1377, 13, 'KOTA PARIAMAN'),
(1401, 14, 'KAB. KAMPAR'),
(1402, 14, 'KAB. INDRAGIRI HULU'),
(1403, 14, 'KAB. BENGKALIS'),
(1404, 14, 'KAB. INDRAGIRI HILIR'),
(1405, 14, 'KAB. PELALAWAN'),
(1406, 14, 'KAB. ROKAN HULU'),
(1407, 14, 'KAB. ROKAN HILIR'),
(1408, 14, 'KAB. SIAK'),
(1409, 14, 'KAB. KUANTAN SINGINGI'),
(1410, 14, 'KAB. KEPULAUAN MERANTI'),
(1471, 14, 'KOTA PEKANBARU'),
(1472, 14, 'KOTA DUMAI'),
(1501, 15, 'KAB. KERINCI'),
(1502, 15, 'KAB. MERANGIN'),
(1503, 15, 'KAB. SAROLANGUN'),
(1504, 15, 'KAB. BATANGHARI'),
(1505, 15, 'KAB. MUARO JAMBI'),
(1506, 15, 'KAB. TANJUNG JABUNG BARAT'),
(1507, 15, 'KAB. TANJUNG JABUNG TIMUR'),
(1508, 15, 'KAB. BUNGO'),
(1509, 15, 'KAB. TEBO'),
(1571, 15, 'KOTA JAMBI'),
(1572, 15, 'KOTA SUNGAI PENUH'),
(1601, 16, 'KAB. OGAN KOMERING ULU'),
(1602, 16, 'KAB. OGAN KOMERING ILIR'),
(1603, 16, 'KAB. MUARA ENIM'),
(1604, 16, 'KAB. LAHAT'),
(1605, 16, 'KAB. MUSI RAWAS'),
(1606, 16, 'KAB. MUSI BANYUASIN'),
(1607, 16, 'KAB. BANYUASIN'),
(1608, 16, 'KAB. OGAN KOMERING ULU TIMUR'),
(1609, 16, 'KAB. OGAN KOMERING ULU SELATAN'),
(1610, 16, 'KAB. OGAN ILIR'),
(1611, 16, 'KAB. EMPAT LAWANG'),
(1612, 16, 'KAB. PENUKAL ABAB LEMATANG ILIR'),
(1613, 16, 'KAB. MUSI RAWAS UTARA'),
(1671, 16, 'KOTA PALEMBANG'),
(1672, 16, 'KOTA PAGAR ALAM'),
(1673, 16, 'KOTA LUBUK LINGGAU'),
(1674, 16, 'KOTA PRABUMULIH'),
(1701, 17, 'KAB. BENGKULU SELATAN'),
(1702, 17, 'KAB. REJANG LEBONG'),
(1703, 17, 'KAB. BENGKULU UTARA'),
(1704, 17, 'KAB. KAUR'),
(1705, 17, 'KAB. SELUMA'),
(1706, 17, 'KAB. MUKO MUKO'),
(1707, 17, 'KAB. LEBONG'),
(1708, 17, 'KAB. KEPAHIANG'),
(1709, 17, 'KAB. BENGKULU TENGAH'),
(1771, 17, 'KOTA BENGKULU'),
(1801, 18, 'KAB. LAMPUNG SELATAN'),
(1802, 18, 'KAB. LAMPUNG TENGAH'),
(1803, 18, 'KAB. LAMPUNG UTARA'),
(1804, 18, 'KAB. LAMPUNG BARAT'),
(1805, 18, 'KAB. TULANG BAWANG'),
(1806, 18, 'KAB. TANGGAMUS'),
(1807, 18, 'KAB. LAMPUNG TIMUR'),
(1808, 18, 'KAB. WAY KANAN'),
(1809, 18, 'KAB. PESAWARAN'),
(1810, 18, 'KAB. PRINGSEWU'),
(1811, 18, 'KAB. MESUJI'),
(1812, 18, 'KAB. TULANG BAWANG BARAT'),
(1813, 18, 'KAB. PESISIR BARAT'),
(1871, 18, 'KOTA BANDAR LAMPUNG'),
(1872, 18, 'KOTA METRO'),
(1901, 19, 'KAB. BANGKA'),
(1902, 19, 'KAB. BELITUNG'),
(1903, 19, 'KAB. BANGKA SELATAN'),
(1904, 19, 'KAB. BANGKA TENGAH'),
(1905, 19, 'KAB. BANGKA BARAT'),
(1906, 19, 'KAB. BELITUNG TIMUR'),
(1971, 19, 'KOTA PANGKAL PINANG'),
(2101, 21, 'KAB. BINTAN'),
(2102, 21, 'KAB. KARIMUN'),
(2103, 21, 'KAB. NATUNA'),
(2104, 21, 'KAB. LINGGA'),
(2105, 21, 'KAB. KEPULAUAN ANAMBAS'),
(2171, 21, 'KOTA BATAM'),
(2172, 21, 'KOTA TANJUNG PINANG'),
(3101, 31, 'KAB. ADM. KEP. SERIBU'),
(3171, 31, 'KOTA ADM. JAKARTA PUSAT'),
(3172, 31, 'KOTA ADM. JAKARTA UTARA'),
(3173, 31, 'KOTA ADM. JAKARTA BARAT'),
(3174, 31, 'KOTA ADM. JAKARTA SELATAN'),
(3175, 31, 'KOTA ADM. JAKARTA TIMUR'),
(3201, 32, 'KAB. BOGOR'),
(3202, 32, 'KAB. SUKABUMI'),
(3203, 32, 'KAB. CIANJUR'),
(3204, 32, 'KAB. BANDUNG'),
(3205, 32, 'KAB. GARUT'),
(3206, 32, 'KAB. TASIKMALAYA'),
(3207, 32, 'KAB. CIAMIS'),
(3208, 32, 'KAB. KUNINGAN'),
(3209, 32, 'KAB. CIREBON'),
(3210, 32, 'KAB. MAJALENGKA'),
(3211, 32, 'KAB. SUMEDANG'),
(3212, 32, 'KAB. INDRAMAYU'),
(3213, 32, 'KAB. SUBANG'),
(3214, 32, 'KAB. PURWAKARTA'),
(3215, 32, 'KAB. KARAWANG'),
(3216, 32, 'KAB. BEKASI'),
(3217, 32, 'KAB. BANDUNG BARAT'),
(3218, 32, 'KAB. PANGANDARAN'),
(3271, 32, 'KOTA BOGOR'),
(3272, 32, 'KOTA SUKABUMI'),
(3273, 32, 'KOTA BANDUNG'),
(3274, 32, 'KOTA CIREBON'),
(3275, 32, 'KOTA BEKASI'),
(3276, 32, 'KOTA DEPOK'),
(3277, 32, 'KOTA CIMAHI'),
(3278, 32, 'KOTA TASIKMALAYA'),
(3279, 32, 'KOTA BANJAR'),
(3301, 33, 'KAB. CILACAP'),
(3302, 33, 'KAB. BANYUMAS'),
(3303, 33, 'KAB. PURBALINGGA'),
(3304, 33, 'KAB. BANJARNEGARA'),
(3305, 33, 'KAB. KEBUMEN'),
(3306, 33, 'KAB. PURWOREJO'),
(3307, 33, 'KAB. WONOSOBO'),
(3308, 33, 'KAB. MAGELANG'),
(3309, 33, 'KAB. BOYOLALI'),
(3310, 33, 'KAB. KLATEN'),
(3311, 33, 'KAB. SUKOHARJO'),
(3312, 33, 'KAB. WONOGIRI'),
(3313, 33, 'KAB. KARANGANYAR'),
(3314, 33, 'KAB. SRAGEN'),
(3315, 33, 'KAB. GROBOGAN'),
(3316, 33, 'KAB. BLORA'),
(3317, 33, 'KAB. REMBANG'),
(3318, 33, 'KAB. PATI'),
(3319, 33, 'KAB. KUDUS'),
(3320, 33, 'KAB. JEPARA'),
(3321, 33, 'KAB. DEMAK'),
(3322, 33, 'KAB. SEMARANG'),
(3323, 33, 'KAB. TEMANGGUNG'),
(3324, 33, 'KAB. KENDAL'),
(3325, 33, 'KAB. BATANG'),
(3326, 33, 'KAB. PEKALONGAN'),
(3327, 33, 'KAB. PEMALANG'),
(3328, 33, 'KAB. TEGAL'),
(3329, 33, 'KAB. BREBES'),
(3371, 33, 'KOTA MAGELANG'),
(3372, 33, 'KOTA SURAKARTA'),
(3373, 33, 'KOTA SALATIGA'),
(3374, 33, 'KOTA SEMARANG'),
(3375, 33, 'KOTA PEKALONGAN'),
(3376, 33, 'KOTA TEGAL'),
(3401, 34, 'KAB. KULON PROGO'),
(3402, 34, 'KAB. BANTUL'),
(3403, 34, 'KAB. GUNUNGKIDUL'),
(3404, 34, 'KAB. SLEMAN'),
(3471, 34, 'KOTA YOGYAKARTA'),
(3501, 35, 'KAB. PACITAN'),
(3502, 35, 'KAB. PONOROGO'),
(3503, 35, 'KAB. TRENGGALEK'),
(3504, 35, 'KAB. TULUNGAGUNG'),
(3505, 35, 'KAB. BLITAR'),
(3506, 35, 'KAB. KEDIRI'),
(3507, 35, 'KAB. MALANG'),
(3508, 35, 'KAB. LUMAJANG'),
(3509, 35, 'KAB. JEMBER'),
(3510, 35, 'KAB. BANYUWANGI'),
(3511, 35, 'KAB. BONDOWOSO'),
(3512, 35, 'KAB. SITUBONDO'),
(3513, 35, 'KAB. PROBOLINGGO'),
(3514, 35, 'KAB. PASURUAN'),
(3515, 35, 'KAB. SIDOARJO'),
(3516, 35, 'KAB. MOJOKERTO'),
(3517, 35, 'KAB. JOMBANG'),
(3518, 35, 'KAB. NGANJUK'),
(3519, 35, 'KAB. MADIUN'),
(3520, 35, 'KAB. MAGETAN'),
(3521, 35, 'KAB. NGAWI'),
(3522, 35, 'KAB. BOJONEGORO'),
(3523, 35, 'KAB. TUBAN'),
(3524, 35, 'KAB. LAMONGAN'),
(3525, 35, 'KAB. GRESIK'),
(3526, 35, 'KAB. BANGKALAN'),
(3527, 35, 'KAB. SAMPANG'),
(3528, 35, 'KAB. PAMEKASAN'),
(3529, 35, 'KAB. SUMENEP'),
(3571, 35, 'KOTA KEDIRI'),
(3572, 35, 'KOTA BLITAR'),
(3573, 35, 'KOTA MALANG'),
(3574, 35, 'KOTA PROBOLINGGO'),
(3575, 35, 'KOTA PASURUAN'),
(3576, 35, 'KOTA MOJOKERTO'),
(3577, 35, 'KOTA MADIUN'),
(3578, 35, 'KOTA SURABAYA'),
(3579, 35, 'KOTA BATU'),
(3601, 36, 'KAB. PANDEGLANG'),
(3602, 36, 'KAB. LEBAK'),
(3603, 36, 'KAB. TANGERANG'),
(3604, 36, 'KAB. SERANG'),
(3671, 36, 'KOTA TANGERANG'),
(3672, 36, 'KOTA CILEGON'),
(3673, 36, 'KOTA SERANG'),
(3674, 36, 'KOTA TANGERANG SELATAN'),
(5101, 51, 'KAB. JEMBRANA'),
(5102, 51, 'KAB. TABANAN'),
(5103, 51, 'KAB. BADUNG'),
(5104, 51, 'KAB. GIANYAR'),
(5105, 51, 'KAB. KLUNGKUNG'),
(5106, 51, 'KAB. BANGLI'),
(5107, 51, 'KAB. KARANGASEM'),
(5108, 51, 'KAB. BULELENG'),
(5171, 51, 'KOTA DENPASAR'),
(5201, 52, 'KAB. LOMBOK BARAT'),
(5202, 52, 'KAB. LOMBOK TENGAH'),
(5203, 52, 'KAB. LOMBOK TIMUR'),
(5204, 52, 'KAB. SUMBAWA'),
(5205, 52, 'KAB. DOMPU'),
(5206, 52, 'KAB. BIMA'),
(5207, 52, 'KAB. SUMBAWA BARAT'),
(5208, 52, 'KAB. LOMBOK UTARA'),
(5271, 52, 'KOTA MATARAM'),
(5272, 52, 'KOTA BIMA'),
(5301, 53, 'KAB. KUPANG'),
(5302, 53, 'KAB TIMOR TENGAH SELATAN'),
(5303, 53, 'KAB. TIMOR TENGAH UTARA'),
(5304, 53, 'KAB. BELU'),
(5305, 53, 'KAB. ALOR'),
(5306, 53, 'KAB. FLORES TIMUR'),
(5307, 53, 'KAB. SIKKA'),
(5308, 53, 'KAB. ENDE'),
(5309, 53, 'KAB. NGADA'),
(5310, 53, 'KAB. MANGGARAI'),
(5311, 53, 'KAB. SUMBA TIMUR'),
(5312, 53, 'KAB. SUMBA BARAT'),
(5313, 53, 'KAB. LEMBATA'),
(5314, 53, 'KAB. ROTE NDAO'),
(5315, 53, 'KAB. MANGGARAI BARAT'),
(5316, 53, 'KAB. NAGEKEO'),
(5317, 53, 'KAB. SUMBA TENGAH'),
(5318, 53, 'KAB. SUMBA BARAT DAYA'),
(5319, 53, 'KAB. MANGGARAI TIMUR'),
(5320, 53, 'KAB. SABU RAIJUA'),
(5321, 53, 'KAB. MALAKA'),
(5371, 53, 'KOTA KUPANG'),
(6101, 61, 'KAB. SAMBAS'),
(6102, 61, 'KAB. MEMPAWAH'),
(6103, 61, 'KAB. SANGGAU'),
(6104, 61, 'KAB. KETAPANG'),
(6105, 61, 'KAB. SINTANG'),
(6106, 61, 'KAB. KAPUAS HULU'),
(6107, 61, 'KAB. BENGKAYANG'),
(6108, 61, 'KAB. LANDAK'),
(6109, 61, 'KAB. SEKADAU'),
(6110, 61, 'KAB. MELAWI'),
(6111, 61, 'KAB. KAYONG UTARA'),
(6112, 61, 'KAB. KUBU RAYA'),
(6171, 61, 'KOTA PONTIANAK'),
(6172, 61, 'KOTA SINGKAWANG'),
(6201, 62, 'KAB. KOTAWARINGIN BARAT'),
(6202, 62, 'KAB. KOTAWARINGIN TIMUR'),
(6203, 62, 'KAB. KAPUAS'),
(6204, 62, 'KAB. BARITO SELATAN'),
(6205, 62, 'KAB. BARITO UTARA'),
(6206, 62, 'KAB. KATINGAN'),
(6207, 62, 'KAB. SERUYAN'),
(6208, 62, 'KAB. SUKAMARA'),
(6209, 62, 'KAB. LAMANDAU'),
(6210, 62, 'KAB. GUNUNG MAS'),
(6211, 62, 'KAB. PULANG PISAU'),
(6212, 62, 'KAB. MURUNG RAYA'),
(6213, 62, 'KAB. BARITO TIMUR'),
(6271, 62, 'KOTA PALANGKARAYA'),
(6301, 63, 'KAB. TANAH LAUT'),
(6302, 63, 'KAB. KOTABARU'),
(6303, 63, 'KAB. BANJAR'),
(6304, 63, 'KAB. BARITO KUALA'),
(6305, 63, 'KAB. TAPIN'),
(6306, 63, 'KAB. HULU SUNGAI SELATAN'),
(6307, 63, 'KAB. HULU SUNGAI TENGAH'),
(6308, 63, 'KAB. HULU SUNGAI UTARA'),
(6309, 63, 'KAB. TABALONG'),
(6310, 63, 'KAB. TANAH BUMBU'),
(6311, 63, 'KAB. BALANGAN'),
(6371, 63, 'KOTA BANJARMASIN'),
(6372, 63, 'KOTA BANJARBARU'),
(6401, 64, 'KAB. PASER'),
(6402, 64, 'KAB. KUTAI KARTANEGARA'),
(6403, 64, 'KAB. BERAU'),
(6407, 64, 'KAB. KUTAI BARAT'),
(6408, 64, 'KAB. KUTAI TIMUR'),
(6409, 64, 'KAB. PENAJAM PASER UTARA'),
(6411, 64, 'KAB. MAHAKAM ULU'),
(6471, 64, 'KOTA BALIKPAPAN'),
(6472, 64, 'KOTA SAMARINDA'),
(6474, 64, 'KOTA BONTANG'),
(6501, 65, 'KAB. BULUNGAN'),
(6502, 65, 'KAB. MALINAU'),
(6503, 65, 'KAB. NUNUKAN'),
(6504, 65, 'KAB. TANA TIDUNG'),
(6571, 65, 'KOTA TARAKAN'),
(7101, 71, 'KAB. BOLAANG MONGONDOW'),
(7102, 71, 'KAB. MINAHASA'),
(7103, 71, 'KAB. KEPULAUAN SANGIHE'),
(7104, 71, 'KAB. KEPULAUAN TALAUD'),
(7105, 71, 'KAB. MINAHASA SELATAN'),
(7106, 71, 'KAB. MINAHASA UTARA'),
(7107, 71, 'KAB. MINAHASA TENGGARA'),
(7108, 71, 'KAB. BOLAANG MONGONDOW UTARA'),
(7109, 71, 'KAB. KEP. SIAU TAGULANDANG BIARO'),
(7110, 71, 'KAB. BOLAANG MONGONDOW TIMUR'),
(7111, 71, 'KAB. BOLAANG MONGONDOW SELATAN'),
(7171, 71, 'KOTA MANADO'),
(7172, 71, 'KOTA BITUNG'),
(7173, 71, 'KOTA TOMOHON'),
(7174, 71, 'KOTA KOTAMOBAGU'),
(7201, 72, 'KAB. BANGGAI'),
(7202, 72, 'KAB. POSO'),
(7203, 72, 'KAB. DONGGALA'),
(7204, 72, 'KAB. TOLI TOLI'),
(7205, 72, 'KAB. BUOL'),
(7206, 72, 'KAB. MOROWALI'),
(7207, 72, 'KAB. BANGGAI KEPULAUAN'),
(7208, 72, 'KAB. PARIGI MOUTONG'),
(7209, 72, 'KAB. TOJO UNA UNA'),
(7210, 72, 'KAB. SIGI'),
(7211, 72, 'KAB. BANGGAI LAUT'),
(7212, 72, 'KAB. MOROWALI UTARA'),
(7271, 72, 'KOTA PALU'),
(7301, 73, 'KAB. KEPULAUAN SELAYAR'),
(7302, 73, 'KAB. BULUKUMBA'),
(7303, 73, 'KAB. BANTAENG'),
(7304, 73, 'KAB. JENEPONTO'),
(7305, 73, 'KAB. TAKALAR'),
(7306, 73, 'KAB. GOWA'),
(7307, 73, 'KAB. SINJAI'),
(7308, 73, 'KAB. BONE'),
(7309, 73, 'KAB. MAROS'),
(7310, 73, 'KAB. PANGKAJENE KEPULAUAN'),
(7311, 73, 'KAB. BARRU'),
(7312, 73, 'KAB. SOPPENG'),
(7313, 73, 'KAB. WAJO'),
(7314, 73, 'KAB. SIDENRENG RAPPANG'),
(7315, 73, 'KAB. PINRANG'),
(7316, 73, 'KAB. ENREKANG'),
(7317, 73, 'KAB. LUWU'),
(7318, 73, 'KAB. TANA TORAJA'),
(7322, 73, 'KAB. LUWU UTARA'),
(7324, 73, 'KAB. LUWU TIMUR'),
(7326, 73, 'KAB. TORAJA UTARA'),
(7371, 73, 'KOTA MAKASSAR'),
(7372, 73, 'KOTA PARE PARE'),
(7373, 73, 'KOTA PALOPO'),
(7401, 74, 'KAB. KOLAKA'),
(7402, 74, 'KAB. KONAWE'),
(7403, 74, 'KAB. MUNA'),
(7404, 74, 'KAB. BUTON'),
(7405, 74, 'KAB. KONAWE SELATAN'),
(7406, 74, 'KAB. BOMBANA'),
(7407, 74, 'KAB. WAKATOBI'),
(7408, 74, 'KAB. KOLAKA UTARA'),
(7409, 74, 'KAB. KONAWE UTARA'),
(7410, 74, 'KAB. BUTON UTARA'),
(7411, 74, 'KAB. KOLAKA TIMUR'),
(7412, 74, 'KAB. KONAWE KEPULAUAN'),
(7413, 74, 'KAB. MUNA BARAT'),
(7414, 74, 'KAB. BUTON TENGAH'),
(7415, 74, 'KAB. BUTON SELATAN'),
(7471, 74, 'KOTA KENDARI'),
(7472, 74, 'KOTA BAU BAU'),
(7501, 75, 'KAB. GORONTALO'),
(7502, 75, 'KAB. BOALEMO'),
(7503, 75, 'KAB. BONE BOLANGO'),
(7504, 75, 'KAB. PAHUWATO'),
(7505, 75, 'KAB. GORONTALO UTARA'),
(7571, 75, 'KOTA GORONTALO'),
(7601, 76, 'KAB. PASANGKAYU'),
(7602, 76, 'KAB. MAMUJU'),
(7603, 76, 'KAB. MAMASA'),
(7604, 76, 'KAB. POLEWALI MANDAR'),
(7605, 76, 'KAB. MAJENE'),
(7606, 76, 'KAB. MAMUJU TENGAH'),
(8101, 81, 'KAB. MALUKU TENGAH'),
(8102, 81, 'KAB. MALUKU TENGGARA'),
(8103, 81, 'KAB. KEPULAUAN TANIMBAR'),
(8104, 81, 'KAB. BURU'),
(8105, 81, 'KAB. SERAM BAGIAN TIMUR'),
(8106, 81, 'KAB. SERAM BAGIAN BARAT'),
(8107, 81, 'KAB. KEPULAUAN ARU'),
(8108, 81, 'KAB. MALUKU BARAT DAYA'),
(8109, 81, 'KAB. BURU SELATAN'),
(8171, 81, 'KOTA AMBON'),
(8172, 81, 'KOTA TUAL'),
(8201, 82, 'KAB. HALMAHERA BARAT'),
(8202, 82, 'KAB. HALMAHERA TENGAH'),
(8203, 82, 'KAB. HALMAHERA UTARA'),
(8204, 82, 'KAB. HALMAHERA SELATAN'),
(8205, 82, 'KAB. KEPULAUAN SULA'),
(8206, 82, 'KAB. HALMAHERA TIMUR'),
(8207, 82, 'KAB. PULAU MOROTAI'),
(8208, 82, 'KAB. PULAU TALIABU'),
(8271, 82, 'KOTA TERNATE'),
(8272, 82, 'KOTA TIDORE KEPULAUAN'),
(9101, 91, 'KAB. MERAUKE'),
(9102, 91, 'KAB. JAYAWIJAYA'),
(9103, 91, 'KAB. JAYAPURA'),
(9104, 91, 'KAB. NABIRE'),
(9105, 91, 'KAB. KEPULAUAN YAPEN'),
(9106, 91, 'KAB. BIAK NUMFOR'),
(9107, 91, 'KAB. PUNCAK JAYA'),
(9108, 91, 'KAB. PANIAI'),
(9109, 91, 'KAB. MIMIKA'),
(9110, 91, 'KAB. SARMI'),
(9111, 91, 'KAB. KEEROM'),
(9112, 91, 'KAB PEGUNUNGAN BINTANG'),
(9113, 91, 'KAB. YAHUKIMO'),
(9114, 91, 'KAB. TOLIKARA'),
(9115, 91, 'KAB. WAROPEN'),
(9116, 91, 'KAB. BOVEN DIGOEL'),
(9117, 91, 'KAB. MAPPI'),
(9118, 91, 'KAB. ASMAT'),
(9119, 91, 'KAB. SUPIORI'),
(9120, 91, 'KAB. MAMBERAMO RAYA'),
(9121, 91, 'KAB. MAMBERAMO TENGAH'),
(9122, 91, 'KAB. YALIMO'),
(9123, 91, 'KAB. LANNY JAYA'),
(9124, 91, 'KAB. NDUGA'),
(9125, 91, 'KAB. PUNCAK'),
(9126, 91, 'KAB. DOGIYAI'),
(9127, 91, 'KAB. INTAN JAYA'),
(9128, 91, 'KAB. DEIYAI'),
(9171, 91, 'KOTA JAYAPURA'),
(9201, 92, 'KAB. SORONG'),
(9202, 92, 'KAB. MANOKWARI'),
(9203, 92, 'KAB. FAK FAK'),
(9204, 92, 'KAB. SORONG SELATAN'),
(9205, 92, 'KAB. RAJA AMPAT'),
(9206, 92, 'KAB. TELUK BINTUNI'),
(9207, 92, 'KAB. TELUK WONDAMA'),
(9208, 92, 'KAB. KAIMANA'),
(9209, 92, 'KAB. TAMBRAUW'),
(9210, 92, 'KAB. MAYBRAT'),
(9211, 92, 'KAB. MANOKWARI SELATAN'),
(9212, 92, 'KAB. PEGUNUNGAN ARFAK'),
(9271, 92, 'KOTA SORONG');

-- --------------------------------------------------------

--
-- Table structure for table `kaks`
--

CREATE TABLE `kaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_paket` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `name_file` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kaks`
--

INSERT INTO `kaks` (`id`, `id_paket`, `created_by`, `name_file`, `file`, `created_at`, `updated_at`) VALUES
(20, 5809706, 14, 'Invoice 1649945288(1)_1716873773.PDF', 'dist/kak/Invoice 1649945288(1)_1716873773.PDF', '2024-05-27 21:22:53', '2024-05-27 21:22:53'),
(22, 918611, 14, 'Invoice 1649945288(1)_1716880943.PDF', 'dist/kak/Invoice 1649945288(1)_1716880943.PDF', '2024-05-27 23:22:23', '2024-05-27 23:22:23'),
(23, 170161, 14, 'Jawaban Survey Internal Disdukcapil Perencanaan_1717643512.xlsx', 'dist/kak/Jawaban Survey Internal Disdukcapil Perencanaan_1717643512.xlsx', '2024-06-05 19:11:53', '2024-06-05 19:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `kategorikualifikasis`
--

CREATE TABLE `kategorikualifikasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategorikualifikasis`
--

INSERT INTO `kategorikualifikasis` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Surat Kuasa', NULL, NULL),
(2, 'Jaminan Penawaran', NULL, NULL),
(3, 'Penawaran', NULL, NULL),
(4, 'Rencana Anggaran Biaya (RAB)', NULL, NULL),
(5, 'Jadwal Pelaksanaan', NULL, NULL),
(6, 'Dukungan Pabrik', NULL, NULL),
(7, 'Bagian Pekerjaan yang disubkontrakan', NULL, NULL),
(8, 'Brosur', NULL, NULL),
(9, 'Penggunaan APD ditempat pekerjaan', NULL, NULL),
(10, 'Sertifikat Ketenagakerjaan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategoriteknis`
--

CREATE TABLE `kategoriteknis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoriteknis`
--

INSERT INTO `kategoriteknis` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Speseifikasi Teknis', NULL, NULL),
(2, 'Jadwal dan Jangka Waktu', NULL, NULL),
(3, 'Identitas (Jenis, tipe dan merk)', NULL, NULL),
(4, 'Layanan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasis`
--

CREATE TABLE `klasifikasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `klasifikasis`
--

INSERT INTO `klasifikasis` (`id`, `klasifikasi`, `created_at`, `updated_at`) VALUES
(1, 'Pengadaan Barang', '2024-02-06 05:29:44', '2024-02-06 05:29:44'),
(2, 'Jasa Konsultansi Badan Usaha', '2024-02-06 05:31:12', '2024-02-06 05:31:12'),
(3, 'Jasa Lainnya', '2024-02-06 05:30:24', '2024-02-06 05:30:24'),
(4, 'Jasa Konsultansi Perorangan', '2024-02-06 05:30:24', '2024-02-06 05:30:24'),
(5, 'Jasa Konstruksi', '2024-02-06 05:30:52', '2024-02-06 05:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `kontraks`
--

CREATE TABLE `kontraks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `nilaikontrak` bigint(20) NOT NULL,
  `nosurat` varchar(255) NOT NULL,
  `tglsurat` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kotakmasuks`
--

CREATE TABLE `kotakmasuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('ya','tidak') DEFAULT 'tidak',
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kotakmasuks`
--

INSERT INTO `kotakmasuks` (`id`, `judul`, `id_paket`, `id_user`, `status`, `tanggal`, `created_at`, `updated_at`) VALUES
(15, 'undangan', 5809706, 11, 'ya', '2024-05-28', '2024-05-27 21:26:52', '2024-05-28 16:57:45'),
(16, 'undangan ', 5809706, 16, 'ya', '2024-05-28', '2024-05-27 21:27:30', '2024-06-04 20:32:30'),
(45, 'Undangan Verifikasi', 918611, 11, 'tidak', '2024-06-20', '2024-06-19 18:53:56', '2024-06-19 18:53:56'),
(46, 'Undangan Verifikasi', 918611, 16, 'tidak', '2024-06-20', '2024-06-19 19:00:52', '2024-06-19 19:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `metodepengadaans`
--

CREATE TABLE `metodepengadaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metodepengadaans`
--

INSERT INTO `metodepengadaans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Pengadaan Langsung', NULL, NULL),
(2, 'Penunjukan Langsung', NULL, NULL),
(3, 'Tender', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_01_040054_create_slides_table', 2),
(6, '2024_02_01_055756_create_pengajuanpenyedias_table', 3),
(9, '2024_02_01_062245_create_provinsis_table', 4),
(10, '2024_02_01_062303_create_kabupatens_table', 4),
(11, '2024_02_01_060728_create_profils_table', 5),
(12, '2024_02_01_060750_create_berkas_table', 5),
(13, '2024_02_05_041625_create_badanusahas_table', 6),
(14, '2024_02_05_063144_create_administrasis_table', 7),
(15, '2024_02_06_010645_create_klasifikasis_table', 8),
(16, '2024_02_06_010901_create_bidangusahas_table', 9),
(17, '2024_02_06_035129_create_izinusahas_table', 10),
(18, '2024_02_06_071506_create_aktapendirians_table', 11),
(19, '2024_02_06_071521_create_aktaperubahans_table', 11),
(20, '2024_02_06_071552_create_pengesahans_table', 11),
(21, '2024_02_16_014807_create_pengurusperushaans_table', 12),
(22, '2024_02_16_020101_create_pajaks_table', 13),
(23, '2024_02_16_024211_create_dokumenlainnyas_table', 14),
(25, '2024_02_22_010946_create_pengalamen_table', 15),
(26, '2024_02_22_041601_create_tenagaahlis_table', 16),
(28, '2024_02_22_061910_create_suratpernyataans_table', 17),
(29, '2024_02_22_054038_create_perlengkapans_table', 18),
(30, '2024_03_15_031654_create_paketpekerjaans_table', 19),
(32, '2024_03_18_050218_create_jadwals_table', 20),
(33, '2024_03_20_044943_create_nontenders_table', 21),
(34, '2024_03_22_004521_create_kaks_table', 22),
(35, '2024_03_22_004817_create_rancangankontraks_table', 23),
(36, '2024_03_22_004845_create_uraianpekerjaans_table', 23),
(37, '2024_03_22_004932_create_doklainnyas_table', 23),
(38, '2024_03_25_001313_create_metodepengadaans_table', 24),
(39, '2024_03_25_003438_create_jadwalnontenders_table', 25),
(40, '2024_04_24_005021_create_kotakmasuks_table', 26),
(41, '2024_04_25_005800_create_jadwalpenunjukanlangsungs_table', 27),
(42, '2024_04_25_021628_create_kontraks_table', 28),
(43, '2024_04_29_023639_create_perubahanpenyedias_table', 29),
(44, '2024_05_07_053503_create_penjelasans_table', 30),
(45, '2024_05_07_053808_create_jawabans_table', 30),
(46, '2024_05_08_075615_create_aanwizings_table', 31),
(47, '2024_05_28_022555_create_tenders_table', 31),
(48, '2024_05_28_035524_create_pakettenders_table', 32),
(49, '2024_05_28_054311_create_jadwaltenders_table', 33),
(50, '2024_05_28_074332_create_prosestenders_table', 34),
(51, '2024_05_28_074932_create_detailtenders_table', 35),
(52, '2024_06_12_055358_create_bapembukaanpenawarans_table', 36),
(53, '2024_06_19_012317_create_persyaratankualifikasis_table', 37),
(54, '2024_06_19_013536_create_kategorikualifikasis_table', 38),
(55, '2024_06_19_021252_create_kategoriteknis_table', 39),
(56, '2024_06_19_021317_create_evaluasiteknis_table', 39),
(57, '2024_06_19_031913_create_evaluasipenelitians_table', 40),
(59, '2024_06_19_032300_create_persyaratanevaluasiteknis_table', 41),
(60, '2024_06_19_041217_create_evaluasibiayas_table', 42),
(62, '2024_06_20_010211_create_undanganklarifikasis_table', 43),
(63, '2024_06_20_073747_create_evaluasiakhirs_table', 44),
(64, '2024_06_21_005143_create_banegoisasis_table', 45);

-- --------------------------------------------------------

--
-- Table structure for table `mytable`
--

CREATE TABLE `mytable` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mytable`
--

INSERT INTO `mytable` (`id`, `name`) VALUES
(11, 'ACEH'),
(12, 'SUMATERA UTARA'),
(13, 'SUMATERA BARAT'),
(14, 'RIAU'),
(15, 'JAMBI'),
(16, 'SUMATERA SELATAN'),
(17, 'BENGKULU'),
(18, 'LAMPUNG'),
(19, 'KEPULAUAN BANGKA BELITUNG'),
(21, 'KEPULAUAN RIAU'),
(31, 'DKI JAKARTA'),
(32, 'JAWA BARAT'),
(33, 'JAWA TENGAH'),
(34, 'DI YOGYAKARTA'),
(35, 'JAWA TIMUR'),
(36, 'BANTEN'),
(51, 'BALI'),
(52, 'NUSA TENGGARA BARAT'),
(53, 'NUSA TENGGARA TIMUR'),
(61, 'KALIMANTAN BARAT'),
(62, 'KALIMANTAN TENGAH'),
(63, 'KALIMANTAN SELATAN'),
(64, 'KALIMANTAN TIMUR'),
(65, 'KALIMANTAN UTARA'),
(71, 'SULAWESI UTARA'),
(72, 'SULAWESI TENGAH'),
(73, 'SULAWESI SELATAN'),
(74, 'SULAWESI TENGGARA'),
(75, 'GORONTALO'),
(76, 'SULAWESI BARAT'),
(81, 'MALUKU'),
(82, 'MALUKU UTARA'),
(91, 'PAPUA BARAT'),
(94, 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `nontenders`
--

CREATE TABLE `nontenders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nosurat` varchar(255) DEFAULT NULL,
  `tglsurat` date DEFAULT NULL,
  `metodepengadaan` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `filepenawaran` varchar(255) DEFAULT NULL,
  `name_file` varchar(255) DEFAULT NULL,
  `hargapenawaran` bigint(20) DEFAULT NULL,
  `nosuratpenawaran` varchar(255) DEFAULT NULL,
  `tglsuratpenawaran` date DEFAULT NULL,
  `baaanwizing` varchar(255) DEFAULT NULL,
  `tglaanwizing` date DEFAULT NULL,
  `baaritmatik` varchar(255) DEFAULT NULL,
  `tglaritmatik` date DEFAULT NULL,
  `status` enum('Verifikasi','Diterima') DEFAULT 'Verifikasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nontenders`
--

INSERT INTO `nontenders` (`id`, `id_paket`, `id_user`, `nosurat`, `tglsurat`, `metodepengadaan`, `created_by`, `filepenawaran`, `name_file`, `hargapenawaran`, `nosuratpenawaran`, `tglsuratpenawaran`, `baaanwizing`, `tglaanwizing`, `baaritmatik`, `tglaritmatik`, `status`, `created_at`, `updated_at`) VALUES
(8, 5809706, 11, '027/Pokmil1/001.01-Reviu', '2024-05-28', 'Penunjukan Langsung', 14, NULL, NULL, NULL, NULL, NULL, '620/2.b/bapenjelasan', '2024-05-29', NULL, NULL, 'Verifikasi', '2024-05-27 21:26:52', '2024-05-28 18:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `pajaks`
--

CREATE TABLE `pajaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenispajak` varchar(255) NOT NULL,
  `nomorbuktipajak` varchar(255) NOT NULL,
  `tanggalbukti` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `keterangan` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pajaks`
--

INSERT INTO `pajaks` (`id`, `id_user`, `jenispajak`, `nomorbuktipajak`, `tanggalbukti`, `file`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 11, 'SPT Tahunan', '123/456', '2024-02-29', '1709170711.jpeg', 'spt tahunan', '2024-02-28 17:38:31', '2024-02-28 17:38:31'),
(2, 11, 'SPT Tahunan', '123/456', '2024-02-29', '1709192924.jpeg', 'spt tahun 2024', '2024-02-28 23:48:44', '2024-02-28 23:48:44'),
(3, 16, 'SPT Tahunan', '123/456', '2024-04-29', '1714355877.jpg', 'spt tahun 2023', '2024-04-28 17:57:57', '2024-04-28 17:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `paketpekerjaans`
--

CREATE TABLE `paketpekerjaans` (
  `id` bigint(20) NOT NULL,
  `namakegiatan` varchar(255) NOT NULL,
  `namapaket` longtext NOT NULL,
  `pagu` bigint(20) NOT NULL,
  `hps` bigint(20) NOT NULL,
  `tahunanggaran` int(11) NOT NULL,
  `lokasi` longtext DEFAULT NULL,
  `waktupelaksanaan` varchar(255) DEFAULT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paketpekerjaans`
--

INSERT INTO `paketpekerjaans` (`id`, `namakegiatan`, `namapaket`, `pagu`, `hps`, `tahunanggaran`, `lokasi`, `waktupelaksanaan`, `klasifikasi`, `created_by`, `created_at`, `updated_at`) VALUES
(5809706, 'Peningkatan Cakupan Pelayanan', 'Pengadaan Pipa sambungan', 500000000, 400000000, 2024, 'Penajam Paser Utara', '30 Hari Kalender', 'Pengadaan Barang', 1, '2024-05-27 21:18:10', '2024-05-27 21:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `pakettenders`
--

CREATE TABLE `pakettenders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namakegiatan` varchar(255) NOT NULL,
  `namapaket` longtext NOT NULL,
  `pagu` bigint(20) NOT NULL,
  `hps` bigint(20) NOT NULL,
  `tahunanggaran` int(11) NOT NULL,
  `lokasi` longtext DEFAULT NULL,
  `waktupelaksanaan` varchar(255) DEFAULT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuanpenyedias`
--

CREATE TABLE `pengajuanpenyedias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) DEFAULT NULL,
  `status` enum('verifikasi','diterima','ditolak') NOT NULL DEFAULT 'verifikasi',
  `konfirmasi` enum('ya','tidak') NOT NULL DEFAULT 'tidak',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuanpenyedias`
--

INSERT INTO `pengajuanpenyedias` (`id`, `id_user`, `status`, `konfirmasi`, `created_at`, `updated_at`) VALUES
(9, 11, 'diterima', 'ya', '2024-02-21 22:15:46', '2024-03-14 18:40:03'),
(10, 12, 'verifikasi', 'tidak', '2024-02-22 00:12:19', '2024-02-22 00:12:19'),
(11, 13, 'verifikasi', 'tidak', '2024-02-25 17:24:23', '2024-02-25 17:24:23'),
(12, 15, 'verifikasi', 'tidak', '2024-03-17 19:44:33', '2024-03-17 19:44:33'),
(13, 16, 'diterima', 'ya', '2024-04-28 16:33:48', '2024-05-14 21:06:14'),
(14, 17, 'diterima', 'ya', '2024-06-04 20:33:32', '2024-06-04 20:36:41'),
(15, 18, 'diterima', 'ya', '2024-06-09 16:39:02', '2024-06-09 16:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `pengalamen`
--

CREATE TABLE `pengalamen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `namakontrak` varchar(255) NOT NULL,
  `nokontrak` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `nilaikontrak` bigint(20) NOT NULL,
  `persentasipelaksanaan` varchar(255) NOT NULL,
  `tglpelaksanaan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengalamen`
--

INSERT INTO `pengalamen` (`id`, `id_user`, `namakontrak`, `nokontrak`, `lokasi`, `instansi`, `nilaikontrak`, `persentasipelaksanaan`, `tglpelaksanaan`, `created_at`, `updated_at`) VALUES
(1, 11, 'Pengadaan Bahan Kimia Cair', '05/425/2023', 'Penajam Paser Utara', 'PDAM DANUM TAKA', 150000000, '50', '2023-01-30', '2024-02-29 00:20:47', '2024-02-29 00:20:47'),
(2, 16, 'Pengadaan Bahan Kimia Cair', '05/425/2023', 'Penajam Paser Utara', 'PDAM DANUM TAKA', 390000000, '100', '2023-07-29', '2024-04-28 17:58:51', '2024-04-28 17:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `pengesahans`
--

CREATE TABLE `pengesahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `tglsurat` date NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengesahans`
--

INSERT INTO `pengesahans` (`id`, `id_user`, `nomor`, `tglsurat`, `file`, `created_at`, `updated_at`) VALUES
(3, 16, '012/2023', '2024-04-29', '1714355797.jpeg', '2024-04-28 17:56:37', '2024-04-28 17:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `pengurusperushaans`
--

CREATE TABLE `pengurusperushaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `alamat` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengurusperushaans`
--

INSERT INTO `pengurusperushaans` (`id`, `id_user`, `nik`, `nama`, `jabatan`, `alamat`, `file`, `created_at`, `updated_at`) VALUES
(1, 11, 6409012009890003, 'Ahmad Muhrani', 'Analis Kebijakan Ahli Muda', 'PERUM BDL II PERUSDA JL.JAMRUT 11 RT.31', '1709168867.jpeg', '2024-02-28 17:07:47', '2024-02-28 17:07:47'),
(2, 16, 6471056207020002, 'Ahmad Muhrani', 'Analis Kebijakan Ahli Muda', 'PERUM BDL II PERUSDA JL.JAMRUT 11 RT.31', '1714355838.jpg', '2024-04-28 17:57:18', '2024-04-28 17:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `penjelasans`
--

CREATE TABLE `penjelasans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `bab` varchar(255) DEFAULT NULL,
  `uraian` longtext NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjelasans`
--

INSERT INTO `penjelasans` (`id`, `id_paket`, `id_user`, `dokumen`, `bab`, `uraian`, `file`, `created_at`, `updated_at`) VALUES
(1, 4, 16, 'rancangan kontrak', 'X', 'apakah speseisifikasi yang di maksud pipa terbuat dari besi atau pvc', NULL, '2024-05-06 22:43:52', '2024-05-06 22:43:52'),
(2, 4, 16, 'KAK', 'BAB-V', 'Yth Pokja Pemilihan \r\npada point.1 apakah tenaga ahli yang di persyaratkan boleh lulus D3/Diploma', NULL, '2024-05-06 23:06:50', '2024-05-06 23:06:50'),
(4, 5809706, 11, 'KAK', 'I', 'apakah pekerjaan di laksanakan dalam 30 hari setelah kontrak', NULL, '2024-05-28 16:58:57', '2024-05-28 16:58:57'),
(5, 918611, 11, 'KAK', 'I', 'jika terjadi kondisi cuaca buruk dan mengurangi waktu pelaksanaan pekerjaan apakah ada adendum kontrak', NULL, '2024-06-04 20:25:28', '2024-06-04 20:25:28'),
(6, 918611, 17, 'gambar', 'BAB-V', 'apakah pada gambar yg di maksud menggunakan pondasi cakar ayam', NULL, '2024-06-04 21:04:26', '2024-06-04 21:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `perlengkapans`
--

CREATE TABLE `perlengkapans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `namaalat` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `spesifikasi` longtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perlengkapans`
--

INSERT INTO `perlengkapans` (`id`, `id_user`, `namaalat`, `jumlah`, `tipe`, `spesifikasi`, `status`, `kondisi`, `dokumen`, `created_at`, `updated_at`) VALUES
(2, 16, 'cangkul', 1000, 'bagus', '1', 'Milik Sendiri', '80', '1714355977.png', '2024-04-28 17:59:37', '2024-04-28 17:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persyaratanevaluasiteknis`
--

CREATE TABLE `persyaratanevaluasiteknis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_evaluasiteknis` int(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `status` enum('ya','tidak','null') NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persyaratanevaluasiteknis`
--

INSERT INTO `persyaratanevaluasiteknis` (`id`, `id_paket`, `id_user`, `id_evaluasiteknis`, `bobot`, `status`, `created_at`, `updated_at`) VALUES
(54, 918611, 11, 1, 5, 'ya', '2024-06-20 00:03:19', '2024-06-20 00:03:19'),
(55, 918611, 11, 2, 5, 'ya', '2024-06-20 00:03:59', '2024-06-20 00:03:59'),
(56, 918611, 11, 3, 5, 'ya', '2024-06-20 00:03:59', '2024-06-20 00:03:59'),
(57, 918611, 11, 4, 5, 'ya', '2024-06-20 00:03:59', '2024-06-20 00:03:59'),
(58, 918611, 11, 5, 5, 'ya', '2024-06-20 00:03:59', '2024-06-20 00:03:59'),
(59, 918611, 11, 6, 5, 'ya', '2024-06-20 00:03:59', '2024-06-20 00:03:59'),
(60, 918611, 11, 7, 10, 'ya', '2024-06-20 00:03:59', '2024-06-20 00:03:59'),
(62, 918611, 11, 9, 10, 'ya', '2024-06-20 00:03:59', '2024-06-20 00:03:59'),
(64, 918611, 11, 11, 5, 'ya', '2024-06-20 00:03:59', '2024-06-20 00:03:59'),
(65, 918611, 11, 12, 3, 'ya', '2024-06-20 00:03:59', '2024-06-20 00:03:59'),
(66, 918611, 11, 13, 2, 'ya', '2024-06-20 00:03:59', '2024-06-20 00:03:59'),
(67, 918611, 11, 14, 20, 'ya', '2024-06-20 00:03:59', '2024-06-20 00:03:59'),
(68, 918611, 11, 15, 8, 'ya', '2024-06-20 00:03:59', '2024-06-20 00:03:59'),
(69, 918611, 11, 16, 6, 'ya', '2024-06-20 00:03:59', '2024-06-20 00:03:59'),
(70, 918611, 11, 17, 6, 'ya', '2024-06-20 00:03:59', '2024-06-20 00:03:59'),
(71, 918611, 11, 18, 10, 'ya', '2024-06-20 00:08:01', '2024-06-20 00:08:01'),
(72, 918611, 16, 1, 5, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(73, 918611, 16, 2, 5, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(74, 918611, 16, 3, 5, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(75, 918611, 16, 4, 5, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(76, 918611, 16, 5, 5, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(77, 918611, 16, 6, 5, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(78, 918611, 16, 7, 10, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(79, 918611, 16, 8, 10, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(80, 918611, 16, 9, 10, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(81, 918611, 16, 10, 10, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(82, 918611, 16, 11, 5, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(83, 918611, 16, 12, 3, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(84, 918611, 16, 13, 2, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(85, 918611, 16, 14, 20, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(86, 918611, 16, 15, 8, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(87, 918611, 16, 16, 6, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(88, 918611, 16, 17, 6, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09'),
(89, 918611, 16, 18, 10, 'ya', '2024-06-20 00:09:09', '2024-06-20 00:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `persyaratankualifikasis`
--

CREATE TABLE `persyaratankualifikasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategorikualifikasi` int(11) NOT NULL,
  `persyaratan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persyaratankualifikasis`
--

INSERT INTO `persyaratankualifikasis` (`id`, `id_kategorikualifikasi`, `persyaratan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pemberi Kuasa', NULL, NULL),
(2, 1, 'Yang Diberi Kuasa', NULL, NULL),
(3, 1, 'Nomor dan Tanggal Surat', NULL, NULL),
(4, 3, 'Nomor dan Tanggal Penawaran', NULL, NULL),
(5, 3, 'Bermaterai', NULL, NULL),
(6, 3, 'Tanggal, Bulan, Tahun', NULL, NULL),
(7, 3, 'Cat/Stempel', NULL, NULL),
(8, 3, 'Tanda Tangan Direktur', NULL, NULL),
(9, 3, 'Masa Berlaku Penawaran', NULL, NULL),
(10, 3, 'Nilai dan Terbilang', NULL, NULL),
(11, 4, 'Rekap,Daftar Kuantitas dan Harga', NULL, NULL),
(12, 4, 'Daftar Kuantitas dan Harga Satuan', NULL, NULL),
(13, 5, 'Jadwal Pelaksanaan', NULL, NULL),
(14, 5, 'Waktu Pelaksanaan', NULL, NULL),
(15, 5, 'Tanda Tangan Direktur', NULL, NULL),
(16, 6, 'Surat Dukungan', NULL, NULL),
(17, 6, 'Nomor dan Tanggal Surat', NULL, NULL),
(18, 6, 'Pabrik/Distributor yang mendukung', NULL, NULL),
(19, 7, 'Pekerjaan yang disubkontrakan', NULL, NULL),
(20, 7, 'KSO', NULL, NULL),
(21, 9, 'Surat Pernyataan ', NULL, NULL),
(22, 9, 'Nomor dan Tanggal Surat', NULL, NULL),
(23, 9, 'Tanda Tangan Direktur', NULL, NULL),
(24, 10, 'Nomor Sertifikat', NULL, NULL),
(25, 10, 'Tanggal Sertifikat', NULL, NULL),
(26, 10, 'Slip Pembayaran Terakhir', NULL, NULL),
(27, 2, 'Jaminan Penawaran', NULL, NULL),
(28, 8, 'Brosur', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perubahanpenyedias`
--

CREATE TABLE `perubahanpenyedias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `alasan` longtext NOT NULL,
  `status` enum('tidak','ya') NOT NULL DEFAULT 'tidak',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perubahanpenyedias`
--

INSERT INTO `perubahanpenyedias` (`id`, `id_user`, `alasan`, `status`, `created_at`, `updated_at`) VALUES
(1, 16, 'Ingin memperbaiki izin usaha', 'ya', '2024-04-28 18:46:31', '2024-04-28 20:29:05'),
(2, 11, 'Ingin memperbaiki izin usaha', 'tidak', '2024-04-28 19:03:53', '2024-04-28 19:03:53'),
(3, 16, 'ingin update data tengaha ahli dan pengalaman pekerjaan', 'ya', '2024-05-14 20:50:16', '2024-05-14 21:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `profils`
--

CREATE TABLE `profils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `alamat` longtext NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `namaperusahaan` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `notelp` varchar(255) NOT NULL,
  `kantorcabang` enum('ya','tidak') NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kodepos` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prosestenders`
--

CREATE TABLE `prosestenders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `filepenawaran` varchar(255) DEFAULT NULL,
  `name_file` varchar(255) DEFAULT NULL,
  `tglpenawaran` date DEFAULT NULL,
  `hargapenawaran` bigint(20) DEFAULT NULL,
  `nosuratpenawaran` varchar(255) DEFAULT NULL,
  `tglsuratpenawaran` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prosestenders`
--

INSERT INTO `prosestenders` (`id`, `id_paket`, `id_user`, `filepenawaran`, `name_file`, `tglpenawaran`, `hargapenawaran`, `nosuratpenawaran`, `tglsuratpenawaran`, `created_at`, `updated_at`) VALUES
(2, 918611, 11, 'penawaran_1715066057 (1)_1717988612_1717988994.rar', 'penawaran_1715066057 (1)_1717988612', '2024-06-10', 823000000, '027/001/V/2024', '2024-06-11', '2024-06-04 20:55:51', '2024-06-09 19:09:54'),
(3, 918611, 16, 'UNDANGAN RAPAT PERSIAPAN FKP 2024 (1)_1717989094.pdf', 'UNDANGAN RAPAT PERSIAPAN FKP 2024 (1)', '2024-06-10', 845000000, '027/002/V/2024', '2024-06-10', '2024-06-04 20:56:26', '2024-06-09 19:11:34'),
(4, 918611, 17, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-04 21:03:31', '2024-06-04 21:03:31'),
(8, 170161, 11, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-05 21:56:55', '2024-06-05 21:56:55'),
(9, 170161, 16, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-05 21:56:55', '2024-06-05 21:56:55'),
(10, 170161, 17, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-05 21:56:55', '2024-06-05 21:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `provinsis`
--

CREATE TABLE `provinsis` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinsis`
--

INSERT INTO `provinsis` (`id`, `name`) VALUES
(11, 'ACEH'),
(12, 'SUMATERA UTARA'),
(13, 'SUMATERA BARAT'),
(14, 'RIAU'),
(15, 'JAMBI'),
(16, 'SUMATERA SELATAN'),
(17, 'BENGKULU'),
(18, 'LAMPUNG'),
(19, 'KEPULAUAN BANGKA BELITUNG'),
(21, 'KEPULAUAN RIAU'),
(31, 'DKI JAKARTA'),
(32, 'JAWA BARAT'),
(33, 'JAWA TENGAH'),
(34, 'DI YOGYAKARTA'),
(35, 'JAWA TIMUR'),
(36, 'BANTEN'),
(51, 'BALI'),
(52, 'NUSA TENGGARA BARAT'),
(53, 'NUSA TENGGARA TIMUR'),
(61, 'KALIMANTAN BARAT'),
(62, 'KALIMANTAN TENGAH'),
(63, 'KALIMANTAN SELATAN'),
(64, 'KALIMANTAN TIMUR'),
(65, 'KALIMANTAN UTARA'),
(71, 'SULAWESI UTARA'),
(72, 'SULAWESI TENGAH'),
(73, 'SULAWESI SELATAN'),
(74, 'SULAWESI TENGGARA'),
(75, 'GORONTALO'),
(76, 'SULAWESI BARAT'),
(81, 'MALUKU'),
(82, 'MALUKU UTARA'),
(91, 'PAPUA BARAT'),
(94, 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `rancangankontraks`
--

CREATE TABLE `rancangankontraks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_paket` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `name_file` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rancangankontraks`
--

INSERT INTO `rancangankontraks` (`id`, `id_paket`, `created_by`, `name_file`, `file`, `created_at`, `updated_at`) VALUES
(5, 5809706, 14, 'Data Pegawai Simpeg_1716873921.xlsx', 'dist/rancangankontrak/Data Pegawai Simpeg_1716873921.xlsx', '2024-05-27 21:25:21', '2024-05-27 21:25:21'),
(7, 918611, 14, '1000179488_240528_060650_1716880990.pdf', 'dist/rancangankontrak/1000179488_240528_060650_1716880990.pdf', '2024-05-27 23:23:10', '2024-05-27 23:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `image`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '1714440376_slide.jpg', 'active', 'slide1', '2024-04-29 17:26:16', '2024-04-29 17:26:16'),
(2, '1714440387_slide2.jpg', 'active', 'slide2', '2024-04-29 17:26:27', '2024-04-29 17:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `suratpernyataans`
--

CREATE TABLE `suratpernyataans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('ya','tidak') NOT NULL DEFAULT 'tidak',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suratpernyataans`
--

INSERT INTO `suratpernyataans` (`id`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 'ya', '2024-02-21 22:30:50', '2024-02-21 22:30:50'),
(2, 16, 'ya', '2024-04-28 17:08:13', '2024-04-28 17:08:13'),
(3, 17, 'ya', '2024-06-04 20:33:40', '2024-06-04 20:33:40'),
(4, 18, 'ya', '2024-06-09 16:39:09', '2024-06-09 16:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id` int(11) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id`, `tahun`) VALUES
(1, 2023),
(2, 2024);

-- --------------------------------------------------------

--
-- Table structure for table `tenagaahlis`
--

CREATE TABLE `tenagaahlis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgllahir` date NOT NULL,
  `jeniskelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` longtext NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `pengalamankerja` varchar(255) NOT NULL,
  `keahlian` varchar(255) NOT NULL,
  `status` enum('tetap','tidak tetap') NOT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenagaahlis`
--

INSERT INTO `tenagaahlis` (`id`, `id_user`, `nama`, `tgllahir`, `jeniskelamin`, `alamat`, `pendidikan`, `jabatan`, `pengalamankerja`, `keahlian`, `status`, `dokumen`, `created_at`, `updated_at`) VALUES
(1, 11, 'Ahmad Muhrani', '2024-02-29', 'Laki-laki', 'PERUM BDL II PERUSDA JL.JAMRUT 11 RT.31', 'D3', 'Analis Kebijakan Ahli Muda', '3', 'IT', 'tidak tetap', '1709195724.jpeg', '2024-02-29 00:35:24', '2024-02-29 00:35:24'),
(2, 16, 'Ahmad Muhrani', '2024-04-29', 'Laki-laki', 'PERUM BDL II PERUSDA JL.JAMRUT 11 RT.31', 'D3', 'Analis Kebijakan Ahli Muda', '3', 'IT', 'tidak tetap', '1714355960.jpg', '2024-04-28 17:59:20', '2024-04-28 17:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `tenders`
--

CREATE TABLE `tenders` (
  `id` bigint(20) NOT NULL,
  `namakegiatan` varchar(255) NOT NULL,
  `namapaket` longtext NOT NULL,
  `pagu` bigint(20) NOT NULL,
  `hps` bigint(20) NOT NULL,
  `tahunanggaran` int(11) NOT NULL,
  `lokasi` longtext DEFAULT NULL,
  `waktupelaksanaan` varchar(255) DEFAULT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`id`, `namakegiatan`, `namapaket`, `pagu`, `hps`, `tahunanggaran`, `lokasi`, `waktupelaksanaan`, `klasifikasi`, `created_by`, `created_at`, `updated_at`) VALUES
(170161, 'Peningkatan Cakupan Pelayanan', 'Pengadaan Pipa sambungan 10 inch', 1000000000, 850000000, 2024, 'Penajam Paser Utara', '30 Hari Kalender', 'Pengadaan Barang', 14, '2024-06-05 18:19:51', '2024-06-05 18:19:51'),
(918611, 'Peningkatan Cakupan Pelayanan', 'Pembuatan Gedung Kantor', 1000000000, 900000000, 2024, 'Penajam Paser Utara', '120 Hari Kalender', 'Jasa Konstruksi', 1, '2024-05-27 21:15:36', '2024-05-27 21:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `undanganklarifikasis`
--

CREATE TABLE `undanganklarifikasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_prosestender` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nosurat` varchar(255) NOT NULL,
  `tglsurat` date NOT NULL,
  `waktumulai` time NOT NULL,
  `waktuselesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `undanganklarifikasis`
--

INSERT INTO `undanganklarifikasis` (`id`, `id_prosestender`, `id_paket`, `id_user`, `nosurat`, `tglsurat`, `waktumulai`, `waktuselesai`, `created_at`, `updated_at`) VALUES
(6, 2, 918611, 11, '027/Pokmil1/001.01-Reviu', '2024-06-20', '08:00:00', '12:00:00', '2024-06-19 18:53:56', '2024-06-19 19:01:36'),
(7, 3, 918611, 16, '027/Pokmil1/002.02-Reviu', '2024-06-21', '08:00:00', '11:00:00', '2024-06-19 19:00:52', '2024-06-19 19:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `uraianpekerjaans`
--

CREATE TABLE `uraianpekerjaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_paket` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `name_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uraianpekerjaans`
--

INSERT INTO `uraianpekerjaans` (`id`, `id_paket`, `created_by`, `file`, `name_file`, `created_at`, `updated_at`) VALUES
(4, 5809706, 14, 'dist/uraianpekerjaan/kontrak_filled_4 (13)_1714459929_1716874000.docx', 'kontrak_filled_4 (13)_1714459929_1716874000.docx', '2024-05-27 21:26:40', '2024-05-27 21:26:40'),
(5, 918611, 14, 'dist/uraianpekerjaan/kontrak_filled_4 (13)_1714459929_1716881061.docx', 'kontrak_filled_4 (13)_1714459929_1716881061.docx', '2024-05-27 23:24:21', '2024-05-27 23:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` enum('ADMIN','USER','VERIFIKATOR','PA') NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `npwp`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Ahmad Muhrani', 'ahmadmuhrani89@gmail.com', NULL, '$2y$10$YTohtNmXldt3fDlH.NRc2OisB/AltLIz/L5Hgsse5SUuLyApRiDnu', NULL, 'ADMIN', 'ACTIVE', '2024-01-31 17:27:42', '2024-01-31 17:27:42'),
(11, '55.173.039.372-1.000', 'tes123', 'ahmadmuhrani0507@gmail.com', NULL, '$2y$10$KIVPwwG14yzJQSIR74QI6uigeSkw/Z4vsuZXsrd4N7zBoHxk37Uou', '2j0SsvqkQ4MlAD0MAU7At9C9GMBWcyoOz9EIhEx9durDdvLYLWZ683CTX4Au', 'USER', 'ACTIVE', '2024-02-21 22:15:46', '2024-03-24 19:47:48'),
(12, '45.725.623.332-2.000', 'Ahmad Muhrani', 'tes19@gamil.com', NULL, '$2y$10$m7rIhvfy6hiMHfk6bn1Avevcq3hOlYibZlDFgokgQu.gN0HBAI6rC', NULL, 'USER', 'ACTIVE', '2024-02-22 00:12:19', '2024-02-22 00:12:19'),
(13, '12.345.678.000-0.000', 'Muhrani', 'ridho19@gamil.com', NULL, '$2y$10$nEvRfSqOx2EfXcRLmBRjauojlXn8.BpI1aW0YC2Px8l37tFtlxBdG', NULL, 'USER', 'ACTIVE', '2024-02-25 17:24:23', '2024-02-25 17:24:23'),
(14, NULL, 'Ahmad', 'ahmadmuhrani@gmail.com', NULL, '$2y$10$W8tnA0ELGfshTq6Gzkidf.pvaAweU3B.nKUbyAzbXte8BRG8vgjSO', NULL, 'VERIFIKATOR', 'ACTIVE', '2024-03-13 16:23:59', '2024-03-13 22:37:34'),
(15, '12.345.678.100-0.002', 'Wira', 'tes1989@gamil.com', NULL, '$2y$10$DY4K1lyOghP9c/xWccT/R.Utn6hVaB2EY.c0Vy6IuHMntzhdQGfw.', NULL, 'USER', 'ACTIVE', '2024-03-17 19:44:33', '2024-03-17 19:44:33'),
(16, '45.725.623.332-2.001', 'Berkah Makmur', 'h.laraveldev@gmail.com', NULL, '$2y$10$s6z63N86vhI38P3qkjVuTuxfEEUf5nIrI.SM29H8cMHRanF8P845i', NULL, 'USER', 'ACTIVE', '2024-04-28 16:33:48', '2024-04-28 16:33:48'),
(17, '82.179.892.372-6.000', 'Wira', 'wira@gmail.com', NULL, '$2y$10$ffgWDNGmUUYRDLxZrurUYefxbRMI6GlFbiHLzMZseBcV15ni/jisC', NULL, 'USER', 'ACTIVE', '2024-06-04 20:33:32', '2024-06-04 20:33:32'),
(18, '13.456.781.000-0.021', 'maju jaya', 'majumundur@gmail.com', NULL, '$2y$10$noYb3Iygq6.jWUzIczKR.eDgSCafXNpmyNvkmp7S76NVqtZBv/g3C', NULL, 'USER', 'ACTIVE', '2024-06-09 16:39:02', '2024-06-09 16:39:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aanwizings`
--
ALTER TABLE `aanwizings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrasis`
--
ALTER TABLE `administrasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aktapendirians`
--
ALTER TABLE `aktapendirians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aktaperubahans`
--
ALTER TABLE `aktaperubahans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badanusahas`
--
ALTER TABLE `badanusahas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banegoisasis`
--
ALTER TABLE `banegoisasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bapembukaanpenawarans`
--
ALTER TABLE `bapembukaanpenawarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidangusahas`
--
ALTER TABLE `bidangusahas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailtenders`
--
ALTER TABLE `detailtenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doklainnyas`
--
ALTER TABLE `doklainnyas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumenlainnyas`
--
ALTER TABLE `dokumenlainnyas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluasiakhirs`
--
ALTER TABLE `evaluasiakhirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluasibiayas`
--
ALTER TABLE `evaluasibiayas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluasipenelitians`
--
ALTER TABLE `evaluasipenelitians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluasiteknis`
--
ALTER TABLE `evaluasiteknis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `izinusahas`
--
ALTER TABLE `izinusahas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwalnontenders`
--
ALTER TABLE `jadwalnontenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwalpenunjukanlangsungs`
--
ALTER TABLE `jadwalpenunjukanlangsungs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwaltenders`
--
ALTER TABLE `jadwaltenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawabans`
--
ALTER TABLE `jawabans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kaks`
--
ALTER TABLE `kaks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategorikualifikasis`
--
ALTER TABLE `kategorikualifikasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoriteknis`
--
ALTER TABLE `kategoriteknis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klasifikasis`
--
ALTER TABLE `klasifikasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontraks`
--
ALTER TABLE `kontraks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kotakmasuks`
--
ALTER TABLE `kotakmasuks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metodepengadaans`
--
ALTER TABLE `metodepengadaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nontenders`
--
ALTER TABLE `nontenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pajaks`
--
ALTER TABLE `pajaks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paketpekerjaans`
--
ALTER TABLE `paketpekerjaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakettenders`
--
ALTER TABLE `pakettenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengajuanpenyedias`
--
ALTER TABLE `pengajuanpenyedias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengalamen`
--
ALTER TABLE `pengalamen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengesahans`
--
ALTER TABLE `pengesahans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengurusperushaans`
--
ALTER TABLE `pengurusperushaans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengurusperushaans_nik_unique` (`nik`);

--
-- Indexes for table `penjelasans`
--
ALTER TABLE `penjelasans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perlengkapans`
--
ALTER TABLE `perlengkapans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `persyaratanevaluasiteknis`
--
ALTER TABLE `persyaratanevaluasiteknis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persyaratankualifikasis`
--
ALTER TABLE `persyaratankualifikasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perubahanpenyedias`
--
ALTER TABLE `perubahanpenyedias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profils_npwp_unique` (`npwp`);

--
-- Indexes for table `prosestenders`
--
ALTER TABLE `prosestenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rancangankontraks`
--
ALTER TABLE `rancangankontraks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suratpernyataans`
--
ALTER TABLE `suratpernyataans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenagaahlis`
--
ALTER TABLE `tenagaahlis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `undanganklarifikasis`
--
ALTER TABLE `undanganklarifikasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uraianpekerjaans`
--
ALTER TABLE `uraianpekerjaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `npwp` (`npwp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aanwizings`
--
ALTER TABLE `aanwizings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `administrasis`
--
ALTER TABLE `administrasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `aktapendirians`
--
ALTER TABLE `aktapendirians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aktaperubahans`
--
ALTER TABLE `aktaperubahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `badanusahas`
--
ALTER TABLE `badanusahas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banegoisasis`
--
ALTER TABLE `banegoisasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bapembukaanpenawarans`
--
ALTER TABLE `bapembukaanpenawarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bidangusahas`
--
ALTER TABLE `bidangusahas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detailtenders`
--
ALTER TABLE `detailtenders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doklainnyas`
--
ALTER TABLE `doklainnyas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokumenlainnyas`
--
ALTER TABLE `dokumenlainnyas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evaluasiakhirs`
--
ALTER TABLE `evaluasiakhirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evaluasibiayas`
--
ALTER TABLE `evaluasibiayas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `evaluasipenelitians`
--
ALTER TABLE `evaluasipenelitians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `evaluasiteknis`
--
ALTER TABLE `evaluasiteknis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `izinusahas`
--
ALTER TABLE `izinusahas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwalnontenders`
--
ALTER TABLE `jadwalnontenders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwalpenunjukanlangsungs`
--
ALTER TABLE `jadwalpenunjukanlangsungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `jadwaltenders`
--
ALTER TABLE `jadwaltenders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jawabans`
--
ALTER TABLE `jawabans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kaks`
--
ALTER TABLE `kaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kategorikualifikasis`
--
ALTER TABLE `kategorikualifikasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategoriteknis`
--
ALTER TABLE `kategoriteknis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `klasifikasis`
--
ALTER TABLE `klasifikasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kontraks`
--
ALTER TABLE `kontraks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kotakmasuks`
--
ALTER TABLE `kotakmasuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `metodepengadaans`
--
ALTER TABLE `metodepengadaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `nontenders`
--
ALTER TABLE `nontenders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pajaks`
--
ALTER TABLE `pajaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pakettenders`
--
ALTER TABLE `pakettenders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuanpenyedias`
--
ALTER TABLE `pengajuanpenyedias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengalamen`
--
ALTER TABLE `pengalamen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengesahans`
--
ALTER TABLE `pengesahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengurusperushaans`
--
ALTER TABLE `pengurusperushaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjelasans`
--
ALTER TABLE `penjelasans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `perlengkapans`
--
ALTER TABLE `perlengkapans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persyaratanevaluasiteknis`
--
ALTER TABLE `persyaratanevaluasiteknis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `persyaratankualifikasis`
--
ALTER TABLE `persyaratankualifikasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `perubahanpenyedias`
--
ALTER TABLE `perubahanpenyedias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profils`
--
ALTER TABLE `profils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prosestenders`
--
ALTER TABLE `prosestenders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rancangankontraks`
--
ALTER TABLE `rancangankontraks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suratpernyataans`
--
ALTER TABLE `suratpernyataans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenagaahlis`
--
ALTER TABLE `tenagaahlis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `undanganklarifikasis`
--
ALTER TABLE `undanganklarifikasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uraianpekerjaans`
--
ALTER TABLE `uraianpekerjaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
