-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2016 at 12:20 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lesaintbreuvage`
--

-- --------------------------------------------------------

--
-- Table structure for table `biere`
--

CREATE TABLE IF NOT EXISTS `biere` (
  `BIE_CodeBiere` varchar(3) NOT NULL,
  `BIE_DesignationBiere` varchar(20) NOT NULL,
  `BIE_DescriptionBiere` varchar(1000) NOT NULL,
  `BIE_LienImageBiere` varchar(100) NOT NULL,
  `CAT_CodeCategorieBiere` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biere`
--

INSERT INTO `biere` (`BIE_CodeBiere`, `BIE_DesignationBiere`, `BIE_DescriptionBiere`, `BIE_LienImageBiere`, `CAT_CodeCategorieBiere`) VALUES
('CI1', 'Piste Noire ', 'Ronde et gourmande, la Piste Noire est une bière qui vous surprendra par son amertume discrète et son corps puissant. Ses notes de céréales légèrement torréfiées et de caramel sont un enchantement pour le palais. Sa robe ambrée, sa mousse généreuse et son corps malté transformeront une simple dégustation en un délicieux moment de bonheur vrai. Le nez développe cette force maltée et préserve la subtilité de ses arômes.En bouche, la rondeur accompagne l''extrême délicatesse des houblons dévoilant un équilibre des plus remarquables.', 'PisteNoire', 'AMB'),
('FA1', 'Faro Ambrée', 'Une bière belge fruitée, désaltérante et douce. La bière préférée des femmes ! ', 'FaroAmbre', 'AMB'),
('FL2', 'Floris Framboise', 'La Floris Framboises est une bière de type spéciale à fermentation haute, titrant 3.6%, conçue par la brasserie Huyghe en Belgique?. Saveurs de framboises, légèrement acide. Bière rafraîchissante, facile à boire.???', 'FlorisFramboise', 'ARO'),
('FL3', 'Floris Fraise', 'La Floris fraises gardenbeer est une bière de type spéciale à fermentation haute, titrant 3.6%, conçue par la brasserie Huyghe en Belgique?. Arôme de fraise très parfumé. Goût sucré mais sans saturer la saveur du fruit. A consommer très frais.??', 'FlorisFraise', 'ARO'),
('KF1', 'Kriek Foudroyante', 'Une bière gourmande aromatisée à la cerise, brassée pour Difcom SA!', 'KriekFoudroyante', 'KRI'),
('LE1', 'Leffe Ruby', 'La Leffe ruby est une bière de type abbaye à fermentation haute, titrant 5%. Elle dévoile des arômes de fruits rouges, légèrement épicés, des notes de framboise. On retrouve enbouche, une saveur florale, laissant un souvenir boisé. Parfaite pour l''apéritif. Bière fruitée, épicée, douce et rafraîchissante.?', 'LeffeRuby', 'ARO'),
('MS1', 'Mort Subite', 'Une bière belge délicieuse de type Lambic Fruit aromatisée à la cerise griotte ', 'MortSubite', 'KRI'),
('OR1', 'Orval Ambrée', 'Bière trappiste de dégustation, Orval dévoile un arôme houblonné intense et une pointe d''acidité . Cette bière révèle des arômes différents en fonction de la température à laquelle elle est servie, les amateurs sauront l''apprécier à sa juste valeur. ', 'OrvalAmbre', 'AMB'),
('PI1', 'Pietra Ambrée', 'Une bière corse à la farine de châtaignes. Une Piètre comme disent nos amis Corses ! ', 'PietraAmbre', 'AMB'),
('PMB', 'Pêche Mel Bush', 'La Pêche mel bush est une bière de type à fermentation haute?, titrant 8.5%. Au nez, des arômes de pêches se dégagent, masquant la présence du houblon. En bouche, on retrouve les influences de malt, dominé par les saveurs fruitées de la pêche. L''amertume est légère et perceptible en fin de bouche.?', 'PecheMelBush', 'ARO'),
('RCR', 'Rince Cochon Rouge', 'La Rince cochon est une bière fruitée et désaltérante titrant 7.5?%. Au nez, on ressent tout de suite les arômes fruités. En bouche, on retrouve des saveurs douces et fruitées, des notes de framboise, de cerise, et de fraise. On peut également ressentir le houblon, l''orge, et le malt.?', 'RinceCochonRouge', 'ARO'),
('SA1', 'Samichalus Ambrée', 'Bière autrichienne appartenant aux bières les plus fortes du monde ! Fait office de digestif ! ', 'SamiAmbre', 'AMB');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `CAT_CodeCategorieBiere` varchar(3) NOT NULL,
  `CAT_LibelleCategorieBiere` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`CAT_CodeCategorieBiere`, `CAT_LibelleCategorieBiere`) VALUES
('AMB', 'Ambrée'),
('ARO', 'Aromatisée'),
('ART', 'Artisanale'),
('BLC', 'Blanche'),
('BLD', 'Blonde'),
('BRT', 'Brut'),
('BRU', 'Brune'),
('CER', 'Cervoise'),
('FAR', 'Faro'),
('KRI', 'Kriek'),
('NOI', 'Noire'),
('RGE', 'Rouge'),
('ROU', 'Rousse'),
('SAL', 'Sans Alcool');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `UT_numUtil` int(5) NOT NULL,
  `UT_nomUtil` varchar(10) NOT NULL,
  `UT_prenomUtil` varchar(10) NOT NULL,
  `UT_adresseUtil` varchar(50) NOT NULL,
  `UT_codePostalUtil` varchar(5) NOT NULL,
  `UT_villeUtil` varchar(50) NOT NULL,
  `UT_identifiantUtil` varchar(50) DEFAULT NULL,
  `UT_motDePasseUtil` varchar(60) NOT NULL,
  `salt` varchar(23) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`UT_numUtil`, `UT_nomUtil`, `UT_prenomUtil`, `UT_adresseUtil`, `UT_codePostalUtil`, `UT_villeUtil`, `UT_identifiantUtil`, `UT_motDePasseUtil`, `salt`, `role`) VALUES
(1, '', '', '', '', '', 'saintbreuvage', 'biere', 'mnPEaJNz6,rUPbAYGg6$UXt', 'ROLE_ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biere`
--
ALTER TABLE `biere`
  ADD PRIMARY KEY (`BIE_CodeBiere`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`CAT_CodeCategorieBiere`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`UT_numUtil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `UT_numUtil` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
