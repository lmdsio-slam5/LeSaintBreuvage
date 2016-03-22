-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 22 Mars 2016 à 10:42
-- Version du serveur :  10.0.17-MariaDB
-- Version de PHP :  5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lesaintbreuvage`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `AC_numAchat` int(4) NOT NULL,
  `UT_numUtil` int(5) NOT NULL,
  `achat_date` date NOT NULL,
  `achat_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `achat`
--

INSERT INTO `achat` (`AC_numAchat`, `UT_numUtil`, `achat_date`, `achat_total`) VALUES
(1, 1, '2015-04-12', 17.4),
(2, 1, '2015-04-21', 22.3),
(3, 2, '2015-05-11', 10.5),
(4, 4, '2016-01-01', 25.09),
(5, 2, '2016-01-16', 159),
(6, 2, '2016-01-16', 159),
(7, 2, '2016-01-16', 465),
(8, 2, '2016-01-16', 465),
(9, 2, '2016-01-16', 465),
(10, 2, '2016-01-16', 465),
(11, 2, '2016-01-16', 664);

-- --------------------------------------------------------

--
-- Structure de la table `biere`
--

CREATE TABLE `biere` (
  `BIE_CodeBiere` varchar(3) NOT NULL,
  `BIE_DesignationBiere` varchar(20) NOT NULL,
  `BIE_DescriptionBiere` varchar(1000) NOT NULL,
  `BIE_LienImageBiere` varchar(100) NOT NULL,
  `CAT_CodeCategorieBiere` varchar(3) NOT NULL,
  `BIE_Degre` decimal(4,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `biere`
--

INSERT INTO `biere` (`BIE_CodeBiere`, `BIE_DesignationBiere`, `BIE_DescriptionBiere`, `BIE_LienImageBiere`, `CAT_CodeCategorieBiere`, `BIE_Degre`) VALUES
('ACD', 'AC/DC bière', 'Une canette de 50 cl pour tous les amateurs de hard rock ! ', 'ACDC', 'BLD', '5.0'),
('AF1', 'Affligem Blonde', 'L''excellence de la bière belge d''abbaye avec cette triple Blonde en bouteille de 33 centilitres ! ', 'AffligemBlonde', 'BLD', '7.0'),
('BF1', 'Blanche Foudroyante', 'Une Grande Réserve blanche étonnante aux saveurs douces et rafraîchissantes ! ', 'BlancheFoudroyante', 'BLC', '5.0'),
('BSA', 'Brewdog Nanny State', 'Sans alcool ne veut pas dire sans caractère et Brewdog nous le prouve avec cette surprenante Nanny State !', 'BrewDogSansAlcool', 'SAL', '0.0'),
('CBL', 'Chimay Bleue', 'Une bière belge  trappiste brune fruitée et millésimée, elle peut vieillir en cave ! ', 'ChimayBleue', 'BRU', '9.0'),
('CI1', 'Piste Noire ', 'Ronde et gourmande, la Piste Noire est une bière qui vous surprendra par son amertume discrète et son corps puissant. Ses notes de céréales légèrement torréfiées et de caramel sont un enchantement pour le palais. Sa robe ambrée, sa mousse généreuse et son corps malté transformeront une simple dégustation en un délicieux moment de bonheur vrai. Le nez développe cette force maltée et préserve la subtilité de ses arômes.En bouche, la rondeur accompagne l''extrême délicatesse des houblons dévoilant un équilibre des plus remarquables.', 'PisteNoire', 'AMB', '5.0'),
('EDM', 'Elav Dark Metal', 'Un Imperial Stout qui fera trembler les plus courageux d''entre vous ! ', 'ElavDarkMetal', 'NOI', '8.5'),
('FA1', 'Faro Ambrée', 'Une bière belge fruitée, désaltérante et douce. La bière préférée des femmes ! ', 'FaroAmbre', 'AMB', '4.0'),
('FL2', 'Floris Framboise', 'La Floris Framboises est une bière de type spéciale à fermentation haute, titrant 3.6%, conçue par la brasserie Huyghe en Belgique?. Saveurs de framboises, légèrement acide. Bière rafraîchissante, facile à boire.???', 'FlorisFramboise', 'ARO', '3.0'),
('FL3', 'Floris Fraise', 'La Floris fraises gardenbeer est une bière de type spéciale à fermentation haute, titrant 3.6%, conçue par la brasserie Huyghe en Belgique?. Arôme de fraise très parfumé. Goût sucré mais sans saturer la saveur du fruit. A consommer très frais.??', 'FlorisFraise', 'ARO', '3.0'),
('GBA', 'Grimbergen Blanche', 'La Grim qui vous régalera pour l''été, idéale par journées ensoleillées ! ', 'GrimbergenBlanche', 'BLC', '6.0'),
('GGB', 'Grimbergen Blonde', 'Une bière belge traditionnelle chargée d''histoire ! ', 'GrimbergenBlonde', 'BLD', '6.7'),
('KF1', 'Kriek Foudroyante', 'Une bière gourmande aromatisée à la cerise, brassée pour Difcom SA!', 'KriekFoudroyante', 'KRI', '3.0'),
('LE1', 'Leffe Ruby', 'La Leffe ruby est une bière de type abbaye à fermentation haute, titrant 5%. Elle dévoile des arômes de fruits rouges, légèrement épicés, des notes de framboise. On retrouve enbouche, une saveur florale, laissant un souvenir boisé. Parfaite pour l''apéritif. Bière fruitée, épicée, douce et rafraîchissante.?', 'LeffeRuby', 'ARO', '5.0'),
('LV1', 'La Levrette', 'Une bière au plaisir partagé ! ', 'Levrette', 'BLD', '5.0'),
('MBB', 'Blonde Mont Blanc', 'Une bière venue de haut pour vous servir... ', 'BlondeMontBlanc', 'BLD', '6.0'),
('MS1', 'Mort Subite', 'Une bière belge délicieuse de type Lambic Fruit aromatisée à la cerise griotte ', 'MortSubite', 'KRI', '4.0'),
('OR1', 'Orval Ambrée', 'Bière trappiste de dégustation, Orval dévoile un arôme houblonné intense et une pointe d''acidité . Cette bière révèle des arômes différents en fonction de la température à laquelle elle est servie, les amateurs sauront l''apprécier à sa juste valeur. ', 'OrvalAmbre', 'AMB', '6.0'),
('PI1', 'Pietra Ambrée', 'Une bière corse à la farine de châtaignes. Une Piètre comme disent nos amis Corses ! ', 'PietraAmbre', 'AMB', '6.0'),
('PMB', 'Pêche Mel Bush', 'La Pêche mel bush est une bière de type à fermentation haute?, titrant 8.5%. Au nez, des arômes de pêches se dégagent, masquant la présence du houblon. En bouche, on retrouve les influences de malt, dominé par les saveurs fruitées de la pêche. L''amertume est légère et perceptible en fin de bouche.?', 'PecheMelBush', 'ARO', '8.0'),
('PSA', 'Palm sans Alcool', 'La bière sans alcool de chez Palm, anciennement Palm Green ! ', 'PalmSansAlcool', 'SAL', '0.0'),
('RB6', 'Rochefort 6', 'Une des 3 bières trappistes de l''Abbaye de Rochefort !  ', 'Rochefort6', 'BRU', '7.5'),
('RCR', 'Rince Cochon Rouge', 'La Rince cochon est une bière fruitée et désaltérante titrant 7.5?%. Au nez, on ressent tout de suite les arômes fruités. En bouche, on retrouve des saveurs douces et fruitées, des notes de framboise, de cerise, et de fraise. On peut également ressentir le houblon, l''orge, et le malt.?', 'RinceCochonRouge', 'ARO', '7.0'),
('SA1', 'Samichalus Ambrée', 'Bière autrichienne appartenant aux bières les plus fortes du monde ! Fait office de digestif ! ', 'SamiAmbre', 'AMB', '14.0'),
('YBB', 'Yellow Belly Stout', 'Une Imperial stout étonnante brassée par la brasserie Buxton en collaboration avec Omnipollo. ', 'YellowBellyStout', 'NOI', '11.0');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `CAT_CodeCategorieBiere` varchar(3) NOT NULL,
  `CAT_LibelleCategorieBiere` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`CAT_CodeCategorieBiere`, `CAT_LibelleCategorieBiere`) VALUES
('AMB', 'Ambrée'),
('ARO', 'Aromatisée'),
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
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `BIE_codeBiere` varchar(3) NOT NULL,
  `UT_numUtil` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `prix`
--

CREATE TABLE `prix` (
  `QUA_CodeQuantite` varchar(3) NOT NULL,
  `BIE_CodeBiere` varchar(3) NOT NULL,
  `PRX_Prix` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `prix`
--

INSERT INTO `prix` (`QUA_CodeQuantite`, `BIE_CodeBiere`, `PRX_Prix`) VALUES
('C50', 'ACD', '5.00'),
('B33', 'AF1', '2.00'),
('B25', 'BF1', '1.60'),
('B33', 'BSA', '2.60'),
('B33', 'CBL', '2.90'),
('B33', 'CI1', '2.00'),
('B75', 'CI1', '6.00'),
('FUC', 'CI1', '75.00'),
('B33', 'EDM', '4.60'),
('B25', 'FA1', '1.00'),
('B33', 'FL2', '2.00'),
('B33', 'GBA', '1.60'),
('B33', 'GGB', '1.60'),
('B25', 'KF1', '2.00'),
('B75', 'LE1', '7.00'),
('B33', 'LV1', '2.00'),
('B75', 'MBB', '5.00'),
('B25', 'MS1', '1.00'),
('B33', 'OR1', '2.00'),
('B33', 'PI1', '3.00'),
('B75', 'PI1', '7.00'),
('FUC', 'PI1', '39.00'),
('B33', 'PMB', '2.00'),
('B25', 'PSA', '1.80'),
('B33', 'RB6', '2.30'),
('B33', 'RCR', '2.00'),
('B33', 'SA1', '5.00'),
('B33', 'YBB', '9.80');

-- --------------------------------------------------------

--
-- Structure de la table `quantite`
--

CREATE TABLE `quantite` (
  `QUA_CodeQuantite` varchar(3) NOT NULL,
  `QUA_LibelleQuantite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `quantite`
--

INSERT INTO `quantite` (`QUA_CodeQuantite`, `QUA_LibelleQuantite`) VALUES
('B1L', 'Bouteille de 1 Litre'),
('B25', 'Bouteille de 25cl'),
('B33', 'Bouteille de 33cl'),
('B75', 'Bouteille de 75cl'),
('C33', 'Canette de 33cl'),
('C50', 'Canette de 50 cl'),
('F20', 'Fut de 20 Litres'),
('F25', 'Fut de 25 Litres'),
('F30', 'Fut de 30 Litres'),
('FUC', 'Fut de 50 Litres');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `UT_numUtil` int(5) NOT NULL,
  `UT_nomUtil` varchar(10) NOT NULL,
  `UT_prenomUtil` varchar(10) NOT NULL,
  `UT_adresseUtil` varchar(50) NOT NULL,
  `UT_codePostalUtil` varchar(5) NOT NULL,
  `UT_villeUtil` varchar(50) NOT NULL,
  `UT_identifiantUtil` varchar(50) DEFAULT NULL,
  `UT_motDePasseUtil` varchar(100) NOT NULL,
  `salt` varchar(23) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`UT_numUtil`, `UT_nomUtil`, `UT_prenomUtil`, `UT_adresseUtil`, `UT_codePostalUtil`, `UT_villeUtil`, `UT_identifiantUtil`, `UT_motDePasseUtil`, `salt`, `role`) VALUES
(1, '', '', '', '', '', 'saintbreuvage', 'IEUYtEyGg0lUBJHNZ/i1ugeKK5hVxM2WOXK1rmyyq2Nuu2Q1+UtoVCI2Rz9rvvOx6L819LJQnRFcfo0P4on7RA==', '%qugq3NAYfC1MKwrW?yevbE', 'ROLE_ADMIN');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`AC_numAchat`),
  ADD KEY `FK_Achat_utilisateur_id` (`UT_numUtil`);

--
-- Index pour la table `biere`
--
ALTER TABLE `biere`
  ADD PRIMARY KEY (`BIE_CodeBiere`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`CAT_CodeCategorieBiere`);

--
-- Index pour la table `prix`
--
ALTER TABLE `prix`
  ADD PRIMARY KEY (`BIE_CodeBiere`,`QUA_CodeQuantite`);

--
-- Index pour la table `quantite`
--
ALTER TABLE `quantite`
  ADD PRIMARY KEY (`QUA_CodeQuantite`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`UT_numUtil`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `achat`
--
ALTER TABLE `achat`
  MODIFY `AC_numAchat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `UT_numUtil` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
