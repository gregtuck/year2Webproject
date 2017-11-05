<?php

$servername = "lochnagar.abertay.ac.uk";
$username = "sql1601097";
$password = "AEWNrwcN6QSs";
$dbname = "sql1601097";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_close($conn);
?>

