-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 01 月 05 日 17:24
-- 服务器版本: 5.1.54
-- PHP 版本: 5.3.5-1ubuntu7.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `cupcake`
--

-- --------------------------------------------------------

--
-- 表的结构 `adsence`
--

CREATE TABLE IF NOT EXISTS `adsence` (
  `A_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `A_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `A_url` varchar(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
  `A_img` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `A_sort` int(10) unsigned NOT NULL,
  `A_adder` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `A_addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`A_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `adsence`
--

INSERT INTO `adsence` (`A_id`, `A_name`, `A_url`, `A_img`, `A_sort`, `A_adder`, `A_addtime`) VALUES
(1, '首页幻灯片广告一', '', '1.jpg', 1, 'jeff', 1325036675),
(2, '首页幻灯片广告二', '', '1.jpg', 2, 'jeff', 1325049642),
(3, '首页幻灯片广告三', '', '1.jpg', 3, 'jeff', 1325049701),
(4, '全局广告一', '', '2.gif', 4, 'jeff', 1325051042),
(5, '全局广告一', '', '3.gif', 5, 'jeff', 1325051077),
(6, '全局广告一', '', '4.gif', 6, 'jeff', 1325051082),
(7, '全局广告二', '#', '3.gif', 7, 'jeff', 1325051077),
(8, '全局广告二', '#', '3.gif', 8, 'jeff', 1325051077),
(9, '全局广告二', '#', '3.gif', 9, 'jeff', 1325051077),
(10, '全局广告三', '#', '3.gif ', 10, 'jeff 	', 1325051077),
(11, '全局广告三', '#', '3.gif ', 11, 'jeff', 1325051077),
(12, '全局广告三', '#', '3.gif', 12, 'jeff', 1325051077),
(13, '首页幻灯片广告四', '#', '1.jpg', 13, 'jeff', 1325036675);

-- --------------------------------------------------------

--
-- 表的结构 `adsence_style`
--

CREATE TABLE IF NOT EXISTS `adsence_style` (
  `AS_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `A_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `AS_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `AS_des` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `AS_adder` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `AS_addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`AS_id`),
  UNIQUE KEY `AS_name` (`AS_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `adsence_style`
--

INSERT INTO `adsence_style` (`AS_id`, `A_id`, `AS_name`, `AS_des`, `AS_adder`, `AS_addtime`) VALUES
(1, '1,2,3,13', '首页幻灯片广告位', '传说中地广告位', 'jeff', 1325039245),
(2, '4,5,6', '全局广告位一', '全局广告位', 'jeff', 1325050371),
(3, '7,8,9', '全局广告位 二', '全局广告位 ', 'jeff 	', 1325050371),
(4, '10,11,12', '全局广告位三', '全局广告', 'jeff', 1325050378);

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `C_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `C_des` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `C_adder` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `C_addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`C_id`),
  UNIQUE KEY `C_name` (`C_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`C_id`, `C_name`, `C_des`, `C_adder`, `C_addtime`) VALUES
(1, '原始分类', '', 'jeff', 1325039245),
(2, '分类一', '分类一介绍', 'jeff', 0),
(3, '分类二', '分类二介绍', 'jeff', 0),
(6, '分类三', '分类三介绍', 'jeff', 1325039245),
(7, '分类四', '分类四介绍', 'jeff', 1325039249);

-- --------------------------------------------------------

--
-- 表的结构 `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `L_U_id` int(10) unsigned NOT NULL,
  `L_S_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `L_unique` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `L_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`L_U_id`),
  UNIQUE KEY `L_S_id_unique` (`L_S_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `login`
--

INSERT INTO `login` (`L_U_id`, `L_S_id`, `L_unique`, `L_time`) VALUES
(1, '9937b368d7e71d7559cf4b88df4b2ec4', '7164f053c64821854.78779180', 1325743204);

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `P_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `P_C_id` int(10) unsigned NOT NULL,
  `P_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `P_des` text COLLATE utf8_unicode_ci NOT NULL,
  `P_img` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `P_tmb` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `P_sort` int(10) unsigned NOT NULL,
  `P_index` tinyint(1) NOT NULL DEFAULT '0',
  `P_adder` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `P_addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`P_id`),
  UNIQUE KEY `P_name` (`P_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='商品表' AUTO_INCREMENT=55 ;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`P_id`, `P_C_id`, `P_name`, `P_des`, `P_img`, `P_tmb`, `P_sort`, `P_index`, `P_adder`, `P_addtime`) VALUES
(7, 1, '蛋糕三', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 6, 0, 'jeff', 1325054918),
(8, 1, '蛋糕哥', '<p>\n	这蛋糕，受不了你</p>\n', 'P_tmb.jpg', 'P_tmb.jpg', 3, 1, 'jeff', 1325054925),
(9, 1, '蛋糕五', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 8, 1, 'jeff', 1325054933),
(10, 1, '蛋糕六', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 9, 1, 'jeff', 1325054938),
(11, 2, '蛋糕0', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 10, 0, 'jeff', 1325055118),
(12, 2, '蛋糕1', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 11, 0, 'jeff', 1325055118),
(13, 2, '蛋糕2', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 12, 0, 'jeff', 1325055118),
(14, 2, '蛋糕3', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 13, 0, 'jeff', 1325055118),
(15, 2, '蛋糕4', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 14, 0, 'jeff', 1325055118),
(16, 2, '蛋糕5', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 15, 0, 'jeff', 1325055118),
(17, 2, '蛋糕6', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 16, 0, 'jeff', 1325055118),
(18, 2, '蛋糕7', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 17, 0, 'jeff', 1325055118),
(19, 2, '蛋糕8', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 18, 0, 'jeff', 1325055118),
(20, 2, '蛋糕9', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 19, 0, 'jeff', 1325055118),
(21, 2, '蛋糕10', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 20, 0, 'jeff', 1325055118),
(22, 2, '蛋糕11', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 21, 0, 'jeff', 1325055118),
(23, 2, '蛋糕12', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 22, 0, 'jeff', 1325055118),
(24, 2, '蛋糕13', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 23, 0, 'jeff', 1325055118),
(25, 2, '蛋糕14', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 24, 0, 'jeff', 1325055118),
(26, 2, '蛋糕15', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 25, 0, 'jeff', 1325055118),
(27, 2, '蛋糕16', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 26, 0, 'jeff', 1325055118),
(28, 2, '蛋糕17', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 27, 0, 'jeff', 1325055118),
(29, 2, '蛋糕18', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 28, 0, 'jeff', 1325055118),
(30, 2, '蛋糕19', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 29, 0, 'jeff', 1325055118),
(31, 3, '西点0', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 30, 0, 'jeff', 1325055158),
(32, 3, '西点1', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 31, 0, 'jeff', 1325055158),
(33, 3, '西点2', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 32, 0, 'jeff', 1325055158),
(34, 3, '西点3', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 33, 0, 'jeff', 1325055158),
(35, 3, '西点4', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 34, 0, 'jeff', 1325055158),
(36, 3, '西点5', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 35, 0, 'jeff', 1325055158),
(37, 3, '西点6', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 36, 0, 'jeff', 1325055158),
(38, 3, '西点7', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 37, 0, 'jeff', 1325055158),
(39, 3, '西点8', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 38, 0, 'jeff', 1325055158),
(40, 3, '西点9', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 39, 0, 'jeff', 1325055158),
(41, 3, '西点10', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 40, 0, 'jeff', 1325055158),
(45, 3, '西点14', '叫我如何解释你？', 'P_tmb.jpg', 'P_tmb.jpg', 44, 0, 'jeff', 1325055158);

-- --------------------------------------------------------

--
-- 表的结构 `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `S_key` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `S_value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`S_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `site`
--

INSERT INTO `site` (`S_key`, `S_value`) VALUES
('about', '关于我们内容'),
('contact', '联系我们内容test');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `U_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `U_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `U_pw` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `U_right` tinyint(1) NOT NULL,
  `U_adder` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `U_addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`U_id`),
  UNIQUE KEY `name_unique` (`U_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`U_id`, `U_name`, `U_pw`, `U_right`, `U_adder`, `U_addtime`) VALUES
(1, 'jeff', 'ecbdd035ff81220561f3edb840818ffd', 63, 'system', 1324971416);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
