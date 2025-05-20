<?php
class TypeQuestionTableau
{
    public $idTypeQuestion;
    public $question;
    public $entete;

    public function __construct(array $data){
        if(isset($data['idTypeQuestion'])){$this->idTypeQuestion = $data['idTypeQuestion'];}
        if(isset($data['question'])){$this->question = $data['question'];}
        if(isset($data['entete'])){$this->entete = $data['entete'];}

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

    public function getEntete()
    {
        return $this->entete;
    }

    public function setEntete($entete): void
    {
        $this->entete = $entete;
    }

}