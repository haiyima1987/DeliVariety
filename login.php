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
require_once('include/overlay.php');
require_once('include/connectvars.php');
session_start();
$error_msg = "";

if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Error connecting to MySQL server.');
        $user_name = mysqli_real_escape_string($dbc, $_POST['username']);
        $password = mysqli_real_escape_string($dbc, $_POST['password']);
        echo 'submitted';

        if (!empty($user_name) && !empty($password)) {
            $query = "SELECT user_id, username FROM dv_user WHERE username = '$user_name' AND password = sha1('$password')";
            $result = mysqli_query($dbc, $query);
            echo 'entered';
            echo $password;
            echo sha1($password);

            if (mysqli_num_rows($result) == 1) {

                $data = mysqli_fetch_array($result);
                $_SESSION['user_id'] = $data['user_id'];
                $_SESSION['username'] = $data['username'];
                setcookie('user_id', $data['user_id'], time() + (60 * 60 * 24 * 30));
                setcookie('username', $data['username'], time() + (60 * 60 * 24 * 30));
                $menu_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/menu.php';
                header('Location: ' . $menu_url);
                mysqli_close($dbc);

            } else {
                $error_msg = 'Sorry, you have entered an invalid username or password';
                echo '<div class="alert alert-danger col-md-offset-3 col-md-6">' . $error_msg . '</div>';
            }
        } else {
            $error_msg = 'You must enter username and password to log in';
            echo '<div class="alert alert-danger col-md-offset-3 col-md-6">' . $error_msg . '</div>';
        }
    }
}
?>

<?php
if (empty($_SESSION['user_id'])) {
    ?>
    <!--login form-->
    <div class="signUpForm col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-sm-6 col-sm-offset-3">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form-horizontal">
            <fieldset>
                <legend>Enter Your Login Information:</legend>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="username">Username:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="username" placeholder="Enter username"
                               value="<?php if (!empty($user_name)) echo $user_name ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="password">Password:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" placeholder="Enter password"
                               value="<?php if (!empty($password)) echo $password ?>">
                    </div>
                </div>
            </fieldset>
            <br>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-default" name="submit">Log In</button>
                </div>
            </div>
        </form>
    </div>
    <?php
} else {
    echo '<div class="alert alert-success col-md-offset-3 col-md-6">' . 'Welcome back! ' . $_SESSION['username'] . '</div>';
}
require_once('include/footer.php');
?>

<script src="https://use.fontawesome.com/5a79a0d633.js"></script>
<script src="js/main.js"></script>

</body>
</html>