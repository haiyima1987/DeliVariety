<!--post request to order and pay-->
<?php
require_once('include/appvars.php');
require_once('include/connectvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Error connecting to MySQL server.');

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

<!--make a lunch box on the side-->
<div class="lunchBox col-sm-1">
    <?php
    if (isset($_SESSION['box']) && !empty($_SESSION['box'])) {
        $query_ordered = "SELECT * FROM dv_menu WHERE item_id in (";
        foreach ($_SESSION['box'] as $id => $value) {
            $query_ordered .= $id . ',';
        }
        $query_ordered = substr($query_ordered, 0, -1) . ')';

        $rowsOrdered = mysqli_query($dbc, $query_ordered);
        while ($row = mysqli_fetch_array($rowsOrdered)) {
            ?>
            <div class="boxItem row">
                <div class="boxImg col-sm-8">
                    <img src="<?php echo DV_UPLOADPATH . $row['item_img'] ?>" alt="">
                </div>
                <div class="boxText col-sm-3">
                    <h4><?php echo $_SESSION['box'][$row['item_id']]['quantity'] ?></h4>
                </div>
            </div>
            <?php
        }
        ?>
        <div id="btnList" class="btnGreen">
            <a class="btnGreen">OVERVIEW</a>
        </div>
        <?php
    }
//    else {
//        echo '<h3>Your List</h3>';
//    }
    ?>
</div>

<!--lunch box pop up window-->
<div class="payBox col-md-6 col-sm-10">
    <form method="post" action="menu.php">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($_SESSION['box'])) {
                $query_pay_box = "SELECT * FROM dv_menu WHERE item_id in (";
                foreach ($_SESSION['box'] as $id => $value) {
                    $query_pay_box .= $id . ',';
                }
                $query_pay_box = substr($query_pay_box, 0, -1) . ')';
                $rows = mysqli_query($dbc, $query_pay_box);
                $index = 1;
                $total_price = 0;
                while ($row = mysqli_fetch_array($rows)) {
                    $subtotal = $row['price'] * $_SESSION['box'][$row['item_id']]['quantity'];
                    $total_price += $subtotal;
                    ?>
                    <tr>
                        <th><?php echo $index ?></th>
                        <td class="imgPayBox"><img src="<?php echo DV_UPLOADPATH . $row['item_img'] ?>" alt=""></td>
                        <td><input type="number" name="quantity[<?php echo $row['item_id'] ?>]" size="2" value="<?php echo $_SESSION['box'][$row['item_id']]['quantity'] ?>" min="0"></td>
                        <td>€<?php echo $row['price'] ?></td>
                        <td>€<?php echo $subtotal ?></td>
                    </tr>
                    <?php
                    $index++;
                }
            ?>
            <tr>
                <td colspan="5">Total Price: <?php echo $total_price ?></td>
            </tr>
            <?php
            }
            mysqli_close($dbc);
            ?>
            </tbody>
        </table>
        <input type="submit" name="submit" value="ORDER">
    </form>
</div>