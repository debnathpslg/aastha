SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
