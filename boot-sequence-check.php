<?php
// Spécifiez le chemin vers votre script shell
$command = 'bash /var/www/html/Kusapp/boot-sequence-check.sh';
ob_start();
passthru($command);
$output = ob_get_clean();

// Ajout d'en-têtes pour le contenu HTML
header('Content-Type: text/html; charset=utf-8');

// Affichage du résultat avec style de terminal
echo "<!DOCTYPE html>";
echo "<html><head>";
echo "<style>";
echo "body, html {";
echo "    height: 100%;"; // Donne une hauteur de 100% au corps et au HTML
echo "    margin: 0;"; // Supprime les marges par défaut
echo "    padding: 0;"; // Supprime les paddings par défaut
echo "    display: flex;";
echo "    flex-direction: column;";
echo "}";
echo ".banner {";
echo "    width: 100%;"; // Largeur totale
echo "    background-color: orange;"; // Couleur de fond
echo "    color: black;"; // Couleur de texte
echo "    text-align: center;"; // Texte centré
echo "    padding: 10px 0;"; // Padding vertical
echo "    font-size: 20px;"; // Taille de police
echo "    font-weight: bold;"; // Gras
echo "}";
echo ".terminal {";
echo "    width: 65%;";
echo "    background-color: #ffa500;";
echo "    color: #000;";
echo "    font-family: monospace;";
echo "    padding: 20px;";
echo "    white-space: pre-wrap;";
echo "    overflow: auto;"; // Ajoute une barre de défilement si nécessaire
echo "    margin: 20px auto;";
echo "    height: 600px;"; // Hauteur fixe pour le terminal
echo "}";
echo ".bottom-banner {";
echo "    position: fixed;";
echo "    bottom: 0;";
echo "    left: 0;";
echo "    width: 100%;";
echo "    background-color: orange;";
echo "    color: black;";
echo "    text-align: center;";
echo "    padding: 10px 0;";
echo "    font-size: 20px;";
echo "    font-weight: bold;";
echo "}";
echo "a.bottom-link {";
echo "    color: black;"; // Couleur du texte
echo "    text-decoration: none;"; // Aucune décoration de texte
echo "    display: block;"; // Assure que le lien prend toute la largeur du bandeau
echo "}";
echo "</style>";
echo "</head><body>";
echo "<div class='banner'>KUSAPP / 2024 - UPDATE INFOS APPLICATION</div>";
echo "<div class='terminal'><pre>$output</pre></div>";
// Modification ici pour faire du texte dans le bandeau inférieur un lien de retour
echo "<div class='bottom-banner'><a href='index.php' class='bottom-link'>RETOUR</a></div>";
echo "</body></html>";
?>
