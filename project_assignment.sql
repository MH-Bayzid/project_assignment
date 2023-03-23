-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 02:26 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `website`, `logo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'Pacheco Webster Associates', 'gujel@mailinator.com', 'https://www.fiqyjufy.org.uk', 'pacheco-webster-associates-3630645.jpg', NULL, '2023-03-21 03:48:38', NULL),
(5, 'Fihima Ainani Tajrian', 'fihima@gmail.com', 'https://www.sijyqoresa.org.au', 'fihima-ainani-1961581.jpg', NULL, '2023-03-21 04:32:22', '2023-03-21 05:23:44'),
(7, 'Mcdonald Blanchard Inc', 'legujito@mailinator.com', 'https://www.wydyqa.mobi', 'mcdonald-blanchard-inc-3622908.jpg', NULL, '2023-03-21 05:28:58', '2023-03-21 05:49:37'),
(8, 'Mahabub Hasan Bayzid', 'zobosecop@mailinator.com', 'https://www.qaruzyra.org.au', 'mcintyre-sanders-llc-3071535.jpg', NULL, '2023-03-21 05:51:06', '2023-03-23 04:09:40'),
(9, 'Lambert and Cochran LLC', 'perafuduhe@mailinator.com', 'https://www.sygi.org.uk', 'castro-hurst-associates-4459497.jpg', NULL, '2023-03-21 08:38:55', '2023-03-23 07:08:23'),
(11, 'Wyatt and Hess LLC', 'vepobu@mailinator.com', 'https://www.helehexequtyvy.net', 'wyatt-and-hess-llc-945156.jpg', NULL, '2023-03-21 08:41:46', NULL),
(12, 'Preston and Herman Traders', 'rolyrosiz@mailinator.com', 'https://www.memywexegow.net', 'preston-and-herman-traders-4493108.jpg', NULL, '2023-03-21 08:42:26', NULL),
(13, 'Fuller and Bush Inc', 'rohoc@mailinator.com', 'https://www.hiju.com.au', 'fuller-and-bush-inc-2848526.jpg', NULL, '2023-03-21 08:42:45', NULL),
(14, 'Benton Gray Plc', 'camybufyqy@mailinator.com', 'https://www.guzenacadixukav.cc', 'benton-gray-plc-2747681.jpg', NULL, '2023-03-21 08:43:02', NULL),
(15, 'Rasmussen Patel Plc', 'cohesaru@mailinator.com', 'https://www.jaje.info', NULL, NULL, '2023-03-23 07:02:51', NULL),
(16, 'Carpenter and Jordan Plc', 'voqywawi@mailinator.com', 'https://www.zewycabakycaqe.cc', NULL, NULL, '2023-03-23 07:12:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `company_id`, `email`, `phone`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Galloway Castaneda Inc', 14, 'jupelipel@mailinator.com', '75', NULL, '2023-03-21 10:35:50', NULL),
(2, 'Simon Hester Associates', 10, 'tedoxedezi@mailinator.com', '83', NULL, '2023-03-21 11:40:39', NULL),
(3, 'Neal and Gray Plc', 8, 'kijakacala@mailinator.com', '42', NULL, '2023-03-21 11:41:13', NULL),
(4, 'Guzman Murphy Co', 11, 'sevevutox@mailinator.com', '98', NULL, '2023-03-21 11:41:24', NULL),
(5, 'Malone Maddox Associates', 9, 'ruteboby@mailinator.com', '40', NULL, '2023-03-21 11:41:28', NULL),
(6, 'Mcintyre and Turner Associates', 11, 'jucaqac@mailinator.com', '35', NULL, '2023-03-21 11:41:32', NULL),
(7, 'Holloway Santiago Inc', 8, 'kegijutos@mailinator.com', '2', NULL, '2023-03-21 11:41:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '2023_03_21_080747_create_companies_table', 2),
(6, '2023_03_21_162640_create_employees_table', 3),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$AVDdD0Yz1IzzyQyYsZByzOfj2nVEkQfUw2dMvkM7qU7VYRI.fGAtW', '2023-03-22 09:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Admin', 'admin@gmail.com', NULL, '$2y$10$ihaqEup4CrN6BHyhxJgFhuWfsh7IQo.TPo3hG27IYqiTB0wvMIk42', 'p6v0SwmSesXY4a7cdY04GD5xnJhij3IFda8yROzUAfn3ZcBLgXbwalTRBTze', '2023-03-21 00:59:24', '2023-03-21 00:59:24'),
(8, 'Dorian Berry', 'byqekumizu@mailinator.com', NULL, '$2y$10$XH2wP2YfnCnYzsL.ihI2Xe6fG8zzK6o/5OwUlECAFIKoDr.6jokNK', NULL, '2023-03-22 10:07:02', '2023-03-22 10:07:02'),
(9, 'Amy Schwartz', 'dynyxynacu@mailinat', NULL, '$2y$10$2r1I5m9uBqpwupZTmXYlPOdwAv6sob/z6ehdCiRkWFysinLFLxZP6', NULL, '2023-03-22 10:07:35', '2023-03-22 10:07:35'),
(10, 'Charles Michael', 'supinurus@mail', NULL, '$2y$10$cyx8agHB66CUNlJ6moO65.SZ4SBAyfpeIldJ/k9/1fHnyjCixp5tW', NULL, '2023-03-22 10:08:11', '2023-03-22 10:08:11'),
(11, 'Amaya Leonard', 'gahubo@mailinator.com', NULL, '$2y$10$XTd7zxQAOfg/kzzgqnoZBucGvK5MjKm/YxItGg3fCol4MIvHIQTe2', NULL, '2023-03-22 10:09:17', '2023-03-22 10:09:17'),
(12, 'Rhea Workman', 'lilumeviby@mailinator.com', NULL, '$2y$10$gSMp4o1TSFV6IN0riYTh4.pWrJRv.nRwxU4sFlXpWfKFjWzZyENHW', NULL, '2023-03-22 10:30:19', '2023-03-22 10:30:19'),
(13, 'Adele Stein', 'fifoxa@mailinato', NULL, '$2y$10$k.TU9TMdn.YxdmQ8yNr4KOw1CKwQaL5kTep8QUmsanR9cAJ8jjEw6', NULL, '2023-03-22 11:19:09', '2023-03-22 11:19:09'),
(14, 'Porter Camacho', 'fyxa@mailinator.com', NULL, '$2y$10$NanVlBv1cq..1FphI3ZHNe1CL/TQytv2hlQZ4vJIJmp5HDiPSXhAC', NULL, '2023-03-23 01:08:14', '2023-03-23 01:08:14'),
(15, 'MacKenzie Stewart', 'vonyf@mailinator.com', NULL, '$2y$10$UczcWcubsTgQpHVlIk9jn.UM3/vaZw4adX.kP29klZmrjxzRyMfvq', NULL, '2023-03-23 01:38:03', '2023-03-23 01:38:03'),
(17, 'Fitzgerald Shepherd', 'bunuxeqas@mailinator.com', NULL, '$2y$10$0OpAsS2q5Nce7AynjavCz.T31zDJM7Wgh0cOF8tB5sBm3UT/XDsOK', NULL, '2023-03-23 03:29:55', '2023-03-23 03:29:55'),
(18, 'Britanni Noble', 'vylopagu@mailinator.com', NULL, '$2y$10$t/xAeUTt/YoaGBG6AzVvd.G7/MOhL6z8yotjkqlF5/hnOJ01cRxD2', NULL, '2023-03-23 06:53:53', '2023-03-23 06:53:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
