-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2022 at 02:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhangs`
--

CREATE TABLE `chitietdonhangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietkhuyenmais`
--

CREATE TABLE `chitietkhuyenmais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `khuyenmai_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tyle` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhgias`
--

CREATE TABLE `danhgias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `danhgia` int(11) NOT NULL,
  `binhluan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmucs`
--

CREATE TABLE `danhmucs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhmucs`
--

INSERT INTO `danhmucs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Thép', 'Thép xây dựng , ống thép', NULL, '2022-09-16 23:47:17', '2022-09-16 23:47:17'),
(2, 'Tôn', 'Tôn mạ màu, mạ kẽm', NULL, '2022-09-16 23:47:38', '2022-09-16 23:47:46'),
(3, 'Kim loại', 'Kim loại', NULL, '2022-09-16 23:48:02', '2022-09-16 23:48:02'),
(4, 'Nội thất', 'Nội thất', NULL, '2022-09-16 23:48:23', '2022-09-16 23:48:23'),
(5, 'Nhựa', 'Nhựa', NULL, '2022-09-16 23:48:31', '2022-09-16 23:48:31'),
(6, 'Gạch', 'Gạch', NULL, '2022-09-16 23:48:56', '2022-09-16 23:48:56'),
(7, 'Xi măng', 'Xi măng', NULL, '2022-09-16 23:49:43', '2022-09-16 23:49:43'),
(8, 'Gỗ', 'Gỗ', NULL, '2022-09-16 23:50:13', '2022-09-16 23:50:13'),
(9, 'Ống nước', 'Ống nước', NULL, '2022-09-16 23:50:55', '2022-09-16 23:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `donhangs`
--

CREATE TABLE `donhangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `ghichu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hangsanxuats`
--

CREATE TABLE `hangsanxuats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hangsanxuats`
--

