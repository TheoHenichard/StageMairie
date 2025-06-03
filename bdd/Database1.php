<?php

class Database1
{
    private $host = 'localhost';
    private $dbname = 'stage';
    private $username = 'root';
    private $password = '1234';
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->username,
                $this->password
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo 'Connexion réussie.';
        } catch (PDOException $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public function closeConnection()
    {
        $this->pdo = null;
    }
}

