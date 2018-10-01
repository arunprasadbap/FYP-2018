<?php

ob_start();

session_start();

$host = "localhost";

$dbusername = "id5215770_adminrat";

$dbpassword = "cashlesscanteenrat";

$dbname = "id5215770_cashlesscanteenswin";

$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname) or die($mysqli->error);



if(isset($_POST['addToSanCart'])){
	if($_POST['table']=="scrbreakfast"){
		$_POST['addcart'] = "submit";
		$_POST['cartid']  = $_POST['card_id'];
		unset($_POST['addToSanCart']);
	}elseif($_POST['table']=="scrlunch"){
		$_POST['addcartlunch'] = "submit";
		$_POST['cartid'] = $_POST['card_id'];
		unset($_POST['addToSanCart']);
	}elseif($_POST['table']=="scrdrinks"){
		$_POST['addcartdrink'] = "submit";
		$_POST['cartid'] = $_POST['card_id'];
		unset($_POST['addToSanCart']);
	}elseif($_POST['table']=="sandwich"){
		$_POST['addToSanCart'] = "submit";
		$_POST['card_id'] = $_POST['card_id'];
	}
	$_SESSION['tags'] = $_POST['tags'];
}



if(isset($_POST['addcart'])){

	

$real=0;

$id=$_POST['cartid'];

$quantity=1;

//$_POST['quantity'];

$userid=$_SESSION['idnum'];

$username=$_SESSION['username'];

$fetch=mysqli_query($mysqli,"SELECT * FROM scrbreakfast WHERE id='$id'");

$row=mysqli_fetch_assoc($fetch); 

$userid=$_SESSION['idnum'];

$breakname=$row['breakfast'];

$breaknameamount=$row['breakfast_amount']; 

$amount=$row['breakfast_amount']; 

$quantitybreak=$row['quantity'];

$stall=4;

if($quantitybreak > 0){

$fetch=mysqli_query($mysqli,"SELECT * FROM cart WHERE name_food='$breakname' AND user_id='$userid'");

if(mysqli_num_rows($fetch)==1){

	//$_SESSION['alreadyexist']='already exist';

	echo "error";

	//$fetch=mysqli_query($mysqli,"SELECT * FROM cart WHERE user_id='$userid' AND cartid='$id'");

	$row=mysqli_fetch_assoc($fetch);

	$row['quantity'];

	$food=$row['amount_food'];

	$new=$row['quantity']+1;

	$singleamount=$row['price'];

	$food=$row['amount_food'];

	

	$food=$food+$singleamount;

	mysqli_query($mysqli,"UPDATE cart SET quantity='$new', amount_food='$food' WHERE name_food='$breakname' AND user_id='$userid'");

    //header("location:bfastProduct.php");

	

}

else{

//switch($quantity){

	

	//case 1: $real=$breaknameamount;

	//break;

	

	//case 2: $real=$breaknameamount * 2;

	//break;

	

	//case 3:$real=$breaknameamount * 3;

	//break;

	//case 4:$real=$breaknameamount * 4;

	//break;

	

	//case 5:$real=$breaknameamount * 5;

	//break;

	

	

	

	

//}

mysqli_query($mysqli,"INSERT INTO cart(user_id,user_name,id_food,name_food,amount_food,stall,quantity,price)VALUES('$userid','$username','$id','$breakname','$breaknameamount','$stall','$quantity','$breaknameamount')");

	

	//header("location:bfastProduct.php");

}

} else{  



	//header("location:bfastProduct.php?ofs=1");



 }

}



//lunch

