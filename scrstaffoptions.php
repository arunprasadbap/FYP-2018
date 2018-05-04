<?php session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "canteen";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname);




if(isset($_GET['idready'])){
	
	$id=$_GET['idready'];
	if(mysqli_query($mysqli,"DELETE FROM orders WHERE orderid='$id'")){
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
//}
	header("location:scrStaff.php");
	
	

}
	





















 ?>