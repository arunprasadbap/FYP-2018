<?php

session_start();
$host = "localhost"; //databse connection arun
$dbusername = "root";
$dbpassword = "";
$dbname = "canteen";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname) or die($mysqli->error);



//breakfast
if(isset($_POST['addcart'])){
	$real=0;
$id=$_POST['cartid'];
$quantity=$_POST['quantity'];
$userid=$_SESSION['idnum'];
$username=$_SESSION['username'];
 $fetch=mysqli_query($mysqli,"SELECT * FROM scrbreakfast WHERE id='$id'");
$row=mysqli_fetch_assoc($fetch); 
$userid=$_SESSION['idnum'];
$breakname=$row['breakfast'];
$breaknameamount=$row['breakfast_amount']; 
$stall=4;

switch($quantity){
	
	case 1: $real=$breaknameamount;
	break;
	
	case 2: $real=$breaknameamount * 2;
	break;
	
	case 3:$real=$breaknameamount * 3;
	break;
	case 4:$real=$breaknameamount * 4;
	break;
	
	case 5:$real=$breaknameamount * 5;
	break;
	
	
	
	
}
if(mysqli_query($mysqli,"INSERT INTO cart(user_id,user_name,id_food,name_food,amount_food,stall,quantity)VALUES('$userid','$username','$id','$breakname','$real','$stall','$quantity')")){
	
	header("location:bfastProduct.php");
}
}

//lunch
if(isset($_POST['addcartlunch'])){
	$real=0;
$id=$_POST['cartid'];
$quantity=$_POST['quantity'];
$userid=$_SESSION['idnum'];
$username=$_SESSION['username'];
 $fetch=mysqli_query($mysqli,"SELECT * FROM scrlunch WHERE id='$id'");
$row=mysqli_fetch_assoc($fetch); 
$userid=$_SESSION['idnum'];
$lunchname=$row['lunch'];
$lunchnameamount=$row['lunch_amount']; 
$stall=4;

switch($quantity){
	
	case 1: $real=$lunchnameamount;
	break;
	
	case 2: $real=$lunchnameamount * 2;
	break;
	
	case 3:$real=$lunchnameamount * 3;
	break;
	case 4:$real=$lunchnameamount * 4;
	break;
	
	case 5:$real=$lunchnameamount * 5;
	break;
	
	
	
	
}
if(mysqli_query($mysqli,"INSERT INTO cart(user_id,user_name,id_food,name_food,amount_food,stall,quantity)VALUES('$userid','$username','$id','$lunchname','$real','$stall','$quantity')")){
	
	header("location:lunchProduct.php");
}
}
//drink
if(isset($_POST['addcartdrink'])){
	$real=0;
$id=$_POST['cartid'];
$quantity=$_POST['quantity'];
$userid=$_SESSION['idnum'];
$username=$_SESSION['username'];
 $fetch=mysqli_query($mysqli,"SELECT * FROM scrdrinks WHERE id='$id'");
$row=mysqli_fetch_assoc($fetch); 
$userid=$_SESSION['idnum'];
$drinkname=$row['drinks'];
$drinknameamount=$row['drink_amount']; 
$stall=4;

switch($quantity){
	
	case 1: $real=$drinknameamount;
	break;
	
	case 2: $real=$drinknameamount * 2;
	break;
	
	case 3:$real=$drinknameamount * 3;
	break;
	case 4:$real=$drinknameamount * 4;
	break;
	
	case 5:$real=$drinknameamount * 5;
	break;
	
	
	
	
}


if(mysqli_query($mysqli,"INSERT INTO cart(user_id,user_name,id_food,name_food,amount_food,stall,quantity)VALUES('$userid','$username','$id','$drinkname','$real','$stall','$quantity')")){
	
	header("location:drinkpage.php");
}
	
	
	
	
}

















?>
