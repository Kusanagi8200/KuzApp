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
            font-size: 24px; /* Taille de la police pour rendre le texte visible */
            width: 100%; /* S'étend sur toute la largeur */
        }

	.highlight {
    	background-color: orange; /* Couleur de fond orange */
    	color: black;           /* Texte en noir */
    	padding: 5px;           /* Ajoute un peu de padding autour du texte */
	text-align: center;       /* Centre le texte horizontalement */
	}

    </style>
</head>
<body>
    <!-- Bandeau en haut de la page -->
    <div class="top-banner"><strong>KUSAPP / 2024 - UPDATE INFOS APPLICATION</strong></div>
         <h2 class="highlight"<strong>MAINTENANCE SCRIPT FOR LINUX SYSTEM</strong></h2>
    <div class="button-container">
        <!-- Chaque bouton dans son propre formulaire pointant vers un script PHP spécifique -->
	<form action="test-shell.php" method="post" target="_blank"><button class="button" type="submit">TEST</button></form>
        <form action="update-script-fast.php" method="post"><button class="button" type="submit">UPDATE-SCRIPT-FAST</button></form>
        <form action="update-script-vm.php" method="post"><button class="button" type="submit">UPDATE-SCRIPT-VM</button></form>
        <form action="update-script-eng.php" method="post"><button class="button" type="submit">UPDATE-SCRIPT-ENG</button></form>
        <form action="update-script-fast-eng.php" method="post"><button class="button" type="submit">UPDATE-SCRIPT-FAST-ENG</button></form>
        <form action="boot-sequence-check.php" method="post"><button class="button" type="submit">BOOT-SEQUENCE-CHECK</button></form>
        <form action="check-network.php" method="post"><button class="button" type="submit">CHECK-NETWORK</button></form>
        <form action="hardware-infos.php" method="post"><button class="button" type="submit">HARDWARE-INFOS</button></form>
        <form action="system-infos.php" method="post"><button class="button" type="submit">SYSTEM-INFOS</button></form>
        <form action="update-nocolors.php" method="post"><button class="button" type="submit">UPDATE-NOCOLORS</button></form>
    </div>
</body>
</html>
