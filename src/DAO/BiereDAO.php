<?php
namespace LeSaintBreuvage\DAO;
use Doctrine\DBAL\Connection;
use LeSaintBreuvage\Domain\Biere; 

class BiereDAO extends DAO
{

        
      /**
     * @var \LeSaintBreuvage\DAO\CategorieDAO
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
        $sql = "select * from biere order by BIE_CodeBiere asc";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $bieres = array();
        foreach ($result as $row) {
            $biereCode = $row['BIE_CodeBiere'];
            $bieres[$biereCode] = $this->buildDomainObject($row);
        }
        return $bieres;
    }
    

    
        public function findAmbree() {
        $sql = "select * from biere where CAT_CodeCategorieBiere = 'AMB' order by BIE_DesignationBiere";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $bieres = array();
        foreach ($result as $row) {
            $biereDesi = $row['BIE_DesignationBiere'];
            $bieres[$biereDesi] = $this->buildDomainObject($row);
        }
        return $bieres;
    }
    
            public function findAromatisee() {
        $sql = "select * from biere where CAT_CodeCategorieBiere = 'ARO' order by BIE_DesignationBiere";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $bieres = array();
        foreach ($result as $row) {
            $biereDesi = $row['BIE_DesignationBiere'];
            $bieres[$biereDesi] = $this->buildDomainObject($row);
        }
        return $bieres;
    }
    
    
        public function findArtisanale() {
        $sql = "select * from biere where CAT_CodeCategorieBiere = 'ART' order by BIE_DesignationBiere";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $bieres = array();
        foreach ($result as $row) {
            $biereDesi = $row['BIE_DesignationBiere'];
            $bieres[$biereDesi] = $this->buildDomainObject($row);
        }
        return $bieres;
    }
    
    
        public function findBlanche() {
        $sql = "select * from biere where CAT_CodeCategorieBiere = 'BLC' order by BIE_DesignationBiere";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $bieres = array();
        foreach ($result as $row) {
            $biereDesi = $row['BIE_DesignationBiere'];
            $bieres[$biereDesi] = $this->buildDomainObject($row);
        }
        return $bieres;
    }
    
            public function findBlonde() {
        $sql = "select * from biere where CAT_CodeCategorieBiere = 'BLD' order by BIE_DesignationBiere";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $bieres = array();
        foreach ($result as $row) {
            $biereDesi = $row['BIE_DesignationBiere'];
            $bieres[$biereDesi] = $this->buildDomainObject($row);
        }
        return $bieres;
    }
    
    
        public function findBrune() {
        $sql = "select * from biere where CAT_CodeCategorieBiere = 'BRU' order by BIE_DesignationBiere";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $bieres = array();
        foreach ($result as $row) {
            $biereDesi = $row['BIE_DesignationBiere'];
            $bieres[$biereDesi] = $this->buildDomainObject($row);
        }
        return $bieres;
    }
    
    
        public function findCervoise() {
        $sql = "select * from biere where CAT_CodeCategorieBiere = 'CER' order by BIE_DesignationBiere";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $bieres = array();
        foreach ($result as $row) {
            $biereDesi = $row['BIE_DesignationBiere'];
            $bieres[$biereDesi] = $this->buildDomainObject($row);
        }
        return $bieres;
    }
    
                public function findKriek() {
        $sql = "select * from biere where CAT_CodeCategorieBiere = 'KRI' order by BIE_DesignationBiere";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $bieres = array();
        foreach ($result as $row) {
            $biereDesi = $row['BIE_DesignationBiere'];
            $bieres[$biereDesi] = $this->buildDomainObject($row);
        }
        return $bieres;
    }

    
       public function find($code) {
        $sql = "select * from biere where BIE_CodeBiere=?";
        $row = $this->getDb()->fetchAssoc($sql, array($code));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Aucune bière ne correspond à l'identifiant " . $code);
    }
    
    /**
     * Creates an biere object based on a DB row.
     *
     * @param array $row The DB row containing Categorie data.
     * @return \LeSaintBreuvage\Domain\Biere
     */
    protected function buildDomainObject($row) {
        $biere = new Biere();
        $biere->setCodeBiere($row['BIE_CodeBiere']);
        $biere->setLibelle($row['BIE_DesignationBiere']);
        $biere->setDescription($row['BIE_DescriptionBiere']);
        $biere->setImage($row['BIE_LienImageBiere']);
        $biere->setDegre($row['BIE_DegreBiere']);
        
            if (array_key_exists('CAT_CodeCategorieBiere', $row)) {
            // Trouve et définit la catégorie associée
            $codeCat = $row['CAT_CodeCategorieBiere'];
            $categorie = $this->categorieDAO->find($codeCat);
            $biere->setCategorie($categorie);
        }
        
        return $biere;
    }
}