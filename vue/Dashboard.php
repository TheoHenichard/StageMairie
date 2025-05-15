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
<form action="../public/index.php" method="post">

<select name='employe'>
    <option> </option>
    <?php
    $e = $employeRepository->getAll();
    foreach ($e as $employe){
        $idEmploye = $employe->getIdEmploye();
        $nom = $employe->getNom();
        echo "<option name='' value='$idEmploye'> $nom $idEmploye</option>";
    }
    ?>
</select>
    <input type="submit" value="Valider">
</form>
<?php
if (isset($_POST['employe'])) {
    $idemploye = $_POST['employe'];
    $listEntretien = $entretienRepository->getById($idemploye);
    foreach ($listEntretien as $entretien){
        $idEntretien = $entretien->getIdTypeEntretien();
        $date = $entretien->getDate();
        echo "<div class='col-sm-4 col-md-4 col-lg-4'>
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>$date</h5>
                        <p class='card-text'>$date</p>
                        <a href='entretien/voir/profil=$idEntretien' class='btn btn-primary'>Voir</a>
                    </div>
                </div>
            </div>";
    }
}
?>
</body>
