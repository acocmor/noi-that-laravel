-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for noi_that
CREATE DATABASE IF NOT EXISTS `noi_that` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `noi_that`;

-- Dumping structure for table noi_that.address
CREATE TABLE IF NOT EXISTS `address` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dia_chi` text COLLATE utf8mb4_unicode_ci,
  `hotline_add` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.address: ~0 rows (approximately)
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
/*!40000 ALTER TABLE `address` ENABLE KEYS */;

-- Dumping structure for table noi_that.chinh_sach
CREATE TABLE IF NOT EXISTS `chinh_sach` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `hien_thi` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.chinh_sach: ~6 rows (approximately)
/*!40000 ALTER TABLE `chinh_sach` DISABLE KEYS */;
INSERT INTO `chinh_sach` (`id`, `title`, `slug`, `content`, `hien_thi`, `created_at`, `updated_at`) VALUES
	(3, 'Ch??nh s??ch b??n h??ng', 'chinh-sach-ban-hang', NULL, 1, '2021-02-17 14:03:03', '2021-02-17 22:53:42'),
	(4, 'Ch??nh s??ch b???o h??nh', 'chinh-sach-bao-hanh', NULL, 1, '2021-02-17 14:03:11', '2021-02-17 14:03:11'),
	(5, 'Ph????ng th???c v???n chuy???n', 'phuong-thuc-van-chuyen', NULL, 1, '2021-02-17 14:03:17', '2021-02-17 14:03:17'),
	(6, 'Ph????ng th???c thanh to??n', 'phuong-thuc-thanh-toan', NULL, 1, '2021-02-17 14:03:23', '2021-02-17 14:03:23'),
	(7, 'Ch??nh s??ch ?????i tr???', 'chinh-sach-doi-tra', NULL, 1, '2021-02-17 14:03:29', '2021-02-17 14:03:29'),
	(8, 'Ch??nh s??ch b???o m???t', 'chinh-sach-bao-mat', '', 1, '2021-02-17 14:03:37', '2021-02-17 14:03:37');
/*!40000 ALTER TABLE `chinh_sach` ENABLE KEYS */;

-- Dumping structure for table noi_that.chi_tiet
CREATE TABLE IF NOT EXISTS `chi_tiet` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dat_hang_id` bigint(20) unsigned NOT NULL,
  `san_pham_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.chi_tiet: ~0 rows (approximately)
/*!40000 ALTER TABLE `chi_tiet` DISABLE KEYS */;
/*!40000 ALTER TABLE `chi_tiet` ENABLE KEYS */;

-- Dumping structure for table noi_that.chi_tiet_hoa_don
CREATE TABLE IF NOT EXISTS `chi_tiet_hoa_don` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoa_don_xuat_id` int(11) NOT NULL DEFAULT '0',
  `san_pham_id` int(11) NOT NULL DEFAULT '0',
  `so_luong` int(11) NOT NULL DEFAULT '0',
  `don_gia` bigint(20) NOT NULL DEFAULT '0',
  `thanh_tien` bigint(20) NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.chi_tiet_hoa_don: ~0 rows (approximately)
/*!40000 ALTER TABLE `chi_tiet_hoa_don` DISABLE KEYS */;
INSERT INTO `chi_tiet_hoa_don` (`id`, `hoa_don_xuat_id`, `san_pham_id`, `so_luong`, `don_gia`, `thanh_tien`, `updated_at`, `created_at`) VALUES
	(1, 2, 25, 6, -5994000000, -35964000000, '2022-05-15 13:22:02', '2022-05-15 13:22:02');
/*!40000 ALTER TABLE `chi_tiet_hoa_don` ENABLE KEYS */;

-- Dumping structure for table noi_that.danh_sach_kh_lh
CREATE TABLE IF NOT EXISTS `danh_sach_kh_lh` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `sanpham_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.danh_sach_kh_lh: ~0 rows (approximately)
/*!40000 ALTER TABLE `danh_sach_kh_lh` DISABLE KEYS */;
/*!40000 ALTER TABLE `danh_sach_kh_lh` ENABLE KEYS */;

-- Dumping structure for table noi_that.dat_hang
CREATE TABLE IF NOT EXISTS `dat_hang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `khach_hang_id` bigint(20) unsigned NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.dat_hang: ~0 rows (approximately)
/*!40000 ALTER TABLE `dat_hang` DISABLE KEYS */;
/*!40000 ALTER TABLE `dat_hang` ENABLE KEYS */;

