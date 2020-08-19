-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Aug 19, 2020 at 10:10 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zawag`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(225) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `permission` enum('super','admin') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `image`, `password`, `active`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'Tamer', 'star.tamer.1980@gmail.com', NULL, '$2y$10$8T.AePe2lgFISOIssNav9.1n4twCZId7HVwPaf0ws95hAc05072ZS', 1, 'super', '2020-06-29 10:03:17', '2020-06-29 10:03:17'),
(3, 'مشرف', 'sss@dk.com', 'images/categories/wEWrLVdRi8jq86KVlN8XP3l2SewEojrlGdHbDKyp.jpeg', '$2y$10$Fe4J4lhnMLzyCipfkMC4Neu7hPmu3Ezd0/CZshl/4zhIRVi3h8cSO', 1, 'admin', '2020-07-04 14:46:53', '2020-07-04 16:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `ads_category`
--

DROP TABLE IF EXISTS `ads_category`;
CREATE TABLE IF NOT EXISTS `ads_category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ads_category_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ads_click`
--

DROP TABLE IF EXISTS `ads_click`;
CREATE TABLE IF NOT EXISTS `ads_click` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ads_content_id` int(10) UNSIGNED NOT NULL,
  `date_click` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ads_content`
--

DROP TABLE IF EXISTS `ads_content`;
CREATE TABLE IF NOT EXISTS `ads_content` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `start_date` timestamp NOT NULL,
  `expiration_date` timestamp NOT NULL,
  `views` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `main_category` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `is_hase_sub_category` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `type_category` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `sort` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `image`, `active`, `main_category`, `is_hase_sub_category`, `type_category`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'حجز قاعات الافراح والصالات والفنادق', 'سوف تجد هنا كل ما تحتاجه لإتمام حفل زفافك في الكويت عبر موقعنا زفاف الكويت \r\n\r\n            أختر الخدمة التي تريدها وابدأ بالتواصل معهم مباشرة والسؤال عن الأسعار والتفاصيل', 'images/categories/wbAeJCXrFPnIcWnFwIqjIU5YZuRQZAfdi0hKuujE.jpeg', 1, 0, 1, 1, 1, '2020-07-04 08:37:40', '2020-07-19 10:05:38'),
(2, 'قاعات الافراح', NULL, 'images/categories/i3trgID7Sm0M5EhVRs9pe6u6M6rXV6zhaso3xFo9.jpeg', 1, 1, 0, 1, 1, '2020-07-04 08:38:11', '2020-07-04 08:38:11'),
(3, 'صالات الافراح', NULL, 'images/categories/jnJzRvAh1HHKoEUyj32ZV6pWZuJe3nyAf3UjREUm.jpeg', 1, 1, 0, 1, 2, '2020-07-04 08:38:25', '2020-07-04 08:38:25'),
(4, 'قاعات الفنادق', NULL, 'images/categories/0Ncz6HD9TAfr4TiBEY8L5R7TSiYxfL00JJkclSiJ.jpeg', 1, 1, 0, 1, 3, '2020-07-04 08:38:41', '2020-07-04 08:38:41'),
(5, 'منظمي الاعراس والحفلات والبوفيهات والضيافة', NULL, 'images/categories/SgRpxbmzhBDhvvUUGKyDMk496ZP8xpFgnk3hLNq1.jpeg', 1, 0, 0, 2, 2, '2020-07-04 09:16:37', '2020-07-04 09:16:37'),
(6, 'مقدمي خدمات التصوير والفيديوهات للأفراح', NULL, 'images/categories/upoeVqPjvkydmCQIQSbhKbwrpKgeZQjF46bzsros.jpeg', 1, 0, 0, 2, 3, '2020-07-04 09:17:08', '2020-07-04 09:17:17'),
(7, 'محلات تصميم وطباعة كروت الافراح', NULL, 'images/categories/LKGKKqQKdRFkadGw0f2RocMTmLQyJqffYStP6iVR.jpeg', 1, 0, 0, 2, 4, '2020-07-04 09:18:03', '2020-07-04 09:18:03'),
(8, 'محلات المجوهرات والشبكة والدبل', NULL, 'images/categories/QyCf1n1e0HgYqf4gPUnQT4F9O4l50KOH0O7lahn4.jpeg', 1, 0, 0, 2, 5, '2020-07-04 09:18:26', '2020-07-04 09:18:26'),
(9, 'محلات الآتيليه وفساتين الافراح (شراء - تأجير )', NULL, 'images/categories/yWmjcXre3lUQ5Y3bjys2BfcyDcNjE4u95pbjjDWL.jpeg', 1, 0, 0, 2, 6, '2020-07-04 09:18:59', '2020-07-04 09:18:59'),
(10, 'صالونات التجميل لتجهيز العروسة والمرافقين', NULL, 'images/categories/sxSFs2QaLIDUW0kW1F7q2wMpi0y8znEJHImE8wCu.jpeg', 1, 0, 0, 1, 7, '2020-07-04 09:19:13', '2020-07-04 09:19:13'),
(11, 'محلات المكياج والعطور والبخور', NULL, 'images/categories/xMRtfzAXN1nblo02cN17DH3SgbLHC6yUnrr3FI99.jpeg', 1, 0, 0, 2, 8, '2020-07-04 09:19:28', '2020-07-04 09:19:28'),
(12, 'محلات تأجير السيارات  ( الزفة )', NULL, 'images/categories/2vKTASssXWp1kdVF3LQk9Fbs9rsdp1Fwt0KLUy2v.jpeg', 1, 0, 0, 2, 9, '2020-07-04 09:19:49', '2020-07-04 09:19:49'),
(13, 'محلات الاحذية النسائية والرجالية', NULL, 'images/categories/YbQn9gVzH3Qb0C4nWkEyZ5bPwxnMu8w6R9uSY4tN.jpeg', 1, 0, 0, 2, 10, '2020-07-04 09:20:12', '2020-07-04 09:20:12'),
(14, 'محلات الساعات والأقلام', NULL, 'images/categories/eEwgIWQzDrJ4J7I0emVlyI2nU8841BbfgkjdBbzB.jpeg', 1, 0, 0, 2, 11, '2020-07-04 09:20:28', '2020-07-04 09:20:28'),
(15, 'محلات البشوت', NULL, 'images/categories/Ph9Ng2U7RmlQ2kx1hMNlJNamfBXqr9Mdk4Lynhz4.jpeg', 1, 0, 0, 1, 12, '2020-07-04 09:20:44', '2020-07-04 09:20:44'),
(16, 'حجز افضل العروض لشهر العسل', NULL, 'images/categories/kcNgjnCLjUmLo5BofcXfpKzIxZRtHQ4kZ1tk8e8z.jpeg', 1, 0, 0, 2, 13, '2020-07-04 09:21:01', '2020-07-04 09:21:01'),
(17, 'الدعوات العامة للافراح والمناسبات', NULL, 'images/categories/ZYkDONmA9jmCkhsMmIgt4LMpyw5FFTHR2KxJlk1u.jpeg', 1, 0, 0, 3, 14, '2020-07-04 09:21:49', '2020-07-13 16:46:42'),
(18, 'تحميل صور  العامة الأفراح والمناسبات', NULL, 'images/categories/Ng1PKtQgRvP96SrN3IAnQQLvROrdlZs2VSEa1Y6e.jpeg', 1, 0, 1, 4, 15, '2020-07-04 09:24:38', '2020-07-04 09:24:38'),
(19, 'شارك صور الافراح العامه', NULL, 'images/categories/FbHbvUhaph53fDx6P8GA0eImnJ8hgn58ADQsdbYg.jpeg', 1, 18, 0, 1, 1, '2020-07-04 09:25:07', '2020-07-04 09:25:07'),
(20, 'شارك صور المناسبات العامه', NULL, 'images/categories/rjw4tw41O25WbgskscUFf9BYEqdjNblwwBguL0Xg.jpeg', 1, 18, 0, 1, 2, '2020-07-04 09:25:23', '2020-07-04 09:25:23'),
(21, 'تحميل فيديوهات الأفراح والمناسبات العامة', NULL, 'images/categories/79zu9Ndi40gtt8EmCIAtdkYMbi6mL9jRavhxNIV5.jpeg', 1, 0, 1, 4, 16, '2020-07-04 09:27:33', '2020-07-04 09:27:33'),
(22, '⦁	شارك وحمل فيديوهات الافراح', NULL, 'images/categories/CLde0VSwECoGeUtcAe9QteF2aY3gp4Z5fzKCXf7u.jpeg', 1, 21, 0, 1, 1, '2020-07-04 09:27:51', '2020-07-04 09:27:51'),
(23, 'شارك وحمل فيديوهات المناسبات', NULL, 'images/categories/LwEODb4U2mcksNMgR3p2qAEqXUDITetfTdk7Fu20.jpeg', 1, 21, 0, 1, 2, '2020-07-04 09:28:09', '2020-07-04 09:28:09'),
(24, ' قبيلة الرشايدة', NULL, 'images/categories/Oe1cCIJXzjhDO8PLYQqgbS5q2XeWNutEi1ZwifHy.jpeg', 1, 0, 1, 5, 17, '2020-07-04 09:29:26', '2020-07-04 09:29:26'),
(33, 'قبيلة  العوازم', NULL, 'images/categories/ANDW4ZMcGBLjZrETHgC7HQGGwRIfPgbpFVkx2PjA.jpeg', 1, 0, 1, 5, 18, '2020-07-04 09:32:28', '2020-07-04 09:32:35'),
(42, ' قبيلة  مطير', NULL, 'images/categories/LOVhFKimi4HkzGDLkd2118JtQ7ihhmgrLDBUCSul.jpeg', 1, 0, 1, 5, 19, '2020-07-04 09:35:01', '2020-07-04 09:35:01'),
(51, '  قبيلة  عنزة', NULL, 'images/categories/WTwaIkYfgiLsAMuDflwNMgBQO3Xz5Rh4ljOlJ9Vr.jpeg', 1, 0, 1, 5, 20, '2020-07-04 09:52:54', '2020-07-04 09:52:54'),
(89, 'قبيلة السبيعي', NULL, 'images/categories/t0egRXCUaBa3D4xVWT7FSDK8jonz9PeHwfhb7hpI.jpeg', 1, 0, 0, 5, 33, '2020-07-04 12:21:00', '2020-07-04 12:21:00'),
(88, 'قبيلة الفضلي', NULL, 'images/categories/qdzhr5lAmbHABQmbJI8DP77mtlXHfgVyY7ogPUqz.jpeg', 1, 0, 0, 5, 32, '2020-07-04 12:20:37', '2020-07-04 12:20:37'),
(87, 'قبيلة الحربي', NULL, 'images/categories/vb6etajJwDaeheZbtcUFsN6V1EpQ5n4tHIlIaupY.jpeg', 1, 0, 0, 5, 31, '2020-07-04 12:20:15', '2020-07-04 12:20:15'),
(86, ' قبيلة الخالدي', NULL, 'images/categories/h5gUd1QrRQJFU1HWdrQFt6hHgSjU5w3HPSJ5avah.jpeg', 1, 0, 0, 5, 30, '2020-07-04 12:19:55', '2020-07-04 12:19:55'),
(85, ' قبيلة القحطاني', NULL, 'images/categories/jVpHGqsMaX0B02bM9meiXqkDzqKKbhD6E10jWu3x.jpeg', 1, 0, 0, 5, 29, '2020-07-04 12:19:35', '2020-07-04 12:19:35'),
(61, ' قبيلة  شمر', NULL, 'images/categories/27PdasP8BGZBgdvxM2bV0Ly8SPCp7KfkgXKC1EuL.jpeg', 1, 0, 1, 5, 21, '2020-07-04 10:50:53', '2020-07-04 10:50:53'),
(84, '  قبيلة  السهلي', NULL, 'images/categories/ulNsTtJIih8XwbfUWqGFSUlhX8ZrwsN2f9jOjBCv.jpeg', 1, 0, 0, 1, 28, '2020-07-04 12:19:17', '2020-07-04 12:19:17'),
(83, ' قبيلة العدواني', NULL, 'images/categories/ZAUJX6zbzGhKEtmNvXcQoCO9aqf2q01Kair5DSff.jpeg', 1, 0, 0, 5, 27, '2020-07-04 12:19:00', '2020-07-04 12:19:00'),
(82, ' قبيلة  عتيبة', NULL, 'images/categories/I4c0BRo2wksQ3PPIqroxmlzmwIhZ4cdK3XFnBFnj.jpeg', 1, 0, 0, 5, 26, '2020-07-04 12:18:42', '2020-07-04 12:18:42'),
(81, '  قبيلة الظفير', NULL, 'images/categories/z9w0LkAwT2CnkLNbOE3bXy0Pdj9Dek8ZFntVHMek.jpeg', 1, 0, 0, 1, 25, '2020-07-04 12:18:25', '2020-07-04 12:18:25'),
(80, ' قبيلة  الدواسر', NULL, 'images/categories/CgZzMZH7d8hqrUFfZmBYqyAhW3ovxLmXV470WTTG.jpeg', 1, 0, 0, 5, 24, '2020-07-04 12:18:06', '2020-07-04 12:18:06'),
(79, ' قبيلة  الهواجر', NULL, 'images/categories/7yhsU0xpJRkp4PJF7pyrhklt5nKMSvc9ZKcoj1TD.jpeg', 1, 0, 0, 5, 23, '2020-07-04 12:17:45', '2020-07-04 12:17:45'),
(70, ' قبيلة العجمان', NULL, 'images/categories/i2HHtT36CSVRxgefcoOiYV04rWfOoXJ5LMLcK1E9.jpeg', 1, 0, 1, 5, 22, '2020-07-04 11:04:30', '2020-07-04 11:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `category_qabael`
--

DROP TABLE IF EXISTS `category_qabael`;
CREATE TABLE IF NOT EXISTS `category_qabael` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sort` tinyint(2) UNSIGNED NOT NULL,
  `cat_type` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_qabael`
--

INSERT INTO `category_qabael` (`id`, `title`, `image`, `sort`, `cat_type`, `created_at`, `updated_at`) VALUES
(15, 'مناسبات', 'images/qabael_categories/wWBTmYQY9A4dGa0LHcK3iEZnOwmeyveHEf2cDtGe.jpeg', 2, 1, '2020-07-13 15:52:12', '2020-07-13 15:52:12'),
(3, 'فيديوهات مناسبات', 'images/qabael_categories/qa3aEgJ1gYX3g5VBNj6TO61NTVVjAeVT0PgN18d8.jpeg', 2, 0, '2020-07-08 17:27:20', '2020-07-08 17:28:15'),
(4, 'صور افراح', 'images/qabael_categories/hzzFyvWwfr5jk3Dfhysa8jQch50D0od9z15msaXJ.jpeg', 3, 0, '2020-07-08 17:28:33', '2020-07-08 17:28:33'),
(5, 'دعوات افراح', 'images/qabael_categories/y0oGCUOhAZpEnv88diCW52Z6mjUTvLGKPagaOgMq.jpeg', 4, 0, '2020-07-08 17:28:59', '2020-07-08 17:28:59'),
(6, 'دعوات مناسبات', 'images/qabael_categories/NsOMi2WQV3cpfWM8cM0lrZpvaJ7biEQ8y6NFkLLX.jpeg', 5, 0, '2020-07-08 17:29:21', '2020-07-08 17:29:21'),
(7, 'تهنئات', 'images/qabael_categories/Sr9uVpRCflCwtn7WUlSXvDbX3hUrZeiRYR0FffZm.jpeg', 6, 0, '2020-07-08 17:29:39', '2020-07-08 17:29:39'),
(8, 'عقد قران ابناء', 'images/qabael_categories/TxItA6zmw8NQ0E57Ce3DlwNJGb8hJcvt2uGkeY0j.jpeg', 7, 0, '2020-07-08 17:30:03', '2020-07-08 17:30:03'),
(9, 'ديوانيات ابناء', 'images/qabael_categories/Zm69Yq08O4Er8QRrpFlI8XZwyixE35x5WqBXRWku.jpeg', 8, 0, '2020-07-08 17:30:23', '2020-07-08 17:30:23'),
(14, 'حفل زفاف', 'images/qabael_categories/UrLsZL1TgZHFHwcrm1LcB3I8VnvNPtJZIBTFx8nu.jpeg', 1, 1, '2020-07-13 15:50:40', '2020-07-13 15:51:51'),
(16, 'فعاليات وانشطه', 'images/qabael_categories/BF4ukAsp6MtmQezbj1WuaHwZqaLTe4n0hlBwVbFq.jpeg', 3, 1, '2020-07-13 15:52:31', '2020-07-13 15:52:31'),
(17, 'تهنئه', 'images/qabael_categories/l2OiZs48aYZ2IhZTReOIC6tEH4A6wDJ6PRZa9GVH.jpeg', 4, 1, '2020-07-13 15:52:46', '2020-07-13 15:52:46'),
(18, 'شكر وعرفان', 'images/qabael_categories/b1zK4n9A63BL7z8klqbwkW3VZGsPrWT9kGyfHeuA.jpeg', 5, 1, '2020-07-13 15:53:03', '2020-07-13 15:53:03'),
(19, 'نقابه', 'images/qabael_categories/2mF6g33pmBHSxBMXZjKI1dfyJKrMC76aozpqgbhM.jpeg', 6, 1, '2020-07-13 15:53:37', '2020-07-13 15:53:37'),
(20, 'انتخابات الجمعيات', 'images/qabael_categories/xMu8X7q6ZmpSJDq0ngpBXlaZqL7tKTm9FNmQcUKd.jpeg', 7, 1, '2020-07-13 15:53:52', '2020-07-13 15:53:52'),
(21, 'انتخابات الانديه الرياضيه', 'images/qabael_categories/s1oOFJpN1RJpgbbZ2st8Z8sWeYow06bDVy8ECTbN.jpeg', 8, 1, '2020-07-13 15:54:07', '2020-07-13 15:54:07'),
(22, 'انتخابات مجلس الامه', 'images/qabael_categories/r3MyNo0jRghQynhxFa1tDtr5ybUxFkpxW2OKsf2Z.jpeg', 9, 1, '2020-07-13 15:54:23', '2020-07-13 15:54:23'),
(23, 'دعوه عامه', 'images/qabael_categories/kaftz3AFyAl3rs9LD6tgp6dXqm5VgHKiuhZjCJ5m.jpeg', 10, 1, '2020-07-13 15:54:38', '2020-07-13 15:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tamer', '', 'images/users/SxYobI2RN0PqG53g9J1dnzHIrLCX8tzSPU7NJFgl.jpeg', 'star.tamer.1980@gmail.com', NULL, '$2y$10$a7qhUMkJ8RjFnMcmUH59N..WUyBZcvv7J.G7O1B3mzWlHMkHnVT42', NULL, '2020-07-04 17:43:28', '2020-08-14 08:14:45'),
(2, 'user 1', '', '', 'star_tamer_1980@yahoo.com', NULL, '$2y$10$PUkmHDVqgWIX7wfdLtWqa.s9Mvehfh7ZtserX4xE6Qwdp4VjmbrJG', NULL, '2020-07-11 14:17:24', '2020-07-11 14:17:24'),
(5, 'sdfsdfsdfs', NULL, 'images/users/A5sssFdvqIYTOQus9Gf2PMe2AmW78mmpq96sUfm4.jpeg', 'star.tamer.1980@gmail.com2', NULL, '$2y$10$uHQo6iQaOYeYwK.SBSa51OyfY4tA76o6UwPvr1VscspCfB.pKJgi.', NULL, '2020-08-12 06:29:51', '2020-08-13 11:59:54'),
(4, 'sss', NULL, '', 'star.tamer.1980@gmail.com1', NULL, '$2y$10$h2sN0HETw9jTXJ.DMF4/euR4mrlCosjXK2JlMtt2p5G..CqYGCG/i', NULL, '2020-08-11 13:30:43', '2020-08-11 13:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `wedding_halls`
--

DROP TABLE IF EXISTS `wedding_halls`;
CREATE TABLE IF NOT EXISTS `wedding_halls` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `type_cat_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `image` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img_other` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `whatsapp` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wedding_halls`
--

