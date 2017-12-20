<?php

include_once 'includes/database-conectie-inc.php';
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <title>inloggen_pagina</title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    </head>
    <body>
       <?php include_once 'includes/header-inc.php'; ?>
        <div class="container">
            <div class="grid_inloggen">
                <form class=inloggen-form action="includes/inloggen-inc.php" method="POST">
                    <input class="inlog-item" type="text" name="gebruikersnaam" placeholder="Email/Gebruikersnaam">
                    <input class="inlog-item" type="password" name="wachtwoord" placeholder="Wachtwoord">
                    <button class="inlog-item" type="submit" name="inloggen">Inloggen</button>
                </form>
                <form class=iregistreren-form action="registreren.php" method="POST">
                    <button class="inlog-item" type="submit" name="inloggen">Account aanmaken</button>
                </form>
            </div>
        </div>
        
        <?php include_once 'includes/footer-inc.php'; ?>
    </body>
</html>