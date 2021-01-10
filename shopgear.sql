-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.22 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for shopgear
CREATE DATABASE IF NOT EXISTS `shopgear` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `shopgear`;

-- Dumping structure for table shopgear.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopgear.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table shopgear.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopgear.migrations: ~12 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_11_10_152813_create_tbl_admin_table', 1),
	(5, '2020_11_10_182158_create_tbl_category_product', 2),
	(6, '2020_11_11_051821_create_tbl_brand_product', 3),
	(7, '2020_11_11_054851_create_tbl_product', 4),
	(8, '2020_11_14_122826_tbl_customer', 5),
	(9, '2020_11_14_132820_tbl_shipping', 6),
	(10, '2020_11_14_155419_tbl_payment', 7),
	(11, '2020_11_14_155700_tbl_order', 7),
	(12, '2020_11_14_155745_tbl_order-details', 7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table shopgear.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopgear.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table shopgear.tbl_admin
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopgear.tbl_admin: ~1 rows (approximately)
DELETE FROM `tbl_admin`;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` (`admin_id`, `created_at`, `updated_at`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`) VALUES
	(1, '2020-11-10 22:57:01', '2020-11-10 22:56:58', 'tranphilong047@gmail.com', '123456', 'Phi Long', '0382965484');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;

-- Dumping structure for table shopgear.tbl_brand_product
CREATE TABLE IF NOT EXISTS `tbl_brand_product` (
  `brand_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `brand_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `brand_status` int DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`brand_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopgear.tbl_brand_product: ~11 rows (approximately)
DELETE FROM `tbl_brand_product`;
/*!40000 ALTER TABLE `tbl_brand_product` DISABLE KEYS */;
INSERT INTO `tbl_brand_product` (`brand_id`, `created_at`, `updated_at`, `brand_name`, `brand_desc`, `brand_status`, `meta_keywords`) VALUES
	(2, NULL, NULL, 'MSI', '<p>Laptop&nbsp;<em>MSI</em>&nbsp;GL, GV, GE, GS, GT, PE, PX dẫn đầu về hiệu năng cho game thủ, thiết kế mạnh mẽ, đậm chất game mang lại trải nghiệm tuyệt vời cho bạn.</p>', 1, '<p>MSI, laptop MSI, laptop gaming</p>'),
	(3, NULL, NULL, 'Asus', 'ASUS là thương hiệu gaming và bo mạch chủ Số 1 thế giới, ...', 1, NULL),
	(4, NULL, NULL, 'Acer', 'Acer là nhà sản xuất máy tính lớn thứ 3 thế giới.', 1, NULL),
	(5, NULL, NULL, 'DELL', 'Dell tập trung vào dòng sản phẩm máy tính cá nhân', 1, NULL),
	(6, NULL, NULL, 'LENOVO', 'Levono đa dạng sản phẩm từ latop phổ thông, laptop gaming, laptop cap cấp.', 1, NULL),
	(7, NULL, NULL, 'RΛZΞR', 'Một trong những công ty phát triển nhất về sản phẩm gaming gear mang lại cho game thủ nói riêng và người dùng nói chung', 1, NULL),
	(8, NULL, NULL, 'Corsair', '<p>Cũng l&agrave; một trong những thương hiệu kh&aacute; nổi tiếng hiện nay &ndash; Corsair lu&ocirc;n mang tới một trải nghiệm ho&agrave;n hảo v&agrave; tuyệt vời d&agrave;nh cho người sử dụng</p>', 0, '<p>Corsair</p>'),
	(9, NULL, NULL, 'Intel', 'Intel việt nam', 1, NULL),
	(10, NULL, NULL, 'AMD', 'AMD việt nam', 1, NULL),
	(11, NULL, NULL, 'GIGABYTE', '<p><span style="color:#3498db"><em>Gigabyte</em></span>&nbsp;l&agrave; một trong những nh&agrave; sản xuất bo mạch chủ h&agrave;ng đầu thế giới. Đ&acirc;y cũng l&agrave; nh&agrave; sản xuất ti&ecirc;n phong trong việc x&acirc;y dựng v&agrave; &aacute;p dụng c&aacute;c c&ocirc;ng nghệ&nbsp;...</p>', 1, '<p><strong>Gigabyte, chuột gaming, b&agrave;n ph&iacute;m gaming, ghế gaming</strong></p>'),
	(12, NULL, NULL, 'Samsung', 'Samsung việt nam', 1, NULL);
/*!40000 ALTER TABLE `tbl_brand_product` ENABLE KEYS */;

-- Dumping structure for table shopgear.tbl_category_product
CREATE TABLE IF NOT EXISTS `tbl_category_product` (
  `category_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category_status` int DEFAULT NULL,
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopgear.tbl_category_product: ~6 rows (approximately)
DELETE FROM `tbl_category_product`;
/*!40000 ALTER TABLE `tbl_category_product` DISABLE KEYS */;
INSERT INTO `tbl_category_product` (`category_id`, `meta_keywords`, `created_at`, `updated_at`, `category_name`, `category_desc`, `category_status`) VALUES
	(11, '<p>laptop văn ph&ograve;ng,laptop gaming,laptop</p>', '2020-11-15 12:34:15', '2020-11-15 12:34:16', 'LapTop', '<p>Mua&nbsp;<em>laptop</em>, m&aacute;y t&iacute;nh x&aacute;ch tay ch&iacute;nh h&atilde;ng thương hiệu uy t&iacute;n HP, Dell, Asus, Lenovo, Acer ... ✓Giao h&agrave;ng nhanh chỉ trong 1h ✓Cho ph&eacute;p đổi trả ✓Bảo h&agrave;nh&nbsp;...</p>', 1),
	(12, 'PC gaming', '2020-11-15 12:34:23', '2020-11-15 12:34:17', 'PC Gaming', 'PC cấu hình tùy chọn, chiến mọi loại game, giá cả không là vấn đề', 1),
	(13, 'Màn hình máy tính', '2020-11-15 12:34:22', '2020-11-15 12:34:17', 'Màn hình', 'Đủ mọi kích thước, siêu nét, siêu mỏng, siêu bền, giá thành rẻ', 1),
	(14, 'chuột,bàn phím,tai nghe,phụ kiện máy tính', '2020-11-15 12:34:21', '2020-11-15 12:34:18', 'Linh kiện', 'tất cả mọi linh kiện máy tính đều có đầy đủ', 1),
	(16, 'ghế gaming,ghế chơi game,ghế stream', '2020-11-15 12:34:20', '2020-11-15 12:34:19', 'Gaming CHAIR', 'Cảm giác tốt, bền bỉ, nhiều mẫu mã màu sắc', 1),
	(18, '<p><em>Gaming Gears</em>. Balo Gaming Balo Gaming B&agrave;n di chuột B&agrave;n di chuột B&agrave;n ph&iacute;m Gaming B&agrave;n ph&iacute;m Gaming B&agrave;n, Ghế Game B&agrave;n, Ghế Game Chuột Gaming&nbsp;...</p>', '2020-11-20 20:58:47', '2020-11-20 20:58:47', 'Gaming Gear', '<p><em>Gaming Gear</em>&nbsp;ch&iacute;nh h&atilde;ng tốt, gi&aacute; rẻ nhất, thiết bị chơi game: Chuột chơi game, b&agrave;n ph&iacute;m cơ, tai nghe game thủ, card đồ họa, m&agrave;n h&igrave;nh...Ph&acirc;n t&iacute;ch &amp; đ&aacute;nh gi&aacute; chi&nbsp;...</p>', 0);
/*!40000 ALTER TABLE `tbl_category_product` ENABLE KEYS */;

-- Dumping structure for table shopgear.tbl_coupon
CREATE TABLE IF NOT EXISTS `tbl_coupon` (
  `coupon_id` bigint NOT NULL AUTO_INCREMENT,
  `coupon_name` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `coupon_code` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `coupon_time` int DEFAULT NULL,
  `coupon_number` int DEFAULT NULL,
  `coupon_condition` int DEFAULT NULL,
  PRIMARY KEY (`coupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table shopgear.tbl_coupon: ~3 rows (approximately)
DELETE FROM `tbl_coupon`;
/*!40000 ALTER TABLE `tbl_coupon` DISABLE KEYS */;
INSERT INTO `tbl_coupon` (`coupon_id`, `coupon_name`, `coupon_code`, `coupon_time`, `coupon_number`, `coupon_condition`) VALUES
	(2, 'Mã giảm giá  24/12', 'NOEN2412', 10, 10000000, 2),
	(3, 'Mã giảm giá 12/12', 'SANQUA1212', 10, 20, 1),
	(4, 'giảm hiên máu', 'KKKK', 10, 10000000, 2);
/*!40000 ALTER TABLE `tbl_coupon` ENABLE KEYS */;

-- Dumping structure for table shopgear.tbl_customers
CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `customer_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopgear.tbl_customers: ~5 rows (approximately)
DELETE FROM `tbl_customers`;
/*!40000 ALTER TABLE `tbl_customers` DISABLE KEYS */;
INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `created_at`, `updated_at`) VALUES
	(2, 'Trần Phi Long', 'tranphilong047@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0382965484', '2020-11-14 21:25:27', '2020-11-14 21:25:27'),
	(3, 'Trần Đại Thắng', 'daithang@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456789', '2020-11-15 00:28:10', '2020-11-15 00:28:10'),
	(4, 'ddd', 'hynhhynh.002000@gmail.com', '497ac428df99aad40acd31d6a6c336b6', '0917139074', '2020-11-17 10:45:03', '2020-11-17 10:45:03'),
	(5, 'Long trần', 'longtran@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0382965484', '2020-11-20 20:43:21', '2020-11-20 20:43:21'),
	(6, 'minh', 'van@gmail.com', '202cb962ac59075b964b07152d234b70', '123', '2020-11-26 06:44:42', '2020-11-26 06:44:42');
/*!40000 ALTER TABLE `tbl_customers` ENABLE KEYS */;

-- Dumping structure for table shopgear.tbl_order
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint unsigned NOT NULL,
  `shipping_id` bigint unsigned NOT NULL,
  `order_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopgear.tbl_order: ~3 rows (approximately)
DELETE FROM `tbl_order`;
/*!40000 ALTER TABLE `tbl_order` DISABLE KEYS */;
INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `order_status`, `created_at`, `updated_at`) VALUES
	(139, 6, 48, 'Đang chờ xử lý', '2020-11-26 06:49:02', '2020-11-26 06:49:02'),
	(140, 6, 48, 'Đang chờ xử lý', '2020-11-26 09:01:27', '2020-11-26 09:01:27'),
	(141, 2, 49, 'Đang chờ xử lý', '2020-11-26 13:39:14', '2020-11-26 13:39:14');
