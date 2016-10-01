<?php
require_once('appvars.php');

function generate_menu_items($dbc, $round)
{
    $query = "SELECT * FROM dv_menu WHERE category_id = $round";
    $result = mysqli_query($dbc, $query);
//    if (!$result) {
//        printf("Error: %s\n", mysqli_error($dbc));
//        exit();
//    }
    $query_name = "SELECT category_name FROM dv_category WHERE category_id = $round";
    $result_name = mysqli_query($dbc, $query_name);
    $row_name = mysqli_fetch_array($result_name);
    $index = 0;

    while ($row = mysqli_fetch_array($result)) {
        if ($index == 0) {
            if ($round % 2 != 0) {
                echo '<div class="menuCategory row">' .
                    '<h3>' . $row_name['category_name'] . '</h3>';
            } else {
                echo '<div class="menuCategory darkMenuBar row">' .
                    '<h3>' . $row_name['category_name'] . '</h3>';
            }
        }
        echo '<div class="menuItem col-md-3 col-sm-3 col-xs-6">';
        echo '<img src="' . DV_UPLOADPATH . $row['item_img'] . '" alt=\"item\">';
        echo '<button class="btnItemOrder" type="button">ORDER</button>';
        echo '<p>' . $row['item_name'] . '</p>';
        echo '</div>';
        $index++;
    }

    echo '</div>';
}

?>