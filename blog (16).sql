-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2013 at 06:37 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `abuse`
--

CREATE TABLE IF NOT EXISTS `abuse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('micks', 'micks'),
('shalin', 'shalin'),
('jayesh', 'jayesh');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `bname` varchar(100) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `fontsize` int(11) NOT NULL DEFAULT '7',
  `fontface` varchar(20) NOT NULL DEFAULT 'Times New Roman',
  `fontcolor` blob NOT NULL,
  `bgimg` varchar(30) NOT NULL DEFAULT '/images/bg.png',
  `datetime` datetime NOT NULL,
  `stats` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `uid`, `bname`, `Category`, `fontsize`, `fontface`, `fontcolor`, `bgimg`, `datetime`, `stats`) VALUES
(106, 1, 'Taylor Swift', 'Songs', 19478, 'Comic Sans MS', 0x23303030303830, 'images/r.png', '2013-10-25 05:26:44', 57),
(108, 51, 'The Critical Eye', 'Entertainment', 1025, 'Lucida Console', 0x23303038306666, 'images/The Critical Eye.jpg', '2013-12-02 20:06:45', 0),
(109, 51, 'The Passion for the Game', 'Sports', 1496335, 'Times New Roman', 0x23303030303030, 'images/The Passion for the Gam', '2013-12-02 22:14:12', 2),
(111, 51, 'Do they Really deserve?', 'Politics', 0, 'ALGERIAN', 0x23303030303030, 'images/Do they Really deserve?', '2013-12-02 22:22:01', 0),
(113, 51, 'Just For laugh', 'Entertainment', 209597, 'Verdana', 0x23303030303030, 'images/Just For laugh.jpg', '2013-12-02 22:38:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `bid` varchar(50) CHARACTER SET utf8 NOT NULL,
  `blogname` varchar(50) NOT NULL,
  `postid` varchar(20) NOT NULL,
  `postname` varchar(30) NOT NULL,
  `Comment` varchar(50) NOT NULL,
  `uid` varchar(30) NOT NULL,
  `commentuser` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bid` (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `bid`, `blogname`, `postid`, `postname`, `Comment`, `uid`, `commentuser`, `datetime`) VALUES
