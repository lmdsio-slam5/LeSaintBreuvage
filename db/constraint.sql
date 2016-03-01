ALTER TABLE `biere` ADD CONSTRAINT `FK_biere_categorie` 
FOREIGN KEY (`CAT_CodeCategorieBiere`) 
REFERENCES `lesaintbreuvage`.`categorie`(`CAT_CodeCategorieBiere`) 
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `prix` ADD CONSTRAINT `FK_biere_prix` 
FOREIGN KEY (`BIE_CodeBiere`) 
REFERENCES `lesaintbreuvage`.`prix`(`BIE_CodeBiere`) 
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `prix` ADD CONSTRAINT `FK_biere_quantite` 
FOREIGN KEY (`QUA_CodeQuantite`) 
REFERENCES `lesaintbreuvage`.`prix`(`QUA_CodeQuantite`) 
ON DELETE CASCADE ON UPDATE CASCADE;