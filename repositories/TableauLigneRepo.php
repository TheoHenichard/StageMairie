<?php
require_once '../model/TableauLigne.php';
class TableauLigneRepo
{
private $pdo;

public function __construct(PDO $pdo){
    $this->pdo = $pdo;
}

    public function getAll(){
        $stmt = $this->pdo->query('SELECT * FROM tableauLigne');
        $valeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($valeurs as $valeur) {
            $tab[] = new TableauLigne(
                (int)$valeur['idTableauLigne'],
                (int)$valeur['idTableau'],
                (int)$valeur['ordre'],
                $valeur['typeLigne']
            );
        }
        return $tab;
    }

    public function getById(int $id){
        $stmt = $this->pdo->prepare('SELECT * FROM tableauLigne WHERE idTableau = ?');
        $stmt->execute([$id]);
        $valeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($valeurs)) {
            return [];
        }
        foreach ($valeurs as $valeur) {
            $tab[] = new TableauLigne(
                (int)$valeur['idTableauLigne'],
                (int)$valeur['idTableau'],
                (int)$valeur['ordre'],
                $valeur['typeLigne']
            );
        }
        return $tab;
    }

}