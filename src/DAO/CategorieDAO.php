<?php
namespace LeSaintBreuvage\DAO;
use Doctrine\DBAL\Connection;
use LeSaintBreuvage\Domain\Categorie;  //utilisation de la doctrine DAO au lieu de PDO
class CategorieDAO
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
            $categories[$categorieCode] = $this->buildCategorie($row);
        }
        return $categories;
    }
    /**
     * Creates an Categorie object based on a DB row.
     *
     * @param array $row The DB row containing Categorie data.
     * @return \LeSaintBreuvage\Domain\Article
     */
    private function buildCategorie($row) {
        $categorie = new Categorie();
        $categorie->setCodeCat($row['CAT_CodeCategorieBiere']);
        $categorie->setLibelle($row['CAT_LibelleCategorieBiere']);
        return $categorie;
    }
}