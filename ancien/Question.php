<?php

namespace ancien;
class Question
{
    public $idQuestion;
    public $isQuestion;
    public $texte;
    public $typeaffichage;
    public $taille;
    public $ordre;

    public function __construct($idQuestion, $isQuestion, $texte, $typeaffichage, $taille, $ordre)
    {
        $this->idQuestion = $idQuestion;
        $this->isQuestion = $isQuestion;
        $this->texte = $texte;
        $this->typeaffichage = $typeaffichage;
        $this->taille = $taille;
        $this->ordre = $ordre;
    }

    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    public function setIdQuestion($idQuestion): void
    {
        $this->idQuestion = $idQuestion;
    }

    public function getIsQuestion()
    {
        return $this->isQuestion;
    }

    public function setIsQuestion($isQuestion): void
    {
        $this->isQuestion = $isQuestion;
    }

    public function getTexte()
    {
        return $this->texte;
    }

    public function setTexte($texte): void
    {
        $this->texte = $texte;
    }

    public function getTypeaffichage()
    {
        return $this->typeaffichage;
    }

    public function setTypeaffichage($typeaffichage): void
    {
        $this->typeaffichage = $typeaffichage;
    }

    public function getTaille()
    {
        return $this->taille;
    }

    public function setTaille($taille): void
    {
        $this->taille = $taille;
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
