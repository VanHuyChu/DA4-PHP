-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 18, 2021 lúc 06:29 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vietpro-store2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_menu_items`
--

CREATE TABLE `admin_menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` bigint(20) UNSIGNED NOT NULL,
  `depth` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_menu_items`
--

INSERT INTO `admin_menu_items` (`id`, `label`, `link`, `parent`, `sort`, `class`, `menu`, `depth`, `created_at`, `updated_at`) VALUES
(1, 'Trang chủ', 'http://localhost:8000/VIETPRO-STORE-2/public', 0, 0, NULL, 1, 0, '2021-06-17 21:03:39', '2021-06-17 21:26:13'),
(2, 'Cửa hàng', 'http://localhost:8000/VIETPRO-STORE-2/public/danh-sach-san-pham', 0, 1, NULL, 1, 0, '2021-06-17 21:03:58', '2021-06-17 21:04:24'),
(3, 'Giới thiệu', 'http://localhost:8000/VIETPRO-STORE-2/public/contact', 0, 2, NULL, 1, 0, '2021-06-17 21:04:24', '2021-06-17 21:04:26'),
(4, 'Giỏ hàng', 'http://localhost:8000/VIETPRO-STORE-2/public/gio-hang', 0, 3, NULL, 1, 0, '2021-06-17 21:17:39', '2021-06-17 21:17:39');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_menu_items_menu_foreign` (`menu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  ADD CONSTRAINT `admin_menu_items_menu_foreign` FOREIGN KEY (`menu`) REFERENCES `admin_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
