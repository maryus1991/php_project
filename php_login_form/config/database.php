<?php
$severname = 'localhost';
$username = 'root';
$pass = '';
$db_name = 'login_sabzlearn';
try {
    $connection =  new PDO("mysql:host=$severname;dbname=".$db_name, $username, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    print 'ok';
} catch ( PDOExeption $th) {
    echo 'falled' . $th->getMassage();
}

