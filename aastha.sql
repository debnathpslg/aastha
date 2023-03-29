-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 10:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aastha`
--

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `short_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Field Executive', 'FE', NULL, '2023-03-28 18:30:00', '2023-03-28 18:30:00'),
(2, 'Field Supervisor', 'FS', NULL, '2023-03-28 18:30:00', '2023-03-28 18:30:00'),
(3, 'Back Office', 'BO', NULL, '2023-03-28 18:30:00', '2023-03-28 18:30:00'),
(4, 'Office Boy', 'OB', NULL, '2023-03-28 18:30:00', '2023-03-28 18:30:00'),
(5, 'Supervisor', 'SV', NULL, '2023-03-28 18:30:00', '2023-03-28 18:30:00'),
(6, 'Team Leader', 'TL', NULL, '2023-03-28 18:30:00', '2023-03-28 18:30:00'),
(7, 'Driver', 'DR', NULL, '2023-03-28 18:30:00', '2023-03-28 18:30:00'),
(8, 'Runner', 'RU', NULL, '2023-03-28 18:30:00', '2023-03-28 18:30:00'),
(9, 'Telecaller', 'TE', NULL, '2023-03-28 18:30:00', '2023-03-28 18:30:00'),
(10, 'Proprietor', 'PR', NULL, '2023-03-28 18:30:00', '2023-03-28 18:30:00'),
(11, 'Admin Infra', 'AI', NULL, '2023-03-29 18:35:25', '2023-03-29 18:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ifscs`
--

CREATE TABLE `ifscs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ifsc` varchar(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_short_name` varchar(4) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ifscs`
--

INSERT INTO `ifscs` (`id`, `ifsc`, `bank_name`, `bank_short_name`, `branch_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ICIC0000208', 'Icici Bank Ltd.', 'ICIC', 'Siliguri', NULL, '2023-03-28 19:53:21', '2023-03-28 19:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `short_name` varchar(10) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `short_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Siliguri', 'SLG', NULL, '2023-03-26 08:20:58', '2023-03-26 08:20:58'),
(2, 'Malda', 'MLD', NULL, '2023-03-26 08:21:05', '2023-03-26 08:21:05'),
(3, 'Raiganj', 'RGJ', NULL, '2023-03-26 08:21:14', '2023-03-26 08:21:14'),
(4, 'Coochbehar', 'CBR', NULL, '2023-03-26 08:21:19', '2023-03-26 08:21:19'),
(5, 'Baharampur', 'BPR', NULL, '2023-03-26 08:21:25', '2023-03-26 08:21:25'),
(6, 'Guwahati', 'GHY', NULL, '2023-03-26 08:21:33', '2023-03-26 08:21:33'),
(7, 'Tezpur', 'TZP', NULL, '2023-03-26 08:21:38', '2023-03-26 08:21:38'),
(8, 'Agartala', 'AGT', NULL, '2023-03-26 08:21:44', '2023-03-26 08:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_03_25_000000_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2023_03_26_022921_create_recent_activities_table', 2),
(11, '2023_03_26_133120_create_locations_table', 3),
(12, '2023_03_26_133433_create_user_locations_table', 3),
(14, '2023_03_28_230447_create_work_statuses_table', 4),
(15, '2023_03_28_230510_create_relationships_table', 4),
(16, '2023_03_29_004008_create_ifscs_table', 4),
(18, '2023_03_28_230420_create_designations_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recent_activities`
--

CREATE TABLE `recent_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `component` varchar(255) NOT NULL,
  `bs_colour` varchar(255) NOT NULL DEFAULT 'primary',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recent_activities`
--

INSERT INTO `recent_activities` (`id`, `user_id`, `title`, `content`, `component`, `bs_colour`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 1, 'User Deactivation', 'Partha Debnath deactivated Md Alam', 'USER', 'danger', NULL, '2023-03-27 18:00:00', '2023-03-27 18:00:00'),
(9, 1, 'User Activation', 'Partha Debnath activated Md Alam', 'USER', 'primary', NULL, '2023-03-27 18:00:12', '2023-03-27 18:00:12'),
(10, 1, 'User Creation', 'Partha Debnath created Dhanesh Barman with default password.', 'USER', 'success', NULL, '2023-03-27 19:12:21', '2023-03-27 19:12:21'),
(11, 1, 'User Creation', 'Partha Debnath created Pappu Khan with default password.', 'USER', 'success', NULL, '2023-03-27 19:14:19', '2023-03-27 19:14:19'),
(12, 1, 'User Creation', 'Partha Debnath created Pankaj Nath with default password.', 'USER', 'success', NULL, '2023-03-27 19:14:55', '2023-03-27 19:14:55'),
(13, 1, 'User Creation', 'Partha Debnath created Uma Das with default password.', 'USER', 'success', NULL, '2023-03-27 19:15:34', '2023-03-27 19:15:34'),
(14, 1, 'User Creation', 'Partha Debnath created Hillol Barman with default password.', 'USER', 'success', NULL, '2023-03-27 19:16:53', '2023-03-27 19:16:53'),
(15, 1, 'User Creation', 'Partha Debnath created Biswajit Barman with default password.', 'USER', 'success', NULL, '2023-03-27 19:17:19', '2023-03-27 19:17:19'),
(16, 1, 'User Creation', 'Partha Debnath created Abhijit Paul with default password.', 'USER', 'success', NULL, '2023-03-27 19:18:25', '2023-03-27 19:18:25'),
(17, 1, 'User Creation', 'Partha Debnath created Pravat Sarkar with default password.', 'USER', 'success', NULL, '2023-03-27 19:19:00', '2023-03-27 19:19:00'),
(18, 1, 'User Creation', 'Partha Debnath created Pallavi Chakraborty with default password.', 'USER', 'success', NULL, '2023-03-27 19:20:13', '2023-03-27 19:20:13'),
(19, 1, 'User Creation', 'Partha Debnath created Madhumita Majumder with default password.', 'USER', 'success', NULL, '2023-03-27 19:21:19', '2023-03-27 19:21:19'),
(20, 1, 'User Creation', 'Partha Debnath created Krishna Paul with default password.', 'USER', 'success', NULL, '2023-03-27 19:25:41', '2023-03-27 19:25:41'),
(21, 1, 'User Creation', 'Partha Debnath created Nayan Sarkar with default password.', 'USER', 'success', NULL, '2023-03-27 19:29:42', '2023-03-27 19:29:42'),
(22, 1, 'User Creation', 'Partha Debnath created Banashree Aich with default password.', 'USER', 'success', NULL, '2023-03-27 19:30:41', '2023-03-27 19:30:41'),
(23, 1, 'User Creation', 'Partha Debnath created Sujata Mitra with default password.', 'USER', 'success', NULL, '2023-03-27 19:32:24', '2023-03-27 19:32:24'),
(24, 1, 'User Creation', 'Partha Debnath created Kazi Shoidul Islam with default password.', 'USER', 'success', NULL, '2023-03-27 19:32:59', '2023-03-27 19:32:59'),
(25, 1, 'User Creation', 'Partha Debnath created Adwaita Biswas with default password.', 'USER', 'success', NULL, '2023-03-27 19:33:21', '2023-03-27 19:33:21'),
(26, 1, 'User Creation', 'Partha Debnath created Subrata Sarkar with default password.', 'USER', 'success', NULL, '2023-03-27 19:34:16', '2023-03-27 19:34:16'),
(27, 1, 'User Creation', 'Partha Debnath created Biswajit Saha with default password.', 'USER', 'success', NULL, '2023-03-27 19:37:24', '2023-03-27 19:37:24'),
(28, 1, 'User Creation', 'Partha Debnath created Koustav Dey with default password.', 'USER', 'success', NULL, '2023-03-27 19:37:51', '2023-03-27 19:37:51'),
(29, 1, 'User Deactivation', 'Partha Debnath deactivated Subrata Sarkar', 'USER', 'danger', NULL, '2023-03-27 19:39:03', '2023-03-27 19:39:03'),
(30, 1, 'User Activation', 'Partha Debnath activated Subrata Sarkar', 'USER', 'primary', NULL, '2023-03-27 19:39:19', '2023-03-27 19:39:19'),
(31, 1, 'User Alteration', 'Partha Debnath altered Md Alam', 'USER', 'primary', NULL, '2023-03-27 20:29:54', '2023-03-27 20:29:54'),
(32, 1, 'User Alteration', 'Partha Debnath altered Md Alam', 'USER', 'primary', NULL, '2023-03-27 20:30:09', '2023-03-27 20:30:09'),
(33, 1, 'User Creation', 'Partha Debnath created Manish Mandal with default password.', 'USER', 'success', NULL, '2023-03-27 20:31:14', '2023-03-27 20:31:14'),
(34, 1, 'User Deactivation', 'Partha Debnath deactivated Uma Das', 'USER', 'danger', NULL, '2023-03-28 12:16:47', '2023-03-28 12:16:47'),
(35, 1, 'User Activation', 'Partha Debnath activated Uma Das', 'USER', 'primary', NULL, '2023-03-28 12:17:37', '2023-03-28 12:17:37'),
(36, 1, 'User Deactivation', 'Partha Debnath deactivated Banashree Aich', 'USER', 'danger', NULL, '2023-03-28 15:56:26', '2023-03-28 15:56:26'),
(37, 1, 'User Activation', 'Partha Debnath activated Banashree Aich', 'USER', 'primary', NULL, '2023-03-28 15:56:36', '2023-03-28 15:56:36'),
(38, 1, 'User Deactivation', 'Partha Debnath deactivated Biswajit Saha', 'USER', 'danger', NULL, '2023-03-28 16:04:03', '2023-03-28 16:04:03'),
(39, 1, 'User Activation', 'Partha Debnath activated Biswajit Saha', 'USER', 'primary', NULL, '2023-03-28 16:04:12', '2023-03-28 16:04:12'),
(40, 1, 'User Deactivation', 'Partha Debnath deactivated Abhijit Paul', 'USER', 'danger', NULL, '2023-03-28 16:05:25', '2023-03-28 16:05:25'),
(41, 1, 'User Activation', 'Partha Debnath activated Abhijit Paul', 'USER', 'primary', NULL, '2023-03-28 16:05:32', '2023-03-28 16:05:32'),
(42, 1, 'User Deactivation', 'Partha Debnath deactivated Kazi Shoidul Islam', 'USER', 'danger', NULL, '2023-03-29 07:58:04', '2023-03-29 07:58:04'),
(43, 1, 'User Activation', 'Partha Debnath activated Kazi Shoidul Islam', 'USER', 'primary', NULL, '2023-03-29 07:58:55', '2023-03-29 07:58:55'),
(44, 1, 'User Deactivation', 'Partha Debnath deactivated Banashree Aich', 'USER', 'danger', NULL, '2023-03-29 20:11:07', '2023-03-29 20:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE `relationships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Self', NULL, '2023-03-28 19:40:36', '2023-03-28 19:40:36'),
(2, 'Parent', NULL, '2023-03-28 19:54:28', '2023-03-28 19:54:28'),
(3, 'Spouse', NULL, '2023-03-28 19:54:28', '2023-03-28 19:54:28'),
(4, 'Joint', NULL, '2023-03-28 19:54:28', '2023-03-28 19:54:28'),
(5, 'Sibling', NULL, '2023-03-28 19:54:28', '2023-03-28 19:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `short_name` varchar(10) NOT NULL,
  `is_touchable` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `short_name`, `is_touchable`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super User', 'SU', 0, NULL, '2023-03-25 19:23:45', '2023-03-25 19:23:45'),
(2, 'Admin', 'AD', 1, NULL, '2023-03-25 19:32:50', '2023-03-25 19:32:50'),
(3, 'Guest', 'GU', 1, NULL, '2023-03-25 19:32:50', '2023-03-25 19:32:50'),
(4, 'Team Leader', 'TL', 1, NULL, '2023-03-25 19:33:55', '2023-03-25 19:33:55'),
(5, 'Back Office', 'BO', 1, NULL, '2023-03-25 19:33:55', '2023-03-25 19:33:55'),
(6, 'Supervisor', 'SV', 1, NULL, '2023-03-25 19:35:07', '2023-03-25 19:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Partha Debnath', 'partha.aastha@gmail.com', '2023-03-25 19:24:35', '$2y$10$ybWU/773TSr438i5u9FJVuTZLjv6.eeWmnlUdTbViQ1YujfhNtrwS', 1, NULL, NULL, '2023-03-25 19:24:35', '2023-03-28 16:31:58'),
(2, 'Md Alam', 'alam.aastha@gmail.com', '2023-03-25 19:40:44', '$2y$10$4GSg9kunmzVj5yVdowDXkOFLYisUTAfHzQ/OjKMBlki.FPpsbf9Hy', 2, NULL, NULL, '2023-03-25 19:40:44', '2023-03-27 20:30:09'),
(4, 'Dhanesh Barman', 'aastha.dhanesh@gmail.com', '2023-03-27 19:25:58', '$2y$10$N0ReuIOi2khu8rrVu6yOqud.KL/R3XaS2eJXhi0F6PhV2xgdW.QfW', 5, NULL, NULL, '2023-03-27 19:12:21', '2023-03-27 19:12:21'),
(5, 'Pappu Khan', 'khan.aastha21@gmail.com', '2023-03-27 18:30:00', '$2y$10$bS1ZA46ri.jVBk8PkPdVnO0W5vycYgJUxw0vlBsqE5069NJrV1KIa', 5, NULL, NULL, '2023-03-27 19:14:19', '2023-03-27 19:14:19'),
(6, 'Pankaj Nath', 'pankajnath.aastha@gmail.com', '2023-03-27 19:27:14', '$2y$10$3B11LIhPtq0I5DA8TPrx2ukrCmhDDH2rlLrEFkimd2nKepblHMfo.', 5, NULL, NULL, '2023-03-27 19:14:55', '2023-03-27 19:14:55'),
(7, 'Uma Das', 'uma.aastha@gmail.com', '2023-03-27 19:27:40', '$2y$10$/.FFkkRi8OXL4ggWe8u/IelEevlfa0DLLmV9L1QEsuBiMTY.4DETy', 6, NULL, NULL, '2023-03-27 19:15:34', '2023-03-28 12:17:37'),
(8, 'Hillol Barman', 'hillol.mtb@gmail.com', '2023-03-27 18:30:00', '$2y$10$71NLLnpAxQfa.4.0pma7SeA6sVIYHUCk2qf7ElWilNYpw8KYCgTAG', 5, NULL, NULL, '2023-03-27 19:16:53', '2023-03-27 19:16:53'),
(9, 'Biswajit Barman', 'biswajit.aastha45@gmail.com', '2023-03-27 19:28:03', '$2y$10$7wYAmUH3dB9J5SuXOQo2Tuv63FYhPj8q3gn0.QWYRWWJbx.Ic7f8C', 6, NULL, NULL, '2023-03-27 19:17:19', '2023-03-27 19:17:19'),
(10, 'Abhijit Paul', 'avijit.aastha@gmail.com', '2023-03-27 19:28:19', '$2y$10$OIW/KRHutzOPwpGlrXpvx.fDx2D.preL/4aBCyZakWeiEzDU2WLEy', 6, NULL, NULL, '2023-03-27 19:18:25', '2023-03-28 16:05:32'),
(11, 'Pravat Sarkar', 'pravat.aastha@gmail.com', '2023-03-27 19:28:36', '$2y$10$ZnhmxHBRao8mTWu312qKwOjY3kQcNUsQOuh89IQeeYP2e02quZ0.u', 5, NULL, NULL, '2023-03-27 19:19:00', '2023-03-28 16:54:45'),
(12, 'Pallavi Chakraborty', 'pallavi.aastha02@gmail.com', '2023-03-27 19:28:48', '$2y$10$4Cg9gyu.hWaFogVWxNmfP.ofCSwPus1xnoCuHMvQOQkl6/Y9UXsc.', 6, NULL, NULL, '2023-03-27 19:20:13', '2023-03-27 19:20:13'),
(13, 'Madhumita Majumder', 'madhumita.majumder1234@gmail.com', '2023-03-27 19:29:00', '$2y$10$juPx.BfKgNBUV4VKFSexPuxmraxnopHiJhvvF/LKK3T3NzDqkMvnK', 6, NULL, NULL, '2023-03-27 19:21:19', '2023-03-27 19:21:19'),
(14, 'Krishna Paul', 'krishnapaulkp3@gmail.com', '2023-03-27 19:25:41', '$2y$10$yru2IFr1La2E6SoiNa/ZlOu9j46JMqPh336ymVoMY8w2LD.o0eXAa', 5, NULL, NULL, '2023-03-27 19:25:41', '2023-03-27 19:25:41'),
(15, 'Nayan Sarkar', 'sarkar.sarkar.nayan@gmail.com', '2023-03-27 19:29:42', '$2y$10$UdmznrcUzuJzJZdJQJP80uXLyPvk0UG4vsoGMhvDorxBfmEs6AD2q', 5, NULL, NULL, '2023-03-27 19:29:42', '2023-03-27 19:29:42'),
(16, 'Banashree Aich', 'banashree.aastha07@gmail.com', '2023-03-27 19:30:41', '$2y$10$.v8h85hlegb29Me2Ct94hOlhhraHk6EMeoEGX4L9nVEGIkdyk23qq', 6, NULL, '2023-03-29 20:11:07', '2023-03-27 19:30:41', '2023-03-29 20:11:07'),
(17, 'Sujata Mitra', 'sujatamitra.aastha@gmail.com', '2023-03-27 19:32:24', '$2y$10$uMjBc/SLl5HfahjJIuQ5L.SB/A3gQ9EBlNaHV10cTRaU5l6OGsmmW', 6, NULL, NULL, '2023-03-27 19:32:24', '2023-03-27 19:32:24'),
(18, 'Kazi Shoidul Islam', 'kaziaastha@gmail.com', '2023-03-27 19:32:59', '$2y$10$lVBGT//3hTWwZMB9mvF1FOR7RYv88OU0HO.OSgQgauMhrpyHbm4Tq', 5, NULL, NULL, '2023-03-27 19:32:59', '2023-03-29 07:58:55'),
(19, 'Adwaita Biswas', 'adwaita121@gmail.com', '2023-03-27 19:33:21', '$2y$10$5FMhrL/ZMWcCNZp/dZdytOVkdhhyPddEqCng.nS1rARMjSNqJdrCK', 6, NULL, NULL, '2023-03-27 19:33:21', '2023-03-27 19:33:21'),
(20, 'Subrata Sarkar', 'aastha.subrata@gmail.com', '2023-03-27 19:34:16', '$2y$10$Sw.AsidlWS9HXt9.q0O08.JjGAW8pgV0OL3iOwsVDFxVQfwx.VG6a', 3, NULL, NULL, '2023-03-27 19:34:16', '2023-03-27 19:39:19'),
(21, 'Biswajit Saha', 'aastha.biswa@gmail.com', '2023-03-27 19:37:24', '$2y$10$MWw/KbksyVG59P670no4k.eHgC2gEOEeJB52NIGd2CPPyfD3HIe9m', 3, NULL, NULL, '2023-03-27 19:37:24', '2023-03-28 16:04:12'),
(22, 'Koustav Dey', 'koustav.aastha@gmail.com', '2023-03-27 19:37:51', '$2y$10$Bv7yWii/aukUjNxm84qVK.5dMQBfBMy689KIUqyGYlh5vc7/dEZ/2', 3, NULL, NULL, '2023-03-27 19:37:51', '2023-03-27 19:37:51'),
(23, 'Manish Mandal', 'manish.accouts@gmail.com', '2023-03-27 20:31:14', '$2y$10$9y57bZoCf4TptToU1o4.DOB86MaC0PlWFWJyefdP/EF.8nQyRDkIK', 2, NULL, NULL, '2023-03-27 20:31:14', '2023-03-27 20:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_locations`
--

CREATE TABLE `user_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_locations`
--

INSERT INTO `user_locations` (`id`, `user_id`, `location_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-03-26 08:23:04', '2023-03-26 08:23:04'),
(2, 1, 2, '2023-03-26 08:23:04', '2023-03-26 08:23:04'),
(3, 1, 3, '2023-03-26 08:23:04', '2023-03-26 08:23:04'),
(4, 1, 4, '2023-03-26 08:23:04', '2023-03-26 08:23:04'),
(5, 1, 5, '2023-03-26 08:23:04', '2023-03-26 08:23:04'),
(6, 1, 6, '2023-03-26 08:23:04', '2023-03-26 08:23:04'),
(7, 1, 7, '2023-03-26 08:23:04', '2023-03-26 08:23:04'),
(8, 1, 8, '2023-03-26 08:23:04', '2023-03-26 08:23:04'),
(16, 2, 8, '2023-03-26 08:23:27', '2023-03-26 08:23:27'),
(17, 2, 1, '2023-03-27 18:01:30', '2023-03-27 18:01:30'),
(18, 4, 8, '2023-03-27 19:12:21', '2023-03-27 19:12:21'),
(19, 5, 6, '2023-03-27 19:14:19', '2023-03-27 19:14:19'),
(20, 5, 7, '2023-03-27 19:14:19', '2023-03-27 19:14:19'),
(21, 6, 6, '2023-03-27 19:14:55', '2023-03-27 19:14:55'),
(22, 6, 7, '2023-03-27 19:14:55', '2023-03-27 19:14:55'),
(23, 7, 8, '2023-03-27 19:15:34', '2023-03-27 19:15:34'),
(24, 7, 6, '2023-03-27 19:15:34', '2023-03-27 19:15:34'),
(25, 7, 7, '2023-03-27 19:15:34', '2023-03-27 19:15:34'),
(26, 8, 4, '2023-03-27 19:16:53', '2023-03-27 19:16:53'),
(27, 9, 4, '2023-03-27 19:17:19', '2023-03-27 19:17:19'),
(28, 10, 4, '2023-03-27 19:18:25', '2023-03-27 19:18:25'),
(29, 11, 1, '2023-03-27 19:19:00', '2023-03-27 19:19:00'),
(30, 12, 1, '2023-03-27 19:20:13', '2023-03-27 19:20:13'),
(31, 13, 1, '2023-03-27 19:21:19', '2023-03-27 19:21:19'),
(32, 14, 3, '2023-03-27 19:25:41', '2023-03-27 19:25:41'),
(33, 15, 2, '2023-03-27 19:29:42', '2023-03-27 19:29:42'),
(34, 16, 2, '2023-03-27 19:30:41', '2023-03-27 19:30:41'),
(35, 17, 4, '2023-03-27 19:32:24', '2023-03-27 19:32:24'),
(36, 17, 2, '2023-03-27 19:32:24', '2023-03-27 19:32:24'),
(37, 17, 1, '2023-03-27 19:32:24', '2023-03-27 19:32:24'),
(38, 18, 5, '2023-03-27 19:32:59', '2023-03-27 19:32:59'),
(39, 19, 5, '2023-03-27 19:33:21', '2023-03-27 19:33:21'),
(40, 20, 8, '2023-03-27 19:34:16', '2023-03-27 19:34:16'),
(41, 20, 5, '2023-03-27 19:34:16', '2023-03-27 19:34:16'),
(42, 20, 4, '2023-03-27 19:34:16', '2023-03-27 19:34:16'),
(43, 20, 6, '2023-03-27 19:34:16', '2023-03-27 19:34:16'),
(44, 20, 2, '2023-03-27 19:34:16', '2023-03-27 19:34:16'),
(45, 20, 3, '2023-03-27 19:34:16', '2023-03-27 19:34:16'),
(46, 20, 1, '2023-03-27 19:34:16', '2023-03-27 19:34:16'),
(47, 20, 7, '2023-03-27 19:34:16', '2023-03-27 19:34:16'),
(48, 21, 8, '2023-03-27 19:37:24', '2023-03-27 19:37:24'),
(49, 21, 6, '2023-03-27 19:37:24', '2023-03-27 19:37:24'),
(50, 21, 7, '2023-03-27 19:37:24', '2023-03-27 19:37:24'),
(51, 22, 8, '2023-03-27 19:37:51', '2023-03-27 19:37:51'),
(52, 22, 5, '2023-03-27 19:37:51', '2023-03-27 19:37:51'),
(53, 22, 4, '2023-03-27 19:37:51', '2023-03-27 19:37:51'),
(54, 22, 6, '2023-03-27 19:37:51', '2023-03-27 19:37:51'),
(55, 22, 2, '2023-03-27 19:37:51', '2023-03-27 19:37:51'),
(56, 22, 3, '2023-03-27 19:37:51', '2023-03-27 19:37:51'),
(57, 22, 1, '2023-03-27 19:37:51', '2023-03-27 19:37:51'),
(58, 22, 7, '2023-03-27 19:37:51', '2023-03-27 19:37:51'),
(59, 2, 5, '2023-03-27 20:29:54', '2023-03-27 20:29:54'),
(60, 2, 4, '2023-03-27 20:29:54', '2023-03-27 20:29:54'),
(61, 2, 6, '2023-03-27 20:29:54', '2023-03-27 20:29:54'),
(62, 2, 2, '2023-03-27 20:29:54', '2023-03-27 20:29:54'),
(63, 2, 3, '2023-03-27 20:29:54', '2023-03-27 20:29:54'),
(64, 2, 7, '2023-03-27 20:29:54', '2023-03-27 20:29:54'),
(65, 23, 8, '2023-03-27 20:31:14', '2023-03-27 20:31:14'),
(66, 23, 5, '2023-03-27 20:31:14', '2023-03-27 20:31:14'),
(67, 23, 4, '2023-03-27 20:31:14', '2023-03-27 20:31:14'),
(68, 23, 6, '2023-03-27 20:31:14', '2023-03-27 20:31:14'),
(69, 23, 2, '2023-03-27 20:31:14', '2023-03-27 20:31:14'),
(70, 23, 3, '2023-03-27 20:31:14', '2023-03-27 20:31:14'),
(71, 23, 1, '2023-03-27 20:31:14', '2023-03-27 20:31:14'),
(72, 23, 7, '2023-03-27 20:31:14', '2023-03-27 20:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `work_statuses`
--

CREATE TABLE `work_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `short_name` varchar(10) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_statuses`
--

INSERT INTO `work_statuses` (`id`, `name`, `short_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Active', 'ACT', NULL, '2023-03-28 19:56:39', '2023-03-28 19:56:39'),
(2, 'Terminated', 'TER', NULL, '2023-03-28 19:56:39', '2023-03-28 19:56:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`),
  ADD UNIQUE KEY `designations_short_name_unique` (`short_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ifscs`
--
ALTER TABLE `ifscs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ifscs_ifsc_unique` (`ifsc`),
  ADD KEY `ifscs_bank_name_index` (`bank_name`),
  ADD KEY `ifscs_bank_short_name_index` (`bank_short_name`),
  ADD KEY `ifscs_branch_name_index` (`branch_name`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locations_name_unique` (`name`),
  ADD UNIQUE KEY `locations_short_name_unique` (`short_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `recent_activities`
--
ALTER TABLE `recent_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recent_activities_user_id_foreign` (`user_id`),
  ADD KEY `recent_activities_component_index` (`component`);

--
-- Indexes for table `relationships`
--
ALTER TABLE `relationships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `relationships_name_unique` (`name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_short_name_unique` (`short_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `1` (`role_id`),
  ADD KEY `users_name_index` (`name`);

--
-- Indexes for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_locations_user_id_foreign` (`user_id`),
  ADD KEY `user_locations_location_id_foreign` (`location_id`);

--
-- Indexes for table `work_statuses`
--
ALTER TABLE `work_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `work_statuses_name_unique` (`name`),
  ADD UNIQUE KEY `work_statuses_short_name_unique` (`short_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ifscs`
--
ALTER TABLE `ifscs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recent_activities`
--
ALTER TABLE `recent_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `relationships`
--
ALTER TABLE `relationships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_locations`
--
ALTER TABLE `user_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `work_statuses`
--
ALTER TABLE `work_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recent_activities`
--
ALTER TABLE `recent_activities`
  ADD CONSTRAINT `recent_activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD CONSTRAINT `user_locations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `user_locations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
