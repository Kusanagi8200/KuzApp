<?php
require('config.php');
session_start();

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Handle form submission
if (isset($_POST['username'])) {
    // Escape user input
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);

    // SQL query to verify the user
    $query = "SELECT * FROM `users` WHERE username='$username' AND password='" . hash('sha256', $password) . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $_SESSION['username'] = $username;
        header("Location: app.php");
    } else {
        $message = "ERROR --> WRONG LOGIN OR PASSWORD";
    }
}

// Display the form
echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '  <link rel="stylesheet" href="style2.css" />';
echo '</head>';
echo '<body>';


echo '<div class="banner">KuzApp Project - Beta Version 0.2-2025</div>';
echo '<form class="box" action="" method="post" name="login">';
echo '<h1 class="box-logo box-title"><font color="#000000">KUZAPP</font></h1>';
echo '<h3 class="box-title"><center><font color="#000000">WELCOME</font></center></h3>';
echo '<input type="text" class="box-input" name="username" placeholder="LOGIN">';
echo '<input type="password" class="box-input" name="password" placeholder="PASSWORD">';
echo '<input type="submit" value="LOGIN" name="submit" class="box-button">';
echo '<p class="box-register">NEW USER ---> <a href="register.php"> SIGN UP HERE</a></p>';

// Display error message if needed
if (!empty($message)) {
    echo '<p class="errorMessage">' . $message . '</p>';
}

echo '</form>';


echo '<div class="banner-bottom">LINUX SYSTEM ADMINISTRATION TOOLS</div>';
echo '</body>';
echo '</html>';
?>
