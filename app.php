<!DOCTYPE html>
<html>
<head>
    <title>KuzApp - Version Beta 0.2-2025</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
	    background-color: black;
            color: white;
            margin: 0;
            padding: 0;
            background-image: url('https://192.168.124.187:8443/KuzApp/KuzApp-Fond.jpg'); /* Remplacez 'path_to_your_image.jpg' par le chemin réel de votre image */
            background-size: cover; /* L'image couvre toute la page */
            background-position: center; /* L'image est centrée */
            background-attachment: fixed; /* L'image reste fixe lors du défilement */
            padding-top: 60px; /* Ajustez cette valeur selon le besoin */
        }

        .top-banner {
            background-color: #E65100;
            color: black;
            text-align: center;
            padding: 5px 0;
            font-size: 30px;
            font-weight: bold;
            border-radius: 5px;
            margin-bottom: 20px;
            line-height: 1.2;
            width: 40%;
            margin: 0 auto 20px auto;
        }

        .top-banner a {
            color: black;
            text-decoration: none;
        }

        .top-banner a:hover {
            text-decoration: underline;
        }

        .sub-banner {
            background-color: orange;
            color: black;
            text-align: center;
            padding: 5px 0;
            font-size: 20px;
            font-weight: bold;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 40%;
            margin: 0 auto 20px auto;
        }
    
        .sub-banner2 {
            background-color: orange;
            color: black;
            text-align: center;
            padding: 5px 0;
            font-size: 20px;
            font-weight: bold;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 40%;
            margin: 0 auto 20px auto;
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
            text-align: left;
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

        .button-row {
            display: flex;
            justify-content: space-between;
            width: 40%;
            margin: 0 auto;
            gap: 10px;
            flex-wrap: wrap;
        }

        .button-row .btn {
            flex: 1; /* Répartition égale de l'espace */
            padding: 10px;
            background-color: #E65100;
            color: black;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .button-row .btn:hover {
            background-color: #FFD700;
        }

	.bottom-banner {
    	background-color: orange;
    	position: fixed;
    	bottom: 0;
    	left: 50%; /* Positionne à 50% de la largeur de la page */
    	transform: translateX(-50%); /* Déplace l'élément de 50% de sa propre largeur pour le centrer */
    	color: black;
    	text-align: center;
    	padding: 5px 0;
    	font-size: 16px;
    	font-weight: bold;
    	width: 40%; /* Garde la largeur de 40% */
    	border-radius: 5px;
	bottom: 90px;
	}

        .bottom-banner a {
            color: inherit;
            text-decoration: none;
        }

        .bottom-banner a:hover {
            text-decoration: underline;
        }
    </style>

</head>
<body>

    <!-- Bannière supérieure avec un lien vers GitHub -->
    <div class="top-banner">
        KuzApp Project - Version Beta 0.2-2025
    </div>

    <!-- Nouvelle bannière avec le texte demandé -->
    <div class="sub-banner">
        LINUX SYSTEM ADMINISTRATION TOOLS
    </div>

    <div class="button-container">
        <!-- Chaque bouton dans son propre formulaire pointant vers un script PHP spécifique -->
        <form action="README.php" method="post"><button class="button" type="submit">00 --> README.md</button></form>
        <form action="update-script.php" method="post"><button class="button" type="submit">01 -->  UPDATE-SCRIPT</button></form>
        <form action="update-script-fast.php" method="post"><button class="button" type="submit">02 -->  UPDATE-SCRIPT-FAST</button></form>
        <form action="update-script-vm.php" method="post"><button class="button" type="submit">03 -->  UPDATE-SCRIPT-VM</button></form>
        <form action="update-script.eng.php" method="post"><button class="button" type="submit">04 -->  UPDATE-SCRIPT-ENG</button></form>
        <form action="update-script-fast.eng.php" method="post"><button class="button" type="submit">05 -->  UPDATE-SCRIPT-FAST-ENG</button></form>
        <form action="boot-sequence-check.php" method="post"><button class="button" type="submit">06 -->  BOOT-SEQUENCE-CHECK</button></form>
        <form action="check-network.php" method="post"><button class="button" type="submit">07 -->  CHECK-NETWORK</button></form>
        <form action="system-infos.php" method="post"><button class="button" type="submit">08 -->  SYSTEM-INFOS</button></form>
        <form action="update-nocolors.php" method="post"><button class="button" type="submit">09 -->  UPDATE-NOCOLORS</button></form>
    </div>

<br>
<br>
    <!-- Nouvelle bannière avec le texte demandé -->
    <div class="sub-banner2">
        LOOK AT THE SCRIPT BEFORE RUN
    </div>

    <!-- Boutons indépendants en ligne, étalés sur la même largeur que les boutons du menu -->
    <div class="button-row">
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/update-script-view.php'">1</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/update-script-fast-view.php'">2</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/update-script-vm-view.php'">3</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/update-script.eng-view.php'">4</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/update-script-fast.eng-view.php'">5</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/boot-sequence-check-view.php'">6</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/check-network-view.php'">7</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/system-infos-view.php'">8</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/update-nocolors-view.php'">9</button>
        <button class="btn" onclick="location.href='#'">10</button>
    </div>

    <!-- Nouveau bandeau en bas de la page -->
    <div class="bottom-banner">
        <a href="login.php" target="_blank">LOG OUT</a>
    </div>

</body>
</html>