if(isset($_POST['addcartlunch'])){

	$real=0;

$id=$_POST['cartid'];

$quantity=1;

$userid=$_SESSION['idnum'];

$username=$_SESSION['username'];

 $fetch=mysqli_query($mysqli,"SELECT * FROM scrlunch WHERE id='$id'");

$row=mysqli_fetch_assoc($fetch); 

$userid=$_SESSION['idnum'];

$lunchname=$row['lunch'];

$lunchnameamount=$row['lunch_amount'];

$quantitylunch=$row['quantity'];

$stall=4;

if($quantitylunch > 0){

$fetch=mysqli_query($mysqli,"SELECT * FROM cart WHERE name_food='$lunchname' AND user_id='$userid'");

if(mysqli_num_rows($fetch)==1){

	//$_SESSION['alreadyexist']='already exist';

	echo "error";

	//$fetch=mysqli_query($mysqli,"SELECT * FROM cart WHERE user_id='$userid' AND cartid='$id'");

	$row=mysqli_fetch_assoc($fetch);

	$row['quantity'];

	$food=$row['amount_food'];

	$new=$row['quantity']+1;

	$singleamount=$row['price'];

	$food=$row['amount_food'];

	

	$food=$food+$singleamount;



	mysqli_query($mysqli,"UPDATE cart SET quantity='$new', amount_food='$food' WHERE name_food='$lunchname' AND user_id='$userid'");

	//header("location:lunchProduct.php?idr=1");

}else{



/*switch($quantity){

	

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

	

	

	

	

}*/

mysqli_query($mysqli,"INSERT INTO cart(user_id,user_name,id_food,name_food,amount_food,stall,quantity,price)VALUES('$userid','$username','$id','$lunchname','$lunchnameamount','$stall','$quantity',$lunchnameamount)");

	

	//header("location:lunchProduct.php?idr=1");

}

} else{  



//header("location:lunchProduct.php?ofsl=1");



 }

}

//drink

if(isset($_POST['addcartdrink'])){

	$real=0;

$id=$_POST['cartid'];

$quantity=1;

$userid=$_SESSION['idnum'];

$username=$_SESSION['username'];

 $fetch=mysqli_query($mysqli,"SELECT * FROM scrdrinks WHERE id='$id'");

$row=mysqli_fetch_assoc($fetch); 

$userid=$_SESSION['idnum'];

$drinkname=$row['drinks'];

$drinknameamount=$row['drink_amount']; 

$stall=4;

$fetch=mysqli_query($mysqli,"SELECT * FROM cart WHERE name_food='$drinkname' AND user_id='$userid'");

if(mysqli_num_rows($fetch)==1){

	//$_SESSION['alreadyexist']='already exist';

	echo "error";

	//$fetch=mysqli_query($mysqli,"SELECT * FROM cart WHERE user_id='$userid' AND cartid='$id'");

	$row=mysqli_fetch_assoc($fetch);

	$row['quantity'];

	$food=$row['amount_food'];

	$new=$row['quantity']+1;

	$singleamount=$row['price'];

	$food=$row['amount_food'];

	

	$food=$food+$singleamount;

	mysqli_query($mysqli,"UPDATE cart SET quantity='$new', amount_food='$food' WHERE name_food='$drinkname' AND user_id='$userid'");

//header("location:drinkProduct.php");

	

}

else{



/*switch($quantity){

	

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

	

	

	

	

}*/





mysqli_query($mysqli,"INSERT INTO cart(user_id,user_name,id_food,name_food,amount_food,stall,quantity,price)VALUES('$userid','$username','$id','$drinkname','$drinknameamount','$stall','$quantity',$drinknameamount)");

	

	//header("location:drinkProduct.php");



	

}

	

	

}


/*tahsin code*/
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
	$nameamount = $row['amount']; 
	$realamount = $realamount + @$row['amount'];
	
	$type=$row['type'];

	$stall=5;
	$fetch=mysqli_query($mysqli,"SELECT * FROM cart WHERE name_food='$name' AND user_id='$userid'");

	if(mysqli_num_rows($fetch)==1){
		$row=mysqli_fetch_assoc($fetch);
		$row['quantity'];
		$food=$row['amount_food'];
		$new=$row['quantity']+1;
		$singleamount=$row['price'];
		$food=$row['amount_food'];
		$food=$food+$singleamount;

		mysqli_query($mysqli,"UPDATE cart SET quantity='$new', amount_food='$food' WHERE name_food='$name' AND user_id='$userid'");
	}else{
		mysqli_query($mysqli,"INSERT INTO cart(user_id,user_name,id_food,name_food,amount_food,stall,quantity,price)VALUES('$userid','$username','$id','$name','$realamount','$stall',1,'$realamount')");
	}

	if($type=='veg'){
		//header("location:sanItemList.php?type=veg");  
	}else{
		//header("location:sanItemList.php?type=non_veg"); 
	}

}


header("location:live_search_result.php");





ob_end_flush();





?>

