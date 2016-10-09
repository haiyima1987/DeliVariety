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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/stylesheet.css" rel="stylesheet">
</head>

<body>
<?php
require_once('include/header.php');
require_once('include/overlay.php');

// temporarily post to menu.php, will make a payment page in the future
if (!empty($_SESSION['box'])) {
    if (isset($_POST["submit"])) {
        foreach ($_POST['quantity'] as $key => $value) {
            if ($value == 0) {
                unset($_SESSION['box'][$key]);
            } else {
                $_SESSION['box'][$key]['quantity'] = $value;
            }
        }
    }
}
?>

<div class="lunchBox col-sm-1">
</div>

<!--lunch box pop up window-->
<div class="payBox col-md-6 col-sm-10">
</div>

<?php
require_once('include/products.php');
require_once('include/footer.php');
?>

<script src="https://use.fontawesome.com/5a79a0d633.js"></script>
<script src="js/main.js"></script>

</body>
</html>