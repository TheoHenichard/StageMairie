<?php

require_once 'Controller.php';
require_once '../repositories/EmployeRepo.php';
require_once '../repositories/EntretienRepo.php';

class ControllerEmploye
{
    public function __construct()
    {}
    public function index(){
        $controller = new Controller();
        $pdo = $controller->pdo;
        $employeRepository = new EmployeRepo($pdo);
        $employeAll = $employeRepository->getAll();
        $entretienRepository = new EntretienRepo($pdo);
        $listEntretienALl = $entretienRepository->getAll();
        if (isset($_POST['employe']) && $_POST['employe']!=""){
            echo $_POST['employe'];
            $employe = $employeRepository->getById($_POST['employe']);
            $listEntretien = $entretienRepository->getByEmploye($employe);}
        else{
            $listEntretien = $listEntretienALl;}
        include '../vue/Dashboard.php';
    }
}