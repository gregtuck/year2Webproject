<?php

include 'connect.php';

error_reporting(E_ALL);
session_start();
$mysqli = new mysqli();

if ($mysqli->connect_errno > 0) {
    die('Unable to connect to database [' . $mysqli->connect_errno . ']');
}

$options = [
    'cost' => 12,
];

if (isset($_POST['submit'])) {
    $errors = array();
    $data = array();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $hash = password_hash($password, CRYPT_BLOWFISH, $options);

    if (!($stmt = $mysqli->prepare("INSERT INTO users (name, email, username, password)
        VALUES (?,?,?,?)"))) {
        echo "prepare failed: (" . $mysqli->errno . ")" . $stmt->error;
    }

    if (!$stmt->bind_param('ssss', $name, $email, $username, $hash)) {
        echo "Binding parameters failed:(" . $stmt->errno . ")" . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ")" . $stmt->error;
    }

    if ($stmt) {
        header('Location: index.php');
    } else {
        echo "registration Failed";
    }

}

$mysqli->close();