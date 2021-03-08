-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 08, 2021 at 06:50 AM
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
-- Database: `databank`
--

-- --------------------------------------------------------

--
-- Table structure for table `appraisals`
--

CREATE TABLE `appraisals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `integrity` int(11) DEFAULT 0,
  `professionalism` int(11) DEFAULT 0,
  `teamwork` int(11) DEFAULT 0,
  `critical_thinking` int(11) DEFAULT 0,
  `conflict_management` int(11) DEFAULT 0,
  `attendance` int(11) DEFAULT 0,
  `ability_to_make_deadline` int(11) DEFAULT 0,
  `management` int(11) DEFAULT 0,
  `administration` int(11) DEFAULT 0,
  `presentation_skill` int(11) DEFAULT 0,
  `quality_of_work` int(11) DEFAULT 0,
  `efficiency` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appraisals`
--

INSERT INTO `appraisals` (`id`, `user_id`, `integrity`, `professionalism`, `teamwork`, `critical_thinking`, `conflict_management`, `attendance`, `ability_to_make_deadline`, `management`, `administration`, `presentation_skill`, `quality_of_work`, `efficiency`, `created_at`, `updated_at`) VALUES
(2, 16, 2, 2, 3, 3, 1, 2, 2, 2, 2, 2, 2, 2, '2021-03-06 03:50:39', '2021-03-06 03:50:39'),
(3, 16, 2, 2, 3, 3, 1, 2, 2, 2, 2, 2, 2, 2, '2021-03-06 05:06:56', '2021-03-06 05:06:56'),
(4, 5, 2, 2, 3, 3, 1, 2, 2, 2, 2, 2, 2, 2, '2021-03-06 05:07:15', '2021-03-06 05:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `user_id`, `file_name`, `file`, `created_at`, `updated_at`) VALUES
(6, 16, 'Resume', '/images/attachments/attachment-1615017020.png', '2021-02-21 07:14:15', '2021-03-05 23:50:20'),
(7, 5, 'dsdsdsds', '/images/attachments/attachment-1614434649.jpg', '2021-02-21 07:14:40', '2021-02-27 06:04:09'),
(8, 16, 'Certificate of Recognition', '/images/attachments/attachment-1615017040.webp', '2021-02-21 07:26:19', '2021-03-05 23:50:40'),
(9, 16, 'Certificate of Employment', '/images/attachments/attachment-1615017069.jpg', '2021-02-21 09:22:35', '2021-03-05 23:51:09'),
(10, 5, 'Resume', '/images/attachments/attachment-1613929552.jpg', '2021-02-21 09:45:52', '2021-02-21 09:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'HR', '2021-02-12 06:55:53', '2021-02-12 15:39:05'),
(2, 'IT', '2021-02-12 06:56:51', '2021-02-12 06:56:51'),
(3, 'MARKETING', '2021-02-12 09:50:38', '2021-02-12 09:50:38'),
(4, 'CITCS', '2021-02-13 19:27:45', '2021-02-13 19:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `designation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `department_id`, `designation_name`, `created_at`, `updated_at`) VALUES
(4, 2, 'Encoders', '2021-02-12 22:12:39', '2021-03-05 22:33:31'),
(5, 2, 'Web Developer', '2021-02-13 07:11:35', '2021-02-13 07:11:35'),
(6, 4, 'PROFESSOR', '2021-02-13 19:28:04', '2021-02-13 19:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `dropoffpoints`
--

CREATE TABLE `dropoffpoints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pahatid_id` bigint(20) UNSIGNED NOT NULL,
  `maps_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` decimal(10,6) NOT NULL,
  `lat` decimal(10,6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dropoffpoints`
--

INSERT INTO `dropoffpoints` (`id`, `pahatid_id`, `maps_address`, `address`, `landmark`, `lng`, `lat`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test St. 123 East Ave.', '#13B Basa St. West Tapinac', 'null', '14.838600', '120.284200', '2020-12-28 07:36:31', '2020-12-28 07:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `dropoff_addresses`
--

CREATE TABLE `dropoff_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `maps_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` decimal(10,6) NOT NULL,
  `lat` decimal(10,6) NOT NULL,
  `address_type` enum('Home','Work','Recent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dropoff_addresses`
--

INSERT INTO `dropoff_addresses` (`id`, `user_id`, `maps_address`, `address`, `landmark`, `lng`, `lat`, `address_type`, `created_at`, `updated_at`) VALUES
(52, 3, '13W Olongapo City', '#13B Basa St. West Tapinac', NULL, '14.838600', '120.284200', 'Recent', '2020-12-06 16:47:38', '2020-12-06 16:47:38'),
(53, 3, '13W Olongapo City', '#13B Basa St. West Tapinac', NULL, '14.838600', '120.284200', 'Recent', '2020-12-06 17:09:21', '2020-12-06 17:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `educational_infos`
--

CREATE TABLE `educational_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educational_infos`
--

INSERT INTO `educational_infos` (`id`, `user_id`, `school`, `course`, `start`, `end`, `created_at`, `updated_at`) VALUES
(3, 5, 'Lyceum', 'BSCS', '2021-02-06', '2021-02-18', '2021-02-20 03:57:53', '2021-02-20 04:52:56'),
(4, 6, 'PUP Manila', 'Bachelor\'s of Science in Information Technology', '2021-02-09', '2024-02-13', '2021-02-20 04:54:41', '2021-02-20 04:54:41'),
(7, 5, 'PLMan', 'Computer Engineer', '2021-02-03', '2021-02-25', '2021-02-20 05:15:06', '2021-02-20 05:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE `emergency_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emergency_contacts`
--

INSERT INTO `emergency_contacts` (`id`, `user_id`, `name`, `relationship`, `contact_no`, `created_at`, `updated_at`) VALUES
(2, 5, 'Sample', 'sample', '0905151215112', '2021-02-19 21:57:41', '2021-02-20 05:21:29'),
(3, 6, 'John', 'Father', '09526254152', '2021-02-19 22:33:36', '2021-02-19 22:33:36'),
(4, 10, 'New', 'Mother', '031626416', '2021-02-19 22:36:27', '2021-02-19 22:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_infos`
--

CREATE TABLE `family_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_day` date NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family_infos`
--

INSERT INTO `family_infos` (`id`, `user_id`, `name`, `relationship`, `birth_day`, `contact_no`, `created_at`, `updated_at`) VALUES
(3, 5, 'John Does', 'Father', '1979-03-22', '0904151525151', '2021-02-20 03:00:12', '2021-02-20 05:31:50'),
(4, 6, 'John Darts', 'Brother', '1974-04-23', '091524515151', '2021-02-20 03:00:52', '2021-02-20 03:00:52'),
(6, 10, 'Sample Samskie2', 'Brother', '1994-04-23', '09251452522', '2021-02-20 19:59:22', '2021-02-20 19:59:30');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_02_12_122023_create_designations_table', 1),
(4, '2021_02_12_122134_create_departments_table', 1),
(5, '2021_02_12_124745_create_personalinfos_table', 1),
(6, '2021_02_20_031556_create_emergency_contacts_table', 2),
(7, '2021_02_20_064130_create_family_infos_table', 3),
(8, '2021_02_20_110207_create_educational_infos_table', 4),
(9, '2021_02_20_130438_create_expreiences_table', 5),
(10, '2021_02_21_065042_create_attachments_table', 5),
(11, '2021_03_02_102859_create_appraisals_table', 6),
(12, '2021_03_06_112736_create_experiences_table', 7),
(13, '2021_03_06_114153_create_appraisals_table', 8),
(14, '2021_03_06_114208_create_appraisals_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `personalinfos`
--

CREATE TABLE `personalinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employment_of_spouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_children` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personalinfos`
--

INSERT INTO `personalinfos` (`id`, `user_id`, `religion`, `marital_status`, `employment_of_spouse`, `no_of_children`, `created_at`, `updated_at`) VALUES
(3, 5, 'Christians', 'Single', 'Yes', '0', '2021-02-13 06:39:04', '2021-02-20 05:18:43'),
(4, 6, 'Christian', 'Married', 'Yes', '2', '2021-02-13 06:41:29', '2021-02-13 07:07:51'),
(5, 10, 'Catholic', 'Married', 'None', '3', '2021-02-19 22:36:59', '2021-02-19 22:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_date` date DEFAULT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_day` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `user_level` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `join_date`, `employee_id`, `mobile_no`, `profile_image`, `birth_day`, `gender`, `address`, `department_id`, `designation_id`, `user_level`, `is_active`, `remember_token`, `created_at`, `updated_at`, `category`) VALUES
(5, 'Roles', 'Febry', 'asdasd@sdasda.com', NULL, '$2y$10$zqHmEr7RDxqaeoTeQ98HzOxyBxp.liy3PGlztKn8iWEKmPqIfMHne', '2021-02-11', 'EM-YAmfw', '1234657', '/images/profile/profile-1613928921.jpg', '2021-02-18', 'Female', 'muntinlupa city', 2, 5, 2, 1, NULL, '2021-02-12 23:40:27', '2021-02-21 09:35:21', 'Regular'),
(11, 'Admin', 'Admin', 'admin@admin.com', NULL, '$2y$10$IkkLQtvNnEzrv/pGPHJuVOdKwp9rgDpvPDmD7rZK1bGZmhLaqB.fm', '2016-04-23', 'EM-5SSXA', '090514251522', NULL, '1995-02-11', 'Male', 'Cupang Muntinlupa City', 1, 1, 1, 1, NULL, '2021-02-20 19:26:44', '2021-02-20 19:55:03', NULL),
(16, 'Sample', 'Sample', 'sample@sample.com', NULL, '$2y$10$xQORYPMTta.ab1WMxNQqFOD8LwN/2tC29Ky5eWkmh1OHRgVHvgxhy', '2018-04-23', 'EM-MmZNr', '09051425115', '/images/profile/profile-1613928964.jpg', '2021-02-25', 'Male', 'Cupang Muntinlupa City', 2, 5, 2, 0, NULL, '2021-02-20 23:29:56', '2021-03-02 02:24:02', NULL),
(17, 'dsadsad', 'sdasd', '', NULL, '', '2021-03-07', 'EM-Oehfz', '123', NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, '2021-03-06 19:43:40', '2021-03-06 19:43:40', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appraisals`
--
ALTER TABLE `appraisals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educational_infos`
--
ALTER TABLE `educational_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_infos`
--
ALTER TABLE `family_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personalinfos`
--
ALTER TABLE `personalinfos`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `appraisals`
--
ALTER TABLE `appraisals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `educational_infos`
--
ALTER TABLE `educational_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_infos`
--
ALTER TABLE `family_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personalinfos`
--
ALTER TABLE `personalinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
