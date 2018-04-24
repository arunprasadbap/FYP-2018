<?php
session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "canteen";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname);
date_default_timezone_set("Asia/Kuching");
$date = date('Y/m/d H:i:s');

if(isset($_POST['viewamount'])){
	
	$id=$_POST['id'];
	$amount=$_POST['amount'];
	$fetch=mysqli_query($mysqli,"SELECT * FROM Account WHERE userid='$id'");
		$row=mysqli_fetch_assoc($fetch);
		$name=$row['username'];
		$balance=$row['amount'];
		$sum=0;
		$sum=$balance+$amount;
	
	if(mysqli_query($mysqli,"UPDATE Account SET amount='$sum' WHERE userid='$id'")){
		$_SESSION['amount']=$sum;
		$_SESSION['name']=$name;
			$updater=$_SESSION['username'];
		mysqli_query($mysqli,"INSERT INTO amounthistory(time,userid,amount,username,updater)VALUES('$date','$id','$amount','$name','admin')");
		header("Location:addamount.php");
		
	}
	
	
	
	
}






?>
