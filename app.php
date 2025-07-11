<!DOCTYPE html>
<html>
<head>
    <title>KuzApp - Beta 0.2-2025</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: black;
            color: white;
            padding-top: 60px; 
            padding-bottom: 60px;
            overflow: hidden;
        }

        .background-container {
            position: fixed; 
            top: 5px; 
            left: 5px; 
            right: 5px; 
            bottom: 5px; 
            background-image: url('KuzApp-Fond.jpg');
            background-size: cover; 
            background-position: center; 
            background-attachment: fixed; 
            border-radius: 20px; 
            z-index: -1; 
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
            border: 3px solid black;
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
            border: 3px solid black;
        }

        .sub-banner2 {
            background-color: orange;
            color: black;
            text-align: center;
            padding: 5px 0;
            font-size: 20px;
            font-weight: bold;
            border-radius: 5px;
            border: 3px solid black;
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
            border: 3px solid black;
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
            flex: 1; 
            padding: 10px;
            background-color: #E65100;
            color: black;
            font-size: 16px;
            font-weight: bold;
            border: 3px solid black;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .button-row .btn:hover {
            background-color: #FFD700;
        }

        .bottom-banner {
            background-color: orange;
            margin-top: 30px; 
            position: relative; 
            bottom: 0;
            left: 50%; 
            transform: translateX(-50%); 
            color: black;
            text-align: center;
            padding: 5px 0;
            font-size: 16px;
            font-weight: bold;
            width: 40%; 
            border-radius: 5px;
	    border: 3px solid black;
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

    <div class="background-container"></div> 

    <div class="top-banner">
        KuzApp Project - Version Beta 0.2-2025
    </div>
    
    <div class="sub-banner">
        LINUX SYSTEM ADMINISTRATION TOOLS
    </div>

    <div class="button-container">
        
        <form action="README.php" method="post"><button class="button" type="submit">00 --> README.md</button></form>
        <form action="/kuzapp-script-php/boot-sequence-check.php" method="post"><button class="button" type="submit">01 -->  BOOT-SEQUENCE</button></form>
        <form action="/kuzapp-script-php/system-infos.php" method="post"><button class="button" type="submit">02 -->  SYSTEM-INFOS</button></form>
        <form action="/kuzapp-script-php/check-network.php" method="post"><button class="button" type="submit">03 -->  CHECK-NETWORK</button></form>
        <form action="/kuzapp-script-php/harware-infos.php" method="post"><button class="button" type="submit">04 -->  HARDWARE-INFOS</button></form>
        <form action="/kuzapp-script-php/update-script.php" method="post"><button class="button" type="submit">05 -->  UPDATE-SCRIPT</button></form>
        <form action="/kuzapp-script-php/update-script.eng.php" method="post"><button class="button" type="submit">06 -->   UPDATE-SCRIPT-ENG</button></form>
        <form action="/kuzapp-script-php/update-script-vm.php" method="post"><button class="button" type="submit">07 -->   UPDATE-SCRIPT-VM</button></form>
        <form action="/kuzapp-script-php/update-script-fast.php" method="post"><button class="button" type="submit">08 -->   UPDATE-SCRIPT-FAST</button></form>
        <form action="/kuzapp-script-php/update-script-fast.eng.php" method="post"><button class="button" type="submit">09 -->  UPDATE-SCRIPT-FAST-ENG</button></form>
        <form action="/kuzapp-script-php/update-nocolors.php" method="post"><button class="button" type="submit">10 -->  UPDATE-NOCOLORS</button></form>   
    </div>

    <br>
    <br>
  
    <div class="sub-banner2">
        LOOK AT THE SCRIPT BEFORE RUN
    </div>

    <div class="button-row">
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/boot-sequence-check-view.php'">1</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/system-infos-view.php'">2</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/check-network-view.php'">3</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/harware-infos-view.php'">4</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/update-script-view.php'">5</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/update-script.eng-view.php'">6</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/update-script-vm-view.php'">7</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/update-script-fast-view.php'">8</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/update-script-fast.eng-view.php'">9</button>
        <button class="btn" onclick="location.href='/kuzapp-script-in-txt/update-nocolors-view.php'">10</button>
    </div>

    <div class="bottom-banner">
        <a href="login.php" target="_blank">LOG OUT</a>
    </div>

</body>
</html>
