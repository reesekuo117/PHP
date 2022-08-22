-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 08 月 17 日 08:56
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `mytest`
--

-- --------------------------------------------------------

--
-- 資料表結構 `address_book`
--

CREATE TABLE `address_book` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `address_book`
--

INSERT INTO `address_book` (`sid`, `name`, `mobile`, `email`, `birthday`, `address`, `created_at`) VALUES
(NULL, '橘胖', '0987654321', 'ming@gmail.com', '2015-04-30', '新北市', '2022-08-16 05:56:59'),
(NULL, '花胖', '0987654321', 'ming@gmail.com', '2015-04-30', '新北市', '2022-08-16 05:56:59'),
(NULL, '橘胖3', '0987654321', 'ming@gmail.com', '2015-04-30', '新北市', '2022-08-16 05:56:59'),
(NULL, '橘胖2', '0987654321', 'ming@gmail.com', NULL, '新北市', '2022-08-16 05:56:59'),
(NULL, '橘胖2', '0987654322', 'ming@gmail.com', NULL, '新北市', '2022-08-16 05:56:59');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `address_book`
--
ALTER TABLE `address_book`
  ADD PRIMARY KEY (`sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `address_book`
--
ALTER TABLE `address_book`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