/*!40000 ALTER TABLE `tbl_order` ENABLE KEYS */;

-- Dumping structure for table shopgear.tbl_order_details
CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `order_details_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `product_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` int NOT NULL,
  `product_coupon` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_details_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopgear.tbl_order_details: ~6 rows (approximately)
DELETE FROM `tbl_order_details`;
/*!40000 ALTER TABLE `tbl_order_details` DISABLE KEYS */;
INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `product_coupon`, `created_at`, `updated_at`) VALUES
	(109, 139, 50, 'Xbox One S', '1790000', 4, 20, '2020-11-26 06:49:02', '2020-11-26 06:49:02'),
	(110, 139, 52, 'Blackwidow V3 Pro', '5990000', 1, 20, '2020-11-26 06:49:02', '2020-11-26 06:49:02'),
	(111, 140, 50, 'Xbox One S', '1790000', 4, 20, '2020-11-26 09:01:27', '2020-11-26 09:01:27'),
	(112, 140, 52, 'Blackwidow V3 Pro', '5990000', 1, 20, '2020-11-26 09:01:27', '2020-11-26 09:01:27'),
	(113, 140, 55, 'AoRus', '1000000000', 1, 20, '2020-11-26 09:01:27', '2020-11-26 09:01:27'),
	(114, 141, 55, 'AoRus', '1000000000', 2, 20, '2020-11-26 13:39:14', '2020-11-26 13:39:14');
/*!40000 ALTER TABLE `tbl_order_details` ENABLE KEYS */;

-- Dumping structure for table shopgear.tbl_product
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `product_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_price` float DEFAULT NULL,
  `product_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_status` int DEFAULT NULL,
  `product_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`product_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopgear.tbl_product: ~28 rows (approximately)
DELETE FROM `tbl_product`;
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` (`product_id`, `created_at`, `updated_at`, `category_id`, `brand_id`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `product_name`) VALUES
	(27, '2020-11-12 17:06:19', '2020-11-12 17:06:20', 11, 2, 'LAPTOP GAMING MSI GF63 THIN 10SCX 292VN GEFORCE GTX1650 4GB INTEL CORE I5 10300H 8GB 512GB 15.6” IPS BACKLIGHT KEYBOARD WIN 10', 'LAPTOP GAMING MSI GF63 THIN 10SCX 292VN GEFORCE GTX1650 4GB INTEL CORE I5 10300H 8GB 512GB 15.6” IPS BACKLIGHT KEYBOARD WIN 10', 19490000, 'GF6318.jpg', 1, 'MSI GF63'),
	(28, '2020-11-12 17:06:18', '2020-11-12 17:06:21', 11, 2, 'LAPTOP GAMING MSI GL65 LEOPARD 10SEK 235VN GEFORCE RTX 2060 6GB INTEL CORE I7 10750H 16GB 1TB 15.6” FHD 144HZ IPS PERKEY MULTICOLOR WIN 10', 'LAPTOP GAMING MSI GL65 LEOPARD 10SEK 235VN GEFORCE RTX 2060 6GB INTEL CORE I7 10750H 16GB 1TB 15.6” FHD 144HZ IPS PERKEY MULTICOLOR WIN 10', 34990000, 'gl6528.jpg', 1, 'MSI GL65'),
	(29, '2020-11-12 17:06:18', '2020-11-12 17:06:21', 11, 2, 'LAPTOP GAMING MSI GE75 RAIDER 10SFS 270VN RTX2070 SUPER 8GB INTEL CORE I9 10980HK 16GB HDD 1TB SSD 512GB 17.3″ IPS 240HZ 3MS PERKEY RGB WIN 10', 'LAPTOP GAMING MSI GE75 RAIDER 10SFS 270VN RTX2070 SUPER 8GB INTEL CORE I9 10980HK 16GB HDD 1TB SSD 512GB 17.3″ IPS 240HZ 3MS PERKEY RGB WIN 10', 63490000, 'GE7538.jpg', 1, 'MSI GE75'),
	(30, '2020-11-12 17:06:17', '2020-11-12 17:06:22', 11, 2, 'LAPTOP GAMING MSI BRAVO 17 A4DDR 200VN RADEON RX5500M RYZEN 5 4600H 8GB 512GB 17.3” IPS 144HZ BACKLIGHT KEYBOARD WIN 10', 'LAPTOP GAMING MSI BRAVO 17 A4DDR 200VN RADEON RX5500M RYZEN 5 4600H 8GB 512GB 17.3” IPS 144HZ BACKLIGHT KEYBOARD WIN 10', 23990000, 'Bravo71.jpg', 1, 'MSI BRAVO 17'),
	(31, '2020-11-12 17:06:15', '2020-11-12 17:06:23', 11, 4, 'LAPTOP ACER NITRO 5 2020 AN515-55-55E3 GEFORCE RTX 2060 6GB INTEL CORE I5 10300H 16GB 512GB 15.6″ 144HZ IPS RGB WIN 10', 'LAPTOP ACER NITRO 5 2020 AN515-55-55E3 GEFORCE RTX 2060 6GB INTEL CORE I5 10300H 16GB 512GB 15.6″ 144HZ IPS RGB WIN 10', 28990000, 'AN51560.jpg', 1, 'ACER NITRO 5 2020'),
	(32, '2020-11-12 17:06:16', '2020-11-12 17:06:23', 11, 4, 'LAPTOP GAMING ACER ASPIRE 7 A715-41G-R150 GTX 1650TI 4GB RYZEN 7 3750H 8GB 512GB 15.6 FHD IPS WIN 10', 'LAPTOP GAMING ACER ASPIRE 7 A715-41G-R150 GTX 1650TI 4GB RYZEN 7 3750H 8GB 512GB 15.6 FHD IPS WIN 10', 19990000, 'aspire73.png', 1, 'ACER ASPIRE 7'),
	(33, '2020-11-12 17:06:14', '2020-11-12 17:06:24', 11, 5, 'LAPTOP DELL GAMING G3 15 3500 (G3500B) GEFORCE GTX 1660TI 6GB INTEL CORE I7 10750H 512GB 16GB 15.6 FHD IPS 120HZ WIN 10', 'LAPTOP DELL GAMING G3 15 3500 (G3500B) GEFORCE GTX 1660TI 6GB INTEL CORE I7 10750H 512GB 16GB 15.6 FHD IPS 120HZ WIN 10', 29490000, 'Dell-G398.jpg', 1, 'DELL GAMING G3'),
	(34, '2020-11-12 17:06:13', '2020-11-12 17:06:25', 11, 5, 'LAPTOP DELL G5 5500 (70225484) GEFORCE RTX 2070 8GB INTEL CORE I7 10750H 1TB 16GB 15.6 FHD IPS 300HZ 4-ZONES RGB WIN 10', 'LAPTOP DELL G5 5500 (70225484) GEFORCE RTX 2070 8GB INTEL CORE I7 10750H 1TB 16GB 15.6 FHD IPS 300HZ 4-ZONES RGB WIN 10', 39990000, 'Dell-g546.jpg', 1, 'LAPTOP DELL G5 5500'),
	(35, '2020-11-12 17:06:12', '2020-11-12 17:06:25', 11, 5, 'LAPTOP DELL G7 INSPIRON 7591 N5I5591W SILVER GEFORCE GTX1050 3GB INTEL CORE I5 93000H 8GB 256GB 15.6 IPS', 'LAPTOP DELL G7 INSPIRON 7591 N5I5591W SILVER GEFORCE GTX1050 3GB INTEL CORE I5 93000H 8GB 256GB 15.6 IPS', 24990000, 'dell-g718.jpg', 1, 'LAPTOP DELL G7 INSPIRON'),
	(36, '2020-11-12 17:06:11', '2020-11-12 17:06:26', 13, 11, 'MÀN HÌNH CONG 27″ GIGABYTE G27FC FULLHD 165HZ 1MS MPRT G-SYNC COMPATIBLE', 'MÀN HÌNH CONG 27″ GIGABYTE G27FC FULLHD 165HZ 1MS MPRT G-SYNC COMPATIBLE', 5950000, 'G27QC30.jpg', 1, 'MÀN HÌNH CONG 27″'),
	(37, '2020-11-12 17:06:11', '2020-11-12 17:06:27', 11, 3, 'LAPTOP ASUS ROG STRIX G15 G512L-WAZ114T GEFORCE RTX 2070 8GB INTEL CORE I7 10750H 16GB 1TB 15.6″ 240HZ IPS 4-ZONE RGB WIN 10', 'LAPTOP ASUS ROG STRIX G15 G512L-WAZ114T GEFORCE RTX 2070 8GB INTEL CORE I7 10750H 16GB 1TB 15.6″ 240HZ IPS 4-ZONE RGB WIN 10', 41999000, 'G5120.jpg', 1, 'ASUS ROG STRIX G15'),
	(38, '2020-11-12 17:06:10', '2020-11-12 17:06:27', 12, 10, 'PC GIRY7 RYZEN 7 3700X 8GB GTX1650 DDR6 4GB 120GB SSD', 'PC GIRY7 RYZEN 7 3700X 8GB GTX1650 DDR6 4GB 120GB SSD', 18490000, 'Giry7_5532.jpg', 1, 'PC GIRY7 RYZEN 7'),
	(39, '2020-11-12 17:06:08', '2020-11-12 17:06:30', 11, 2, 'LAPTOP GAMING MSI GS66 STEALTH 10SE 407VN RTX2060 6GB INTEL CORE I7 10750H 16GB 512GB 15.6″ IPS 240HZ PERKEY RGB WIN 10', 'LAPTOP GAMING MSI GS66 STEALTH 10SE 407VN RTX2060 6GB INTEL CORE I7 10750H 16GB 512GB 15.6″ IPS 240HZ PERKEY RGB WIN 10', 43490000, 'GS6675.jpg', 1, 'LAPTOP GAMING MSI GS66'),
	(40, '2020-11-12 17:06:09', '2020-11-12 17:06:28', 11, 3, 'LAPTOP ASUS ROG ZEPHYRUS DUO 15 GX550LXS-HC055R RTX 2080 SUPER 8GB MAXQ INTEL CORE I9 10980HK 32GB 2TB SSD 15.6” IPS UHD PERKEY WIN 10', 'LAPTOP ASUS ROG ZEPHYRUS DUO 15 GX550LXS-HC055R RTX 2080 SUPER 8GB MAXQ INTEL CORE I9 10980HK 32GB 2TB SSD 15.6” IPS UHD PERKEY WIN 10', 119990000, 'GX55040.jpg', 1, 'LAPTOP ASUS ROG ZEPHYRUS'),
	(41, '2020-11-12 17:06:08', '2020-11-12 17:06:32', 11, 6, 'LAPTOP LENOVO IDEAPAD GAMING 3 15IMH05 (81Y40067VN) GEFORCE GTX1650 4GB INTEL CORE I7 10750H 8GB 512GB 15.6” IPS BACKLIGHT KEYBOARD WIN 10', 'LAPTOP LENOVO IDEAPAD GAMING 3 15IMH05 (81Y40067VN) GEFORCE GTX1650 4GB INTEL CORE I7 10750H 8GB 512GB 15.6” IPS BACKLIGHT KEYBOARD WIN 10', 21990000, 'ideapad58.jpg', 1, 'LENOVO IDEAPAD GAMING 3'),
	(42, '2020-11-12 17:06:07', '2020-11-12 17:06:32', 11, 6, 'LAPTOP LENOVO LEGION 7 15IMHG05 (81YU007JVN) GEFORCE RTX 2060 6GB INTEL CORE I7 10875H 16GB 1TB 15.6″ 144HZ IPS HDR RGB WIN 10', 'LAPTOP LENOVO LEGION 7 15IMHG05 (81YU007JVN) GEFORCE RTX 2060 6GB INTEL CORE I7 10875H 16GB 1TB 15.6″ 144HZ IPS HDR RGB WIN 10', 54990000, 'lenovo38.jpg', 1, 'LAPTOP LENOVO LEGION 7'),
	(43, '2020-11-12 17:06:06', '2020-11-12 17:06:33', 11, 4, 'LAPTOP ACER PREDATOR HELIOS 700 PH717-71-95RU GEFORCE RTX2080 8GB INTEL CORE I9 9980HK 32GB 2TB SSD 17.3″ FHD 144HZ G-SYNC IPS WIN10', 'LAPTOP ACER PREDATOR HELIOS 700 PH717-71-95RU GEFORCE RTX2080 8GB INTEL CORE I9 9980HK 32GB 2TB SSD 17.3″ FHD 144HZ G-SYNC IPS WIN10', 69990000, 'Predator-Helios-799.jpg', 1, 'ACER PREDATOR HELIOS 700'),
	(44, '2020-11-12 17:06:06', '2020-11-12 17:06:33', 11, 4, 'LAPTOP ACER PREDATOR TRITON 500 PT515-52-72U2 NH.Q6WSV.001 RTX 2080 SUPER 8GB INTEL CORE I7 10875H 32GB 1TB 15.6FHD IPS 300HZ G-SYNC PERKEY RGB WIN 10', 'LAPTOP ACER PREDATOR TRITON 500 PT515-52-72U2 NH.Q6WSV.001 RTX 2080 SUPER 8GB INTEL CORE I7 10875H 32GB 1TB 15.6FHD IPS 300HZ G-SYNC PERKEY RGB WIN 10', 64990000, 'PT51545.jpg', 1, 'ACER PREDATOR TRITON 500'),
	(45, '2020-11-12 17:06:05', '2020-11-12 17:06:34', 11, 3, 'LAPTOP ASUS ROG STRIX SCAR 17 G732L-WSHG065T GEFORCE RTX 2070S 8GB INTEL CORE I7 10875H 16GB 1TB 17.3″ FHD IPS 300HZ PERKEY RGB WIN 10', 'LAPTOP ASUS ROG STRIX SCAR 17 G732L-WSHG065T GEFORCE RTX 2070S 8GB INTEL CORE I7 10875H 16GB 1TB 17.3″ FHD IPS 300HZ PERKEY RGB WIN 10', 56990000, 'scar53.png', 1, 'ASUS ROG STRIX SCAR 17'),
	(46, '2020-11-12 17:06:03', '2020-11-12 17:06:34', 12, 9, 'PC STAR HUB INTEL CORE I7-10700K 16GB RTX2070 SUPER 8GB 250GB NVME SSD', 'PC STAR HUB INTEL CORE I7-10700K 16GB RTX2070 SUPER 8GB 250GB NVME SSD', 43490000, 'STAR_HUB1.jpg', 1, 'PC STAR HUB INTEL'),
	(47, '2020-11-12 17:06:02', '2020-11-12 17:06:35', 11, 3, 'LAPTOP GAMING ASUS TUF F15 FX506LU-HN138T GEFORCE GTX 1660TI 4GB INTEL CORE I7 10870H 8GB 512GB 15.6″ 144HZ IPS WIN 10 GRAY METAL RGB', 'LAPTOP GAMING ASUS TUF F15 FX506LU-HN138T GEFORCE GTX 1660TI 4GB INTEL CORE I7 10870H 8GB 512GB 15.6″ 144HZ IPS WIN 10 GRAY METAL RGB', 30990000, 'tuf64.jpg', 1, 'LAPTOP GAMING ASUS TUF F15'),
	(48, '2020-11-12 17:06:01', '2020-11-12 17:06:36', 13, 12, 'MÀN HÌNH CONG SAMSUNG LC34F791 34″ UW-QHD 100HZ 4MS QUANTUM DOT', 'MÀN HÌNH CONG SAMSUNG LC34F791 34″ UW-QHD 100HZ 4MS QUANTUM DOT', 45590000, '34F79118.jpg', 1, 'SAMSUNG LC34F791'),
	(49, '2020-11-13 20:17:55', '2020-11-13 20:17:56', 16, 11, 'Chất liệu: Da PU\r\nKê tay: Có thể nâng lên - hạ xuống\r\nKhung chân: Khung chânkim loại + nhựa\r\nChất liệu: Da PU\r\nKê tay: Có thể nâng lên - hạ xuống\r\nKhung chân: Khung chânkim loại + nhựa\r\nMàu sắc: Đen - Carbon - Cam', 'Chất liệu: Da PU\r\nKê tay: Có thể nâng lên - hạ xuống\r\nKhung chân: Khung chânkim loại + nhựa\r\nChất liệu: Da PU\r\nKê tay: Có thể nâng lên - hạ xuống\r\nKhung chân: Khung chânkim loại + nhựa\r\nMàu sắc: Đen - Carbon - Cam', 4990000, 'c023.png', 1, 'Gigabyte Aorus AGC300 -'),
	(50, '2020-11-13 20:17:54', '2020-11-13 20:17:53', 14, 10, 'Gamepad Microsoft Xbox One S Controller + Cable for Windows Black', 'Gamepad Microsoft Xbox One S Controller + Cable for Windows Black', 1790000, 'xbox94.jpg', 1, 'Xbox One S'),
	(51, '2020-11-13 20:17:47', '2020-11-13 20:17:52', 12, 9, 'Được xây dựng với những linh kiện chủ đạo mang thương hiệu ROG đầy tự hào của Asus, PLG ROG X là một dàn PC không chỉ dành cho fan ROG mà còn là một siêu phẩm đối với những ai yêu cái đẹp và đang tìm kiếm một dàn PC với sức mạnh đỉnh cao', 'Được xây dựng với những linh kiện chủ đạo mang thương hiệu ROG đầy tự hào của Asus, PLG ROG X là một dàn PC không chỉ dành cho fan ROG mà còn là một siêu phẩm đối với những ai yêu cái đẹp và đang tìm kiếm một dàn PC với sức mạnh đỉnh cao', 96990000, 'rog_1063.png', 1, 'PLG ROG 10 X'),
	(52, '2020-11-13 20:33:35', '2020-11-13 20:33:35', 14, 7, 'Bàn phím chơi game Razer Blackwidow V3 Pro Green Switch\r\nBàn phím cơ Razer Blackwidow V3 Pro cơ học đầu tiên và mang tính biểu tượng nhất trên thế giới tạo nên sự phát triển mang tính bước ngoặt. Bước vào một meta không dây mới với Razer BlackWidow V3 Pro — với 3 chế độ kết nối mang lại tính linh hoạt vô song và trải nghiệm chơi game thỏa mãn bao gồm các công tắc tốt nhất trong lớp và các phím có chiều cao đầy đủ.', 'Bàn phím chơi game Razer Blackwidow V3 Pro Green Switch\r\nBàn phím cơ Razer Blackwidow V3 Pro cơ học đầu tiên và mang tính biểu tượng nhất trên thế giới tạo nên sự phát triển mang tính bước ngoặt. Bước vào một meta không dây mới với Razer BlackWidow V3 Pro — với 3 chế độ kết nối mang lại tính linh hoạt vô song và trải nghiệm chơi game thỏa mãn bao gồm các công tắc tốt nhất trong lớp và các phím có chiều cao đầy đủ.', 5990000, 'gearvn-ban-phim-razer-blackwidow7.png', 1, 'Blackwidow V3 Pro'),
	(53, '2020-11-15 10:25:36', '2020-11-15 10:25:36', 14, 7, '<h3 style="text-align:center">Razer Viper Ultimate sử dụng Switch chuột Razer quang học</h3>\r\n\r\n<h4 style="text-align:center">Razer Viper Ultimate sử dụng&nbsp;Switch&nbsp;quang Razer gi&uacute;p&nbsp;mỗi lần nhấp chuột của bạn sẽ được thực hiện ngay tức khắc với tốc độ &aacute;nh s&aacute;ng. Switch&nbsp;quang Razer &trade; sử dụng ch&ugrave;m tia hồng ngoại để đăng k&yacute; lần nhấp chuột, dẫn đến thời gian phản hồi h&agrave;ng đầu l&agrave; 0,2 mili gi&acirc;y. Hoạt động tức thời của n&oacute; gi&uacute;p loại bỏ c&aacute;c lần nhấp kh&ocirc;ng mong muốn, cho ph&eacute;p bạn kiểm so&aacute;t ho&agrave;n to&agrave;n chuột của m&igrave;nh.</h4>\r\n\r\n<p style="text-align:center"><img alt="" src="https://www.playzone.vn/image/catalog/san%20pham/razer/chuot-razer/viper/ultimate/1/1.jpg" /></p>\r\n\r\n<h3 style="text-align:center">Razer Viper Ultimate sử dụng cảm biến quang học Razer Focus+</h3>\r\n\r\n<h4 style="text-align:center">Razer Viper Ultimate sử dụng cảm biến quang học mới nhất Razer Focus+ được thiết kế với độ ch&iacute;nh x&aacute;c theo d&otilde;i tới 99,6% v&agrave; l&ecirc;n đến 20.000 DPI. Đảm bảo mọi c&uacute; di chuột ch&iacute;nh x&aacute;c đến kh&oacute; tin.&nbsp;Được trang bị c&aacute;c chức năng th&ocirc;ng minh, cảm biến c&agrave;ng trở n&ecirc;n ch&iacute;nh x&aacute;c hơn, cho ph&eacute;p mức độ ch&iacute;nh x&aacute;c cấp t&iacute;nh cho c&aacute;c c&uacute; headshot đỉnh cao.</h4>\r\n\r\n<p style="text-align:center"><img alt="" src="https://www.playzone.vn/image/catalog/san%20pham/razer/chuot-razer/viper/ultimate/1/2.jpg" /></p>\r\n\r\n<h3 style="text-align:center">Thiết kế cực nhẹ, chỉ c&oacute; 74 g</h3>\r\n\r\n<h4 style="text-align:center">Trong khi thi đấu, ngay cả lợi thế nhỏ nhất cũng c&oacute; thể tạo ra sự kh&aacute;c biệt. Razer Viper Ultimate&nbsp;chỉ nặng 74g m&agrave; kh&ocirc;ng ảnh hưởng đến sức mạnh chế tạo của n&oacute;. Một con chuột nhẹ hơn cho ph&eacute;p vuốt, di chuột nhiều k&egrave;m khả năng kiểm so&aacute;t hơn, tăng tốc độ phản ứng của bạn trong trận chiến.</h4>\r\n\r\n<p style="text-align:center"><img alt="" src="https://www.playzone.vn/image/catalog/san%20pham/razer/chuot-razer/viper/ultimate/1/3.jpg" /></p>\r\n\r\n<h3 style="text-align:center">C&ocirc;ng nghệ kh&ocirc;ng d&acirc;y Razer Hyperspeed</h3>\r\n\r\n<h4 style="text-align:center">Với khả năng kết nối kh&ocirc;ng d&acirc;y nhanh hơn bất k&igrave; c&ocirc;ng nghệ n&agrave;o kh&aacute;c tới 25%. Bạn sẽ kh&ocirc;ng thể nhận ra được rằng m&igrave;nh đang sử dụng chuột kh&ocirc;ng d&acirc;y bởi tốc độ phản hồi v&agrave; độ trễ cực k&igrave; thấp!</h4>\r\n\r\n<p style="text-align:center"><img alt="" src="https://www.playzone.vn/image/catalog/san%20pham/razer/chuot-razer/viper/ultimate/1/4.jpg" /></p>\r\n\r\n<h3 style="text-align:center">Kết nối kh&ocirc;ng d&acirc;y với thời gian pin sử dụng l&ecirc;n tới 70 giờ đồng hồ</h3>\r\n\r\n<h4 style="text-align:center">Chỉ cần sạc pin 1 lần 1 tuần cho trải nghiệm chơi game tới 10 giờ 1 ng&agrave;y. Cực k&igrave; đ&atilde;!!</h4>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<h3 style="text-align:center">Cấu h&igrave;nh 5 bộ nhớ cao cấp</h3>\r\n\r\n<h4 style="text-align:center">Mang c&aacute;c thiết lập của bạn đến bất cứ nơi n&agrave;o v&agrave; sẵn s&agrave;ng cho trận đấu ngay lập tức. K&iacute;ch hoạt tối đa 5 bộ nhớ&nbsp;tr&ecirc;n bo mạch hoặc c&agrave;i đặt t&ugrave;y chỉnh th&ocirc;ng qua lưu trữ đ&aacute;m m&acirc;y</h4>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<h3 style="text-align:center">8 n&uacute;t c&oacute; thể lập tr&igrave;nh</h3>\r\n\r\n<h4 style="text-align:center">Để c&oacute; một cấu h&igrave;nh đầy đủ th&igrave; với Razer Synapse 3, 8 n&uacute;t c&oacute; thể lập tr&igrave;nh cho ph&eacute;p bạn truy cập c&aacute;c macro v&agrave; chức năng phụ để bạn c&oacute; thể&nbsp;mở rộng trải nghiệm&nbsp;một c&aacute;ch dễ d&agrave;ng</h4>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<h3 style="text-align:center">Dock sạc chuột&nbsp;<a href="https://xgear.vn/chuot-razer-viper-ultimate/">Razer Viper Ultimate</a></h3>\r\n\r\n<h4 style="text-align:center">Dock sạc chuột&nbsp;<a href="https://xgear.vn/chuot-razer-viper-ultimate/">Razer Viper Ultimate</a>&nbsp;gi&uacute;p sạc nhanh v&agrave; dễ d&agrave;ng hơn bao giờ hết. Hơn nữa đồng bộ hệ thống Razer Chroma mang đến sự thu h&uacute;t đầy m&agrave;u sắc!</h4>\r\n\r\n<p style="text-align:center"><img alt="" src="https://www.playzone.vn/image/catalog/san%20pham/razer/chuot-razer/viper/ultimate/6.jpg" /></p>\r\n\r\n<h3 style="text-align:center">Feet chuột 100% PTFE</h3>\r\n\r\n<h4 style="text-align:center"><a href="https://xgear.vn/chuot-razer-viper-ultimate/">Razer Viper Ultimate</a>&nbsp;gi&uacute;p trải nghiệm mượt m&agrave;, trơn tru mọi c&uacute; di chuột với bất k&igrave; bề mặt n&agrave;o khi sử dụng chuột với Feet được l&agrave;m từ PTFE tinh khiết. Một vật liệu chuy&ecirc;n dụng được phủ l&ecirc;n bề mặt chảo chống d&iacute;nh.</h4>\r\n\r\n<p style="text-align:center">&nbsp;</p>', '<p><span dir="ltr" lang="es"><strong>K&egrave;m Dock sạc Razer đồng bộ Chroma.</strong></span><br />\r\n<span dir="ltr" lang="es"><strong>Switch quang học</strong>&nbsp;<strong>Razer Optical Mouse Switch cho tốc độ phản hồi 0.2ms, độ bền 70 triệu lần nhấn.</strong></span><br />\r\n<span dir="ltr" lang="es"><strong>Cảm biến quang học Razer Focus+ l&ecirc;n đến 20000 DPI.</strong></span><br />\r\n<span dir="ltr" lang="es"><strong>C&ocirc;ng nghệ kh&ocirc;ng d&acirc;y Razer Hyperspeed kết nối nhanh hơn 25%.</strong></span><br />\r\n<span dir="ltr" lang="es"><strong>Thời gian pin sử dụng l&ecirc;n tới 70 giờ đồng hồ.</strong></span><br />\r\n<span dir="ltr" lang="es"><strong>Feet chuột 100% PTFE tinh khiết.</strong></span><br />\r\n<span dir="ltr" lang="es"><strong>Trọng lượng si&ecirc;u nhẹ chỉ 74g.</strong></span><br />\r\n<span dir="ltr" lang="es"><strong>Led Chroma RGB đặc trưng của Razer.</strong></span><br />\r\n<span dir="ltr" lang="es"><strong><span style="color:#e74c3c">Bảo h&agrave;nh 24 th&aacute;ng.</span></strong></span></p>', 3990000, 'razer38.jpg', 1, 'Chuột Razer Viper Ultimate'),
	(55, '2020-11-16 21:55:22', '2020-11-16 21:55:22', 14, 11, '<h1>Gigabyte ra mắt AORUS - D&ograve;ng sản phẩm gaming cao cấp tuyệt hảo cho game thủ Việt</h1>\r\n\r\n<h2>AORUS l&agrave; d&ograve;ng sản phẩm Gaming cao cấp của Gigabyte với c&aacute;c đủ c&aacute;c sản phẩm phục vụ game thủ từ phần cứng b&ecirc;n trong cho tới gaming gear b&ecirc;n ngo&agrave;i.</h2>', '<h1>Gigabyte ra mắt AORUS - D&ograve;ng sản phẩm gaming cao cấp tuyệt hảo cho game thủ Việt</h1>\r\n\r\n<h2>AORUS l&agrave; d&ograve;ng sản phẩm Gaming cao cấp của Gigabyte với c&aacute;c đủ c&aacute;c sản phẩm phục vụ game thủ từ phần cứng b&ecirc;n trong cho tới gaming gear b&ecirc;n ngo&agrave;i.</h2>', 1000000000, 'arus59.jpg', 0, 'AoRus');
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;

