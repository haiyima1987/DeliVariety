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