<?php
class Question{
    public $idQuestion;
    public $ordre;
    public $idcategorie;
    public $textintro;
    public $typequestion;

    public function __construct($idQuestion, $ordre, $idcategorie, $textintro, $typequestion){
        $this->idQuestion = $idQuestion;
        $this->ordre = $ordre;
        $this->idcategorie = $idcategorie;
        $this->textintro = $textintro;
        $this->typequestion = $typequestion;
    }

    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    public function setIdQuestion($idQuestion): void
    {
        $this->idQuestion = $idQuestion;
    }

    public function getOrdre()
    {
        return $this->ordre;
    }

    public function setOrdre($ordre): void
    {
        $this->ordre = $ordre;
    }

    public function getIdcategorie()
    {
        return $this->idcategorie;
    }

    public function setIdcategorie($idcategorie): void
    {
        $this->idcategorie = $idcategorie;
    }

    public function getTextintro()
    {
        return $this->textintro;
    }

    public function setTextintro($textintro): void
    {
        $this->textintro = $textintro;
    }

    public function getTypequestion()
    {
        return $this->typequestion;
    }

    public function setTypequestion($typequestion): void
    {
        $this->typequestion = $typequestion;
    }


}