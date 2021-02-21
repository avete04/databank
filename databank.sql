-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for databank
CREATE DATABASE IF NOT EXISTS `databank` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `databank`;

-- Dumping structure for table databank.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table databank.departments: ~4 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
	(1, 'HR', '2021-02-12 14:55:53', '2021-02-12 23:39:05'),
	(2, 'IT', '2021-02-12 14:56:51', '2021-02-12 14:56:51'),
	(3, 'MARKETING', '2021-02-12 17:50:38', '2021-02-12 17:50:38'),
	(4, 'CITCS', '2021-02-14 03:27:45', '2021-02-14 03:27:45');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping structure for table databank.designations
CREATE TABLE IF NOT EXISTS `designations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `department_id` int(10) unsigned NOT NULL,
  `designation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table databank.designations: ~3 rows (approximately)
/*!40000 ALTER TABLE `designations` DISABLE KEYS */;
INSERT INTO `designations` (`id`, `department_id`, `designation_name`, `created_at`, `updated_at`) VALUES
	(4, 2, 'Encoder', '2021-02-13 06:12:39', '2021-02-13 15:11:21'),
	(5, 2, 'Web Developer', '2021-02-13 15:11:35', '2021-02-13 15:11:35'),
	(6, 4, 'PROFESSOR', '2021-02-14 03:28:04', '2021-02-14 03:28:04');
/*!40000 ALTER TABLE `designations` ENABLE KEYS */;

