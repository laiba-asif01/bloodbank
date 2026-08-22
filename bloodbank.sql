-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2026 at 10:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_credentials`
--

CREATE TABLE `admin_credentials` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_credentials`
--

INSERT INTO `admin_credentials` (`id`, `email`, `username`, `password`, `created_at`, `updated_at`, `logo`) VALUES
(1, 'admin@gmail.com', 'Admin', '$2y$10$F.cdnH2sd59YA9j9EE5yk.4f8Zppz4MwgCYpvFY8pvtqsqz21yKju', '2025-09-02 06:21:42', '2025-12-17 02:58:38', '1765940318_3684edb26b90c005ffcb.png');

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

CREATE TABLE `app_users` (
  `id` int(11) NOT NULL,
  `reg_no` varchar(20) DEFAULT NULL,
  `full_name` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `latitude` decimal(10,6) DEFAULT 0.000000,
  `longitude` decimal(10,6) DEFAULT 0.000000,
  `dob` date DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`id`, `reg_no`, `full_name`, `mobile`, `password`, `country_id`, `state_id`, `city_id`, `address`, `latitude`, `longitude`, `dob`, `blood_group`, `status`, `created_at`, `updated_at`, `reset_token`, `reset_expiry`) VALUES
(1, 'user_01', 'Fahad', '03009873564', 'fahad123', 5, 4, 6, 'fsd', 29.728663, 66.818245, '1996-11-30', 'B-', 'Active', '2025-11-30 16:24:14', '2025-12-03 16:27:07', NULL, NULL),
(4, 'user_02', 'Saqib', '03009873564', '123456789', 5, 4, 6, 'fsd', 29.461179, 64.789435, '1986-07-01', 'B-', 'Active', '2025-12-01 17:35:27', '2025-12-01 17:45:34', NULL, NULL),
(5, 'user_03', 'Saqib', '03009873564', 'saqib123', 5, 4, 6, 'fsd', 29.461179, 64.789435, '1986-07-01', 'B-', 'Active', '2025-12-01 17:41:28', '2025-12-01 17:41:28', NULL, NULL),
(6, 'user_04', 'Talha', '03009873564', 'talha123', 5, 4, 6, 'fsd', 24.857585, 66.951318, '1998-06-19', 'B+', 'Active', '2025-12-19 16:59:28', '2025-12-19 16:59:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `latitude` decimal(10,6) DEFAULT 0.000000,
  `longitude` decimal(10,6) DEFAULT 0.000000,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `contact`, `country_id`, `state_id`, `city_id`, `address`, `latitude`, `longitude`, `status`, `created_at`, `updated_at`) VALUES
(1, 'hfhh', '345678923456', 5, 3, 5, 'quetta', 24.845435, 66.937929, 'Inactive', '2025-08-28 20:21:41', '2025-08-29 07:52:22'),
(2, 'karachi', '345678923456', 5, 3, 5, 'karachi house#1009', 24.819574, 66.859651, 'Active', '2025-09-02 08:52:40', '2025-09-11 11:29:24'),
(3, 'abc', '3456789', 5, 3, 5, 'fsd', 24.850420, 66.976381, 'Active', '2025-09-02 10:43:27', '2025-09-03 07:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_content` text NOT NULL,
  `blog_image` varchar(255) DEFAULT NULL,
  `posted_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_title`, `blog_content`, `blog_image`, `posted_at`) VALUES
