-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- 主機: localhost:3306
-- 建立日期: 2016 年 10 月 29 日 17:24
-- 伺服器版本: 5.5.52-cll
-- PHP 版本: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `jomorcom_boardgame`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
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

CREATE TABLE IF NOT EXISTS `chat` (
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
(17, 'pipi', '皮皮君', '16:59:01', '0 0 '),
(17, 'pipi', '皮皮君', '16:59:05', '0 0 '),
(17, 'pipi', '皮皮君', '16:59:14', '0 0 ');

-- --------------------------------------------------------

--
-- 資料表結構 `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `game` text NOT NULL,
  `type` text NOT NULL,
  `participant` varchar(2) NOT NULL,
  `difficulty` text NOT NULL,
  `content` text NOT NULL,
  `detail` text NOT NULL,
  `age` varchar(2) NOT NULL,
  `agent` text NOT NULL,
  `pic` varchar(100) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 資料表結構 `judge`
--

CREATE TABLE IF NOT EXISTS `judge` (
  `judger` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `be judged` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
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
(17, 20, '皮皮君', 'pipi', 'uncleben006@gmail.com', 'pipi.png'),
(18, 3, '皮皮君', 'pipi', 'uncleben006@gmail.com', 'pipi.png');

-- --------------------------------------------------------

--
-- 資料表結構 `remind`
--

CREATE TABLE IF NOT EXISTS `remind` (
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

CREATE TABLE IF NOT EXISTS `room` (
  `no` int(3) NOT NULL AUTO_INCREMENT,
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
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- 資料表的匯出資料 `room`
--

INSERT INTO `room` (`no`, `decide`, `host`, `room`, `store`, `x`, `y`, `game`, `date`, `time`, `time2`, `people`, `spend`, `remark`) VALUES
(17, 0, 'pipi', '來喔測試看看中文', 'swan caf''e', 25.0884, 121.464, '爽爽', '2016-10-31', '15:16:00', '15:16:00', '20', '爽爽', '幹~~'),
(18, 0, 'pipi', '可以揪團嗎?', 'swan caf''e', 25.0884, 121.464, '3', '2016-10-30', '15:16:00', '15:16:00', '3', '3', '3');

-- --------------------------------------------------------

--
-- 資料表結構 `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `storePlace` text COLLATE utf8_unicode_ci NOT NULL,
  `storeName` text COLLATE utf8_unicode_ci NOT NULL,
  `storeType` text COLLATE utf8_unicode_ci NOT NULL,
  `storeArea` text COLLATE utf8_unicode_ci NOT NULL,
  `storeAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `storeNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `storeSpend` text COLLATE utf8_unicode_ci NOT NULL,
  `storeTime` text COLLATE utf8_unicode_ci NOT NULL,
  `storeHoliday` text COLLATE utf8_unicode_ci NOT NULL,
  `webURL` text COLLATE utf8_unicode_ci NOT NULL,
  `fbURL` text COLLATE utf8_unicode_ci NOT NULL,
  `googleURL` longtext COLLATE utf8_unicode_ci NOT NULL,
  `storePhoto` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `store`
--

INSERT INTO `store` (`storePlace`, `storeName`, `storeType`, `storeArea`, `storeAddress`, `storeNumber`, `storeSpend`, `storeTime`, `storeHoliday`, `webURL`, `fbURL`, `googleURL`, `storePhoto`) VALUES
('台北市', '女巫店', '複合式餐飲桌遊店', '', '106台灣台北市大安區新生南路三段56巷7號', '02-2369-2528', '一般時段每人最低消費150元', '週日－週三 SUN-WED 10:00-23:00 週四－週六 THU-SAT 10:00-24:00', '無', 'http://www.witchhouse.org/', 'https://zh-tw.facebook.com/%E5%A5%B3%E5%B7%AB%E5%BA%97-133362243371354/', 'https://www.google.com/maps/place/106%E5%8F%B0%E7%81%A3%E5%8F%B0%E5%8C%97%E5%B8%82%E5%A4%A7%E5%AE%89%E5%8D%80%E6%96%B0%E7%94%9F%E5%8D%97%E8%B7%AF%E4%B8%89%E6%AE%B556%E5%B7%B77%E8%99%9F/@25.0204987,121.5314723,17z/data=!3m1!4b1!4m5!3m4!1s0x3442a988fc4f7b2d:0xae67410731144b1a!8m2!3d25.0204987!4d121.533661', 'taipei01.jpg'),
('台北市', 'Swan Cafe 天鵝桌遊館', '複合式餐飲桌遊店', '', '116台灣台北市文山區羅斯福路五段170巷37號', '02-2930-8983', '每人每時段低消150元', '每日10:00-22:00(早場10-14、午場14-18、晚場18-22)', '無', '無', 'https://www.facebook.com/Swancafe-%E5%A4%A9%E9%B5%9D%E6%A1%8C%E9%81%8A%E9%A4%A8-1062378480487075/', 'https://www.google.com/maps/place/116%E5%8F%B0%E7%81%A3%E5%8F%B0%E5%8C%97%E5%B8%82%E6%96%87%E5%B1%B1%E5%8D%80%E7%BE%85%E6%96%AF%E7%A6%8F%E8%B7%AF%E4%BA%94%E6%AE%B5170%E5%B7%B737%E8%99%9F/@25.0046889,121.5344118,17z/data=!3m1!4b1!4m5!3m4!1s0x3442a9f626a7f0b1:0xab8269ee9dfb4b34!8m2!3d25.0046889!4d121.5366005', 'taipei02.jpg'),
('臺北市', '萊思樂-桌上遊戲休閒空間', '複合式餐飲桌遊店', '臺北市士林區', '臺灣臺北市士林區士東路95號3樓', '(02)2874-0262', '平日: 會 員 : 1小時 30 元 ， 包日 120 元。 非會員: 1小時 40 元 ， 包日 160 元。 假日: 會 員 : 1小時 40 元 ， 包日 160 元。 非會員: 1小時 50 元 ， 包日 200 元。', '週一：13:30~21:00<br>週二：13:30~21:00<br>週四：13:30~21:00<br>週五：13:30~21:00<br>週六：13:30~21:00<br>週日：13:30~21:00', '每週三公休', '無', 'https://www.facebook.com/LetsLearn.BGspace/', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3612.691390838903!2d121.52710461500786!3d25.112305983935684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442ae84451bc5e3%3A0x6a26497c560cd8a7!2zMTEx5Y-w54Gj5Y-w5YyX5biC5aOr5p6X5Y2A5aOr5p2x6LevOTXomZ8!5e0!3m2!1szh-TW!2s!4v1477656469033', 'taipei03.jpg'),
('臺北市', 'Legend Fun 樂聚坊桌上遊戲', '桌遊專門店', '臺北市士林區', '臺灣臺北市士林區中山北路五段505巷44弄2號', '(02)2883-0357', '40元/hr 優惠100元/3hr', '週ㄧ：16:00-22:00<br> 週二：16:00-22:00<br> 週三：16:00-22:00<br> 週四：16:00-22:00<br> 週五：16:00-22:00<br> 週六：13:00-22:00<br> 週日：13:00-22:00', '無', '無', 'https://www.facebook.com/LegendFun/', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.2500387989385!2d121.5243613150074!3d25.093395983944585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442aea4a6e90c67%3A0x9c2c1ec199322cc!2zMTEx5Y-w54Gj5Y-w5YyX5biC5aOr5p6X5Y2A5Lit5bGx5YyX6Lev5LqU5q61NTA15be3NDTlvIQy6Jmf!5e0!3m2!1szh-TW!2s!4v1477656489983', 'taipei04.jpg'),
('雲林縣', '玩坊MoreFun（斗六店）', '複合式餐飲桌遊店', '雲林縣斗六市', '臺灣雲林縣斗六市上海路174-2號', '(05)533-3038', '平日每人/每小時/$30<br> 假日及國定假日/每人/每小時/$40<br> 飲料無限暢飲', '週二： 16:00 - 23:00<br> 週三： 16:00 - 23:00<br> 週四： 16:00 - 23:00<br> 週五： 13:15 - 23:00<br> 週六： 13:15 - 23:00<br> 週日： 13:15 - 23:00', '週一', 'http://www.morefun.com.tw/login', 'https://www.facebook.com/morefun.yunlin/?fref=ts', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.966089287429!2d120.53739631498068!3d23.7129049846078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346ec830019f237b%3A0x69b7668271687056!2zNjQw5Y-w54Gj6Zuy5p6X57ij5paX5YWt5biC5LiK5rW36LevMTc0LTLomZ8!5e0!3m2!1szh-TW!2s!4v1477658884403', 'cloud01.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
  `goodAt` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`account`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`no`, `pri`, `account`, `password`, `name`, `email`, `introduction`, `photo`, `gender`, `favorite`, `goodAt`) VALUES
('009YF', 0, '000', '000', '000', 'uncleben006@gmail.com', '源源', '474525.jpg', '', '000', '000'),
('666WI', 2, '0606', '0606', 'WII', 'wii840606@gmail.com', 'hihi', '99809.jpg', '女', '', ''),
('006GQ', 0, '111', '111', '你怎麼沒暱稱', 'uncleben006@gmail.com', '哈哈哈', '625589.png', '', '222', '222'),
('666LM', 2, '1114', '1114', '俐孟', 'aavail007@gmail.com', '哈哈', '', '', '', ''),
('003MG', 1, '222', '222', '阿元元阿', 'uncleben006@gmail.com', 'ㄎㄎㄎ', '704642.png', '男', '桌末狂歡', '沒有QQ幫QQ'),
('007XJ', 0, '333', '333', '超過五個字', 'uncleben006@gmail.com', '', 'iMac-icon.png', '', '', ''),
('007FW', 1, '777', '777', '元元', 'uncleben004@gmail.com', '源源元', '45724.jpg', '', '', ''),
('008IM', 0, '888', '888', '安安你好', 'uncleben006@gmail.com', '安安你好安安你好', '637052.png', '', '牛頭人~', '沒有哈哈'),
('009UE', 1, '999', '999', '源源', 'uncleben006@gmail.com', '999', 'iMac-icon.png', '', '', ''),
('008PF', 1, 'abc', 'abc', 'abc', 'uncleben006@gmail.com', 'abc', '660161.jpg', '', '', ''),
('010UN', 0, 'benny', 'benny', 'Ben', 'uncleben006@gmail.com', '我喜歡虧妹', '813724.jpg', '', '', ''),
('015DH', 1, 'iii', 'iii', '郭信凱', 'uncleben006@gmail.com', 'LOOOOOOOOOL', '551566.jpg', '男', 'LOL', 'LOL'),
('011ZX', 2, 'pipi', 'pipi', '皮皮君', 'uncleben006@gmail.com', '我是管理員', 'pipi.png', '', '', ''),
('666UB', 2, 'uncleben006', 'ken0426', '王柏元', 'uncleben006@gmail.com', '我是管理員', '57173.jpg', '男', '電力公司', '阿瓦隆'),
('666SU', 2, 'vivi', 'vivi', '熊哥', 'vivian901641@gmail.com', '我是管理員', '832729.png', '其他', 'CSI犯罪現場', '德國心臟病');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
