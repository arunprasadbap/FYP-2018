<?php 
session_start(); 
ob_start();

$host = "localhost";
$dbusername = "id5215770_adminrat";
$dbpassword = "cashlesscanteenrat";
$dbname = "id5215770_cashlesscanteenswin";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if(isset($_POST['addToSanCart'])){
    $realamount=0;
	$real=0;
$id=$_POST['card_id'];
$quantity=1;
$userid=$_SESSION['idnum'];
$username=$_SESSION['username'];
 $fetch=mysqli_query($mysqli,"SELECT * FROM sandwich WHERE id='$id'");
  $fetch1=mysqli_query($mysqli,"SELECT amount FROM sandwich WHERE id='$id'");

$row=mysqli_fetch_assoc($fetch); 
$row1=mysqli_fetch_assoc($fetch1); 
$userid=$_SESSION['idnum'];
$name=$row['name'];
$nameamount=$row['amount']; 
$realamount=$realamount+$row['amount'];
$type=$row['type'];

$stall=5;
mysqli_query($mysqli,"INSERT INTO cart(user_id,user_name,name_food,amount_food,stall,quantity,price)VALUES('$userid','$username','$name','$realamount','$stall',1,'$realamount')");
if($type=='veg'){
    
  header("location:sanItemList.php?type=veg");  
}
else{
    header("location:sanItemList.php?type=non_veg"); 
    
}
}
?>