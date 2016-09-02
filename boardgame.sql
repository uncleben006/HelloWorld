-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-09-02 04:18:42
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

--
-- 資料表的匯出資料 `game`
--

INSERT INTO `game` (`no`, `game`, `type`, `participant`, `difficulty`, `content`, `detail`, `age`, `agent`, `pic`) VALUES
(7, 'çŸ®äººç¤¦å‘', 'æ¶å¯¶è—é¡ž', '5~', 'è¶…ç°¡å–®!', 'çŸ®äººã€ç²¾ç¤¦', 'æ‹¿åˆ°é‡‘ç¤¦', '3æ', 'å¿˜è¨˜æƒ¹', '596108.jpg'),
(8, '1', '1', '1', '1', '1', '1', '1', '1', '309072.jpg'),
(9, '2', '2', '2', '2', '2', '2', '22', '2', '350625.jpg'),
(10, '3', '3', '3', '3', '3', '3', '3', '3', '836742.jpg');

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
  `introduction` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`no`, `pri`, `account`, `password`, `name`, `email`, `introduction`) VALUES
('001BJ', 1, 'ben0426', 'zxcv', '阿元元阿', 'uncleben006@gmail.com', '元元ㄚㄚ'),
('002PM', 1, '111', '111', '111', 'uncleben006@gmail.com', 'kdjeml'),
('003MZ', 1, '222', '111', '111', 'uncleben006@gmail.com', '123');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`no`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `game`
--
ALTER TABLE `game`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
