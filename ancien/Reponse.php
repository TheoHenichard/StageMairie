<?php

namespace ancien;
class Reponse
{
    public $idReponse;
    public $idEntretien;
    public $idQuestion;
    public $reponse;
    public $nbpoint;

    public function __construct($idReponse, $idEntretien, $idQuestion, $reponse, $nbpoint)
    {
        $this->idReponse = $idReponse;
        $this->idEntretien = $idEntretien;
        $this->idQuestion = $idQuestion;
        $this->reponse = $reponse;
        $this->nbpoint = $nbpoint;
    }

    public function getIdReponse()
    {
        return $this->idReponse;
    }

    public function setIdReponse($idReponse): void
    {
        $this->idReponse = $idReponse;
    }

    public function getIdEntretien()
    {
        return $this->idEntretien;
    }

    public function setIdEntretien($idEntretien): void
    {
        $this->idEntretien = $idEntretien;
    }

    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    public function setIdQuestion($idQuestion): void
    {
        $this->idQuestion = $idQuestion;
    }

    public function getReponse()
    {
        return $this->reponse;
    }

    public function setReponse($reponse): void
    {
        $this->reponse = $reponse;
    }

    public function getNbpoint()
    {
        return $this->nbpoint;
    }

    public function setNbpoint($nbpoint): void
    {
        $this->nbpoint = $nbpoint;
    }


}