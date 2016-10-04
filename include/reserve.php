<?php

require_once('connectvars.php');
require_once('appvars.php');

// PDO CONNECTION
try {
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $exception){
    echo "Connection failed: " . $exception->getMessage();
}

?>