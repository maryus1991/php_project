<?php
$severname = "localhost";
$username = "root";
$password = "";
$db_name = 'link_conversion_sabzlearn';

try {
    $connection = new PDO("mysql:host=$severname;dbname=$db_name", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}


