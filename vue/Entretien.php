<?php
include_once "../controller/Controller.php";

$controller = new Controller();


session_start();


if (isset($_GET['profil'])) {
    $profil = (int)$_GET['profil'];
}
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entretien annuel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    <meta name="description" content="">

</head>
<body style="margin-left: 10%; margin-right: 10%">

<div class="header">
    <img src="logo_footer.png" alt="logo">
    <h1 style="margin: 0;">C.C.A.S. BOULOGNE-SUR-MER <br> Année 2025</h1>
</div>

<div class="rectangle">
    <h3>COMPTE-RENDU D’ENTRETIEN PROFESSIONNEL</h3>
    <p>Décret n°2014-1526 du 16 décembre 2014</p>
</div>

<p class="texte_page1" style="font-size: 120%; ">Ce document fait partie du dossier individuel de l’agent et est susceptible d’être utilisé lors d’une
    éventuelle étude de son dossier.</p>
<?php
if($profil==1){
    $grp = "C2";
}
if($profil==2){
    $grp = "C1-B2-A3";
}
if($profil==3){
    $grp = "B1-A2-A1";
}

    echo "<b class='grp'>GROUPE FONCTIONNEL $grp</b>";
?>

<b class="Titre">▼ IDENTITÉ / SITUATION ADMINISTRATIVE</b>
<table>
    <tr>
        <td style='width: 30%'>DIRECTION</td>
        <td><input type="text"  class="inv" value=></td>
    </tr>
    <tr>
        <td style='width: 30%'>SERVICE</td>
        <td><input type="text" class="inv" value=""></td>
    </tr>
</table>

<b class="Titre">▼ AGENT ÉVALUÉ</b>
<table>
    <tr>
        <td style='width: 30%'>NOM</td>
        <td><input type="text" class="inv" value=""></td>
    </tr>
    <tr>
        <td style='width: 30%'>PRENOM</td>
        <td><input type="text" class="inv" value=""></td>
    </tr>
    <tr>
        <td style='width: 30%'>GRADE</td>
        <td><input type="text" class="inv" value=""></td>
    </tr>
    <tr>
        <td style='width: 30%'>EMPLOI</td>
        <td><input type="text" class="inv" value=""></td>
    </tr>
    <tr>
        <td style='width: 30%'>LIEU D'AFFECTATION</td>
        <td><input type="text" class="inv" value=""></td>
    </tr>
    <tr>
        <td style='width: 30%'>TEMPS DE TRAVAIL</td>
        <td><input type="text" class="inv" value=""></td>
    </tr>
    <tr>
        <td style='width: 30%'>QUOTITÉ DE TRAVAIL</td>
        <td><input type="text" class="inv" value=""></td>
    </tr>
    <tr>
        <td style='width: 30%'>DIPLOME LE PLUS ÉLEVÉ OBTENU PAR L’AGENT </td>
        <td><input type="text" class="inv" value=""></td>
    </tr>
</table>

<b class="Titre">▼ EVALUATEUR (SUPERIEUR HIERARCHIQUE DIRECT)</b>
<table>
    <tr>
        <td style='width: 30%'>NOM</td>
        <td><input type="text" class="inv" value=""></td>
    </tr>
    <tr>
        <td style='width: 30%'>PRENOM</td>
        <td><input type="text" class="inv" value=""></td>
    </tr>
    <tr>
        <td style='width: 30%'>GRADE</td>
        <td><input type="text" class="inv" value=""></td>
    </tr>
    <tr>
        <td >EMPLOI</td>
        <td><input type="text" class="inv" value=""></td>
    </tr>
</table>

<table>
    <tr>
        <th>

        </th>
        <th>
            <b class="Titre">Dates</b>
        </th>
    </tr>
    <tr>
        <td style='width: 30%'>DATE D’ÉLABORATION DE LA FICHE DE POSTE :</td>
        <td><input class="inv" type="text" value=""></td>
    </tr>
    <tr>
        <td style='width: 30%'>DATE DE MISE A JOUR DE LA FICHE DE POSTE : </td>
        <td><input class="inv" type="text" value=""></td>
    </tr>
    <tr>
        <td style='width: 30%'>CONVOCATION : </td>
        <td><input class="inv" type="text" value=""></td>
    </tr>
    <tr>
        <td style='width: 30%'>DURÉE ENTRETIEN : </td>
        <td><input class="inv" type="text" value=""></td>
    </tr>
    <tr>
        <td style='width: 30%'>NOTIFICATION : </td>
        <td><input class="inv" type="text" value=""></td>
    </tr>
    <tr>
        <td style='width: 30%'>RETOUR A L’AGENT : </td>
        <td><input class="inv" type="text" value=""></td>
    </tr>
</table>




