<?php
ob_start();
session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: index.php");
}
require_once 'PHP/connect.php';

if (isset($_POST['signup'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $pass = trim($_POST['password']);
    $name = stripslashes($name);
    $email = stripslashes($email);
    $username = stripslashes($username);
    $pass = stripslashes($pass);

    $options = [
        'cost' => 12,
    ];

    $password = password_hash($pass, CRYPT_BLOWFISH, $options);

    $stmt = $conn->prepare("SELECT email FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $count = $result->num_rows;

    if ($count == 0) {

        $stmts = $conn->prepare("INSERT INTO users(name,email,username,password) VALUES(?, ?, ?, ?)");
        $stmts->bind_param("ssss", $name, $email, $username, $password);
        $res = $stmts->execute();
        $stmts->close();

        $user_id = mysqli_insert_id($conn);
        if ($user_id > 0) {
            $_SESSION['user'] = $user_id;
            $_SESSION['username'] = $username;
            if (isset($_SESSION['user'])) {
                print_r($_SESSION);
                header("location: index.php");
                exit;
            }
        }
    } else {
        $errTyp = "warning";
        $errMsg = "Email is already used, please enter another";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/SignUp.css">
        <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet" type="text/ccc">
        <title>Register</title>
    </head>
    <body>
        <div class="container">
            <div class="row main">
                <div class="panel-heading">
                    <div class="panel-title text-center">
                        <h1 class="title">Sign Up</h1>
                        <hr/>
                        <p> fill out the details below to join this awesome website </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-login main-centre">
            <form class="form-horizontal" method="post">
                <?php
                if (isset($errMsg)) {
                ?>
                <div class="form-group">
                    <div class="alert alert-<?php echo ($errTyp == "success") ? "success" : $errTyp; ?>">
                        <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMsg; ?>
                    </div>
                </div>
                <?php
                }
                ?>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-8">
                        <div class="input-group" id="name2">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name"
                            required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email"
                            required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="username" id="username"
                            placeholder="Enter Your Username" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-8">
                        <div id="complexify">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password">
                            </div>
                            <div class="progress">
                                <div id="complexity-bar" class="progress-bar" role="progressbar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="confirm" id="confirm"
                            onkeyup="confirmPass(); return false;" placeholder="Confirm Your Password" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block login-button" name="signup" id="reg">
                    Register
                    </button>
                </div>
            </form>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="script/PassValid.js"></script>
        <script src="script/conPass.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="Jquery/jquery.complexify.js"></script>
        <script type="text/javascript" src="Jquery/jquery.complexify.banlist.js"></script>
        <script type="text/javascript" src="Jquery/complex.js"></script>
        <script type="text/javascript" src="script/sessionStorage.js"></script>
    </body>
</html>