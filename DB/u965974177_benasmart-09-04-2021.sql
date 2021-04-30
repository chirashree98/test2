-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 02:08 AM
-- Server version: 10.4.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u965974177_benasmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `smart_about_map`
--

CREATE TABLE `smart_about_map` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `about_iteam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_about_map`
--

INSERT INTO `smart_about_map` (`id`, `product_id`, `about_iteam`) VALUES
(1, 3, 'asdassd'),
(2, 3, 'asdassd'),
(3, 3, 'asdassdas'),
(4, 3, 'asdasddasd'),
(5, 4, 'asdassd'),
(6, 4, 'asdassd'),
(7, 4, 'asdassdas'),
(8, 4, 'asdasddasd');

-- --------------------------------------------------------

--
-- Table structure for table `smart_add_on_work`
--

CREATE TABLE `smart_add_on_work` (
  `id` int(20) NOT NULL,
  `added_by` int(20) NOT NULL,
  `add_on_task` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_on_fees` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` int(20) NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=> inactive, 1 => active',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_add_on_work`
--

INSERT INTO `smart_add_on_work` (`id`, `added_by`, `add_on_task`, `add_on_fees`, `updated_by`, `status`, `updated_at`) VALUES
(1, 1, 'Leakage repair', '100', 1, '1', '2021-04-01 09:42:42'),
(2, 1, 'Tank wash', '25', 1, '1', '2021-04-01 09:42:42'),
(3, 1, 'Pipeline Leakage', '100', 1, '1', '2021-04-01 09:42:53'),
(4, 1, 'Cleaning Washroom', '25', 1, '1', '2021-04-01 09:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `smart_admin_details`
--

CREATE TABLE `smart_admin_details` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_admin_details`
--

INSERT INTO `smart_admin_details` (`id`, `mail`) VALUES
(1, 'jayanta.ghosh@inwebinfo.com');

-- --------------------------------------------------------

--
-- Table structure for table `smart_all_professionals_cms`
--

CREATE TABLE `smart_all_professionals_cms` (
  `id` int(11) NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_all_professionals_cms`
--

INSERT INTO `smart_all_professionals_cms` (`id`, `section`, `image`, `heading`, `content`, `btn_text`, `btn_url`, `status`) VALUES
(1, 'banner', 'uploaded_files/banner/1617265173_image.jpg', 'Best Professionals in your Location', 'Doorstep repair, damage protection and post service guarantee', '', '', '1'),
(2, 'section_two', 'uploaded_files/icon/1617268926_image_2.png', 'Choose type of service', 'Customers can choose any type of services such as Basin Repairing.', '', '', '1'),
(3, 'section_two', 'uploaded_files/icon/1617268926_image_3.png', 'Choose your time-slot ', ' Customers will be able to book appointments at7:00 a.m to 11.00p.m.', '', '', '1'),
(4, 'section_two', 'uploaded_files/icon/1617268926_image_4.png', 'Professional services ', 'We provide us  Basin Repairing , Plumbing, Cleaning, Carpentry etc.', '', '', '1'),
(5, 'section_three', 'uploaded_files/icon/1617269201_image_5.png', '125 Professionals Near You', 'Choose Professionals and get best quote for you.', 'Contact Our Support Center', '#', '1'),
(6, 'faq', '', 'Do i have to organize supplies or would the Service Provider bring his own?', 'All supplies would be purchased by the Service Provider after consulting with you.', '', '', '1'),
(7, 'faq', '', 'How many cities is Benasmart operational in?', ' We are currently present in Us, Uk,India.', '', '', '1'),
(8, 'faq', '', 'Are your Service Providers qualified ?', 'Absolutely! We only bring in professionals who have been recommended and certified by experts. We conduct interviews, check referrals, licenses, and do background checks on each and every service provider.', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `smart_attribute`
--

CREATE TABLE `smart_attribute` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=active',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_attribute`
--

INSERT INTO `smart_attribute` (`id`, `name`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'COLOR', 0, 2021, '0000-00-00 00:00:00', 2021, '0000-00-00 00:00:00'),
(2, 'SIZE', 0, 2021, '0000-00-00 00:00:00', 2021, '0000-00-00 00:00:00'),
(3, 'MATERIAL', 0, 2021, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `smart_attribute_child`
--

CREATE TABLE `smart_attribute_child` (
  `id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=active',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_attribute_child`
--

INSERT INTO `smart_attribute_child` (`id`, `attribute_id`, `name`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(3, 1, 'RED', 0, 2021, '0000-00-00 00:00:00', 2021, '0000-00-00 00:00:00'),
(4, 1, 'WHITE', 0, 2021, '0000-00-00 00:00:00', 2021, '0000-00-00 00:00:00'),
(5, 3, 'wood', 0, 2021, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(6, 3, 'plastic', 0, 2021, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(7, 3, 'glass', 0, 2021, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(8, 3, 'metal', 0, 2021, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(9, 3, 'synthetic fibres', 0, 2021, '0000-00-00 00:00:00', 2021, '0000-00-00 00:00:00'),
(10, 2, 'XL', 0, 2021, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(11, 2, 'L', 0, 2021, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(12, 2, 'XXL', 0, 2021, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(13, 2, 'S', 0, 2021, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `smart_brand_master`
--

CREATE TABLE `smart_brand_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_brand_master`
--

INSERT INTO `smart_brand_master` (`id`, `name`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(2, 'ONERICA FASHION Pvt LTD', 0, 1, '2021-03-09 17:41:43', 1, '2021-03-19 07:52:12'),
(3, 'Alkhaleej Tcltd', 0, 1, '0000-00-00 00:00:00', 1, '2021-04-01 07:34:51'),
(6, 'Aura', 0, 1, '2021-03-19 08:38:16', 1, '2021-03-23 04:53:55'),
(7, 'Kubix', 0, 1, '2021-03-22 14:34:24', 0, '0000-00-00 00:00:00'),
(8, 'Arc', 0, 1, '2021-03-22 14:34:56', 1, '2021-03-23 05:03:23'),
(9, 'Aranaut', 0, 1, '2021-03-23 05:04:46', 0, '0000-00-00 00:00:00'),
(10, 'Fonte', 0, 1, '2021-03-23 05:10:28', 1, '2021-03-23 05:17:30'),
(11, 'Lyric', 0, 1, '2021-03-23 05:14:03', 0, '0000-00-00 00:00:00'),
(12, 'Vignette', 0, 1, '2021-03-23 05:18:41', 0, '0000-00-00 00:00:00'),
(13, 'Solo', 0, 1, '2021-03-23 05:20:54', 0, '0000-00-00 00:00:00'),
(14, 'Aria', 0, 1, '2021-03-23 05:23:42', 0, '0000-00-00 00:00:00'),
(15, 'Alive', 0, 1, '2021-03-23 05:24:48', 0, '0000-00-00 00:00:00'),
(16, 'Florentine', 0, 1, '2021-03-23 05:36:47', 0, '0000-00-00 00:00:00'),
(17, 'D\'Arc', 0, 1, '2021-03-23 05:41:17', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `smart_city_list`
--

CREATE TABLE `smart_city_list` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=active',
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_city_list`
--

INSERT INTO `smart_city_list` (`id`, `country_id`, `state_id`, `name`, `status`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(1, 3, 1, 'Annaba', 1, '2021-02-09 13:05:20', 1, '2021-03-26 13:29:46', 1),
(2, 7, 2, 'Mit Ghamr', 1, '2021-02-09 13:07:46', 1, '2021-03-26 13:31:29', 1),
(3, 12, 5, 'Los Angeles', 0, '2021-02-09 13:04:25', 1, '2021-03-23 12:24:09', 1),
(4, 11, 4, 'Mecca', 0, '2021-02-11 13:06:21', 1, '0000-00-00 00:00:00', 0),
(5, 12, 12, 'Houston', 0, '2021-03-23 13:23:33', 1, '2021-03-25 12:40:00', 1),
(6, 12, 13, 'Pittsburgh', 0, '2021-03-25 11:56:53', 1, '0000-00-00 00:00:00', 0),
(7, 9, 14, 'Bangalore', 0, '2021-03-25 12:35:28', 1, '0000-00-00 00:00:00', 0),
(8, 12, 5, 'Fullerton', 0, '2021-03-26 14:12:07', 1, '2021-03-30 04:41:08', 1),
(9, 12, 5, 'Charlotte', 0, '2021-03-29 11:07:07', 1, '0000-00-00 00:00:00', 0),
(10, 12, 5, 'Tustin', 0, '2021-03-29 11:27:23', 1, '2021-03-30 04:40:57', 1),
(11, 12, 5, 'Irvine', 0, '2021-03-30 07:02:08', 1, '0000-00-00 00:00:00', 0),
(12, 9, 3, 'Adoni', 0, '2021-04-01 07:51:00', 1, '0000-00-00 00:00:00', 0),
(13, 9, 14, 'Mysuru', 0, '2021-04-01 09:35:02', 1, '0000-00-00 00:00:00', 0),
(14, 9, 17, 'Tambaram', 0, '2021-04-01 12:46:19', 1, '2021-04-01 12:51:33', 1),
(15, 9, 18, 'Kolkata', 0, '2021-04-05 07:06:40', 1, '0000-00-00 00:00:00', 0),
(16, 12, 19, 'Flint', 0, '2021-04-05 10:25:39', 1, '2021-04-05 10:26:58', 1),
(17, 12, 5, 'San Francisco', 0, '2021-04-05 10:55:17', 1, '0000-00-00 00:00:00', 0),
(18, 12, 10, 'Cincinnat', 0, '2021-04-05 11:12:39', 1, '0000-00-00 00:00:00', 0),
(19, 12, 20, 'Springfield St', 0, '2021-04-05 12:44:43', 1, '2021-04-05 12:44:54', 1),
(20, 14, 21, 'Baguio', 0, '2021-04-06 07:32:20', 1, '0000-00-00 00:00:00', 0),
(21, 12, 22, 'Minneapolis', 0, '2021-04-06 07:55:26', 1, '0000-00-00 00:00:00', 0),
(22, 12, 23, 'Cheektowaga', 0, '2021-04-06 12:31:52', 1, '0000-00-00 00:00:00', 0),
(23, 12, 24, 'Dragram', 0, '2021-04-06 13:19:30', 1, '0000-00-00 00:00:00', 0),
(24, 12, 25, 'Keyport', 0, '2021-04-07 07:03:49', 1, '0000-00-00 00:00:00', 0),
(25, 12, 19, 'Dearborn', 0, '2021-04-07 07:12:23', 1, '0000-00-00 00:00:00', 0),
(26, 12, 5, 'Orange', 0, '2021-04-07 10:47:08', 1, '0000-00-00 00:00:00', 0),
(27, 12, 16, 'Oakland', 0, '2021-04-08 05:23:21', 1, '0000-00-00 00:00:00', 0),
(28, 13, 27, 'Herefordshire', 0, '2021-04-08 08:14:27', 1, '0000-00-00 00:00:00', 0),
(29, 12, 5, 'Santa Clara', 0, '2021-04-08 11:22:14', 1, '0000-00-00 00:00:00', 0),
(30, 12, 12, 'Alamo', 0, '2021-04-08 14:25:02', 1, '2021-04-08 14:26:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smart_cms_home_banner`
--

CREATE TABLE `smart_cms_home_banner` (
  `id` int(11) NOT NULL,
  `pic_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_cms_home_banner`
--

INSERT INTO `smart_cms_home_banner` (`id`, `pic_location`, `title`, `sub_title`, `updated_date`, `updated_by`) VALUES
(1, '/uploaded_files/banner/banner.jpg', 'We\'ve got all your home needs covered', 'The best experienced professional of all products at your doorstep', '2021-04-01 07:54:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smart_cms_home_why_benasmart`
--

CREATE TABLE `smart_cms_home_why_benasmart` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `titile` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `position` int(11) NOT NULL COMMENT '0=left,1=right',
  `updated_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smart_cms_home_why_benasmart`
--

INSERT INTO `smart_cms_home_why_benasmart` (`id`, `icon`, `titile`, `sub_title`, `position`, `updated_date`, `updated_by`) VALUES
(1, 'uploaded_files/why_icon/bd9ff107b0420a83798647330be44ac2.png', 'Guaranted work', 'BenaSmart provide long-lasting and best security solutions.', 0, '2021-03-25 07:43:23', 1),
(2, 'uploaded_files/why_icon/efb60a16d7c360997c5cc5b2d4e989e1.png', 'Professional only', 'Every service provider goes through strict rounds of skill assessment.', 0, '2021-03-22 06:07:19', 1),
(3, 'uploaded_files/why_icon/delivery.png', 'Right time delivery', 'BenaSmart  delivery products in right time.', 0, '2021-03-24 15:51:05', 1),
(4, 'uploaded_files/why_icon/cf5a325d06f4431dc334a40236bc37c4.png', '100% Quality Assured', 'We provide best quality products and best professional workers.', 1, '2021-03-25 07:36:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smart_country_list`
--

CREATE TABLE `smart_country_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isd_code` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=active',
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smart_country_list`
--

INSERT INTO `smart_country_list` (`id`, `name`, `isd_code`, `status`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(3, 'Algeria', '+213', 0, '2021-02-08 11:33:27', 1, '2021-04-01 06:30:55', 1),
(4, 'Argentina', '+54', 0, '2021-02-08 11:33:56', 1, '2021-02-12 09:54:24', 1),
(5, 'Canada', '+1', 0, '2021-02-08 11:34:17', 1, '2021-02-12 10:00:38', 1),
(6, 'Colombia', '+57', 0, '2021-02-08 11:34:27', 1, '2021-02-12 10:00:57', 1),
(7, 'Egypt', '+20', 0, '2021-02-08 11:34:38', 1, '2021-02-12 10:01:19', 1),
(8, 'France', '+33', 0, '2021-02-08 11:34:47', 1, '2021-02-12 10:01:37', 1),
(9, 'India', '+91', 0, '2021-02-08 11:34:59', 1, '2021-02-12 10:01:58', 1),
(11, 'Soudi Arabia', '+966', 0, '2021-02-11 13:02:47', 1, '2021-02-12 10:02:43', 1),
(12, 'United States', '+1', 0, '2021-03-23 11:42:28', 1, '0000-00-00 00:00:00', 0),
(13, 'England', '+44', 0, '2021-03-29 10:59:11', 1, '0000-00-00 00:00:00', 0),
(14, 'Phillipines', '+63', 0, '2021-04-06 07:13:45', 1, '2021-04-07 10:51:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smart_daily_deals`
--

CREATE TABLE `smart_daily_deals` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=active',
  `sent_status` int(11) NOT NULL COMMENT '1=sent',
  `expired_date` date NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smart_daily_deals`
--

INSERT INTO `smart_daily_deals` (`id`, `image`, `status`, `sent_status`, `expired_date`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(2, 'uploaded_files/deals/a01979939bd7517e4f41cbc84f78213a.jpg', 0, 1, '0000-00-00', '2021-02-08 07:29:25', 1, '0000-00-00 00:00:00', 0),
(3, 'uploaded_files/deals/f013f57764249370a197976e2dc61e9e.jpg', 0, 1, '0000-00-00', '2021-02-08 07:29:37', 1, '0000-00-00 00:00:00', 0),
(4, 'uploaded_files/deals/78f762d28af2c4b3dc1a61d76df9105a.jpg', 0, 1, '0000-00-00', '2021-02-08 07:29:49', 1, '0000-00-00 00:00:00', 0),
(5, 'uploaded_files/deals/e135ee7ef10742894668918c16232e4b.jpg', 0, 1, '0000-00-00', '2021-02-08 07:30:19', 1, '0000-00-00 00:00:00', 0),
(6, 'uploaded_files/deals/f4b68b7faffa3c4bad7b4c18952ca34d.jpg', 0, 1, '0000-00-00', '2021-02-08 07:30:53', 1, '0000-00-00 00:00:00', 0),
(7, 'uploaded_files/deals/f638c9fd9011ffe87954b1628772b8b5.jpg', 0, 1, '0000-00-00', '2021-02-08 07:31:07', 1, '0000-00-00 00:00:00', 0),
(8, 'uploaded_files/deals/643ad7d3d1a9fc0a889f693622b910e5.jpg', 0, 1, '0000-00-00', '2021-02-08 07:31:18', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `smart_expired_check`
--

CREATE TABLE `smart_expired_check` (
  `id` int(11) NOT NULL,
  `success_date` date NOT NULL,
  `notification_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smart_expired_check`
--

INSERT INTO `smart_expired_check` (`id`, `success_date`, `notification_time`) VALUES
(1, '2021-02-17', '2021-02-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `smart_hire_professional_order`
--

CREATE TABLE `smart_hire_professional_order` (
  `id` int(11) NOT NULL,
  `professional_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serivices` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_types` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_ons` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=> waiting,1=>on going ,2 => complete , 3=> cancel',
  `delete_from_user` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=> no , 1 => yes',
  `delete_from_professional` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=> no , 1 => yes',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_hire_professional_order`
--

INSERT INTO `smart_hire_professional_order` (`id`, `professional_id`, `customer_id`, `serivices`, `service_types`, `add_ons`, `date`, `time`, `message`, `status`, `delete_from_user`, `delete_from_professional`, `created_at`) VALUES
(1, '149', '70', '[\"174\",\"176\"]', '[\"174\",\"175\",\"176\"]', '[\"1\",\"2\",\"3\",\"4\"]', '27/04/2021', '19:00', 'a erdfsrF CsEF WSEF wrsF ', '0', '0', '0', '2021-04-07 10:59:10'),
(2, '149', '171', '[\"174\",\"176\"]', '[\"174\",\"175\",\"176\"]', '[\"1\",\"2\",\"3\",\"4\"]', '05/04/2021', '20:00', 'gdeufy', '0', '0', '0', '2021-04-07 11:09:06'),
(3, '149', '158', '[\"176\",\"227\"]', '[\"175\"]', '[\"3\",\"4\"]', '10/04/2021', '20:00', 'The added services are needed \r\nThanks', '0', '0', '0', '2021-04-07 13:23:24'),
(4, '96', '171', '[\"90\"]', '[\"194\"]', '[\"1\"]', '07/04/2021', '20:00', 'sdasdasasdasd', '0', '0', '0', '2021-04-07 18:25:31'),
(5, '149', '158', '[\"176\",\"227\"]', '[\"175\",\"176\"]', '[\"1\",\"3\"]', '10/06/2021', '13:00', 'test query', '0', '0', '0', '2021-04-08 05:44:14'),
(6, '149', '158', '[\"176\",\"227\"]', '[\"175\",\"176\"]', '[\"1\",\"2\"]', '09/04/2021', '19:00', 'Need this services', '0', '0', '0', '2021-04-08 08:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `smart_hire_professional_order_addon_map`
--

CREATE TABLE `smart_hire_professional_order_addon_map` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addon_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(50) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_hire_professional_order_addon_map`
--

INSERT INTO `smart_hire_professional_order_addon_map` (`id`, `order_id`, `addon_id`, `qty`) VALUES
(1, '1', '1', 1),
(2, '1', '2', 1),
(3, '1', '3', 1),
(4, '1', '4', 1),
(5, '2', '1', 1),
(6, '2', '2', 1),
(7, '2', '3', 1),
(8, '2', '4', 1),
(9, '3', '3', 1),
(10, '3', '4', 1),
(11, '4', '1', 1),
(12, '5', '1', 1),
(13, '5', '3', 1),
(14, '6', '1', 1),
(15, '6', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smart_hire_professional_order_serivices_map`
--

CREATE TABLE `smart_hire_professional_order_serivices_map` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(50) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_hire_professional_order_serivices_map`
--

INSERT INTO `smart_hire_professional_order_serivices_map` (`id`, `order_id`, `service_id`, `qty`) VALUES
(1, '1', '174', 1),
(2, '1', '176', 1),
(3, '2', '174', 1),
(4, '2', '176', 1),
(5, '3', '176', 1),
(6, '3', '227', 1),
(7, '4', '90', 1),
(8, '5', '176', 1),
(9, '5', '227', 1),
(10, '6', '176', 1),
(11, '6', '227', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smart_hire_professional_order_serivice_types_map`
--

CREATE TABLE `smart_hire_professional_order_serivice_types_map` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serivice_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(50) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_hire_professional_order_serivice_types_map`
--

INSERT INTO `smart_hire_professional_order_serivice_types_map` (`id`, `order_id`, `serivice_type_id`, `qty`) VALUES
(1, '1', '174', 1),
(2, '1', '175', 1),
(3, '1', '176', 1),
(4, '2', '174', 1),
(5, '2', '175', 1),
(6, '2', '176', 1),
(7, '3', '175', 1),
(8, '4', '194', 1),
(9, '5', '175', 1),
(10, '5', '176', 1),
(11, '6', '175', 1),
(12, '6', '176', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smart_home_logo`
--

CREATE TABLE `smart_home_logo` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=active',
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smart_home_logo`
--

INSERT INTO `smart_home_logo` (`id`, `image`, `status`, `created_date`, `created_by`) VALUES
(2, 'uploaded_files/home_logo/6b203f887dc40de69eaabaaa175d9e4b.jpg', 0, '2021-02-08 07:20:12', 1),
(3, 'uploaded_files/home_logo/58469ecb28db370c90b17c6698fdd150.jpg', 0, '2021-02-08 07:20:27', 1),
(4, 'uploaded_files/home_logo/a385dc100861a7acdbfc9b750d06840d.jpg', 0, '2021-02-08 07:20:40', 1),
(5, 'uploaded_files/home_logo/eef8d1b08ddc76498b40bdd1d754218b.jpg', 0, '2021-02-08 07:21:11', 1),
(6, 'uploaded_files/home_logo/0239a41fce88c1c29782dbc3b1c4d561.jpg', 0, '2021-02-08 07:21:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smart_notification_log`
--

CREATE TABLE `smart_notification_log` (
  `id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=new',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_notification_log`
--

INSERT INTO `smart_notification_log` (`id`, `type`, `message`, `status`, `created_date`) VALUES
(1, 'Professional Registration', 'test notification test notification\r\n test notification\r\n test notification\r\n\r\n\r\n', 1, '2021-03-18 17:12:19'),
(2, 'Professional Registration', 'f1 f2 registered as a professional user.', 1, '2021-03-31 18:49:46'),
(3, 'Professional Registration', 'Dinesh Ghosh registered as a professional user.', 1, '2021-04-01 13:05:43'),
(4, 'Professional Registration', 'Dinesh Ghosh registered as a professional user.', 1, '2021-04-01 13:05:46'),
(5, 'Professional Registration', 'Dinesh Ghosh registered as a professional user.', 1, '2021-04-01 13:48:53'),
(6, 'Professional Registration', 'Riya Smith registered as a professional user.', 1, '2021-04-01 14:34:40'),
(7, 'Professional Registration', 'sourav paul registered as a professional user.', 1, '2021-04-03 17:38:55'),
(8, 'Professional Registration', 'Joy Dey registered as a professional user.', 1, '2021-04-05 07:29:45'),
(9, 'Professional Registration', 'Hasan Uddin Mohammed registered as a professional user.', 1, '2021-04-05 13:49:36'),
(10, 'Professional Registration', 'Robert Smith registered as a professional user.', 1, '2021-04-06 09:36:33'),
(11, 'Professional Registration', 'Robert Smith registered as a professional user.', 1, '2021-04-06 09:36:36'),
(12, 'Professional Registration', 'Robert Smith registered as a professional user.', 1, '2021-04-06 09:49:04'),
(13, 'Professional Registration', 'Robert Smith registered as a professional user.', 1, '2021-04-06 10:02:03'),
(14, 'Professional Registration', 'David Pearce registered as a professional user.', 1, '2021-04-06 10:53:09'),
(15, 'Professional Registration', 'David Pearce registered as a professional user.', 1, '2021-04-06 11:07:31'),
(16, 'Professional Registration', 'David Pearce registered as a professional user.', 1, '2021-04-06 11:18:52'),
(17, 'Professional Registration', 'ch bhaduri registered as a professional user.', 1, '2021-04-06 11:37:01'),
(18, 'Professional Registration', 'test test registered as a professional user.', 1, '2021-04-06 11:56:13'),
(19, 'Professional Registration', 'test test registered as a professional user.', 1, '2021-04-06 11:58:21'),
(20, 'Professional Registration', 'David Pearce registered as a professional user.', 1, '2021-04-07 05:03:30'),
(21, 'Professional Registration', 'Mashan Richards registered as a professional user.', 1, '2021-04-07 09:20:29'),
(22, 'Professional Registration', 'Reshmi Shah registered as a professional user.', 1, '2021-04-07 14:24:19'),
(23, 'Professional Registration', 'riyamoni saha registered as a professional user.', 1, '2021-04-07 15:16:47'),
(24, 'Professional Registration', 'riyamoni saha registered as a professional user.', 1, '2021-04-07 15:16:50'),
(25, 'Professional Registration', 'Johnathon Franklin registered as a professional user.', 1, '2021-04-08 06:00:33'),
(26, 'Professional Registration', 'xc saf registered as a professional user.', 1, '2021-04-08 06:19:59'),
(27, 'Professional Registration', 'xc saf registered as a professional user.', 1, '2021-04-08 06:49:56'),
(28, 'Professional Registration', 'xc saf registered as a professional user.', 1, '2021-04-08 06:51:33'),
(29, 'Professional Registration', 'xc saf registered as a professional user.', 1, '2021-04-08 06:53:38'),
(30, 'Professional Registration', 'Rio Steve registered as a professional user.', 1, '2021-04-08 07:12:43'),
(31, 'Professional Registration', 'Fransis Mackdormand registered as a professional user.', 1, '2021-04-08 10:15:12'),
(32, 'Professional Registration', 'Aleson Janni registered as a professional user.', 1, '2021-04-08 12:51:53'),
(33, 'Ticket raise', 'customer jntgsh1 raised a ticket against James Miller', 1, '2021-04-08 21:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `smart_order_ticket_log`
--

CREATE TABLE `smart_order_ticket_log` (
  `id` int(11) NOT NULL,
  `ticket_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'BMNTKT001',
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_type` int(11) NOT NULL COMMENT '0=ticket,1=reply',
  `ticket_id` int(11) NOT NULL,
  `reply_by` int(11) NOT NULL,
  `reply_role_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=opened,1=closed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_order_ticket_log`
--

INSERT INTO `smart_order_ticket_log` (`id`, `ticket_no`, `order_id`, `customer_id`, `message`, `ticket_type`, `ticket_id`, `reply_by`, `reply_role_id`, `created_date`, `status`) VALUES
(1, '111', 2, 171, 'asdasd', 0, 0, 0, 0, '2021-04-07 13:05:49', 0),
(2, '222', 2, 171, 'asdasd', 0, 0, 0, 0, '2021-04-07 13:07:42', 0),
(3, '', 2, 0, 'asdasd', 1, 1, 171, 2, '2021-04-07 14:10:22', 0),
(4, '', 2, 0, 'asdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, 1, 171, 2, '2021-04-07 18:17:32', 0),
(5, '', 2, 0, 'ssssssssssssssssssssssssssssssssssssssssssssssssss', 1, 1, 171, 2, '2021-04-07 18:17:41', 0),
(6, '', 2, 0, '22222222222222222222222222222222222222222222222222222222222', 1, 2, 171, 2, '2021-04-07 18:21:25', 0),
(7, '', 2, 0, 'qweqwewasdasdasd', 1, 2, 171, 2, '2021-04-07 18:23:06', 0),
(8, '888', 5, 158, 'Plumber had not arrive on time', 0, 0, 0, 0, '2021-04-08 05:45:56', 0),
(9, '999', 6, 158, 'Vendor has not come on time', 0, 0, 0, 0, '2021-04-08 08:49:59', 0),
(10, '', 6, 0, 'Vendor has not come on time. Please check.', 1, 9, 158, 2, '2021-04-08 14:02:16', 0),
(11, '111111', 4, 171, 'asdasdasd', 0, 0, 0, 0, '2021-04-08 18:08:24', 1),
(12, '', 4, 0, 'aaaassss', 1, 11, 171, 2, '2021-04-08 18:09:01', 0),
(13, '', 4, 0, 'admin reply', 1, 11, 1, 1, '2021-04-08 19:05:39', 0),
(14, '', 4, 0, 'admin reply message 2', 1, 11, 1, 1, '2021-04-08 19:06:06', 0),
(15, '', 4, 0, 'Dasdsdfsdf', 1, 11, 1, 1, '2021-04-08 19:56:14', 0),
(18, 'BMNTKT018', 4, 171, 'asd', 0, 0, 0, 0, '2021-04-08 20:14:43', 1),
(19, 'BMNTKT019', 4, 171, 'asd', 0, 0, 0, 0, '2021-04-08 21:04:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `smart_otp_log`
--

CREATE TABLE `smart_otp_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=active',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_otp_log`
--

INSERT INTO `smart_otp_log` (`id`, `user_id`, `otp`, `email`, `status`, `created_date`) VALUES
(1, 0, 1807, 'mak2@gmail.com', 1, '2021-03-15 12:42:12'),
(2, 0, 1329, 'mak2@gmail.com', 0, '2021-03-17 10:35:43'),
(3, 0, 1652, 'mak2@gmail.com', 0, '2021-03-17 11:38:33'),
(4, 0, 1469, 'mak2@gmail.com', 0, '2021-03-17 11:58:12'),
(5, 0, 1107, 'mak2@gmail.com', 0, '2021-03-17 12:00:27'),
(6, 0, 1841, 'mak2@gmail.com', 0, '2021-03-17 12:54:47'),
(7, 0, 1422, 'mak2@gmail.com', 0, '2021-03-17 13:05:51'),
(8, 0, 1956, 'mak2@gmail.com', 0, '2021-03-17 13:12:28'),
(9, 0, 1152, 'mak2@gmail.com', 0, '2021-03-17 13:14:30'),
(10, 0, 1985, 'mak2@gmail.com', 0, '2021-03-17 13:39:15'),
(11, 0, 1411, 'mak2@gmail.com', 0, '2021-03-17 13:42:11'),
(12, 0, 1104, 'mak2@gmail.com', 0, '2021-03-17 13:43:59'),
(13, 0, 1414, 'mak2@gmail.com', 0, '2021-03-17 13:56:30'),
(14, 0, 1989, 'mak2@gmail.com', 0, '2021-03-17 14:01:14'),
(15, 0, 1918, 'mak2@gmail.com', 0, '2021-03-17 14:03:22'),
(16, 0, 1556, 'mak2@gmail.com', 0, '2021-03-17 14:14:24'),
(17, 0, 1994, 'mak2@gmail.com', 0, '2021-03-17 14:15:15'),
(18, 0, 1878, 'mak2@gmail.com', 0, '2021-03-17 14:17:13'),
(19, 0, 1590, 'mak2@gmail.com', 0, '2021-03-17 14:20:03'),
(20, 0, 1621, 'anand.mayank59@gmail.com', 0, '2021-03-18 06:14:55'),
(21, 0, 1334, 'testpro@test.com', 0, '2021-03-18 08:49:59'),
(22, 0, 1882, 'testpro@test.com', 0, '2021-03-18 08:50:50'),
(23, 0, 1206, 'mak2@gmail.com', 0, '2021-03-18 09:04:21'),
(24, 0, 1129, 'mak2@gmail.com', 0, '2021-03-18 09:06:25'),
(25, 0, 1167, 'mak2@gmail.com', 0, '2021-03-18 09:12:03'),
(26, 0, 1259, 'testpro@test.com', 0, '2021-03-18 09:22:36'),
(27, 0, 1499, 'testpro@test.com', 0, '2021-03-18 10:00:10'),
(28, 0, 1730, 'testpro@test.com', 0, '2021-03-18 10:00:57'),
(29, 27, 1771, 'testpro@test.com', 1, '2021-03-18 10:03:57'),
(30, 0, 1427, 'mak2@gmail.com', 0, '2021-03-18 13:12:11'),
(31, 35, 1252, 'riyamoni01@gmail.com', 1, '2021-03-29 08:18:29'),
(32, 35, 1751, 'riyamoni01@gmail.com', 0, '2021-03-29 09:04:37'),
(33, 35, 1202, 'riyamoni01@gmail.com', 0, '2021-03-29 09:13:16'),
(34, 113, 1313, 'riya.saha@inwebinfo.com', 1, '2021-03-29 10:49:36'),
(35, 35, 1221, 'riyamoni01@gmail.com', 1, '2021-03-30 07:54:04'),
(36, 35, 1854, 'riyamoni01@gmail.com', 0, '2021-03-30 09:11:54'),
(37, 35, 1262, 'riyamoni01@gmail.com', 0, '2021-03-30 09:19:44'),
(38, 35, 1532, 'riyamoni01@gmail.com', 0, '2021-03-30 10:49:57'),
(39, 151, 1980, 'jntgsh@gmail.com', 1, '2021-03-31 10:00:37'),
(40, 151, 1592, 'jntgsh@gmail.com', 1, '2021-03-31 11:09:55'),
(41, 151, 1226, 'jntgsh@gmail.com', 1, '2021-03-31 11:31:44'),
(42, 151, 1247, 'jntgsh@gmail.com', 0, '2021-03-31 11:33:13'),
(43, 151, 1673, 'jntgsh@gmail.com', 1, '2021-03-31 11:34:13'),
(44, 151, 1402, 'jntgsh@gmail.com', 1, '2021-03-31 11:38:23'),
(45, 151, 1216, 'jntgsh@gmail.com', 0, '2021-03-31 19:37:16'),
(46, 149, 1339, 'riya.saha@inwebinfo.com', 1, '2021-04-01 09:02:34'),
(47, 149, 1730, 'riya.saha@inwebinfo.com', 1, '2021-04-01 09:04:39'),
(48, 158, 1305, 'riyasaha738@gmail.com', 1, '2021-04-01 12:13:09'),
(49, 158, 1762, 'riyasaha738@gmail.com', 1, '2021-04-01 12:15:05'),
(50, 151, 1424, 'jntgsh@gmail.com', 1, '2021-04-05 09:30:53'),
(51, 149, 1482, 'riya.saha@inwebinfo.com', 1, '2021-04-08 05:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `smart_product_category_map`
--

CREATE TABLE `smart_product_category_map` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_product_category_map`
--

INSERT INTO `smart_product_category_map` (`id`, `product_id`, `category_id`) VALUES
(1, 3, 1),
(2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `smart_product_detail`
--

CREATE TABLE `smart_product_detail` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=active',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_product_detail`
--

INSERT INTO `smart_product_detail` (`id`, `supplier_id`, `name`, `brand_id`, `product_des`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 34, 'asd', 2, '', 0, 1, '2021-03-11 10:24:29', 0, '0000-00-00 00:00:00'),
(2, 34, 'asd', 2, '', 1, 1, '2021-03-11 10:24:33', 0, '0000-00-00 00:00:00'),
(3, 34, 'asd', 2, '', 1, 1, '2021-03-11 10:49:22', 0, '0000-00-00 00:00:00'),
(4, 34, 'asd', 2, '', 1, 1, '2021-03-11 11:02:12', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `smart_product_image`
--

CREATE TABLE `smart_product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_product_image`
--

INSERT INTO `smart_product_image` (`id`, `product_id`, `image`) VALUES
(1, 4, 'uploaded_files/project_pic/f79c08cd8ac30e8c9c72f492aea96a9b.jpg'),
(2, 4, 'uploaded_files/project_pic/23907907e004cc0390604f057409c1f4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `smart_product_sub_cat_map`
--

CREATE TABLE `smart_product_sub_cat_map` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_product_sub_cat_map`
--

INSERT INTO `smart_product_sub_cat_map` (`id`, `product_id`, `sub_cat_id`) VALUES
(1, 3, 3),
(2, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `smart_professional_about_us`
--

CREATE TABLE `smart_professional_about_us` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `yr_of_exp` int(11) NOT NULL,
  `word_of_exp` varchar(255) NOT NULL,
  `no_of_project` int(11) NOT NULL,
  `word_project` varchar(255) NOT NULL,
  `no_emergency_service` int(11) NOT NULL,
  `word_emergency` varchar(255) NOT NULL,
  `registration_no` varchar(255) DEFAULT NULL,
  `registration_date` varchar(255) DEFAULT NULL,
  `registration_exp_date` varchar(255) DEFAULT NULL,
  `national_id_no` varchar(255) DEFAULT NULL,
  `residential_no` varchar(255) DEFAULT NULL,
  `commercial_no` varchar(255) DEFAULT NULL,
  `insurance_certification` varchar(255) DEFAULT NULL,
  `about_us` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smart_professional_about_us`
--

INSERT INTO `smart_professional_about_us` (`id`, `user_id`, `yr_of_exp`, `word_of_exp`, `no_of_project`, `word_project`, `no_emergency_service`, `word_emergency`, `registration_no`, `registration_date`, `registration_exp_date`, `national_id_no`, `residential_no`, `commercial_no`, `insurance_certification`, `about_us`) VALUES
(2, 28, 1, 'asd', 11, 'asd', 111, 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adasdasdasd'),
(3, 27, 1, 'asdasdas', 11, 'asdass', 111, 'asdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdasd\r\nsdf\r\nfds'),
(4, 32, 8, 'As plumber', 90, 'PWC Project, PWL Project', 100, 'PWC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Professional Profile as plumber'),
(5, 61, 9, 'Engineering Exp', 80, 'PWC Project, PWL Project completed', 90, 'Completed lot of emergenecy services', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A engineer dealing in several job roles'),
(6, 34, 1, 'few word of experience', 11, 'few word of project completed', 111, 'few word of emergency services', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'few word of emergency services few word of emergency services few word of emergency services few word of emergency services few word of emergency services few word of emergency services few word of emergency services few word of emergency services few word of emergency services few word of emergency services few word of emergency services few word of emergency services few word of emergency services few word of emergency services few word of emergency services few word of emergency services'),
(7, 64, 7, 'Art', 67, 'industrial', 60, 'lorem ipsum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test'),
(8, 66, 11, 'asd', 1, 'asd', 1, 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asd'),
(9, 71, 6, 'wrw', 678, 'ww', 890, 'we', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'wrw'),
(10, 80, 1, 'few word of experience', 1, 'few word of project completed', 1, 'few word of emergency services', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.'),
(11, 93, 11, 'few word of experience', 11, 'few word of experience', 111, 'few word of experience', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.'),
(12, 35, 6, 'As plumber', 67, 'PWC Project, PWL Project', 7, 'PWC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guhijiji'),
(13, 96, 7, 'Plumbing Layout,Appliance installation,Piping systems.', 400, 'Refurbishment work to bathroom and kitchens.', 500, 'Installing and maintaining  domestic hot and cold water systems.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'I am a keen, hard-working, multi-skilled and ambitious qualified Plumber with over five years of experience in installing, repairing and servicing gas appliances and working on a variety of plumbing and heating systems. I am always willing to go the extra mile to deliver a high standard of work and exceed customer needs and expectations.'),
(14, 98, 7, 'Fault Finding/ Testing ,Control  panel wiring', 300, 'Assisted in reconfiguration of pump stations,Pipe Fitting', 200, 'Responsible for energy management control wiring', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'I am a keen, hard-working, multi-skilled and ambitious qualified electrician with over seven  years of experience in knowledge of electrical legislation, codes, and standards of practice. I was experienced in installing, maintaining and testing electrical systems and equipment in domestic, commercial and industrial environments.I am always willing to go the extra mile to deliver a high standard of work and exceed customer needs and expectations.'),
(15, 97, 5, 'Working as Mech contractor', 330, 'Total 330 contract based projects completed', 5, 'Plumber, All sort of contraction', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Our success is based on the continuous commitment that Alpha Mechanical services give to all our clients by continuously updating and developing our services, and importantly, in this time of rising costs – competitive pricing structur'),
(16, 99, 1, 'aa', 11, 'aa', 1, 'aa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'zasd'),
(17, 102, 1, 'q', 1, 'q', 1, 's', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ss'),
(18, 148, 6, 'Concrete estimation,Power and handtool operation.', 300, 'Supervise  training for workers on site-specific requirements.', 600, 'Planning and direction of all construction projects.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'I am qualify competitive subcontractor bides prior to excution  of contracts and carefully coordinate plans and specs to keep projects\r\nrunnning smoothly.'),
(19, 149, 8, 'Install, repair, and maintain pipes, valves, fittings.', 100, '100 projects completed and counting till now.', 25, '25 emergency services offered', 'R923455', '24/10/2009', '24/10/2012', 'NI576878', 'RE7890', 'CM989809', 'uploaded_files/insurance_certification/797e383f12c5771c47017e8001341dc7.png', 'Install, repair, and maintain pipes, valves, fittings, drainage systems, and fixtures in commercial and residential structures. Collaborate with general contractors, electricians, and other construction professionals. Follow building plans and blueprints.'),
(20, 163, 163, '163', 163, '163', 163, '163', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '163'),
(21, 164, 1111, '1111', 1111, '11111', 111, '1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfs sadsdfsdfsdfsdfsdfsdfs sadsdfsdfsdfsdfsdfsdfs sadsdf'),
(22, 165, 1111, '1111', 1111, '11111', 111, '1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfs sadsdfsdfsdfsdfsdfsdfs sadsdfsdfsdfsdfsdfsdfs sadsdf'),
(23, 166, 1111, '1111', 1111, '11111', 111, '1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfs sadsdfsdfsdfsdfsdfsdfs sadsdfsdfsdfsdfsdfsdfs sadsdf'),
(24, 170, 0, '', 0, '', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(25, 169, 5, 'Meeting  new & existing Clients and determining their requirements.', 400, 'Delivering Projects within strict deadlines and client budgets.', 100, 'Delevering 2D,3D CAD product files into product library.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'I am a keen,hard-working,multiskilled, and ambitious qualified interior designer with over seven yeas experience in knowledge of strong 3D modeling,visualization and animation skills and familiar with Uk building regulations and ability to translate 2D drawing into 3D visuals.'),
(26, 172, 9, 'Specalist  in cryogenic insulation.', 600, 'Responsible for cladding, Material testing,PFP coating.', 900, 'Responsible for pipeline coating,wrapping.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'I am a keen, hard-working, multi-skilled and ambitious qualified Cladder with over nine years of experience in Planning,PFp coating/insulation,Cladding,Material testing. I am always willing to go the extra mile to deliver a high standard of work and exceed customer needs and expectations.'),
(27, 167, 5, 'Enter few word of experience12', 10, 'Few word of project completed123', 5, 'Few word of emergency services321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the'),
(28, 182, 30, 'Inspecting problem roofingto determine the best repair procedures.', 100, 'Completed lead or metal fishing works associated with roofing.', 70, 'Cutting felt, shingles, or strips of flashing to fit angles .', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'I am a keen, hard-working, multi-skilled and ambitious qualified  roofer with over thrity years of experience in Placing tiles, nailing them to roof boards, and covering nail heads with roofing cement. I am always willing to go the extra mile to deliver a high standard of work and exceed customer needs and expectations.'),
(29, 183, 15, 'Clean  building floors by sweeping,mopping.', 12, 'Clean windows,glass partition,or mirrors using soapy waters.', 10, 'Provide carpet cleaning service to residential properties.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'I am a keen, hard-working, multi-skilled and ambitious qualified carpet cleaner with over fifteen  years of experience in carpet cleaning.I am always willing to go the extra mile to deliver a high standard of work and exceed customer needs and expectations.'),
(30, 184, 0, '', 0, '', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(31, 185, 8, 'Cctv installation and maintanance,coaxial,cat5e.', 3, 'Holiday Inn Down Town,Holiday Inn sharjah.', 4, 'Installation and maintainance of cctv security system.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'I am a keen, hard-working, multi-skilled and ambitious qualified Cctv installer with over eight years of experience in installation and maintainance of cctv security system.I am always willing to go the extra mile to deliver a high standard of work and exceed customer needs and expectations.'),
(32, 186, 0, '', 0, '', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(33, 187, 1, 'Plumbing Layout,Appliance installation,Piping systems.000', 1, 'Refurbishment work to bathroom and kitchens.000', 1, 'Installing and maintaining  domestic hot and cold water systems.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'About Us'),
(34, 188, 0, '', 0, '', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(35, 189, 6, 'Few word of experience', 6, 'Few word of experience', 6, 'Few word of experience', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'About Us'),
(36, 190, 0, '', 0, '', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(37, 192, 0, '', 0, '', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(38, 193, 0, '', 0, '', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(39, 196, 20, 'Network Analyzer,Install resedential/commercial satelite systems.', 300, 'Integrated service digital network ISDN analyzers.', 700, 'Assamble a variety of satelite dishes.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'I am a keen, hard-working, multi-skilled and ambitious qualified  satelite installer with over  twenty years of experience in Network Analyzer,Install resedential/commercial satelite systems. I am always willing to go the extra mile to deliver a high standard of work and exceed customer needs and expectations.'),
(40, 199, 0, '', 0, '', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(41, 200, 0, '', 0, '', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(42, 201, 0, '', 0, '', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(43, 202, 20, 'Convert the features of AWS DynamoDB into the custom Alexa skill.', 20, 'Operate Household Appliances by Commanding the Echo Device.', 20, 'Convert a Raspberry Pi device into an Alexa equipped device.', '', '', '', '', '', '', NULL, 'I am a keen, hard-working, multi-skilled and ambitious qualified  Alexa skill developer with over  twenty years of experience in AWS DynamoDB into the custom Alexa skill and convert a Raspberry Pi device into an Alexa equipped device,Skill Development Kit for Node js. I am always willing to go the extra mile to deliver a high standard of work and exceed customer needs and expectations.'),
(44, 203, 30, 'Manage a crew of two installers at a time.', 20, 'Install,maintain and repair racking.', 10, 'Install,maintain and repair racking,electrical equpments,panels.', '', '', '', '', '', '', NULL, 'I am a keen, hard-working, multi-skilled and ambitious qualified solar installer with over twenty years of experience in Install,maintain and repair racking,electrical equpments,panels. I am always willing to go the extra mile to deliver a high standard of work and exceed customer needs and expectations.');

-- --------------------------------------------------------

--
-- Table structure for table `smart_professional_company_det`
--

CREATE TABLE `smart_professional_company_det` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isd_code` int(11) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `zipcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smart_professional_company_det`
--

INSERT INTO `smart_professional_company_det` (`id`, `user_id`, `isd_code`, `mobile_no`, `email`, `address1`, `address2`, `country_id`, `state_id`, `city_id`, `zipcode`) VALUES
(1, 28, 4, '9609195755', 'asd@asd.com', 'asd', 'asd', 9, 3, 3, '700091'),
(2, 27, 3, '9999999999', '111@gmail.com', 'asd', 'asd', 7, 2, 2, '700091'),
(3, 32, 9, '6788989089', 'rs@gmail.com', '12, Post man street', '13 Post man street', 11, 4, 4, '8000125'),
(4, 61, 10, '7980909098', 'abc@gmail.com', '12 Soudi', '123 Soudi lane', 11, 4, 4, '909787'),
(5, 34, 3, '9999999999', '111@gmail.com', 'asd', 'asd', 7, 2, 2, '700091'),
(6, 66, 4, '9999999999', '111@gmail.com', 'asd', 'asd', 7, 2, 2, '700091'),
(7, 71, 4, '8980909000', 'abc@gmail.com', '12, R B Avenue', 'Soudi', 11, 4, 4, '98909'),
(8, 80, 3, '9999999999', '111@gmail.com', 'asd', 'asd', 7, 2, 2, '700091'),
(9, 93, 3, '9999999999', '111@gmail.com', 'asd', 'asd', 11, 4, 4, '700091'),
(10, 35, 11, '7687980909', 'rs@gmail.com', '12, R B Avenue', 'Soudi', 11, 4, 4, '8000125'),
(11, 96, 5, '7136654997', 'info@santhoffplumbing.com', '6330 Alder Dr #12,Houston,', 'TX 77081, United State', 12, 12, 5, '77002'),
(12, 102, 4, '9999999999', '111@gmail.com', 'asd', 'asd', 7, 2, 2, '700091'),
(13, 98, 9, '8033512156', 'services@housejoy.in', 'Housejoy, Sarvaloka Services On Call Pvt Ltd. No.', 'SM Towers, #261, 3rd cross, Domlur, 2nd Stage,', 9, 14, 7, '560002'),
(14, 148, 5, '8004691922', 'info@greaterpacificconstruction.com', '17291 Irvine Blvd #159,Tustin,', 'CA 92780, United state', 12, 5, 10, '92780'),
(15, 149, 12, '7386383889', 'rs@gmail.com', '12, SR Lane', 'USA, PEnnsylvania', 12, 13, 6, '8000125'),
(16, 165, 3, '9999999999', 'jntgsh12@gmail.com', 'asd', 'asd', 3, 1, 1, '123'),
(17, 166, 3, '9999999999', 'asd@asd.com', 'asd', 'sdf', 11, 4, 4, '111111'),
(18, 162, 11, '8980990786', 'riyamoni01@gmail.com', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '94043'),
(19, 170, 0, '', '', 'asd', 'asd', 11, 4, 4, '111111'),
(20, 169, 5, '4159081880', 'editor@dexigner.com', '452 Tehama Street San Francisco,', 'CA 94103 United States', 12, 5, 17, '94103'),
(21, 172, 5, '8332123828', 'support@Techmetals.co', '345 Springfield', 'St, Dayton, OH 45403', 12, 20, 19, '45403'),
(22, 167, 3, '8892347351', 'user3@gmail.com', 'Company Address:', 'assassas', 12, 24, 23, '700000'),
(23, 182, 5, '7168965555', 'Sales@MurrayRoofingCompanyInc.com', '600 Cayuga Creek Rd, Cheektowaga', 'NY 14227, United State', 12, 23, 22, '14227'),
(24, 183, 5, '7325836571', 'sales@chemdry.co.uk', ' 426 Ocean Blvd Keyport ​', ' NJ, 07735-6031', 12, 25, 24, '07735 '),
(25, 184, 11, '6789067890', 'cooper@gmail.com', '48E Middle field Road', 'Sunset Apartment', 12, 5, 8, '89809'),
(26, 185, 5, '9492724594', ' sales@gvision-usa.com', '20532 Crescent Bay Drive ', 'Lake Forest, CA 92630 United States', 12, 5, 26, '92630'),
(27, 186, 11, '8099809787', 'bens@gmail.com', '56 E Carat lane', 'united states', 12, 23, 22, '90879'),
(28, 187, 3, '8892347351', 'user332@gmail.com', 'kolkata', 'Address Line2', 9, 3, 12, '00000'),
(29, 188, 12, '9999999999', 'asd@asd.com', 'asdasd', 'asdasd', 11, 4, 4, '111111'),
(30, 189, 3, '8892347351', 'user3@gmail.com', 'kolkata', 'Address Line2', 9, 3, 12, '00000'),
(31, 190, 11, '7890567891', 'bena@gmail.com', '48E Middle field Road', 'Sunset Apartment', 12, 5, 10, '94043'),
(32, 192, 3, '8892347351', 'user1@gmail.com', 'kolkata', 'Address Line2', 9, 3, 12, '00000'),
(33, 193, 9, '7894564560', 'bena@gmail.com', 'Mangalore', 'assassas', 12, 5, 10, '575001'),
(34, 196, 5, '4155846360', 'info@ghostmail.co.uk', '750 Naples St, San Francisco', 'California, 94112, United States', 12, 5, 17, '94112'),
(36, 199, 0, '', '', '', '', 0, 0, 0, ''),
(37, 200, 0, '', '', '', '', 0, 0, 0, ''),
(38, 201, 0, '', '', '', '', 0, 0, 0, ''),
(39, 202, 12, '4153012880', 'info@leewayhertz.com', '388 Market Street', 'Suite 1300', 12, 5, 17, '94111'),
(40, 203, 12, '4084971579', 'sales@frescosolar.com', '16875 Joleen Way', 'Morgan Hill', 12, 12, 30, '95037');

-- --------------------------------------------------------

--
-- Table structure for table `smart_professional_review`
--

CREATE TABLE `smart_professional_review` (
  `id` int(11) NOT NULL,
  `professional_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_professional_review`
--

INSERT INTO `smart_professional_review` (`id`, `professional_id`, `customer_id`, `project_id`, `rate`, `remarks`, `created_date`) VALUES
(1, 95, 74, 74, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris', '2021-03-22 18:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `smart_professional_review_reply`
--

CREATE TABLE `smart_professional_review_reply` (
  `id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_by` int(11) NOT NULL,
  `reply_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_professional_review_reply`
--

INSERT INTO `smart_professional_review_reply` (`id`, `review_id`, `remarks`, `reply_by`, `reply_date`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris', 80, '2021-03-22 18:37:09'),
(2, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 80, '2021-03-22 18:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `smart_project_details`
--

CREATE TABLE `smart_project_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `fess_p_hour` double NOT NULL,
  `fees_p_s_feet` double NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smart_project_details`
--

INSERT INTO `smart_project_details` (`id`, `user_id`, `project_name`, `fess_p_hour`, `fees_p_s_feet`, `description`) VALUES
(1, 27, '2', 2, 2, ''),
(2, 28, '', 0, 0, ''),
(3, 27, '1', 1, 1, ''),
(4, 30, 'asd 123', 0, 1, ''),
(5, 31, 'asd', 1, 0, ''),
(6, 32, 'PFC Project', 0, 10, ''),
(7, 34, 'PWS PRoject', 90, 0, ''),
(9, 36, 'PWC Type', 60, 0, ''),
(10, 32, 'pwc type', 67, 0, ''),
(11, 32, 'PWC Type', 67, 0, ''),
(12, 61, 'PI', 90, 0, ''),
(13, 61, 'PL', 80, 0, ''),
(14, 62, 'weq', 90, 0, ''),
(15, 64, '', 0, 0, ''),
(16, 65, '', 0, 0, ''),
(17, 66, '', 0, 0, ''),
(18, 71, 'PWC Type', 56, 0, ''),
(19, 0, 'PWC Type', 90, 0, ''),
(20, 0, 'PWC Type', 90, 0, ''),
(21, 0, 'PWC Type', 90, 0, ''),
(22, 0, 'PWC Type', 90, 0, ''),
(23, 0, 'PWC Type', 90, 0, ''),
(24, 0, 'PWC Type', 90, 0, ''),
(25, 0, 'PWC Type', 90, 0, ''),
(26, 0, 'PWC Type', 90, 0, ''),
(27, 0, 'PWC Type', 90, 0, ''),
(28, 0, 'PWC Type', 90, 0, ''),
(29, 0, 'PWC Type', 90, 0, ''),
(30, 0, 'PWC Type', 90, 0, ''),
(31, 0, 'PWC Type', 90, 0, ''),
(32, 0, 'PWC Type', 90, 0, ''),
(33, 0, 'PWC Type', 90, 0, ''),
(34, 0, 'PWC Type', 90, 0, ''),
(35, 0, 'PWC Type', 90, 0, ''),
(36, 0, 'PWC Type', 90, 0, ''),
(37, 0, 'PWC Type', 90, 0, ''),
(38, 0, 'test', 1, 0, ''),
(39, 0, 'test', 1, 0, ''),
(40, 0, 'test', 1, 0, ''),
(41, 0, 'test', 1, 0, ''),
(42, 0, 'test', 1, 0, ''),
(43, 0, 'test', 1, 0, ''),
(44, 0, 'test', 1, 0, ''),
(45, 0, 'test', 1, 0, ''),
(46, 0, 'test', 1, 0, ''),
(47, 0, 'test', 1, 0, ''),
(48, 0, 'test', 1, 0, ''),
(49, 0, 'test', 1, 0, ''),
(50, 0, 'test', 1, 0, ''),
(51, 0, 'test', 1, 0, ''),
(52, 0, 'test', 1, 0, ''),
(53, 0, 'test', 1, 0, ''),
(54, 0, 'test', 1, 0, ''),
(55, 0, 'pwc type', 0, 89, ''),
(56, 0, 'Rx', 67, 0, ''),
(57, 0, 'pwc type', 0, 89, ''),
(58, 0, 'Rx', 67, 0, ''),
(59, 0, 'pwc type', 0, 89, ''),
(60, 0, 'Rx', 67, 0, ''),
(61, 0, 'pwc type', 0, 89, ''),
(62, 0, 'Rx', 67, 0, ''),
(63, 0, 'pwc type', 0, 89, ''),
(64, 0, 'Rx', 67, 0, ''),
(65, 0, 'pwc type', 0, 89, ''),
(66, 0, 'Rx', 67, 0, ''),
(67, 0, '1', 1, 0, ''),
(68, 0, '1', 1, 0, ''),
(69, 75, '1', 1, 0, ''),
(70, 76, '1', 1, 0, ''),
(71, 77, '1', 1, 0, ''),
(72, 78, '1', 1, 0, ''),
(73, 79, 'asd', 1, 0, ''),
(74, 80, 'asd', 1, 0, ''),
(75, 81, 'asd', 0, 0, ''),
(76, 82, 'asd', 0, 0, ''),
(77, 83, 'asd', 0, 0, ''),
(78, 84, 'asd', 0, 0, ''),
(79, 85, 'asd', 0, 0, ''),
(80, 86, 'asd', 0, 0, ''),
(81, 87, 'asd', 0, 0, ''),
(82, 88, 'asd', 0, 0, ''),
(83, 89, 'asd', 0, 0, ''),
(84, 90, 'asd', 0, 0, ''),
(85, 91, '1', 1, 0, ''),
(86, 92, 'PWC Type', 0, 78, ''),
(87, 80, 'asd', 1, 0, ''),
(88, 93, 'asd', 1, 0, ''),
(89, 95, 'test', 11, 0, ''),
(90, 96, ' Plumbing', 600, 0, 'Installing and maintaining systems used for potable (drinking) water, sewage and drainage in plumbing systems.\r\n    \r\n'),
(92, 97, 'BI', 6, 0, ''),
(93, 97, 'MI', 8, 0, ''),
(94, 95, 'a', 0, 0, 'a'),
(95, 95, 'b', 0, 0, 'b'),
(106, 98, ' Cabel Fitting', 300, 0, 'Fitting a cable for ceiling light.'),
(111, 100, 'PI', 67, 0, ''),
(114, 99, 'test22qq', 3001, 0, 'testqq'),
(115, 99, 'test 2', 0, 200, 'asdasd'),
(116, 101, 'asd', 1, 0, ''),
(117, 99, 'test', 1, 0, 'ss'),
(124, 103, 'asd', 1, 0, ''),
(125, 104, 'asd', 1, 0, 'asd'),
(126, 105, 'Repairing pipes', 20, 0, ''),
(127, 106, 'Repairing pipes', 20, 0, ''),
(128, 107, 'Repairing pipes', 20, 0, ''),
(129, 108, 'Repairing pipes', 20, 0, ''),
(130, 109, 'Repairing pipes', 20, 0, ''),
(131, 110, 'Repairing pipes', 20, 0, ''),
(132, 111, 'Repairing pipes', 20, 0, ''),
(133, 112, 'AB', 45, 0, ''),
(134, 113, 'Installing W1', 90, 0, ''),
(135, 113, 'Installing W2', 0, 10, ''),
(136, 98, 'Pipe Fitting', 600, 0, 'A fitting or adapter is used in pipe systems to connect straight sections of pipe or tube, adapt to different sizes or shapes, and for other purposes such as regulating fluid flow.'),
(137, 98, 'Electrical Wiring Design & Construction', 2000, 0, 'The quality of control panel layout and wiring is an essential part of design & construction. The goal is to produce a panel that is logically arranged and easy to maintain for the life of control panel.'),
(138, 113, 'PWC Type', 90, 0, 'Pwc'),
(139, 114, 'Plumbing', 10, 0, ''),
(140, 115, 'Plumbing', 10, 0, ''),
(141, 116, 'Plumbing', 10, 0, ''),
(142, 117, 'Plumbing', 10, 0, ''),
(143, 118, 'Plumbing', 10, 0, ''),
(144, 119, 'Plumbing', 10, 0, ''),
(145, 120, 'Plumbing', 10, 0, ''),
(146, 121, 'Plumbing', 10, 0, ''),
(147, 122, 'Plumbing', 10, 0, ''),
(148, 123, 'Plumbing', 10, 0, ''),
(149, 124, 'Plumbing', 10, 0, ''),
(150, 125, 'asd', 1, 0, ''),
(151, 126, 'asd', 1, 0, ''),
(152, 127, 'Plumbing', 10, 0, ''),
(153, 128, 'asd', 1, 0, ''),
(154, 129, 'asd', 1, 0, ''),
(155, 130, 'asd', 1, 0, ''),
(156, 131, 'asd', 1, 0, ''),
(157, 132, 'asd', 1, 0, ''),
(158, 133, 'asd', 1, 0, ''),
(159, 134, 'asd', 1, 0, ''),
(160, 135, 'asd', 1, 0, ''),
(161, 136, 'asd', 1, 0, ''),
(162, 137, 'asd', 1, 0, ''),
(163, 138, 'asd', 1, 0, ''),
(164, 139, 'asd', 1, 0, ''),
(165, 140, 'adf', 212, 0, ''),
(166, 141, 'adf', 212, 0, ''),
(167, 142, 'adf', 212, 0, ''),
(168, 143, 'dg', 324, 0, ''),
(169, 144, 'dg', 324, 0, ''),
(170, 145, 'dg', 324, 0, ''),
(171, 146, 'Plumbing', 10, 0, ''),
(172, 147, 'Plumbing', 10, 0, ''),
(174, 149, 'Plumbing ', 0, 90, 'Plumbing '),
(176, 149, 'Leakage Repair', 15, 0, 'Leakage Repair'),
(177, 148, 'Supervising ', 8000, 0, 'Supervise  and manage all construction site activites.'),
(180, 148, 'Project budgeting', 600, 0, 'Amount of money allotted for a specific building or remodeling project.'),
(182, 150, 'TY', 90, 0, ''),
(183, 150, 'TY1', 0, 90, ''),
(184, 151, 'test_service_1', 1000, 0, ''),
(185, 152, 'asd', 1, 0, ''),
(186, 153, 'asd', 1, 0, ''),
(188, 156, 'Appliance installation', 90, 0, ''),
(189, 156, 'Electrical equipment maintainance', 0, 90, ''),
(190, 157, 'asd', 1, 0, ''),
(191, 159, 'Roofing', 700, 0, ''),
(192, 160, 'Roofing', 700, 0, ''),
(193, 161, 'Roofing', 0, 6000, ''),
(194, 162, 'Basin repair', 89, 0, ''),
(195, 162, 'juk', 90, 0, 'yityit'),
(196, 163, '1111', 1, 0, '111'),
(197, 164, '1111', 1, 0, '111'),
(198, 165, '1111', 1, 0, '111'),
(199, 166, '1111', 1, 0, '111'),
(200, 167, 'Service Name1', 0, 500, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the '),
(201, 169, 'Interior Designer', 8000, 0, ''),
(202, 170, 'asd', 1, 0, 'asd'),
(203, 172, 'Cladding', 28000, 0, ' Cladding is generally attached to the structure of the building.'),
(204, 173, 'Roofing', 17000, 0, ''),
(205, 174, 'Roofing', 17000, 0, ''),
(206, 175, 'Roofing', 8000, 0, ''),
(207, 176, 'Roofing', 0, 8000, ''),
(208, 177, 'Roofing', 8000, 0, ''),
(209, 178, 'Roofing', 6000, 0, ''),
(210, 179, 'Roofing', 26000, 0, ''),
(211, 180, 'Roofing', 0, 6000, ''),
(212, 181, 'Roofing', 38000, 0, ''),
(216, 183, 'Carpet Cleaning', 16000, 0, 'Carpet cleaning is performed to remove stains, dirt, and allergens from carpets. Common methods include hot water extraction, dry-cleaning, and vacuuming. '),
(218, 184, 'PI', 90, 0, 'PI jkjklk'),
(219, 184, 'pwc type', 78, 0, 'kykityi'),
(220, 167, 'new Service Name', 100, 0, 'Description 1'),
(221, 185, 'Camera installation', 6000, 0, 'A camera that records images in or outside a building or in a public place, in order to prevent or help solve crime there.'),
(222, 186, 'Renovations', 0, 90, 'Renovations'),
(223, 186, 'Renovation for titles', 7, 0, 'Renovation for titles'),
(224, 187, 'Service Name', 100, 0, 'Description'),
(225, 188, 'asd', 1, 0, 'asd'),
(226, 189, 'Service Name', 100, 0, 'Description'),
(227, 149, 'Pipe Change', 0, 50, 'Pipe Change'),
(228, 190, 'Renovation', 70, 0, 'Renovation'),
(229, 190, 'Renovation ||', 60, 0, 'Renovation ||'),
(230, 191, 'Renovation of any', 90, 0, ''),
(231, 192, 'Service Name', 60001, 0, 'Description'),
(232, 192, 'Service Name 2', 100, 0, 'Description 3'),
(233, 193, 'renovation', 70, 0, 'renovation '),
(234, 193, 'renovation ii', 60, 0, 'renovation ii'),
(235, 194, 'Service Name', 100, 0, ''),
(236, 195, 'Service Name', 100, 0, ''),
(237, 167, 'Service Name', 100, 0, 'Description'),
(238, 196, 'Satelite installer', 28000, 0, 'A satellite TV installer attaches, connects, and repairs equipment that delivers television signals to service subscribers.'),
(242, 199, 'ds', 25, 0, ''),
(243, 200, 'ds', 25, 0, ''),
(244, 201, 'Cleaning Kitchens', 89, 0, ''),
(245, 201, 'Kitchens', 70, 0, ''),
(246, 202, 'Controlling the intonation of Alexa\'s voice', 28000, 0, ' Alexa were first introduced with Echo, the company\'s intelligent speaker, which enables voice interaction with various systems in the environment and online'),
(247, 203, 'Solar installer', 32000, 0, 'A solar installer, which is also called a PV installer (which stands for photovoltaic), install and maintain solar panels on people\'s homes, businesses, or on land.');

-- --------------------------------------------------------

--
-- Table structure for table `smart_project_details2`
--

CREATE TABLE `smart_project_details2` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fees_project_name` varchar(255) NOT NULL,
  `project_fees` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smart_project_details2`
--

INSERT INTO `smart_project_details2` (`id`, `user_id`, `fees_project_name`, `project_fees`, `description`) VALUES
(6, 32, 'PLP Project', '80', ''),
(7, 34, 'PCB Project', '14', ''),
(8, 35, 'PLR Type', '80', ''),
(9, 36, 'PLR', '56', ''),
(10, 61, 'Wiring', '50', ''),
(11, 62, 'pi', '56', ''),
(15, 71, 'Wiring', '56', ''),
(34, 0, 'PLR Type', '80', ''),
(35, 0, '1', '1', ''),
(36, 0, '1', '1', ''),
(37, 0, '1', '1', ''),
(38, 0, '1', '1', ''),
(39, 0, '1', '1', ''),
(40, 0, '1', '1', ''),
(41, 0, '1', '1', ''),
(42, 0, '1', '1', ''),
(43, 0, '1', '1', ''),
(44, 0, '1', '1', ''),
(45, 0, '1', '1', ''),
(46, 0, '1', '1', ''),
(47, 0, '1', '1', ''),
(48, 0, '1', '1', ''),
(49, 0, '1', '1', ''),
(50, 0, '1', '1', ''),
(51, 0, '1', '1', ''),
(52, 0, 'PLR Type78', '67', ''),
(53, 0, 'PLR Type78', '67', ''),
(54, 0, 'PLR Type78', '67', ''),
(55, 0, 'PLR Type78', '67', ''),
(56, 0, 'PLR Type78', '67', ''),
(57, 0, 'PLR Type78', '67', ''),
(58, 0, '1', '1', ''),
(59, 0, '1', '1', ''),
(60, 75, '1', '1', ''),
(61, 76, '1', '1', ''),
(62, 77, '1', '1', ''),
(63, 78, '1', '1', ''),
(64, 79, '1', '1', ''),
(65, 80, '1', '1', ''),
(66, 81, 'asd', 'a', ''),
(67, 82, 'asd', 'a', ''),
(68, 83, 'asd', 'a', ''),
(69, 84, 'asd', 'a', ''),
(70, 85, 'asd', 'a', ''),
(71, 86, 'asd', 'a', ''),
(72, 87, 'asd', 'a', ''),
(73, 88, 'asd', 'a', ''),
(74, 89, 'asd', 'a', ''),
(75, 90, 'asd', 'a', ''),
(76, 91, '1', '1', ''),
(77, 92, 'ABC type', '90', ''),
(78, 80, 'AS', 'ASDsad', ''),
(79, 93, 'test', '3', ''),
(80, 95, 'asd', '1', ''),
(81, 35, 'ABC', '89', ''),
(83, 100, 'Bi', '78', ''),
(84, 101, 's', '1', ''),
(90, 103, 'sss', '2', ''),
(91, 104, '1', '1', ''),
(92, 105, 'Installing tank', '900', ''),
(93, 105, 'Installing shower', '800', ''),
(94, 106, 'Installing tank', '900', ''),
(95, 106, 'Installing shower', '800', ''),
(96, 107, 'Installing tank', '900', ''),
(97, 107, 'Installing shower', '800', ''),
(98, 108, 'Installing tank', '900', ''),
(99, 108, 'Installing shower', '800', ''),
(100, 109, 'Installing tank', '900', ''),
(101, 109, 'Installing shower', '800', ''),
(102, 110, 'Installing tank', '900', ''),
(103, 110, 'Installing shower', '800', ''),
(104, 111, 'Installing tank', '900', ''),
(105, 111, 'Installing shower', '800', ''),
(106, 112, 'Installing Chimney', '900', ''),
(107, 113, 'Installing WPACK', '80', ''),
(108, 113, 'Installing WPACK 2', '90', ''),
(110, 114, 'Basin repair', '900', ''),
(111, 114, 'Pipe repair', '800', ''),
(112, 114, 'Tank repair', '700', ''),
(113, 115, 'Basin repair', '900', ''),
(114, 115, 'Pipe repair', '800', ''),
(115, 115, 'Tank repair', '700', ''),
(116, 116, 'Basin repair', '900', ''),
(117, 116, 'Pipe repair', '800', ''),
(118, 116, 'Tank repair', '700', ''),
(119, 117, 'Basin repair', '900', ''),
(120, 117, 'Pipe repair', '800', ''),
(121, 117, 'Tank repair', '700', ''),
(122, 118, 'Basin repair', '900', ''),
(123, 118, 'Pipe repair', '800', ''),
(124, 118, 'Tank repair', '700', ''),
(125, 119, 'Basin repair', '900', ''),
(126, 119, 'Pipe repair', '800', ''),
(127, 119, 'Tank repair', '700', ''),
(128, 120, 'Basin repair', '900', ''),
(129, 120, 'Pipe repair', '800', ''),
(130, 120, 'Tank repair', '700', ''),
(131, 121, 'Basin repair', '900', ''),
(132, 121, 'Pipe repair', '800', ''),
(133, 121, 'Tank repair', '700', ''),
(134, 122, 'Basin repair', '900', ''),
(135, 122, 'Pipe repair', '800', ''),
(136, 122, 'Tank repair', '700', ''),
(137, 123, 'Basin repair', '900', ''),
(138, 123, 'Pipe repair', '800', ''),
(139, 123, 'Tank repair', '700', ''),
(140, 124, 'Basin repair', '900', ''),
(141, 124, 'Pipe repair', '800', ''),
(142, 124, 'Tank repair', '700', ''),
(143, 125, 'asd', '11', ''),
(144, 126, 'asd', '11', ''),
(145, 127, 'Basin repair', '900', ''),
(146, 127, 'Pipe repair', '800', ''),
(147, 127, 'Tank repair', '700', ''),
(148, 128, 'asd', '11', ''),
(149, 129, 'asd', '11', ''),
(150, 130, 'asd', '11', ''),
(151, 131, 'asd', '11', ''),
(152, 132, 'asd', '11', ''),
(153, 133, 'asd', '11', ''),
(154, 134, 'asd', '11', ''),
(155, 135, 'asd', '11', ''),
(156, 136, 'asd', '11', ''),
(157, 137, 'asd', '11', ''),
(158, 138, 'asd', '11', ''),
(159, 139, 'asd', '11', ''),
(160, 140, 'sdfdf', '21', ''),
(161, 141, 'sdfdf', '21', ''),
(162, 142, 'sdfdf', '21', ''),
(163, 143, 'srgdg', '34', ''),
(164, 144, 'srgdg', '34', ''),
(165, 145, 'srgdg', '34', ''),
(166, 146, 'Basin repair', '900', ''),
(167, 146, 'Pipe repair', '800', ''),
(168, 146, 'Tank repair', '700', ''),
(169, 147, 'Basin repair', '900', ''),
(170, 147, 'Pipe repair', '800', ''),
(171, 147, 'Tank repair', '700', ''),
(175, 149, 'Repair water tank', '800', 'Repair water tank if require tank replacement'),
(176, 149, 'Basin repair type ||', '1200', 'Basin repair type ||'),
(177, 150, 'Change wiring', '900', ''),
(178, 150, 'Change wiring old model', '900', 'Change wiring old model'),
(179, 151, 'test_service_type_1', '1000', 'fd'),
(180, 152, 'asd', '1', ''),
(181, 153, 'asd', '1', ''),
(183, 156, 'Camera repair', '78', ''),
(184, 157, 'hg', '1', ''),
(185, 159, 'Roofing', '700', ''),
(186, 160, 'Roofing', '700', ''),
(187, 161, 'Roofing', '6000', ''),
(188, 162, 'Pipe Repair', '89', ''),
(189, 162, 'RI', '900', '8585'),
(190, 165, 'asd', '2', 'asd'),
(191, 166, 'asd', '2', 'asd'),
(192, 167, 'Service Type 100', '1000011', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the'),
(193, 169, 'Interior Designer', '18000', 'An  interior designer professionaly trained to design functional and quality enviorment(Ex House. Hotel,Resturant ,Stores).'),
(194, 96, 'Interior Designer', '8000', 'fghgf'),
(197, 170, 'zxc', '1', 'asd'),
(199, 172, 'ds fsdf', '321', ''),
(200, 173, 'Roofing', '17000', ''),
(201, 174, 'Roofing', '17000', ''),
(202, 175, 'Roofing', '8000', ''),
(203, 176, 'Roofing', '8000', ''),
(204, 177, 'Roofing', '8000', ''),
(205, 178, 'Roofing', '5000', ''),
(206, 179, 'Roofing', '26000', ''),
(207, 180, '50000', '7000', ''),
(208, 181, 'Roofing', '38000', ''),
(209, 182, 'Roofing', '8000', 'A Roofing is material used for making or covering roofs.'),
(211, 167, 'Service Type', '1000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the'),
(213, 167, 'service Type 3', '100', 'dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to '),
(214, 183, 'Window Cleaning', '16000', 'Window cleaning, or window washing, is the exterior cleaning of architectural glass used for structural, lighting, or decorative purposes. It can be done manually, using a variety of tools for cleaning and access. Technology is also employed and increasingly, automation. '),
(215, 184, 'RI', '89', '5ur5u75u'),
(217, 186, 'Floor cleanup', '700', 'Floor cleanup'),
(218, 186, 'Floor cleanup2', '800', 'Floor cleanup 2'),
(219, 187, 'Service Type', '1000', 'Description'),
(221, 188, 'asd', '1', 'asd'),
(222, 189, 'Service Type', '1000', 'Description'),
(223, 190, 'Renovation of floor', '800', 'Renovation of floor'),
(224, 191, 'Renovation ||', '900', ''),
(225, 192, 'Service Type', '1000', 'Description'),
(226, 192, 'Service Type 2', '100', 'Service Type decs'),
(227, 193, 'renovation of floor', '800', 'renovation of floor'),
(228, 194, 'Service Type data', '100', ''),
(229, 195, 'Service Type data', '100', ''),
(230, 196, 'Satelite installer', '8000', 'A satellite TV installer attaches, connects, and repairs equipment that delivers television signals to service subscribers.'),
(233, 199, 'sdffgv', '87', ''),
(234, 200, 'sdffgv', '87', ''),
(235, 201, 'Renovations', '70', ''),
(236, 202, 'Controlling the intonation of Alexa\'s voice', '28000', ' Alexa were first introduced with Echo, the company\'s intelligent speaker, which enables voice interaction with various systems in the environment and online'),
(237, 203, 'Solar installer', '32000', 'A solar installer, which is also called a PV installer (which stands for photovoltaic), install and maintain solar panels on people\'s homes, businesses, or on land.');

-- --------------------------------------------------------

--
-- Table structure for table `smart_project_detail_image`
--

CREATE TABLE `smart_project_detail_image` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_project_detail_image`
--

INSERT INTO `smart_project_detail_image` (`id`, `project_id`, `image`) VALUES
(1, 94, 'uploaded_files/project_pic/cc27ad371ab090a74865a3bb3a8b6ae0.jpg'),
(2, 1, 'uploaded_files/project_pic/6a38f61311497e628012bc5f786a751e.png'),
(3, 2, 'uploaded_files/project_pic/371830fd15237355dd2b6b4b189f2dda.jpg'),
(4, 3, 'uploaded_files/project_pic/09cb88069b8cf8558462b64a8e1ffd46.jpg'),
(5, 95, 'uploaded_files/project_pic/a22397bfc6b7e0be1838049101930621.jpg'),
(6, 5, 'uploaded_files/project_pic/74fcaac945cd579363e66353ca177bd3.png'),
(7, 6, 'uploaded_files/project_pic/6c24dc18999e589a8a484332212b4889.jpg'),
(8, 7, 'uploaded_files/project_pic/f114f59ed440a2654c66c30e1ca1807d.jpg'),
(9, 97, 'uploaded_files/project_pic/d2b77d92451a7fde071ba1afc91a62e6.jpg'),
(10, 97, 'uploaded_files/project_pic/a13553a4d865ddef83c0734366006ba2.png'),
(11, 97, 'uploaded_files/project_pic/a565e7eaf0aa1684ab54f8bbe985223c.jpg'),
(12, 97, 'uploaded_files/project_pic/16ec6b8fc6df10d2b9fd6b445c3012db.jpg'),
(13, 98, 'uploaded_files/project_pic/7e256afd7093f84b713f87b2edefc3fa.jpg'),
(14, 98, 'uploaded_files/project_pic/cd311187e7d97d5e3a21c996fc9a0647.png'),
(15, 98, 'uploaded_files/project_pic/82dbe10a86257a460c8188b19d4911e2.jpg'),
(16, 98, 'uploaded_files/project_pic/cb18088a1709f9c517fe8058404a187c.jpg'),
(17, 100, 'uploaded_files/project_pic/85c097cb4a1608dfb626c24e1a9e81a1.jpg'),
(18, 100, 'uploaded_files/project_pic/c2b507be9fea8a1a517fb0c60d79c7f2.jpg'),
(19, 100, 'uploaded_files/project_pic/909d189ab83aeb6c824d83bca3fe704a.jpg'),
(20, 101, 'uploaded_files/project_pic/edd68a03a79cf642bb684b07ec564927.jpg'),
(21, 101, 'uploaded_files/project_pic/3b6856d72fe7207eee37d191b39b1615.png'),
(22, 101, 'uploaded_files/project_pic/b17b057beccdf73feea23faa6b6b4dfc.jpg'),
(23, 101, 'uploaded_files/project_pic/656c516361b05d3189c97d95a0c0d531.jpg'),
(24, 102, 'uploaded_files/project_pic/ce8dd52239fe437c4d14cdd32115b527.jpg'),
(25, 102, 'uploaded_files/project_pic/98085ecf3c378d8aebd463ff9d3511ab.png'),
(26, 102, 'uploaded_files/project_pic/9b45a12cd62d6e1c8f0a75f8518d8d72.jpg'),
(27, 102, 'uploaded_files/project_pic/3f02c30701edde1a5db930a98e60eade.jpg'),
(28, 103, 'uploaded_files/project_pic/33dd9d22f820a84766807cc542355ce1.jpg'),
(29, 103, 'uploaded_files/project_pic/78eae4cca13c30d02101d8b7dd6ecfa5.jpg'),
(30, 103, 'uploaded_files/project_pic/780479d25834896a32e10a57ef0dede6.jpg'),
(31, 104, 'uploaded_files/project_pic/58c7d0cd770d0a242d31cb7452a78262.jpg'),
(32, 104, 'uploaded_files/project_pic/45c73f1828891f99d4e6ee27030e851e.png'),
(33, 104, 'uploaded_files/project_pic/02d132ee01ad13d54cdad7b1c7040371.jpg'),
(34, 104, 'uploaded_files/project_pic/d9597bb70d6bc18d1e12da18610c8889.jpg'),
(35, 105, 'uploaded_files/project_pic/5ccb9ec90b36bfba8d25b3650fe5f39e.jpg'),
(36, 105, 'uploaded_files/project_pic/27ab9e1073385d912dfbc76250705f9d.png'),
(37, 105, 'uploaded_files/project_pic/6a09ae7819c4697e80eafdac16169f7a.jpg'),
(38, 105, 'uploaded_files/project_pic/88439f3b753919fb36604a9f36451897.jpg'),
(39, 108, 'uploaded_files/project_pic/dab77a1316af1307b480df57f71ca6e3.jpg'),
(40, 108, 'uploaded_files/project_pic/f93964295ba662f06985ac44a180d021.png'),
(41, 108, 'uploaded_files/project_pic/ded36d5637c069225dcfd5bd36fd8e01.jpg'),
(42, 109, 'uploaded_files/project_pic/0627e7f96d435f254123e88c4621d4b8.jpg'),
(43, 109, 'uploaded_files/project_pic/f8fb45fc741850793f8ee46e1ab555f1.jpg'),
(44, 109, 'uploaded_files/project_pic/9219af99ecb2239f365d1c0b25c50c68.jpg'),
(45, 110, 'uploaded_files/project_pic/d3ec443a9a6bf9595880b9efa4e0105b.jpg'),
(46, 110, 'uploaded_files/project_pic/52f65a556c1ff3902198ccdbf98cfc2e.png'),
(47, 110, 'uploaded_files/project_pic/0290e1560d3ce4afa6d2e548cfd14d44.jpg'),
(48, 110, 'uploaded_files/project_pic/c0ab93c97ee2f6afb3bd2f16ce2597a2.jpg'),
(49, 112, 'uploaded_files/project_pic/9c82382db6ec51c0829276af707c7f15.jpg'),
(50, 113, 'uploaded_files/project_pic/00d02a1b1deca6163f45d205fcc986bb.jpg'),
(51, 113, 'uploaded_files/project_pic/d26ceec669df4bfe270a2568ae8f8cc3.png'),
(52, 113, 'uploaded_files/project_pic/db32d708e009dcec2d89b1df319cd716.jpg'),
(53, 113, 'uploaded_files/project_pic/39043d8193e1df6248767d1e788e1382.jpg'),
(54, 114, 'uploaded_files/project_pic/81a54a99206b3a6de6b0c363b89e4701.jpg'),
(55, 114, 'uploaded_files/project_pic/fd7dbe4df657edf596802aebd9f53912.png'),
(56, 115, 'uploaded_files/project_pic/5e976c3614c3a63fb2977aeca03b5e93.jpg'),
(57, 115, 'uploaded_files/project_pic/c9c95337fde2ca3275de2a6224ec96ec.png'),
(59, 115, 'uploaded_files/project_pic/dbf62e3aebdee0b74d94bf75c7c844f3.jpg'),
(61, 114, 'uploaded_files/project_pic/e9a771f27fe3bb2872ef413d07cfb308.png'),
(63, 114, 'uploaded_files/project_pic/4fead34b10c7be4975af8cd478b7bb4c.jpg'),
(64, 114, 'uploaded_files/project_pic/bdbc126ab5d31aa7e5e3e6a261735afa.jpg'),
(65, 114, 'uploaded_files/project_pic/aa45ca90e43e73660831b7f44d5cf2a0.png'),
(67, 114, 'uploaded_files/project_pic/845c46a47f8ed361d82963ff02e46f64.jpg'),
(69, 114, 'uploaded_files/project_pic/4d2df190ca48310f19776c6852c8fb15.png'),
(72, 115, 'uploaded_files/project_pic/403cc90ddeac10b4c118ccfa95e39392.jpg'),
(73, 115, 'uploaded_files/project_pic/0743109676b057a0a87aa049e70eb560.png'),
(75, 115, 'uploaded_files/project_pic/6bfb8b31006cdc020a564590ca687941.jpg'),
(76, 117, 'uploaded_files/project_pic/f02dbbd2236e3ee7d59b2403575b5d9b.jpg'),
(77, 114, 'uploaded_files/project_pic/5494b92ba5328327758b95d184907530.jpg'),
(78, 119, 'uploaded_files/project_pic/14ab630dfcb47c31745b56225c1774ac.jpg'),
(79, 120, 'uploaded_files/project_pic/458d05c3e1d338c8d30f3a52b96a1138.jpg'),
(80, 118, 'uploaded_files/project_pic/010184a1880810aa1333c50386003152.jpg'),
(81, 118, 'uploaded_files/project_pic/5fbe7cf3426943529eb4e99106de1772.png'),
(82, 118, 'uploaded_files/project_pic/78ae5668dd7b1dc0b8648e09f3e7bd2a.jpg'),
(83, 118, 'uploaded_files/project_pic/7453cf37e1ff4effbb7da3df908287e0.jpg'),
(84, 122, 'uploaded_files/project_pic/883919ed7e39f8eff29faad93e706046.jpg'),
(85, 122, 'uploaded_files/project_pic/58f9d09cef654dbd0205f874495429b4.png'),
(86, 122, 'uploaded_files/project_pic/996e52ba5f23bd2bca243517d8e1c144.jpg'),
(87, 122, 'uploaded_files/project_pic/441bbf3b55b4d3802bdcaa25a40f5b64.jpg'),
(88, 123, 'uploaded_files/project_pic/64fbf1ff0e26dd89bbbda86877e4d092.jpg'),
(89, 123, 'uploaded_files/project_pic/6fd6537672971cc9511697e9c202c941.png'),
(90, 123, 'uploaded_files/project_pic/993d56c38a7223f7c23868f8b0f5a496.jpg'),
(91, 123, 'uploaded_files/project_pic/fccb3c23fa9d06c91620ebcb724ba113.jpg'),
(92, 125, 'uploaded_files/project_pic/11910dfcfc364ce23978be08b93fb233.jpg'),
(93, 125, 'uploaded_files/project_pic/f58f223ffe6e28c11df45b6a1802e5b6.png'),
(94, 125, 'uploaded_files/project_pic/fa8c92530f05786916d71367a5f30dc0.jpg'),
(95, 125, 'uploaded_files/project_pic/02b36641c1d3ed0ad70b82037170ae2c.jpg'),
(96, 125, 'uploaded_files/project_pic/e72e71fcf597184f55f6f4e4c2fd549c.jpg'),
(97, 125, 'uploaded_files/project_pic/07848f06d371092c1849e77230fba1be.png'),
(98, 125, 'uploaded_files/project_pic/b2c540d09e7b5d615c15bb450e04035a.jpg'),
(99, 125, 'uploaded_files/project_pic/4d91066482fc922315a25a7d692aaa07.jpg'),
(100, 90, 'uploaded_files/project_pic/43cd904813a33191c07bfdb97d1e2d61.jpg'),
(105, 137, 'uploaded_files/project_pic/c4433c66ccaaae61070e34ac717eb27c.jpg'),
(108, 106, 'uploaded_files/project_pic/6224478cb2c7a0c7c0b8425e667b1d8d.jpg'),
(109, 136, 'uploaded_files/project_pic/b57aa71b236b0c94e226df084c48b4f4.jpg'),
(110, 138, 'uploaded_files/project_pic/db34150aa0b45f854399d87881e46e40.jpg'),
(113, 173, 'uploaded_files/project_pic/fb8aa4b13f37faa8b6a5fad5afeb1178.jpg'),
(115, 177, 'uploaded_files/project_pic/93d1de9756e17c2e23a86e522dddd48a.jpg'),
(116, 178, 'uploaded_files/project_pic/8cc2336540368c3ecc86c3f0dc235184.jpg'),
(118, 179, 'uploaded_files/project_pic/c270b9aae61550583dff03231d0a7d4d.jpg'),
(119, 179, 'uploaded_files/project_pic/cb64271f636321a85460a36b82b883bc.png'),
(120, 179, 'uploaded_files/project_pic/1e4f966a9d12df8fe6b45ee4e82ba248.png'),
(121, 180, 'uploaded_files/project_pic/13516ad62af1892884cb9ccaa8307f83.jpg'),
(122, 195, 'uploaded_files/project_pic/d04e685418307fc94043232f6a9cd3a8.jpg'),
(124, 196, 'uploaded_files/project_pic/5d7e389633393027aa94c1b45b1c9b5d.jpg'),
(125, 196, 'uploaded_files/project_pic/e2eaf40fde311a443bd2bb7e15803768.png'),
(126, 196, 'uploaded_files/project_pic/430e5bf910466f1cb26b03518546406f.jpg'),
(127, 196, 'uploaded_files/project_pic/52a7e18ac6a0a96808b23d346014d08d.jpg'),
(128, 197, 'uploaded_files/project_pic/d025e729f1d0d27d561462f8c0a70ed7.jpg'),
(129, 197, 'uploaded_files/project_pic/44ee0cc66e62ee86a1016784f8fa9a12.png'),
(130, 197, 'uploaded_files/project_pic/82ce05fb74e07331aaddf24e16277b37.jpg'),
(131, 197, 'uploaded_files/project_pic/e9d73672f07d3d1518a15f6d319dec9a.jpg'),
(132, 198, 'uploaded_files/project_pic/3142582696837ac99e0949feb0d3b976.jpg'),
(133, 198, 'uploaded_files/project_pic/fcb3116ba4cca2167a172b5a1b59dd3d.png'),
(134, 198, 'uploaded_files/project_pic/45b48c93d592a2511814041c43d431ba.jpg'),
(135, 198, 'uploaded_files/project_pic/6bbeafb2a08448d1c59fa22437d1c72f.jpg'),
(136, 199, 'uploaded_files/project_pic/5bd3ed594e0b8dc4c0a4f20ed997b20c.jpg'),
(137, 199, 'uploaded_files/project_pic/8182e11466abcfedade1a0e7bff0db35.png'),
(138, 199, 'uploaded_files/project_pic/312e0c9fe12559bb17bf549f38dcb1f9.jpg'),
(139, 199, 'uploaded_files/project_pic/54724cd45d7c04b38d15bcf7c77baa68.jpg'),
(140, 202, 'uploaded_files/project_pic/95ab32e348affabffa9e0f765287464e.jpg'),
(141, 203, 'uploaded_files/project_pic/9ae258cb281bbfe1075324bfd9325d52.jpg'),
(142, 200, 'uploaded_files/project_pic/e24af7cc0cf20f9297edb2016eb95cee.jpg'),
(146, 216, 'uploaded_files/project_pic/44bcad3114c7b751bebf6b627ea3b345.jpg'),
(147, 218, 'uploaded_files/project_pic/6c1c93ea79d3fcd25ef99510fd6ac537.jpg'),
(148, 218, 'uploaded_files/project_pic/35995dae878f3e758a32358498d46088.jpg'),
(149, 219, 'uploaded_files/project_pic/7511fe449beefc5d3364dc08ae2ee93f.jpg'),
(150, 219, 'uploaded_files/project_pic/99e7548a9123031d9b0f4068f794b9a0.jpg'),
(151, 220, 'uploaded_files/project_pic/75b04cd0c5dbca719154b04ce057dd3c.jpg'),
(152, 222, 'uploaded_files/project_pic/ecd8f03051ed1d30ae9efdaccea66899.jpg'),
(153, 223, 'uploaded_files/project_pic/342659c241967d84c5bcfa01f1314fe9.jpg'),
(154, 224, 'uploaded_files/project_pic/5556ccc8a5bd7f73eb001a4361d9da93.jpg'),
(155, 225, 'uploaded_files/project_pic/15d6648a8737ea4c3b48a2468745438b.jpg'),
(156, 226, 'uploaded_files/project_pic/99c98614fee9a083ea117ce3d3d2ee87.png'),
(157, 221, 'uploaded_files/project_pic/0445c8311a203379d8c338240c16ef8d.jpg'),
(158, 227, 'uploaded_files/project_pic/88271b5b8bd130195d5b6c53ccb7b140.jpg'),
(159, 227, 'uploaded_files/project_pic/213324bd1f63fdcf6c9c81509fbf7b36.jpg'),
(160, 227, 'uploaded_files/project_pic/ecb76e73011cfe58ae366737111cfdd4.jpg'),
(161, 228, 'uploaded_files/project_pic/6cb48c6977d7d3397b54cfb2500faa83.jpg'),
(162, 229, 'uploaded_files/project_pic/84097e0c009a64f19abc0382c5aaff45.jpg'),
(163, 231, 'uploaded_files/project_pic/56cc2dc31199571ad0926cdaa2b6dcb7.png'),
(164, 232, 'uploaded_files/project_pic/73ac8d277e7461be4b6a2dea0ea0c4ca.jpg'),
(165, 233, 'uploaded_files/project_pic/da87ff374165ffb832919131fba18adb.jpg'),
(166, 234, 'uploaded_files/project_pic/9f395efd9a6d93242e9b22e0d94d10e3.jpg'),
(168, 239, 'uploaded_files/project_pic/31eca1ca9b79ce88b1222de5e87417e5.jpg'),
(171, 238, 'uploaded_files/project_pic/b3c6df62aa0eb26e4a6120b36ef52f9f.jpg'),
(172, 246, 'uploaded_files/project_pic/136227325cb40e8d705978f8c102e1ab.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `smart_project_detail_image2`
--

CREATE TABLE `smart_project_detail_image2` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_project_detail_image2`
--

INSERT INTO `smart_project_detail_image2` (`id`, `project_id`, `image`) VALUES
(1, 86, 'uploaded_files/project_pic/db28f5817e194c70b5b07fa99accfb73.png'),
(2, 86, 'uploaded_files/project_pic/f99d792de85fdd61b268dc365ac1fc88.jpg'),
(3, 86, 'uploaded_files/project_pic/cd80fd1e9ec1f5ed20a50969ddf6f636.jpg'),
(4, 86, 'uploaded_files/project_pic/dff83aa0c98dd4dd1241804c367a116a.jpg'),
(5, 88, 'uploaded_files/project_pic/907ddc98650061aa75888bf2d86ed3a9.jpg'),
(6, 88, 'uploaded_files/project_pic/61edb544e3285befe5be005a20a9e466.png'),
(8, 88, 'uploaded_files/project_pic/8461813c01270aa1dbcdbcd48688ff34.jpg'),
(9, 88, 'uploaded_files/project_pic/1d29f83259303edbc39f48f683f1f77a.jpg'),
(10, 88, 'uploaded_files/project_pic/625ed419709fe3820e7dd8a28a721a98.png'),
(12, 88, 'uploaded_files/project_pic/e640f5aaa3ec80c315190c6c1885ceb5.jpg'),
(13, 88, 'uploaded_files/project_pic/f5b791c4411d12a7cd5f15ea14c6e43e.jpg'),
(14, 88, 'uploaded_files/project_pic/3fab9637081c9389361ce98ae4b86d73.png'),
(16, 88, 'uploaded_files/project_pic/8d474ad1549de9c145ebcf4761c44d12.jpg'),
(17, 88, 'uploaded_files/project_pic/155c9f1259358b4f0d8f3406832c5685.jpg'),
(18, 109, 'uploaded_files/project_pic/8f4755bdc047426d147b376a79d51d18.jpg'),
(19, 176, 'uploaded_files/project_pic/b5ec19bb98868df431ebdd3e13edb2db.jpg'),
(20, 176, 'uploaded_files/project_pic/249a28143c6446028dd0c6227854a393.png'),
(21, 189, 'uploaded_files/project_pic/b06107bd77496e389f4162fb87794004.jpg'),
(23, 127, 'uploaded_files/project_pic/bf7e281ab30216d68eff6055162c42ef.jpg'),
(24, 127, 'uploaded_files/project_pic/2270491035c1183dc52b3d922fbbbe08.png'),
(25, 127, 'uploaded_files/project_pic/50521469445131e8e6b9f4ddb7875433.jpg'),
(26, 127, 'uploaded_files/project_pic/e6f849b58cc319864117128483fe05cd.jpg'),
(27, 131, 'uploaded_files/project_pic/f91cb3f767d350a7d50f86414ccf7412.jpg'),
(28, 131, 'uploaded_files/project_pic/53738ced966dfebeba420e2a73906b5f.png'),
(29, 131, 'uploaded_files/project_pic/cab1b60146f4031be7ffc24d76c97dbe.jpg'),
(30, 131, 'uploaded_files/project_pic/041ec12561bd15629c780577d5c33706.jpg'),
(31, 190, 'uploaded_files/project_pic/02c6673459bd982689a02bb0a1cb1776.jpg'),
(32, 190, 'uploaded_files/project_pic/ac337490e6ee481fe01e9e2afcd68fe5.png'),
(33, 190, 'uploaded_files/project_pic/9f9ab30a469fc14c3c64540e0491a4f9.jpg'),
(34, 190, 'uploaded_files/project_pic/5c5c96699d7c9c962269ddb2eab0f438.jpg'),
(35, 191, 'uploaded_files/project_pic/a32ecac1598606dcf6cb9e823ebeb6ae.jpg'),
(36, 191, 'uploaded_files/project_pic/2ceb5e511d4288b8551f56296bd82d92.png'),
(37, 191, 'uploaded_files/project_pic/3f0fb815f01be201dcd9633f17604fd4.jpg'),
(38, 191, 'uploaded_files/project_pic/f0cde1cd9877470e8e337b9d4bc0efa8.jpg'),
(39, 197, 'uploaded_files/project_pic/9b44d2767a96fd5f1155d0e54e3b7f5a.jpg'),
(41, 193, 'uploaded_files/project_pic/7657021b671c959bc224842c9444a06e.jpg'),
(42, 192, 'uploaded_files/project_pic/9be3266e1d6d3b0392036ecf7ead06eb.jpg'),
(43, 192, 'uploaded_files/project_pic/6143ebfbd177aad1e1efe8a2187a0b3e.jpg'),
(44, 194, 'uploaded_files/project_pic/5f6a51bc8ae7f15f7c89effcdeb036d8.jpg'),
(45, 194, 'uploaded_files/project_pic/3ad9b7cf7f3e59043960f772aa03f6e4.jpg'),
(46, 211, 'uploaded_files/project_pic/5a6bcb5fed1974c65ad327d6bda9321f.jpg'),
(49, 209, 'uploaded_files/project_pic/57684e08c4057c66b729dece459432fb.jpg'),
(50, 213, 'uploaded_files/project_pic/2cf9189b2fa6e91cb4efb5977d3f107e.jpg'),
(53, 214, 'uploaded_files/project_pic/7537609d608dce95cc2cebeeecc9a190.jpg'),
(54, 215, 'uploaded_files/project_pic/02b440bd371930cd090d41d8abc8351a.jpg'),
(55, 217, 'uploaded_files/project_pic/201a6675f0a16b55a388257d67cd5579.jpg'),
(56, 218, 'uploaded_files/project_pic/a1b79abb25d8736b0b663521fc05a85e.jpg'),
(57, 219, 'uploaded_files/project_pic/7d3bb4175bfb357f27c0cbe91ea51e48.jpg'),
(58, 220, 'uploaded_files/project_pic/a6fbf048565521e9be5e0cef06034d85.jpg'),
(59, 221, 'uploaded_files/project_pic/9c6af4d50d7670fd27bc79f9b6c8872e.jpg'),
(60, 222, 'uploaded_files/project_pic/44f48a1a6808f51b09d2839aba081f0c.jpg'),
(61, 223, 'uploaded_files/project_pic/537994434c854721041d31510874f718.jpg'),
(65, 225, 'uploaded_files/project_pic/20cfd5821f358506282e0e5941e06ec9.png'),
(66, 226, 'uploaded_files/project_pic/821a8baecbd41536f8033ce601110de9.png'),
(67, 227, 'uploaded_files/project_pic/21f6dbf564fb0054c6e291f9436463ff.jpg'),
(68, 227, 'uploaded_files/project_pic/2a222b836af87f5b236b93fef6c314a5.jpeg'),
(69, 236, 'uploaded_files/project_pic/6fa537bee6f6dbfe70bd3aaa8e405f86.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `smart_project_image`
--

CREATE TABLE `smart_project_image` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_project_image`
--

INSERT INTO `smart_project_image` (`id`, `user_id`, `image`) VALUES
(1, 27, 'uploaded_files/project_pic/7d6a085e62bd0e81e8c6021d16ad58f3.jpg'),
(2, 27, 'uploaded_files/project_pic/92489201df77ae30dddd96023f3e57ce.png'),
(3, 27, 'uploaded_files/project_pic/2366419e46927661e7c81b56a328ecfb.jpg'),
(4, 27, 'uploaded_files/project_pic/ef138d4f07ab8865b6b5ffa20a46c36d.jpg'),
(5, 27, 'uploaded_files/project_pic/4d82bb463dc5171b5337c3ae61544933.jpg'),
(6, 27, 'uploaded_files/project_pic/a6d1f189ad62becfa3a7dc5177c78806.png'),
(7, 27, 'uploaded_files/project_pic/e798979f1a84420bf8955f7e043d801d.jpg'),
(8, 27, 'uploaded_files/project_pic/609ecc05808fddbea6dc22b5cd7b772f.jpg'),
(9, 27, 'uploaded_files/project_pic/dbe3f6c08993b9fcd76dd19c4f9f28c0.jpg'),
(10, 27, 'uploaded_files/project_pic/315f202a9d0764d8720f02adfa0c9592.png'),
(11, 27, 'uploaded_files/project_pic/f55d98d18d0c80059082c2148d8b737c.jpg'),
(12, 27, 'uploaded_files/project_pic/f7801f1db7977613c48db61b89c65916.jpg'),
(13, 27, 'uploaded_files/project_pic/efcba6dd2ea182fc794ef46c162dfda3.jpg'),
(14, 27, 'uploaded_files/project_pic/9e829f677ae4ab6296ba2ae344bdc3f3.jpg'),
(15, 34, 'uploaded_files/project_pic/4d8cb833c3e92f6aa01f400767c2569e.jpg'),
(16, 61, 'uploaded_files/project_pic/5789db7546aa5a6abcf2d14e0b639989.jpg'),
(17, 61, 'uploaded_files/project_pic/afafa1bf1d92c528439b60ed695aadcc.jpg'),
(18, 61, 'uploaded_files/project_pic/49d0f83b1633d637a5e0d074be48a6a1.png'),
(19, 61, 'uploaded_files/project_pic/f695e37305777adf6f587cd661c73265.png'),
(20, 61, 'uploaded_files/project_pic/9eb20e7f2880916d7d65c588b53ab493.png'),
(21, 71, 'uploaded_files/project_pic/7213127f1c15700e40da5070ad33ecf0.png'),
(22, 27, 'uploaded_files/project_pic/962fbe3c06fe220a4ad8c0c300f9b3d4.jpg'),
(23, 34, 'uploaded_files/project_pic/4322fa045be328aae2f498f6ab87affe.jpg'),
(24, 34, 'uploaded_files/project_pic/2f72e9f572c070c7e462b040d63b49c4.jpg'),
(25, 34, 'uploaded_files/project_pic/369ccc2132233a04b229afb96194ef46.jpg'),
(26, 34, 'uploaded_files/project_pic/157da8becb030a753f763535f60a64bc.jpg'),
(27, 80, 'uploaded_files/project_pic/aed9473386eefc42b5588a083887a7f9.jpg'),
(28, 80, 'uploaded_files/project_pic/d6522875b10a07d26076369eb5c4b554.jpg'),
(29, 80, 'uploaded_files/project_pic/09b4f573b2a2c359a41f687c6b19cad6.jpg'),
(30, 80, 'uploaded_files/project_pic/9b0d696ba595fe6bfbf13c5581d8e9f2.jpg'),
(31, 80, 'uploaded_files/project_pic/2674ab0761b5300515aa53d816dcba4e.jpg'),
(32, 80, 'uploaded_files/project_pic/3486abfd0bb5ceb9b9e76ac148016e0c.png'),
(33, 80, 'uploaded_files/project_pic/e129d65337efceea46b8174af1814a22.jpg'),
(34, 93, 'uploaded_files/project_pic/4e6027d8337770a2da5da448b76d34eb.jpg'),
(37, 97, 'uploaded_files/project_pic/5e4cfda9c97a574a384f48028401211d.png'),
(38, 97, 'uploaded_files/project_pic/875410f124cfe392726c43bf223a3820.png'),
(49, 96, 'uploaded_files/project_pic/f5ed2213fd4194c7adb8aa13d96f224f.jpg'),
(50, 96, 'uploaded_files/project_pic/bf4231d5bf16ba1c5c15d8eec718cd1a.jpg'),
(51, 96, 'uploaded_files/project_pic/6425bec43f03806d0310608068dc5d7e.jpg'),
(52, 99, 'uploaded_files/project_pic/28076503d6487131f1460733cea728f7.jpg'),
(55, 99, 'uploaded_files/project_pic/89c5b679b6cc69c62c0f96f8ee44c5a2.jpg'),
(56, 99, 'uploaded_files/project_pic/b769d87efc33b0a082b98e643b6520e8.jpg'),
(57, 99, 'uploaded_files/project_pic/e6016c7125a36325b86c977ebccf9513.png'),
(58, 99, 'uploaded_files/project_pic/7a1841aedb69170034ff6a7fb069b4df.jpg'),
(59, 99, 'uploaded_files/project_pic/84055bc1c12667dbacfd445377d2ee49.jpg'),
(60, 112, 'uploaded_files/project_pic/b94a4039764ae755714fa2a0553800b3.jpg'),
(62, 112, 'uploaded_files/project_pic/bbac35d09f795cf6e15c6ae4edadbd21.jpg'),
(64, 112, 'uploaded_files/project_pic/85e3cc5363db7449ebba0eba2031ffdd.jpg'),
(72, 98, 'uploaded_files/project_pic/38078095de98818011aa82f622438e42.jpg'),
(74, 35, 'uploaded_files/project_pic/4acaecb671fd844d258516c7acc68b0c.jpg'),
(75, 35, 'uploaded_files/project_pic/cc5cc0587d6d6483c83878d0d24a11fd.jpg'),
(77, 35, 'uploaded_files/project_pic/bcb60e40316e2ae7b0a5b4f88990f204.jpg'),
(79, 98, 'uploaded_files/project_pic/c3646ce34ede95bdcf6f815d8411d625.jpg'),
(84, 98, 'uploaded_files/project_pic/6e5d9965b45b8e98163174bbfa21f966.jpg'),
(85, 113, 'uploaded_files/project_pic/d8fbca802b091213a36b45ff3c86288d.jpg'),
(86, 113, 'uploaded_files/project_pic/b1e84ac65978d1c00208a145c4b33e53.jpg'),
(87, 113, 'uploaded_files/project_pic/17eaf1fa895ed2946313f1a2ff763567.jpg'),
(93, 102, 'uploaded_files/project_pic/0427fe4f7bd711da8822ae550682a5ee.jpg'),
(109, 148, 'uploaded_files/project_pic/7f7ae3960e1e309e6aced0b2f9c66a18.jpg'),
(110, 148, 'uploaded_files/project_pic/90da483362fa2a38e2fbabd329dcd625.jpg'),
(117, 148, 'uploaded_files/project_pic/7b27e74bb297e7add2dbc2442d9add51.jpg'),
(124, 102, 'uploaded_files/project_pic/1bb0e8986f6dd51a8a411d4010a8b28b.jpg'),
(129, 102, 'uploaded_files/project_pic/f021f1a492e06c1f290d8c86b2ae44d2.jpg'),
(141, 151, 'uploaded_files/project_pic/f050952761d2543ad894bcb4c58b0c07.jpg'),
(161, 165, 'uploaded_files/project_pic/ff10213dbf6e953ed2fab48389dbbb38.jpg'),
(162, 165, 'uploaded_files/project_pic/ec15ca588becde0189f84178417eb1ed.png'),
(163, 165, 'uploaded_files/project_pic/372eede35a2cc2e6c1c188070929f56a.jpg'),
(164, 165, 'uploaded_files/project_pic/6e0d1ccaddaf65da9a9b0891e5f81c5f.jpg'),
(165, 166, 'uploaded_files/project_pic/ec11a015a0965121b36fb60acc6802cc.jpg'),
(166, 166, 'uploaded_files/project_pic/86e7bd22bdba209864c6c73e0d844636.png'),
(167, 166, 'uploaded_files/project_pic/259476747a3132476c5fca7cedbcf4ef.jpg'),
(168, 166, 'uploaded_files/project_pic/72e6fc8c7bf3590459f81defcc5b2ba0.jpg'),
(169, 162, 'uploaded_files/project_pic/29e7798ed1df1f4057969f7ac31de172.jpg'),
(170, 162, 'uploaded_files/project_pic/e45f2ee7c575c0c7c1975fe4cdbcae1c.jpg'),
(171, 162, 'uploaded_files/project_pic/6fd38c1573d8916eb1dbb5cc9377c036.jpg'),
(172, 169, 'uploaded_files/project_pic/d83b24fdc28c7f5f4a813ce9dbfa0c9b.jpg'),
(173, 169, 'uploaded_files/project_pic/459ed87aac82ce36b11f2906de7def2c.jpg'),
(174, 169, 'uploaded_files/project_pic/86c50cc2bb02f9ea332666f0e8770ed7.jpg'),
(184, 172, 'uploaded_files/project_pic/82e5dad534461981bb5d48207181fb64.jpg'),
(185, 172, 'uploaded_files/project_pic/6d702a0911876ff7629dc627d5202328.jpg'),
(186, 172, 'uploaded_files/project_pic/28b9f493a3523fda67c43d46d3a1b8b7.jpg'),
(190, 182, 'uploaded_files/project_pic/5caba24e02203ac851c85a70d2dc80d0.jpg'),
(191, 182, 'uploaded_files/project_pic/115e96825a7b41bb7390e04df4a0a3b0.jpg'),
(192, 182, 'uploaded_files/project_pic/cc8c7ee3a6189f4125c23557fc4a3cf1.jpg'),
(196, 183, 'uploaded_files/project_pic/ae6ebb8d91a9026fa5686d8eeab935bb.jpg'),
(198, 183, 'uploaded_files/project_pic/cfa3fc2a5e62f6606ee9f63aacbe397d.jpg'),
(199, 183, 'uploaded_files/project_pic/35ebf12c86f729b387620e76e1c2e9d5.jpg'),
(201, 184, 'uploaded_files/project_pic/d89e5201912ecc85e2f61244690bdc64.jpg'),
(202, 186, 'uploaded_files/project_pic/9490ff57275599f55e0938fd80360746.jpg'),
(214, 186, 'uploaded_files/project_pic/5da7f087e69ec8358b117d805b0cfb1c.jpg'),
(215, 186, 'uploaded_files/project_pic/e48e032fa6ba4543723c95e4eaf8fde2.jpg'),
(216, 186, 'uploaded_files/project_pic/0c74eb40c03740f8bd2d61f9040fe42d.jpg'),
(217, 186, 'uploaded_files/project_pic/a25f24324ebbbf26f741856d1fe0065a.jpg'),
(218, 186, 'uploaded_files/project_pic/7186d997c4cb707cb22d33fd2425e219.jpg'),
(219, 186, 'uploaded_files/project_pic/c11f0d6d9cceafbdf9f2d0193557cff4.jpg'),
(220, 187, 'uploaded_files/project_pic/77f4b9ad7854da9fb92c21ef1534708e.jpg'),
(222, 185, 'uploaded_files/project_pic/a4fb4743e6e4b049072267e133ac769e.jpg'),
(223, 185, 'uploaded_files/project_pic/ef310e91959736c9ff1ea630542e5484.jpg'),
(224, 189, 'uploaded_files/project_pic/73da6f6982ef8645df7258dbf498f0a8.png'),
(225, 185, 'uploaded_files/project_pic/f91f0e0da7bb770c15c80df4bf82bc9e.jpg'),
(226, 190, 'uploaded_files/project_pic/b46fbde458cafdc8cfa7128f1b1a11d0.jpg'),
(227, 190, 'uploaded_files/project_pic/582ec5a81067fe7231d456ddf29b2081.jpg'),
(228, 192, 'uploaded_files/project_pic/df5caccca4df4c754cf6b858b0bed1a9.jpg'),
(229, 192, 'uploaded_files/project_pic/d38bb270a2c4715787311fb3ef952b2a.jpeg'),
(230, 193, 'uploaded_files/project_pic/d463e125c4bf8458c87eac4154e71ad7.jpg'),
(240, 151, 'uploaded_files/project_pic/96fe58db3756933fad9cfa094f6380cf.jpg'),
(246, 149, 'uploaded_files/project_pic/1282674f317644e4b1be84ee17459cf1.jpg'),
(247, 149, 'uploaded_files/project_pic/d55dbb2da7aa5239990b6489ad8c4c98.jpg'),
(248, 149, 'uploaded_files/project_pic/971a5e11ce0b7960696ae919a0e833da.jpg'),
(250, 151, 'uploaded_files/project_pic/a087d29a33801e5b8befa3d925f62e23.jpg'),
(252, 167, 'uploaded_files/project_pic/4f69eaea325cc67da17322825de670ba.png'),
(253, 167, 'uploaded_files/project_pic/dfef6c692af489ff6a941559cd1aed8e.jpg'),
(258, 196, 'uploaded_files/project_pic/9192a80e8b3638f4baef6079fae838c0.jpg'),
(259, 196, 'uploaded_files/project_pic/2b3bb703d4e274ee6385401a4c18af53.jpg'),
(260, 196, 'uploaded_files/project_pic/98ba085b5baaf5eb130f413d94168d14.jpg'),
(262, 202, 'uploaded_files/project_pic/7762738d06ffea8a124e16582e1c6e4a.jpg'),
(264, 202, 'uploaded_files/project_pic/2b55f8411b3a6673319bc1500c079f60.jpg'),
(266, 202, 'uploaded_files/project_pic/eab5df68ac727fb5841af070918326da.jpg'),
(267, 202, 'uploaded_files/project_pic/a17061a68c15f0e9834c23aeac77a715.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `smart_services_detail`
--

CREATE TABLE `smart_services_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=active',
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smart_services_detail`
--

INSERT INTO `smart_services_detail` (`id`, `name`, `type`, `address`, `city_id`, `country_id`, `zipcode`, `status`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(1, 'asd', 'asd', 'asd', 1, 3, '712410', 0, '2021-02-08 14:19:33', 1, '0000-00-00 00:00:00', 0),
(2, 'test', 'test', 'test', 2, 9, '521457', 0, '2021-02-08 14:23:54', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `smart_skills`
--

CREATE TABLE `smart_skills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill_for` enum('supplier','professional','all') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=>active,0=>inactive,2=>request,3=>denied request',
  `requested_by` int(11) NOT NULL,
  `requested_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_skills`
--

INSERT INTO `smart_skills` (`id`, `name`, `skill_for`, `status`, `requested_by`, `requested_time`) VALUES
(7, 'Plumbing', 'professional', '1', 0, '0000-00-00 00:00:00'),
(8, 'Car painting', 'professional', '1', 0, '0000-00-00 00:00:00'),
(17, 'Repairing  basins', 'professional', '1', 87, '2021-03-22 09:51:14'),
(33, 'Contraction', 'professional', '1', 92, '2021-03-22 12:34:05'),
(34, ' General', 'professional', '1', 92, '2021-03-22 12:34:05'),
(36, 'Landscaping', 'professional', '1', 0, '0000-00-00 00:00:00'),
(55, 'Detecting and locating leaks in pipework', 'professional', '1', 0, '0000-00-00 00:00:00'),
(56, 'Appliance installation', 'professional', '1', 0, '0000-00-00 00:00:00'),
(64, 'other skill', 'professional', '3', 99, '2021-03-26 05:45:35'),
(65, 'pipe fitting', 'professional', '3', 0, '2021-03-26 06:37:17'),
(66, 'Mechanical', 'professional', '3', 0, '2021-03-26 12:08:45'),
(68, 'Electrical knowledge', 'supplier', '1', 0, '0000-00-00 00:00:00'),
(69, 'Legal knowledge', 'supplier', '0', 0, '0000-00-00 00:00:00'),
(70, 'Install and Maintain  Systems', 'professional', '1', 0, '0000-00-00 00:00:00'),
(71, 'Repairing pipes', 'professional', '1', 0, '0000-00-00 00:00:00'),
(72, 'Install and Maintain  Devices', 'professional', '1', 0, '0000-00-00 00:00:00'),
(73, 'Repairing  domestic kitchen systems', 'professional', '1', 0, '0000-00-00 00:00:00'),
(77, 'Install and Maintain Electrical Equipments', 'professional', '1', 0, '0000-00-00 00:00:00'),
(78, 'Wiring', 'professional', '1', 0, '0000-00-00 00:00:00'),
(79, 'reparing basins', 'professional', '2', 105, '2021-03-29 06:45:07'),
(86, 'Installing Chimney', 'professional', '3', 112, '2021-03-29 07:04:44'),
(87, 'cabel Fitting', 'professional', '2', 0, '2021-03-29 08:35:59'),
(90, 'Ironwork', 'professional', '1', 0, '0000-00-00 00:00:00'),
(91, 'Renovations', 'professional', '1', 0, '0000-00-00 00:00:00'),
(92, 'Building and repair of structures', 'professional', '1', 0, '0000-00-00 00:00:00'),
(93, 'Building and repair  highways', 'professional', '1', 0, '0000-00-00 00:00:00'),
(94, 'Building and repair Bridges', 'professional', '1', 0, '0000-00-00 00:00:00'),
(95, 'bathroom fittings', 'professional', '2', 114, '2021-03-29 13:46:27'),
(124, 'Supervising', 'professional', '1', 0, '0000-00-00 00:00:00'),
(126, 'comunication', 'professional', '2', 0, '2021-03-30 07:41:05'),
(127, 'Supervising', 'professional', '2', 0, '2021-03-30 07:41:51'),
(128, 'Budgeting', 'professional', '2', 0, '2021-03-30 07:43:02'),
(129, 'Project budgeting', 'professional', '2', 0, '2021-03-30 07:47:00'),
(136, 'system', 'professional', '2', 150, '2021-03-30 14:01:41'),
(137, 'change wiring', 'professional', '2', 150, '2021-03-30 14:01:41'),
(146, 'Camera repair', 'professional', '2', 156, '2021-03-31 14:27:20'),
(149, 'Inspect roofing tiles', 'professional', '1', 0, '0000-00-00 00:00:00'),
(150, 'Inspect roofing tiles', 'professional', '2', 159, '2021-04-01 13:05:46'),
(151, 'composition, and slate shingles', 'professional', '2', 159, '2021-04-01 13:05:46'),
(152, 'Inspect roofing tiles', 'professional', '2', 160, '2021-04-01 13:05:49'),
(153, 'composition, and slate shingles', 'professional', '2', 160, '2021-04-01 13:05:49'),
(154, 'Repair services', 'professional', '2', 162, '2021-04-01 14:34:43'),
(159, 'Interior Designing', 'professional', '1', 0, '0000-00-00 00:00:00'),
(161, 'Cladding', 'professional', '2', 0, '2021-04-06 07:33:03'),
(162, ' cladding', 'professional', '1', 0, '0000-00-00 00:00:00'),
(163, 'Material testing', 'professional', '1', 0, '0000-00-00 00:00:00'),
(165, 'Interlocking  tiles', 'professional', '1', 0, '0000-00-00 00:00:00'),
(193, 'basin fix', 'professional', '2', 0, '2021-04-06 11:08:32'),
(197, 'Carpet cleaning', 'professional', '1', 0, '0000-00-00 00:00:00'),
(198, 'Sofa cleaning', 'professional', '1', 0, '0000-00-00 00:00:00'),
(199, 'Window cleaning', 'professional', '1', 0, '0000-00-00 00:00:00'),
(200, 'Electrical equipment repair', 'professional', '1', 0, '2021-04-07 08:50:45'),
(201, 'Electrical equipment repair 2', 'professional', '2', 0, '2021-04-07 08:53:25'),
(234, 'tyui990', 'professional', '2', 186, '2021-04-07 11:24:41'),
(253, 'Fixing Leakage', 'professional', '2', 149, '2021-04-08 05:13:41'),
(254, 'Repairing pipe', 'professional', '2', 149, '2021-04-08 05:13:41'),
(255, 'Repairing leakage', 'professional', '2', 149, '2021-04-08 05:18:44'),
(256, 'Repairing jobs', 'professional', '2', 149, '2021-04-08 05:25:39'),
(257, 'Install commercial satelite system', 'professional', '1', 0, '0000-00-00 00:00:00'),
(262, 'sd ', 'professional', '2', 199, '2021-04-08 06:51:36'),
(263, 'dsffgg', 'professional', '2', 199, '2021-04-08 06:51:36'),
(264, 'sd ', 'professional', '2', 200, '2021-04-08 06:53:40'),
(265, 'dsffgg', 'professional', '2', 200, '2021-04-08 06:53:40'),
(266, 'Cleaning ', 'professional', '2', 201, '2021-04-08 07:12:46'),
(267, 'Kitchens', 'professional', '2', 201, '2021-04-08 07:12:46'),
(268, 'Cleaning', 'professional', '2', 149, '2021-04-08 07:18:17'),
(269, 'Cleaning', 'professional', '2', 149, '2021-04-08 07:43:01'),
(271, 'Analyze network system', 'professional', '1', 0, '0000-00-00 00:00:00'),
(273, 'Controlling the intonation of Alexa\'s voice', 'professional', '1', 0, '0000-00-00 00:00:00'),
(274, 'controlling the Raspberry Pi device using custom Alexa skills', 'professional', '1', 0, '0000-00-00 00:00:00'),
(276, 'Repair mechanical/structural mounting of racking', 'professional', '1', 0, '0000-00-00 00:00:00'),
(277, 'Repair panels', 'professional', '1', 0, '0000-00-00 00:00:00'),
(278, 'Repair mechanical/structural mounting of electrical equipments', 'professional', '1', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `smart_state_list`
--

CREATE TABLE `smart_state_list` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=active',
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smart_state_list`
--

INSERT INTO `smart_state_list` (`id`, `country_id`, `name`, `status`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(1, 3, 'Adrar', 1, '2021-02-09 11:00:39', 1, '2021-03-23 12:17:25', 1),
(2, 7, 'Dakahlia Governorate', 1, '2021-02-09 11:00:49', 1, '2021-03-26 13:33:58', 1),
(3, 9, 'Andhra Pradesh', 0, '2021-02-09 13:03:38', 1, '2021-04-01 07:48:24', 1),
(4, 11, 'Riyadh', 0, '2021-02-11 13:04:49', 1, '2021-04-01 07:38:06', 1),
(5, 12, 'California', 0, '2021-03-23 12:04:25', 1, '0000-00-00 00:00:00', 0),
(6, 12, 'Colorado', 0, '2021-03-23 12:05:09', 1, '0000-00-00 00:00:00', 0),
(7, 8, 'Alsace', 0, '2021-03-23 12:07:13', 1, '0000-00-00 00:00:00', 0),
(8, 8, 'Amapa', 0, '2021-03-23 12:08:07', 1, '0000-00-00 00:00:00', 0),
(9, 8, 'Aquitaine', 0, '2021-03-23 12:10:25', 1, '0000-00-00 00:00:00', 0),
(10, 12, 'Ohio', 0, '2021-03-23 12:13:48', 1, '0000-00-00 00:00:00', 0),
(11, 3, 'Annaba', 0, '2021-03-23 12:17:53', 1, '0000-00-00 00:00:00', 0),
(12, 12, 'Texas', 0, '2021-03-23 13:21:57', 1, '0000-00-00 00:00:00', 0),
(13, 12, 'Pennsylvania', 0, '2021-03-25 11:56:08', 1, '0000-00-00 00:00:00', 0),
(14, 9, 'Karnataka', 0, '2021-03-25 12:28:33', 1, '2021-03-25 12:35:05', 1),
(16, 12, 'North california', 1, '2021-03-29 11:04:53', 1, '0000-00-00 00:00:00', 0),
(17, 9, 'Chennai', 0, '2021-04-01 12:36:07', 1, '0000-00-00 00:00:00', 0),
(18, 9, 'West Bengal', 0, '2021-04-05 07:06:08', 1, '0000-00-00 00:00:00', 0),
(19, 12, 'Michigan', 0, '2021-04-05 10:24:59', 1, '2021-04-05 10:26:20', 1),
(20, 12, 'Dayton', 0, '2021-04-05 12:44:06', 1, '0000-00-00 00:00:00', 0),
(21, 14, 'Benguet', 0, '2021-04-06 07:29:56', 1, '0000-00-00 00:00:00', 0),
(22, 12, 'Minnesota', 0, '2021-04-06 07:54:57', 1, '0000-00-00 00:00:00', 0),
(23, 12, 'New York', 0, '2021-04-06 12:30:56', 1, '0000-00-00 00:00:00', 0),
(24, 12, 'Tuscon', 0, '2021-04-06 13:14:10', 1, '2021-04-06 13:14:31', 1),
(25, 12, 'Monmouth', 0, '2021-04-07 07:03:09', 1, '2021-04-07 10:39:36', 1),
(27, 13, 'Kington', 0, '2021-04-08 08:02:00', 1, '0000-00-00 00:00:00', 0),
(28, 12, 'Arizona', 0, '2021-04-08 14:24:26', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `smart_sub_category`
--

CREATE TABLE `smart_sub_category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=active',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_sub_category`
--

INSERT INTO `smart_sub_category` (`id`, `slug`, `cat_id`, `name`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(3, 'cement', 1, 'Cement', 0, 1, '2021-03-08 17:13:51', 1, '2021-04-01 10:00:55'),
(4, 'ready-mix', 1, 'Ready Mix', 0, 1, '2021-03-08 17:14:13', 1, '2021-04-01 10:01:00'),
(5, 'bricks-blocks', 1, 'Bricks & Blocks', 0, 1, '2021-03-08 17:14:32', 1, '2021-04-01 10:01:06'),
(6, 'pipes', 3, 'pipes', 0, 1, '2021-03-08 17:42:48', 1, '2021-04-01 10:03:51'),
(7, 'wires-and-cables', 4, 'Wires and Cables', 0, 1, '2021-03-09 05:24:25', 1, '2021-04-01 10:04:28'),
(8, 'sanitaryware', 7, 'Sanitaryware', 0, 1, '2021-03-22 04:56:27', 1, '2021-03-30 12:32:03'),
(9, 'kitchen-exhaust-fan', 12, 'Kitchen Exhaust Fan', 0, 1, '2021-03-22 05:03:18', 1, '2021-03-30 12:32:32'),
(10, 'kitchen-equipment', 12, 'Kitchen Equipment', 0, 1, '2021-03-22 05:04:03', 1, '2021-03-30 12:32:38'),
(13, 'stabilizer', 4, 'stabilizer', 0, 1, '2021-03-23 08:43:47', 1, '2021-04-01 10:04:34'),
(14, 'switchgears', 4, 'switchgears', 0, 1, '2021-03-23 08:44:52', 1, '2021-04-01 10:04:40'),
(16, 'tiles-marble-stones', 17, 'Tiles, Marble & Stones', 0, 1, '2021-03-23 09:00:25', 1, '2021-04-01 10:16:03'),
(17, 'wood-floor', 17, 'Wood floor', 0, 1, '2021-03-23 09:01:12', 1, '2021-04-01 10:16:08'),
(19, 'general-contractor', 2, 'General Contractor', 0, 1, '2021-03-29 06:04:02', 1, '2021-04-01 09:52:14'),
(20, 'insulation-services', 2, 'Insulation Services', 0, 1, '2021-03-29 06:04:11', 1, '2021-04-01 09:52:20'),
(21, 'scaffolding', 2, 'Scaffolding', 0, 1, '2021-03-29 06:32:13', 1, '2021-04-01 09:52:26'),
(22, 'exuviation-backfilling', 2, 'Exuviation & backfilling', 0, 1, '2021-03-29 06:33:11', 1, '2021-04-01 09:52:38'),
(23, 'skips', 2, 'Skips', 0, 1, '2021-03-29 06:33:40', 1, '2021-04-01 09:52:46'),
(24, 'hvac-contractor', 2, 'HVAC Contractor', 0, 1, '2021-03-29 06:34:07', 1, '2021-04-01 09:52:53'),
(25, 'plumber', 5, 'Plumber', 0, 1, '2021-03-29 06:34:47', 1, '2021-04-01 09:53:09'),
(26, 'internet-wiring-contractor', 6, 'Internet wiring contractor', 0, 1, '2021-03-29 06:35:31', 1, '2021-04-01 09:53:32'),
(27, 'door-intercom', 6, 'Door Intercom', 0, 1, '2021-03-29 06:36:14', 1, '2021-04-01 09:53:41'),
(28, 'satellite', 6, 'Satellite', 0, 1, '2021-03-29 06:36:34', 1, '2021-04-01 09:53:46'),
(29, 'electrical-contractor', 9, 'Electrical Contractor', 0, 1, '2021-03-29 06:37:10', 1, '2021-04-01 10:15:28'),
(30, 'plastering-contractor', 11, 'Plastering Contractor', 0, 1, '2021-03-29 06:38:29', 1, '2021-04-01 09:56:24'),
(31, 'painting-services', 11, 'Painting services', 0, 1, '2021-03-29 06:39:00', 1, '2021-04-01 09:56:30'),
(32, 'exterior-cladding', 11, 'Exterior cladding', 0, 1, '2021-03-29 06:39:23', 1, '2021-04-01 09:56:35'),
(33, 'elevators', 11, 'Elevators', 0, 1, '2021-03-29 06:40:16', 1, '2021-04-01 09:56:41'),
(34, 'carpentry', 11, 'Carpentry', 0, 1, '2021-03-29 06:40:49', 1, '2021-04-01 09:56:49'),
(35, 'glasses-services', 11, 'Glasses Services', 0, 1, '2021-03-29 06:41:11', 1, '2021-04-01 09:56:57'),
(36, 'interior-contractor', 11, 'Interior Contractor', 0, 1, '2021-03-29 06:41:35', 1, '2021-04-01 09:57:04'),
(37, 'flooring-contractor', 11, 'Flooring Contractor', 0, 1, '2021-03-29 06:41:57', 1, '2021-04-01 09:57:11'),
(38, 'security-cameras', 14, 'Security Cameras', 0, 1, '2021-03-29 06:42:50', 1, '2021-04-01 09:58:32'),
(39, 'engineering-office', 20, 'Engineering Office', 0, 1, '2021-03-29 06:44:02', 1, '2021-04-01 09:59:40'),
(40, 'architect', 20, 'Architect', 0, 1, '2021-03-29 06:44:22', 1, '2021-04-01 09:59:46'),
(41, 'interior-designer', 20, 'Interior Designer', 0, 1, '2021-03-29 06:44:43', 1, '2021-04-01 09:59:51'),
(42, 'soil-testing-services', 20, 'Soil Testing Services', 0, 1, '2021-03-29 06:46:12', 1, '2021-04-01 09:59:56'),
(43, 'landscaping', 20, 'Landscaping', 0, 1, '2021-03-29 06:47:13', 1, '2021-04-01 10:00:02'),
(44, 'swimming-pools', 21, 'Swimming pools', 0, 1, '2021-03-29 06:47:59', 1, '2021-04-01 10:00:20'),
(45, 'pest-control', 21, 'Pest Control', 0, 1, '2021-03-29 06:48:23', 1, '2021-04-01 10:00:25'),
(46, 'shatters', 21, 'Shatters', 0, 1, '2021-03-29 06:48:49', 1, '2021-04-01 10:00:30'),
(47, 'cleaning-services', 21, 'Cleaning Services', 0, 1, '2021-03-29 06:49:12', 1, '2021-04-01 10:00:35'),
(48, 'sand', 1, 'Sand', 0, 1, '2021-03-30 06:01:51', 1, '2021-04-01 10:02:50'),
(49, 'gravells', 1, 'Gravells', 0, 1, '2021-03-30 06:02:30', 1, '2021-04-01 10:02:56'),
(50, 'structural-steel', 1, 'Structural Steel', 0, 1, '2021-03-30 06:02:59', 1, '2021-04-01 10:03:20'),
(51, 'construction-chemicals', 1, 'Construction Chemicals', 0, 1, '2021-03-30 06:03:20', 1, '2021-04-01 10:03:11'),
(52, 'metal', 1, 'Metal', 0, 1, '2021-03-30 06:03:51', 1, '2021-04-01 10:02:07'),
(53, 'general-construction-material', 1, 'General construction material', 0, 1, '2021-03-30 06:07:12', 1, '2021-04-01 10:03:28'),
(54, 'water-filters', 3, 'Water filters', 0, 1, '2021-03-30 06:09:45', 1, '2021-04-01 10:03:56'),
(55, 'water-heaters', 3, 'Water Heaters', 0, 1, '2021-03-30 06:10:19', 1, '2021-04-01 10:04:02'),
(56, 'water-tank', 3, 'Water Tank', 0, 1, '2021-03-30 06:10:45', 1, '2021-04-01 10:04:07'),
(57, 'water-pump', 3, 'Water pump', 0, 1, '2021-03-30 06:11:11', 1, '2021-04-01 10:04:12'),
(58, 'distribution-boards', 4, 'Distribution Boards', 0, 1, '2021-03-30 06:15:38', 1, '2021-04-01 10:04:49'),
(59, 'panels', 4, 'Panels', 0, 1, '2021-03-30 06:16:13', 1, '2021-04-01 10:04:58'),
(60, 'exhaust-fan', 4, 'Exhaust Fan', 0, 1, '2021-03-30 06:16:46', 1, '2021-04-01 10:05:06'),
(61, 'lights', 4, 'Lights', 0, 1, '2021-03-30 06:17:41', 1, '2021-04-01 10:05:13'),
(62, 'paints', 22, 'Paints', 0, 1, '2021-03-30 06:27:09', 1, '2021-04-01 10:14:25'),
(63, 'doors', 22, 'Doors', 0, 1, '2021-03-30 06:27:31', 1, '2021-04-01 11:11:59'),
(64, 'windows', 22, 'Windows', 0, 1, '2021-03-30 06:27:59', 1, '2021-04-01 10:14:20'),
(65, 'handrail', 22, 'Handrail', 0, 1, '2021-03-30 06:28:20', 1, '2021-04-01 10:14:37'),
(66, 'gibson-board', 22, 'Gibson board', 0, 1, '2021-03-30 06:28:42', 1, '2021-04-01 10:14:45'),
(67, 'interior-decoration', 22, 'Interior Decoration', 0, 1, '2021-03-30 06:29:06', 1, '2021-04-01 10:14:54'),
(68, 'aluminum', 22, 'Aluminum', 0, 1, '2021-03-30 06:29:29', 1, '2021-04-01 10:15:01'),
(69, 'elevators', 22, 'Elevators', 0, 1, '2021-03-30 06:29:53', 1, '2021-04-01 10:15:08'),
(70, 'safety-equipment', 24, 'Safety Equipment', 0, 1, '2021-03-30 06:32:01', 1, '2021-04-01 10:10:26'),
(71, 'fire-fighting-equipment', 24, 'Fire Fighting Equipment', 0, 1, '2021-03-30 06:32:28', 1, '2021-04-01 10:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `smart_temp_about_map`
--

CREATE TABLE `smart_temp_about_map` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `about_iteam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_temp_about_map`
--

INSERT INTO `smart_temp_about_map` (`id`, `product_id`, `about_iteam`) VALUES
(1, 3, 'asdassd'),
(2, 3, 'asdassd'),
(3, 3, 'asdassdas'),
(4, 3, 'asdasddasd'),
(5, 4, 'asdassd'),
(6, 4, 'asdassd'),
(7, 4, 'asdassdas'),
(8, 4, 'asdasddasd'),
(9, 1, 'asd'),
(10, 1, 'asdasdd'),
(11, 2, 'asd'),
(12, 2, 'asdasdd');

-- --------------------------------------------------------

--
-- Table structure for table `smart_temp_product_category_map`
--

CREATE TABLE `smart_temp_product_category_map` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_temp_product_category_map`
--

INSERT INTO `smart_temp_product_category_map` (`id`, `product_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `smart_temp_product_detail`
--

CREATE TABLE `smart_temp_product_detail` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=active',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_temp_product_detail`
--

INSERT INTO `smart_temp_product_detail` (`id`, `supplier_id`, `name`, `brand_id`, `product_des`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 34, 'asd', 2, 'asd asdas d', 1, 1, '2021-03-12 12:21:22', 0, '0000-00-00 00:00:00'),
(2, 34, 'asd', 2, 'asd asdas d', 1, 1, '2021-03-12 12:22:40', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `smart_temp_product_image`
--

CREATE TABLE `smart_temp_product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_temp_product_image`
--

INSERT INTO `smart_temp_product_image` (`id`, `product_id`, `image`) VALUES
(1, 1, 'uploaded_files/project_pic/3b7cc3d3734a169ca5a00e0beb4e57d3.jpg'),
(2, 2, 'uploaded_files/project_pic/34ddd73a7c0c2925c3b5cc7f6a6a4f72.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `smart_temp_product_sub_cat_map`
--

CREATE TABLE `smart_temp_product_sub_cat_map` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_temp_product_sub_cat_map`
--

INSERT INTO `smart_temp_product_sub_cat_map` (`id`, `product_id`, `sub_cat_id`) VALUES
(1, 1, 3),
(2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `smart_users_skill`
--

CREATE TABLE `smart_users_skill` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smart_users_skill`
--

INSERT INTO `smart_users_skill` (`id`, `user_id`, `skill`) VALUES
(6, 0, '3'),
(7, 0, '7'),
(8, 0, '8'),
(9, 0, '3'),
(10, 0, '7'),
(11, 0, '8'),
(12, 75, '3'),
(13, 75, '7'),
(14, 75, '8'),
(15, 76, '3'),
(16, 76, '7'),
(17, 76, '8'),
(18, 77, '3'),
(19, 77, '7'),
(20, 77, '8'),
(21, 78, '3'),
(22, 78, '7'),
(23, 78, '8'),
(24, 79, '3'),
(25, 79, '7'),
(26, 80, '3'),
(27, 81, '7'),
(28, 81, 'other'),
(29, 82, '7'),
(30, 82, 'other'),
(31, 85, '7'),
(32, 85, 'other'),
(33, 85, '9'),
(34, 85, '10'),
(35, 85, '11'),
(36, 85, '12'),
(37, 86, '7'),
(38, 86, 'other'),
(39, 86, '13'),
(40, 86, '14'),
(41, 86, '15'),
(42, 86, '16'),
(43, 27, '7'),
(45, 27, '17'),
(46, 27, '18'),
(47, 27, '19'),
(48, 27, '20'),
(49, 88, '7'),
(50, 88, 'other'),
(51, 88, '21'),
(52, 88, '22'),
(53, 88, '23'),
(54, 88, '24'),
(55, 89, '7'),
(56, 89, '25'),
(57, 89, '26'),
(58, 89, '27'),
(59, 89, '28'),
(60, 90, '7'),
(61, 90, '29'),
(62, 90, '30'),
(63, 90, '31'),
(64, 90, '32'),
(65, 91, '3'),
(66, 92, '8'),
(67, 92, '33'),
(68, 92, '34'),
(76, 93, '8'),
(77, 93, '48'),
(83, 35, '19'),
(106, 95, '8'),
(107, 95, '17'),
(108, 95, '49'),
(109, 95, '50'),
(110, 95, '51'),
(111, 95, '58'),
(112, 95, '59'),
(113, 95, '60'),
(114, 95, '61'),
(115, 95, '62'),
(116, 95, '63'),
(122, 99, '36'),
(123, 99, '52'),
(124, 99, '64'),
(130, 97, '35'),
(131, 97, '66'),
(132, 97, '67'),
(133, 101, '55'),
(134, 101, '56'),
(135, 101, '57'),
(136, 101, '74'),
(137, 101, '75'),
(151, 103, '7'),
(152, 104, '7'),
(153, 105, '7'),
(154, 105, '55'),
(155, 105, '71'),
(156, 105, '79'),
(157, 106, '7'),
(158, 106, '55'),
(159, 106, '71'),
(160, 106, '80'),
(161, 107, '7'),
(162, 107, '55'),
(163, 107, '71'),
(164, 107, '81'),
(165, 108, '7'),
(166, 108, '55'),
(167, 108, '71'),
(168, 108, '82'),
(169, 109, '7'),
(170, 109, '55'),
(171, 109, '71'),
(172, 109, '83'),
(173, 110, '7'),
(174, 110, '55'),
(175, 110, '71'),
(176, 110, '84'),
(177, 111, '7'),
(178, 111, '55'),
(179, 111, '71'),
(180, 111, '85'),
(181, 112, '73'),
(182, 112, '86'),
(188, 113, '70'),
(189, 113, '77'),
(278, 114, '7'),
(279, 114, '17'),
(280, 114, '71'),
(281, 114, '95'),
(282, 115, '7'),
(283, 115, '17'),
(284, 115, '71'),
(285, 115, '96'),
(286, 116, '7'),
(287, 116, '17'),
(288, 116, '71'),
(289, 116, '97'),
(290, 117, '7'),
(291, 117, '17'),
(292, 117, '71'),
(293, 117, '98'),
(294, 118, '7'),
(295, 118, '17'),
(296, 118, '71'),
(297, 118, '99'),
(298, 119, '7'),
(299, 119, '17'),
(300, 119, '71'),
(301, 119, '100'),
(302, 120, '7'),
(303, 120, '17'),
(304, 120, '71'),
(305, 120, '101'),
(306, 121, '7'),
(307, 121, '17'),
(308, 121, '71'),
(309, 121, '102'),
(310, 122, '7'),
(311, 122, '17'),
(312, 122, '71'),
(313, 122, '103'),
(314, 123, '7'),
(315, 123, '17'),
(316, 123, '71'),
(317, 123, '104'),
(318, 124, '7'),
(319, 124, '17'),
(320, 124, '71'),
(321, 124, '105'),
(322, 125, '7'),
(323, 125, '106'),
(324, 126, '7'),
(325, 126, '107'),
(326, 127, '7'),
(327, 127, '17'),
(328, 127, '71'),
(329, 127, '108'),
(330, 128, '7'),
(331, 128, '109'),
(332, 129, '7'),
(333, 129, '110'),
(334, 130, '7'),
(335, 130, '111'),
(336, 131, '7'),
(337, 131, '112'),
(338, 132, '7'),
(339, 132, '113'),
(340, 133, '7'),
(341, 133, '114'),
(342, 134, '7'),
(343, 134, '115'),
(344, 135, '7'),
(345, 135, '116'),
(346, 136, '7'),
(347, 136, '117'),
(348, 137, '7'),
(349, 137, '118'),
(350, 138, '7'),
(351, 138, '119'),
(352, 139, '7'),
(353, 139, '120'),
(354, 140, '17'),
(355, 141, '17'),
(356, 142, '17'),
(357, 143, '17'),
(358, 143, '35'),
(359, 143, '36'),
(360, 144, '17'),
(361, 144, '35'),
(362, 144, '36'),
(363, 145, '17'),
(364, 145, '35'),
(365, 145, '36'),
(366, 146, '7'),
(367, 146, '17'),
(368, 146, '71'),
(369, 146, '121'),
(370, 147, '7'),
(371, 147, '17'),
(372, 147, '71'),
(373, 147, '122'),
(446, 102, '135'),
(447, 150, '56'),
(448, 150, '72'),
(449, 150, '136'),
(450, 150, '137'),
(475, 151, '7'),
(476, 151, '8'),
(477, 151, '17'),
(478, 151, '143'),
(479, 152, '144'),
(480, 153, '145'),
(483, 156, '56'),
(484, 156, '77'),
(485, 156, '146'),
(486, 157, '7'),
(490, 160, '152'),
(491, 160, '153'),
(492, 159, '150'),
(493, 159, '151'),
(495, 161, '149'),
(515, 162, '17'),
(516, 162, '71'),
(517, 162, '154'),
(524, 163, '36'),
(525, 163, '155'),
(526, 164, '36'),
(527, 164, '156'),
(528, 165, '36'),
(529, 165, '157'),
(530, 166, '36'),
(531, 166, '158'),
(541, 148, '127'),
(542, 148, '129'),
(547, 170, '7'),
(548, 169, '159'),
(572, 173, '149'),
(573, 174, '149'),
(594, 175, '149'),
(595, 175, '165'),
(596, 176, '149'),
(597, 176, '165'),
(619, 177, '149'),
(646, 178, '149'),
(647, 178, '165'),
(675, 179, '149'),
(679, 180, '149'),
(680, 172, '162'),
(681, 172, '163'),
(684, 181, '149'),
(723, 182, '149'),
(724, 182, '163'),
(909, 184, '33'),
(910, 184, '36'),
(975, 186, '91'),
(976, 186, '217'),
(977, 186, '235'),
(978, 186, '236'),
(979, 186, '237'),
(981, 185, '215'),
(983, 188, '238'),
(984, 188, '7'),
(985, 188, '238'),
(987, 96, '17'),
(1030, 190, '239'),
(1031, 190, '91'),
(1032, 190, '239'),
(1044, 191, '91'),
(1045, 189, '34'),
(1046, 189, '241'),
(1047, 187, '17'),
(1048, 187, '240'),
(1049, 187, '244'),
(1050, 192, '245'),
(1051, 192, '7'),
(1052, 192, '17'),
(1053, 192, '245'),
(1054, 193, '246'),
(1055, 193, '91'),
(1056, 193, '246'),
(1057, 194, '7'),
(1058, 194, '247'),
(1059, 195, '7'),
(1060, 195, '248'),
(1125, 197, '8'),
(1126, 197, '33'),
(1127, 197, '258'),
(1128, 197, '259'),
(1137, 98, '56'),
(1150, 199, '8'),
(1151, 199, '33'),
(1152, 199, '262'),
(1153, 199, '263'),
(1154, 200, '8'),
(1155, 200, '33'),
(1156, 200, '264'),
(1157, 200, '265'),
(1159, 167, '7'),
(1160, 167, '17'),
(1161, 167, '56'),
(1162, 167, '72'),
(1164, 201, '91'),
(1165, 201, '266'),
(1166, 201, '267'),
(1183, 196, '257'),
(1184, 196, '271'),
(1190, 183, '197'),
(1191, 183, '198'),
(1192, 183, '199'),
(1198, 149, '17'),
(1199, 149, '55'),
(1200, 149, '71'),
(1207, 202, '273'),
(1212, 203, '200'),
(1213, 203, '276');

-- --------------------------------------------------------

--
-- Table structure for table `smart_user_detail`
--

CREATE TABLE `smart_user_detail` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `std_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goo_veri_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_by` int(11) NOT NULL COMMENT '0=application,1=gmail,2=fb',
  `reg_using` int(11) NOT NULL COMMENT '1=app,0=web',
  `status` int(11) NOT NULL COMMENT '0=active',
  `is_new_status` int(11) NOT NULL COMMENT '0=new',
  `mail_verification` int(11) NOT NULL COMMENT '1=verified',
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_user_detail`
--

INSERT INTO `smart_user_detail` (`id`, `role_id`, `name`, `email`, `password`, `std_code`, `mobile_no`, `goo_veri_id`, `reg_by`, `reg_using`, `status`, `is_new_status`, `mail_verification`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(1, 1, 'admin', 'jayanta.ghosh@inwebinfo.com', 'YWRtaW4zMjE=', '', '9609195755', '', 0, 0, 0, 0, 1, '2021-01-12 14:54:51', 1, '0000-00-00 00:00:00', 0),
(34, 4, 'Aladin', 'demo@gmail.com', 'MTIzNDU2', '9', '8985039530', '', 0, 0, 0, 1, 1, '2021-02-19 10:13:54', 0, '2021-03-03 07:31:22', 1),
(64, 4, 'asdasd123', 'newsupp@gmail.com', 'MTIzNDU2', '11', '8888888888', '', 0, 0, 0, 0, 1, '2021-03-05 06:41:18', 1, '0000-00-00 00:00:00', 0),
(70, 2, 'K kundu', 'Kkundu123@gmail.com', 'MTIzNDU2Nzg=', '+91', '9876453210', '', 1, 0, 0, 0, 1, '2021-03-09 10:30:21', 0, '2021-03-31 13:09:18', 1),
(94, 2, 'Farid Khan', 'faridkhan21@gmail.com', 'MTIzNDU2', '11', '8765432190', '', 0, 0, 0, 0, 0, '2021-03-23 11:14:21', 0, '2021-03-30 13:23:11', 1),
(96, 3, 'James Miller', 'millerjames159@gmail.com', 'MTIzNDU2', '12', '8887622651', '', 0, 0, 0, 1, 1, '2021-03-25 06:21:00', 0, '2021-04-07 12:27:33', 1),
(98, 3, 'Jatin Dasgupta', 'jatindasgupta@gmail.com', 'MTIzNDU2', '9', '1800425018', '', 0, 0, 0, 1, 1, '2021-03-25 13:30:01', 0, '2021-04-01 14:47:13', 1),
(148, 3, 'Matthew Richard', 'richardmatthew@gmail.com', 'MTIzNDU2', '12', '7043868912', '', 0, 0, 0, 1, 1, '2021-03-29 14:47:33', 0, '2021-04-05 05:57:09', 1),
(149, 3, 'Riya Saha', 'riya.saha@inwebinfo.com', 'MTIzNDU2Nw==', '8', '7879809098', '', 0, 0, 0, 1, 1, '2021-03-29 14:48:47', 0, '2021-04-08 12:54:13', 1),
(151, 3, 'f1 f2', 'jntgsh@gmail.com', 'MTIzNDU2', '7', '9999999906', '', 0, 0, 0, 1, 1, '2021-03-30 18:21:01', 0, '0000-00-00 00:00:00', 0),
(152, 3, 'f1 f2', 'jntgsh07@gmail.com', 'MTIzNDU2', '3', '9999999907', '', 0, 0, 1, 1, 0, '2021-03-31 05:28:20', 0, '0000-00-00 00:00:00', 0),
(153, 3, 'f1 f2', 'jntgsh07@gmail.com', 'MTIzNDU2', '3', '9999999907', '', 0, 0, 0, 1, 1, '2021-03-31 05:28:27', 0, '0000-00-00 00:00:00', 0),
(154, 2, 'asd', 'jntgsh1@gmail.com', 'MTIzNDU2', '3', '9999999908', '', 0, 0, 0, 0, 0, '2021-03-31 12:07:18', 0, '0000-00-00 00:00:00', 0),
(158, 2, 'Rai', 'riyasaha738@gmail.com', 'MTIzNDU2', '9', '9038811630', '', 0, 0, 0, 0, 0, '2021-04-01 12:08:53', 0, '0000-00-00 00:00:00', 0),
(166, 3, 'dasdasd', 'jntgsh12@gmail.com', 'MTExMTEx', '3', '9999999912', '', 0, 0, 0, 1, 0, '2021-04-01 21:40:39', 1, '0000-00-00 00:00:00', 0),
(167, 3, 'sourav paul1', 'sourav.paul@inwebinfo.com', 'MTIzNDU2Nzg=', '9', '7278830456', '', 0, 0, 0, 1, 1, '2021-04-03 17:38:55', 0, '2021-04-08 07:01:40', 1),
(168, 2, 'Sourav Paul', 'souravcoder19@gmail.com', '', '', '', '114291044072147989748', 1, 0, 0, 0, 0, '2021-04-05 04:42:52', 0, '0000-00-00 00:00:00', 0),
(169, 3, 'Joyita Dey', 'dey67677@gmail.com', 'MTIzNDU2', '9', '5034019991', '', 0, 0, 0, 1, 1, '2021-04-05 07:29:45', 0, '2021-04-05 11:47:43', 1),
(171, 2, 'customer jntgsh1', 'jntgsh14@gmail.com', 'MTIzNDU2', '9', '9999999914', '', 0, 0, 0, 0, 0, '2021-04-05 09:34:45', 0, '0000-00-00 00:00:00', 0),
(172, 3, 'Hasan Uddin Mohammed', 'uddinmohammedhasan7@gmail.com', 'MTIzNDU2', '12', '6514663000', '', 0, 0, 0, 1, 1, '2021-04-05 13:49:36', 0, '2021-04-06 11:40:43', 1),
(182, 3, 'John Smith', 'johnsmith@gmail.com', 'MTIzNDU2', '5', '8945622131', '', 0, 0, 0, 1, 1, '2021-04-06 11:58:21', 0, '2021-04-06 13:02:05', 1),
(183, 3, 'David Pearce', 'pearcedavid087@gmail.com', 'MTIzNDU2', '5', '6543219022', '', 1, 0, 0, 1, 1, '2021-04-07 05:03:30', 0, '2021-04-08 12:23:00', 1),
(185, 3, 'Albert Eisten', 'eistenalbert@gmail.com', 'MTIzNDU2', '5', '8965432190', '', 1, 0, 0, 1, 1, '2021-04-07 09:20:29', 0, '2021-04-07 11:49:03', 1),
(190, 3, 'Rehna', 'rehna@gmail.com', 'MTIzNDU2', '11', '9038811634', '', 0, 0, 0, 1, 0, '2021-04-07 13:45:51', 1, '0000-00-00 00:00:00', 0),
(196, 3, 'Johnathon Franklin', 'franklinJohnathon12@gmail.com', 'MTIzNDU2', '12', '8243219202', '', 0, 0, 0, 1, 1, '2021-04-08 06:00:33', 0, '2021-04-08 09:56:09', 1),
(202, 3, 'Fransis Mackdormand', 'mackdormandfransis@gmail.com', 'MTIzNDU2', '12', '8976543219', '', 0, 0, 0, 1, 1, '2021-04-08 10:15:12', 0, '2021-04-08 13:09:04', 1),
(203, 3, 'Aleson Janni', 'jannialeson@gmail.com', 'MTIzNDU2', '12', '9876543219', '', 0, 0, 0, 1, 1, '2021-04-08 12:51:53', 0, '2021-04-08 13:31:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smart_user_login_record`
--

CREATE TABLE `smart_user_login_record` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `auth_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_time` datetime NOT NULL,
  `login_by` int(11) NOT NULL COMMENT '0=apps,1=web'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_user_login_record`
--

INSERT INTO `smart_user_login_record` (`id`, `user_id`, `auth_key`, `login_time`, `login_by`) VALUES
(1, 17, 'benasmartkey16122060031875key17', '2021-02-01 19:00:03', 0),
(2, 17, 'benasmartkey16122060465508key17', '2021-02-01 19:00:46', 0),
(3, 17, 'benasmartkey16122060504564key17', '2021-02-01 19:00:50', 0),
(4, 54, 'benasmartkey16141649457928key54', '2021-02-24 11:09:05', 0),
(5, 50, 'benasmartkey16141654229822key50', '2021-02-24 11:17:02', 0),
(6, 50, 'benasmartkey16141654527741key50', '2021-02-24 11:17:32', 0),
(7, 50, 'benasmartkey16141758305165key50', '2021-02-24 14:10:30', 0),
(8, 50, 'benasmartkey16141796484619key50', '2021-02-24 15:14:08', 0),
(9, 50, 'benasmartkey16141798556572key50', '2021-02-24 15:17:35', 0),
(10, 50, 'benasmartkey16148395167565key50', '2021-03-04 06:31:56', 0),
(11, 50, 'benasmartkey16149256535088key50', '2021-03-05 06:27:33', 0),
(12, 50, 'benasmartkey16149257538189key50', '2021-03-05 06:29:13', 0),
(13, 50, 'benasmartkey16149522512905key50', '2021-03-05 13:50:51', 0),
(14, 50, 'benasmartkey16149529493836key50', '2021-03-05 14:02:29', 0),
(15, 50, 'benasmartkey16149540078903key50', '2021-03-05 14:20:07', 0),
(16, 50, 'benasmartkey16149543877548key50', '2021-03-05 14:26:27', 0),
(17, 67, 'benasmartkey16149556532739key67', '2021-03-05 14:47:33', 0),
(18, 59, 'benasmartkey16151826715136key59', '2021-03-08 05:51:11', 0),
(19, 59, 'benasmartkey16151828774653key59', '2021-03-08 05:54:37', 0),
(20, 59, 'benasmartkey16151831303094key59', '2021-03-08 05:58:50', 0),
(21, 59, 'benasmartkey16151837081919key59', '2021-03-08 06:08:28', 0),
(22, 59, 'benasmartkey16151837164089key59', '2021-03-08 06:08:36', 0),
(23, 59, 'benasmartkey16151838821565key59', '2021-03-08 06:11:22', 0),
(24, 59, 'benasmartkey16151893224227key59', '2021-03-08 07:42:02', 0),
(25, 59, 'benasmartkey16151894046023key59', '2021-03-08 07:43:24', 0),
(26, 59, 'benasmartkey16151894141316key59', '2021-03-08 07:43:34', 0),
(27, 59, 'benasmartkey16151894785531key59', '2021-03-08 07:44:38', 0),
(28, 50, 'benasmartkey16151913633847key50', '2021-03-08 08:16:03', 0),
(29, 68, 'benasmartkey16151930648402key68', '2021-03-08 08:44:24', 0),
(30, 69, 'benasmartkey16152191875074key69', '2021-03-08 15:59:47', 0),
(31, 70, 'benasmartkey16152858433718key70', '2021-03-09 10:30:43', 0),
(32, 70, 'benasmartkey16152867103388key70', '2021-03-09 10:45:10', 0),
(33, 59, 'benasmartkey16152975381676key59', '2021-03-09 13:45:38', 0),
(34, 59, 'benasmartkey16152978167724key59', '2021-03-09 13:50:16', 0),
(35, 39, 'benasmartkey16152980985321key39', '2021-03-09 13:54:58', 0),
(36, 59, 'benasmartkey16152982887738key59', '2021-03-09 13:58:08', 0),
(37, 59, 'benasmartkey16152983642622key59', '2021-03-09 13:59:24', 0),
(38, 59, 'benasmartkey16153009829788key59', '2021-03-09 14:43:02', 0),
(39, 59, 'benasmartkey16153010455679key59', '2021-03-09 14:44:05', 0),
(40, 59, 'benasmartkey16153637586272key59', '2021-03-10 08:09:18', 0),
(41, 59, 'benasmartkey16153782209745key59', '2021-03-10 12:10:20', 0),
(42, 59, 'benasmartkey16153941967867key59', '2021-03-10 16:36:36', 0),
(43, 59, 'benasmartkey16157370745745key59', '2021-03-14 15:51:14', 0),
(44, 94, 'benasmartkey16178858307779key94', '2021-04-08 12:43:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `smart_user_prof_bank_det`
--

CREATE TABLE `smart_user_prof_bank_det` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `bank_country_id` int(11) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_acount_no` varchar(255) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `micr_code` varchar(50) NOT NULL,
  `bank_address` text NOT NULL,
  `bank_address2` varchar(255) NOT NULL,
  `std_code` varchar(50) NOT NULL,
  `bank_mobile_no` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smart_user_prof_bank_det`
--

INSERT INTO `smart_user_prof_bank_det` (`id`, `userid`, `bank_country_id`, `account_holder_name`, `bank_name`, `bank_acount_no`, `ifsc_code`, `micr_code`, `bank_address`, `bank_address2`, `std_code`, `bank_mobile_no`, `country_id`, `state_id`, `city_id`, `zipcode`, `email`) VALUES
(1, 27, 7, 'asd', 'asd', 'asd', 'asd', 'T7809094', 'asd', 'asd', '9', '7001631952', 11, 4, 4, 7111111, '111@gmail.com'),
(2, 28, 7, 'asd', 'asd', 'asd', 'asd', 'asd', 'sec v', '', '1', '07001631952', 0, 0, 0, 0, ''),
(3, 27, 7, 'asd', 'asd', 'asd', 'asd', 'T7809094', 'asd', 'asd', '9', '7001631952', 11, 4, 4, 7111111, '111@gmail.com'),
(4, 30, 3, '1', '1', '1', '1', '1', '1', '', '11', '1111111111', 0, 0, 0, 0, ''),
(5, 31, 3, 'as', 'asd', 'asdd', 'asd', 'asd', 'asd', '', '9', '7001631958', 0, 0, 0, 0, ''),
(6, 32, 11, 'Riya', 'Soudi Bank', '7879092345', 'FID793849', '89909424', '12 S R Road Soudi', '', '8', '894094202909', 0, 0, 0, 0, ''),
(7, 34, 11, 'AXZ', 'Soudi Bank', '875837538753', '7583759', '827424829', '123 Test', '123 Test', '11', '9999999999', 11, 4, 4, 777777, '111@gmail.com'),
(8, 35, 11, 'John', 'Soudi Bank', '384938492', '8375387', '758375', '12 Soudi Bank', 'Soudi Arab', '11', '5835739859', 11, 4, 4, 890907, 's@gmail.com'),
(9, 36, 11, 'R Arman', 'Soudi Bank', '357835729', '3528429', '4284728', '123', '', '9', '2424242424', 0, 0, 0, 0, ''),
(10, 61, 11, 'Riya', 'Arab bank', '87837490909', 'AR3739890', '738273837', 'Arab Bank', 'Arab street', '10', '7386383889', 11, 4, 4, 587898, 'rs@gmail.com'),
(11, 62, 10, '2e32e2', 'eqeq', '3r3r3', '3wr3r3r3', 'rtretre', 'erere', '', '11', '7849283923', 0, 0, 0, 0, ''),
(12, 64, 10, 'asd', 'asd', 'asd', 'asd', 'ad', 'aasdasd', '', '11', '8888888888', 0, 0, 0, 0, ''),
(13, 65, 9, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '11', '9988774562', 0, 0, 0, 0, ''),
(14, 66, 11, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '5', '9966882255', 0, 0, 0, 0, ''),
(15, 71, 11, 'Riya', 'Soudi Bank', '67598650', '46276428', '8378357', '12, Post man street', 'Soudi Arab', '9', '9038811632', 11, 4, 4, 90676, 'test@gmail.com'),
(16, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(17, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(18, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(19, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(20, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(21, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(22, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(23, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(24, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(25, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(26, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(27, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(28, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(29, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(30, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(31, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(32, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(33, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(34, 0, 11, 'Soudi', 'Soudi Bank', '65898090908', '7989098676', '5768798090', '12, R B Avenue', '', '9', '6386383889', 0, 0, 0, 0, ''),
(35, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(36, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(37, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(38, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(39, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(40, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(41, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(42, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(43, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(44, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(45, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(46, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(47, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(48, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(49, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(50, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(51, 0, 3, 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', '', '4', '09999999999', 0, 0, 0, 0, ''),
(52, 0, 11, 'Rachel', 'Soudi Bank', 'SD75359839', 'IDF34798', 'T8739894', '12, Post man street', '', '11', '5835739859', 0, 0, 0, 0, ''),
(53, 0, 11, 'Rachel', 'Soudi Bank', 'SD75359839', 'IDF34798', 'T8739894', '12, Post man street', '', '11', '5835739859', 0, 0, 0, 0, ''),
(54, 0, 11, 'Rachel', 'Soudi Bank', 'SD75359839', 'IDF34798', 'T8739894', '12, Post man street', '', '11', '5835739859', 0, 0, 0, 0, ''),
(55, 0, 11, 'Rachel', 'Soudi Bank', 'SD75359839', 'IDF34798', 'T8739894', '12, Post man street', '', '11', '5835739859', 0, 0, 0, 0, ''),
(56, 0, 11, 'Rachel', 'Soudi Bank', 'SD75359839', 'IDF34798', 'T8739894', '12, Post man street', '', '11', '5835739859', 0, 0, 0, 0, ''),
(57, 0, 11, 'Rachel', 'Soudi Bank', 'SD75359839', 'IDF34798', 'T8739894', '12, Post man street', '', '11', '5835739859', 0, 0, 0, 0, ''),
(58, 0, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '3', '9999999999', 0, 0, 0, 0, ''),
(59, 0, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '3', '9999999999', 0, 0, 0, 0, ''),
(60, 75, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '3', '9999999999', 0, 0, 0, 0, ''),
(61, 76, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '3', '9999999999', 0, 0, 0, 0, ''),
(62, 77, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '3', '9999999999', 0, 0, 0, 0, ''),
(63, 78, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '3', '9999999999', 0, 0, 0, 0, ''),
(64, 79, 11, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '3', '9999999999', 0, 0, 0, 0, ''),
(65, 80, 9, 'asd', 'asd', '1', 'asd', 'asd', 'asd', 'aaa', '11', '9999999999', 11, 4, 4, 700091, 'aaaa@sss.com'),
(66, 81, 11, 'asd', 'asdasd', 'asd', 'asd', 'asd', 'asd', '', '8', '9999999999', 0, 0, 0, 0, ''),
(67, 82, 11, 'asd', 'asdasd', 'asd', 'asd', 'asd', 'asd', '', '8', '9999999999', 0, 0, 0, 0, ''),
(68, 83, 11, 'asd', 'asdasd', 'asd', 'asd', 'asd', 'asd', '', '8', '9999999999', 0, 0, 0, 0, ''),
(69, 84, 11, 'asd', 'asdasd', 'asd', 'asd', 'asd', 'asd', '', '8', '9999999999', 0, 0, 0, 0, ''),
(70, 85, 11, 'asd', 'asdasd', 'asd', 'asd', 'asd', 'asd', '', '8', '9999999999', 0, 0, 0, 0, ''),
(71, 86, 11, 'asd', 'asdasd', 'asd', 'asd', 'asd', 'asd', '', '8', '9999999999', 0, 0, 0, 0, ''),
(72, 87, 11, 'asd', 'asdasd', 'asd', 'asd', 'asd', 'asd', '', '8', '9999999999', 0, 0, 0, 0, ''),
(73, 88, 11, 'asd', 'asdasd', 'asd', 'asd', 'asd', 'asd', '', '8', '9999999999', 0, 0, 0, 0, ''),
(74, 89, 11, 'asd', 'asdasd', 'asd', 'asd', 'asd', 'asd', '', '8', '9999999999', 0, 0, 0, 0, ''),
(75, 90, 11, 'asd', 'asdasd', 'asd', 'asd', 'asd', 'asd', '', '8', '9999999999', 0, 0, 0, 0, ''),
(76, 91, 4, 'asd', 'asd', 'asd', 'test', 'asd', 'asd1', '', '10', '9999999999', 0, 0, 0, 0, ''),
(77, 92, 11, 'Bena', 'Arab bank', '24242424242', 'SB898096778', 'SB80909671261', 'Soudi Bank', '', '11', '9181920192', 0, 0, 0, 0, ''),
(78, 93, 11, 'asd', 'asd', 'asdd', 'asd', 'asd', 'asd', 'asd', '9', '9999999999', 11, 4, 4, 700091, '111@gmail.com'),
(79, 95, 12, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '3', '9999999999', 0, 0, 0, 0, ''),
(80, 96, 12, 'James Miller', 'PNC Financial Services Group Inc', '014321567891', '234567', '345672', '1549 Ringling Blvd, Sarasota, FL 34236, United State', '300 5TH Ave Pittsburgh ​, PA, 15222-2401 United States', '12', '8887622651', 12, 13, 6, 15222, 'investor.relations@pnc.com'),
(81, 97, 11, 'Soudi', 'Soudi Bannk', '809076BH', 'WR7809986', 'WR68798', '12, Post man street', '', '9', '5687878789', 0, 0, 0, 0, ''),
(82, 98, 9, 'Jatin Dasgupta', 'Canara Bank', '1456789123456', '345678', '4321789', '102, 103, 104-110, P B NO.6588, AVENUE PLAZA ROAD', 'BANGALORE CITY S.O BENGALURU, Bengaluru, Karnataka 560004', '9', '1800425018', 9, 14, 7, 560004, 'canarafastag@tollplus.com'),
(83, 99, 11, 'asd', 'err', 'wer', 'wrrrer', 'ertertert', 'ertert', 'asd', '11', '9999999999', 9, 14, 7, 700091, '1234@gmail.com'),
(84, 100, 11, 'akbar', 'Soudi', 'SD462742', 'SD462742', 'SD462742', '23 Hamzard Street', '', '7', '7879809090', 0, 0, 0, 0, ''),
(85, 101, 11, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd1', '', '9', '9999999999', 0, 0, 0, 0, ''),
(86, 102, 11, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'sasd', '9', '9999999999', 9, 14, 7, 111111, 'asdasd@asdasd.com'),
(87, 103, 3, 'awqe', 'asd', 'asd', 'asd', 'asd', 'asd', '', '3', '9999999999', 0, 0, 0, 0, ''),
(88, 104, 9, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '3', '9999999999', 0, 0, 0, 0, ''),
(89, 105, 12, 'Tokyo Smith', 'C A Bank', '744892832847', 'CA787492482', 'CA01647438', '12E Eastern Road California 890670', '', '11', '1234568709', 0, 0, 0, 0, ''),
(90, 106, 12, 'Tokyo Smith', 'C A Bank', '744892832847', 'CA787492482', 'CA01647438', '12E Eastern Road California 890670', '', '11', '1234568709', 0, 0, 0, 0, ''),
(91, 107, 12, 'Tokyo Smith', 'C A Bank', '744892832847', 'CA787492482', 'CA01647438', '12E Eastern Road California 890670', '', '11', '1234568709', 0, 0, 0, 0, ''),
(92, 108, 12, 'Tokyo Smith', 'C A Bank', '744892832847', 'CA787492482', 'CA01647438', '12E Eastern Road California 890670', '', '11', '1234568709', 0, 0, 0, 0, ''),
(93, 109, 12, 'Tokyo Smith', 'C A Bank', '744892832847', 'CA787492482', 'CA01647438', '12E Eastern Road California 890670', '', '11', '1234568709', 0, 0, 0, 0, ''),
(94, 110, 12, 'Tokyo Smith', 'C A Bank', '744892832847', 'CA787492482', 'CA01647438', '12E Eastern Road California 890670', '', '11', '1234568709', 0, 0, 0, 0, ''),
(95, 111, 12, 'Tokyo Smith', 'C A Bank', '744892832847', 'CA787492482', 'CA01647438', '12E Eastern Road California 890670', '', '11', '1234568709', 0, 0, 0, 0, ''),
(96, 112, 12, 'Tokyo Smith', 'C A Bank', '65898090908', 'CA787492482', 'CA01647438', '12E Eastern Road California 890670', '', '5', '9899889098', 0, 0, 0, 0, ''),
(97, 113, 12, 'Riya', 'A bank', '678798999', '7989098676', '758375', '12, Post man street', '', '8', '0568787878', 0, 0, 0, 0, ''),
(98, 114, 12, 'Riya', 'AD Bank', '24242424242', 'AD29893819', 'AD8939208', '12, PM street USA - 909033', '', '12', '8392387876', 0, 0, 0, 0, ''),
(99, 115, 12, 'Riya', 'AD Bank', '24242424242', 'AD29893819', 'AD8939208', '12, PM street USA - 909033', '', '12', '8392387876', 0, 0, 0, 0, ''),
(100, 116, 12, 'Riya', 'AD Bank', '24242424242', 'AD29893819', 'AD8939208', '12, PM street USA - 909033', '', '12', '8392387876', 0, 0, 0, 0, ''),
(101, 117, 12, 'Riya', 'AD Bank', '24242424242', 'AD29893819', 'AD8939208', '12, PM street USA - 909033', '', '12', '8392387876', 0, 0, 0, 0, ''),
(102, 118, 12, 'Riya', 'AD Bank', '24242424242', 'AD29893819', 'AD8939208', '12, PM street USA - 909033', '', '12', '8392387876', 0, 0, 0, 0, ''),
(103, 119, 12, 'Riya', 'AD Bank', '24242424242', 'AD29893819', 'AD8939208', '12, PM street USA - 909033', '', '12', '8392387876', 0, 0, 0, 0, ''),
(104, 120, 12, 'Riya', 'AD Bank', '24242424242', 'AD29893819', 'AD8939208', '12, PM street USA - 909033', '', '12', '8392387876', 0, 0, 0, 0, ''),
(105, 121, 12, 'Riya', 'AD Bank', '24242424242', 'AD29893819', 'AD8939208', '12, PM street USA - 909033', '', '12', '8392387876', 0, 0, 0, 0, ''),
(106, 122, 12, 'Riya', 'AD Bank', '24242424242', 'AD29893819', 'AD8939208', '12, PM street USA - 909033', '', '12', '8392387876', 0, 0, 0, 0, ''),
(107, 123, 12, 'Riya', 'AD Bank', '24242424242', 'AD29893819', 'AD8939208', '12, PM street USA - 909033', '', '12', '8392387876', 0, 0, 0, 0, ''),
(108, 124, 12, 'Riya', 'AD Bank', '24242424242', 'AD29893819', 'AD8939208', '12, PM street USA - 909033', '', '12', '8392387876', 0, 0, 0, 0, ''),
(109, 125, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '12', '9999999999', 0, 0, 0, 0, ''),
(110, 126, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '12', '9999999999', 0, 0, 0, 0, ''),
(111, 127, 12, 'Riya', 'AD Bank', '24242424242', 'AD29893819', 'AD8939208', '12, PM street USA - 909033', '', '12', '8392387876', 0, 0, 0, 0, ''),
(112, 128, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '12', '9999999999', 0, 0, 0, 0, ''),
(113, 129, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '12', '9999999999', 0, 0, 0, 0, ''),
(114, 130, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '12', '9999999999', 0, 0, 0, 0, ''),
(115, 131, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '12', '9999999999', 0, 0, 0, 0, ''),
(116, 132, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '12', '9999999999', 0, 0, 0, 0, ''),
(117, 133, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '12', '9999999999', 0, 0, 0, 0, ''),
(118, 134, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '12', '9999999999', 0, 0, 0, 0, ''),
(119, 135, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '12', '9999999999', 0, 0, 0, 0, ''),
(120, 136, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '12', '9999999999', 0, 0, 0, 0, ''),
(121, 137, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '12', '9999999999', 0, 0, 0, 0, ''),
(122, 138, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '12', '9999999999', 0, 0, 0, 0, ''),
(123, 139, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '12', '9999999999', 0, 0, 0, 0, ''),
(124, 140, 9, 'sdf', 'sf', 'dfg', 'dg', 'dgdg', 'dfg', '', '4', '4444443224', 0, 0, 0, 0, ''),
(125, 141, 9, 'sdf', 'sf', 'dfg', 'dg', 'dgdg', 'dfg', '', '4', '4444443224', 0, 0, 0, 0, ''),
(126, 142, 9, 'sdf', 'sf', 'dfg', 'dg', 'dgdg', 'dfg', '', '4', '4444443224', 0, 0, 0, 0, ''),
(127, 143, 4, 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', '', '5', '2333244321', 0, 0, 0, 0, ''),
(128, 144, 4, 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', '', '5', '2333244321', 0, 0, 0, 0, ''),
(129, 145, 4, 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', '', '5', '2333244321', 0, 0, 0, 0, ''),
(130, 146, 12, 'Riya', 'AD Bank', '24242424242', 'AD29893819', 'AD8939208', '12, PM street USA - 909033', '', '12', '8392387876', 0, 0, 0, 0, ''),
(131, 147, 12, 'Riya', 'AD Bank', '24242424242', 'AD29893819', 'AD8939208', '12, PM street USA - 909033', '', '12', '8392387876', 0, 0, 0, 0, ''),
(132, 148, 12, 'Matthew Richard', 'Bank of America', '134567893421', '123456784', '4321789564', '8551 US Highway 29, Charlotte', 'NC 28262 US', '12', '7043868912', 12, 5, 9, 92612, 'jane.doe@bankofamerica.com'),
(133, 149, 12, 'Riya', 'C A Bank', '65898090908', 'AR3739898', 'T7809098', '23 Hamzard Street', 'California, United States', '8', '7879809098', 12, 5, 3, 90987, 'test@bank.com'),
(134, 150, 11, 'Rachel alberto', 'Soudi Bank', '65898090908', 'IDF34798', '5768798090', '12, Post man street', '', '11', '5835739859', 0, 0, 0, 0, ''),
(135, 151, 11, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '8', '9999999999', 0, 0, 0, 0, ''),
(136, 152, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '3', '9999999999', 0, 0, 0, 0, ''),
(137, 153, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '3', '9999999999', 0, 0, 0, 0, ''),
(138, 156, 12, 'Rios', 'A bank', '809076BH', '7989098676', 'T8739894', '23 Hamzard Street', '', '7', '7879809090', 0, 0, 0, 0, ''),
(139, 157, 3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '9', '9999999999', 0, 0, 0, 0, ''),
(140, 159, 9, 'Dinesh Ghosh', 'Hdfc', '12345678912', '123456789', '123456', '#2A, 1ST FLOOR DURAISAMY REDDY STREET,', 'WEST TAMBARAM', '9', '2230751912', 9, 17, 14, 560024, 'millerjames159@gmail.com'),
(141, 160, 9, 'Dinesh Ghosh', 'Hdfc', '12345678912', '123456789', '123456', '#2A, 1ST FLOOR DURAISAMY REDDY STREET, WEST TAMBARAM', '', '9', '2230751912', 0, 0, 0, 0, ''),
(142, 161, 9, 'Jatin Dasgupta', 'Hdfc', '123456789123', '12345678912', '123456789', 'No 8, LB Rd, L.I.C Colony, Thiruvanmiyur, Chennai, Tamil Nadu 600041', '', '9', '8657892123', 0, 0, 0, 0, ''),
(143, 162, 12, 'Riya', 'Bank of America', '65898090908', 'AB3739890', '89899099090', '48E Middle field Road', '', '11', '7890654323', 0, 0, 0, 0, ''),
(144, 163, 4, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '3', '9999999999', 0, 0, 0, 0, 'azsd@asd.com'),
(145, 164, 4, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '3', '9999999999', 0, 0, 0, 0, 'azsd@asd.com'),
(146, 165, 4, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '3', '9999999999', 0, 0, 0, 0, 'azsd@asd.com'),
(147, 166, 4, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '3', '9999999999', 0, 0, 0, 0, 'azsd@asd.com'),
(148, 167, 7, 'souravpaul', 'Bank Name', '0123456789', '012345', '012345', 'kolkata', 'Address Line2', '9', '8892347351', 12, 10, 18, 12345, 'user332@gmail.com'),
(149, 169, 12, 'Joy Dey', 'U.S. Bank', '12345678', '12345678912', '12345678912', 'U.S. Bank Corporate Headquarters: U.S. Bank', '425 Walnut Street Cincinnati, Ohio 45202', '9', '5034019991', 12, 10, 18, 45202, 'gy63738@gmail.com'),
(150, 170, 11, 'dx', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', '7', '9999999999', 11, 4, 4, 111111, 'as@sad.com'),
(151, 172, 12, 'Hasan Uddin Mohammed', 'U.S. Bancorp', '123456789123', '12345678', '12345678', 'U.S. Bancorp Center 800 Nicollet', 'Mall Minneapolis, MN 55402 - 7014', '12', '6514663000', 12, 22, 21, 55402, 'investorrelations@usbank.com'),
(152, 173, 12, 'Robert Smith', 'U.S. Bancorp', 'hello', 'hello', 'hello', 'U.S. Bancorp Center 800 Nicollet', '', '5', '6514663000', 0, 0, 0, 0, ''),
(153, 174, 12, 'Robert Smith', 'U.S. Bancorp', 'hello', 'hello', 'hello', 'U.S. Bancorp Center 800 Nicollet', '', '5', '6514663000', 0, 0, 0, 0, ''),
(154, 175, 12, 'Robert Smith', 'U.S. Bancorp', '123456789123', '123456789', '123456', 'U.S. Bancorp Center 800 Nicollet Mall Minneapolis, MN 55402 - 7014', '', '12', '6514663000', 0, 0, 0, 0, ''),
(155, 176, 12, 'Robert Smith', 'U.S. Bancorp', '123456789', '123456789', '123456789', 'U.S. Bancorp Center 800 Nicollet Mall Minneapolis, MN 55402 - 7014', '', '12', '6514663000', 0, 0, 0, 0, ''),
(156, 177, 12, 'David perace', 'U.S. Bancorp', '12345678923', '123456', '12345678', 'U.S. Bancorp Center 800 Nicollet', '', '12', '6566666612', 0, 0, 0, 0, ''),
(157, 178, 5, 'David perace', 'mm', '123456789123', '123456789123', '123456789123', 'kolkata', '', '12', '8943217893', 0, 0, 0, 0, ''),
(158, 179, 12, 'David perace', 'U.S. Bank', '12345678912', '123456', '123456', 'U.S. Bancorp Center 800 Nicollet', '', '12', '8453333212', 0, 0, 0, 0, ''),
(159, 180, 6, 'test', 'test', '123', '123', '123', 'mm', '', '13', '1234567891', 0, 0, 0, 0, ''),
(160, 181, 5, 'mm', 'nnn', 'vvv', '123456789', '123456789', 'mmm', '', '14', '8945003212', 0, 0, 0, 0, ''),
(161, 182, 12, '12353321567854', 'U.S. Bancorp', '123456987', '123456', '123456', 'U.S. Bancorp Center 800 Nicollet', 'Mall Minneapolis, MN 55402 - 7014', '12', '6514663000', 12, 20, 19, 55402, 'investorrelations@usbank.com'),
(162, 183, 12, 'David Pearce', 'Us Bank Crop', '12945643243', '12545812', '345678', 'U.S. Bancorp Center 800 Nicollet', 'Mall Minneapolis, MN 55402 - 7014', '12', '6514663000', 12, 22, 21, 55402, 'investorrelations@usbank.com'),
(163, 184, 12, 'saima', 'A bank', '898309030', '79890908877', '7879890909', '12, R B Avenue', 'Sunset Apartment', '11', '8013366870', 12, 25, 24, 87866, 'bank@gmail.com'),
(164, 185, 12, 'Robert Smith', 'PNC Financial Services Group Inc', '123456789', '1234567', '123456', '300 5TH Ave Pittsburgh ​', 'PA, 15222-2401 United States', '12', '8887622651', 12, 13, 6, 77002, 'investor.relations@pnc.com'),
(165, 186, 12, 'Riya', 'Soudi Bank', 'SD75359839', 'CA787492482', 'CA01647438', '48E Middle field Road', 'Sunset Apartment', '11', '7386383889', 12, 12, 5, 8000125, 'rs@gmail.com'),
(166, 187, 11, 'souravpaul', 'Bank Name', '0123456789', '012345', '012345', 'Mangalore', 'assassas', '3', '8892347350', 11, 4, 4, 575001, 'user3@gmail.com'),
(167, 188, 11, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '4', '9999999999', 11, 4, 4, 111111, 'asd@sd.com'),
(168, 189, 12, 'souravpaul', 'Bank Name', '0123456789', '012345', '012345', 'kolkata', 'Address Line2', '12', '8892347351', 12, 5, 3, 575001, 'user33a2@gmail.com'),
(169, 190, 12, 'Rehna', 'Soudi Bannk', 'SD75359839', '8375387', 'CA01647438', '48E Middle field Road', 'Sunset Apartment', '11', '7879809090', 12, 13, 6, 89809, 'rs@gmail'),
(170, 191, 12, 'Reshmi', 'Soudi Bank', 'SD75359839', 'IDF34798', '5768798090', '48E Middle field Road', '', '11', '8980990786', 0, 0, 0, 0, ''),
(171, 192, 4, 'souravpaul', 'PNC Financial Services Group Inc12345', '0123456789', '012345', '012345', 'kolkata', 'Address Line2', '12', '8892347351', 12, 5, 8, 575001, 'user33a2@gmail.com'),
(172, 193, 12, 'rehna', 'soudi bank', 'SD704548', '87854', 'CA01275', 'Mangalore', 'assassas', '4', '7278830865', 12, 5, 8, 700125, 'user332@gmail.com'),
(173, 194, 3, 'souravpaul', 'Bank Name', '0123456789', '012345', '012345', 'Jogibattala, Baruipur', '', '8', '7890564658', 0, 0, 0, 0, ''),
(174, 195, 3, 'souravpaul', 'Bank Name', '0123456789', '012345', '012345', 'Jogibattala, Baruipur', '', '8', '7890564658', 0, 0, 0, 0, ''),
(175, 196, 12, 'Johnathon Franklin', 'Us Bank Crop', '1234567891', '123456789', '123456789', 'U.S. Bancorp Center 800 Nicollet Mall', ' Minneapolis, MN 55402 - 7014', '12', '6514663000', 12, 22, 21, 55402, 'investorrelations@usbank.com'),
(178, 199, 5, 'wsad', 'sdf', 'sdf', 'dsg', 'sdgfg', 'sdfdg', '', '4', '3442346567', 0, 0, 0, 0, ''),
(179, 200, 5, 'wsad', 'sdf', 'sdf', 'dsg', 'sdgfg', 'sdfdg', '', '4', '3442346567', 0, 0, 0, 0, ''),
(180, 201, 12, 'Rio', 'Soudi Bannk', '24242424242', 'CA787492482', 'CA01647438', '48E Middle field Road', '', '11', '8013366789', 0, 0, 0, 0, ''),
(181, 202, 12, 'Fransis Mackdormand', 'U.S. Bancorp', '12345678912', '12345678912', '12345678912', 'U.S. Bancorp Center 800', 'Nicollet Mall Minneapolis, MN 55402 - 7014', '12', '6514663000', 12, 22, 21, 55402, 'investorrelations@usbank.com'),
(182, 203, 12, 'Aleison Janni', 'Bank of America', '123456678912', '6712345678', '23412345', '8551 US Highway 29,', 'Charlotte NC 28262 US', '12', '7043868912', 12, 5, 9, 28262, 'last@bankofamerica.com');

-- --------------------------------------------------------

--
-- Table structure for table `smart_user_prof_det`
--

CREATE TABLE `smart_user_prof_det` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `work_field` int(11) NOT NULL,
  `sub_work_field` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `thumnail_image` varchar(255) NOT NULL,
  `banner_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smart_user_prof_det`
--

INSERT INTO `smart_user_prof_det` (`id`, `userid`, `company_name`, `address1`, `address2`, `country_id`, `state_id`, `city_id`, `zipcode`, `work_field`, `sub_work_field`, `company_logo`, `thumnail_image`, `banner_profile`) VALUES
(1, 27, 'asd', '12, Bab Makkah Dist.,', 'Jeddah Bab Makkah Dist.', 11, 4, 4, '54558', 2, '', 'uploaded_files/company_logo/0e9b28190c795fa11b01e2cea802d943.jpg', 'uploaded_files/thumnail_image/94565da7588edf6182a041a73bd6bb31.jpg', 'uploaded_files/banner_profile/df7043da764f21edbfb2f3317a411cba.jpg'),
(2, 28, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', 'uploaded_files/company_logo/baa402c01a87be80752a991b53343886.jpg', '', ''),
(3, 27, 'asd', '12, Bab Makkah Dist.,', 'Jeddah Bab Makkah Dist.', 11, 4, 4, '54558', 2, '', 'uploaded_files/company_logo/27464732667a556704910d9e25d28a36.jpg', 'uploaded_files/thumnail_image/94565da7588edf6182a041a73bd6bb31.jpg', 'uploaded_files/banner_profile/df7043da764f21edbfb2f3317a411cba.jpg'),
(4, 30, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 3, '', 'uploaded_files/company_logo/b301d472313eba7fb12b0dae6404eb35.jpg', '', ''),
(5, 31, 'test', 'test', 'test', 11, 4, 4, '700091', 1, '', 'uploaded_files/company_logo/ed87377af54acf0e6804041432f6ffcf.png', '', ''),
(6, 32, 'ABC', '11, B S Road', 'Soudi arabia', 11, 4, 4, '800067', 1, '', 'uploaded_files/company_logo/dab85294e29e4b714cedc9fdcffba981.png', '', ''),
(7, 34, 'asd', '123 test', 'Soudi Arab', 11, 4, 4, '567899', 4, '', 'uploaded_files/company_logo/17fc1269e94f447f9b1212e4c8d35734.png', 'uploaded_files/thumnail_image/61038c764a4a75f389c2d08dd8b53a32.jpg', 'uploaded_files/banner_profile/0af6710dd1233ac6004347dfa3a6a94e.jpg'),
(8, 35, 'ABC', '123 test', 'test', 12, 12, 5, '90887', 5, '', 'uploaded_files/company_logo/aa385b41aafec0e8a5884ad8ca23c54c.png', 'uploaded_files/thumnail_image/23c865b45cd6311100e846923f652022.png', 'uploaded_files/banner_profile/258f332788d357afb4889eab9f382b3a.jpg'),
(9, 36, 'benasmart', '123 test', '123 test', 10, 3, 3, '8000125', 4, '', 'uploaded_files/company_logo/a4a8102e45df1353079c111477af0e98.png', '', ''),
(10, 61, 'Benasmart', '123 Test', 'test benasmart', 11, 4, 4, '908776', 1, '', 'uploaded_files/company_logo/2a5834386306c7250b91750359672423.png', 'uploaded_files/thumnail_image/a08bcc36a37d796189b93bcc451c8329.jpg', 'uploaded_files/banner_profile/b3c5c7585c4876dfc75a349cd22a0a7a.png'),
(11, 62, 'wr', 'rw', 'rwr', 11, 4, 4, '6444464', 2, '', 'uploaded_files/company_logo/82d6e38d0bd9fa22042b31ce3e7d9bf4.png', '', ''),
(12, 64, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 1, '', 'uploaded_files/company_logo/815f1df57df097aacaadb25c149a791c.jpg', '', ''),
(13, 65, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 9, '', 'uploaded_files/company_logo/130bf7dc70e7246fb1c90b2c4902abf9.jpg', '', ''),
(14, 66, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 1, '', 'uploaded_files/company_logo/020a03c68d88855a5583e69f2a950b48.jpg', '', ''),
(15, 71, 'ABC', '12, R B Avenue', 'Soudi', 11, 4, 4, '800125', 2, '', 'uploaded_files/company_logo/41dec8d4facd3e9fec409853873ccd0f.png', 'uploaded_files/thumnail_image/e272523540da7f952d6e126a2507a3ee.png', 'uploaded_files/banner_profile/a8095ad3592095bb30ffd92683a28d8b.png'),
(16, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(17, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(18, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(19, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(20, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(21, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(22, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(23, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(24, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(25, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(26, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(27, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(28, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(29, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(30, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(31, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(32, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(33, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(34, 0, 'Benasmart', '23 Hamzard Street', 'Soudi', 11, 4, 4, '89809', 2, '', 'uploaded_files/company_logo/aa498f9156ae5f46dea40575b8741b5f.png', '', ''),
(35, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(36, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(37, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(38, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(39, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(40, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(41, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(42, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(43, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(44, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(45, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(46, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(47, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(48, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(49, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(50, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(51, 0, 'test', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616072281.jpg', '', ''),
(52, 0, 'Benasmart', '12, R B Avenue', 'Soudi', 11, 4, 4, '9000125', 2, '', 'uploaded_files/company_logo/company_logo_1616137796.png', '', ''),
(53, 0, 'Benasmart', '12, R B Avenue', 'Soudi', 11, 4, 4, '9000125', 2, '', 'uploaded_files/company_logo/company_logo_1616137796.png', '', ''),
(54, 0, 'Benasmart', '12, R B Avenue', 'Soudi', 11, 4, 4, '9000125', 2, '', 'uploaded_files/company_logo/company_logo_1616137796.png', '', ''),
(55, 0, 'Benasmart', '12, R B Avenue', 'Soudi', 11, 4, 4, '9000125', 2, '', 'uploaded_files/company_logo/company_logo_1616137796.png', '', ''),
(56, 0, 'Benasmart', '12, R B Avenue', 'Soudi', 11, 4, 4, '9000125', 2, '', 'uploaded_files/company_logo/company_logo_1616137796.png', '', ''),
(57, 0, 'Benasmart', '12, R B Avenue', 'Soudi', 11, 4, 4, '9000125', 2, '', 'uploaded_files/company_logo/company_logo_1616137796.png', '', ''),
(58, 0, 'test provider', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616158313.jpg', '', ''),
(59, 0, 'test provider', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616158313.jpg', '', ''),
(60, 75, 'test provider', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616158313.jpg', '', ''),
(61, 76, 'test provider', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616158313.jpg', '', ''),
(62, 77, 'test provider', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616158313.jpg', '', ''),
(63, 78, 'test provider', 'test', 'test', 11, 4, 4, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616158313.jpg', '', ''),
(64, 79, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616161565.jpg', '', ''),
(65, 80, 'test', 'test', 'test', 11, 4, 4, '700091', 10, '', 'uploaded_files/company_logo/company_logo_1616161787.jpg', 'uploaded_files/thumnail_image/7e2c2a815c480784ab1faaa6b806daee.jpg', 'uploaded_files/banner_profile/77cbe1e394ec90ff89c804cb55c7d5c9.jpg'),
(66, 81, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616397864.jpg', '', ''),
(67, 82, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616397864.jpg', '', ''),
(68, 83, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616397864.jpg', '', ''),
(69, 84, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616397864.jpg', '', ''),
(70, 85, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616397864.jpg', '', ''),
(71, 86, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616397864.jpg', '', ''),
(72, 87, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616397864.jpg', '', ''),
(73, 88, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616397864.jpg', '', ''),
(74, 89, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616397864.jpg', '', ''),
(75, 90, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616397864.jpg', '', ''),
(76, 91, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', 'uploaded_files/company_logo/company_logo_1616410427.jpg', '', ''),
(77, 92, 'Benasmart', '12 RB Soudi', 'Arab', 11, 4, 4, '89076', 5, '', 'uploaded_files/company_logo/company_logo_1616416289.png', '', ''),
(78, 93, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 14, '', 'uploaded_files/company_logo/company_logo_1616492365.jpg', 'uploaded_files/thumnail_image/39760dc7c478b2e5bc5d6e3d9e2317cd.jpg', 'uploaded_files/banner_profile/66ebfa7b7011e9e2f5bac2cf764854ae.jpg'),
(79, 95, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 9, '', 'uploaded_files/company_logo/company_logo_1616582201.jpg', '', ''),
(80, 96, 'Santhoff Plumbing Company Inc', '734 Liberty Ave Union', 'NJ 07083', 12, 13, 6, '77002', 5, '25', 'uploaded_files/company_logo/759b01b048844a296f5961635979910c.jpg', 'uploaded_files/company_logo/a2ac45037d8184d3ea5791c3ac155bf0.jpg', 'uploaded_files/banner_profile/7b6fd0481f8ade4d458f242dc73eaa0a.jpg'),
(81, 97, 'Bensmart', 'Soudi Arab', 'Soudi arabia 34', 11, 4, 4, '898097', 8, '', 'uploaded_files/company_logo/company_logo_1616668855.png', '', ''),
(82, 98, 'Housejoy', '650,17th Main,6th Block', 'Koramangla', 9, 14, 7, '560024', 9, '29', 'uploaded_files/company_logo/24c59adef92bf5f292064905c06e576b.jpg', 'uploaded_files/thumnail_image/9fe190ad28761a52b5a5c11eee4ac145.jpg', 'uploaded_files/banner_profile/d758fed7a9e8ed811c7bbe64d53a368e.jpg'),
(83, 99, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 15, '', 'uploaded_files/company_logo/company_logo_1616737257.jpg', 'uploaded_files/thumnail_image/a87e1ae550393b9538018e35893e5d90.jpg', 'uploaded_files/banner_profile/7a384c7f4c2c9c58399b65578304b8df.jpg'),
(84, 100, 'ABC', '12, Post man street', 'ABC', 11, 4, 4, '8000125', 14, '', 'uploaded_files/company_logo/40425c4c16967e8bec15fe893a77da50.png', '', ''),
(85, 101, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 5, '', 'uploaded_files/company_logo/company_logo_1616949245.jpg', '', ''),
(86, 102, 'asd', 'test111', 'test1', 12, 12, 5, '700091', 2, '22', 'uploaded_files/company_logo/company_logo_1616952078.jpg', 'uploaded_files/thumnail_image/a1fed29910c43217fb38a703297e7c24.jpg', 'uploaded_files/banner_profile/36d9d059dd32416e31809662c7208a72.png'),
(87, 103, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '19', 'uploaded_files/company_logo/company_logo_1616999621.jpg', '', ''),
(88, 104, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 8, '', 'uploaded_files/company_logo/company_logo_1617000165.jpg', '', ''),
(89, 105, 'Benasmart Co.', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '94043', 5, '25', 'uploaded_files/company_logo/company_logo_1617000127.png', '', ''),
(90, 106, 'Benasmart Co.', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '94043', 5, '25', 'uploaded_files/company_logo/company_logo_1617000127.png', '', ''),
(91, 107, 'Benasmart Co.', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '94043', 5, '25', 'uploaded_files/company_logo/company_logo_1617000127.png', '', ''),
(92, 108, 'Benasmart Co.', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '94043', 5, '25', 'uploaded_files/company_logo/company_logo_1617000127.png', '', ''),
(93, 109, 'Benasmart Co.', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '94043', 5, '25', 'uploaded_files/company_logo/company_logo_1617000127.png', '', ''),
(94, 110, 'Benasmart Co.', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '94043', 5, '25', 'uploaded_files/company_logo/company_logo_1617000127.png', '', ''),
(95, 111, 'Benasmart Co.', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '94043', 5, '25', 'uploaded_files/company_logo/company_logo_1617000127.png', '', ''),
(96, 112, 'Benasmart Co.', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '94043', 8, '', 'uploaded_files/company_logo/company_logo_1617001369.png', 'uploaded_files/thumnail_image/0a94adbe478556cc4e1ed472a3059465.png', 'uploaded_files/banner_profile/86fb152399124add966a4ca19f893e28.jpg'),
(97, 113, 'Benasmart Co..', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '94043', 9, '', 'uploaded_files/company_logo/company_logo_1617005817.png', 'uploaded_files/thumnail_image/b2373d644aba1cb6e34fae2c1ff2c03a.png', 'uploaded_files/banner_profile/6169912de3a2c43063468586b2fef39e.jpg'),
(98, 114, 'Benasmart Co Pvt ltd', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '098977', 5, '', '', 'uploaded_files/company_logo/company_logo_1617024951.png', ''),
(99, 115, 'Benasmart Co Pvt ltd', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '098977', 5, '', '', 'uploaded_files/company_logo/company_logo_1617024951.png', ''),
(100, 116, 'Benasmart Co Pvt ltd', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '098977', 5, '', '', 'uploaded_files/company_logo/company_logo_1617024951.png', ''),
(101, 117, 'Benasmart Co Pvt ltd', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '098977', 5, '', '', 'uploaded_files/company_logo/company_logo_1617024951.png', ''),
(102, 118, 'Benasmart Co Pvt ltd', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '098977', 5, '', '', 'uploaded_files/company_logo/company_logo_1617024951.png', ''),
(103, 119, 'Benasmart Co Pvt ltd', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '098977', 5, '', '', 'uploaded_files/company_logo/company_logo_1617024951.png', ''),
(104, 120, 'Benasmart Co Pvt ltd', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '098977', 5, '', '', 'uploaded_files/company_logo/company_logo_1617024951.png', ''),
(105, 121, 'Benasmart Co Pvt ltd', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '098977', 5, '', '', 'uploaded_files/company_logo/company_logo_1617024951.png', ''),
(106, 122, 'Benasmart Co Pvt ltd', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '098977', 5, '', '', 'uploaded_files/company_logo/company_logo_1617024951.png', ''),
(107, 123, 'Benasmart Co Pvt ltd', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '098977', 5, '', '', 'uploaded_files/company_logo/company_logo_1617024951.png', ''),
(108, 124, 'Benasmart Co Pvt ltd', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '098977', 5, '', '', 'uploaded_files/company_logo/company_logo_1617024951.png', ''),
(109, 125, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', '', 'uploaded_files/company_logo/company_logo_1617026175.jpg', ''),
(110, 126, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', '', 'uploaded_files/company_logo/company_logo_1617026175.jpg', ''),
(111, 127, 'Benasmart Co Pvt ltd', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '098977', 5, '', '', 'uploaded_files/company_logo/company_logo_1617024951.png', ''),
(112, 128, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', '', 'uploaded_files/company_logo/company_logo_1617026175.jpg', ''),
(113, 129, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', '', 'uploaded_files/company_logo/company_logo_1617026175.jpg', ''),
(114, 130, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', '', 'uploaded_files/company_logo/company_logo_1617026175.jpg', ''),
(115, 131, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', '', 'uploaded_files/company_logo/company_logo_1617026175.jpg', ''),
(116, 132, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', '', 'uploaded_files/company_logo/company_logo_1617026175.jpg', ''),
(117, 133, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', '', 'uploaded_files/company_logo/company_logo_1617026175.jpg', ''),
(118, 134, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', '', 'uploaded_files/company_logo/company_logo_1617026175.jpg', ''),
(119, 135, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', '', 'uploaded_files/company_logo/company_logo_1617026175.jpg', ''),
(120, 136, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', '', 'uploaded_files/company_logo/company_logo_1617026175.jpg', ''),
(121, 137, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', '', 'uploaded_files/company_logo/company_logo_1617026175.jpg', ''),
(122, 138, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', '', 'uploaded_files/company_logo/company_logo_1617026175.jpg', ''),
(123, 139, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '', '', 'uploaded_files/company_logo/company_logo_1617026175.jpg', ''),
(124, 140, 'sdf', 'sdf', 'sdf', 7, 2, 2, '321321', 15, '', '', 'uploaded_files/company_logo/company_logo_1617027130.png', ''),
(125, 141, 'sdf', 'sdf', 'sdf', 7, 2, 2, '321321', 15, '', '', 'uploaded_files/company_logo/company_logo_1617027130.png', ''),
(126, 142, 'sdf', 'sdf', 'sdf', 7, 2, 2, '321321', 15, '', '', 'uploaded_files/company_logo/company_logo_1617027130.png', ''),
(127, 143, 'fg', 'fdg', 'dfg', 7, 2, 2, '23131ewrf', 5, '', '', 'uploaded_files/company_logo/company_logo_1617027329.jpg', ''),
(128, 144, 'fg', 'fdg', 'dfg', 7, 2, 2, '23131ewrf', 5, '', '', 'uploaded_files/company_logo/company_logo_1617027329.jpg', ''),
(129, 145, 'fg', 'fdg', 'dfg', 7, 2, 2, '23131ewrf', 5, '', '', 'uploaded_files/company_logo/company_logo_1617027329.jpg', ''),
(130, 146, 'Benasmart Co Pvt ltd', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '098977', 5, '', '', 'uploaded_files/company_logo/company_logo_1617024951.png', ''),
(131, 147, 'Benasmart Co Pvt ltd', '48E Middle field Road', 'Sunset Apartment', 12, 5, 3, '098977', 5, '', '', 'uploaded_files/company_logo/company_logo_1617024951.png', ''),
(132, 148, 'Greater Pacific Construction', '200 Dutch Meadows', 'Ln, Glenville NY 12302', 12, 5, 10, 'CA 92780', 2, '19', 'uploaded_files/company_logo/56cd810752c0deabeb243a84288fb638.png', 'uploaded_files/thumnail_image/e03a5727ee46a5c7831f710cc43213ed.jpg', 'uploaded_files/banner_profile/ba6b987756032cdec523d68165c19850.jpg'),
(133, 149, 'ARC Plumbing Services', '48E Middle field Road', 'Sunset Apartment', 12, 5, 9, '94041', 5, '25', '', 'uploaded_files/thumnail_image/5c1f4cbd1c3bd59370ce82fd27dc08b2.jpg', 'uploaded_files/banner_profile/ad54ab0c5551853f20453f353f54241a.jpg'),
(134, 150, 'Benasmart Co', '48E Middle field Road', 'Sunset Apartment', 12, 5, 9, '84043', 9, '', '', 'uploaded_files/company_logo/company_logo_1617112798.png', ''),
(135, 151, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '19', '', 'uploaded_files/company_logo/company_logo_1617128416.jpg', ''),
(136, 152, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '19', '', 'uploaded_files/company_logo/company_logo_1617167757.jpg', ''),
(137, 153, 'asd', 'asd', 'asd', 7, 2, 2, '700091', 2, '19', '', 'uploaded_files/company_logo/company_logo_1617167757.jpg', ''),
(138, 156, 'Benasmart Co Pvt ltd', '48E Middle field Road', 'California', 12, 12, 5, '890786', 14, '38', '', 'uploaded_files/company_logo/company_logo_1617200754.png', ''),
(139, 157, 'asd', 'asd', 'test1', 7, 2, 2, '700091', 2, '19', '', 'uploaded_files/company_logo/company_logo_1617216542.jpg', ''),
(140, 162, 'Cathi Plumbing Solutions', '48E Middle field Road', 'Sunset Apartment', 12, 12, 5, '89809', 5, '25', '', 'uploaded_files/company_logo/company_logo_1617287564.jpg', 'uploaded_files/banner_profile/18e91a30e79093321355084956ac9cb3.jpg'),
(141, 163, 'asd', 'asd', 'sdf', 11, 4, 4, '111111', 2, '19', '', 'uploaded_files/company_logo/1234e0e6098eaca4232f9b43c780b98b.jpg', 'uploaded_files/company_logo/29206362ef2d1ee0c28e231a0bc8e839.jpg'),
(142, 164, 'asd', 'asd', 'sdf', 11, 4, 4, '111111', 2, '19', '', 'uploaded_files/company_logo/4ebbfc5d75f853342bef12145a89db3e.jpg', 'uploaded_files/company_logo/332e554d0bbbc652c26089a90b13d14d.jpg'),
(143, 165, 'asd', 'asd', 'sdf', 11, 4, 4, '111111', 2, '19', '', 'uploaded_files/company_logo/0b33fdc6b5909da1eaa066f803e5615e.jpg', 'uploaded_files/company_logo/f26b80acd373dbb72d8a5a46d2c26f0e.jpg'),
(144, 166, 'asd', 'asd', 'asd', 11, 4, 4, '11111', 2, '19', '', 'uploaded_files/company_logo/1eac45ac2961bf32e9f55164dcd5f537.jpg', 'uploaded_files/company_logo/8fe8bab32244d1bd8a30ee531d428819.jpg'),
(145, 167, 'sourav', 'kolkata1', 'Address Line22', 9, 3, 12, '700125', 6, '26', '', 'uploaded_files/company_logo/1d6843c7e1cb0feecfe6a38a56c71bb3.png', 'uploaded_files/banner_profile/2d2edf55ce26301e7f95003783e552ba.jpg'),
(146, 169, 'DEXIGNER', '2522 Charles Street', 'Baltimore, MD 21218', 12, 19, 16, '48548', 20, '41', 'uploaded_files/company_logo/36b2f5c0b1fee169ef75e9e4d5d9756b.jpg', 'uploaded_files/thumnail_image/8517170b6aa1d92ff814ce9fc81737f5.jpg', 'uploaded_files/banner_profile/059464aa81882d10930d3e5b326ed935.jpg'),
(147, 172, 'Techmetals, Inc.', 'Phase-1 Bilk 53,Lot 9& 11', 'Harrison Rd', 14, 21, 20, '45403', 11, '32', 'uploaded_files/company_logo/e057aa699cf38276bfcffdf74e48be60.jpg', 'uploaded_files/thumnail_image/08ad5d17d2af832c191fd3041a9bfad3.jpg', 'uploaded_files/company_logo/bc236da00c2094b9bce5dd7b917028f3.jpg'),
(148, 182, 'Murray Roofing Co Inc', 'CHRIS NISWANDEE    SMALLSYS INC', '795 E', 12, 24, 23, 'AZ 85705', 10, '', '', 'uploaded_files/thumnail_image/686c9e0f31697a3494eb030c326b7bac.jpg', 'uploaded_files/banner_profile/33d0b90e4e52c60748f6f1eb50c12458.jpg'),
(149, 171, 'test', 'test address 1', 'test address 2', 9, 14, 7, '545581', 0, '', '', '', ''),
(150, 183, 'Chem-Dry', '2394', 'Prudence Street', 12, 19, 25, '84321', 21, '47', '', 'uploaded_files/company_logo/2f94095442e9f77d2b6d55bce5cb8b89.jpg', 'uploaded_files/company_logo/74cd698f049ccbcf89360a6455675a49.jpg'),
(151, 184, 'Cooper Plumbing Solutions', '23 Hamzard Street', 'Sunset Apartment', 12, 12, 5, '89809', 9, '29', '', 'uploaded_files/company_logo/6f472929d151d3d7fa4fe71d403aaa97.png', 'uploaded_files/company_logo/6591890074fc6a5769fa1841a711d2af.jpg'),
(152, 185, 'Safety & Security International Inc', '13845', 'Alton Pkwy', 12, 5, 11, '92618', 14, '38', '', 'uploaded_files/thumnail_image/586b89a42520e9a81395f20fbdf2ff4a.jpg', 'uploaded_files/banner_profile/53eca8f61fbb668b3ae7cb01034c97c8.jpg'),
(153, 187, 'sourav_iwi', 'Mangalore', 'assassas', 12, 5, 3, '575001', 2, '19', '', 'uploaded_files/company_logo/99ba1510f4bf631ee077bee5382efc32.jpg', 'uploaded_files/company_logo/46ffa14f8235de275ed6a6d5429b4ad1.jpg'),
(154, 189, 'sourav_iwi', 'Mangalore', 'assassas', 11, 4, 4, '575001', 2, '20', '', 'uploaded_files/company_logo/12f82fb851462d80e295b9286bcb4e90.png', 'uploaded_files/company_logo/668c5272ad1d6a464d6e4beed4fe8389.jpg'),
(155, 192, 'sourav_iwi', 'Mangalore', 'assassas', 12, 5, 8, '575001', 5, '25', '', 'uploaded_files/company_logo/1bf0532b592dadd99276d54a93823a0f.png', 'uploaded_files/company_logo/349a119cfccb5268b072abea14a824dd.jpg'),
(156, 193, 'bena smart service', 'kolkata', 'Address Line2', 12, 5, 10, '100000', 8, '', '', 'uploaded_files/company_logo/15a84fab8e7853e49e4e67faa170a3e7.png', 'uploaded_files/company_logo/ae288b3a5b660c8ff25b6d00bdd140fe.jpg'),
(157, 194, 'bena smart service', 'Mangalore', 'assassas', 11, 4, 4, '575001', 8, '', '', 'uploaded_files/company_logo/company_logo_1617808488.png', ''),
(158, 195, 'bena smart service', 'Mangalore', 'assassas', 11, 4, 4, '575001', 8, '', '', 'uploaded_files/company_logo/company_logo_1617808488.png', ''),
(159, 196, 'Pumpkin Space Systems', '300 5TH Ave', 'PA, 15222-2401', 12, 13, 6, '15222', 6, '28', '', 'uploaded_files/thumnail_image/d290b9406481ab108ada18910212243f.jpg', 'uploaded_files/banner_profile/4dafd4f8f4e2e49edecf38e89bbb4aa3.jpg'),
(162, 199, 'sd', 'sdf', 'sdf', 9, 14, 7, '65', 6, '27', '', 'uploaded_files/company_logo/company_logo_1617862490.png', ''),
(163, 200, 'sd', 'sdf', 'sdf', 9, 14, 7, '65', 6, '27', '', 'uploaded_files/company_logo/company_logo_1617862490.png', ''),
(164, 201, 'BC Kitchen Cleaners', '48E Middle field Road', 'Sunset Apartment', 12, 12, 5, '89809', 8, '', '', 'uploaded_files/company_logo/company_logo_1617865856.png', ''),
(165, 202, 'LeewayHertz', '410 E Santa Clara Street', 'Unit #561 San Jose', 12, 5, 29, 'CA 95113', 15, '', '', 'uploaded_files/thumnail_image/614d625616f6f2279ceef9a31be07a82.jpg', 'uploaded_files/banner_profile/e979fe37403680c3a6947f56a2f05310.jpg'),
(166, 203, 'Fresco solar', '740 Alamo', 'Dr, Morgan Hill', 12, 12, 30, 'CA 95037', 13, '', '', 'uploaded_files/company_logo/company_logo_1617885705.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `smart_user_role_master`
--

CREATE TABLE `smart_user_role_master` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_user_role_master`
--

INSERT INTO `smart_user_role_master` (`id`, `name`) VALUES
(1, 'ADMIN'),
(2, 'CUSTOMER'),
(3, 'PROFESSIONAL'),
(4, 'SUPPLIER');

-- --------------------------------------------------------

--
-- Table structure for table `smart_user_sub_role`
--

CREATE TABLE `smart_user_sub_role` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=active',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smart_user_sub_role`
--

INSERT INTO `smart_user_sub_role` (`id`, `slug`, `usertype_id`, `name`, `status`, `created_by`, `created_date`, `updated_date`, `updated_by`) VALUES
(1, 'construction-1', 4, 'Construction', 0, 1, '2021-03-05 12:11:59', '2021-03-30 12:38:01', 1),
(2, 'construction', 3, 'Construction', 0, 1, '2021-03-05 12:12:28', '2021-03-31 13:08:07', 1),
(3, 'plumbing-1', 4, 'Plumbing', 0, 1, '2021-03-08 17:42:20', '2021-03-30 12:38:06', 1),
(4, 'electrical-1', 4, 'Electrical', 0, 1, '2021-03-09 05:24:11', '2021-03-30 12:38:13', 1),
(5, 'plumbing', 3, 'Plumbing', 0, 1, '2021-03-19 05:16:07', '2021-03-30 12:36:44', 1),
(6, 'communication', 3, 'Communication', 0, 1, '2021-03-19 08:34:49', '2021-04-01 09:53:21', 1),
(7, 'bathroom', 4, 'Bathroom', 0, 1, '2021-03-22 04:46:25', '2021-03-30 12:38:24', 1),
(8, 'kitchen', 3, 'Kitchen', 0, 1, '2021-03-22 04:47:29', '2021-03-30 12:36:59', 1),
(9, 'electrical', 3, 'Electrical', 0, 1, '2021-03-22 04:48:11', '2021-03-30 12:37:07', 1),
(10, 'roofing', 3, 'Roofing', 0, 1, '2021-03-22 04:51:59', '2021-03-30 12:37:15', 1),
(11, 'finishing', 3, 'Finishing', 0, 1, '2021-03-22 04:53:15', '2021-03-30 12:37:23', 1),
(12, 'kitchen-1', 4, 'Kitchen', 0, 1, '2021-03-22 05:01:10', '2021-03-30 12:38:32', 1),
(13, 'solar', 3, 'Solar', 0, 1, '2021-03-22 05:14:48', '2021-03-30 12:37:31', 1),
(14, 'safety-security', 3, 'Safety & Security', 0, 1, '2021-03-22 05:16:27', '2021-03-30 12:37:39', 1),
(15, 'smart-homes', 3, 'Smart Homes', 0, 1, '2021-03-22 05:17:15', '2021-03-30 12:37:48', 1),
(17, 'flooring', 4, 'Flooring', 0, 1, '2021-03-23 08:48:02', '2021-03-30 12:38:40', 1),
(20, 'engineering-design', 3, 'Engineering & Design', 0, 1, '2021-03-29 06:25:07', '2021-03-30 09:41:02', 1),
(21, 'general', 3, 'General', 0, 1, '2021-03-29 06:26:49', '2021-03-30 09:41:06', 1),
(22, 'finishing-1', 4, 'Finishing', 0, 1, '2021-03-30 06:26:36', '2021-03-30 12:38:51', 1),
(23, 'solar-1', 4, 'Solar', 0, 1, '2021-03-30 06:30:42', '2021-03-30 12:38:59', 1),
(24, 'safety-security-1', 4, 'Safety & Security', 0, 1, '2021-03-30 06:31:20', '2021-03-30 12:39:08', 1),
(25, 'smart-homes-1', 4, 'Smart Homes', 0, 1, '2021-03-30 06:33:01', '2021-03-30 12:39:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smart_wishlist`
--

CREATE TABLE `smart_wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `professional_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_wishlist`
--

INSERT INTO `smart_wishlist` (`id`, `customer_id`, `professional_id`, `created_date`) VALUES
(1, 171, 96, '2021-04-06 13:30:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smart_about_map`
--
ALTER TABLE `smart_about_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_add_on_work`
--
ALTER TABLE `smart_add_on_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_admin_details`
--
ALTER TABLE `smart_admin_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_all_professionals_cms`
--
ALTER TABLE `smart_all_professionals_cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_attribute`
--
ALTER TABLE `smart_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_attribute_child`
--
ALTER TABLE `smart_attribute_child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_brand_master`
--
ALTER TABLE `smart_brand_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_city_list`
--
ALTER TABLE `smart_city_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_cms_home_banner`
--
ALTER TABLE `smart_cms_home_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_cms_home_why_benasmart`
--
ALTER TABLE `smart_cms_home_why_benasmart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_country_list`
--
ALTER TABLE `smart_country_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_daily_deals`
--
ALTER TABLE `smart_daily_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_expired_check`
--
ALTER TABLE `smart_expired_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_hire_professional_order`
--
ALTER TABLE `smart_hire_professional_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_hire_professional_order_addon_map`
--
ALTER TABLE `smart_hire_professional_order_addon_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_hire_professional_order_serivices_map`
--
ALTER TABLE `smart_hire_professional_order_serivices_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_hire_professional_order_serivice_types_map`
--
ALTER TABLE `smart_hire_professional_order_serivice_types_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_home_logo`
--
ALTER TABLE `smart_home_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_notification_log`
--
ALTER TABLE `smart_notification_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_order_ticket_log`
--
ALTER TABLE `smart_order_ticket_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_otp_log`
--
ALTER TABLE `smart_otp_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_product_category_map`
--
ALTER TABLE `smart_product_category_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_product_detail`
--
ALTER TABLE `smart_product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_product_image`
--
ALTER TABLE `smart_product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_product_sub_cat_map`
--
ALTER TABLE `smart_product_sub_cat_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_professional_about_us`
--
ALTER TABLE `smart_professional_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_professional_company_det`
--
ALTER TABLE `smart_professional_company_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_professional_review`
--
ALTER TABLE `smart_professional_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_professional_review_reply`
--
ALTER TABLE `smart_professional_review_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_project_details`
--
ALTER TABLE `smart_project_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_project_details2`
--
ALTER TABLE `smart_project_details2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_project_detail_image`
--
ALTER TABLE `smart_project_detail_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_project_detail_image2`
--
ALTER TABLE `smart_project_detail_image2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_project_image`
--
ALTER TABLE `smart_project_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_services_detail`
--
ALTER TABLE `smart_services_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_skills`
--
ALTER TABLE `smart_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_state_list`
--
ALTER TABLE `smart_state_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_sub_category`
--
ALTER TABLE `smart_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_temp_about_map`
--
ALTER TABLE `smart_temp_about_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_temp_product_category_map`
--
ALTER TABLE `smart_temp_product_category_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_temp_product_detail`
--
ALTER TABLE `smart_temp_product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_temp_product_image`
--
ALTER TABLE `smart_temp_product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_temp_product_sub_cat_map`
--
ALTER TABLE `smart_temp_product_sub_cat_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_users_skill`
--
ALTER TABLE `smart_users_skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_user_detail`
--
ALTER TABLE `smart_user_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_user_login_record`
--
ALTER TABLE `smart_user_login_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_user_prof_bank_det`
--
ALTER TABLE `smart_user_prof_bank_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_user_prof_det`
--
ALTER TABLE `smart_user_prof_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_user_role_master`
--
ALTER TABLE `smart_user_role_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_user_sub_role`
--
ALTER TABLE `smart_user_sub_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_wishlist`
--
ALTER TABLE `smart_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smart_about_map`
--
ALTER TABLE `smart_about_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `smart_add_on_work`
--
ALTER TABLE `smart_add_on_work`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `smart_admin_details`
--
ALTER TABLE `smart_admin_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smart_all_professionals_cms`
--
ALTER TABLE `smart_all_professionals_cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `smart_attribute`
--
ALTER TABLE `smart_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `smart_attribute_child`
--
ALTER TABLE `smart_attribute_child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `smart_brand_master`
--
ALTER TABLE `smart_brand_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `smart_city_list`
--
ALTER TABLE `smart_city_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `smart_cms_home_banner`
--
ALTER TABLE `smart_cms_home_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smart_cms_home_why_benasmart`
--
ALTER TABLE `smart_cms_home_why_benasmart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `smart_country_list`
--
ALTER TABLE `smart_country_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `smart_daily_deals`
--
ALTER TABLE `smart_daily_deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `smart_expired_check`
--
ALTER TABLE `smart_expired_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smart_hire_professional_order`
--
ALTER TABLE `smart_hire_professional_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `smart_hire_professional_order_addon_map`
--
ALTER TABLE `smart_hire_professional_order_addon_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `smart_hire_professional_order_serivices_map`
--
ALTER TABLE `smart_hire_professional_order_serivices_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `smart_hire_professional_order_serivice_types_map`
--
ALTER TABLE `smart_hire_professional_order_serivice_types_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `smart_home_logo`
--
ALTER TABLE `smart_home_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `smart_notification_log`
--
ALTER TABLE `smart_notification_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `smart_order_ticket_log`
--
ALTER TABLE `smart_order_ticket_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `smart_otp_log`
--
ALTER TABLE `smart_otp_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `smart_product_category_map`
--
ALTER TABLE `smart_product_category_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smart_product_detail`
--
ALTER TABLE `smart_product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `smart_product_image`
--
ALTER TABLE `smart_product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smart_product_sub_cat_map`
--
ALTER TABLE `smart_product_sub_cat_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smart_professional_about_us`
--
ALTER TABLE `smart_professional_about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `smart_professional_company_det`
--
ALTER TABLE `smart_professional_company_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `smart_professional_review`
--
ALTER TABLE `smart_professional_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smart_professional_review_reply`
--
ALTER TABLE `smart_professional_review_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smart_project_details`
--
ALTER TABLE `smart_project_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `smart_project_details2`
--
ALTER TABLE `smart_project_details2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `smart_project_detail_image`
--
ALTER TABLE `smart_project_detail_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `smart_project_detail_image2`
--
ALTER TABLE `smart_project_detail_image2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `smart_project_image`
--
ALTER TABLE `smart_project_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `smart_services_detail`
--
ALTER TABLE `smart_services_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smart_skills`
--
ALTER TABLE `smart_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `smart_state_list`
--
ALTER TABLE `smart_state_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `smart_sub_category`
--
ALTER TABLE `smart_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `smart_temp_about_map`
--
ALTER TABLE `smart_temp_about_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `smart_temp_product_category_map`
--
ALTER TABLE `smart_temp_product_category_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smart_temp_product_detail`
--
ALTER TABLE `smart_temp_product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smart_temp_product_image`
--
ALTER TABLE `smart_temp_product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smart_temp_product_sub_cat_map`
--
ALTER TABLE `smart_temp_product_sub_cat_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smart_users_skill`
--
ALTER TABLE `smart_users_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1214;

--
-- AUTO_INCREMENT for table `smart_user_detail`
--
ALTER TABLE `smart_user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `smart_user_login_record`
--
ALTER TABLE `smart_user_login_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `smart_user_prof_bank_det`
--
ALTER TABLE `smart_user_prof_bank_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `smart_user_prof_det`
--
ALTER TABLE `smart_user_prof_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `smart_user_role_master`
--
ALTER TABLE `smart_user_role_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `smart_user_sub_role`
--
ALTER TABLE `smart_user_sub_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `smart_wishlist`
--
ALTER TABLE `smart_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
