-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 12 月 22 日 16:23
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
  `A_img` bigint(20) unsigned NOT NULL,
  `A_sort` int(10) unsigned NOT NULL,
  `A_adder` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `A_addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`A_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `adsence_style`
--

CREATE TABLE IF NOT EXISTS `adsence_style` (
  `AS_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `AS_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `AS_des` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `AS_adder` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `AS_addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`AS_id`),
  UNIQUE KEY `AS_name` (`AS_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `C_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `C_url` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `C_des` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `C_adder` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `C_addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`C_id`),
  UNIQUE KEY `C_name` (`C_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `P_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `P_C_id` int(10) unsigned NOT NULL,
  `P_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `P_des` text COLLATE utf8_unicode_ci NOT NULL,
  `P_img` bigint(20) unsigned NOT NULL,
  `P_tmb` bigint(20) unsigned NOT NULL,
  `P_sort` int(10) unsigned NOT NULL,
  `P_index` tinyint(1) NOT NULL DEFAULT '0',
  `P_adder` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `P_addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`P_id`),
  UNIQUE KEY `P_name` (`P_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='商品表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `S_key` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `S_value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`S_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
