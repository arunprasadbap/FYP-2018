<?php session_start();
include_once "db.php";
if(isset($_POST['confirm_order'])){
    $ids = implode(", ",$_POST['order_id']);
    $mysqli->query("UPDATE `orders` SET `order_status` = 'delivered' WHERE `orderid` in ($ids)");
    $_SESSION['success'] = 'Thank you for being with us';
    //unset($_SESSION['number']);
    header("Location: ../notification.php");
}else{
    echo "invalid request";
}