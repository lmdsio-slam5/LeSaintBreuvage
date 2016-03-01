<?php

namespace LeSaintBreuvage\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use GSB\Domain\Utilisateur;

class UtilisateurDAO extends DAO implements UserProviderInterface
{

    

    /**
     * Renvoie un utilisateur à partir de son identifiant
     *
     * @param integer $id L'identifiant du utilisateur
     *
     * @return \GSB\Domain\Utilisateur|Lève un exception si aucun utilisateur ne correspond
     */
    public function find($id) {
        $sql = "select * from utilisateur where id_utilisateur=?";
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
        $sql = "select * from utilisateur where login_utilisateur=?";
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
        return 'GSB\Domain\Utilisateur' === $class;
    }

    /**
     * Crée un utilisateur gràce à la ligne récupérée.
     *
     * @param array la ligne contient les informations du utilisateur.
     * @return \GSB\Domain\Utilisateur
     */
    protected function buildDomainObject($row) {
        $utilisateur = new Utilisateur();
        $utilisateur->setId($row['id_utilisateur']);
        $utilisateur->setNom($row['nom_utilisateur']);
        $utilisateur->setPrenom($row['prenom_utilisateur']);
        $utilisateur->setAdresse($row['adresse_utilisateur']);
        $utilisateur->setCp($row['cp_utilisateur']);
        $utilisateur->setVille($row['ville_utilisateur']);
        $utilisateur->setUsername($row['login_utilisateur']);
        $utilisateur->setPassword($row['pwd_utilisateur']);
        $utilisateur->setSalt($row['salt']);
        $utilisateur->setRole($row['role']);
        return $utilisateur;
    }
}