-- Dumping structure for table noi_that.decor
CREATE TABLE IF NOT EXISTS `decor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hien_thi` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.decor: ~0 rows (approximately)
/*!40000 ALTER TABLE `decor` DISABLE KEYS */;
INSERT INTO `decor` (`id`, `title`, `slug`, `content`, `hien_thi`, `created_at`, `updated_at`) VALUES
	(1, 'Decor', 'decor', 'Kh??ng c?? th??ng tin!', 1, NULL, NULL);
/*!40000 ALTER TABLE `decor` ENABLE KEYS */;

-- Dumping structure for table noi_that.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table noi_that.gioi_thieu
CREATE TABLE IF NOT EXISTS `gioi_thieu` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `index_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.gioi_thieu: ~0 rows (approximately)
/*!40000 ALTER TABLE `gioi_thieu` DISABLE KEYS */;
INSERT INTO `gioi_thieu` (`id`, `index_content`, `content`, `created_at`, `updated_at`) VALUES
	(1, '', '', NULL, NULL);
/*!40000 ALTER TABLE `gioi_thieu` ENABLE KEYS */;

-- Dumping structure for table noi_that.hoa_don_xuat
CREATE TABLE IF NOT EXISTS `hoa_don_xuat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ngay_lap` datetime DEFAULT NULL,
  `tong_tien` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.hoa_don_xuat: ~1 rows (approximately)
/*!40000 ALTER TABLE `hoa_don_xuat` DISABLE KEYS */;
INSERT INTO `hoa_don_xuat` (`id`, `ngay_lap`, `tong_tien`, `updated_at`, `created_at`) VALUES
	(1, '2022-05-15 13:21:38', -4995000000, '2022-05-15 13:21:38', '2022-05-15 13:21:38'),
	(2, '2022-05-15 13:22:02', -4995000000, '2022-05-15 13:22:02', '2022-05-15 13:22:02');
/*!40000 ALTER TABLE `hoa_don_xuat` ENABLE KEYS */;

-- Dumping structure for table noi_that.hotline
CREATE TABLE IF NOT EXISTS `hotline` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hotline` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `official_hotline` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.hotline: ~0 rows (approximately)
/*!40000 ALTER TABLE `hotline` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotline` ENABLE KEYS */;

-- Dumping structure for table noi_that.khach_hang
CREATE TABLE IF NOT EXISTS `khach_hang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `khach_hang_email_unique` (`email`),
  UNIQUE KEY `khach_hang_phone_number_unique` (`phone_number`),
  UNIQUE KEY `khach_hang_address_unique` (`address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.khach_hang: ~0 rows (approximately)
/*!40000 ALTER TABLE `khach_hang` DISABLE KEYS */;
/*!40000 ALTER TABLE `khach_hang` ENABLE KEYS */;

-- Dumping structure for table noi_that.kh_lien_he
CREATE TABLE IF NOT EXISTS `kh_lien_he` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.kh_lien_he: ~0 rows (approximately)
/*!40000 ALTER TABLE `kh_lien_he` DISABLE KEYS */;
/*!40000 ALTER TABLE `kh_lien_he` ENABLE KEYS */;

-- Dumping structure for table noi_that.loai_san_pham
CREATE TABLE IF NOT EXISTS `loai_san_pham` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.loai_san_pham: ~6 rows (approximately)
/*!40000 ALTER TABLE `loai_san_pham` DISABLE KEYS */;
INSERT INTO `loai_san_pham` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'C???ng', 'cong', '2021-02-10 02:27:27', '2021-02-10 14:12:34'),
	(2, 'T?????ng', 'tuong', '2021-02-10 02:27:31', '2021-02-10 02:27:31'),
	(3, 'V??ch', 'vach', '2021-02-10 02:28:38', '2021-02-10 02:28:38'),
	(4, 'C???u thang', 'cau-thang', '2021-02-10 20:26:04', '2021-02-10 20:26:04'),
	(5, 'Lan can', 'lan-can', '2021-02-10 20:26:21', '2021-02-10 20:26:21'),
	(6, 'Decor', 'decor', '2021-02-12 00:46:44', '2021-02-12 00:46:44');
/*!40000 ALTER TABLE `loai_san_pham` ENABLE KEYS */;

