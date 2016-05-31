-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- 主機: localhost:8889
-- 產生時間： 2016 年 01 月 04 日 11:00
-- 伺服器版本: 5.5.42
-- PHP 版本： 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫： `braindump`
--
CREATE DATABASE IF NOT EXISTS `braindump` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `braindump`;

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--

CREATE TABLE `course` (
  `cid` int(11) NOT NULL,
  `cname` varchar(64) NOT NULL,
  `hit` int(11) NOT NULL DEFAULT '0',
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cdesc` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `course`
--

INSERT INTO `course` (`cid`, `cname`, `hit`, `mtime`, `cdesc`) VALUES
(1, 'IM', 11, '2016-01-04 09:58:47', '這是IM的課程。'),
(2, 'PHP', 10, '2016-01-04 08:55:37', '這是PHP的課程。'),
(3, 'C', 7, '2016-01-04 09:48:14', '這是C的課程。'),
(4, 'CSS', 26, '2016-01-04 09:58:15', '鴨霸教的課'),
(5, 'CCNA', 13, '2015-12-23 03:03:59', '老師很不會教的課');

-- --------------------------------------------------------

--
-- 資料表結構 `dump`
--

CREATE TABLE `dump` (
  `did` int(11) NOT NULL,
  `cname` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `dname` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `teacher` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `type` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `semester` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `provider` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `trust` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `dump`
--

INSERT INTO `dump` (`did`, `cname`, `dname`, `teacher`, `type`, `semester`, `provider`, `trust`) VALUES
(5, 'CSS', 'dumps.docx', '杜拉拉', '期末考', '104', '鴨霸', 0),
(6, 'CSS', 'dumps_鴨霸_104.docx', '杜拉拉', '期末考', '104', '鴨霸', 0),
(7, 'IM', 'Lab1 4_鴨霸_104.40020147 程泳豪(W2)', '杜拉拉', '期末考', '104', '鴨霸', 0),
(8, 'PHP', 'dumps_肌肉姚_105.docx', '拉肚肚', '期末考', '105', '肌肉姚', 3),
(9, 'CCNA', 'dumps_Wade_111.docx', '杜拉拉', '期末考', '111', 'Wade', 3),
(11, 'CSS', '117-101_h_111.pdf', 'h', '期中考', '111', 'h', 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- 資料表索引 `dump`
--
ALTER TABLE `dump`
  ADD PRIMARY KEY (`did`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- 使用資料表 AUTO_INCREMENT `dump`
--
ALTER TABLE `dump`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;