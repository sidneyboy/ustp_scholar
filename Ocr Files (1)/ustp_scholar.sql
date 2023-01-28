-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 05:29 AM
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
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `scholar_id`, `attachment`, `status`, `created_at`, `updated_at`, `grade_details_id`, `image_type`) VALUES
(12, 1, '1674480615.png', 'Validated', '2023-01-23 05:30:15', '2023-01-23 05:37:32', 14, NULL),
(13, 1, '1674480624.png', 'Validated', '2023-01-23 05:30:24', '2023-01-23 05:39:16', NULL, 'coe'),
(14, 1, '1674565226.png', 'Validated', '2023-01-24 05:00:27', '2023-01-24 05:18:50', 20, NULL),
(15, 1, '1674565590.png', 'Validated', '2023-01-24 05:06:30', '2023-01-25 03:39:15', NULL, 'coe'),
(16, 1, '1674647157.png', 'Validated', '2023-01-25 03:45:57', '2023-01-25 03:58:03', 21, NULL),
(17, 1, '1674647311.png', 'Validated', '2023-01-25 03:48:31', '2023-01-25 03:51:02', NULL, 'coe'),
(18, 1, '1674731635.png', 'Validated', '2023-01-26 03:13:55', '2023-01-26 03:17:13', 22, NULL),
(19, 1, '1674731693.png', 'Validated', '2023-01-26 03:14:53', '2023-01-26 03:18:09', NULL, 'coe'),
(20, 1, '1674822767.png', 'Pending', '2023-01-27 04:32:47', '2023-01-27 04:32:47', 27, NULL),
(21, 1, '1674823067.png', 'Validated', '2023-01-27 04:37:47', '2023-01-27 05:08:34', NULL, 'coe'),
(22, 1, '1674879906.png', 'Pending', '2023-01-27 20:25:06', '2023-01-27 20:25:06', 28, NULL);

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
(107, 1, 'Remarks1CD Eng101', 'DP Purposive Communication', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-23 13:30:14', '2023-01-23 05:37:32', 'MDT 275', 'FNL 2.50', 'SCITIR2', 'None', 14),
(108, 1, 'RK Passed2CD S5103', 'DP The Contemporary World,', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-23 13:30:14', '2023-01-23 05:37:32', 'MDT 250', 'FNL 2.25', 'SCITIR2', 'None', 14),
(109, 1, 'CDNSTP101b', 'DP Civic Welfare Training Senvice 1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-23 13:30:14', '2023-01-23 05:37:33', 'MDTA.75', 'FNLA.75', 'SCITIR2', 'None', 14),
(110, 1, 'RK Passed4CDSS102', 'DP Reading in Philippine History', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-23 13:30:14', '2023-01-23 05:37:33', 'MDT 250', 'FNL 2.00', 'SCITIR2', 'None', 14),
(111, 1, 'CD Math101', 'DP Mathematics in Modern World', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-23 13:30:14', '2023-01-23 05:37:33', 'MDT A.75', 'FNL 2.25', 'SCITIR2', 'None', 14),
(112, 1, 'CDPE101d', 'DP Physical Activty Towards Health and', 'UN-3', NULL, NULL, NULL, NULL, NULL, '2023-01-23 13:30:14', '2023-01-23 05:37:33', 'MDT 1.00', 'FNLA.75', 'SCATIR2', 'None', 14),
(113, 1, 'CDaTI1', '\'DPntroduction to Computing', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-23 13:30:14', '2023-01-23 05:37:33', 'MDT 2.00', 'FNLA.75', 'SCITIR2', 'None', 14),
(114, 1, 'RK Passed8CDIT112', 'DP Computer Programing 1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-23 13:30:14', '2023-01-23 05:37:33', 'MDT 250', 'FNL 275', 'SCITIR2', 'None', 14),
(115, 1, 'Remarks\n1CD-Eng101', 'DP-Purposive-Communication', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:54:55', '2023-01-24 12:54:55', 'MDT-275', 'FNL-2.50', 'SCITIR2', NULL, 15),
(116, 1, 'RK-Passed\n2CD-S5103', 'DP-The-Contemporary-World,', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:54:56', '2023-01-24 12:54:56', 'MDT-250', 'FNL-2.25', 'SCITIR2', NULL, 15),
(117, 1, 'CDNSTP101b', 'DP-Civic-Welfare-Training-Senvice-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:54:56', '2023-01-24 12:54:56', 'MDTA.75', 'FNLA.75', 'SCITIR2', NULL, 15),
(118, 1, 'RK-Passed\n4CDSS102', 'DP-Reading-in-Philippine-History', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:54:56', '2023-01-24 12:54:56', 'MDT-250', 'FNL-2.00', 'SCITIR2', NULL, 15),
(119, 1, 'CD-Math101', 'DP-Mathematics-in-Modern-World', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:54:56', '2023-01-24 12:54:56', 'MDT-A.75', 'FNL-2.25', 'SCITIR2', NULL, 15),
(120, 1, 'CDPE101d', 'DP-Physical-Activty-Towards-Health-and', 'UN-3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:54:57', '2023-01-24 12:54:57', 'MDT-1.00', 'FNLA.75', 'SCATIR2', NULL, 15),
(121, 1, 'CDaTI1', '\'DPntroduction-to-Computing', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:54:57', '2023-01-24 12:54:57', 'MDT-2.00', 'FNLA.75', 'SCITIR2', NULL, 15),
(122, 1, 'RK-Passed\n8CDIT112', 'DP-Computer-Programing-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:54:57', '2023-01-24 12:54:57', 'MDT-250', 'FNL-275', 'SCITIR2', NULL, 15),
(123, 1, 'Remarks\n1CD-Eng101', 'DP-Purposive-Communication', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:56:14', '2023-01-24 12:56:14', 'MDT-275', 'FNL-2.50', 'SCITIR2', NULL, 16),
(124, 1, 'RK-Passed\n2CD-S5103', 'DP-The-Contemporary-World,', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:56:14', '2023-01-24 12:56:14', 'MDT-250', 'FNL-2.25', 'SCITIR2', NULL, 16),
(125, 1, 'CDNSTP101b', 'DP-Civic-Welfare-Training-Senvice-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:56:15', '2023-01-24 12:56:15', 'MDTA.75', 'FNLA.75', 'SCITIR2', NULL, 16),
(126, 1, 'RK-Passed\n4CDSS102', 'DP-Reading-in-Philippine-History', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:56:15', '2023-01-24 12:56:15', 'MDT-250', 'FNL-2.00', 'SCITIR2', NULL, 16),
(127, 1, 'CD-Math101', 'DP-Mathematics-in-Modern-World', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:56:15', '2023-01-24 12:56:15', 'MDT-A.75', 'FNL-2.25', 'SCITIR2', NULL, 16),
(128, 1, 'CDPE101d', 'DP-Physical-Activty-Towards-Health-and', 'UN-3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:56:15', '2023-01-24 12:56:15', 'MDT-1.00', 'FNLA.75', 'SCATIR2', NULL, 16),
(129, 1, 'CDaTI1', '\'DPntroduction-to-Computing', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:56:15', '2023-01-24 12:56:15', 'MDT-2.00', 'FNLA.75', 'SCITIR2', NULL, 16),
(130, 1, 'RK-Passed\n8CDIT112', 'DP-Computer-Programing-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:56:16', '2023-01-24 12:56:16', 'MDT-250', 'FNL-275', 'SCITIR2', NULL, 16),
(131, 1, 'Remarks\n1CD-Eng101', 'DP-Purposive-Communication', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:57:07', '2023-01-24 12:57:07', 'MDT-275', 'FNL-2.50', 'SCITIR2', NULL, 17),
(132, 1, 'RK-Passed\n2CD-S5103', 'DP-The-Contemporary-World,', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:57:07', '2023-01-24 12:57:07', 'MDT-250', 'FNL-2.25', 'SCITIR2', NULL, 17),
(133, 1, 'CDNSTP101b', 'DP-Civic-Welfare-Training-Senvice-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:57:07', '2023-01-24 12:57:07', 'MDTA.75', 'FNLA.75', 'SCITIR2', NULL, 17),
(134, 1, 'RK-Passed\n4CDSS102', 'DP-Reading-in-Philippine-History', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:57:08', '2023-01-24 12:57:08', 'MDT-250', 'FNL-2.00', 'SCITIR2', NULL, 17),
(135, 1, 'CD-Math101', 'DP-Mathematics-in-Modern-World', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:57:08', '2023-01-24 12:57:08', 'MDT-A.75', 'FNL-2.25', 'SCITIR2', NULL, 17),
(136, 1, 'CDPE101d', 'DP-Physical-Activty-Towards-Health-and', 'UN-3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:57:08', '2023-01-24 12:57:08', 'MDT-1.00', 'FNLA.75', 'SCATIR2', NULL, 17),
(137, 1, 'CDaTI1', '\'DPntroduction-to-Computing', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:57:08', '2023-01-24 12:57:08', 'MDT-2.00', 'FNLA.75', 'SCITIR2', NULL, 17),
(138, 1, 'RK-Passed\n8CDIT112', 'DP-Computer-Programing-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:57:08', '2023-01-24 12:57:08', 'MDT-250', 'FNL-275', 'SCITIR2', NULL, 17),
(139, 1, 'Remarks\n1CD-Eng101', 'DP-Purposive-Communication', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:58:03', '2023-01-24 12:58:03', 'MDT-275', 'FNL-2.50', 'SCITIR2', NULL, 18),
(140, 1, 'RK-Passed\n2CD-S5103', 'DP-The-Contemporary-World,', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:58:03', '2023-01-24 12:58:03', 'MDT-250', 'FNL-2.25', 'SCITIR2', NULL, 18),
(141, 1, 'CDNSTP101b', 'DP-Civic-Welfare-Training-Senvice-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:58:03', '2023-01-24 12:58:03', 'MDTA.75', 'FNLA.75', 'SCITIR2', NULL, 18),
(142, 1, 'RK-Passed\n4CDSS102', 'DP-Reading-in-Philippine-History', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:58:04', '2023-01-24 12:58:04', 'MDT-250', 'FNL-2.00', 'SCITIR2', NULL, 18),
(143, 1, 'CD-Math101', 'DP-Mathematics-in-Modern-World', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:58:04', '2023-01-24 12:58:04', 'MDT-A.75', 'FNL-2.25', 'SCITIR2', NULL, 18),
(144, 1, 'CDPE101d', 'DP-Physical-Activty-Towards-Health-and', 'UN-3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:58:04', '2023-01-24 12:58:04', 'MDT-1.00', 'FNLA.75', 'SCATIR2', NULL, 18),
(145, 1, 'CDaTI1', '\'DPntroduction-to-Computing', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:58:04', '2023-01-24 12:58:04', 'MDT-2.00', 'FNLA.75', 'SCITIR2', NULL, 18),
(146, 1, 'RK-Passed\n8CDIT112', 'DP-Computer-Programing-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:58:04', '2023-01-24 12:58:04', 'MDT-250', 'FNL-275', 'SCITIR2', NULL, 18),
(147, 1, 'Remarks\n1CD-Eng101', 'DP-Purposive-Communication', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:58:47', '2023-01-24 12:58:47', 'MDT-275', 'FNL-2.50', 'SCITIR2', NULL, 19),
(148, 1, 'RK-Passed\n2CD-S5103', 'DP-The-Contemporary-World,', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:58:47', '2023-01-24 12:58:47', 'MDT-250', 'FNL-2.25', 'SCITIR2', NULL, 19),
(149, 1, 'CDNSTP101b', 'DP-Civic-Welfare-Training-Senvice-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:58:47', '2023-01-24 12:58:47', 'MDTA.75', 'FNLA.75', 'SCITIR2', NULL, 19),
(150, 1, 'RK-Passed\n4CDSS102', 'DP-Reading-in-Philippine-History', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:58:47', '2023-01-24 12:58:47', 'MDT-250', 'FNL-2.00', 'SCITIR2', NULL, 19),
(151, 1, 'CD-Math101', 'DP-Mathematics-in-Modern-World', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:58:47', '2023-01-24 12:58:47', 'MDT-A.75', 'FNL-2.25', 'SCITIR2', NULL, 19),
(152, 1, 'CDPE101d', 'DP-Physical-Activty-Towards-Health-and', 'UN-3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:58:48', '2023-01-24 12:58:48', 'MDT-1.00', 'FNLA.75', 'SCATIR2', NULL, 19),
(153, 1, 'CDaTI1', '\'DPntroduction-to-Computing', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:58:48', '2023-01-24 12:58:48', 'MDT-2.00', 'FNLA.75', 'SCITIR2', NULL, 19),
(154, 1, 'RK-Passed\n8CDIT112', 'DP-Computer-Programing-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 12:58:48', '2023-01-24 12:58:48', 'MDT-250', 'FNL-275', 'SCITIR2', NULL, 19),
(155, 1, 'Remarks1CD Eng101', 'DP Purposive Communication', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 13:00:17', '2023-01-24 05:18:50', 'MDT 275', 'FNL 2.50', 'SCITIR2', 'none', 20),
(156, 1, 'RK Passed2CD S5103', 'DP The Contemporary World,', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 13:00:18', '2023-01-24 05:18:50', 'MDT 250', 'FNL 2.25', 'SCITIR2', 'none', 20),
(157, 1, 'CDNSTP101b', 'DP Civic Welfare Training Senvice 1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 13:00:18', '2023-01-24 05:18:50', 'MDTA.75', 'FNLA.75', 'SCITIR2', 'none', 20),
(158, 1, 'RK Passed4CDSS102', 'DP Reading in Philippine History', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 13:00:18', '2023-01-24 05:18:50', 'MDT 250', 'FNL 2.00', 'SCITIR2', 'none', 20),
(159, 1, 'CD Math101', 'DP Mathematics in Modern World', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 13:00:18', '2023-01-24 05:18:50', 'MDT A.75', 'FNL 2.25', 'SCITIR2', 'none', 20),
(160, 1, 'CDPE101d', 'DP Physical Activty Towards Health and', 'UN-3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 13:00:18', '2023-01-24 05:18:50', 'MDT 1.00', 'FNLA.75', 'SCATIR2', 'none', 20),
(161, 1, 'CDaTI1', '\'DPntroduction to Computing', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 13:00:19', '2023-01-24 05:18:50', 'MDT 2.00', 'FNLA.75', 'SCITIR2', 'none', 20),
(162, 1, 'RK Passed8CDIT112', 'DP Computer Programing 1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-24 13:00:19', '2023-01-24 05:18:50', 'MDT 250', 'FNL 275', 'SCITIR2', 'none', 20),
(163, 1, 'Remarks1CD Eng101', 'DP Purposive Communication', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-25 11:45:52', '2023-01-25 03:58:04', 'MDT 275', 'FNL 2.50', 'SCITIR2', 'none', 21),
(164, 1, 'RK Passed2CD S5103', 'DP The Contemporary World,', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-25 11:45:52', '2023-01-25 03:58:04', 'MDT 250', 'FNL 2.25', 'SCITIR2', 'none', 21),
(165, 1, 'CDNSTP101b', 'DP Civic Welfare Training Senvice 1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-25 11:45:52', '2023-01-25 03:58:04', 'MDTA.75', 'FNLA.75', 'SCITIR2', 'none', 21),
(166, 1, 'RK Passed4CDSS102', 'DP Reading in Philippine History', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-25 11:45:52', '2023-01-25 03:58:04', 'MDT 250', 'FNL 2.00', 'SCITIR2', 'none', 21),
(167, 1, 'CD Math101', 'DP Mathematics in Modern World', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-25 11:45:52', '2023-01-25 03:58:04', 'MDT A.75', 'FNL 2.25', 'SCITIR2', 'none', 21),
(168, 1, 'CDPE101d', 'DP Physical Activty Towards Health and', 'UN-3', NULL, NULL, NULL, NULL, NULL, '2023-01-25 11:45:52', '2023-01-25 03:58:04', 'MDT 1.00', 'FNLA.75', 'SCATIR2', 'none', 21),
(169, 1, 'CDaTI1', '\'DPntroduction to Computing', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-25 11:45:52', '2023-01-25 03:58:04', 'MDT 2.00', 'FNLA.75', 'SCITIR2', 'none', 21),
(170, 1, 'RK Passed8CDIT112', 'DP Computer Programing 1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-25 11:45:52', '2023-01-25 03:58:04', 'MDT 250', 'FNL 275', 'SCITIR2', 'none', 21),
(171, 1, 'Remarks1CD Eng101', 'DP Purposive Communication', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-26 11:13:46', '2023-01-26 03:17:13', 'MDT 275', 'FNL 2.50', 'SCITIR2', 'NONE', 22),
(172, 1, 'RK Passed2CD S5103', 'DP The Contemporary World,', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-26 11:13:46', '2023-01-26 03:17:13', 'MDT 250', 'FNL 2.25', 'SCITIR2', 'NONE', 22),
(173, 1, 'CDNSTP101b', 'DP Civic Welfare Training Senvice 1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-26 11:13:47', '2023-01-26 03:17:13', 'MDTA.75', 'FNLA.75', 'SCITIR2', 'NONE', 22),
(174, 1, 'RK Passed4CDSS102', 'DP Reading in Philippine History', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-26 11:13:48', '2023-01-26 03:17:13', 'MDT 250', 'FNL 2.00', 'SCITIR2', 'NONE', 22),
(175, 1, 'CD Math101', 'DP Mathematics in Modern World', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-26 11:13:48', '2023-01-26 03:17:13', 'MDT A.75', 'FNL 2.25', 'SCITIR2', 'NONE', 22),
(176, 1, 'CDPE101d', 'DP Physical Activty Towards Health and', 'UN-3', NULL, NULL, NULL, NULL, NULL, '2023-01-26 11:13:49', '2023-01-26 03:17:13', 'MDT 1.00', 'FNLA.75', 'SCATIR2', 'NONE', 22),
(177, 1, 'CDaTI1', '\'DPntroduction to Computing', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-26 11:13:49', '2023-01-26 03:17:13', 'MDT 2.00', 'FNLA.75', 'SCITIR2', 'NONE', 22),
(178, 1, 'RK Passed8CDIT112', 'DP Computer Programing 1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-26 11:13:50', '2023-01-26 03:17:13', 'MDT 250', 'FNL 275', 'SCITIR2', 'NONE', 22),
(179, 1, 'Remarks\n1CD-Eng101', 'DP-Purposive-Communication', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:24:53', '2023-01-27 12:24:53', 'MDT-275', 'FNL-2.50', 'SCITIR2', NULL, 23),
(180, 1, 'RK-Passed\n2CD-S5103', 'DP-The-Contemporary-World,', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:24:53', '2023-01-27 12:24:53', 'MDT-250', 'FNL-2.25', 'SCITIR2', NULL, 23),
(181, 1, 'CDNSTP101b', 'DP-Civic-Welfare-Training-Senvice-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:24:54', '2023-01-27 12:24:54', 'MDTA.75', 'FNLA.75', 'SCITIR2', NULL, 23),
(182, 1, 'RK-Passed\n4CDSS102', 'DP-Reading-in-Philippine-History', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:24:54', '2023-01-27 12:24:54', 'MDT-250', 'FNL-2.00', 'SCITIR2', NULL, 23),
(183, 1, 'CD-Math101', 'DP-Mathematics-in-Modern-World', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:24:55', '2023-01-27 12:24:55', 'MDT-A.75', 'FNL-2.25', 'SCITIR2', NULL, 23),
(184, 1, 'CDPE101d', 'DP-Physical-Activty-Towards-Health-and', 'UN-3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:24:55', '2023-01-27 12:24:55', 'MDT-1.00', 'FNLA.75', 'SCATIR2', NULL, 23),
(185, 1, 'CDaTI1', '\'DPntroduction-to-Computing', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:24:56', '2023-01-27 12:24:56', 'MDT-2.00', 'FNLA.75', 'SCITIR2', NULL, 23),
(186, 1, 'RK-Passed\n8CDIT112', 'DP-Computer-Programing-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:24:56', '2023-01-27 12:24:56', 'MDT-250', 'FNL-275', 'SCITIR2', NULL, 23),
(187, 1, 'Remarks\n1CD-Eng101', 'DP-Purposive-Communication', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:27:40', '2023-01-27 12:27:40', 'MDT-275', 'FNL-2.50', 'SCITIR2', NULL, 24),
(188, 1, 'RK-Passed\n2CD-S5103', 'DP-The-Contemporary-World,', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:27:41', '2023-01-27 12:27:41', 'MDT-250', 'FNL-2.25', 'SCITIR2', NULL, 24),
(189, 1, 'CDNSTP101b', 'DP-Civic-Welfare-Training-Senvice-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:27:41', '2023-01-27 12:27:41', 'MDTA.75', 'FNLA.75', 'SCITIR2', NULL, 24),
(190, 1, 'RK-Passed\n4CDSS102', 'DP-Reading-in-Philippine-History', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:27:41', '2023-01-27 12:27:41', 'MDT-250', 'FNL-2.00', 'SCITIR2', NULL, 24),
(191, 1, 'CD-Math101', 'DP-Mathematics-in-Modern-World', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:27:41', '2023-01-27 12:27:41', 'MDT-A.75', 'FNL-2.25', 'SCITIR2', NULL, 24),
(192, 1, 'CDPE101d', 'DP-Physical-Activty-Towards-Health-and', 'UN-3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:27:42', '2023-01-27 12:27:42', 'MDT-1.00', 'FNLA.75', 'SCATIR2', NULL, 24),
(193, 1, 'CDaTI1', '\'DPntroduction-to-Computing', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:27:42', '2023-01-27 12:27:42', 'MDT-2.00', 'FNLA.75', 'SCITIR2', NULL, 24),
(194, 1, 'RK-Passed\n8CDIT112', 'DP-Computer-Programing-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:27:42', '2023-01-27 12:27:42', 'MDT-250', 'FNL-275', 'SCITIR2', NULL, 24),
(195, 1, 'Remarks\n1CD-Eng101', 'DP-Purposive-Communication', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:28:22', '2023-01-27 12:28:22', 'MDT-275', 'FNL-2.50', 'SCITIR2', NULL, 25),
(196, 1, 'RK-Passed\n2CD-S5103', 'DP-The-Contemporary-World,', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:28:23', '2023-01-27 12:28:23', 'MDT-250', 'FNL-2.25', 'SCITIR2', NULL, 25),
(197, 1, 'CDNSTP101b', 'DP-Civic-Welfare-Training-Senvice-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:28:23', '2023-01-27 12:28:23', 'MDTA.75', 'FNLA.75', 'SCITIR2', NULL, 25),
(198, 1, 'RK-Passed\n4CDSS102', 'DP-Reading-in-Philippine-History', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:28:23', '2023-01-27 12:28:23', 'MDT-250', 'FNL-2.00', 'SCITIR2', NULL, 25),
(199, 1, 'CD-Math101', 'DP-Mathematics-in-Modern-World', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:28:24', '2023-01-27 12:28:24', 'MDT-A.75', 'FNL-2.25', 'SCITIR2', NULL, 25),
(200, 1, 'CDPE101d', 'DP-Physical-Activty-Towards-Health-and', 'UN-3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:28:24', '2023-01-27 12:28:24', 'MDT-1.00', 'FNLA.75', 'SCATIR2', NULL, 25),
(201, 1, 'CDaTI1', '\'DPntroduction-to-Computing', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:28:24', '2023-01-27 12:28:24', 'MDT-2.00', 'FNLA.75', 'SCITIR2', NULL, 25),
(202, 1, 'RK-Passed\n8CDIT112', 'DP-Computer-Programing-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:28:24', '2023-01-27 12:28:24', 'MDT-250', 'FNL-275', 'SCITIR2', NULL, 25),
(203, 1, 'Remarks\n1CD-Eng101', 'DP-Purposive-Communication', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:29:36', '2023-01-27 12:29:36', 'MDT-275', 'FNL-2.50', 'SCITIR2', NULL, 26),
(204, 1, 'RK-Passed\n2CD-S5103', 'DP-The-Contemporary-World,', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:29:37', '2023-01-27 12:29:37', 'MDT-250', 'FNL-2.25', 'SCITIR2', NULL, 26),
(205, 1, 'CDNSTP101b', 'DP-Civic-Welfare-Training-Senvice-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:29:37', '2023-01-27 12:29:37', 'MDTA.75', 'FNLA.75', 'SCITIR2', NULL, 26),
(206, 1, 'RK-Passed\n4CDSS102', 'DP-Reading-in-Philippine-History', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:29:37', '2023-01-27 12:29:37', 'MDT-250', 'FNL-2.00', 'SCITIR2', NULL, 26),
(207, 1, 'CD-Math101', 'DP-Mathematics-in-Modern-World', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:29:38', '2023-01-27 12:29:38', 'MDT-A.75', 'FNL-2.25', 'SCITIR2', NULL, 26),
(208, 1, 'CDPE101d', 'DP-Physical-Activty-Towards-Health-and', 'UN-3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:29:38', '2023-01-27 12:29:38', 'MDT-1.00', 'FNLA.75', 'SCATIR2', NULL, 26),
(209, 1, 'CDaTI1', '\'DPntroduction-to-Computing', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:29:39', '2023-01-27 12:29:39', 'MDT-2.00', 'FNLA.75', 'SCITIR2', NULL, 26),
(210, 1, 'RK-Passed\n8CDIT112', 'DP-Computer-Programing-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:29:39', '2023-01-27 12:29:39', 'MDT-250', 'FNL-275', 'SCITIR2', NULL, 26),
(211, 1, 'Remarks\n1CD-Eng101', 'DP-Purposive-Communication', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:32:40', '2023-01-27 12:32:40', 'MDT-275', 'FNL-2.50', 'SCITIR2', NULL, 27),
(212, 1, 'RK-Passed\n2CD-S5103', 'DP-The-Contemporary-World,', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:32:40', '2023-01-27 12:32:40', 'MDT-250', 'FNL-2.25', 'SCITIR2', NULL, 27),
(213, 1, 'CDNSTP101b', 'DP-Civic-Welfare-Training-Senvice-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:32:40', '2023-01-27 12:32:40', 'MDTA.75', 'FNLA.75', 'SCITIR2', NULL, 27),
(214, 1, 'RK-Passed\n4CDSS102', 'DP-Reading-in-Philippine-History', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:32:40', '2023-01-27 12:32:40', 'MDT-250', 'FNL-2.00', 'SCITIR2', NULL, 27),
(215, 1, 'CD-Math101', 'DP-Mathematics-in-Modern-World', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:32:41', '2023-01-27 12:32:41', 'MDT-A.75', 'FNL-2.25', 'SCITIR2', NULL, 27),
(216, 1, 'CDPE101d', 'DP-Physical-Activty-Towards-Health-and', 'UN-3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:32:41', '2023-01-27 12:32:41', 'MDT-1.00', 'FNLA.75', 'SCATIR2', NULL, 27),
(217, 1, 'CDaTI1', '\'DPntroduction-to-Computing', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:32:41', '2023-01-27 12:32:41', 'MDT-2.00', 'FNLA.75', 'SCITIR2', NULL, 27),
(218, 1, 'RK-Passed\n8CDIT112', 'DP-Computer-Programing-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-27 12:32:41', '2023-01-27 12:32:41', 'MDT-250', 'FNL-275', 'SCITIR2', NULL, 27),
(219, 1, 'Remarks\n1CD-Eng101', 'DP-Purposive-Communication', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-28 04:25:00', '2023-01-28 04:25:00', 'MDT-275', 'FNL-2.50', 'SCITIR2', NULL, 28),
(220, 1, 'RK-Passed\n2CD-S5103', 'DP-The-Contemporary-World,', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-28 04:25:00', '2023-01-28 04:25:00', 'MDT-250', 'FNL-2.25', 'SCITIR2', NULL, 28),
(221, 1, 'CDNSTP101b', 'DP-Civic-Welfare-Training-Senvice-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-28 04:25:00', '2023-01-28 04:25:00', 'MDTA.75', 'FNLA.75', 'SCITIR2', NULL, 28),
(222, 1, 'RK-Passed\n4CDSS102', 'DP-Reading-in-Philippine-History', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-28 04:25:00', '2023-01-28 04:25:00', 'MDT-250', 'FNL-2.00', 'SCITIR2', NULL, 28),
(223, 1, 'CD-Math101', 'DP-Mathematics-in-Modern-World', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-28 04:25:00', '2023-01-28 04:25:00', 'MDT-A.75', 'FNL-2.25', 'SCITIR2', NULL, 28),
(224, 1, 'CDPE101d', 'DP-Physical-Activty-Towards-Health-and', 'UN-3', NULL, NULL, NULL, NULL, NULL, '2023-01-28 04:25:00', '2023-01-28 04:25:00', 'MDT-1.00', 'FNLA.75', 'SCATIR2', NULL, 28),
(225, 1, 'CDaTI1', '\'DPntroduction-to-Computing', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-28 04:25:00', '2023-01-28 04:25:00', 'MDT-2.00', 'FNLA.75', 'SCITIR2', NULL, 28),
(226, 1, 'RK-Passed\n8CDIT112', 'DP-Computer-Programing-1', 'UN3', NULL, NULL, NULL, NULL, NULL, '2023-01-28 04:25:00', '2023-01-28 04:25:00', 'MDT-250', 'FNL-275', 'SCITIR2', NULL, 28);

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
(14, 1, 1, 1, '1st Semester', '2023-01-23 13:30:14', '2023-01-23 05:37:32', '#  Code Descriptive. Units  Section ~Midterm  Final  Re-Exam Remarks\n1CD-Eng101  DP-Purposive-Communication UN3  SCITIR2 MDT-275 FNL-2.50 RK-Passed\n2CD-S5103  DP-The-Contemporary-World, UN3  SCITIR2 MDT-250 FNL-2.25 RK-Passed\n3 CDNSTP101b DP-Civic-Welfare-Training-Senvice-1 UN3  SCITIR2 MDTA.75 FNLA.75 RK-Passed\n4CDSS102  DP-Reading-in-Philippine-History UN3  SCITIR2 MDT-250 FNL-2.00 RK-Passed\n5 CD-Math101  DP-Mathematics-in-Modern-World UN3  SCITIR2 MDT-A.75 FNL-2.25 RK-Passed\n6 CDPE101d  DP-Physical-Activty-Towards-Health-and Fitness-1 ~ UN-3  SCATIR2 MDT-1.00 FNLA.75 RK-Passed\n7 CDaTI1 \'DPntroduction-to-Computing UN3  SCITIR2 MDT-2.00 FNLA.75 RK-Passed\n8CDIT112 DP-Computer-Programing-1 UN3  SCITIR2 MDT-250 FNL-275 RK-Passed', 'Validated'),
(15, 1, 1, 1, '1st Semester', '2023-01-24 12:54:55', '2023-01-24 12:54:55', '#  Code Descriptive. Units  Section ~Midterm  Final  Re-Exam Remarks\n1CD-Eng101  DP-Purposive-Communication UN3  SCITIR2 MDT-275 FNL-2.50 RK-Passed\n2CD-S5103  DP-The-Contemporary-World, UN3  SCITIR2 MDT-250 FNL-2.25 RK-Passed\n3 CDNSTP101b DP-Civic-Welfare-Training-Senvice-1 UN3  SCITIR2 MDTA.75 FNLA.75 RK-Passed\n4CDSS102  DP-Reading-in-Philippine-History UN3  SCITIR2 MDT-250 FNL-2.00 RK-Passed\n5 CD-Math101  DP-Mathematics-in-Modern-World UN3  SCITIR2 MDT-A.75 FNL-2.25 RK-Passed\n6 CDPE101d  DP-Physical-Activty-Towards-Health-and Fitness-1 ~ UN-3  SCATIR2 MDT-1.00 FNLA.75 RK-Passed\n7 CDaTI1 \'DPntroduction-to-Computing UN3  SCITIR2 MDT-2.00 FNLA.75 RK-Passed\n8CDIT112 DP-Computer-Programing-1 UN3  SCITIR2 MDT-250 FNL-275 RK-Passed', 'Pending'),
(16, 1, 1, 1, '1st Semester', '2023-01-24 12:56:14', '2023-01-24 12:56:14', '#  Code Descriptive. Units  Section ~Midterm  Final  Re-Exam Remarks\n1CD-Eng101  DP-Purposive-Communication UN3  SCITIR2 MDT-275 FNL-2.50 RK-Passed\n2CD-S5103  DP-The-Contemporary-World, UN3  SCITIR2 MDT-250 FNL-2.25 RK-Passed\n3 CDNSTP101b DP-Civic-Welfare-Training-Senvice-1 UN3  SCITIR2 MDTA.75 FNLA.75 RK-Passed\n4CDSS102  DP-Reading-in-Philippine-History UN3  SCITIR2 MDT-250 FNL-2.00 RK-Passed\n5 CD-Math101  DP-Mathematics-in-Modern-World UN3  SCITIR2 MDT-A.75 FNL-2.25 RK-Passed\n6 CDPE101d  DP-Physical-Activty-Towards-Health-and Fitness-1 ~ UN-3  SCATIR2 MDT-1.00 FNLA.75 RK-Passed\n7 CDaTI1 \'DPntroduction-to-Computing UN3  SCITIR2 MDT-2.00 FNLA.75 RK-Passed\n8CDIT112 DP-Computer-Programing-1 UN3  SCITIR2 MDT-250 FNL-275 RK-Passed', 'Pending'),
(17, 1, 1, 1, '1st Semester', '2023-01-24 12:57:06', '2023-01-24 12:57:06', '#  Code Descriptive. Units  Section ~Midterm  Final  Re-Exam Remarks\n1CD-Eng101  DP-Purposive-Communication UN3  SCITIR2 MDT-275 FNL-2.50 RK-Passed\n2CD-S5103  DP-The-Contemporary-World, UN3  SCITIR2 MDT-250 FNL-2.25 RK-Passed\n3 CDNSTP101b DP-Civic-Welfare-Training-Senvice-1 UN3  SCITIR2 MDTA.75 FNLA.75 RK-Passed\n4CDSS102  DP-Reading-in-Philippine-History UN3  SCITIR2 MDT-250 FNL-2.00 RK-Passed\n5 CD-Math101  DP-Mathematics-in-Modern-World UN3  SCITIR2 MDT-A.75 FNL-2.25 RK-Passed\n6 CDPE101d  DP-Physical-Activty-Towards-Health-and Fitness-1 ~ UN-3  SCATIR2 MDT-1.00 FNLA.75 RK-Passed\n7 CDaTI1 \'DPntroduction-to-Computing UN3  SCITIR2 MDT-2.00 FNLA.75 RK-Passed\n8CDIT112 DP-Computer-Programing-1 UN3  SCITIR2 MDT-250 FNL-275 RK-Passed', 'Pending'),
(18, 1, 1, 1, '1st Semester', '2023-01-24 12:58:03', '2023-01-24 12:58:03', '#  Code Descriptive. Units  Section ~Midterm  Final  Re-Exam Remarks\n1CD-Eng101  DP-Purposive-Communication UN3  SCITIR2 MDT-275 FNL-2.50 RK-Passed\n2CD-S5103  DP-The-Contemporary-World, UN3  SCITIR2 MDT-250 FNL-2.25 RK-Passed\n3 CDNSTP101b DP-Civic-Welfare-Training-Senvice-1 UN3  SCITIR2 MDTA.75 FNLA.75 RK-Passed\n4CDSS102  DP-Reading-in-Philippine-History UN3  SCITIR2 MDT-250 FNL-2.00 RK-Passed\n5 CD-Math101  DP-Mathematics-in-Modern-World UN3  SCITIR2 MDT-A.75 FNL-2.25 RK-Passed\n6 CDPE101d  DP-Physical-Activty-Towards-Health-and Fitness-1 ~ UN-3  SCATIR2 MDT-1.00 FNLA.75 RK-Passed\n7 CDaTI1 \'DPntroduction-to-Computing UN3  SCITIR2 MDT-2.00 FNLA.75 RK-Passed\n8CDIT112 DP-Computer-Programing-1 UN3  SCITIR2 MDT-250 FNL-275 RK-Passed', 'Pending'),
(19, 1, 1, 1, '1st Semester', '2023-01-24 12:58:47', '2023-01-24 12:58:47', '#  Code Descriptive. Units  Section ~Midterm  Final  Re-Exam Remarks\n1CD-Eng101  DP-Purposive-Communication UN3  SCITIR2 MDT-275 FNL-2.50 RK-Passed\n2CD-S5103  DP-The-Contemporary-World, UN3  SCITIR2 MDT-250 FNL-2.25 RK-Passed\n3 CDNSTP101b DP-Civic-Welfare-Training-Senvice-1 UN3  SCITIR2 MDTA.75 FNLA.75 RK-Passed\n4CDSS102  DP-Reading-in-Philippine-History UN3  SCITIR2 MDT-250 FNL-2.00 RK-Passed\n5 CD-Math101  DP-Mathematics-in-Modern-World UN3  SCITIR2 MDT-A.75 FNL-2.25 RK-Passed\n6 CDPE101d  DP-Physical-Activty-Towards-Health-and Fitness-1 ~ UN-3  SCATIR2 MDT-1.00 FNLA.75 RK-Passed\n7 CDaTI1 \'DPntroduction-to-Computing UN3  SCITIR2 MDT-2.00 FNLA.75 RK-Passed\n8CDIT112 DP-Computer-Programing-1 UN3  SCITIR2 MDT-250 FNL-275 RK-Passed', 'Pending'),
(20, 1, 1, 1, '3rd Semester', '2023-01-24 13:00:17', '2023-01-24 05:18:50', '#  Code Descriptive. Units  Section ~Midterm  Final  Re-Exam Remarks\n1CD-Eng101  DP-Purposive-Communication UN3  SCITIR2 MDT-275 FNL-2.50 RK-Passed\n2CD-S5103  DP-The-Contemporary-World, UN3  SCITIR2 MDT-250 FNL-2.25 RK-Passed\n3 CDNSTP101b DP-Civic-Welfare-Training-Senvice-1 UN3  SCITIR2 MDTA.75 FNLA.75 RK-Passed\n4CDSS102  DP-Reading-in-Philippine-History UN3  SCITIR2 MDT-250 FNL-2.00 RK-Passed\n5 CD-Math101  DP-Mathematics-in-Modern-World UN3  SCITIR2 MDT-A.75 FNL-2.25 RK-Passed\n6 CDPE101d  DP-Physical-Activty-Towards-Health-and Fitness-1 ~ UN-3  SCATIR2 MDT-1.00 FNLA.75 RK-Passed\n7 CDaTI1 \'DPntroduction-to-Computing UN3  SCITIR2 MDT-2.00 FNLA.75 RK-Passed\n8CDIT112 DP-Computer-Programing-1 UN3  SCITIR2 MDT-250 FNL-275 RK-Passed', 'Validated'),
(21, 1, 1, 1, '1st Semester', '2023-01-25 11:45:52', '2023-01-25 03:58:03', '#  Code Descriptive. Units  Section ~Midterm  Final  Re-Exam Remarks\n1CD-Eng101  DP-Purposive-Communication UN3  SCITIR2 MDT-275 FNL-2.50 RK-Passed\n2CD-S5103  DP-The-Contemporary-World, UN3  SCITIR2 MDT-250 FNL-2.25 RK-Passed\n3 CDNSTP101b DP-Civic-Welfare-Training-Senvice-1 UN3  SCITIR2 MDTA.75 FNLA.75 RK-Passed\n4CDSS102  DP-Reading-in-Philippine-History UN3  SCITIR2 MDT-250 FNL-2.00 RK-Passed\n5 CD-Math101  DP-Mathematics-in-Modern-World UN3  SCITIR2 MDT-A.75 FNL-2.25 RK-Passed\n6 CDPE101d  DP-Physical-Activty-Towards-Health-and Fitness-1 ~ UN-3  SCATIR2 MDT-1.00 FNLA.75 RK-Passed\n7 CDaTI1 \'DPntroduction-to-Computing UN3  SCITIR2 MDT-2.00 FNLA.75 RK-Passed\n8CDIT112 DP-Computer-Programing-1 UN3  SCITIR2 MDT-250 FNL-275 RK-Passed', 'Validated'),
(22, 1, 1, 1, 'Summer', '2023-01-26 11:13:46', '2023-01-26 03:17:13', '#  Code Descriptive. Units  Section ~Midterm  Final  Re-Exam Remarks\n1CD-Eng101  DP-Purposive-Communication UN3  SCITIR2 MDT-275 FNL-2.50 RK-Passed\n2CD-S5103  DP-The-Contemporary-World, UN3  SCITIR2 MDT-250 FNL-2.25 RK-Passed\n3 CDNSTP101b DP-Civic-Welfare-Training-Senvice-1 UN3  SCITIR2 MDTA.75 FNLA.75 RK-Passed\n4CDSS102  DP-Reading-in-Philippine-History UN3  SCITIR2 MDT-250 FNL-2.00 RK-Passed\n5 CD-Math101  DP-Mathematics-in-Modern-World UN3  SCITIR2 MDT-A.75 FNL-2.25 RK-Passed\n6 CDPE101d  DP-Physical-Activty-Towards-Health-and Fitness-1 ~ UN-3  SCATIR2 MDT-1.00 FNLA.75 RK-Passed\n7 CDaTI1 \'DPntroduction-to-Computing UN3  SCITIR2 MDT-2.00 FNLA.75 RK-Passed\n8CDIT112 DP-Computer-Programing-1 UN3  SCITIR2 MDT-250 FNL-275 RK-Passed', 'Validated'),
(23, 1, 1, 1, '1st Semester', '2023-01-27 12:24:52', '2023-01-27 12:24:52', '#  Code Descriptive. Units  Section ~Midterm  Final  Re-Exam Remarks\n1CD-Eng101  DP-Purposive-Communication UN3  SCITIR2 MDT-275 FNL-2.50 RK-Passed\n2CD-S5103  DP-The-Contemporary-World, UN3  SCITIR2 MDT-250 FNL-2.25 RK-Passed\n3 CDNSTP101b DP-Civic-Welfare-Training-Senvice-1 UN3  SCITIR2 MDTA.75 FNLA.75 RK-Passed\n4CDSS102  DP-Reading-in-Philippine-History UN3  SCITIR2 MDT-250 FNL-2.00 RK-Passed\n5 CD-Math101  DP-Mathematics-in-Modern-World UN3  SCITIR2 MDT-A.75 FNL-2.25 RK-Passed\n6 CDPE101d  DP-Physical-Activty-Towards-Health-and Fitness-1 ~ UN-3  SCATIR2 MDT-1.00 FNLA.75 RK-Passed\n7 CDaTI1 \'DPntroduction-to-Computing UN3  SCITIR2 MDT-2.00 FNLA.75 RK-Passed\n8CDIT112 DP-Computer-Programing-1 UN3  SCITIR2 MDT-250 FNL-275 RK-Passed', 'Pending'),
(24, 1, 1, 1, '1st Semester', '2023-01-27 12:27:40', '2023-01-27 12:27:40', '#  Code Descriptive. Units  Section ~Midterm  Final  Re-Exam Remarks\n1CD-Eng101  DP-Purposive-Communication UN3  SCITIR2 MDT-275 FNL-2.50 RK-Passed\n2CD-S5103  DP-The-Contemporary-World, UN3  SCITIR2 MDT-250 FNL-2.25 RK-Passed\n3 CDNSTP101b DP-Civic-Welfare-Training-Senvice-1 UN3  SCITIR2 MDTA.75 FNLA.75 RK-Passed\n4CDSS102  DP-Reading-in-Philippine-History UN3  SCITIR2 MDT-250 FNL-2.00 RK-Passed\n5 CD-Math101  DP-Mathematics-in-Modern-World UN3  SCITIR2 MDT-A.75 FNL-2.25 RK-Passed\n6 CDPE101d  DP-Physical-Activty-Towards-Health-and Fitness-1 ~ UN-3  SCATIR2 MDT-1.00 FNLA.75 RK-Passed\n7 CDaTI1 \'DPntroduction-to-Computing UN3  SCITIR2 MDT-2.00 FNLA.75 RK-Passed\n8CDIT112 DP-Computer-Programing-1 UN3  SCITIR2 MDT-250 FNL-275 RK-Passed', 'Pending'),
(25, 1, 1, 1, '1st Semester', '2023-01-27 12:28:22', '2023-01-27 12:28:22', '#  Code Descriptive. Units  Section ~Midterm  Final  Re-Exam Remarks\n1CD-Eng101  DP-Purposive-Communication UN3  SCITIR2 MDT-275 FNL-2.50 RK-Passed\n2CD-S5103  DP-The-Contemporary-World, UN3  SCITIR2 MDT-250 FNL-2.25 RK-Passed\n3 CDNSTP101b DP-Civic-Welfare-Training-Senvice-1 UN3  SCITIR2 MDTA.75 FNLA.75 RK-Passed\n4CDSS102  DP-Reading-in-Philippine-History UN3  SCITIR2 MDT-250 FNL-2.00 RK-Passed\n5 CD-Math101  DP-Mathematics-in-Modern-World UN3  SCITIR2 MDT-A.75 FNL-2.25 RK-Passed\n6 CDPE101d  DP-Physical-Activty-Towards-Health-and Fitness-1 ~ UN-3  SCATIR2 MDT-1.00 FNLA.75 RK-Passed\n7 CDaTI1 \'DPntroduction-to-Computing UN3  SCITIR2 MDT-2.00 FNLA.75 RK-Passed\n8CDIT112 DP-Computer-Programing-1 UN3  SCITIR2 MDT-250 FNL-275 RK-Passed', 'Pending'),
(26, 1, 1, 1, '1st Semester', '2023-01-27 12:29:36', '2023-01-27 12:29:36', '#  Code Descriptive. Units  Section ~Midterm  Final  Re-Exam Remarks\n1CD-Eng101  DP-Purposive-Communication UN3  SCITIR2 MDT-275 FNL-2.50 RK-Passed\n2CD-S5103  DP-The-Contemporary-World, UN3  SCITIR2 MDT-250 FNL-2.25 RK-Passed\n3 CDNSTP101b DP-Civic-Welfare-Training-Senvice-1 UN3  SCITIR2 MDTA.75 FNLA.75 RK-Passed\n4CDSS102  DP-Reading-in-Philippine-History UN3  SCITIR2 MDT-250 FNL-2.00 RK-Passed\n5 CD-Math101  DP-Mathematics-in-Modern-World UN3  SCITIR2 MDT-A.75 FNL-2.25 RK-Passed\n6 CDPE101d  DP-Physical-Activty-Towards-Health-and Fitness-1 ~ UN-3  SCATIR2 MDT-1.00 FNLA.75 RK-Passed\n7 CDaTI1 \'DPntroduction-to-Computing UN3  SCITIR2 MDT-2.00 FNLA.75 RK-Passed\n8CDIT112 DP-Computer-Programing-1 UN3  SCITIR2 MDT-250 FNL-275 RK-Passed', 'Pending'),
(27, 1, 1, 1, '1st Semester', '2023-01-27 12:32:39', '2023-01-27 13:25:33', '#  Code Descriptive. Units  Section ~Midterm  Final  Re-Exam Remarks\n1CD-Eng101  DP-Purposive-Communication UN3  SCITIR2 MDT-275 FNL-2.50 RK-Passed\n2CD-S5103  DP-The-Contemporary-World, UN3  SCITIR2 MDT-250 FNL-2.25 RK-Passed\n3 CDNSTP101b DP-Civic-Welfare-Training-Senvice-1 UN3  SCITIR2 MDTA.75 FNLA.75 RK-Passed\n4CDSS102  DP-Reading-in-Philippine-History UN3  SCITIR2 MDT-250 FNL-2.00 RK-Passed\n5 CD-Math101  DP-Mathematics-in-Modern-World UN3  SCITIR2 MDT-A.75 FNL-2.25 RK-Passed\n6 CDPE101d  DP-Physical-Activty-Towards-Health-and Fitness-1 ~ UN-3  SCATIR2 MDT-1.00 FNLA.75 RK-Passed\n7 CDaTI1 \'DPntroduction-to-Computing UN3  SCITIR2 MDT-2.00 FNLA.75 RK-Passed\n8CDIT112 DP-Computer-Programing-1 UN3  SCITIR2 MDT-250 FNL-275 RK-Passed', 'Rejected'),
(28, 1, 1, 1, '1st Semester', '2023-01-28 04:25:00', '2023-01-28 04:25:00', '#  Code Descriptive. Units  Section ~Midterm  Final  Re-Exam Remarks\n1CD-Eng101  DP-Purposive-Communication UN3  SCITIR2 MDT-275 FNL-2.50 RK-Passed\n2CD-S5103  DP-The-Contemporary-World, UN3  SCITIR2 MDT-250 FNL-2.25 RK-Passed\n3 CDNSTP101b DP-Civic-Welfare-Training-Senvice-1 UN3  SCITIR2 MDTA.75 FNLA.75 RK-Passed\n4CDSS102  DP-Reading-in-Philippine-History UN3  SCITIR2 MDT-250 FNL-2.00 RK-Passed\n5 CD-Math101  DP-Mathematics-in-Modern-World UN3  SCITIR2 MDT-A.75 FNL-2.25 RK-Passed\n6 CDPE101d  DP-Physical-Activty-Towards-Health-and Fitness-1 ~ UN-3  SCATIR2 MDT-1.00 FNLA.75 RK-Passed\n7 CDaTI1 \'DPntroduction-to-Computing UN3  SCITIR2 MDT-2.00 FNLA.75 RK-Passed\n8CDIT112 DP-Computer-Programing-1 UN3  SCITIR2 MDT-250 FNL-275 RK-Passed', 'Pending');

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

--
-- Dumping data for table `incident_reports`
--

INSERT INTO `incident_reports` (`id`, `coordinator_id`, `scholar_id`, `report_type`, `action_taken`, `report_date`, `remarks`, `created_at`, `updated_at`, `status`, `grade_details_id`) VALUES
(1, 3, 1, 'sample', 'action taken', '2023-01-09', 'remarks', '2023-01-09 10:40:06', '2023-01-09 10:40:06', NULL, NULL),
(2, 3, 1, 'Forge Signature', 'qweqwe', '2023-01-20', 'wwww', '2023-01-20 12:52:32', '2023-01-20 12:52:32', NULL, NULL),
(3, 3, 1, 'Grade Discrepancy', 'sample action taken', '2023-01-21', 'blah blah', '2023-01-21 12:47:13', '2023-01-21 12:47:13', NULL, NULL),
(4, 3, 1, 'No Signature', NULL, '2023-01-21', 'sample', '2023-01-21 13:22:27', '2023-01-21 13:22:27', NULL, NULL),
(5, 3, 1, 'Grade Discrepancy', 'Pending', '2023-01-24', 'sample', '2023-01-24 13:14:59', '2023-01-24 13:14:59', NULL, NULL),
(6, 3, 1, 'Grade Discrepancy', 'Pending', '2023-01-24', 'sample', '2023-01-24 13:15:14', '2023-01-24 13:15:14', NULL, NULL),
(7, 3, 1, 'Grade Discrepancy', 'Pending', '2023-01-27', 'sdasdasd', '2023-01-27 13:12:31', '2023-01-27 13:12:31', NULL, NULL),
(8, 3, 1, 'Grade Discrepancy', 'Pending', '2023-01-27', 'qwqweqwe', '2023-01-27 13:18:48', '2023-01-27 13:18:48', NULL, NULL),
(9, 3, 1, 'Grade Discrepancy', 'Pending', '2023-01-27', 'qweqweqwe', '2023-01-27 13:24:13', '2023-01-27 13:24:13', NULL, NULL),
(10, 3, 1, 'Grade Discrepancy', 'Pending', '2023-01-27', 'qweqweqwe', '2023-01-27 13:25:32', '2023-01-27 13:25:32', NULL, 27);

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
(27, '2023_01_27_234135_add_student_no', 22);

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
(1, 1, 'coordinator', 'Grades', 'Scholar John Sidney  Salazar has submitted his/her grades', 'completed', '2023-01-27 12:32:46', '2023-01-27 05:14:14', '3'),
(2, 1, 'coordinator', 'Grades', 'Scholar John Sidney  Salazar has submitted his/her COR', 'completed', '2023-01-27 04:37:51', '2023-01-27 05:14:14', '3'),
(3, 3, 'student', 'Incident Report', 'Good day. We would like to inform you that an incident report was filed to you. please check on our website to check the details of the said report.', 'completed', '2023-01-27 13:12:35', '2023-01-27 05:35:27', '1'),
(4, 3, 'student', 'Incident Report', 'Good day. We would like to inform you that an incident report was filed to you. please check on our website to check the details of the said report.', 'completed', '2023-01-27 13:18:52', '2023-01-27 05:35:27', '1'),
(5, 3, 'student', 'Incident Report', 'Good day. We would like to inform you that an incident report was filed to you. please check on our website to check the details of the said report.', 'completed', '2023-01-27 13:24:18', '2023-01-27 05:35:27', '1'),
(6, 3, 'student', 'Incident Report', 'Good day. We would like to inform you that an incident report was filed to you. please check on our website to check the details of the said report.', 'completed', '2023-01-27 13:25:37', '2023-01-27 05:35:27', '1'),
(7, 1, 'admin', 'Grades', 'Scholar named John Sidney  Salazar has submitted a new request', 'completed', '2023-01-27 13:42:29', '2023-01-27 05:55:41', '1'),
(8, 1, 'student', 'Grades', 'Active', 'completed', '2023-01-27 06:38:17', '2023-01-27 06:40:26', '1'),
(9, 1, 'student', 'Grades', 'house', 'completed', '2023-01-27 06:39:07', '2023-01-27 06:40:26', '1'),
(10, 1, 'student', 'Grades', 'house', 'Pending', '2023-01-27 06:39:14', '2023-01-27 06:39:14', '2'),
(11, 1, 'coordinator', 'Grades', 'Scholar John Sidney  Salazar has submitted his/her grades', 'completed', '2023-01-28 04:25:05', '2023-01-27 20:28:30', '3');

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
(1, 'John Sidney ', 'Salazar', '1993-08-23', '23', 'address', '09533844872', 'Male', 'email@gmail.com', 'password', 'On Hold', 'course', 'first_sem', 'second_sem', '2022', '2023', 'school', 'year level', '2023-01-06 05:09:37', '2023-01-27 06:39:07', NULL, NULL),
(2, 'asdas', 'qwe', '1993-08-23', 'none', 'qweqwe', '09533844872', 'Male', 'sample@gmail.com', '12345678', 'On Hold', '12345678', 'first_sem', 'first_sem', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', '2023-01-27 06:13:12', '2023-01-27 06:39:14', 'scholar', NULL),
(3, 'qweqwe', 'qweqweqwe', '1993-08-23', 'none', 'qweqwe', '09533844872', 'Male', 'qweqweqwe@gmail.com', 'qweqweqwe-1234567', 'Active', 'qweqwe', 'first_sem', 'first_sem', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', '2023-01-27 15:48:43', '2023-01-27 15:48:43', 'scholar', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scholar_requests`
--

CREATE TABLE `scholar_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scholar_id` int(255) NOT NULL,
  `request_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scholar_requests`
--

INSERT INTO `scholar_requests` (`id`, `scholar_id`, `request_name`, `request_details`, `request_type`, `request_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'name', 'details', 'type', '2023-01-08', 'Approved', '2023-01-08 13:02:46', '2023-01-23 06:04:25'),
(3, 1, 'sample', 'sample', 'sample', '2023-01-24', 'Rejected', '2023-01-24 13:07:58', '2023-01-26 03:23:09'),
(4, 1, 'sample', 'sample', 'sample', '2023-01-24', 'Approved', '2023-01-24 13:08:31', '2023-01-25 03:42:16'),
(5, 1, 'sample', 'sample', 'sample', '2023-01-27', 'Pending', '2023-01-27 13:42:25', '2023-01-27 13:42:25');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `coordinators`
--
ALTER TABLE `coordinators`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `grade_details`
--
ALTER TABLE `grade_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `incident_reports`
--
ALTER TABLE `incident_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `scholars`
--
ALTER TABLE `scholars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scholar_requests`
--
ALTER TABLE `scholar_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