INSERT INTO `wedding_halls` (`id`, `user_id`, `cat_id`, `type_cat_id`, `image`, `img_other`, `title`, `description`, `active`, `phone`, `whatsapp`, `address`, `latitude`, `longitude`, `created_at`, `updated_at`, `views`) VALUES
(4, 1, 2, 0, 'images/halls/k9UBJzwdQpLKhEjTso2gwT9lnAsMWXuZdZQPzBIA.jpeg', NULL, 'قاعه 2', 'س سيب سيب سيب  سيب', 1, '23423423423', '2342342342', 'شارع عبدالمنعم رياض، مدينة الكويت، الكويت‎', 29.37186738162606, 47.98670066251427, '2020-07-05 14:47:43', '2020-07-29 11:54:26', 2),
(3, 1, 2, 0, 'images/halls/uGHXMRQYe1Tdokw2mfWLn2HwhGMaJHNW4veHGCZB.jpeg', NULL, '34543', '34534534', 1, '34534534534', '345345345345', 'شارع عيسى عبدالله بهمن، الكويت‎', 29.35500661603719, 48.00026191129356, '2020-07-05 14:23:54', '2020-07-05 14:23:54', 0),
(5, 1, 2, 0, 'images/halls/6uHMphb53hhIsKlGosAHEG2DYDAu60OmPFjGI9yt.jpeg', NULL, 'قاعه', '34534534', 1, '34534534534', '345345345345', 'House 7، شارع 10، الكويت‎', 29.351438742641573, 47.99550474512325, '2020-07-05 15:24:53', '2020-07-05 15:44:55', 0),
(6, 1, 2, 0, 'images/halls/fjSw1xkDkcr4k7mb461IPK1Ew1hI4zTuzfAeek3a.jpeg', NULL, 'سيبسيب', 'سيبسيب', 1, '234234234', '234234234234', 'شارع 4، الأندلس، الكويت‎', 29.305527333024386, 47.86747717884935, '2020-07-05 15:57:21', '2020-07-05 15:57:21', 0),
(7, 1, 3, 0, 'images/halls/7EjVfqzV3JmASVD2gNUji5hUPNjxvEINeOXfD094.jpeg', NULL, 'ثقفثقفثقفق', 'ثقفثقف', 1, '35435345345', '34534534534', 'مدينة الكويت، الكويت‎', 29.375859, 47.9774052, '2020-07-05 15:59:46', '2020-07-05 15:59:46', 0),
(41, 1, 70, 4, 'images/qabael_categories/OMl8kbusP1ure6Na4FkblWZmU6O5ygsY1s6DxZNU.jpeg', NULL, 'dddd', 'dddd', 1, NULL, NULL, NULL, NULL, NULL, '2020-07-09 17:23:24', '2020-07-09 17:23:24', 0),
(42, 2, 24, 4, 'images/qabael_categories/XoCMTpyIxkNnnUy1HHNhpObHaPNKogEIJOWFn1qK.jpeg', NULL, 'ufghfgh', 'fghfgh', 1, NULL, NULL, NULL, NULL, NULL, '2020-07-11 13:47:57', '2020-07-11 13:47:57', 0),
(47, 1, 24, 9, 'images/qabael_categories/2h3csRfIx0Tbz93aZoCxEBhirFOx6MptBn71DD5W.jpeg', NULL, 'ssss', 'ssss', 1, NULL, NULL, NULL, NULL, NULL, '2020-07-13 17:04:02', '2020-07-13 17:04:02', 0),
(46, 2, 17, 23, 'images/halls/qjw0lYO6RASUN25wToUksK4ZPxY3DcgVehZeY1pp.jpeg', NULL, 'sssss', 'sssssss', 1, NULL, NULL, NULL, NULL, NULL, '2020-07-13 16:49:52', '2020-07-13 16:56:58', 0),
(48, 1, 1, 0, '', NULL, 'sdf', '234dfsdfsd sdf sdf', 1, '666', '6651231231', 'SDFSD FDS', NULL, NULL, '2020-08-02 12:38:18', '2020-08-02 12:38:18', 0),
(49, 1, 1, 0, 'images/qabael_categories/JZf7L8PfxGCvmlnLRmrhaZimSwqJY5XXV6lKtHCk.jpeg', NULL, 'sdf', '234dfsdfsd sdf sdf', 1, '666', '6651231231', 'SDFSD FDS', NULL, NULL, '2020-08-03 04:55:09', '2020-08-03 04:55:09', 0),
(50, 1, 42, 9, 'images/qabael_categories/VnmLlqTs1fYAxrj7ZTuRkyPjIoZm3wlGGLZnVBfE.jpeg', NULL, 'sssssssssssssssssss', 'dddddddddddddddddddd', 1, NULL, NULL, NULL, NULL, NULL, '2020-08-03 12:45:38', '2020-08-03 12:45:38', 0),
(51, 1, 42, 9, 'images/qabael_categories/3bdv24YzrPJe79nezA4Z90mAdxmvfsDGojl3IAXh.jpeg', NULL, 'iiiiiiiiiiiii', 'iiiiiiiiiiii', 1, NULL, NULL, NULL, NULL, NULL, '2020-08-03 13:58:03', '2020-08-03 13:58:03', 0),
(52, 1, 1, 0, 'images/qabael_categories/BU8CfEe4ylHJTMkVwNILs6BGyi2FJbobybmSZvAU.jpeg', NULL, 'sdf', '234dfsdfsd sdf sdf', 1, '666', '6651231231', 'SDFSD FDS', NULL, NULL, '2020-08-04 07:39:21', '2020-08-04 07:39:21', 0),
(53, 1, 1, 4, 'images/qabael_categories/6PFRJBElIx4cLwhFDPJoKqlC6lQ37fY6nYSWCeWw.jpeg', NULL, 'sdf', '234dfsdfsd sdf sdf', 1, '666', '6651231231', 'SDFSD FDS', NULL, NULL, '2020-08-04 07:39:58', '2020-08-04 07:39:58', 0),
(37, 1, 70, 5, 'images/qabael_categories/cQRNlWxUsri8XjqJieqKcEKtUDIRl2tvv7jTshLQ.jpeg', NULL, 'gdfg', 'dfgdf', 1, NULL, NULL, NULL, NULL, NULL, '2020-07-09 15:52:31', '2020-07-09 15:52:31', 0),
(38, 1, 70, 5, 'images/qabael_categories/n63MPeLqgSsYfnmkg2HWey2T56Wqo6uVfdpnGeSF.jpeg', NULL, 'gdfg', 'dfgdf', 1, NULL, NULL, NULL, NULL, NULL, '2020-07-09 15:52:49', '2020-07-09 15:52:49', 0),
(39, 1, 70, 5, 'images/qabael_categories/wVVH4vCiDbX0ZbJwbyDrdCdPrTllpw1ksdqZGWsA.jpeg', NULL, 'gdfg', 'dfgdf', 1, NULL, NULL, NULL, NULL, NULL, '2020-07-09 15:53:26', '2020-07-09 15:53:26', 0),
(40, 1, 70, 5, 'images/qabael_categories/fCoSuhiv9oTrW6HKvt1YExi25XeVEe8BKNx3ERdH.jpeg', NULL, 'eeee', 'eeee', 1, NULL, NULL, NULL, NULL, NULL, '2020-07-09 16:10:28', '2020-07-09 16:10:28', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
