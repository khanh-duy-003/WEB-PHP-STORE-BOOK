-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2024 lúc 04:11 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fashion_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã Slider',
  `name` varchar(1000) NOT NULL COMMENT 'Tên Slider',
  `link` varchar(1000) NOT NULL COMMENT 'Liên kết',
  `position` varchar(100) NOT NULL COMMENT 'Vị trí',
  `image` varchar(1000) NOT NULL COMMENT 'Hình ảnh',
  `sort_order` int(10) UNSIGNED NOT NULL COMMENT 'Thứ tự',
  `created_at` datetime NOT NULL COMMENT 'Ngày tạo',
  `created_by` tinyint(3) UNSIGNED NOT NULL COMMENT 'Người tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày sửa',
  `updated_by` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Người sửa',
  `status` tinyint(3) UNSIGNED DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `name`, `link`, `position`, `image`, `sort_order`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Khuyễn mãi hè 2020', 'http://domain.com/index.php?option=page&cat=khuyen-mai-he', 'slideshow', 'slide12.png', 0, '2020-07-01 07:12:13', 1, '2024-01-26 00:14:43', 8, 1),
(2, 'Khuyễn mãi mùa khai giảng', 'http://domain.com/index.php?option=page&cat=khuyen-mai-mua-khai-giang', 'slideshow', 'slide14.jpg', 2, '2020-07-01 07:12:13', 1, '2022-09-03 09:07:08', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL COMMENT 'Mã Loại',
  `name` varchar(255) NOT NULL COMMENT 'Tên loại SP',
  `slug` varchar(255) NOT NULL COMMENT 'SLug Loại SP',
  `sort_order` int(11) NOT NULL COMMENT 'Thứ tự',
  `image` varchar(255) DEFAULT '' COMMENT 'Hình đại diện',
  `description` varchar(255) NOT NULL COMMENT 'Từ khóa SEO',
  `created_at` datetime NOT NULL COMMENT 'Ngày tạo',
  `created_by` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Người tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày sửa',
  `updated_by` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Người sửa',
  `status` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `slug`, `sort_order`, `image`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Việt Nam', 'viet-nam', 0, '1.png', 'Từ khóa SEO', '2020-07-03 16:06:19', 1, '2022-11-19 14:54:25', 1, 1),
(2, 'Hàn Quốc', 'han-quoc', 0, '3.png', 'Từ khóa SEO', '2020-07-03 16:06:19', 1, '2022-11-19 14:54:31', 1, 1),
(3, 'Thái Lan', 'thai-lan', 0, '2.jpg', 'Từ khóa SEO', '2020-07-03 16:06:19', 1, '2022-11-19 14:54:36', 1, 1),
(4, 'Nhật Bản', 'nhat-ban', 0, '4.png', 'Từ khóa SEO', '2020-07-03 16:06:19', 1, '2022-11-19 14:54:44', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL COMMENT 'Mã Loại',
  `name` varchar(1000) NOT NULL COMMENT 'Tên loại SP',
  `slug` varchar(1000) NOT NULL COMMENT 'SLug Loại SP',
  `parent_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Mã cấp cha',
  `sort_order` int(11) NOT NULL COMMENT 'Thứ tự',
  `image` varchar(1000) DEFAULT NULL COMMENT 'Hình đại diện',
  `description` varchar(255) NOT NULL COMMENT 'Từ khóa SEO',
  `created_at` datetime NOT NULL COMMENT 'Ngày tạo',
  `created_by` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Người tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày sửa',
  `updated_by` tinyint(4) DEFAULT NULL COMMENT 'Người sửa',
  `status` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `parent_id`, `sort_order`, `image`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'THỜI TRANG NAM', 'thoi-trang-nam', 0, 0, 'ttn.png', 'Thời trang nam', '2022-11-22 18:17:31', 1, '2022-11-22 18:17:31', 0, 1),
(2, 'THỜI TRANG NỮ', 'thoi-trang-nu', 0, 0, 'ttnu.png', 'Thời trang nữ', '2022-11-22 18:18:00', 1, '2022-11-22 18:18:00', 0, 1),
(4, 'Áo sơ mi nam', 'ao-so-mi-nam', 1, 0, 'aa4.jpg', 'Áo sơ mi nam', '2022-11-22 18:18:53', 1, '2022-11-22 18:18:53', 0, 1),
(5, 'Quần short nam', 'quan-short-nam', 1, 0, 's3.jpg', 'Quần short nam', '2022-11-22 18:19:32', 1, '2022-11-22 18:19:32', 0, 1),
(6, 'Quần dài nam', 'quan-dai-nam', 1, 0, 'gin1.jpg', 'Quần dài nam', '2022-11-22 18:19:57', 1, '2022-11-22 18:19:57', 0, 1),
(8, 'Áo sơ mi nữ', 'ao-so-mi-nu', 2, 0, 'sm1.jpg', 'Áo sơ mi nữ', '2022-11-22 18:21:43', 1, '2022-11-22 18:21:43', 0, 1),
(10, 'Quần short nữ', 'quan-short-nu', 2, 0, 'sn3.jpg', 'Quần short nữ', '2022-11-22 18:22:14', 1, '2022-11-22 18:22:14', 0, 1),
(11, 'Quần dài nữ', 'quan-dai-nu', 2, 0, 'qq1.jpg', 'Quần dài nữ', '2022-11-22 18:22:48', 1, '2022-11-22 18:22:48', 0, 1),
(12, 'Chân váy', 'chan-vay', 2, 0, 'nu1.2.jpg', 'Chân váy', '2022-11-22 18:23:07', 1, '2022-11-22 18:23:07', 0, 1),
(16, 'Áo polo nam', 'ao-polo-nam', 1, 0, 'p7.jpg', 'Áo polo nam', '2022-11-22 18:18:27', 1, '2022-11-22 18:18:27', 0, 1),
(17, 'Áo thun nữ', 'ao-thun-nu', 2, 0, 'n3.1.jpg', 'Áo thun nữ', '2022-11-22 18:18:27', 1, '2022-11-22 18:18:27', 0, 1),
(18, 'Áo khoác nam', 'ao-khoac-nam', 1, 0, 'khoac1.jpg', 'Áo khoác nam', '2022-11-22 18:21:27', 1, '2022-11-22 18:21:27', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `replay_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `user_id`, `email`, `phone`, `title`, `content`, `replay_id`, `created_at`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Khách hàng', NULL, 'an2121110226@gmail.com', '342264038', 'aaa', 'aaa', NULL, '2024-01-22 15:35:59', '2024-01-22 15:40:55', NULL, 1),
(2, 'nguyễn Thành An', NULL, 'an0529477@gmail.com', '342264038', 'Đẹp', 'đẹp', NULL, '2024-01-22 15:45:22', '2024-01-26 08:09:26', 1, 1),
(9, 'nguyễn Thành An', NULL, 'an0529477@gmail.com', '342264038', 'Sản phẩm quá rộng, xin được hỗ trợ', 'sp đẹp', NULL, '2024-01-26 08:47:33', '2024-01-26 08:47:33', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL COMMENT 'Mã Menu',
  `name` varchar(255) NOT NULL COMMENT 'Tên Menu',
  `link` varchar(255) NOT NULL COMMENT 'Liên kết',
  `type` varchar(50) NOT NULL COMMENT 'Kiểu Menu',
  `table_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Mã trong bảng',
  `sort_order` int(11) NOT NULL DEFAULT 0 COMMENT 'Thứ tự',
  `position` varchar(255) NOT NULL COMMENT 'Vị trí',
  `level` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL COMMENT 'Mã cấp cha',
  `created_at` datetime NOT NULL COMMENT 'Ngày Tạo',
  `created_by` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày sửa',
  `updated_by` tinyint(4) DEFAULT NULL COMMENT 'Người sửa',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `type`, `table_id`, `sort_order`, `position`, `level`, `parent_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'TRANG CHỦ', 'index.php', 'custom', 1, 0, 'mainmenu', 0, 0, '2022-11-22 19:36:05', 1, '2024-01-25 23:11:11', 8, 1),
(2, 'GIỚI THIỆU', 'index.php?opt=page&cat=gioi-thieu', 'page', 39, 4, 'mainmenu', 1, 0, '2022-11-22 20:13:46', 1, '2022-11-22 20:18:22', 1, 1),
(4, 'CHÂN VÁY', 'index.php?opt=product&cat=chan-vay', 'category', 12, 8, 'mainmenu', 2, 14, '2022-11-22 20:14:09', 1, '2022-11-22 20:18:22', 1, 1),
(5, 'QUẦN DÀI', 'index.php?opt=product&cat=quan-dai-nu', 'category', 11, 7, 'mainmenu', 2, 14, '2022-11-22 20:14:09', 1, '2022-11-22 20:18:22', 1, 1),
(6, 'QUẦN SHORT', 'index.php?opt=product&cat=quan-short-nu', 'category', 10, 6, 'mainmenu', 2, 14, '2022-11-22 20:14:09', 1, '2022-11-22 20:18:22', 1, 1),
(8, 'ÁO SƠ MI', 'index.php?opt=product&cat=ao-so-mi-nu', 'category', 8, 4, 'mainmenu', 2, 14, '2022-11-22 20:14:09', 1, '2022-11-22 20:18:22', 1, 1),
(9, 'ÁO THUN', 'index.php?opt=product&cat=ao-thun-nu', 'category', 7, 3, 'mainmenu', 2, 14, '2022-11-22 20:14:09', 1, '2022-11-22 20:18:22', 1, 1),
(10, 'QUẦN DÀI', 'index.php?opt=product&cat=quan-dai-nam', 'category', 6, 13, 'mainmenu', 2, 15, '2022-11-22 20:14:09', 1, '2022-11-22 20:19:04', 1, 1),
(11, 'QUẦN SHORT', 'index.php?opt=product&cat=quan-short-nam', 'category', 5, 12, 'mainmenu', 2, 15, '2022-11-22 20:14:09', 1, '2022-11-22 20:19:04', 1, 1),
(12, 'ÁO SƠ MI', 'index.php?opt=product&cat=ao-so-mi-nam', 'category', 4, 11, 'mainmenu', 2, 15, '2022-11-22 20:14:09', 1, '2022-11-22 20:19:04', 1, 1),
(13, 'ÁO KHOÁC', 'index.php?opt=product&cat=ao-khoac-nam', 'category', 3, 10, 'mainmenu', 2, 15, '2022-11-22 20:14:09', 1, '2022-11-22 20:19:04', 1, 1),
(14, 'ĐỒ NỮ', 'index.php?opt=product&cat=do-nu', 'category', 2, 3, 'mainmenu', 1, 0, '2022-11-22 20:14:09', 1, '2022-11-22 20:19:41', 1, 1),
(15, 'ĐỒ NAM', 'index.php?opt=product&cat=do-nam', 'category', 1, 2, 'mainmenu', 1, 0, '2022-11-22 20:14:09', 1, '2022-11-22 20:19:41', 1, 1),
(16, 'Giới thiệu', 'index.php?opt=page&cat=gioi-thieu', 'page', 39, 1, 'footermenu', 1, 0, '2022-11-22 20:55:36', 1, '2022-11-30 09:31:59', 1, 0),
(17, 'Chính Sách Hoàn Tiền', 'index.php?opt=page&cat=chinh-sach-hoan-tien', 'page', 38, 1, 'footermenu', 1, 0, '2022-11-22 20:55:36', 1, '2022-11-22 20:55:42', 1, 1),
(18, 'Chính sách bảo hành', 'index.php?opt=page&cat=chinh-sach-bao-hanh', 'page', 37, 2, 'footermenu', 1, 0, '2022-11-22 20:55:36', 1, '2023-08-01 13:17:16', 1, 1),
(19, 'Chính sách đổi hàng', 'index.php?opt=page&cat=chinh-sach-doi-hang', 'page', 36, 2, 'footermenu', 1, 0, '2022-11-22 20:55:36', 1, '2023-08-01 13:17:16', 1, 1),
(20, 'Quần dài nữ', 'index.php?opt=product&cat=quan-dai-nu', 'category', 11, 2, 'mainmenu', 1, 0, '2023-08-01 13:16:31', 1, '2023-08-01 13:17:16', 1, 2),
(21, 'Quần short nữ', 'index.php?opt=product&cat=quan-short-nu', 'category', 10, 1, 'mainmenu', 1, 0, '2023-08-01 13:16:31', 1, '2023-08-01 13:16:31', 1, 2),
(22, 'Áo kiểu', 'index.php?opt=product&cat=ao-kieu', 'category', 9, 1, 'mainmenu', 1, 0, '2023-08-01 13:16:31', 1, '2023-08-01 13:16:31', 1, 2),
(23, 'Áo sơ mi nữ', 'index.php?opt=product&cat=ao-so-mi-nu', 'category', 8, 1, 'mainmenu', 1, 0, '2023-08-01 13:16:31', 1, '2023-08-01 13:16:31', 1, 2),
(24, 'Áo thun nữ', 'index.php?opt=product&cat=ao-thun-nu', 'category', 7, 1, 'mainmenu', 1, 0, '2023-08-01 13:16:31', 1, '2023-08-01 13:16:31', 1, 2),
(27, 'Áo sơ mi nữ', 'index.php?opt=product&cat=ao-so-mi-nu', 'category', 8, 1, 'mainmenu', 1, 0, '2023-08-17 19:53:49', 1, '2023-08-17 19:53:49', 1, 2),
(28, 'Áo thun nữ', 'index.php?opt=product&cat=ao-thun-nu', 'category', 7, 1, 'mainmenu', 1, 0, '2023-08-17 19:53:49', 1, '2023-08-17 19:53:49', 1, 2),
(29, 'Chính sách vận chuyển', 'index.php?opt=page&cat=chinh-sach-van-chuyen', 'page', 36, 2, 'footermenu', 1, 0, '2022-11-22 20:55:36', 1, '2023-08-01 13:17:16', 1, 1),
(30, 'BÀI VIẾT', 'index.php?opt=post', 'page', 39, 4, 'mainmenu', 1, 0, '2022-11-22 20:13:46', 1, '2022-11-22 20:18:22', 1, 1),
(31, 'TIN TỨC', 'index.php?opt=post&cat=tin-tuc', 'post', 36, 5, 'mainmenu', 1, 0, '2022-11-22 20:55:36', 1, '2023-08-01 13:17:16', 1, 1),
(32, 'Dịch vụ', 'index.php?opt=post&cat=dich-vu', 'custom', 36, 2, 'footermenu1', 1, 0, '2022-11-22 20:55:36', 1, '2023-08-01 13:17:16', 1, 1),
(33, 'ÁO POLO', 'index.php?opt=product&cat=ao-polo-nam', 'category', 14, 10, 'mainmenu', 2, 15, '2022-11-22 20:14:09', 1, '2022-11-22 20:19:04', 1, 1),
(35, 'LIÊN HỆ', 'index.php?opt=contact', 'contact', 36, 5, 'mainmenu', 1, 0, '2022-11-22 20:55:36', 1, '2023-08-01 13:17:16', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã đơn hàng',
  `user_id` int(11) NOT NULL COMMENT 'Mã khách hàng',
  `exportdate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày xuất',
  `deliveryaddress` varchar(255) NOT NULL COMMENT 'Địa chỉ người nhận',
  `deliveryname` varchar(100) NOT NULL COMMENT 'Tên người nhận',
  `deliveryphone` varchar(120) NOT NULL COMMENT 'Điện thoại người nhận',
  `deliveryemail` varchar(120) NOT NULL COMMENT 'Email ngươig nhận',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật',
  `updated_by` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Người cập nhật',
  `status` tinyint(3) UNSIGNED NOT NULL COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `user_id`, `exportdate`, `deliveryaddress`, `deliveryname`, `deliveryphone`, `deliveryemail`, `created_at`, `updated_at`, `updated_by`, `status`) VALUES
(107, 1, '2024-04-07 14:43:02', 'công thương', 'Ngô Sĩ Hòa', '0812823801', 'ngosihoaa2@gmail.com', '2024-04-07 09:43:02', NULL, NULL, 1),
(108, 1, '2024-07-29 11:48:04', '', '', '', '', '2024-07-29 06:48:04', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã CT Đơn hàng',
  `order_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã đơn hàng',
  `product_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã sản phẩm',
  `price` float(12,2) NOT NULL COMMENT 'Giá sản phẩm',
  `qty` int(10) UNSIGNED NOT NULL COMMENT 'Số lượng',
  `amount` float(12,2) NOT NULL COMMENT 'Thành tiền'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `order_id`, `product_id`, `price`, `qty`, `amount`) VALUES
(107, 1, 19, 378000.00, 1, 378000.00),
(108, 1, 19, 378000.00, 8, 3024000.00),
(109, 1, 20, 799000.00, 1, 799000.00),
(110, 1, 19, 378000.00, 8, 3024000.00),
(111, 1, 20, 799000.00, 3, 2397000.00),
(112, 1, 19, 378000.00, 8, 3024000.00),
(113, 1, 20, 799000.00, 6, 4794000.00),
(114, 1, 20, 799000.00, 3, 2397000.00),
(115, 1, 37, 199000.00, 1, 199000.00),
(116, 1, 20, 799000.00, 1, 799000.00),
(117, 1, 16, 19900.00, 1, 19900.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã bài viết',
  `topic_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Mã chủ đề',
  `title` varchar(1000) NOT NULL COMMENT 'Tiêu đề bài viết',
  `slug` varchar(1000) NOT NULL COMMENT 'Slug tiêu đề',
  `detail` longtext NOT NULL COMMENT 'Chi tiết bài viết',
  `image` varchar(1000) NOT NULL COMMENT 'Hình ảnh',
  `type` varchar(10) NOT NULL DEFAULT 'post' COMMENT 'Kiểu bài viết',
  `metakey` varchar(255) NOT NULL COMMENT 'Từ khóa SEO',
  `metadesc` varchar(255) NOT NULL COMMENT 'Mô tả SEO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(4) NOT NULL COMMENT 'Người tạo',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Ngày sửa',
  `updated_by` tinyint(4) NOT NULL COMMENT 'Người sửa',
  `status` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `topic_id`, `title`, `slug`, `detail`, `image`, `type`, `metakey`, `metadesc`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(33, 1, 'GRAND OPENING TOTODAY CẦN THƠ', 'grand-opening-totoday-can-tho', '<p>Ngo&agrave;i kh&ocirc;ng gian sang trọng v&agrave; trẻ trung với nhiều g&oacute;c xinh lung linh cho FRIENDs thoải m&aacute;i &ldquo;sống ảo&rdquo;, TOTODAY Cần Thơ c&ograve;n mang đến thật nhiều thiết kế s&agrave;nh điệu v&agrave; c&aacute; t&iacute;nh nh&acirc;n dịp khai trương n&agrave;y.&nbsp;</p>\n\n<p>Hơn nữa, dịp khai trương n&agrave;y c&ograve;n hứa hẹn sẽ &ldquo;đốn tim&rdquo; c&aacute;c t&iacute;n đồ thời trang tại Cần Thơ bằng những ưu đ&atilde;i b&ugrave;ng nổ chưa từng c&oacute;:</p>\n\n<p><strong>Chương tr&igrave;nh 1: Opening</strong></p>\n\n<p><strong>Duy nhất từ 19h, ng&agrave;y 14/11/2022:</strong></p>\n\n<p>- Giảm 70% cho 10 FRIENDs đầu ti&ecirc;n đến cửa h&agrave;ng (&aacute;p dụng cho 1 sản phẩm).</p>\n\n<p>- Giảm 50% cho 15 FRIENDs đến cửa h&agrave;ng tiếp theo (&aacute;p dụng cho 1 sản phẩm).</p>\n\n<p>- Giảm 30% cho 20 FRIENDs đến cửa h&agrave;ng tiếp theo (&aacute;p dụng cho 1 sản phẩm).</p>\n\n<p>- Giảm 10% cho tất cả c&aacute;c FRIENDs c&ograve;n lại (&aacute;p dụng cho tất cả c&aacute;c sản phẩm).&nbsp;</p>\n\n<p><strong>Từ ng&agrave;y 15/11/2022 đến 16/11/2022:&nbsp;</strong>Giảm gi&aacute; 10% cho tất cả c&aacute;c sản phẩm.</p>\n\n<p><strong>Chương tr&igrave;nh 2: V&ograve;ng quay may mắn</strong></p>\n\n<p>Khi FRIENDs thực hiện like page&nbsp;<strong>TOTODAY + Comment + tag 3 người bạn v&agrave;o b&agrave;i viết ch&iacute;nh của chương tr&igrave;nh,</strong>&nbsp;FRIENDs sẽ được tham gia minigame &ldquo;V&ograve;ng quay may mắn&rdquo; với nhiều phần qu&agrave; hấp dẫn như sau:</p>\n\n<p>- &Aacute;o thun c&aacute; t&iacute;nh trị gi&aacute; 245k.&nbsp;</p>\n\n<p>- T&uacute;i tote thời trang Freestyle.</p>\n\n<p>- Sổ tay TOTODAY.</p>\n\n<p>- Voucher trị gi&aacute; 100k (&aacute;p dụng h&oacute;a đơn 500k cho lần mua h&agrave;ng tiếp theo).</p>\n\n<p>- Voucher trị gi&aacute; 50k (&aacute;p dụng h&oacute;a đơn 300k cho lần mua h&agrave;ng tiếp theo).</p>\n\n<p>- Giảm th&ecirc;m 50k cho h&oacute;a đơn bất k&igrave; (kh&ocirc;ng điều kiện).&nbsp;</p>\n\n<p><strong>Chương tr&igrave;nh 3: Tặng t&uacute;i tote &amp; m&oacute;c kh&oacute;a</strong></p>\n\n<p>- Khi mua sắm với h&oacute;a đơn từ 499.000đ, FRIENDs sẽ được tặng ngay 1 chiếc t&uacute;i tote thời trang Freestyle, thỏa sức mix&amp;match c&ugrave;ng nhiều phong c&aacute;ch (&aacute;p dụng sau chiết khấu).</p>\n\n<p>- Ngo&agrave;i ra, những chiếc m&oacute;c kh&oacute;a cực dễ thương đang chờ đợi chủ nh&acirc;n nữa đ&oacute; (&aacute;p dụng khi ph&aacute;t sinh h&oacute;a đơn trong thời gian diễn ra chương tr&igrave;nh).</p>\n\n<p><strong>Chương tr&igrave;nh 4:</strong></p>\n\n<p>- Giảm ngay 100k cho 1 sản phẩm nguy&ecirc;n gi&aacute; khi FRIENDs cầm tờ rơi GRAND OPENING CẦN THƠ 2&nbsp;đến cửa h&agrave;ng trong suốt thời gian diễn ra chương tr&igrave;nh.&nbsp;</p>\n\n<p><strong>Chương tr&igrave;nh 5: Voucher Lumos Cake &amp; Bread</strong></p>\n\n<p>- Giảm ngay 30% cho tất cả sản phẩm khi FRIENDs sử dụng voucher của tiệm b&aacute;nh Lumos Cake &amp; Bread trong suốt thời gian diễn ra chương tr&igrave;nh.</p>\n\n<p><em>Tất cả 5 chương tr&igrave;nh được&nbsp;&aacute;p dụng tại cửa h&agrave;ng 22 Nguy&ecirc;̃n Vi&ecirc;̣t H&ocirc;̀ng, Qu&acirc;̣n Ninh Ki&ecirc;̀u, TP. C&acirc;̀n Thơ&nbsp;từ ng&agrave;y 14/11/2022 đến hết 16/11/2022.&nbsp;</em></p>\n\n<p><strong>Điều kiện &aacute;p dụng:</strong></p>\n\n<p>- Kh&ocirc;ng &aacute;p dụng chung với chiết khấu VIP.</p>\n\n<p>- Kh&ocirc;ng &aacute;p dụng đồng thời với c&aacute;c chương tr&igrave;nh khuyến m&atilde;i kh&aacute;c.&nbsp;</p>\n\n<p>- FRIENDs được t&iacute;ch lũy điểm dựa tr&ecirc;n doanh số thanh to&aacute;n cuối c&ugrave;ng.</p>\n\n<p>- Kh&ocirc;ng &aacute;p dụng đổi trả đối với sản phẩm giảm gi&aacute;.</p>\n\n<p>-----------------------------</p>\n\n<p><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></p>\n', 'post-1.jpg', 'post', 'GRAND OPENING TOTODAY CẦN THƠ', 'GRAND OPENING TOTODAY CẦN THƠ', '2022-11-22 12:50:14', 1, '2022-11-22 12:56:09', 1, 1),
(34, 1, 'DEAL SHOCK THÁNG 11: CHỐT GỌN QUẦN JEAN ĐEN SIÊU HOT CHỈ VỚI 299K', 'deal-shock-thang-11-chot-gon-quan-jean-den-sieu-hot-chi-voi-299k', '<p>Với m&ocirc;̃i hóa đơn từ 300k mua tại website hoặc fanpage của TOTODAY, FRIENDs có ngay 01 ưu đãi mua HOT ITEM jean đen mã M1QJN04201FSFTR chỉ với 299k đ&ecirc;́n h&ecirc;́t tháng 11 này.</p>\r\n\r\n<p><strong>Điều kiện &aacute;p dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Chương tr&igrave;nh diễn ra đến hết th&aacute;ng 11.</li>\r\n	<li>Chương tr&igrave;nh chỉ &aacute;p dụng tại 02 k&ecirc;nh mua sắm online l&agrave; Website v&agrave; Fanpage ch&iacute;nh của TOTODAY.</li>\r\n	<li>FRIENDs được t&iacute;ch lũy điểm dựa tr&ecirc;n doanh số thanh to&aacute;n cuối c&ugrave;ng.</li>\r\n</ul>\r\n', 'post-1.jpg', 'post', 'DEAL SHOCK THÁNG 11: CHỐT GỌN QUẦN JEAN ĐEN SIÊU HOT CHỈ VỚI 299K', 'DEAL SHOCK THÁNG 11: CHỐT GỌN QUẦN JEAN ĐEN SIÊU HOT CHỈ VỚI 299K', '2022-11-22 13:01:25', 1, '2022-11-22 13:01:25', 1, 1),
(35, 1, 'KHAI TIỆC SINH NHẬT, BẬT TUNG BẤT NGỜ', 'khai-tiec-sinh-nhat-bat-tung-bat-ngo', '<p><strong>RINH QU&Agrave; BOM TẤN TRỊ GI&Aacute; 500K</strong></p>\r\n\r\n<p>Với mỗi h&oacute;a đơn 999k, kh&aacute;ch h&agrave;ng sẽ nhận ngay 1 combo qu&agrave; trị gi&aacute; 500k bao gồm:</p>\r\n\r\n<p>-&nbsp;T&uacute;i tote thời trang Freestyle.</p>\r\n\r\n<p>- Chiếc n&oacute;n thời trang c&aacute; t&iacute;nh.</p>\r\n\r\n<p>- Sổ tay thanh lịch cho c&aacute;c bạn trẻ .</p>\r\n\r\n<p>- B&uacute;t bi thương hiệu Totoday.</p>\r\n\r\n<p>- Phụ kiện m&oacute;c kh&oacute;a trẻ trung.&nbsp;</p>\r\n\r\n<p>- Đặc biệt l&agrave; voucher trị gi&aacute; 100k (&aacute;p dụng cho h&oacute;a đơn 500k, từ ng&agrave;y 20/10 đến 31/12).</p>\r\n\r\n<p><em>Chương tr&igrave;nh &aacute;p dụng tr&ecirc;n to&agrave;n hệ thống cửa h&agrave;ng Totoday v&agrave; online kể từ ng&agrave;y 08/10/2022 đến 16/10/2022.&nbsp;</em></p>\r\n\r\n<p><em><strong>Điều kiện &aacute;p dụng:</strong></em></p>\r\n\r\n<p><em>- Kh&ocirc;ng &aacute;p dụng cấp số nh&acirc;n.</em></p>\r\n\r\n<p><em>- Qu&agrave; tặng kh&ocirc;ng c&oacute; gi&aacute; trị quy đổi th&agrave;nh tiền mặt.</em></p>\r\n\r\n<p><em>- C&aacute;c sản phẩm tặng kh&ocirc;ng &aacute;p dụng ch&iacute;nh s&aacute;ch đổi trả.</em></p>\r\n\r\n<p><em>- Kh&ocirc;ng &aacute;p dụng chung với c&aacute;c voucher giảm gi&aacute; v&agrave; CTKM kh&aacute;c.</em></p>\r\n\r\n<p><em>- &Aacute;p dụng chung với chiết khấu VIP, t&iacute;nh tr&ecirc;n gi&aacute; trị h&oacute;a đơn thanh to&aacute;n cuối c&ugrave;ng sau chiết khấu.</em></p>\r\n\r\n<p><strong>THỬ TH&Aacute;CH MINIGAME &ldquo;THỔI NẾN KH&Ocirc;NG TẮT&rdquo;</strong></p>\r\n\r\n<p>Với mỗi h&oacute;a đơn mua h&agrave;ng, kh&aacute;ch h&agrave;ng sẽ được tham gia minigame &ldquo;Thổi nến nhận qu&agrave;&rdquo; c&ugrave;ng Totoday c&oacute; thể lệ như sau:</p>\r\n\r\n<p>- Mỗi kh&aacute;ch h&agrave;ng sẽ được tham gia thổi 3 lần/ lần chơi, kh&aacute;ch h&agrave;ng thổi tắt nến tr&ecirc;n b&aacute;nh kem sẽ được nhận&nbsp;<strong>1 voucher trị gi&aacute; 50k</strong>&nbsp;(kh&ocirc;ng &aacute;p dụng với phụ kiện, từ ng&agrave;y 20/10 đến 31/12).</p>\r\n\r\n<p>- Quy định khoảng c&aacute;ch: Kh&aacute;ch h&agrave;ng đứng tại vạch, c&aacute;ch b&aacute;nh kem 60cm (1 &ocirc; gạch).</p>\r\n\r\n<p><em>Chương tr&igrave;nh &aacute;p dụng tr&ecirc;n to&agrave;n hệ thống cửa h&agrave;ng Totoday từ ng&agrave;y 08/10/2022 đến 16/10/2022.&nbsp;</em></p>\r\n\r\n<p>Đến Totoday rinh qu&agrave; khủng v&agrave; dự tiệc sinh nhật c&ugrave;ng ch&uacute;ng m&igrave;nh FRIENDs nh&eacute;!</p>\r\n\r\n<p>-----------------------------</p>\r\n', 'post-1.jpg', 'post', 'KHAI TIỆC SINH NHẬT, BẬT TUNG BẤT NGỜ', 'KHAI TIỆC SINH NHẬT, BẬT TUNG BẤT NGỜ', '2022-11-22 13:03:06', 1, '2022-11-22 13:03:06', 1, 1),
(36, NULL, 'Chính sách đổi hàng', 'chinh-sach-doi-hang', '1. Điều kiện đổi trả\nQuý Khách hàng cần kiểm tra tình trạng hàng hóa và có thể đổi hàng/ trả lại hàng ngay tại thời điểm giao/nhận hàng trong những trường hợp sau:\n\nHàng không đúng chủng loại, mẫu mã trong đơn hàng đã đặt hoặc như trên website tại thời điểm đặt hàng. Không đủ số lượng, không đủ bộ như trong đơn hàng. Tình trạng bên ngoài bị ảnh hưởng như rách bao bì, bong tróc, bể vỡ… Khách hàng có trách nhiệm trình giấy tờ liên quan chứng minh sự thiếu sót trên để hoàn thành việc hoàn trả/đổi trả hàng hóa.<br></br>2. Quy định về thời gian thông báo và gửi sản phẩm đổi trả Thời gian thông báo đổi trả: trong vòng 48h kể từ khi nhận sản phẩm đối với trường hợp sản phẩm thiếu phụ kiện, quà tặng hoặc bể vỡ. Thời gian gửi chuyển trả sản phẩm: trong vòng 14 ngày kể từ khi nhận sản phẩm. Địa điểm đổi trả sản phẩm: Khách hàng có thể mang hàng trực tiếp đến văn phòng/ cửa hàng của chúng tôi hoặc chuyển qua đường bưu điện. Trong trường hợp Quý Khách hàng có ý kiến đóng góp/khiếu nại liên quan đến chất lượng sản phẩm, Quý Khách hàng vui lòng liên hệ đường dây chăm sóc khách hàng của chúng tôi\nQuý Khách hàng cần kiểm tra tình trạng hàng hóa và có thể đổi hàng/ trả lại hàng ngay tại thời điểm giao/nhận hàng trong những trường hợp sau:\n\nHàng không đúng chủng loại, mẫu mã trong đơn hàng đã đặt hoặc như trên website tại thời điểm đặt hàng. Không đủ số lượng, không đủ bộ như trong đơn hàng. Tình trạng bên ngoài bị ảnh hưởng như rách bao bì, bong tróc, bể vỡ… Khách hàng có trách nhiệm trình giấy tờ liên quan chứng minh sự thiếu sót trên để hoàn thành việc hoàn trả/đổi trả hàng hóa.', 'chinh-sach-doi-hang.jpg', 'page', 'Chính sách đổi hàng', 'Chính sách đổi hàng', '2022-11-22 13:07:28', 1, '2022-11-22 13:07:28', 1, 1),
(37, NULL, 'Chính sách bảo hành', 'chinh-sach-bao-hanh', '\n1. Bảo hành là gì?\nTheo định nghĩa nêu trong từ điển “bảo hành” là “việc thực hiện đảm bảo bằng văn bản sẽ được nhà sản xuất phát cho người mua. Nội dung trong văn bản sẽ đề cập tới vấn đề sẽ cam kết sửa chữa, thay thế sản phẩm nếu cần tại một khoảng thời gian nhất định”. Hiểu theo cách đơn giản thì đây chính là một bản cam kết chính thức giữa nhà sản xuất với người mua hàng (Đối tượng mua sản phẩm). Và đảm bảo trong khoảng thời gian cố định đưa ra, chất lượng sản phẩm sẽ đáp ứng đủ mong đợi từ phía người mua.\n\nVí dụ cụ thể: Nếu bạn mua sản phẩm trong 1 cửa hàng điện tử, nhân viên bán hàng sẽ cung cấp cho bạn thông tin rằng bạn sẽ nhận được bảo hành 3 năm nếu bạn mua ổ đĩa cứng  của thương hiệu nào đó. Thì có nghĩa là nhà sản xuất ổ đĩa cứng này sẽ chịu trách nhiệm sửa chữa, thay thế và có thể hoàn tiền 100% cho bạn nếu như sản phẩm không đáp ứng đủ các chức năng của nó  trong 3 năm dùng.\n\n \n\n2. Chính sách bảo hành là gì?\nChính sách bảo hành gồm các quy định, cam kết của nhà sản xuất (NSX) hay của người bán với người mua sản phẩm của họ. Độ mạnh, yếu từ các cam kết này sẽ phụ thuộc theo  mức độ uy tín của người bán, người đề ra bản cam kết đó. Và thông thường thì công ty càng lớn,sự uy tín sẽ càng cao và chính sách bảo hành cũng sẽ được đảm bảo.', 'chinh-sach-bao-hanh.png', 'page', 'Chính sách bảo hành', 'Chính sách bảo hành', '2022-11-22 13:08:13', 1, '2022-11-22 13:08:13', 1, 1),
(38, NULL, 'Chính Sách Hoàn Tiền', 'chinh-sach-hoan-tien', ' \n\n1. Bảo hành là gì?\nTheo định nghĩa nêu trong từ điển “bảo hành” là “việc thực hiện đảm bảo bằng văn bản sẽ được nhà sản xuất phát cho người mua. Nội dung trong văn bản sẽ đề cập tới vấn đề sẽ cam kết sửa chữa, thay thế sản phẩm nếu cần tại một khoảng thời gian nhất định”. Hiểu theo cách đơn giản thì đây chính là một bản cam kết chính thức giữa nhà sản xuất với người mua hàng (Đối tượng mua sản phẩm). Và đảm bảo trong khoảng thời gian cố định đưa ra, chất lượng sản phẩm sẽ đáp ứng đủ mong đợi từ phía người mua.\n\nVí dụ cụ thể: Nếu bạn mua sản phẩm trong 1 cửa hàng điện tử, nhân viên bán hàng sẽ cung cấp cho bạn thông tin rằng bạn sẽ nhận được bảo hành 3 năm nếu bạn mua ổ đĩa cứng  của thương hiệu nào đó. Thì có nghĩa là nhà sản xuất ổ đĩa cứng này sẽ chịu trách nhiệm sửa chữa, thay thế và có thể hoàn tiền 100% cho bạn nếu như sản phẩm không đáp ứng đủ các chức năng của nó  trong 3 năm dùng.\n\n \n\n2. Chính sách bảo hành là gì?\nChính sách bảo hành gồm các quy định, cam kết của nhà sản xuất (NSX) hay của người bán với người mua sản phẩm của họ. Độ mạnh, yếu từ các cam kết này sẽ phụ thuộc theo  mức độ uy tín của người bán, người đề ra bản cam kết đó. Và thông thường thì công ty càng lớn,sự uy tín sẽ càng cao và chính sách bảo hành cũng sẽ được đảm bảo.', 'chinh-sach-hoan-tien.jpg', 'page', 'Chính Sách Hoàn Tiền', 'Chính Sách Hoàn Tiền', '2022-11-22 13:11:30', 1, '2022-11-22 13:11:30', 1, 1),
(39, NULL, 'Giới thiệu', 'gioi-thieu', '<p>Shop Thời Trang Dịu Hiền với phương ch&acirc;m l&agrave; &ldquo; Sẽ lu&ocirc;n lu&ocirc;n l&agrave; người bạn đồng h&agrave;nh c&ugrave;ng với phong c&aacute;ch thời trang của bạn&rdquo;. Dịu hiền sẽ l&agrave; một trong những shop đồ thời trang uy t&iacute;n v&agrave; chất lượng nhất tại Tp.HCM ch&uacute;ng t&ocirc;i lu&ocirc;n mang đến cho kh&aacute;ch h&agrave;ng những sản phẩm mới nhất v&agrave; chất lượng, gi&aacute; th&agrave;nh hợp l&yacute; nhất tại cửa h&agrave;ng Thời Trang Dịu Hiền dưới đ&acirc;y l&agrave; đối n&eacute;t giới thiệu cơ bản về Shop Thời Trang Nữ Cao Cấp Dịu Hiền.</p>\r\n\r\n<p>Blog giới thiệu thời trang</p>\r\n\r\n<p>C&aacute;ch M&agrave; Thời Trang Dịu Hiền Tạo Dựng Thương Hiệu?</p>\r\n\r\n<p>Nhằm đ&aacute;p ứng được nhu cầu của người ti&ecirc;u d&ugrave;ng n&ecirc;n c&oacute; rất nhiều shop thời trang h&agrave;ng loạt được ra đời nhưng trong một khoảng thời gian ngắn rồi họ cũng lặng lẽ đ&oacute;ng cửa. Chắc c&oacute; lẽ bạn cũng rất ngạc nhi&ecirc;n khi ai đ&oacute; n&oacute;i với bạn rằng chắc c&oacute; một cửa h&agrave;ng nhỏ lẻ, kh&ocirc;ng thương hiệu m&agrave; lại tồn tại nhiều năm nay. Nhờ r&uacute;t kinh nghiệm từ những shop cửa h&agrave;ng nhỏ lẻ kh&aacute;c. Ch&iacute;nh v&igrave; vậy m&agrave; Dịu Hiền một trong những cửa h&agrave;ng shop thời trang nhỏ nhắn xinh xắn nằm tr&ecirc;n tuyến đường Nguyễn Văn Lượng&nbsp; ( Quận G&ograve; Vấp, TP. Hồ Ch&iacute; Minh ) nhờ được sự tin tưởng của kh&aacute;ch h&agrave;ng với hơn 800.000 lượt theo d&otilde;i n&ecirc;n Shop Thời Trang Nữ Cao Cấp Dịu Hiền đ&atilde; đi được hơn 10 năm chặng đường kinh doanh trong lĩnh vực thời trang đ&atilde; trở th&agrave;nh một trong những địa điểm b&aacute;n thời trang uy t&iacute;n nhất cho kh&aacute;ch h&agrave;ng lựa chọn.</p>\r\n\r\n<p>Dưới đ&acirc;y l&agrave; một v&agrave;i ti&ecirc;u ch&iacute; đ&atilde; tạo n&ecirc;n thương hiệu của dịu hiền c&oacute; vị tr&iacute; tại thị trường Việt Nam cụ thể như sau :</p>\r\n\r\n<p>Khỏi nguồn từ niềm y&ecirc;u th&iacute;ch của bạn th&acirc;n</p>\r\n\r\n<p>Giới thiệu cơ bản về Thời Trang Dịu Hiền được ra đời dựa v&agrave;o t&igrave;nh y&ecirc;u m&atilde;nh liệt m&agrave; chị chủ đ&atilde; d&agrave;nh hết cả tuổi thanh xu&acirc;n để d&agrave;nh cho thời trang lu&ocirc;n mang đến cho kh&aacute;ch những sản phẩm chất lượng tốt nhất đến cho bạn.</p>\r\n\r\n<p>Mặc d&ugrave; shop dịu hiền kh&ocirc;ng phải l&agrave; một cửa h&agrave;ng rất lớn nhưng ngay từ l&uacute;c ban đầu, Chị hiền đ&atilde; x&aacute;c định mục ti&ecirc;u của m&igrave;nh l&agrave;m g&igrave; v&agrave; những kh&aacute;ch h&agrave;ng m&agrave; shop hướng tới l&agrave; đối tượng n&agrave;o. Tuy nhi&ecirc;n b&ecirc;n cạnh đ&oacute; shop cũng đồng thời t&igrave;m ra những n&eacute;t ri&ecirc;ng cho shop m&agrave; cứ thế m&agrave; Shop Thời Trang C&ocirc;ng Sở Dịu Hiền c&oacute; được chỗ vững chắc tr&ecirc;n thị trường Việt Nam hiện nay.</p>\r\n\r\n<p>Shop dịu hiền nhờ chọn được vị địa l&yacute; thuận lợi c&oacute; rất nhiều d&acirc;n văn ph&ograve;ng n&ecirc;n Dịu Hiền Shop hướng tới những kh&aacute;ch h&agrave;ng trẻ tuổi đặc biệt l&agrave; những kh&aacute;ch h&agrave;ng c&oacute; thu nhập tầm trung chủ yếu l&agrave; nh&acirc;n vi&ecirc;n văn ph&ograve;ng&hellip;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Giới thiệu shop dịu hiền thời trang</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; vậy m&agrave; tất cả c&aacute;c sản phẩm đa dạng v&agrave; mẫu m&atilde; chủ yếu tập trung phần nhiều v&agrave;o &Aacute;o sơ mi, Ch&acirc;n v&aacute;y, Đầm, Quần, Vest, T-shirt&hellip;nhờ thiết kế đa dạng v&agrave; phong ph&uacute; n&ecirc;n tất cả c&aacute;c d&ograve;ng sản phẩm tại shop c&oacute; thể sử dụng đi l&agrave;m, đi chơi, du lịch, d&atilde; ngoại hay thậm tr&iacute; trong những buổi tiệc sang trọng.</p>\r\n\r\n<p>Giới thiệu một v&agrave;i n&eacute;t ri&ecirc;ng tạo ấn tượng trong mắt kh&aacute;ch h&agrave;ng</p>\r\n\r\n<p>Đối với c&aacute;c shop thời trang hiện nay th&igrave; b&agrave;i to&aacute;n về lợi nhuận l&agrave; một b&agrave;i to&aacute;n kh&oacute; đối với những shop thời trang nhỏ lẻ như Cửa H&agrave;ng Thời Trang Dịu Hiền. Để giải quyết được b&agrave;i to&aacute;n lợi nhuận m&agrave; ph&acirc;n kh&uacute;c gi&aacute; của c&aacute;c sản phẩm phải vẫn nằm ở tầm trung. Dịu hiền đ&atilde; tối ưu h&oacute;a nhất từ kh&acirc;u nhập h&agrave;ng cũng như sau những nghi&ecirc;n cứu của Dịu Hiền Shop những nhu cầu của kh&aacute;ch h&agrave;ng v&agrave; xu hướng thời trang hot trong thời gian một c&aacute;ch kỹ lưỡng để shop c&oacute; thể chọn được những mẩu đẹp v&agrave; chất lượng tốt nhất.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nhận thấy được nhu cầu của kh&aacute;ch h&agrave;ng ng&agrave;y c&agrave;ng cao cấp với những sản phẩm&nbsp; độc lạ, ấn tượng v&agrave; điểm nhấn mạnh đ&aacute;ng ch&uacute; &yacute; nhất l&agrave; &ldquo;kh&ocirc;ng đụng h&agrave;ng&rdquo; n&ecirc;n ngo&agrave;i những sản phẩm nhập th&igrave; Thời Trang Dịu Hiền cũng c&oacute; thiết kế với nhiều mẫu m&atilde; mới hot trend để đ&aacute;p ứng được nhu cầu của kh&aacute;ch h&agrave;ng. N&ecirc;n từ đ&oacute; Dịu Hiền Shop v&agrave; c&acirc;u chuyện thương hiệu n&oacute; cũng bắt nguồn từ đ&oacute; &ldquo; Bạn Muốn Mua Những Sản Phẩm Thời Trang Đẹp, Độc V&agrave; Kh&ocirc;ng Đụng H&agrave;ng, Chỉ C&oacute; Tại Shop Thời Trang Cao Cấp Dịu Hiền :)&rdquo;</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, để đối mặt với t&iacute;nh khốc liệt của thị trường n&ecirc;n Shop dịu hiền sẽ giới thiệu cho bạn những chiếc lược marketing cũng như chiếc lược kinh doanh cũng mang những phong c&aacute;ch độc đ&aacute;o ri&ecirc;ng. Đối với những mặt h&agrave;ng trưng b&agrave;y tại cửa h&agrave;ng Thời Trang Dịu Hiền chỉ trưng b&agrave;y những sản phẩm c&oacute; số lượng kham hiến, nhờ hiểu được t&acirc;m l&yacute; của kh&aacute;ch h&agrave;ng n&ecirc;n đối với việc trưng b&agrave;y như vậy kh&aacute;ch h&agrave;ng sẽ suy nghĩ nếu kh&ocirc;ng mua th&igrave; sẽ hết h&agrave;ng!</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; c&oacute; những chiến lược kinh doanh độc đ&aacute;o m&agrave; Thời Trang Dịu Hiền ng&agrave;y c&agrave;ng được nhiều kh&aacute;ch h&agrave;ng t&igrave;m đến với sớm với những ti&ecirc;u ch&iacute; &ldquo; Chất Lượng &ndash; Uy T&iacute;n &ndash; Sản Phẩm Độc Lạ &ldquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kh&ocirc;ng chỉ kinh doanh quần, &aacute;o, v&aacute;y, đầm&hellip;th&igrave; shop cũng c&oacute; b&agrave;y b&aacute;n phụ kiện trang sức k&egrave;m theo để cho bạn đẹp c&agrave;ng đẹp th&ecirc;m với những bộ trang sức k&egrave;m theo. Tuy nhi&ecirc;n đ&oacute; cũng chưa phải l&agrave; những g&igrave; tạo n&ecirc;n sự th&agrave;nh c&ocirc;ng như ng&agrave;y h&ocirc;m nay của Cửa H&agrave;ng Thời Trang Dịu Hiền.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Giới thiệu shop dịu hiền thời trang</p>\r\n\r\n<p>Đặc biệt một trong những yếu tố th&agrave;nh c&ocirc;ng nhất của shop Thời Trang Quần &Aacute;o Nữ Cao Cấp Dịu Hiền đ&oacute; l&agrave; tạo dựng được một xưởng sản xuất thời trang c&ocirc;ng sở lớn nhất tại Tp.HCM.</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; vậy m&agrave; Thời Trang Dịu Hiền sẽ nơi lựa chọn ho&agrave;n hảo nhất d&agrave;nh cho phong c&aacute;ch thời trang bạn nh&eacute;!!!</p>\r\n\r\n<p>Mọi đ&oacute;ng g&oacute;p &yacute; kiến của qu&yacute; kh&aacute;ch vui l&ograve;ng li&ecirc;n hệ với ch&uacute;ng t&ocirc;i theo địa chỉ :</p>\r\n\r\n<p>Shop Thời Trang Dịu Hiền</p>\r\n', 'gioi-thieu.jpg', 'page', '', '', '2022-11-22 13:13:30', 1, '2022-11-22 13:13:30', 1, 1),
(40, NULL, 'Chính sách vận chuyển', 'chinh-sach-van-chuyen', ' 1. Chính sách vận chuyển?Theo định nghĩa nêu trong từ điển “bảo hành” là “việc thực hiện đảm bảo bằng văn bản sẽ được nhà sản xuất phát cho người mua. Nội dung trong văn bản sẽ đề cập tới vấn đề sẽ cam kết sửa chữa, thay thế sản phẩm nếu cần tại một khoảng thời gian nhất định”. Hiểu theo cách đơn giản thì đây chính là một bản cam kết chính thức giữa nhà sản xuất với người mua hàng (Đối tượng mua sản phẩm). Và đảm bảo trong khoảng thời gian cố định đưa ra, chất lượng sản phẩm sẽ đáp ứng đủ mong đợi từ phía người mua.Ví dụ cụ thể: Nếu bạn mua sản phẩm trong 1 cửa hàng điện tử, nhân viên bán hàng sẽ cung cấp cho bạn thông tin rằng bạn sẽ nhận được bảo hành 3 năm nếu bạn mua ổ đĩa cứng  của thương hiệu nào đó. Thì có nghĩa là nhà sản xuất ổ đĩa cứng này sẽ chịu trách nhiệm sửa chữa, thay thế và có thể hoàn tiền 100% cho bạn nếu như sản phẩm không đáp ứng đủ các chức năng của nó  trong 3 năm dùng. 2. Chính sách vận chuyển gì?Chính sách vận chuyển gồm các quy định, cam kết của nhà sản xuất (NSX) hay của người bán với người mua sản phẩm của họ. Độ mạnh, yếu từ các cam kết này sẽ phụ thuộc theo  mức độ uy tín của người bán, người đề ra bản cam kết đó. Và thông thường thì công ty càng lớn,sự uy tín sẽ càng cao và chính sách bảo hành cũng sẽ được đảm bảo.', 'chinh-sach-van-chuyen.jpg\r\n', 'page', 'Chính Sách Vận Chuyển', 'Chính Sách Vận Chuyển', '2024-01-20 08:35:30', 1, '2024-01-25 13:06:43', 8, 1),
(41, 1, 'Thời trang mới ra, đã bán gần cháy hàng', 'dich-vu', ' \n\n1. Chính sách vận chuyển?\nTheo định nghĩa nêu trong từ điển “bảo hành” là “việc thực hiện đảm bảo bằng văn bản sẽ được nhà sản xuất phát cho người mua. Nội dung trong văn bản sẽ đề cập tới vấn đề sẽ cam kết sửa chữa, thay thế sản phẩm nếu cần tại một khoảng thời gian nhất định”. Hiểu theo cách đơn giản thì đây chính là một bản cam kết chính thức giữa nhà sản xuất với người mua hàng (Đối tượng mua sản phẩm). Và đảm bảo trong khoảng thời gian cố định đưa ra, chất lượng sản phẩm sẽ đáp ứng đủ mong đợi từ phía người mua.\n\nVí dụ cụ thể: Nếu bạn mua sản phẩm trong 1 cửa hàng điện tử, nhân viên bán hàng sẽ cung cấp cho bạn thông tin rằng bạn sẽ nhận được bảo hành 3 năm nếu bạn mua ổ đĩa cứng  của thương hiệu nào đó. Thì có nghĩa là nhà sản xuất ổ đĩa cứng này sẽ chịu trách nhiệm sửa chữa, thay thế và có thể hoàn tiền 100% cho bạn nếu như sản phẩm không đáp ứng đủ các chức năng của nó  trong 3 năm dùng.\n\n \n\n2. Chính sách vận chuyển gì?\nChính sách vận chuyển gồm các quy định, cam kết của nhà sản xuất (NSX) hay của người bán với người mua sản phẩm của họ. Độ mạnh, yếu từ các cam kết này sẽ phụ thuộc theo  mức độ uy tín của người bán, người đề ra bản cam kết đó. Và thông thường thì công ty càng lớn,sự uy tín sẽ càng cao và chính sách bảo hành cũng sẽ được đảm bảo.', 'tt.jpg', 'post', 'Tin tức', 'Tin tức', '2024-01-20 09:57:54', 1, '2022-11-22 13:11:30', 1, 1),
(42, 1, 'Giảm giá cực sốc ngày 1/1/2024', 'giam-gia-cuc-soc-ngay-1-1-2024', ' 1. Chính sách vận chuyển?Theo định nghĩa nêu trong từ điển “bảo hành” là “việc thực hiện đảm bảo bằng văn bản sẽ được nhà sản xuất phát cho người mua. Nội dung trong văn bản sẽ đề cập tới vấn đề sẽ cam kết sửa chữa, thay thế sản phẩm nếu cần tại một khoảng thời gian nhất định”. Hiểu theo cách đơn giản thì đây chính là một bản cam kết chính thức giữa nhà sản xuất với người mua hàng (Đối tượng mua sản phẩm). Và đảm bảo trong khoảng thời gian cố định đưa ra, chất lượng sản phẩm sẽ đáp ứng đủ mong đợi từ phía người mua.Ví dụ cụ thể: Nếu bạn mua sản phẩm trong 1 cửa hàng điện tử, nhân viên bán hàng sẽ cung cấp cho bạn thông tin rằng bạn sẽ nhận được bảo hành 3 năm nếu bạn mua ổ đĩa cứng  của thương hiệu nào đó. Thì có nghĩa là nhà sản xuất ổ đĩa cứng này sẽ chịu trách nhiệm sửa chữa, thay thế và có thể hoàn tiền 100% cho bạn nếu như sản phẩm không đáp ứng đủ các chức năng của nó  trong 3 năm dùng. 2. Chính sách vận chuyển gì?Chính sách vận chuyển gồm các quy định, cam kết của nhà sản xuất (NSX) hay của người bán với người mua sản phẩm của họ. Độ mạnh, yếu từ các cam kết này sẽ phụ thuộc theo  mức độ uy tín của người bán, người đề ra bản cam kết đó. Và thông thường thì công ty càng lớn,sự uy tín sẽ càng cao và chính sách bảo hành cũng sẽ được đảm bảo.', 'tt.jpg', 'post', 'Tin tức', 'Tin tức', '2024-01-20 10:16:14', 1, '2024-01-25 13:08:17', 8, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã sản phẩm',
  `category_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã loại sản phẩm',
  `brand_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL COMMENT 'Tên sản phẩm',
  `slug` varchar(1000) NOT NULL COMMENT 'Slug tên sản phẩm',
  `image` varchar(1000) NOT NULL COMMENT 'Hình ảnh',
  `image1` varchar(1000) NOT NULL COMMENT 'Ảnh phụ 1',
  `image2` varchar(1000) NOT NULL COMMENT 'Ảnh phụ 2',
  `image3` varchar(1000) NOT NULL COMMENT 'Ảnh phụ 3',
  `detail` mediumtext NOT NULL COMMENT 'Chi tiết',
  `qty` smallint(5) UNSIGNED NOT NULL COMMENT 'Số lượng',
  `price` float(12,2) NOT NULL COMMENT 'Giá',
  `pricesale` float(12,3) NOT NULL COMMENT 'Giá khuyến mãi',
  `description` varchar(255) NOT NULL COMMENT 'Từ khóa SEO',
  `created_at` datetime NOT NULL COMMENT 'Ngày tạo',
  `created_by` tinyint(3) UNSIGNED NOT NULL COMMENT 'Người tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày sửa',
  `updated_by` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Người sửa',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `brand_id`, `name`, `slug`, `image`, `image1`, `image2`, `image3`, `detail`, `qty`, `price`, `pricesale`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 1, 2, 'Áo Thun Cổ Tròn Tay Ngắn', 'ao-thun-co-tron-tay-ngan', 'aonam1.jpg', 'aonam1.1.jpg', 'aonam1.2.jpg', 'aonam1.3.jpg', 'Áo Thun Cổ Tròn Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Phối Màu Dáng Vừa BST Thiết Kế SPEED 24\nÁo Thun Cổ Tròn Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Phối Màu Dáng Vừa BST Thiết Kế SPEED 24\nÁo Thun Cổ Tròn Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Phối Màu Dáng Vừa BST Thiết Kế SPEED 24\nÁo Thun Cổ Tròn Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Phối Màu Dáng Vừa BST Thiết Kế SPEED 24\nÁo Thun Cổ Tròn Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Phối Màu Dáng Vừa BST Thiết Kế SPEED 24\nÁo Thun Cổ Tròn Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Phối Màu Dáng Vừa BST Thiết Kế SPEED 24', 3, 378000.00, 370000.000, 'Áo Thun Cổ Tròn Tay Ngắn', '2022-11-22 18:40:37', 1, '2022-11-22 18:40:37', 1, 1),
(2, 1, 1, 'Áo Thun Cổ Tròn Tay Ngắn', 'ao-thun-co-tron', 'aonam2.jpg', 'aonam2.1.jpg', 'aonam2.2.jpg', 'aonam2.3.jpg', 'Áo Thun Cổ Tròn Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Biểu Tượng Dáng Vừa BST Thiết Kế SPEED 02', 1, 499000.00, 370000.000, 'Áo Thun Cổ Tròn Tay Ngắn', '2022-11-22 18:42:49', 1, '2022-11-22 18:42:49', 1, 1),
(3, 1, 2, 'Áo Thun Cổ Tròn 3 Lỗ', 'ao-thun-co-tron-3-lo', 'aonam3.jpg', 'aonam3.1.jpg', 'aonam3.2.jpg', 'aonam3.3.jpg', 'Áo Thun Cổ Tròn 3 Lỗ Sợi Nhân Tạo Thoáng Mát Phối Màu Dáng Rộng BST Thiết Kế SPEED 20', 1, 300000.00, 199000.000, 'Áo Thun Cổ Tròn 3 Lỗ', '2022-11-22 18:48:35', 1, '2022-11-22 18:48:35', 1, 1),
(4, 1, 1, 'Áo Thun Cổ Tròn Tay Ngắn', 'ao-thun-co-tron-tay-ngan-trang', 'aonam4.jpg', 'aonam4.1.jpg', 'aonam4.2.jpg', 'aonam4.3.jpg', 'Áo Thun Cổ Tròn Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Biểu Tượng Dáng Vừa BST Thiết Kế SPEED 09\nÁo Thun Cổ Tròn Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Biểu Tượng Dáng Vừa BST Thiết Kế SPEED 09\nÁo Thun Cổ Tròn Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Biểu Tượng Dáng Vừa BST Thiết Kế SPEED 09\nÁo Thun Cổ Tròn Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Biểu Tượng Dáng Vừa BST Thiết Kế SPEED 09\nÁo Thun Cổ Tròn Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Biểu Tượng Dáng Vừa BST Thiết Kế SPEED 09\nÁo Thun Cổ Tròn Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Biểu Tượng Dáng Vừa BST Thiết Kế SPEED 09', 1, 200000.00, 199000.000, 'Áo Thun Cổ Tròn Tay Ngắn', '2022-11-22 18:49:40', 1, '2022-11-22 18:49:40', 1, 1),
(5, 4, 4, 'Áo Sơ Mi Cổ Bẻ Tay Ngắn', 'ao-so-mi-co-be-tay-ngan', 'sominam1.jpg', 'sominam1.1.jpg', 'sominam1.2.jpg', 'sominam1.3.jpg', 'Áo Sơ Mi Cổ Bẻ Tay Ngắn Sợi Nhân Tạo Nhanh Khô Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 34\nMã số: #0022681', 1, 200000.00, 179000.000, 'Áo Sơ Mi Cổ Bẻ Tay Ngắn', '2022-11-22 19:11:51', 1, '2022-11-22 19:15:16', 1, 1),
(6, 4, 3, 'Áo Sơ Mi Cổ Bẻ Tay Ngắn', 'ao-so-mi-co-be', 'sominam2.jpg', 'sominam2.1.jpg', 'sominam2.2.jpg', 'sominam2.3.jpg', 'Áo Sơ Mi Cổ Bẻ Tay Ngắn Sợi Nhân Tạo Nhanh Khô Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 31\nMã số: #0022682', 1, 359000.00, 299000.000, 'Áo Sơ Mi Cổ Bẻ Tay Ngắn', '2022-11-22 19:11:51', 1, '2022-11-22 19:14:52', 1, 1),
(7, 4, 1, 'Áo Sơ Mi Cổ Trụ Tay Dài', 'ao-so-mi-co-tru-tay-dai', 'sominam3.jpg', 'sominam3.1.jpg', 'sominam3.2.jpg', 'sominam3.3.jpg', 'Áo Sơ Mi Cổ Trụ Tay Dài Sợi Nhân Tạo Nhanh Khô Trơn Dáng Rộng Đơn Giản PREMIUM 10\nMã số: #0022515', 1, 179000.00, 79000.000, 'Áo Sơ Mi Cổ Trụ Tay Dài', '2022-11-22 19:16:17', 1, '2022-11-22 19:16:17', 1, 1),
(8, 4, 2, 'Áo Sơ Mi Cổ Trụ Tay Dài', 'ao-so-mi-co-tru', 'sominam4.jpg', 'sominam4.1.jpg', 'sominam4.2.jpg', 'sominam4.3.jpg', 'Áo Sơ Mi Cổ Trụ Tay Dài Sợi Nhân Tạo Nhanh Khô Trơn Dáng Rộng Đơn Giản PREMIUM 10\nMã số: #0022513', 1, 300000.00, 179000.000, 'Áo Sơ Mi Cổ Trụ Tay Dài', '2022-11-22 19:16:51', 1, '2022-11-22 19:16:51', 1, 1),
(9, 5, 1, 'Quần Short Lưng Thun Trên Gối', 'quan-short-lung-thun-tren-goi-ace', 'quanngannam1.jpg', 'quanngannam1.1.jpg', 'quanngannam1.2.jpg', 'quanngannam1.3.jpg', 'Quần Short Lưng Thun Trên Gối Vải Thun Thấm Hút Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 48\nMã số: #0022676', 1, 200000.00, 200000.000, 'Quần Short Lưng Thun Trên Gối', '2022-11-22 19:17:53', 1, '2022-11-22 19:17:53', 1, 1),
(10, 5, 3, 'Quần Short Lưng Thun Trên Gối', 'quan-short-lung-thun-tren-goi-luffy', 'quanngannam2.jpg', 'quanngannam2.1.jpg', 'quanngannam2.2.jpg', 'quanngannam2.3.jpg', 'Quần Short Lưng Thun Trên Gối Vải Thun Thấm Hút Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 33\nQuần Short Lưng Thun Trên Gối Vải Thun Thấm Hút Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 33\nQuần Short Lưng Thun Trên Gối Vải Thun Thấm Hút Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 33\nQuần Short Lưng Thun Trên Gối Vải Thun Thấm Hút Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 33\nQuần Short Lưng Thun Trên Gối Vải Thun Thấm Hút Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 33\nQuần Short Lưng Thun Trên Gối Vải Thun Thấm Hút Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 33\nMã số: #0022674', 1, 300000.00, 300000.000, 'Quần Short Lưng Thun Trên Gối', '2022-11-22 19:19:09', 1, '2022-11-22 19:19:09', 1, 1),
(11, 5, 1, 'Quần Short Lưng Thun Trên Gối', 'quan-short-lung-thun-tren-goi-sabo', 'quanngannam3.jpg', 'quanngannam3.1.jpg', 'quanngannam3.2.jpg', 'quanngannam3.3.jpg', 'Quần Short Lưng Thun Trên Gối Vải Thun Thấm Hút Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 47\nQuần Short Lưng Thun Trên Gối Vải Thun Thấm Hút Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 47\nQuần Short Lưng Thun Trên Gối Vải Thun Thấm Hút Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 47\nQuần Short Lưng Thun Trên Gối Vải Thun Thấm Hút Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 47\nQuần Short Lưng Thun Trên Gối Vải Thun Thấm Hút Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 47\nQuần Short Lưng Thun Trên Gối Vải Thun Thấm Hút Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 47\nMã số: #0022675', 1, 199000.00, 199000.000, 'Quần Short Lưng Thun Trên Gối', '2022-11-22 19:19:43', 1, '2022-11-22 19:19:43', 1, 1),
(12, 5, 4, 'Quần Short Lưng Thun Trên Gối', 'quan-short-lung-thun-tren-goi-full', 'quanngannam4.jpg', 'quanngannam4.1.jpg', 'quanngannam4.2.jpg', 'quanngannam4.3.jpg', 'Quần Short Lưng Thun Trên Gối Vải Thun Thoáng Mát Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 37\nQuần Short Lưng Thun Trên Gối Vải Thun Thoáng Mát Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 37\nQuần Short Lưng Thun Trên Gối Vải Thun Thoáng Mát Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 37\nQuần Short Lưng Thun Trên Gối Vải Thun Thoáng Mát Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 37\nQuần Short Lưng Thun Trên Gối Vải Thun Thoáng Mát Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 37\nQuần Short Lưng Thun Trên Gối Vải Thun Thoáng Mát Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 37\nMã số: #0022678', 1, 179000.00, 179000.000, 'Quần Short Lưng Thun Trên Gối', '2022-11-22 19:20:53', 1, '2022-11-22 19:20:53', 1, 1),
(13, 6, 1, 'Quần Dài Lưng Thun Ống Đứng', 'quan-dai-lung-thun-ong-dug', 'quandainam1.jpg', 'quandainam1.1.jpg', 'quandainam1.2.jpg', 'quandainam1.3.jpg', 'Quần Dài Lưng Thun Ống Đứng Vải Denim Thấm Hút Biểu Tượng Dáng Rộng BST Thiết Kế One Piece 45\nMã số: #0022604', 1, 200000.00, 200000.000, 'Quần Dài Lưng Thun Ống Đứng', '2022-11-22 19:21:58', 1, '2022-11-22 19:21:58', 1, 1),
(14, 6, 3, 'Quần Dài Lưng Thun Ống Ôm', 'quan-dai-lung-thun-ong-om', 'quandainam2.jpg', 'quandainam2.1.jpg', 'quandainam2.2.jpg', 'quandainam2.3.jpg', 'Quần Dài Lưng Thun Ống Ôm Vải Thun Thoáng Mát Biểu Tượng Dáng Vừa BST Thiết Kế One Piece 46\nMã số: #0022680', 1, 259000.00, 259000.000, 'Quần Dài Lưng Thun Ống Ôm', '2022-11-22 19:22:27', 1, '2022-11-22 19:22:27', 1, 1),
(15, 6, 2, 'Quần Dài Lưng Thun Ống Đứng', 'quan-dai-lung-thun', 'quandainam3.jpg', 'quandainam3.1.jpg', 'quandainam3.2.jpg', 'quandainam3.3.jpg', 'Quần Dài Lưng Thun Ống Đứng Vải Dù Đứng Dáng Biểu Tượng Dáng Rộng BST Thiết Kế SPEED 17\nQuần Dài Lưng Thun Ống Đứng Vải Dù Đứng Dáng Biểu Tượng Dáng Rộng BST Thiết Kế SPEED 17\nQuần Dài Lưng Thun Ống Đứng Vải Dù Đứng Dáng Biểu Tượng Dáng Rộng BST Thiết Kế SPEED 17\nQuần Dài Lưng Thun Ống Đứng Vải Dù Đứng Dáng Biểu Tượng Dáng Rộng BST Thiết Kế SPEED 17\nQuần Dài Lưng Thun Ống Đứng Vải Dù Đứng Dáng Biểu Tượng Dáng Rộng BST Thiết Kế SPEED 17\nQuần Dài Lưng Thun Ống Đứng Vải Dù Đứng Dáng Biểu Tượng Dáng Rộng BST Thiết Kế SPEED 17\nMã số: #0022401', 1, 259000.00, 259000.000, 'Quần Dài Lưng Thun Ống Đứng', '2022-11-22 19:22:56', 1, '2022-11-22 19:22:56', 1, 1),
(16, 16, 1, 'Áo Polo Cổ Bẻ Tay Ngắn', 'ao-polo-co-be-tay-ngan', 'aopolonam1.jpg', 'aopolonam1.1.jpg', 'aopolonam1.2.jpg', 'aopolonam1.3.jpg', 'Chất lượng vải cao cấp, mát mẻ', 1, 37900.00, 19900.000, 'Áo polo trắng', '2022-11-22 19:23:18', 1, '2022-11-22 19:23:18', 1, 1),
(17, 18, 2, 'Áo Khoác Có Nón Vải Thun', 'ao-khoac-co-non-vai-thun', 'khoacnam1.jpg', 'khoacnam1.1.jpg', 'khoacnam1.2.jpg', 'khoacnam1.3.jpg', 'Áo Khoác Có Nón Vải Thun Thấm Hút Biểu Tượng Dáng Rộng Đơn Giản PREMIUM 22\nMã số: #0022543', 1, 599000.00, 900000.000, 'Áo Khoác Có Nón Vải Thun', '2022-11-22 19:24:58', 1, '2022-11-22 19:24:58', 1, 1),
(18, 18, 1, 'Áo Khoác Không Nón Thun Chống', 'ao-khoac-khong-non-thun-chong-nang', 'khoacnam2.jpg', 'khoacnam2.1.jpg', 'khoacnam2.2.jpg', 'khoacnam2.3.jpg', 'Áo Khoác Không Nón Thun Chống Nắng Trơn Dáng Rộng Đơn Giản Premium 34\nÁo Khoác Không Nón Thun Chống Nắng Trơn Dáng Rộng Đơn Giản Premium 34\nÁo Khoác Không Nón Thun Chống Nắng Trơn Dáng Rộng Đơn Giản Premium 34\nÁo Khoác Không Nón Thun Chống Nắng Trơn Dáng Rộng Đơn Giản Premium 34\nÁo Khoác Không Nón Thun Chống Nắng Trơn Dáng Rộng Đơn Giản Premium 34\nMã số: #0022615', 1, 299000.00, 299000.000, 'Áo Khoác Không Nón Thun Chống', '2022-11-22 19:26:02', 1, '2022-11-22 19:26:02', 1, 1),
(19, 18, 4, 'Áo Khoác Không Nón Vải Kaki', 'ao-khoac-khong-non-vai-kaki', 'khoacnam3.jpg', 'khoacnam3.1.jpg', 'khoacnam3.2.jpg', 'khoacnam3.3.jpg', 'Áo Khoác Không Nón Vải Kaki Mặc Ấm Trơn Dáng Rộng Đơn Giản PREMIUM 73\nMã số: #0023073', 1, 378000.00, 378000.000, 'Áo Khoác Không Nón Vải Kaki', '2022-11-22 19:26:25', 1, '2022-11-22 19:26:25', 1, 1),
(20, 18, 1, 'Áo Khoác Không Nón Vải Kaki', 'ao-khoac-khong-non-vai-kaki-tim', 'khoacnam4.jpg', 'khoacnam4.1.jpg', 'khoacnam4.2.jpg', 'khoacnam4.3.jpg', 'Áo Khoác Không Nón Vải Kaki Mặc Ấm Trơn Dáng Rộng Đơn Giản PREMIUM 73\nMã số: #0023072', 1, 799000.00, 799000.000, 'Áo Khoác Không Nón Vải Kaki', '2022-11-22 19:26:44', 1, '2022-11-22 19:26:44', 1, 1),
(21, 8, 3, 'Áo Sơ Mi Vạt Bầu Phối Ren\n', 'ao-so-mi-vat-bau', 'aosominu1.jpg', 'aosominu1.1.jpg', 'aosominu1.2.jpg', 'aosominu1.3.jpg', 'Áo Sơ Mi Nữ Tay Dài Coffee Túi Đắp Trơn Form Loose - 10S23SHLW025 với form dáng suông rộng mang lại sự thoải mái cho người mặc. Đặc biệt chính là chất vải coffee nhẹ bền, hấp thụ mùi cơ thể cực tốt và có khả năng chống tia UV cực tím hiệu quả. Đây cũng là một trong những chất vải xanh thân thiện môi trường được sử dụng phổ biến trong các sản phẩm cao cấp. Một sản phẩm được đánh giá cao không chỉ vì thiết kế đẹp mà chất vải thân thiện làn da, đặc biệt da chị em phụ nữ càng quan trọng hơn.Chất liệu ren nữ tính sẽ làm “mềm hóa” dáng áo sơ mi truyền thống, điểm nhấn ren trên áo thu hút người đối diện và đem lại niềm hứng khởi cho bạn gái khởi đầu ngày mới. Trong ảnh, mẫu phối áo cùng chân váy V34.', 1, 200000.00, 159000.000, 'Áo Sơ Mi Vạt Bầu Phối Ren\n', '2022-11-22 19:29:53', 1, '2022-11-22 19:29:53', 1, 1),
(22, 8, 1, 'Áo Sơ Mi Tay Dài Trơn Basic\n', 'ao-so-mi-tay-dai', 'aosominu2.jpg', 'aosominu2.1.jpg', 'aosominu2.2.jpg', 'aosominu2.3.jpg', 'Áo Sơ Mi Nữ Tay Dài Coffee Túi Đắp Trơn Form Loose - 10S23SHLW025 với form dáng suông rộng mang lại sự thoải mái cho người mặc. Đặc biệt chính là chất vải coffee nhẹ bền, hấp thụ mùi cơ thể cực tốt và có khả năng chống tia UV cực tím hiệu quả. Đây cũng là một trong những chất vải xanh thân thiện môi trường được sử dụng phổ biến trong các sản phẩm cao cấp. Một sản phẩm được đánh giá cao không chỉ vì thiết kế đẹp mà chất vải thân thiện làn da, đặc biệt da chị em phụ nữ càng quan trọng hơn.Áo sơ mi được HoYang thiết kế bởi những gam màu nhã nhặn, dễ mặc, dễ phối đồ và không kén màu da nữa. Với chiếc áo sơ mi do HoYang thiết kế, bạn có thể diện đi làm hay đi chơi đều phù hợp. Áo kết hợp cùng chân váy V44, quần phi lụa QHY17.', 1, 300000.00, 279000.000, 'Áo Sơ Mi Tay Dài Trơn Basic\n', '2022-11-22 19:30:23', 1, '2022-11-22 19:30:23', 1, 1),
(23, 8, 2, 'Áo Sơ Mi Cổ Đức Cool Ngầu\n', 'ao-so-mi-co-duc', 'aosominu3.jpg', 'aosominu3.1.jpg', 'aosominu3.2.jpg', 'aosominu3.3.jpg', 'Áo Sơ Mi Nữ Tay Dài Coffee Túi Đắp Trơn Form Loose - 10S23SHLW025 với form dáng suông rộng mang lại sự thoải mái cho người mặc. Đặc biệt chính là chất vải coffee nhẹ bền, hấp thụ mùi cơ thể cực tốt và có khả năng chống tia UV cực tím hiệu quả. Đây cũng là một trong những chất vải xanh thân thiện môi trường được sử dụng phổ biến trong các sản phẩm cao cấp. Một sản phẩm được đánh giá cao không chỉ vì thiết kế đẹp mà chất vải thân thiện làn da, đặc biệt da chị em phụ nữ càng quan trọng hơn.Với những thiết kế đơn giản nhưng đầy tinh tế và cool ngầu, áo sơ mi nữ cổ đức luôn được lòng các quý cô, không những giúp cho bạn thêm phần cá tính, mà còn có thể che đi được những khuyết điểm trên cơ thể, giúp bạn trở nên tự tin và quyến rũ hơn.', 1, 200000.00, 159000.000, 'Áo Sơ Mi Cổ Đức Cool Ngầu\n', '2022-11-22 19:30:45', 1, '2022-11-22 19:30:45', 1, 1),
(24, 8, 4, 'Áo Sơ Mi Trắng Tay Lỡ Điệu Đà\n', 'ao-so-mi-trang-tay-lo', 'aosominu4.jpg', 'aosominu4.1.jpg', 'aosominu4.2.jpg', 'aosominu4.3.jpg', 'Với cô nàng yêu thích phong cách cá tính hiện đại thì đừng nên bỏ qua chiếc áo siêu phẩm, siêu thanh lịch, nhẹ nhàng nhưng đầy cá tính này nhé.\n\nÁo sơ mi linen trắng form rộng, cổ chun, kết hợp cùng chiếc quần short giả váy QS25 hoặc quần tây QHY03, đi làm, đi chơi đều đẹp.', 1, 199000.00, 79000.000, 'Áo Sơ Mi Trắng Tay Lỡ Điệu Đà\n', '2022-11-22 19:31:09', 1, '2022-11-22 19:31:09', 1, 1),
(25, 10, 2, 'Quần Short Lai Lượn Sóng\n', 'quan-short-lai-luon-song', 'quanngannu4.jpg', 'quanngannu4.1.jpg', 'quanngannu4.2.jpg', 'quanngannu4.3.jpg', 'Quần Short Jean Nữ Ống Suông Trơn Form Straight - 10F23DPSW002 là dòng sản phẩm được dệt từ sợi REPREVE, một loại sợi nổi bật trong thời trang tái chế được sản xuất từ chai nhựa, mặc dù là loại sợi tái chế nhưng vẫn luôn giữ được những ưu điểm nổi bật của vải polyester như bền đẹp, hạn chế nhăn, giữ form quần áo tốt,... Sản phẩm quần áo tái chế từ sợi REPREVE là một xu hướng thời trang bền vững mà Routine luôn hướng đến để góp phần bảo vệ môi trường, giảm thiểu rác thải nhựa và giúp hạn chế lượng khí thải nhà kính từ quá trình xử lý polyester nguyên chất.Quần short là “bảo bối” trẻ hóa phong cách, đồng thời tôn dáng tối ưu. Nhờ thiết kế ống rộng và lưng cạp cao, người diện không cần sơ vin mà vóc dáng vẫn được hack tối ưu.\n\nKết hợp quần short với áo croptop AHY73, công thức này còn rất ăn ảnh và mang đến nét ngọt ngào, trẻ trung cho người diện.', 1, 400000.00, 400000.000, 'Quần Short Lai Lượn Sóng\n', '2022-11-22 19:34:00', 1, '2022-11-22 19:34:00', 1, 1),
(26, 10, 2, 'Quần Short Dáng Lửng Lưng Cao\n', 'quan-short-dang-lung-lung-cao', 'quanngannu3.jpg', 'quanngannu3.1.jpg', 'quanngannu3.2.jpg', 'quanngannu3.3.jpg', 'Quần Jean Nữ Họa Tiết Thêu Form Straight Crop - 10S23DPAW012 là một item làm biết bao cô nàng mê mẩn với thiết kế đơn giản nhưng vô cùng trẻ trung và năng động. Form quần classic suông từ trên xuống, eo và mông được may hơi ôm vào người, phần ống hơi rộng và xòe nhẹ kết hợp cùng chất liệu thoải mái nên dễ dàng sử dụng trong mọi hoàn cảnh từ đi học đến đi làm.\n\nQua nhiều năm phát triển, quần jean hay còn gọi là quần bò đã trở thành một món đồ rất thông dụng trong tủ quần áo của phái đẹp. Với thiết kế và màu sắc basic, chiếc quần jean dễ dàng mix-match với nhiều trang phục khác nhau kết hợp với họa tiết thêu nhỏ tinh tế sẽ là điểm nhấn để chiếc quần thêm phần trẻ trung, năng động.', 1, 2000000.00, 2000000.000, 'Quần Short Nữ Cotton', '2022-11-22 19:34:21', 1, '2022-11-22 19:34:21', 1, 1),
(27, 10, 3, 'Quần Short Nữ Họa Tiết Hoa Lá Cực Chất\n', 'quan-short-nu-hoa-tiet', 'quanngannu2.jpg', 'quanngannu2.1.jpg', 'quanngannu2.2.jpg', 'quanngannu2.3.jpg', 'Quần Jean Nữ Họa Tiết Thêu Form Straight Crop - 10S23DPAW012 là một item làm biết bao cô nàng mê mẩn với thiết kế đơn giản nhưng vô cùng trẻ trung và năng động. Form quần classic suông từ trên xuống, eo và mông được may hơi ôm vào người, phần ống hơi rộng và xòe nhẹ kết hợp cùng chất liệu thoải mái nên dễ dàng sử dụng trong mọi hoàn cảnh từ đi học đến đi làm.\n\nQua nhiều năm phát triển, quần jean hay còn gọi là quần bò đã trở thành một món đồ rất thông dụng trong tủ quần áo của phái đẹp. Với thiết kế và màu sắc basic, chiếc quần jean dễ dàng mix-match với nhiều trang phục khác nhau kết hợp với họa tiết thêu nhỏ tinh tế sẽ là điểm nhấn để chiếc quần thêm phần trẻ trung, năng động.Kiểu quần short in họa tiết chính là một trong những món đồ không thể thiếu trong tủ đồ chị em. Quần short họa tiết vừa nổi bật vừa năng động cho nàng tha hồ dạo phố, thu hút mọi ánh nhìn.', 1, 300000.00, 300000.000, 'Quần Short Nữ Họa Tiết Hoa Lá Cực Chất\n', '2022-11-22 19:34:52', 1, '2022-11-22 19:34:52', 1, 1),
(28, 10, 1, 'Quần Short TAFTA Dáng Chữ A Xịn Xò\n', 'quan-short-dang-chu-a', 'quanngannu1.jpg', 'quanngannu1.1.jpg', 'quanngannu1.2.jpg', 'quanngannu1.3.jpg', 'Quần Jean Nữ Ống Suông Họa Tiết Thêu Form Straight - 10S23DPAW009 là kiểu quần jean sành điệu dành cho các cô nàng yêu thích sự trẻ trung, năng động:\n\nChất jean dệt đôi hiện đại, màu sắc ít lỗi mốt\nVải dày dặn, có độ bền cao, thoáng khí và giữ form rất tốt\nForm quần ống suông hiện đại, với phần ống rộng dễ dàng che đi những khuyết điểm trên đôi chân\nHọa tiết thêu độc đáo, mới lạ tạo điểm nhấn đặc biệt cho chiếc quần cũng như tổng thể của bạn\nVới mẫu quần jean này các nàng có thể thoải mái mặc đi dạo phố, đi làm hay hẹn hò cùng người ấy.', 1, 379000.00, 400000.000, 'Quần jean liền sườn lai tưa', '2022-11-22 19:35:13', 1, '2022-11-22 19:35:13', 1, 1),
(29, 11, 3, 'Quần Ống Rộng Trắng Xẻ Tà\n', 'quan-ong-rong-xe-ta', 'quannu3.jpg', 'quannu3.1.jpg', 'quannu3.2.jpg', 'quannu3.3.jpg', 'Quần Jean Nữ Ống Suông Họa Tiết Thêu Form Straight - 10S23DPAW009 là kiểu quần jean sành điệu dành cho các cô nàng yêu thích sự trẻ trung, năng động:\n\nChất jean dệt đôi hiện đại, màu sắc ít lỗi mốt\nVải dày dặn, có độ bền cao, thoáng khí và giữ form rất tốt\nForm quần ống suông hiện đại, với phần ống rộng dễ dàng che đi những khuyết điểm trên đôi chân\nHọa tiết thêu độc đáo, mới lạ tạo điểm nhấn đặc biệt cho chiếc quần cũng như tổng thể của bạn\nVới mẫu quần jean này các nàng có thể thoải mái mặc đi dạo phố, đi làm hay hẹn hò cùng người ấy.Quần ống rộng là item hoàn hảo ăn gian chiều cao, che đi khuyết điểm đôi chân mà không cần sự trợ giúp của giày cao gót. Quan trọng không kém, quần còn giúp chị em ghi điểm ở nét phóng khoáng, thời thượng.\n\nTrong ảnh, chỉ đơn giản là quần ống rộng phối cùng áo kiểu lụa tay lỡ AHY82 hoặc áo lụa sọc vằn A122 đã thể hiện được đầy đủ cá tính của các nàng dù xuất hiện ở bất cứ nơi đâu.', 1, 379000.00, 900000.000, 'Quần Ống Rộng Trắng Xẻ Tà\n', '2022-11-22 19:38:14', 1, '2022-11-22 19:38:15', 1, 1),
(30, 11, 1, 'Quần Âu Ống Đứng Nữ Lưng Cao\n', 'quan-au-ong-dung-nu-lung-cao', 'quannu2.jpg', 'quannu2.1.jpg', 'quannu2.2.jpg', 'quannu2.3.jpg', 'Quần thiết kế lưng cao trẻ trung, nổi bật với đường viền nổi cùng chi tiết cúc quần được giấu đi một cách tinh tế. Đây chắc chắn sẽ là item quan trọng trong tủ quần áo của mọi quý cô, thích hợp diện cho nhiều hoàn cảnh khác nhau, đi làm, đi chơi hay tham dự các sự kiện chuyên nghiệp.\n\nTrong ảnh, mẫu diện quần cùng áo peplum chấm bi AHY104, áo sát nách AHY55 và áo cổ tròn AHY60.', 1, 300000.00, 400000.000, 'Quần Âu Ống Đứng Nữ Lưng Cao\n', '2022-11-22 19:38:39', 1, '2022-11-22 19:38:39', 1, 1),
(31, 11, 3, 'Quần Baggy Công Sở Cạp Cao\n', 'quan-baggy-cong-so', 'quannu1.jpg', 'quannu1.1.jpg', 'quannu1.2.jpg', 'quannu1.3.jpg', 'Quần Jean Nữ Họa Tiết Thêu Form Straight Crop - 10S23DPAW012 là một item làm biết bao cô nàng mê mẩn với thiết kế đơn giản nhưng vô cùng trẻ trung và năng động. Form quần classic suông từ trên xuống, eo và mông được may hơi ôm vào người, phần ống hơi rộng và xòe nhẹ kết hợp cùng chất liệu thoải mái nên dễ dàng sử dụng trong mọi hoàn cảnh từ đi học đến đi làm.\n\nQua nhiều năm phát triển, quần jean hay còn gọi là quần bò đã trở thành một món đồ rất thông dụng trong tủ quần áo của phái đẹp. Với thiết kế và màu sắc basic, chiếc quần jean dễ dàng mix-match với nhiều trang phục khác nhau kết hợp với họa tiết thêu nhỏ tinh tế sẽ là điểm nhấn để chiếc quần thêm phần trẻ trung, năng động.Quần có thiết kế lợi hại giúp bạn ăn gian chiều cao, đôi chân sẽ trở nên thon dài hơn trong mắt người đối diện. Đặc biệt, nếu bạn sở hữu vòng ba đầy đặn thì đây sẽ là item bạn không thể bỏ lỡ giúp tôn lên lợi thế sẵn có, khéo léo khoe được vòng 2 thon gọn của người mặc.\n\nTrong ảnh, mẫu phối quần cùng áo lụa tay lỡ AHY27, áo linen A180, áo thun A174, outfit mặc đi làm hay đi chơi thì cũng đều đẹp “hết nước chấm”.', 1, 599000.00, 900000.000, 'Quần Baggy Công Sở Cạp Cao\n', '2022-11-22 19:38:59', 1, '2022-11-22 19:38:59', 1, 1),
(32, 12, 4, 'Chân Váy Đen Có Túi Siêu Xinh\n', 'chan-vay-den-co-tui', 'chanvay5.jpg', 'chanvay5.1.jpg', 'chanvay5.2.jpg', 'chanvay5.3.jpg', 'Chân váy chữ A phối túi là một thiết kế mang đến sự trẻ trung, thời trang và năng động cho các cô nàng. Đây chính là món quà, item đặc biệt giúp các quý cô khoe được vẻ đẹp gợi cảm và nữ tính của mình. Chân váy phối cùng áo croptop in hoa AHY40, áo cổ vuông ADM3.', 1, 259000.00, 199000.000, 'Chân Váy Đen Có Túi Siêu Xinh\n', '2022-11-22 19:39:47', 1, '2022-11-22 19:39:48', 1, 1),
(33, 12, 1, 'Chân Váy Cột Nơ Vừa Đẹp Vừa Sang\n', 'chan-vay-cot-no', 'chanvay4.jpg', 'chanvay4.1.jpg', 'chanvay4.2.jpg', 'chanvay4.3.jpg', 'Chân váy có nơ với kiểu dáng ôm sát mang đến cho bạn gái nét trẻ trung, thanh lịch, là trang phục lý tưởng cho các cô nàng khi đến công sở hay xuống phố đi dạo. Váy phối cùng áo sơ mi tay dài AHY69.', 1, 359000.00, 199000.000, 'Chân Váy Cột Nơ Vừa Đẹp Vừa Sang\n', '2022-11-22 19:41:15', 1, '2022-11-22 19:41:15', 1, 1),
(34, 12, 2, 'Chân Váy Hoa Dáng Xòe Nữ Tính\n', 'chan-vay-hoa-dang-xoe', 'chanvay3.jpg', 'chanvay3.1.jpg', 'chanvay3.2.jpg', 'chanvay3.3.jpg', 'Chân váy hoa dáng xòe là lựa chọn hoàn hảo cho những dịp thư giãn, dạo phố hay đi tiệc, tôn lên nét nữ tính và quyến rũ cho người mặc. Sự hòa quyện giữa họa tiết hoa và dáng dài cách điệu tạo nên một phong cách thời trang quyến rũ, đầy cuốn hút và thu hút mọi ánh nhìn.\n\nTrong ảnh, mẫu phối chân váy cùng áo lụa cổ tròn tay ngắn AHY24, áo croptop AHY40, set đồ nhẹ nhàng và nữ tính.', 1, 599000.00, 399000.000, 'Chân Váy Hoa Dáng Xòe Nữ Tính\n', '2022-11-22 19:41:36', 1, '2022-11-22 19:41:36', 1, 1),
(35, 12, 3, 'Chân Váy Xếp Ly Dáng Dài Có Túi\n', 'chan-vay-xep-ly-dang-dai', 'chanvay2.jpg', 'chanvay2.1.jpg', 'chanvay2.2.jpg', 'chanvay2.3.jpg', 'Chân váy xếp ly là món thời trang không bao giờ lỗi mốt. Ưu điểm của item này là sự nổi bật, xen lẫn nét thanh lịch và trang nhã.\n\nÁo sơ mi trắng luôn là “nửa kia” hoàn hảo của chân váy xếp ly. Yêu thích phong cách tối giản thì bạn đừng bỏ qua combo chân váy + áo sơ mi tay ngắn A145 hoặc áo sơ mi tay dài phối ren A157 như mẫu đang mặc. Thao tác sơ vin đóng vai trò quan trọng để nâng tầm outfit và giúp tôn dáng tối ưu.', 1, 479000.00, 399000.000, 'Chân Váy Xếp Ly Dáng Dài Có Túi\n', '2022-11-22 19:41:58', 1, '2022-11-22 19:41:58', 1, 1),
(36, 12, 1, 'Chân Váy Ren Chữ A Công Sở Bắt Mắt\n', 'chan-vay-chu-a-cong-so', 'chanvay1.jpg', 'chanvay1.1.jpg', 'chanvay1.2.jpg', 'chanvay1.3.jpg', 'Nếu đã mang quá nhiều những chiếc váy công sở thông thường thì chân váy chữ A với họa tiết in nổi mới lạ sẽ là một lựa chọn hoàn toàn mới, giúp bạn trở nên thật nổi bật và cuốn hút. Hơn nữa, chân váy với 2 màu trắng đen cơ bản còn rất dễ dàng để phối với mọi kiểu áo mà bạn yêu thích như phối cùng áo linen cổ vuông AHY62, áo lụa phối ren A173.', 1, 799000.00, 599000.000, 'Chân Váy Ren Chữ A Công Sở Bắt Mắt\n', '2022-11-22 19:42:21', 1, '2024-01-21 19:19:08', 1, 1),
(37, 16, 1, 'Áo Polo Cổ Bẻ Tay Ngắn', 'ao-polo-co-be-tay-ngan-trang-den', 'aopolonam2.jpg', 'aopolonam2.1.jpg', 'aopolonam2.2.jpg', 'aopolonam2.3.jpg', 'Áo Polo Cổ Bẻ Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Phối Màu Dáng Vừa Đơn Giản PREMIUM 53\nMã số: #0022750', 1, 379000.00, 199000.000, 'Áo Polo Cổ Bẻ Tay Ngắn', '2022-11-22 19:23:18', 1, '2022-11-22 19:23:18', 1, 1),
(38, 16, 1, 'Áo Polo Cổ Bẻ Tay Ngắn', 'ao-polo-co-be-tay-ngan-trang-xanh', 'aopolonam3.jpg', 'aopolonam3.1.jpg', 'aopolonam3.2.jpg', 'aopolonam3.3.jpg', 'Áo Polo Cổ Bẻ Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Phối Màu Dáng Rộng Đơn Giản Seventy Seven 02\nMã số: #0022707', 1, 379000.00, 199000.000, 'Áo Polo Cổ Bẻ Tay Ngắn', '2022-11-22 19:23:18', 1, '2022-11-22 19:23:18', 1, 1),
(39, 16, 3, 'Áo Polo Cổ Bẻ Tay Ngắn', 'ao-polo-co-be-tay-ngan-den', 'aopolonam4.jpg', 'aopolonam4.1.jpg', 'aopolonam4.2.jpg', 'aopolonam4.3.jpg', 'Áo Polo Cổ Bẻ Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Trơn Dáng Vừa Đơn Giản PREMIUM 54\nMã số: #0022745', 1, 379000.00, 199000.000, 'Áo Polo Cổ Bẻ Tay Ngắn', '2022-11-22 19:23:18', 1, '2022-11-22 19:23:18', 1, 1),
(40, 16, 1, 'Áo Polo Cổ Bẻ Tay Ngắn Cá Sấu', 'ao-polo-co-be-ca-sau', 'aopolonam6.jpg', 'aopolonam6.1.jpg', 'aopolonam6.2.jpg', 'aopolonam6.3.jpg', 'Áo Polo Cổ Bẻ Tay Ngắn Cá Sấu 4 chiều Nhanh Khô Phối Màu Dáng Vừa Đơn Giản PREMIUM 28\nMã số: #0022571', 1, 279000.00, 159000.000, 'Áo Polo Cổ Bẻ Cá Sấu', '2022-11-22 19:23:18', 1, '2022-11-22 19:23:18', 1, 1),
(41, 16, 1, 'Áo Polo Cổ Bẻ Tay Ngắn', 'ao-polo-co-be-tay-ngan-7', 'aopolonam7.jpg', 'aopolonam7.1.jpg', 'aopolonam7.2.jpg', 'aopolonam7.3.jpg', 'Áo Polo Cổ Bẻ Tay Ngắn Vải Cotton 2 Chiều Thân Thiện Da Monogram Dáng Vừa Đơn Giản PREMIUM 23\nÁo Polo Cổ Bẻ Tay Ngắn Vải Cotton 2 Chiều Thân Thiện Da Monogram Dáng Vừa Đơn Giản PREMIUM 23\nÁo Polo Cổ Bẻ Tay Ngắn Vải Cotton 2 Chiều Thân Thiện Da Monogram Dáng Vừa Đơn Giản PREMIUM 23\nÁo Polo Cổ Bẻ Tay Ngắn Vải Cotton 2 Chiều Thân Thiện Da Monogram Dáng Vừa Đơn Giản PREMIUM 23\nÁo Polo Cổ Bẻ Tay Ngắn Vải Cotton 2 Chiều Thân Thiện Da Monogram Dáng Vừa Đơn Giản PREMIUM 23\nÁo Polo Cổ Bẻ Tay Ngắn Vải Cotton 2 Chiều Thân Thiện Da Monogram Dáng Vừa Đơn Giản PREMIUM 23\nMã số: #0022544', 1, 279000.00, 149000.000, 'Áo Polo Cổ Bẻ Tay Ngắn', '2022-11-22 19:23:18', 1, '2022-11-22 19:23:18', 1, 1),
(42, 16, 1, 'Áo Polo Cổ Bẻ Tay Ngắn', 'ao-polo-co-be-tay-ngan-8', 'aopolonam8.jpg', 'aopolonam8.1.jpg', 'aopolonam8.2.jpg', 'aopolonam8.3.jpg', 'Áo Polo Cổ Bẻ Tay Ngắn Sợi Nhân Tạo Thoáng Mát Phối Màu Dáng Rộng BST Thiết Kế SPEED 23\nMã số: #0022338', 1, 299000.00, 149000.000, 'Áo Polo Cổ Bẻ Tay Ngắn', '2022-11-22 19:23:18', 1, '2022-11-22 19:23:18', 1, 1),
(43, 16, 4, 'Áo Polo Cổ Bẻ Tay Ngắn', 'ao-polo-co-be-tay-ngan-9', 'aopolonam9.jpg', 'aopolonam9.1.jpg', 'aopolonam9.2.jpg', 'aopolonam9.3.jpg', 'Chất lượng vải cao cấp, mát mẻ', 1, 299000.00, 179000.000, 'Áo polo pe', '2022-11-22 19:23:18', 1, '2022-11-22 19:23:18', 1, 1),
(44, 16, 1, 'Áo Polo Cổ Bẻ Tay Ngắn', 'ao-polo-co-be-tay-ngan-10', 'aopolonam10.jpg', 'aopolonam10.1.jpg', 'aopolonam10.2.jpg', 'aopolonam10.3.jpg', 'Chất lượng vải cao cấp, mát mẻ', 1, 299000.00, 179000.000, 'Áo polo vàng', '2022-11-22 19:23:18', 1, '2022-11-22 19:23:18', 1, 1),
(45, 16, 1, 'Áo Polo Cổ Bẻ Tay Ngắn', 'ao-polo-co-be-tay-ngan-11', 'aopolonam11.jpg', 'aopolonam11.1.jpg', 'aopolonam11.2.jpg', 'aopolonam11.3.jpg', 'Chất lượng vải cao cấp, mát mẻ', 1, 399000.00, 279000.000, 'Áo polo xọc X', '2022-11-22 19:23:18', 1, '2022-11-22 19:23:18', 1, 1),
(46, 16, 4, 'Áo Polo Cổ Bẻ Tay Ngắn', 'ao-polo-co-be-tay-ngan-trang', 'aopolonam5.jpg', 'aopolonam5.1.jpg', 'aopolonam5.2.jpg', 'aopolonam5.3.jpg', 'Áo Polo Cổ Bẻ Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Trơn Dáng Vừa Đơn Giản PREMIUM 54\nÁo Polo Cổ Bẻ Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Trơn Dáng Vừa Đơn Giản PREMIUM 54\nÁo Polo Cổ Bẻ Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Trơn Dáng Vừa Đơn Giản PREMIUM 54\nÁo Polo Cổ Bẻ Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Trơn Dáng Vừa Đơn Giản PREMIUM 54\nÁo Polo Cổ Bẻ Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Trơn Dáng Vừa Đơn Giản PREMIUM 54\nÁo Polo Cổ Bẻ Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Trơn Dáng Vừa Đơn Giản PREMIUM 54\nMã số: #0022746', 1, 399000.00, 279000.000, 'Áo Polo Cổ Bẻ Tay Ngắn', '2022-11-22 19:23:18', 1, '2022-11-22 19:23:18', 1, 1),
(47, 17, 1, 'Áo Thun Gân Croptop Tay Dài\n', 'ao-thun-gan-croptop', 'aothunnu1.jpg', 'aothunnu1.1.jpg', 'aothunnu1.2.jpg', 'aothunnu1.3.jpg', 'Tín đồ croptop sẽ không thể bỏ qua item siêu xịn xò này, form chuẩn, màu áo nâng tông da, chất thun mịn lạnh mặc vào cảm giác dễ chịu. Bạn có thể phối cùng quần jeans, quần unisex hay đều rất ổn.\n\nTrong ảnh, mẫu phối áo cùng quần dài QHY03 và quần short QS01.', 1, 399000.00, 279000.000, 'Áo Thun Gân Croptop Tay Dài\n', '2022-11-22 19:23:18', 1, '2022-11-22 19:23:18', 1, 1),
(48, 17, 4, 'Áo Len Mỏng Cộc Tay Form Dài\n', 'ao-len-mong-coc-tay', 'aothunnu2.jpg', 'aothunnu2.1.jpg', 'aothunnu2.2.jpg', 'aothunnu2.3.jpg', 'Chẳng gì ngọt ngào và dễ thương hơn những chiếc áo len mỏng trong những ngày se se lạnh. Đơn giản, tinh tế, áo len mỏng giúp bạn có một vẻ ngoài thật nữ tính. Nhưng nó cũng giúp bạn tránh được những cơn gió heo may bất chợt, mà lại rất khéo hòa hợp, không khiến bạn bị nóng bức dưới cái nắng hanh khô.\n\nBên cạnh đó, áo len mỏng còn rất dễ mix với các kiểu trang phục khác nhau, từ đồ công sở với quần âu, váy bút chì, cho tới đồ đi chơi với quần short đính nút QS28, chân váy chữ A V34 như mẫu đang mặc, hứa hẹn sẽ là sét bộ hack dáng hack tuổi khi nàng diện lên mình.', 1, 399000.00, 279000.000, 'Áo Len Mỏng Cộc Tay Form Dài\n', '2022-11-22 19:23:18', 1, '2022-11-22 19:23:18', 1, 1),
(49, 17, 1, 'Áo Thun Trễ Vai Tay Dài Mềm Mịn\n', 'ao-thun-tre-vai-tay-dai', 'aothunnu3.jpg', 'aothunnu3.1.jpg', 'aothunnu3.2.jpg', 'aothunnu3.3.jpg', 'Áo trễ vai có thiết kế tay dài, phối xoắn eo, tạo cảm giác “nửa kín nửa hở”, vừa khoe được bờ vai gợi cảm mà không gây phản cảm.\n\nÁo có màu sắc nổi, có thể kết hợp cùng các trang phục khác có gam màu tối, sáng đều được. Trong ảnh, mẫu phối áo cùng chân váy V51 và quần dài QHY18.', 1, 299000.00, 279000.000, 'Áo Thun Trễ Vai Tay Dài Mềm Mịn\n', '2022-11-22 19:23:18', 1, '2022-11-22 19:23:18', 1, 1),
(50, 17, 4, 'Áo Len Croptop Cộc Tay Xinh\n', 'ao-len-croptop-long-min', 'aothunnu4.jpg', 'aothunnu4.1.jpg', 'aothunnu4.2.jpg', 'aothunnu4.3.jpg', 'Nếu bạn đã quá nhàm chán với những chiếc áo len dày cộm, khó phối thì hãy thử qua áo len cộc tay với chất liệu len lông mịn, mẫu áo mới độc lạ, đang được giới sành mặc yêu thích.\n\nVới chất liệu len lông mịn, kiểu dáng thời trang, nàng có thể tự tin phối áo cùng quần short phối nút QS26, chân váy chữ A V34 hoặc quần giả váy VHY12 như mẫu đang mặc, giúp nàng trở thành cô gái sành mặc và ghi điểm sành điệu ngay tức khắc.', 1, 299000.00, 279000.000, 'Áo Len Croptop Cộc Tay Xinh Như Gái Hàn\n', '2022-11-22 19:23:18', 1, '2022-11-22 19:23:18', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topic`
--

CREATE TABLE `topic` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã chủ đề',
  `name` varchar(255) NOT NULL COMMENT 'Tên chủ đề',
  `slug` varchar(255) NOT NULL COMMENT 'Slug tên chủ đề',
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Sắp xếp',
  `description` varchar(255) NOT NULL COMMENT 'Từ khóa SEO',
  `created_at` datetime NOT NULL COMMENT 'Ngày tạo',
  `created_by` tinyint(3) UNSIGNED NOT NULL COMMENT 'Người tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày sửa',
  `updated_by` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Người sửa',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `topic`
--

INSERT INTO `topic` (`id`, `name`, `slug`, `sort_order`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Tin tức', 'tin-tuc', 1, 'Từ khóa SEO', '2020-07-03 16:14:39', 1, '2020-07-03 16:14:39', 1, 1),
(2, 'Dịch vụ', 'dich-vu', 2, 'Từ khóa SEO', '2020-07-03 16:14:39', 1, '2020-07-03 16:14:39', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã tài khoản',
  `name` varchar(100) NOT NULL COMMENT 'Họ và tên',
  `username` varchar(100) NOT NULL COMMENT 'Tên đăng nhâp',
  `password` varchar(64) NOT NULL COMMENT 'Mật khẩu',
  `email` varchar(100) NOT NULL COMMENT 'Email',
  `gender` tinyint(3) UNSIGNED NOT NULL COMMENT 'Giới tính',
  `phone` varchar(11) NOT NULL COMMENT 'Điện thoại',
  `image` varchar(100) NOT NULL COMMENT 'Hình',
  `roles` varchar(50) NOT NULL DEFAULT '0' COMMENT 'Quyền truy cập',
  `address` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` tinyint(3) UNSIGNED NOT NULL COMMENT 'Người tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày sửa',
  `updated_by` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Người sửa',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `email`, `gender`, `phone`, `image`, `roles`, `address`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Quản trị', 'admin', '011c945f30ce2cbafc452f39840f025693339c42', 'admin@gmail.com', 1, '0987654367', 'admin.jpg', '1', 'Hồ Chí Minh', '2020-07-01 00:16:03', 1, '2022-11-21 21:37:14', 0, 1),
(2, 'Khách hàng', 'khachhang', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'khachhang@gmail.com', 1, '0987654367', 'khachhang.jpg', '0', 'Hồ Chí Minh', '2020-07-01 00:16:03', 1, '2022-11-21 20:36:23', 1, 2),
(6, 'Khách hàng1', 'khachhang1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'khachhang1@gmail.com', 1, '0987654367', 'khachhang.jpg', '0', 'Hồ Chí Minh', '2020-07-01 00:16:03', 1, '2022-11-21 20:36:23', 1, 2),
(19, 'Nguyễn Thành An', 'an', '356a192b7913b04c54574d18c28d46e6395428ab', 'an2121110226@gmail.com', 1, '0369287321', 'default.jpg', '0', 'BĐ', '2024-04-05 05:58:57', 1, NULL, NULL, 1),
(20, 'dung', 'dfffff', '$2y$10$g.EMKuS5vSb/SOZSHbjbHeplNCi5Q/SfTKsg.oIZH0yldge2nImLG', 'sddd@gmail', 0, '09390333', 'default.jpg', '0', 'fsdfsf', '2024-04-07 14:37:58', 1, '2024-04-07 21:42:20', 1, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã Slider', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã Loại', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã Loại', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã Menu', AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng', AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã CT Đơn hàng', AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã bài viết', AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm', AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã chủ đề', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã tài khoản', AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
