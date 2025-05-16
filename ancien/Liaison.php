<?php

namespace ancien;
class Liaison
{
    public $idliaison;
    public $idtab;
    public $idquestion;
    public $identretien;
    public $idreponse;

    public $idtableau;
    public $idcat;
    public $idtypee;
    public $ordre;

    public function __construct($idliaison, $idtab, $idquestion, $identretien, $idreponse, $idtableau, $idcat, $idtypee, $ordre)
    {
        $this->idliaison = $idliaison;
        $this->idtab = $idtab;
        $this->idquestion = $idquestion;
        $this->identretien = $identretien;
        $this->idreponse = $idreponse;
        $this->idtableau = $idtableau;
        $this->idcat = $idcat;
        $this->idtypee = $idtypee;
        $this->ordre = $ordre;
    }

    public function getIdliaison()
    {
        return $this->idliaison;
    }

    public function setIdliaison($idliaison): void
    {
        $this->idliaison = $idliaison;
    }

    public function getIdtab()
    {
        return $this->idtab;
    }

    public function setIdtab($idtab): void
    {
        $this->idtab = $idtab;
    }

    public function getIdquestion()
    {
        return $this->idquestion;
    }

    public function setIdquestion($idquestion): void
    {
        $this->idquestion = $idquestion;
    }

    public function getIdentretien()
    {
        return $this->identretien;
    }

    public function setIdentretien($identretien): void
    {
        $this->identretien = $identretien;
    }

    public function getIdreponse()
    {
        return $this->idreponse;
    }

    public function setIdreponse($idreponse): void
    {
        $this->idreponse = $idreponse;
    }

    public function getIdtableau()
    {
        return $this->idtableau;
    }

    public function setIdtableau($idtableau): void
    {
        $this->idtableau = $idtableau;
    }

    public function getIdcat()
    {
        return $this->idcat;
    }

    public function setIdcat($idcat): void
    {
        $this->idcat = $idcat;
    }

    public function getIdtypee()
    {
        return $this->idtypee;
    }

    public function setIdtypee($idtypee): void
    {
        $this->idtypee = $idtypee;
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