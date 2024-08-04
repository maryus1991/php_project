<?php
global $connection;
require_once('../config/loader.php') ;

$sql = "SELECT * FROM contact ";
$stmt = $connection->prepare($sql);

$stmt->execute();
$res =  $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['hidden'])){
//    print '<script> alert("Massage Deleted");</script>'; ;

    $sql_delete = "DELETE FROM contact where id = ?";
    $stmt_delete = $connection->prepare($sql_delete);
    $stmt_delete->bindValue(1,$_POST['hidden']);
    $stmt_delete->execute();
    print '<script> alert("Massage Deleted");</script>'; ;

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نمایش پیامها </title>
</head>
<body>
<ul style="display: inline">
    <?php
//    var_dump($res);
    foreach ($res as $key ){ ?>
            <li><?='|name: '.$key['name'].'|message: '.$key['massage'].'|phone: '.$key['phone'].'|email: '.$key['email']?>  </li>
            <form method="post" >
                <input type="hidden" value="<?=$key['id']?>" name="hidden" >
                <input type="submit" value="حذف"  placeholder="حذف" style="background: darkred; color: #c9d6ff">
            </form>
    <?php }
    header('location: admin/contactList.php');
    ?>
</ul>

</body>
</html>


