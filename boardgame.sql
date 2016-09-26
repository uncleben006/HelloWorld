-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-09-18 16:15:22
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `boardgame`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `no` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `pri` int(11) NOT NULL,
  `account` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `admin`
--

INSERT INTO `admin` (`no`, `pri`, `account`, `password`, `name`, `email`, `introduction`) VALUES
('admin', 2, 'uncleben006', 'a102070017', '王柏元', 'uncleben006@gmail.com', '你好我是管理員');

-- --------------------------------------------------------

--
-- 資料表結構 `game`
--

CREATE TABLE `game` (
  `no` int(10) NOT NULL,
  `game` text NOT NULL,
  `type` text NOT NULL,
  `participant` varchar(2) NOT NULL,
  `difficulty` text NOT NULL,
  `content` text NOT NULL,
  `detail` text NOT NULL,
  `age` varchar(2) NOT NULL,
  `agent` text NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `room`
--

CREATE TABLE `room` (
  `no` int(3) NOT NULL,
  `host` varchar(20) NOT NULL,
  `room` text COLLATE utf8_unicode_ci NOT NULL,
  `store` text COLLATE utf8_unicode_ci NOT NULL,
  `game` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `people` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `spend` text COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `room`
--

INSERT INTO `room` (`no`, `room`, `store`, `game`, `date`, `time`, `people`, `spend`, `remark`) VALUES
(16, '快進來阿肥宅! ', '#', '矮人礦坑', '2016-09-14', '13:30:00', '3', '50/hr', '無'),
(18, '進來裡面有正妹', '#', '說謊大師', '2016-09-14', '15:00:00', '3', '30/hr', '騙你的ㄎㄎ'),
(19, 'ㄚㄚㄚㄚㄚ', '#', '矮人礦坑', '2016-09-21', '05:30:00', '5', '50/hr', '嗚嗚嗚');

-- --------------------------------------------------------

--
-- 資料表結構 `room16`
--

CREATE TABLE `room16` (
  `people` int(2) NOT NULL,
  `name` text NOT NULL,
  `account` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `room16`
--

INSERT INTO `room16` (`people`, `name`, `account`, `photo`) VALUES
(3, '222', '222', '428032.jpg'),
(3, '幹幹幹', '333', 'fuck-you.png'),
(3, '阿元元阿', '555', '715800.jpg'),
(3, 'ㄚㄚㄚ', '888', 'fuck-you.png');

-- --------------------------------------------------------

--
-- 資料表結構 `room18`
--

CREATE TABLE `room18` (
  `people` int(2) NOT NULL,
  `name` text NOT NULL,
  `account` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `room18`
--

INSERT INTO `room18` (`people`, `name`, `account`, `photo`) VALUES
(3, 'ㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚㄚ', '555', '715800.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `room19`
--

CREATE TABLE `room19` (
  `people` int(2) NOT NULL,
  `name` text NOT NULL,
  `account` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `room19`
--

INSERT INTO `room19` (`people`, `name`, `account`, `photo`) VALUES
(5, '222', '222', '428032.jpg'),
(5, '安安', '555', 'fuck-you.png');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `no` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `pri` int(11) NOT NULL,
  `account` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`no`, `pri`, `account`, `password`, `name`, `email`, `introduction`, `photo`) VALUES
('001MH', 0, '000', '000', '元', 'uncleben006@gmail.com', '沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷沒驗證過唷', ''),
('003MG', 1, '222', '222', '222', 'uncleben006@gmail.com', '222', '428032.jpg'),
('004XL', 1, '333', '333', '幹幹幹', 'uncleben006@gmail.com', '幹幹幹', 'fuck-you.png'),
('004GB', 1, '111', '111', '源源元', 'uncleben006@gmail.com', '源源元', ''),
('005JM', 0, '444', '444', '源源元源源', 'uncleben006@gmail.com', '源源元元', 'fuck-you.png'),
('006UU', 1, '555', '555', '安安', 'uncleben006@gmail.com', '安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安', 'fuck-you.png'),
('', 1, '', '', '', '', '', ''),
('008XS', 0, '888', '888', 'ㄚㄚㄚ', 'uncleben006@gmail.com', 'ㄚㄚㄚ', 'fuck-you.png');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`no`);

--
-- 資料表索引 `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`no`);

--
-- 資料表索引 `room16`
--
ALTER TABLE `room16`
  ADD PRIMARY KEY (`account`);

--
-- 資料表索引 `room18`
--
ALTER TABLE `room18`
  ADD PRIMARY KEY (`account`);

--
-- 資料表索引 `room19`
--
ALTER TABLE `room19`
  ADD PRIMARY KEY (`account`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `game`
--
ALTER TABLE `game`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `room`
--
ALTER TABLE `room`
  MODIFY `no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
