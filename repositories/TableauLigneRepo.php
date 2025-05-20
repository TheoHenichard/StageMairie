<?php
require_once '../model/TableauLigne.php';
class   TableauLigneRepo
{
private $pdo;

public function __construct(PDO $pdo){
    $this->pdo = $pdo;
}

    public function getAll(){
        $stmt = $this->pdo->query('SELECT * FROM tableauLigne');
        $valeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($valeurs as $valeur) {

            $tab[] = new TableauLigne( $valeur);
        }
        return $tab;
    }

    public function getByIdTableau(TypeQuestionTableau $tableau){
        $stmt = $this->pdo->prepare('SELECT * FROM tableauLigne WHERE idTableau = ?');
        $stmt->execute([$tableau->getIdTypeQuestion()]);
        $valeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($valeurs)) {
            return [];
        }
        foreach ($valeurs as $valeur) {
            $tab[] = new TableauLigne( $valeur);
        }
        return $tab;
    }

}