<?php
require_once '../model/Entretien.php';
require_once '../model/TypeEntretien.php';
require_once '../model/Employe.php';

class EntretienRepo
{
 private $pdo;

 public function __construct(PDO $pdo){
     $this->pdo = $pdo;
 }

 public function getAll(){
     $stmt = $this->pdo->prepare('SELECT idEntretien,date,em.nom,em.idEmploye,te.idTypeEntretien,te.type,te.actif FROM Entretien en JOIN Employe em ON en.idEmploye = em.idEmploye JOIN TypeEntretien te ON en.idTypeEntretien = te.idTypeEntretien ORDER BY date DESC');
     $stmt->execute();
     $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
     foreach ($questions as $question) {
         $ent=[];

         $te = [];
         $te['idEntretien']=$question['idEntretien'];
         $te['type']=$question['type'];
         $te['actif']=$question['actif'];

         $ent['TypeEntretien']= new TypeEntretien($te);

         $emp=[];
         $emp['nom']=$question['nom'];
         $emp['idEmploye']=$question['idEmploye'];

         $ent['Employe']= new Employe($emp);
         $ent['idEntretien'] = $question['idEntretien'];
         $ent['date'] = $question['date'];
         $tab[] = new Entretien($ent);}
     return $tab;
 }

    public function getByEmploye(Employe $employe){
        $stmt = $this->pdo->prepare('SELECT idEntretien,date,em.nom,em.idEmploye,te.idTypeEntretien,te.type,te.actif FROM Entretien en JOIN Employe em ON en.idEmploye = em.idEmploye JOIN TypeEntretien te ON en.idTypeEntretien = te.idTypeEntretien WHERE en.idEmploye = ? ORDER BY date DESC');
        $stmt->execute([$employe->getIdEmploye()]);
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($questions)) {
            return [];}
        foreach ($questions as $question) {
            $ent=[];

            $te = [];
            $te['idEntretien']=$question['idEntretien'];
            $te['type']=$question['type'];
            $te['actif']=$question['actif'];

            $ent['TypeEntretien']= new TypeEntretien($te);

            $emp=[];
            $emp['nom']=$question['nom'];
            $emp['idEmploye']=$question['idEmploye'];

            $ent['Employe']= new Employe($emp);
            $ent['idEntretien'] = $question['idEntretien'];
            $ent['date'] = $question['date'];
            $tab[] = new Entretien($ent);}
        return $tab;
    }

}