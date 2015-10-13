-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Octobre 2015 à 11:33
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `lesaintbrevage`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `CAT_CodeCategorieBiere` varchar(3) NOT NULL,
  `CAT_LibelleCategorieBiere` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`CAT_CodeCategorieBiere`, `CAT_LibelleCategorieBiere`) VALUES
('ABB', 'Abbaye'),
('AMB', 'Ambrée'),
('ARO', 'Aromatisée'),
('ART', 'Artisanale'),
('BLC', 'Blanche'),
('BLD', 'Blonde'),
('BRT', 'Brut'),
('BRU', 'Brune'),
('CER', 'Cervoise'),
('FAR', 'Faro'),
('GUE', 'Gueuze'),
('KRI', 'Kriek'),
('NOI', 'Noire'),
('OKT', 'Oktoberfestbier'),
('RGE', 'Rouge'),
('ROU', 'Rousse'),
('SAI', 'Saison'),
('SAL', 'Sans Alcool'),
('VER', 'VERTE');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
 ADD PRIMARY KEY (`CAT_CodeCategorieBiere`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

GRANT ALL PRIVILEGES ON *.* FROM 'lesaintb_user'@'localhost'; GRANT ALL PRIVILEGES ON *.* TO 'lesaintb_user'@'localhost'WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;