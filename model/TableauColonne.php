<?php
class TableauColonne
{
    public $idTableauColonne;
    public $idTableauLigne;
    public $ordre;
    public $texte;
    public $typeColonne;

    public function __construct($idTableauColonne, $idTableauLigne, $ordre, $texte, $typeColonne)
    {
        $this->idTableauColonne = $idTableauColonne;
        $this->idTableauLigne = $idTableauLigne;
        $this->ordre = $ordre;
        $this->texte = $texte;
        $this->typeColonne = $typeColonne;
    }

    public function getIdTableauColonne()
    {
        return $this->idTableauColonne;
    }

    public function setIdTableauColonne($idTableauColonne): void
    {
        $this->idTableauColonne = $idTableauColonne;
    }

    public function getIdTableauLigne()
    {
        return $this->idTableauLigne;
    }

    public function setIdTableauLigne($idTableauLigne): void
    {
        $this->idTableauLigne = $idTableauLigne;
    }

    public function getOrdre()
    {
        return $this->ordre;
    }

    public function setOrdre($ordre): void
    {
        $this->ordre = $ordre;
    }

    public function getTexte()
    {
        return $this->texte;
    }

    public function setTexte($texte): void
    {
        $this->texte = $texte;
    }

    public function getTypeColonne()
    {
        return $this->typeColonne;
    }

    public function setTypeColonne($typeColonne): void
    {
        $this->typeColonne = $typeColonne;
    }


}