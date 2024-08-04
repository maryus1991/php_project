<?php
global $connection;
require_once('config/loader.php') ;
if (isset($_POST['submit'])) {
    try {


    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['massage'];
    $mobile = $_POST['mobile'];
    $sql = "INSERT INTO contact (name, email, massage, phone) VALUES (?, ? ,? ,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(1, $name );
    $stmt->bindValue(2, $email );
    $stmt->bindValue(3, $message );
    $stmt->bindValue(4, $mobile );
    $stmt->execute();
    print '<h1 style="color: #4CAF50" >  پیام شما ارسال شد </h1>';

    }catch (PDOException $ex ){
    print '<h1 style="color: darkred" > پیام شما ارسال نشد لطفا دوباره تلاشش فرمایید </h1>';
    print  $ex ;
    }

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تماس با ما </title>
    <style>
        *{
            font-family: DanaFaNum !important;
        }
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;        }

        #shorten-form {
            max-width: 400px;
            margin: auto;
        }

        .shorten-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        #shorten-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        #shorten-result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>تماس با ما</h2>
    <form id="shorten-form" method="post" style="Dispaly='inline'">
<!--        <input name="customLink" type="url" style="text-align: right" class="shorten-input" placeholder="" required>-->
        <input name="name" type="text" style="text-align: right" class="shorten-input " placeholder="نام"  required>
        <input name="mobile" type="text" style="text-align: right" class="shorten-input " placeholder="موبایل"  required>
        <input name="email" type="email" style="text-align: right" class="shorten-input " placeholder="ایمیل"  required>
        <textarea name="massage"  cols="60" rows="5" style="text-align: right" placeholder="... پیام خود را بنویسید"></textarea>
        <br>

        <button type="submit" id="shorten-button" name="submit">ارسال</button>
    </form>


</body>
<br>
<br>
<footer>
    <a href="index.php">
        صفحه اصلی
    </a>
</footer>
</html>