-- Dumping structure for table databank.dropoffpoints
CREATE TABLE IF NOT EXISTS `dropoffpoints` (
  `id` bigint(20) unsigned NOT NULL,
  `pahatid_id` bigint(20) unsigned NOT NULL,
  `maps_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `landmark` text COLLATE utf8mb4_unicode_ci,
  `lng` decimal(10,6) NOT NULL,
  `lat` decimal(10,6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table databank.dropoffpoints: ~1 rows (approximately)
/*!40000 ALTER TABLE `dropoffpoints` DISABLE KEYS */;
INSERT INTO `dropoffpoints` (`id`, `pahatid_id`, `maps_address`, `address`, `landmark`, `lng`, `lat`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Test St. 123 East Ave.', '#13B Basa St. West Tapinac', 'null', 14.838600, 120.284200, '2020-12-28 15:36:31', '2020-12-28 15:36:31');
/*!40000 ALTER TABLE `dropoffpoints` ENABLE KEYS */;

-- Dumping structure for table databank.dropoff_addresses
CREATE TABLE IF NOT EXISTS `dropoff_addresses` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `maps_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` text COLLATE utf8mb4_unicode_ci,
  `lng` decimal(10,6) NOT NULL,
  `lat` decimal(10,6) NOT NULL,
  `address_type` enum('Home','Work','Recent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table databank.dropoff_addresses: ~2 rows (approximately)
/*!40000 ALTER TABLE `dropoff_addresses` DISABLE KEYS */;
INSERT INTO `dropoff_addresses` (`id`, `user_id`, `maps_address`, `address`, `landmark`, `lng`, `lat`, `address_type`, `created_at`, `updated_at`) VALUES
	(52, 3, '13W Olongapo City', '#13B Basa St. West Tapinac', NULL, 14.838600, 120.284200, 'Recent', '2020-12-07 00:47:38', '2020-12-07 00:47:38'),
	(53, 3, '13W Olongapo City', '#13B Basa St. West Tapinac', NULL, 14.838600, 120.284200, 'Recent', '2020-12-07 01:09:21', '2020-12-07 01:09:21');
/*!40000 ALTER TABLE `dropoff_addresses` ENABLE KEYS */;

-- Dumping structure for table databank.educational_infos
CREATE TABLE IF NOT EXISTS `educational_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table databank.educational_infos: ~3 rows (approximately)
/*!40000 ALTER TABLE `educational_infos` DISABLE KEYS */;
INSERT INTO `educational_infos` (`id`, `user_id`, `school`, `course`, `start`, `end`, `created_at`, `updated_at`) VALUES
	(3, 5, 'Lyceum', 'BSCS', '2021-02-06', '2021-02-18', '2021-02-20 11:57:53', '2021-02-20 12:52:56'),
	(4, 6, 'PUP Manila', 'Bachelor\'s of Science in Information Technology', '2021-02-09', '2024-02-13', '2021-02-20 12:54:41', '2021-02-20 12:54:41'),
	(7, 5, 'PLMan', 'Computer Engineer', '2021-02-03', '2021-02-25', '2021-02-20 13:15:06', '2021-02-20 13:34:20');
/*!40000 ALTER TABLE `educational_infos` ENABLE KEYS */;

-- Dumping structure for table databank.emergency_contacts
CREATE TABLE IF NOT EXISTS `emergency_contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table databank.emergency_contacts: ~3 rows (approximately)
/*!40000 ALTER TABLE `emergency_contacts` DISABLE KEYS */;
INSERT INTO `emergency_contacts` (`id`, `user_id`, `name`, `relationship`, `contact_no`, `created_at`, `updated_at`) VALUES
	(2, 5, 'Sample', 'sample', '0905151215112', '2021-02-20 05:57:41', '2021-02-20 13:21:29'),
	(3, 6, 'John', 'Father', '09526254152', '2021-02-20 06:33:36', '2021-02-20 06:33:36'),
	(4, 10, 'New', 'Mother', '031626416', '2021-02-20 06:36:27', '2021-02-20 06:36:27');
/*!40000 ALTER TABLE `emergency_contacts` ENABLE KEYS */;

-- Dumping structure for table databank.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table databank.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table databank.family_infos
CREATE TABLE IF NOT EXISTS `family_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_day` date NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table databank.family_infos: ~3 rows (approximately)
/*!40000 ALTER TABLE `family_infos` DISABLE KEYS */;
INSERT INTO `family_infos` (`id`, `user_id`, `name`, `relationship`, `birth_day`, `contact_no`, `created_at`, `updated_at`) VALUES
	(3, 5, 'John Does', 'Father', '1979-03-22', '0904151525151', '2021-02-20 11:00:12', '2021-02-20 13:31:50'),
	(4, 6, 'John Darts', 'Brother', '1974-04-23', '091524515151', '2021-02-20 11:00:52', '2021-02-20 11:00:52'),
	(6, 10, 'Sample Samskie2', 'Brother', '1994-04-23', '09251452522', '2021-02-21 03:59:22', '2021-02-21 03:59:30');
/*!40000 ALTER TABLE `family_infos` ENABLE KEYS */;

-- Dumping structure for table databank.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table databank.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2021_02_12_122023_create_designations_table', 1),
	(4, '2021_02_12_122134_create_departments_table', 1),
	(5, '2021_02_12_124745_create_personalinfos_table', 1),
	(6, '2021_02_20_031556_create_emergency_contacts_table', 2),
	(7, '2021_02_20_064130_create_family_infos_table', 3),
	(8, '2021_02_20_110207_create_educational_infos_table', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table databank.personalinfos
CREATE TABLE IF NOT EXISTS `personalinfos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employment_of_spouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_children` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table databank.personalinfos: ~3 rows (approximately)
/*!40000 ALTER TABLE `personalinfos` DISABLE KEYS */;
INSERT INTO `personalinfos` (`id`, `user_id`, `religion`, `marital_status`, `employment_of_spouse`, `no_of_children`, `created_at`, `updated_at`) VALUES
	(3, 5, 'Christians', 'Single', 'Yes', '0', '2021-02-13 14:39:04', '2021-02-20 13:18:43'),
	(4, 6, 'Christian', 'Married', 'Yes', '2', '2021-02-13 14:41:29', '2021-02-13 15:07:51'),
	(5, 10, 'Catholic', 'Married', 'None', '3', '2021-02-20 06:36:59', '2021-02-20 06:36:59');
/*!40000 ALTER TABLE `personalinfos` ENABLE KEYS */;

-- Dumping structure for table databank.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_date` date DEFAULT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` longtext COLLATE utf8mb4_unicode_ci,
  `birth_day` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `user_level` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table databank.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `join_date`, `employee_id`, `mobile_no`, `profile_image`, `birth_day`, `gender`, `address`, `department_id`, `designation_id`, `user_level`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
	(5, 'Role', 'Febry', 'asdasd@sdasda.com', NULL, '$2y$10$zqHmEr7RDxqaeoTeQ98HzOxyBxp.liy3PGlztKn8iWEKmPqIfMHne', '2021-02-11', 'EM-YAmfw', '1234657', NULL, '2021-02-18', 'Female', 'muntinlupa city', 2, 5, 2, 1, NULL, '2021-02-13 07:40:27', '2021-02-20 13:45:19'),
	(6, 'vensons', 'taladtad', 'admin@admin.com', NULL, '$2y$10$AVF.Bdpgz4yrRzBBvH6Ok.63RabM2XBc.Td2lPi7/Xtwfw8BehRqK', '2018-04-16', 'EM-qUa4Z', '09052515222', NULL, '2021-02-24', 'Female', 'Cupang Muntinlupa City', 2, 6, 1, 1, NULL, '2021-02-13 07:49:08', '2021-02-20 13:48:30'),
	(10, 'sample', 'sample', 'sample@sample.com', NULL, '$2y$10$Kxm1EgyA.W0MBeH3hUdTGOw05tcdlfO26LAx7jghlNoB.iIqQ7YJG', '2015-02-10', 'EM-RWiEn', '094515121515', NULL, NULL, NULL, NULL, 4, 6, 2, 1, NULL, '2021-02-14 03:28:35', '2021-02-14 03:28:35'),
	(11, 'employee', 'employee', 'employee@employee.com', NULL, '$2y$10$IkkLQtvNnEzrv/pGPHJuVOdKwp9rgDpvPDmD7rZK1bGZmhLaqB.fm', '2016-04-23', 'EM-5SSXA', '090514251522', NULL, '1995-02-11', 'Male', 'Cupang Muntinlupa City', 2, 5, 2, 1, NULL, '2021-02-21 03:26:44', '2021-02-21 03:55:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
