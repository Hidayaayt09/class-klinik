-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 09, 2022 at 11:14 AM
-- Server version: 5.7.33
-- PHP Version: 8.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laatachzan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `nama`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
('ecdc4765-aa06-43d2-bc40-7ec4226b3fc1', 'Administrator', 'admin', 'admin@admin.com', '$2y$10$oc2jWRqO6jjWJhZExs3rGu1qxwKF.kZr8r51R/VHc.GPRTy7WyB6W', '2021-08-21 08:33:58', '2021-08-21 08:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `dokter_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_wa` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `fcm_token` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`dokter_id`, `nama`, `username`, `email`, `password`, `jenis_kelamin`, `no_wa`, `alamat`, `fcm_token`, `created_at`, `updated_at`) VALUES
('b8123eb1-07d3-45f4-a247-0caf1bee1376', 'Dokter', 'dokter', 'dokter@dokter.com', '$2y$10$tie1u7r0oPpzG3d7PZSnweHqEdqoQB89PLRzTs8tOeplwgqWbb6AO', 'Laki-Laki', '085721718411', 'Desa Kliwed Kecamatan Kertasemaya', NULL, '2021-08-21 08:51:02', '2021-08-21 13:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `gejala_id` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_gejala` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`gejala_id`, `kategori_id`, `nama_gejala`, `created_at`, `updated_at`) VALUES
('G01', 'K01', 'Mata merah', '2021-08-23 07:41:35', '2021-08-23 07:44:17'),
('G02', 'K01', 'Kejang tanpa ada gejala', '2021-08-25 04:54:23', '2021-08-25 04:54:23'),
('G03', 'K02', 'Jantung terasa berdebar-debar', '2021-08-25 04:54:59', '2021-08-25 04:54:59'),
('G04', 'K02', 'Mulut terasa kering', '2021-08-25 04:55:32', '2021-08-25 04:55:32'),
('G05', 'K03', 'Sangat sensitif', '2021-08-25 04:56:46', '2021-08-25 04:56:46'),
('G06', 'K03', 'Tidak bahagia', '2021-08-25 04:57:35', '2021-08-25 04:57:35'),
('G07', 'K04', 'Rasa tertekan pada perut dan usus', '2021-08-25 04:59:24', '2021-08-25 04:59:24'),
('G08', 'K04', 'Sulit tidur', '2021-08-25 05:00:48', '2021-08-25 05:00:48'),
('G09', 'K05', 'Rasa malu berlebihan', '2021-08-25 05:02:46', '2021-08-25 05:02:46'),
('G10', 'K05', 'Merasa tidak dibutuhkan', '2021-08-25 05:05:12', '2021-08-25 05:05:12'),
('G11', 'K06', 'Kehilangan kesadaran waktu', '2021-08-25 05:07:06', '2021-08-25 05:07:06'),
('G12', 'K06', 'Perubahan nada suara', '2021-08-25 05:08:18', '2021-08-25 05:08:18'),
('G13', 'K07', 'Sering memperlihatkan alat kelaminnya pada orang asing', '2021-08-25 05:08:39', '2021-08-25 05:08:39'),
('G14', 'K07', 'Gairah seks muncul saat mengintip orang telanjang', '2021-08-25 05:09:05', '2021-08-25 05:09:05'),
('G15', 'K08', 'Rasa haus yang berlebihan', '2021-08-25 05:09:32', '2021-08-25 05:09:32'),
('G16', 'K08', 'Tinja menjadi keras', '2021-08-25 05:09:48', '2021-08-25 05:09:48'),
('G17', 'K09', 'Nafsu makan meningkat', '2021-08-25 05:10:40', '2021-08-25 05:10:40'),
('G18', 'K09', 'Sakit kepala', '2021-08-25 05:11:06', '2021-08-25 05:11:06'),
('G19', 'K10', 'Perasaan takut memikirkan kehamilan dan kelahiran', '2021-08-25 05:11:44', '2021-08-25 05:11:44'),
('G20', 'K10', 'Ketakutan yang ekstrim terhadap cacat lahir, keguguran, atau kematian ibu', '2021-08-25 05:12:04', '2021-08-25 05:12:04'),
('G21', 'K11', 'Tingkat emosional berubah-ubah', '2021-08-25 05:12:22', '2021-08-25 05:12:22'),
('G22', 'K11', 'Kerap mendengar sesuatu bisikan', '2021-08-25 05:12:37', '2021-08-25 05:12:37'),
('G23', 'K12', 'Mampu mengatasi masalah sesuai prinsip dan keyakinan yang dipegangnya', '2021-08-25 05:13:05', '2021-08-25 05:13:05'),
('G24', 'K12', 'Memiliki respons dan manajemen stres yang lebih baik', '2021-08-25 05:13:19', '2021-08-25 05:13:19'),
('G25', 'K13', 'Berbuat kasar pada orang lain', '2021-08-25 05:13:33', '2021-08-25 05:13:33'),
('G26', 'K13', 'Sering berbohong', '2021-08-25 05:13:46', '2021-08-25 05:13:46'),
('G27', 'K14', 'Selalu merasa cemas', '2021-08-25 05:13:59', '2021-08-25 05:13:59'),
('G28', 'K14', 'Berfikir berlebihan', '2021-08-25 05:14:21', '2021-08-25 05:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `identitas_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identitas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` bigint(20) UNSIGNED NOT NULL,
  `konseling_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_konseling` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `konseling_id`, `tanggal_konseling`, `created_at`, `updated_at`) VALUES
(13, 11, '2022-02-16', '2022-02-17 05:46:00', '2022-02-18 05:47:26'),
(14, 13, '2022-03-17', '2022-03-17 13:18:35', '2022-03-17 13:18:35'),
(15, 14, '2022-07-04', '2022-06-30 04:47:38', '2022-06-30 04:47:38'),
(16, 12, '2022-07-28', '2022-07-27 14:35:51', '2022-07-27 14:35:51'),
(17, 15, '2022-07-28', '2022-07-27 14:43:04', '2022-07-27 14:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ulang`
--

CREATE TABLE `jadwal_ulang` (
  `jadwal_ulang_id` bigint(20) UNSIGNED NOT NULL,
  `konseling_id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_id` bigint(20) UNSIGNED NOT NULL,
  `dari` date NOT NULL,
  `sampai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_ulang`
--

INSERT INTO `jadwal_ulang` (`jadwal_ulang_id`, `konseling_id`, `jadwal_id`, `dari`, `sampai`, `created_at`, `updated_at`) VALUES
(7, 11, 13, '2021-08-30', '2021-09-01', '2021-08-25 05:46:55', '2021-08-25 05:46:55'),
(8, 15, 17, '2022-07-28', '2022-07-30', '2022-07-27 14:43:41', '2022-07-27 14:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
('K01', 'Kecanduan Narkoba', 'Kecanduan pada narkoba merupakan kondisi dimana seseorang tidak dapat mengendalikan penggunaan narkoba dan menginginkan penggunaan obat walaupun dapat menimbulkan bahaya.', '5689.jpg', '2021-07-25 07:28:32', '2021-07-25 07:28:32'),
('K02', 'Fobia', 'Fobia adalah kondisi ketika seseorang mengalami rasa takut berlebihan pada sesuatu yang biasanya tidak membahayakan.', '41496.jpg', '2021-07-25 07:28:32', '2021-07-25 07:28:32'),
('K03', 'Neurosis', 'Neurosis adalah kondisi karena adanya stress jangka panjang, namun tidak seperti psikosis yang melibatkan delusi atau halusinasi.', '42927.jpg', '2021-07-25 07:28:32', '2021-07-25 07:28:32'),
('K04', 'Insomnia', 'Insomnia adalah kondisi ketika seseorang mengalami kesulitan tidur.', '86058.jpg', '2021-07-25 07:28:32', '2021-07-25 07:28:32'),
('K05', 'Minder', 'Rasa rendah diri atau minder atau low self-esteem atau condescending, adalah perasaan bahwa seseorang lebih rendah dibanding orang lain dalam satu atau lain hal.', '39354.jpg', '2021-07-25 07:28:32', '2021-07-25 07:28:32'),
('K06', 'Kesurupan', 'Kesurupan adalah keadaan mental di mana individu tidak memiliki kesadaran atas mental dan/atau lingkungannya dalam jangka waktu yang lama.', '66659.jpg', '2021-07-25 07:28:32', '2021-07-25 07:28:32'),
('K07', 'Parafilia', 'Penyimpangan seksual atau parafilia adalah bangkitnya gairah seksual secara terus-menerus terhadap objek, situasi, atau individu tertentu yang tidak lazim.', '30477.jpg', '2021-07-25 07:28:32', '2021-07-25 07:28:32'),
('K08', 'Enuresis', 'Enuresis adalah istilah medis untuk kebiasaan mengompol, yaitu kondisi ketika seseorang tidak dapat menahan keluarnya air kencing.', '35335.jpg', '2021-07-25 07:28:32', '2021-07-25 07:28:32'),
('K09', 'Berhenti Merokok', 'Berhenti merokok adalah proses untuk menghentikan kebiasaan merokok.', '35992.jpg', '2021-07-25 07:28:32', '2021-07-25 07:28:32'),
('K10', 'Tokophobia', 'Tokophobia adalah rasa takut yang luar biasa untuk hamil dan melahirkan.', '88462.jpg', '2021-07-25 07:28:32', '2021-08-22 03:58:02'),
('K11', 'Merasa Diguna-guna', 'Merasa Diguna-guna merupakan kondisi ketika seseorang merasa sakit yang dialami akibat ilmu hitam.', '14784.jpg', '2021-07-25 07:28:32', '2021-07-25 07:28:32'),
('K12', 'Spiritual Excellence', 'Kecerdasan spiritual adalah salah satu dimensi dalam kesehatan manusia yang dirumuskan selain kesehatan fisik dan mental. Kecerdasan spiritual bisa digambarkan sebagai bentuk upaya manusia dalam menemukan harapan, arti, dan ketenangan dalam hidupnya.', '26004.jpg', '2021-07-25 07:28:32', '2021-07-25 07:28:32'),
('K13', 'Penyimpangan Perilaku Sosial', 'Perilaku menyimpang umumnya didefinisikan sebagai perilaku yang dianggap bertentangan dengan norma atau peraturan yang berlaku di masyarakat.', '27977.webp', '2021-07-25 07:28:32', '2021-07-25 07:28:32'),
('K14', 'Anxiety Disorder', 'Anxiety Disorder atau biasa dikenal dengan gangguan kecemasan merupakan gangguan kesehatan mental yang ditandai dengan perasaan khawatir, cemas, atau takut yang cukup kuat untuk mengganggu aktivitas sehari-hari.', '35964.jpg', '2021-08-22 03:28:16', '2021-08-22 03:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `konseling`
--

CREATE TABLE `konseling` (
  `konseling_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_sesi` enum('online','offline') COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `bukti_pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('belum','menunggu','konfirmasi','jadwal_ulang') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_sesi` enum('nonaktif','aktif','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konseling`
--

INSERT INTO `konseling` (`konseling_id`, `user_id`, `kategori_id`, `jenis_sesi`, `harga`, `bukti_pembayaran`, `status`, `status_sesi`, `created_at`, `updated_at`) VALUES
(11, '6e3c20cf-0277-4854-97d3-ca15c255c5b9', 'K04', 'online', 100000, '83830.jpg', 'konfirmasi', 'aktif', '2021-08-25 05:44:49', '2021-08-25 05:48:39'),
(12, '6e3c20cf-0277-4854-97d3-ca15c255c5b9', 'K10', 'online', 100000, '2072.jpg', 'konfirmasi', 'nonaktif', '2022-01-27 12:00:23', '2022-03-17 13:12:09'),
(13, '6e3c20cf-0277-4854-97d3-ca15c255c5b9', 'K06', 'online', 100000, '86151.png', 'konfirmasi', 'aktif', '2022-03-17 13:17:30', '2022-03-17 13:18:48'),
(14, 'ac8e55c9-9521-48c5-9fd5-0df8e42fd71e', 'K10', 'online', 100000, '58662.jpg', 'konfirmasi', 'aktif', '2022-06-30 04:44:50', '2022-06-30 04:48:01'),
(15, 'ac8e55c9-9521-48c5-9fd5-0df8e42fd71e', 'K03', 'online', 100000, '88107.jpg', 'jadwal_ulang', 'nonaktif', '2022-07-13 07:53:27', '2022-07-27 14:43:41'),
(16, 'ac8e55c9-9521-48c5-9fd5-0df8e42fd71e', 'K08', 'online', 100000, NULL, 'belum', 'nonaktif', '2022-07-26 10:46:08', '2022-07-26 10:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_05_14_163218_create_admin_table', 1),
(7, '2021_06_14_051732_create_sessions_table', 1),
(8, '2021_06_14_162440_create_dokter_table', 1),
(9, '2021_06_14_162744_create_kategori_table', 1),
(10, '2021_06_14_162829_create_konseling_table', 1),
(11, '2021_06_14_163028_create_jadwal_table', 1),
(12, '2021_06_14_163156_create_identitas_table', 1),
(13, '2021_06_14_163238_create_testimoni_table', 1),
(14, '2021_07_23_063854_create_gejala_table', 1),
(15, '2021_08_12_220349_create_sesi_online_table', 1),
(16, '2021_08_13_085208_create_jadwal_ulang_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('marwiyahzf@gmail.com', '$2y$10$w1yBqSfRWxvWoOZVguYVkOadl9/AOYv/iq2TLwO2CcV1MKgvm0Hw2', '2021-08-23 05:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sesi_online`
--

CREATE TABLE `sesi_online` (
  `sesi_id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_id` bigint(20) UNSIGNED NOT NULL,
  `receiver` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sesi_online`
--

INSERT INTO `sesi_online` (`sesi_id`, `jadwal_id`, `receiver`, `sender`, `pesan`, `created_at`, `updated_at`) VALUES
(15, 13, '5e03ca33-ef28-4369-a66e-b09fec2fe92c', 'b8123eb1-07d3-45f4-a247-0caf1bee1376', 'Halo ada yang bisa kami bantu?', '2021-08-25 05:49:37', '2021-08-25 05:49:37'),
(16, 13, 'b8123eb1-07d3-45f4-a247-0caf1bee1376', '5e03ca33-ef28-4369-a66e-b09fec2fe92c', 'Iya', '2021-08-25 05:49:49', '2021-08-25 05:49:49'),
(17, 13, 'b8123eb1-07d3-45f4-a247-0caf1bee1376', '5e03ca33-ef28-4369-a66e-b09fec2fe92c', 'halo', '2022-01-27 11:59:30', '2022-01-27 11:59:30'),
(18, 13, '5e03ca33-ef28-4369-a66e-b09fec2fe92c', 'b8123eb1-07d3-45f4-a247-0caf1bee1376', 'ada yang bisa bantu', '2022-01-27 12:42:13', '2022-01-27 12:42:13'),
(19, 13, '6e3c20cf-0277-4854-97d3-ca15c255c5b9', 'b8123eb1-07d3-45f4-a247-0caf1bee1376', 'hallo', '2022-03-17 13:13:05', '2022-03-17 13:13:05'),
(20, 13, 'b8123eb1-07d3-45f4-a247-0caf1bee1376', '6e3c20cf-0277-4854-97d3-ca15c255c5b9', 'hay dok', '2022-03-17 13:13:18', '2022-03-17 13:13:18'),
(21, 13, 'b8123eb1-07d3-45f4-a247-0caf1bee1376', '6e3c20cf-0277-4854-97d3-ca15c255c5b9', 'saya ad gelaja susah tidur kalau malam dok', '2022-03-17 13:13:36', '2022-03-17 13:13:36'),
(22, 13, '6e3c20cf-0277-4854-97d3-ca15c255c5b9', 'b8123eb1-07d3-45f4-a247-0caf1bee1376', 'ok saya catet', '2022-03-17 13:13:46', '2022-03-17 13:13:46'),
(23, 13, '6e3c20cf-0277-4854-97d3-ca15c255c5b9', 'b8123eb1-07d3-45f4-a247-0caf1bee1376', 'hallo mat', '2022-06-02 11:18:25', '2022-06-02 11:18:25'),
(24, 13, 'b8123eb1-07d3-45f4-a247-0caf1bee1376', '6e3c20cf-0277-4854-97d3-ca15c255c5b9', 'hai dok', '2022-07-13 16:54:16', '2022-07-13 16:54:16'),
(25, 13, 'b8123eb1-07d3-45f4-a247-0caf1bee1376', '6e3c20cf-0277-4854-97d3-ca15c255c5b9', 'hai dok', '2022-07-13 16:54:17', '2022-07-13 16:54:17'),
(26, 15, 'b8123eb1-07d3-45f4-a247-0caf1bee1376', 'ac8e55c9-9521-48c5-9fd5-0df8e42fd71e', 'hallo', '2022-07-27 14:57:19', '2022-07-27 14:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('evXsm6r4SgamzU12ZFkTkF1kszyVqLaTcpKf1PFO', 0, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRTRvVEcwTVdPS1dMMU9ENjN5TlQ4SXRXM0JOM05jVE53OEdqUUZQdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9nZWphbGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4iO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtzOjM2OiJlY2RjNDc2NS1hYTA2LTQzZDItYmM0MC03ZWM0MjI2YjNmYzEiO30=', 1660041595),
('NeD6B3A9C2DjFHQE4WzK5ioZBSHrYX4CqFiJptFL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.81 Safari/537.36 Edg/104.0.1293.47', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ1BXcml6TUc5emlHZ3B0TjdBNUNqU3BmV3ZoUmFCZWZPczdKQ0hwUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1660041579);

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `testimoni_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`testimoni_id`, `user_id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(8, '6e3c20cf-0277-4854-97d3-ca15c255c5b9', 'pelayanan bagus dan ramah', '2022-07-13 16:55:29', '2022-07-13 16:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_wa` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `fcm_token` longtext COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nama`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `jenis_kelamin`, `tanggal_lahir`, `no_wa`, `pekerjaan`, `alamat`, `fcm_token`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
('5e03ca33-ef28-4369-a66e-b09fec2fe92c', 'Nada Qonita Amalia', 'nadaqonita01@gmail.com', '2021-08-25 05:44:06', '$2y$10$oc2jWRqO6jjWJhZExs3rGu1qxwKF.kZr8r51R/VHc.GPRTy7WyB6W', NULL, NULL, NULL, NULL, '085721718411', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-25 05:42:41', '2021-08-25 05:44:06'),
('63e49cba-2887-49ff-ad32-7dffe5b4df3e', 'Gilang', 'gr072885@gmail.com', NULL, '$2y$10$tIKGjrFf69vvYY7MJgIh7uTc0Nf160EBeG.mAuvuv3kYLKJ42sDCi', NULL, NULL, NULL, NULL, '085320154163', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-06 04:21:47', '2022-07-06 04:21:47'),
('6e3c20cf-0277-4854-97d3-ca15c255c5b9', 'Rakhmat Hidayat', 'rakhmat09@gmail.com', '2021-08-22 07:58:37', '$2y$10$MR0K7m14f.z5uz9.4VpOyeFNKbGEXNeCHiklcO4fUCe0Oob4b/iGO', NULL, NULL, 'Laki-Laki', NULL, '085721718411', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-22 07:54:51', '2022-02-07 15:03:55'),
('a310c846-2cbd-4a7a-9ce7-2753db0c0303', 'hidayat', 'airdrophi28@gmail.com', '2022-06-25 06:19:05', '$2y$10$BWwlsTGADRQTrlplR6TpGOJ4Ou6YhQ.bzeM6kPxbDTeP/dKYSZghK', NULL, NULL, NULL, NULL, '08976751876', NULL, NULL, NULL, 'CJ92zqVk8zKgD9pLkHj7AkvxHMeOUE1CmU2qsnfhSGtfbNpfH3SS5SmIVQXX', NULL, NULL, '2022-06-25 06:18:43', '2022-06-25 06:26:10'),
('ac8e55c9-9521-48c5-9fd5-0df8e42fd71e', 'syarif', 'syarif11@gmail.com', '2022-06-30 04:44:15', '$2y$10$tiih.bjdTJ2HbPH6tj8.a.aMjIJfI1QBC.oPUMXnJCsSQdgu8WFx6', NULL, NULL, 'Perempuan', NULL, '08767188731', NULL, 'ihuhuihiuhiu', NULL, NULL, NULL, NULL, '2022-06-30 04:43:38', '2022-07-27 14:59:20'),
('c50c0333-99c7-4f48-992f-f432990809e0', 'mamathi99', 'airdropmat5@gmail.com', '2022-06-25 06:24:58', '$2y$10$MMsyS8qKXYSLrYVu6iS5MuXdBbKxVepKvj57Fr8obhpnL/aLDXwVG', NULL, NULL, NULL, NULL, '08997871187', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-25 06:23:04', '2022-06-25 06:24:58'),
('d915c836-b08c-43cc-91b6-5dcc5026ea88', 'mamathi', 'mamat99@gmail.com', NULL, '$2y$10$4yCo2rdvsD2QaxYxp7EglOgcnDsyEkeFAQLpXyH9JyEl7Wsr5dTOm', NULL, NULL, NULL, NULL, '08754393976', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-06 04:27:21', '2022-07-06 04:27:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username_unique` (`username`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`dokter_id`),
  ADD UNIQUE KEY `dokter_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`gejala_id`),
  ADD KEY `gejala_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`identitas_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `jadwal_konseling_id_foreign` (`konseling_id`);

--
-- Indexes for table `jadwal_ulang`
--
ALTER TABLE `jadwal_ulang`
  ADD PRIMARY KEY (`jadwal_ulang_id`),
  ADD KEY `jadwal_ulang_konseling_id_foreign` (`konseling_id`),
  ADD KEY `jadwal_ulang_jadwal_id_foreign` (`jadwal_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `konseling`
--
ALTER TABLE `konseling`
  ADD PRIMARY KEY (`konseling_id`),
  ADD KEY `konseling_user_id_foreign` (`user_id`),
  ADD KEY `konseling_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sesi_online`
--
ALTER TABLE `sesi_online`
  ADD PRIMARY KEY (`sesi_id`),
  ADD KEY `sesi_online_jadwal_id_foreign` (`jadwal_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`testimoni_id`),
  ADD KEY `testimoni_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `identitas_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jadwal_ulang`
--
ALTER TABLE `jadwal_ulang`
  MODIFY `jadwal_ulang_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `konseling`
--
ALTER TABLE `konseling`
  MODIFY `konseling_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sesi_online`
--
ALTER TABLE `sesi_online`
  MODIFY `sesi_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `testimoni_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gejala`
--
ALTER TABLE `gejala`
  ADD CONSTRAINT `gejala_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_konseling_id_foreign` FOREIGN KEY (`konseling_id`) REFERENCES `konseling` (`konseling_id`);

--
-- Constraints for table `jadwal_ulang`
--
ALTER TABLE `jadwal_ulang`
  ADD CONSTRAINT `jadwal_ulang_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`jadwal_id`),
  ADD CONSTRAINT `jadwal_ulang_konseling_id_foreign` FOREIGN KEY (`konseling_id`) REFERENCES `konseling` (`konseling_id`);

--
-- Constraints for table `konseling`
--
ALTER TABLE `konseling`
  ADD CONSTRAINT `konseling_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`),
  ADD CONSTRAINT `konseling_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `sesi_online`
--
ALTER TABLE `sesi_online`
  ADD CONSTRAINT `sesi_online_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`jadwal_id`);

--
-- Constraints for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
