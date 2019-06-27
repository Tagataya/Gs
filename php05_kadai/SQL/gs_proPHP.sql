-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 6 月 27 日 20:50
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
-- Database: `gs_proPHP`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_member`
--

CREATE TABLE `dat_member` (
  `code` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postal1` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `postal2` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `danjo` int(11) NOT NULL,
  `born` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `dat_member`
--

INSERT INTO `dat_member` (`code`, `date`, `password`, `name`, `email`, `postal1`, `postal2`, `address`, `tel`, `danjo`, `born`) VALUES
(1, '2019-06-27 10:44:34', '1a1dc91c907325c69271ddf0c944bc72', '家氏 高雄', 'takao@ieuji.co.jp', '171', '0051', '東京都豊島区長崎９−９−９', '080-2559-9999', 1, 1980),
(4, '2019-06-27 10:53:00', '1a1dc91c907325c69271ddf0c944bc72', '植村 弘明', 'hiroaki@uemura.jp', '155', '9999', '千葉県佐倉市佐倉９−１０', '080-9989-9999', 1, 1970),
(5, '2019-06-27 10:55:14', '1a1dc91c907325c69271ddf0c944bc72', '北村 新一', 'shiniti@kitamura.jp', '199', '9999', '東京都港区青山１−１', '080-9799-9999', 1, 1960);

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_sales`
--

CREATE TABLE `dat_sales` (
  `code` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `code_member` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postal1` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `postal2` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(13) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `dat_sales`
--

INSERT INTO `dat_sales` (`code`, `date`, `code_member`, `name`, `email`, `postal1`, `postal2`, `address`, `tel`) VALUES
(1, '2019-06-26 12:07:58', 0, 'サイトウトモヒデ', 'tgty.tmhd@i.softbank.jp', '171', '0051', '西池袋5-5-21-2208', '03-3288-5505'),
(2, '2019-06-26 14:09:09', 0, '内田 孝之', 'uchida@gmail.com', '171', '0021', '東京都豊島区西池袋', '03-3955-5585'),
(3, '2019-06-26 14:20:28', 0, '加藤 一郎', 'ichirou@ybb.ne.jp', '414', '0001', '静岡県伊東市宇佐美', '0557-48-9199'),
(4, '2019-06-26 14:22:38', 0, '石田 英樹', 'ishiishi@yahoo.co.jp', '255', '3314', '埼玉県所沢市くすのき台１', '0429-26-2443'),
(5, '2019-06-27 07:36:55', 0, '木村 和義', 'kimura@ybb.ne.jp', '656', '1123', '埼玉県さいたま市浦和東５−１', '090-9999-9999'),
(6, '2019-06-27 09:43:12', 0, '上田 ゆうじ', 'yuji@gmail.com', '717', '171', '大阪府堺市堺１−１−１', '070-2155-9999'),
(7, '2019-06-27 10:44:34', 1, '家氏 高雄', 'takao@ieuji.co.jp', '171', '0051', '東京都豊島区長崎９−９−９', '080-2559-9999'),
(10, '2019-06-27 10:53:00', 4, '植村 弘明', 'hiroaki@uemura.jp', '155', '9999', '千葉県佐倉市佐倉９−１０', '080-9989-9999'),
(11, '2019-06-27 10:55:14', 5, '北村 新一', 'shiniti@kitamura.jp', '199', '9999', '東京都港区青山１−１', '080-9799-9999'),
(12, '2019-06-27 11:39:12', 1, '家氏 高雄', 'takao@ieuji.co.jp', '171', '0051', '東京都豊島区長崎９−９−９', '080-2559-9999'),
(13, '2019-06-27 11:42:50', 1, '家氏 高雄', 'takao@ieuji.co.jp', '171', '0051', '東京都豊島区長崎９−９−９', '080-2559-9999'),
(14, '2019-06-27 11:49:20', 4, '植村 弘明', 'hiroaki@uemura.jp', '155', '9999', '千葉県佐倉市佐倉９−１０', '080-9989-9999');

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_sales_product`
--

CREATE TABLE `dat_sales_product` (
  `code` int(11) NOT NULL,
  `code_sales` int(11) NOT NULL,
  `code_product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `dat_sales_product`
