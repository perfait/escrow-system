-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2021 at 12:29 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escrow`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `created_at`) VALUES
('cus_J6LK8SbzngS7MC', 'PERFAIT', 'AKAKA', 'pafeshisoks@gmail.com', '2021-03-12 13:54:51'),
('uid_603ab660314a6', 'PERFAIT', 'AKAKA', 'akaka@gmail.com', '2021-02-28 00:15:12'),
('uid_603acd36407b7', 'PERFAIT', 'AKAKA', 'iamgroot@gmail.com', '2021-02-28 01:52:38'),
('uid_603b5e36bcfc7', 'PERFAIT', 'AKAKA', 'iamgroot@gmail.com', '2021-02-28 12:11:18'),
('uid_603b65b84bab8', 'PERFAIT', 'AKAKA', 'iamgroot@gmail.com', '2021-02-28 12:43:20'),
('uid_6041e65ae1492', 'PERFAIT', 'AKAKA', 'iamgroot@gmail.com', '2021-03-05 11:05:46'),
('uid_6041e7cd4d43e', 'PERFAIT', 'AKAKA', 'iamgroot@gmail.com', '2021-03-05 11:11:57'),
('uid_604b43dbec99a', 'PERFAIT', 'AKAKA', 'iamgroot@gmail.com', '2021-03-12 13:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `transaction_title` varchar(255) NOT NULL,
  `transaction_partner` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `customer_email`, `product`, `transaction_title`, `transaction_partner`, `amount`, `currency`, `status`, `created_at`) VALUES
('ch_1IU8dqLbdPtfQnAz8Xhhkuji', 'cus_J6LK8SbzngS7MC', '', 'Intro To React Course', '', '', '5000', 'usd', 'succeeded', '2021-03-12 13:54:51'),
('transid_603ab660412c1', 'uid_603ab660314a6', 'akaka@gmail.com', 'Payment to escrow', 'purchase of furniture', 'akaka@gmail.com', '2000', 'usd', 'pending', '2021-02-28 00:15:12'),
('transid_603acd365300b', 'uid_603acd36407b7', 'iamgroot@gmail.com', 'Payment to escrow', 'Music purchase', 'akaka@gmail.com', '5000', 'usd', 'pending', '2021-02-28 01:52:38'),
('transid_603b5e36cde2c', 'uid_603b5e36bcfc7', 'iamgroot@gmail.com', 'Payment to escrow', 'purchase of furniture', 'akaka@gmail.com', '2000', 'usd', 'pending', '2021-02-28 12:11:18'),
('transid_603b65b860136', 'uid_603b65b84bab8', 'iamgroot@gmail.com', 'Payment to escrow', 'purchase of furniture', 'akaka@gmail.com', '400', 'usd', 'succeeded', '2021-02-28 12:43:20'),
('transid_6041e65b00d9a', 'uid_6041e65ae1492', 'iamgroot@gmail.com', 'Payment to escrow', 'purchase of furniture', 'akaka@gmail.com', '2000', 'usd', 'succeeded', '2021-03-05 11:05:47'),
('transid_6041e7cd5dec9', 'uid_6041e7cd4d43e', 'iamgroot@gmail.com', 'Payment to escrow', 'Purchase of music', 'akaka@gmail.com', '5000', 'usd', 'succeeded', '2021-03-05 11:11:57'),
('transid_604b43dc14de2', 'uid_604b43dbec99a', 'iamgroot@gmail.com', 'Payment to escrow', 'purchase of jewelry', 'akaka@gmail.com', '2345', 'usd', 'succeeded', '2021-03-12 13:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `phone`) VALUES
('akaka', 'akaka@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
('groot', 'iamgroot@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
('', '', 'd41d8cd98f00b204e9800998ecf8427e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `downloads` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`id`, `name`, `size`, `downloads`) VALUES
('0', 'CISCO hardware and software practicum certificate nd grades-1.pdf', 113283, 8),
('0', 'Initiating and planning projects.pdf', 309856, 8),
('0', 'Budgeting and scheduling projects.pdf', 309857, 8),
('0', 'Managing Project Risks and Changes.pdf', 272353, 8),
('0', 'Interactive Computer Graphics.pdf', 363403, 0),
('', 'Numerical Methods assignment 3.pdf', 569897, 0),
('K9', 'Resume.pdf', 645405, 0),
('K9', 'Cover letter.pdf', 126392, 0),
('transid_603acd365300b', 'Cover letter.pdf', 126392, 0),
('transid_603acd365300b', 'Resume.pdf', 645405, 0),
('transid_603acd365300b', 'Resume.pdf', 645405, 0),
('transid_603acd365300b', 'Resume.pdf', 645405, 0),
('transid_603acd365300b', 'Resume.pdf', 645405, 0),
('transid_603acd365300b', 'Resume.pdf', 645405, 0),
('transid_603b5e36cde2c', 'Numerical Methods assignment 3.pdf', 569897, 0),
('transid_603b5e36cde2c', 'Numerical Methods assignment 3.pdf', 569897, 0),
('transid_603b5e36cde2c', 'Numerical Methods assignment 3.pdf', 569897, 0),
('transid_603b5e36cde2c', 'Numerical Methods assignment 3.pdf', 569897, 0),
('transid_603b5e36cde2c', 'Numerical Methods assignment 3.pdf', 569897, 0),
('transid_603b5e36cde2c', 'Numerical Methods assignment 3.pdf', 569897, 0),
('transid_603b5e36cde2c', 'Third assignment calculus 2.pdf', 561401, 0),
('transid_603b5e36cde2c', 'Numerical Methods assignment 3.pdf', 569897, 0),
('transid_603acd365300b', 'Resume.pdf', 645405, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
