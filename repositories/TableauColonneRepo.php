<?php
require_once '../model/TableauColonne.php';
class TableauColonneRepo
{
private $pdo;

public function __construct(PDO $pdo){
    $this->pdo = $pdo;
}

    public function getAll(){
        $stmt = $this->pdo->query('SELECT * FROM tableauColonne');
        $valeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($valeurs as $valeur) {
            $tab[] = new TableauColonne(
                (int)$valeur['idTableauColonne'],
                (int)$valeur['idTableauLigne'],
                (int)$valeur['ordre'],
                $valeur['texte'],
                $valeur['typeColonne']
            );
        }
        return $tab;
    }

    public function getById(int $id){
        $stmt = $this->pdo->prepare('SELECT * FROM tableauColonne WHERE idTableauLigne = ?');
        $stmt->execute([$id]);
        $valeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($valeurs)) {
            return [];
        }
        foreach ($valeurs as $valeur) {
            $tab[] = new TableauColonne(
                (int)$valeur['idTableauColonne'],
                (int)$valeur['idTableauLigne'],
                (int)$valeur['ordre'],
                $valeur['texte'],
                $valeur['typeColonne']
            );
        }
        return $tab;
    }

}