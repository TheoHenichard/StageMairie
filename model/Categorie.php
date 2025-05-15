<?php

class Categorie{
    public $idCategorie;
    public $idTypeEntretien;
    public $superCategorie;
    public $ordre;
    public $nom;

    public function __construct($idCategorie, $idTypeEntretien, $superCategorie, $ordre, $nom){
        $this->idCategorie = $idCategorie;
        $this->idTypeEntretien = $idTypeEntretien;
        $this->superCategorie = $superCategorie;
        $this->ordre = $ordre;
        $this->nom = $nom;
    }

    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    public function setIdCategorie($idCategorie): void
    {
        $this->idCategorie = $idCategorie;
    }

    public function getIdTypeEntretien()
    {
        return $this->idTypeEntretien;
    }

    public function setIdTypeEntretien($idTypeEntretien): void
    {
        $this->idTypeEntretien = $idTypeEntretien;
    }

    public function getSuperCategorie()
    {
        return $this->superCategorie;
    }

    public function setSuperCategorie($superCategorie): void
    {
        $this->superCategorie = $superCategorie;
    }

    public function getOrdre()
    {
        return $this->ordre;
    }

    public function setOrdre($ordre): void
    {
        $this->ordre = $ordre;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom): void
    {
        $this->nom = $nom;
    }


}