<?php

namespace LeSaintBreuvage\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use LeSaintBreuvage\Domain\Utilisateur;

class UtilisateurDAO extends DAO implements UserProviderInterface
{

    

    /**
     * Renvoie un utilisateur à partir de son identifiant
     *
     * @param integer $id L'identifiant du utilisateur
     *
     * @return \LeSaintBreuvage\Domain\Utilisateur|Lève un exception si aucun utilisateur ne correspond
     */
    public function find($id) {
        $sql = "select * from utilisateur where UT_numUtil=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Aucun utilisateur ne correspond à l'identifiant " . $id);
    }

    /**
     * {@inheritDoc}
     */
    public function loadUserByUsername($username)
    {
        $sql = "select * from utilisateur where UT_identifiantUtil=?";
        $row = $this->getDb()->fetchAssoc($sql, array($username));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new UsernameNotFoundException(sprintf('Le utilisateur na pas été trouvé', $username));
    }

    /**
     * {@inheritDoc}
     */
    public function refreshUser(UserInterface $utilisateur)
    {
        $class = get_class($utilisateur);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
        }
        return $this->loadUserByUsername($utilisateur->getUsername());
    }

    /**
     * {@inheritDoc}
     */
    public function supportsClass($class)
    {
        return 'LeSaintBreuvage\Domain\Utilisateur' === $class;
    }

    /**
     * Crée un utilisateur gràce à la ligne récupérée.
     *
     * @param array la ligne contient les informations du utilisateur.
     * @return \LeSaintBreuvage\Domain\Utilisateur
     */
    protected function buildDomainObject($row) {
        $utilisateur = new Utilisateur();
        $utilisateur->setId($row['UT_numUtil']);
        $utilisateur->setNom($row['UT_nomUtil']);
        $utilisateur->setPrenom($row['UT_prenomUtil']);
        $utilisateur->setAdresse($row['UT_adresseUtil']);
        $utilisateur->setCp($row['UT_codePostalUtil']);
        $utilisateur->setVille($row['UT_villeUtil']);
        $utilisateur->setUsername($row['UT_identifiantUtil']);
        $utilisateur->setPassword($row['UT_motDePasseUtil']);
        $utilisateur->setSalt($row['salt']);
        $utilisateur->setRole($row['role']);
        return $utilisateur;
    }
}