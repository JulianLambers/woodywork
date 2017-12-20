<?php

SESSION_START();

$logged = false;
$admin = false;
if(isset($_SESSION['acc_id'])){//check if ingelogd
    $logged = true;
}

if(isset($_SESSION['acc_id'])){//check if admin  not implemented yet
    $admin = true;
}

$pdo = new PDO("mysql:host=localhost;dbname=woodywork;port=3306", "root", ""); // conect database

?>