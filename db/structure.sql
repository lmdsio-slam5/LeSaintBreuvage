CREATE TABLE `achat` (
  `AC_numAchat` int(4) NOT NULL,
  `UT_numUtil` int(5) NOT NULL,
  `achat_date` date NOT NULL,
  `achat_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `biere` (
  `BIE_CodeBiere` varchar(3) NOT NULL,
  `BIE_DesignationBiere` varchar(20) NOT NULL,
  `BIE_DescriptionBiere` varchar(1000) NOT NULL,
  `BIE_LienImageBiere` varchar(100) NOT NULL,
  `CAT_CodeCategorieBiere` varchar(3) NOT NULL,
  `BIE_Degre` decimal(4,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `categorie` (
  `CAT_CodeCategorieBiere` varchar(3) NOT NULL,
  `CAT_LibelleCategorieBiere` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `panier` (
  `BIE_codeBiere` varchar(3) NOT NULL,
  `UT_numUtil` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `prix` (
  `QUA_CodeQuantite` varchar(3) NOT NULL,
  `BIE_CodeBiere` varchar(3) NOT NULL,
  `PRX_Prix` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `quantite` (
  `QUA_CodeQuantite` varchar(3) NOT NULL,
  `QUA_LibelleQuantite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
