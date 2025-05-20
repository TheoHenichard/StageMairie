<?php
class Question{
    public $idQuestion;
    public $ordre;
    public $categorie;
    public $textintro;
    public $typequestion;

    public function __construct(array $data = []){
        if(isset($data['idQuestion'])){$this->idQuestion = $data['idQuestion'];}
        if(isset($data['ordre'])){$this->ordre = $data['ordre'];}
        if(isset($data['categorie'])){$this->categorie = $data['categorie'];}
        if(isset($data['textIntro'])){$this->textintro = $data['textIntro'];}
        if(isset($data['typeQuestion'])){$this->typequestion = $data['typeQuestion'];}
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

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setCategorie($categorie): void
    {
        $this->categorie = $categorie;
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