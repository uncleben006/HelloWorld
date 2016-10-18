-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-10-18 08:56:19
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
  `account` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` char(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `now` time NOT NULL,
  `chat` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `chat`
--

INSERT INTO `chat` (`no`, `account`, `name`, `now`, `chat`) VALUES
(38, '', '源源水源市場原', '22:02:39', '安安~'),
(38, '', '源源水源市場原', '22:02:42', '安安~'),
(57, '', '222', '01:22:21', '安安'),
(57, '', '安安', '01:31:52', '幹嘛?'),
(59, '', '安安', '01:28:27', '安安'),
(9, '', '222', '02:56:58', '機掰鎖屁鎖'),
(9, '222', '爽啦!!', '03:20:23', '安安');

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
(9, 20, '爽啦!!', '222', 'uncleben006@gmail.com', '360473.png'),
(9, 20, '你怎麼沒暱稱', '111', 'uncleben006@gmail.com', 'fuck-you.png'),
(9, 20, '你怎麼沒暱稱', '111', 'uncleben006@gmail.com', 'fuck-you.png'),
(9, 20, '元元', '777', 'uncleben004@gmail.com', '45724.jpg'),
(9, 20, '000', '000', 'uncleben006@gmail.com', '474525.jpg'),
(9, 20, '超過五個字', '333', 'uncleben006@gmail.com', 'iMac-icon.png'),
(9, 0, '源源', '999', 'uncleben006@gmail.com', 'iMac-icon.png'),
(9, 0, '安安你好', '888', 'uncleben006@gmail.com', '637052.png'),
(10, 8, '000', '000', 'uncleben006@gmail.com', '474525.jpg'),
(10, 0, '爽啦!!', '222', 'uncleben006@gmail.com', '360473.png'),
(11, 6, '元元', '777', 'uncleben004@gmail.com', '45724.jpg'),
(11, 0, '爽啦!!', '222', 'uncleben006@gmail.com', '360473.png');

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
  `date` date NOT NULL,
  `time` time NOT NULL,
  `store` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `remind`
--

INSERT INTO `remind` (`no`, `account`, `email`, `host`, `room`, `date`, `time`, `store`) VALUES
(9, '222', 'uncleben006@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e'),
(9, '111', 'uncleben006@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e'),
(9, '111', 'uncleben006@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e'),
(9, '777', 'uncleben004@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e'),
(9, '000', 'uncleben006@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e'),
(9, '333', 'uncleben006@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e'),
(9, '999', 'uncleben006@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e'),
(9, '888', 'uncleben006@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e'),
(10, '000', 'uncleben006@gmail.com', '000', '我來看看提醒能不能跑兩個', '2016-10-19', '18:00:00', 'swan caf''e'),
(10, '222', 'uncleben006@gmail.com', '000', '我來看看提醒能不能跑兩個', '2016-10-19', '18:00:00', 'swan caf''e'),
(11, '777', 'uncleben004@gmail.com', '777', '再開一間', '2016-10-22', '19:19:00', 'swan caf''e'),
(11, '222', 'uncleben006@gmail.com', '777', '再開一間', '2016-10-22', '19:19:00', 'swan caf''e');

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
(9, 1, '222', '測試可以重複登入的問題', 'swan caf''e', 25.0884, 121.464, '乾你什麼事', '2016-10-19', '15:16:00', '15:16:00', '20', '50/hr', '77777777777777777777777777'),
(10, 1, '000', '我來看看提醒能不能跑兩個', 'swan caf''e', 25.0884, 121.464, '爽爽', '2016-10-19', '18:00:00', '20:00:00', '8', '爽爽', '爽爽'),
(11, 1, '777', '再開一間', 'swan caf''e', 25.0884, 121.464, '6', '2016-10-22', '19:19:00', '19:19:00', '6', '6', '6');

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
  `photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` text COLLATE utf8_unicode_ci NOT NULL,
  `favorite` text COLLATE utf8_unicode_ci NOT NULL,
  `goodAt` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`no`, `pri`, `account`, `password`, `name`, `email`, `introduction`, `photo`, `gender`, `favorite`, `goodAt`) VALUES
('009YF', 0, '000', '000', '000', 'uncleben006@gmail.com', '源源', '474525.jpg', '', '000', '000'),
('006GQ', 0, '111', '111', '你怎麼沒暱稱', 'uncleben006@gmail.com', '哈哈哈', '', '', '222', '222'),
('003MG', 1, '222', '222', '爽啦!!', 'uncleben006@gmail.com', '22222222222222222222', '360473.png', '', '桌末狂歡', '沒有QQ幫QQ'),
('007XJ', 0, '333', '333', '超過五個字', 'uncleben006@gmail.com', '', 'iMac-icon.png', '', '', ''),
('007FW', 1, '777', '777', '元元', 'uncleben004@gmail.com', '源源元', '45724.jpg', '', '', ''),
('008IM', 0, '888', '888', '安安你好', 'uncleben006@gmail.com', '安安你好安安你好', '637052.png', '', '牛頭人~', '沒有哈哈'),
('009UE', 1, '999', '999', '源源', 'uncleben006@gmail.com', '999', 'iMac-icon.png', '', '', ''),
('008PF', 1, 'abc', 'abc', 'abc', 'uncleben006@gmail.com', 'abc', '660161.jpg', '', '', ''),
('012AS', 0, 'bbb', 'bbb', 'bbb', 'uncleben006@gmail.com', 'bbbbbb', '', '', 'bbb', 'bbb'),
('010UN', 0, 'benny', 'benny', 'Ben', 'uncleben006@gmail.com', '我喜歡虧妹', '813724.jpg', '', '', ''),
('011EY', 0, 'mmm', 'mmm', 'mmm', 'uncleben006@gmail.com', 'mmm', 'iMac-icon.png', '', '', ''),
('010AJ', 0, 'ooo', 'ooo', 'ooo', 'uncleben006@gmail.com', '999', 'iMac-icon.png', '', '', '');

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
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`account`),
  ADD UNIQUE KEY `account` (`account`);

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
  MODIFY `no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
