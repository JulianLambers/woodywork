<?php


include_once 'includes/database-conectie-inc.php';

$countsql = $pdo->prepare("SELECT COUNT(productID) as c FROM product"); //count amount of items in portofolio
$countsql->execute();
$countrow = $countsql->fetch();
$count = $countrow["c"]; 


//inhoud van portofolio
$stmt = $pdo->prepare("SELECT pr.productID, titel, plaatje FROM product pr LEFT JOIN plaatjes pl ON pr.productID = pl.productID AND pr.plaatjeID = PL.plaatjeID ORDER BY pr.productID DESC");
$stmt->execute();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>portfolio_page</title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <?php include_once 'includes/header-inc.php'; ?>
        <div class="container">
             <?php
            //maak een variable voor het aantal producten
            //loop door de producten en schrijf voor elk product div + class h2 en p
            //voeg voor elke vijf een container div eromheen toe
            
            
            $x=0;
            if($admin){ // check if admin
                ?>
            
            <div class="grid_portfolio">'
                <div class="p1">
                    <a href="product.php?id=nieuw">nieuw</a>
                </div>
                        <?php
                $count++;
                $x=1;
            }
            
            //aantal producten uit de database:
            
            for($i = $x; $i<$count;$i++){
                
                if($i%3==0){
                    print('<div class="grid_portfolio">'); //container div voor elke drie divjes
                }
                
                

                //haal hier spul uit de database
                $row = $stmt->fetch();
                //print de inhoud van het divje
                ?>
                    <div class="p<?php print($i%3+1); ?>"><a href="product.php?id=<?php print($row["productID"]); ?>">
                        <h2><?php print($row["titel"]); ?></h2>
                        <img src="img/portofolio/<?php print($row["plaatje"]) ?>">
                            </a></div>
                <?php
                
                
                if($i%3==2||$i==$count-1){ // sluit container div af na vijf divjes of na de laatste div
                    print('</div>');
                }
                
            }
        
           
            ?>
        </div>
       <?php include_once 'includes/footer-inc.php'; ?>
    </body>
</html>
