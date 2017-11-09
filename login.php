<?php
session_start();
ob_start();

if(isset($_SESSION['user'])){
    header("Location: index.php");
    exit;
}

require_once 'PHP/connect.php';

if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);
    $email = stripslashes($email);
    $pass = stripslashes($pass);


    $stmt = $conn->prepare("SELECT user_id, username, password FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

//    $count = $result->num_rows;

    if (password_verify($pass, $row['password']))
    {
        $_SESSION['user'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
    }
    else{
        $errormsg = "Incorrect Email/Password";
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet" type="text/ccc">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<form class="log" method="post">
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
        <h1>Admin Login</h1>
        <label>
            <input type="email" autocomplete="off" name="email" id="email" placeholder="email" class="email"/>
        </label>
        <label>
            <input type="password" name="password" id="password" placeholder="password" class="password"/>
        </label>

        <button type="submit" class="btn btn-success" name="login" id="reg">Login</button>
    </div>
</form>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
