-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 25 Août 2016 à 19:28
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `tigershan_domen`
--
CREATE DATABASE IF NOT EXISTS `tigershan_domen` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tigershan_domen`;

-- --------------------------------------------------------

--
-- Structure de la table `link_map_sign`
--

DROP TABLE IF EXISTS `link_map_sign`;
CREATE TABLE IF NOT EXISTS `link_map_sign` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MAP` int(11) NOT NULL,
  `ID_SIGN` int(11) NOT NULL,
  `ID_MEMBER` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_MAP` (`ID_MAP`,`ID_SIGN`),
  KEY `link_map_sign_ibfk_2` (`ID_SIGN`),
  KEY `link_map_sign_ibfk_3` (`ID_MEMBER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Vider la table avant d'insérer `link_map_sign`
--

TRUNCATE TABLE `link_map_sign`;
--
-- Contenu de la table `link_map_sign`
--

INSERT INTO `link_map_sign` (`ID`, `ID_MAP`, `ID_SIGN`, `ID_MEMBER`) VALUES
(1, 1, 1, 1),
(4, 1, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `map`
--

DROP TABLE IF EXISTS `map`;
CREATE TABLE IF NOT EXISTS `map` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `COORD_X` int(11) NOT NULL,
  `COORD_Y` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `COORD_X` (`COORD_X`,`COORD_Y`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Vider la table avant d'insérer `map`
--

TRUNCATE TABLE `map`;
--
-- Contenu de la table `map`
--

INSERT INTO `map` (`ID`, `COORD_X`, `COORD_Y`) VALUES
(1, -44, 20),
(2, 10, 5),
(3, 12, 10),
(5, 13, 10);

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ROLE` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `LOGIN` (`LOGIN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Vider la table avant d'insérer `member`
--

TRUNCATE TABLE `member`;
--
-- Contenu de la table `member`
--

INSERT INTO `member` (`ID`, `LOGIN`, `PASSWORD`, `ROLE`) VALUES
(1, 'julien', 'julien', 0),
(2, 'rudy', 'rudy', 0);

-- --------------------------------------------------------

--
-- Structure de la table `sign`
--

DROP TABLE IF EXISTS `sign`;
CREATE TABLE IF NOT EXISTS `sign` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LABEL` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `LABEL` (`LABEL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Vider la table avant d'insérer `sign`
--

TRUNCATE TABLE `sign`;
--
-- Contenu de la table `sign`
--

INSERT INTO `sign` (`ID`, `LABEL`) VALUES
(1, 'Echelle'),
(3, 'Panneau');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `link_map_sign`
--
ALTER TABLE `link_map_sign`
  ADD CONSTRAINT `link_map_sign_ibfk_3` FOREIGN KEY (`ID_MEMBER`) REFERENCES `member` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_map_sign_ibfk_1` FOREIGN KEY (`ID_MAP`) REFERENCES `map` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_map_sign_ibfk_2` FOREIGN KEY (`ID_SIGN`) REFERENCES `sign` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
