<?php
class TableauLigne
{
    public $idTableauLigne;
    public $idTableau;
    public $ordre;
    public $typeLigne;

    public function __construct($idTableauLigne, $idTableau, $ordre, $typeLigne)
    {
        $this->idTableauLigne = $idTableauLigne;
        $this->idTableau = $idTableau;
        $this->ordre = $ordre;
        $this->typeLigne = $typeLigne;
    }

    public function getIdTableauLigne()
    {
        return $this->idTableauLigne;
    }

    public function setIdTableauLigne($idTableauLigne): void
    {
        $this->idTableauLigne = $idTableauLigne;
    }

    public function getIdTableau()
    {
        return $this->idTableau;
    }

    public function setIdTableau($idTableau): void
    {
        $this->idTableau = $idTableau;
    }

    public function getOrdre()
    {
        return $this->ordre;
    }

    public function setOrdre($ordre): void
    {
        $this->ordre = $ordre;
    }

    public function getTypeLigne()
    {
        return $this->typeLigne;
    }

    public function setTypeLigne($typeLigne): void
    {
        $this->typeLigne = $typeLigne;
    }



}