-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016-09-26 18:25:12
-- 服务器版本: 5.5.52-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `se2`
--
CREATE DATABASE IF NOT EXISTS `se2` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `se2`;

-- --------------------------------------------------------

--
-- 表的结构 `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `AuthorID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) COLLATE utf8_bin NOT NULL,
  `Age` int(11) NOT NULL,
  `Country` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`AuthorID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;


-- --------------------------------------------------------

--
-- 表的结构 `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `ISBN` varchar(20) COLLATE utf8_bin NOT NULL,
  `Title` varchar(25) COLLATE utf8_bin NOT NULL,
  `AuthorID` int(11) NOT NULL,
  `Publisher` varchar(25) COLLATE utf8_bin NOT NULL,
  `PublishDate` date NOT NULL,
  `Price` float NOT NULL,
  PRIMARY KEY (`ISBN`),
  KEY `AuthorID` (`AuthorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 限制导出的表
--

--
-- 限制表 `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`AuthorID`) REFERENCES `author` (`AuthorID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;