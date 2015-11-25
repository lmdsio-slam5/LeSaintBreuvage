<?php
namespace LeSaintBreuvage\DAO;
use Doctrine\DBAL\Connection;
use LeSaintBreuvage\Domain\CategorieBiere;  //utilisation de la doctrine DAO au lieu de PDO
class CategorieBiereDAO
{
    /**
     * Database connection
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
     * Return a list of all categories, sorted by date (most recent first).
     *
     * @return array A list of all categories.
     */
    public function findAll() {
        $sql = "select * from categorie order by CAT_CodeCategorieBiere asc";
        $result = $this->db->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $categories = array();
        foreach ($result as $row) {
            $categorieCode = $row['CAT_CodeCategorieBiere'];
            $categories[$categorieCode] = $this->buildDomainObject($row);
        }
        return $categories;
    }
    
    
    /**
     * Renvoie une categorie à partir de son identifiant
     *
     * @param integer $codeCat le code de la catégorie
     *
     * @return \GSB\Domain\Categorie|Lève un exception si aucune catégorie ne correspond
     */
    public function find($codeCat) {
        $sql = "select * from categorie where CAT_CodeCategorieBiere=?";
        $row = $this->getDb()->fetchAssoc($sql, array($codeCat));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Aucune catégorie ne correspond au code " . $codeCat);
    }

    /**
     * Crée un objet CategorieBiere à partir d'une ligne de résultat BD
     *
     * @param array $row La ligne de résultat BD
     *
     * @return \GSB\Domain\CategorieBiere
     */
    protected function buildDomainObject($row) {
        $categorie = new CategorieBiere();
        $categorie->setCodeCat($row['CAT_CodeCategorieBiere']);
        $categorie->setLibelle($row['CAT_LibelleCategorieBiere']);
        return $categorie;
    }
}