(7, 'xyz', '<p>bsjs</p>\r\n', '1761216923_44f85be8a2f472882d51.png', '2025-10-23 10:55:23'),
(8, 'Benefits of blood donation', '<p>nothing</p>\r\n', '1787378395_32fce15dd37f107d6c9f.jpg', '2026-08-22 05:59:55'),
(9, 'Blood donation in islam ', '', '1787378414_ce65b717e23cb45b7fc2.jpg', '2026-08-22 06:00:14'),
(10, 'Blood donation in islam ', '', '1787378578_f8005cbe18d78fc5d9d8.png', '2026-08-22 06:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donors`
--

CREATE TABLE `blood_donors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(150) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `habits` text DEFAULT NULL,
  `last_donation_date` date DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `donor_type` enum('Paid','Free') DEFAULT 'Free',
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `points` int(11) DEFAULT 0,
  `donation_score` int(11) DEFAULT 0,
  `views` int(11) DEFAULT 0,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_donors`
--

INSERT INTO `blood_donors` (`id`, `user_id`, `full_name`, `mobile`, `country_id`, `state_id`, `city_id`, `address`, `latitude`, `longitude`, `habits`, `last_donation_date`, `dob`, `blood_group`, `donor_type`, `gender`, `points`, `donation_score`, `views`, `status`, `created_at`) VALUES
(1, NULL, 'Fahad', '300987356', 5, 4, 6, 'fsd', 24.78342192, 66.22107070, 'book reading', '2025-05-19', '1997-06-19', 'A+', 'Free', 'Male', 300, 45, 0, 'Active', '2025-12-19 17:07:53'),
(2, 1, 'Noor', '305987356', 5, 4, 6, 'fsd', 0.00000000, 0.00000000, 'Gardening', '2025-07-13', '2006-10-17', 'B+', 'Free', 'Female', 300, 45, 0, 'Active', '2026-02-13 13:28:37'),
(3, NULL, 'Saim', '300987356', 5, 4, 6, 'fsd', 0.00000000, 0.00000000, 'Book Reading', '2025-11-22', '2000-06-22', 'B+', 'Free', 'Male', 350, 50, 0, 'Active', '2026-08-22 06:06:35'),
(4, NULL, 'Danish ', '300956356', 5, 3, 5, 'Quetta', 0.00000000, 0.00000000, 'Reading ', '2026-02-18', '1998-01-22', 'AB+', 'Free', 'Male', 300, 50, 0, 'Active', '2026-08-22 06:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `blood_requests`
--

CREATE TABLE `blood_requests` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `hospital` text DEFAULT NULL,
  `latitude` decimal(10,6) DEFAULT 0.000000,
  `longitude` decimal(10,6) DEFAULT 0.000000,
  `bags` int(11) DEFAULT 1,
  `blood_group` varchar(5) NOT NULL,
  `message` text DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_requests`
--

INSERT INTO `blood_requests` (`id`, `full_name`, `mobile`, `country_id`, `state_id`, `city_id`, `hospital`, `latitude`, `longitude`, `bags`, `blood_group`, `message`, `status`, `created_at`, `updated_at`) VALUES
(4, 'bxmkxhk', '423423', 5, 4, 6, 'fsd', 24.846058, 66.963678, 1, 'B-', 'nothing', 'Active', '2025-09-02 04:05:20', '2025-09-02 04:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`) VALUES
(3, 2, 'karachi'),
(5, 3, 'Quetta'),
(6, 4, 'Faisalabad');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `short_code` varchar(10) NOT NULL,
  `phone_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `short_code`, `phone_code`) VALUES
(3, 'Dubai', 'db', '+9777'),
(5, 'Pakistan', 'pk', '+92');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'table', 'ryh', '2025-08-07 10:02:33', '2025-08-07 10:02:33'),
(4, 'ink', 'abc', '2025-08-08 02:14:31', '2025-08-08 02:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `notification_title` varchar(255) NOT NULL,
  `external_link` varchar(255) DEFAULT NULL,
  `notification_msg` text NOT NULL,
  `big_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification_title`, `external_link`, `notification_msg`, `big_picture`, `created_at`) VALUES
(17, ' sbss ', ' snsbn', 's vnm', '1756859950_cea6a3a6fa606801c0a1.webp', '2025-09-02 19:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'jam', 'vbnm', 2000.00, '2025-08-07 00:40:19', '2025-08-07 00:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `app_name` varchar(255) DEFAULT NULL,
  `app_logo` varchar(255) DEFAULT NULL,
  `app_description` text DEFAULT NULL,
  `app_version` varchar(50) DEFAULT NULL,
  `app_author` varchar(100) DEFAULT NULL,
  `app_contact` varchar(100) DEFAULT NULL,
  `app_email` varchar(100) DEFAULT NULL,
  `app_website` varchar(255) DEFAULT NULL,
  `app_developed_by` varchar(100) DEFAULT NULL,
  `publisher_id` varchar(255) DEFAULT NULL,
  `app_id_android` varchar(255) DEFAULT NULL,
  `banner_ad` varchar(10) DEFAULT NULL,
  `banner_ad_id` varchar(255) DEFAULT NULL,
  `interstital_ad` varchar(10) DEFAULT NULL,
  `interstital_ad_id` varchar(255) DEFAULT NULL,
  `interstital_ad_click` int(11) DEFAULT NULL,
  `onesignal_app_id` varchar(255) DEFAULT NULL,
  `onesignal_rest_key` varchar(255) DEFAULT NULL,
  `google_maps_api_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `app_name`, `app_logo`, `app_description`, `app_version`, `app_author`, `app_contact`, `app_email`, `app_website`, `app_developed_by`, `publisher_id`, `app_id_android`, `banner_ad`, `banner_ad_id`, `interstital_ad`, `interstital_ad_id`, `interstital_ad_click`, `onesignal_app_id`, `onesignal_rest_key`, `google_maps_api_key`) VALUES
