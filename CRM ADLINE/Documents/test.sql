-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2013 at 08:40 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
    DETERMINISTIC
begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `activitate`
--

CREATE TABLE IF NOT EXISTS `activitate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tip` varchar(255) NOT NULL,
  `utilizator_id` int(11) NOT NULL,
  `affected_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `activitate`
--

INSERT INTO `activitate` (`id`, `data`, `tip`, `utilizator_id`, `affected_id`) VALUES
(1, '2013-07-13 18:04:36', 'stergere', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `echipament`
--

CREATE TABLE IF NOT EXISTS `echipament` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `nume` varchar(255) DEFAULT NULL COMMENT 'Denumire Echipament',
  `descriere` varchar(2000) DEFAULT NULL,
  `data_achizitie` timestamp NULL DEFAULT NULL,
  `utilizator_id` int(11) DEFAULT NULL,
  `firma_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `firma`
--

CREATE TABLE IF NOT EXISTS `firma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nume` varchar(1000) NOT NULL,
  `cod_fiscal` varchar(1000) DEFAULT NULL,
  `nr_reg_comert` varchar(1000) DEFAULT NULL,
  `tara` varchar(30) DEFAULT NULL,
  `judet` varchar(30) DEFAULT NULL,
  `localitate` varchar(30) DEFAULT NULL,
  `adresa` varchar(1000) DEFAULT NULL,
  `adresa_livrare` varchar(1000) DEFAULT NULL,
  `banca` varchar(1000) DEFAULT NULL,
  `cont_bancar` varchar(1000) DEFAULT NULL,
  `telefon` varchar(1000) NOT NULL,
  `fax` varchar(1000) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `website` varchar(1000) DEFAULT NULL,
  `modalitate_plata` varchar(1000) DEFAULT NULL,
  `curier` varchar(1000) DEFAULT NULL,
  `seriozitate` varchar(1000) DEFAULT NULL,
  `descriere` varchar(2000) DEFAULT NULL,
  `utilizator_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `firma`
--

INSERT INTO `firma` (`id`, `data`, `nume`, `cod_fiscal`, `nr_reg_comert`, `tara`, `judet`, `localitate`, `adresa`, `adresa_livrare`, `banca`, `cont_bancar`, `telefon`, `fax`, `email`, `website`, `modalitate_plata`, `curier`, `seriozitate`, `descriere`, `utilizator_id`) VALUES
(1, '2013-07-13 18:37:04', 'Firma 1', 'iyiy', NULL, 'Ro', 'Dj', 'Craiova', NULL, NULL, 'BRD', NULL, '\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fisier`
--

CREATE TABLE IF NOT EXISTS `fisier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nume` varchar(1000) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `utilizator_id` int(11) NOT NULL,
  `firma_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Interactiune`
--

CREATE TABLE IF NOT EXISTS `Interactiune` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `continut` varchar(1000) NOT NULL,
  `utilizator_id` int(11) NOT NULL,
  `firma_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `interventie`
--

CREATE TABLE IF NOT EXISTS `interventie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `constatari` varchar(1000) NOT NULL,
  `remedieri` varchar(1000) DEFAULT NULL,
  `materiale_folosite` varchar(1000) DEFAULT NULL,
  `utilizator_id` int(11) NOT NULL,
  `echipament_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `persoanacontact`
--

CREATE TABLE IF NOT EXISTS `persoanacontact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nume` varchar(255) NOT NULL,
  `telefon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `act_identitate` varchar(255) DEFAULT NULL,
  `firma_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `utilizator`
--

CREATE TABLE IF NOT EXISTS `utilizator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tip` varchar(255) NOT NULL,
  `nume` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
