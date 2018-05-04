<?php
ob_start();
include_once "script/send_emailfunction.php";
session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "canteen";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname);




if (isset($_GET['idready'])){
    $id = $_GET['idready'];
    $unique = uniqid();
    if(mysqli_query($mysqli, "UPDATE orders SET order_status = 'on the way', number = '$unique' WHERE orderid='$id'")){
        header("location:scrStaff.php");
    }
}




if(isset($_GET['idcancel'])){
	$id=$_GET['idcancel'];
$fetch=mysqli_query($mysqli,"SELECT * FROM orders WHERE userid='$id'");
$row=mysqli_fetch_assoc($fetch);
$fname=$row['foodname'];
$userid=$row['userid'];
$date=$row['date'];
	

	
	
	mysqli_query($mysqli,"DELETE FROM orders WHERE orderid='$id'");
	//$fetch=mysqli_query($mysqli,"SELECT * FROM history WHERE userid='$userid'");
//while($row=mysqli_fetch_assoc($fetch)){
	
	
	mysqli_query($mysqli,"DELETE FROM history WHERE historyid='$id'");
	mysqli_query($mysqli,"DELETE FROM historyadmin WHERE id='$id'");
	
	//send mail
    $fetch = mysqli_query($mysqli, "SELECT username,email FROM account WHERE userid='$userid'");
    $row = mysqli_fetch_assoc($fetch);

    $subject = "Order has been canceled";
    $message = "<h3>Dear " . $row['username'] . "</h3><br>";
    $message .= "<p>Sorry, your order has been canceled.</p><br><br><br>";
    $message .= "<p>Regards,<br>Cashless Canteen</p>";
    send_email($row['email'], $message, $subject);
//}
	header("location:scrStaff.php");
	
	

}
	





















 ?>
