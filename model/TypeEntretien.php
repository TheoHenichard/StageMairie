<?php
class TypeEntretien
{
    public $idTypeEntretien;
    public $type;
    public $actif = true;

    public function __construct($idTypeEntretien, $type, bool $actif)
    {
        $this->idTypeEntretien = $idTypeEntretien;
        $this->type = $type;
        $this->actif = $actif;
    }

    public function getIdTypeEntretien()
    {
        return $this->idTypeEntretien;
    }

    public function setIdTypeEntretien($idTypeEntretien): void
    {
        $this->idTypeEntretien = $idTypeEntretien;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type): void
    {
        $this->type = $type;
    }

    public function isActif(): bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): void
    {
        $this->actif = $actif;
    }



}