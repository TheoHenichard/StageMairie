<?php
include_once "../controller/Controller.php";
$controller = new Controller();
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
<form action="Employe.php" method="get">
<select name='test'>
    <option> </option>
    <?php
    $e = $controller->getEmploye();
    foreach ($e as $categorie){
        echo "<option name='test1' value='$categorie[idemploye]'>$categorie[prenom] $categorie[nom]</option>";
    }
    ?>
</select>
    <input type="submit" value="Valider">
</form>
</body>
