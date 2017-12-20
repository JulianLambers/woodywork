<?php

include_once 'includes/database-conectie-inc.php';

if($admin){//check if admin
        if(isset($_POST["update"])){
            $nieuws = $pdo->prepare('UPDATE nieuws SET titel = ?, tekst = ?, datum = ? WHERE nieuwsID=?');
            $nieuws->execute(array($_POST["titel"],$_POST["tekst"],$_POST["datum"],$_GET["id"]));
            header( "Location: archief.php" );
        }
        if(isset($_POST["insert"])){
            $nieuws = $pdo->prepare("INSERT INTO nieuws (titel, tekst, datum)VALUES (?,?,?)");
            $nieuws->execute(array($_POST["titel"],$_POST["tekst"],$_POST["datum"]));
            header( "Location: archief.php" );
        }
        if(isset($_POST["delete"])){
            $nieuws = $pdo->prepare('DELETE FROM nieuws WHERE nieuwsID=?');
            $nieuws->execute(array($_GET["id"]));
            header( "Location: archief.php" );
        }
}

?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <title>home_page</title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <?php include_once 'includes/header-inc.php'; ?>
        <div class="container">
            <div class="nieuwsbewerkengrid">
                <div class="nb0">
            <?php
                if($admin){ // check if admin
                    if($_GET["id"]=="nieuw"){ //check nieuw of bewerken
                        print(
                              '<form action="nieuwsbewerken.php?id='.$_GET["id"].'" method="post">'
                            . '<label for="titel">titel:</label><input type="text"  id="titel" name="titel"><br>'
                            . '<label for="tekst">tekst:</label><textarea name="tekst"  id="tekst">Enter text here...</textarea><br>'
                            . '<label for="datum">datum:</label><input type="text" name="datum"  id="datum" value="'.date('d').'-'.date('m').'-'.date('y').'"><br>'  
                            . '<label></label><input type="submit" name="insert" value="opslaan">'  
                            . '</form>');
                        } else {
                            $nieuws = $pdo->prepare("SELECT * FROM nieuws WHERE nieuwsID =".$_GET["id"]);
                            $nieuws->execute();
                            $row=$nieuws->fetch();

                            print(
                              '<form action="nieuwsbewerken.php?id='.$_GET["id"].'" method="post">'
                            . '<label for="titel">titel:</label><input type="text"  id="titel" name="titel" value="'.$row[1].'"><br>'
                            . '<label for="tekst">tekst:</label><textarea name="tekst"  id="tekst">'.$row[2].'</textarea><br>'
                            . '<label for="datum">datum:</label><input type="text" name="datum"  id="datum"  value="'.$row[3].'"><br>'  
                            . '<label></label><input type="submit" name="update" value="opslaan">'  
                            . '<input type="submit" name="delete" value="verwijderen"  onclick="return confirm(\'Weet je zeker dat je dit item wilt verwijderen?\'");">' 
                            . '</form>');
                        }
                    } else {
                    print('<p>je moet eerst inloggen</p>');
                    }
            
            ?>
                </div>
            </div>
        </div>
        <<?php include_once 'includes/footer-inc.php'; ?>
    </body>
</html>
