-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2013 at 01:23 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `slimframework`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_posts`
--

CREATE TABLE `tb_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tb_posts_titulo` varchar(45) DEFAULT NULL,
  `tb_posts_texto` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_posts`
--

INSERT INTO `tb_posts` (`id`, `tb_posts_titulo`, `tb_posts_texto`) VALUES
(1, 'Titulo 10', 'texto do titulo 10'),
(2, 'Titulo 20', 'texto titulo 20'),
(5, 'titulo 30', 'texto titulo 30');
