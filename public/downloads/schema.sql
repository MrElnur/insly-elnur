-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 18, 2019 at 04:28 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `insly_test`
--
CREATE DATABASE IF NOT EXISTS `insly_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `insly_test`;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `BIRTHDATE` datetime DEFAULT NULL,
  `SSN` int(11) DEFAULT NULL,
  `STATUS` int(1) NOT NULL DEFAULT '0',
  `EMAIL` varchar(100) DEFAULT NULL,
  `PHONE` int(11) DEFAULT NULL,
  `ADDRESS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `NAME`, `BIRTHDATE`, `SSN`, `STATUS`, `EMAIL`, `PHONE`, `ADDRESS`) VALUES
(1, 'Elnur', '1994-08-18 10:00:00', 123456, 1, 'mes.elnur@gmail.com', 58150330, 'Tallinn'),
(2, 'Arsenal', '1999-12-03 00:00:00', 41241233, 1, 'arsenal@ararar.az', 123451, 'some adress');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `CODE` char(2) NOT NULL,
  `NAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`CODE`, `NAME`) VALUES
('1', 'en'),
('2', 'fr'),
('3', 'es');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `ID` int(11) NOT NULL,
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `INFO_ID` int(11) DEFAULT NULL,
  `USER` varchar(20) NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`ID`, `EMPLOYEE_ID`, `INFO_ID`, `USER`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 1, NULL, 'Admin', '2019-12-18 16:20:13', NULL),
(2, NULL, 1, 'Admin', '2019-12-18 16:09:13', '2019-12-18 16:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `translation`
--

DROP TABLE IF EXISTS `translation`;
CREATE TABLE `translation` (
  `ID` int(11) NOT NULL,
  `EMPLOYEE_ID` int(11) NOT NULL DEFAULT '0',
  `LANGUAGE_CODE` char(2) NOT NULL,
  `INTRODUCTION` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `EXPERIENCE` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `EDUCATION` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `translation`
--

INSERT INTO `translation` (`ID`, `EMPLOYEE_ID`, `LANGUAGE_CODE`, `INTRODUCTION`, `EXPERIENCE`, `EDUCATION`) VALUES
(1, 1, '1', 'Hello', 'I have some experience', 'Master Degree'),
(2, 1, '2', 'Bonjour', 'J\'ai de l\'expérience', 'Master'),
(3, 1, '3', 'Hola', 'Tengo algo de experiencia', 'Maestría'),
(4, 2, '1', 'My name is Arsenal', 'I have no idea', 'I know exactly that two plus two is equals five'),
(5, 2, '2', 'Je m\'appelle Arsenal', 'Je n\'ai aucune idée', 'Je sais exactement que deux plus deux est égal à cinq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ssn` (`SSN`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`CODE`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`),
  ADD KEY `INFO_ID` (`INFO_ID`);

--
-- Indexes for table `translation`
--
ALTER TABLE `translation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `translation_id` (`EMPLOYEE_ID`),
  ADD KEY `language_code` (`LANGUAGE_CODE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `translation`
--
ALTER TABLE `translation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employees` (`ID`),
  ADD CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`INFO_ID`) REFERENCES `translation` (`ID`);

--
-- Constraints for table `translation`
--
ALTER TABLE `translation`
  ADD CONSTRAINT `translation_ibfk_1` FOREIGN KEY (`LANGUAGE_CODE`) REFERENCES `language` (`CODE`),
  ADD CONSTRAINT `translation_ibfk_2` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employees` (`ID`);
