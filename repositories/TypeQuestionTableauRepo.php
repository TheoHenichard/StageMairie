<?php
require_once '../model/TypeQuestionTableau.php';
class TypeQuestionTableauRepo{
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function getAll(){
        $stmt = $this->pdo->query('SELECT * FROM typeQuestionTableau');
        $valeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($valeurs as $valeur) {
            $tab[] = new TypeQuestionTableau(
                (int)$valeur['idTypeQuestion'],
                (int)$valeur['idQuestion'],
                (bool)$valeur['entete']
            );
        }
        return $tab;
    }

    public function getById(int $id){
        $stmt = $this->pdo->prepare('SELECT * FROM typeQuestionTableau WHERE idQuestion = ?');
        $stmt->execute([$id]);
        $valeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($valeurs as $valeur) {
            $tab[] = new TypeQuestionTableau(
                (int)$valeur['idTypeQuestion'],
                (int)$valeur['idQuestion'],
                (bool)$valeur['entete']
            );
        }
        return $tab;
    }





}