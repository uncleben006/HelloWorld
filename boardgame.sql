-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-10-07 18:48:43
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
-- 資料表結構 `chat`
--

CREATE TABLE `chat` (
  `no` int(11) DEFAULT NULL,
  `name` char(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `now` time NOT NULL,
  `chat` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `chat`
--

INSERT INTO `chat` (`no`, `name`, `now`, `chat`) VALUES
(38, '源源水源市場原', '22:02:39', '安安~'),
(38, '源源水源市場原', '22:02:42', '安安~'),
(41, '222', '13:40:35', '安安'),
(41, '222', '13:41:02', '痾痾'),
(41, '源源水源市場原', '21:06:31', '廢物'),
(41, '源源水源市場原', '21:06:40', '安安'),
(41, '源源水源市場原', '21:06:55', '我超強!');

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
-- 資料表結構 `judge`
--

CREATE TABLE `judge` (
  `judger` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `be judged` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `no` int(3) NOT NULL,
  `people` int(2) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `account` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`no`, `people`, `name`, `account`, `email`, `photo`) VALUES
(41, 5, '222', '222', 'uncleben006@gmail.com', '170538.jpg'),
(42, 0, '222', '222', 'uncleben006@gmail.com', '170538.jpg'),
(43, 20, '222', '222', 'uncleben006@gmail.com', '170538.jpg'),
(41, 5, '源源水源市場原', '111', 'uncleben006@gmail.com', '777658.jpg'),
(44, 2, '', '', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `remind`
--

CREATE TABLE `remind` (
  `no` int(3) NOT NULL,
  `account` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `host` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `room` text COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `store` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `remind`
--

INSERT INTO `remind` (`no`, `account`, `email`, `host`, `room`, `time`, `store`) VALUES
(1, '222', 'uncleben006@gmail.com', '555', '555', '2016-10-03 12:12:00', '#'),
(1, '333', 'uncleben006@gmail.com', '555', '555', '2016-10-03 12:12:00', '#'),
(1, '555', 'uncleben006@gmail.com', '555', '555', '2016-10-03 12:12:00', '#'),
(2, '333', 'uncleben006@gmail.com', '333', '33', '2016-10-03 22:22:00', '#'),
(2, '333', 'uncleben006@gmail.com', '333', '33', '2016-10-03 22:22:00', '#');

-- --------------------------------------------------------

--
-- 資料表結構 `room`
--

CREATE TABLE `room` (
  `no` int(3) NOT NULL,
  `decide` int(2) NOT NULL,
  `host` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `room` text COLLATE utf8_unicode_ci NOT NULL,
  `store` text COLLATE utf8_unicode_ci NOT NULL,
  `x` float NOT NULL,
  `y` float NOT NULL,
  `game` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `time2` time NOT NULL,
  `people` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `spend` text COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `room`
--

INSERT INTO `room` (`no`, `decide`, `host`, `room`, `store`, `x`, `y`, `game`, `date`, `time`, `time2`, `people`, `spend`, `remark`) VALUES
(41, 0, '222', '創建房間房主要在裡面', 'swan caf''e', 25.0884, 121.464, '2', '2016-10-08', '15:15:00', '00:00:00', '5', '2', '2'),
(43, 0, '222', '來看看要是超出格式會怎樣', 'swan caf''e', 25.0884, 121.464, '3', '2016-10-08', '15:16:00', '00:00:00', '20', '3', '3'),
(44, 0, '', '123', 'swan caf''e', 25.0884, 121.464, '2', '2016-10-08', '15:15:00', '00:00:00', '2', '2', '2\r\n');

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
('003MG', 1, '222', '222', '222', 'uncleben006@gmail.com', '222', '170538.jpg'),
('004XL', 1, '333', '333', '幹幹幹', 'uncleben006@gmail.com', '幹幹幹', 'fuck-you.png'),
('005JM', 0, '444', '444', '源源元源源', 'uncleben006@gmail.com', '源源元元', 'fuck-you.png'),
('006UU', 1, '555', '555', '安安', 'uncleben006@gmail.com', '安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安安', 'fuck-you.png'),
('008XS', 0, '888', '888', 'ㄚㄚㄚ', 'uncleben006@gmail.com', 'ㄚㄚㄚ', 'fuck-you.png'),
('006YK', 1, '111', '111', '源源水源市場原', 'uncleben006@gmail.com', '元你妹啦~', '777658.jpg'),
('007FW', 1, '777', '777', '元元', 'uncleben004@gmail.com', '源源元', '45724.jpg'),
('008PF', 1, 'abc', 'abc', 'abc', 'uncleben006@gmail.com', 'abc', '660161.jpg'),
('009YF', 0, '000', '000', '111', 'uncleben006@gmail.com', '源源', '634155.jpg');

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
  MODIFY `no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
