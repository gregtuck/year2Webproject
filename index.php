<?php
session_start();
ob_start();



if (isset($_SESSION['user'])) {
    header("Location: main.php");
    exit;
}
require_once 'PHP/connect.php';
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);
    $email = stripslashes($email);
    $pass = stripslashes($pass);
    $stmt = $conn->prepare("SELECT user_id, username, password, usertype FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//    $count = $result->num_rows;
    if (password_verify($pass, $row['password'])) {
        $_SESSION['user'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['usertype'] = $row['usertype'];
        header("Location: main.php");
    } else {
        $errormsg = "Incorrect Email/Password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intitial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="css/modal.css">
    <title>Title</title>
</head>
<body>
<div class="jumbotron">
    <h1 class="container">
        <span id="test"></span>OKGO
    </h1>
    <div class="info">
        <h2>This is the unofficial OKGO Website</h2>
        <br><br>
    </div>
    <div class="buttons">
        <p class="text-centre"><a href="signUp.php" class="btn btn-danger btn-lg" role="button">Sign up</a>&emsp;
            <a href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-success btn-lg"
               role="button">Sign in</a></p>
        <div class="modal fade" id="login-modal" role="dialog">
            <div class="modal-dialog">
                <div class="loginmodel-container">
                    <h1>Login to your account</h1><br>
                    <form method="post" id="login">
                        <div class="login-box">
                            <?php
                            if (isset($errormsg)) {
                                ?>
                                <div class="form-group">
                                    <div class="alert alert-danger">
                                        <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errormsg; ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <input autocomplete="off" type="text" name="email" id="email" placeholder="email address">
                            <input type="password" name="password" id="password" placeholder="Password">
                            <input type="submit" name="login" class="btn btn-success" value="Login">
                            <input type="button" class="btn btn-primary" data-dismiss="modal" value="Close">
                    </form>
                    <div class="login-help"><a href="signUp.php"><p>Not a member? Sign up</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>