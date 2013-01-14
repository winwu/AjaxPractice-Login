-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Jan 14, 2013, 03:10 PM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `login_test`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `user`
-- 

CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `userid` varchar(11) collate utf8_unicode_ci NOT NULL,
  `password` int(11) NOT NULL,
  `regitster_date` datetime NOT NULL,
  `first_name` char(5) collate utf8_unicode_ci NOT NULL,
  `last_name` char(10) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- 
-- 列出以下資料庫的數據： `user`
-- 

INSERT INTO `user` VALUES (1, 'wwutw0925', 1234567, '2012-09-25 00:00:00', 'win', 'wu');
INSERT INTO `user` VALUES (3, 'test', 1234567, '0000-00-00 00:00:00', '', '');
