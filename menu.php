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
<div class="otherHeader">
    <img class="shape" src="img/restaurant_overview_shape.png" alt="shape">
    <div class="bgCanvas">
        <div class="otherBanner row">
            <div class="logoMenu col-md-4">
                <a href="index.html"><img src="img/logo.png" alt="logo"></a>
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
        <h5>ORDER AS YOU WISH</h5>
    </div>
</div>

<!--menu category and items inside each category-->
<div class="contentWrapper">
    <div class="content">
        <div class="menuCategory row">
            <p>SNACKS</p>
            <?php
            require_once('appvars.php');

            $database = mysqli_connect() or die('Error connecting to MySQL server.');
            $query = "SELECT * FROM MENU WHERE category = 1";
            $result = mysqli_query($database, $query);

            while ($Row = mysqli_fetch_array($result)) {
                echo '<div class="menuItem col-md-3 col-sm-3 col-xs-6">';
                echo '<img src="' . DV_UPLOADPATH . $Row['src'] . '" alt=\"item\">';
                echo '<button class="btnItemOrder" type="button">ORDER</button>';
                echo '<p>' . $Row['info'] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
        <div class="menuCategory darkMenuBar row">
            <p>STEAKS</p>
            <?php
            $query = "SELECT * FROM MENU WHERE category = 2";
            $result = mysqli_query($database, $query);

            while ($Row = mysqli_fetch_array($result)) {
                echo '<div class="menuItem col-md-3 col-sm-3 col-xs-6">';
                echo '<img src="' . DV_UPLOADPATH . $Row['src'] . '" alt=\"item\">';
                echo '<button class="btnItemOrder" type="button">ORDER</button>';
                echo '<p>' . $Row['info'] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
        <div class="menuCategory row">
            <p>NOODLES</p>
            <?php
            $query = "SELECT * FROM MENU WHERE category = 3";
            $result = mysqli_query($database, $query);

            while ($Row = mysqli_fetch_array($result)) {
                echo '<div class="menuItem col-md-3 col-sm-3 col-xs-6">';
                echo '<img src="' . DV_UPLOADPATH . $Row['src'] . '" alt=\"item\">';
                echo '<button class="btnItemOrder" type="button">ORDER</button>';
                echo '<p>' . $Row['info'] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
        <div class="menuCategory darkMenuBar row">
            <p>DUMPLINGS</p>
            <?php
            $query = "SELECT * FROM MENU WHERE category = 4";
            $result = mysqli_query($database, $query);

            while ($Row = mysqli_fetch_array($result)) {
                echo '<div class="menuItem col-md-3 col-sm-3 col-xs-6">';
                echo '<img src="' . DV_UPLOADPATH . $Row['src'] . '" alt=\"item\">';
                echo '<button class="btnItemOrder" type="button">ORDER</button>';
                echo '<p>' . $Row['info'] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>

<?php
mysqli_close($database);
?>

<div class="newsletter">
    <h3>We offer the best varieties and services for you to enjoy</h3>
    <p>Stay up-to-date with our newest varieties, upcoming events, specials and promotions</p>
    <input type="email" name="email" value="">
    <input type="submit" name="submit" value="SIGN UP">
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
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Food Menu</a></li>
            <li><a href="reservation.php">Reservation</a></li>
            <li><a href="contact.html">Contact</a></li>
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