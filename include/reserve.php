<?php
require_once('connectvars.php');
require_once('appvars.php');

$debug = false;

$date = test_input(strval($_POST["d"]));
$time = test_input(strval($_POST["t"]).":00");
$phone = test_input(strval($_POST["p"]));
$email = test_input(strval($_POST["e"]));
$tables = $_POST["tables"];
$tables = explode(",", $tables);

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// PDO CONNECTION
try {
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql_str = "";
    //example: INSERT INTO dv_table (table_id, table_reserved, email, phone, res_date, res_time) VALUES (1, 1, "phone", "email", "2016-10-05", "15:00:00");
    for ($x = 0; $x < count($tables); $x++){
        $sql_str .= "INSERT INTO dv_table (table_id, table_reserved, email, phone, res_date, res_time) VALUES (".$tables[$x].", 1, \"".$email."\", \"".$phone."\", \"".$date."\", \"".$time."\");";
    }
    $stmt = $conn->prepare($sql_str);
    $stmt->execute();

    echo "Reservation confirmation: <br> You have reserved table(s): <br>";
    for ($x = 0; $x < count($tables); $x++){
        echo $tables[$x]." at ".$time." on ".$date."<br>";
    }
    echo "<br><br> Thanks for reserving!";

} catch (PDOException $exception){
    echo "Connection failed: " . $exception->getMessage();
}



if ($debug){
    echo $date.'<br>';
    echo $time.'<br>';
    echo $phone.'<br>';
    echo $email.'<br>';
    for ($x = 0; $x < count($tables); $x++) {
        echo $tables[$x] . '<br>';
    }
}
?>