<?php
// Spécifiez le chemin vers votre script shell
$command = 'bash /var/www/html/App-Update-Infos-Linux/test.sh';

// Exécution de la commande
$output = shell_exec($command);

// Ajout d'en-têtes pour le contenu HTML
header('Content-Type: text/html; charset=utf-8');

// Affichage du résultat avec style de terminal
echo "<!DOCTYPE html>";
echo "<html><head>";
echo "<style>";
echo "body {";
echo "    display: flex;";
echo "    justify-content: center;"; // Centre le terminal sur la page
echo "    flex-direction: column;"; // Organise le contenu verticalement
echo "    align-items: center;"; // Centre le contenu horizontalement
echo "    margin-top: 20px;"; // Décale tout le contenu de 200px vers le bas
echo "}";
echo ".terminal {";
echo "    width: 65%;"; // Largeur du terminal ajustée
echo "    background-color: #ffa500;"; // Fond orange
echo "    color: #000;"; // Texte en noir
echo "    font-family: monospace;";
echo "    padding: 10px;";
echo "    white-space: pre-wrap; /* Maintient le formatage de l'espace */";
echo "    margin-bottom: 40px;"; // Ajout d'un espace en dessous du terminal
echo "}";
echo ".button {";
echo "    display: inline-block;"; // Changez block par inline-block pour la largeur automatique
echo "    padding: 10px 20px;"; // Padding horizontal plus large pour l'esthétique
echo "    margin: 10px auto;"; // Centrage et espace entre les boutons
echo "    background-color: #E65100;"; // Couleur de fond orange plus sombre
echo "    color: black;";
echo "    text-align: center;";
echo "    font-size: 16px;";
echo "    font-weight: bold;";
echo "    border: none;";
echo "    border-radius: 5px;";
echo "    cursor: pointer;";
echo "}";
echo ".button:hover {";
echo "    background-color: #45a049;"; // Changement de couleur au survol
echo "}";
echo "</style>";
echo "</head><body>";
echo "<div class='terminal'><pre>$output</pre></div>";
// Ajout d'un bouton de retour directement sous le terminal avec un lien vers index.php
echo "<div style='text-align: center;'><a href='index.php'><button class='button'>RETOUR À L'INDEX</button></a></div>";
echo "</body></html>";
?>
