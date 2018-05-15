<?php


session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "canteen";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if(isset($_POST['rate'])){
	
	$rate=$_POST['rating'];
	
	$userid=$_SESSION['idnum'];
	
	if(mysqli_query($mysqli,"UPDATE account SET rating='$rate' WHERE userid='$userid'")){
		unset($_SESSION['rating']);
		header("Location:cartselection.php");
		
	}
	
}


























?>