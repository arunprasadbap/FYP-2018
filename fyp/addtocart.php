<?php

ob_start();

session_start();

$host = "localhost";

$dbusername = "id5215770_adminrat";

$dbpassword = "cashlesscanteenrat";

$dbname = "id5215770_cashlesscanteenswin";

$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname) or die($mysqli->error);





//favourites 





if(isset($_POST['deletefav'])){

$favid=$_POST['deletefav'];

	$userid=$_SESSION['idnum'];

	$username=$_SESSION['username'];

	

	

	if(mysqli_query($mysqli,"DELETE FROM favourites WHERE userid='$userid' and id='$favid'")){

echo "Removed from Favourites";



	

	}else{

		echo "error";

	}

	

	

}





///favtocart

if(isset($_POST['favtocart'])){

	$favid=$_POST['favtocart'];

	$userid=$_SESSION['idnum'];

	$username=$_SESSION['username'];

	$fetch=mysqli_query($mysqli,"SELECT * FROM favourites WHERE id='$favid' and userid='$userid'");

	$row=mysqli_fetch_assoc($fetch); 

	$food=$row['food'];

	$amount=$row['amount'];

	$food_id = $row['food_id'];

	$stall=$row['stall'];



	

	if(mysqli_query($mysqli,"INSERT INTO cart(user_id,user_name,name_food,id_food,amount_food,stall,quantity,price)VALUES('$userid','$username','$food','$food_id','$amount','$stall',1,'$amount')")){
	
	echo "Added to cart";
}

	

	

}



//indian

if(isset($_POST['testing'])){

	$stall=6;

	$userid=$_SESSION['idnum'];

$username=$_SESSION['username'];

	$count=0;

	$count1=0;

	$amounttotal=0;

	$total=0;

	$foodname=$_POST['mainfood'];

	$amount=$_POST['amount'];

	

	

	$data=$foodname.',';

	if(!empty($_POST['checkbox'])){

// Loop to store and display values of individual checked checkbox.

foreach($_POST['checkbox'] as $selected){

$array[$count]=$selected;

$count++;

}

}

for($i=0; $i<$count;$i++){

	

	$data.=$array[$i];

	$data.=',';

	

	

}



for($i=0; $i<$count;$i++){

	

$fetch=mysqli_query($mysqli,"SELECT amount FROM indian WHERE foodname='$array[$i]'");

$row=mysqli_fetch_assoc($fetch); 

	

	

	$amounttotal=$amounttotal+$row['amount'];

	

	

	

}

$total=$amounttotal+$amount;



mysqli_query($mysqli,"INSERT INTO cart(user_id,user_name,name_food,amount_food,stall,quantity,price)VALUES('$userid','$username','$data','$total','$stall',1,'$total')");

header("location:viewindian.php");

}













//breakfast

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

header("location:bfastProduct.php");

	

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

	

	header("location:bfastProduct.php");

}

} else{  



header("location:bfastProduct.php?ofs=1");



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

	header("location:lunchProduct.php?idr=1");

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

	

	header("location:lunchProduct.php?idr=1");

}

} else{  



header("location:lunchProduct.php?ofsl=1");



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

header("location:drinkProduct.php");

	

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

	

	header("location:drinkProduct.php");



	

}

	

	

}









ob_end_flush();





?>

