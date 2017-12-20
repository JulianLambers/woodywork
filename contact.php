
<?php


include_once 'includes/database-conectie-inc.php';
?>

<?php include('contactverwerken.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>contact_page</title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <?php include_once 'includes/header-inc.php'; ?>

        <div class="container">
            <div class="grid_contact">
                <div class="contacttext">
                    <div class="formulieren">
                        <h3>Contact formulier</h3>
                        <br>
                        <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post" id="simpleform">
                            <div>
                                <label for="name">Naam:</label>
                                <input placeholder="Naam" type="text" name="name" id="name" value="<?= $name ?>">
                                <span class="error"><?= $name_error ?></span>
                            </div>
                            <div>
                                <label for="email">Email adres:</label>
                                <input placeholder="Email adres" type="text" name="email" id="email" value="<?= $email ?>" >
                                <span class="error"><?= $email_error ?></span>
                            </div>
                            <div>
                                <label for="message">Uw bericht:</label>
                                <textarea placeholder="Typ uw bericht hier..." name="message" id="message" rows="7" cols="40" value="<?= $message ?>"></textarea>
                            </div>
                            <div class="theSubmit">
                                <input type="submit" name="verzend" value="  Verzend  " style="height: 20px; width: 180px;">
                            </div>
                        </form>
                    </div>
                    <div class="adresgegevens"><h3>Adres gegevens</h3>
                        <ul id="adrescontact">
                            <li>WoodyWork</li>
                            <li>Zandhuisweg 33</li>
                            <li>8077 TC, Hulshorst</li>
                            <li>Tel. (0321)  -  (06) - 42642339</li>
                            <li>woodyworkdesign@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div id="map"></div>
                <script>
                    var map;
                    function initMap() {
                        var location = {lat: 52.360862, lng: 5.733572};
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: location,
                            zoom: 13
                        });
                        var marker = new google.maps.Marker({
                            position: location,
                            map: map
                        });
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMKXhI18EdJhqRvrXre9skCPpW3wjEsJg&callback=initMap" async defer></script>



            </div>
        </div>

        <?php include_once 'includes/footer-inc.php'; ?>
    </body>
</html>