INSERT INTO `hangsanxuats` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Hòa Phát', 'Công ty Cổ phần Thép Hòa Phát.', NULL, '2022-09-16 23:42:35', '2022-09-16 23:42:35'),
(2, 'Viglacera', 'Tổng công ty Viglacera - CTCP', NULL, '2022-09-16 23:42:54', '2022-09-16 23:42:54'),
(3, 'Vicostone', 'Công ty cổ phần Vicostone', NULL, '2022-09-16 23:43:08', '2022-09-16 23:43:08'),
(4, 'Hoa Sen', 'Công ty cổ phần Tập đoàn Hoa Sen', NULL, '2022-09-16 23:43:45', '2022-09-16 23:43:45'),
(5, 'An Cường', 'Công ty cổ phần gỗ An Cường', NULL, '2022-09-16 23:43:59', '2022-09-16 23:43:59'),
(6, 'Bình Minh', 'Công ty CP Nhựa Bình Minh', NULL, '2022-09-16 23:44:26', '2022-09-16 23:44:26'),
(7, 'Hà Tiên', 'Công ty CP Xi Măng Hà Tiên', NULL, '2022-09-16 23:44:41', '2022-09-16 23:44:41'),
(8, 'Phan Vũ', 'Công ty CP Đầu tư Phan Vũ', NULL, '2022-09-16 23:44:54', '2022-09-16 23:44:54'),
(9, 'Cement', 'Công ty TNHH Siam City Cement', NULL, '2022-09-16 23:45:09', '2022-09-16 23:45:09'),
(10, 'Tiền Phong', 'Công ty cổ phần Nhựa Thiếu niên Tiền Phong', NULL, '2022-09-16 23:45:31', '2022-09-16 23:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `hinhanh_sanphams`
--

CREATE TABLE `hinhanh_sanphams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hinhanhchitiet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hinhanh_sanphams`
--

INSERT INTO `hinhanh_sanphams` (`id`, `hinhanhchitiet`, `sanpham_id`, `created_at`, `updated_at`) VALUES
(1, '/storage/sanpham/thepcuonhoaphat.png', 1, '2022-09-17 00:11:19', '2022-09-17 00:11:19'),
(2, '/storage/sanpham/imagesf.jpg', 1, '2022-09-17 00:11:19', '2022-09-17 00:11:19'),
(3, '/storage/sanpham/thep-cuon-2.jpg', 1, '2022-09-17 00:11:19', '2022-09-17 00:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmais`
--

CREATE TABLE `khuyenmais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaybatdau` datetime NOT NULL,
  `ngayketthuc` datetime NOT NULL,
  `active` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaitaikhoans`
--

CREATE TABLE `loaitaikhoans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaitaikhoans`
--

INSERT INTO `loaitaikhoans` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-09-16 15:16:43', '2022-09-16 15:16:43'),
(2, 'Khách Hàng', '2022-09-16 15:16:43', '2022-09-16 15:16:43'),
(3, 'Nhân viên', '2022-09-16 15:17:20', '2022-09-16 15:17:20');

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
(5, '2021_09_06_034930_create_loaitaikhoans_table', 1),
(6, '2021_09_06_080249_create_danhmucs_table', 1),
(7, '2021_09_07_025052_create_hangsanxuats_table', 1),
(8, '2021_09_07_034803_create_sanphams_table', 1),
(9, '2021_09_07_034844_create_hinhanh_sanphams_table', 1),
(10, '2021_09_07_073436_create_khuyenmais_table', 1),
(11, '2021_09_07_073541_create_chitietkhuyenmais_table', 1),
(12, '2021_09_11_080055_create_danhgias_table', 1),
(13, '2021_09_13_013320_create_donhangs_table', 1),
(14, '2021_09_13_013412_create_chitietdonhangs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanphams`
--

CREATE TABLE `sanphams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tensp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dongia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `cauhinh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `view` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanphams`
--

INSERT INTO `sanphams` (`id`, `tensp`, `dongia`, `hinhanh`, `soluong`, `cauhinh`, `mota`, `category_id`, `menu_id`, `active`, `view`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 1, 1, 1, 1, NULL, '2022-09-17 00:11:18', '2022-09-17 05:18:03'),
(2, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 2, 3, 1, 0, NULL, '2022-09-17 00:11:18', '2022-09-17 00:12:24'),
(3, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 1, 3, 1, 0, NULL, '2022-09-17 00:11:18', '2022-09-17 00:12:24'),
(4, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 3, 3, 1, 0, NULL, '2022-09-17 00:11:18', '2022-09-17 00:12:24'),
(5, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 5, 6, 1, 0, NULL, '2022-09-17 00:11:18', '2022-09-17 00:12:24'),
(6, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 6, 6, 1, 0, NULL, '2022-09-17 00:11:18', '2022-09-17 00:12:24'),
(7, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 8, 3, 1, 0, NULL, '2022-09-17 00:11:18', '2022-09-17 00:12:24'),
(8, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 9, 10, 1, 0, NULL, '2022-09-17 00:11:18', '2022-09-17 00:12:24'),
(9, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 9, 5, 1, 0, NULL, '2022-09-17 00:11:18', '2022-09-17 00:12:24'),
(10, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 9, 10, 1, 0, NULL, '2022-09-17 00:11:18', '2022-09-17 00:12:24'),
(11, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 1, 7, 1, 0, NULL, '2022-09-17 00:11:18', '2022-09-17 00:12:24'),
(12, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 2, 8, 1, 0, NULL, '2022-09-17 00:11:18', '2022-09-17 00:12:24'),
(13, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 4, 8, 1, 0, NULL, '2022-09-17 00:11:18', '2022-09-17 00:12:24'),
(14, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 4, 6, 1, 0, NULL, '2022-09-17 00:11:18', '2022-09-17 00:12:24'),
(15, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 8, 4, 1, 0, NULL, '2022-09-17 00:11:18', '2022-09-17 00:12:24'),
(16, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 3, 2, 1, 0, NULL, '2022-09-17 00:11:18', '2022-09-17 00:12:24'),
(17, 'Thép cuộn', '26000000', '/storage/sanpham/thep-cuon-2.jpg', 1000, '<p>K&iacute;ch cỡ &Phi; 6, &Phi;8, D8 gai, &Phi;10 Đường k&iacute;nh ngo&agrave;i cuộn: &Phi; 1,2 m</p>\r\n<p>Ti&ecirc;u chuẩn JIS (Nhật Bản), ASTM ( Hoa Kỳ), BS (Anh), TCVN (Việt Nam)</p>\r\n<p>Bề mặt S&aacute;ng b&oacute;ng</p>\r\n<p>Tiết diện Rất tr&ograve;n, độ &ocirc;van nhỏ</p>\r\n<p>Trọng lượng cuộn 1000kg &ndash; 2100kg</p>\r\n<p>Đường k&iacute;nh ngo&agrave;i cuộn &Phi; 1,2 m</p>', '<p>Th&eacute;p cuộn</p>', 7, 2, 1, 0, NULL, '2022-09-17 00:11:18', '2022-09-17 00:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaitaikhoan` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `loaitaikhoan`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '0935046139', '2022-09-16 15:17:43', '$2y$10$M.ddgNA1HG.ZwBpFJbfH..f.q//C8htsvGiAl0AG97eDND20gIIOO', 1, 1, 'lWb05ch5wMkMlPG9gGdY2rG2FiDoRSRvVS1L9B5n5cZ7DZ5GxOIEwJ7iwap7', '2022-09-16 15:17:43', '2022-09-16 15:17:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhangs`
--
ALTER TABLE `chitietdonhangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chitietkhuyenmais`
--
ALTER TABLE `chitietkhuyenmais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhgias`
--
ALTER TABLE `danhgias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmucs`
--
ALTER TABLE `danhmucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhangs`
--
ALTER TABLE `donhangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hangsanxuats`
--
ALTER TABLE `hangsanxuats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinhanh_sanphams`
--
ALTER TABLE `hinhanh_sanphams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khuyenmais`
--
ALTER TABLE `khuyenmais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaitaikhoans`
--
ALTER TABLE `loaitaikhoans`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sanphams`
--
ALTER TABLE `sanphams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhangs`
--
ALTER TABLE `chitietdonhangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitietkhuyenmais`
--
ALTER TABLE `chitietkhuyenmais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhgias`
--
ALTER TABLE `danhgias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmucs`
--
ALTER TABLE `danhmucs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `donhangs`
--
ALTER TABLE `donhangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hangsanxuats`
--
ALTER TABLE `hangsanxuats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hinhanh_sanphams`
--
ALTER TABLE `hinhanh_sanphams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `khuyenmais`
--
ALTER TABLE `khuyenmais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaitaikhoans`
--
ALTER TABLE `loaitaikhoans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanphams`
--
ALTER TABLE `sanphams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
