<?php
class Tableau{
    public $idTableau;
    public $entete;
    public $taille;

    public function __construct($idTableau, $entete, $taille)
    {
        $this->idTableau = $idTableau;
        $this->entete = $entete;
        $this->taille = $taille;
    }

    public function getIdtableau()
    {
        return $this->idTableau;
    }

    public function setIdtableau($idTableau): void
    {
        $this->idTableau = $idTableau;
    }

    public function getEntete()
    {
        return $this->entete;
    }

    public function setEntete($entete): void
    {
        $this->entete = $entete;
    }

    public function getTaille()
    {
        return $this->taille;
    }

    public function setTaille($taille): void
    {
        $this->taille = $taille;
    }



}