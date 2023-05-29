-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2023 at 09:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gce_wd`
--

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `action` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `action`, `created_at`, `updated_at`) VALUES
(2, 'user_list', '2023-05-27 07:38:48', '2023-05-29 01:23:08'),
(3, 'user_add', '2023-05-27 07:40:32', '2023-05-29 01:23:21'),
(5, 'user_edit', '2023-05-29 01:33:17', '2023-05-29 01:53:45'),
(6, 'user_delete', '2023-05-29 01:33:32', '2023-05-29 01:53:56'),
(8, 'user_role', '2023-05-29 01:55:01', '2023-05-29 02:27:41'),
(9, 'role_list', '2023-05-29 02:29:02', '2023-05-29 02:29:02'),
(10, 'role_add', '2023-05-29 02:29:15', '2023-05-29 02:29:15'),
(11, 'role_edit', '2023-05-29 02:29:37', '2023-05-29 02:29:37'),
(12, 'role_update', '2023-05-29 02:29:49', '2023-05-29 02:29:49'),
(13, 'role_permissions', '2023-05-29 02:30:36', '2023-05-29 02:30:36'),
(14, 'permission_list', '2023-05-29 02:30:53', '2023-05-29 03:40:52'),
(15, 'permission_add', '2023-05-29 02:31:10', '2023-05-29 03:41:03'),
(16, 'permission_edit', '2023-05-29 02:31:54', '2023-05-29 03:41:14'),
(17, 'permission_delete', '2023-05-29 03:41:28', '2023-05-29 03:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `remember_login`
--

CREATE TABLE `remember_login` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', '2023-05-27 03:26:07', '2023-05-27 03:40:35'),
(3, 'manager', '2023-05-27 03:41:45', '2023-05-27 03:41:45'),
(4, 'guest', '2023-05-27 03:41:53', '2023-05-27 03:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(240, 1, 2, '2023-05-29 06:44:21', '2023-05-29 06:44:21'),
(241, 1, 3, '2023-05-29 06:44:21', '2023-05-29 06:44:21'),
(242, 1, 5, '2023-05-29 06:44:21', '2023-05-29 06:44:21'),
(243, 1, 6, '2023-05-29 06:44:21', '2023-05-29 06:44:21'),
(244, 1, 8, '2023-05-29 06:44:21', '2023-05-29 06:44:21'),
(245, 1, 9, '2023-05-29 06:44:21', '2023-05-29 06:44:21'),
(246, 1, 10, '2023-05-29 06:44:21', '2023-05-29 06:44:21'),
(247, 1, 11, '2023-05-29 06:44:21', '2023-05-29 06:44:21'),
(248, 1, 12, '2023-05-29 06:44:21', '2023-05-29 06:44:21'),
(249, 1, 13, '2023-05-29 06:44:21', '2023-05-29 06:44:21'),
(250, 1, 14, '2023-05-29 06:44:21', '2023-05-29 06:44:21'),
(251, 1, 15, '2023-05-29 06:44:21', '2023-05-29 06:44:21'),
(252, 1, 16, '2023-05-29 06:44:21', '2023-05-29 06:44:21'),
(253, 1, 17, '2023-05-29 06:44:21', '2023-05-29 06:44:21'),
(254, 3, 2, '2023-05-29 06:56:27', '2023-05-29 06:56:27'),
(255, 3, 9, '2023-05-29 06:56:27', '2023-05-29 06:56:27'),
(256, 3, 14, '2023-05-29 06:56:27', '2023-05-29 06:56:27'),
(257, 3, 15, '2023-05-29 06:56:27', '2023-05-29 06:56:27'),
(258, 3, 16, '2023-05-29 06:56:27', '2023-05-29 06:56:27'),
(259, 3, 17, '2023-05-29 06:56:27', '2023-05-29 06:56:27'),
(260, 4, 2, '2023-05-29 06:57:33', '2023-05-29 06:57:33'),
(261, 4, 9, '2023-05-29 06:57:33', '2023-05-29 06:57:33'),
(262, 4, 14, '2023-05-29 06:57:33', '2023-05-29 06:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `image`, `email`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin@gmail.com', 0, '2023-05-25 06:50:57', '2023-05-26 07:21:55'),
(3, 'hoangduc', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'hoangduc@gmail.com', 0, '2023-05-26 02:41:52', '2023-05-26 07:17:38'),
(6, 'hoangduc1', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin@gmail.com', 1, '2023-05-26 05:49:21', '2023-05-26 08:29:08'),
(7, 'admin1', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin1@gmail.com', 1, '2023-05-26 06:24:33', '2023-05-26 06:56:04'),
(8, 'admin1111', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin123@gmail.com', 1, '2023-05-26 08:26:44', '2023-05-26 09:03:11'),
(9, 'songvedem123', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'songvedem@gmail.com', 1, '2023-05-26 08:40:42', '2023-05-26 09:55:20'),
(10, 'songvedem1234', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'songvedem1@gmail.com', 1, '2023-05-26 08:42:16', '2023-05-26 08:44:46'),
(11, 'songvedem1997', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'songvedem1997@gmail.com', 1, '2023-05-26 08:45:10', '2023-05-26 09:55:27'),
(12, 'songvedem123', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin1@gmail.com', 1, '2023-05-26 08:47:11', '2023-05-26 08:51:28'),
(13, 'songvedem1221', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin9999@gmail.com', 1, '2023-05-26 08:51:55', '2023-05-26 09:55:24'),
(14, 'songvedem1156', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin@gmail.com', 1, '2023-05-26 08:53:27', '2023-05-26 08:59:58'),
(15, 'songvedem1997', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'songvedem@gmail.com', 1, '2023-05-26 09:03:55', '2023-05-26 09:04:04'),
(16, 'userdemo', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'userdemo@gmail.com', 0, '2023-05-27 01:08:28', '2023-05-27 01:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(6, 2, 1, '2023-05-27 08:22:03', '2023-05-27 08:22:03'),
(7, 16, 4, '2023-05-27 08:24:19', '2023-05-27 08:24:19'),
(8, 3, 3, '2023-05-27 08:25:47', '2023-05-27 08:25:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remember_login`
--
ALTER TABLE `remember_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `remember_login`
--
ALTER TABLE `remember_login`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
