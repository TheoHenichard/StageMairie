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
class ControllerGeneration
{
    public function __construct()
    {}
    public function index(){
        $controller = new Controller();
        $pdo = $controller->pdo;
        $categorieRepository = new CategorieRepo($pdo);
        $questionRepository = new QuestionRepo($pdo);
        $tableauRepository = new TypeQuestionTableauRepo($pdo);
        $tableauColonneRepository = new TableauColonneRepo($pdo);
        $tableauLigneRepository = new TableauLigneRepo($pdo);
        $radioCheckboxRepo = new TypeQuestionRadioCheckboxRepo($pdo);
        include '../vue/Entretien.php';
    }
}