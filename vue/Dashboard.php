<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

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

<select name='test'>
    <option> </option>
    <?php
    foreach ($employeAll as $employe){
        $idEmploye = $employe->getIdEmploye();
        $nom = $employe->getNom();

        if($listEntretien[0]->getEmploye()->getIdEmploye() == $idEmploye){
            $selected = "selected";}
        else{$selected = "";}
        echo "<option name='employe' value='' $selected> $nom $idEmploye</option>";
    }
    ?>
</select>
    <input type="submit" value="Valider">
</form>
</br></br>
<?php
    foreach ($listEntretien as $entretien){
        $idEntretien = $entretien->getTypeEntretien()->getIdTypeEntretien();
        $date = $entretien->getDate();
        $nom = $entretien->getEmploye()->getNom();
        echo "<div class='col-sm-4 col-md-4 col-lg-4'>
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>$nom</h5>
                        <p class='card-text'>$date</p>
                        <a href='entretien/voir/profil=$idEntretien' class='btn btn-primary'>Voir</a>
                    </div>
                </div>
            </div></br>";
    }
?>
</body>
