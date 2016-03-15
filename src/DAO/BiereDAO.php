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
        $sql = "select * from biere order by BIE_DesignationBiere asc";
        $result = $this->getDb->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $bieres = array();
        foreach ($result as $row) {
            $biereCode = $row['BIE_DesignationBiere'];
            $bieres[$biereCode] = $this->buildDomainObject($row);
        }
        return $bieres;
    }
    

    
       public function find($codeBiere) {
        $sql = "select * from biere where BIE_CodeBiere=?";
        $row = $this->getDb->fetchAssoc($sql, array($codeBiere));

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
    protected function buildDomainObject($row) {
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