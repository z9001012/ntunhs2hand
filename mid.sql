-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2016 年 06 月 22 日 05:52
-- 伺服器版本: 10.1.9-MariaDB
-- PHP 版本： 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `mid`
--

-- --------------------------------------------------------

--
-- 資料表結構 `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `isnew` tinyint(1) NOT NULL,
  `depart_id` int(10) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `onsale` int(11) NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `books`
--

INSERT INTO `books` (`id`, `name`, `total`, `sales`, `type`, `isnew`, `depart_id`, `author`, `price`, `onsale`, `img`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'ggg', 1000, 1000, 0, 0, 4, '123123', 200, 10, '47s9Byt0nUIygvHxLhUJR4RDQnZixE.jpg', 2, '2016-03-14 12:29:06', '2016-06-20 09:04:17'),
(5, 'PHP', 10, 10, 1, 0, 1, 'ooo', 560, 200, 'xcCLQEsoXdnQalTaySBqVlbQ7r2iU3.jpg', 2, '2016-04-29 16:56:53', '2016-04-29 16:56:53'),
(6, 'AngularJS', 20, 20, 1, 1, 2, '132', 900, 300, '9G6sTBmH8i8yTrrKriqWR13UTyjviS.jpg', 1, '2016-04-29 16:57:39', '2016-04-29 16:57:39'),
(7, 'python', 10, 10, 1, 0, 1, '123', 200, 300, '4ZO21c1uquN88tJjja16zRpMUp5cD3.jpg', 2, '2016-04-29 16:57:59', '2016-04-29 16:57:59'),
(8, 'javascript設計模式', 10, 10, 1, 0, 1, '123', 900, 200, 'm8xR4rRy2CuIncvr8BVx79iVRwrZh5.jpg', 2, '2016-04-29 16:59:14', '2016-04-29 16:59:14'),
(9, 'ㄋ', 0, 0, 1, 0, 1, 'sadsad', 200, 100, 'FKNBJq10JtKKKiKFbDg40iatPiPIQb.jpg', 2, '2016-06-20 09:03:22', '2016-06-20 09:03:22');

-- --------------------------------------------------------

--
-- 資料表結構 `depart`
--

CREATE TABLE `depart` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `depart`
--

INSERT INTO `depart` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '資管系', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '護理系', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '生死系', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '健管系', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '運保系', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '幼保系', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '不分系', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_books_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_03_14_192605_create_depart', 1),
('2016_05_01_210653_QA', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '買家ID',
  `check` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `orders`
--

INSERT INTO `orders` (`id`, `book_id`, `user_id`, `check`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 0, '2016-02-28 03:13:12', '2016-02-28 03:13:12'),
(2, 6, 1, 0, '2016-02-28 03:13:32', '2016-02-28 03:13:32'),
(3, 6, 1, 0, '2016-03-14 03:39:47', '2016-03-14 03:39:47'),
(4, 4, 2, 0, '2016-03-14 12:48:52', '2016-03-14 12:48:52'),
(5, 4, 2, 0, '2016-03-14 12:49:07', '2016-03-14 12:49:07'),
(6, 4, 2, 0, '2016-03-14 12:56:50', '2016-03-14 12:56:50'),
(7, 4, 2, 0, '2016-03-14 12:59:19', '2016-03-14 12:59:19'),
(8, 4, 2, 0, '2016-03-14 13:01:18', '2016-03-14 13:01:18'),
(9, 4, 2, 0, '2016-03-14 13:02:06', '2016-03-14 13:02:06'),
(16, 4, 2, 0, '2016-04-28 12:10:51', '2016-04-28 12:10:51'),
(28, 8, 2, 0, '2016-04-30 10:13:51', '2016-04-30 10:13:51'),
(29, 8, 2, 0, '2016-04-30 11:31:10', '2016-04-30 11:31:10'),
(30, 8, 2, 0, '2016-04-30 11:59:37', '2016-04-30 11:59:37'),
(31, 8, 2, 0, '2016-04-30 12:17:42', '2016-04-30 12:17:42'),
(32, 8, 2, 0, '2016-04-30 12:18:27', '2016-04-30 12:18:27'),
(33, 8, 2, 0, '2016-04-30 12:19:48', '2016-04-30 12:19:48'),
(34, 8, 2, 0, '2016-04-30 12:27:20', '2016-04-30 12:27:20'),
(35, 8, 2, 0, '2016-04-30 12:29:15', '2016-04-30 12:29:15'),
(36, 8, 2, 0, '2016-04-30 12:36:44', '2016-04-30 12:36:44'),
(37, 8, 2, 0, '2016-04-30 12:37:37', '2016-04-30 12:37:37'),
(38, 8, 2, 0, '2016-04-30 12:38:41', '2016-04-30 12:38:41'),
(40, 8, 1, 0, '2016-06-20 07:14:43', '2016-06-20 07:14:43'),
(45, 8, 1, 0, '2016-06-20 07:17:54', '2016-06-20 07:17:54'),
(47, 8, 13, 0, '2016-06-20 07:22:28', '2016-06-20 07:22:28'),
(48, 8, 13, 0, '2016-06-20 07:24:05', '2016-06-20 07:24:05'),
(49, 8, 11, 0, '2016-06-20 07:36:26', '2016-06-20 07:36:26'),
(50, 8, 11, 0, '2016-06-20 07:37:03', '2016-06-20 07:37:03'),
(51, 7, 2, 0, '2016-06-21 08:54:59', '2016-06-21 08:54:59'),
(52, 7, 11, 0, '2016-06-21 08:56:09', '2016-06-21 08:56:09');

-- --------------------------------------------------------

--
-- 資料表結構 `QAs`
--

CREATE TABLE `QAs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `QAs`
--

