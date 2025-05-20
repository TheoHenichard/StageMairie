<?php
class Employe{
    public $idEmploye;
    public $nom;

    public function __construct(array $data = []){
        if (isset($data['idEmploye'])){$this->idEmploye = $data['idEmploye'];}
        if (isset($data['nom'])){$this->nom = $data['nom'];}
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