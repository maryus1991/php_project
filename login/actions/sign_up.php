<?php
global $connection;
require_once('./../config/loader.php');

if (isset($_POST['signup'])) {
    try {


//    parameters
        $username = $_POST['userName'];
        $email = $_POST['Email'];
        $mobile = $_POST['MObileNumber'];
        $pass = $_POST['Password'];

//    sql
        $sql = "INSERT INTO users set username = ?, email = ?, mobile = ?, pass = ?";
        // statement
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $mobile);
        $stmt->bindValue(4, $pass);
        $stmt->execute();
//        print 'Created Account Successfully';
        header("location: ../index.php");
    }catch (PDOException $err){
        print $err->getMessage(); ;
    }
}