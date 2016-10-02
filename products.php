<?php
require_once('include/appvars.php');
require_once('include/connectvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Error connecting to MySQL server.');
$msg = "";

// get selected item and store it in session
if (isset($_GET['action']) && $_GET['action'] == "add") {
    $id = $_GET['id'];
    if (isset($_SESSION['box'][$id])) {
        $_SESSION['box'][$id]['quantity']++;
    } else {
        $query = "SELECT * FROM dv_menu WHERE item_id = $id";
        $rows = mysqli_query($dbc, $query);
        if (mysqli_num_rows($rows) != 0) {
            $row = mysqli_fetch_array($rows);
            $_SESSION['box'][$row['item_id']] = array("quantity" => 1, "price" => $row['price']);
        } else {
            $msg = "Product is not valid at the moment";
        }
    }
}
?>

<!--menu category and items inside each category-->
<div class="contentWrapper">
    <div class="content">
        <!--for the code above, show the message if a product is not available-->
        <?php
        if (!empty($msg)) {
            echo "<h2>$msg</h2>";
        }

        // loop and load all products
        $query_count = "SELECT COUNT(*) as total FROM dv_category";
        $count = mysqli_fetch_array(mysqli_query($dbc, $query_count))['total'];

        for ($int = 1; $int <= $count; $int++) {
            $query_data = "SELECT * FROM dv_menu m, dv_category c WHERE m.category_id = c.category_id AND m.category_id = $int";
            $rows = mysqli_query($dbc, $query_data);
            $index = 0;
            while ($row = mysqli_fetch_array($rows)) {
                if ($index == 0) {
                    if ($int % 2 != 0) {
                        echo '<div class="menuCategory row">' .
                            '<h3>' . $row['category_name'] . '</h3>';
                    } else {
                        echo '<div class="menuCategory darkMenuBar row">' .
                            '<h3>' . $row['category_name'] . '</h3>';
                    }
                }
                echo '<div class="menuItem col-md-3 col-sm-3 col-xs-6">';
                echo '<img src="' . DV_UPLOADPATH . $row['item_img'] . '" alt=\"item\">';
                echo '<div class="btnItemPrice">€ ' . $row['price'] . '</div>';
                echo '<a href="menu.php?action=add&id=' . $row['item_id'] . '" class="btnItemOrder">ORDER</a>';
                echo '<p>' . $row['item_name'] . '</p>';
                echo '</div>';
                $index++;
            }
            echo '</div>';
        }
        ?>
    </div>
</div>

<?php
mysqli_close($dbc);
?>