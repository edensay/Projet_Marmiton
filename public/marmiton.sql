-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 25 Février 2016 à 17:10
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
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `idr` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `note` int(11) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  UNIQUE KEY `idr` (`idr`,`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`idr`, `nom`, `note`, `commentaire`) VALUES
(1, 'maltuin', 5, 'De la balle');

-- --------------------------------------------------------

--
-- Structure de la table `ingredientListe`
--

CREATE TABLE IF NOT EXISTS `ingredientListe` (
  `idil` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`idil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ingredientListe`
--

INSERT INTO `ingredientListe` (`idil`, `nom`) VALUES
(1, 'farine'),
(2, 'lait');

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

--
-- Contenu de la table `ingredients`
--

INSERT INTO `ingredients` (`idr`, `idi`, `idv`, `quantité`) VALUES
(1, 1, 1, 20),
(1, 2, 1, 20);

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE IF NOT EXISTS `recettes` (
  `idr` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `temps` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`idr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `recettes`
--

INSERT INTO `recettes` (`idr`, `titre`, `temps`, `texte`, `img`, `date`) VALUES
(1, 'Premiere recette', '20', 'Ma premiere recette', '', '20160225');

-- --------------------------------------------------------

--
-- Structure de la table `tagList`
--

CREATE TABLE IF NOT EXISTS `tagList` (
  `idt` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`idt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tagList`
--

INSERT INTO `tagList` (`idt`, `nom`) VALUES
(1, 'test'),
(2, 'test2');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `idr` int(11) NOT NULL,
  `idt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`idr`, `idt`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `volumeListe`
--

CREATE TABLE IF NOT EXISTS `volumeListe` (
  `idv` int(11) NOT NULL,
  `volume` varchar(10) NOT NULL,
  PRIMARY KEY (`idv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `volumeListe`
--

INSERT INTO `volumeListe` (`idv`, `volume`) VALUES
(1, 'g');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
