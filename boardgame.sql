-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-10-21 23:24:45
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
(59, '', '安安', '01:28:27', '安安');

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
(11, 6, '元元', '777', 'uncleben004@gmail.com', '45724.jpg'),
(11, 0, '阿元元阿', '222', 'uncleben006@gmail.com', '704642.png'),
(12, 2, '皮皮君', 'pipi', 'uncleben006@gmail.com', 'pipi.png');

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
(9, '222', 'uncleben006@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e'),
(9, '111', 'uncleben006@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e'),
(9, '111', 'uncleben006@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e'),
(9, '777', 'uncleben004@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e'),
(9, '000', 'uncleben006@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e'),
(9, '333', 'uncleben006@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e'),
(9, '999', 'uncleben006@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e'),
(9, '888', 'uncleben006@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e'),
(9, 'iii', 'uncleben006@gmail.com', '222', '測試可以重複登入的問題', '2016-10-19', '15:16:00', 'swan caf''e');

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
(11, 0, '777', '再開一間', 'swan caf''e', 25.0884, 121.464, '6', '2016-10-22', '19:19:00', '19:19:00', '6', '6', '6'),
(12, 0, 'pipi', '1231', 'swan caf''e', 25.0884, 121.464, '2', '2016-10-28', '15:59:00', '15:16:00', '2', '2', '2');

-- --------------------------------------------------------

--
-- 資料表結構 `store`
--

CREATE TABLE `store` (
  `storePlace` text COLLATE utf8_unicode_ci NOT NULL,
  `storeName` text COLLATE utf8_unicode_ci NOT NULL,
  `storeType` text COLLATE utf8_unicode_ci NOT NULL,
  `storeAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `storeNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `storeSpend` text COLLATE utf8_unicode_ci NOT NULL,
  `storeTime` text COLLATE utf8_unicode_ci NOT NULL,
  `storeHoliday` text COLLATE utf8_unicode_ci NOT NULL,
  `storeTraffic` text COLLATE utf8_unicode_ci NOT NULL,
  `webURL` text COLLATE utf8_unicode_ci NOT NULL,
  `fbURL` text COLLATE utf8_unicode_ci NOT NULL,
  `googleURL` text COLLATE utf8_unicode_ci NOT NULL,
  `x` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `y` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `storePhoto` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `store`
--

INSERT INTO `store` (`storePlace`, `storeName`, `storeType`, `storeAddress`, `storeNumber`, `storeSpend`, `storeTime`, `storeHoliday`, `storeTraffic`, `webURL`, `fbURL`, `googleURL`, `x`, `y`, `storePhoto`) VALUES
('台北市', '女巫店', '複合式餐飲桌遊店', '106台灣台北市大安區新生南路三段56巷7號', '02-2369-2528', '一般時段每人最低消費150元', '週日－週三 SUN-WED 10:00-23:00 週四－週六 THU-SAT 10:00-24:00', '無', '捷運：綠線公館站・3號台灣大學出口 公車：公務人力訓練中心站', 'http://www.witchhouse.org/', 'https://zh-tw.facebook.com/%E5%A5%B3%E5%B7%AB%E5%BA%97-133362243371354/', 'https://www.google.com/maps/place/106%E5%8F%B0%E7%81%A3%E5%8F%B0%E5%8C%97%E5%B8%82%E5%A4%A7%E5%AE%89%E5%8D%80%E6%96%B0%E7%94%9F%E5%8D%97%E8%B7%AF%E4%B8%89%E6%AE%B556%E5%B7%B77%E8%99%9F/@25.0204987,121.5314723,17z/data=!3m1!4b1!4m5!3m4!1s0x3442a988fc4f7b2d:0xae67410731144b1a!8m2!3d25.0204987!4d121.533661', '25.0204987', '121.533661', 'taipei01.jpg'),
('台北市', 'Swan Cafe 天鵝桌遊館', '複合式餐飲桌遊店', '116台灣台北市文山區羅斯福路五段170巷37號', '02-2930-8983', '每人每時段低消150元', '每日10:00-22:00(早場10-14、午場14-18、晚場18-22)', '無', '捷運綠線「萬隆站」4號出口出站左轉，羅斯福路上直走約500公尺到羅斯福路五段170巷 (到天橋下[安泰銀行]旁邊的巷子左轉，170巷上直走約250公尺到Seven Eleven之後左轉，直走約8.88公尺往左邊看[SWAN CAFE]在你的面前。', '無', 'https://www.facebook.com/Swancafe-%E5%A4%A9%E9%B5%9D%E6%A1%8C%E9%81%8A%E9%A4%A8-1062378480487075/', 'https://www.google.com/maps/place/116%E5%8F%B0%E7%81%A3%E5%8F%B0%E5%8C%97%E5%B8%82%E6%96%87%E5%B1%B1%E5%8D%80%E7%BE%85%E6%96%AF%E7%A6%8F%E8%B7%AF%E4%BA%94%E6%AE%B5170%E5%B7%B737%E8%99%9F/@25.0046889,121.5344118,17z/data=!3m1!4b1!4m5!3m4!1s0x3442a9f626a7f0b1:0xab8269ee9dfb4b34!8m2!3d25.0046889!4d121.5366005', '25.0046889', '121.5366005', 'taipei02.jpg');

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
('006GQ', 0, '111', '111', '你怎麼沒暱稱', 'uncleben006@gmail.com', '哈哈哈', '625589.png', '', '222', '222'),
('003MG', 1, '222', '222', '阿元元阿', 'uncleben006@gmail.com', 'ㄎㄎㄎ', '704642.png', '男', '桌末狂歡', '沒有QQ幫QQ'),
('007XJ', 0, '333', '333', '超過五個字', 'uncleben006@gmail.com', '', 'iMac-icon.png', '', '', ''),
('007FW', 1, '777', '777', '元元', 'uncleben004@gmail.com', '源源元', '45724.jpg', '', '', ''),
('008IM', 0, '888', '888', '安安你好', 'uncleben006@gmail.com', '安安你好安安你好', '637052.png', '', '牛頭人~', '沒有哈哈'),
('009UE', 1, '999', '999', '源源', 'uncleben006@gmail.com', '999', 'iMac-icon.png', '', '', ''),
('008PF', 1, 'abc', 'abc', 'abc', 'uncleben006@gmail.com', 'abc', '660161.jpg', '', '', ''),
('010UN', 0, 'benny', 'benny', 'Ben', 'uncleben006@gmail.com', '我喜歡虧妹', '813724.jpg', '', '', ''),
('015DH', 1, 'iii', 'iii', '郭信凱', 'uncleben006@gmail.com', 'LOOOOOOOOOL', '551566.jpg', '男', 'LOL', 'LOL'),
('011ZX', 2, 'pipi', 'pipi', '皮皮君', 'uncleben006@gmail.com', '我是管理員', 'pipi.png', '', '', '');

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
  MODIFY `no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
