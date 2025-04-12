<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style2.css" />
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
  // retrieve the username and remove backslashes added by the form
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  // retrieve the email and remove backslashes added by the form
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // retrieve the password and remove backslashes added by the form
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  // SQL query + password hashing
  $query = "INSERT into `users` (username, email, password)
            VALUES ('$username', '$email', '".hash('sha256', $password)."')";
  // Execute the query on the database
  $res = mysqli_query($conn, $query);
  if($res){
     echo "<div class='success'>
           <h3>ACCOUNT CREATED</h3>
           <p><a href='login.php'>LOGIN</a></p>
     </div>";
  }
}else{
?>
<form class="box" action="" method="post">
  <h1 class="box-logo box-title"><font color="#000000">KUZAPP</font></h1>
  <h3 class="box-title"><center><font color="#000000">SIGN UP</font></center></h3>
  <input type="text" class="box-input" name="username" placeholder="LOGIN" required />
  <input type="text" class="box-input" name="email" placeholder="EMAIL" required />
  <input type="password" class="box-input" name="password" placeholder="PASSWORD" required />
  <input type="submit" name="submit" value="ACTIVATE" class="box-button" />
</form>
<?php } ?>
</body>
</html>