--

INSERT INTO `dat_sales_product` (`code`, `code_sales`, `code_product`, `price`, `quantity`) VALUES
(1, 1, 5, 60, 9),
(2, 1, 7, 70, 2),
(3, 1, 11, 25, 3),
(4, 1, 16, 30, 1),
(5, 2, 5, 60, 3),
(6, 2, 9, 40, 5),
(7, 3, 9, 40, 3),
(8, 3, 11, 25, 2),
(9, 3, 15, 40, 4),
(10, 3, 16, 30, 2),
(11, 4, 5, 60, 2),
(12, 4, 8, 80, 1),
(13, 4, 10, 30, 4),
(14, 4, 11, 25, 5),
(15, 5, 6, 80, 3),
(16, 5, 12, 15, 3),
(17, 6, 7, 70, 3),
(18, 6, 14, 30, 4),
(19, 6, 16, 30, 7),
(20, 7, 6, 80, 2),
(21, 7, 9, 40, 2),
(26, 10, 8, 80, 5),
(27, 10, 9, 40, 4),
(28, 10, 13, 35, 3),
(29, 11, 5, 60, 2),
(30, 11, 8, 80, 2),
(31, 11, 13, 35, 2),
(32, 12, 5, 60, 1),
(33, 12, 6, 80, 1),
(34, 12, 13, 35, 1),
(35, 13, 9, 40, 1),
(36, 13, 11, 25, 1),
(37, 13, 15, 40, 1),
(38, 13, 16, 30, 1),
(39, 14, 5, 60, 3),
(40, 14, 8, 80, 3),
(41, 14, 11, 25, 3);

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_product`
--

CREATE TABLE `mst_product` (
  `code` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `gazou` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `mst_product`
--

INSERT INTO `mst_product` (`code`, `name`, `price`, `gazou`) VALUES
(5, 'じゃがいも', 60, 'jaga.jpg'),
(6, 'アスパラ', 80, 'aspara.jpg'),
(7, 'トマト', 70, 'tomato.jpg'),
(8, '長ネギ', 80, 'negi.jpg'),
(9, 'にんじん', 40, 'ninjin.jpg'),
(10, 'ピーマン', 30, 'piman.jpg'),
(11, '玉ねぎ', 25, 'tamanegi.jpg'),
(12, 'きゅうり', 15, 'kyuri.jpg'),
(13, 'ブロッコリー', 35, 'broccoli.jpg'),
(14, 'だいこん', 30, 'daikon.jpg'),
(15, 'ナス', 40, 'nasu.jpg'),
(16, 'ほうれん草', 30, 'horenso.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_staff`
--

CREATE TABLE `mst_staff` (
  `code` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `mst_staff`
--

INSERT INTO `mst_staff` (`code`, `name`, `password`) VALUES
(1, '齊藤 朝秀', '1a1dc91c907325c69271ddf0c944bc72'),
(2, '加藤 清正', 'cd0acfe085eeb0f874391fb9b8009bed'),
(3, '平田 次郎', '1a1dc91c907325c69271ddf0c944bc72'),
(5, '内村 敏行', '1a1dc91c907325c69271ddf0c944bc72'),
(6, '藤原 蒼汰', '1a1dc91c907325c69271ddf0c944bc72'),
(7, '織田 信長', '1a1dc91c907325c69271ddf0c944bc72'),
(8, '徳川 家康', '1a1dc91c907325c69271ddf0c944bc72');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dat_member`
--
ALTER TABLE `dat_member`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `dat_sales`
--
ALTER TABLE `dat_sales`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `dat_sales_product`
--
ALTER TABLE `dat_sales_product`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `mst_product`
--
ALTER TABLE `mst_product`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `mst_staff`
--
ALTER TABLE `mst_staff`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dat_member`
--
ALTER TABLE `dat_member`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dat_sales`
--
ALTER TABLE `dat_sales`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dat_sales_product`
--
ALTER TABLE `dat_sales_product`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `mst_product`
--
ALTER TABLE `mst_product`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mst_staff`
--
ALTER TABLE `mst_staff`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
