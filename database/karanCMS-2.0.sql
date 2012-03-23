-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 08, 2012 at 12:51 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `mysystem2`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `menus`
-- 

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `machine_name` varchar(255) NOT NULL,
  `discription` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `machine_name` (`machine_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `menus`
-- 

INSERT INTO `menus` (`id`, `title`, `machine_name`, `discription`) VALUES 
(1, 'test', 'test', 'this is test hello to yyuo'),
(2, 'test clips', 'test_clips', ''),
(3, 'test2', 'test2', ''),
(4, 'Menu4', 'menu4', NULL),
(5, 'Menu5', 'menu5', 'asf ds  s ds s s das  asd ');

-- --------------------------------------------------------

-- 
-- Table structure for table `menus_links`
-- 

DROP TABLE IF EXISTS `menus_links`;
CREATE TABLE `menus_links` (
  `id` int(11) NOT NULL auto_increment,
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL default '0',
  `title` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `discription` varchar(255) default NULL,
  `weight` int(11) NOT NULL default '0',
  `p1` int(11) NOT NULL default '0',
  `p2` int(11) NOT NULL default '0',
  `p3` int(11) NOT NULL default '0',
  `p4` int(11) NOT NULL default '0',
  `p5` int(11) NOT NULL default '0',
  `p6` int(11) NOT NULL default '0',
  `p7` int(11) NOT NULL default '0',
  `p8` int(11) NOT NULL default '0',
  `published` enum('0','1') NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `menus_links`
-- 

INSERT INTO `menus_links` (`id`, `menu_id`, `parent_id`, `title`, `path`, `discription`, `weight`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `published`) VALUES 
(1, 2, 0, 'parent item 1', 'p1', '', 7, 0, 0, 0, 0, 0, 0, 0, 0, '1'),
(2, 2, 6, 'parent item 2', 'parent/item', '', 5, 0, 0, 0, 0, 0, 0, 0, 0, '1'),
(3, 2, 0, 'sub item 1', 'sub/item', '', 3, 0, 0, 0, 0, 0, 0, 0, 0, '1'),
(4, 2, 0, 'sub sub item 1', 'sub/sub/item1', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, '1'),
(5, 1, 0, 'Add user', '/user/path/this', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '1'),
(6, 2, 3, 'Sub sub item3', 'sub/sub', '', 4, 0, 0, 0, 0, 0, 0, 0, 0, '1'),
(7, 2, 0, 'newmenu1', 'new/menu/1', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '1'),
(8, 2, 0, 'newmenu2', 'new/meu/2', '', 6, 0, 0, 0, 0, 0, 0, 0, 0, '1'),
(9, 2, 4, 'newmenu3', 'new/menu/3', '', 2, 0, 0, 0, 0, 0, 0, 0, 0, '1'),
(10, 1, 0, 'menu subnew1', 'menu/subnew', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '1');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`id`, `username`, `password`, `email_id`, `created`, `updated`, `ip_address`) VALUES 
(7, 'user3', '123456', 'user3@gmail.com', 1325702085, 1325702085, '127.0.0.1'),
(6, 'user2', '123456', 'user2@gmail.com', 1325702069, 1325702069, '127.0.0.1'),
(3, 'test59', '', 'test3e@gmail.com', 1323716603, 1323717280, '127.0.0.1'),
(5, 'user1', '123456', 'user1@gmail.com', 1325702025, 1325702025, '127.0.0.1'),
(9, 'user6', '123456', 'user6@gamil.com', 1325702109, 1325702109, '127.0.0.1'),
(10, 'user7', '123456', 'user7@gmail.com', 1325702125, 1325702125, '127.0.0.1'),
(11, 'user8', '123456', 'user8@gmail.com', 1325702164, 1325702164, '127.0.0.1'),
(12, 'user9', '123456', 'user9@gmail.com', 1325702184, 1325702184, '127.0.0.1');

-- --------------------------------------------------------

-- 
-- Table structure for table `users2`
-- 

DROP TABLE IF EXISTS `users2`;
CREATE TABLE `users2` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `users2`
-- 

