-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 09:49 PM
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
(1, '1.png', '2021-12-20 13:43:10', '2021-12-20 13:43:10'),
(2, '2.png', '2021-12-20 13:43:10', '2021-12-20 13:43:10'),
(3, '3.png', '2021-12-20 13:43:10', '2021-12-20 13:43:10'),
(4, '4.png', '2021-12-20 13:43:10', '2021-12-20 13:43:10'),
(5, '5.png', '2021-12-20 13:43:10', '2021-12-20 13:43:10'),
(6, '6.png', '2021-12-20 13:43:10', '2021-12-20 13:43:10'),
(7, '7.png', '2021-12-20 13:43:10', '2021-12-20 13:43:10'),
(8, '8.png', '2021-12-20 13:43:10', '2021-12-20 13:43:10'),
(9, '9.png', '2021-12-20 13:43:10', '2021-12-20 13:43:10'),
(10, '10.png', '2021-12-20 13:43:10', '2021-12-20 13:43:10');

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
(1, 'Back Office', '2021-12-20 13:43:22', '2021-12-20 13:43:22'),
(2, 'Runner', '2021-12-20 13:43:22', '2021-12-20 13:43:22'),
(3, 'Driver', '2021-12-20 13:43:22', '2021-12-20 13:43:22'),
(4, 'Supervisor', '2021-12-20 13:43:22', '2021-12-20 13:43:22'),
(5, 'Field Supervisor', '2021-12-20 13:43:22', '2021-12-20 13:43:22'),
(6, 'Field Executive', '2021-12-20 13:43:22', '2021-12-20 13:43:22'),
(7, 'Telecaller', '2021-12-20 13:43:22', '2021-12-20 13:43:22'),
(8, '9+ Caller', '2021-12-20 13:43:22', '2021-12-20 13:43:22');

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
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `sal_type` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `joined_on` datetime DEFAULT NULL,
  `left_on` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_id_no`, `emp_id`, `emp_location`, `emp_designation`, `emp_name`, `emp_email`, `emp_mobile`, `emp_ac_holder_name`, `emp_relation`, `emp_account_no`, `emp_bank_name`, `emp_bank_branch`, `emp_bank_ifsc`, `is_active`, `is_deleted`, `sal_type`, `joined_on`, `left_on`, `created_at`, `updated_at`) VALUES
(1, -1, 'AASTPROP01', 2, 9, 'Subrata Sarkar', 'aastha.subrata@gmail.com', '9933671962', 'Subrata Sarkar', 1, '', '', '', '', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, -2, 'AASTPROP02', 2, 9, 'Koustav Dey', 'koustav.aastha@gmail.com', '9933094870', 'Koustav Dey', 1, '', '', '', '', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, -3, 'AASTPROP03', 2, 9, 'Biswajit Saha', 'aastha.biswa@gmail.com', '9654853033', 'Biswajit Saha', 1, '', '', '', '', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 13, 'AAST000013', 5, 6, 'Hasibur Mandal', 'hasibulmondol66@gmail.com', '9732685581', 'Hasibur Mondal', 1, '\'59130356814', 'Allahabad Bank', 'Banjetia', 'IDIB000B619', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 16, 'AAST000016', 5, 6, 'Indrajit Das', 'indrajitdas778@gmail.com', '9735781548', 'Indrajit Das', 1, '\'30956623049', 'State Bank Of India', 'Lalgola', 'SBIN0008006', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 22, 'AAST000022', 5, 6, 'Kazi Shaidul Islam', 'kaziaastha@gmail.com', '7432088950', 'Kazi Shaidul Islam', 1, '\'59134275625', 'Allahabad Bank', 'Banjetia', 'IDIB000B619', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 26, 'AAST000026', 5, 6, 'Nur Selim', 'nursalim7699@gmail.com', '8208805366', 'Nur Salim', 1, '\'37021186850', 'State Bank Of India', 'Alugram', 'SBIN0008558', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 38, 'AAST000038', 5, 6, 'Adwaita Biswas', 'adwaita121@gmail.com', '9734428999', 'Adwaita Biswas', 1, '\'50160015254342', 'Bandhan Bank', 'Dubopara', 'BDBL0001691', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 41, 'AAST000041', 5, 4, 'Baby Sarkey', 'aastha.babysarkey8@gmail.com', '8158871934', 'Baby Sarkey', 3, '\'33404166838', 'State Bank Of India', 'Hasimara', 'SBIN0001447', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 43, 'AAST000043', 5, 7, 'Punam Sarkar', 'punam.sarkaraastha96@gmail.com', '8167503464', 'Punam Sarkar', 1, '\'20351420017', 'State Bank Of India', 'Siliguri Town', 'SBIN0016772', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 47, 'AAST000047', 7, 1, 'Kartik Deb', '', '9382487488', 'Kartik Deb', 1, '\'436010110007889', 'Bank Of India', 'Kaliyaganj', 'BKID0004360', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 49, 'AAST000049', 6, 1, 'Sajid Ali', '', '9706779471', 'Sajid Ali', 1, '\'0291010325172', 'Punjab National Bank', 'Morigaon', 'PUNB0217510', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 55, 'AAST000055', 6, 6, 'Abhijit Hazarika', 'abhijithazarika246@gmail.com', '6001440320', 'Abhijit Hazarika', 1, '\'32332988846', 'State Bank Of India', 'Haiborgaon', 'SBIN0005462', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 58, 'AAST000058', 6, 6, 'Ashadul Islam', 'ashadulislam17247@gmail.com', '7002006157', 'Ashadul Islam', 1, '\'32254132394', 'State Bank Of India', 'Bechamari', 'SBIN0009624', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 60, 'AAST000060', 6, 6, 'Biplab Mandal Ghy', 'biplabm910@gmail.com', '6001417696', 'Biplab Mandal Ghy', 1, '\'33927540790', 'State Bank Of India', 'Hojai', 'SBIN0002065', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 61, 'AAST000061', 6, 6, 'Dildar Hussain 1', 'dildarkhan1984@gmail.com', '9706723617', 'Dildar Hussain 1', 1, '\'30604246130', 'State Bank Of India', 'Khutikatia Adb', 'SBIN0005914', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 63, 'AAST000063', 6, 6, 'Dipu Moni Saikia', 'saikiadipumoni7@gmail.com', '7576828891', 'Dipumoni Saikia', 1, '\'38156564774', 'State Bank Of India', 'Tinali Bazar', 'SBIN0008406', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 65, 'AAST000065', 6, 6, 'Fakar Uddin 1', 'fakaruddin04008@gmail.com', '8135943218', 'Fakar Uddin', 1, '\'34365385629', 'State Bank Of India', 'Dhing', 'SBIN0002050', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 67, 'AAST000067', 6, 6, 'Hamidur Rahman', 'rahmanhamidur94@gmail.com', '7635868175', 'Hamidur Rahman', 3, '\'11806340269', 'State Bank Of India', 'Samaguri', 'SBIN0002119', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 69, 'AAST000069', 6, 6, 'Hedaytul Islam', 'aastha.hedaytul52@gmail.com', '8638383926', 'Hedaytul Islam', 1, '\'0033010420402', 'Punjab National Bank', 'Moirabari', 'PUNB0003320', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 70, 'AAST000070', 6, 6, 'Hifjur Rahman', 'munnaahmed62828@gmail.com', '8876414187', 'Hifjur Rahman', 1, '\'39086121416', 'State Bank Of India', 'Morigaon', 'SBIN0006309', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 73, 'AAST000073', 6, 6, 'Jakariya Ahmed Laskar', 'jakariahmedlaskar@gmail.com', '8471870524', 'Jakaria Ahmed Laskar', 1, '\'31817370713', 'State Bank Of India', 'Sonapur', 'SBIN0011616', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 74, 'AAST000074', 6, 6, 'Juginder Singha', 'singhajugin@gamil.com', '9365001464', 'Jugindra Singha', 1, '\'31176249445', 'State Bank Of India', 'Lanka', 'SBIN0009144', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 75, 'AAST000075', 6, 6, 'Jun Hazarika', 'junbebejia@gmail.com', '9854042104', 'Jun Hazarika', 1, '\'0635010102740', 'Punjab National Bank', 'Bebejia', 'PUNB0063520', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 77, 'AAST000077', 6, 6, 'Lakhya Jyoti Bora', 'boralakhya03@gmail.com', '9957346939', 'Lakhya Jyoti Bora', 1, '\'0373000400086832', 'Punjab National Bank', 'Nagaon', 'PUNB0037300', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 79, 'AAST000079', 6, 6, 'Manash Jyoti Boruah', 'akasmikamanashjyoti@gmail.com', '8472043680', 'Manas Jyoti Boruah', 4, '\'36048094680', 'State Bank Of India', 'Nagaon', 'SBIN0000146', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 80, 'AAST000080', 6, 6, 'Manjur Alam', 'sanjudil13@gmail.com', '8724035254', 'Manjur Alam', 1, '\'0805010202602', 'Punjab National Bank', 'Bhurbandha', 'PUNB0080520', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 81, 'AAST000081', 6, 6, 'Masum Md Abu Naser', 'masum.nasernagaon@gmail.com', '9954276421', 'Masum Md Abu Naser', 1, '\'1153101006019', 'Canara Bank', 'Nagaon', 'CNRB0001153', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 83, 'AAST000083', 6, 6, 'Imdadul Hussain', 'imdadulhussainimdadulhussain@gmail.com', '9678056540', 'Imdadul Hussain', 1, '\'3862619359', 'Central Bank Of India', 'Morigaon', 'CBIN0284215', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 84, 'AAST000084', 6, 6, 'Md Khalid', 'khalid.ka912@gmail.com', '9678464829', 'Abul Hasnat Md Khalid Ahmed', 1, '\'10965247641', 'State Bank Of India', 'Nagaon', 'SBIN0000146', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 86, 'AAST000086', 6, 6, 'Mehdi Alam', 'bubukhan860@gmail.com', '8638658522', 'Mehdhi Alam', 1, '\'1347011135932', 'Punjab National Bank', 'Jajari', 'PUNB0134720', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 87, 'AAST000087', 6, 6, 'Minnatul Islam', 'minnat1988@gmail.com', '9101396252', 'Minnatul Islam', 3, '\'0373001700087075', 'Punjab National Bank', 'Nowgong', 'PUNB0037300', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 89, 'AAST000089', 6, 6, 'Mintu Das', 'mintudasasam@gmail.com', '7002969271', 'Mintu Das', 1, '\'105601555752', 'Icici Bank', 'Salt Lake', 'ICIC0001056', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 90, 'AAST000090', 6, 6, 'Nasib Deka', 'nasibdeka889@gmail.com', '9678104187', 'Nasib Deka', 1, '\'39504052992', 'State Bank Of India', 'Sonapur', 'SBIN0011616', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 91, 'AAST000091', 6, 6, 'Nilkamal Borah', 'nilkamalborahnamati1@gmail.com', '9435002566', 'Nilkamal Bora', 1, '\'32698287956', 'State Bank Of India', 'Nagaon', 'SBIN0000146', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 93, 'AAST000093', 6, 6, 'Papu Ghosh', 'papughosh573@gmail.com', '6900677363', 'Papu Ghosh', 1, '\'32870862318', 'State Bank Of India', 'Samaguri', 'SBIN0002119', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 94, 'AAST000094', 6, 6, 'Rabi Chetri', 'chetrirabi@gmail.com', '9085459108', 'Rabi Chetri', 3, '\'11806324882', 'State Bank Of India', 'Samaguri', 'SBIN0002119', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 95, 'AAST000095', 6, 6, 'Rashidul Hoque', 'hoquer084@gmail.com', '8638089339', 'Rashidul Hoque', 1, '\'35582171075', 'State Bank Of India', 'Samaguri', 'SBIN0002119', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 97, 'AAST000097', 6, 6, 'Rupak Das', 'rupak.das2022@gmail.com', '9706786452', 'Rupak Das', 2, '\'20117065540', 'Fino Bank', 'Guwahati', 'FINO0001001', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 107, 'AAST000107', 6, 4, 'Uma Das', 'uma.aastha@gmail.com', '9378091810', 'Uma Das', 1, '\'37965346755', 'State Bank Of India', 'Siliguri Town', 'SBIN0016772', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 109, 'AAST000109', 3, 6, 'Aktar Hussain', 'aktarhossain218@gmail.com ', '9733881186', 'Aktar Hossain', 1, '\'4408101001805', 'Canara Bank', 'Chanchal', 'CNRB0004408', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 113, 'AAST000113', 3, 1, 'Krishna Paul', 'krishnapaulkp3@gmail.com', '7908051627', 'Krishna Paul', 1, '\'549502010006503', 'Union Bank Of India', 'Raiganj', 'UBIN0554952', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 115, 'AAST000115', 3, 1, 'Nayan Sarkar', 'sarkar.sarkar.nayan@gmail.com ', '7001502497', 'Nayan Sarkar', 1, '\'32386480658', 'State Bank Of India', 'Malda', 'SBIN0000129', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 118, 'AAST000118', 3, 6, 'Aminul Hassan', 'aminulhassan2050@gmail.com ', '7468822153', 'Aminul Hassan', 1, '\'59163082174', 'Allahabad Bank', 'Malda', 'IDIB000M579', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 120, 'AAST000120', 3, 6, 'Azad Ali', 'aa8661786@gmail.com ', '9734992869', 'Azad Ali', 1, '\'34470721321', 'State Bank Of India', 'Chanchal', 'SBIN0002037', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 121, 'AAST000121', 3, 6, 'Prasenjit Sarkar', 'prasenjitbabai1991@gmail.com ', '9851166951', 'Babai Sarkar', 1, '\'32865625681', 'State Bank Of India', 'Makdumpur', 'SBIN0014547', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 126, 'AAST000126', 3, 6, 'Dip Kr Ghosh', 'dipghosh0098@gmail.com ', '7063806926', 'Dipkumar Ghosh', 1, '\'50200026619043', 'Bandhan Bank', 'Kaliyaganj', 'BDBL0001456', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 127, 'AAST000127', 3, 6, 'Dip Kr Gupta', 'guptadip995@gmail.com', '9563903468', 'Dip Kumar Gupta', 1, '\'32878486276', 'State Bank Of India', 'Harirampur', 'SBIN0012413', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 129, 'AAST000129', 3, 6, 'Kushal Chakraborty', 'kushalchakraborty721996@gmail.com ', '8768961001', 'Kushal Chakraborty', 1, '\'0393010563086', 'Punjab National Bank', 'Tapan', 'PUNB0039320', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 131, 'AAST000131', 3, 6, 'Malek Hussain', 'malekhossain115@gmail.com ', '7478180087', 'Malek Hossain', 1, '\'34513500306', 'State Bank Of India', 'Itahar', 'SBIN0014077', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 133, 'AAST000133', 3, 6, 'Md Zakir Hossain', 'zh9733437194@gmail.com/zakirhossain194@rediffmail.com ', '9733437194', 'Md Zakir Hossain', 1, '\'0448104000272186', 'Idbi Bank', 'Malda', 'IBKL0000448', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 134, 'AAST000134', 3, 6, 'Mithun Banik', 'banikmitun@gmail.com ', '9614101320', 'Mithun Banik', 1, '\'0342010140522', 'United Bank Of India', 'Kaliyaganj', 'PUNB0034220', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 135, 'AAST000135', 3, 6, 'Mithun Barman', 'mithunbarman0093@gmail.com ', '9476381631', 'Mithun Barman', 1, '\'432410110002610', 'Bank Of India', 'Balurghat', 'BKID0004324', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 136, 'AAST000136', 3, 6, 'Narayan Chandra Paul', 'narayan123ch@gmail.com ', '7477587976', 'Narayan Chandra Paul', 1, '\'434710110006909', 'Bank Of India', 'Raiganj', 'BKID0004347', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 138, 'AAST000138', 3, 6, 'Palash Barman', 'palashbarman14@rediffmail.com', '8167222547', 'Palash Barman', 1, '\'432410110009133', 'Bank Of India', 'Balurghat', 'BKID0004324', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 140, 'AAST000140', 3, 6, 'Pritam Chowdhury', 'pritamchowdhury9635@gmail.com', '9635443391', 'Pritam Chowdhury', 1, '\'50160016312096', 'Bandhan Bank', 'Rudel', 'BDBL0001084', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 142, 'AAST000142', 3, 6, 'Prasenjit Paul', 'prasenjitpaul.lnt@gmail.com ', '8389017216', 'Prasanjit Paul', 1, '\'549502010003582', 'Union Bank Of India', 'Raiganj', 'UBIN0554952', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 143, 'AAST000143', 3, 6, 'Rahul Singha', 'raahul.aastha@gmail.com ', '7384212122', 'Rahul Singha', 1, '\'50180003748636', 'Bandhan Bank', 'Rudel', 'BDBL0001084', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 145, 'AAST000145', 3, 6, 'Rajeswar Singha', 'singharajeswar123@gmail.com ', '8436023111', 'Rajeswar Singha', 2, '\'34895760695', 'State Bank Of India', 'Karandighi', 'SBIN0006665', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 147, 'AAST000147', 3, 6, 'Saharaf Sarkar', 'saharaf.1997@gmail.com ', '7076817917', 'Saharaf Sarkar', 1, '\'50170009414720', 'Bandhan Bank', 'Patiram', 'BDBL0001242', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 149, 'AAST000149', 3, 6, 'Sajal Sarkar', 'sajalsarkaraastha@gmail.com ', '9564270877', 'Sajal Sarkar', 1, '\'611002010001273', 'Union Bank Of India', 'Balurghat', 'UBIN0561100', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 150, 'AAST000150', 3, 6, 'Somenath Thakur', 'thakursomnath734@gmail.com', '7001373070', 'Somenath Thakur', 1, '\'33734946629', 'State Bank Of India', 'Kaliyaganj', 'SBIN0002074', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 151, 'AAST000151', 3, 6, 'Sourav Ghosh', 'souravghosh063@gmail.com ', '9609015607', 'Sourav Ghosh', 1, '\'33045020577', 'State Bank Of India', 'Bulbulchandi', 'SBIN0014070', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 152, 'AAST000152', 3, 6, 'Subhasis Sarkar', 'sarkarsubhasis78@gmail.com ', '7407998937', 'Subhasis Sarkar', 1, '\'432310510000469', 'Bank Of India', 'Gazol', 'BKID0004323', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 154, 'AAST000154', 3, 6, 'Tanmoy Banerjee', 'tanmoy.aastha@gmail.com ', '8145690957', 'Tanmay Banerjee', 1, '\'57578100027944', 'Bank Of Baroda', 'Dalkhola', 'BARB0DALKHO', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 161, 'AAST000161', 4, 6, 'Biswajit Barman', 'biswajit.aastha45@gmail.com', '9563228522', 'Biswajit Barman', 1, '\'35698074637', 'State Bank Of India', 'Mathabhanga', 'SBIN0015952', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 164, 'AAST000164', 4, 1, 'Sujan Biswa Sharma', '', '9749737844', 'Sujan Biswa Sharma', 4, '\'3609154018', 'Central Bank Of India', 'Deokhata Netaji Bazar', 'CBIN0282918', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 166, 'AAST000166', 4, 1, 'Abubakkar Siddik', 'soyelk89@gmail.com', '6296880964', 'Abubakkar Siddik', 1, '\'34388012682', 'State Bank Of India', 'Coochbehar', 'SBIN0000058', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 170, 'AAST000170', 4, 6, 'Anju Das', 'anjudasjmd679@gmail.com', '7384089513', 'Anju Das', 1, '\'4042584442', 'Central Bank Of India', 'Uchalpukuri', 'CBIN0282920', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 171, 'AAST000171', 4, 6, 'Anup Kumar Das', 'tufanganjanupdas@gmail.com', '7031341348', 'Anup Kumar Das', 1, '\'31440150964', 'State Bank Of India', 'Tufanganj', 'SBIN0011382', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 177, 'AAST000177', 4, 6, 'Bimal Ghosh', 'bimalghoshmtb@gmail.com', '7872840025', 'Bimal Ghosh', 1, '\'97772200027621', 'Syndicate Bank', 'Mathabhanga', 'CNRB0019777', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 178, 'AAST000178', 4, 6, 'Biswajit Adhikary', 'adhikarybiswa760@gmail.com', '9064238953', 'Biswajit Adhikary', 1, '\'50190018032491', 'Bandhan Bank', 'Gossairhat', 'BDBL0001669', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 190, 'AAST000190', 4, 6, 'Kazi Rahul Hossain', 'kazirahulhossain@gmail.com', '7908637191', 'Kazi Rahul Hossain', 1, '\'5122748633', 'Central Bank Of India', 'Deocharai', 'CBIN0282494', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 199, 'AAST000199', 4, 6, 'Pravat Barman', 'biltubarmanak@gmail.com', '8918545157', 'Pravat Barman', 1, '\'3141630190', 'Central Bank Of India', 'Akrahat', 'CBIN0282919', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 202, 'AAST000202', 4, 6, 'Rajib Roy Mtb', 'rajeebroy765@gmail.com', '7063783534', 'Rajib Roy', 1, '\'33097462210', 'State Bank Of India', 'Changrabandha', 'SBIN0001448', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 207, 'AAST000207', 4, 6, 'Sanjay Barman (New)', 'sanjaybarman.atme1@gmail.com', '8436463515', 'Sanjay Barman', 1, '\'35973248606', 'State Bank Of India', 'Gosanimari', 'SBIN0007000', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 211, 'AAST000211', 4, 6, 'Subhajit Das', 'subhajitfkt333@gmail.com', '7908640311', 'Subhajit Das', 1, '\'2003010083508', 'Punjab National Bank', 'Falakata', 'PUNB0200320', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 222, 'AAST000222', 4, 4, 'Abhijit Paul', 'avijit.aastha@gmail.com', '9083765261', 'Abhijit Paul', 1, '\'50160016166720', 'Bandhan Bank', 'Gossairhat', 'BDBL0001669', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 225, 'AAST000225', 4, 4, 'Sumanta Sharma', 'sharmasumanta999@gmail.com', '9775993002', 'Sumanta Sharma', 1, '\'36854516448', 'State Bank Of India', 'Kherbarihat', 'SBIN0009725', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 226, 'AAST000226', 2, 1, 'Partha Debnath', 'partha.aastha@gmail.com', '9832356644', 'Partha Debnath', 1, '\'020801535844', 'Icici Bank', 'Siliguri', 'ICIC0000208', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 227, 'AAST000227', 2, 1, 'Pravat Sarkar', 'pravat.aastha@gmail.com', '9563152800', 'Pravat Sarkar', 1, '\'739902010006557', 'Union Bank Of India', 'Ghughumali', 'UBIN0573990', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 228, 'AAST000228', 2, 1, 'Sanjit Roy Office Boy', 'na', '9134232439', 'Sanjit Roy Office Boy', 1, '\'4013125358', 'Central Bank Of India', 'Lataguri', 'CBIN0281698', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 229, 'AAST000229', 2, 1, 'Sk Shanewaz', 'skshanewaz.aastha@gmail.com', '9593901016', 'Sekh Shanewaz Hussain', 1, '\'50100467568758', 'Hdfc Bank', 'Islampur', 'HDFC0002747', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 231, 'AAST000231', 2, 6, 'Amit Kar', 'amit65311@gmail.com', '8637804040', 'Amit Kar', 1, '\'32411428546', 'State Bank Of India', 'Falakata', 'SBIN0001297', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 237, 'AAST000237', 2, 6, 'Arup Sarkar', '', '7718003755', 'Arup Sarkar', 1, '\'31447893824', 'State Bank Of India', 'Daspara', 'SBIN0008526', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 244, 'AAST000244', 2, 6, 'Dinesh Das', 'dineshlive111@gmail.com', '7029287930', 'Dinesh Das', 1, '\'3202263084', 'Central Bank Of India', 'Islampur', 'CBIN0283922', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 245, 'AAST000245', 2, 6, 'Dipesh Singha', 'dipeshsingha.aastha@gmail.com', '8918864037', 'Dipesh Singha', 1, '\'1964104000006163', 'Idbi Bank', 'Kharibari', 'IBKL0001964', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 250, 'AAST000250', 2, 6, 'Jakir Hussain Slg', 'jakirhossain19394@gmail.com', '8617046279', 'Jakir Hussain Slg', 1, '\'6137101003339', 'Canara Bank', 'Dhupguri', 'CNRB0006137', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 251, 'AAST000251', 2, 6, 'Kaushik Ghosh Slg', 'koushikghosh.aastha@gmail.com', '', 'Kaushik Ghosh', 1, '\'1082010310437', 'Punjab National Bank', 'Panikauri', 'PUNB0108220', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 255, 'AAST000255', 2, 6, 'Akbar Ali', 'mda06971@gmail.com', '9064671627', 'Akbar Ali', 1, '\'33076253461', 'State Bank Of India', 'Liusipukuri', 'SBIN0009704', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 256, 'AAST000256', 2, 6, 'Merajul Alam', 'merajulalam9@gmail.com', '9734974660', 'Merajul Alam', 1, '\'50170014409350', 'Bandhan Bank', 'Islampur', 'BDBL0001455', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 257, 'AAST000257', 2, 6, 'Narayan Singh', 'narayansinghlive111@gmail.com', '9832678392', 'Narayan Singh', 1, '\'30793775936', 'State Bank Of India', 'Naya Bazar', 'SBIN0003376', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 258, 'AAST000258', 2, 6, 'Nilu Guha', 'aastha.niluguha25@gmail.com', '8101478502', 'Nilu Guha', 1, '\'50200006228311', 'Bandhan Bank', 'Belakoba', 'BDBL0001106', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 259, 'AAST000259', 2, 6, 'Paritosh Das', 'paritoshdas.aastha@gmail.com', '8116979757', 'Paritosh Das', 1, '\'33832800166', 'State Bank Of India', 'Mynaguri', 'SBIN0012423', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 263, 'AAST000263', 2, 6, 'Saikat Dey', 'saikat2345@gmail.com', '9832501161', 'Saikat Dey', 1, '\'68600100004597', 'Bank Of Baroda', 'Siliguri', 'BARB0DBSILI', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 264, 'AAST000264', 2, 6, 'Sakirul Islam', 'sahilkhan629071@gmail.com', '6290717652', 'Sakirul Islam', 1, '\'3685300593', 'Central Bank Of India', 'Dhanirhat', 'CBIN0282992', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 267, 'AAST000267', 2, 6, 'Subhankar Das Njp', 'subhankardas2405@gmail.com', '8918793678', 'Subhankar Das Njp', 1, '\'32781727187', 'State Bank Of India', 'Fulbari', 'SBIN0013123', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 268, 'AAST000268', 2, 6, 'Subhas Ch Singha', 'subhaschandrasingha29@gmail.com', '9382023614', 'Subhash Chandra Singha', 1, '\'31226556427', 'State Bank Of India', 'Bidhan Nagar', 'SBIN0012406', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 270, 'AAST000270', 2, 6, 'Tapash Shill', 'tapashshill1235@gmail.com', '8250703383', 'Tapash Kumar Shil', 1, '\'33535045202', 'State Bank Of India', 'Ghughumali', 'SBIN0012408', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 271, 'AAST000271', 2, 6, 'Taposh Bhowmik', 'bhowmiktapos@gmail.com', '9733696839', 'Tapash Bhowmik', 1, '\'31684106123', 'State Bank Of India', 'Belakoba', 'SBIN0013122', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 278, 'AAST000278', 2, 4, 'Madhumita Majumder', 'madhumita.majumder1234@gmail.com', '9733094089', 'Madhumita Majumdar', 1, '\'50190034404599', 'Bandhan Bank', 'S F Road', 'BDBL0001226', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 279, 'AAST000279', 2, 4, 'Pallavi Chakraborty', 'pallavi.aastha02@gmail.com', '9749098907', 'Pallavi Chakraborty', 1, '\'380502011917071', 'Union Bank Of India', 'Siliguri Main', 'UBIN0538051', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 282, 'AAST000282', 2, 4, 'Reby Sarkey', 'rebysarkey.aastha@gmail.com', '9733715049', 'Reby Sarkey', 1, '\'33292831935', 'State Bank Of India', 'Hasimara', 'SBIN0001447', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 284, 'AAST000284', 2, 4, 'Saikat Das', 'saikatdas121212@gmail.com', '9932106668', 'Saikat Das', 1, '\'739902010007270', 'Union Bank Of India', 'Ghoghomali', 'UBIN0573990', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 285, 'AAST000285', 2, 4, 'Sonamoni Majumder', 'sonamoni.aastha@gmail.com', '9641837301', 'Sonamoni Majumder', 1, '\'684202010005862', 'Union Bank Of India', 'Gate Bazar', 'UBIN0568422', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 289, 'AAST000289', 2, 7, 'Gouri Chakraborty', 'chakrabortyg200@gmail.com', '9333825763', 'Gouri Chakraborty', 1, '\'739902010006409', 'Union Bank Of India', 'Ghughumali', 'UBIN0573990', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 293, 'AAST000293', 2, 7, 'Madhuri Saha', 'madhuri.saha.1945@gmail.com', '8798158266', 'Madhuri Saha', 1, '\'739902010005374', 'Union Bank Of India', 'Ghughumali', 'UBIN0573990', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 305, 'AAST000305', 2, 7, 'Sangita Poddar', 'sangitapoddar948@gmail.com', '7718231680', 'Sangita Poddar', 1, '\'0237014545060', 'Punjab National Bank', 'Hill Cart Road', 'PUNB0023720', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 306, 'AAST000306', 2, 7, 'Sikandar Paul', '', '7430974620', 'Sikandar Kumar Paul', 1, '\'3712645859', 'Kotak Mahindra Bank', 'Siliguri', 'KKBK0006749', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 323, 'AAST000323', 7, 6, 'Apul Ghosh', 'apulghoshtez18@gmail.com', '8876394922', 'Apul Ghosh', 1, '\'7363010071646', 'Assam Gramin Vikash Bank', 'Parowa Chariali', 'PUNB0RRBAGB', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 324, 'AAST000324', 7, 6, 'Bhaskar Jyoti Borah', 'bhaskarjyotia@gmail.com', '8486816155', 'Bhaskar Jyoti Borah', 1, '\'36703105920', 'State Bank Of India', 'Sootea', 'SBIN0012972', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 326, 'AAST000326', 7, 6, 'Bijan Borah', 'bijenborah686@gmail.com', '8638348957', 'Bijan Borah', 1, '\'05030110107706', 'Uco Bank', 'Jamugurihat', 'UCBA0000503', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 330, 'AAST000330', 7, 6, 'Bitopan Saikia', 'bitopansaikia54@gmail.com', '8472069169', 'Bitopan Saikia', 1, '\'39034763396', 'State Bank Of India', 'Sootea', 'SBIN0012972', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 331, 'AAST000331', 7, 6, 'Chandan Mahatoo', 'chandanmahatoo237@gmail.com', '6001875704', 'Chandan Mahatoo', 1, '\'50190031908462', 'Bandhan Bank', 'Jamgurihat', 'BDBL0001492', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 336, 'AAST000336', 7, 6, 'Dipak Debnath', 'deepakdebnath611@gmail.com', '9678777656', 'Dipak Debnath', 1, '\'34000538387', 'State Bank Of India', 'Dhekiajuli', 'SBIN0002049', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 341, 'AAST000341', 7, 6, 'Manjit Sarmah', 'manjitsarmah6@gmail.com', '6000174547', 'Manjit Sarmah', 1, '\'20298263981', 'State Bank Of India', 'Dhekiajuli', 'SBIN0002049', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 342, 'AAST000342', 7, 6, 'Naba Jyoti Bhuyan', 'nathnabanath@gmail.com', '7576914205', 'Nabajyoti Bhuyan', 1, '\'33431660134', 'State Bank Of India', 'Dhekiajuli', 'SBIN0002049', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 347, 'AAST000347', 7, 6, 'Rantu Saikia', 'www.saikiaranrantu@gmail.com', '9101382154', 'Rantu Saikia', 3, '\'34913685600', 'State Bank Of India', 'Sootea', 'SBIN0012972', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 348, 'AAST000348', 7, 6, 'Saddam Khan', 'saddamkhan0568@gmail.com', '9101876212', 'Saddam Khan', 1, '\'39433184271', 'State Bank Of India', 'Mission Chariali', 'SBIN0005783', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 352, 'AAST000352', 7, 4, 'Ankita Sarkar', 'ankita.aastha98@gmail.com', '6295570120', 'Ankita Sarkar', 1, '\'5745258181', 'Kotak Mahindra Bank', 'Siliguri', 'KKBK0006749', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 353, 'AAST000353', 7, 4, 'Mandira Das', 'mandiradas.311@gmail.com', '8101176215', 'Mandira Das', 1, '\'34589502496', 'State Bank Of India', 'Champasari', 'SBIN0012405', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 354, 'AAST000354', 7, 6, 'Manoj Das', 'manujdas47@gmail.com', '9101616686', 'Manoj Das', 3, '\'11773815571', 'State Bank Of India', 'Afs Salonibari', 'SBIN0009149', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 357, 'AAST000357', 8, 1, 'Dhanesh Barman', 'aastha.dhanesh@gmail.com', '9531688274', 'Dhanesh Barman', 1, '\'020801557671', 'Icici Bank', 'Siliguri', 'ICIC0000208', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 363, 'AAST000363', 8, 6, 'Keshab Sarakar', 'keshabsarkar2017@gmail.com', '8787448859', 'Keshab Sarkar', 1, '\'20174157512', 'State Bank Of India', 'Ramesh Chowmuhani', 'SBIN0016194', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 367, 'AAST000367', 8, 6, 'Rabi Debnath', 'rabi.rkr@gmail.com', '8257925224', 'Rabi Debnath ', 1, '\'31289613042', 'State Bank Of India', 'Salbagan', 'SBIN0004570', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 368, 'AAST000368', 8, 6, 'Raju Modak', 'raju657.af@gmail.com', '8258962037', 'Raju Modak', 1, '\'38934826819', 'State Bank Of India', 'Khowai', 'SBIN0005591', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 369, 'AAST000369', 8, 6, 'Shibabrata Das', 'shibabrata6553@gmail.com', '9612346553', 'Shibabrata Das', 1, '\'0405010182546', 'Punjab National Bank', 'Sabroom', 'PUNB0040520', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 372, 'AAST000372', 8, 6, 'Titu Dey', 'armanroy223@gmail.com', '9366262117', 'Titu Dey', 1, '\'0260010581509', 'Punjab National Bank', 'Amarpur', 'PUNB0026020', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 373, 'AAST000373', 8, 4, 'Dip Deb', 'dipdeb123@gmail.com', '7085552772', 'Dip Deb', 1, '\'33119789892', 'State Bank Of India', 'Bishalgarh', 'SBIN0004290', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 375, 'AAST000375', 7, 6, 'Apu Biswas', 'apubiswas12345@gmail.com', '7638085942', 'Apu Biswas', 1, '\'31424221349', 'State Bank Of India', 'Kaliabor', 'SBIN0004273', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 377, 'AAST000377', 7, 6, 'Bassirul Hussain Bhuyan', 'bassirulbhuyan000011@gmail.com ', '7577973644', 'Bassirul Hussain Bhuyan', 1, '\'65520100006022', 'Bank Of Baroda', 'Tezpur', 'BARB0VJTEZP', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 378, 'AAST000378', 7, 4, 'Subhan Das', 'subd2017@gmail.com', '8876641726', 'Sobhan Das', 1, '\'30716850237', 'State Bank Of India', 'Tezpur', 'SBIN0000195', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 380, 'AAST000380', 8, 6, 'Bapan Debbarma', 'bapandeb123466@gmail.com', '8837478971', 'Bapan Debbarma', 1, '\'4091101004348', 'Canara Bank', 'Bishalgarh', 'CNRB0004091', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 394, 'AAST000394', 2, 4, 'Banashree Aich', 'banashree.aastha07@gmail.com', '', 'Banashree Aich', 1, '\'6972500100196001', 'Karnataka Bank', 'Siliguri', 'KARB0000697', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 397, 'AAST000397', 3, 6, 'Joy Dev Kundu', 'jaydevkundu259@gmail.com ', '8918595485', 'Jaydev Kundu', 4, '\'50180030467387', 'Bandhan Bank', 'Raiganj', 'BDBL0001090', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 403, 'AAST000403', 7, 6, 'Dhiru Jyoti Phukan', 'dhirujyotip@gmail.com', '7636951778', 'Dhiru Jyoti Phukan', 1, '\'07133211067603', 'Uco Bank', 'Gohapur', 'UCBA0000713', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 404, 'AAST000404', 7, 6, 'Naba Kanta Bora', 'nababorah2018@gmail.com', '9101907838', 'Naba Kanta Bora', 1, '\'50190005281439', 'Bandhan Bank', 'Jamugurihat', 'BDBL0001492', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 408, 'AAST000408', 6, 6, 'Saddik Ali', 'saddikali98765@gmail.com', '9365850355', 'Saddik Ali', 1, '\'3841717316', 'Central Bank Of India', 'Morigaon', 'CBIN0284215', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 409, 'AAST000409', 6, 6, 'Imran Hussain', 'papamousam@gmail.com', '7002236654', 'Imran Hussain', 1, '\'1347010920490', 'Punjab National Bank', 'Jajari', 'PUNB0134720', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 412, 'AAST000412', 2, 6, 'Biplab Ch Singha', '', '', 'Biplab Ch Singha', 4, '\'1184010442916', 'Punjab National Bank', 'Haptiagach', 'PUNB0118420', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 423, 'AAST000423', 4, 6, 'Biplab Barman', 'bb3277865@gmail.com', '8509670592', 'Biplab Barman', 1, '\'38760605078', 'State Bank Of India', 'Falakata', 'SBIN0001297', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 428, 'AAST000428', 3, 6, 'Somnath Das', 'dassomu47@gmail.com', '7363024884', 'Somnath Das', 1, '\'0293010293815', 'Punjab National Bank', 'Kaliyachak', 'PUNB0029320', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 429, 'AAST000429', 6, 6, 'Biswajit Baruah', 'boruahb38@gmail.com', '7002817622', 'Biswajit Boruah', 3, '\'4337108001090', 'Canara Bank', 'Kachamari', 'CNRB0004337', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 430, 'AAST000430', 6, 1, 'Papu Khan', '', '7896977171', 'Pappu Khan', 1, '\'129101000007615', 'Indian Overseas Bank', 'Nagaon', 'IOBA0001291', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 444, 'AAST000444', 4, 6, 'Subham Saha', 'subhamsahabkt@gmail.com', '8016432466', 'Subham Saha', 1, '\'5178101002584', 'Canara Bank', 'Bhanukumari', 'CNRB0005178', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 447, 'AAST000447', 4, 6, 'Sandojit Barman', 'sandojitb@gmail.com', '9064338788', 'Sandojit Barman', 1, '\'0879010614450', 'Punjab National Bank', 'Ghugumari', 'PUNB0087920', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 451, 'AAST000451', 4, 6, 'Fazlu Hossain', 'fazlihossain0@gmail.com', '8617476462', 'Fazlu Hossain', 1, '\'1600010290326', 'Punjab National Bank', 'Mathabhanga', 'PUNB0160020', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 456, 'AAST000456', 4, 6, 'Harun Al Rasid', 'sahabubalam405@gmail.com', '7029594423', 'Harun Al Rasid', 1, '\'3739705921', 'Cenrtal  Bank Of India', 'Ghoksardanga', 'CBIN0281762', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 463, 'AAST000463', 4, 6, 'Kazi Rejaul Hoque', 'kajirejaulhoque@gmail.com', '8302543921', 'Kaji Rejaul Hoque', 1, '\'3176155431', 'Cenrtal  Bank Of India', 'Deocharai', 'CBIN0282494', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 471, 'AAST000471', 2, 6, 'Bappa Das', '', '8918490681', 'Bappa Das', 1, '\'50170001828979', 'Bandhan Bank', 'Belakoba', 'BDBL0001106', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 472, 'AAST000472', 2, 6, 'Bharat Barman', '', '9382322267', 'Bharat Barman', 1, '\'37608596714', 'State Bank Of India', 'Mynaguri', 'SBIN0012423', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 473, 'AAST000473', 2, 6, 'Biplab Dutta', '', '9474385306', 'Biplab Dutta', 1, '\'20063481556', 'State Bank Of India', 'Ghugumari', 'SBIN0012408', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 476, 'AAST000476', 2, 6, 'Md Mosim', '', '8250626421', 'Md Mosim', 1, '\'39228871574', 'State Bank Of India', 'Bidhannagar', 'SBIN0012406', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 478, 'AAST000478', 2, 6, 'Mihir Biswas', '', '9593181222', 'Mihir Biswas', 1, '\'38524988389', 'State Bank Of India', 'Champasari', 'SBIN0012405', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 481, 'AAST000481', 2, 6, 'Patit Singha', '', '9851447349', 'Patit Singha', 3, '\'33001322819', 'State Bank Of India', 'Siliguri Court', 'SBIN0007206', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 484, 'AAST000484', 2, 6, 'Tapash Roy', '', '9382094267', 'Tapash Roy', 1, '\'3832712932', 'Central Bank Of India', 'Panbari', 'CBIN0282908', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 508, 'AAST000508', 5, 6, 'Nasiruddin Mondal', '', '', 'Nasiruddin Mondal', 1, '\'59188418765', 'Allahabad Bank', 'Banjetia', 'IDIB000B619', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 510, 'AAST000510', 5, 6, 'Rubel Hasan Ansary', '', '', 'Rubel Hasan Ansary', 1, '\'4409108000658', 'Canara Bank', 'Domkal', 'CNRB0004409', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 531, 'AAST000531', 6, 1, 'Meftabur Rahman', '', '6003942593', 'Meftabur Rahman', 3, '\'1347011141119', 'Punjab National Bank', 'Jajari', 'PUNB0134720', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 532, 'AAST000532', 7, 6, 'Nayan Moni Baruah', '', '', 'Nayan Moni Baruah', 1, '\'39041166324', 'State Bank Of India', 'Mission Charali', 'SBIN0005783', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 537, 'AAST000537', 3, 6, 'Suman Singha Fe', '', '', 'Suman Singha Fe', 1, '\'34919348103', 'State Bank Of India', 'Arapur', 'SBIN0007088', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 559, 'AAST000559', 4, 1, 'Hillol Barman', '', '', 'Hillol Barman', 1, '\'30971764071', 'State Bank Of India', 'Hazrahat', 'SBIN0008924', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 561, 'AAST000561', 2, 7, 'Sekhar Sarkar', '', '', 'Sekhar Sarkar', 1, '\'045801000021672', 'Indian Overseas Bank', 'Hill Cart Road Siliguri', 'IOBA0000458', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 565, 'AAST000565', 8, 6, 'Mannan Miah', 'miah17223@gmail.com', '8787397877', 'Mannan Miah', 1, '\'28270110078426', 'Uco Bank', 'Sonamura', 'UCBA0002827', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 572, 'AAST000572', 7, 6, 'Bisnu Basumatari', '', '', 'Bisnu Basumatary', 1, '\'50210006267768', 'Bandhan Bank', 'Jamugurihat', 'BDBL0001492', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 575, 'AAST000575', 7, 6, 'Raktim Kalita', '', '', 'Raktim Kalita', 1, '\'50100337444830', 'Hdfc Bank', 'Kacharigaon', 'HDFC0009252', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 581, 'AAST000581', 4, 6, 'Indrajit Dey', '', '', 'Indrajit Dey', 1, '\'52180057267954', 'Bandhan Bank', 'Shiv Mandir', 'BDBL0001586', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 582, 'AAST000582', 4, 6, 'Karna Das', '', '', 'Karna Das', 1, '\'38496433040', 'State Bank Of India', 'Mathabhanga', 'SBIN0015952', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 593, 'AAST000593', 4, 6, 'Subir Das Mtb', '', '', 'Subir Das Mtb', 1, '\'508310110000369', 'Bank Of India', 'Tufanganj', 'BKID0005083', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 598, 'AAST000598', 4, 6, 'Raju Das Mtb', '', '', 'Raju Das Mtb', 1, '\'548102010014513', 'Union Bank Of India', 'Koch Bihar', 'UBIN0554812', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 600, 'AAST000600', 6, 6, 'Baharul Islam', 'baharulislambabul73756@gmail.com', '9365735607', 'Baharul Islam', 1, '\'20145390960', 'Fino Bank', 'Mumbai', 'FINO0001001', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 601, 'AAST000601', 6, 6, 'Bhaskar Jyoti Hazarika', 'bhaskarh486@gmail.com', '9365297292', 'Bhaskar Jyoti Hazarika', 1, '\'0031013234918', 'Punjab National Bank', 'Nagaon', 'PUNB0003120', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 607, 'AAST000607', 6, 6, 'Piyar Mohammad Hadad', 'muhammadhadad1122@gmail.com', '7002812686', 'Piyar Mohammad Hadad', 1, '\'39733703886', 'State Bank Of India', 'Samaguri', 'SBIN0002119', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 609, 'AAST000609', 6, 6, 'Tamim Ahmed', 'tamimahmednew@gmail.com', '8822390713', 'Tamim Ahmed', 1, '\'918822390713', 'Paytm Payments Bank', 'Noida Branch ', 'PYTM0123456', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 611, 'AAST000611', 2, 6, 'Bikram Singha', '', '', 'Bikram Singha', 1, '\'50210019971244', 'Bandhan Bank', 'Belakoba', 'BDBL0001106', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 616, 'AAST000616', 2, 6, 'Manishankar Barman', '', '', 'Manishankar Barman', 1, '\'3765208306', 'Central Bank Of India', 'Uchalpukhari', 'CBIN0282920', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 617, 'AAST000617', 2, 6, 'Md Tajimul', '', '', 'Md Tajimul', 1, '\'30867215611', 'State Bank Of India', 'Liusipukuri', 'SBIN0009704', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 620, 'AAST000620', 2, 6, 'Rajib Roy Slg', '', '', 'Rajib Roy Slg', 1, '\'6238697129', 'Airtel Payment Bank', 'Jalpaiguri', 'AIRP0000001', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 621, 'AAST000621', 2, 6, 'Ranjan Saha', '', '', 'Ranjan Saha', 1, '\'3870667368', 'Central Bank Of India', 'Kadamtala', 'CBIN0284040', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 623, 'AAST000623', 2, 6, 'Sourojit Saha Roy', '', '', 'Satyajit Saha Roy', 1, '\'435610110003197', 'Bank Of India', 'Falakata', 'BKID0004356', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 632, 'AAST000632', 3, 6, 'Chayan Sarkar', '', '', 'Chayan Sarkar', 1, '\'38212485096', 'State Bank Of India', 'Kaliachak', 'SBIN0008437', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 633, 'AAST000633', 3, 6, 'Chotan Paul', 'paulchoton.789@gmail.com ', '7407751191', 'Chotan Paul', 1, '\'0937001700069318', 'Punjab National Bank', 'Raiganj', 'PUNB0093700', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 635, 'AAST000635', 3, 6, 'Malay Majumder', '', '', 'Malay Majumder', 1, '\'37287179779', 'State Bank Of India', 'Subhasganj', 'SBIN0018264', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `employees` (`id`, `emp_id_no`, `emp_id`, `emp_location`, `emp_designation`, `emp_name`, `emp_email`, `emp_mobile`, `emp_ac_holder_name`, `emp_relation`, `emp_account_no`, `emp_bank_name`, `emp_bank_branch`, `emp_bank_ifsc`, `is_active`, `is_deleted`, `sal_type`, `joined_on`, `left_on`, `created_at`, `updated_at`) VALUES
(184, 638, 'AAST000638', 3, 6, 'Tapan Mandal Mld', '', '', 'Tapan Mandal Mld', 1, '\'737702010005007', 'Union Bank Of India', 'Manikchawk', 'UBIN0573779', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 642, 'AAST000642', 3, 6, 'Bumba Thakur', 'bumbathakur123@gmail.com ', '9315081246', 'Bumba Thakur', 1, '\'39660314825', 'State Bank Of India', 'Itahar', 'SBIN0014077', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 643, 'AAST000643', 3, 6, 'Dipankar Singha', 'dipankarsingha68027@gmail.com ', '7908292955', 'Dipankar Singha', 1, '\'5156638744', 'Central Bank Of India', 'Pandua', 'CBIN0282141', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 645, 'AAST000645', 3, 6, 'Kuntal Sarkar', 'kuntal.sarkar1994@gmail.com', '9382410381', 'Kuntal Sarkar', 1, '\'0393010212243', 'Punjab National Bank', 'Tapan', 'PUNB0039320', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 649, 'AAST000649', 3, 6, 'Shishir Roy', 'roysisir99@gmail.com ', '9641506787', 'Shishir Roy', 1, '\'38646087272', 'State Bank Of India', 'Karandighi', 'SBIN0006665', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 654, 'AAST000654', 4, 6, 'Milan Barman', 'mb7920481@gmail.com', '6356886944', 'Milan Barman', 1, '\'38319264247', 'State Bank Of India', 'Balika Bandar', 'SBIN0008712', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 659, 'AAST000659', 4, 6, 'Ujjal Barman 2', 'ujjalbarman918@gmail.com', '7585962984', 'Ujjal Barman 2', 1, '\'35062520155', 'State Bank Of India', 'Kherbarihat', 'SBIN0009725', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 662, 'AAST000662', 4, 6, 'Kamal Hossain', 'kh133302@gmail.com', '8509277267', 'Kamal Hossain', 1, '\'32292881247', 'State Bank Of India', 'Kursahat Sab', 'SBIN0009847', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 668, 'AAST000668', 2, 4, 'Tana Sarkar', '', '', 'Tana Sarkar', 1, '\'548202010009217', 'Union Bank Of India', 'Siliguri Mahakuma Parishad', 'UBIN0558842', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 672, 'AAST000672', 2, 1, 'Himalay Dey', '', '', 'Himalay Dey', 1, '\'37113886394', 'State Bank Of India', 'Ghogomali', 'SBIN0012408', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 673, 'AAST000673', 2, 1, 'Md Alam', '', '', 'Md Alam', 1, '\'271601500451', 'Icici Bank', 'Sevoke Road', 'ICIC0000208', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 674, 'AAST000674', 8, 6, 'Bibhu Sharma', 'bibhusharmaltv171@gmail.com', '7005350481', 'Bibhu Sharma', 1, '\'1838010002073', 'Punjab National Bank', 'Chailengta', 'PUNB0183820', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 680, 'AAST000680', 6, 6, 'Krishna Chetri', 'chetrykrishna148@gmail.com', '9954056759', 'Krishna Chetri', 1, '\'32015590132', 'State Bank Of India', 'Samaguri', 'SBIN0002119', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 698, 'AAST000698', 2, 7, 'Jagannth Roy', '', '', 'Jagannth Roy', 1, '\'411610110002465', 'Bank Of India', 'New Jalpaiguri', 'BKID0004116', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 700, 'AAST000700', 6, 1, 'Pankaj Nath', '', '', 'Pankaj Nath', 1, '\'0635010258159', 'Punjab National Bank', 'Babejia', 'PUNB0063520', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 707, 'AAST000707', 4, 6, 'Shankar Barman', '', '', 'Shankar Barman', 1, '\'34032700479', 'State Bank Of India', 'Gosanimari', 'SBIN0007000', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 709, 'AAST000709', 4, 6, 'Sujan Barman Mtb', '', '', 'Sujan Barman Mtb', 1, '\'32608557396', 'State Bank Of India', 'Baneswar', 'SBIN0013121', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 714, 'AAST000714', 3, 6, 'Bappa Paul', '', '', 'Bappa Paul', 1, '\'32769494204', 'State Bank Of India', 'Bulbulchandi', 'SBIN0014070', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 715, 'AAST000715', 3, 6, 'Chiranjit Mandal', '', '', 'Chiranjit Mandal', 1, '\'737702010000494', 'Union Bank Of India', 'Manikchawk', 'UBIN0573779', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 716, 'AAST000716', 3, 6, 'Md Mahabub Ansari', '', '', 'Md Mahabub Ansari', 1, '\'35223598654', 'State Bank Of India', 'Ratua', 'SBIN0009319', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 717, 'AAST000717', 6, 6, 'Anarul Haque', '', '', 'Anarul Hoque', 1, '\'005710003655', 'Post Payment Bank', 'Morigaon', 'IPOS0000001', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 721, 'AAST000721', 4, 6, 'Bikram Sarkar', '', '', 'Bikram Sarkar', 1, '\'30913421996', 'State Bank Of India', 'Tufanganj', 'SBIN0011382', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 726, 'AAST000726', 2, 6, 'Suman Talukdar', '', '', 'Suman Talukdar', 1, '\'435610110013621', 'Bank Of India', 'Falakata', 'BKID0004356', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 739, 'AAST000739', 2, 7, 'Binti Rao', '', '', 'Binti Rao', 1, '\'4745556242', 'Kotak Mahindra Bank', 'Siliguri', 'KKBK0006749', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 741, 'AAST000741', 2, 7, 'Aman Saha', '', '', 'Aman Saha', 1, '\'916297737489', 'Paytm Payments Bank', 'Nioida', 'PYTM0123456', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 745, 'AAST000745', 6, 6, 'Saddatul Islam', '', '', 'Saddatul Islam', 1, '\'35342701270', 'State Bank Of India', 'Link Branch Khutikatia', 'SBIN0005914', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 746, 'AAST000746', 6, 6, 'Dibya Jyoti Hazarika', '', '', 'Dibya Jyoti Hazarika', 1, '\'20115866992', 'State Bank Of India', 'Sonakuchi Hind Peper Corp Kagajnagar', 'SBIN0007699', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 747, 'AAST000747', 6, 6, 'Dipu Das', '', '', 'Dipu Das', 1, '\'463302120002556', 'Union Bank Of India', 'Bhalukmari', 'UBIN0546330', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 750, 'AAST000750', 4, 6, 'Paresh Barman', '', '', 'Paresh Barman', 1, '\'32411103093', 'State Bank Of India', 'Nishiganj', 'SBIN0011383', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 752, 'AAST000752', 4, 6, 'Amit Roy', '', '', 'Amit Roy', 1, '\'8370852344', 'Airtel Payment Bank', 'Mumbai', 'AIRP0000001', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 757, 'AAST000757', 4, 6, 'Rahul Hossain', '', '', 'Rahul Hossain', 1, '\'31384197464', 'State Bank Of India', 'Khapaidanga Kaljani', 'SBIN0009964', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 767, 'AAST000767', 3, 6, 'Ramjan Sk', '', '', 'Ramjan Sk', 1, '\'283401000006993', 'Indian Overseas Bank', 'Bagbari', 'IOBA0002834', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 770, 'AAST000770', 5, 6, 'Nilkamal Das', '', '', 'Nilkamal Das', 1, '\'1619010143530', 'Punjab National Bank', 'Malancha', 'PUNB0161920', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 779, 'AAST000779', 2, 7, 'Chiranjit Chakraborty', '', '', 'Chiranjit Chakraborty', 1, '\'3845760122', 'Kotak Mahindra Bank', 'Siliguri', 'KKBK0006749', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 780, 'AAST000780', 2, 7, 'Astomi Ghosh', '', '', 'Astomi Ghosh', 1, '\'684202010009853', 'Union Bank Of India', 'Dabgram', 'UBIN0568422', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 787, 'AAST000787', 6, 6, 'Koushik Saikia', '', '', 'Koushik Saikia', 1, '\'33758339015', 'State Bank Of India', 'Raha', 'SBIN0002103', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 790, 'AAST000790', 2, 6, 'Apu Roy', '', '', 'Apu Roy', 1, '\'50180005231834', 'Bandhan Bank', 'Haldibari', 'BDBL0001139', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 801, 'AAST000801', 4, 6, 'Santosh Bepari', '', '', 'Santosh Bepari', 1, '\'34347568240', 'State Bank Of India', 'Tufanganj', 'SBIN0011382', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 804, 'AAST000804', 4, 6, 'Dwijen Barman', '', '', 'Dwijen Barman', 1, '\'33604827747', 'State Bank Of India', 'Mathabhanga', 'SBIN0015952', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 805, 'AAST000805', 4, 6, 'Nabyendu Chakraborty', '', '', 'Nabyendu Chakraborty', 1, '\'34002960240', 'State Bank Of India', 'Tufanganj', 'SBIN0011382', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 808, 'AAST000808', 4, 6, 'Shankar Kumar Barman', '', '', 'Shankar Kumar Barman', 1, '\'1607010344364', 'Panjab National Bank', 'Tufanganj', 'PUNB0160720', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 809, 'AAST000809', 4, 6, 'Tapas Das', '', '', 'Tapas Das', 1, '\'3318371260', 'Central Bank Of India', 'Tufanganj', 'CBIN0280132', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 814, 'AAST000814', 3, 6, 'Bishal Majumder', '', '', 'Bishal Majumder', 3, '\'20391318074', 'State Bank Of India', 'Raiganj', 'SBIN0012461', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 815, 'AAST000815', 3, 6, 'Gopal Mandal', '', '', 'Gopal Mandal', 1, '\'31737389941', 'State Bank Of India', 'Manikchawk', 'SBIN0006664', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 816, 'AAST000816', 3, 6, 'Mukesh Mahato', '', '', 'Mukesh Mahato', 1, '\'8312815985', 'Kotak Mahindra Bank', 'Bhosari', 'KKBK0001774', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 820, 'AAST000820', 5, 6, 'Monisankar Chakraborty', '', '', 'Monisankar Chakraborty', 1, '\'919010071658467', 'Axis Bank', 'Kolkata', 'UTIB0000005', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 827, 'AAST000827', 2, 7, 'Beauty Sarkar', '', '', 'Beauty Sarkar', 1, '\'3355532010', 'Central Bank Of India', 'Sf Road', 'CBIN0283531', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 835, 'AAST000835', 4, 6, 'Faraj Ali', '', '', 'Faraj Ali', 1, '\'3358743460', 'Central Bank Of India', 'Nakkati', 'CBIN0282491', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 837, 'AAST000837', 5, 6, 'Pinku Khan', '', '', 'Pinku Khan', 1, '\'50468798094', 'Allahabad Bank', 'Dechapara', 'IDIB000D552', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 842, 'AAST000842', 2, 7, 'Jhumki Biswas', '', '', 'Jhumki Biswas', 1, '\'40159117216', 'State Bank Of India', 'Champasari', 'SBIN0012405', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 846, 'AAST000846', 6, 6, 'Basanta Kumar Baruah', '', '', 'Basanta Kumar Baruah', 1, '\'34968524818', 'State Bank Of India', 'Khutikatia', 'SBIN0005914', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 850, 'AAST000850', 6, 6, 'Naba Jyoti Kalita', '', '', 'Naba Jyoti Kalita', 1, '\'20175842563', 'State Bank Of India', 'Nagaon', 'SBIN0000146', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 853, 'AAST000853', 2, 1, 'Kalyani Das Bairagi', '', '', 'Kalyani Das Bairagi', 1, '\'5612966942', 'Kotak Mahindra Bank', 'Kolkata Park Street ', 'KKBK0000322', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 855, 'AAST000855', 2, 7, 'Sudha Das', '', '', 'Sudha Das', 1, '\'17060110032084', 'Uco Bank', 'Burdwan Road', 'UCBA0001706', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 858, 'AAST000858', 6, 6, 'Jahidur Rahman', '', '', 'Jahidur Rahman', 1, '\'33296139462', 'State Bank Of India', 'Morigaon', 'SBIN0006309', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 861, 'AAST000861', 4, 6, 'Maksedul Miya', '', '', 'Maksedul Miah', 1, '\'36059646063', 'State Bank Of India', 'Balika Bandar', 'SBIN0008712', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 870, 'AAST000870', 2, 7, 'Munmun Tapadar', '', '', 'Munmun Tapadar', 1, '\'3714506775', 'Central Bank Of India', 'Hyderpara Bazar', 'CBIN0281831', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 871, 'AAST000871', 2, 7, 'Sujata Mitra', '', '', 'Sujata Mitra', 1, '\'2432101009326', 'Canara Bank', 'Siliguri', 'CNRB0002432', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 872, 'AAST000872', 2, 7, 'Sushmita Mandal', '', '', 'Sushmita Mandal', 1, '\'3415819111', 'Central Bank Of India', 'Siliguri Regulated Market', 'CBIN0283245', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 874, 'AAST000874', 2, 7, 'Shefali Saha', '', '', 'Shefali Saha', 1, '\'7845387549', 'Kotak Mahindra Bank', 'Siliguri', 'KKBK0006749', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 875, 'AAST000875', 2, 7, 'Rina Das', '', '', 'Rina Das', 1, '\'2981484944', 'Central Bank Of India', 'Khalpara', 'CBIN0283531', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 876, 'AAST000876', 2, 7, 'Antara Sarkar', '', '', 'Antara Sarkar', 1, '\'33584163374', 'State Bank Of India', 'Uttorayan', 'SBIN0015947', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 881, 'AAST000881', 7, 6, 'Bhaskar Neog', '', '', 'Bhaskar Neog', 1, '\'100074944872', 'Induslnd Bank ', 'Guwahati ', 'INDB0000682', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 884, 'AAST000884', 4, 1, 'Munna Dakua', '', '', 'Munna Dakua', 1, '\'35721532812', 'State Bank Of India', 'Mathabhanga', 'SBIN0015952', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 902, 'AAST000902', 2, 6, 'Jayanta Ray', '', '', 'Jayanta Ray', 1, '\'38161298035', 'State Bank Of India', 'Oodlabari', 'SBIN0013117', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 903, 'AAST000903', 5, 6, 'Suman Sarkar', '', '', 'Suman Sarkar', 1, '\'10021525395 ', 'Idfc Bank', 'Bkc-Naman Chambers Branch', 'IDFB0060102', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 905, 'AAST000905', 2, 7, 'Barsha Saha', '', '', 'Barsha Saha', 1, '\'9745808612', 'Kotak Mahindra Bank', 'Siliguri', 'KKBK0006749', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 922, 'AAST000922', 4, 6, 'Prasenjit Barman', '', '', 'Prasenjit Barman', 1, '\'34680798249', 'State Bank Of India', 'Mathabhanga', 'SBIN0015952', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 925, 'AAST000925', 2, 7, 'Sahin Parvin', '', '', 'Sahin Parvin', 1, '\'2145719144', 'Kotak Mahindra Bank', 'Hill Cart Road', 'KKBK0000811', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 928, 'AAST000928', 2, 7, 'Sonali Roy 2', '', '', 'Sonali Roy 2', 1, '\'2981520279', 'Central Bank Of India', 'Ghogomali', 'CBIN0284223', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 930, 'AAST000930', 2, 8, 'Puja Saha', '', '', 'Puja Saha', 1, '\'9845597829', 'Kotak Mahindra Bank', 'Hill Cart Road', 'KKBK0006749', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 931, 'AAST000931', 2, 8, 'Ritu Sarkar', '', '', 'Ritu Sarkar', 1, '\'8645674518', 'Kotak Mahindra Bank', 'Siliguri', 'KKBK0006749', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 936, 'AAST000936', 4, 6, 'Amrit Karmakar', '', '', 'Amrit Karmakar', 1, '\'33090652592', 'State Bank Of India', 'Barobisha', 'SBIN0007144', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 942, 'AAST000942', 2, 8, 'Manish Mandal', '', '', 'Manish Mandal', 1, '\'07800100020318', 'Bank Of Baroda', 'Siliguri ', 'BARB0SILIGU', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 944, 'AAST000944', 2, 7, 'Debasish Sutradhar', '', '', 'Debasis Sutradhar', 1, '\'50190017602647', 'Bandhan Bank', 'Cochbehar', 'BDBL0001325', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 948, 'AAST000948', 2, 8, 'Alisha Roy', '', '', 'Alisha Roy', 1, '\'0645921128', 'Kotak Mahindra Bank', 'Hill Cart Road', 'KKBK0000811', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 949, 'AAST000949', 2, 7, 'Hena Chowdhury', '', '', 'Hena Chowdhury', 1, '\'0745996378', 'Kotak Mahindra Bank', 'Hill Cart Road', 'KKBK0006742', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 952, 'AAST000952', 2, 6, 'Sukdeb Ghosh', '', '', 'Sukdeb Ghosh', 1, '\'32719452659', 'State Bank Of India', 'Malbazar Branch', 'SBIN0002084', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 953, 'AAST000953', 2, 8, 'Rumpa Sarkar', '', '', 'Rumpa Sarkar', 3, '\'34744366489', 'State Bank Of India', 'Ghogomali', 'SBIN0012408', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, 954, 'AAST000954', 2, 7, 'Jayeeta Paul', '', '', 'Jayeeta Paul', 1, '\'35100679533', 'State Bank Of India', '', 'SBIN0014551', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 955, 'AAST000955', 2, 4, 'Sudeepta Chowhan', '', '', 'Sudeepta Chowhan', 3, '\'7352500100508101', 'Karnataka Bank', 'Siliguri', 'KARB0000735', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 956, 'AAST000956', 2, 8, 'Subham Chowdhury', '', '', 'Subham Chowdhury', 1, '\'40154730545', 'State Bank Of India', '', 'SBIN0014549', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 957, 'AAST000957', 2, 7, 'Astomi Roy', '', '', 'Astami Roy', 1, '\'100150661004', 'Indusind Bank', '', 'INDB0000728', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 958, 'AAST000958', 2, 6, 'Pradip Biswas', '', '', 'Pradip Biswas', 1, '\'33687854923', 'State Bank Of India', 'Falakata', 'SBIN0001297', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 959, 'AAST000959', 2, 6, 'Prasenjit Sutradhar', '', '', 'Prsenjit Sutradhar', 1, '\'603502010015654', 'Union Bank Of India', 'Falakata', 'UBIN0560359', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 960, 'AAST000960', 2, 8, 'Subarna Biswasharma', '', '', 'Subarna Biswasharma', 1, '\'40321753644', 'State Bank Of India', 'Dabgram', 'SBIN0017373', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 961, 'AAST000961', 2, 8, 'Ranjana Roy', '', '', 'Ranjana Roy', 1, '\'574302010014997', 'Union Bank Of India', 'Dabgram', 'UBIN0557439', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, 962, 'AAST000962', 2, 8, 'Puja Paswan', '', '', 'Puja Paswan', 1, '\'2845382822', 'Kotak Mahindra Bank', 'Hill Cart Road', 'KKBK0006749', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, 963, 'AAST000963', 2, 7, 'Shabnam Begam', '', '', 'Shabnam Begam', 1, '\'07800100012186', 'Bank Of Baroda', 'Siliguri', 'BARB0SILIGU', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 964, 'AAST000964', 2, 7, 'Shikha Roy', '', '', 'Shikha Roy', 1, '\'36375729224', 'State Bank Of India', 'Sukantapally', 'SBIN0014551', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, 965, 'AAST000965', 2, 7, 'Kanika Roy', '', '', 'Kanika Roy', 1, '\'40534981725', 'State Bank Of India', 'Siliguri Town', 'SBIN0016772', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, 966, 'AAST000966', 2, 7, 'Mina Prasad', '', '', 'Mina Prasad', 1, '\'3589412515', 'Central Bank Of India', 'Siliguri', 'CBIN0280125', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 967, 'AAST000967', 2, 7, 'Tuktuki Talukdar', '', '', 'Tuktuki Talukdar', 1, '\'3335651611', 'Central Bank Of India', 'New Jalpaiguri', 'CBIN0280979', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 968, 'AAST000968', 8, 6, 'Sekhar Datta', '', '', 'Sekhar Datta', 1, '\'34207932222', 'State Bank Of India', 'Dharmanagar', 'SBIN0000067', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, 969, 'AAST000969', 2, 4, 'Trayita Roy', '', '', 'Trayita Roy', 1, '\'34218729853', 'State Bank Of India', 'Siliguri Court', 'SBIN0007206', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, 970, 'AAST000970', 2, 7, 'Rinku Bose', '', '', 'Rinku Roy Bose', 1, '\'39656100115', 'State Bank Of India', 'Dabgram', 'SBIN0017373', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, 971, 'AAST000971', 2, 8, 'Md Sahid Raza', '', '', 'Md Sahid Raza', 1, '\'10038337028', 'Idfc First Bank', 'Gurgaon', 'IDFB0021001', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, 972, 'AAST000972', 4, 6, 'Abhijit Saha', '', '', 'Abhijit Saha', 1, '\'33114293674', 'State Bank Of India', 'Barobisha', 'SBIN0007144', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(1, 'All Locations', '2021-12-20 13:43:35', '2021-12-20 13:43:35'),
(2, 'Siliguri', '2021-12-20 13:43:35', '2021-12-20 13:43:35'),
(3, 'Malda', '2021-12-20 13:43:35', '2021-12-20 13:43:35'),
(4, 'Mathabhanga', '2021-12-20 13:43:35', '2021-12-20 13:43:35'),
(5, 'Baharampur', '2021-12-20 13:43:35', '2021-12-20 13:43:35'),
(6, 'Guwahati', '2021-12-20 13:43:35', '2021-12-20 13:43:35'),
(7, 'Tezpur', '2021-12-20 13:43:35', '2021-12-20 13:43:35'),
(8, 'Agartala', '2021-12-20 13:43:35', '2021-12-20 13:43:35');

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
(5, '2021_12_14_141707_create_users_table', 1),
(6, '2021_12_14_150717_create_carousels_table', 1),
(8, '2021_12_19_170040_create_relations_table', 1),
(13, '2021_12_19_165151_create_employees_table', 2);

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
(1, 'Self', '2021-12-20 13:43:53', '2021-12-20 13:43:53'),
(2, 'Spouse', '2021-12-20 13:43:53', '2021-12-20 13:43:53'),
(3, 'Parent', '2021-12-20 13:43:53', '2021-12-20 13:43:53'),
(4, 'Relative', '2021-12-20 13:43:53', '2021-12-20 13:43:53');

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
(1, 'Super User', 99, '2021-12-20 13:44:33', '2021-12-20 13:44:33'),
(2, 'Admin', 98, '2021-12-20 13:44:33', '2021-12-20 13:44:33'),
(3, 'Co-Ordinator Level 2', 6, '2021-12-20 13:44:33', '2021-12-20 13:44:33'),
(4, 'Co-Ordinator Level 1', 5, '2021-12-20 13:44:33', '2021-12-20 13:44:33'),
(5, 'Back Office', 4, '2021-12-20 13:44:33', '2021-12-20 13:44:33'),
(6, 'Supervisor', 3, '2021-12-20 13:44:33', '2021-12-20 13:44:33'),
(7, 'Telecaller', 2, '2021-12-20 13:44:33', '2021-12-20 13:44:33'),
(8, 'Executive', 1, '2021-12-20 13:44:33', '2021-12-20 13:44:33'),
(9, 'Deactive User', 0, '2021-12-20 13:44:33', '2021-12-20 13:44:33');

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
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_mobile`, `password`, `user_role`, `is_active`, `location_id`, `last_login`, `is_logged_in`, `emp_id`, `created_at`, `updated_at`) VALUES
(1, 'Partha Debanth', 'partha.aastha@gmail.com', '9832356644', '$2y$10$tU9BucrhvM.65KVojZqgP.B5MvMCaf8w5/rvLNV9Vk0tRDR0XZ5Ui', 99, 1, 1, '2021-12-21 02:13:40', 0, 'AAST000226', '2021-12-20 13:44:49', '2021-12-20 20:45:15'),
(2, 'Md Alam', 'alam.aastha@gmail.com', '9474407312', '$2y$10$mBqnnvxxgXXDK4fIk95iCeE7Hdl2BV2kxkMlnpE2nTrYGcTHMYKr2', 98, 1, 1, NULL, 0, 'AAST000673', '2021-12-20 13:44:49', '2021-12-20 13:44:49'),
(3, 'Sekh Shanewaz', 'skshanewaz.aastha@gmail.com', '9593901016', '$2y$10$FA/9/um29ajlANh9y.Rs.uyjWyOCw/Xjm2x904djamsZm9ofS0kwm', 98, 1, 1, NULL, 0, 'AAST000229', '2021-12-20 13:44:49', '2021-12-20 13:44:49'),
(4, 'Pravat Sarkar', 'pravat.aastha@gmail.com', '9563152800', '$2y$10$IDlJS7zlDglukXpboqYe9eAOJ6dOl2ij4qg1S8loi/TJ5FrDTHnoW', 4, 1, 2, '2021-12-20 19:22:53', 0, 'AAST000227', '2021-12-20 13:44:49', '2021-12-20 13:52:59'),
(5, 'Subrata Sarkar', 'aastha.subrata@gmail.com', '9933671962', '$2y$10$PadDk0d99fNfzoRTJ1Y51uPTpZ.L3MCB1DmWykHBuKc.RXJfrD2Xe', 98, 1, 1, NULL, 0, 'AASTPROP01', '2021-12-20 13:44:49', '2021-12-20 13:44:49'),
(6, 'Koustav Dey', 'koustav.aastha@gmail.com', '9933094870', '$2y$10$41t8wo9lzG4Ob9/GBYIMguCodR9XE3YNIL.txcAfSeEs3Rvu.slf2', 98, 1, 1, NULL, 0, 'AASTPROP02', '2021-12-20 13:44:50', '2021-12-20 13:44:50'),
(7, 'Biswajit Saha', 'aastha.biswa@gmail.com', '9654853033', '$2y$10$kqlMJbbhL8WUIjM37wXP3.qh0vi2PgNLRV4w5rw/g5njifv1fNUQO', 98, 1, 1, NULL, 0, 'AASTPROP03', '2021-12-20 13:44:50', '2021-12-20 13:44:50'),
(12, 'Kalyani Das Bairagi', 'kalyanidas.aastha@gmail.com', '7718231341', '$2y$10$.ORPR3bF7QeW6Wof1.8oS.nkr55UyWYEpZqrlgf.mkdEeTWNO6aNm', 5, 1, 1, '2021-12-21 02:15:32', 1, 'AAST000853', '2021-12-20 20:43:32', '2021-12-20 20:45:32');

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
  ADD UNIQUE KEY `users_user_mobile_unique` (`user_mobile`),
  ADD UNIQUE KEY `users_emp_id_unique` (`emp_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
