<?php
require_once '../model/Categorie.php';
require_once '../model/TypeEntretien.php';


class CategorieRepo
{
 private $pdo;

 public function __construct(PDO $pdo){
     $this->pdo = $pdo;
 }

 public function getAll(){
     $stmt = $this->pdo->prepare('SELECT *,te.idTypeEntretien,te.type,te.actif FROM categorie ca JOIN TypeEntretien te ON ca.idTypeEntretien = te.idTypeEntretien ORDER BY ordre ASC ');
     $stmt->execute();
     $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
     foreach ($questions as $question) {
         $ent=[];

         $typ=[];
         $typ['idTypeEntretien'] = $question['idTypeEntretien'];
         $typ['type'] = $question['type'];
         $typ['actif'] = $question['actif'];

         $ent['TypeEntretien']= new TypeEntretien($typ);
         $ent['idCategorie']= $question['idCategorie'];
         $ent['nom']= $question['nom'];
         $ent['superCategorie']= $question['superCategorie'];
         $ent['ordre']= $question['ordre'];
         $tab[] = new Categorie($ent);
     }
     return $tab;
 }

    public function getById(int $id){
        $stmt = $this->pdo->prepare('SELECT *,te.idTypeEntretien,te.type,te.actif FROM categorie ca JOIN TypeEntretien te ON ca.idTypeEntretien = te.idTypeEntretien WHERE ca.idTypeEntretien = ? ORDER BY ordre ASC');
        $stmt->execute([$id]);
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($questions)) {
            return [];
        }
        foreach ($questions as $question) {
            $ent=[];

            $typ=[];
            $typ['idTypeEntretien'] = $question['idTypeEntretien'];
            $typ['type'] = $question['type'];
            $typ['actif'] = $question['actif'];

            $ent['TypeEntretien']= new TypeEntretien($typ);
            $ent['idCategorie']= $question['idCategorie'];
            $ent['nom']= $question['nom'];
            $ent['superCategorie']= $question['superCategorie'];
            $ent['ordre']= $question['ordre'];
            $tab[] = new Categorie($ent);
        }
        return $tab;
    }
}