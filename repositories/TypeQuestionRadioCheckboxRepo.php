<?php
require_once '../model/TypeQuestionRadioCheckbox.php';
class TypeQuestionRadioCheckboxRepo
{
private $pdo;

public function __construct(PDO $pdo){
    $this->pdo = $pdo;
}

    public function getAll(){
        $stmt = $this->pdo->query('SELECT * FROM TypeQuestionRadioCheckbox');
        $valeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($valeurs as $valeur) {
            $tab[] = new TypeQuestionRadioCheckbox(
                (int)$valeur['idTypeQuestion'],
                (int)$valeur['idQuestion'],
                $valeur['reponse'],
                (int)$valeur['ordre']
            );
        }
        return $tab;
    }

    public function getById(int $id){
        $stmt = $this->pdo->prepare('SELECT * FROM TypeQuestionRadioCheckbox WHERE idQuestion = ?');
        $stmt->execute([$id]);
        $valeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($valeurs)) {
            return [];
        }
        foreach ($valeurs as $valeur) {
            $tab[] = new TypeQuestionRadioCheckbox(
                (int)$valeur['idTypeQuestion'],
                (int)$valeur['idQuestion'],
                $valeur['reponse'],
                (int)$valeur['ordre']
            );
        }
        return $tab;
    }

}