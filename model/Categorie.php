<?php

class Categorie{
    public $idCat;
    public $nom;
    public $ordre;
    public $titre;

    public function __construct($idCat, $nom, $ordre, $titre){
        $this->idCat = $idCat;
        $this->nom = $nom;
        $this->ordre = $ordre;
        $this->titre = $titre;
    }

    public function getIdCat()
    {
        return $this->idCat;
    }

    public function setIdCat($idCat): void
    {
        $this->idCat = $idCat;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    public function getOrdre()
    {
        return $this->ordre;
    }

    public function setOrdre($ordre): void
    {
        $this->ordre = $ordre;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }


}