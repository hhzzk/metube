-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: mysql1.cs.clemson.edu
-- Generation Time: Apr 16, 2017 at 08:08 PM
-- Server version: 5.5.52-0ubuntu0.12.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `metube_mw_h5nk`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `media_id` int(10) unsigned NOT NULL,
  `content` tinytext NOT NULL,
  `to_whom` varchar(20) NOT NULL,
  PRIMARY KEY (`comment_id`),
  UNIQUE KEY `comment_id_3` (`comment_id`),
  KEY `comment_id` (`comment_id`),
  KEY `comment_id_2` (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `media_id`, `content`, `to_whom`) VALUES
(1, 1, 1, 'This video is amazing!!!!!!!!!!!!!!!\nLove it so much!!!!!!!!!!', ''),
(2, 2, 1, 'This video is amazing!!!!!!!!!!!!!!!', '');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `index` varchar(40) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `contact_id` varchar(20) NOT NULL,
  `relationship` int(8) NOT NULL,
  `is_block` tinyint(1) NOT NULL,
  KEY `index` (`index`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `liked`
--

CREATE TABLE IF NOT EXISTS `liked` (
  `user_id` int(10) unsigned NOT NULL,
  `media_id` int(10) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liked`
--

INSERT INTO `liked` (`user_id`, `media_id`, `date`) VALUES
(1, 1, '2017-04-07 22:23:36'),
(1, 1, '2017-04-07 22:23:39'),
(1, 2, '2017-04-07 22:24:01'),
(1, 3, '2017-04-07 22:24:01'),
(1, 5, '2017-04-07 22:24:18'),
(1, 4, '2017-04-07 22:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `media_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `media_name` varchar(254) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` tinytext NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `category` smallint(4) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `viewed_times` int(10) unsigned NOT NULL,
  `like_times` int(10) NOT NULL,
  `dislike_times` int(11) NOT NULL,
  `duration` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`media_id`),
  UNIQUE KEY `media_id_6` (`media_id`),
  KEY `media_id` (`media_id`),
  KEY `media_id_2` (`media_id`),
  KEY `media_id_3` (`media_id`),
  KEY `media_id_4` (`media_id`),
  KEY `media_id_5` (`media_id`),
  KEY `media_id_7` (`media_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `media_name`, `upload_time`, `description`, `size`, `category`, `user_id`, `viewed_times`, `like_times`, `dislike_times`, `duration`) VALUES
(1, 'video_movie_1', '2017-04-05 21:30:50', 'this is a movie video', 1000, 1001, 1, 0, 0, 0, 20),
(2, 'video_movie_2', '2017-04-05 21:33:00', '', 120000, 1001, 2, 0, 0, 0, 13),
(3, 'video_movie_3', '2017-04-05 21:33:36', '', 12000, 1001, 1, 0, 0, 0, 200),
(4, 'video_cartoon_1', '2017-04-05 21:34:28', '', 10000, 1002, 1, 0, 0, 0, 100),
(5, 'video_cartoon_2', '2017-04-05 21:34:28', '', 10000, 1002, 2, 0, 0, 0, 30);

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `playlist_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `playlist_name` varchar(20) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`playlist_id`),
  UNIQUE KEY `playlist_id` (`playlist_id`),
  KEY `playlist_id_2` (`playlist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`playlist_id`, `playlist_name`, `user_id`) VALUES
(1, 'favorite', 1),
(2, 'favorite2', 1),
(3, 'favorite3', 1),
(4, 'favorite4', 1),
(5, 'favorite2', 2),
(6, 'favorite2', 2),
(7, 'favorite3', 2),
(8, 'favorite5', 4),
(9, 'favorite4', 3),
(10, 'favorite6', 1),
(11, 'favorite7', 1),
(12, 'favorite11', 1),
(13, 'favorite10', 1),
(14, 'favorite9', 1),
(15, 'favorite8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `channel_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `channel_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`channel_id`, `user_id`, `channel_name`) VALUES
(2, 1, 'wangjinrui'),
(3, 1, 'wang');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `password` char(32) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `sex` int(1) NOT NULL,
  `birth` date NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `avatar` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id_2` (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `email_2` (`email`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `phone`, `sex`, `birth`, `user_name`, `avatar`) VALUES
(1, 'dsd@dg.com', 'ddddddddd', '12345996', 0, '0000-00-00', 'Jinrui Wang', '1.png'),
(2, 'wangjinrui2013@gmail.com', '1234567', '1111111111111111', 0, '0000-00-00', 'wangjinrui', '1.png'),
(3, 'sam@g.com', '1234567', '', 0, '0000-00-00', 'sam', '1.png'),
(4, 'wang2@g.com', '123456', '', 0, '0000-00-00', 'wang2', '0'),
(5, 'w@g.com', '123456', '', 0, '0000-00-00', 'wang3', '0'),
(6, 'ddddddd@g.com', '123456', '', 0, '0000-00-00', 'wangjin', '0'),
(7, 'dddddddddd@g.com', '123456', '', 0, '0000-00-00', 'wang5', '0'),
(8, 'dddddddd@g.com', '123456', '', 0, '0000-00-00', 'wang7', '0'),
(9, 'wa@gm.com', '123456', '', 0, '0000-00-00', 'wang10', ''),
(10, 'wwww@gm.com', '123456', '', 0, '0000-00-00', 'wang20', ''),
(11, 'dd@gim.com', '123456', '12334', 0, '0000-00-00', 'jinruiwang', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
