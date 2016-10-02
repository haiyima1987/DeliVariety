<?php
session_start();

// save cookie info to session in order to change menu overlay and header
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
<?php
require_once('include/header.php');
?>

<!--overlay for the menu-->
<div class="overlay">
    <div class="btnClose col-md-4 col-sm-4 col-xs-4">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>
    <div class="navContainer col-md-4 col-sm-4 col-xs-4">
        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Food Menu</a></li>
            <li><a href="reservation.php">Reservation</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="btnRegOverlay">
            <?php
            if (isset($_SESSION['user_id'])) {
                echo '<a href="logout.php">Log Out</a>';
            } else {
                echo '<a href="registration.php">Sign Up</a>' .
                    '<a href="login.php">Log In</a>';
            }
            ?>
        </div>
    </div>
</div>

<?php
require_once('products.php');
require_once('lunchbox.php');
require_once('include/footer.php');
?>

<script src="https://use.fontawesome.com/5a79a0d633.js"></script>
<script src="js/main.js"></script>

</body>
</html>