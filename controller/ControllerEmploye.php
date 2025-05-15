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
        $entretienRepository = new EntretienRepo($pdo);
        include '../vue/Dashboard.php';
    }
}