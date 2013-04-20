-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2013 at 04:36 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `legumes`
--

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `streetNum` varchar(20) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `fixe` varchar(30) DEFAULT NULL,
  `registDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`login`),
  UNIQUE KEY `email` (`email`),
  KEY `name` (`name`,`street`,`city`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `login`, `password`, `name`, `email`, `streetNum`, `street`, `city`, `gender`, `tel`, `fixe`, `registDate`) VALUES
(57, 'adasdadsa', '7e240de74fb1ed08fa08d38063f6a6a91462a815', '', 'aaa', '', '', '', '', '', '', '2013-04-10 15:35:05'),
(59, '85020121', 'e5ddd85652ff2c31dae1128042bc766a059991af', '', 'aaqqweaa', '', '', '', '男', '', '', '2013-04-10 16:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `products_info`
--

CREATE TABLE `products_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `view_count` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `category` varchar(150) NOT NULL,
  `sub_cotegory` varchar(150) NOT NULL,
  `pic_url` varchar(150) NOT NULL,
  `price` double NOT NULL,
  `vip_price` double NOT NULL,
  `serial_num` varchar(100) NOT NULL,
  `original` varchar(150) NOT NULL,
  `format` varchar(150) NOT NULL,
  `duration` varchar(150) NOT NULL,
  `mark` varchar(150) NOT NULL,
  `evaluation` double NOT NULL,
  `description` text NOT NULL,
  `images` varchar(150) NOT NULL,
  `addon` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products_info`
--

INSERT INTO `products_info` (`id`, `view_count`, `name`, `category`, `sub_cotegory`, `pic_url`, `price`, `vip_price`, `serial_num`, `original`, `format`, `duration`, `mark`, `evaluation`, `description`, `images`, `addon`) VALUES
(1, 7, '苹果', 'fruit', '', '/protected/images/130/fruits/apple.jpg', 10, 9.5, '00000000000000001\n', '中国', '500克', '15天', '牛x苹果', 5, '来自牛x苹果', '', '那信'),
(2, 11, '香蕉', 'fruit', '', '/protected/images/130/fruits/banana.jpg', 8, 7.5, '000000000000000002', '中国', '500克', '15天', '牛x香蕉', 5, '来自牛x香蕉', '', ''),
(3, 15, '柠檬', 'fruit', '', '/protected/images/130/fruits/lemon.jpg', 8, 7.5, '000000000000000002', '中国', '500克', '15天', '牛x柠檬', 5, '来自牛x柠檬', '', ''),
(4, 12, '橙子', 'fruit', '', '/protected/images/130/fruits/orange.jpg', 8, 7.5, '000000000000000002', '中国', '500克', '15天', '牛x橙子', 5, '来自牛x橙子', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
