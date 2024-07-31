<?php
global $connection;
require_once('./../config/loader.php');

if (isset($_POST['signin'])) {
    // parameters
    try{
        $login_emu = $_POST['login_emu'];
        $loginpass = $_POST['loginpass'];

        // sql
        $sql_query = 'SELECT * FROM users WHERE (username = :key OR email = :key OR mobile = :key ) AND (pass = :pass) LIMIT 1;';
        // stmt
        $stmt = $connection->prepare($sql_query);
        $stmt->bindValue(':key', $login_emu);
        $stmt->bindValue(':pass', $loginpass);

        $stmt->execute();
        $result = $stmt->rowCount();
        // log in
        if ($result === 1   ) {
            print '<script>alert("Login Successful");</script>';
//            header("location: ../index.php");
        }else{
            header('Location: ../index.php?noresult=1');

        }
    }catch (PDOException $e){
        print 'not regesterd or not correct username or password';
    }
}