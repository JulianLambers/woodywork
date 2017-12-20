<?php

<<<<<<< HEAD
include_once 'includes/database-conectie-inc.php';

if($admin){//check if admin
    if(isset($_POST["insert"])){ //insert titel en tekst van nieuw product in de database
        $sql = $pdo->prepare("INSERT INTO product (titel, beschrijving) VALUES (?,?)");
        $sql->execute(array($_POST["titel"],$_POST["tekst"]));
    }
    if(isset($_POST["update"])){//update knop om tekst en titel te updaten en plaatjes toe te voegen
        $sql = $pdo->prepare("UPDATE product SET titel=?, beschrijving=? WHERE productID=?"); //update titel en tekst
        $sql->execute(array($_POST["titel"],$_POST["tekst"],$_GET["id"]));
        
        
        if(isset( $_FILES["plaatje"])){//voeg plaatjes toe
=======
SESSION_START();
$pdo = new PDO("mysql:host=localhost;dbname=woodywork;port=3306", "root", ""); // conect database
if(isset($_SESSION['acc_id'])){
    if(isset($_POST["insert"])){
        $sql = $pdo->prepare("INSERT INTO product (titel, beschrijving) VALUES (?,?)");
        $sql->execute(array($_POST["titel"],$_POST["tekst"]));
    }elseif(isset($_POST["update"])){
        $sql = $pdo->prepare("UPDATE product SET titel=?, beschrijving=? WHERE pruductID=?");
        $sql->execute(array($_POST["titel"],$_POST["tekst"],$_GET["id"]));
        
        
        if(isset( $_FILES["plaatje"])){
>>>>>>> a119b577c80b79aaa1177fe3ae525743f0d0dc4d
            $sql = $pdo->prepare("SELECT max(plaatjeID) max FROM plaatjes");
            $sql->execute();
            $row = $sql->fetch();
            $max = $row["max"]+1;
<<<<<<< HEAD
            print_r($_FILES);
            for($i =0; $i<sizeof($_FILES["plaatje"]["name"]);$i++ ){
                print("test ");
                $array = explode(".", $_FILES["plaatje"]["name"][$i]);
                $path= "img/portofolio/".($max+$i).".". $array[sizeof($array) - 1];
                $file= ($max+$i).".". $array[sizeof($array) - 1];
            
                    $sql = $pdo->prepare("INSERT INTO plaatjes (productID, plaatje, plaatjeID) VALUES (?,?,?)");
                if(move_uploaded_file ( $_FILES["plaatje"]["tmp_name"][$i] ,  $path )){
                    $sql->execute(array($_GET["id"],$file,($max+$i)));
                }
            }
        }
        
        
        
        if(isset($_POST["port"])){//update welk plaatje in de portfolio komt
=======
            
            $sql = $pdo->prepare("SELECT plaatjeID FROM product WHERE productID=".$_GET["id"]);
            $sql->execute();
            $row = $sql->fetch();
            $plaatjeID = $row["plaatjeID"];

            $array = explode(".", $_FILES["plaatje"]["name"]);
            $path= "img/portofolio/$max.". $array[sizeof($array) - 1];
            $file= $max.".". $array[sizeof($array) - 1];
            
            if($plaatjeID == null){
                $sql = $pdo->prepare("UPDATE product SET plaatjeID=? WHERE productID=?");
                $sql->execute(array($max,$_GET["id"]));
            }

            $sql = $pdo->prepare("INSERT INTO plaatjes (productID, plaatje, plaatjeID) VALUES (?,?,?)");
            if(move_uploaded_file ( $_FILES["plaatje"]["tmp_name"] ,  $path )){
                $sql->execute(array($_GET["id"],$file,($max)));
            }
        }
        if(isset($_POST["port"])){
>>>>>>> a119b577c80b79aaa1177fe3ae525743f0d0dc4d
            
            $sql = $pdo->prepare("UPDATE product SET plaatjeID=? WHERE productID=?");
            $sql->execute(array($_POST["port"],$_GET["id"]));
        }
    }
<<<<<<< HEAD
    if(isset($_POST["delete"])){//delete een product
        $sql = $pdo->prepare("SELECT * FROM plaatjes WHERE productID=".$_GET["id"]); // haal alle plaatjes op die bij het product horen
        $sql->execute();
        $table=$sql->fetchAll();
        foreach ($table as $key => $value) {
            unlink("img/portofolio/".$value["plaatje"]);//verwijder alle plaatjes uit de img/portofolio map
        }
        $sql = $pdo->prepare("DELETE FROM plaatjes WHERE productID=".$_GET["id"]); // verwijder de plaatjes uit de database
        $sql->execute();
        $sql = $pdo->prepare("DELETE FROM product WHERE productID=".$_GET["id"]); // verwijder het product uit de database
        $sql->execute();
        header( "Location: portfolio.php" );
    }
    if(isset($_POST["delete_plaatje"])){ // verwijder een enkel plaatje
        $plaatjeID = str_replace("verwijderen ","",$_POST["delete_plaatje"]); //achterhaal het id van het plaatje
        
        
        $sql = $pdo->prepare("SELECT plaatje FROM plaatjes WHERE plaatjeID=".$plaatjeID); //haal plaatje op
        $sql->execute();
        $plaatjeNaam=$sql->fetch();
        $plaatjeNaam=$plaatjeNaam["plaatje"];
        unlink("img/portofolio/".$plaatjeNaam); //verwijder plaatje uit img/portfolio
        $sql = $pdo->prepare("DELETE FROM plaatjes WHERE plaatjeID=".$plaatjeID); //verwijder plaatje uit database
        $sql->execute();
    }
=======
>>>>>>> a119b577c80b79aaa1177fe3ae525743f0d0dc4d
}



if(isset($_GET["id"])){
<<<<<<< HEAD
    $id = $_GET["id"]; // sla het id op
} 
else {
    $maxsql = $pdo->prepare("SELECT max(productID) as c FROM product"); //maak een nieuw id 
=======
    $id = $_GET["id"];
} 
else {
    $maxsql = $pdo->prepare("SELECT max(productID) as c FROM product"); //count aantal plaatjes
>>>>>>> a119b577c80b79aaa1177fe3ae525743f0d0dc4d
    $maxsql->execute();
    $maxrow = $maxsql->fetch();
    $id = $maxrow["c"]; 
}
<<<<<<< HEAD
    $countsql = $pdo->prepare("SELECT COUNT(productID) as c FROM plaatjes WHERE productID = ".$id); //tel het aantal plaatjes
=======
    $countsql = $pdo->prepare("SELECT COUNT(productID) as c FROM plaatjes WHERE productID = ".$id); //count aantal plaatjes
>>>>>>> a119b577c80b79aaa1177fe3ae525743f0d0dc4d
    $countsql->execute();
    $countrow = $countsql->fetch();
    $count = $countrow["c"];
    


if($id!="nieuw"){
<<<<<<< HEAD
    $plaatjessql = $pdo->prepare("SELECT * FROM plaatjes WHERE productID = ".$id); // haal plaatjes uit database
    $plaatjessql->execute();

    
    $tekstsql = $pdo->prepare("SELECT titel, beschrijving, plaatjeID FROM product WHERE productID = ".$id); // haal tekst en titel uit database
=======
    //alle plaatjes
    $plaatjessql = $pdo->prepare("SELECT * FROM plaatjes WHERE productID = ".$id);
    $plaatjessql->execute();

    //stukje tekst
    $tekstsql = $pdo->prepare("SELECT titel, beschrijving, plaatjeID FROM product WHERE productID = ".$id);
>>>>>>> a119b577c80b79aaa1177fe3ae525743f0d0dc4d
    $tekstsql->execute();
}
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
<<<<<<< HEAD
        <?php include_once 'includes/header-inc.php'; ?>
=======
        <div class="login_nav">
            <div class="center_nav">
                <?php
                    if(isset($_SESSION['acc_id'])) {
                    print '<div class="login_nav">
                            <div class="center_nav">
                                <form class=uitloggen-form action="includes/uitloggen-inc.php" method="POST">' ?>
                                    <?php print "<a href=" . "#" . "><p>" . $_SESSION['acc_gebruikersnaam'] . "</p></a>"?>
                                    <?php print '<a href="besteld.php" class="button_hide"><p>mijn bestellingen</p></a>'?>
                                    <?php print '<button onclick="fUitloggen()" class="button_hide" id="button_p" type="submit" name="uitloggen">uitloggen</button>
                                </form>
                            <li><p>|</p></li>
                            <li><a href="winkelwagen.php"><p>winkelwagen (0)</p></a></li>
                            </div>
                        </div>';
                        
                    } else {
                        print '<div class="login_nav">
                            <div class="center_nav">
                                <li><a href="inloggen.php"><p>inloggen</p></a></li>
                                <li><p>|</p></li>
                                <li><a href="winkelwagen.php"><p>winkelwagen (0)</p></a></li>
                            </div>
                        </div>';
                    }
                ?>
            </div>
        </div>
        <div class="picture_header">
            
        </div>
        <nav class="shadow">
            <ul>
                <li><a href="home.php"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></i><p>home</p></a></li>
                <li><a href="bedrijf.php"><i class="fa fa-building-o fa-2x" aria-hidden="true"></i><p>bedrijf</p></a></li>
                <li><a class="current_page" href="portfolio.php"><i class="fa fa-folder-open-o fa-2x" aria-hidden="true"></i><p>portfolio</p></a></li>
                <li><a href="naamplaat.php"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><p>naamplaat</p></a></li>
                <li><a href="contact.php"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></i></i><p>contact</p></a></li>
            </ul>
        </nav>
>>>>>>> a119b577c80b79aaa1177fe3ae525743f0d0dc4d
        <div class="container">
            <?php
                //print alle plaatjes
                
                 
<<<<<<< HEAD
                 if($admin){//check if admin 
                     if($id=="nieuw"){ // maak lege form voor het toevoegen van titel en tekst
=======
                 if(isset($_SESSION['acc_id'])){//check if admin
                     if($id=="nieuw"){
>>>>>>> a119b577c80b79aaa1177fe3ae525743f0d0dc4d
                         ?><form action="product.php" method="post">
                                <div class="grid_portfolio">
                              <div class="p1">
                                      <label for="titel">Titel:</label><input type="text" id="titel" name="titel">
                                     <label for="tekst">Tekst:</label><textarea id="tekst" name="tekst"></textarea>
                                     <input type="submit" name="insert" value="opslaan">
                              </div></div>
                                  <?php
<<<<<<< HEAD
                     }else{ //maak form voor het updaten van titel en tekst en voor het toevoegen van plaatjes 
=======
                     }else{
>>>>>>> a119b577c80b79aaa1177fe3ae525743f0d0dc4d
                         
                        $tekstrow = $tekstsql->fetch();
                       ?> <form action="product.php?id=<?php print($id);?>" method="post" enctype="multipart/form-data">
                             <div class="grid_portfolio">  
                                <div class="p1">
                                    <label for="titel">Titel:</label><input type="text" id="titel" name="titel" value="<?php print($tekstrow["titel"]);?>">
                                      <label for="tekst">Tekst:</label><textarea id="tekst" name="tekst"><?php print($tekstrow["beschrijving"]);?></textarea>
                                      <input type="submit" name="update" value="opslaan">
<<<<<<< HEAD
                                      <input type="submit" name="delete" value="verwijderen" onclick="return confirm('Weet je zeker dat je dit item wilt verwijderen?')">
                              </div>
                                  <?php
                     }
                 }
                 
                if($id!="nieuw"){
                    $x=1;//tel het aantal extra cms divjes
                    if($admin){//input voor plaatjes
                        ?>
            <div class="p2">
                    <input type="file" multiple name="plaatje[]">
                    <p>je kunt meer plaatjes tegelijk selecteren</p>
                    <p>vergeet niet de thumbnail te selecteren met de ronde knopjes onder de plaatjes</p>
            </div>
                        <?php
                    $x=2;
=======
                              </div>
                                  <?php
                     }
                     
                 } else {
                     
                    $tekstrow = $tekstsql->fetch();
                     ?>
                                 <div class="grid_portfolio">  
                                <div class="p1">
                               <h2><?php print($tekstrow["titel"]); ?></h2>
                               <p><?php print($tekstrow["beschrijving"]); ?></p>
                               </div>
                     <?php
                 }
                 
                if($id!="nieuw"){
                    $x=1;
                    if(isset($_SESSION['acc_id'])){
                        ?>
            <div class="p2">
                    <input type="file" multiple name="plaatje">
            </div>
                        <?php
                    $x=2;
                    }
>>>>>>> a119b577c80b79aaa1177fe3ae525743f0d0dc4d
                    
                    
                    
                    
<<<<<<< HEAD
                    
                        for($i = 0; $i<$count;$i++){

                            if(($i+$x)%3==0){
                                print('<div class="grid_portfolio">'); //container div voor elke drie divjes
                            }



                            //haal hier plaatje uit de database
                            $row = $plaatjessql->fetch();
                            //print de inhoud van het divje
                             ?><div class="p<?php print(($i+$x)%3+1); ?> ">
                                 <img src="img/portofolio/<?php print($row["plaatje"]); ?>">
                                 <?php if($admin){ // maak radiobutton voor de thumbnail en knop voor het verwijderen van het plaatje
                                     ?>


                                 <input type="radio" name="port" value="<?php print($row["plaatjeID"]); ?>"<?php
                                 if($tekstrow["plaatjeID"]==$row["plaatjeID"]){// check het huidige plaatje
                                     ?> checked <?php
                                 }

                                 ?>>

                                          <input type="submit" name="delete_plaatje" value="verwijderen <?php print($row["plaatjeID"]); ?>"  onclick="return confirm('Weet je zeker dat je dit item wilt verwijderen?')">
                                 <?php } ?>
                               </div>

                              <?php
                            if((($i+$x)%3==2)||$i==$count-1){ // sluit container div af na drie divjes of na de laatste div
                                ?></div><?php
                            }
                        }
                    } else {// print divje met titel en tekst
                     
                    $tekstrow = $tekstsql->fetch();
                     ?>
                        <div class="grid_slideshow">  
                            <div class="p1">
                               <h2><?php print($tekstrow["titel"]); ?></h2>
                            </div>
                            <div class="p2">
                               <p><?php print($tekstrow["beschrijving"]); ?></p>
                            </div>
                            <div class="p3">
                        <!-- Slideshow container -->
                        <div class="slideshow-container">

                        <!-- Full-width images with number -->
                         
                         <div id="overlay" onclick="exitFullScreen()" ></div>
                        <div id="overlayContent">
                            <img onclick="exitFullScreen()" id="imgBig" src="" alt=""/>
                        </div>
                         
                        <?php
                        for($i = 0; $i<$count;$i++){
                            $row = $plaatjessql->fetch();
                        
                        ?>
                         <div class="mySlides fade">
                           <div class="numbertext"><?php print($i+1); ?> / <?php print($count); ?></div>
                           <img class="myImages" onclick="fullScreen()" src="img/portofolio/<?php print($row["plaatje"]); ?>" style="width:100%">
                         </div>
                         
                            <?php } ?>

                                 <!-- Next and previous buttons -->
                                 <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                 <a class="next" onclick="plusSlides(1)">&#10095;</a>
                               </div>
                               <br>

                               <!-- The dots/circles -->
                               <div style="text-align:center">
                                 <?php
                                for($i = 0; $i<$count;$i++){
                                    ?>
                                 <span class="dot" onclick="currentSlide(<?php print($i+1); ?>)"></span>
                                <?php }  ?>
                               </div> 
                       </div>
                        
                        
                        
                        
                        <?php
=======
                    for($i = 0; $i<$count;$i++){

                        if(($i+$x)%3==0){
                            print('<div class="grid_portfolio">'); //container div voor elke drie divjes
                        }



                        //haal hierplaatje uit de database
                        $row = $plaatjessql->fetch();
                        //print de inhoud van het divje
                         ?><div class="p<?php print(($i+$x)%3+1); ?> ">
                             <img src="img/portofolio/<?php print($row["plaatje"])?>">
                             <?php if(isset($_SESSION['acc_id'])){ ?>
                             
                             
                             <input type="radio" name="port" value="<?php print($row["plaatjeID"]); ?>"<?php
                             if($tekstrow["plaatjeID"]==$row["plaatjeID"]){
                                 ?> checked <?php
                             }
                             
                             ?>>
                             <?php } ?>
                           </div>

                          <?php
                        if((($i+$x)%3==2)||$i==$count-1){ // sluit container div af na drie divjes of na de laatste div
                            ?></div><?php
                        }
>>>>>>> a119b577c80b79aaa1177fe3ae525743f0d0dc4d
                    }
                }
            ?>
            
        </div>
                           
<<<<<<< HEAD
        <?php if($admin){ ?></form><?php } ?>             
         <script src="scripts/slideshow-inc.js"></script>                  
        <?php include_once 'includes/footer-inc.php'; ?>
=======
        <?php if(isset($_SESSION['acc_id'])){ ?></form><?php } ?>             
                           
        <footer>
            <div class="grid_footer">
                <div class="f1">
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p></div>
            </div>
        </footer>
>>>>>>> a119b577c80b79aaa1177fe3ae525743f0d0dc4d
    </body>
</html>
