<?php


namespace LeSaintBreuvage\Domain;


class CategorieBiere 

{

    /**

     * Categorie code.

     *

     * @var varchar2(3)

     */

    private $codeCat;


    /**

     * Categorie libelle.

     *

     * @var varchar2(20)

     */

    private $libelle;



    public function getCodeCat() {

        return $this->codeCat;

    }


    public function setCodeCat($codeCat) {

        $this->codeCat = $codeCat;

    }


    public function getLibelle() {

        return $this->libelle;

    }


    public function setLibelle($libelle) {

        $this->libelle = $libelle;

    }



}