-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 05:52 PM
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
-- Table structure for table `module_menue`
--

CREATE TABLE `module_menue` (
  `id` varchar(250) NOT NULL,
  `id_parent` varchar(250) NOT NULL,
  `icon` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `type` enum('tab','men') NOT NULL,
  `order_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_menue`
--

INSERT INTO `module_menue` (`id`, `id_parent`, `icon`, `link`, `name`, `type`, `order_no`) VALUES
('About', '', '', 'index.php?module=about', 'About', 'tab', 4),
('Company', '', '', '', 'Company', 'men', 6),
('Company About', 'Company', '', 'index.php?module=about', 'Company About', 'tab', 4),
('Company Contact', 'Company', '', 'index.php?module=contact', 'Company Contact', 'tab', 3),
('Company Home', 'Company', '', 'index.php?module=home', 'Company Home', 'tab', 1),
('Company News', 'Company', '', 'index.php?module=news', 'Company News', 'tab', 2),
('Contact', '', '', 'index.php?module=contact', 'Contact', 'tab', 3),
('Home', '', '', 'index.php?module=home', 'Home', 'tab', 1),
('institution', '', '', '', 'institution', 'men', 7),
('institution About', 'institution', '', 'index.php?module=about', 'institution About', 'tab', 4),
('institution Contact', 'institution', '', 'index.php?module=contact', 'institution Contact', 'tab', 3),
('institution Home', 'institution', '', 'index.php?module=home', 'institution Home', 'tab', 1),
('institution News', 'institution', '', 'index.php?module=news', 'institution News', 'tab', 2),
('institution user', 'institution', '', '', 'institution user', 'men', 5),
('institution user About', 'institution user ', '', 'index.php?module=about', 'institution user About', 'tab', 4),
('institution user Contact', 'institution user ', '', 'index.php?module=contact', 'institution user Contact', 'tab', 3),
('institution user Home', 'institution user ', '', 'index.php?module=home', 'institution user Home', 'tab', 1),
('institution user News', 'institution user ', '', 'index.php?module=news', 'institution user News', 'tab', 2),
('News', '', '', 'index.php?module=news', 'News', 'tab', 2),
('Profile', '', '', '', 'Profile', 'men', 5),
('Profile  About', 'Profile', '', 'index.php?module=about', 'Profile  About', 'tab', 4),
('Profile  Contact', 'Profile', '', 'index.php?module=contact', 'Profile  Contact', 'tab', 3),
('Profile  Home', 'Profile', '', 'index.php?module=home', 'Profile  Home', 'tab', 1),
('Profile  News', 'Profile', '', 'index.php?module=news', 'Profile  News', 'tab', 2);

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` enum('Active','Deactivate') NOT NULL DEFAULT 'Active',
  `creationDate` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `module_menue`
--
ALTER TABLE `module_menue`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
