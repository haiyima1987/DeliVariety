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
require_once('include/header_signup_login.php');
require_once('include/connectvars.php');
require_once('include/functions.php');
require_once('include/overlay.php');
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
            do {
                $user_id = generateRandomString();
                $query = "INSERT INTO dv_user (user_id, firstname, lastname, birthday, gender, username, password, email, phone)" .
                    "VALUES ('$user_id', '$first_name', '$last_name', '$birthday', '$gender', '$user_name', sha1('$password1'), '$email', '$phone')";
                $result = mysqli_query($dbc, $query);
            } while (!$result);

            // after registering, automatically sign in
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $user_name;
            setcookie('user_id', $user_id, time() + (60 * 60 * 24 * 30));
            setcookie('username', $user_name, time() + (60 * 60 * 24 * 30));
            ?>

            <div class="alert alert-success col-md-offset-3 col-md-6 confirm">
                You have registered as a member of DeliVariety<br>
                Your username is: <?php echo $user_name ?><br>
                Your password is: <?php echo $password1 ?><br>
                Thank you so much for favoring DeliVariety Food & Catering!<br>
                Now you are logged in and you can<br>
                <div class="btnGreen">
                    <a href="menu.php">Order with 10% discount</a>
                </div>
            </div>

            <?php
            // you can redirect by JavaScript
            // echo "<script>setTimeout(\"location.href = 'http://www.google.com';\",1500);</script>";
            mysqli_close($dbc);
        } else {
            $form_incomplete = true;
            echo '<div class="alert alert-danger col-md-offset-3 col-md-6">An account with the same name exists, please use another name.</div>';
        }
    } else {
        $form_incomplete = true;
        echo '<div class="alert alert-danger col-md-offset-3 col-md-6">Last Name, username, password, and email address cannot be empty.</div>';
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
require_once('include/footer.php');
?>

<script src="https://use.fontawesome.com/5a79a0d633.js"></script>
<script src="js/main.js"></script>

</body>
</html>