<?php

if (isset($_GET['profil'])) {
    $profil = (int)$_GET['profil'];
}
$profil=2;
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
<form action="Entretien.php" method="post">
    <div class="header">
        <img src="logo_footer.png" alt="logo">
        <h1 style="margin: 0;">C.C.A.S. BOULOGNE-SUR-MER <br> Année 2025</h1>
    </div>

    <div class="rectangle">
        <h3>COMPTE-RENDU D’ENTRETIEN PROFESSIONNEL</h3>
        <p>Décret n°2014-1526 du 16 décembre 2014</p>
    </div>

    <p class="texte_page1" style="font-size: 120%; ">Ce document fait partie du dossier individuel de l’agent et est susceptible d’être utilisé lors d’une éventuelle étude de son dossier.</p>
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

    $recup=[];

    echo "<b class='grp'>GROUPE FONCTIONNEL $grp</b>";
    ?>

    <b class="Titre">▼ IDENTITÉ / SITUATION ADMINISTRATIVE</b>
    <table>
        <tr>
            <td style='width: 30%'>DIRECTION</td>
            <td><input type="text"  class="inv" name="direction" value=""></td>
        </tr>
        <tr>
            <td style='width: 30%'>SERVICE</td>
            <td><input type="text" class="inv" name="service" value=""></td>
        </tr>
    </table>

    <b class="Titre">▼ AGENT ÉVALUÉ</b>
    <table>
        <tr>
            <td style='width: 30%'>NOM</td>
            <td><input type="text" class="inv" name="nom" value=""></td>
        </tr>
        <tr>
            <td style='width: 30%'>PRENOM</td>
            <td><input type="text" class="inv" name="prenom" value=""></td>
        </tr>
        <tr>
            <td style='width: 30%'>GRADE</td>
            <td><input type="text" class="inv" name="grade" value=""></td>
        </tr>
        <tr>
            <td style='width: 30%'>EMPLOI</td>
            <td><input type="text" class="inv" name="emploi" value=""></td>
        </tr>
        <tr>
            <td style='width: 30%'>LIEU D'AFFECTATION</td>
            <td><input type="text" class="inv" name="lieu" value=""></td>
        </tr>
        <tr>
            <td style='width: 30%'>TEMPS DE TRAVAIL</td>
            <td><input type="text" class="inv" name="temps_travail" value=""></td>
        </tr>
        <tr>
            <td style='width: 30%'>QUOTITÉ DE TRAVAIL</td>
            <td><input type="text" class="inv" name="quotite" value=""></td>
        </tr>
        <tr>
            <td style='width: 30%'>DIPLOME LE PLUS ÉLEVÉ OBTENU PAR L’AGENT </td>
            <td><input type="text" class="inv" name="diplome_plus_eleve" value=""></td>
        </tr>
    </table>

    <b class="Titre">▼ EVALUATEUR (SUPERIEUR HIERARCHIQUE DIRECT)</b>
    <table>
        <tr>
            <td style='width: 30%'>NOM</td>
            <td><input type="text" class="inv" name="nom_eval" value=""></td>
        </tr>
        <tr>
            <td style='width: 30%'>PRENOM</td>
            <td><input type="text" class="inv" name="prenom_eval" value=""></td>
        </tr>
        <tr>
            <td style='width: 30%'>GRADE</td>
            <td><input type="text" class="inv" name="grade_eval" value=""></td>
        </tr>
        <tr>
            <td >EMPLOI</td>
            <td><input type="text" class="inv" name="emploi_eval" value=""></td>
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
    foreach ($listCategorie as $categorie){
    $nom = $categorie->getNom();
    if($categorie->getTitre()!=0){
        echo "<h3 class='Titre'>$nom</h3><br>";
    }
    else{
        echo "<b class='Titre'>$nom</b><br>";
    }
    foreach ($listLiaison as $liaisons) {
    if($liaisons->getIdcat()==$categorie->getOrdre()){
    if($liaisons->getIdtab()!=0){
    echo "<form action='Entretien.php?profil=$profil' method='post'>";
    foreach ($listTab as $tableau){
        if($liaisons->getIdtab()==$tableau->getIdtab()){
            $titre = $tableau->getTitre();
        echo "<h3>$titre</h3>";
        $tab = [];
        foreach ($listLigneTab as $ligne) {
            if($ligne->getIdtableau()==$tableau->getIdtab()){
            $recup[]=$ligne->getCritere();
            $tab[] = [
                'Critère' => $ligne->getCritere(),
                'Définition' => $ligne->getDefinition(),
                'Options' => [$ligne->getTexte0(),$ligne->getTexte1(),$ligne->getTexte2(),$ligne->getTexte3()]
            ];
        }}
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
                $num = 1;
                ?>
                <tr>
                    <td><b><?= htmlspecialchars($ligne['Critère']); ?></b></td>
                    <td><?= htmlspecialchars($ligne['Définition']); ?></td>
                    <?php
                    foreach ($ligne['Options'] as $key => $option): ?>
                        <td>
                            <?php
                            $uniqueId = htmlspecialchars($ligne['Critère'] . '_' . $key);
                            ?>
                            <input id='<?= $uniqueId; ?>' class='tab' style='margin-left: 45%' type='radio' name='<?= htmlspecialchars($ligne['Critère']); ?>' value='<?= $num ?>' <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'){if ($_POST[0]=$num){echo 'checked';}} ?>>
                            <label for='<?= $uniqueId; ?>'><?= htmlspecialchars($option); ?></label>
                        </td>
                        <?php
                        $num++;
                    endforeach; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <?php
        $num=0;
    }}}
    ?>
</form>
<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h3>Données du formulaire :</h3>";
    foreach ($_POST as $key => $value) {
        echo "Clé: $key — Valeur: $value<br>";
    }
}
if ($liaisons->getIdtableau()!=0){
    foreach ($listTableau as $tableau){
        if ($liaisons->getIdtableau()==$tableau->getIdtableau()){
            ?>
            <table>
                <?php
                foreach ($listLigne as $ligne) {
                        if ($ligne->getIdtableau()==$tableau->getIdtableau()){
                            ?>
                            <tr>
                                <?php
                                foreach ($listVal as $val){
                                    if ($ligne->getIdligne()==$val->getIdlignetableau()){
                                        if ($val->getTexte()=="text"){
                                            echo'<td><input type="text" class="inv" value=""></td>';
                                        }
                                        else if ($val->getTexte()=="radio"){
                                            ?>
                                            <td><input type="radio" class="inv" name="<?=$ligne->getIdligne()?>" value=""></td>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <td><?= $val->getTexte() ?> </td>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </tr>
                            <?php
                        }
                }
            }?>
        </table>
        <?php
    }
}

foreach ($listQuestion as $question){
    if($categorie->getOrdre()==$liaisons->getIdcat()){
    if($liaisons->getIdquestion()!=null && $liaisons->getIdquestion()==$question->getIdquestion()){
        $texte = $question->getTexte();
        $texte1 = $question->getTexte();
        if($question->getIsquestion() == "t") {
            echo  "<p>$texte</p>";}
        if ($question->getIsquestion() == "f") {
            if($question->getIsquestion()=="h2"){
                echo  "<h2 style='color: #19169d; font-family:Arial,serif'>$texte1</h2>";
            }
            if ($question->getIsquestion()=="h3"){
                echo  "<h3>$texte1</h3>";
            }
        }
        switch($question->getTypeaffichage()){
            case "text":
                $taille = $question->getTaille();
                echo"<form><textarea style='resize: none' rows='$taille' cols='100%'></textarea> </form><br>";
                break;
            case "checkbox":
                foreach ($listReponse as $index => $reponse) {
                    if($reponse->getIdquestion()==$question->getIdquestion()){
                    $reponseT = htmlspecialchars($reponse->getReponse());
                    $name = htmlspecialchars($categorie->getIdcat());
                    $idUnique = "reponse_" . htmlspecialchars($index).htmlspecialchars($categorie->getIdcat()).htmlspecialchars($question->getIdquestion());
                    echo "<input class='q' id='$idUnique' type='checkbox' name='$name' value='$reponseT'>";
                    echo "<label for='$idUnique'>$reponseT</label>";
                }}
                echo "<br><br>";
                break;
            case "radio":
                foreach ($listReponse as $index => $reponse) {
                    if($reponse->getIdquestion()==$question->getIdquestion()){
                    $reponseT = htmlspecialchars($reponse->getReponse());
                    $name = htmlspecialchars($categorie->getIdcat()).htmlspecialchars($question->getIdquestion());
                    $idUnique = "reponse_" . htmlspecialchars($index).htmlspecialchars($categorie->getIdcat()).htmlspecialchars($question->getIdquestion());
                    echo "<input class='q' id='$idUnique' type='radio' name='$name' value='$reponseT'>";
                    echo "<label for='$idUnique'>$reponseT</label>";
                }}
                echo "<br><br>";
                break;
        }

        if($question->getOrdre() == 2){
            $e = $question->getTexte();
        }
    }}}}
}
}


?>

<div class="no-print">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label>
                        <select>
                            <option> </option>
                            <?php
                            foreach ($listCategorie as $categorie){
                                $nomCat = $categorie->getNom();
                                echo "<option value=''>$nomCat</option>";
                            }
                            ?>
                        </select>
                    </label>
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

    <button id="downloadPdf" class="btn btn-primary">Télécharger en PDF</button>
</div>
<script>
    document.getElementById('downloadPdf').addEventListener('click', () => {
        const { jsPDF } = window.jspdf;
        const noPrintElements = document.querySelectorAll('.no-print');
        noPrintElements.forEach(el => el.style.display = 'none');

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
                noPrintElements.forEach(el => el.style.display = '');
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