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
    <title>DeliVariety - Contact</title>
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

<?php
require_once('include/header.php');
require_once('include/overlay.php');
?>

<!--google-maps and contact info-->
<div class="contentWrapper">
    <div class="contentContact row">
        <div class="google-map col-md-6 col-sm-6 col-xs-12">
            <iframe
                width="100%"
                height="400"
                frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBcA0vB22WqnvZdABLLYkiSLiMwTDjzHOg
                    &q=Eindhoven,Netherlands" allowfullscreen>
            </iframe>
        </div>
        <div class="contactInfo col-md-6 col-sm-6 col-xs-12">
            <h1>Opening Times!</h1>
            <h3>Weekdays:</h3>
            <p>08:00 to 22:00</p>
            <h3>Weekends and holidays:</h3>
            <p>08:00 to 24:00</p>

            <h1>Contact us!</h1>
            <p>Phone: 04764462324</p>
            <p>From 08:00 to 24:00</p>
            <p>Email: contact@delivariety.nl</p>
            <p>At any time</p>
            <div class="socialLink">
                <div><p>Facebook: </p></div>
                <div><img src="img/logo_facebook.png" alt="facebook"></div>
            </div>
            <div class="socialLink">
                <div><p>Twitter:</p></div>
                <div><img src="img/logo_twitter.png" alt="twitter"></div>
            </div>
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