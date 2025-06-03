<?php
require_once 'Controller.php';
require_once "../model/Categorie.php";
require_once "../model/Question.php";
require_once '../repositories/CategorieRepo.php';
require_once '../repositories/QuestionRepo.php';
require_once '../repositories/TypeQuestionTableauRepo.php';
require_once '../repositories/TableauColonneRepo.php';
require_once '../repositories/TableauLigneRepo.php';
require_once '../repositories/TypeQuestionRadioCheckboxRepo.php';
require_once '../repositories/ReponseRepo.php';

class ControllerGeneration
{
    public function __construct()
    {}


    public function index(){
        $typeEntretien = 1;
        $controller = new Controller();
        $pdo = $controller->pdo;
        $categorieRepository = new CategorieRepo($pdo);
        $listCat = $categorieRepository->getById($typeEntretien);
        $questionRepository = new QuestionRepo($pdo);
        $tableauRepository = new TypeQuestionTableauRepo($pdo);
        $tableauColonneRepository = new TableauColonneRepo($pdo);
        $tableauLigneRepository = new TableauLigneRepo($pdo);
        $radioCheckboxRepo = new TypeQuestionRadioCheckboxRepo($pdo);
        foreach ($radioCheckboxRepo->getAll() as $radio){

        }
        $reponseRepo = new ReponseRepo($pdo);
        include '../vue/Entretien.php';
    }
}