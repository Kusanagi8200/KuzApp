<!DOCTYPE html>
<html>
<head>
    <title>KuzApp / 2024</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: black; /* Couleur de fond noir */
            color: white; /* Couleur du texte par défaut en blanc pour un bon contraste */
            margin: 0;
            padding: 0;
        }

        .top-banner {
            background-color: #E65100; /* Couleur d'arrière-plan du bandeau supérieur (orange) */
            color: black; /* Couleur du texte noir */
            text-align: center;
            padding: 20px 0; /* Espacement intérieur augmenté pour l'image */
            font-size: 20px;
            border-radius: 10px;
            margin-bottom: 20px; /* Espace en dessous de la bannière */
        }

	.banner-image {
            max-width: 100%; /* L'image ne dépassera pas la largeur de la bannière */
            max-height: 150px; /* Taille maximale de l'image définie à 150px en hauteur */
            height: auto; /* Maintenir les proportions de l'image */
        }

        .button {
            display: block;
            width: 40%;
            padding: 10px;
            margin-bottom: 10px;
            margin-left: auto;
            margin-right: auto;
            background-color: #E65100;
            color: black;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }

        .button-container {
            text-align: center;
            width: 100%;
        }

        .bottom-banner {
            background-color: orange;
            position: fixed;
            bottom: 0;
            left: 0;
            color: black;
            text-align: center;
            padding: 10px 0;
            font-size: 15px;
            width: 100%;
            border-radius: 10px;
        }

        .bottom-banner a {
            color: inherit;
            text-decoration: none;
        }

        .bottom-banner a:hover {
            text-decoration: underline;
        }
    </style>

<!-- Matomo -->
<script>
  var _paq = window._paq = window._paq || [];
  /* Les méthodes de suivi comme "setCustomDimension" doivent être appelées avant "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//192.168.201.137:8444/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- Fin du code Matomo -->

</head>
<body>

    <!-- Bannière supérieure avec une image -->
    <div class="top-banner">
    <img src="kuzapp-logo.png" alt="Kuzapp.v0.1" class="banner-image">
    </div>

    <div class="button-container">
        <!-- Chaque bouton dans son propre formulaire pointant vers un script PHP spécifique -->
	<form action="README.php" method="post"><button class="button" type="submit">README</button></form>
	<form action="update-script.php" method="post"><button class="button" type="submit">01 -->  UPDATE-SCRIPT ..............//</button></form>
        <form action="update-script-fast.php" method="post"><button class="button" type="submit">02 -->  UPDATE-SCRIPT-FAST .........//</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">03 -->  UPDATE-SCRIPT-VM ...........//</button></form>
	<form action="update-script.eng.php" method="post"><button class="button" type="submit">04 -->  UPDATE-SCRIPT-ENG ..........//</button></form>
	<form action="update-script-fast.eng.php" method="post"><button class="button" type="submit">05 -->  UPDATE-SCRIPT-FAST-ENG .....//</button></form>
	<form action="boot-sequence-check.php" method="post"><button class="button" type="submit">06 -->  BOOT-SEQUENCE-CHECK ........//</button></form>
	<form action="check-network.php" method="post"><button class="button" type="submit">07 -->  CHECK-NETWORK ..............//</button></form>
	<form action="system-infos.php" method="post"><button class="button" type="submit">09 -->  SYSTEM-INFOS ...............//</button></form>
	<form action="update-nocolors.php" method="post"><button class="button" type="submit">10 -->  UPDATE-NOCOLORS ............//</button></form>
    </div>

	<!-- Nouveau bandeau en bas de la page -->
	<div class="bottom-banner">
    <strong>
        <a href="" target="_blank">The script is distributed under the GNU General Public License, version 3 or later.</a>
    </strong>
    </div>
</body>
</html>
