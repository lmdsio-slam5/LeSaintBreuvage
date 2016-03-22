<?php

namespace LeSaintBreuvage\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

class Utilisateur implements UserInterface
{
    /**
     * id du utilisateur.
     *
     * @var integer
     */
    private $id;

    /**
     * nom du utilisateur.
     *
     * @var string
     */
    private $nom;

    /**
     * prenom du utilisateur
     *
     * @var string
     */
    private $prenom;
    
    /**
     * adresse du Utilisateur.
     *
     * @var string
     */
    private $adresse;
    
    /**
     *  cp du utilisateur.
     *
     * @var string
     */
    private $cp;
    
    /**
     * ville du utilisateur.
     *
     * @var string
     */
    private $ville;
    
    
    /**
     * username du utilisateur.
     *
     * @var string
     */
    private $username;
    
    /**
     * mot de passe du utilisateur.
     *
     * @var string
     */
    private $password;

    /**
     * Salt that was originally used to encode the password.
     *
     * @var string
     */
    private $salt;

    /**
     * Role.
     * Values : ROLE_USER or ROLE_ADMIN.
     *
     * @var string
     */
    private $role;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @inheritDoc
     */
    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
    
    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    
    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }
    
    public function getCp() {
        return $this->cp;
    }

    public function setCp($cp) {
        $this->cp = $cp;
    }
    
    public function getVille() {
        return $this->ville;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    
        /**
     * @inheritDoc
     */
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * @inheritDoc
     */
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array($this->getRole());
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        // Nothing to do here
    }
}