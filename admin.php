<?PHP
ob_start();
session_start();

if (isset($_SESSION['usertype']) != 'admin') {
    header("Location: main.php");
    exit;
}


require_once 'PHP/connect.php';

if (isset($_POST['deleteUser'])) {
    $email = trim($_POST['email-address']);
    $email = stripslashes($email);

    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $count = $result->num_rows;

    if ($count == 1) {

        $stmt = $conn->prepare("DELETE FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->close();
        header("location: admin.php");
    } else {
        $errType = "Warning";
        $errMsg = "User does not exit";
    }
}

if (isset($_POST['makeAdmin'])) {
    $id = trim($_POST['id']);
    $id = stripslashes($id);

    $stmt = $conn->prepare("SELECT user_id FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $count = $result->num_rows;

    if ($count == 1) {

        $stmt = $conn->prepare("UPDATE users SET usertype = 'admin' WHERE user_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        //header("location: admin.php");
    } else {
        $errType = "warning";
        $errMsg = "user does not exist";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OKGO ADMIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/index.css">

</head>
<body>
<?php include('PHP/navbar.php'); ?>

<div class="jumbotron text-center">
    <h1>OKGO Admin Page</h1>
</div>


<div id="OKGO-users" class="container-fluid">
    <div class="col-sm-8">
        <h2>OKGO Users</h2>
        <table class="table table-bordered">
            <?php
            //require_once 'PHP/connect.php';

            $stmt = $conn->prepare("SELECT user_id, email FROM users");
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();

            if ($result->num_rows > 0) {
                echo "<thead><tr><th>users ID</th><th>email address</th></tr></thead>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tbody><tr><td>" . $row["user_id"] . "</td><td>" . $row["email"] . "</td></tr></tbody>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            ?>
    </div>
    <div class="col-sm-4">
        <h2>email subs</h2>
        <table class="table table-bordered">
            <?php
            $stmt = $conn->prepare("SELECT email FROM subscribers");
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();

            if ($result->num_rows > 0) {
                echo "<thead><tr><th>subscribers</th></tr></thead>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tbody><tr><td>" . $row["email"] . "</td></tr></tbody>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            ?>
    </div>
</div>
<div id="admin-users" class="container-fluid">
    <div class="col-sm-3">
        <form method="post">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" name="id" id="id" placeholder="Enter User ID">
                <small id="id-help" class="form-text text-muted">Enter User ID you wish to give admin status</small>
            </div>
            <button type="submit" name="makeAdmin" class="btn btn-primary">Make Admin</button>
        </form>
    </div>
    <div class="col-sm-3">
        <form method="post">
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
                <label for="email-address">Email Address</label>
                <input type="email" class="form-control" name="email-address" id="email-address"
                       aria-describedby="emailHelp"
                       placeholder="Enter Email">
                <small id="email-help" class="form-text text-muted">details must belong to existing user</small>
            </div>
            <button type="submit" name="deleteUser" class="btn btn-primary">Delete Account</button>
        </form>
    </div>
</div>
<?php include('PHP/footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="script/navbarFade.js"></script>
</body>
</html>