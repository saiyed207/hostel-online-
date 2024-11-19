-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2023 at 03:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webroyal`
--

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `Id` int(50) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `Position` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `Resume` varchar(100) NOT NULL,
  `Photo` varchar(100) NOT NULL,
  `Coverletter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`Id`, `FirstName`, `Position`, `Email`, `PhoneNumber`, `Resume`, `Photo`, `Coverletter`) VALUES
(1, 'Sazid', 'huasin', '', '+918409419', '', '', ''),
(2, 'Sazid', 'Husain', 'sazidh89@gmail.com', '+917903643', 'Lords.pdf', '343050481_832116391806284_662824785093730224_n.jpg', 'my name is sazid husain'),
(5, 'Sazid', 'huasin', 'sazid1237@gmail.com', '+918409419', 'PDFGallery_20230909_114449.pdf', 'Picture1457.png', 'my na'),
(26, 'Sazid', 'Husain', 'sazidop@gmail.com', '+917903643', 'Lords.pdf', '343050481_832116391806284_662824785093730224_n.jpg', 'vvvv'),
(28, 'Sazid', 'Sales Executive', 'sazidfg@gmail.com', '+917903643', '1690798731 (1).pdf', 'Picture123.png', 'dggkkkk'),
(30, 'Sazid', 'Sales Executive', 'sazidfghhj@gmail.com', '+917903643', '1690798731 (1).pdf', 'Picture123.png', 'fgghhh'),
(31, 'Sazid', 'Sales Executive', 'sazidf3445hj@gmail.com', '+917903643', '1690798731 (1).pdf', 'Color Hunt Palette 04156211468fda1212eeeeee.png', 'fgghhhggg'),
(32, 'Ram', 'Sales Executive', 'sazidh@gmail.com', '+917903643', 'Lords.pdf', '234.jpg', 'this is sazid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
