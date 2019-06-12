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
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `bookname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `author` text COLLATE utf8_unicode_ci NOT NULL,
  `bookurl` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `bookname`, `author`, `bookurl`, `comment`, `created`, `updated`) VALUES
(2, '無限論の教室', '野矢茂樹', 'https://books.google.co.jp/books?id=u0emBQAAQBAJ', '数々のパラドクスに満ちた「無限」の不思議。アキレスはなぜ亀に追いつけないの？ 偶数と自然数が同数って本当？ 素朴な問いからゲーデルの不完全性定理まで、軽やかな笑いにのせて送る異色の“哲学教室”。（講談社現代新書）', '2019-06-04 13:44:03', '2019-06-05 20:14:39'),
(3, '解析概論〔改訂第3版〕: 軽装版', '高木貞治', 'https://books.google.co.jp/books?id=IMBOnQEACAAJ', '数学書のホームラン王，高木貞治（ていじ）の解析概論である．今も現役の教科書と言ってよく，親子三代にわたってファンという人もいるとか．まさに国民的数学書。', '2019-06-04 13:47:09', '2019-06-04 13:47:09'),
(4, 'プログラミングのための線形代数', '平岡和幸, 堀玄', 'https://books.google.co.jp/books?isbn=4274065782', 'ベクトルや行列を扱う線形代数は、CGをはじめとする画像処理プログラミングだけでなく、構造化されたデータを扱うすべての処理の背景となる学問。しかし、抽象的で難解という側面もあり、独学で数学の教科書を紐解くのは困難である。本書は、プログラミングをする人たちに的を絞った構成で、線形代数とそのコンピュータサイエンスにおける応用をわかりやすく説明するもの。', '2019-06-04 13:50:15', '2019-06-04 13:50:15'),
(5, 'ニューラルネットワーク自作入門', 'Tariq Rashid', 'https://books.google.co.jp/books?isbn=4839962251', '人工知能の分野でパワフルかつ有用な手法として期待されている。“ニューラルネットワーク”の入門書。必要となる数学を理解できるよう一歩一歩丁寧に解説。コンピュータ言語:Pythonを活用してニューラルネットワークを自作してどのように動くのかを理解!', '2019-06-04 13:51:53', '2019-06-04 13:51:53'),
(6, '怠け数学者の記', '小平邦彦', 'https://books.google.co.jp/books?id=YbYvAQAAIAAJ', '数学を理解するとは、数学的現象を「数覚」という感覚で「見る」ことである。「数覚」は感覚なので頭の良し悪しとは関係がない。フィールズ賞受賞数学者が数学に対する独自の考え方を披瀝し、自らの学習経験や留学生活のエピソードを綴りながら、日本の数学教育に提言する。学ぶことの楽しさが溢れるエッセイ集。', '2019-06-04 13:54:10', '2019-06-04 13:54:10'),
(7, 'とんでもなく役に立つ数学', '西成活裕', 'https://books.google.co.jp/books?isbn=4044094764', 'その問題、数学で乗り越えられます!「渋滞学」で有名な東大教授が、私たちの生活をよりよくする「生きた数学」を、高校生に本気で語る。経済予測にまどわされないコツ、東京マラソンで3万人をスムーズにスタートさせる方法、人生の選択に役立つグラフ―受験のときにきざみこまれた苦手意識や、公式の丸暗記など、形式ばったイメージも一新。教科書からリアルな世界へ。使えて楽しい、数学の新たな魅力を届けます。', '2019-06-04 13:57:03', '2019-06-04 19:14:59'),
(8, '統計的思考による経営', '吉田耕作', 'https://books.google.co.jp/books?isbn=4822247929', '全体最適を実現し、競争力のある組織を構築する統計的思考を具体例で解説。トップとミドルのための全体観的経営学のススメ。', '2019-06-04 14:00:05', '2019-06-04 14:00:05'),
(11, 'Bootstrap4ファーストガイド', '相澤裕介', 'https://books.google.co.jp/books?isbn=487783432Xhttps://books.google.co.jp/books?isbn=487783432X', 'Bootstrap4についてのガイダンス。384ページ。', '2019-06-04 19:48:51', '2019-06-04 19:48:51'),
(12, '超整理法', '野口悠紀雄', 'https://books.google.co.jp/books?id=tkwhAQAAMAAJ', '1990年台のベストセラー。分類はするな、時間軸で整理しろ、という目からウロコの提言。', '2019-06-04 21:02:51', '2019-06-05 13:11:14'),
(13, 'ボッコちゃん', '星新一', 'https://books.google.co.jp/books?id=xtrIugEACAAJ', '星新一の代表作の一つ。', '2019-06-04 21:12:23', '2019-06-04 21:12:23'),
(14, '証券アナリストのためのファイナンス理論入門', '佐野三郎', 'https://books.google.co.jp/books?isbn=4828304762', '証券アナリスト試験に必要なファイナンス理論の入門書。ビジネス教育出版社, 2013', '2019-06-05 13:38:00', '2019-06-05 13:38:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
