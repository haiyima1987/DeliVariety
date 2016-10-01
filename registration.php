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

<?php
require_once ('header.php');
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
            <li><a href="reservation.php">Reservation</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="btnRegOverlay">
            <a href="#">Sign Up</a>
            <a href="login.php">Log In</a>
        </div>
    </div>
</div>

<?php
require_once('connectvars.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Error connecting to MySQL server.');

if (isset($_POST["submit"])) {
    $first_name = mysqli_real_escape_string($dbc, $_POST['firstName']);
    $last_name = mysqli_real_escape_string($dbc, $_POST['lastName']);
    $birthday = mysqli_real_escape_string($dbc, $_POST['bday']);
    $gender = mysqli_real_escape_string($dbc, $_POST['gender']);
    $user_name = mysqli_real_escape_string($dbc, $_POST['username']);
    $password1 = mysqli_real_escape_string($dbc, $_POST['password1']);
    $password2 = mysqli_real_escape_string($dbc, $_POST['password2']);
    $email = mysqli_real_escape_string($dbc, $_POST['email']);
    $phone = mysqli_real_escape_string($dbc, $_POST['phone']);
    $form_incomplete = false;

    if (!empty($last_name) && !empty($user_name) && !empty($password1) && !empty($password2) && !empty($email) && ($password1 == $password2)) {
        $query = "SELECT * FROM dv_user WHERE username = '$user_name'";
        $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 0) {
            $query = "INSERT INTO dv_user (firstname, lastname, birthday, gender, username, password, email, phone)" .
                "VALUES ('$first_name', '$last_name', '$birthday', '$gender', '$user_name', SHA('$password1'), '$email', '$phone')";
            $result = mysqli_query($dbc, $query);

            echo $first_name . ' ' . $last_name . ' has registered as a member of DeliVariety.<br/>';
            echo 'Your username is: ' . $user_name . '<br/>';
            echo 'Your password is: ' . $password1 . '<br/>';
            echo 'Thank you so much for favoring DeliVariety Food & Catering!';

            mysqli_close($dbc); // redirect to home page??
        } else {
            $form_incomplete = true;
            echo 'An account with the same name exists, please use another name.';
        }
    } else {
        $form_incomplete = true;
        echo 'Last Name, username, password, and email address cannot be empty.';
    }
} else {
    $form_incomplete = true;
}

if ($form_incomplete) {
    ?>
    <!--registration form-->
    <div class="signUpForm col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form-horizontal">
            <fieldset>
                <legend>Personal Information:</legend>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="firstName">First Name:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="firstName" placeholder="First Name"
                               value="<?php if (!empty($first_name)) echo $first_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="lastName">Last Name:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="lastName" placeholder="Last Name"
                               value="<?php if (!empty($last_name)) echo $last_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="bday">Birthday:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="bday" placeholder="Birthday"
                               value="<?php if (!empty($birthday)) echo $birthday; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="gender">Gender:</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="gender" value="male">Male</label>
                        <label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
                    </div>
                </div>
            </fieldset>
            <br>
            <fieldset>
                <legend>Contact Information:</legend>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="username">Username:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="username" placeholder="Enter username"
                               value="<?php if (!empty($user_name)) echo $user_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="password1">Password:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password1" placeholder="Enter password"
                               value="<?php if (!empty($password1)) echo $password1; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="password2">Confirm:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password2" placeholder="Enter password again"
                               value="<?php if (!empty($password2)) echo $password2; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="email">Email:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" placeholder="Enter email"
                               value="<?php if (!empty($email)) echo $email; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="phone">Phone:</label>
                    <div class="col-sm-9">
                        <input type="tel" class="form-control" name="phone" placeholder="Enter phone number"
                               value="<?php if (!empty($phone)) echo $phone; ?>">
                    </div>
                </div>
            </fieldset>
            <br>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-default" name="submit">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
    <?php
}

require_once ('footer.php');
?>

<script src="https://use.fontawesome.com/5a79a0d633.js"></script>
<script src="js/main.js"></script>

</body>
</html>