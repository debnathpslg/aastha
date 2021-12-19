-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 07:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aastha_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carousels`
--

CREATE TABLE `carousels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carousels`
--

INSERT INTO `carousels` (`id`, `image_name`, `created_at`, `updated_at`) VALUES
(1, '1.png', '2021-12-19 12:33:57', '2021-12-19 12:33:57'),
(2, '2.png', '2021-12-19 12:33:57', '2021-12-19 12:33:57'),
(3, '3.png', '2021-12-19 12:33:57', '2021-12-19 12:33:57'),
(4, '4.png', '2021-12-19 12:33:57', '2021-12-19 12:33:57'),
(5, '5.png', '2021-12-19 12:33:57', '2021-12-19 12:33:57'),
(6, '6.png', '2021-12-19 12:33:57', '2021-12-19 12:33:57'),
(7, '7.png', '2021-12-19 12:33:57', '2021-12-19 12:33:57'),
(8, '8.png', '2021-12-19 12:33:57', '2021-12-19 12:33:57'),
(9, '9.png', '2021-12-19 12:33:57', '2021-12-19 12:33:57'),
(10, '10.png', '2021-12-19 12:33:57', '2021-12-19 12:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'Back Office', '2021-12-19 12:31:38', '2021-12-19 12:31:38'),
(2, 'Runner', '2021-12-19 12:31:38', '2021-12-19 12:31:38'),
(3, 'Driver', '2021-12-19 12:31:38', '2021-12-19 12:31:38'),
(4, 'Supervisor', '2021-12-19 12:31:38', '2021-12-19 12:31:38'),
(5, 'Field Supervisor', '2021-12-19 12:31:38', '2021-12-19 12:31:38'),
(6, 'Field Executive', '2021-12-19 12:31:38', '2021-12-19 12:31:38'),
(7, 'Telecaller', '2021-12-19 12:31:38', '2021-12-19 12:31:38'),
(8, '9+ Caller', '2021-12-19 12:31:38', '2021-12-19 12:31:38'),
(9, 'Other', '2021-12-19 13:11:04', '2021-12-19 13:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id_no` bigint(20) NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_location` bigint(20) UNSIGNED NOT NULL,
  `emp_designation` bigint(20) UNSIGNED NOT NULL,
  `emp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_ac_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_relation` bigint(20) UNSIGNED NOT NULL,
  `emp_account_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_bank_branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_bank_ifsc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sal_type` bigint(20) NOT NULL DEFAULT 0,
  `joined_on` datetime DEFAULT NULL,
  `left_on` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_id_no`, `emp_id`, `emp_location`, `emp_designation`, `emp_name`, `emp_email`, `emp_mobile`, `emp_ac_holder_name`, `emp_relation`, `emp_account_no`, `emp_bank_name`, `emp_bank_branch`, `emp_bank_ifsc`, `is_active`, `sal_type`, `joined_on`, `left_on`, `created_at`, `updated_at`) VALUES
