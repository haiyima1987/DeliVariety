<?php
require_once('include/connectvars.php');
require_once('include/appvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Failed to connect to MySql server.');

$date = strval($_GET['d']);
$time = strval($_GET['t']).":00";
?>

<link href="css/stylesheet.css" rel="stylesheet">
<div class="topDownMap col-md-8 col-sm-12 col-xs-12">
    <div class="seatingRow row">
        <div class="seatingElement col-md-3">
            <img src="
            <?php
            $query_table = "SELECT COUNT(*) as total FROM dv_table WHERE table_id = 1 AND res_date = \"".$date."\" AND res_time = \"".$time."\"";
            $table_reserved = mysqli_fetch_array(mysqli_query($dbc, $query_table))['total'];
            if($table_reserved > 0){
                echo DV_UPLOADPATH.'table_reserved.png"';
            } else {
                echo DV_UPLOADPATH.'table.png" alt="available" class="tableImage"';
            }
            ?>>
        </div>
        <div class="seatingElement col-md-3">

        </div>
        <div class="seatingElement col-md-3">
            <img src="img/table.png" alt="available" class="tableImage">
        </div>
        <div class="seatingElement col-md-3">
            <img src="img/table.png" alt="available" class="tableImage">
        </div>
    </div>
    <div class="seatingRow row">
        <div class="seatingElement col-md-3">
            <img src="img/table.png" alt="available" class="tableImage">
        </div>
        <div class="seatingElement col-md-3">

        </div>
        <div class="seatingElement col-md-3">

        </div>
        <div class="seatingElement col-md-3">
            <img src="img/table.png" alt="available" class="tableImage">
        </div>
    </div>
    <div class="seatingRow row">
        <div class="seatingElement col-md-3">
            <img src="img/table.png" alt="available" class="tableImage">
        </div>
        <div class="seatingElement col-md-3">
            <img src="img/table.png" alt="available" class="tableImage">
        </div>
        <div class="seatingElement col-md-3">

        </div>
        <div class="seatingElement col-md-3">
            <img src="img/table.png" alt="available" class="tableImage">
        </div>
    </div>
    <p><?php
        echo date(DATE_RFC2822).'<br>';
        echo $time.'<br>';
        echo $date.'<br>';
        echo $query_table.'<br>';
        echo $table_reserved;
        ?>
    </p>
</div>
