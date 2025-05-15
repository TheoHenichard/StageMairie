<?php

if (isset($_GET['test'])) {
    $idemploye = (int)$_GET['test'];
}

if (isset($_GET['nom'])) {
    $nom = $_GET['nom'];
}

if (isset($_GET['prenom'])) {
    $prenom = $_GET['prenom'];
}

$idemploye = 1;
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
    <div class="row g-3">
        <?php
        $listEntretien = $entretienRepository->getById($idemploye);
        foreach ($listEntretien as $entretien){
            $type = $entretien->getIdTypeEntretien();
            $date = $entretien->getDate();
            echo "<div class='col-sm-4 col-md-4 col-lg-4'>
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>$date</h5>
                        <p class='card-text'>$date</p>
                        <a href='Entretien.php?profil=$type' class='btn btn-primary'>Voir</a>
                    </div>
                </div>
            </div>";
        }
        foreach ($listEntretien as $entretien){
            $type = $entretien->getIdTypeEntretien();
            $date = $entretien->getDate();
            echo "<div class='col-sm-4 col-md-4 col-lg-4'>
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>$date</h5>
                        <p class='card-text'>$date</p>
                        <a href='Entretien.php?profil=$type' class='btn btn-primary'>Voir</a>
                    </div>
                </div>
            </div>";
        }
        ?>

    </div>
</div>
<form action="Employe.php" method="get">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" name="annee" id="annee" placeholder="Nom">
                <br>
                <select name="type">
                    <option value="1">CCAS2025 C2</option>
                    <option value="2">CCAS2025 C1-B2-A3</option>
                    <option value="3">CCAS2025 B1-A2-A1</option>
                </select>
                <input type="hidden" name="test" value="<?php echo $idemploye; ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Save changes</button>
            </div>
        </div>
    </div>
</div>
    <br>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Ajouter un entretien
</button>
</form>

<?php

$date = date("Y-m-d");
$idemploye = isset($_GET['test']) ? (int)$_GET['test'] : null;

if (empty($annee) || empty($type) || empty($idemploye)) {
    die();
}
$preparedStatement = "INSERT INTO entretien (annee, type, idemploye, dateentretien) VALUES ($1, $2, $3, $4)";
$connexion = Database::getInstance()->getConnection();
var_dump([$annee, $type, $idemploye, $date]);
$result = pg_query_params($connexion, $preparedStatement, array($annee, $type, $idemploye, $date));
if (!$result) {
    die('Erreur SQL : ' . pg_last_error($connexion));
}

echo 'Données insérées avec succès !';
?>