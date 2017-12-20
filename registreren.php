<?php include_once 'includes/database-conectie-inc.php'; ?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <title>registreren_pagina</title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <?php include_once 'includes/header-inc.php'; ?>
        <div class="container">
            <div class="grid_registreren">
                <form class="registreren-form" action="includes/registreren-inc.php" method="POST">
                    <div class="container-item"><input onblur="onValidateEmail()" id="email" class="reg-item" type="email" name="email" placeholder="Email">
                        <i id="checkmark-email" class="checkmark icon fa fa-check fa-2x" aria-hidden="true"></i>
                        <i id="cross-email" class="cross icon fa fa-times fa-2x" aria-hidden="true"></i></div>
                    <div class="container-item"><input onblur="onValidateGebruikersnaam()" id="gebruikersnaam" class="reg-item" type="text" name="gebruikersnaam" placeholder="Gebruikersnaam">
                        <i id="checkmark-gebruikersnaam" class="checkmark icon fa fa-check fa-2x" aria-hidden="true"></i>
                        <i id="cross-gebruikersnaam" class="cross icon fa fa-times fa-2x" aria-hidden="true"></i></div>
                        <div id="error_text_beschikbaar" class="error2">gebruikersnaam is niet beschikbaar</div>
                        <div id="error_text_alfanr" class="error3">gebruikersnaam mag alleen bestaan uit alfanumerieke tekens</div>
                        <div id="error_text_length" class="error3">gebruikersnaam moet minimaal 3 karakters bevatten</div>
                    <div class="container-item"><input onblur="onValidateWachtwoord()" id="wachtwoord" class="reg-item" type="password" name="wachtwoord" placeholder="Wachtwoord">
                        <i id="checkmark-wachtwoord" class="checkmark icon fa fa-check fa-2x" aria-hidden="true"></i>
                        <i id="cross-wachtwoord" class="cross icon fa fa-times fa-2x" aria-hidden="true"></i></div>
                        <div id="error_text" class="error2">wachtwoord moet minimaal 7 karakters bevatten</div>
                        <div id="error_text2" class="error3">wachtwoord moet minimaal 1 niet-alfanumeriek teken bevatten</div>
                    <div class="container-item"><input onblur="onValidateWachtwoord2()" id="wachtwoord2" class="reg-item" type="password" name="wachtwoord2" placeholder="Herhaal wachtwoord">
                        <i id="checkmark-wachtwoord2" class="checkmark icon fa fa-check fa-2x" aria-hidden="true"></i>
                        <i id="cross-wachtwoord2" class="cross icon fa fa-times fa-2x" aria-hidden="true"></i></div>
                        <div id="error_text3" class="error2">wachtwoord moet minimaal 7 karakters bevatten</div>
                        <div id="error_text4" class="error3">wachtwoord moet minimaal 1 niet-alfanumeriek teken bevatten</div>
                        <div id="error_text_equal2" class="error3">wachtwoorden zijn niet gelijk</div>
                    <button class="reg-item" onclick="fRegistreren()" type="submit" name="registreren">Account aanmaken</button>
                </form>
            </div>
        </div>
       <?php include_once 'includes/footer-inc.php'; ?>
        <script src="scripts/checkmarks-inc.js"></script>
    </body>
</html>