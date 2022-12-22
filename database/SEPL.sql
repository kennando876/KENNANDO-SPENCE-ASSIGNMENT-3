-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 22, 2022 at 04:47 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sepl`
--
CREATE DATABASE IF NOT EXISTS `sepl` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `sepl`;

-- --------------------------------------------------------

--
-- Table structure for table `userinformation`
--

DROP TABLE IF EXISTS `userinformation`;
CREATE TABLE IF NOT EXISTS `userinformation` (
  `UserID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Password` varchar(50) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `ProfilePhoto` varchar(1000) NOT NULL,
  `Active` int NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=1006 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`UserID`, `Password`, `Username`, `Firstname`, `Lastname`, `Gender`, `Address`, `Phone`, `Email`, `Role`, `ProfilePhoto`, `Active`) VALUES
(1000, '@dministrat0r', 'admin', 'System', 'Administrator', 'Male', '', '', 'sadmin@sepl.com', 'Admin', 'profilephoto/maledefault.jpg', 1),
(1003, '12345', 'skelly', 'Sophia', 'Kelly', 'Female', '12 Love Lane', '876-908-7654', 'sk@yahoo.com', 'Subscriber', 'profilephoto/femaledefault.jpg', 1),
(1005, '12345', 'kspence', 'Kenando', 'Spence', 'Male', '', '', 'kspence@gmail.com', 'Subscriber', 'profilephoto/maledefault.jpg', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
