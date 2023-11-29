<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "storedb";

$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
    die("Echec de la connexion a la base de donnees : " . mysqli_connect_error());
}
?>