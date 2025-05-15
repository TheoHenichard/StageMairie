<?php
class Entretien{
    public $idEntretien;
    public $date;
    public $listCat;
    public $idEmploye;
    public $idTypeEntretien;

    public function __construct($idEntretien, $date, $idEmploye, $idTypeEntretien)
    {
        $this->idEntretien = $idEntretien;
        $this->date = $date;
        $this->idEmploye = $idEmploye;
        $this->idTypeEntretien = $idTypeEntretien;
    }

    public function getIdEntretien()
    {
        return $this->idEntretien;
    }

    public function setIdEntretien($idEntretien): void
    {
        $this->idEntretien = $idEntretien;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getIdEmploye()
    {
        return $this->idEmploye;
    }

    public function setIdEmploye($idEmploye): void
    {
        $this->idEmploye = $idEmploye;
    }

    public function getIdTypeEntretien()
    {
        return $this->idTypeEntretien;
    }

    public function setIdTypeEntretien($idTypeEntretien): void
    {
        $this->idTypeEntretien = $idTypeEntretien;
    }


}