<?php
class Reponse{
    public $idReponse;
    public $entretien;
    public $question;
    public $tableauLigne;
    public $tableauColonne;
    public $reponseTypeTexte;
    public $reponseTypeRadio;
    public $reponseTypeCheckbox;
    public $reponseTypeTableau;

    public function __construct($data){
        if (isset($data['idReponse'])) {$this->idReponse = $data['idReponse'];}
        if (isset($data['entretien'])) {$this->entretien = $data['entretien'];}
        if (isset($data['question'])) {$this->question = $data['question'];}
        if (isset($data['tableauLigne'])) {$this->tableauLigne = $data['tableauLigne'];}
        if (isset($data['tableauColonne'])) {$this->tableauColonne = $data['tableauColonne'];}
        if (isset($data['reponseTypeTexte'])) {$this->reponseTypeTexte = $data['reponseTypeTexte'];}
        if (isset($data['reponseTypeRadio'])) {$this->reponseTypeRadio = $data['reponseTypeRadio'];}
        if (isset($data['reponseTypeCheckbox'])) {$this->reponseTypeCheckbox = $data['reponseTypeCheckbox'];}
        if (isset($data['reponseTypeTableau'])) {$this->reponseTypeTableau = $data['reponseTypeTableau'];}
    }

    public function getIdReponse()
    {
        return $this->idReponse;
    }

    public function setIdReponse($idReponse): void
    {
        $this->idReponse = $idReponse;
    }

    public function getEntretien()
    {
        return $this->entretien;
    }

    public function setEntretien($entretien): void
    {
        $this->entretien = $entretien;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion($question): void
    {
        $this->question = $question;
    }

    public function getTableauLigne()
    {
        return $this->tableauLigne;
    }

    public function setTableauLigne($tableauLigne): void
    {
        $this->tableauLigne = $tableauLigne;
    }

    public function getTableauColonne()
    {
        return $this->tableauColonne;
    }

    public function setTableauColonne($tableauColonne): void
    {
        $this->tableauColonne = $tableauColonne;
    }

    public function getReponseTypeText()
    {
        return $this->reponseTypeTexte;
    }

    public function setReponseTypeText($reponseTypeText): void
    {
        $this->reponseTypeText = $reponseTypeText;
    }

    public function getReponseTypeRadio()
    {
        return $this->reponseTypeRadio;
    }

    public function setReponseTypeRadio($reponseTypeRadio): void
    {
        $this->reponseTypeRadio = $reponseTypeRadio;
    }

    public function getReponseTypeCheckbox()
    {
        return $this->reponseTypeCheckbox;
    }

    public function setReponseTypeCheckbox($reponseTypeCheckbox): void
    {
        $this->reponseTypeCheckbox = $reponseTypeCheckbox;
    }

    public function getReponseTypeTableau()
    {
        return $this->reponseTypeTableau;
    }

    public function setReponseTypeTableau($reponseTypeTableau): void
    {
        $this->reponseTypeTableau = $reponseTypeTableau;
    }

}