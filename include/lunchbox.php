<!--post request to order and pay-->
<?php
session_start();
require_once('appvars.php');
require_once('connectvars.php');
require_once('../class/dbhelper.php');

$dbc_helper = new DbcHelper(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// get selected item and store it in session
if (isset($_GET['action'])) {
    $id = $_GET['id'];
    if ($_GET['action'] == "add") {
        if (isset($_SESSION['box'][$id])) {
            $_SESSION['box'][$id]['quantity']++;
        } else {
            $query_count = "SELECT COUNT(*) FROM dv_menu WHERE item_id = $id";
            $rows_count = $dbc_helper->selectUpdateData($query_count);

            if ($rows_count->fetchColumn() != 0) {
                $query = "SELECT * FROM dv_menu WHERE item_id = $id";
                $row = $dbc_helper->selectUpdateData($query)->fetch(PDO::FETCH_ASSOC);
                $_SESSION['box'][$row['item_id']] = array("quantity" => 1, "price" => $row['price']);
            } else {
                $msg = "Product is not valid at the moment";
            }
        }
    }
    if ($_GET['action'] == "minus") {
        if ($_SESSION['box'][$id]['quantity'] == 1) {
            unset($_SESSION['box'][$id]);
        } else {
            $_SESSION['box'][$id]['quantity']--;
        }
    }
}
//make a lunch box on the side
if (isset($_SESSION['box']) && !empty($_SESSION['box'])) {
    $query_ordered = "SELECT * FROM dv_menu WHERE item_id in (";
    foreach ($_SESSION['box'] as $id => $value) {
        $query_ordered .= $id . ',';
    }
    $query_ordered = substr($query_ordered, 0, -1) . ')';
    $rows = $dbc_helper->selectUpdateData($query_ordered)->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $row) {
        ?>
        <div class="boxItem row">
            <div class="boxText">
                <p><?php echo $_SESSION['box'][$row['item_id']]['quantity'] ?></p>
            </div>
            <div class="boxImg col-xs-9 col-sm-9">
                <img src="<?php echo DV_UPLOADPATH . $row['item_img'] ?>" alt="">
            </div>
            <div class="btnItemChange col-xs-3 col-sm-3">
                <a class="btnPlus" id="<?php echo $row['item_id'] ?>" action="add"">
                <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                <a class="btnMinus" id="<?php echo $row['item_id'] ?>" action="minus"">
                <i class="fa fa-minus-circle" aria-hidden="true"></i></a>
            </div>
        </div>
        <?php
    }
    ?>
    <div id="btnList" class="btnGreen">
        <a class="btnGreen">OK</a>
    </div>
    <?php
}
?>

<script src="js/lunchbox.js"></script>