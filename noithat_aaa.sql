-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 17, 2021 lúc 05:33 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `noithat`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dia_chi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotline_add` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chinh_sach`
--

CREATE TABLE `chinh_sach` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hien_thi` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chinh_sach`
--

INSERT INTO `chinh_sach` (`id`, `title`, `slug`, `content`, `hien_thi`, `created_at`, `updated_at`) VALUES
(3, 'Chính sách bán hàng', 'chinh-sach-ban-hang', NULL, 1, '2021-02-17 07:03:03', '2021-02-17 15:53:42'),
(4, 'Chính sách bảo hành', 'chinh-sach-bao-hanh', NULL, 1, '2021-02-17 07:03:11', '2021-02-17 07:03:11'),
(5, 'Phương thức vận chuyển', 'phuong-thuc-van-chuyen', NULL, 1, '2021-02-17 07:03:17', '2021-02-17 07:03:17'),
(6, 'Phương thức thanh toán', 'phuong-thuc-thanh-toan', NULL, 1, '2021-02-17 07:03:23', '2021-02-17 07:03:23'),
(7, 'Chính sách đổi trả', 'chinh-sach-doi-tra', NULL, 1, '2021-02-17 07:03:29', '2021-02-17 07:03:29'),
(8, 'Chính sách bảo mật', 'chinh-sach-bao-mat', '', 1, '2021-02-17 07:03:37', '2021-02-17 07:03:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet`
--

CREATE TABLE `chi_tiet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dat_hang_id` bigint(20) UNSIGNED NOT NULL,
  `san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_sach_kh_lh`
--

CREATE TABLE `danh_sach_kh_lh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sanpham_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dat_hang`
--

CREATE TABLE `dat_hang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `khach_hang_id` bigint(20) UNSIGNED NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `decor`
--

CREATE TABLE `decor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL ,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hien_thi` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `decor`
--

INSERT INTO `decor` (`id`, `title`, `slug`, `content`, `hien_thi`, `created_at`, `updated_at`) VALUES
(1, 'Decor', 'decor', 'Không có thông tin!', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gioi_thieu`
--

CREATE TABLE `gioi_thieu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `index_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gioi_thieu`
--

INSERT INTO `gioi_thieu` (`id`, `index_content`, `content`, `created_at`, `updated_at`) VALUES
(1, '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hotline`
--

CREATE TABLE `hotline` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotline` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `official_hotline` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kh_lien_he`
--

CREATE TABLE `kh_lien_he` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_san_pham`
--

CREATE TABLE `loai_san_pham` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Cổng', 'cong', '2021-02-09 19:27:27', '2021-02-10 07:12:34'),
(2, 'Tường', 'tuong', '2021-02-09 19:27:31', '2021-02-09 19:27:31'),
(3, 'Vách', 'vach', '2021-02-09 19:28:38', '2021-02-09 19:28:38'),
(4, 'Cầu thang', 'cau-thang', '2021-02-10 13:26:04', '2021-02-10 13:26:04'),
(5, 'Lan can', 'lan-can', '2021-02-10 13:26:21', '2021-02-10 13:26:21'),
(6, 'Decor', 'decor', '2021-02-11 17:46:44', '2021-02-11 17:46:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Quản lý', NULL, NULL),
(3, 'Nhân viên', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loai_san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hien_thi` tinyint(1) DEFAULT 1,
  `mo_ta` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `da_ban` bigint(20) DEFAULT 0,
  `gia` double(20,2) NOT NULL DEFAULT 0.00,
  `giam_gia` double(20,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `loai_san_pham_id`, `name`, `slug`, `hinh_anh`, `hien_thi`, `mo_ta`, `da_ban`, `gia`, `giam_gia`, `created_at`, `updated_at`) VALUES
(1, 4, 'Cầu thang - CT1', 'cau-thang-ct1', 'jQeDB_xoAei_product7.jpg', 1, '<p>Đ&acirc;y l&agrave; cầu thang ct1</p>', 0, 0.00, 0.00, NULL, '2021-02-14 17:42:43'),
(2, 4, 'Cầu thang - CT2', 'cau-thang-ct2', 'pVvnV_DVDrr_ct2.jpg', 1, '<p>Đ&acirc;y l&agrave; cầu thang ct2</p>', 0, 0.00, 0.00, NULL, '2021-02-14 17:44:29'),
(5, 4, 'Cầu thang - CT3', 'cau-thang-ct3', '5qtNX_IlMKJ_ct3.jpg', 1, '<p>1. TH&Ocirc;NG TIN CHI TIẾT SẢN PHẨM:</p>\r\n\r\n<ul>\r\n	<li>M&atilde; sản phẩm: SFD60</li>\r\n	<li>Chất liệu: Khung gỗ tự nhi&ecirc;n. Ch&acirc;n inox mạ v&agrave;ng. Vỏ giả da nappa. C&oacute; thể k&ecirc; th&ecirc;m gối đầu chỗ tựa lưng.</li>\r\n	<li>M&agrave;u sắc: Xem chi tiết h&igrave;nh ảnh</li>\r\n	<li>Xuất xứ: Nhập khẩu&nbsp;</li>\r\n	<li>Vận chuyển: To&agrave;n quốc</li>\r\n	<li>Gi&aacute; th&agrave;nh k&egrave;m chất liệu da của&nbsp;sản phẩm:&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>Giả da:</strong></p>\r\n\r\n<p>Ghế 1 - 115*93*93:&nbsp;<strong>10.500.000</strong></p>\r\n\r\n<p>Ghế 2 - 162*93*93:&nbsp;<strong>20.100.000</strong></p>\r\n\r\n<p>Ghế 3 - 220*93*93:&nbsp;<strong>27.400.000</strong></p>\r\n\r\n<p>Ghế 3 + ghế chữ L - 325*105*93:&nbsp;<strong>42.300.000</strong></p>\r\n\r\n<p>Ghế 1 + 2 + 3:&nbsp;<strong>49.400.000</strong></p>', NULL, 0.00, 0.00, '2021-02-10 06:28:03', '2021-02-14 17:44:58'),
(7, 4, 'Cầu thang - CT4', 'cau-thang-ct4', 'nJZLq_JsI6K_product4.jpg', 1, NULL, NULL, 0.00, 0.00, '2021-02-10 06:30:20', '2021-02-14 17:45:17'),
(8, 1, 'Cổng nhà - CN1', 'cong-nha-cn1', 'WPh9I_yH8A6_product5.jpg', 1, 'đághjkljhgfdssa', NULL, 0.00, 0.00, '2021-02-10 06:31:34', '2021-02-14 17:45:35'),
(11, 3, 'Vách gỗ xoan - VGX1', 'vach-go-xoan-vgx1', 'a2pSQ_z8tiN_product7.jpg', 1, NULL, NULL, 0.00, 0.00, '2021-02-10 06:31:51', '2021-02-14 17:46:00'),
(16, 2, 'Tường nhà 002', 'tuong-nha-002', 'G8b59_tHLQa_product6.jpg', 1, '<p>s&agrave;dgfsghg ăere</p>\r\n\r\n<p>ewf</p>\r\n\r\n<p>ewf</p>\r\n\r\n<p>s</p>\r\n\r\n<p>f</p>\r\n\r\n<p>ds</p>\r\n\r\n<p>f</p>\r\n\r\n<p>ưef</p>\r\n\r\n<p>ư</p>\r\n\r\n<p>&egrave;</p>\r\n\r\n<p>ew</p>\r\n\r\n<p>f</p>\r\n\r\n<p>ư</p>\r\n\r\n<p>f</p>\r\n\r\n<p>ư</p>\r\n\r\n<p>fw</p>\r\n\r\n<p>&egrave;</p>\r\n\r\n<p>ư</p>\r\n\r\n<p>&egrave;</p>\r\n\r\n<p>ewf</p>\r\n\r\n<p>ưe</p>\r\n\r\n<ol>\r\n	<li>frgẻgrgưegrẻgergergerger</li>\r\n	<li>gẻgerg</li>\r\n</ol>\r\n\r\n<p>ẻ</p>\r\n\r\n<p>g</p>\r\n\r\n<p>ẻgergerg</p>\r\n\r\n<p>&nbsp;</p>', NULL, 0.00, 0.00, '2021-02-10 07:07:32', '2021-02-14 16:51:00'),
(17, 4, 'Cầu thang - CT5', 'cau-thang-ct5', 'yn5s1_Z3vrm_ct4.jpg', 1, '<p>M&ocirc; tả sản phẩm...</p>\r\n\r\n<p>&nbsp;</p>', NULL, 0.00, 0.00, '2021-02-11 17:14:21', '2021-02-14 17:46:29'),
(23, 1, 'Cổng Đồng - CD1', 'cong-dong-cd1', 'KlQYC_GXLF5_cong dong.jpg', 1, '<p>M&ocirc; tả sản phẩm...</p>', NULL, 0.00, 0.00, '2021-02-14 17:39:33', '2021-02-14 17:42:34'),
(24, 1, 'Cổng Đồng - CD2', 'cong-dong-cd2', 'ypWZx_wPnB5_cong dong 2.jpg', 1, '<p>M&ocirc; tả sản phẩm...</p>', NULL, 0.00, 0.00, '2021-02-14 17:41:26', '2021-02-14 17:42:25'),
(25, 1, 'Cổng Đồng - CD3', 'cong-dong-cd3', 'WSRhd_A4NkF_congdong3.png', 1, '<p>M&ocirc; tả sản phẩm...</p>', NULL, 0.00, 0.00, '2021-02-14 17:42:14', '2021-02-17 16:04:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tt_lien_he`
--

CREATE TABLE `tt_lien_he` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maps` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tt_lien_he`
--

INSERT INTO `tt_lien_he` (`id`, `content`, `maps`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_nv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `ma_nv`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$xn.gYdvbdh.JJ9CC544JvOHpJyI05L7URv8F7bRuycXlVNTiOo666', 'admin', 1, 'BVIGsBqp4E7Wo8BhUx6kmz26396Dm1nngXbu9Jb53RZ5zDdqHGRGZKhqzCin', NULL, '2021-02-17 16:20:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `website`
--

CREATE TABLE `website` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_cong_ty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_chi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotline` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_facebook` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `website`
--

INSERT INTO `website` (`id`, `name_website`, `ten_cong_ty`, `dia_chi`, `logo`, `hotline`, `email`, `banner`, `slide`, `social_facebook`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'https://inoxnhadep.com', 'Inox Nhà Đẹp', NULL, 'r4gul_BjAOz_logo.png', NULL, NULL, '', 'slide1.jpg', NULL, NULL, NULL, '2021-02-17 16:33:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chinh_sach`
--
ALTER TABLE `chinh_sach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chi_tiet`
--
ALTER TABLE `chi_tiet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danh_sach_kh_lh`
--
ALTER TABLE `danh_sach_kh_lh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dat_hang`
--
ALTER TABLE `dat_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `decor`
--
ALTER TABLE `decor`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gioi_thieu`
--
ALTER TABLE `gioi_thieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hotline`
--
ALTER TABLE `hotline`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khach_hang_email_unique` (`email`),
  ADD UNIQUE KEY `khach_hang_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `khach_hang_address_unique` (`address`);

--
-- Chỉ mục cho bảng `kh_lien_he`
--
ALTER TABLE `kh_lien_he`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tt_lien_he`
--
ALTER TABLE `tt_lien_he`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_ma_nv_unique` (`ma_nv`);

--
-- Chỉ mục cho bảng `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `chinh_sach`
--
ALTER TABLE `chinh_sach`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `chi_tiet`
--
ALTER TABLE `chi_tiet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danh_sach_kh_lh`
--
ALTER TABLE `danh_sach_kh_lh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `dat_hang`
--
ALTER TABLE `dat_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `decor`
--
ALTER TABLE `decor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gioi_thieu`
--
ALTER TABLE `gioi_thieu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hotline`
--
ALTER TABLE `hotline`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `kh_lien_he`
--
ALTER TABLE `kh_lien_he`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tt_lien_he`
--
ALTER TABLE `tt_lien_he`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `website`
--
ALTER TABLE `website`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
