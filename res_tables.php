<?php
require_once('include/connectvars.php');
require_once('include/appvars.php');

$date = strval($_GET['d']);
$time = strval($_GET['t']).":00";

// PDO CONNECTION
try {
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT table_id FROM dv_table WHERE res_date = \"".$date."\" AND res_time = \"".$time."\"");
    $stmt->execute();

} catch (PDOException $exception){
    echo "Connection failed: " . $exception->getMessage();
}

$table_id = array(
    array(1,0,2,3),
    array(4,0,0,5),
    array(6,7,0,8)
);

// 0 = no table, 1 = empty table, 2 = reserved table

$table_shape = array(
    array(1,0,1,1),
    array(1,0,0,1),
    array(1,1,0,1)
);

//get the info out of $stmt
$stmt_array = $stmt->fetchAll();
for($x = 0; $x < count($stmt_array); $x++){
    //echo $stmt_array[$x][0];
    for($row = 0; $row < count($table_id); $row++){
        for($col = 0; $col < count($table_id[$row]); $col++){
            if($stmt_array[$x][0] == $table_id[$row][$col]){
                $table_shape[$row][$col] = 2;
            }
        }
    }
}

for($row = 0; $row < count($table_shape); $row++){
    echo '<div class="seatingRow row">';
    for($col = 0; $col < count($table_shape[$row]); $col++){
        echo '<div class="seatingElement col-md-3">';
        switch ($table_shape[$row][$col]){
            case 0:
                break;
            case 1:
                echo '<img src="img/table.png" alt="available" class="tableImage" id="' . $table_id[$row][$col] . '">';
                break;
            case 2:
                echo '<img src="img/table_reserved.png"  id="' . $table_id[$row][$col] . '">';
        }
        echo '</div>';
    }
    echo '</div>';
}

//debug
echo '<br>';
echo date(DATE_RFC2822).'<br>';
echo $time.'<br>';
echo $date;
?>