<?php
$listCategorie = $controller->getCategorie();
foreach ($listCategorie as $categorie){
    echo "<b class='Titre'>$categorie[nom]</b><br>";

    $listLiaison = $controller->getLiaison($categorie['idcat'],$profil);

    foreach ($listLiaison as $liaisons) {
        if($liaisons['idtab']!=null){
            $listTab = $controller->getTab($liaisons['idtab']);
            foreach ($listTab as $tableau){
                echo "<h3>$tableau[titre]</h3>";
                $listLigne = $controller->getLigne($tableau['idtab']);
                $tab = [];
                foreach ($listLigne as $ligne) {
                    $tab[] = [
                        'Critère' => $ligne['critere'],
                        'Définition' => $ligne['definition'],
                        'Options' => [$ligne['texte0'],$ligne['texte1'],$ligne['texte2'],$ligne['texte3']]
                    ];
                }
                ?>
                <table class="tab1" >
                    <thead>
                    <tr>
                        <th>Critère</th>
                        <th>Définition</th>
                        <th>Insuffisant</th>
                        <th>À améliorer</th>
                        <th>Satisfaisant</th>
                        <th>Supérieur aux attentes</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tab as $ligne):
                        ?>
                        <tr>
                            <td><b><?= htmlspecialchars($ligne['Critère']); ?></b></td>
                            <td><?= htmlspecialchars($ligne['Définition']); ?></td>
                            <?php foreach ($ligne['Options'] as $key => $option): ?>
                                <td>
                                    <?php
                                    $uniqueId = htmlspecialchars($ligne['Critère'] . '_' . $key);
                                    ?>
                                    <input id='<?= $uniqueId; ?>' class='tab' style='margin-left: 45%' type='radio' name='<?= htmlspecialchars($ligne['Critère']); ?>' value='<?= htmlspecialchars($option); ?>'>
                                    <label for='<?= $uniqueId; ?>'><?= htmlspecialchars($option); ?></label>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <br>
                <?php
            }
        }
            $listQuestion = $controller->getQuestion($categorie['idcat']);
            var_dump($listQuestion);
            foreach ($listQuestion as $question){
                $texte = $question['texte'];
                $texte1 = $question['texte'];
                if($question['isquestion'] == "t") {
                    echo  "<p>$texte</p>";}
                if ($question['isquestion'] == "f") {
                    if($question['typeaffichage']=="h2"){
                        echo  "<h2 style='color: #19169d; font-family:Arial,serif'>$texte1</h2>";
                    }
                    if ($question['typeaffichage']=="h3"){
                        echo  "<h3>$texte1</h3>";
                    }
                }
                switch($question['typeaffichage']){
                    case "text":
                        $taille = $question['taille'];
                        echo"<form><textarea style='resize: none' rows='$taille' cols='130vw'></textarea> </form><br>";
                        break;
                    case "checkbox":
                        for($i=0;$i<$question['taille'];$i++){
                            echo "<input type='checkbox'><br>";
                        }
                        break;
                    case "radio":
                        $listReponse = $controller->getReponse($question['idquestion']);
                        foreach ($listReponse as $index => $reponse) {
                            $reponseT = htmlspecialchars($reponse['reponse']);
                            $idUnique = "reponse_" . htmlspecialchars($index);
                            echo "<input class='q' id='$idUnique' type='radio' name='test' value='$reponseT'>";
                            echo "<label for='$idUnique'>$reponseT</label>";
                        }

                        break;
                }

                if($question['ordre'] == 2){
                    $e = $question['texte'];
                }
            }
        }
    }


?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select>
                    <option> </option>
                    <?php
                    $e = $controller->getCategorie();
                    foreach ($e as $categorie){
                        echo "<option value=''>$categorie[nom]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Ajouter une question
</button>

<?php
$isQuestion = $_POST['q'];
$texte = $_POST['texte'];
$typeaffichage = $_POST['typeaffichage'];
$taille = $_POST['taille'];
$preparedStatement = "INSERT INTO element (isQuestion, texte, typeaffichage, taille) VALUES ($1, $2, $3, $4)";
$connexion = Database::getInstance()->getConnection();
if (!$connexion) {
    die("Erreur dans la requête SQL : " . pg_last_error($connexion));
}
$result = pg_query_params($connexion, $preparedStatement, array($isQuestion, $texte, $typeaffichage, $taille));

?>
<button id="downloadPdf" class="btn btn-primary">Télécharger en PDF</button>

<script>
    document.getElementById('downloadPdf').addEventListener('click', () => {
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF({
            orientation: "portrait",
            unit: "mm",
            format: "a4"
        });



        const pageWidth = pdf.internal.pageSize.getWidth();
        const htmlWidth = document.body.scrollWidth;
        const scaleFactor = pageWidth / htmlWidth;
        pdf.html(document.body, {
            callback: function (pdf) {
                pdf.save("page.pdf");
            },
            y: 10,
            autoPaging: true,
            html2canvas: {
                scale: scaleFactor
            }
        });
    });
</script>



</body>
</html>