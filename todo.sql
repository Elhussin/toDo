-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2025 at 11:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `TEXT` text NOT NULL,
  `status` text NOT NULL,
  `USERID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `TEXT`, `status`, `USERID`) VALUES
(9, 'dd', 'yes', 1015),
(38, 'س', 'yes', 1029),
(39, '111', 'yes', 1029),
(40, '111', 'yes', 1029),
(41, '111', 'yes', 1029),
(42, '111', 'yes', 1029),
(43, '111', 'yes', 1029),
(44, '1235', 'yes', 1029),
(45, '1234', 'no', 1029),
(46, '233', 'no', 1015),
(48, '111', 'no', 1015),
(49, 'f', 'no', 1015),
(50, '111', 'no', 1029);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(12) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `AGE` date NOT NULL,
  `PASSWORD` text NOT NULL,
  `ACTIEV` tinyint(1) NOT NULL,
  `SECUERTY_COD` varchar(255) NOT NULL,
  `ROEL` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `tell` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `EmpolyId` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `wep` varchar(255) NOT NULL,
  `cotegray` varchar(255) NOT NULL,
  `contery` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `NAME`, `lastName`, `EMAIL`, `AGE`, `PASSWORD`, `ACTIEV`, `SECUERTY_COD`, `ROEL`, `userName`, `tell`, `gender`, `EmpolyId`, `stat`, `fax`, `wep`, `cotegray`, `contery`) VALUES
(1015, 'Husin1', '', 'hasin3112@gmail.com', '2025-01-01', '8cb2237d0679ca88db6464eac60da96345513964', 1, '', 'ADMIN', 'MEDALL EAST', '0540919725', '', '', '', '0126600148', 'http://localhost/project/company/prodect/newcompany.php', 'fram', 'Saudi Arabia'),
(1021, 'ESSILER', '', 'ESSILER@ESSILER.com', '2025-01-25', '', 1, '', 'Agent', 'ESSILER', '0108704401', '', '', '', '012661164', 'http://ESSILER.com', 'lens', 'Saudi Arabia'),
(1029, 'yahoo3', '', 'TAHA2282015@gmail.com', '2024-12-25', '8cb2237d0679ca88db6464eac60da96345513964', 1, '6e0b5f99568eedfdf2b5df39b00123d9', 'USER', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userid` (`USERID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1032;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`USERID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
