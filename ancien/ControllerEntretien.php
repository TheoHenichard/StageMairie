<?php

namespace ancien;
use EntretienRepo;

require_once '../repositories/EntretienRepo.php';

class ControllerEntretien
{
    public function __construct()
    {
    }

    public function index()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=stage;charset=utf8', 'root', '1234');
        $entretienRepository = new EntretienRepo($pdo);
        include '../vue/Employe.php';
    }
}

?>