-- Dumping structure for table shopgear.tbl_shipping
CREATE TABLE IF NOT EXISTS `tbl_shipping` (
  `shipping_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `shipping_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `shipping_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shipping_methos` int DEFAULT NULL,
  PRIMARY KEY (`shipping_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopgear.tbl_shipping: ~2 rows (approximately)
DELETE FROM `tbl_shipping`;
/*!40000 ALTER TABLE `tbl_shipping` DISABLE KEYS */;
INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_email`, `created_at`, `updated_at`, `shipping_notes`, `shipping_methos`) VALUES
	(48, 'Trần Phi Long', 'Krông Năng', '0382965484', 'tranphilong047@gmail.com', '2020-11-26 06:45:05', '2020-11-26 06:45:05', 'minh pro vip', NULL),
	(49, 'Trần Phi Long', 'tp hcm', '0382965484', 'tranphilong047@gmail.com', '2020-11-26 13:38:02', '2020-11-26 13:38:02', 'hhhhhhhh', NULL);
/*!40000 ALTER TABLE `tbl_shipping` ENABLE KEYS */;

-- Dumping structure for table shopgear.tbl_slider
CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `slider_id` bigint NOT NULL AUTO_INCREMENT,
  `slider_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slider_image` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slider_desc` text COLLATE utf8mb4_general_ci,
  `slider_status` int DEFAULT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table shopgear.tbl_slider: ~4 rows (approximately)
DELETE FROM `tbl_slider`;
/*!40000 ALTER TABLE `tbl_slider` DISABLE KEYS */;
INSERT INTO `tbl_slider` (`slider_id`, `slider_name`, `slider_image`, `slider_desc`, `slider_status`) VALUES
	(2, 'MSI', 'banner279.png', '<p>Black Friday</p>', 1),
	(3, 'PC gaming', 'banner343.png', '<p>PC gaming</p>', 1),
	(4, 'Gear', 'banner41.jpg', '<p>Gaming Gear</p>', 1),
	(5, 'Cây dừa', 'banner138.png', '<p>Xanh Ng&aacute;t</p>', 1);
/*!40000 ALTER TABLE `tbl_slider` ENABLE KEYS */;

-- Dumping structure for table shopgear.tbl_social
CREATE TABLE IF NOT EXISTS `tbl_social` (
  `user_id` bigint NOT NULL AUTO_INCREMENT,
  `provider_user_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `provider` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user` bigint DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table shopgear.tbl_social: ~0 rows (approximately)
DELETE FROM `tbl_social`;
/*!40000 ALTER TABLE `tbl_social` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_social` ENABLE KEYS */;

-- Dumping structure for table shopgear.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopgear.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
