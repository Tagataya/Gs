-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 6 月 05 日 20:29
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
(2, '齊藤 朝秀', 'Tagataya', 'e61f341aa660099d51464c501618516a36eb9fca3005fffbad2938a8437b6f0e', 1, 0, '2019-06-05 18:55:22', '2019-06-05 18:55:22'),
(3, '織田 信長', 'odanobu', '506c8e5842d3d03220313755df59d10d11a2eac7cbdee5bf146abb91a844f019', 0, 0, '2019-06-05 18:57:28', '2019-06-05 18:57:28'),
(4, '武田 信玄', 'shingenT', 'a246ab6d7b3543b067746a7826e9e9feaf1228f003641abfc504c77906527ece', 0, 0, '2019-06-05 18:57:50', '2019-06-05 20:25:46'),
(5, '豊臣 秀吉', 'hideToyotomi', 'f81e59aa278ade9ad635babc5c32b6e7d7ba68b9455d511be827038c0c2d494a', 0, 0, '2019-06-05 18:59:01', '2019-06-05 18:59:01'),
(6, '明智 光秀', 'mitsuhideAkechi', '131381adceba8ff0b379514869a1141aa3925efe452377424df8f6d765c7ef08', 0, 0, '2019-06-05 18:59:36', '2019-06-05 18:59:36');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
