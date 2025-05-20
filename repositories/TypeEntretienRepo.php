<?php

require_once '../model/TypeEntretien.php';

class TypeEntretienRepo
{
 private $pdo;

 public function __construct(PDO $pdo){
     $this->pdo = $pdo;
 }

 public function getAll(){
     $stmt = $this->pdo->prepare('SELECT * FROM TypeEntretien te');
     $stmt->execute();
     $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
     foreach ($questions as $question) {
         $tab[] = new TypeEntretien( $question['idTypeEntretien'], $question['type'], $question['actif']);}
     return $tab;
 }

    public function getById(TypeEntretien $typeEntretien){
        $stmt = $this->pdo->prepare('SELECT * FROM TypeEntretien te WHERE te.idTypeEntretien = ? ');
        $stmt->execute([$typeEntretien->getIdTypeEntretien()]);
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($questions)) {
            return [];}
        foreach ($questions as $question) {
            $tab[] = new TypeEntretien( $question['idTypeEntretien'], $question['type'], $question['actif']);}
        return $tab;
    }

}