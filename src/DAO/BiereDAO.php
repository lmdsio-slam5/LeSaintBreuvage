<?php
namespace LeSaintBreuvage\DAO;
use Doctrine\DBAL\Connection;
use LeSaintBreuvage\Domain\Biere; 

class BiereDAO extends DAO
{

        
      /**
     * @var \GSB\DAO\CategorieDAO
     */
    private $categorieDAO;

    public function setCategorieDAO(CategorieBiereDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }
    
    /**
     * Return a list of all beers, sorted by designation (most recent first).
     *
     * @return array A list of all beers.
     */
    public function findAll() {
        $sql = "select * from biere order by BIE_DesignationBiere asc";
        $result = $this->db->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $bieres = array();
        foreach ($result as $row) {
            $biereCode = $row['BIE_DesignationBiere'];
            $bieres[$biereCode] = $this->buildCategorie($row);
        }
        return $bieres;
    }
    
        /**
     * Renvoie la liste de toutes les bières appartenant à une catégorie
     *
     * @param integer $categorieCode le code de la catégorie
     *
     * @return array Liste des bières
     */
    public function findAllByCategorieBiere($codeCat) {
        $sql = "select * from biere where CAT_CodeCategorieBiere=? order by BIE_DesignationBiere";
        $result = $this->db->fetchAll($sql, array($codeCat));
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $bieres = array();
        foreach ($result as $row) {
            $biereCode = $row['BIE_CodeBiere'];
            $bieres[$biereCode] = $this->buildDomainObject($row);
        }
        return $bieres;
    }
    
       public function find($codeBiere) {
        $sql = "select * from biere where BIE_CodeBiere=?";
        $row = $this->db->fetchAssoc($sql, array($codeBiere));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Aucue bière ne correspond à l'identifiant " . $codeBiere);
    }
    
    /**
     * Creates an biere object based on a DB row.
     *
     * @param array $row The DB row containing Categorie data.
     * @return \LeSaintBreuvage\Domain\Biere
     */
    private function buildBiere($row) {
        $biere = new Biere();
        $biere->setCodeBiere($row['BIE_DesignationBiere']);
        $biere->setLibelle($row['BIE_DesignationBiere']);
        $biere->setDescription($row['BIE_DescriptionBiere']);
        $biere->setImage($row['BIE_LienImageBiere']);
        
            if (array_key_exists('CAT_CodeCategorieBiere', $row)) {
            // Trouve et définit la catégorie associée
            $codeCat = $row['CAT_CodeCategorieBiere'];
            $categorie = $this->CategorieBiereDAO->find($codeCat);
            $biere->setCategorie($categorie);
        }
        
        return $biere;
    }
}