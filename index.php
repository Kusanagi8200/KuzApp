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

        .ascii-art-top-center {
            font-family: 'Courier New', monospace;
            white-space: pre; /* Respecter les espaces dans le texte */
            color: #ffcc00; /* Couleur du texte (orange) */
            padding: 10px;
            background-color: black; /* Fond noir autour de l'ASCII */
            text-align: left; /* Aligner à gauche dans le bloc */
            margin-left: auto;
            margin-right: auto;
        }

        .ascii-art-block {
            display: inline-block; /* Assurer que l'ASCII art reste en bloc */
            margin: 0;
            text-align: left;
        }

        .ascii-art-center {
            text-align: center; /* Centrer les autres éléments */
            margin-top: 20px;
        }

        .ascii-art-highlight {
            background-color: #ffc107;
            color: black;
            padding: 2px 5px;
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

        .highlight {
            background-color: orange;
            color: black;
            padding: 5px;
            text-align: center;
        }

        .ascii-art {
            font-family: 'Courier New', monospace;
            white-space: pre;
            text-align: left;
            color: black;
            background-color: orange;
            border-radius: 10px;
            margin: 20px 0;
        }

        .top-banner {
            background-color: #E65100; /* Couleur d'arrière-plan du bandeau supérieur */
            color: black; /* Couleur du texte du bandeau supérieur */
            text-align: center;
            padding: 10px 0;
            font-size: 20px;
            border-radius: 10px;
            margin-bottom: 0; /* Pas d'espace en dessous de la bannière */
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

    <div class="top-banner">
    <strong>SCRIPT DE MAINTENANCE SYSTÈME LINUX</strong>
    </div>

    <!-- Ajout de l'art ASCII en un seul bloc -->
    <div class="ascii-art-top-center">
        <div class="ascii-art-block">
            █▄▀ █ █ ▀█▀ ▄▀▄ █▀▄ █▀▄ | Made by Kusanagi8200
            █ █ ▀▄█ █▄▄ █▀█ █▀  █▀  
        </div>
        <div class="ascii-art-center">
            <span class="ascii-art-highlight"> Bash Script Collection for Linux Administration Systems </span>
        </div>
    </div>

    <div class="button-container">
        <!-- Chaque bouton dans son propre formulaire pointant vers un script PHP spécifique -->
	<form action="test-shell.php" method="post"><button class="button" type="submit">README</button></form>
	<form action="boot-sequence-check.php" method="post"><button class="button" type="submit">01 -->  UPDATE-SCRIPT ..............//</button></form>
        <form action="system-infos.php" method="post"><button class="button" type="submit">02 -->  UPDATE-SCRIPT-FAST .........//</button></form>
	<form action="check-network.php" method="post"><button class="button" type="submit">03 -->  UPDATE-SCRIPT-VM ...........//</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">04 -->  UPDATE-SCRIPT-ENG ..........//</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">05 -->  UPDATE-SCRIPT-FAST-ENG .....//</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">06 -->  BOOT-SEQUENCE-CHECK ........//</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">07 -->  CHECK-NETWORK ..............//</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">09 -->  SYSTEM-INFOS ...............//</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">10 -->  UPDATE-NOCOLORS ............//</button></form>
    </div>

	<!-- Nouveau bandeau en bas de la page -->
	<div class="bottom-banner">
    <strong>
        <a href="https://github.com/Kusanagi8200" target="_blank">https://github.com/Kusanagi8200</a>
    </strong>
    </div>
</body>
</html>
