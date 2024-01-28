-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-01-28 17:01:02
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `54th_area`
--

-- --------------------------------------------------------

--
-- 資料表結構 `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `remark` text NOT NULL,
  `room` text NOT NULL,
  `firstday` int(11) NOT NULL,
  `lastday` int(11) NOT NULL,
  `create_day` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `email_state` int(1) NOT NULL DEFAULT 1,
  `phone` text NOT NULL,
  `phone_state` int(11) NOT NULL DEFAULT 1,
  `content` text NOT NULL,
  `number` text NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `comment`
--

INSERT INTO `comment` (`id`, `name`, `email`, `email_state`, `phone`, `phone_state`, `content`, `number`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '訪客A', 'aaa@bbb.ccc.com', 1, '0912-132987', 1, '上次去住過感覺還好', '3333', '2024-01-15 15:39:45', '2024-01-25 11:36:52', '2024-01-23 12:35:48'),
(2, '訪客B', 'aaa@bbb.ccc.com', 0, '09-12345678', 0, '上次去住過感覺還好......', '3333', '2024-01-18 14:55:25', '2024-01-23 16:39:50', NULL),
(3, 'test1', 'test1@gmail.com', 1, '0123-456789', 1, 'testcontent', '1234', '2024-01-23 11:57:21', '2024-01-23 12:37:36', NULL),
(4, 'test2', 'test2@gmail.com', 1, '09231548-', 1, 'test2content', '9786', '2024-01-23 11:58:07', '2024-01-23 11:58:07', NULL);

--
-- 觸發器 `comment`
--
DELIMITER $$
CREATE TRIGGER `update_trigger` BEFORE UPDATE ON `comment` FOR EACH ROW SET NEW.update_time = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `account` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `name`, `admin`) VALUES
(1, 'admin', '1234', 'Admin', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
