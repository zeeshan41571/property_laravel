-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2024 at 01:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guestJsonData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`guestJsonData`)),
  `arrival_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrival_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlLink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ownerUrlLink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`instruction`)),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `guestJsonData`, `arrival_date`, `arrival_time`, `departure_date`, `departure_time`, `urlLink`, `ownerUrlLink`, `instruction`, `user_id`, `property_id`, `created_at`, `updated_at`) VALUES
(10, '{\"guests_data\":{\"guest_1\":{\"guestName\":\"Checking\",\"guestSurName\":\"check\",\"guestEmail\":\"check@test.com\",\"guestPhone\":\"afsdlj\",\"guestStreet\":\"sdlfjk\",\"guestStreet1\":\"asdflkj\",\"guestStreet2\":\"sadflkj\",\"guestPostal\":\"adslkfj\",\"guestCity\":\"lahore\",\"guestCountry\":\"Antarctica\"}}}', '2024-07-11', '18:45', '2024-07-16', '18:45', 'https://example.com/form.html?uid=d66unp63k', 'https://example.com/form.html?uid=orznzrww0', '{\"instruction\":{\"instruction\":[\"Helo\"]}}', 1, 6, '2024-07-13 05:45:51', '2024-07-29 09:33:24'),
(13, '{\"guests_data\":{\"guest_1\":{\"guestName\":\"First\",\"guestSurName\":\"Name\",\"guestEmail\":\"name@test.com\",\"guestPhone\":\"45678\",\"guestStreet\":\"asasd\",\"guestStreet1\":\"asdf\",\"guestStreet2\":\"dasf\",\"guestPostal\":\"8768\",\"guestCity\":\"Lahore\",\"guestCountry\":\"Pakistan\"},\"guest_2\":{\"guestName\":\"Last\",\"guestSurName\":\"Name\",\"guestEmail\":\"tow@testc.om\",\"guestPhone\":\"56787\",\"guestStreet\":\"alsfjl\",\"guestStreet1\":\"adsf\",\"guestStreet2\":\"dfls\",\"guestPostal\":\"adslfkjq\",\"guestCity\":\"Karachi\",\"guestCountry\":\"Pakistan\"}}}', '2024-07-08', '19:51', '2024-07-25', '18:51', 'https://example.com/form.html?uid=8t7srxtjq', 'https://example.com/form.html?uid=4l77xetjz', '{\"instruction\":{\"instruction\":[\"Collect Payement\",\"Collect Payment 2\",\"New\"]}}', 1, 4, '2024-07-13 05:52:27', '2024-07-13 06:01:59'),
(14, '{\"guests_data\":{\"guest_1\":{\"guestName\":\"Murtaza\",\"guestSurName\":\"Name\",\"guestEmail\":\"first@test.com\",\"guestPhone\":\"afasdljk\",\"guestStreet\":\"aasldkjf\",\"guestStreet1\":\"FLKA\",\"guestStreet2\":\"SADLKJsadj\",\"guestPostal\":\"asdfjl\",\"guestCity\":\"Lahore\",\"guestCountry\":\"Pakistan\"},\"guest_2\":{\"guestName\":\"Second\",\"guestSurName\":\"Laates\",\"guestEmail\":\"lates@test.com\",\"guestPhone\":\"lkjf\",\"guestStreet\":\"sdaflkj\",\"guestStreet1\":\"asdlkj\",\"guestStreet2\":\"asdflkj\",\"guestPostal\":\"asdflkj\",\"guestCity\":\"Karachi\",\"guestCountry\":\"Pakistan\"}}}', '2024-07-16', '16:04', '2024-07-22', '19:03', 'https://example.com/form.html?uid=ca2uoe1ny', 'https://example.com/form.html?uid=muhi14xnx', '{\"instruction\":{\"instruction\":[\"Collect Payment 1\",\"Collect Bands\"]}}', 1, 8, '2024-07-13 06:04:06', '2024-07-13 06:04:57'),
(15, '{\"guests_data\":{\"guest_1\":{\"guestName\":\"Mr. X\",\"guestSurName\":\"Last Name\",\"guestEmail\":\"test@email.com\",\"guestPhone\":\"12345678\",\"guestStreet\":\"some\",\"guestStreet1\":\"street\",\"guestStreet2\":\"no\",\"guestPostal\":\"54000\",\"guestCity\":\"Lahore\",\"guestCountry\":\"Pakistan\"},\"guest_2\":{\"guestName\":\"Guest 2\",\"guestSurName\":\"Last Name\",\"guestEmail\":\"test@email.com\",\"guestPhone\":\"12345678\",\"guestStreet\":\"Some\",\"guestStreet1\":\"Street\",\"guestStreet2\":\"No\",\"guestPostal\":\"53000\",\"guestCity\":\"Lahore\",\"guestCountry\":\"Pakistan\"}}}', '2024-07-15', '20:53', '2024-07-21', '19:53', 'https://example.com/form.html?uid=3d2yv98ds', 'https://example.com/form.html?uid=tth6ow1pt', '{\"instruction\":{\"instruction\":[\"Collect Band Charges\",\"Collect Parking Fee\"]}}', 1, 8, '2024-07-13 06:54:57', '2024-07-13 06:55:31'),
(16, '{\"guests_data\":{\"guest_1\":{\"guestName\":\"GR1\",\"guestSurName\":\"New\",\"guestEmail\":\"new@test.com\",\"guestPhone\":\"234234\",\"guestStreet\":\"adsflk\",\"guestStreet1\":\"asdflj\",\"guestStreet2\":\"asdflj\",\"guestPostal\":\"asdkjf\",\"guestCity\":\"lahore\",\"guestCountry\":\"Pakistan\"},\"guest_2\":{\"guestName\":\"GR2\",\"guestSurName\":\"adlkfj\",\"guestEmail\":\"asdl@hello.com\",\"guestPhone\":\"234\",\"guestStreet\":\"adf\",\"guestStreet1\":\"ads\",\"guestStreet2\":\"adsflkj\",\"guestPostal\":\"asdflj\",\"guestCity\":\"Karachi\",\"guestCountry\":\"Pakistan\"}}}', '2024-07-18', '19:26', '2024-07-30', '20:26', 'https://example.com/form.html?uid=w9g2zgih0', 'https://example.com/form.html?uid=uua4lr81k', '{\"instruction\":{\"instruction\":[\"Hello\"]}}', 1, 4, '2024-07-15 06:26:45', '2024-07-15 06:31:19'),
(19, '{\"guests_data\":{\"guest_1\":{\"guestName\":\"New\",\"guestSurName\":\"Tes\",\"guestEmail\":\"test@tests.com\",\"guestPhone\":\"394u243984\",\"guestStreet\":\"asdfljk\",\"guestStreet1\":\"adsflkj\",\"guestStreet2\":\"asldkj\",\"guestPostal\":\"aljk\",\"guestCity\":\"Lahore\",\"guestCountry\":\"Pakistan\"}}}', '2024-07-26', '18:25', '2024-08-01', '18:24', 'https://example.com/form.html?uid=maqmswt1x', 'https://example.com/form.html?uid=we29c8eiz', '{\"instruction\":{\"instruction\":[\"Helo\"]}}', 1, 7, '2024-07-26 08:22:00', '2024-07-26 08:22:00'),
(20, '{\"guests_data\":{\"guest_1\":{\"guestName\":\"lsfjlkj\",\"guestSurName\":\"ddlfkj\",\"guestEmail\":\"adslfjk@flakj.com\",\"guestPhone\":\"dsaljf\",\"guestStreet\":\"sdlfjk\",\"guestStreet1\":\"dalsfj\",\"guestStreet2\":\"asdlfjk\",\"guestPostal\":\"sdaflkj\",\"guestCity\":\"karachi\",\"guestCountry\":\"Pakistan\"}}}', '2024-07-03', '18:27', '2024-07-30', '18:27', 'https://example.com/form.html?uid=onpmt6ty1', 'https://example.com/form.html?uid=6boun20z1', '{\"instruction\":{\"instruction\":[\"alksdjflk\"]}}', 1, 6, '2024-07-26 08:23:13', '2024-07-26 08:23:13'),
(21, '{\"guests_data\":{\"guest_1\":{\"guestName\":\"hello\",\"guestSurName\":\"asdlfj\",\"guestEmail\":\"adslkfj@test.co\",\"guestPhone\":\"39847298\",\"guestStreet\":\"alskfdj\",\"guestStreet1\":\"aldfj\",\"guestStreet2\":\"dfslj\",\"guestPostal\":\"asdlfkj\",\"guestCity\":\"karachi\",\"guestCountry\":\"Afghanistan\"}}}', '2024-07-26', '18:02', '2024-07-26', '18:04', 'https://example.com/form.html?uid=xh8c8e5us', 'https://example.com/form.html?uid=kd7xniml7', '{\"instruction\":{\"instruction\":[\"hello\"]}}', 1, 8, '2024-07-26 08:59:06', '2024-07-26 08:59:06');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_03_073441_create_roles_table', 2),
(5, '2024_07_03_074051_create_role_user_table', 3),
(6, '2024_07_08_105238_create_properties_table', 4),
(7, '2024_07_08_121824_add_contact_person_phone_parking_no_to_properties_table', 5),
(8, '2024_07_09_135803_guest_data', 6),
(9, '2024_07_22_124848_create_parkings_table', 7),
(12, '2024_07_29_090419_create_owner_parkings_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `owner_parkings`
--

CREATE TABLE `owner_parkings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apartment_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parking_spot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_license_plate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owner_parkings`
--

INSERT INTO `owner_parkings` (`id`, `name`, `surname`, `phone_number`, `apartment_number`, `parking_spot`, `year`, `car_brand`, `car_color`, `car_license_plate`, `created_at`, `updated_at`) VALUES
(2, 'Owner', 'Parking', '32423423', '232k', 'J78', '2027', 'BMW', 'Black', 'LEP-3455', '2024-07-29 06:11:12', '2024-07-29 06:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `parkings`
--

CREATE TABLE `parkings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apartment_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parking_spot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `car_brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_license_plate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parkings`
--

