<?php

if (isset($_GET['profil'])) {
    $profil = (int)$_GET['profil'];
}
$profil=1;
$typeEntretien=2;

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
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
        <img src="../image/logo_footer.png" width="262" height="262">
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
    $listCat = $categorieRepository->getById($typeEntretien);
    foreach ($listCat as $categorie){
    $nom = $categorie->getNom();
    if($categorie->getSuperCategorie()!=0){
        echo "<h3 class='Titre'>$nom</h3><br>";
    }
    else{
        echo "<b class='Titre'>$nom</b><br>";
    }
    $questionsCat = $questionRepository->getById($categorie->getIdcategorie());
    foreach ($questionsCat as $question){
        $idQ = $question->getIdquestion();
        $textintro = $question->getTextintro();
        echo "<p> $textintro</p>";
        if($question->getTypequestion()=="tableau") {
            $tableau = $tableauRepository->getById($question->getIdquestion());

            foreach ($tableau as $tab) {
                ?>
                    <div class="container-question" style="padding-bottom: 40px">
                <?php
            $lignes = $tableauLigneRepository->getById($tab->getIdTypeQuestion());
            foreach ($lignes as $ligne) {
                ?><div class="row" style="border: 1px solid #000 ;"><?php
            $colonnes = $tableauColonneRepository->getById($ligne->getIdTableauLigne());
            $critere =$colonnes[0]->getTexte();
            foreach ($colonnes as $colonne) {
                if ($colonne->getTypeColonne() == "texte"){
                $texte = $colonne->getTexte();
                    ?>
                        <div class="col" style="border: 1px solid #000000;"
                        ><p style="font-size: 20px"><?php echo $texte ?></p></div>
                <?php }
                if ($colonne->getTypeColonne() == "textinput"){
                    echo'<div class="col" style="border: 1px solid #000; width: 150%; resize: none; rows=6"><input type="text" class="inv" value=""></div>';
                }
                if ($colonne->getTypeColonne() == "radio"){
                    $texte = $colonne->getTexte();
                    $class = "tab";
                    if($texte==""){
                        $class = "";
                    }

                    ?>
                            <div class="col" style="border: 1px solid #000;">
                        <?php
                        $uniqueId = "radio_".$critere.$colonne->getIdTableauColonne();
                        ?>
                        <input id='<?= $uniqueId; ?>' class='<?= $class ?>' style='margin-left: 45%' type='radio' name='<?= htmlspecialchars($critere) ?>'>
                        <label for='<?= $uniqueId; ?>'><?= htmlspecialchars($texte); ?></label></div>
                        <?php
                }
                }
        ?></div><?php }   ?> </div><?php }}

        if($question->getTypequestion()=="textinput"){
            echo "<textarea id='$idQ' style='width: 100%; resize: none' rows=6></textarea><br>";
        }
        if($question->getTypequestion()=="radio"){

            $radios = $radioCheckboxRepo->getById($question->getIdquestion());
            $num = 0;
            foreach ($radios as $radio){
                $idUnique = $idQ."-".$radio->getIdTypeQuestion();
                $name = $idQ."-".$radio->getIdQuestion();
                $rep = $radio->getReponse();
                echo "<input class='q' id='$idUnique' type='radio' name='$name' value='$num'>";
                echo "<label for='$idUnique'>$rep</label>";
            }
            echo "<br>";
        }
        if($question->getTypequestion()=="checkbox"){
            $checkboxs = $radioCheckboxRepo->getById($question->getIdquestion());
            $num = 0;
            foreach ($checkboxs as $checkbox){
                $idUnique = $idQ."-".$checkbox->getIdTypeQuestion();
                $name = $idQ;
                $rep = $checkbox->getReponse();
                echo "<input class='q' id='$idUnique' type='checkbox' name='$name' value='$num'>";
                echo "<label for='$idUnique'>$rep</label>";
            }
            echo "<br>";
        }
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
    <button id="recupererDonnees" class="btn btn-success">Récupérer les données</button>

</div>
    <script>
        document.getElementById('downloadPdf').addEventListener('click', () => {
            const { jsPDF } = window.jspdf;
            const noPrintElements = document.querySelectorAll('.no-print');
            const scaleFactor = 2; // Résolution d'html2canvas améliorée.

            // Masquer les éléments "no-print" avant la capture
            noPrintElements.forEach(el => el.style.display = 'none');

            const pdf = new jsPDF({
                orientation: "portrait",
                unit: "mm",
                format: "a4"
            });

            pdf.html(document.body, {
                callback: function (pdf) {
                    // Rendre les éléments masqués visibles après la génération
                    noPrintElements.forEach(el => el.style.display = '');
                    pdf.save("page.pdf");
                },
                x: 10, // Position horizontale
                y: 10, // Position verticale
                margin: [10, 10], // Marges
                html2canvas: {
                    scale: scaleFactor, // Pour meilleure résolution
                    logging: true // Activer les logs d'erreurs console
                }
            });
        });
    </script>

    <script>

        function recupererInfos() {
            const donnees = {};

            const areaInputs = document.querySelectorAll('textarea');
            areaInputs.forEach(textarea => {
                donnees[textarea.id] = textarea.value;
            });

            const radioInputs = document.querySelectorAll('input[type="radio"]:checked');
            radioInputs.forEach(input => {
                donnees[input.id] = input.value;
            });


            const checkInputs = document.querySelectorAll('input[type="checkbox"]');
            checkInputs.forEach(input => {
                donnees[input.id] = input.checked;
            });

            console.log(donnees);
            print(donnees);
            localStorage.setItem('donneesTableau', JSON.stringify(donnees));
        }
        document.getElementById('recupererDonnees').addEventListener('click', function(event){event.preventDefault();recupererInfos()});
    </script>
    <?php

    ?>
</body>
</html>