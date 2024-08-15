<!DOCTYPE html>
<html>
<head>
    <title>KUSAPP / 2024</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .button {
            display: block;
            width: 40%; /* Ajustez la largeur si nécessaire */
            padding: 10px;
            margin-bottom: 10px; /* Espace entre les boutons */
            margin-left: auto; /* Centrer le bouton horizontalement */
            margin-right: auto; /* Centrer le bouton horizontalement */
            background-color: #E65100; /* Couleur de fond */
            color: black; /* Couleur du texte */
            text-align: center;
            font-size: 16px;
            font-weight: bold; /* Rendre le texte en gras */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #45a049; /* Couleur de fond au survol */
        }
        /* Centrer le conteneur de boutons pour un alignement esthétique */
        .button-container {
            text-align: center; /* Aligner les boutons centrés dans leur conteneur */
            width: 100%; /* Prend la largeur complète du conteneur parent pour une meilleure gestion de l'espace */
        }
        /* Style pour le bandeau en haut de la page */
        .top-banner {
            background-color: orange; /* Couleur de fond orange */
            color: black; /* Texte en noir */
            text-align: center; /* Centrer le texte */
            padding: 10px 0; /* Padding vertical pour un peu d'espace */
            font-size: 25px; /* Taille de la police pour rendre le texte visible */
            width: 100%; /* S'étend sur toute la largeur */
        }

	.bottom-banner {
    	background-color: orange; /* Couleur de fond orange */
	position: fixed; /* Fixe le bandeau au bas de la fenêtre */
    	bottom: 0; /* Positionne le bandeau tout en bas */
    	left: 0; /* Align�gauche */
    	color: black; /* Texte en noir */
    	text-align: center; /* Centrer le texte */
    	padding: 10px 0; /* Padding vertical pour un peu d'espace */
    	font-size: 15px; /* Taille de la police pour rendre le texte visible */
    	width: 100%; /* S'étend sur toute la largeur */
	}
	
	.bottom-banner a {
    	color: inherit; /* Herite la couleur du parent, ici noir */
    	text-decoration: none; /* Supprime le soulignement par defaut des liens */
	}

	.bottom-banner a:hover {
    	text-decoration: underline; /* Ajoute un soulignement au survol pour indiquer qu'il s'agit d'un lien */
	}

	.highlight {
    	background-color: orange; /* Couleur de fond orange */
    	color: black;           /* Texte en noir */
    	padding: 5px;           /* Ajoute un peu de padding autour du texte */
	text-align: center;       /* Centre le texte horizontalement */
	}

    </style>

<!-- Matomo -->
<script>
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
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
<!-- End Matomo Code -->

</head>
<body>
    <!-- Bandeau en haut de la page -->
    <div class="top-banner"><strong>KUSAPP / 2024 - UPDATE INFOS APPLICATION</strong></div>
         <h2 class="highlight"<strong>MAINTENANCE SCRIPT FOR LINUX SYSTEM</strong></h2>
    <div class="button-container">
        <!-- Chaque bouton dans son propre formulaire pointant vers un script PHP spécifique -->
	<form action="test-shell.php" method="post"><button class="button" type="submit">TEST</button></form>
	<form action="boot-sequence-check.php" method="post"><button class="button" type="submit">BOOT-SEQUENCE-CHECK</button></form>
        <form action="system-infos.php" method="post"><button class="button" type="submit">SYSTEM-INFOS</button></form>
	<form action="check-network.php" method="post"><button class="button" type="submit">CHECK-NETWORK</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">UPDATE-SCRIPT-VM</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">ANOTHER SCRIPT</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">ANOTHER SCRIPT</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">ANOTHER SCRIPT</button></form>
	<form action="update-script-vm.php" method="post"><button class="button" type="submit">ANOTHER SCRIPT</button></form>
    </div>
	<!-- Nouveau bandeau en bas de la page -->
	<div class="bottom-banner">
    <strong>
        <a href="https://github.com/Kusanagi8200" target="_blank">https://github.com/Kusanagi8200</a>
    </strong>
    </div>
</body>
</html>
