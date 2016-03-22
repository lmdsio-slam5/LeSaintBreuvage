<?php

namespace LeSaintBreuvage\DAO;

use LeSaintBreuvage\Domain\Achat;

class AchatDAO extends DAO
{
  
    protected function buildDomainObject($row) 
    {
        $achat = new achat();
        $achat->setIdVisiteur($row['UT_numUtil']);
        $achat->setAchatDate($row['AC_dateAchat']);
        $achat->setAchatTotal($row['AC_totalAchat']);
        return $achat;
    }
 
    public function findByUser($id) 
    {
        $sql = "select * from Achat where UT_numUtil=?";
        $result = $this->getDb()->fetchAll($sql, array($id));

		$achats = array();
        foreach ($result as $row) 
        {
            $achats[] = $this->buildDomainObject($row);
        }
        return $achats;
    }

	public function addAchat($id_utilisateur, $total, $date)
	{
		$data = array(
			'UT_numUtil' => $id_visiteur,
			'AC_dateAchat' => $date,
			'AC_totalAchat' => $total
			);
		$this->getDb()->insert('Achat', $data);
	}
    
        public function NbAchat($id_utilisateur)
    {
    	$sql = "select count(*) AS Nb from achat where UT_numUtil=?";
		$nombre = $this->getDb()->fetchAssoc($sql, array($id_utilisateur));

        return $nombre['Nb'];
    }
    
}