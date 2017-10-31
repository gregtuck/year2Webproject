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
                <li><a href="oneMoment.html">One Moment</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["username"]; ?></a>
                </li>
                <li><a data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span>
                        SIGN IN</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="loginModal" role="dialog">

    <div class="modal-dialog">
        <div class="loginmodel-container">
            <h1>Login to your account</h1><br>
            <form method="post" action="login.php" id="login">
                <input type="text" name="username" id="username" placeholder="Username">
                <input type="password" name="password" id="password" placeholder="Password">
                <input type="submit" name="login" class="btn btn-success" value="Login">
                <input type="button" class="btn btn-primary" data-dismiss="modal" value="Close">
            </form>
            <div class="login-help"><a href="SignUp.html"><p>Not a member? Sign up</p></a>
            </div>
        </div>
    </div>
</div>
