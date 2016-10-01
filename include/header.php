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
        <h5>ORDER AS YOU WISH</h5>
    </div>
</div>