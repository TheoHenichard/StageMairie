<?php
require_once '../model/Categorie.php';

class CategorieRepo
{
 private $pdo;

 public function __construct(PDO $pdo){
     $this->pdo = $pdo;
 }

 public function getAll(){
     $query = $this->pdo->query('SELECT * FROM categorie');
     $categories = [];

     while($categorie = $query->fetch(PDO::FETCH_ASSOC)){
         $categories[] = new Categorie($categorie['idCat'], $categorie['nom'], $categorie['ordre'], $categorie['titre']);
     }
     return $categories;
 }
}