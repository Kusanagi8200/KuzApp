<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style2.css" />
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    }
}else{
?>
<form class="box" action="" method="post">
  <h1 class="box-logo box-title"><font color="#005CB9">CLINIQUE LE CHATELET</font></h1>
    <h3 class="box-title"><center>CRÉEZ VOTRE COMPTE</center></h3>
  <input type="text" class="box-input" name="username" placeholder="IDENTIFIANT" required />
    <input type="text" class="box-input" name="email" placeholder="EMAIL" required />
    <input type="password" class="box-input" name="password" placeholder="SECURI-CLC" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">DÉJA INSCRIT ? <a href="login.php"> CONNEXION</a></p>
</form>
<?php } ?>
</body>
</html>