INSERT INTO `QAs` (`id`, `user_id`, `book_id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 2, 7, '123', '', '2016-05-01 14:02:04', '2016-05-01 14:02:04'),
(2, 2, 7, '123123', '', '2016-05-01 14:16:19', '2016-05-01 14:16:19'),
(3, 2, 7, '賣家是白痴嗎？', '我不是喔～', '2016-05-02 10:07:57', '2016-06-21 08:51:16'),
(4, 2, 7, '123123\r\n12321131231\r\n', '', '2016-05-02 10:11:08', '2016-05-02 10:11:08'),
(5, 2, 7, '123\r\n123123\r\n123123123', '', '2016-05-02 12:01:20', '2016-05-02 12:01:20'),
(6, 2, 7, '123123', '', '2016-05-02 12:02:09', '2016-05-02 12:02:09'),
(7, 2, 7, 'asdasda<br />\r\nasddad<br />\r\nasd', '', '2016-05-02 12:15:03', '2016-05-02 12:15:03'),
(8, 2, 7, '嗨宗言<br />\r\n0 0 00  123<br />\r\n33<br />\r\n2321313123<br />\r\n123123123<br />\r\n2222', '', '2016-05-02 12:16:01', '2016-05-02 12:16:01'),
(9, 2, 8, '123123123asdasd', '123123', '2016-05-31 13:14:03', '2016-06-20 05:58:03'),
(10, 2, 7, 'asdad0 0 00 0 0安安安', 'hihiihihiihihihihihihihiii<br />\r\nhere', '2016-06-01 14:05:04', '2016-06-21 08:51:01'),
(11, 2, 8, 'c9 asdad<br />\r\nddas<br />\r\nad<br />\r\na<br />\r\nd<br />\r\nwqeqe<h1>123</h1>', 'ddddsaaqweqweqe', '2016-06-20 05:02:40', '2016-06-20 05:58:09'),
(12, 2, 8, '<h1 style="color:red">123</h1>', 'dfgdfgdfgd\r\nadads\r\nasddddd\r\ndd', '2016-06-20 05:03:15', '2016-06-20 05:58:19'),
(13, 2, 8, ''' ', 'asd\r\nasdddd\r\nddd', '2016-06-20 05:03:51', '2016-06-20 06:00:59'),
(15, 2, 8, 'asdasd', 'as<br />\r\nasdasd<br />\r\ndsad', '2016-06-20 05:08:29', '2016-06-20 06:03:07'),
(16, 2, 8, '123123', '', '2016-06-20 05:08:53', '2016-06-20 05:08:53'),
(17, 2, 8, 'asdasd', '', '2016-06-20 05:13:51', '2016-06-20 05:13:51'),
(18, 13, 8, 'is me', '', '2016-06-20 05:17:18', '2016-06-20 05:17:18'),
(19, 2, 8, 'asdasdasd\r\nas\r\nasdasd', 'cccc<br />\r\ncccc<br />\r\ncc<br />\r\nc<br />\r\nc<br />\r\nc<br />\r\ncccc', '2016-06-20 06:02:23', '2016-06-20 09:16:06'),
(20, 2, 8, 'asdadda', 'asdad<br />\r\naa<br />\r\nasdasdsad', '2016-06-20 06:04:20', '2016-06-20 09:15:59'),
(21, 2, 8, 'sdasdad<br />\r\nadaa<br />\r\ndadaddddccc', '0 0 0 <br />\r\nAA', '2016-06-20 06:04:30', '2016-06-20 06:04:37'),
(22, 2, 8, 'new', 'hi<br />\r\nyao', '2016-06-20 06:14:41', '2016-06-20 06:15:19'),
(23, 2, 6, 'asdasdasd<br />\r\nasdasd', '', '2016-06-20 07:17:16', '2016-06-20 07:17:16'),
(24, 11, 9, 'asdad', '', '2016-06-21 08:36:30', '2016-06-21 08:36:30');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `confirmed`, `confirmation_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '姚宗言', '4400203722', '$2y$10$ut6bF.bwQDUD0z8zlAmx/.g6PBDhmPA8W5ir6DRMETFKtEFR2ylsS', 1, NULL, 'zzVXydY4f0WAWQ0dOyjoskt4d3orRjF9ZL8HyuiDQtZa9ke3dqOmye7DfFre', '2016-01-07 14:40:23', '2016-01-07 15:02:07'),
(2, '賣書員', '440020372', '$2y$10$8B82id4W.9G92hMLcr6NW.V2/7zQnbJu/Ke3Rxo/O9dcI8NPPPxM6', 1, NULL, '6dWWuK0gQG8Hf7NLu5pBR9SIVNdTKZicoqfoeLLu11QJCUBJZdg0hQoAn4vc', '2016-01-07 15:02:53', '2016-06-21 08:55:52'),
(9, '', '1231231', '', 0, 'Oea8OCsltAB7xaS8R3g62SIsDnEp3D', NULL, '2016-04-28 15:05:21', '2016-04-28 15:05:21'),
(10, '李昶緯', '440020462', '$2y$10$0yp.9zSyDhHoPt5hDDt94.QaTT.YpfRc6LY5tF7qZn7BwXE7EXoq.', 1, NULL, NULL, '2016-05-02 10:00:37', '2016-05-02 10:06:31'),
(11, '林亞萱', '440020905', '$2y$10$GDtVfueFhcKDttYMBXxm0eONEd8AXiYlSfECNqgCWLQFQAbAB081C', 1, NULL, '0gXilrlX5Y94ZWqw0W9lzpciP2PI30h6KxlmfKwXf8Imx5bODNjdUVEJKl8b', '2016-06-20 04:50:46', '2016-06-21 08:50:15'),
(12, '', '131312', '', 0, 'FODW6KmVXyXjXTxciGL0UDfzxQFRRE', NULL, '2016-06-20 05:00:46', '2016-06-20 05:00:46'),
(13, '我是神', '440020371', '$2y$10$hvnAYI4AE4FMoxdJrKYhn.lUIOCE.XV4Wy5/M3whQaQX/gFt0Pr/i', 1, NULL, 'Q8g77IYQOude71L6xzBbTlhJoroKABHjFv7Aj8Pwe839MxN32VNp5AjHb5OT', '2016-06-20 05:01:31', '2016-06-20 07:16:44');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_user_id_foreign` (`user_id`),
  ADD KEY `books_depart_id_foreign` (`depart_id`);

--
-- 資料表索引 `depart`
--
ALTER TABLE `depart`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_book_id_foreign` (`book_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- 資料表索引 `QAs`
--
ALTER TABLE `QAs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qas_user_id_foreign` (`user_id`),
  ADD KEY `qas_book_id_foreign` (`book_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `depart`
--
ALTER TABLE `depart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- 使用資料表 AUTO_INCREMENT `QAs`
--
ALTER TABLE `QAs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_depart_id_foreign` FOREIGN KEY (`depart_id`) REFERENCES `depart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- 資料表的 Constraints `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- 資料表的 Constraints `QAs`
--
ALTER TABLE `QAs`
  ADD CONSTRAINT `qas_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
