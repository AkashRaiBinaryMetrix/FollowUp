-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2023 at 11:53 AM
-- Server version: 10.1.48-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devmetrx_lineon`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_add_list_images`
--

CREATE TABLE `create_add_list_images` (
  `id` int(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `list_id` int(100) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_add_list_images`
--

INSERT INTO `create_add_list_images` (`id`, `created_on`, `list_id`, `url`) VALUES
(52, '2022-11-08 08:26:07', 12, '/home/devmetrx/public_html/lineon/public/property_images/blog-1.jpg'),
(54, '2022-11-08 09:26:41', 12, '/home/devmetrx/public_html/lineon/public/property_images/blog-2.jpg'),
(55, '2022-11-08 14:31:02', 13, '/home/devmetrx/public_html/lineon/public/property_images/blog-1.jpg'),
(56, '2022-11-08 14:31:02', 13, '/home/devmetrx/public_html/lineon/public/property_images/home-living-banner.jpg'),
(57, '2023-01-13 11:03:55', 18, '/home/devmetrx/public_html/lineon/public/property_images/post_03.jpg'),
(58, '2023-02-01 08:41:48', 19, '/home/devmetrx/public_html/lineon/public/property_images/premium-sedan.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_add_list_images`
--
ALTER TABLE `create_add_list_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create_add_list_images`
--
ALTER TABLE `create_add_list_images`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
