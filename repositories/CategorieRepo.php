<?php
require_once '../model/Categorie.php';

class CategorieRepo
{
 private $pdo;

 public function __construct(PDO $pdo){
     $this->pdo = $pdo;
 }

 public function getAll(){
     $stmt = $this->pdo->prepare('SELECT * FROM categorie');
     $stmt->execute();
     $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
     foreach ($questions as $question) {
         $tab[] = new Categorie(
             (int)$question['idCategorie'],
             (int)$question['idTypeEntretien'],
             (bool)$question['superCategorie'],
             (int)$question['ordre'],
             $question['nom']
         );
     }
     return $tab;
 }

    public function getById(int $id){
        $stmt = $this->pdo->prepare('SELECT * FROM categorie WHERE idTypeEntretien = ?');
        $stmt->execute([$id]);
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($questions)) {
            return [];
        }
        foreach ($questions as $question) {
            $tab[] = new Categorie(
                (int)$question['idCategorie'],
                (int)$question['idTypeEntretien'],
                (bool)$question['superCategorie'],
                (int)$question['ordre'],
                $question['nom']
            );
        }
        return $tab;
    }
}