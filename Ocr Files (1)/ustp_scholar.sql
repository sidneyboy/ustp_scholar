-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 06:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ustp_scholar`
--

-- --------------------------------------------------------

--
-- Table structure for table `academmic_years`
--

CREATE TABLE `academmic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academmic_years`
--

INSERT INTO `academmic_years` (`id`, `school_year`, `created_at`, `updated_at`) VALUES
(1, '2023', NULL, NULL),
(2, '2025', '2023-01-27 16:07:14', '2023-01-27 16:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scholar_id` int(11) NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grade_details_id` int(11) DEFAULT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `scholar_id`, `attachment`, `status`, `created_at`, `updated_at`, `grade_details_id`, `image_type`, `original_file`) VALUES
(23, 4, '1674968253.png', 'Pending', '2023-01-28 20:57:33', '2023-01-28 20:57:33', 33, NULL, '1674968253.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `coordinators`
--

CREATE TABLE `coordinators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coordinators`
--

INSERT INTO `coordinators` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`, `user_type`) VALUES
(3, 'coordinator', 'coordinator', 'coordinator@gmail.com', '$2y$10$V5tbb70s/5sUlFov2zlF1u48ENyEQsBhz/GsO/sHoISlvRiy.UiX2', '2023-01-08 05:07:28', '2023-01-08 05:07:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `created_at`, `updated_at`) VALUES
(2, 'IT', '2023-01-28 16:52:52', '2023-01-28 16:52:52'),
(3, 'Nursing', '2023-01-28 16:52:57', '2023-01-28 16:52:57');

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
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scholar_id` int(11) NOT NULL,
  `subject_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_units` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_grades` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `midterm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_details_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `scholar_id`, `subject_code`, `subject_name`, `subject_units`, `subject_grades`, `status`, `submitted_date`, `school_year`, `semester`, `created_at`, `updated_at`, `midterm`, `final`, `section`, `remarks`, `grade_details_id`) VALUES
(243, 4, 'Remarks\n1CD-Eng101', 'DP-Purposive-Communication', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-29 04:57:26', '2023-01-29 04:57:26', 'MDT-275', 'FNL-2.50', 'SCITIR2', NULL, 33),
(244, 4, 'RK-Passed\n2CD-S5103', 'DP-The-Contemporary-World,', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-29 04:57:26', '2023-01-29 04:57:26', 'MDT-250', 'FNL-2.25', 'SCITIR2', NULL, 33),
(245, 4, 'CDNSTP101b', 'DP-Civic-Welfare-Training-Senvice-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-29 04:57:26', '2023-01-29 04:57:26', 'MDTA.75', 'FNLA.75', 'SCITIR2', NULL, 33),
(246, 4, 'RK-Passed\n4CDSS102', 'DP-Reading-in-Philippine-History', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-29 04:57:26', '2023-01-29 04:57:26', 'MDT-250', 'FNL-2.00', 'SCITIR2', NULL, 33),
(247, 4, 'CD-Math101', 'DP-Mathematics-in-Modern-World', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-29 04:57:26', '2023-01-29 04:57:26', 'MDT-A.75', 'FNL-2.25', 'SCITIR2', NULL, 33),
(248, 4, 'CDPE101d', 'DP-Physical-Activty-Towards-Health-and', 'UN-3', NULL, NULL, NULL, NULL, NULL, '2023-01-29 04:57:27', '2023-01-29 04:57:27', 'MDT-1.00', 'FNLA.75', 'SCATIR2', NULL, 33),
(249, 4, 'CDaTI1', '\'DPntroduction-to-Computing', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-29 04:57:27', '2023-01-29 04:57:27', 'MDT-2.00', 'FNLA.75', 'SCITIR2', NULL, 33),
(250, 4, 'RK-Passed\n8CDIT112', 'DP-Computer-Programing-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-29 04:57:27', '2023-01-29 04:57:27', 'MDT-250', 'FNL-275', 'SCITIR2', NULL, 33);

-- --------------------------------------------------------

--
-- Table structure for table `grade_details`
--

CREATE TABLE `grade_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scholar_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `original_text_from_image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_details`
--

INSERT INTO `grade_details` (`id`, `scholar_id`, `school_id`, `academic_year_id`, `semester`, `created_at`, `updated_at`, `original_text_from_image`, `status`) VALUES
(33, 4, 1, 1, '1st Semester', '2023-01-29 04:57:26', '2023-01-29 04:57:26', '#  Code Descriptive. Units  Section ~Midterm  Final  Re-Exam Remarks\n1CD-Eng101  DP-Purposive-Communication UN3  SCITIR2 MDT-275 FNL-2.50 RK-Passed\n2CD-S5103  DP-The-Contemporary-World, UN3  SCITIR2 MDT-250 FNL-2.25 RK-Passed\n3 CDNSTP101b DP-Civic-Welfare-Training-Senvice-1 UN3  SCITIR2 MDTA.75 FNLA.75 RK-Passed\n4CDSS102  DP-Reading-in-Philippine-History UN3  SCITIR2 MDT-250 FNL-2.00 RK-Passed\n5 CD-Math101  DP-Mathematics-in-Modern-World UN3  SCITIR2 MDT-A.75 FNL-2.25 RK-Passed\n6 CDPE101d  DP-Physical-Activty-Towards-Health-and Fitness-1 ~ UN-3  SCATIR2 MDT-1.00 FNLA.75 RK-Passed\n7 CDaTI1 \'DPntroduction-to-Computing UN3  SCITIR2 MDT-2.00 FNLA.75 RK-Passed\n8CDIT112 DP-Computer-Programing-1 UN3  SCITIR2 MDT-250 FNL-275 RK-Passed', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `incident_reports`
--

CREATE TABLE `incident_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coordinator_id` int(11) NOT NULL,
  `scholar_id` int(11) NOT NULL,
  `report_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_taken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_details_id` int(11) DEFAULT NULL
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
(4, '2023_01_06_124031_create_coordinators_table', 2),
(5, '2023_01_06_125924_create_scholars_table', 3),
(6, '2023_01_08_035506_create_grades_table', 4),
(7, '2023_01_08_035734_create_attachments_table', 5),
(8, '2023_01_08_124812_create_requests_table', 6),
(9, '2023_01_08_125116_create_scholar_requests_table', 7),
(10, '2023_01_09_103456_create_incident_reports_table', 8),
(11, '2023_01_12_031523_add_type_users', 9),
(12, '2023_01_12_031640_add_type_to_scholars', 9),
(13, '2023_01_12_031952_add_type_to_coor', 9),
(14, '2023_01_17_101224_add_columns_to_grades', 10),
(15, '2023_01_17_103638_create_schools_table', 11),
(16, '2023_01_17_103741_create_academmic_years_table', 11),
(17, '2023_01_17_110703_create_grade_details_table', 12),
(18, '2023_01_17_110809_add_column_to_gradesss', 13),
(19, '2023_01_17_112111_add_column_to_attachments', 14),
(20, '2023_01_18_095947_add_column_to_table_grade_details', 15),
(21, '2023_01_19_115942_add_status_to_grade_details', 16),
(22, '2023_01_21_131909_add_status_to_incident_report', 17),
(23, '2023_01_21_135114_add_image_type_to_attachments', 18),
(24, '2023_01_23_134811_create_notifications_table', 19),
(25, '2023_01_27_121219_add_notify_to_column', 20),
(26, '2023_01_27_132153_add_grade_details_id', 21),
(27, '2023_01_27_234135_add_student_no', 22),
(28, '2023_01_28_222639_create_transfer_logs_table', 23),
(29, '2023_01_29_004053_create_courses_table', 24),
(30, '2023_01_29_004422_add_column', 25),
(31, '2023_01_29_010129_add_columsn_to_request', 26),
(32, '2023_01_29_011426_add_year_to_scholar_request', 27),
(33, '2023_01_29_012653_add_year_to_scholar_requestssss', 28),
(34, '2023_01_29_044535_add_origincal_file', 29);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `notify_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `user_type`, `notification_name`, `notification_details`, `status`, `created_at`, `updated_at`, `notify_to`) VALUES
(16, 4, 'coordinator', 'Grades', 'Scholar Alexa Kyle Ryle Jerson Banaag has submitted his/her grades', 'Pending', '2023-01-29 04:48:56', '2023-01-29 04:48:56', '3'),
(17, 4, 'coordinator', 'Grades', 'Scholar Alexa Kyle Ryle Jerson Banaag has submitted his/her grades', 'Pending', '2023-01-29 04:53:56', '2023-01-29 04:53:56', '3'),
(18, 4, 'coordinator', 'Grades', 'Scholar Alexa Kyle Ryle Jerson Banaag has submitted his/her grades', 'Pending', '2023-01-29 04:57:32', '2023-01-29 04:57:32', '3'),
(19, 4, 'admin', 'Grades', 'Scholar named Alexa Kyle Ryle Jerson Banaag has submitted a new request', 'Pending', '2023-01-29 05:08:05', '2023-01-29 05:08:05', '1'),
(20, 1, 'student', 'Grades', 'We are happy to tell you that your request has been Approved by our coordinators. Thank you.', 'Pending', '2023-01-28 21:20:07', '2023-01-28 21:20:07', '4');

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
-- Table structure for table `scholars`
--

CREATE TABLE `scholars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_year_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_year_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scholar_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scholars`
--

INSERT INTO `scholars` (`id`, `first_name`, `last_name`, `birthday`, `age`, `address`, `number`, `gender`, `email`, `password`, `status`, `course`, `semester_start`, `semester_end`, `school_year_start`, `school_year_end`, `school`, `year_level`, `created_at`, `updated_at`, `user_type`, `scholar_no`) VALUES
(4, 'Alexa Kyle Ryle Jerson', 'Banaag', '1993-08-23', 'none', 'Rer Phase 3', '09533844872', 'Male', 'email@gmail.com', 'Banaag-USTP-12345', 'Inactive', 'IT', NULL, NULL, NULL, NULL, 'Liceo de Cagayan University', '1st Year', '2023-01-28 19:41:30', '2023-01-28 21:20:00', 'scholar', 'USTP-12345');

-- --------------------------------------------------------

--
-- Table structure for table `scholar_requests`
--

CREATE TABLE `scholar_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scholar_id` int(255) NOT NULL,
  `request_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scholar_requests`
--

INSERT INTO `scholar_requests` (`id`, `scholar_id`, `request_name`, `request_details`, `request_type`, `request_date`, `status`, `created_at`, `updated_at`, `file`, `school`, `semester`, `school_year`, `course`) VALUES
(10, 4, NULL, NULL, 'Transfer School', '2023-01-29', 'Approved', '2023-01-29 05:08:00', '2023-01-28 21:20:00', '63d5ff309c6a5.png', 'Liceo de Cagayan University', '1st Semester', '2025', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school`, `created_at`, `updated_at`) VALUES
(1, 'USTP', NULL, NULL),
(2, 'Liceo de Cagayan University', '2023-01-27 16:09:39', '2023-01-27 16:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_logs`
--

CREATE TABLE `transfer_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scholar_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfer_logs`
--

INSERT INTO `transfer_logs` (`id`, `scholar_id`, `transfer_from`, `transfer_to`, `request_id`, `created_at`, `updated_at`) VALUES
(4, '4', 'USTP', 'Liceo de Cagayan University', 10, '2023-01-28 21:20:00', '2023-01-28 21:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`) VALUES
(1, 'sidney', 'salazar', 'admin@gmail.com', NULL, '$2y$10$qTAetOG/YwN4Qmu1UM4FUOIUq0hiwi4y/aM5Xb1ot8evB3wQR5g7y', NULL, '2023-01-05 04:31:46', '2023-01-05 04:31:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academmic_years`
--
ALTER TABLE `academmic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coordinators`
--
ALTER TABLE `coordinators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_details`
--
ALTER TABLE `grade_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident_reports`
--
ALTER TABLE `incident_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `scholars`
--
ALTER TABLE `scholars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholar_requests`
--
ALTER TABLE `scholar_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_logs`
--
ALTER TABLE `transfer_logs`
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
-- AUTO_INCREMENT for table `academmic_years`
--
ALTER TABLE `academmic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `coordinators`
--
ALTER TABLE `coordinators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `grade_details`
--
ALTER TABLE `grade_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `incident_reports`
--
ALTER TABLE `incident_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `scholars`
--
ALTER TABLE `scholars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scholar_requests`
--
ALTER TABLE `scholar_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transfer_logs`
--
ALTER TABLE `transfer_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
