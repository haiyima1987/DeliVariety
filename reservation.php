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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css" rel="stylesheet">
    <!-- bootstrap-datepicker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet">
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
require_once ('include/appvars.php');
$current_time = date('H:i');
$current_date = date('Y-m-d');
?>

<div class="contentWrapper">
    <div class="reservationsContent row">
        <div id="tableLayoutPHP" class="topDownMap col-md-8 col-sm-12 col-xs-12">
            <p>Tables loading...</p>
        </div>
        <div class="sideBar col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
            <form class="form-horizontal reserveForm" onsubmit="event.preventDefault(); displayConfirmation();">
                <filedset>
                    <legend>Date & Time:</legend>
                    <div class="form-group">
                        <label class="control-label col-md- 3 col-sm-3 col-xs-3" for="date">Date:</label>
                        <div class="col-md-12 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" id="date" value="<?php echo $current_date; ?>" onchange="updateTables()" name="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md- 3 col-sm-3 col-xs-3" for="time">Time:</label>
                        <div class="col-md-12 col-sm-9 col-xs-9">
                            <input id="timeInput" type="text" value="<?php echo $current_time; ?>" class="time ui-timepicker-input form-control" autocomplete="off" onchange="updateTables()" name="time">
                        </div>
                    </div>
                </filedset>
                <filedset>
                    <legend>Contact Information:</legend>
                    <div class="form-group">
                        <label class="control-label col-md- 3 col-sm-3 col-xs-3" for="phone">Phone:</label>
                        <div class="col-md-12 col-sm-9 col-xs-9">
                            <input type="tel" class="form-control" id="phone" placeholder="Enter phone number" name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md- 3 col-sm-3 col-xs-3" for="email">Email:</label>
                        <div class="col-md-12 col-sm-9 col-xs-9">
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                    </div>
                </filedset>
                <div class="form-group">
                    <div class="col-md-9 col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4">
                        <button type="submit" name="Submit" class="btn btn-default">Make Reservation</button>
                    </div>
                </div>
            </form>
            <div id="regConfirm"></div>
        </div>
    </div>
</div>

<?php
require_once('include/footer.php');
?>

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