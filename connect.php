<?php

$servername = "lochnagar.abertay.ac.uk";
$username = "sql1601097";
$password = "AEWNrwcN6QSs";
$dbname = "sql1601097";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

