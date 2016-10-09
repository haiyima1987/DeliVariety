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
    <title>DeliVariety - Reservations</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- jquery-timepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css"
          rel="stylesheet">
    <!-- bootstrap-datepicker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
          rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">

    <script src="js/reservation.js"></script>
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
        <h5>RESERVATION</h5>
    </div>
</div>
<?php
require_once('include/appvars.php');
require_once('include/overlay.php');
$current_time = date('H:i');
$current_date = date('Y-m-d');
?>

<div class="contentWrapper">
    <div class="reservationsContent row">
        <div id="tableLayoutPHP" class="topDownMap col-md-8 col-sm-12 col-xs-12">
            <p>Tables loading...</p>
        </div>
        <?php
        require_once('include/reserve_form.php');
        ?>
    </div>
</div>

<?php
require_once('include/footer.php');
?>

<script src="https://use.fontawesome.com/5a79a0d633.js"></script>
<script src="js/main.js"></script>

</body>
</html>