(12, '106', 'Taylor Swift', '17', 'Love story', 'See the lights\r\nSee the party, the ball gowns\r\n:P', '1', 'micks', '2013-10-25 05:37:10'),
(13, '106', 'Taylor Swift', '17', 'Love story', 'Nice song :D', '1', 'micks', '2013-11-13 17:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `postcontain` longtext CHARACTER SET utf8 NOT NULL,
  `postcontainhtml` longtext CHARACTER SET utf8 NOT NULL,
  `pfontface` varchar(30) NOT NULL DEFAULT 'Times New Roman',
  `pfontcolor` blob NOT NULL,
  `pfontsize` varchar(20) NOT NULL DEFAULT '5',
  `cfontcolor` blob NOT NULL,
  `cfontface` varchar(30) NOT NULL DEFAULT 'Timea New  Roman',
  `cfontsize` varchar(10) NOT NULL DEFAULT '3',
  `bid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `abuse` int(11) NOT NULL DEFAULT '0',
  `spam` int(11) NOT NULL,
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `postname`, `postcontain`, `postcontainhtml`, `pfontface`, `pfontcolor`, `pfontsize`, `cfontcolor`, `cfontface`, `cfontsize`, `bid`, `uid`, `username`, `abuse`, `spam`, `datetime`) VALUES
(17, 'Love story', '<p>We both young when i first saw you , I close my eyes and flashbak starts .....</p>\r\n<p>I m standing on the balcony in summer air ......</p>', '&lt;p&gt;We both young when i first saw you , I close my eyes and flashbak starts .....&lt;/p&gt;\r\n&lt;p&gt;I m standing on the balcony in summer air ......&lt;/p&gt;', 'Times New Roman', 0x23343038303830, '+3', 0x23383034303030, 'Times New Roman', '+2', 106, 1, 'micks', 0, 0, '2013-10-24 23:59:47'),
(18, 'The View Point', '   The Vantage point serves out to be an outstanding movie', '   The Vantage point serves out to be an outstanding movie', 'Lucida Console', 0x23383030303830, '+2', 0x23383034303030, 'Times New Roman', '+1', 108, 51, 'shalinchoksi', 0, 0, '2013-12-02 14:37:51'),
(19, 'The illiterate Rulers', '   ', '   ', 'Times New Roman', 0x23303030303030, '+1', 0x23303030303030, 'Times New Roman', '+1', 111, 51, 'shalinchoksi', 0, 0, '2013-12-02 16:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `spam`
--

CREATE TABLE IF NOT EXISTS `spam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `ip` varchar(30) NOT NULL,
  `datetime` datetime NOT NULL,
  `bid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`ip`, `datetime`, `bid`) VALUES
('127.0.0.1', '2013-11-13 17:52:29', 106),
('127.0.0.1', '2013-11-13 17:52:46', 106),
('127.0.0.1', '2013-11-13 17:52:54', 106),
('127.0.0.1', '2013-11-13 18:07:45', 1),
('127.0.0.1', '2013-12-02 12:04:13', 106),
('127.0.0.1', '2013-12-02 12:28:28', 106),
('127.0.0.1', '2013-12-02 12:29:36', 106),
('127.0.0.1', '2013-12-02 12:32:06', 106),
('127.0.0.1', '2013-12-02 12:32:54', 106),
('127.0.0.1', '2013-12-02 12:32:55', 106),
('127.0.0.1', '2013-12-02 12:32:56', 106),
('127.0.0.1', '2013-12-02 12:33:21', 106),
('127.0.0.1', '2013-12-02 19:18:51', 106),
('127.0.0.1', '2013-12-02 19:19:15', 107),
('127.0.0.1', '2013-12-02 22:14:19', 109),
('127.0.0.1', '2013-12-02 22:14:23', 109),
('127.0.0.1', '2013-12-02 22:15:44', 110),
('127.0.0.1', '2013-12-17 10:20:10', 106);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `lname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `age` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) CHARACTER SET utf8 NOT NULL,
  `cnum` bigint(15) NOT NULL,
  `Username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `emailid` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(15) CHARACTER SET utf8 NOT NULL,
  `datetime` datetime NOT NULL,
  `force_new_pw` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`Id`, `fname`, `lname`, `age`, `dob`, `gender`, `cnum`, `Username`, `emailid`, `password`, `datetime`, `force_new_pw`) VALUES
(1, 'Miraj', 'Koradiya', 21, '1992-06-06', 'Male', 9979715072, 'micks', 'micks.9093@gmail.com', 'a', '2013-09-06 03:44:25', 1),
(51, 'Shalin', 'Choksi', 21, '1992-06-21', 'Male', 2147483647, 'shalinchoksi', 'shalinchoksi92@gmail.com', 'shalin', '2013-09-12 10:33:35', 1),
(55, 'meet', 'dabhi', 23, '1990-06-01', 'Male', 2147483647, 'meet', 'meet.dabhi@gmail.com', '', '2013-09-21 10:49:16', 0),
(58, 'jayesh', 'anandani', 21, '2013-09-17', 'Male', 2147483647, 'jacks', 'jayeshanandani@gmail.com', 'jacks', '2013-09-04 09:40:18', 1),
(60, 'dhruvil', 'dhankani', 17, '2013-09-19', 'Male', 2147483647, 'dhruvil', 'dhruvil.618@gmail.com', 'gatyo', '2013-09-24 15:00:31', 1),
(63, 'Shalin', 'Choksi', 21, '1992-06-21', 'Male', 9725825107, 'Shalinchoksi', 'shalinchoksi92@gmail.com', 'yuK0f6E8', '2013-10-24 22:42:50', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
