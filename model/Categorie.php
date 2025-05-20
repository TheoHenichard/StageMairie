<?php

class Categorie{
    public $idCategorie;
    public $typeEntretien;
    public $superCategorie;
    public $ordre;
    public $nom;

    public function __construct(array $data = []){
        if (isset($data['idCategorie'])) {$this->idCategorie = $data['idCategorie'];}
        if (isset($data['typeEntretien'])) {$this->typeEntretien = $data['typeEntretien'];}
        if (isset($data['superCategorie'])) {$this->superCategorie = $data['superCategorie'];}
        if (isset($data['ordre'])) {$this->ordre = $data['ordre'];}
        if (isset($data['nom'])) {$this->nom = $data['nom'];}
    }

    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    public function setIdCategorie($idCategorie): void
    {
        $this->idCategorie = $idCategorie;
    }

    public function getTypeEntretien()
    {
        return $this->typeEntretien;
    }

    public function setTypeEntretien($typeEntretien): void
    {
        $this->typeEntretien = $typeEntretien;
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