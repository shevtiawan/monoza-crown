-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2010 at 12:48 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `monozacrown`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` VALUES(1, 'andrisetiawan', 'pertamax', '2010-12-19 13:43:16', '2010-12-19 13:43:16', 0);
INSERT INTO `messages` VALUES(2, 'andrisetiawan', 'keduaks kalinya', '2010-12-19 13:44:51', '2010-12-19 13:44:51', 0);
INSERT INTO `messages` VALUES(3, 'monoza', 'coba post lagi', '2010-12-20 16:52:43', '2010-12-20 16:52:43', 0);
INSERT INTO `messages` VALUES(4, 'andrisetiawan', 'jhgjhgjh', '2010-12-20 22:40:32', '2010-12-20 22:40:32', 0);
INSERT INTO `messages` VALUES(5, 'andrisetiawan', '', '2010-12-20 22:40:58', '2010-12-20 22:40:58', 1);
INSERT INTO `messages` VALUES(6, 'andrisetiawan', '', '2010-12-20 22:41:15', '2010-12-20 22:41:15', 1);
INSERT INTO `messages` VALUES(7, 'andrisetiawan', 'asfasdfa', '2010-12-20 22:52:28', '2010-12-20 22:52:28', 0);
INSERT INTO `messages` VALUES(8, 'andrisetiawan', 'eerer', '2010-12-20 22:52:34', '2010-12-20 22:52:34', 1);
INSERT INTO `messages` VALUES(9, 'andrisetiawan', 'Not this Jason, nor this Jason, and certainly not this Jason. I love to make things — especially websites. I think we should talk.', '2010-12-21 21:41:20', '2010-12-21 21:41:20', 1);
INSERT INTO `messages` VALUES(10, 'andrisetiawan', 'klasdfasdf', '2010-12-21 21:43:34', '2010-12-21 21:43:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `group` varchar(20) NOT NULL,
  `is_confirmed` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(6, 'monoza', 'b2ceed4b2abe8741f8a078d5d2746339', 'sample@email.com', 'Monoza', '', 0, '2010-12-19 13:08:49', '2010-12-19 13:08:49', 0);
INSERT INTO `users` VALUES(5, 'andrisetiawan', '4306c7bcf063412c6bac89096cbf6e88', 'andri@naua.com', 'andri setiawan', '', 0, '2010-12-19 13:06:21', '2010-12-19 13:06:21', 0);
