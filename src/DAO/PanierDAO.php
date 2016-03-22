<?php

namespace LeSaintBreuvage\DAO;

use LeSaintBreuvage\Domain\Panier;
use LeSaintBreuvage\Domain\Biere;

class PanierDAO extends DAO
{
	
    protected function buildDomainObject($row) 
    {
        $articlePanier = new Biere();
        $articlePanier->setCodeBiere($row['BIE_CodeBiere']);
        $articlePanier->setLibelle($row['BIE_DesignationBiere']);
        $articlePanier->setDescription($row['BIE_DescriptionBiere']);
        $articlePanier->setDegre($row['BIE_Degre']);
        $articlePanier->setCategorie($row['CAT_CodeCategorieBiere']);
        return $articlePanier;
    }
	
	/**
     * Return liste des articles commandés par un utilisateur
     *
     * @return array liste des articles
     */
    public function findProductsByUser($id_utilisateur) 
    {
        $sql = "select Biere.* from Biere, Panier where biere.codeBiere = Panier.codeArt and Panier.id_visiteur = ?";
        $result = $this->getDb()->fetchAll($sql, array($id_utilisateur));

        // Convert query result to an array of domain objects
        $bieres = array();
        foreach ($result as $row)
        {
            $biereCode = $row['BIE_CodeBiere'];
            $bieres[$biereCode] = $this->buildDomainObject($row);
        }
        return $bieres;
    }
    
	public function supprimerPanier($id_visiteur)
    {
    	$sql = "select * from Panier where UT_numUtil = ?";
    	$result = $this->getDb()->fetchAll($sql, array($id_visiteur));
    	
    	$sql = "delete from Panier where UT_numUtil = ?";
    	$this->getDb()->executeQuery($sql, array($id_visiteur));
    	foreach ($result as $row)
        {
        	
            $sql = "delete from Panier where BIE_CodeBiere = ?";
            $this->getDb()->executeQuery($sql, array($row['BIE_CodeBiere']));
            
            // supprime l'article de la liste des articles en vente
			$sql = "delete from article where BIE_CodeBiere = ?";
			$this->getDb()->executeQuery($sql, array($row['BIE_CodeBiere']));      
		}
    }
    
	/**
     * Return total du prix du panier d'un utilisateur
     *
     * @param id_visiteur $id_visiteur Id de l'utilisateur
     */
    public function totalPanier($id_visiteur) 
    {
        $sql = "SELECT SUM(article.prix) AS total FROM article, Panier WHERE Panier.id_visiteur=? and Panier.codeArt = article.codeArt";
        $prix = $this->getDb()->fetchAssoc($sql, array($id_visiteur));

        return $prix['total'];
    }
    
    
    public function articleExistant($id_visiteur, $codeArt) 
    {
        $sql = "SELECT * FROM Panier WHERE Panier.id_visiteur=? and Panier.codeArt = ?";
        $result = $this->getDb()->fetchAssoc($sql, array($id_visiteur, $codeArt));

        return ($result != NULL);
    }

	public function addProduct($id_visiteur, $codeArt)
	{
		$data = array(
			'id_visiteur' => $id_visiteur,
			'codeArt' => $codeArt
			);
		$this->getDb()->insert('Panier', $data);
	}
	

	public function removeProduct($id_visiteur, $codeArt)
	{
		$sql = "DELETE FROM Panier WHERE Panier.id_visiteur = ? AND Panier.codeArt = ?";
		$this->getDb()->executeQuery($sql, array($id_visiteur, $codeArt));
	}
}