-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 25 Février 2016 à 13:54
-- Version du serveur: 5.5.38
-- Version de PHP: 5.5.17-1~dotdeb.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `marmiton`
--

-- --------------------------------------------------------

--
-- Structure de la table `ingredientListe`
--

CREATE TABLE IF NOT EXISTS `ingredientListe` (
  `idil` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`idil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `idr` int(11) NOT NULL,
  `idi` int(11) NOT NULL,
  `idv` int(11) NOT NULL,
  `quantité` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE IF NOT EXISTS `recettes` (
  `idr` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `temps` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`idr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tagList`
--

CREATE TABLE IF NOT EXISTS `tagList` (
  `idt` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`idt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `idr` int(11) NOT NULL,
  `idt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `volumeListe`
--

CREATE TABLE IF NOT EXISTS `volumeListe` (
  `idv` int(11) NOT NULL,
  `volume` varchar(10) NOT NULL,
  PRIMARY KEY (`idv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
