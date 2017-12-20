<?php


include_once 'includes/database-conectie-inc.php';



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
    <p> 
    
    <div  class="grid_naamplaat">
        <div class="n2">
            <div id="plaat">
                <p id="tekst1">tekst</p>
                <p id="tekst2">tekst</p>
            </div>
        </div>
            <div class="n3">

                    <table style="width:100%">

                       <tr>
                         <td>Tekst:</td>
                         <td><input type="text" id="itekst1" value="Mijn naam"  onchange="update()"></td>
                       </tr>
                       <tr>
                         <td>Tekstkleur:</td>
                            <td><select name="tkleur" id="tekst1colorpicker" onchange="update()">
                                    <option class="color_option" value="Red">p </option>
                                    <option class="color_option" value="Green">p </option>
                                    <option class="color_option" value="Blue" selected="selected">p </option>
                                    <option class="color_option" value="Yellow">p </option>
                                    <option class="color_option" value="Black">p p</option>
                             </select></td>
                       </tr>
                       <tr>
                         <td>Tekstgroote:</td>
                         <td><input class="nummer" id="tekstgroote1" type="number" name="lengte" value="10" onchange="update()">cm</td>
                       </tr>
                       <tr>
                         <td>Tekst:</td>
                         <td><input type="text" id="itekst2" name="tekst" value=""  onchange="update()"></td>
                       </tr>
                       <tr>
                         <td>Tekstkleur:</td>
                            <td><select name="tkleur" id="tekst2colorpicker" onchange="update()">
                                    <option class="color_option" value="Red">p </option>
                                    <option class="color_option" value="Green">p </option>
                                    <option class="color_option" value="Blue">p </option>
                                    <option class="color_option" value="Yellow">p </option>
                                    <option class="color_option" value="Black">p p</option>
                             </select></td>
                       </tr>
                       <tr>
                         <td>Tekstgroote:</td>
                         <td><input class="nummer" id="tekstgroote2" type="number" name="lengte" value="10" onchange="update()">cm</td>
                       </tr>
                       <tr>
                         <td>Achtergrondkleur:</td>
                         <td><select name="tkleur" id="colorpicker" onchange="update()">
                                    <option class="color_option" value="Red">p </option>
                                    <option class="color_option" value="Green">p </option>
                                    <option class="color_option" value="Blue">p </option>
                                    <option class="color_option" value="Yellow">p </option>
                                    <option class="color_option" value="Black">p p</option>
                             </select></td>
                       </tr>
                       <tr>
                           <th>Afmetingen:</th>
                           <th></th>
                       </tr>
                       <tr>
                         <td>Hoogte:</td>
                         <td><input class="nummer" id="hoogte" type="number" name="hoogte" value="12"  onchange="update()">cm</td>
                       </tr>
                       <tr>
                         <td>Breedte:</td>
                         <td><input class="nummer" id="breedte" type="number" name="breedte" value="50"  onchange="update()">cm</td>
                       </tr>
                   </table> 
                <datalist id="hout">
                    <option value="Hout 1">
                    <option value="Hout 2">
                    <option value="Hout 3">
                    <option value="Hout 4">
                    <option value="Hout 5">
                </datalist>
                <datalist id="kleur">
                    <option value="Red">
                    <option value="Green">
                    <option value="Blue">
                    <option value="Yellow">
                    <option value="Black">
                </datalist>




            </div>
        
            </div>
        </div>
        <script>
            //geef de options een achtergrondkleur
            var colors = document.getElementsByClassName("color_option")
            for (i = 0; i < colors.length; ++i) { // loop door alle kleuren
                colors[i].style.backgroundColor = colors[i].value;
            }
            
            
            
        update();
    function update(){
        var plaat = document.getElementById("plaat");
        var text1 = document.getElementById("tekst1");
        var text2 = document.getElementById("tekst2");
        
        
        text1.innerHTML = document.getElementById("itekst1").value;
        text2.innerHTML = document.getElementById("itekst2").value;
        
        
        var e = document.getElementById("tekst1colorpicker");
        text1.style.color = e.style.backgroundColor = e.options[e.selectedIndex].value;   
        e = document.getElementById("tekst2colorpicker");
        text2.style.color = e.style.backgroundColor = e.options[e.selectedIndex].value;
        
        
        
        
        e = document.getElementById("colorpicker");
        plaat.style.backgroundColor = e.style.backgroundColor = e.options[e.selectedIndex].value;
        
        
        
        var procent = (document.getElementById("breedte").value);
        
        
        plaat.style.height = (document.getElementById("hoogte").value/ 100 * procent).toString()+"px";
        plaat.style.width = "100%"
        text1.style.fontSize = (document.getElementById("tekstgroote1").value/100 * procent).toString()+"px";
        text2.style.fontSize = (document.getElementById("tekstgroote2").value/100 * procent).toString()+"px";
        
    }
        
        </script>
        <?php include_once 'includes/footer-inc.php'; ?>
    </body>
</html>
