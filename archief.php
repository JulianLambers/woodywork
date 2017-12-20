<?php


include_once 'includes/database-conectie-inc.php';


$countsql = $pdo->prepare("SELECT COUNT(nieuwsID) as c FROM nieuws"); //count amount of items in portofolio
$countsql->execute();
$countrow = $countsql->fetch();
$count = $countrow["c"]; 


$nieuws = $pdo->prepare("SELECT * FROM nieuws ORDER BY nieuwsID DESC ");
$nieuws->execute();

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
            <?php
            $x=0;
            if($admin){ // check if admin
                print('<div class="archief">'
                    . '<div class="n0">'
                    .  '<a href="nieuwsbewerken.php?id=nieuw">'  
                    . 'nieuw'  
                    . '</a>'
                    . '</div>');
                $count++;
                $x=1;
            }
            for($i = $x; $i<$count;$i++){
                
                if($i%2==0){
                    print('<div class="archief">'); //container div voor elke drie divjes
                }
                
                

                //haal hier spul uit de database
                $row = $nieuws->fetch();
                //print de inhoud van het divje
                print(
                            '<div class="n'.($i%2).'">'
                                . '<h3>'.$row[1].'</h3>'
                                . '<p>'.$row[2].'</p>'
                                . '<p>'.$row[3].'</p>');
                if(isset($_SESSION['acc_id'])){//check if admin
                    print(
                             '<a href="nieuwsbewerken.php?id='.$row[0].'">'  
                            . 'bewerken'  
                            . '</a>');
                }
                
                print('</div>');
                if($i%2==1||$i==$count-1){ // sluit container div af na twee divjes of na de laatste div
                    
                    print('</div>');
                }
                
                
            }
            ?>
        </div>
        <?php include_once 'includes/footer-inc.php'; ?>
    </body>
</html>
