<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entretien annuel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <!-- Ajout de html2canvas (nécessaire pour doc.html()) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        body {
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .rectangle {
            border: 1px solid black;
            padding: 10px;
            margin-bottom: 20px;
        }

        .texte_page1 {
            font-size: 120%;
        }
    </style>
</head>

<body>

<div class="header">
    <img src="logo_footer.png" alt="logo">
    <h1 style="margin: 0;">C.C.A.S. BOULOGNE-SUR-MER <br> Année 2025</h1>
</div>

<div class="rectangle">
    <h3>COMPTE-RENDU D’ENTRETIEN PROFESSIONNEL</h3>
    <p>Décret n°2014-1526 du 16 décembre 2014</p>
</div>

<p class="texte_page1">Ce document fait partie du dossier individuel de l’agent et est susceptible d’être utilisé lors d’une éventuelle étude de son dossier.</p>

<button id="downloadPdf" class="btn btn-primary">Télécharger en PDF</button>

<script>
    // Fonction pour le clic sur le bouton
    document.getElementById('downloadPdf').addEventListener('click', () => {
        const { jsPDF } = window.jspdf; // Récupère l'objet jsPDF
        const pdf = new jsPDF({
            orientation: "portrait", // Orientation verticale
            unit: "mm", // Unité en millimètres
            format: "a4" // Format A4 (210 x 297 mm)
        });

        // Calculer la largeur et l'échelle automatique pour que le contenu s'adapte à la page PDF
        const pageWidth = pdf.internal.pageSize.getWidth(); // Largeur de la page PDF
        const htmlWidth = document.body.scrollWidth; // Largeur totale du contenu HTML
        const scaleFactor = pageWidth / htmlWidth; // Facteur d'échelle pour ajuster la largeur

        // Options pour html2canvas et jsPDF
        pdf.html(document.body, {
            callback: function (pdf) {
                // Enregistrer le fichier sous le nom "page.pdf"
                pdf.save("page.pdf");
            },
            x: 10, // Décalage horizontal
            y: 10, // Décalage vertical
            html2canvas: {
                scale: scaleFactor // Ajuste automatiquement la dimension pour que le contenu s'adapte
            }
        });
    });
</script>

</body>
</html>