<?php session_start();
include_once "db.php";
if(isset($_POST['confirm_order'])){
    $mysqli->query("UPDATE `orders` SET `order_status` = 'delivered' WHERE `number` = '$_SESSION[number]'");
    $_SESSION['success'] = 'Thank you for being with us';
    unset($_SESSION['number']);
    header("Location: ../notification.php");
}else{
    echo "invalid request";
}