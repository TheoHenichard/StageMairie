<?php
class Employe{
    public $idEmploye;
    public $nom;

    public function __construct($idEmploye, $nom)
    {
        $this->idEmploye = $idEmploye;
        $this->nom = $nom;
    }

    public function getIdEmploye()
    {
        return $this->idEmploye;
    }

    public function setIdEmploye($idEmploye): void
    {
        $this->idEmploye = $idEmploye;
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