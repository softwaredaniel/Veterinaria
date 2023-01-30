-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2018 at 09:04 AM
-- Server version: 10.1.31-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `livewnjl_prueba`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` tinytext,
  `active` int(2) NOT NULL DEFAULT '0',
  `level` int(3) NOT NULL DEFAULT '1',
  `hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `password`, `active`, `level`, `hash`) VALUES
(1, 'demo', 'demo2', 'demo', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 1, 999, ''),
(2, 'demo2', 'demo2', 'demo2', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 0, 1, ''),
(9, 'Nombre 3', 'Apellido 2', 'demo3', '94fab99d6ca8abab7d217af7e3c5532697bf1a7a', 1, 1, ''),
(7, 'Post', 'Man', 'postman', '7ec5f7e03481cdff78493115f3a939ec4f2ded5e', 1, 1, ''),
(10, 'Jesus', 'Conde', 'jesus', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, ''),
(12, 'Demo 5', 'Numero 5', 'demo5', 'e894c3e6581472e5231d5d83e4f182f6a0f3c8ca', 0, 1, '66eb55930ddafcf968e7ca81c1e71ff9');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
