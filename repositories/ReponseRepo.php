<?php
require_once '../model/Reponse.php';

class ReponseRepo{
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function getAll(){
        $stmt = $this->pdo->query('SELECT * FROM reponse');
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($questions as $question) {
            $ent=[];
            $ent['entretien'] = $question['idEntretien'];
            $ent['question'] = $question['idQuestion'];
            $ent['tableauLigne'] = $question['idTableauLigne'];
            $ent['tableauColonne'] = $question['idTableauColonne'];
            $ent['reponseTypeTexte'] = $question['reponseTypeTexte'];
            $ent['reponseTypeRadio'] = $question['reponseTypeRadio'];
            $ent['reponseTypeCheckbox'] = $question['reponseTypeCheckbox'];
            $ent['reponseTypeTableau'] = $question['reponseTypeTableau'];
            $tab[] = new Reponse($ent);}
        return $tab;

    }
}