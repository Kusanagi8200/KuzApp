<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KuzApp Web Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000; /* Body background black */
            color: #000000; /* Black text */
            padding: 20px;
        }
        .banner-title {
            background-color: #e65100; /* Orange banner */
            padding: 5px;
            border-radius: 8px;
            max-width: 800px;
            margin: 20px auto;
            color: #000000; /* Black text */
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .content {
            background-color: #ffff00; /* Yellow banner background around text */
            padding: 5px;
            border-radius: 8px;
            max-width: 800px;
            margin: 0 auto;
            color: #000000; /* Black text */
        }
        .footer-banner {
            background-color: #e65100; /* Orange banner */
            padding: 15px;
            border-radius: 8px;
            max-width: 800px;
            margin: 40px auto;
            text-align: center;
        }
        .footer-banner a {
            background-color: #ffffff;
            color: #000000;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .footer-banner a:hover {
            background-color: #ffcc00;
        }
        p, li {
            line-height: 1.6;
            color: #000000; /* Black text */
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            padding: 5px 0;
        }
    </style>
</head>
<body>

    <!-- Main Title -->
    <div class="banner-title">KuzApp Web Application</div>

    <!-- Subtitle -->
    <div class="banner-title">Linux System Administration Tools</div>

    <!-- Content Section with Yellow Banner -->
    <div class="content">
        <h3>System Maintenance Information and Diagnostic Script</h3>
        <p>The bash script provides an interface to execute a variety of sub-scripts that perform system cleaning, diagnostic, and network information tasks.</p>
        
        <!-- Features Banner -->
        <div class="banner-title">Features</div>

        <p>The script displays a menu with several options, each corresponding to a different sub-script:</p>
        <ul>
            <li>01 UPDATE-SCRIPT: Update the system.</li>
            <li>02 UPDATE-SCRIPT-FAST: Quick system update.</li>
            <li>03 UPDATE-SCRIPT-VM: Update specifically for virtual machines.</li>
            <li>04 UPDATE-SCRIPT-ENG: English version of the Update script.</li>
            <li>05 UPDATE-SCRIPT-FAST-ENG: English version of the quick Update script.</li>
            <li>06 BOOT-SEQUENCE-CHECK: Checks the boot sequence.</li>
            <li>07 CHECK-NETWORK: Diagnoses network problems.</li>
            <li>08 HARDWARE-INFOS: Displays hardware information.</li>
            <li>09 SYSTEM-INFOS: Displays system information.</li>
            <li>10 UPDATE-SCRIPT: No colors Update script.</li>
        </ul>

        <!-- Interactive Menu Banner -->
        <div class="banner-title">Interactive Menu</div>
        
        <p>The script uses a menu structure to allow the user to choose from the different options. Each option launches a different sub-script.</p>

        <!-- License Banner -->
        <div class="banner-title">License</div>

        <p>The script is distributed under the GNU General Public License, version 3 or later.</p>
    </div>

    <!-- Footer Banner with Return Button -->
    <div class="footer-banner">
        <a href="app.php">RETOUR</a>
    </div>

</body>
</html>
