<?php
// Informations d'identification
define('DB_SERVER', 'db'); // Nom du service MySQL dans docker-compose.yml
define('DB_USERNAME', 'admin1'); // Utilisateur MySQL
define('DB_PASSWORD', 'kusanagi2045'); // Mot de passe MySQL (vérifiez si c'est vide dans votre configuration)
define('DB_NAME', 'registration'); // Nom de la base de données

// Connexion à la base de données MySQL
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>
