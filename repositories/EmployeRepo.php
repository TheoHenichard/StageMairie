<?php
require_once '../model/Employe.php';

class EmployeRepo
{
 private $pdo;

 public function __construct(PDO $pdo){
     $this->pdo = $pdo;
 }

 public function getAll(){
     $stmt = $this->pdo->prepare('SELECT * FROM employe');
     $stmt->execute();
     $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
     foreach ($questions as $question) {
         $tab[] = new Employe(
             (int)$question['idEmploye'],
             $question['nom']
         );
     }
     return $tab;
 }

    public function getById(int $id){
        $stmt = $this->pdo->prepare('SELECT * FROM employe WHERE idEmploye = ?');
        $stmt->execute([$id]);
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($questions)) {
            return [];
        }
        foreach ($questions as $question) {
            $tab[] = new Employe(
                (int)$question['idEmploye'],
                $question['nom']
            );
        }
        return $tab;
    }
}