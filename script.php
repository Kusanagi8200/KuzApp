<?php
// Fonction pour exécuter les scripts
function executeScript($scriptName) {
    // Vérifiez que le nom du script est valide pour éviter les exécutions de commandes arbitraires
    $allowedScripts = [
        'update-script' => 'sh update-script.sh',
        'update-script-fast' => 'sh update-script-fast.sh',
        'update-script-vm' => 'sh update-script-vm.sh',
        'update-script-eng' => 'sh update-script-eng.sh',
        'update-script-fast-eng' => 'sh update-script-fast-eng.sh',
        'boot-sequence-check' => 'sh boot-sequence-check.sh',
        'check-network' => 'sh check-network.sh',
        'hardware-infos' => 'sh hardware-infos.sh',
        'system-infos' => 'sh system-infos.sh',
        'update-nocolors' => 'sh update-nocolors.sh',
    ];

    if (array_key_exists($scriptName, $allowedScripts)) {
        $output = shell_exec($allowedScripts[$scriptName]);
        echo "<pre>$output</pre>";
    } else {
        echo "Action non autorisée.";
    }
}

// Vérifier si un bouton a été cliqué
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"])) {
        executeScript($_POST["action"]);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Kusanagi8200 / 2024</title>
    <link rel="stylesheet" href="styles.css">

   <style>
        .align-left {
            text-align: left;
            padding-left: 10px; /* Ajustez cette valeur selon vos besoins */
        }

        button:active {
            background-color: blue;
        }

        /* Style supplémentaire pour les boutons pour démonstration */
        button {
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Transition pour un effet visuel doux */
        }

        .button-selected {
             background-color: orange;
        }

    </style>

</head>


<body>
    <h2>UPDATE INFOS APPLICATION</h2>
<form method="post">
    <ul style="list-style-type: none; padding: 0;">
        <li style="margin-bottom: 10px;"><button type="submit" name="action" value="update-script" class="align-left">01 --> UPDATE-SCRIPT</button></li>
        <li style="margin-bottom: 10px;"><button type="submit" name="action" value="update-script-fast" class="align-left">02 --> UPDATE-SCRIPT-FAST</button></li>
        <li style="margin-bottom: 10px;"><button type="submit" name="action" value="update-script-vm" class="align-left">03 --> UPDATE-SCRIPT-VM</button></li>
        <li style="margin-bottom: 10px;"><button type="submit" name="action" value="update-script-eng" class="align-left">04 --> UPDATE-SCRIPT-ENG</button></li>
        <li style="margin-bottom: 10px;"><button type="submit" name="action" value="update-script-fast-eng" id="longest-button" class="align-left">05 --> UPDATE-SCRIPT-FAST-ENG</button>
        <li style="margin-bottom: 10px;"><button type="submit" name="action" value="boot-sequence-check" class="align-left">06 --> BOOT-SEQUENCE-CHECK</button></li>
        <li style="margin-bottom: 10px;"><button type="submit" name="action" value="check-network" class="align-left">07 --> CHECK-NETWORK</button></li>
        <li style="margin-bottom: 10px;"><button type="submit" name="action" value="hardware-infos" class="align-left">08 --> HARDWARE-INFOS</button></li>
        <li style="margin-bottom: 10px;"><button type="submit" name="action" value="system-infos" class="align-left">09 --> SYSTEM-INFOS</button></li>
        <li style="margin-bottom: 10px;"><button type="submit" name="action" value="update-nocolors" class="align-left">10 --> UPDATE-NOCOLORS</button></li>
    </ul>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var longestButtonWidth = document.getElementById('longest-button').offsetWidth; // Obtenez la largeur du bouton le plus long
    var buttons = document.querySelectorAll('form ul li button'); // Sélectionnez tous les boutons

    // Définissez la largeur de chaque bouton pour correspondre à celle du plus long
    buttons.forEach(function(button) {
        button.style.width = longestButtonWidth + 'px';
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('button');
    
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Optionnel: retirez la classe de tous avant d'ajouter au cliqué
            buttons.forEach(btn => btn.classList.remove('button-selected'));
            
            button.classList.add('button-selected');
        });
    });
});
</script>

</body>
</html>
