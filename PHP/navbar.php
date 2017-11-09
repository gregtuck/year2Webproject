<?php
ob_start();
session_start();
require_once 'connect.php';

if (!isset($_SESSION['user'])){
    header("Location: signUp.php");
    exit;
}

$res = $conn->query("SELECT * FROM users WHERE user_id=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res,MYSQLI_ASSOC);
?>


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">OKGO</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="bandMembers.php">Members</a></li>
                <li><a href="oneMoment.php">One Moment</a></li>
                <li><a href="tourDates.php">Tour</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["username"]; ?></a>
                </li>
                <li><a href="PHP/logout.php"><span class="glyphicon glyphicon-remove-sign"></span>logout</a></li>
            </ul>
        </div>
    </div>
</nav>

