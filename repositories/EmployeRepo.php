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
         $emp=[];
         $emp['idEmploye']=$question['idEmploye'];
         $emp['nom']=$question['nom'];
         $tab[] = new Employe($emp);}
     return $tab;
 }

    public function getById(Employe $employe){
        $stmt = $this->pdo->prepare('SELECT * FROM employe WHERE idEmploye = ?');
        $stmt->execute([$employe]);
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $question = $questions[0];
        $tab=[];
        $tab['idEmploye']=$question['idEmploye'];
        $tab['nom']=$question['nom'];
        return new Employe($tab);

    }
}