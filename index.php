<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="style.css" />
  </head>
  <body>

<br>

    <div class="sucess">
    <h1><font color="#3B418A">BIENVENUE  nathanael</font></h1>
    </div>

<br><br>
  <h2>
 <p align="center">CONSULTATION DES FICHES PATIENTS</p>
</h2>

<br>
  <h3>
  <div align="center">
  <form>
      <label for="mySearch">Rechercher par :</label>
      <input type="search" id="mySearch" name="q"
      placeholder="Nom Prenom" required
      size="30" pattern="[A-z]">
      <button>OK</button>
      <span class="validity"></span>
  </form></div>
  </h3>

  <h3>
   <div align="center">
   <form>
      <label for="mySearch">Rechercher par :</label>
      <input type="search" id="mySearch" name="q"
      placeholder="Code Clinique Le Chatelet" required
      size="30" pattern="[A-z]{2}[0-9]{4}">
      <button>OK</button>
      <span class="validity"></span>
  </form></div>
  </h3>

<br><br><br>
<div class="sucess">
    <h3><font color="#800080"><mark>Par sécurité, merci de vous déconnecter à la fin de votre recherche.<mark></font></h3>
    <h2>
    <a href="logout.php">SORTIR</a>
    </h2>
    </div>

  </body>
</html>
