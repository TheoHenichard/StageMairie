<?php
class TypeQuestionRadioCheckbox{

    public $idTypeQuestion;
    public $idQuestion;
    public $reponse;
    public $ordre;

    public function __construct($idTypeQuestion, $idQuestion, $reponse, $ordre)
    {
        $this->idTypeQuestion = $idTypeQuestion;
        $this->idQuestion = $idQuestion;
        $this->reponse = $reponse;
        $this->ordre = $ordre;
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

    public function getReponse()
    {
        return $this->reponse;
    }

    public function setReponse($reponse): void
    {
        $this->reponse = $reponse;
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