<?php
  // Initialize the session
  session_start();

  // Destroy the session
  if(session_destroy())
  {
    // Redirect to the login page
    header("Location: login.php");
  }
?>
