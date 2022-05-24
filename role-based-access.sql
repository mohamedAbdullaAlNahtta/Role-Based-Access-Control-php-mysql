-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 01:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `role-based-access`
--

-- --------------------------------------------------------

--
-- Table structure for table `module_menu`
--

CREATE TABLE `module_menu` (
  `id` varchar(250) NOT NULL,
  `id_parent` varchar(250) DEFAULT NULL,
  `icon` varchar(250) NOT NULL,
  `link` varchar(250) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `type` enum('tab','men') NOT NULL DEFAULT 'tab',
  `order_no` int(11) NOT NULL,
  `level` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_menu`
--

INSERT INTO `module_menu` (`id`, `id_parent`, `icon`, `link`, `name`, `type`, `order_no`, `level`) VALUES
('About', NULL, '', 'index.php?module=about', 'About', 'tab', 4, 0),
('Company', NULL, '', NULL, 'Company', 'men', 6, 0),
('Company About', 'Company', '', 'index.php?module=about', 'Company About', 'tab', 4, 1),
('Company Contact', 'Company', '', 'index.php?module=contact', 'Company Contact', 'tab', 3, 1),
('Company Home', 'Company', '', 'index.php?module=home', 'Company Home', 'tab', 1, 1),
('Company News', 'Company', '', 'index.php?module=news', 'Company News', 'tab', 2, 1),
('Contact', NULL, '', 'index.php?module=contact', 'Contact', 'tab', 3, 0),
('Contact Home', 'Contact', '', 'index.php?module=home', 'Contact Home', 'tab', 1, 1),
('Contact News', 'Contact', '', 'index.php?module=news', 'Contact News', 'tab', 2, 1),
('Home', NULL, '', 'index.php?module=home', 'Home', 'tab', 1, 0),
('institution', NULL, '', NULL, 'institution', 'men', 7, 0),
('institution About', 'institution', '', 'index.php?module=about', 'institution About', 'tab', 4, 1),
('institution Contact', 'institution', '', 'index.php?module=contact', 'institution Contact', 'tab', 3, 1),
('institution Home', 'institution', '', 'index.php?module=home', 'institution Home', 'tab', 1, 1),
('institution News', 'institution', '', 'index.php?module=news', 'institution News', 'tab', 2, 1),
('institution user', 'institution', '', NULL, 'institution user', 'men', 5, 1),
('institution user About', 'institution user ', '', 'index.php?module=about', 'institution user About', 'tab', 4, 2),
('institution user Contact', 'institution user ', '', 'index.php?module=contact', 'institution user Contact', 'tab', 3, 2),
('institution user Home', 'institution user ', '', 'index.php?module=home', 'institution user Home', 'tab', 1, 2),
('institution user News', 'institution user ', '', 'index.php?module=news', 'institution user News', 'tab', 2, 2),
('News', NULL, '', 'index.php?module=news', 'News', 'tab', 2, 0),
('Profile', NULL, '', NULL, 'Profile', 'men', 5, 0),
('Profile  About', 'Profile', '', 'index.php?module=about', 'Profile  About', 'tab', 4, 1),
('Profile  Contact', 'Profile', '', 'index.php?module=contact', 'Profile  Contact', 'tab', 3, 1),
('Profile  Home', 'Profile', '', 'index.php?module=home', 'Profile  Home', 'tab', 1, 1),
('Profile  News', 'Profile', '', 'index.php?module=news', 'Profile  News', 'tab', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_role_id`) VALUES
(1, 'Ahmed', 'password', 1),
(2, 'Mohamed', 'password', 1),
(3, 'Ali', 'password', 2),
(4, 'Omar', 'password', 2),
(5, 'Mahmoud', 'password', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` enum('Active','Deactivate') NOT NULL DEFAULT 'Active',
  `creationDate` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`, `description`, `status`, `creationDate`, `createdBy`) VALUES
(1, 'Admininstrator', 'Super Admin', 'Active', '2022-05-23 15:31:42', 'Mohamed'),
(2, 'Call Center', 'Call Center Team', 'Active', '2022-05-23 15:32:33', 'Mohamed'),
(3, 'Tech Team', 'Technical support Team', 'Active', '2022-05-23 15:32:33', 'Mohamed');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_module_menu`
--

CREATE TABLE `user_role_module_menu` (
  `id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `module_menu_id` varchar(250) NOT NULL,
  `access_type` enum('read','write') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role_module_menu`
--

INSERT INTO `user_role_module_menu` (`id`, `user_role_id`, `module_menu_id`, `access_type`) VALUES
(1, 1, 'Home', 'read'),
(2, 1, 'Company Home', 'read'),
(3, 1, 'Contact Home', 'read'),
(4, 1, 'Profile  Home', 'read'),
(5, 1, 'institution Home', 'read'),
(6, 1, 'institution user Home', 'read'),
(7, 1, 'News', 'read'),
(8, 1, 'Company News', 'read'),
(9, 1, 'Contact News', 'read'),
(10, 1, 'Profile  News', 'read'),
(11, 1, 'institution News', 'read'),
(12, 1, 'institution user News', 'read'),
(13, 1, 'Contact', 'read'),
(14, 1, 'Company Contact', 'read'),
(15, 1, 'Profile  Contact', 'read'),
(16, 1, 'institution Contact', 'read'),
(17, 1, 'institution user Contact', 'read'),
(18, 1, 'About', 'read'),
(19, 1, 'Company About', 'read'),
(20, 1, 'Profile  About', 'read'),
(21, 1, 'institution About', 'read'),
(22, 1, 'institution user About', 'read'),
(23, 1, 'Profile', 'read'),
(24, 1, 'institution user', 'read'),
(25, 1, 'Company', 'read'),
(26, 1, 'institution', 'read'),
(27, 2, 'institution user Home', 'read'),
(28, 2, 'Company News', 'read'),
(29, 2, 'Contact News', 'read'),
(30, 2, 'Profile  News', 'read'),
(31, 2, 'institution News', 'read'),
(32, 2, 'Contact', 'read'),
(33, 2, 'Company Contact', 'read'),
(34, 2, 'Profile  Contact', 'read'),
(35, 2, 'institution Contact', 'read'),
(36, 2, 'institution user Contact', 'read'),
(37, 2, 'About', 'read'),
(38, 2, 'Company About', 'read'),
(39, 2, 'Profile  About', 'read'),
(40, 2, 'institution About', 'read'),
(41, 2, 'institution user About', 'read'),
(42, 2, 'Profile', 'read'),
(43, 2, 'institution user', 'read'),
(44, 2, 'Company', 'read'),
(45, 2, 'institution', 'read'),
(46, 3, 'Company Home', 'read'),
(47, 3, 'Contact Home', 'read'),
(48, 3, 'Profile  Home', 'read'),
(49, 3, 'institution Home', 'read'),
(50, 3, 'institution user Home', 'read'),
(51, 3, 'Contact', 'read'),
(52, 3, 'Company Contact', 'read'),
(53, 3, 'Profile  Contact', 'read'),
(54, 3, 'institution Contact', 'read'),
(55, 3, 'institution user Contact', 'read'),
(56, 3, 'Profile', 'read'),
(57, 3, 'institution user', 'read'),
(58, 3, 'Company', 'read'),
(59, 3, 'institution', 'read');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `module_menu`
--
ALTER TABLE `module_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role_module_menu`
--
ALTER TABLE `user_role_module_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role_module_menu`
--
ALTER TABLE `user_role_module_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
