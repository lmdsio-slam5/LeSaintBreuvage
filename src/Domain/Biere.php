<?php


namespace LeSaintBreuvage\Domain;


class Biere

{

    /**

     * Biere code.

     *

     * @var varchar2(3)

     */

    private $codeBiere;


    /**

     * Biere libelle.

     *

     * @var varchar2(20)

     */

    private $libelle;
    
      /**

     * Biere description.

     *

     * @var varchar2(20)

     */

    private $description;
    
          /**

     * Biere image.

     *

     * @var varchar2(20)

     */

    private $image;
    
              /**

     * Biere image.

     *

     * @var varchar2(20)

     */

    private $categorie;



    public function getCodeBiere() {

        return $this->codeBiere;

    }


    public function setCodeBiere($codeBiere) {

        $this->codeBiere = $codeBiere;

    }


    public function getLibelle() {

        return $this->libelle;

    }


    public function setLibelle($libelle) {

        $this->libelle = $libelle;

    }
    
        public function getDescription() {

        return $this->description;

    }


    public function setDescription($description) {

        $this->description = $description;

    }
    
            public function getImage() {

        return $this->image;

    }


    public function setImage($image) {

        $this->image = $image;

    }
    
     public function getCategorie() {

        return $this->categorie;

    }


    public function setCategorie($categorie) {

        $this->categorie = $categorie;

    }



}