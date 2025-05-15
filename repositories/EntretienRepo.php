<?php
require_once '../model/Entretien.php';

class EntretienRepo
{
 private $pdo;

 public function __construct(PDO $pdo){
     $this->pdo = $pdo;
 }

 public function getAll(){
     $stmt = $this->pdo->prepare('SELECT * FROM entretien');
     $stmt->execute();
     $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
     foreach ($questions as $question) {
         $tab[] = new Entretien(
             (int)$question['idEntretien'],
             $question['date'],
             (int)$question['idEmploye'],
             (int)$question['idTypeEntretien']
         );
     }
     return $tab;
 }

    public function getById(int $id){
        $stmt = $this->pdo->prepare('SELECT * FROM entretien WHERE idEmploye = ?');
        $stmt->execute([$id]);
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($questions)) {
            return [];
        }
        foreach ($questions as $question) {
            $tab[] = new Entretien(
                (int)$question['idEntretien'],
                $question['date'],
                (int)$question['idEmploye'],
                (int)$question['idTypeEntretien']
            );
        }
        return $tab;
    }
}