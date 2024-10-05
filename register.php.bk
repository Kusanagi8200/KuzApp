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
             <h3>ACOUNT CREATED</h3>
             <p>BACK TO LOGIN -->  <a href='login.php'>GO</a></p>
       </div>";
   }
}else{
?>
<form class="box" action="" method="post">
  <h1 class="box-logo box-title"><font color="#000000">KUZAPP</font></h1>
    <h3 class="box-title"><center>SIGN UP</center></h3>
  <input type="text" class="box-input" name="username" placeholder="LOGIN" required />
    <input type="text" class="box-input" name="email" placeholder="EMAIL" required />
    <input type="password" class="box-input" name="password" placeholder="PASSWORD" required />
    <input type="submit" name="submit" value="ACTIVATE" class="box-button" />
</form>
<?php } ?>
</body>
</html>
