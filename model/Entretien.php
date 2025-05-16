<?php
class Entretien{
    public $idEntretien;
    public $date;
    public $Employe;
    public $TypeEntretien;
    public ?array $listCategorie  = null;

    public function __construct(array $data = [])
    {
        if (isset($data['idEntretien'])) {$this->idEntretien = $data['idEntretien'];}
        if (isset($data['date'])) {$this->date = $data['date'];}
        if (isset($data['Employe'])) {$this->Employe = $data['Employe'];}
        if (isset($data['TypeEntretien'])) {$this->TypeEntretien = $data['TypeEntretien'];}
        if (isset($data['listCategorie'])) {$this->listCategorie = $data['listCategorie'];}
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

    public function getEmploye()
    {
        return $this->Employe;
    }

    public function setEmploye($Employe): void
    {
        $this->Employe = $Employe;
    }

    public function getTypeEntretien()
    {
        return $this->TypeEntretien;
    }

    public function setTypeEntretien($TypeEntretien): void
    {
        $this->TypeEntretien = $TypeEntretien;
    }

    public function getListCategorie(): ?array
    {
        return $this->listCategorie;
    }

    public function setListCategorie(?array $listCategorie): void
    {
        $this->listCategorie = $listCategorie;
    }


}