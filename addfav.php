<?php

ob_start();

session_start();

$host = "localhost";

$dbusername = "id5215770_adminrat";

$dbpassword = "cashlesscanteenrat";

$dbname = "id5215770_cashlesscanteenswin";

$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname) or die($mysqli->error);







if(isset($_POST['sandwich'])){

	$userid=$_SESSION['idnum'];

	$id=$_POST['sandwich'];

	//echo $userid;

	$stall=5;



	$fetch=mysqli_query($mysqli,"SELECT * FROM sandwich WHERE id='$id'");

	$row=mysqli_fetch_assoc($fetch);

	$name=$row['name'];

	$amount=$row['amount'];

$image=$row['img'];

$imagePath = 'images/sandwich/'.$image;

$newPath = "images/favourite/";

$text =$image;

$newName  = $newPath.''.$text;

$fetch1=mysqli_query($mysqli,"SELECT * FROM favourites WHERE food='$name' and userid = '$userid'");

$row1=mysqli_fetch_assoc($fetch1);

if(!(mysqli_num_rows($fetch1)==0)){

	



	echo "Food already Added";

	

	

}

else{

$copied = copy($imagePath , $newName);

	

	if ((!$copied)) 

{

   

}

//echo "INSERT INTO favourites(food,amount,img,userid,stall)VALUES('$name','$amount','$image','$userid','$stall')";


if(mysqli_query($mysqli,"INSERT INTO favourites(food,food_id,amount,img,userid,stall)VALUES('$name','$id','$amount','$image','$userid','$stall')"))

{

	

echo "Added To Favorites";

}

else{

	

	

}

}

	

}





//-----------------------

if(isset($_POST['nam'])){

	$userid=$_SESSION['idnum'];

	$id=$_POST['nam'];

	//echo $userid;

$stall=4;



$fetch=mysqli_query($mysqli,"SELECT * FROM scrlunch WHERE id='$id'");

$row=mysqli_fetch_assoc($fetch);

$name=$row['lunch'];

$amount=$row['lunch_amount'];

$image=$row['img'];

$imagePath = 'images/lunch/'.$image;

$newPath = "images/favourite/";

$text =$image;

$newName  = $newPath.''.$text;

$fetch1=mysqli_query($mysqli,"SELECT * FROM favourites WHERE food='$name'and userid = '$userid'");

$row1=mysqli_fetch_assoc($fetch1);

if(!(mysqli_num_rows($fetch1)==0)){

	



	echo "Food already Added";

	

	

}

else{

$copied = copy($imagePath , $newName);

	

	if ((!$copied)) 

{

   

}



if(mysqli_query($mysqli,"INSERT INTO favourites(food,food_id,amount,img,userid,stall)VALUES('$name','$id','$amount','$image','$userid','$stall')"))

{

	

echo "Added To Favorites";

}

else{

	

	

}

}

	

}

	

//-------------------------------



if(isset($_POST['bnam'])){

	$userid=$_SESSION['idnum'];

	$id=$_POST['bnam'];

	

$fetch=mysqli_query($mysqli,"SELECT * FROM scrbreakfast WHERE id='$id'");

$row=mysqli_fetch_assoc($fetch);

$stall=4;

$name=$row['breakfast'];

$amount=$row['breakfast_amount'];

$image=$row['img'];

$imagePath = 'images/breakfast/'.$image;

$newPath = "images/favourite/";

$text =$image;

$newName  = $newPath.''.$text;

$fetch1=mysqli_query($mysqli,"SELECT * FROM favourites WHERE food='$name' and userid = '$userid'");

$row1=mysqli_fetch_assoc($fetch1);

if(!(mysqli_num_rows($fetch1)==0)){

	



	echo "Food already Added";

	

	

}

else{



$copied = copy($imagePath , $newName);

	

	if ((!$copied)) 

{

  

}

else

{ 



}

if(mysqli_query($mysqli,"INSERT INTO favourites(food,food_id,amount,img,userid,stall)VALUES('$name','$id','$amount','$image','$userid','$stall')"))

{

	

echo "Added To Favorites";

}

else{

	

	

}

}

	

}





//----------------------------------------------

	

if(isset($_POST['dnam'])){

	$userid=$_SESSION['idnum'];

	$id=$_POST['dnam'];

	

$fetch=mysqli_query($mysqli,"SELECT * FROM scrdrinks WHERE id='$id'");

$row=mysqli_fetch_assoc($fetch);

$stall=4;

$name=$row['drinks'];

$amount=$row['drink_amount'];

$image=$row['img'];

$imagePath = 'images/drink/'.$image;

$newPath = "images/favourite/";

$text =$image;

$newName  = $newPath.''.$text;

$fetch1=mysqli_query($mysqli,"SELECT * FROM favourites WHERE food='$name' and userid = '$userid'");

$row1=mysqli_fetch_assoc($fetch1);

if(!(mysqli_num_rows($fetch1)==0)){

	



	echo "Food already Added";

	

	

}

else{



$copied = copy($imagePath , $newName);

	

	if ((!$copied)) 

{

    

}

else

{ 

    

}

if(mysqli_query($mysqli,"INSERT INTO favourites(food,food_id,amount,img,userid,stall)VALUES('$name','$id','$amount','$image','$userid','$stall')"))

{

	echo "Added To Favorites";



}

else{

	

	

}

}

}

		

	

	

	

	

	

	ob_end_flush();

	

	

	

	

	

	?>

	

	

	

	

	