-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2016 at 07:09 AM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wiseinvestor`
--

--
-- Dumping data for table `appartement`
--

INSERT INTO `appartement` (`id`, `proprietaire_id`, `locataire_id`, `bail_id`, `libelle`, `numero`, `adresse`, `enabled`, `photo`) VALUES
(1, 1, NULL, NULL, 'Angers', 7, 'Boulevard Marc LECLERC Angers', 1, 'path'),
(2, 1, NULL, NULL, 'Nantes-Saint Herblain', 8, 'rue Yves KARTEL', 1, 'path'),
(3, 1, NULL, NULL, 'Montbéliard', 2, 'rue de la mouche', 1, 'path'),
(4, 1, NULL, NULL, 'Arbouans', 6, 'rue des essarts', 1, 'path');

--
-- Dumping data for table `proprietaire`
--

INSERT INTO `proprietaire` (`id`, `nom`, `prenom`, `pseudo`, `email`, `enabled`) VALUES
(1, 'BRAU', 'Laurent', 'Laurent', 'laurent.brau@gmail.com', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
