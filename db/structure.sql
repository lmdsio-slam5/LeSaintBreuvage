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
