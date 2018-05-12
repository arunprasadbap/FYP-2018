<?php
ob_start();
include_once "script/send_emailfunction.php";
session_start();
$host = "localhost";
$dbusername = "id5215770_adminrat";
$dbpassword = "cashlesscanteenrat";
$dbname = "id5215770_cashlesscanteenswin";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname);



date_default_timezone_set("Asia/Kuching");
$date = date('Y/m/d H:i:s');

if(isset($_POST['viewamount'])){
	
	$id=$_POST['id'];
	$amount=$_POST['amount'];
	$check=mysqli_query($mysqli,"SELECT * FROM Account WHERE userid='$id'");
if(mysqli_num_rows($check)==0){
   $cart='no money';
$_SESSION['userntfound']=$cart;
	header("Location:addamount.php");
}else{
	$fetch=mysqli_query($mysqli,"SELECT * FROM Account WHERE userid='$id'");
		$row=mysqli_fetch_assoc($fetch);
		$name=$row['username'];
		$balance=$row['amount'];
		$email=$row['email'];
		$sum=0;
		$sum=$balance+$amount;
	 $subject = 'Account reload';
   $message .= '<h3>Dear '.$name.' </h3><br>';
    $message .='You have Successfully credited with amount of RM '.$amount.'<br>';
     $message .= '<p>Regards,<br>Cashless Canteen</p>';
	  
         
	if(mysqli_query($mysqli,"UPDATE Account SET amount='$sum' WHERE userid='$id'")){
		$_SESSION['amount']=$sum;
		$_SESSION['name']=$name;
			$updater=$_SESSION['username'];
		mysqli_query($mysqli,"INSERT INTO amounthistory(time,userid,amount,username,updater)VALUES('$date','$id','$amount','$name','admin')");
        
send_email($email,$message, $subject);
		
		
		header("Location:addamount.php");
		
	}
}
	//$fetch=mysqli_query($mysqli,"SELECT * FROM account WHERE userid='$id'");
	//$row=mysqli_fetch_assoc($fetch);
	
	
	//$name=$row['username'];
	//$balance=$row['amount'];
	
	
	
}


ob_end_flush();


?>

	
	
	







