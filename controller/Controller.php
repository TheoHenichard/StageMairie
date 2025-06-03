<?php

class Controller{
    public $pdo;

    public function __construct(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=stage;charset=utf8', 'root', '1234');
    }

}