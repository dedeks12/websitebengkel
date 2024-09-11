-- phpMyAdmin SQL Dump
-- version 5.2.0-rc1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 01:35 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkelllll`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'I Made Agus Kresna Nanda', 'deks', 'madeaguskresna22@gmail.com', NULL, '$2y$10$rbZ', NULL, '2023-04-10 05:59:46', '2023-04-10 05:59:46'),
(2, 'I Made Agus Kresna Nanda', 'uhuy', 'indranandagus@gmail.com', NULL, '$2y$10$2rB', NULL, '2023-04-10 23:09:13', '2023-04-10 23:09:13'),
(3, 'Deks', 'deks', 'user1@gmail.com', NULL, '$2y$10$vAXB/ucDPz5QetMTL7/Az.yoHkm50DBEi9EQvKnKkgt0i2GdPaXnu', NULL, '2023-08-06 19:44:14', '2023-08-06 19:44:14'),
(4, 'naruto shippuden', 'admin', 'usegggggr@gmail.com', NULL, '$2y$10$rBN99yrOJH8oCrgFagNiw.PFimZoAVxv5LqGPXz7s8yVxrNgW1jF.', NULL, '2023-08-06 19:47:31', '2023-08-06 19:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga_barang`, `stok`, `created_at`, `updated_at`) VALUES
(7, 'Aki', '800000', '2', '2023-04-29 22:10:36', '2023-08-11 12:21:15'),
(9, 'oli c', '25000', '8', '2023-06-05 19:43:02', '2023-08-11 12:25:48'),
(11, 'Ban 16', '500000', '8', '2023-08-09 23:46:00', '2023-08-11 12:16:58'),
(12, 'Kampas Rem', '25000', '11', '2023-08-10 05:17:35', '2023-08-11 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `barang_nota`
--

CREATE TABLE `barang_nota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nota_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_nota`
--

INSERT INTO `barang_nota` (`id`, `nota_id`, `barang_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 20, 1, 0, NULL, NULL),
(2, 20, 1, 0, NULL, NULL),
(3, 21, 1, 0, NULL, NULL),
(4, 21, 2, 0, NULL, NULL),
(5, 22, 1, 0, NULL, NULL),
(6, 23, 1, 0, NULL, NULL),
(7, 23, 1, 0, NULL, NULL),
(8, 24, 3, 0, NULL, NULL),
(9, 25, 1, 0, NULL, NULL),
(10, 25, 1, 0, NULL, NULL),
(11, 26, 2, 0, NULL, NULL),
(12, 27, 1, 0, NULL, NULL),
(13, 28, 1, 0, NULL, NULL),
(14, 28, 1, 0, NULL, NULL),
(15, 29, 1, 0, NULL, NULL),
(16, 30, 1, 0, NULL, NULL),
(17, 31, 1, 0, NULL, NULL),
(18, 31, 1, 0, NULL, NULL),
(19, 32, 7, 0, NULL, NULL),
(20, 33, 1, 0, NULL, NULL),
(21, 34, 1, 0, NULL, NULL),
(22, 34, 9, 0, NULL, NULL),
(23, 35, 7, 0, NULL, NULL),
(24, 52, 7, 2, NULL, NULL),
(25, 52, 9, 3, NULL, NULL),
(26, 53, 7, 2, NULL, NULL),
(28, 54, 7, 1, NULL, NULL),
(29, 54, 9, 1, NULL, NULL),
(30, 55, 7, 2, NULL, NULL),
(31, 55, 9, 2, NULL, NULL),
(32, 56, 7, 1, NULL, NULL),
(33, 57, 7, 10, NULL, NULL),
(34, 58, 7, 1, NULL, NULL),
(35, 59, 9, 3, NULL, NULL),
(36, 59, 9, 3, NULL, NULL),
(37, 60, 7, 1, NULL, NULL),
(38, 60, 9, 1, NULL, NULL),
(39, 61, 7, 1, NULL, NULL),
(40, 61, 9, 1, NULL, NULL),
(41, 62, 7, 1, NULL, NULL),
(42, 63, 7, 1, NULL, NULL),
(43, 64, 7, 2, NULL, NULL),
(44, 64, 9, 2, NULL, NULL),
(45, 65, 7, 2, NULL, NULL),
(46, 65, 9, 1, NULL, NULL),
(47, 66, 7, 1, NULL, NULL),
(48, 67, 7, 1, NULL, NULL),
(50, 68, 7, 2, NULL, NULL),
(51, 67, 9, 1, NULL, NULL),
(52, 66, 9, 1, NULL, NULL),
(54, 67, 11, 2, NULL, NULL),
(55, 67, 12, 2, NULL, NULL),
(56, 69, 7, 2, NULL, NULL),
(57, 69, 9, 2, NULL, NULL),
(58, 70, 7, 2, NULL, NULL),
(59, 71, 7, 2, NULL, NULL),
(60, 72, 7, 2, NULL, NULL),
(61, 73, 7, 2, NULL, NULL),
(62, 73, 9, 2, NULL, NULL),
(63, 74, 7, 2, NULL, NULL),
(64, 75, 7, 2, NULL, NULL),
(65, 80, 7, 3, NULL, NULL),
(66, 80, 12, 3, NULL, NULL),
(68, 82, 11, 2, NULL, NULL),
(69, 82, 11, 2, NULL, NULL),
(71, 84, 7, 1, NULL, NULL),
(72, 84, 9, 2, NULL, NULL),
(73, 85, 9, 1, NULL, NULL),
(74, 86, 9, 1, NULL, NULL),
(75, 87, 9, 1, NULL, NULL),
(76, 88, 9, 1, NULL, NULL),
(77, 89, 11, 1, NULL, NULL),
(79, 80, 9, 3, NULL, NULL),
(80, 80, 11, 3, NULL, NULL),
(82, 92, 7, 2, NULL, NULL),
(83, 92, 9, 1, NULL, NULL),
(84, 93, 7, 2, NULL, NULL),
(85, 93, 9, 2, NULL, NULL),
(86, 94, 7, 2, NULL, NULL),
(87, 94, 9, 1, NULL, NULL),
(88, 95, 7, 1, NULL, NULL),
(89, 95, 9, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jasa_servis` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jasa_servis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id`, `nama_jasa_servis`, `harga_jasa_servis`, `created_at`, `updated_at`) VALUES
(4, 'Turun Mesin', '50000', '2023-08-08 19:36:51', '2023-08-08 19:36:51'),
(6, 'Ganti Oli', '5000', '2023-08-15 11:07:41', '2023-08-15 11:07:41'),
(7, 'Ganti Aki', '5000', '2023-08-15 11:18:19', '2023-08-15 11:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `jasa_servis`
--

CREATE TABLE `jasa_servis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jasa_id` int(11) NOT NULL,
  `servis_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jasa_servis`
--

INSERT INTO `jasa_servis` (`id`, `jasa_id`, `servis_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 1, 4, NULL, NULL),
(3, 1, 5, NULL, NULL),
(4, 1, 5, NULL, NULL),
(5, 1, 6, NULL, NULL),
(6, 3, 7, NULL, NULL),
(7, 3, 8, NULL, NULL),
(8, 3, 9, NULL, NULL),
(9, 1, 10, NULL, NULL),
(10, 3, 11, NULL, NULL),
(11, 1, 12, NULL, NULL),
(12, 3, 13, NULL, NULL),
(13, 1, 14, NULL, NULL),
(14, 1, 15, NULL, NULL),
(15, 1, 16, NULL, NULL),
(16, 1, 17, NULL, NULL),
(17, 1, 18, NULL, NULL),
(18, 1, 19, NULL, NULL),
(19, 1, 20, NULL, NULL),
(20, 1, 22, NULL, NULL),
(21, 1, 23, NULL, NULL),
(22, 3, 24, NULL, NULL),
(23, 3, 25, NULL, NULL),
(24, 3, 26, NULL, NULL),
(25, 1, 27, NULL, NULL),
(26, 3, 28, NULL, NULL),
(27, 1, 29, NULL, NULL),
(28, 1, 30, NULL, NULL),
(29, 3, 30, NULL, NULL),
(30, 1, 31, NULL, NULL),
(31, 4, 31, NULL, NULL),
(32, 1, 33, NULL, NULL),
(33, 4, 33, NULL, NULL),
(34, 1, 34, NULL, NULL),
(35, 4, 34, NULL, NULL),
(36, 4, 35, NULL, NULL),
(37, 4, 36, NULL, NULL),
(38, 4, 37, NULL, NULL),
(39, 4, 38, NULL, NULL),
(40, 4, 39, NULL, NULL),
(41, 4, 40, NULL, NULL),
(42, 4, 41, NULL, NULL),
(43, 4, 42, NULL, NULL),
(44, 6, 42, NULL, NULL),
(45, 6, 43, NULL, NULL),
(46, 7, 43, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2023_03_22_030846_create_notas_table', 1),
(6, '2023_03_22_033147_create_pegawais_table', 2),
(7, '2023_03_22_033438_create_barangs_table', 2),
(8, '2023_03_22_033610_create_jasas_table', 2),
(9, '2023_03_22_061559_create_jasas_table', 3),
(10, '2023_03_28_113256_create_nota_pegawai_tables', 4),
(11, '2023_03_29_130544_create_nota_barang', 5),
(12, '2023_04_07_020138_create_uploadpembayaran', 6),
(13, '2023_05_03_034231_create_jasanota', 7),
(14, '2023_05_03_042224_create_jasa_jasa_nota', 8);

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelanggan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `servis_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id`, `pelanggan`, `telepon`, `status`, `servis_id`, `created_at`, `updated_at`) VALUES
(74, 'Halilintar Hutagalo', '6287860958904', 'Lunas', '37', '2023-08-11 07:34:48', '2023-08-13 10:28:48'),
(80, 'Agung Subadia', '6287860958904', 'Belum_Lunas', '38', '2023-08-11 12:03:34', '2023-08-11 12:03:34'),
(92, 'Putri Gembi', '6287860958904', 'Belum_Lunas', '40', '2023-08-13 00:58:21', '2023-08-13 00:58:21'),
(93, 'Made Binter', '6287860958904', 'Belum_Lunas', '41', '2023-08-13 10:27:00', '2023-08-13 10:27:00'),
(94, 'Julian Dinsa', '6287860958904', 'Lunas', '42', '2023-08-15 11:25:01', '2023-08-15 11:27:15'),
(95, 'Agus Kresna', '6287860958904', 'Lunas', '43', '2023-08-15 23:59:37', '2023-08-16 00:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `nota_pegawai`
--

CREATE TABLE `nota_pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nota_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nota_pegawai`
--

INSERT INTO `nota_pegawai` (`id`, `nota_id`, `pegawai_id`, `created_at`, `updated_at`) VALUES
(3, 10, 1, NULL, NULL),
(4, 10, 2, NULL, NULL),
(5, 11, 1, NULL, NULL),
(6, 12, 1, NULL, NULL),
(7, 13, 2, NULL, NULL),
(8, 14, 1, NULL, NULL),
(9, 15, 1, NULL, NULL),
(10, 15, 2, NULL, NULL),
(11, 16, 2, NULL, NULL),
(12, 17, 1, NULL, NULL),
(13, 20, 1, NULL, NULL),
(14, 21, 1, NULL, NULL),
(15, 21, 2, NULL, NULL),
(16, 22, 1, NULL, NULL),
(17, 23, 1, NULL, NULL),
(18, 23, 2, NULL, NULL),
(19, 24, 1, NULL, NULL),
(20, 24, 2, NULL, NULL),
(21, 25, 4, NULL, NULL),
(22, 25, 5, NULL, NULL),
(23, 26, 4, NULL, NULL),
(24, 27, 4, NULL, NULL),
(25, 27, 5, NULL, NULL),
(26, 28, 4, NULL, NULL),
(27, 29, 4, NULL, NULL),
(28, 30, 6, NULL, NULL),
(29, 31, 6, NULL, NULL),
(30, 32, 6, NULL, NULL),
(31, 33, 6, NULL, NULL),
(32, 34, 6, NULL, NULL),
(33, 35, 6, NULL, NULL),
(34, 46, 6, NULL, NULL),
(35, 47, 6, NULL, NULL),
(36, 48, 6, NULL, NULL),
(37, 49, 6, NULL, NULL),
(38, 50, 6, NULL, NULL),
(39, 51, 6, NULL, NULL),
(40, 52, 6, NULL, NULL),
(41, 53, 6, NULL, NULL),
(42, 53, 7, NULL, NULL),
(43, 54, 6, NULL, NULL),
(44, 54, 7, NULL, NULL),
(45, 55, 6, NULL, NULL),
(46, 55, 7, NULL, NULL),
(47, 56, 6, NULL, NULL),
(48, 57, 6, NULL, NULL),
(49, 58, 6, NULL, NULL),
(50, 59, 6, NULL, NULL),
(51, 60, 6, NULL, NULL),
(52, 60, 7, NULL, NULL),
(53, 61, 6, NULL, NULL),
(54, 62, 6, NULL, NULL),
(55, 63, 6, NULL, NULL),
(56, 64, 6, NULL, NULL),
(57, 65, 6, NULL, NULL),
(58, 65, 7, NULL, NULL),
(59, 66, 6, NULL, NULL),
(60, 67, 7, NULL, NULL),
(61, 68, 7, NULL, NULL),
(62, 67, 6, NULL, NULL),
(63, 69, 6, NULL, NULL),
(64, 70, 6, NULL, NULL),
(65, 71, 6, NULL, NULL),
(66, 72, 6, NULL, NULL),
(67, 73, 6, NULL, NULL),
(68, 74, 6, NULL, NULL),
(69, 75, 6, NULL, NULL),
(74, 80, 6, NULL, NULL),
(76, 82, 6, NULL, NULL),
(78, 84, 6, NULL, NULL),
(79, 85, 6, NULL, NULL),
(80, 86, 6, NULL, NULL),
(81, 87, 6, NULL, NULL),
(82, 88, 6, NULL, NULL),
(83, 89, 7, NULL, NULL),
(86, 92, 6, NULL, NULL),
(87, 93, 6, NULL, NULL),
(88, 93, 7, NULL, NULL),
(89, 94, 6, NULL, NULL),
(90, 94, 9, NULL, NULL),
(91, 95, 6, NULL, NULL),
(92, 95, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pegawai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_pegawai`, `gaji`, `alamat`, `no_ktp`, `created_at`, `updated_at`) VALUES
(6, 'Surjoyonoo', '150000', 'Jln Kepundungg', '123456', '2023-05-31 05:30:41', '2023-05-31 05:31:19'),
(7, 'Guntur Sulistiya', '3000000', 'Jln Anugrah', '5107012801020022', '2023-06-20 19:56:09', '2023-08-08 19:52:21'),
(9, 'i Wayan Aditya', '2500000', 'Jalan Mawar Gg Manggis no 4', '5107012801020001', '2023-08-15 11:12:51', '2023-08-15 11:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelanggan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `plat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`id`, `status`, `pelanggan`, `tanggal`, `plat`, `telepon`, `created_at`, `updated_at`) VALUES
(37, 'Done', 'Halilintar Hutagalo', '2023-08-11', 'dk 777 uy', '6287860958904', '2023-08-11 07:32:52', '2023-08-13 10:26:00'),
(38, 'Working', 'Agung Subadia', '2023-08-11', 'dk 777 uy', '6287860958904', '2023-08-11 10:00:14', '2023-08-13 10:25:29'),
(39, 'Taken', 'Halilintar Hutagalo', '2023-08-11', 'dk 777 uy', '6287860958904', '2023-08-11 12:14:42', '2023-08-13 10:26:14'),
(40, 'Confirm', 'Putri Gembi', '2023-08-11', 'dk 777 uy', '6287860958904', '2023-08-11 12:26:40', '2023-08-11 12:27:09'),
(41, 'Confirm', 'Made Binter', '2023-08-13', 'dk 777 uy', '6287860958904', '2023-08-13 10:24:44', '2023-08-13 10:24:59'),
(42, 'Done', 'Julian Dinsa', '2023-08-15', 'DK 3456 UY', '6287860958904', '2023-08-15 11:19:26', '2023-08-15 11:26:10'),
(43, 'Done', 'Agus Kresna', '2023-08-16', 'DK 1234 UY', '6287860958904', '2023-08-15 23:54:58', '2023-08-15 23:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `nama`, `image`, `telepon`, `plat`, `tanggal`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(3, 'deks ni bro', 'LaB4TjbtMK2i8TLhi3cavaxppUJ1LLUcE1MoWPuP.jpg', '09890989098', 'dk 6776 uy', '2023-06-09', 'jln jln ke bualu', 'Success', '2023-06-05 03:15:48', '2023-06-05 03:19:01'),
(5, 'I Made Agus Kresna Nanda', 'oP6fZFJ2bjuy2ySQgvKqxJXNJpD5V8MwmVXWeXZd.jpg', '6287860958904', 'dk 6666 uyy', '2023-08-09', 'Jln Pratama No 67 A', 'Success', '2023-08-08 19:55:03', '2023-08-08 19:55:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_nota`
--
ALTER TABLE `barang_nota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa_servis`
--
ALTER TABLE `jasa_servis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota_pegawai`
--
ALTER TABLE `nota_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `barang_nota`
--
ALTER TABLE `barang_nota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jasa_servis`
--
ALTER TABLE `jasa_servis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `nota_pegawai`
--
ALTER TABLE `nota_pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
