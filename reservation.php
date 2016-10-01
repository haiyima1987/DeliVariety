<!DOCTYPE html>
<html lang="en">

<head>
    <title>DeliVariety - Reservations</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/stylesheet.css" rel="stylesheet">
</head>

<body>
<div class="otherHeader">
    <img class="shape" src="img/restaurant_overview_shape.png" alt="shape">
    <div class="bgCanvas">
        <div class="otherBanner row">
            <div class="logoMenu col-md-4">
                <a href="index.php"><img src="img/logo.png" alt="logo"></a>
                <div class="btnMenu">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                    <button class="labelMenu" type="button">MENU</button>
                </div>
            </div>
            <div class="btnRegister col-md-4 pull-right">
                <a href="registration.php">Sign Up</a>
                <a href="login.php">Log In</a>
            </div>
        </div>
        <h5>RESERVATION</h5>
    </div>
</div>

<?php
require_once ('appvars.php');
?>

<div class="contentWrapper">
    <div class="reservationsContent row">
        <div class="topDownMap col-md-8 col-sm-12 col-xs-12">
            <div class="seatingRow row">
                <div class="seatingElement col-md-3">
                    <img src="img/table.jpg" alt="available" class="tableImage">
                </div>
                <div class="seatingElement col-md-3">

                </div>
                <div class="seatingElement col-md-3">
                    <img src="img/table.jpg" alt="available" class="tableImage">
                </div>
                <div class="seatingElement col-md-3">
                    <img src="img/table.jpg" alt="available" class="tableImage">
                </div>
            </div>
            <div class="seatingRow row">
                <div class="seatingElement col-md-3">
                    <img src="img/table.jpg" alt="available" class="tableImage">
                </div>
                <div class="seatingElement col-md-3">

                </div>
                <div class="seatingElement col-md-3">

                </div>
                <div class="seatingElement col-md-3">
                    <img src="img/table.jpg" alt="available" class="tableImage">
                </div>
            </div>
            <div class="seatingRow row">
                <div class="seatingElement col-md-3">
                    <img src="img/table.jpg" alt="available" class="tableImage">
                </div>
                <div class="seatingElement col-md-3">
                    <img src="img/table.jpg" alt="available" class="tableImage">
                </div>
                <div class="seatingElement col-md-3">

                </div>
                <div class="seatingElement col-md-3">
                    <img src="img/table.jpg" alt="available" class="tableImage">
                </div>
            </div>
        </div>
        <div class="sideBar col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
            <form class="form-horizontal reserveForm">
                <filedset>
                    <legend>Date & Time:</legend>
                    <div class="form-group">
                        <label class="control-label col-md- 3 col-sm-3 col-xs-3" for="date">Date:</label>
                        <div class="col-md-12 col-sm-9 col-xs-9">
                            <input type="date" class="form-control" id="date" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md- 3 col-sm-3 col-xs-3" for="time">Time:</label>
                        <div class="col-md-12 col-sm-9 col-xs-9">
                            <input type="time" class="form-control" id="time" placeholder="">
                        </div>
                    </div>
                </filedset>
                <filedset>
                    <legend>Contact Information:</legend>
                    <div class="form-group">
                        <label class="control-label col-md- 3 col-sm-3 col-xs-3" for="phone">Phone:</label>
                        <div class="col-md-12 col-sm-9 col-xs-9">
                            <input type="tel" class="form-control" id="phone" placeholder="Enter phone number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md- 3 col-sm-3 col-xs-3" for="email">Email:</label>
                        <div class="col-md-12 col-sm-9 col-xs-9">
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                    </div>
                </filedset>
                <div class="form-group">
                    <div class="col-md-9 col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4">
                        <button type="submit" class="btn btn-default">Make Reservation</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="bottom">
    <div class="social">
        <div class="follow"><img src="img/logo_facebook.png" alt="facebook"></div>
        <div class="follow"><img src="img/logo_instagram.png" alt="instagram"></div>
        <div class="follow"><img src="img/logo_twitter.png" alt="twitter"></div>
        <p>You are always welcomed to join us and follow us to get the latest offers</p>
    </div>
    <div class="copyright">
        <p>© DeliVariety Food & Catering. All Rights Reserved.</p>
    </div>
</div>

<!--overlay for the menu-->
<div class="overlay">
    <div class="btnClose col-md-4 col-sm-4 col-xs-4">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>
    <div class="navContainer col-md-4 col-sm-4 col-xs-4">
        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="menu.php">Food Menu</a></li>
            <li><a href="#">Reservation</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="btnRegOverlay">
            <a href="registration.php">Sign Up</a>
            <a href="login.php">Log In</a>
        </div>
    </div>
</div>

<div class="scrollUp">
    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
</div>

<script src="https://use.fontawesome.com/5a79a0d633.js"></script>
<script src="js/main.js"></script>

</body>
</html>