<?php ob_start();
include_once "script/send_emailfunction.php";
session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "canteen";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname);
date_default_timezone_set("Asia/Kuching");

$onlydat=date('Y/m/d');

if (isset($_GET['idready'])){
    $id = $_GET['idready'];
    $unique = uniqid();
    if(mysqli_query($mysqli, "UPDATE orders SET order_status = 'on the way', number = '$unique' WHERE orderid='$id'")){
        header("location:indianstaff.php");
    }
}


if (isset($_GET['idcancel'])) {

    $id = $_GET['idcancel'];
    $fetch = mysqli_query($mysqli, "SELECT * FROM orders WHERE orderid='$id'");
    $row = mysqli_fetch_assoc($fetch);

    $fname = $row['foodname'];
    $userid = $row['userid'];
    $date = $row['date'];
    $foodamount=$row['foodamount'];
$fetch1=mysqli_query($mysqli,"SELECT * FROM Account WHERE userid='$userid'");
$row2=mysqli_fetch_assoc($fetch1);
	$fullamount=$row2['amount'];
$refund=$fullamount+$foodamount;
    mysqli_query($mysqli, "DELETE FROM orders WHERE orderid='$id'");
    //$fetch=mysqli_query($mysqli,"SELECT * FROM history WHERE userid='$userid'");
//while($row=mysqli_fetch_assoc($fetch)){
$map=mysqli_query($mysqli,"SELECT * FROM map WHERE date='$onlydat'");
$rowmap=mysqli_fetch_assoc($map);
$mapamount=$rowmap['amount'];
$newmapamount=$mapamount- $foodamount;


    mysqli_query($mysqli, "DELETE FROM history WHERE historyid='$id'");
    mysqli_query($mysqli,"DELETE FROM historyadmin WHERE id='$id'");
	mysqli_query($mysqli,"UPDATE Account SET amount='$refund' WHERE userid='$userid'");
	mysqli_query($mysqli,"UPDATE map SET amount='$newmapamount' WHERE date='$onlydat'");
    //send mail
    $fetch = mysqli_query($mysqli, "SELECT username,email FROM Account WHERE userid='$userid'");
    $row = mysqli_fetch_assoc($fetch);

    $subject = "Order has been canceled";
    $message = "<h3>Dear " . $row['username'] . "</h3><br>";
    $message .= "<p>Sorry, your order has been canceled.</p><br>";
     $message .= "<p>Your money RM ". $foodamount ."has been refunded.</p><br><br><br>";
    $message .= "<p>Regards,<br>Cashless Canteen</p>";
    send_email($row['email'], $message, $subject);

//}
    header("location:indianstaff.php");


}


?>