-- Dumping structure for table noi_that.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.migrations: ~18 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_02_07_145357_website', 1),
	(5, '2021_02_07_145929_role', 1),
	(6, '2021_02_07_150008_loaisanpham', 1),
	(7, '2021_02_07_150019_sanpham', 1),
	(8, '2021_02_07_150520_address', 1),
	(9, '2021_02_07_151610_khachhang', 1),
	(10, '2021_02_07_151619_dathang', 1),
	(11, '2021_02_07_151633_chitiet', 1),
	(12, '2021_02_09_110927_kh_lienhe', 1),
	(13, '2021_02_09_110939_tt_lienhe', 1),
	(14, '2021_02_09_112754_decor', 1),
	(15, '2021_02_09_112831_chinh_sach', 1),
	(16, '2021_02_09_113225_gioithieu', 1),
	(17, '2021_02_09_114536_hotline', 1),
	(18, '2021_02_17_215407_danh_sach_kh_lh', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table noi_that.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table noi_that.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.role: ~3 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', NULL, NULL),
	(2, 'Qu???n l??', NULL, NULL),
	(3, 'Nh??n vi??n', NULL, NULL);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table noi_that.san_pham
CREATE TABLE IF NOT EXISTS `san_pham` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `loai_san_pham_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` text COLLATE utf8mb4_unicode_ci,
  `hien_thi` tinyint(1) DEFAULT '1',
  `mo_ta` longtext COLLATE utf8mb4_unicode_ci,
  `da_ban` bigint(20) DEFAULT '0',
  `gia` double(20,2) NOT NULL DEFAULT '0.00',
  `giam_gia` double(20,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.san_pham: ~11 rows (approximately)
/*!40000 ALTER TABLE `san_pham` DISABLE KEYS */;
INSERT INTO `san_pham` (`id`, `loai_san_pham_id`, `name`, `slug`, `hinh_anh`, `hien_thi`, `mo_ta`, `da_ban`, `gia`, `giam_gia`, `created_at`, `updated_at`) VALUES
	(1, 4, 'C???u thang - CT1', 'cau-thang-ct1', 'jQeDB_xoAei_product7.jpg', 1, '<p>??&acirc;y l&agrave; c???u thang ct1</p>', 0, 0.00, 0.00, NULL, '2021-02-15 00:42:43'),
	(2, 4, 'C???u thang - CT2', 'cau-thang-ct2', 'pVvnV_DVDrr_ct2.jpg', 1, '<p>??&acirc;y l&agrave; c???u thang ct2</p>', 0, 0.00, 0.00, NULL, '2022-05-14 20:01:57'),
	(5, 4, 'C???u thang - CT3', 'cau-thang-ct3', '5qtNX_IlMKJ_ct3.jpg', 1, '<p>1. TH&Ocirc;NG TIN CHI TI???T S???N PH???M:</p>\r\n\r\n<ul>\r\n	<li>M&atilde; s???n ph???m: SFD60</li>\r\n	<li>Ch???t li???u: Khung g??? t??? nhi&ecirc;n. Ch&acirc;n inox m??? v&agrave;ng. V??? gi??? da nappa. C&oacute; th??? k&ecirc; th&ecirc;m g???i ?????u ch??? t???a l??ng.</li>\r\n	<li>M&agrave;u s???c: Xem chi ti???t h&igrave;nh ???nh</li>\r\n	<li>Xu???t x???: Nh???p kh???u&nbsp;</li>\r\n	<li>V???n chuy???n: To&agrave;n qu???c</li>\r\n	<li>Gi&aacute; th&agrave;nh k&egrave;m ch???t li???u da c???a&nbsp;s???n ph???m:&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>Gi??? da:</strong></p>\r\n\r\n<p>Gh??? 1 - 115*93*93:&nbsp;<strong>10.500.000</strong></p>\r\n\r\n<p>Gh??? 2 - 162*93*93:&nbsp;<strong>20.100.000</strong></p>\r\n\r\n<p>Gh??? 3 - 220*93*93:&nbsp;<strong>27.400.000</strong></p>\r\n\r\n<p>Gh??? 3 + gh??? ch??? L - 325*105*93:&nbsp;<strong>42.300.000</strong></p>\r\n\r\n<p>Gh??? 1 + 2 + 3:&nbsp;<strong>49.400.000</strong></p>', NULL, 0.00, 0.00, '2021-02-10 13:28:03', '2022-05-14 20:01:57'),
	(7, 4, 'C???u thang - CT4', 'cau-thang-ct4', 'nJZLq_JsI6K_product4.jpg', 1, NULL, NULL, 0.00, 0.00, '2021-02-10 13:30:20', '2022-05-14 20:01:57'),
	(8, 1, 'C???ng nh?? - CN1', 'cong-nha-cn1', 'WPh9I_yH8A6_product5.jpg', 1, '????ghjkljhgfdssa', NULL, 0.00, 0.00, '2021-02-10 13:31:34', '2022-05-14 20:01:58'),
	(11, 3, 'V??ch g??? xoan - VGX1', 'vach-go-xoan-vgx1', 'a2pSQ_z8tiN_product7.jpg', 1, NULL, NULL, 0.00, 0.00, '2021-02-10 13:31:51', '2022-05-14 20:01:59'),
	(16, 2, 'T?????ng nh?? 002', 'tuong-nha-002', 'G8b59_tHLQa_product6.jpg', 1, '<p>s&agrave;dgfsghg ??ere</p>\r\n\r\n<p>ewf</p>\r\n\r\n<p>ewf</p>\r\n\r\n<p>s</p>\r\n\r\n<p>f</p>\r\n\r\n<p>ds</p>\r\n\r\n<p>f</p>\r\n\r\n<p>??ef</p>\r\n\r\n<p>??</p>\r\n\r\n<p>&egrave;</p>\r\n\r\n<p>ew</p>\r\n\r\n<p>f</p>\r\n\r\n<p>??</p>\r\n\r\n<p>f</p>\r\n\r\n<p>??</p>\r\n\r\n<p>fw</p>\r\n\r\n<p>&egrave;</p>\r\n\r\n<p>??</p>\r\n\r\n<p>&egrave;</p>\r\n\r\n<p>ewf</p>\r\n\r\n<p>??e</p>\r\n\r\n<ol>\r\n	<li>frg???grg??egr???gergergerger</li>\r\n	<li>g???gerg</li>\r\n</ol>\r\n\r\n<p>???</p>\r\n\r\n<p>g</p>\r\n\r\n<p>???gergerg</p>\r\n\r\n<p>&nbsp;</p>', NULL, 0.00, 0.00, '2021-02-10 14:07:32', '2022-05-14 20:01:59'),
	(17, 4, 'C???u thang - CT5', 'cau-thang-ct5', 'yn5s1_Z3vrm_ct4.jpg', 1, '<p>M&ocirc; t??? s???n ph???m...</p>\r\n\r\n<p>&nbsp;</p>', NULL, 0.00, 0.00, '2021-02-12 00:14:21', '2022-05-14 20:02:00'),
	(23, 1, 'C???ng ?????ng - CD1', 'cong-dong-cd1', 'KlQYC_GXLF5_cong dong.jpg', 1, '<p>M&ocirc; t??? s???n ph???m...</p>', NULL, 0.00, 0.00, '2021-02-15 00:39:33', '2022-05-14 20:02:00'),
	(24, 1, 'C???ng ?????ng - CD2', 'cong-dong-cd2', 'ypWZx_wPnB5_cong dong 2.jpg', 1, '<p>M&ocirc; t??? s???n ph???m...</p>', NULL, 0.00, 0.00, '2021-02-15 00:41:26', '2022-05-14 20:02:01'),
	(25, 1, 'C???ng ?????ng - CD3', 'cong-dong-cd3', 'WSRhd_A4NkF_congdong3.png', 1, '<p>M&ocirc; t??? s???n ph???m...</p>', 6, 1000000.00, 1000000000.00, '2021-02-15 00:42:14', '2022-05-15 13:22:02');
/*!40000 ALTER TABLE `san_pham` ENABLE KEYS */;

-- Dumping structure for table noi_that.tt_lien_he
CREATE TABLE IF NOT EXISTS `tt_lien_he` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci,
  `maps` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.tt_lien_he: ~0 rows (approximately)
/*!40000 ALTER TABLE `tt_lien_he` DISABLE KEYS */;
INSERT INTO `tt_lien_he` (`id`, `content`, `maps`, `created_at`, `updated_at`) VALUES
	(1, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tt_lien_he` ENABLE KEYS */;

-- Dumping structure for table noi_that.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_nv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_ma_nv_unique` (`ma_nv`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `ma_nv`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin', '$2y$10$xn.gYdvbdh.JJ9CC544JvOHpJyI05L7URv8F7bRuycXlVNTiOo666', 'admin', 1, 'Qf3qjWk62VKZ6byzUgL0u9PqB8wCbCO4M4oju2gYKakWa22zy3FS5dKVDmr8', NULL, '2021-02-17 23:20:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table noi_that.website
CREATE TABLE IF NOT EXISTS `website` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_cong_ty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_chi` text COLLATE utf8mb4_unicode_ci,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `hotline` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `banner` text COLLATE utf8mb4_unicode_ci,
  `slide` text COLLATE utf8mb4_unicode_ci,
  `social_facebook` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table noi_that.website: ~0 rows (approximately)
/*!40000 ALTER TABLE `website` DISABLE KEYS */;
INSERT INTO `website` (`id`, `name_website`, `ten_cong_ty`, `dia_chi`, `logo`, `hotline`, `email`, `banner`, `slide`, `social_facebook`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'https://inoxnhadep.com', 'Inox Nh?? ?????p', NULL, 'r4gul_BjAOz_logo.png', NULL, NULL, '', 'slide1.jpg', NULL, NULL, NULL, '2021-02-17 23:33:06');
/*!40000 ALTER TABLE `website` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
