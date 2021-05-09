-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2021 at 06:13 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpctis`
--

-- --------------------------------------------------------

--
-- Table structure for table `covid_tests`
--

CREATE TABLE `covid_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `officer_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_date` date NOT NULL,
  `test_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symptoms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result_date` date NOT NULL,
  `status` enum('Process','Completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Process',
  `result` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Your test is being processed by the Tester',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `covid_tests`
--

INSERT INTO `covid_tests` (`id`, `officer_name`, `patient_name`, `test_date`, `test_name`, `symptoms`, `result_date`, `status`, `result`, `created_at`, `updated_at`) VALUES
(1, 'Amanda Guerrero', 'Mariko Sutton', '2021-05-07', 'RT-PCR Swab Testing', 'Flu', '2021-05-07', 'Completed', 'HEALTHY and NEGATIVE COVID test results with the COVID-19 RT-PCR Swab Testing', NULL, NULL),
(2, 'Suki Nieves', 'Harding Ray', '2021-05-07', 'Antibody Testing', 'Et doloribus sint qu', '2021-05-07', 'Completed', 'POSITIVE COVID test results with the COVID-19 Antibody Testing', NULL, NULL);

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
(133, '2014_10_12_000000_create_users_table', 1),
(134, '2014_10_12_100000_create_password_resets_table', 1),
(135, '2019_08_19_000000_create_failed_jobs_table', 1),
(136, '2021_03_28_080158_create_test_centres_table', 1),
(137, '2021_04_11_000254_create_test_kits_table', 1),
(138, '2021_04_13_134424_create_covid_tests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_centres`
--

CREATE TABLE `test_centres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `centre_name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_centres`
--

INSERT INTO `test_centres` (`id`, `centre_name`, `address`, `postal_code`, `phone`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Allistair Koch', 'Quis duis veritatis', '11', '75', 'Do ullamco ipsam est', NULL, NULL),
(2, 'Kelsey Arnold', 'Recusandae Eu quia', '35', '49', 'Aliquid illo velit u', NULL, NULL),
(3, 'Wynne Welch', 'Esse ipsam aspernat', '70', '97', 'Commodo dolore proid', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test_kits`
--

CREATE TABLE `test_kits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `centre_id` bigint(20) UNSIGNED NOT NULL,
  `test_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_kits`
--

INSERT INTO `test_kits` (`id`, `centre_id`, `test_name`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 'RT-PCR Swab Testing', 66, NULL, NULL),
(2, 2, 'Antibody Testing', 87, NULL, NULL),
(3, 3, 'RT-PCR Swab Testing', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `centre_name` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` enum('manager','officer','tester','patient') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `centre_name`, `username`, `password`, `name`, `gender`, `dob`, `email`, `phone`, `address`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Wynne Welch', 'manager', '$2y$10$dDazPhM35PyOrH7TLLxLzec7WIqXorMr5252/w/UHKtvDeYshLljW', 'manager', NULL, NULL, 'manager@gmail.com', NULL, NULL, 'manager', NULL, NULL),
(2, 'Allistair Koch', 'cobamanager', '$2y$10$DVPkh5yq6ipqI5XKUH7EyOqlnRLxsUO6e18lGaWzkPAYl8wSqkq0O', 'cobamanager', NULL, NULL, 'cobamanager@gmail.com', NULL, NULL, 'manager', NULL, NULL),
(3, 'Allistair Koch', 'cobaofficer', '$2y$10$hVGC47PWsor7NeUlAMTUnOipGDq47xnJwClVcbSWr3cP88WpNimc.', 'Basil Carter', 'Female', '2017-02-28', 'latizi@mailinator.com', '65', 'Autem assumenda beat', 'officer', NULL, NULL),
(4, 'Allistair Koch', 'cobatester', '$2y$10$nFE1L.iLIjRfrHVoANU.SuGYkdb5dy5vNhNQBa.0ZAfYXm5ZHvCZ2', 'Amanda Guerrero', 'Female', '2012-03-12', 'qotyxog@mailinator.com', '1', 'Dolores eius reprehe', 'tester', NULL, NULL),
(5, 'Allistair Koch', 'cobapatient', '$2y$10$gEaMCMG2iZQesciwfBDcveunBMTgTCQNysZnSYfPw//m6VRFozzdS', 'Mariko Sutton', 'Male', '1997-02-14', 'vicigejoc@mailinator.com', '18', 'Atque voluptas ex mi', 'patient', NULL, NULL),
(6, 'Kelsey Arnold', 'cobamanger2', '$2y$10$Vv/XKG.2BMKgFo1k1UZk6OyYZJjg.WgSJ4zg78koXtSh1gEKz2AvC', 'cobamanger2', NULL, NULL, 'cobamanger2@gmail.com', NULL, NULL, 'manager', NULL, NULL),
(7, 'Kelsey Arnold', 'cobaofficer2', '$2y$10$CNorqtIT4ISe8hnc21QRoelpKTRLPBc.grzDa5uyv7CH4Mq0snNFO', 'Chester Brock', 'Male', '2000-02-06', 'kubijap@mailinator.com', '82', 'Qui nulla quis quis', 'officer', NULL, NULL),
(8, 'Kelsey Arnold', 'cobatester2', '$2y$10$1EOxFQauNUqDPdVlCM3mmuU6jDgSqO5qvLq2xpHIQByAOqiuL.8UC', 'Suki Nieves', 'Male', '2003-07-05', 'setuxe@mailinator.com', '55', 'Sit dolore magna eo', 'tester', NULL, NULL),
(9, 'Kelsey Arnold', 'cobapatient2', '$2y$10$bBPr20RLs1tN.SnWTKy2Q.DphXOrfot5p1D35HJl7/BceERFK18OW', 'Harding Ray', 'Female', '1982-01-10', 'ropiv@mailinator.com', '53', 'Consequatur aut bea', 'patient', NULL, NULL),
(10, 'Wynne Welch', 'officer', '$2y$10$KMiqXOuDya7QPsfqLF9uVOHHzC0wHYjX4bzVqHGwJ4Wp4o.110rJG', 'Gretchen Morris', 'Male', '1986-10-05', 'dejibar@mailinator.com', '83', 'Reiciendis aut et es', 'officer', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covid_tests`
--
ALTER TABLE `covid_tests`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `test_centres`
--
ALTER TABLE `test_centres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test_centres_centre_name_unique` (`centre_name`),
  ADD UNIQUE KEY `test_centres_address_unique` (`address`),
  ADD UNIQUE KEY `test_centres_phone_unique` (`phone`);

--
-- Indexes for table `test_kits`
--
ALTER TABLE `test_kits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covid_tests`
--
ALTER TABLE `covid_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `test_centres`
--
ALTER TABLE `test_centres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test_kits`
--
ALTER TABLE `test_kits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
