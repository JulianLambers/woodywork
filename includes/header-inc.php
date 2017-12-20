<?php

?>

        <div class="login_nav">
            <div class="center_nav">
                <?php if($logged) { ?><div class="login_nav">
                            <div class="center_nav">
                            <ul>
                                <li><a href='#'><p><?php print($_SESSION['acc_gebruikersnaam']); ?></p></a>
                                    <ul>
                                    <li><a href="besteld.php"><p>mijn bestellingen</p></a></li>
                                    <li><a href="includes/uitloggen-inc.php?uitloggen=true" onclick="fUitloggen()"><p>uitloggen</p></a></li>
                                </ul></li>
                            </ul> 


                            <li><p>|</p></li>
                            <li><a href="winkelwagen.php"><p>winkelwagen (0)</p></a></li>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="login_nav">
                            <div class="center_nav">
                                <li><a href="inloggen.php"><p>inloggen</p></a></li>
                            </div>
                        </div>';
                    <?php } ?>
            </div>
        </div>
        <div class="picture_header">
            
        </div>
        <nav class="shadow">
            <ul>
                <li><a class="page" href="home.php"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></i><p>home</p></a></li>
                <li><a class="page" href="bedrijf.php"><i class="fa fa-building-o fa-2x" aria-hidden="true"></i><p>bedrijf</p></a></li>
                <li><a class="page" href="portfolio.php"><i class="fa fa-folder-open-o fa-2x" aria-hidden="true"></i><p>portfolio</p></a></li>
                <li><a class="page" href="naamplaat.php"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><p>naamplaat</p></a>
                    <ul>
                        <li><a class="page" href="#.php"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><p>naamplaat</p></a></li>
                        <li><a class="page" href="#.php"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><p>naamplaat</p></a></li>
                    </ul>
                </li>
                <li><a class="page" href="contact.php"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></i></i><p>contact</p></a></li>
        </nav>
<script> // script om het menuitem van de huidige pagina te highlighten
var currentpage = window.location.href; //url van huidige pagina
var menuitems = document.getElementsByClassName("page");
for (i = 0; i < menuitems.length; ++i) { // loop door alle menuitems
    if(currentpage.includes(menuitems[i].href)){ // check of de href van het menuitem in de url voorkomt
        menuitems[i].className += " current_page" // geef menuitem extra class
    }
}
</script>