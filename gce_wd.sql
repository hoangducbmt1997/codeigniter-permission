-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2023 at 03:56 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `send_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `lang_code` varchar(10) NOT NULL,
  `key_name` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `lang_code`, `key_name`, `value`) VALUES
(1, 'eng', 'msg_hi', 'Hi'),
(2, 'eng', 'title_dashboard', 'Dashboard'),
(3, 'eng', 'title_home', 'Home'),
(4, 'eng', 'title_users', 'All Users'),
(5, 'eng', 'title_permissions', 'All Permissions'),
(6, 'eng', 'title_roles', 'All Roles'),
(7, 'eng', 'sidebar_user', 'User Management'),
(8, 'eng', 'sidebar_role', 'Role Management'),
(9, 'eng', 'sidebar_permission', 'Permission Management'),
(10, 'eng', 'sidebar_statistic_report', 'Statistic and Report'),
(11, 'eng', 'btn_search', 'Search'),
(12, 'eng', 'btn_edit', 'Edit'),
(13, 'eng', 'btn_delete', 'Delete'),
(14, 'eng', 'btn_logout', 'Logout'),
(15, 'eng', 'btn_role', 'Role'),
(16, 'eng', 'btn_permission', 'Permission'),
(17, 'eng', 'btn_import_excel', 'Import Excel'),
(18, 'eng', 'btn_export_excel', 'Export Excel'),
(19, 'eng', 'btn_create_user', 'Create User'),
(20, 'eng', 'btn_create_role', 'Create Role'),
(21, 'eng', 'btn_create_permission', 'Create Permission'),
(22, 'eng', 'label_action', 'Action'),
(23, 'eng', 'label_created_at', 'Created At'),
(24, 'eng', 'label_updated_at', 'Update At'),
(25, 'eng', 'label_image', 'Image'),
(26, 'eng', 'label_start_date', 'Start Date'),
(27, 'eng', 'label_end_date', 'End Date'),
(28, 'eng', 'label_role_name', 'Role Name'),
(29, 'vi', 'msg_hi', 'Xin chào'),
(30, 'vi', 'title_dashboard', 'Bảng điều khiển'),
(31, 'vi', 'title_home', 'Trang chủ'),
(32, 'vi', 'title_users', 'Danh sách người dùng'),
(33, 'vi', 'title_permissions', 'Danh sách quyền'),
(34, 'vi', 'title_roles', 'Danh sách vai trò'),
(35, 'vi', 'sidebar_user', 'Quản lý người dùng'),
(36, 'vi', 'sidebar_role', 'Quản lý vai trò'),
(37, 'vi', 'sidebar_permission', 'Quản lý quyền'),
(38, 'vi', 'sidebar_statistic_report', 'Thống kê và báo cáo'),
(39, 'vi', 'btn_search', 'Tìm kiếm'),
(40, 'vi', 'btn_edit', 'Sửa'),
(41, 'vi', 'btn_delete', 'Xóa'),
(42, 'vi', 'btn_logout', 'Đăng xuất'),
(43, 'vi', 'btn_role', 'Vai trò'),
(44, 'vi', 'btn_permission', 'Quyền'),
(45, 'vi', 'btn_import_excel', 'Nhập excel'),
(46, 'vi', 'btn_export_excel', 'Xuất excel'),
(47, 'vi', 'btn_create_user', 'Tạo tài khoản'),
(48, 'vi', 'btn_create_role', 'Tạo vai trò'),
(49, 'vi', 'btn_create_permission', 'Tạo quyền'),
(50, 'vi', 'label_action', 'Hành động'),
(51, 'vi', 'label_created_at', 'Ngày tạo'),
(52, 'vi', 'label_updated_at', 'Ngày cập nhật'),
(53, 'vi', 'label_image', 'Hình ảnh'),
(54, 'vi', 'label_start_date', 'Ngày bắt đầu'),
(55, 'vi', 'label_end_date', 'Ngày kết thúc'),
(56, 'vi', 'label_role_name', 'Tên Vai Trò');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `action` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `action`, `created_at`, `updated_at`) VALUES
(2, 'user_list', '2023-05-27 00:38:48', '2023-05-28 18:23:08'),
(3, 'user_add', '2023-05-27 00:40:32', '2023-05-28 18:23:21'),
(5, 'user_edit', '2023-05-28 18:33:17', '2023-05-28 18:53:45'),
(6, 'user_delete', '2023-05-28 18:33:32', '2023-05-28 18:53:56'),
(8, 'user_role', '2023-05-28 18:55:01', '2023-05-28 19:27:41'),
(9, 'role_list', '2023-05-28 19:29:02', '2023-05-28 19:29:02'),
(10, 'role_add', '2023-05-28 19:29:15', '2023-05-28 19:29:15'),
(11, 'role_edit', '2023-05-28 19:29:37', '2023-05-28 19:29:37'),
(12, 'role_update', '2023-05-28 19:29:49', '2023-05-28 19:29:49'),
(13, 'role_permissions', '2023-05-28 19:30:36', '2023-05-28 19:30:36'),
(14, 'permission_list', '2023-05-28 19:30:53', '2023-05-28 20:40:52'),
(15, 'permission_add', '2023-05-28 19:31:10', '2023-05-28 20:41:03'),
(16, 'permission_edit', '2023-05-28 19:31:54', '2023-05-28 20:41:14'),
(17, 'permission_delete', '2023-05-28 20:41:28', '2023-05-28 20:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `remember_login`
--

CREATE TABLE `remember_login` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', '2023-05-26 20:26:07', '2023-05-26 20:40:35'),
(3, 'manager', '2023-05-26 20:41:45', '2023-05-26 20:41:45'),
(4, 'guest', '2023-05-26 20:41:53', '2023-05-26 20:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(240, 1, 2, '2023-05-28 23:44:21', '2023-05-28 23:44:21'),
(241, 1, 3, '2023-05-28 23:44:21', '2023-05-28 23:44:21'),
(242, 1, 5, '2023-05-28 23:44:21', '2023-05-28 23:44:21'),
(243, 1, 6, '2023-05-28 23:44:21', '2023-05-28 23:44:21'),
(244, 1, 8, '2023-05-28 23:44:21', '2023-05-28 23:44:21'),
(245, 1, 9, '2023-05-28 23:44:21', '2023-05-28 23:44:21'),
(246, 1, 10, '2023-05-28 23:44:21', '2023-05-28 23:44:21'),
(247, 1, 11, '2023-05-28 23:44:21', '2023-05-28 23:44:21'),
(248, 1, 12, '2023-05-28 23:44:21', '2023-05-28 23:44:21'),
(249, 1, 13, '2023-05-28 23:44:21', '2023-05-28 23:44:21'),
(250, 1, 14, '2023-05-28 23:44:21', '2023-05-28 23:44:21'),
(251, 1, 15, '2023-05-28 23:44:21', '2023-05-28 23:44:21'),
(252, 1, 16, '2023-05-28 23:44:21', '2023-05-28 23:44:21'),
(253, 1, 17, '2023-05-28 23:44:21', '2023-05-28 23:44:21'),
(254, 3, 2, '2023-05-28 23:56:27', '2023-05-28 23:56:27'),
(255, 3, 9, '2023-05-28 23:56:27', '2023-05-28 23:56:27'),
(256, 3, 14, '2023-05-28 23:56:27', '2023-05-28 23:56:27'),
(257, 3, 15, '2023-05-28 23:56:27', '2023-05-28 23:56:27'),
(258, 3, 16, '2023-05-28 23:56:27', '2023-05-28 23:56:27'),
(259, 3, 17, '2023-05-28 23:56:27', '2023-05-28 23:56:27'),
(260, 4, 2, '2023-05-28 23:57:33', '2023-05-28 23:57:33'),
(261, 4, 9, '2023-05-28 23:57:33', '2023-05-28 23:57:33'),
(262, 4, 14, '2023-05-28 23:57:33', '2023-05-28 23:57:33');

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
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `image`, `email`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin@gmail.com', 0, '2023-05-24 23:50:57', '2023-05-26 00:21:55'),
(3, 'hoangduc', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'hoangduc@gmail.com', 0, '2023-05-25 19:41:52', '2023-05-26 00:17:38'),
(6, 'hoangduc1', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin@gmail.com', 1, '2023-05-25 22:49:21', '2023-05-26 01:29:08'),
(7, 'admin1', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin1@gmail.com', 1, '2023-05-25 23:24:33', '2023-05-25 23:56:04'),
(8, 'admin1111', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin123@gmail.com', 1, '2023-05-26 01:26:44', '2023-05-26 02:03:11'),
(9, 'songvedem123', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'songvedem@gmail.com', 1, '2023-05-26 01:40:42', '2023-05-26 02:55:20'),
(10, 'songvedem1234', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'songvedem1@gmail.com', 1, '2023-05-26 01:42:16', '2023-05-26 01:44:46'),
(11, 'songvedem1997', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'songvedem1997@gmail.com', 1, '2023-05-26 01:45:10', '2023-05-26 02:55:27'),
(12, 'songvedem123', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin1@gmail.com', 1, '2023-05-26 01:47:11', '2023-05-26 01:51:28'),
(13, 'songvedem1221', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin9999@gmail.com', 1, '2023-05-26 01:51:55', '2023-05-26 02:55:24'),
(14, 'songvedem1156', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin@gmail.com', 1, '2023-05-26 01:53:27', '2023-05-26 01:59:58'),
(15, 'songvedem1997', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'songvedem@gmail.com', 1, '2023-05-26 02:03:55', '2023-05-26 02:04:04'),
(16, 'userdemo', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'userdemo@gmail.com', 0, '2023-05-26 18:08:28', '2023-05-26 18:08:28'),
(17, 'test', 'e10adc3949ba59abbe56e057f20f883e', '', 'test@gmail.com', 1, '2023-06-07 01:47:26', '2023-06-07 01:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(6, 2, 1, '2023-05-27 01:22:03', '2023-05-27 01:22:03'),
(7, 16, 4, '2023-05-27 01:24:19', '2023-05-27 01:24:19'),
(8, 3, 3, '2023-05-27 01:25:47', '2023-05-27 01:25:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
