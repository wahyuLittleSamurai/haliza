-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 01:13 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhaliza`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `createat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `password`, `createat`) VALUES
(1, 'admin', 'root', '2021-03-12 22:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `tblanak`
--

CREATE TABLE `tblanak` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` varchar(5) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `bb` varchar(5) NOT NULL,
  `tb` varchar(5) NOT NULL,
  `createat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblanak`
--

INSERT INTO `tblanak` (`id`, `nama`, `umur`, `gender`, `bb`, `tb`, `createat`) VALUES
(6, '', '59', '2', '14', '100', '2021-05-26 21:17:42'),
(7, '', '54', '2', '14', '90', '2021-05-26 21:17:42'),
(8, '', '51', '1', '16.5', '97', '2021-05-26 21:17:42'),
(9, '', '49', '2', '19', '106', '2021-05-26 21:17:42'),
(10, '', '47', '1', '24', '101', '2021-05-26 21:17:42'),
(11, '', '46', '2', '18', '99', '2021-05-26 21:17:42'),
(12, '', '44', '1', '14', '95', '2021-05-26 21:17:42'),
(13, '', '44', '2', '13', '94.5', '2021-05-26 21:17:42'),
(14, '', '43', '1', '12', '96', '2021-05-26 21:17:42'),
(15, '', '41', '1', '11', '84.2', '2021-05-26 21:17:42'),
(16, '', '57', '1', '17', '102', '2021-05-26 21:17:42'),
(17, '', '56', '1', '17', '105', '2021-05-26 21:17:42'),
(18, '', '54', '2', '15', '104', '2021-05-26 21:17:42'),
(19, '', '60', '1', '13.3', '94', '2021-05-26 21:17:42'),
(20, '', '54', '2', '16', '88', '2021-05-26 21:17:42'),
(21, '', '51', '1', '14.6', '96', '2021-05-26 21:17:42'),
(22, '', '51', '1', '14.7', '100', '2021-05-26 21:17:42'),
(23, '', '52', '1', '15.4', '103', '2021-05-26 21:17:42'),
(24, '', '50', '1', '14', '96', '2021-05-26 21:17:42'),
(25, '', '50', '2', '15.5', '102', '2021-05-26 21:17:42'),
(26, '', '49', '1', '15.6', '102', '2021-05-26 21:17:42'),
(27, '', '47', '1', '15.1', '96', '2021-05-26 21:17:42'),
(28, '', '47', '1', '15.5', '102', '2021-05-26 21:17:42'),
(29, '', '44', '2', '14.5', '98', '2021-05-26 21:17:42'),
(30, '', '48', '2', '13.6', '103', '2021-05-26 21:17:42'),
(31, '', '52', '2', '13.6', '105', '2021-05-26 21:17:42'),
(32, '', '50', '2', '18.7', '104', '2021-05-26 21:17:42'),
(33, '', '47', '1', '15.5', '104', '2021-05-26 21:17:42'),
(34, '', '45', '2', '12.2', '97', '2021-05-26 21:17:42'),
(35, '', '42', '2', '13', '96', '2021-05-26 21:17:42'),
(36, '', '40', '2', '13.1', '97', '2021-05-26 21:17:42'),
(37, '', '44', '1', '15.1', '103', '2021-05-26 21:17:42'),
(38, '', '43', '1', '18', '103', '2021-05-26 21:17:42'),
(39, '', '43', '1', '16.6', '101', '2021-05-26 21:17:42'),
(40, '', '42', '2', '14', '97', '2021-05-26 21:17:42'),
(41, '', '46', '1', '13.8', '104', '2021-05-26 21:17:42'),
(42, '', '48', '1', '14', '97', '2021-05-26 21:17:42'),
(43, '', '41', '1', '13.6', '97', '2021-05-26 21:17:42'),
(44, '', '41', '1', '13.7', '98', '2021-05-26 21:17:42'),
(45, '', '48', '2', '13.3', '99', '2021-05-26 21:17:42'),
(46, '', '43', '2', '12.8', '99', '2021-05-26 21:17:42'),
(47, '', '46', '2', '12.9', '94', '2021-05-26 21:17:42'),
(48, '', '39', '1', '11.4', '89', '2021-05-26 21:17:42'),
(49, '', '45', '1', '12.9', '94', '2021-05-26 21:17:42'),
(50, '', '39', '2', '11.5', '94', '2021-05-26 21:17:42'),
(51, '', '38', '1', '13.2', '99', '2021-05-26 21:17:42'),
(52, '', '37', '1', '16', '100', '2021-05-26 21:17:42'),
(53, '', '37', '1', '12.4', '90', '2021-05-26 21:17:42'),
(54, '', '37', '2', '13.5', '93', '2021-05-26 21:17:42'),
(55, '', '36', '1', '15.8', '99', '2021-05-26 21:17:42'),
(56, '', '26', '2', '10.2', '86', '2021-05-26 21:17:42'),
(57, '', '36', '2', '10.2', '87', '2021-05-26 21:17:42'),
(58, '', '33', '1', '10.7', '104', '2021-05-26 21:17:42'),
(59, '', '35', '1', '11.2', '89', '2021-05-26 21:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbltngkesehatan`
--

CREATE TABLE `tbltngkesehatan` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `createat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltngkesehatan`
--

INSERT INTO `tbltngkesehatan` (`id`, `username`, `password`, `createat`) VALUES
(2, 'jamil', 'wahyu', '2021-03-12 11:46:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblanak`
--
ALTER TABLE `tblanak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltngkesehatan`
--
ALTER TABLE `tbltngkesehatan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblanak`
--
ALTER TABLE `tblanak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbltngkesehatan`
--
ALTER TABLE `tbltngkesehatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
