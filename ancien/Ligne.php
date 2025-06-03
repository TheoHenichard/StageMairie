<?php

namespace ancien;
class Ligne
{
    public $idLigne;
    public $idTableau;
    public $critere;
    public $definition;
    public $texte0;
    public $texte1;
    public $texte2;
    public $texte3;
    public $point;
    public $ordre;


    public function __construct($idLigne, $idTableau, $critere, $definition, $texte0, $texte1, $texte2, $texte3, $point, $ordre)
    {
        $this->idLigne = $idLigne;
        $this->idTableau = $idTableau;
        $this->critere = $critere;
        $this->definition = $definition;
        $this->texte0 = $texte0;
        $this->texte1 = $texte1;
        $this->texte2 = $texte2;
        $this->texte3 = $texte3;
        $this->point = $point;
        $this->ordre = $ordre;
    }

    public function getIdLigne()
    {
        return $this->idLigne;
    }

    public function setIdLigne($idLigne): void
    {
        $this->idLigne = $idLigne;
    }

    public function getIdTableau()
    {
        return $this->idTableau;
    }

    public function setIdTableau($idTableau): void
    {
        $this->idTableau = $idTableau;
    }

    public function getCritere()
    {
        return $this->critere;
    }

    public function setCritere($critere): void
    {
        $this->critere = $critere;
    }

    public function getDefinition()
    {
        return $this->definition;
    }

    public function setDefinition($definition): void
    {
        $this->definition = $definition;
    }

    public function getTexte0()
    {
        return $this->texte0;
    }

    public function setTexte0($texte0): void
    {
        $this->texte0 = $texte0;
    }

    public function getTexte1()
    {
        return $this->texte1;
    }

    public function setTexte1($texte1): void
    {
        $this->texte1 = $texte1;
    }

    public function getTexte2()
    {
        return $this->texte2;
    }

    public function setTexte2($texte2): void
    {
        $this->texte2 = $texte2;
    }

    public function getTexte3()
    {
        return $this->texte3;
    }

    public function setTexte3($texte3): void
    {
        $this->texte3 = $texte3;
    }

    public function getPoint()
    {
        return $this->point;
    }

    public function setPoint($point): void
    {
        $this->point = $point;
    }

    public function getOrdre()
    {
        return $this->ordre;
    }

    public function setOrdre($ordre): void
    {
        $this->ordre = $ordre;
    }


}