-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成日時: 2012 年 7 月 20 日 20:18
-- サーバのバージョン: 5.5.25a
-- PHP のバージョン: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `php10`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '無題',
  `sdate` date NOT NULL,
  `stime` time NOT NULL,
  `memo` text,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- テーブルのデータのダンプ `schedule`
--

INSERT INTO `schedule` (`sid`, `title`, `sdate`, `stime`, `memo`) VALUES
(3, 'PHP10講習会', '2012-10-17', '10:00:00', 'PPT資料の予備データ持参'),
(4, '新規メンバー面接', '2012-10-17', '14:00:00', '応募資料のコピー'),
(5, 'B企画の打ち上げ', '2012-10-25', '18:00:00', '四谷駅に集合'),
(6, '佐藤さんと打ち合わせ', '2012-10-31', '15:00:00', '203会議室'),
(7, 'WINGS納涼会', '2012-10-31', '19:30:00', NULL),
(8, '書籍Z締切', '2012-11-01', '17:00:00', 'サンプルもUp');

-- --------------------------------------------------------

--
-- テーブルの構造 `schedule_usr`
--

CREATE TABLE IF NOT EXISTS `schedule_usr` (
  `uid` varchar(20) NOT NULL,
  `passwd` char(32) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `schedule_usr`
--

INSERT INTO `schedule_usr` (`uid`, `passwd`) VALUES
('yyamada', '827ccb0eea8a706c4c34a16891f84e7b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
