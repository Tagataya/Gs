-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 6 月 12 日 20:43
-- サーバのバージョン： 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_db3_kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`, `created`, `updated`) VALUES
(2, '齊藤 朝秀', 'saito', '$2y$10$xnURSv9k8HWkd7W7fdtm/.esBroR7P2t8WwbKLN5BUYQCNU0fVvdG', 1, 0, '2019-06-05 18:55:22', '2019-06-11 21:01:46'),
(3, '織田 信長', 'oda', '$2y$10$fDtXsXZYWsGkbOY/WY8Zm.YFtlixPNvd7muN8a5B22sn3pQxP1miG', 0, 0, '2019-06-05 18:57:28', '2019-06-11 21:02:52'),
(4, '武田 信玄', 'takeda', '$2y$10$jUWKl1g1YGUBzzZe/qzTVOGhDEtl2ULNVHi845ImgVqR5WUtyEmi.', 0, 0, '2019-06-05 18:57:50', '2019-06-11 21:03:35'),
(5, '豊臣 秀吉', 'toyotomi', '$2y$10$vZembfVdToMkAzdpZtCbQeeVOEWxlxMEZzOPyPaQWoLLXwSTCPuni', 0, 0, '2019-06-05 18:59:01', '2019-06-11 21:07:22'),
(6, '明智 光秀', 'akechi', '$2y$10$/8sxLFgjy7NswRR24psqbeXh/iJzzOk7O8EOMYxuXlSjqdbINO8Oq', 0, 0, '2019-06-05 18:59:36', '2019-06-11 21:07:34'),
(7, '徳川 家康', 'tokugawa', '$2y$10$T/40bdGGi5wu1hchBvdRfuJUFGUr.ruFCx7yMa4vxVqeUSi2.Craq', 0, 0, '2019-06-06 09:09:44', '2019-06-12 20:27:55'),
(8, '田中 角栄', 'tanaka', '$2y$10$s7gbM8CegA.Mg5e3qVjqFOyl4Djn.Qy80avMG9UgyqmJJ5Rg49RNS', 0, 0, '2019-06-08 15:12:22', '2019-06-11 21:08:05'),
(12, '安倍 晋三', 'abe', '$2y$10$Fz8AFG.irpqRIJUcuukAsebdnyHwwMdfUNb4kzsxdH0bnce/Fo1eO', 0, 0, '2019-06-12 20:34:36', '2019-06-12 20:34:36'),
(13, '竹中 尚人', 'takenaka', '$2y$10$XuYW69eONr4E.B50hhG0cuo18mh2JDXJeUV13iZOMv0F0sweOTv.i', 0, 0, '2019-06-12 20:35:28', '2019-06-12 20:35:28'),
(14, '萩原 健一', 'hagiwara', '$2y$10$DxSVWDarw36iYuWbKwydReNPdqlgkCQ4oYMeYT7H.XMC.xqaHv5GC', 0, 0, '2019-06-12 20:36:16', '2019-06-12 20:36:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
