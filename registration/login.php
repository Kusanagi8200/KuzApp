<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');
session_start();

if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: index.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<form class="box" action="" method="post" name="login">
<h1 class="box-logo box-title"><font color="#005CB9">CLINIQUE LE CHATELET</font></h1>
<h3 class="box-title"><center>BIENVENUE</center></h3>
<input type="text" class="box-input" name="username" placeholder="IDENTIFIANT">
<input type="password" class="box-input" name="password" placeholder="SECURI-CLC">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">NOUVEL UTILISATEUR ? <a href="register.php">INSCRIPTION</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>
