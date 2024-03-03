-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2022 at 10:17 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jennyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactuses`
--

DROP TABLE IF EXISTS `contactuses`;
CREATE TABLE IF NOT EXISTS `contactuses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactuses`
--

INSERT INTO `contactuses` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Nirtan', 'nirten2008f@aptechgdn.net', 'sdfsdf', 'fsdfsfsfsdfsdfsd', '2022-04-16 22:51:40', '2022-04-16 22:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_06_085808_create_products_table', 1),
(6, '2022_04_07_101817_create_contactuses_table', 1),
(7, '2022_04_19_130012_create_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Pdt_title` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pdt_img` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pdt_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `Pdt_Catagory` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cus_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_cus_id_foreign` (`Cus_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Pdt_title` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pdt_img` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pdt_price` int(11) NOT NULL,
  `Pdt_Catagory` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Pdt_title`, `Pdt_img`, `Pdt_price`, `Pdt_Catagory`, `created_at`, `updated_at`, `qty`) VALUES
(20, 'Eye Linar', '1655859695.ajie-wp-nJexxVpHul0-unsplash.jpg', 13999, 'Medicians', '2022-04-18 05:11:05', '2022-04-18 05:11:05', NULL),
(19, 'Eye Linar', '1602852429.ajie-wp-jC_TqS-ULzk-unsplash.jpg', 12000, 'Medicians', '2022-04-18 05:09:52', '2022-04-18 05:09:52', NULL),
(22, 'Nail Polish', '1388976311.ashley-piszek-YYrp5VZnpRk-unsplash.jpg', 1999, 'Medicians', '2022-04-18 05:11:46', '2022-04-18 05:11:46', NULL),
(23, 'Lipsticks', '1770181845.belle-beauty-JPvy3rrWSeM-unsplash.jpg', 4999, 'Medicians', '2022-04-18 05:12:13', '2022-04-18 05:12:13', NULL),
(24, 'Makup', '840121317.dulkimso-hakim-santoso-hyhJDRptjWo-unsplash.jpg', 5099, 'Medicians', '2022-04-18 05:12:33', '2022-04-18 05:12:33', NULL),
(25, 'Make up kit', '1307813753.dulkimso-hakim-santoso-LjKB320s1Cs-unsplash.jpg', 4888, 'Medicians', '2022-04-18 05:13:01', '2022-04-18 05:13:01', NULL),
(26, 'Foundation', '589013412.jacinta-christos-phYKolpoQ9A-unsplash.jpg', 50000, 'Medicians', '2022-04-18 05:13:23', '2022-04-18 05:13:23', NULL),
(27, 'Full makeup kit', '1807045776.xi-yang-mjv8r15I-BY-unsplash.jpg', 49999, 'Medicians', '2022-04-18 05:14:21', '2022-04-18 05:14:21', NULL),
(29, 'BRACELLTE', '1874650979.BRACELET BAGUET SQ ZC WRT GLD-CHAMP.jpg', 300000, 'Jewellery', '2022-04-18 05:16:38', '2022-04-18 05:16:38', NULL),
(30, 'diamond bracellte', '2072047828.BRACELET LG DROP FANCY ZC SLVR-CLEAR.jpg', 59999, 'Jewellery', '2022-04-18 05:17:07', '2022-04-18 05:17:07', NULL),
(31, 'Pure Gold ring', '563243850.CROSSOVER SOLITAIRE RING - SIZE 17 GOLD-CHAMPAGNE.jpg', 13099, 'Jewellery', '2022-04-18 05:17:48', '2022-04-18 05:17:48', NULL),
(32, 'Pure Gold ear rings', '108746278.EARING HOOP DROP ZC GOLD-CLEAR.jpg', 34888, 'Jewellery', '2022-04-18 05:18:16', '2022-04-18 05:18:16', NULL),
(33, 'Ear rings', '1878770751.EARING WREATH CLASS ZC GOLD-CHAMPAGNEAGNE.jpg', 6999, 'Jewellery', '2022-04-18 05:18:36', '2022-04-18 05:18:36', NULL),
(34, '24 grade gold ear rings', '1429737684.JHUMKA LG POLKI FN FLWR. GLD-CHAMP.jpg', 4000000, 'Jewellery', '2022-04-18 05:19:10', '2022-04-18 05:19:10', NULL),
(35, 'Dimond Chain', '526589433.PRECIOUS ICED GREEN RECTANGLE PENDANT.jpg', 4888, 'Jewellery', '2022-04-18 05:19:35', '2022-04-18 05:19:35', NULL),
(36, 'Gold chain', '1635277764.pendant.jpg', 13999, 'Jewellery', '2022-04-18 05:19:55', '2022-04-18 05:19:55', NULL),
(37, 'PRECIOUS ICED GREEN RECTANGLE PENDANT', '617779036.PRECIOUS ICED GREEN RECTANGLE PENDANT.jpg', 5999, 'Jewellery', '2022-04-18 05:20:23', '2022-04-18 05:20:23', NULL),
(38, 'RING SLIM ZIRCON SOL', '959120639.RING SLIM ZIRCON SOLITARE - SIZE 19 GOLD-CLEAR.jpg', 454545, 'Jewellery', '2022-04-18 05:20:56', '2022-04-18 05:20:56', NULL),
(39, 'TIKKA PLK', '2075707400.TIKKA PLK.jpg', 344545, 'Jewellery', '2022-04-18 05:21:06', '2022-04-18 05:21:06', NULL),
(40, 'Eye Linar', '1655859695.ajie-wp-nJexxVpHul0-unsplash.jpg', 13999, 'Medicians', '2022-04-18 05:11:05', '2022-04-18 05:11:05', NULL),
(41, 'BRACELLTE', '1874650979.BRACELET BAGUET SQ ZC WRT GLD-CHAMP.jpg', 300000, 'Jewellery', '2022-04-18 05:16:38', '2022-04-18 05:16:38', NULL),
(42, 'Dimond Chain', '526589433.PRECIOUS ICED GREEN RECTANGLE PENDANT.jpg', 4888, 'Jewellery', '2022-04-18 05:19:35', '2022-04-18 05:19:35', NULL),
(43, 'Red Nail Polish', '1035338481.sincerely-media-Mr35fSd9-A4-unsplash.jpg', 23999, 'Jewellery', '2022-04-18 05:14:40', '2022-04-18 05:14:40', NULL),
(44, 'Gold chain', '1635277764.pendant.jpg', 13999, 'Jewellery', '2022-04-18 05:19:55', '2022-04-18 05:19:55', NULL),
(45, 'Pure Gold ring', '563243850.CROSSOVER SOLITAIRE RING - SIZE 17 GOLD-CHAMPAGNE.jpg', 13099, 'Jewellery', '2022-04-18 05:17:48', '2022-04-18 05:17:48', NULL),
(46, 'Foundation', '589013412.jacinta-christos-phYKolpoQ9A-unsplash.jpg', 50000, 'Medicians', '2022-04-18 05:13:23', '2022-04-18 05:13:23', NULL),
(47, 'Makup', '840121317.dulkimso-hakim-santoso-hyhJDRptjWo-unsplash.jpg', 5099, 'Medicians', '2022-04-18 05:12:33', '2022-04-18 05:12:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Admin_type` int(11) NOT NULL,
  `name` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Admin_type`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 'Admin', 'Nikatan@gmail.com', NULL, '$2y$10$.icyVOI75LrOcpFgH4W/Fe1JK5AjT4CmZzqIFXmiIMA62h23xY1kC', '6qPruVG04zwCeoCFKlaKG73SbyEQdlPZCajUJt7hQCiGy4xUS8PAF86vJQiL', '2022-04-16 21:03:01', '2022-04-16 21:03:01'),
(3, 1, 'admin', 'admin@gmail.com', NULL, 'admin123', NULL, NULL, NULL),
(4, 0, 'User', 'User@gmail.com', NULL, '$2y$10$dXBYThVi6OTLA.49LUxb2.14RsKpblJ9WUsgwBo16y62EO9eEzzqi', NULL, '2022-04-16 22:28:18', '2022-04-16 22:28:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
