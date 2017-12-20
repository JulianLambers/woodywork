<?php
    
SESSION_START();
<<<<<<< HEAD

if(isset($_GET['uitloggen'])) {
=======
//syntax om uit te loggen
if(isset($_POST['uitloggen'])) {
>>>>>>> a119b577c80b79aaa1177fe3ae525743f0d0dc4d
    SESSION_UNSET();
    SESSION_DESTROY();
    header("Location: ../home.php?inloggen=TRUE");
    exit();
}