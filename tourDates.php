<!DOCTYPE html>
<html>
<head>
    <title>OKGO Tour Dates</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/tourdates.css">
</head>
<body>
<?php include('PHP/navbar.php'); ?>
<div class="container">
    <div class="table-responsive">
        <h1><u>OKGO Future Tour Dates</u></h1>
        <h3>One thing we don't do is break promises, so here are new Fall dates. Note that the performance arts shows
            will be the band live scoring their videos. These shows will be family-friendly and can't miss as the band
            has never previously done this before. What could go wrong? <b>You not being there.</b></h3>
        <br/>
        <div align="center">
            <button type="button" name="load_data" id="load_data" class="btn btn-success">Show Dates</button>
        </div>
        <br/>
        <div id="table">
        </div>
    </div>
</div>
<div class="container-fluid">
    <div id="clockdiv">
        <h3>WE GO ON TOUR IN</h3>
        <div>
            <span class="days"></span>
            <div class="smalltext">Days</div>
        </div>
        <div>
            <span class="hours"></span>
            <div class="smalltext">Hours</div>
        </div>
        <div>
            <span class="minutes"></span>
            <div class="smalltext">Minutes</div>
        </div>
        <div>
            <span class="seconds"></span>
            <div class="smalltext">Seconds</div>
        </div>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="script/tour.js"></script>
<script src="script/countdown.js"></script>
<script src="script/navbarFade.js"></script>
</html>