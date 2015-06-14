-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2015 at 08:15 AM
-- Server version: 5.5.35
-- PHP Version: 5.4.4-14+deb7u8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ime` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `password`, `ime`) VALUES
(1, 'Gado', 'medvjed1234', 'Luka Gado'),
(2, 'Luk', 'fcadab5fc56cf1918fd9', 'Luk'),
(3, 'L', 'd20caec3b48a1eef164c', 'L'),
(4, 'G', 'dfcf28d0734569a6a693bc8194de62bf', 'G'),
(5, 'sdas', 'dsad', 'asdas'),
(6, 'Medvjed', 'medvjed', 'med'),
(7, 'Medvjedica', '9592a0044e85036936e44ee3b8bd3b5e', 'Medvjedica');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(50) NOT NULL,
  `tip` varchar(20) CHARACTER SET cp1250 COLLATE cp1250_croatian_ci NOT NULL,
  `opis` varchar(100) CHARACTER SET cp1250 COLLATE cp1250_croatian_ci NOT NULL,
  `vegetarijanski` varchar(20) CHARACTER SET cp1250 COLLATE cp1250_croatian_ci NOT NULL,
  `halal` varchar(20) CHARACTER SET cp1250 COLLATE cp1250_croatian_ci NOT NULL,
  `koser` varchar(20) CHARACTER SET cp1250 COLLATE cp1250_croatian_ci NOT NULL,
  `alergeni` varchar(20) CHARACTER SET cp1250 COLLATE cp1250_croatian_ci NOT NULL,
  `cijena` decimal(20,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `naziv`, `tip`, `opis`, `vegetarijanski`, `halal`, `koser`, `alergeni`, `cijena`) VALUES
(15, 'Gibanica', 'ostalo', 'Ovo je slani tip kolača, punjena je orasima', 'NE', 'NE', 'NE', 'jaja, orasi', 10.00),
(16, 'Sirnica', 'ostalo', 'Ovo je slani tip kolača, punjen sirom', 'NE', 'NE', 'NE', 'jaja,mlijeko', 12.00),
(17, 'Burek', 'ostalo', 'Ovo je slani tip kolača, punjen mesom', 'NE', 'NE', 'NE', 'jaja', 14.00),
(18, 'Sacher torta', 'kolač', 'Čokoladna torta u više slojeva', 'DA', 'DA', 'DA', '', 16.00),
(19, 'Mađarica', 'kolač', 'Čokoladni tip torte u više slojeva, s korama', 'NE', 'NE', 'NE', 'jaja', 10.00),
(20, 'Kremšnita', 'kolač', 'nekakvi keksi', 'DA', 'DA', 'NE', 'jaja', 10.00),
(21, 'Šampita', 'kolač', 'nekakvi keksi', 'NE', 'DA', 'NE', 'jaja,mlijeko', 12.00),
(22, 'Piškote', 'keks', 'keksi', 'DA', 'DA', 'DA', 'jaja', 12.00),
(23, 'Čokoladni keksi – či', 'keks', 'nekakvi keksi', 'DA', 'NE', 'DA', 'DA', 123.00),
(33, 'asd', 'sds', 'dssd', 'DA', 'DA', 'DA', 'sdad', 22.00);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
