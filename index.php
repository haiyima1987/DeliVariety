<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['username'] = $_COOKIE['username'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DeliVariety</title>
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
<!--header, menu, logo, registration buttons, and main text and main menu button-->
<div class="header">
    <!--<img class="shape" src="img/background_full_shape.png" alt="shape">-->
    <div class="bgCanvas">
        <div class="banner row">
            <div class="logoMenu col-md-4 col-sm-5 col-xs-6">
                <a href="#"><img src="img/logo.png" alt="logo"></a>
                <div class="btnMenu">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                    <button class="labelMenu" type="button">MENU</button>
                </div>
            </div>
            <div class="btnRegister col-lg-3 col-md-4 col-sm-5 col-xs-5 pull-right">
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo '<p>Welcome back! Now order with 10% discount!</p>' .
                        '<a href="logout.php">Log Out</a>';
                } else {
                    echo '<a href="registration.php">Sign Up</a>' .
                        '<a href="login.php">Log In</a>';
                }
                ?>
            </div>
        </div>
    </div>
    <ul class="carousel">
        <li class="slide"><img class="shape" src="img/background_full1.png" alt="shape"></li>
        <li class="slide"><img class="shape" src="img/background_full2.png" alt="shape"></li>
        <li class="slide"><img class="shape" src="img/background_full3.png" alt="shape"></li>
        <li class="slide"><img class="shape" src="img/background_full1.png" alt="shape"></li>
    </ul>
    <div class="pageDotContainer">
        <ol class="pageDotGroup">
            <li id="dot1" class="pageDot active"></li>
            <li id="dot2" class="pageDot"></li>
            <li id="dot3" class="pageDot"></li>
        </ol>
    </div>
    <div class="carouselBtns">
        <div id="prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
        <div id="next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
        <div id="start"><i class="fa fa-play" aria-hidden="true"></i></div>
        <div id="pause"><i class="fa fa-pause" aria-hidden="true"></i></div>
    </div>
    <!--jumbotron-->
    <div class="mainText">
        <div class="row">
            <div class="introText col-md-7 col-sm-6 col-xs-6">
                <h1>Welcome to DeliVariety</h1>
                <h3>Delivery & Variety</h3>
            </div>
            <div id="btnOrder" class="btnGreen col-md-5 col-sm-6 col-xs-6">
                <a href="menu.php">MENU & ONLINE ORDER</a>
            </div>
        </div>
    </div>
</div>

<div class="lunchBox col-xs-2 col-sm-1">
</div>

<!--lunch box pop up window-->
<div class="payBox col-md-6 col-sm-8 col-xs-10">
</div>

<?php
require_once('include/overlay.php');
?>

<!--view location button and text-->
<div class="secondary">
    <h3>MORE CHOICES, MORE EFFICIENCY, AND LESS PRICE</h3><br>
    <p>We have a nice variety in our restaurant to meet your different needs</p>
    <p>Busy? No problem. We will deliver your order to you</p>
    <p>The food tastes great? Awesome! You are always welcomed to visit us</p>
    <p>Our registered customers always get a discount</p>
    <div id="btnLocation" class="btnGreen">
        <a href="reservation.php">VIEW OUR LOCATION</a>
    </div>
</div>

<!--3 pictures with buttons in the middle-->
<div class="bigMenu">
    <div class="menuWrap row">
        <div class="bigMenuItem col-md-4 col-sm-4 col-xs-4">
            <a href="menu.php">
                <img src="img/3_block_one.png" alt="one">
                <div class="bigMenuText">
                    <h2>ORDER ONLINE</h2>
                </div>
            </a>
        </div>
        <div class="bigMenuItem col-md-4 col-sm-4 col-xs-4">
            <a href="menu.php">
                <img src="img/3_block_two.png" alt="two">
                <div class="bigMenuText">
                    <h2>VIEW MENU</h2>
                </div>
            </a>
        </div>
        <div class="bigMenuItem col-md-4 col-sm-4 col-xs-4">
            <a href="reservation.php">
                <img src="img/3_block_three.png" alt="three">
                <div class="bigMenuText">
                    <h2>RESERVATION</h2>
                </div>
            </a>
        </div>
    </div>
</div>

<?php
require_once('include/footer.php');
?>

<script src="https://use.fontawesome.com/5a79a0d633.js"></script>
<script src="js/main.js"></script>
</body>


</html>