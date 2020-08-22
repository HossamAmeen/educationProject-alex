-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2020 at 08:19 PM
-- Server version: 10.3.23-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makhjaib_education`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_private_rooms`
--

CREATE TABLE `file_private_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_private_rooms`
--

INSERT INTO `file_private_rooms` (`id`, `path`, `name`, `room_id`, `created_at`, `updated_at`) VALUES
(1, 'test path', 'Science with hossam private rrom ', 1, '2020-07-21 19:40:14', '2020-07-21 19:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `file_rooms`
--

CREATE TABLE `file_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_rooms`
--

INSERT INTO `file_rooms` (`id`, `path`, `name`, `room_id`, `created_at`, `updated_at`) VALUES
(2, '/home/makhjaib/sites/edu-profiles.com/public/2020-08-16/1597583396.jpg', 'شسي', 30, '2020-08-16 17:09:57', '2020-08-16 17:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `live_comments`
--

CREATE TABLE `live_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_id` bigint(20) UNSIGNED DEFAULT NULL,
  `person_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `live_comments`
--

INSERT INTO `live_comments` (`id`, `comment`, `user_name`, `type`, `live_id`, `person_id`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'hossam test', 'students', 1, 1, '2020-07-22 01:25:52', '2020-07-22 01:25:52'),
(2, 'asd', 'hossam test', 'students', 1, 1, '2020-07-22 01:25:52', '2020-07-22 01:25:52'),
(3, 'comment', 'hossam test', 'students', 1, 1, '2020-07-22 01:27:05', '2020-07-22 01:27:05'),
(4, 'comment 2', 'hossam test', 'students', 1, 1, '2020-07-22 01:27:24', '2020-07-22 01:27:24'),
(5, 'comment 3', 'hossam test', 'students', 1, 1, '2020-07-22 17:25:31', '2020-07-22 17:25:31'),
(6, 'ttt', 'hossam test', 'students', 1, 1, '2020-08-12 16:11:32', '2020-08-12 16:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `live_connects`
--

CREATE TABLE `live_connects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `live_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_05_29_220402_create_teachers_table', 1),
(9, '2020_07_15_085710_create_students_table', 1),
(10, '2020_07_15_085758_create_rooms_table', 1),
(11, '2020_07_15_085759_create_private_rooms_table', 1),
(12, '2020_07_15_090125_create_private_room_teachers_table', 1),
(13, '2020_07_15_090125_create_public_room_teachers_table', 1),
(14, '2020_07_15_090126_create_student_private_rooms_table', 1),
(15, '2020_07_15_090127_create_student_rooms_table', 1),
(16, '2020_07_15_152807_create_file_rooms_table', 1),
(17, '2020_07_15_153845_create_room_lives_table', 1),
(18, '2020_07_15_200652_create_private_room_lives_table', 1),
(19, '2020_07_15_202258_create_file_private_rooms_table', 1),
(20, '2020_07_18_090722_create_live_comments_table', 1),
(21, '2020_07_18_090838_create_live_connects_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('2e752efbfffca46faa1cda0e53ec8ab9b20cce035d4cf1110d07306d4b611cff2dcf47a6d507aa92', 31, 1, 'token', '[]', 0, '2020-07-23 00:46:24', '2020-07-23 00:46:24', '2021-07-22 20:46:24'),
('eeda29ce87b51eb16b717f22f86b8f70cb2a13043587aab4a5096333258fe4d57e73404ec9db165e', 29, 1, 'token', '[]', 0, '2020-07-22 22:40:24', '2020-07-22 22:40:24', '2021-07-22 18:40:24'),
('74aec6e63f25f50823aeab00abbd582b4e763f3e11797e96388eb499861b58cad6019a5292612fc7', 29, 1, 'token', '[]', 0, '2020-07-22 22:15:05', '2020-07-22 22:15:05', '2021-07-22 18:15:05'),
('2d05bf0126072ba77e59f3a980e5880081025b5f52e50d0a52ae92673937e57d838749e2c204bc51', 29, 1, 'token', '[]', 0, '2020-07-22 22:14:42', '2020-07-22 22:14:42', '2021-07-22 18:14:42'),
('b6beca492337fc436c4e9eabaec351662ef7eb88aa27686f8b3da80af3bc1d01f6fbfa0aced0b3d8', 30, 1, 'token', '[]', 0, '2020-07-21 20:37:11', '2020-07-21 20:37:11', '2021-07-21 16:37:11'),
('25e4e5796512c97365d32ce558526e5bf6427b10773ac51efd6fbefd9fbeef1407073183eb40d0e8', 29, 1, 'token', '[]', 0, '2020-07-23 03:28:37', '2020-07-23 03:28:37', '2021-07-22 23:28:37'),
('a75f88fdf4a34e0dd9fdf452d0f60af8982c978ebfcc56ad4dcc92d661882ba773ce944229be3b49', 29, 1, 'token', '[]', 0, '2020-07-23 02:55:25', '2020-07-23 02:55:25', '2021-07-22 22:55:25'),
('d8aaaf8fb2a357d33bb0549de955d3cb01064978f043797621c7acc11d426dc484ad61da9a9ba8ef', 33, 1, 'token', '[]', 0, '2020-07-23 02:53:54', '2020-07-23 02:53:54', '2021-07-22 22:53:54'),
('d7a7884db6fffc7ae1ea1dd4b8219ea9ab6d871fb0e02bd83b4f5f793d3d70d7921cbd30329f8752', 31, 1, 'token', '[]', 0, '2020-07-22 17:24:57', '2020-07-22 17:24:57', '2021-07-22 13:24:57'),
('7cc650c4661a0d228a0567f5fbf54b2e17791a19d0f24acca1318f828b8afd92fd102b489a7d3d98', 33, 1, 'token', '[]', 0, '2020-07-22 18:36:03', '2020-07-22 18:36:03', '2021-07-22 14:36:03'),
('5ab07cfd85dfd2e0d2159bc5f27606487457947f99d5e73f3677eee2c2e88798a3f05ec7022ad636', 29, 1, 'token', '[]', 0, '2020-07-23 02:44:45', '2020-07-23 02:44:45', '2021-07-22 22:44:45'),
('bd438e77f12de5d7ee0c9425e5e4bdc92686caadb561eba98537abe8ee351629d549e2b23f9163b7', 30, 1, 'token', '[]', 0, '2020-07-23 03:29:01', '2020-07-23 03:29:01', '2021-07-22 23:29:01'),
('e6436326fd996ae72c684b0530ae7d90421dc06e759a8cef975a971d42a38c075fd1de810d086fd8', 30, 1, 'token', '[]', 0, '2020-07-23 03:29:11', '2020-07-23 03:29:11', '2021-07-22 23:29:11'),
('90ddf6dc120c585a92072d7a5f946c6461fb188770dc7ca50b7150090c018d6e489742e6bac9cde9', 30, 1, 'token', '[]', 0, '2020-07-23 03:30:02', '2020-07-23 03:30:02', '2021-07-22 23:30:02'),
('f6a8f4eb92d51ef630239c3c0754b37abf20b5bf0e25a5ead42b6c7151dd32505ba45508e5b160be', 29, 1, 'token', '[]', 0, '2020-07-23 03:35:48', '2020-07-23 03:35:48', '2021-07-22 23:35:48'),
('8e9f1651343f4a65a17301f7e2a3ae45d53b0d4a69b24432ae6b3d76d622b9bcffeeb0033d13745e', 29, 1, 'token', '[]', 0, '2020-07-23 08:22:25', '2020-07-23 08:22:25', '2021-07-23 04:22:25'),
('408408f934a8fb5884ed59c74e9f9db0a133357b5b9cc80784dd21344b0a8e5b768829fd0fd7eb78', 29, 1, 'token', '[]', 0, '2020-07-23 13:06:36', '2020-07-23 13:06:36', '2021-07-23 09:06:36'),
('d68a3c3b831ee7fd3e8a789a1ca8e6a0e7432ff325959e94444279404fc11906639d50e5240d6b89', 33, 1, 'token', '[]', 0, '2020-07-23 13:24:20', '2020-07-23 13:24:20', '2021-07-23 09:24:20'),
('4ddda79424d9816adde137c3948a9ad52f903e99f93cdaacae2ef3bc366ed5bc9d1c0cae983827c3', 29, 1, 'token', '[]', 0, '2020-07-24 17:49:14', '2020-07-24 17:49:14', '2021-07-24 13:49:14'),
('76ea223c7e29974456630f59e1282501ee6e2972c163d68575abfc37700224d86d625fbbd6df1ba1', 31, 1, 'token', '[]', 0, '2020-07-25 05:02:19', '2020-07-25 05:02:19', '2021-07-25 01:02:19'),
('d7cd939cc1c78d1fd6f3f87e5b5f3a15bcb712a059e0f2e4142096732effc33a4cd12a5ac7186732', 29, 1, 'token', '[]', 0, '2020-07-25 07:21:06', '2020-07-25 07:21:06', '2021-07-25 03:21:06'),
('216cf5a06f1f6aaaa499b2559d4086bdd487eff7dca33dd22bdd4369e3832a8d4e7c08f513e6eb56', 34, 1, 'token', '[]', 0, '2020-07-25 12:01:01', '2020-07-25 12:01:01', '2021-07-25 08:01:01'),
('71fec794ebaa2dc866b9bd2b59643974a058c5c26472054c4dd53b121f4962624a402102fc8d5c0b', 34, 1, 'token', '[]', 0, '2020-07-25 12:01:24', '2020-07-25 12:01:24', '2021-07-25 08:01:24'),
('5676ee6598fff5805a8329f35d410984d6109a02f13d65763b60b9a886ddedb004a30cd22a52a2ac', 35, 1, 'token', '[]', 0, '2020-07-25 12:11:32', '2020-07-25 12:11:32', '2021-07-25 08:11:32'),
('d64c0423be63102179a15ae65641f6be4b5465cdc199aa596e0932063f057fb6a5493fdb0b89e043', 35, 1, 'token', '[]', 0, '2020-07-25 12:12:03', '2020-07-25 12:12:03', '2021-07-25 08:12:03'),
('9e021274b4e924740299dab882ce29f605c69df6d1b3f7d6af5e183ab5a6b678a342fa5fc6f583c5', 35, 1, 'token', '[]', 0, '2020-07-25 12:15:43', '2020-07-25 12:15:43', '2021-07-25 08:15:43'),
('cf7c99d6ef7e1c5363e8486bc81f0a5ee689f78141d2eab351a0547eb073e29f1404c0a81e947032', 34, 1, 'token', '[]', 0, '2020-07-25 12:20:42', '2020-07-25 12:20:42', '2021-07-25 08:20:42'),
('16eb282f9a1643e58758508610b5985db763381209485d6d258bc1651ac39e69dd6396f5b9c9ca7e', 33, 1, 'token', '[]', 0, '2020-07-25 12:42:02', '2020-07-25 12:42:02', '2021-07-25 08:42:02'),
('7a3bc5f369f7ccfff0b55eeb8ec8beca1c9913ef1182ae3076c630e1ca4489382ac88bc89e4e832c', 29, 1, 'token', '[]', 0, '2020-07-25 12:32:07', '2020-07-25 12:32:07', '2021-07-25 08:32:07'),
('8ce05d4e3648a2032249bf1d032f51420abe524e3f1f5989d4d708c91aec4ed45a8cbe6f1fdc96b9', 34, 1, 'token', '[]', 0, '2020-07-25 12:35:47', '2020-07-25 12:35:47', '2021-07-25 08:35:47'),
('69eebe4ddbf1056252354e2dd1643d3451348b139011e5f5f415bb7d3b52abb7ebcbfc6d5b95107d', 34, 1, 'token', '[]', 0, '2020-07-25 13:01:05', '2020-07-25 13:01:05', '2021-07-25 09:01:05'),
('06cf669268ee1a2408629fcecfc8d522c346d3b70f4b71d6c56b698f1fb099aafdd7402a97285095', 34, 1, 'token', '[]', 0, '2020-07-25 13:10:56', '2020-07-25 13:10:56', '2021-07-25 09:10:56'),
('57f09d0c73eefd42eddce79c47d508a182283f9dc4c0ea73bf956e4526ad76b0d96af9e80d77ad3c', 34, 1, 'token', '[]', 0, '2020-07-25 14:30:36', '2020-07-25 14:30:36', '2021-07-25 10:30:36'),
('d3b114c3290688c5134cac49243ddaa6c5ce59ca68dea430ac4ea989a33de79fda21aaacc9966e03', 35, 1, 'token', '[]', 0, '2020-07-25 16:06:30', '2020-07-25 16:06:30', '2021-07-25 12:06:30'),
('8440b6e8d7f9c14bada1edf29107b8cb279854f6fe587e284bfb7fe18193f8c3a93500925849c8a4', 35, 1, 'token', '[]', 0, '2020-07-25 16:09:02', '2020-07-25 16:09:02', '2021-07-25 12:09:02'),
('128ffbf1bdbdf690d40d9ef75bc2b113e1f9b87951c5f6ebb709ceb6923fc918cde9e82d1e77b1e2', 35, 1, 'token', '[]', 0, '2020-07-25 20:26:02', '2020-07-25 20:26:02', '2021-07-25 16:26:02'),
('f53d77cbd93d35dd9e5b4256578022590449bd3fc3e10c704a5a3eeef01d458ce38e55669c712f56', 33, 1, 'token', '[]', 0, '2020-07-25 20:31:14', '2020-07-25 20:31:14', '2021-07-25 16:31:14'),
('5b36e0622d685eb078c37fcb07ec825e0ad7e3434a6a4b310f3a645742875ffb31d9195bef3137d6', 33, 1, 'token', '[]', 0, '2020-07-27 21:27:57', '2020-07-27 21:27:57', '2021-07-27 17:27:57'),
('f30cc48f723548b1285219f21e7bb353183f26b2dadb1079ccb6f34b98708c296e89b20118f2f6a2', 29, 1, 'token', '[]', 0, '2020-07-25 20:34:21', '2020-07-25 20:34:21', '2021-07-25 16:34:21'),
('01c60637f2ccf1f4237506d6dc40c2e1f17a318206e6ba3a2abef1fde0bea8361c3ba400a7c0abb8', 35, 1, 'token', '[]', 0, '2020-07-27 02:42:50', '2020-07-27 02:42:50', '2021-07-26 22:42:50'),
('609bf454d4f5bbe8af66fc83727b2482dc6ff48d81a175c61034e42a25f2fbce7bd0981979d5f52e', 29, 1, 'token', '[]', 0, '2020-07-27 21:29:12', '2020-07-27 21:29:12', '2021-07-27 17:29:12'),
('3d05956d8e32be93d673d7b896b553be62c5c8376aa2c925a17f832781a1d2ce2b2a5fd496da5333', 29, 1, 'token', '[]', 0, '2020-08-15 03:44:06', '2020-08-15 03:44:06', '2021-08-14 23:44:06'),
('0b5f5b1746e03dfdb61242063cead4f84665765684935fb18c560f2e70f58d81e184ef3587fab66b', 34, 1, 'token', '[]', 0, '2020-07-28 07:35:49', '2020-07-28 07:35:49', '2021-07-28 03:35:49'),
('9cee1def0d30dad86c92d27e8e8724e7dda9bc42899148e86df9d97ee91b27437c0c9a27ac4e0b15', 34, 1, 'token', '[]', 0, '2020-07-28 13:50:29', '2020-07-28 13:50:29', '2021-07-28 09:50:29'),
('b865e92925362e758f411f51314896ab74ad0be0ddc4837d3999f9a72a7784854d900802d045c743', 45, 1, 'token', '[]', 0, '2020-08-16 23:29:11', '2020-08-16 23:29:11', '2021-08-16 19:29:11'),
('cf49a5d756365a6bd693a7452505961f3cc9336fa873d451844178ef5574b172436098a59bb256ab', 46, 1, 'token', '[]', 0, '2020-08-16 17:13:17', '2020-08-16 17:13:17', '2021-08-16 13:13:17'),
('711c986ddc9c33304ea15108448f917537cd88b3eb1f559b099c52caa01163770ac1b146217f547b', 34, 1, 'token', '[]', 0, '2020-07-29 10:49:36', '2020-07-29 10:49:36', '2021-07-29 06:49:36'),
('2401d4c0f99c2515f695a00f8f85a7b8811518aa3e149bb7b70a0253c3328c782a367373626365ad', 29, 1, 'token', '[]', 0, '2020-07-29 11:26:09', '2020-07-29 11:26:09', '2021-07-29 07:26:09'),
('de5eeb9a61a76f95201735be96cebbb9fb4df86f845d0206e8aa2da104a043161d545ee154349507', 34, 1, 'token', '[]', 0, '2020-07-29 15:12:56', '2020-07-29 15:12:56', '2021-07-29 11:12:56'),
('6623f7e165103ed0c4e29338cfcc1b9e141578304e81cda23879f3dc733b6734c4d5765709d1b0c3', 30, 1, 'token', '[]', 0, '2020-07-29 18:24:18', '2020-07-29 18:24:18', '2021-07-29 14:24:18'),
('f8178e13098912e89c56bf1e87766ce4c0706d1b57eb1f62971dbe36143eb05f8a19b059ac6cad51', 30, 1, 'token', '[]', 0, '2020-07-29 18:26:38', '2020-07-29 18:26:38', '2021-07-29 14:26:38'),
('21dca9ed559811940776f2c69a822604fa231ffd12c461ecec58fdaaeec20b4c29e81a4d8b2e17e6', 35, 1, 'token', '[]', 0, '2020-07-30 21:48:49', '2020-07-30 21:48:49', '2021-07-30 17:48:49'),
('8a23ab328a7c53e6a3d874d605f6319bb9bcfb340c8b5e72d20b82235f316326f236c94c8acf04b3', 34, 1, 'token', '[]', 0, '2020-07-30 22:17:24', '2020-07-30 22:17:24', '2021-07-30 18:17:24'),
('8723d2631787482bcb02f2d6fdd1508a070a7d974a9024b8328a5f2aa14ab63bb1628a83b22ff0c6', 29, 1, 'token', '[]', 0, '2020-07-31 15:46:52', '2020-07-31 15:46:52', '2021-07-31 11:46:52'),
('c39bb49e170d00a70a075ba775d7db78e12b7e4689bd8d3ff8d38a526cec41f362e9d0e62176cb47', 38, 1, 'token', '[]', 0, '2020-08-03 11:30:11', '2020-08-03 11:30:11', '2021-08-03 07:30:11'),
('e46ed21a0e323cba2f9329a5e5ab3bdc8b05f21325f3f71d08ee1e8f7528031ed3bcf36d4fc77e96', 38, 1, 'token', '[]', 0, '2020-08-03 11:30:29', '2020-08-03 11:30:29', '2021-08-03 07:30:29'),
('35d7fe9d41cfc13d6a185551c9cc8c175b0e8e82b87ba9a4241b00d840740addc18763624f7348cd', 35, 1, 'token', '[]', 0, '2020-08-04 21:02:48', '2020-08-04 21:02:48', '2021-08-04 17:02:48'),
('aa85b1720d577403c83177ee66718dbd4bc8839cec15269334fa776005e3e7c9dab5fa2b3da3ae34', 29, 1, 'token', '[]', 0, '2020-08-10 00:56:29', '2020-08-10 00:56:29', '2021-08-09 20:56:29'),
('3f02a64bca342ccd1957380b5a13ba19a42d1b83fbbb71af6b81dcb67f5e46022c380f9fb962d5a5', 29, 1, 'token', '[]', 0, '2020-08-10 01:01:48', '2020-08-10 01:01:48', '2021-08-09 21:01:48'),
('f20db591ef99e2a3c03667318a6163a9be7c40eb1bf17bf88145169f45c67efa31ad0155414acef3', 29, 1, 'token', '[]', 0, '2020-08-10 02:51:47', '2020-08-10 02:51:47', '2021-08-09 22:51:47'),
('4a5e3e8cd94b8d8a12a9dd3f37eb3db095c1217756f5ac5b29d55557d897f6eafcc3d31ba647e4a8', 29, 1, 'token', '[]', 0, '2020-08-10 04:57:08', '2020-08-10 04:57:08', '2021-08-10 00:57:08'),
('263f9ee84337cf7c1b3ad458d70f7fbd6d05006011eda1ade30c3a7d6ff0fb7019c9d96752c560dc', 29, 1, 'token', '[]', 0, '2020-08-10 06:01:29', '2020-08-10 06:01:29', '2021-08-10 02:01:29'),
('2ac2f1d96c15fbc99c60799993c1746777213483e0c95f2bff9ab1e3f9f4b32030bf312cc1fe06cc', 29, 1, 'token', '[]', 0, '2020-08-11 16:50:31', '2020-08-11 16:50:31', '2021-08-11 12:50:31'),
('719782fe8e361aebae9b7968a959af19eaa946ae8e75833b53f1bd54062f67ff3e70b1fd8a1bc8af', 29, 1, 'token', '[]', 0, '2020-08-12 10:17:50', '2020-08-12 10:17:50', '2021-08-12 06:17:50'),
('307400b0a4b43eddd2385b66e440872c6a0492a5612c5e162f65753131ac9f57130f225929282b74', 29, 1, 'token', '[]', 0, '2020-08-12 16:51:59', '2020-08-12 16:51:59', '2021-08-12 12:51:59'),
('375debdb4d51ad36cc76ec1f823671655a9159651ca35a72d47ae396d7b2d809c77546d5126a0b6f', 39, 1, 'token', '[]', 0, '2020-08-13 01:42:07', '2020-08-13 01:42:07', '2021-08-12 21:42:07'),
('142ee7f1fee899d84b830559ac41b0808118dcee0b705bc2888dc6629cf6001e7ef500c0f6a19d7d', 39, 1, 'token', '[]', 0, '2020-08-13 01:42:36', '2020-08-13 01:42:36', '2021-08-12 21:42:36'),
('f09f99ac3fb78747320ee315b55c07a99f821158da3f4c6eee40cad67e65127fd80d26246fd40a01', 40, 1, 'token', '[]', 0, '2020-08-15 00:41:04', '2020-08-15 00:41:04', '2021-08-14 20:41:04'),
('3806905ee80daf4619c4ae48994cc83f47ab4618012a3a63ea58bc4fc7082aefbb5c5cb877520722', 40, 1, 'token', '[]', 0, '2020-08-15 00:41:18', '2020-08-15 00:41:18', '2021-08-14 20:41:18'),
('92e4c7c4b851bfef3ec58f27e7688e0feba8b8ac1bbcdf0c1e9d5e53fbc818a297bced77819c2b14', 42, 1, 'token', '[]', 0, '2020-08-15 02:09:56', '2020-08-15 02:09:56', '2021-08-14 22:09:56'),
('1d635484720f4b377542781d91c6d692d016500b968bd335e37e7fccba7d68a2add38fc57307a8e8', 42, 1, 'token', '[]', 0, '2020-08-15 02:10:26', '2020-08-15 02:10:26', '2021-08-14 22:10:26'),
('ec9b093ea10355e6551c92d562eb9c653ecbe039b73de24f07a767f6d18447f90d49cf697deff5a6', 42, 1, 'token', '[]', 0, '2020-08-15 02:11:29', '2020-08-15 02:11:29', '2021-08-14 22:11:29'),
('b8dded92ee8e21e1445c2aabb78ec33e0f6ddc1fd38da42d82c7e245b07ca1612c7832072f9f38c2', 29, 1, 'token', '[]', 0, '2020-08-15 04:26:35', '2020-08-15 04:26:35', '2021-08-15 00:26:35'),
('9889b1b20b95dced93ed410c7009a232bc0a4d7dea4c6f3cf082d8a4fbd9edc665ae8b05da344db1', 44, 1, 'token', '[]', 0, '2020-08-15 04:25:25', '2020-08-15 04:25:25', '2021-08-15 00:25:25'),
('68613c8556244adecee5bfe84316b258aaca86b081be5f35253f97d9a4507c2dd99b264074ef78c0', 44, 1, 'token', '[]', 0, '2020-08-15 04:25:36', '2020-08-15 04:25:36', '2021-08-15 00:25:36'),
('b521de1e8326ddc31d401f9fbdbe78d515dddfc35c1eb636a33d544c3cbd454f3ffd96cf6bb35079', 27, 1, 'token', '[]', 0, '2020-08-15 04:38:53', '2020-08-15 04:38:53', '2021-08-15 00:38:53'),
('b1b62e84a81e94b7129f45f0b21715e960bb0945fd2ca7b4e0bc12623e0f0c913d0e12f1f75f9a15', 45, 1, 'token', '[]', 0, '2020-08-16 00:35:48', '2020-08-16 00:35:48', '2021-08-15 20:35:48'),
('620c8747678b680b152f93743e6ebe6f3538c4906124038519eaddb0844fca0d0da2380b99b51a89', 45, 1, 'token', '[]', 0, '2020-08-16 00:36:04', '2020-08-16 00:36:04', '2021-08-15 20:36:04'),
('619e8959d84ca2b257de04ac69cfbeadcfde91ac3ad6b10a702237796c6c76e6de4a0f5b99667aff', 45, 1, 'token', '[]', 0, '2020-08-16 04:56:54', '2020-08-16 04:56:54', '2021-08-16 00:56:54'),
('c26a7385ddf4d67ed4a2134cc8d05dea3dbf5180b4a5fc552f53525af7d38787228768bd66807a6a', 45, 1, 'token', '[]', 0, '2020-08-16 07:13:21', '2020-08-16 07:13:21', '2021-08-16 03:13:21'),
('b2a96de80698180f43345c93ce2fc3e3a943140ffc6117822edf36653d8f02f03bd05746c474ef85', 34, 1, 'token', '[]', 0, '2020-08-16 17:22:56', '2020-08-16 17:22:56', '2021-08-16 13:22:56'),
('715830229d43a0c84491817e22d27358db66acce7e72dd2abcfcf8613cc87db4b6869fddd3689844', 45, 1, 'token', '[]', 0, '2020-08-16 23:30:03', '2020-08-16 23:30:03', '2021-08-16 19:30:03'),
('c73b5a7647a2784505b73e113ec09ce16a2ee8359fc72c1f87c5bc19b470296420dd196038aa5215', 45, 1, 'token', '[]', 0, '2020-08-17 16:39:23', '2020-08-17 16:39:23', '2021-08-17 12:39:23'),
('3946d28e77dbc09e28dad5b58169e02ac95b195d28c2496d49b0de662de7666c8b0ce8150da4f95a', 45, 1, 'token', '[]', 0, '2020-08-17 17:05:19', '2020-08-17 17:05:19', '2021-08-17 13:05:19'),
('fcc499205933e87d0c3b21935261212f9fd8463f7ff424d9bd78350a7781b3be052c26165cdfb1f8', 1, 1, 'token', '[]', 0, '2020-08-17 21:46:58', '2020-08-17 21:46:58', '2021-08-17 17:46:58'),
('0d71924c86b01827f9f66a8ed01c49a11d1ed41718e92ed9ad89eda9959b6ce753a47089407bd986', 35, 1, 'token', '[]', 0, '2020-08-17 21:49:16', '2020-08-17 21:49:16', '2021-08-17 17:49:16'),
('96a1b9bc4e19705fb7c614dcc9e726a9ecfe838b9bf30ed6136060a58cd52ee4443b0e4d676152b3', 35, 1, 'token', '[]', 0, '2020-08-17 22:25:04', '2020-08-17 22:25:04', '2021-08-17 18:25:04'),
('2a45c50a34a2bb0354997becc2871de032d27247636d103897e22a9ef4f4fee9a49a1962b23e1e59', 45, 1, 'token', '[]', 0, '2020-08-17 22:25:35', '2020-08-17 22:25:35', '2021-08-17 18:25:35'),
('8163b1e8a4fa6710a35e9e77d0bbee4678052447170ea212cedf9c9f4d8bfde5902cde070ab32cd8', 47, 1, 'token', '[]', 0, '2020-08-18 13:51:06', '2020-08-18 13:51:06', '2021-08-18 09:51:06'),
('5142fbd7b82cc852e7996e50c18887250dfcad56c9f54e42b8589d9a82625b3450ecf1c14442e5ee', 47, 1, 'token', '[]', 0, '2020-08-18 13:52:32', '2020-08-18 13:52:32', '2021-08-18 09:52:32'),
('0d7e79e01dfa6266a471745f7705d15fcfdb5bc87e9bda9f38160bd95327856f047408e5027d4d20', 47, 1, 'token', '[]', 0, '2020-08-18 17:29:46', '2020-08-18 17:29:46', '2021-08-18 13:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'TWmVLptfyn4vpsR3NcQUsAwF0URCBKvVpRnjnp90', NULL, 'http://localhost', 1, 0, 0, '2020-07-21 19:40:23', '2020-07-21 19:40:23'),
(2, NULL, 'Laravel Password Grant Client', 'Rlf9PbAaNz4U20cJEophlgLqzhwBnxTHZBiBMO26', 'users', 'http://localhost', 0, 1, 0, '2020-07-21 19:40:24', '2020-07-21 19:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-07-21 19:40:24', '2020-07-21 19:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `private_rooms`
--

CREATE TABLE `private_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'education.png',
  `approvement` enum('under_revision','accept','blocked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'under_revision',
  `block_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `private_rooms`
--

INSERT INTO `private_rooms` (`id`, `name`, `subject`, `image`, `approvement`, `block_reason`, `teacher_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Science with hossam', 'Science', 'education.png', 'under_revision', NULL, 1, 1, '2020-07-21 19:40:14', '2020-07-21 19:40:14'),
(2, 'room3', 'math', 'education.png', 'under_revision', NULL, 11, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(3, 'room14', 'math', 'education.png', 'under_revision', NULL, 13, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(4, 'room7', 'math', 'education.png', 'under_revision', NULL, 5, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(5, 'room4', 'math', 'education.png', 'under_revision', NULL, 2, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(6, 'room11', 'math', 'education.png', 'under_revision', NULL, 8, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(7, 'room1', 'math', 'education.png', 'under_revision', NULL, 6, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(8, 'room6', 'math', 'education.png', 'under_revision', NULL, 8, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(9, 'room13', 'math', 'education.png', 'under_revision', NULL, 11, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(10, 'room4', 'math', 'education.png', 'under_revision', NULL, 10, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(11, 'room14', 'math', 'education.png', 'under_revision', NULL, 6, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(12, 'room2', 'math', 'education.png', 'under_revision', NULL, 12, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(13, 'room3', 'math', 'education.png', 'under_revision', NULL, 14, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(14, 'room7', 'math', 'education.png', 'under_revision', NULL, 3, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(15, 'room6', 'math', 'education.png', 'under_revision', NULL, 5, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(16, 'room7', 'math', 'education.png', 'under_revision', NULL, 5, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(17, 'room9', 'math', 'education.png', 'under_revision', NULL, 1, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(18, 'room14', 'math', 'education.png', 'under_revision', NULL, 15, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(19, 'room1', 'math', 'education.png', 'under_revision', NULL, 2, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(20, 'room15', 'math', 'education.png', 'under_revision', NULL, 6, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(21, 'room11', 'math', 'education.png', 'under_revision', NULL, 12, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(22, 'room4', 'math', 'education.png', 'under_revision', NULL, 1, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(23, 'room11', 'math', 'education.png', 'under_revision', NULL, 12, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(24, 'room5', 'math', 'education.png', 'under_revision', NULL, 12, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(25, 'room8', 'math', 'education.png', 'under_revision', NULL, 9, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18'),
(26, 'room12', 'math', 'education.png', 'under_revision', NULL, 4, 1, '2020-07-21 19:40:18', '2020-07-21 19:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `private_room_lives`
--

CREATE TABLE `private_room_lives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_video_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `private_room_lives`
--

INSERT INTO `private_room_lives` (`id`, `appointment`, `name`, `youtube_video_path`, `description`, `room_id`, `created_at`, `updated_at`) VALUES
(1, 'thunday 20:30', 'live Science with hossam private room', 'test path', 'science with hossam  private room', 1, '2020-07-21 19:40:14', '2020-07-21 19:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `private_room_teachers`
--

CREATE TABLE `private_room_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_room_teachers`
--

CREATE TABLE `public_room_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `public_room_teachers`
--

INSERT INTO `public_room_teachers` (`id`, `teacher_id`, `room_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2020-07-21 19:40:14', '2020-07-21 19:40:14'),
(2, 30, 28, NULL, '2020-07-22 18:30:14', '2020-07-22 18:30:14'),
(3, 29, 29, NULL, '2020-08-15 03:46:03', '2020-08-15 03:46:03'),
(4, 29, 30, NULL, '2020-08-15 03:46:32', '2020-08-15 03:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'education.png',
  `approvement` enum('under_revision','accept','blocked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'accept',
  `block_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `subject`, `image`, `approvement`, `block_reason`, `teacher_id`, `user_id`, `created_at`, `updated_at`) VALUES
(29, 'KG 1', 'اللغة العربية', 'education.png', 'blocked', NULL, 29, NULL, '2020-08-15 03:46:03', '2020-08-15 03:46:03'),
(30, 'KG 1', 'انجليزى', 'education.png', 'blocked', NULL, 29, NULL, '2020-08-15 03:46:32', '2020-08-15 03:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `room_lives`
--

CREATE TABLE `room_lives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_video_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connecters` int(11) DEFAULT 0,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_lives`
--

INSERT INTO `room_lives` (`id`, `appointment`, `name`, `youtube_video_path`, `description`, `connecters`, `room_id`, `created_at`, `updated_at`) VALUES
(1, 'thunday 20:30', 'live Science with hossam', 'test path', 'science with hossam', 0, 1, '2020-07-21 19:40:14', '2020-07-21 19:40:14'),
(2, '2020-07-21 00:00:00', '11', 'rtmp://b.rtmp.youtube.com/live2?backup=1', '4444', 0, 27, '2020-07-21 20:40:36', '2020-07-21 20:40:36'),
(3, '2020-07-21 22:32:00', '111', 'https://youtu.be/EkB2ikIjNmI', '424', 0, 27, '2020-07-22 00:28:54', '2020-07-22 00:28:54'),
(4, '2020-07-21 22:33:00', '123', 'https://youtu.be/EkB2ikIjNmI', '658465', 0, 1, '2020-07-22 00:32:05', '2020-07-22 00:32:05'),
(5, '2020-07-21 00:59:00', '11', '<iframe width=\"727\" height=\"409\" src=\"https://www.youtube.com/embed/EkB2ikIjNmI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '3656353', 0, 1, '2020-07-22 00:35:12', '2020-07-22 00:35:12'),
(6, '2020-07-21 22:39:00', 'vxcv', 'https://www.youtube.com/watch?v=kynXfJ9YuA0', 'vxccv', 0, 1, '2020-07-22 00:36:56', '2020-07-22 00:36:56'),
(7, '2020-07-21 22:44:00', '1023', 'https://www.youtube.com/watch?v=kynXfJ9YuA0', '12365', 0, 1, '2020-07-22 00:42:24', '2020-07-22 00:42:24'),
(8, '2020-07-22 16:39:00', '11', 'watch?v=arqQd-nP-bc', ',.m.,m', 0, 28, '2020-07-22 18:37:30', '2020-07-22 18:37:30'),
(9, '2020-07-21 02:54:00', '111', '/watch?v=arqQd-nP-bc', '124', 0, 28, '2020-07-22 18:52:05', '2020-07-22 18:52:05'),
(10, '2020-07-22 19:55:00', '3', 'watch?v=FtKHUSOPhIs&t=64s', 'jhbhjbhjbjhbjb', 0, 28, '2020-07-22 18:53:37', '2020-07-22 18:53:37'),
(11, '2020-07-22 18:24:00', '233', 'pdHqle1Qmzk', 'لليلب ب بي  بل لللللل', 0, 28, '2020-07-22 20:23:18', '2020-07-22 20:23:18'),
(12, '2020-07-23 00:56:00', 'lllll', 'vG1A9HcPKiI&feature=share&fbclid=IwAR2NP4VOmzgdfmVcZACCp6UyKMjsIV0SbmvD2NCcAU7JaKohtxcyFHGUYOg', 'n,nm', 0, 28, '2020-07-23 02:54:48', '2020-07-23 02:54:48'),
(13, '2020-07-23 01:00:00', '22121', 'vG1A9HcPKiI&feature=youtu.be', 'lll', 0, 28, '2020-07-23 02:58:53', '2020-07-23 02:58:53'),
(14, '2020-07-23 13:06:00', 'dsfds', 'itTspwR0clg&feature', 'dsfdsf', 0, 28, '2020-07-23 03:03:40', '2020-07-23 03:03:40'),
(15, '2020-07-23 13:06:00', 'scsca', 'itTspwR0clg&feature=youtu.be', 'sacscsa', 0, 28, '2020-07-23 03:04:14', '2020-07-23 03:04:14'),
(16, '2020-07-23 11:59:00', '22', 'CDI_IP0v7Zk', '222', 0, 28, '2020-07-23 03:28:00', '2020-07-23 03:28:00'),
(17, '2020-07-23 23:59:00', 'csc', '8nhxBijns7s', 'cscsc', 0, 28, '2020-07-23 13:24:54', '2020-07-23 13:24:54'),
(18, '2020-07-25 00:00:00', 'جهاد', '1pjezKToYYU&feature', 'تجربه جديده', 0, 28, '2020-07-25 12:44:54', '2020-07-25 12:44:54'),
(19, '2020-07-25 10:47:00', 'tv', '1pjezKToYYU&feature', 'wwwdwdw', 0, 28, '2020-07-25 12:46:30', '2020-07-25 12:46:30'),
(20, '2020-07-25 23:59:00', 'جهاد جهاد', '1pjezKToYYU', 'تجربه', 0, 28, '2020-07-25 12:48:17', '2020-07-25 12:48:17'),
(21, '2020-07-27 23:59:00', 'ؤؤؤؤ', '3qCzdPkAIgc&feature', 'سيؤسشي', 0, 28, '2020-07-27 21:28:30', '2020-07-27 21:28:30'),
(22, '2020-07-27 19:42:00', 'asdas', '_W0qNhKDn1g&feature', 'gfgdfgdfg', 0, 28, '2020-07-27 21:39:36', '2020-07-27 21:39:36'),
(23, '2020-07-27 19:42:00', '5646', 'W0qNhKDn1g&feature_', '65+5+6', 0, 28, '2020-07-27 21:40:39', '2020-07-27 21:40:39'),
(24, '2020-07-27 23:59:00', 'sds', '_W0qNhKDn1g', 'sdas', 0, 28, '2020-07-27 21:44:09', '2020-07-27 21:44:09'),
(25, '2020-07-27 23:59:00', 'sds', '_W0qNhKDn1g', 'sdas', 0, 28, '2020-07-27 21:44:12', '2020-07-27 21:44:12'),
(26, '2020-07-27 23:59:00', 'sadas', 'feature', 'saa', 0, 28, '2020-07-27 21:44:38', '2020-07-27 21:44:38'),
(27, '2020-08-15 00:00:00', 'اعلان المنصه تجريبى', 'feature', 'انتظرونا قريبا', 0, 30, '2020-08-15 04:32:15', '2020-08-15 04:32:15'),
(28, '2020-08-15 12:59:00', 'اعلان المنصه تجريبى	1', 'xiocCl2kP4', 'تجريبى', 0, 30, '2020-08-15 04:34:28', '2020-08-15 04:34:28'),
(29, '2020-08-15 23:59:00', 'اعلان المنصه تجريبى 9', 'xiocCl2kP4c&feature', 'انتظرونا قريبا', 0, 30, '2020-08-15 04:35:38', '2020-08-15 04:35:38'),
(30, '2020-08-15 00:00:00', 'اعلان المنصه الجديد', 'xiocCl2kP4c', 'انتظرونا قريبا', 0, 30, '2020-08-15 04:36:54', '2020-08-15 04:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approvement` enum('under_revision','accept','blocked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'under_revision',
  `block_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'avatar.png',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `full_name`, `email`, `user_name`, `password`, `phone`, `level`, `approvement`, `block_reason`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(47, 'jsjsj', 'hsbsb@hsjjs.com', '01210212999', '$2y$10$PM0ns0lOJ5h6w8kIr/QZD.7kN6XV68tGUOFyHv29QyeshWZyKGcea', '01210212999', '_', 'under_revision', NULL, 'avatar.png', NULL, '2020-08-18 13:51:06', '2020-08-18 13:51:06'),
(43, 'hamada', 'hamada@gmama.con', 'hamadatvmax', '$2y$10$nr4DnYWxftmspJbrI6srwO0PWJ7mx9yVxu3Jrrvr2.YBi6kt7JHbm', '01210212993', 'primary', 'accept', NULL, 'avatar.png', NULL, '2020-08-15 03:47:41', '2020-08-15 03:47:41'),
(44, 'hahah', 'jdjdjd@jdjd.djd', '012111111111', '$2y$10$8DQBh7cSlS90x9HIctMZ1OwNvYygk0Xlr0/n3EWZsSOSgJoSxxGSS', '012111111111', 'secondary', 'accept', NULL, 'avatar.png', NULL, '2020-08-15 04:25:25', '2020-08-16 17:08:14'),
(45, 'hamada', 'nzjzj@jsjs.jsn', '01210212993', '$2y$10$a6u3OydaBXH6VJ4myKiJVumx6TOCUGpEfXzRO4K78v7HjTlwvQH5u', '01210212993', '_', 'under_revision', NULL, 'avatar.png', NULL, '2020-08-16 00:35:48', '2020-08-16 00:35:48'),
(46, 'hossam ameen', 'hosamameem948@gmail.com', 'hossam_ameen', '$2y$10$P8GUET93GRhQ0.L2mJQNoulgwVT8s4nd3MB7ddu1rFClVWvJBvcAu', '01010079798', 'secondary', 'under_revision', NULL, 'avatar.png', NULL, '2020-08-16 17:13:17', '2020-08-16 17:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `student_private_rooms`
--

CREATE TABLE `student_private_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `approvement` enum('under_revision','accept','blocked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'under_revision',
  `block_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_private_rooms`
--

INSERT INTO `student_private_rooms` (`id`, `approvement`, `block_reason`, `student_id`, `room_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'under_revision', NULL, 27, 1, NULL, '2020-07-21 20:11:40', '2020-07-21 20:11:40'),
(2, 'under_revision', NULL, 27, 3, NULL, '2020-07-21 20:11:53', '2020-07-21 20:11:53'),
(3, 'under_revision', NULL, 27, 17, NULL, '2020-07-21 20:41:18', '2020-07-21 20:41:18'),
(4, 'under_revision', NULL, 27, 18, NULL, '2020-07-21 20:41:24', '2020-07-21 20:41:24'),
(5, 'under_revision', NULL, 27, 20, NULL, '2020-07-21 20:41:30', '2020-07-21 20:41:30'),
(6, 'under_revision', NULL, 27, 8, NULL, '2020-07-22 00:29:26', '2020-07-22 00:29:26'),
(7, 'under_revision', NULL, 27, 15, NULL, '2020-07-22 00:29:46', '2020-07-22 00:29:46'),
(8, 'under_revision', NULL, 27, 2, NULL, '2020-07-22 00:32:14', '2020-07-22 00:32:14'),
(9, 'under_revision', NULL, 27, 4, NULL, '2020-07-22 06:34:50', '2020-07-22 06:34:50'),
(10, 'under_revision', NULL, 27, 19, NULL, '2020-07-22 06:36:06', '2020-07-22 06:36:06'),
(11, 'under_revision', NULL, 34, 1, NULL, '2020-07-25 12:22:27', '2020-07-25 12:22:27'),
(12, 'under_revision', NULL, 35, 26, NULL, '2020-07-25 20:26:21', '2020-07-25 20:26:21'),
(13, 'under_revision', NULL, 34, 20, NULL, '2020-07-29 15:13:23', '2020-07-29 15:13:23'),
(14, 'under_revision', NULL, 30, 1, NULL, '2020-07-29 18:26:50', '2020-07-29 18:26:50'),
(15, 'under_revision', NULL, 38, 2, NULL, '2020-08-03 11:34:09', '2020-08-03 11:34:09'),
(16, 'under_revision', NULL, 40, 1, NULL, '2020-08-15 00:44:04', '2020-08-15 00:44:04'),
(17, 'under_revision', NULL, 42, 1, NULL, '2020-08-15 02:14:01', '2020-08-15 02:14:01'),
(18, 'under_revision', NULL, 42, 5, NULL, '2020-08-15 02:14:32', '2020-08-15 02:14:32'),
(19, 'under_revision', NULL, 44, 18, NULL, '2020-08-15 04:41:05', '2020-08-15 04:41:05'),
(20, 'under_revision', NULL, 45, 2, NULL, '2020-08-16 05:21:21', '2020-08-16 05:21:21'),
(21, 'under_revision', NULL, 45, 1, NULL, '2020-08-16 23:29:56', '2020-08-16 23:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `student_rooms`
--

CREATE TABLE `student_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `approvement` enum('under_revision','accept','blocked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'under_revision',
  `block_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_rooms`
--

INSERT INTO `student_rooms` (`id`, `approvement`, `block_reason`, `student_id`, `room_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'under_revision', NULL, 27, 1, NULL, '2020-07-21 20:41:43', '2020-07-21 20:41:43'),
(2, 'under_revision', NULL, 27, 27, NULL, '2020-07-21 20:41:56', '2020-07-21 20:41:56'),
(3, 'under_revision', NULL, 27, 6, NULL, '2020-07-22 00:30:06', '2020-07-22 00:30:06'),
(4, 'under_revision', NULL, 27, 7, NULL, '2020-07-22 00:30:11', '2020-07-22 00:30:11'),
(5, 'under_revision', NULL, 27, 4, NULL, '2020-07-22 17:19:40', '2020-07-22 17:19:40'),
(6, 'under_revision', NULL, 27, 28, NULL, '2020-07-22 18:38:16', '2020-07-22 18:38:16'),
(7, 'under_revision', NULL, 29, 28, NULL, '2020-07-22 22:15:13', '2020-07-22 22:15:13'),
(8, 'under_revision', NULL, 29, 1, NULL, '2020-07-22 22:16:31', '2020-07-22 22:16:31'),
(9, 'under_revision', NULL, 29, 2, NULL, '2020-07-22 22:16:44', '2020-07-22 22:16:44'),
(10, 'under_revision', NULL, 30, 28, NULL, '2020-07-23 03:29:29', '2020-07-23 03:29:29'),
(11, 'under_revision', NULL, 29, 25, NULL, '2020-07-23 08:23:22', '2020-07-23 08:23:22'),
(12, 'under_revision', NULL, 34, 1, NULL, '2020-07-25 12:21:23', '2020-07-25 12:21:23'),
(13, 'under_revision', NULL, 34, 2, NULL, '2020-07-25 12:22:07', '2020-07-25 12:22:07'),
(14, 'under_revision', NULL, 34, 28, NULL, '2020-07-25 12:32:25', '2020-07-25 12:32:25'),
(15, 'under_revision', NULL, 35, 28, NULL, '2020-07-25 12:32:38', '2020-07-25 12:32:38'),
(16, 'under_revision', NULL, 38, 4, NULL, '2020-08-03 11:31:45', '2020-08-03 11:31:45'),
(17, 'under_revision', NULL, 39, 28, NULL, '2020-08-13 01:42:55', '2020-08-13 01:42:55'),
(18, 'under_revision', NULL, 40, 28, NULL, '2020-08-15 00:42:01', '2020-08-15 00:42:01'),
(19, 'under_revision', NULL, 42, 28, NULL, '2020-08-15 02:10:34', '2020-08-15 02:10:34'),
(20, 'under_revision', NULL, 44, 30, NULL, '2020-08-15 04:32:22', '2020-08-15 04:32:22'),
(21, 'under_revision', NULL, 45, 30, NULL, '2020-08-16 00:36:30', '2020-08-16 00:36:30'),
(22, 'under_revision', NULL, 46, 30, NULL, '2020-08-16 17:18:08', '2020-08-16 17:18:08'),
(23, 'under_revision', NULL, 47, 30, NULL, '2020-08-18 13:52:47', '2020-08-18 13:52:47'),
(24, 'under_revision', NULL, 47, 29, NULL, '2020-08-18 13:55:47', '2020-08-18 13:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approvement` enum('under_revision','accept','blocked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'under_revision',
  `block_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'avatar.png',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `full_name`, `email`, `user_name`, `password`, `phone`, `approvement`, `block_reason`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(34, 'hossam', 'school@gmail.com', 'hossamameen', '$2y$10$W79s.N2EH2uiCeEGsnHBKeDpwTr6b8JUFZQxcRuZNUEyrOJkJUcpu', '01010079798', 'accept', NULL, 'avatar.png', NULL, '2020-08-16 17:22:22', '2020-08-16 17:22:22'),
(35, 'islam', 'islamansour@g.com', 'islamansour', '$2y$10$e50GD4Hgv5Xpg58690NPiuwNlRxJW/mX5llfmM/qcO0QXcstru7GO', '01010079798', 'accept', NULL, 'avatar.png', NULL, '2020-08-17 21:49:01', '2020-08-17 21:49:01'),
(29, 'hamadatv', 'hamdatvmax@gmail.com', 'max', '$2y$10$lnGRXdl7CL7c6Ig2IB2Aiescd7wfXwjpvihevY3ovLEVcYibFuKt2', '01210212993', 'accept', NULL, 'avatar.png', NULL, '2020-07-21 20:32:58', '2020-07-21 20:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `name`, `password`, `phone`, `email`, `role`, `image`, `user_id`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$10$wQxfnttj.Og1hG136pr1U.1I8vDI1LMeve9jwuTh7Jv1iRInD4qmC', '01010079798', 'asd@asd.asd', 1, NULL, 1, NULL, NULL, '2020-07-21 19:40:14', '2020-07-21 19:40:14'),
(3, 'Carolyne Jenkins_user', 'Mr. Destin Daniel', '$2y$10$hqudQWahIRzp8b/cDY/q3eR5pRSI7E8seDXKU70cA1VvfnznRJFTO', '+5783042045060', 'gerardo.cummings@hettinger.com', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(4, 'Anderson Quigley_user', 'Dr. Pete Mayer', '$2y$10$KeRlRAvVOsRaZO/U.TKzu.JU5M9K6KQhtFLUV99QRi3sFzVOe/Ko.', '+7988126553345', 'ecummings@sauer.biz', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(5, 'Rosalind Krajcik_user', 'Abdul Ratke II', '$2y$10$D.DsnOfpJNt48taIHpzzYOvbly/aFUIbx.QGd.thvIur8w2kuFtEG', '+6379270850413', 'abbott.edmund@zulauf.com', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(6, 'Skye Wisozk_user', 'Jedediah Rosenbaum', '$2y$10$4SSL.tEjdd.tRgX2AuAcr.cu2JXoG9Fz5Gz2P9fg/KBQbCc0gJWlu', '+3708048477656', 'ugislason@hotmail.com', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(7, 'Mr. Dewayne Waelchi PhD_user', 'Gunner Aufderhar', '$2y$10$CQOd2sYf1v3o75SHjAfDouvbYS7sG8ICV0q.uVNEOQPp.KfzMlHXO', '+3081613699604', 'trinity09@bahringer.biz', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(8, 'Antonetta Waters_user', 'Mrs. Katelyn Gislason IV', '$2y$10$NOz1.VhRUni2oP8em/CZTudbIyEl9NDIcwgdeAnEeCKqGRmvr/XFm', '+6477788143857', 'welch.niko@hotmail.com', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(9, 'Dr. Elfrieda Dietrich II_user', 'Charley Beatty', '$2y$10$zwT23Wvb3I3nq701JuQosOMMkz6BrKpHfasKUoWPQfRI7kVj78za6', '+7903636488720', 'powlowski.rhea@zulauf.info', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(10, 'Frederic Fritsch_user', 'Alexane Wyman', '$2y$10$M/rUGVFeT7/PcshpsI/hiuWuPVDSGGOZ2.37QLwqItgZOjMUUt4XC', '+1638351230681', 'adolf43@gmail.com', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(11, 'Antonina Doyle_user', 'Esperanza Kuvalis', '$2y$10$4wNOONI6forEMO8yW4MJpO/pCY3WQFOEziXUX6fr8ezfB9B1LHSzC', '+8630652584160', 'kasandra48@rolfson.biz', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(12, 'Prof. Maymie Hand IV_user', 'Isadore Abernathy Sr.', '$2y$10$AlC56xEsWQvXbS2Gxqp/eO.8GyFuQwBjS7yr59xg4/d1mJMMe.CWy', '+2241348410596', 'wiza.gia@dubuque.com', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(13, 'Tevin Skiles_user', 'Dell Prosacco', '$2y$10$ouE5S.LlqkGjg9Co1MBb6uQAj74GBCjuVswkenbul/miCIwR4y3vW', '+6853107074172', 'andre.marks@gmail.com', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(14, 'Adelbert Huels_user', 'Maybell Bayer', '$2y$10$x.hzAOuIY1f4Hy4Q6KiocuZ8NYxcqJkupxoMvh/SOwnmWf8Xmkuce', '+5509038625046', 'jakubowski.stefanie@hotmail.com', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(15, 'Gina Koch_user', 'Estella McClure', '$2y$10$enWiRkdft/jlNXIh3KaGmeekWfT3knhjGmi4/DIbx8EDcZ0bdaqXy', '+3493122088792', 'jkunze@yahoo.com', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(16, 'Shad Runte_user', 'Lenna Grant', '$2y$10$eW163ZpptsRMJIuJHfusW.sDAR8K/o6e8hdWdHTFuJevzckOEz7bK', '+5614811378774', 'thiel.alaina@hotmail.com', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(17, 'Ms. Marian Muller_user', 'Johnnie Watsica V', '$2y$10$K4idmgGiu.NNpIXXiZ0Og.B8po7wtYxl3a/6ANDXSZ3eQYCv2xJ0u', '+2520977254280', 'jean.cremin@king.com', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(18, 'Mrs. Natasha D\'Amore I_user', 'Prof. Tobin Renner DDS', '$2y$10$9BfNKw.yiImsp0jLutdoauFTSJzqC2r6jt4wDjmwrcoxrpTmRAo6S', '+4564556759986', 'dave37@fritsch.com', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(19, 'Jackson Leffler_user', 'Consuelo Veum III', '$2y$10$59GsTzDp/TjgS2g5Mq5LIum/EG3dn/qfqhZZJEKVrvjMlUxHYepYa', '+4224803542333', 'junius73@gmail.com', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(20, 'Mariela Quigley_user', 'Dr. Elmo Hauck DVM', '$2y$10$SkLShb3Lt7zQK/FqNZuM2uqgeQnon9A0k7Ttauh8qns14fmBr0DhS', '+2981573496328', 'goldner.eleanora@barton.net', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(21, 'Daron Abshire_user', 'Elisa Johnston Sr.', '$2y$10$zvatP8my2aBZ8z4mlFnMmODNcxpEMX3HIjepVo1hd4UbTtXMIATAK', '+3722143835073', 'purdy.corrine@wuckert.com', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(24, 'Donnell Osinski_user', 'Clifton Jerde', '$2y$10$n0wvPFam8JGfe4JzfUcAZOqxPoFlkwdkA/TfsCHhCLLfTUkHMLz.O', '+2387170338819', 'nitzsche.rudy@strosin.com', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(25, 'Prof. Vern Bartell PhD_user', 'Kavon Leannon', '$2y$10$5RWk3Nn/qylWKsiTWGnWyugHrUMgdzb0Uk/UB4K47Yn5xsHgRH3CC', '+5658833635403', 'idach@stracke.com', 2, NULL, 1, NULL, NULL, '2020-07-21 19:40:15', '2020-07-21 19:40:15'),
(27, 'max', 'hamadatv', '$2y$10$tzyltUs66fyfe39YTjVXpOE7NDP0Rbd9z/3mn.usRTjWLROl8DGlK', '01023470962', 'hamadatvmax@gmail.com', 2, NULL, NULL, NULL, NULL, '2020-07-21 20:04:14', '2020-07-21 20:04:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_private_rooms`
--
ALTER TABLE `file_private_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_private_rooms_room_id_foreign` (`room_id`);

--
-- Indexes for table `file_rooms`
--
ALTER TABLE `file_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_rooms_room_id_foreign` (`room_id`);

--
-- Indexes for table `live_comments`
--
ALTER TABLE `live_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `live_comments_live_id_foreign` (`live_id`);

--
-- Indexes for table `live_connects`
--
ALTER TABLE `live_connects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `live_connects_live_id_foreign` (`live_id`),
  ADD KEY `live_connects_student_id_foreign` (`student_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `private_rooms`
--
ALTER TABLE `private_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `private_rooms_teacher_id_foreign` (`teacher_id`),
  ADD KEY `private_rooms_user_id_foreign` (`user_id`);

--
-- Indexes for table `private_room_lives`
--
ALTER TABLE `private_room_lives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `private_room_lives_room_id_foreign` (`room_id`);

--
-- Indexes for table `private_room_teachers`
--
ALTER TABLE `private_room_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `private_room_teachers_teacher_id_foreign` (`teacher_id`),
  ADD KEY `private_room_teachers_room_id_foreign` (`room_id`),
  ADD KEY `private_room_teachers_user_id_foreign` (`user_id`);

--
-- Indexes for table `public_room_teachers`
--
ALTER TABLE `public_room_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `public_room_teachers_teacher_id_foreign` (`teacher_id`),
  ADD KEY `public_room_teachers_room_id_foreign` (`room_id`),
  ADD KEY `public_room_teachers_user_id_foreign` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_teacher_id_foreign` (`teacher_id`),
  ADD KEY `rooms_user_id_foreign` (`user_id`);

--
-- Indexes for table `room_lives`
--
ALTER TABLE `room_lives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_lives_room_id_foreign` (`room_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `student_private_rooms`
--
ALTER TABLE `student_private_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_private_rooms_student_id_foreign` (`student_id`),
  ADD KEY `student_private_rooms_room_id_foreign` (`room_id`),
  ADD KEY `student_private_rooms_user_id_foreign` (`user_id`);

--
-- Indexes for table `student_rooms`
--
ALTER TABLE `student_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_rooms_student_id_foreign` (`student_id`),
  ADD KEY `student_rooms_room_id_foreign` (`room_id`),
  ADD KEY `student_rooms_user_id_foreign` (`user_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_private_rooms`
--
ALTER TABLE `file_private_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `file_rooms`
--
ALTER TABLE `file_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `live_comments`
--
ALTER TABLE `live_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `live_connects`
--
ALTER TABLE `live_connects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `private_rooms`
--
ALTER TABLE `private_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `private_room_lives`
--
ALTER TABLE `private_room_lives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `private_room_teachers`
--
ALTER TABLE `private_room_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public_room_teachers`
--
ALTER TABLE `public_room_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `room_lives`
--
ALTER TABLE `room_lives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `student_private_rooms`
--
ALTER TABLE `student_private_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student_rooms`
--
ALTER TABLE `student_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
