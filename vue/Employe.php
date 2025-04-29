<?php
include_once "../controller/Controller.php";

$controller = new Controller();


if (isset($_GET['test'])) {
    $test = (int)$_GET['test'];
}

$listEntretien = $controller->getEntretien($test);
var_dump($listEntretien);
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Choix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    <meta name="description" content="">

</head>
<body style="margin-left: 10%;margin-top: 5%; margin-right: 10%" class="bg-gray-200">

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="card" style="width: 18rem;">
                <img src="CL16.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">CCAS2025 C2</h5>
                    <p class="card-text">Test des différents profils</p>
                    <a href="Entretien.php?profil=1" class="btn btn-primary">Profil C2</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="card" style="width: 18rem;">
                <img src="CL16.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">CCAS2025 C1-B2-A3</h5>
                    <p class="card-text">Test des différents profils</p>
                    <a href="Entretien.php?profil=2" class="btn btn-primary">Profil C1-B2-A3</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="card" style="width: 18rem;">
                <img src="CL16.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">CCAS2025 B1-A2-A1</h5>
                    <p class="card-text">Test des différents profils</p>
                    <a href="Entretien.php?profil=3" class="btn btn-primary">Profil B1-A2-A1</a>
                </div>
            </div>
        </div>
    </div>
</div>


</body>