(2, 'Blood Bank App', 'uploads/1765940336_47132b655fd08b38380b.png', '<p>Praesent et libero non erat molestie eleifend a efficitur lorem. Nulla congue nisl nulla, id de suscipit quam lobortis sit amet. Nullam eu enim n&atilde;o mauris tincidunt lacinia eget sente-se amet augue. Etiam ullamcorper vestibulum leo, em ultrages augue consequat fermentum. Aliquam erat volutpat. Nunc vulputate convip. Donec blandit volutpat lectus id interdum. Ut ac sagittis odio, ue scelerisque odio. Ut Ultricies ex eu dictum accumsan. Etiam vel lorem commodo, aliquam ex-quis, feugiat elit. Nam ditum felis sed lacus hendrerit ullamcorper.</p>\r\n\r\n<p>Vivamus bibendum efficitur libero a pharetra. Sed vulputate eros vitae neque tempor, nec maximus augue aliquam. Vestibulum ligula metus, suscipit sente-se amet risus non, rhoncus viverra metus. Nullam viverra felis nibh, et posuere neque maximus non. Nulla consectet mi justo, ne laoreet enim auctor eget. Suspendisse potenti. Aenean laoreet nisi vel urna, conseq&uuml;at dapibus.</p>\r\n\r\n<p>Nam hendrerit odio erat, ca posuere urna luctus nec. Suspendisse euismod tincidunt nulla, sente-se amet tincidunt arcu condimentum eget. Vestibulum ante ipsum primis em orucus oruculares de faucibus e ultr&uacute;rios posuere cubilia Curae; Mauris bibendum nunc libero, em iaculis diam faucibus nec. Fusce viverra odio nec libero, commodo eleifend massa feugiat. Vivamus finibus lorem luctus erat finibus, em consequ&ecirc;ncia da mol&eacute;stia quam. Maecenas ac dolor ligula. Donec ullamcorper malesuada purus.</p>\r\n\r\n<p>Pr&eacute;mio Aenean, libero vitae congue feugiat, neque erat sagittis mi, et fermentum diam felis ac justo. Pellentesque cursus vitae orci rutrum ultricies na ue urna. Vestibulum sente-se amet ornare tellus. Cras finibus fringilla tellus, um f&aacute;rmaco n&atilde;o tincidunt. Etiam, suscipit nec dui varius tristique. Fusce, nec orci, pharetra elit lobortis gravida. Inteiro venenatis eros vel iaculis hendrerit. Donec sente-se em neque quis nisl posuere dictum. Em ve&iacute;culos de alta qualidade e ultra vitae magna. Proin tincidunt egestas laoreet. Etiam blandit dolor eu sem placerat ornare. Proin vel tellus eget risus condimentum dictum eget ne ne. Nullam sente-se no vest&iacute;bulo auctor do amet sapien um ligula. Suspendisse sed magna id risus cursus lacinia e non libero. Morbi vel lacus ut lectus ultras pulvinar.</p>\r\n', '3.1.1', 'Mudassar', '+923167545995', 'almahirhub@gmail.com', 'almahirhub.com', 'AlmahirHub', 'pub-83vbn56404931736973', 'ca-app-pub-1542366323524150~6327893410', 'true', 'ca-app-pub-3940256099942544/6300978111', 'true', 'ca-app-pub-3940256099942544/1033173712', 5, '283e955c-857c-46bc-bf3a-5098039265fb', 'OGJjZjk1NmEtZDdjMS00MTllLWE1ZWQtMjg1NTc2MzVlZmFj', 'AIzaSyDsFg6fd2lwqaxzsxN_W04Ox4_xcJfgbX4');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`) VALUES
(2, 5, 'sindh'),
(3, 5, ' Balochistan'),
(4, 5, 'Punjab');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_credentials`
--
ALTER TABLE `admin_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_donors`
--
ALTER TABLE `blood_donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_requests`
--
ALTER TABLE `blood_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_credentials`
--
ALTER TABLE `admin_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `app_users`
--
ALTER TABLE `app_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blood_donors`
--
ALTER TABLE `blood_donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blood_requests`
--
ALTER TABLE `blood_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banks`
--
ALTER TABLE `banks`
  ADD CONSTRAINT `banks_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `banks_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `banks_ibfk_3` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blood_requests`
--
ALTER TABLE `blood_requests`
  ADD CONSTRAINT `blood_requests_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blood_requests_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blood_requests_ibfk_3` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
