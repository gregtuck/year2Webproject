<?php
ob_start();
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

include_once 'PHP/connect.php';

if (isset($_POST['subs'])) {

    $sub = trim($_POST['newsletter']);
    $sub = stripslashes($sub);

    $stmt = $conn->prepare("SELECT email FROM subscribers WHERE email=?");
    $stmt->bind_param("s", $sub);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $count = $result->num_rows;

    if ($count == 0) {

        $stmts = $conn->prepare("INSERT INTO subscribers (email) VALUES(?)");
        $stmts->bind_param("s", $sub);
        $res = $stmts->execute();
        $stmts->close();

    } else {
        $errtype = "warning";
        $errmessage = "Email is already used";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link id="pageStyle" rel="stylesheet" type="text/css" href="css/oneMoment.css"/>
    <script type="text/JavaScript" src="script/oneMscript.js"></script>
    <script type="text/javascript" src="script/loadmore.js"></script>
    <title>OKGO</title>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="main.php">OKGO</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="bandMembers.php">Members</a></li>
                <li><a href="oneMoment.php">One Moment</a></li>
                <li><a href="tourDates.php">Tour</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <button type="button" class="btn btn-success" id="theatre">Theatre Mode</button>
                </li>
                <li>
                    <button type="button" class="btn btn-danger" id="standard">Standard Mode</button>
                </li>
                <li><a href="admin.php"><span
                                class="glyphicon glyphicon-user"></span><?php echo $_SESSION["username"]; ?></a>
                </li>
                <li><a href="PHP/logout.php"><span class="glyphicon glyphicon-remove-sign"></span>logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="jumbotron text-center">
    <h1>One Moment</h1>
</div>
<div class="container-fluid">
    <div id="content" style="text-align: center">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/QvW61K2s0tA" frameborder="0"
                allowfullscreen></iframe>
    </div>
    <div class="col-sm-10">
        <div class="container-fluid">
            <h2>This section is about the one moment music video</h2>
            <p>The band released a video associated with the song, its production sponsored by Morton Salt to highlight
                their
                "Walk Her Walk" campaign. The one-shot video primarily consists of 4.2 seconds of real-time footage
                recording
                over 300 distinct events set in motion by the band members and timed devices, slowed down to be played
                over
                the
                length of the song.
            </p>
        </div>
    </div>
    <div class="col-sm-10">
        <div class="container-fluid">
            <p>The music video for "The One Moment" features the members of OK Go interacting with various props on an
                initially stark-white set. Many of the props are inflated balloons filled with colored liquid that
                splash
                across the set pieces and the band members as they are ruptured in time to the music. The bulk of the
                video
                is shown in slow motion, at times slowed at 20,000% from real-time speed to match the beat of the
                song.
            </p>
            <p> Morton Salt provided financial support for the video.The company had wanted to change its brand image to
                demonstrate that its salt was more than just a commodity but is used across a range of industries that
                affects everyday life. They reused their mascot, the Morton Salt Girl, as part of this new branding
                campaign, "Walk Her Walk", to show about making a positive impact. Morton's CEO Christian Herrmann
                stated
                that "We want to embody her spirit to make a real, tangible difference in people's lives."The company
                approached the band about creating a video to help with this new campaign, as they felt the band would
                help
                "to bring new meaning to the brand and create relevance, especially with millennials", according to
                Morton's
                director of communications and corporate brand strategy Denise Lauer. The two groups agreed that "The
                One
                Moment" seemed to fit best, as the song was about the importance of every moment. The video includes
                images of five "difference makers" that Morton felt would help inspire viewers to make a positive impact
                on
                the world. The video concludes with the image of the Morton Salt Girl as well.
            </p>
            <div id="loadmore">
                <button type="button" id="shift" class="btn-lg btn-primary" onclick="loadMore()">See More</button>
                <br/>
                <p id="more"></p>
                <br/>
            </div>
        </div>
    </div>
</div>
<footer id="footer" role="contentinfo" class="footer table-row full-width">
    <div class="border-top p2 h5 gray overflow-hidden">
        <div id="copyright" class="sm-col sm-col-12 md-col-6 relative px2-5 border-box">
            <p>Dynamic Web Dev Assessment 2017</p>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="script/navbarFade.js"></script>
</body>
</html>