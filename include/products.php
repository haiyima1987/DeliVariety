<?php
require_once('include/appvars.php');
require_once('include/connectvars.php');
require_once('class/dbhelper.php');

$dbc_helper = new DbcHelper(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$msg = "";
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
        $count = $dbc_helper->selectUpdateData($query_count)->fetchColumn(); // check num of rows that match the select stmt

        for ($int = 1; $int <= $count; $int++) {
            $query_data = "SELECT * FROM dv_menu m, dv_category c WHERE m.category_id = c.category_id AND m.category_id = $int";
            $rows = $dbc_helper->selectUpdateData($query_data)->fetchAll(PDO::FETCH_ASSOC);

            $index = 0;
            foreach ($rows as $row) {
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
                echo '<a id="' . $row['item_id'] . '" action="add" class="btnItemOrder">ORDER</a>';
                echo '<p>' . $row['item_name'] . '</p>';
                echo '</div>';
                $index++;
            }
            echo '</div>';
        }
        ?>
    </div>
</div>