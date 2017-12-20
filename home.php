<?php


include_once 'includes/database-conectie-inc.php';



//inhoud van portofolio
$port = $pdo->prepare("SELECT pr.productID, titel, beschrijving, plaatje FROM product pr LEFT JOIN plaatjes pl ON pr.productID = pl.productID AND pr.plaatjeID = PL.plaatjeID ORDER BY pr.productID DESC LIMIT 2");
$port->execute();

//inhoud van nieuws
$nieuws = $pdo->prepare("SELECT * FROM nieuws ORDER BY nieuwsID DESC LIMIT 2");
$nieuws->execute();


?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <title>home_pagina</title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <?php include_once 'includes/header-inc.php'; ?>
        <div class="container">
            <div class="grid_home">
                <div class="h1"><a href="bedrijf.php">
                    <div class="bedrijf_text"><h1>Hoi!</h1><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p><br><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p></div>
                    <div class="bedrijf_img"></div></a>
                </div>
                
                <a class="h2" href="archief.php">
                    <div>
                        <div>
                            <?php
                            $row = $nieuws->fetch();
                            print(
                                          '<h3>'.$row[1].'</h3>'
                                        . '<p>'.$row[2].'</p>'
                                    . '<p>'.$row[3].'</p>'
                                    );
                            ?>
                        </div>
                        <div>
                            <?php
                            $row = $nieuws->fetch();
                            print(
                                          '<h3>'.$row[1].'</h3>'
                                        . '<p>'.$row[2].'</p>'
                                    . '<p>'.$row[3].'</p>'
                                    );
                            ?>
                        </div>
                    </div>
                </a>
                    
                <div class="h3">
                    <?php
                    $row = $port->fetch();
                    print('<a href="product.php?id='.$row["productID"].'">'
                            . '<div class="product_text">'
                                . '<h2>'.$row["titel"].'</h2>'
                                . '<p>'.$row["beschrijving"].'</p>'
                            . '</div>'
                            . '<div class="product_img ">'
                                . '<img src="img/portofolio/'.$row["plaatje"].'">'
                            . '</div>'
                        . '</a>');
                    ?>
                </div>
                <div class="h4">
                    <?php
                    $row = $port->fetch();
                    print('<a href="product.php?id='.$row["productID"].'">'
                            . '<div class="product_text">'
                                . '<h2>'.$row["titel"].'</h2>'
                                . '<p>'.$row["beschrijving"].'</p>'
                            . '</div>'
                            . '<div class="product_img ">'
                                . '<img src="img/portofolio/'.$row["plaatje"].'">'
                            . '</div>'
                        . '</a>');
                    ?>
                </div>
            </div>
        </div>
        <?php include_once 'includes/footer-inc.php'; ?>
        
    </body>
</html>
