-- Indexes for dumped tables
-- primary keys --

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`CAT_CodeCategorieBiere`);
  
  --
-- Indexes for table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`AC_numAchat`),
  ADD KEY `FK_Achat_utilisateur_id` (`UT_numUtil`);
  
  --
-- Indexes for table `biere`
--
ALTER TABLE `biere`
  ADD PRIMARY KEY (`BIE_CodeBiere`),
  ADD KEY `FK_biere_categorie` (`CAT_CodeCategorieBiere`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD KEY `BIE_codeBiere` (`BIE_codeBiere`),
  ADD KEY `UT_numUtil` (`UT_numUtil`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`UT_numUtil`);



--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achat`
--
ALTER TABLE `achat`
  MODIFY `AC_numAchat` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `UT_numUtil` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;




-- foreign key
--
-- Constraints for table `biere`
--
ALTER TABLE `biere`
  ADD CONSTRAINT `FK_biere_categorie` FOREIGN KEY (`CAT_CodeCategorieBiere`) REFERENCES `categorie` (`CAT_CodeCategorieBiere`);

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_panier_biere` FOREIGN KEY (`BIE_codeBiere`) REFERENCES `biere` (`BIE_CodeBiere`),
  ADD CONSTRAINT `fk_panier_utilisateur` FOREIGN KEY (`UT_numUtil`) REFERENCES `utilisateur` (`UT_numUtil`);
  ALTER TABLE `utilisateur` CHANGE `UT_motDePasseUtil` `UT_motDePasseUtil` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;