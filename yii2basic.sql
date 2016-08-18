-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-08-18 18:19:05
-- 服务器版本： 5.6.30
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2basic`
--

-- --------------------------------------------------------

--
-- 表的结构 `Address`
--

DROP TABLE IF EXISTS `Address`;
CREATE TABLE IF NOT EXISTS `Address` (
  `id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `street1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `stateOrProvince` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organizationId` int(11) DEFAULT NULL,
  `personId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `Donation`
--

DROP TABLE IF EXISTS `Donation`;
CREATE TABLE IF NOT EXISTS `Donation` (
  `id` int(11) NOT NULL,
  `needID` int(11) NOT NULL,
  `donorID` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `Email`
--

DROP TABLE IF EXISTS `Email`;
CREATE TABLE IF NOT EXISTS `Email` (
  `id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `organizationId` int(11) DEFAULT NULL,
  `personId` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `Email`
--

INSERT INTO `Email` (`id`, `type`, `address`, `organizationId`, `personId`) VALUES
(2, 'Home', 'evhatfield@yahoo.com', 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `Event`
--

DROP TABLE IF EXISTS `Event`;
CREATE TABLE IF NOT EXISTS `Event` (
  `id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dateOccurred` date NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `Need`
--

DROP TABLE IF EXISTS `Need`;
CREATE TABLE IF NOT EXISTS `Need` (
  `id` int(11) NOT NULL,
  `disasterID` int(11) NOT NULL,
  `typeId` int(11) NOT NULL,
  `forWhom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `detailedDescriptionOfNeed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `NeedType`
--

DROP TABLE IF EXISTS `NeedType`;
CREATE TABLE IF NOT EXISTS `NeedType` (
  `id` int(11) NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `NeedType`
--

INSERT INTO `NeedType` (`id`, `description`) VALUES
(1, 'Money'),
(2, 'Supplies'),
(3, 'Food'),
(4, 'Water'),
(5, 'Clothing'),
(6, 'Workers'),
(7, 'Construction');

-- --------------------------------------------------------

--
-- 表的结构 `Organization`
--

DROP TABLE IF EXISTS `Organization`;
CREATE TABLE IF NOT EXISTS `Organization` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `Organization`
--

INSERT INTO `Organization` (`id`, `name`, `type`) VALUES
(1, 'Allstar Global Solutions', 'Business');

-- --------------------------------------------------------

--
-- 表的结构 `Person`
--

DROP TABLE IF EXISTS `Person`;
CREATE TABLE IF NOT EXISTS `Person` (
  `id` int(11) NOT NULL,
  `firstName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `organizationId` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `Person`
--

INSERT INTO `Person` (`id`, `firstName`, `lastName`, `position`, `organizationId`, `type`) VALUES
(1, '123', '2313', '321', 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `Phone`
--

DROP TABLE IF EXISTS `Phone`;
CREATE TABLE IF NOT EXISTS `Phone` (
  `id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `countryCode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `organizationId` int(11) DEFAULT NULL,
  `personId` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `Phone`
--

INSERT INTO `Phone` (`id`, `type`, `countryCode`, `number`, `organizationId`, `personId`) VALUES
(2, 'Home', '86', '18018573226', 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `User`
--

DROP TABLE IF EXISTS `User`;
CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `User`
--

INSERT INTO `User` (`id`, `username`, `password`, `firstName`, `lastName`) VALUES
(1, 'Ray', '123', 'Ray', '高'),
(2, 'Eric', '123', 'Eric', 'Hatfield'),
(3, 'test', '123', 'Test', 'Test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organizationId` (`organizationId`),
  ADD KEY `personId` (`personId`);

--
-- Indexes for table `Donation`
--
ALTER TABLE `Donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Email`
--
ALTER TABLE `Email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organizationId` (`organizationId`),
  ADD KEY `personId` (`personId`);

--
-- Indexes for table `Event`
--
ALTER TABLE `Event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Need`
--
ALTER TABLE `Need`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typeId` (`typeId`);

--
-- Indexes for table `NeedType`
--
ALTER TABLE `NeedType`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Organization`
--
ALTER TABLE `Organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Person`
--
ALTER TABLE `Person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organizationId` (`organizationId`);

--
-- Indexes for table `Phone`
--
ALTER TABLE `Phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organizationId` (`organizationId`),
  ADD KEY `personId` (`personId`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UQ_Username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Address`
--
ALTER TABLE `Address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Donation`
--
ALTER TABLE `Donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Email`
--
ALTER TABLE `Email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Event`
--
ALTER TABLE `Event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Need`
--
ALTER TABLE `Need`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `NeedType`
--
ALTER TABLE `NeedType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Organization`
--
ALTER TABLE `Organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Person`
--
ALTER TABLE `Person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Phone`
--
ALTER TABLE `Phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- 限制导出的表
--

--
-- 限制表 `Address`
--
ALTER TABLE `Address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`organizationId`) REFERENCES `Organization` (`id`),
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`personId`) REFERENCES `Person` (`id`);

--
-- 限制表 `Email`
--
ALTER TABLE `Email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`organizationId`) REFERENCES `Organization` (`id`),
  ADD CONSTRAINT `email_ibfk_2` FOREIGN KEY (`personId`) REFERENCES `Person` (`id`);

--
-- 限制表 `Person`
--
ALTER TABLE `Person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`organizationId`) REFERENCES `Organization` (`id`);

--
-- 限制表 `Phone`
--
ALTER TABLE `Phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`organizationId`) REFERENCES `Organization` (`id`),
  ADD CONSTRAINT `phone_ibfk_2` FOREIGN KEY (`personId`) REFERENCES `Person` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
