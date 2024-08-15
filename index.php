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
            text-align: left;
            padding: 20px 0; /* Espacement intérieur augmenté pour l'ASCII */
            font-size: 20px;
            border-radius: 10px;
            margin-bottom: 20px; /* Espace en dessous de la bannière */
        }

        .ascii-art-top-left {
            font-family: 'Courier New', monospace;
            white-space: pre; /* Respecter les espaces dans le texte */
            color: black; /* Couleur du texte noir */
            margin: 0;
            line-height: 1; /* Supprimer l'espace entre les lignes */
        }

        .ascii-art-highlight {
            background-color: #ffc107;
            color: black;
            padding: 2px 5px;
            display: inline-block; /* S'assurer que le texte reste en ligne avec le bloc */
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

    <!-- Bannière supérieure avec ASCII art en noir et collé -->
    <div class="top-banner">
        <div class="ascii-art-top-left">
            █▄▀ █ █ ▀█▀ ▄▀▄ █▀▄ █▀▄ | Made by Kusanagi8200
            █ █ ▀▄█ █▄▄ █▀█ █▀  █▀  | <a href="https://github.com/Kusanagi8200" target="_blank" style="color: black;">https://github.com/Kusanagi8200</a>
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
