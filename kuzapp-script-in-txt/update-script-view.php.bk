<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KuzApp Web Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000; /* Body background black */
            color: #000000; /* Black text */
            padding: 20px;
        }
        .banner-title {
            background-color: #e65100; /* Orange banner */
            padding: 5px;
            border-radius: 5px;
            max-width: 800px;
            margin: 20px auto;
            color: #000000; /* Black text */
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        .content {
            background-color: #ffff00; /* Yellow banner background around text */
            padding: 5px;
            border-radius: 8px;
            max-width: 800px;
            margin: 0 auto;
            color: #000000; /* Black text */
        }
        .footer-banner {
            background-color: #e65100; /* Orange banner */
            padding: 15px;
            border-radius: 5px;
            max-width: 800px;
            margin: 40px auto;
            text-align: center;
            font-size: 20px;
        }
        .footer-banner a {
            background-color: yellow;
            color: #000000;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .footer-banner a:hover {
            background-color: green;
        }
        p, li {
            line-height: 1.6;
            color: #000000; /* Black text */
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            padding: 5px 0;
        }
    </style>
</head>
<body>

    <!-- Main Title -->
    <div class="banner-title">KuzApp Web Application</div>

    <!-- Subtitle -->
    <div class="banner-title">Linux System Administration Tools</div>

    <!-- Content Section with Yellow Banner -->
    <div class="content">
        <h3>System Maintenance Information and Diagnostic Script</h3>
        <p>The bash script provides an interface to execute a variety of sub-scripts that perform system cleaning, diagnostic, and network information tasks.</p>

        <!-- Features Banner -->
        <div class="banner-title">01 -->  UPDATE-SCRIPT</div>

        <!-- Remplacement du texte par l'affichage d'un fichier -->
        <div class="file-content">
            <?php
                // Chemin du fichier à afficher
                $file_path = '../kuzapp-script/update-script.sh';

                // Vérification que le fichier existe
                if (file_exists($file_path)) {

                // Lecture et affichage du contenu du fichier
                    $file_content = file_get_contents($file_path);
                    echo nl2br($file_content);  // nl2br pour garder les sauts de ligne
                } else {
                    echo "Le fichier texte n'a pas été trouvé.";
                }
            ?>
        </div>

        <!-- Interactive Menu Banner -->
        <div class="banner-title">Interactive Menu</div>

        <p>The script uses a menu structure to allow the user to choose from the different options. Each option launches a different sub-script.</p>

        <!-- License Banner -->
        <div class="banner-title">License</div>

        <p>The script is distributed under the GNU General Public License, version 3 or later.</p>
    </div>

    <!-- Footer Banner with Return Button -->
    <div class="footer-banner">
        <a href="../app.php">RETOUR</a>
    </div>

</body>
</html>
