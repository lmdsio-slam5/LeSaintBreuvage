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
INSERT INTO `quantite` (`QUA_CodeQuantite`, `QUA_LibelleQuantite`) VALUES ('F30', 'Fut de 30 Litres'), ('F25', 'Fut de 25 Litres'), ('F20', 'Fut de 20 Litres'), ('B75', 'Bouteille de 75cl'), ('B33', 'Bouteille de 33cl')
INSERT INTO `quantite` (`QUA_CodeQuantite`, `QUA_LibelleQuantite`) VALUES ('B25', 'Bouteille de 25cl'), ('B10', 'Bouteille de 1 Litre'), ('C33', 'Canette de 33cl'), ('C50', 'Canette de 50 cl');
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
INSERT INTO `prix` (`QUA_CodeQuantite`, `BIE_CodeBiere`, `prix`) VALUES ('B25', 'MS1', '1,80'), ('B25', 'KF1', '2,00');
INSERT INTO `prix` (`QUA_CodeQuantite`, `BIE_CodeBiere`, `prix`) VALUES ('B75', 'LE1', '7,60'), ('B33', 'PMB', '2,35');
INSERT INTO `prix` (`QUA_CodeQuantite`, `BIE_CodeBiere`, `prix`) VALUES ('B33', 'RCR', '2,85'), ('B33', 'FL2', '2,45');
INSERT INTO `prix` (`QUA_CodeQuantite`, `BIE_CodeBiere`, `prix`) VALUES ('B33', 'FL3', '2,50');
INSERT INTO `prix` (`QUA_CodeQuantite`, `BIE_CodeBiere`, `prix`) VALUES ('B75', 'CI1', '6,00'), ('B33', 'CI1', '2,40');
INSERT INTO `prix` (`QUA_CodeQuantite`, `BIE_CodeBiere`, `prix`) VALUES ('B33', 'PI1', '3,00'), ('B75', 'PI1', '7,50'), ('FUC', 'PI1', '39,00');
INSERT INTO `prix` (`QUA_CodeQuantite`, `BIE_CodeBiere`, `prix`) VALUES ('B33', 'SA1', '5,10'), ('B33', 'OR1', '2,70');
UPDATE `biere` SET `BIE_Degre` = '5,9' WHERE `biere`.`BIE_CodeBiere` = 'CI1'; UPDATE `biere` SET `BIE_Degre` = '4,2' WHERE `biere`.`BIE_CodeBiere` = 'FA1'; UPDATE `biere` SET `BIE_Degre` = '6,2' WHERE `biere`.`BIE_CodeBiere` = 'OR1'; UPDATE `biere` SET `BIE_Degre` = '6' WHERE `biere`.`BIE_CodeBiere` = 'PI1'; UPDATE `biere` SET `BIE_Degre` = '14' WHERE `biere`.`BIE_CodeBiere` = 'SA1'; UPDATE `biere` SET `BIE_Degre` = '3,6' WHERE `biere`.`BIE_CodeBiere` = 'FL2'; UPDATE `biere` SET `BIE_Degre` = '3,6' WHERE `biere`.`BIE_CodeBiere` = 'FL3'; UPDATE `biere` SET `BIE_Degre` = '5' WHERE `biere`.`BIE_CodeBiere` = 'LE1'; UPDATE `biere` SET `BIE_Degre` = '8,5' WHERE `biere`.`BIE_CodeBiere` = 'PMB'; UPDATE `biere` SET `BIE_Degre` = '7,5' WHERE `biere`.`BIE_CodeBiere` = 'RCR'; UPDATE `biere` SET `BIE_Degre` = '5' WHERE `biere`.`BIE_CodeBiere` = 'LV1'; UPDATE `biere` SET `BIE_Degre` = '3,5' WHERE `biere`.`BIE_CodeBiere` = 'KF1'; UPDATE `biere` SET `BIE_Degre` = '4' WHERE `biere`.`BIE_CodeBiere` = 'MS1';
INSERT INTO `biere` (`BIE_CodeBiere`, `BIE_DesignationBiere`, `BIE_DescriptionBiere`, `BIE_LienImageBiere`, `CAT_CodeCategorieBiere`, `BIE_Degre`) VALUES ('AF1', 'Affligem Blonde', 'L''excellence de la bière belge d''abbaye avec cette triple Blonde en bouteille de 33 centilitres ! ', 'AffligemBlonde', 'BLD', '7'), ('MBB', 'Blonde Mont Blanc', 'Une bière venue de haut pour vous servir... ', 'BlondeMontBlanc', 'BLD', '5.8');
INSERT INTO `biere` (`BIE_CodeBiere`, `BIE_DesignationBiere`, `BIE_DescriptionBiere`, `BIE_LienImageBiere`, `CAT_CodeCategorieBiere`, `BIE_Degre`) VALUES ('ACD', 'AC/DC bière', 'Une canette de 50 cl pour tous les amateurs de hard rock ! ', 'ACDC', 'BLD', '5'), ('GGB', 'Grimbergen Blonde', 'Une bière belge traditionnelle chargée d''histoire ! ', 'GrimbergenBlonde', 'BLD', '6.7');
