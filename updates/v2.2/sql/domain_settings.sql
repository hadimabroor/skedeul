-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 31, 2023 at 05:49 PM
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
-- Database: `aoxio_db_18`
--

-- --------------------------------------------------------

--
-- Table structure for table `domain_settings`
--

CREATE TABLE `domain_settings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_details` text NOT NULL,
  `details` text NOT NULL,
  `ip` varchar(255) NOT NULL,
  `type1` varchar(255) NOT NULL,
  `host1` varchar(255) NOT NULL,
  `value1` varchar(255) NOT NULL,
  `ttl1` varchar(255) NOT NULL,
  `type2` varchar(255) NOT NULL,
  `host2` varchar(255) NOT NULL,
  `value2` varchar(255) NOT NULL,
  `ttl2` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domain_settings`
--

INSERT INTO `domain_settings` (`id`, `user_id`, `title`, `short_details`, `details`, `ip`, `type1`, `host1`, `value1`, `ttl1`, `type2`, `host2`, `value2`, `ttl2`, `image`, `thumb`) VALUES
(1, 1, 'Custom Domain Integration Guideline', 'Custom Domain Integration Guideline short details', '<div>Integrating a custom domain with DNS settings typically involves the following steps:</div><div><br></div><ol><li><b>Purchase a domain name:</b> You\'ll need to purchase a domain name from a domain registrar such as GoDaddy, Namecheap, or Google Domains.</li><li><b>Obtain your DNS records: </b>Once you have a domain provider, they will provide you with <b>DNS records</b> that you\'ll need to configure for your domain. These records will typically include an <b>A record & CNAME record</b>.</li><li><b>Configure DNS settings:</b> Log in to your domain registrar\'s account and navigate to the DNS management section.You need to add 2 new DNS record, choose the record type (<b>A & CNAME</b>) & follow the settings below <b>(<span xss=\"removed\">DNS Settings One </span><span xss=\"removed\">& </span><span xss=\"removed\">DNS Settings Two</span>)</b>, and enter the corresponding value.</li><li><b>Wait for propagation:</b> Once you\'ve made the changes to your DNS settings, it can take up to 48 hours for the changes to propagate throughout the internet. During this time, your website or application may be temporarily unavailable.</li></ol><div>That\'s it! Once your DNS records have propagated, your custom domain should be fully integrated with our application.</div>', '200.201.200.122', 'CNAME Record', 'www', 'localhost', 'Automatic', 'A Record', '@', '200.201.200.122', 'Automatic', 'uploads/medium/ffacb0959f18f3f8043243c937559a6c_medium-1200x1200.jpg', 'uploads/thumbnail/ffacb0959f18f3f8043243c937559a6c_thumb-150x150.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domain_settings`
--
ALTER TABLE `domain_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `domain_settings`
--
ALTER TABLE `domain_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
