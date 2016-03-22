<?php

namespace LeSaintBreuvage\Domain;

class Panier
{
    /**
     * Prod id.
     *
     * @var int
     */
    private $codeBiere;

	/**
     * User id.
     *
     * @var int
     */
    private $idUtilisateur;
    
    /**
     * Price.
     *
     * @var float
     */
    private $prix;



    public function getIdUtilisateur()
	{
        return $this->idUtilisateur;
    }

    public function setIdVisiteur($idUtilisateur)
	{
        $this->idUtilisateur = $idUtilisateur;
    }
    
   public function getCodeBiere() {
        return $this->codeBiere;
    }
    public function setCodeBiere($codeBiere) {
        $this->codeBiere = $codeBiere;
    }
    
    public function getPrix()
	{
        return $this->prix;
    }

    public function setPrix($prix)
	{
        $this->prix = $prix;
    }
}