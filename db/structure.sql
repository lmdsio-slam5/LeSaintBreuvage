CREATE TABLE IF NOT EXISTS `categorie` (
  `CAT_CodeCategorieBiere` varchar(3) NOT NULL,
  `CAT_LibelleCategorieBiere` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `lesaintbreuvage`.`biere` ( `BIE_CodeBiere` VARCHAR(3) NOT NULL , `BIE_DesignationBiere` VARCHAR(20) NOT NULL , `BIE_DescriptionBiere` VARCHAR(1000) NOT NULL , `BIE_LienImageBiere` VARCHAR(100) NOT NULL , `CAT_CodeCategorieBiere` VARCHAR(3) NOT NULL ) ENGINE = InnoDB;

CREATE TABLE `lesaintbreuvage`.`prix` ( `QUA_CodeQuantite` VARCHAR(3) NOT NULL , `QUA_LibelleQuantite` VARCHAR(50) NOT NULL ) ENGINE = InnoDB;
CREATE TABLE `lesaintbreuvage`.`quantite` ( `QUA_CodeQuantite` VARCHAR(3) NOT NULL , `BIE_CodeBiere` VARCHAR(3) NOT NULL , `PRX_Prix` VARCHAR(7) NOT NULL ) ENGINE = InnoDB;

ALTER TABLE `biere` ADD PRIMARY KEY(`BIE_CodeBiere`);
ALTER TABLE `categorie` ADD PRIMARY KEY(`CAT_CodeCategorieBiere`);
ALTER TABLE `prix` ADD PRIMARY KEY(`BIE_CodeBiere`);
ALTER TABLE `quantite` ADD PRIMARY KEY(`QUA_CodeQuantite`);
ALTER TABLE `biere` ADD `Degré` VARCHAR(4) NOT NULL AFTER `CAT_CodeCategorieBiere`;
ALTER TABLE `biere` CHANGE `Degré` `BIE_Degre` DECIMAL(4,1) NOT NULL;
ALTER TABLE `prix` CHANGE `prix` `prix` DECIMAL(7,2) NOT NULL;
ALTER TABLE `prix` CHANGE `prix` `PRX_Prix` DECIMAL(7,2) NOT NULL;
CREATE TABLE `utilisateur` (
  `UT_numUtil` int(5) NOT NULL,
  `UT_nomUtil` varchar(10) NOT NULL,
  `UT_prenomUtil` varchar(10) NOT NULL,
  `UT_adresseUtil` varchar(50) NOT NULL,
  `UT_codePostalUtil` varchar(5) NOT NULL,
  `UT_villeUtil` varchar(50) NOT NULL,
  `UT_courrielUtil` varchar(30) NOT NULL,
  `UT_motDePasseUtil` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`UT_numUtil`);
