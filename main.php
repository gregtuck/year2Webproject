<!DOCTYPE html>
<html>
<head>
    <title>OKGO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar">
<?php include('PHP/navbar.php'); ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="images/okgo.jpg" alt="Pony" width="1200" height="700">
        </div>
        <div class="item">
            <img src="images/okgo2.jpg" alt="paint" width="1200" height="700">
        </div>
        <div class="item">
            <img src="images/okgo3.jpg" alt="Anti-Gravity" width="1200" height="700">
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div id="about" class="container-fluid">
    <div class="row">
        <h2>About The Band</h2><br>
        <h4>
            Formed as a quartet in Chicago in 1998 and relocated to Los Angeles three years later, OK Go (Damian
            Kulash, Tim Nordwind, Dan Konopka, Andy Ross) have spent their career in a steady state of
            transformation. The four songs of the all-new Upside Out EP represent the first preview of Hungry
            Ghosts, due out in the fall on the band’s own Paracadute. This is the band’s fourth full-length and the
            newest addition to a curriculum vitae filled with experimentation in a variety of mediums.
        </h4><br>
        <p>The band worked with longtime producer and friend Dave Fridmann (Flaming Lips, Weezer, MGMT), while also
            enlisting a new collaborator in Los Angeles, veteran Tony Hoffer, (Beck, Phoenix, Foster the People) to
            create their most comfortable and far-reaching songs yet. Building on (and deconstructing) 15 years of
            pop-rock smarts, musical friendship, and band-of-the-future innovations the EP, Upside Out, offers a
            concise overview of forthcoming Hungry Ghosts’ melancholic fireworks (“The Writing’s on the Wall”),
            basement funk parties (“Turn Up The Radio”), IMAX-sized choruses (“The One Moment”), and space-age dance
            floor bangers (“I Won’t Let You Down”).
            Drawn from the same marching orders issued to big-hearted happiness creators as Queen, T. Rex, The Cars
            or Cheap Trick, and a lifetime
            of mixed tapes exchanged by lifelong music fans, Upside Out is a reaffirmation of the sounds and ideas
            that brought the band together in the first place. The four songs provide an assured kick-off to a new
            sequence of interconnected performances, videos, dances, and wild, undreamt fun</p>
        <br>
    </div>
</div>
<?php include('PHP/footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="script/navbarFade.js"></script>
</body>
</html>