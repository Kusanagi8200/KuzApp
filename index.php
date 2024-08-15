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

        .button {
            display: block;
            width: 40%;
            padding: 10px;
            margin-bottom: 10px;
            margin-left: auto;
            margin-right: auto;
            background-color: #E65100; /* Couleur de fond des boutons */
            color: black; /* Couleur du texte des boutons */
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049; /* Couleur au survol des boutons */
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
            margin-bottom: 20px;
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

    <div class="button-container">
        <!-- Chaque bouton dans son propre formulaire pointant vers un script PHP spécifique -->
	<form action="test-shell.php" method="post"><button class="button" type="submit">TEST</button></form>
	<form action="boot-sequence-check.php" method="post"><button class="button" type="submit">VÉRIFICATION DE LA SÉQUENCE DE DÉMARRAGE</button></form>
        <form action="system-infos.php" method="post"><button class="button" type="submit">INFORMATIONS SYSTÈME</button></form>
	<form action="check-network.php" method="post"><button class="button" type="submit">VÉRIFICATION DU RÉSEAU</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">MISE À JOUR DU SCRIPT VM</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">AUTRE SCRIPT</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">AUTRE SCRIPT</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">AUTRE SCRIPT</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">AUTRE SCRIPT</button></form>
    </div>

	<!-- Nouveau bandeau en bas de la page -->
	<div class="bottom-banner">
    <strong>
        <a href="https://github.com/Kusanagi8200" target="_blank">https://github.com/Kusanagi8200</a>
    </strong>
    </div>
</body>
</html>
