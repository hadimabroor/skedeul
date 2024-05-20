-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 09, 2024 at 02:52 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aoxio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `fonts`
--

CREATE TABLE `fonts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fonts`
--

INSERT INTO `fonts` (`id`, `user_id`, `business_id`, `name`, `slug`) VALUES
(2, 0, '0', 'Lato', 'lato'),
(3, 0, '0', 'Smith', 'smith'),
(4, 0, '0', 'Bree Serif', 'bree-serif'),
(5, 0, '0', 'Cabin', 'cabin'),
(6, 0, '0', 'Cookie', 'cookie'),
(7, 0, '0', 'Montserrat', 'montserrat'),
(9, 0, '0', 'Raleway', 'raleway'),
(10, 0, '0', 'Roboto', 'roboto'),
(11, 0, '0', 'Nunito', 'nunito'),
(12, 0, '0', 'Molengo', 'molengo'),
(13, 0, '0', 'Sarabun', 'sarabun'),
(14, 0, '0', 'Open Sans', 'open-sans'),
(15, 0, '0', 'Source Sans Pro', 'source-sans-pro'),
(16, 0, '0', 'PT Sans', 'pt-sans'),
(17, 0, '0', 'Noto Sans', 'noto-sans'),
(18, 0, '0', 'Roboto Mono', 'roboto-mono'),
(19, 0, '0', 'Muli', 'muli'),
(20, 0, '0', 'Arimo', 'arimo'),
(21, 0, '0', 'Fira Sans', 'fira-sans'),
(22, 0, '0', 'Noto Serif', 'noto-serif'),
(23, 0, '0', 'Work Sans', 'work-sans'),
(24, 0, '0', 'Quicksand', 'quicksand'),
(25, 0, '0', 'Dosis', 'dosis'),
(26, 0, '0', 'Rubik', 'rubik'),
(27, 0, '0', 'Oxygen', 'oxygen'),
(28, 0, '0', 'Hind', 'hind'),
(29, 0, '0', 'Josefin Sans', 'josefin-sans'),
(36, 0, '0', 'Merriweather Sans', 'merriweather-sans'),
(37, 0, '0', 'Kanit', 'kanit'),
(39, 0, '0', 'Comfortaa', 'comfortaa'),
(52, 0, '0', 'Bebas Neue', 'bebas-neue'),
(53, 0, '0', 'Short', 'short'),
(54, 0, '0', 'Iransans', 'iransans'),
(55, 0, '0', 'Noto Sans KR', 'noto-sans-kr'),
(56, 0, '0', 'Arial', 'arial'),
(57, 0, '0', 'Alata', 'alata'),
(58, 0, '0', 'Sriracha', 'sriracha'),
(59, 0, '0', 'Tajawal', 'tajawal'),
(60, 2, '26341103027', 'Ubuntu', 'ubuntu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fonts`
--
ALTER TABLE `fonts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fonts`
--
ALTER TABLE `fonts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
