<?php
require('config.php');
session_start();

// Activer l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Traitement de la soumission du formulaire
if (isset($_POST['username'])){
  // Échapper les entrées utilisateur
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);

  // Requête SQL pour vérifier l'utilisateur
  $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn, $query) or die(mysql_error());
  $rows = mysqli_num_rows($result);

  if($rows == 1){
    $_SESSION['username'] = $username;
    header("Location: app.php");
  } else {
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}

// Affichage du formulaire
echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '  <link rel="stylesheet" href="style2.css" />';
echo '</head>';
echo '<body>';
echo '<form class="box" action="" method="post" name="login">';
echo '<h1 class="box-logo box-title"><font color="#005CB9">CLINIQUE LE CHATELET</font></h1>';
echo '<h3 class="box-title"><center>BIENVENUE</center></h3>';
echo '<input type="text" class="box-input" name="username" placeholder="IDENTIFIANT">';
echo '<input type="password" class="box-input" name="password" placeholder="SECURI-CLC">';
echo '<input type="submit" value="Connexion " name="submit" class="box-button">';
echo '<p class="box-register">NOUVEL UTILISATEUR ? <a href="register.php">INSCRIPTION</a></p>';

// Afficher le message d'erreur si nécessaire
if (!empty($message)) {
  echo '<p class="errorMessage">' . $message . '</p>';
}

echo '</form>';
echo '</body>';
echo '</html>';
?>