(1, 226, 'AAST000226', 2, 1, 'Partha Debnath', 'partha.aastha@gmail.com', '9832356644', 'Partha Debnath', 1, '020801535844', 'Icici Bank Ltd.', 'Siliguri', 'ICIC0000208', 1, 0, NULL, NULL, '2021-12-19 13:28:24', '2021-12-19 13:28:24'),
(2, 673, 'AAST000673', 2, 1, 'Md Alam', 'alam.aastha@gmail.com', '9474407312', 'Md Alam', 1, '271601500451', 'Icici Bank Ltd.', 'Siliguri', 'ICIC0000208', 1, 0, NULL, NULL, '2021-12-19 13:28:24', '2021-12-19 13:28:24'),
(3, 229, 'AAST000229', 2, 1, 'Sk Shanewaz Hussain', 'skshanewaz.aastha@gmail.com', '9593901016', 'Sk Shanewaz Hussain', 1, '50100467568758', 'Hdfc Bank Ltd.', 'Islampur', 'HDFC0002747', 1, 0, NULL, NULL, '2021-12-19 13:28:24', '2021-12-19 13:28:24'),
(4, 227, 'AAST000227', 2, 1, 'Pravat Sarkar', 'pravat.aastha@gmail.com', 'UBIN0573990', 'Pravat Sarkar', 1, '739902010006557', 'Uniob Bank of India', 'Ghughumali', 'ICIC0000208', 1, 0, NULL, NULL, '2021-12-19 13:28:24', '2021-12-19 13:28:24'),
(5, -1, 'AASTPROP01', 2, 9, 'Subrata Sarkar', 'aastha.subrata@gmail.com', '9933671962', 'Subrata Sarkar', 1, NULL, 'State Bank of India', 'Nts More', NULL, 1, 0, NULL, NULL, '2021-12-19 13:28:24', '2021-12-19 13:28:24'),
(6, -2, 'AASTPROP02', 2, 9, 'Koustav Dey', 'koustav.aastha@gmail.com', '9933094870', 'Koustav Dey', 1, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, '2021-12-19 13:28:24', '2021-12-19 13:28:24'),
(7, -3, 'AAST999999', 2, 1, 'Dummy User 1', 'dummy1.aastha@gmail.com', '9999999999', NULL, 1, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, '2021-12-19 13:28:24', '2021-12-19 13:28:24'),
(8, -4, 'AAST999998', 2, 1, 'Dummy User 2', 'dummy2.aastha@gmail.com', '9999999998', NULL, 1, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, '2021-12-19 13:28:24', '2021-12-19 13:28:24'),
(9, -5, 'AAST999997', 2, 1, 'Dummy User 3', 'dummy3.aastha@gmail.com', '9999999997', NULL, 1, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, '2021-12-19 13:28:24', '2021-12-19 13:28:24'),
(10, -6, 'AAST999996', 2, 1, 'Dummy User 4', 'dummu4.aastha@gmail.com', '9999999996', NULL, 1, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, '2021-12-19 13:28:24', '2021-12-19 13:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_name`, `created_at`, `updated_at`) VALUES
(1, 'All Locations', '2021-12-19 12:38:14', '2021-12-19 12:38:14'),
(2, 'Siliguri', '2021-12-19 12:38:14', '2021-12-19 12:38:14'),
(3, 'Malda', '2021-12-19 12:38:14', '2021-12-19 12:38:14'),
(4, 'Mathabhanga', '2021-12-19 12:38:14', '2021-12-19 12:38:14'),
(5, 'Baharampur', '2021-12-19 12:38:14', '2021-12-19 12:38:14'),
(6, 'Guwahati', '2021-12-19 12:38:14', '2021-12-19 12:38:14'),
(7, 'Tezpur', '2021-12-19 12:38:14', '2021-12-19 12:38:14'),
(8, 'Agartala', '2021-12-19 12:38:14', '2021-12-19 12:38:14');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2021_12_14_125318_create_locations_table', 1),
(3, '2021_12_14_125808_create_designations_table', 1),
(4, '2021_12_14_130416_create_roles_table', 1),
(6, '2021_12_14_150717_create_carousels_table', 1),
(8, '2021_12_19_170040_create_relations_table', 1),
(11, '2021_12_19_165151_create_employees_table', 2),
(13, '2021_12_14_141707_create_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relations`
--

INSERT INTO `relations` (`id`, `relation`, `created_at`, `updated_at`) VALUES
(1, 'Self', '2021-12-19 12:27:12', '2021-12-19 12:27:12'),
(2, 'Spouse', '2021-12-19 12:27:12', '2021-12-19 12:27:12'),
(3, 'Parent', '2021-12-19 12:27:12', '2021-12-19 12:27:12'),
(4, 'Relative', '2021-12-19 12:27:12', '2021-12-19 12:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_description`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Super User', 99, '2021-12-19 12:41:33', '2021-12-19 12:41:33'),
(2, 'Admin', 98, '2021-12-19 12:41:33', '2021-12-19 12:41:33'),
(3, 'Back Office', 6, '2021-12-19 12:41:33', '2021-12-19 12:41:33'),
(4, 'Co-Ordinator Level 2', 5, '2021-12-19 12:41:33', '2021-12-19 12:41:33'),
(5, 'Co-Ordinator Level 1', 4, '2021-12-19 12:41:33', '2021-12-19 12:41:33'),
(6, 'Supervisor', 3, '2021-12-19 12:41:33', '2021-12-19 12:41:33'),
(7, 'Telecaller', 2, '2021-12-19 12:41:33', '2021-12-19 12:41:33'),
(8, 'Executive', 1, '2021-12-19 12:41:33', '2021-12-19 12:41:33'),
(9, 'Deactive User', 0, '2021-12-19 12:41:33', '2021-12-19 12:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Dummy',
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `location_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `last_login` datetime DEFAULT NULL,
  `is_logged_in` tinyint(1) NOT NULL DEFAULT 0,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_mobile`, `password`, `user_role`, `is_active`, `location_id`, `last_login`, `is_logged_in`, `emp_id`, `created_at`, `updated_at`) VALUES
(1, 'Partha Debanth', 'partha.aastha@gmail.com', '9832356644', '$2y$10$PcX/Kd5SmzuzXDW3YA7YJOqRcRQT55yPhrl/cfkZ.z5XlFskzrINS', 99, 1, 1, NULL, 0, 'AAST000226', '2021-12-19 18:48:50', '2021-12-19 18:48:50'),
(2, 'Md Alam', 'alam.aastha@gmail.com', '9474407312', '$2y$10$QOvr./5H5ijWoeEBAJ4Wp.dyQdHXrlw90SVWAhK5iJzJO3uDvD0AS', 98, 1, 1, NULL, 0, 'AAST000673', '2021-12-19 18:48:50', '2021-12-19 18:48:50'),
(3, 'Sekh Shanewaz', 'skshanewaz.aastha@gmail.com', '9593901016', '$2y$10$qw30.rh838wo6vaRDpAmmefU6h8wDRuK/AaEsSJO/uf6dCZYAxW7S', 98, 1, 1, NULL, 0, 'AAST000229', '2021-12-19 18:48:51', '2021-12-19 18:48:51'),
(4, 'Pravat Sarkar', 'pravat.aastha@gmail.com', '9563152800', '$2y$10$Yqqqosyu9YotCJAdmDht/uDHy2.9rnxt8HZNGxd/I8ysY75UCOMn2', 6, 1, 2, NULL, 0, 'AAST000227', '2021-12-19 18:48:51', '2021-12-19 18:48:51'),
(5, 'Subrata Sarkar', 'aastha.subrata@gmail.com', '9933671962', '$2y$10$1/9nmzRshcvmuXP45UDg7.ILffOfs8U0A1mMgfqAD5mkWIp6sXnrG', 98, 1, 2, NULL, 0, 'AASTPROP01', '2021-12-19 18:48:51', '2021-12-19 18:48:51'),
(6, 'Koustav Dey', 'koustav.aastha@gmail.com', '9933094870', '$2y$10$ugEu8Se/wQ97Ek.m4mpo9.ACUo/Mj6j7LnzeF/7XjyHjiFKRmOfRW', 98, 1, 2, NULL, 0, 'AASTPROP02', '2021-12-19 18:48:51', '2021-12-19 18:48:51'),
(7, 'Dummy User 1', 'dummy1.aastha@gmail.com', '9999999999', '$2y$10$2QFCJF8Z2tYUCZv551N2fOgWaQZKKDHE.1BfdNIG9Zqrmw3GjtQZm', 0, 0, 2, NULL, 0, 'AAST999999', '2021-12-19 18:48:51', '2021-12-19 18:48:51'),
(8, 'Dummy User 2', 'dummy2.aastha@gmail.com', '9999999998', '$2y$10$IYlirOQLBYzUPJ4ov0ZZX.XOKDUeE3YWH78/kyDIPapv8acZA87Pm', 0, 0, 2, NULL, 0, 'AAST999998', '2021-12-19 18:48:51', '2021-12-19 18:48:51'),
(9, 'Dummy User 3', 'dummy3.aastha@gmail.com', '9999999997', '$2y$10$mpOcWo5md59voZ7SABC53ejxzxyw3FAM/KF/bjtl1sE89DyuBqSbm', 0, 0, 2, NULL, 0, 'AAST999997', '2021-12-19 18:48:51', '2021-12-19 18:48:51'),
(10, 'Dummy User 4', 'dummy4.aastha@gmail.com', '9999999996', '$2y$10$fP5QiJR2VTgtn5ZbyqTK5OLI8OAT7P4qGG/PrdFN8zIPms3el5NOe', 0, 0, 2, NULL, 0, 'AAST999996', '2021-12-19 18:48:51', '2021-12-19 18:48:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_designation_unique` (`designation`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_emp_id_no_unique` (`emp_id_no`),
  ADD UNIQUE KEY `employees_emp_id_unique` (`emp_id`),
  ADD UNIQUE KEY `employees_emp_name_unique` (`emp_name`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locations_location_name_unique` (`location_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `relations_relation_unique` (`relation`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_description_unique` (`role_description`),
  ADD UNIQUE KEY `roles_role_id_unique` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_email_unique` (`user_email`),
  ADD UNIQUE KEY `users_user_mobile_unique` (`user_mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relations`
--
ALTER TABLE `relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
