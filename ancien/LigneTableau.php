<?php

namespace ancien;
class LigneTableau
{
    public $idligne;
    public $idtableau;
    public $ordre;

    public function __construct($idligne, $idtableau, $ordre)
    {
        $this->idligne = $idligne;
        $this->idtableau = $idtableau;
        $this->ordre = $ordre;
    }

    public function getIdligne()
    {
        return $this->idligne;
    }

    public function setIdligne($idligne): void
    {
        $this->idligne = $idligne;
    }

    public function getIdtableau()
    {
        return $this->idtableau;
    }

    public function setIdtableau($idtableau): void
    {
        $this->idtableau = $idtableau;
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