<?php
require_once '../model/TypeQuestionTableau.php';
class TypeQuestionTableauRepo{
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function getAll(){
        $stmt = $this->pdo->query('SELECT *,qu.idQuestion,qu.ordre,qu.textIntro,qu.typeQuestion FROM typeQuestionTableau tQT JOIN Question qu ON tQT.idQuestion = qu.idQuestion');
        $valeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($valeurs as $valeur) {

            $tableau = [];
            $tableau['idTypeQuestion'] = $valeur['idTypeQuestion'];
            $tableau['entete'] = $valeur['entete'];
            $tab[] = new TypeQuestionTableau($tableau);
        }
        return $tab;
    }

    public function getById(int $id){
        $stmt = $this->pdo->prepare('SELECT * FROM typeQuestionTableau WHERE idQuestion = ?');
        $stmt->execute([$id]);
        $valeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($valeurs as $valeur) {

            $tableau = [];
            $tableau['idTypeQuestion'] = $valeur['idTypeQuestion'];
            $tableau['entete'] = $valeur['entete'];
            $tab[] = new TypeQuestionTableau($tableau);
        }
        return $tab;
    }

}