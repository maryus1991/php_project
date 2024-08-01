<?php
global $connection;
require_once('config/loader.php') ;
$endpoint_link_redirect = null;
$page_type = true;
if (isset($_GET['url'])) {
    $page_type = false;
    $endPointLink = $_GET['url'] ;
    $sql = "SELECT * FROM links WHERE  endpoint_link=?  ";
    $hasLINK = $connection->prepare($sql);
    $hasLINK->bindValue(1, 'http://localhost/phpprojects/php_link_conversion?url='.$endPointLink);
    $hasLINK->execute();
    $endpoint_link_redirect = $hasLINK->fetch(PDO::FETCH_ASSOC);
    $custom_link = $endpoint_link_redirect['custom_link'];
    $direct_link = $endpoint_link_redirect['directlin'];

}
if(isset($_POST['submit'])){
    $customLink = $_POST['customLink'] ;
    $endPointLink = $_POST['endPointLink'] ;
    $directionsLink = $_POST['directions'] ;

    $sql = "SELECT * FROM links WHERE  endpoint_link=? ";
    $hasLINK = $connection->prepare($sql);
//    $hasLINK->bindValue(1, $customLink);
    $hasLINK->bindValue(1, $endPointLink);
    $hasLINK->execute();
    if ($hasLINK->rowCount() == 0){
        $sql = "INSERT INTO links (custom_link, endpoint_link, directlin) VALUES (?, ?, ?)";
        $result = $connection->prepare($sql);
        $result->bindValue(1, $customLink);
        $result->bindValue(2, $endPointLink);
        $result->bindValue(3, $directionsLink);
        $result->execute();
        if ($result->rowCount() > 0) {
            echo "<h1 style='color: #4CAF50' >Link Added Successfully</h1>";
            echo "<a href='$endPointLink'><h2 style='color: #4CAF50' >$endPointLink</h2></a>";

//        echo $endPointLink;
        }else{
            echo "<h1 style='color: darkred' >Link Not Added</h1>";
        }
    }else{
        echo "<h1 style='color: chocolate' >Link Already Exist or Change EndPoint URL</h1>";
//        echo "<h1 style='color: chocolate' > $customLink</h1>";
        echo "<a href='$endPointLink'><h1 style='color: chocolate' > $endPointLink</h1></a>";
    }


}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لینک کوتاه کننده</title>
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


<?php if ($page_type){ ?>
<h2>لینک کوتاه کننده</h2>
<form id="shorten-form" method="post">
    <input name="customLink" type="url" style="text-align: right" class="shorten-input" placeholder="لینک خود را وارد کنید" required>
    <input name="endPointLink" type="text" class="shorten-input " value="http://localhost/phpprojects/php_link_conversion?url=" placeholder="لینک  کوتاه شده دلخود را وارد کنید" required>
    <br>
    <select name="directions" style="text-align: right" class="shorten-input">
        <option value="0" style="text-align: right">غیر مستقیم</option>
        <option value="1" style="text-align: right" >مستقیم</option>
    </select>
    <button type="submit" id="shorten-button" name="submit">کوتاه کن</button>
</form>
<?php }elseif ($direct_link == false){ ?>
    <div id="shorten-form">
        تبلیغات
        <br></br>
        <a type="submit" href="<?=$custom_link?>">click me</a>
    </div>

<?php }elseif($direct_link == true){
    header("Location:$custom_link");
}?>
</body>
</html>