<!--post request to order and pay-->
<?php
session_start();
require_once('include/appvars.php');
require_once('include/connectvars.php');
require_once('class/dbhelper.php');

$dbc_helper = new DbcHelper(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

?>

<form method="post" action="../menu.php">
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
            $rows = $dbc_helper->selectUpdateData($query_pay_box);

            $index = 1;
            $total_price = 0;
            foreach ($rows as $row) {
                $subtotal = $row['price'] * $_SESSION['box'][$row['item_id']]['quantity'];
                $total_price += $subtotal;
                ?>
                <tr>
                    <th><?php echo $index ?></th>
                    <td class="imgPayBox"><img src="<?php echo DV_UPLOADPATH . $row['item_img'] ?>" alt=""></td>
                    <td><input type="number" name="quantity[<?php echo $row['item_id'] ?>]" size="2"
                               value="<?php echo $_SESSION['box'][$row['item_id']]['quantity'] ?>" min="0"></td>
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
        ?>
        </tbody>
    </table>
    <div class="payBoxClose col-md-2 col-sm-2 col-xs-2">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>
    <input type="submit" name="submit" value="ORDER">
</form>

<script src="../js/paybox.js"></script>