<?php
namespace LeSaintBreuvage\DAO;
use Doctrine\DBAL\Connection;
use LeSaintBreuvage\Domain\Biere; 

class BiereDAO
{
    /**
     * connection à la base
     *
     * @var \Doctrine\DBAL\Connection
     */
    private $db;
    /**
     * Constructor
     *
     * @param \Doctrine\DBAL\Connection The database connection object
     */
    public function __construct(Connection $db) {
        $this->db = $db;
    }
    
        
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
    public function findAllByCategorieBiere($categorieCode) {
        $sql = "select * from biere where CAT_CodeCategorieBiere=? order by BIE_DesignationBiere";
        $result = $this->db->fetchAll($sql, array($categorieCode));
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $bieres = array();
        foreach ($result as $row) {
            $biereCode = $row['BIE_CodeBiere'];
            $bieres[$biereCode] = $this->buildDomainObject($row);
        }
        return $bieres;
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
        $biere->setLibelle($row['BIE_DesignationBiere']);
        $biere->setLibelle($row['BIE_DesignationBiere']);
        
        return $biere;
    }
}