<?php

class EmployeController
{
    public function choix()
    {
        $controller = new Controller();
        $employes = $controller->getEmploye();
        include_once __DIR__ . '/../views/choix.php';
    }

    public function index()
    {
        echo "bonjour";
    }

    public function details()
    {
        $id = $_GET['test'] ?? null; // Récupérer l'identifiant de l'employé sélectionné

        if ($id === null) {
            echo "Aucun employé sélectionné.";
            return;
        }

        $controller = new Controller();
        $employe = array_filter($controller->getEmploye(), function ($e) use ($id) {
            return $e['idemploye'] == $id;
        });

        if (empty($employe)) {
            echo "Employé non trouvé.";
            return;
        }

        $employe = reset($employe); // Obtenir l'employé sélectionné
        echo "<h1>Détails de l'employé</h1>";
        echo "<p>Prénom : " . htmlspecialchars($employe['prenom']) . "</p>";
        echo "<p>Nom : " . htmlspecialchars($employe['nom']) . "</p>";
    }
}