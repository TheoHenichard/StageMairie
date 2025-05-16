<?php
class TypeQuestionTableau
{
    public $idTypeQuestion;
    public $idQuestion;
    public $entete;

    public function __construct($idTypeQuestion, $idQuestion, $entete)
    {
        $this->idTypeQuestion = $idTypeQuestion;
        $this->idQuestion = $idQuestion;
        $this->entete = $entete;
    }

    public function getIdTypeQuestion()
    {
        return $this->idTypeQuestion;
    }

    public function setIdTypeQuestion($idTypeQuestion): void
    {
        $this->idTypeQuestion = $idTypeQuestion;
    }

    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    public function setIdQuestion($idQuestion): void
    {
        $this->idQuestion = $idQuestion;
    }

    public function getEntete()
    {
        return $this->entete;
    }

    public function setEntete($entete): void
    {
        $this->entete = $entete;
    }


}