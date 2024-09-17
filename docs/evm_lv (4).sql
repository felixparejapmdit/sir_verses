-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 10:52 AM
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
-- Database: `evm_lv`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_id` bigint(20) UNSIGNED DEFAULT NULL,
  `changes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `model`, `model_id`, `changes`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, 1, 'created', 'PMD-IT', 1, 'add new group', '172.18.125.134', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', '2024-09-16 18:18:52', '2024-09-16 18:18:52'),
(2, 1, 'created', 'JL Canque', 2, 'add new user', '172.18.125.134', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', '2024-09-16 18:19:19', '2024-09-16 18:19:19'),
(3, 1, 'updated', 'Felix Pareja', 1, 'update the user', '172.18.125.134', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', '2024-09-16 18:19:45', '2024-09-16 18:19:45'),
(4, 1, 'updated', 'JL Canque', 2, 'update the user', '172.18.125.134', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', '2024-09-16 18:19:51', '2024-09-16 18:19:51'),
(5, 1, 'updated', 'JL Canque', 2, 'update the user', '172.18.125.134', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', '2024-09-16 18:23:36', '2024-09-16 18:23:36'),
(6, 1, 'updated', 'JL Canque', 2, 'update the user', '172.18.125.134', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', '2024-09-16 18:24:43', '2024-09-16 18:24:43'),
(7, 1, 'updated', 'Felix Pareja', 1, 'update the user', '172.18.125.134', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', '2024-09-16 18:24:48', '2024-09-16 18:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `api_documentations`
--

CREATE TABLE `api_documentations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `endpoint` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `record_id` bigint(20) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `change_timestamp` datetime NOT NULL,
  `change_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `group_permissions`
--

CREATE TABLE `group_permissions` (
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `accessrights` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locale_congregations`
--

CREATE TABLE `locale_congregations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_06_015242_create_districts_table', 1),
(6, '2024_02_06_015242_create_locale_congregations_table', 1),
(7, '2024_02_06_015242_create_pv_events_table', 1),
(8, '2024_02_06_015421_create_pv_event_types_table', 1),
(9, '2024_02_06_015520_create_pv_infos_table', 1),
(10, '2024_02_06_015601_create_pv_lessons_table', 1),
(11, '2024_02_06_015602_create_pv_lessons_info_table', 1),
(12, '2024_02_06_020105_create_activity_logs_table', 1),
(13, '2024_02_06_020105_create_audit_logs_table', 1),
(14, '2024_02_06_020105_create_search_logs_table', 1),
(15, '2024_02_06_020105_create_transcriptions_table', 1),
(16, '2024_02_06_020105_create_translations_table', 1),
(17, '2024_02_06_020132_create_pv_verses_info_table', 1),
(18, '2024_02_06_020407_create_tags_table', 1),
(19, '2024_03_06_020133_create_pv_verse_combinations_table', 1),
(20, '2024_04_06_020429_create_verse_tags_table', 1),
(21, '2024_08_29_011542_create_permission_groups_table', 1),
(22, '2024_08_29_011559_create_users_groups_table', 1),
(23, '2024_08_29_011612_create_group_permissions_table', 1),
(24, '2024_08_29_011631_create_permissions_table', 1),
(25, '2024_08_29_011714_create_permission_categories_table', 1),
(26, '2024_08_29_092206_add_username_to_users_table', 1),
(27, '2024_09_16_084544_create_api_documentations_table', 1),
(28, '2024_09_17_022221_add_activated_to_users_table', 2);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_categories`
--

CREATE TABLE `permission_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'PMD-IT', NULL, '2024-09-16 18:18:52', '2024-09-16 18:18:52');

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
-- Table structure for table `pv_events`
--

CREATE TABLE `pv_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pv_events`
--

INSERT INTO `pv_events` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Pastoral Visitation', NULL, '2024-09-16 19:42:48', '2024-09-16 19:42:48'),
(2, 'Pangkalahatang Klase', NULL, '2024-09-16 20:07:44', '2024-09-16 20:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `pv_event_types`
--

CREATE TABLE `pv_event_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pv_event_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pv_event_types`
--

INSERT INTO `pv_event_types` (`id`, `pv_event_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Anniversary Thanksgiving', NULL, '2024-09-16 19:43:40', '2024-09-16 19:43:40'),
(2, 1, 'Dedication of House of Worship', NULL, '2024-09-16 19:43:54', '2024-09-16 19:43:54'),
(3, 1, 'Ordination', NULL, '2024-09-16 19:44:32', '2024-09-16 19:44:32'),
(4, 1, 'SFM Graduation', NULL, '2024-09-16 19:44:39', '2024-09-16 19:44:39'),
(5, 1, 'Special Worship Service', NULL, '2024-09-16 19:44:56', '2024-09-16 19:44:56'),
(6, 1, 'Year-end Thanksgiving', NULL, '2024-09-16 19:45:05', '2024-09-16 19:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `pv_infos`
--

CREATE TABLE `pv_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pv_event_id` bigint(20) UNSIGNED NOT NULL,
  `pv_event_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_locked` tinyint(4) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pv_lessons`
--

CREATE TABLE `pv_lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pv_lesson_info`
--

CREATE TABLE `pv_lesson_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pv_info_id` bigint(20) UNSIGNED NOT NULL,
  `pv_lesson_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pv_verses_info`
--

CREATE TABLE `pv_verses_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pv_lesson_id` bigint(20) UNSIGNED NOT NULL,
  `verse` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translation_id` bigint(20) UNSIGNED NOT NULL,
  `revision_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verse_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verse_explanation` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` int(11) NOT NULL,
  `index` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pv_verse_combinations`
--

CREATE TABLE `pv_verse_combinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pv_lesson_id` bigint(20) UNSIGNED NOT NULL,
  `pv_verse_info_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `search_logs`
--

CREATE TABLE `search_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `search_query` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `search_date` datetime NOT NULL,
  `results_count` int(11) NOT NULL,
  `clicked_result_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transcriptions`
--

CREATE TABLE `transcriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pv_event_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `transcription_date` datetime NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `abbreviation` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activated` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `activated`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Felix Pareja', 'admin', 'felixpareja.pmdit07@gmail.com', 1, NULL, '$2y$12$NUmDuTH3BBb2W7xtUqKYsuElX4EqnNngG38NZBzLJvnbLVsBvza2W', NULL, '2024-09-16 18:17:08', '2024-09-16 18:24:48'),
(2, 'JL Canque', 'jlcanque', 'jlcanque@yahoo.com', 1, NULL, '$2y$12$m3Eva/J2xfCPhCFE4/M6LuXXK6GHAQfGy17X.Eis2NXYLTjpCOQaS', NULL, '2024-09-16 18:19:19', '2024-09-16 18:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(2, 1),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `verse_tags`
--

CREATE TABLE `verse_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `pv_verses_info_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_index` (`user_id`);

--
-- Indexes for table `api_documentations`
--
ALTER TABLE `api_documentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audit_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `locale_congregations`
--
ALTER TABLE `locale_congregations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locale_congregations_district_id_foreign` (`district_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_categories`
--
ALTER TABLE `permission_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_categories_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pv_events`
--
ALTER TABLE `pv_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pv_event_types`
--
ALTER TABLE `pv_event_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pv_event_types_pv_event_id_foreign` (`pv_event_id`);

--
-- Indexes for table `pv_infos`
--
ALTER TABLE `pv_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pv_infos_pv_event_id_foreign` (`pv_event_id`),
  ADD KEY `pv_infos_pv_event_type_id_foreign` (`pv_event_type_id`);

--
-- Indexes for table `pv_lessons`
--
ALTER TABLE `pv_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pv_lesson_info`
--
ALTER TABLE `pv_lesson_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pv_lesson_info_pv_info_id_foreign` (`pv_info_id`),
  ADD KEY `pv_lesson_info_pv_lesson_id_foreign` (`pv_lesson_id`);

--
-- Indexes for table `pv_verses_info`
--
ALTER TABLE `pv_verses_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pv_verses_info_pv_lesson_id_foreign` (`pv_lesson_id`),
  ADD KEY `pv_verses_info_translation_id_foreign` (`translation_id`);

--
-- Indexes for table `pv_verse_combinations`
--
ALTER TABLE `pv_verse_combinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pv_verse_combinations_pv_lesson_id_foreign` (`pv_lesson_id`),
  ADD KEY `pv_verse_combinations_pv_verse_info_id_foreign` (`pv_verse_info_id`);

--
-- Indexes for table `search_logs`
--
ALTER TABLE `search_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `search_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transcriptions`
--
ALTER TABLE `transcriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transcriptions_pv_event_id_foreign` (`pv_event_id`),
  ADD KEY `transcriptions_created_by_foreign` (`created_by`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD KEY `users_groups_user_id_foreign` (`user_id`),
  ADD KEY `users_groups_group_id_foreign` (`group_id`);

--
-- Indexes for table `verse_tags`
--
ALTER TABLE `verse_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `verse_tags_tag_id_foreign` (`tag_id`),
  ADD KEY `verse_tags_pv_verses_info_id_foreign` (`pv_verses_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `api_documentations`
--
ALTER TABLE `api_documentations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locale_congregations`
--
ALTER TABLE `locale_congregations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_categories`
--
ALTER TABLE `permission_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pv_events`
--
ALTER TABLE `pv_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pv_event_types`
--
ALTER TABLE `pv_event_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pv_infos`
--
ALTER TABLE `pv_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pv_lessons`
--
ALTER TABLE `pv_lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pv_lesson_info`
--
ALTER TABLE `pv_lesson_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pv_verses_info`
--
ALTER TABLE `pv_verses_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pv_verse_combinations`
--
ALTER TABLE `pv_verse_combinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `search_logs`
--
ALTER TABLE `search_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transcriptions`
--
ALTER TABLE `transcriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `verse_tags`
--
ALTER TABLE `verse_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD CONSTRAINT `audit_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `locale_congregations`
--
ALTER TABLE `locale_congregations`
  ADD CONSTRAINT `locale_congregations_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `permission_categories`
--
ALTER TABLE `permission_categories`
  ADD CONSTRAINT `permission_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `permission_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_categories_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pv_event_types`
--
ALTER TABLE `pv_event_types`
  ADD CONSTRAINT `pv_event_types_pv_event_id_foreign` FOREIGN KEY (`pv_event_id`) REFERENCES `pv_events` (`id`);

--
-- Constraints for table `pv_infos`
--
ALTER TABLE `pv_infos`
  ADD CONSTRAINT `pv_infos_pv_event_id_foreign` FOREIGN KEY (`pv_event_id`) REFERENCES `pv_events` (`id`),
  ADD CONSTRAINT `pv_infos_pv_event_type_id_foreign` FOREIGN KEY (`pv_event_type_id`) REFERENCES `pv_event_types` (`id`);

--
-- Constraints for table `pv_lesson_info`
--
ALTER TABLE `pv_lesson_info`
  ADD CONSTRAINT `pv_lesson_info_pv_info_id_foreign` FOREIGN KEY (`pv_info_id`) REFERENCES `pv_infos` (`id`),
  ADD CONSTRAINT `pv_lesson_info_pv_lesson_id_foreign` FOREIGN KEY (`pv_lesson_id`) REFERENCES `pv_lessons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pv_verses_info`
--
ALTER TABLE `pv_verses_info`
  ADD CONSTRAINT `pv_verses_info_pv_lesson_id_foreign` FOREIGN KEY (`pv_lesson_id`) REFERENCES `pv_lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pv_verses_info_translation_id_foreign` FOREIGN KEY (`translation_id`) REFERENCES `translations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pv_verse_combinations`
--
ALTER TABLE `pv_verse_combinations`
  ADD CONSTRAINT `pv_verse_combinations_pv_lesson_id_foreign` FOREIGN KEY (`pv_lesson_id`) REFERENCES `pv_lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pv_verse_combinations_pv_verse_info_id_foreign` FOREIGN KEY (`pv_verse_info_id`) REFERENCES `pv_verses_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `search_logs`
--
ALTER TABLE `search_logs`
  ADD CONSTRAINT `search_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transcriptions`
--
ALTER TABLE `transcriptions`
  ADD CONSTRAINT `transcriptions_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transcriptions_pv_event_id_foreign` FOREIGN KEY (`pv_event_id`) REFERENCES `pv_events` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `users_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `permission_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `verse_tags`
--
ALTER TABLE `verse_tags`
  ADD CONSTRAINT `verse_tags_pv_verses_info_id_foreign` FOREIGN KEY (`pv_verses_info_id`) REFERENCES `pv_verses_info` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `verse_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
