<?php

namespace LeSaintBreuvage\Domain;

class Achat
{
	/**
     * User id.
     *
     * @var int
     */
    private $idUtilisateur;
    
    /**
     * achat date.
     *
     * @var date
     */
    private $dateAchat;
    
    /**
     * achat total.
     *
     * @var float
     */
    private $totalAchat;



    public function getIdUtilisateur()
	{
        return $this->idUtilisateur;
    }

    public function setIdVisiteur($idUtilisateur)
	{
        $this->idUtilisateur = $idUtilisateur;
    }
    
    public function getTotalAchat()
	{
        return $this->total;
    }

    public function setTotalAchat($total)
	{
        $this->total = $total;
    }
    
    public function getDateAchat()
	{
        return $this->date;
    }

    public function setDateAchat($date)
	{
        $this->date = $date;
    }
}