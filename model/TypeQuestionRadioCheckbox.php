<?php
class TypeQuestionRadioCheckbox{

    public $idTypeQuestion;
    public $question;
    public $reponse;
    public $ordre;

    public function __construct(array $data){
        if(isset($data['idTypeQuestion'])){$this->idTypeQuestion = $data['idTypeQuestion'];}
        if(isset($data['question'])){$this->question = $data['question'];}
        if(isset($data['reponse'])){$this->reponse = $data['reponse'];}
        if(isset($data['ordre'])){$this->ordre = $data['ordre'];}
    }

    public function getIdTypeQuestion()
    {
        return $this->idTypeQuestion;
    }

    public function setIdTypeQuestion($idTypeQuestion): void
    {
        $this->idTypeQuestion = $idTypeQuestion;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion($question): void
    {
        $this->question = $question;
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