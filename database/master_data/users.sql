SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