INSERT INTO `parkings` (`id`, `name`, `surname`, `phone_number`, `apartment_number`, `parking_spot`, `arrival_date`, `departure_date`, `car_brand`, `car_color`, `car_license_plate`, `created_at`, `updated_at`) VALUES
(5, 'Guest', 'Parking', '3423423', 'Some', 'Parking Spot', '2024-07-29', '2024-07-30', 'Mercedes', 'White', 'LMEE-2323', '2024-07-29 06:14:57', '2024-07-29 06:14:57');

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
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parking_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `title`, `description`, `location`, `created_at`, `updated_at`, `contact_person`, `contact_phone`, `parking_no`) VALUES
(4, 1, 'Appartment No 1', 'Very beautiful appartment', 'Lahore', '2024-07-08 07:29:11', '2024-07-30 06:10:24', 'Tahir Mehmood', '23456789', '23J'),
(6, 15, 'Guest House', 'Guest House at Multan', 'Multan', '2024-07-08 07:36:23', '2024-07-08 07:36:35', 'Amiq', '12345678', '4'),
(7, 1, 'Villa', 'Villa at lahore', 'Lahore', '2024-07-08 07:39:40', '2024-07-08 07:39:40', 'Mr. X', '728466897984237', '6'),
(8, 11, 'New property', 'New property by user', 'Karachi', '2024-07-10 06:09:02', '2024-07-10 06:09:02', 'Some one', '3234234', '4');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(11, 'admin', '2024-07-04 06:26:47', '2024-07-04 06:26:47'),
(12, 'owner', '2024-07-04 06:27:00', '2024-07-04 06:27:00'),
(17, 'staff', '2024-07-10 05:36:36', '2024-07-10 05:36:36'),
(18, 'guest', '2024-07-10 05:36:47', '2024-07-10 05:36:47'),
(19, 'parking manager', '2024-07-24 05:10:29', '2024-07-24 05:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(13, 13, 12, NULL, NULL),
(14, 14, 12, NULL, NULL),
(16, 1, 11, NULL, NULL),
(17, 12, 12, NULL, NULL),
(18, 11, 12, NULL, NULL),
(21, 16, 11, NULL, NULL),
(22, 17, 12, NULL, NULL),
(23, 15, 12, NULL, NULL),
(24, 18, 12, NULL, NULL),
(28, 20, 18, NULL, NULL),
(30, 21, 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
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
(1, 'Admin', 'admin@shaikhalis.com', NULL, '$2y$12$RdtMn49DhRp1q4PLyd9Za.1dOaD7eBCK/TywyNgVOja6phZsmp.mC', NULL, '2024-07-02 08:45:35', '2024-07-26 10:48:39'),
(11, 'Hello', 'hello@test.com', NULL, '$2y$12$sf/zf3pErfqAFaenhBeppOzloxdDBMCVaqRaFOxjuunP6cNZaENjq', NULL, '2024-07-05 05:43:23', '2024-07-05 05:43:23'),
(12, 'test new', 'testnew@gmail.com', NULL, '$2y$12$E.aShZUNv..y6vFav4SZYOE0TnkvweFom0p6dUOwpyDr4i2X8sVQS', NULL, '2024-07-05 06:04:26', '2024-07-05 06:04:26'),
(13, 'New user', 'newuser@gmail.com', NULL, '$2y$12$FOm.7BW7byqKXXtglN3W.umxHRAoiURqEh50ogmeN5lyQgXHqZn1m', NULL, '2024-07-05 06:05:17', '2024-07-05 06:05:17'),
(14, 'laravel', 'laravel@gmail.com', NULL, '$2y$12$/7zBih3LJrprtEV55xLup.i0Vth8id4Cyiat8rIio9CGMHNLOSK92', NULL, '2024-07-05 06:09:03', '2024-07-05 06:09:03'),
(15, 'laravel new', 'laravelnew@gmail.com', NULL, '$2y$12$YCMeXog.03Dh3A7kWUxOPe6T38/m.dfCqpMkXtNAENbqfh1IA9nkm', NULL, '2024-07-05 06:10:10', '2024-07-05 06:10:10'),
(16, 'zeeshan ikram', 'zeeshan@test.com', NULL, '$2y$12$LQfSNWmdEr0OqiKthrmq0uHkiRqZx8kVsQ2K.jmMDQGS/uXtc/bfu', NULL, '2024-07-05 06:54:14', '2024-07-05 06:54:14'),
(17, 'laravel zeeshan', 'laravelzee@gmail.com', NULL, '$2y$12$/SbrxGld7ZU8ZfK/OVKePOs7amZiFITdUHD9XPszadu9aDrle.A8y', NULL, '2024-07-05 06:56:03', '2024-07-05 06:56:03'),
(18, 'GM', 'qasminew@test.com', NULL, '$2y$12$AS.UUxISHaPulJQseEDA6eYYr2cuTWIudK5wdimm6MbSiU3G/mkdO', NULL, '2024-07-09 03:37:16', '2024-07-09 03:37:16'),
(20, 'check', 'check@tst.com', NULL, '$2y$12$/lqjL/1RT2fvVX5zO2S3vOMponN9/n1Dh3qXn.Ueh1BxdatnFvyUa', NULL, '2024-07-10 06:00:46', '2024-07-10 06:00:46'),
(21, 'Parking Manager', 'parking_manager@test.com', NULL, '$2y$12$IJCfnsa0JmzLUCjWXXjB7eqi5zrKs3oZ7HuFLE2KJgovwQ/QJ7k7a', NULL, '2024-07-24 05:11:13', '2024-07-24 05:11:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guests_user_id_foreign` (`user_id`),
  ADD KEY `guests_property_id_foreign` (`property_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_parkings`
--
ALTER TABLE `owner_parkings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkings`
--
ALTER TABLE `parkings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `owner_parkings`
--
ALTER TABLE `owner_parkings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parkings`
--
ALTER TABLE `parkings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
