<?php
<<<<<<< HEAD

=======
//include database connectie
>>>>>>> a119b577c80b79aaa1177fe3ae525743f0d0dc4d
include_once 'database-inlogsysteem-inc.php';

$gebruikersnaam = $_GET["gebruikersnaam"];
$sql = ("SELECT gebruikersnaam FROM gebruiker");

$resultaat = mysqli_query($conn, $sql);

$resultaatRows = mysqli_num_rows($resultaat);
$beschikbaar = true;
if($resultaatRows > 0) {
    while($row = mysqli_fetch_assoc($resultaat)) {
        if(strcasecmp($gebruikersnaam, $row["gebruikersnaam"]) == 0) {
            $beschikbaar = false;
            break;
        }
    }
}

print $beschikbaar;