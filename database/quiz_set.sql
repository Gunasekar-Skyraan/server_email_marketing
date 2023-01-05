-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 07:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_set`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_list` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountAccessModule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountAccessPrivilege` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_type` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `role`, `access_list`, `accountAccessModule`, `accountAccessPrivilege`, `image_type`, `remember_token`, `deleted_at`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '~~MGR~~', 'admin@skyraan.com', 'storage/users/1670221836755_1HrBct08wtN8MFZCbnuGmve2qVzkTQiN5yPWGRYe6izIpWOpNljVW7JxILtkA5.jpg', NULL, '$2y$10$QegapYzoefZtoL8bG0t2zuGfr5LkEhf4.AaRq27VCJnF37oSkr6Y.', 'SuperAdmin', 'system', 'system', 'system', 1, 'au1LPgPoao6MCA7jHY1fgDZL519vXQe5bOnVliyUzeFwgFfewT8NLlwPvGgW', 0, 0, '2022-10-18 05:28:43', '2022-12-05 01:00:36'),
(2, 'Sub Admin 1', 'subadmin@skyraan.com', 'storage/users/1670217412944_2TN5RQkR23eK5OrCoEQA8Qsail8OydwTt2VhmJ2hnYtwxILRrCyRukldOAr8iu.jpg', NULL, '$2y$10$KppIdquR/yxIxLC0qTP8FeO5iRjFs9/YRlWNlJKFSFh5wyTZxmnFq', 'SubAdmin', 'events', 'app|category|sub_category', 'view|edit|add', 1, 'nYzf9OtXOFR5XbeXrgqTeQZjOi39gWJ1nBDUPiiiMRO1vOA7Eufr0GpMkbxR', 0, 0, '2022-10-19 04:38:57', '2022-12-04 23:46:52'),
(4, 'Sub Admin 3', 'test@gmail.com', 'storage/users/1670219050486_uxDe20WuuVTd79izvgEcNMo3X0lQr35g6dFWxQkfeYzfUpbsPjvU7aqsE6xnoX.jpg', NULL, '$2y$10$epYsnA1QEzcYwJSG7N2Xsu2HlpE6AzsD37wGwW0wvDlkDExfdmdDq', 'SubAdmin', 'prayer', 'app|category|sub_category', 'view|edit|add', 1, 'kn9tiEhDxXS75xru7EagUysJWZaelfCfNJ44pUMZcewHY6Clq5YbPvMebsm9', 0, 0, '2022-10-20 07:00:09', '2022-12-05 00:14:10'),
(5, 'GUNASEKAR M', 'Administrator@gmail.com', 'storage/users/1670217633797_9ZEbqKtELc1PjPXsHXkcRKeSxBr9vG50GSWgtFvgMXc5MuF1zoRl7bq3tle1Ej.jpg', NULL, '$2y$10$sIFZvof7sVPZTPHkbsH8G.t4nJ6ZF2OImdK2kP6Gt6cT/k4iyaXo.', 'Administrator', 'events|prayer|image|video|calendar|quotes', 'app|category|sub_category|admin|Activity', 'view|edit|delete|add', 1, 'JnPpf3unCQXFh6Rmeies4yayKngohBGhajIxKDRu7EYe8pfkMo30zqJOWZ5o', 0, 0, '2022-10-26 04:17:58', '2022-12-04 23:50:33'),
(7, 'skyraan test', 'skyraantest@gmail.com', 'storage/users/1670217794846_HISBZAfjgVrhwB1wAJDjCU52e12muINlIj3MkXlg6qHYOXcTKQtnsLZJlfFExh.jpg', NULL, '$2y$10$GYNDxTcl/r0BQnxiIHeco.O5huKy2T6td8dsT70ESncy4nTpYm3SC', 'SubAdmin', 'image|video', 'app|category|sub_category', 'view|edit|add', 1, NULL, 0, 0, '2022-10-28 01:05:45', '2022-12-04 23:53:14'),
(8, 'Gunasekar M', 'rajan@gmail.com', 'storage/users/1670218767727_Y1b2oh1tNxhBHnqT1CmgCetnJOMB9aLdodWNeV2paP2SsdDpakzmdaMOpBf9Gj.jpg', NULL, '$2y$10$0pn1TNDkyHixs64n7.FOZOHhl6o3UASatod14oTAIPMuIE4LgSWe.', 'SubAdmin', 'calendar|quotes', 'app|category|sub_category', 'view|edit|delete|add', 1, NULL, 0, 1, '2022-12-03 07:03:59', '2022-12-05 00:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

CREATE TABLE `log_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_activities`
--

INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `email`, `role`, `time`, `created_at`, `updated_at`) VALUES
(511, 'Activity Log', 'http://127.0.0.1:8000/admin/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 05:31:41', '2022-12-08 00:01:41', '2022-12-08 00:01:41'),
(512, 'Activity Log', 'http://127.0.0.1:8000/Image/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 05:34:21', '2022-12-08 00:04:21', '2022-12-08 00:04:21'),
(513, 'Activity Log', 'http://127.0.0.1:8000/Video/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 05:34:32', '2022-12-08 00:04:32', '2022-12-08 00:04:32'),
(514, 'Activity Log', 'http://127.0.0.1:8000/Video/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 05:34:34', '2022-12-08 00:04:34', '2022-12-08 00:04:34'),
(515, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 05:39:14', '2022-12-08 00:09:14', '2022-12-08 00:09:14'),
(516, 'Activity Log', 'http://127.0.0.1:8000/admin/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 05:39:15', '2022-12-08 00:09:15', '2022-12-08 00:09:15'),
(517, 'Activity Log', 'http://127.0.0.1:8000/admin/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 05:39:25', '2022-12-08 00:09:25', '2022-12-08 00:09:25'),
(518, 'Activity Log', 'http://127.0.0.1:8000/admin/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 05:41:21', '2022-12-08 00:11:21', '2022-12-08 00:11:21'),
(519, 'Activity Log', 'http://127.0.0.1:8000/admin/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 05:41:26', '2022-12-08 00:11:26', '2022-12-08 00:11:26'),
(520, 'Activity Log', 'http://127.0.0.1:8000/admin/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 05:41:44', '2022-12-08 00:11:44', '2022-12-08 00:11:44'),
(521, 'Activity Log', 'http://127.0.0.1:8000/Quiz/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 05:41:49', '2022-12-08 00:11:49', '2022-12-08 00:11:49'),
(522, 'Activity Log', 'http://127.0.0.1:8000/Quiz/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 05:41:51', '2022-12-08 00:11:51', '2022-12-08 00:11:51'),
(523, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 05:41:59', '2022-12-08 00:11:59', '2022-12-08 00:11:59'),
(524, 'Activity Log', 'http://127.0.0.1:8000/admin/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 05:42:00', '2022-12-08 00:12:00', '2022-12-08 00:12:00'),
(525, 'Activity Log', 'http://127.0.0.1:8000/Quiz/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 05:42:03', '2022-12-08 00:12:03', '2022-12-08 00:12:03'),
(526, 'Activity Log', 'http://127.0.0.1:8000/admin/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:00:56', '2022-12-08 00:30:56', '2022-12-08 00:30:56'),
(527, 'Activity Log', 'http://127.0.0.1:8000/Quiz/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:03:39', '2022-12-08 00:33:39', '2022-12-08 00:33:39'),
(528, 'Activity Log', 'http://127.0.0.1:8000/Quiz/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:03:51', '2022-12-08 00:33:51', '2022-12-08 00:33:51'),
(529, 'Activity Log', 'http://127.0.0.1:8000/Quiz/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:10:15', '2022-12-08 00:40:15', '2022-12-08 00:40:15'),
(530, 'Activity Log', 'http://127.0.0.1:8000/Quiz/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:10:35', '2022-12-08 00:40:35', '2022-12-08 00:40:35'),
(531, 'Activity Log', 'http://127.0.0.1:8000/Quiz/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:10:48', '2022-12-08 00:40:48', '2022-12-08 00:40:48'),
(532, 'Activity Log', 'http://127.0.0.1:8000/Quiz/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:16:17', '2022-12-08 00:46:17', '2022-12-08 00:46:17'),
(533, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:20:38', '2022-12-08 00:50:38', '2022-12-08 00:50:38'),
(534, 'Activity Log', 'http://127.0.0.1:8000/QuizSet4/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:23:08', '2022-12-08 00:53:08', '2022-12-08 00:53:08'),
(535, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:23:55', '2022-12-08 00:53:55', '2022-12-08 00:53:55'),
(536, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:24:13', '2022-12-08 00:54:13', '2022-12-08 00:54:13'),
(537, 'Activity Log', 'http://127.0.0.1:8000/admin/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:24:16', '2022-12-08 00:54:16', '2022-12-08 00:54:16'),
(538, 'Activity Log', 'http://127.0.0.1:8000/admin/category.insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:25:46', '2022-12-08 00:55:46', '2022-12-08 00:55:46'),
(539, 'Activity Log', 'http://127.0.0.1:8000/admin/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:25:46', '2022-12-08 00:55:46', '2022-12-08 00:55:46'),
(540, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:25:50', '2022-12-08 00:55:50', '2022-12-08 00:55:50'),
(541, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:25:51', '2022-12-08 00:55:51', '2022-12-08 00:55:51'),
(542, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:25:53', '2022-12-08 00:55:53', '2022-12-08 00:55:53'),
(543, 'Activity Log', 'http://127.0.0.1:8000/Quiz/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:26:40', '2022-12-08 00:56:40', '2022-12-08 00:56:40'),
(544, 'Activity Log', 'http://127.0.0.1:8000/Quiz/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:26:41', '2022-12-08 00:56:41', '2022-12-08 00:56:41'),
(545, 'Activity Log', 'http://127.0.0.1:8000/Quiz/category.insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:26:54', '2022-12-08 00:56:54', '2022-12-08 00:56:54'),
(546, 'Activity Log', 'http://127.0.0.1:8000/Quiz/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:26:55', '2022-12-08 00:56:55', '2022-12-08 00:56:55'),
(547, 'Activity Log', 'http://127.0.0.1:8000/Quiz/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:26:56', '2022-12-08 00:56:56', '2022-12-08 00:56:56'),
(548, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:27:01', '2022-12-08 00:57:01', '2022-12-08 00:57:01'),
(549, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:27:02', '2022-12-08 00:57:02', '2022-12-08 00:57:02'),
(550, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category.insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:27:13', '2022-12-08 00:57:13', '2022-12-08 00:57:13'),
(551, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:27:14', '2022-12-08 00:57:14', '2022-12-08 00:57:14'),
(552, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:27:15', '2022-12-08 00:57:15', '2022-12-08 00:57:15'),
(553, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:27:32', '2022-12-08 00:57:32', '2022-12-08 00:57:32'),
(554, 'Activity Log', 'http://127.0.0.1:8000/Quiz/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:27:52', '2022-12-08 00:57:52', '2022-12-08 00:57:52'),
(555, 'Activity Log', 'http://127.0.0.1:8000/Quiz/insert_sub_category', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:28:21', '2022-12-08 00:58:21', '2022-12-08 00:58:21'),
(556, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/insert_sub_category', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:31:41', '2022-12-08 01:01:41', '2022-12-08 01:01:41'),
(557, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:31:47', '2022-12-08 01:01:47', '2022-12-08 01:01:47'),
(558, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:35:03', '2022-12-08 01:05:03', '2022-12-08 01:05:03'),
(559, 'Activity Log', 'http://127.0.0.1:8000/admin/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:35:04', '2022-12-08 01:05:04', '2022-12-08 01:05:04'),
(560, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:35:06', '2022-12-08 01:05:06', '2022-12-08 01:05:06'),
(561, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:35:14', '2022-12-08 01:05:14', '2022-12-08 01:05:14'),
(562, 'Activity Log', 'http://127.0.0.1:8000/admin/category_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:35:59', '2022-12-08 01:05:59', '2022-12-08 01:05:59'),
(563, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:35:59', '2022-12-08 01:05:59', '2022-12-08 01:05:59'),
(564, 'Activity Log', 'http://127.0.0.1:8000/admin/category_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:36:01', '2022-12-08 01:06:01', '2022-12-08 01:06:01'),
(565, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:36:01', '2022-12-08 01:06:01', '2022-12-08 01:06:01'),
(566, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 06:36:03', '2022-12-08 01:06:03', '2022-12-08 01:06:03'),
(567, 'Activity Log', 'http://127.0.0.1:8000/admin/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 07:00:18', '2022-12-08 01:30:18', '2022-12-08 01:30:18'),
(568, 'Activity Log', 'http://127.0.0.1:8000/admin/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 07:10:53', '2022-12-08 01:40:53', '2022-12-08 01:40:53'),
(569, 'Activity Log', 'http://127.0.0.1:8000/admin/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 13:14:40', '2022-12-08 07:44:40', '2022-12-08 07:44:40'),
(570, 'Activity Log', 'http://127.0.0.1:8000/admin/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-08 13:43:39', '2022-12-08 08:13:39', '2022-12-08 08:13:39'),
(571, 'Activity Log', 'http://127.0.0.1:8000/admin/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-09 07:02:26', '2022-12-09 01:32:26', '2022-12-09 01:32:26'),
(572, 'Activity Log', 'http://127.0.0.1:8000/admin/update_map_cat/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-09 07:35:48', '2022-12-09 02:05:48', '2022-12-09 02:05:48'),
(573, 'Activity Log', 'http://127.0.0.1:8000/admin/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-09 07:47:49', '2022-12-09 02:17:49', '2022-12-09 02:17:49'),
(574, 'Activity Log', 'http://127.0.0.1:8000/admin/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-09 07:58:16', '2022-12-09 02:28:16', '2022-12-09 02:28:16'),
(575, 'Activity Log', 'http://127.0.0.1:8000/admin/update_map_cat/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-09 08:02:56', '2022-12-09 02:32:56', '2022-12-09 02:32:56'),
(576, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-09 08:02:59', '2022-12-09 02:32:59', '2022-12-09 02:32:59'),
(577, 'Activity Log', 'http://127.0.0.1:8000/admin/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-09 08:03:01', '2022-12-09 02:33:01', '2022-12-09 02:33:01'),
(578, 'Activity Log', 'http://127.0.0.1:8000/Quiz/update_map_cat/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-09 08:06:18', '2022-12-09 02:36:18', '2022-12-09 02:36:18'),
(579, 'Activity Log', 'http://127.0.0.1:8000/Quiz/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-09 08:06:28', '2022-12-09 02:36:28', '2022-12-09 02:36:28'),
(580, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/update_map_cat/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-09 08:07:13', '2022-12-09 02:37:13', '2022-12-09 02:37:13'),
(581, 'Activity Log', 'http://127.0.0.1:8000/admin/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-09 09:07:10', '2022-12-09 03:37:10', '2022-12-09 03:37:10'),
(582, 'Activity Log', 'http://127.0.0.1:8000/admin/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-09 09:13:41', '2022-12-09 03:43:41', '2022-12-09 03:43:41'),
(583, 'Activity Log', 'http://127.0.0.1:8000/admin/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-09 11:12:44', '2022-12-09 05:42:44', '2022-12-09 05:42:44'),
(584, 'Activity Log', 'http://127.0.0.1:8000/admin/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-09 11:25:36', '2022-12-09 05:55:36', '2022-12-09 05:55:36'),
(585, 'Activity Log', 'http://127.0.0.1:8000/admin/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-09 14:32:44', '2022-12-09 09:02:44', '2022-12-09 09:02:44'),
(586, 'Activity Log', 'http://127.0.0.1:8000/admin/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 03:15:46', '2022-12-11 21:45:46', '2022-12-11 21:45:46'),
(587, 'Activity Log', 'http://127.0.0.1:8000/admin/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 03:19:23', '2022-12-11 21:49:23', '2022-12-11 21:49:23'),
(588, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 03:19:25', '2022-12-11 21:49:25', '2022-12-11 21:49:25'),
(589, 'Activity Log', 'http://127.0.0.1:8000/admin/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 05:02:40', '2022-12-11 23:32:40', '2022-12-11 23:32:40'),
(590, 'Activity Log', 'http://127.0.0.1:8000/admin/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 06:01:26', '2022-12-12 00:31:26', '2022-12-12 00:31:26'),
(591, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 06:02:13', '2022-12-12 00:32:13', '2022-12-12 00:32:13'),
(592, 'Activity Log', 'http://127.0.0.1:8000/admin/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 06:02:15', '2022-12-12 00:32:15', '2022-12-12 00:32:15'),
(593, 'Activity Log', 'http://127.0.0.1:8000/admin/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 10:47:08', '2022-12-12 05:17:08', '2022-12-12 05:17:08'),
(594, 'Activity Log', 'http://127.0.0.1:8000/admin/delete_Quiz/24', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 11:16:53', '2022-12-12 05:46:53', '2022-12-12 05:46:53'),
(595, 'Activity Log', 'http://127.0.0.1:8000/Quiz/Quiz_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 11:28:03', '2022-12-12 05:58:03', '2022-12-12 05:58:03'),
(596, 'Activity Log', 'http://127.0.0.1:8000/Quiz/Quiz_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 11:28:38', '2022-12-12 05:58:38', '2022-12-12 05:58:38'),
(597, 'Activity Log', 'http://127.0.0.1:8000/Quiz/Quiz_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 11:28:38', '2022-12-12 05:58:38', '2022-12-12 05:58:38'),
(598, 'Activity Log', 'http://127.0.0.1:8000/Quiz/Quiz_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 11:28:39', '2022-12-12 05:58:39', '2022-12-12 05:58:39'),
(599, 'Activity Log', 'http://127.0.0.1:8000/Quiz/Quiz_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 11:28:39', '2022-12-12 05:58:39', '2022-12-12 05:58:39'),
(600, 'Activity Log', 'http://127.0.0.1:8000/Quiz/Quiz_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 11:28:40', '2022-12-12 05:58:40', '2022-12-12 05:58:40'),
(601, 'Activity Log', 'http://127.0.0.1:8000/Quiz/Quiz_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 11:29:20', '2022-12-12 05:59:20', '2022-12-12 05:59:20'),
(602, 'Activity Log', 'http://127.0.0.1:8000/Quiz/Quiz_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 11:29:28', '2022-12-12 05:59:28', '2022-12-12 05:59:28'),
(603, 'Activity Log', 'http://127.0.0.1:8000/Quiz/Quiz_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 11:29:31', '2022-12-12 05:59:31', '2022-12-12 05:59:31'),
(604, 'Activity Log', 'http://127.0.0.1:8000/Quiz/Quiz_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 11:29:38', '2022-12-12 05:59:38', '2022-12-12 05:59:38'),
(605, 'Activity Log', 'http://127.0.0.1:8000/Quiz/delete_Quiz/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 11:29:43', '2022-12-12 05:59:43', '2022-12-12 05:59:43'),
(606, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:18:52', '2022-12-12 06:48:52', '2022-12-12 06:48:52'),
(607, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:18:53', '2022-12-12 06:48:53', '2022-12-12 06:48:53'),
(608, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:18:55', '2022-12-12 06:48:55', '2022-12-12 06:48:55'),
(609, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:18:57', '2022-12-12 06:48:57', '2022-12-12 06:48:57'),
(610, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:18:59', '2022-12-12 06:48:59', '2022-12-12 06:48:59'),
(611, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:19:05', '2022-12-12 06:49:05', '2022-12-12 06:49:05'),
(612, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:19:08', '2022-12-12 06:49:08', '2022-12-12 06:49:08'),
(613, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:19:10', '2022-12-12 06:49:10', '2022-12-12 06:49:10'),
(614, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/update_map_cat/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:19:22', '2022-12-12 06:49:22', '2022-12-12 06:49:22'),
(615, 'Activity Log', 'http://127.0.0.1:8000/QuizSet4/QuizSet4s_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:25:22', '2022-12-12 06:55:22', '2022-12-12 06:55:22'),
(616, 'Activity Log', 'http://127.0.0.1:8000/QuizSet4/QuizSet4s_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:25:23', '2022-12-12 06:55:23', '2022-12-12 06:55:23'),
(617, 'Activity Log', 'http://127.0.0.1:8000/QuizSet4/delete_QuizSet4s/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:25:27', '2022-12-12 06:55:27', '2022-12-12 06:55:27'),
(618, 'Activity Log', 'http://127.0.0.1:8000/QuizSet4/QuizSet4s_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:25:44', '2022-12-12 06:55:44', '2022-12-12 06:55:44'),
(619, 'Activity Log', 'http://127.0.0.1:8000/QuizSet4/QuizSet4s_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:25:47', '2022-12-12 06:55:47', '2022-12-12 06:55:47'),
(620, 'Activity Log', 'http://127.0.0.1:8000/Quiz/Quiz_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:25:53', '2022-12-12 06:55:53', '2022-12-12 06:55:53'),
(621, 'Activity Log', 'http://127.0.0.1:8000/Quiz/Quiz_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:25:55', '2022-12-12 06:55:55', '2022-12-12 06:55:55'),
(622, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:49:24', '2022-12-12 07:19:24', '2022-12-12 07:19:24'),
(623, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:49:37', '2022-12-12 07:19:37', '2022-12-12 07:19:37'),
(624, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/add_category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:50:39', '2022-12-12 07:20:39', '2022-12-12 07:20:39'),
(625, 'Activity Log', 'http://127.0.0.1:8000/Quiz/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:52:41', '2022-12-12 07:22:41', '2022-12-12 07:22:41'),
(626, 'Activity Log', 'http://127.0.0.1:8000/Quiz/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:53:30', '2022-12-12 07:23:30', '2022-12-12 07:23:30'),
(627, 'Activity Log', 'http://127.0.0.1:8000/Quiz/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 12:53:33', '2022-12-12 07:23:33', '2022-12-12 07:23:33'),
(628, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:01:37', '2022-12-12 07:31:37', '2022-12-12 07:31:37'),
(629, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:01:39', '2022-12-12 07:31:39', '2022-12-12 07:31:39'),
(630, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/insert_sub_category', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:05:18', '2022-12-12 07:35:18', '2022-12-12 07:35:18'),
(631, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:11:24', '2022-12-12 07:41:24', '2022-12-12 07:41:24'),
(632, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:11:36', '2022-12-12 07:41:36', '2022-12-12 07:41:36'),
(633, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:12:15', '2022-12-12 07:42:15', '2022-12-12 07:42:15'),
(634, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:15:42', '2022-12-12 07:45:42', '2022-12-12 07:45:42'),
(635, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:20:15', '2022-12-12 07:50:15', '2022-12-12 07:50:15'),
(636, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:20:26', '2022-12-12 07:50:26', '2022-12-12 07:50:26'),
(637, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:21:33', '2022-12-12 07:51:33', '2022-12-12 07:51:33'),
(638, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:23:37', '2022-12-12 07:53:37', '2022-12-12 07:53:37'),
(639, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:23:41', '2022-12-12 07:53:41', '2022-12-12 07:53:41'),
(640, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:24:19', '2022-12-12 07:54:19', '2022-12-12 07:54:19'),
(641, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:24:38', '2022-12-12 07:54:38', '2022-12-12 07:54:38'),
(642, 'Activity Log', 'http://127.0.0.1:8000/Quiz/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:36:27', '2022-12-12 08:06:27', '2022-12-12 08:06:27'),
(643, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:36:35', '2022-12-12 08:06:35', '2022-12-12 08:06:35'),
(644, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/update_map_sub_cat/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:39:57', '2022-12-12 08:09:57', '2022-12-12 08:09:57'),
(645, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/update_map_sub_cat/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:40:30', '2022-12-12 08:10:30', '2022-12-12 08:10:30'),
(646, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/update_map_sub_cat/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:40:43', '2022-12-12 08:10:43', '2022-12-12 08:10:43'),
(647, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/update_map_sub_cat/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:40:43', '2022-12-12 08:10:43', '2022-12-12 08:10:43'),
(648, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/update_map_sub_cat/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:41:12', '2022-12-12 08:11:12', '2022-12-12 08:11:12'),
(649, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/update_map_sub_cat/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 13:41:12', '2022-12-12 08:11:12', '2022-12-12 08:11:12'),
(650, 'Activity Log', 'http://127.0.0.1:8000/admin/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-12 14:18:57', '2022-12-12 08:48:57', '2022-12-12 08:48:57'),
(651, 'Activity Log', 'http://127.0.0.1:8000/admin/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 03:16:38', '2022-12-12 21:46:38', '2022-12-12 21:46:38'),
(652, 'Activity Log', 'http://127.0.0.1:8000/QuizSet4/QuizSet4s_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 03:20:14', '2022-12-12 21:50:14', '2022-12-12 21:50:14'),
(653, 'Activity Log', 'http://127.0.0.1:8000/QuizSet4/QuizSet4s_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 03:20:16', '2022-12-12 21:50:16', '2022-12-12 21:50:16'),
(654, 'Activity Log', 'http://127.0.0.1:8000/QuizSet4/QuizSet4s_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 03:20:22', '2022-12-12 21:50:22', '2022-12-12 21:50:22'),
(655, 'Activity Log', 'http://127.0.0.1:8000/QuizSet4/QuizSet4s_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 03:20:27', '2022-12-12 21:50:27', '2022-12-12 21:50:27'),
(656, 'Activity Log', 'http://127.0.0.1:8000/admin/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 03:24:15', '2022-12-12 21:54:15', '2022-12-12 21:54:15'),
(657, 'Activity Log', 'http://127.0.0.1:8000/admin/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 7, 'skyraantest@gmail.com', 'SubAdmin', '2022-12-13 03:24:19', '2022-12-12 21:54:19', '2022-12-12 21:54:19'),
(658, 'Activity Log', 'http://127.0.0.1:8000/admin/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 7, 'skyraantest@gmail.com', 'SubAdmin', '2022-12-13 03:24:23', '2022-12-12 21:54:23', '2022-12-12 21:54:23'),
(659, 'Activity Log', 'http://127.0.0.1:8000/admin/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 2, 'subadmin@skyraan.com', 'SubAdmin', '2022-12-13 03:24:33', '2022-12-12 21:54:33', '2022-12-12 21:54:33'),
(660, 'Activity Log', 'http://127.0.0.1:8000/admin/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 2, 'subadmin@skyraan.com', 'SubAdmin', '2022-12-13 03:24:41', '2022-12-12 21:54:41', '2022-12-12 21:54:41'),
(661, 'Activity Log', 'http://127.0.0.1:8000/admin/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 03:24:46', '2022-12-12 21:54:46', '2022-12-12 21:54:46'),
(662, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 03:24:59', '2022-12-12 21:54:59', '2022-12-12 21:54:59'),
(663, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 03:25:04', '2022-12-12 21:55:04', '2022-12-12 21:55:04'),
(664, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 03:29:31', '2022-12-12 21:59:31', '2022-12-12 21:59:31'),
(665, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 03:29:33', '2022-12-12 21:59:33', '2022-12-12 21:59:33'),
(666, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 03:30:10', '2022-12-12 22:00:10', '2022-12-12 22:00:10'),
(667, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 03:43:51', '2022-12-12 22:13:51', '2022-12-12 22:13:51'),
(668, 'Activity Log', 'http://127.0.0.1:8000/Quiz/Quiz_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:08:13', '2022-12-12 22:38:13', '2022-12-12 22:38:13'),
(669, 'Activity Log', 'http://127.0.0.1:8000/Quiz/Quiz_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:08:22', '2022-12-12 22:38:22', '2022-12-12 22:38:22'),
(670, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/QuizSet3s_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:10:01', '2022-12-12 22:40:01', '2022-12-12 22:40:01'),
(671, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/QuizSet3s_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:10:06', '2022-12-12 22:40:06', '2022-12-12 22:40:06');
INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `email`, `role`, `time`, `created_at`, `updated_at`) VALUES
(672, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/QuizSet3s_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:10:13', '2022-12-12 22:40:13', '2022-12-12 22:40:13'),
(673, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/QuizSet3s_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:10:17', '2022-12-12 22:40:17', '2022-12-12 22:40:17'),
(674, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/delete_QuizSet3s/2', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:12:56', '2022-12-12 22:42:56', '2022-12-12 22:42:56'),
(675, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/edit_sub_category/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:32:25', '2022-12-12 23:02:25', '2022-12-12 23:02:25'),
(676, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:32:35', '2022-12-12 23:02:35', '2022-12-12 23:02:35'),
(677, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:32:43', '2022-12-12 23:02:43', '2022-12-12 23:02:43'),
(678, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:32:45', '2022-12-12 23:02:45', '2022-12-12 23:02:45'),
(679, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:32:46', '2022-12-12 23:02:46', '2022-12-12 23:02:46'),
(680, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:32:54', '2022-12-12 23:02:54', '2022-12-12 23:02:54'),
(681, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:32:56', '2022-12-12 23:02:56', '2022-12-12 23:02:56'),
(682, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:32:58', '2022-12-12 23:02:58', '2022-12-12 23:02:58'),
(683, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:33:00', '2022-12-12 23:03:00', '2022-12-12 23:03:00'),
(684, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:33:01', '2022-12-12 23:03:01', '2022-12-12 23:03:01'),
(685, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:33:01', '2022-12-12 23:03:01', '2022-12-12 23:03:01'),
(686, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:33:01', '2022-12-12 23:03:01', '2022-12-12 23:03:01'),
(687, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:33:02', '2022-12-12 23:03:02', '2022-12-12 23:03:02'),
(688, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:33:04', '2022-12-12 23:03:04', '2022-12-12 23:03:04'),
(689, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:33:04', '2022-12-12 23:03:04', '2022-12-12 23:03:04'),
(690, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_status_update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:33:08', '2022-12-12 23:03:08', '2022-12-12 23:03:08'),
(691, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:33:08', '2022-12-12 23:03:08', '2022-12-12 23:03:08'),
(692, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:33:12', '2022-12-12 23:03:12', '2022-12-12 23:03:12'),
(693, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:33:15', '2022-12-12 23:03:15', '2022-12-12 23:03:15'),
(694, 'Activity Log', 'http://127.0.0.1:8000/QuizSet3/category_list', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:33:21', '2022-12-12 23:03:21', '2022-12-12 23:03:21'),
(695, 'Activity Log', 'http://127.0.0.1:8000/admin/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:33:31', '2022-12-12 23:03:31', '2022-12-12 23:03:31'),
(696, 'Activity Log', 'http://127.0.0.1:8000/admin/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 'admin@skyraan.com', 'SuperAdmin', '2022-12-13 04:33:34', '2022-12-12 23:03:34', '2022-12-12 23:03:34');

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
(5, '2022_09_26_102647_create_app_lists_table', 1),
(6, '2022_09_26_103329_create_categories_table', 1),
(7, '2022_09_26_103403_create_sub_categories_table', 1),
(8, '2022_09_26_103514_create_questions_table', 1),
(9, '2022_09_27_053025_create_mapped_app_categories_table', 1),
(10, '2022_10_18_100006_create_admins_table', 1),
(11, '2022_10_20_110919_create_modules_table', 1),
(12, '2022_10_26_130811_create_log_activity_table', 1),
(13, '2022_11_04_124858_create_images_table', 1),
(14, '2022_11_05_110557_create_videos_table', 1),
(15, '2022_11_05_110618_create_image_uploads_table', 1),
(16, '2022_11_13_072051_create_events_table', 1),
(17, '2022_11_29_063332_create_event_app_lists_table', 2),
(18, '2022_11_29_063506_create_event_category_lists_table', 3),
(19, '2022_11_30_043926_create_prayer_app_lists_table', 4),
(20, '2022_11_30_044008_create_prayer_category_lists_table', 4),
(21, '2022_11_30_044120_create_prayer_mapped_app_categories_table', 4),
(22, '2022_11_18_094907_create_calendars_table', 5),
(23, '2022_11_19_034932_create_form_multiple_upload_table', 5),
(24, '2022_11_21_042601_create_bulk_video_uploads_table', 5),
(25, '2022_11_30_051303_create_calendar_app_lists_table', 5),
(27, '2022_11_30_051611_create_calendar_mapped_app_categories_table', 5),
(28, '2022_11_30_051355_create_calendar_category_lists_table', 6),
(29, '2022_11_30_111908_create_image_app_lists_table', 7),
(30, '2022_11_30_111928_create_image_category_lists_table', 7),
(31, '2022_11_30_112001_create_image_mapped_app_categories_table', 7),
(32, '2022_11_30_112022_create_video_app_lists_table', 7),
(33, '2022_11_30_112035_create_video_category_lists_table', 7),
(34, '2022_11_30_112049_create_video_mapped_app_categories_table', 7),
(35, '2022_11_30_112144_create_quotes_app_lists_table', 7),
(36, '2022_11_30_112157_create_quotes_category_lists_table', 7),
(37, '2022_11_30_112211_create_quotes_mapped_app_categories_table', 7),
(38, '2022_12_02_071521_create_quotes_sub_category_lists_table', 8),
(39, '2022_11_29_103811_create_report_videos_table', 9),
(40, '2022_12_02_111015_create_video_sub_category_lists_table', 9),
(41, '2022_12_02_111225_create_image_sub_category_lists_table', 10),
(42, '2022_12_06_054735_create_report_images_table', 11),
(43, '2022_12_07_080402_create_quiz_app_set1s_table', 12),
(44, '2022_12_07_080417_create_quiz_app_set2s_table', 12),
(45, '2022_12_07_080430_create_quiz_app_set3s_table', 12),
(46, '2022_12_07_080443_create_quiz_app_set4s_table', 12),
(47, '2022_12_07_080508_create_quiz_category_set1s_table', 12),
(48, '2022_12_07_080520_create_quiz_category_set2s_table', 12),
(49, '2022_12_07_080537_create_quiz_category_set3s_table', 12),
(50, '2022_12_07_080551_create_quiz_category_set4s_table', 12),
(51, '2022_12_07_080640_create_quiz_sub_category_set2s_table', 12),
(52, '2022_12_07_080953_create_quiz_sub_category_set3s_table', 12),
(53, '2022_12_07_081132_create_quiz_set1s_table', 12),
(54, '2022_12_07_081143_create_quiz_set2s_table', 12),
(55, '2022_12_07_081201_create_quiz_set3s_table', 12),
(56, '2022_12_07_081218_create_quiz_set4s_table', 12),
(57, '2022_12_08_035015_create_quiz_set1_mapped_app_categories_table', 12),
(58, '2022_12_08_035100_create_quiz_set2_mapped_app_categories_table', 12),
(59, '2022_12_08_035250_create_quiz_set3_mapped_app_categories_table', 12),
(60, '2022_12_12_130055_create_quiz_set3_category_mapped_apps_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `created_at`, `updated_at`) VALUES
(1, 'app', NULL, NULL),
(2, 'category', NULL, NULL),
(3, 'sub_category', NULL, NULL),
(7, 'admin', NULL, NULL),
(10, 'Activity', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_app_set1s`
--

CREATE TABLE `quiz_app_set1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_app_set1s`
--

INSERT INTO `quiz_app_set1s` (`id`, `app_name`, `app_description`, `app_image`, `image_type`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Quiz Set 1', 'Quiz Set 1', 'storage/prayers/app/1670479256826_W3bSTHdti1TEXi2GpsxxgbZrHUi7zBdXVhkGnFvLMF0zS0777L0AM0oMMx253Z.png', '1', 0, '0', '2022-12-08 00:30:56', '2022-12-08 00:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_app_set2s`
--

CREATE TABLE `quiz_app_set2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_app_set2s`
--

INSERT INTO `quiz_app_set2s` (`id`, `app_name`, `app_description`, `app_image`, `image_type`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Quiz Set 2', 'Quiz Set 2', 'storage/prayers/app/1670479848932_5xqmkVpgVvfxP2Qrt1aYOJcjXc0eTJDhu3KimqThV5NXHPYDq76yj1fa2CWeJK.png', '1', 0, '0', '2022-12-08 00:40:48', '2022-12-08 00:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_app_set3s`
--

CREATE TABLE `quiz_app_set3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_app_set3s`
--

INSERT INTO `quiz_app_set3s` (`id`, `app_name`, `app_description`, `app_image`, `image_type`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Quiz Set 3', 'Quiz Set 3', 'storage/prayers/app/1670480438845_FKpbhP8tcpdaZj4oqnkVud708ysuRlZNZWJ4yowjvlSim8wydE2X5L6NIV4pX7.png', '1', 0, '0', '2022-12-08 00:50:38', '2022-12-08 00:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_app_set4s`
--

CREATE TABLE `quiz_app_set4s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_app_set4s`
--

INSERT INTO `quiz_app_set4s` (`id`, `app_name`, `app_description`, `app_image`, `image_type`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Quiz Set 4', 'Quiz Set 4', 'storage/prayers/app/1670480588725_k7oWliEkS6Zgg7c75moD7GJXevrPtt7qSjSmqUecrkpJc8Gx1eLoVHs9F5sbDY.png', '1', 0, '0', '2022-12-08 00:53:08', '2022-12-12 06:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_category_set1s`
--

CREATE TABLE `quiz_category_set1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(11) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_category_set1s`
--

INSERT INTO `quiz_category_set1s` (`id`, `category_name`, `category_description`, `category_image`, `image_type`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Quiz Set 1 Category', 'Quiz Set 1 Category', 'storage/prayers/category/1670480746738_aNusEZJNfduOi9YNzLX6e7m0JMb91W4FCBlqI6S02JwzdFMmeVXdosf7ArvTae.png', '1', 0, '0', '2022-12-08 00:55:46', '2022-12-08 01:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_category_set2s`
--

CREATE TABLE `quiz_category_set2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_category_set2s`
--

INSERT INTO `quiz_category_set2s` (`id`, `category_name`, `category_description`, `category_image`, `image_type`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Quiz Set 2 Category', 'Quiz Set 2 Category', 'storage/prayers/category/1670480814961_OAviDunryDfG44ptsCCqdphPrHdqpFajYTQTLcB2XS76Md9sZB4JNQ8TajTUqq.png', '1', 0, '0', '2022-12-08 00:56:54', '2022-12-08 00:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_category_set3s`
--

CREATE TABLE `quiz_category_set3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(11) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_category_set3s`
--

INSERT INTO `quiz_category_set3s` (`id`, `category_name`, `category_description`, `category_image`, `image_type`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Quiz Set 3 Category', 'Quiz Set 3 Category', 'storage/prayers/category/1670480833854_jGtvO2srdI0BLQA1PxaQIMQPnglFJRTHEGkQmbHpOuMb6smUMsSpxMgiJ5xxp8.png', '1', 0, '0', '2022-12-08 00:57:13', '2022-12-12 23:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_category_set4s`
--

CREATE TABLE `quiz_category_set4s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(11) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_set1s`
--

CREATE TABLE `quiz_set1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_format_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_format_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_5` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_6` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_answer_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_hint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_exp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_set1s`
--

INSERT INTO `quiz_set1s` (`id`, `question_name`, `question_content`, `question_format_type`, `option_format_type`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `quiz_answer`, `quiz_answer_value`, `quiz_hint`, `quiz_image`, `image_type`, `quiz_exp`, `option_count`, `category_id`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(17, 'Array Index Start with ?', NULL, '1', '0', 'a[1]', 'a[0]', 'a[2]', 'a[3]', NULL, NULL, '2', 'a[0]', 'array of 0', 'storage/prayers/app/1670827218994_LX4vA5rIncjsXr98ZrVCHL2yJGLAP6GC9nlDtfUNRSme3FI337d61tgmnMPAva.png', '1', 'An array is a collection of items of same data type stored at contiguous memory locations.', '4', '1', 0, '0', '2022-12-12 01:10:18', '2022-12-12 01:10:18'),
(18, '<p>In which decade was the American Institute of Electrical Engineers (AIEE) founded?</p>', NULL, '2', '0', '1850s', '1880s', '1930s', '1950s', NULL, NULL, '2', '1880s', 'IEEE', '', '1', 'The IEEE (Institute of Electrical and Electronics Engineers) was formed in 1963 by the merger of the Institute of Radio Engineers (IRE, founded 1912) and the American Institute of Electrical Engineers (AIEE, founded 1884).', '4', '1', 0, '0', '2022-12-12 01:13:36', '2022-12-12 05:15:44'),
(19, 'This picture was taken during which historical period?', 'storage/events/events_images/1670841872330_SLBqf68z5QOISllMzag3K9jMBzqoWFA7fhsMqE30qHN1wPJTMbxaNFDOTyZrBX.png', '3', '0', 'The World War I', 'The Great Depression', 'The World War II', NULL, NULL, NULL, '2', 'The Great Depression', 'Depression', 'storage/prayers/app/1670841872335_wu2Zfz6OSnQpz1i9ASqrGADMgm7g5KhLce4ODSkt7f3DE36JHe3Y2OQPXWeYmg.png', '1', 'The World War III', '3', '1', 0, '0', '2022-12-12 01:22:45', '2022-12-12 05:14:32'),
(20, 'What is the name of this world-known tourist destination in Italy?', 'storage/events/events_images/1670828140397_KRUMd4vZ4Q85OJmumZyTdlgkevq4muZYBrsKeN2cHAiiOMJYLTf2QEDInoaXr2.png', '3', '0', 'Ponte Vecchio', 'Leaning Tower of Pisa', 'Milan Cathedral', NULL, NULL, NULL, '2', 'Leaning Tower of Pisa', 'Tower of Pisa is the campanile', 'storage/prayers/app/1670828140399_rIRyNwdvQI8m7kc7ISMtqHKIQuoExzX7KrrFLlAOFZwKLM3gJHXnxlBbWqm1wt.png', '1', 'The tower\'s foundation had begun to settle unevenly on the ground beneath it, a dense mixture of clay, sand and shells.', '3', '1', 0, '0', '2022-12-12 01:25:40', '2022-12-12 01:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_set1_mapped_app_categories`
--

CREATE TABLE `quiz_set1_mapped_app_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_set1_mapped_app_categories`
--

INSERT INTO `quiz_set1_mapped_app_categories` (`id`, `app_id`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 0, '2022-12-09 02:32:56', '2022-12-09 02:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_set2s`
--

CREATE TABLE `quiz_set2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_format_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_format_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_5` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_6` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_answer_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_hint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_exp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_set2s`
--

INSERT INTO `quiz_set2s` (`id`, `question_name`, `question_content`, `question_format_type`, `option_format_type`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `quiz_answer`, `quiz_answer_value`, `quiz_hint`, `quiz_image`, `image_type`, `quiz_exp`, `category_id`, `sub_category_id`, `option_count`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'dadadadaaddad', 'storage/images/image/1670844206686_Qta0K7sFTtXVJroYJYbPFlW7meLqzz4df3xXAQpbqVFOZhpqkeNZmBhLQkvcpw.png', '3', '0', 'ddaddad', 'dekhgkfds', 'kjsflgsfksff', NULL, NULL, NULL, '2', 'dekhgkfds', 'adkgugadg', 'storage/prayers/app/1670845493042_xYt1DXYFdEP4tFR0KD9ZJB9ICNe8vHEIBuAjlGunkOMwVDFGEaQaex2sFCraI5.png', '1', 'ugsfukgsfsf', '1', '1', '3', 0, '0', '2022-12-12 05:53:26', '2022-12-12 22:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_set2_mapped_app_categories`
--

CREATE TABLE `quiz_set2_mapped_app_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_set2_mapped_app_categories`
--

INSERT INTO `quiz_set2_mapped_app_categories` (`id`, `app_id`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, '2022-12-09 02:36:18', '2022-12-09 02:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_set3s`
--

CREATE TABLE `quiz_set3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_format_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_format_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_5` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_6` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_answer_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_hint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_exp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_set3s`
--

INSERT INTO `quiz_set3s` (`id`, `question_name`, `question_content`, `question_format_type`, `option_format_type`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `quiz_answer`, `quiz_answer_value`, `quiz_hint`, `quiz_image`, `image_type`, `quiz_exp`, `option_count`, `sub_category_id`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Sub Category List', 'storage/videoss/videoss_images/1670904303263_e1jgiVy9ao9GDsWxNZK6GgJUDJVRzs85BtHCpQItkotfXZJHJw2G0A2gloJWBL.png', '3', '0', 'Sub Category List', 'Sub Category List 2', 'Sub Category List 3', NULL, NULL, NULL, '2', 'Sub Category List 2', 'Sub Category List Hint', 'storage/prayers/app/1670904303291_I4VFx3FyBF35Vkt6phtIFYUxiy9oTxmax9IxfP2bt0WeAU5epQ24gnTA1nkDpl.png', '1', 'Sub Category List Explanation', '3', '2', 0, '0', '2022-12-12 22:35:03', '2022-12-12 22:40:17'),
(2, '<p><u><strong>QuizSet3s_status_update</strong></u></p>', NULL, '2', '1', '<h1><strong><em>QuizSet3s_status_update</em></strong></h1>', '<h1><strong><em>QuizSet3s_status_update</em></strong></h1>', '<h3><strong><em>QuizSet3s_status_update</em></strong></h3>', NULL, NULL, NULL, '1', '<h1><strong><em>QuizSet3s_status_update</em></strong></h1>', 'QuizSet3s_status_update', 'storage/prayers/app/1670904737486_A4vOMe3nXR9KwZLAhkQy0JasPrE9jMsUoZZVEWEcgh4zT37wybdPxW2ksfjM3Q.jpg', '1', 'QuizSet3s_status_update QuizSet3s_status_update', '3', '1', 0, '0', '2022-12-12 22:42:17', '2022-12-12 22:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_set3_category_mapped_apps`
--

CREATE TABLE `quiz_set3_category_mapped_apps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_set3_category_mapped_apps`
--

INSERT INTO `quiz_set3_category_mapped_apps` (`id`, `category_id`, `sub_category_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 0, '2022-12-12 08:11:12', '2022-12-12 08:11:12'),
(5, 1, 2, 0, '2022-12-12 08:11:12', '2022-12-12 08:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_set3_mapped_app_categories`
--

CREATE TABLE `quiz_set3_mapped_app_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_set3_mapped_app_categories`
--

INSERT INTO `quiz_set3_mapped_app_categories` (`id`, `app_id`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 0, '2022-12-12 06:49:22', '2022-12-12 06:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_set4s`
--

CREATE TABLE `quiz_set4s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_format_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_format_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_5` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_6` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_answer_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_hint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_exp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_set4s`
--

INSERT INTO `quiz_set4s` (`id`, `question_name`, `question_content`, `question_format_type`, `option_format_type`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `quiz_answer`, `quiz_answer_value`, `quiz_hint`, `quiz_image`, `image_type`, `quiz_exp`, `option_count`, `app_id`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Video File', 'storage/video/videos/1670848876088_XToVJZVmCCoIPH758uRVCoAwP2gwmeMgbUPYjpYmCBGa0u8sbT20t3rW3LRnb2.mp4', '4', '1', '<p>Video File</p>', '<p>Video File</p>', '<p>Video File</p>', '<p>Video File</p>', '<p>Video File 4</p>', NULL, '5', 'fsff', 'Video File', 'storage/video/videos/1670848876090_f39L1ulDNWvUQJbM9jYTQF9A85j7UVMfQVZaQWycMfqE7vE2n5XbKxQnAdirhj.avif', '1', 'Video File', '5', '1', 0, '0', '2022-12-12 06:46:42', '2022-12-12 21:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_sub_category_set2s`
--

CREATE TABLE `quiz_sub_category_set2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_sub_category_set2s`
--

INSERT INTO `quiz_sub_category_set2s` (`id`, `sub_category_name`, `sub_category_description`, `sub_category_image`, `image_type`, `category_id`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Quiz Set 2 Sub Category', 'Quiz Set 2 Sub Category', 'storage/Image/subcategory/1670480901481_kaitg4bzvZqPCsSKG9lJUZBgYjkbezzAI56mhTAheVtnwETLxz9mkis3VxXQq4.png', '1', '1', 0, '0', '2022-12-08 00:58:21', '2022-12-08 00:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_sub_category_set3s`
--

CREATE TABLE `quiz_sub_category_set3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_sub_category_set3s`
--

INSERT INTO `quiz_sub_category_set3s` (`id`, `sub_category_name`, `sub_category_description`, `sub_category_image`, `image_type`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Quiz Sub Category Set 3', 'Quiz Sub Category Set 3', 'storage/Image/subcategory/1670481101114_pjFrImFRSrKdMAMS9qlUFI3NwypbYJ17TsKwakTQw2QNzMRRWE0QAnJoJGDWSR.png', '1', 0, '0', '2022-12-08 01:01:41', '2022-12-08 01:01:41'),
(2, 'Quiz Sub Category Set 3 II', 'Quiz Sub Category Set 3 II', 'storage/Image/subcategory/1670850318653_D9hAwfwfrHhCRHG889RvmKg0mevOPmSe2P0tGjdb31IfFu57G9yXfPxLFT4Muy.avif', '1', 0, '0', '2022-12-12 07:35:18', '2022-12-12 07:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `log_activities`
--
ALTER TABLE `log_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_app_set1s`
--
ALTER TABLE `quiz_app_set1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_app_set2s`
--
ALTER TABLE `quiz_app_set2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_app_set3s`
--
ALTER TABLE `quiz_app_set3s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_app_set4s`
--
ALTER TABLE `quiz_app_set4s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_category_set1s`
--
ALTER TABLE `quiz_category_set1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_category_set2s`
--
ALTER TABLE `quiz_category_set2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_category_set3s`
--
ALTER TABLE `quiz_category_set3s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_category_set4s`
--
ALTER TABLE `quiz_category_set4s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_set1s`
--
ALTER TABLE `quiz_set1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_set1_mapped_app_categories`
--
ALTER TABLE `quiz_set1_mapped_app_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_set2s`
--
ALTER TABLE `quiz_set2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_set2_mapped_app_categories`
--
ALTER TABLE `quiz_set2_mapped_app_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_set3s`
--
ALTER TABLE `quiz_set3s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_set3_category_mapped_apps`
--
ALTER TABLE `quiz_set3_category_mapped_apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_set3_mapped_app_categories`
--
ALTER TABLE `quiz_set3_mapped_app_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_set4s`
--
ALTER TABLE `quiz_set4s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_sub_category_set2s`
--
ALTER TABLE `quiz_sub_category_set2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_sub_category_set3s`
--
ALTER TABLE `quiz_sub_category_set3s`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=697;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quiz_app_set1s`
--
ALTER TABLE `quiz_app_set1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_app_set2s`
--
ALTER TABLE `quiz_app_set2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_app_set3s`
--
ALTER TABLE `quiz_app_set3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_app_set4s`
--
ALTER TABLE `quiz_app_set4s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_category_set1s`
--
ALTER TABLE `quiz_category_set1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_category_set2s`
--
ALTER TABLE `quiz_category_set2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_category_set3s`
--
ALTER TABLE `quiz_category_set3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_category_set4s`
--
ALTER TABLE `quiz_category_set4s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_set1s`
--
ALTER TABLE `quiz_set1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `quiz_set1_mapped_app_categories`
--
ALTER TABLE `quiz_set1_mapped_app_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz_set2s`
--
ALTER TABLE `quiz_set2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_set2_mapped_app_categories`
--
ALTER TABLE `quiz_set2_mapped_app_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_set3s`
--
ALTER TABLE `quiz_set3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz_set3_category_mapped_apps`
--
ALTER TABLE `quiz_set3_category_mapped_apps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quiz_set3_mapped_app_categories`
--
ALTER TABLE `quiz_set3_mapped_app_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz_set4s`
--
ALTER TABLE `quiz_set4s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_sub_category_set2s`
--
ALTER TABLE `quiz_sub_category_set2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_sub_category_set3s`
--
ALTER TABLE `quiz_sub_category_set3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
