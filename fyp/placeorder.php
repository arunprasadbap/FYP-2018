<?php 

session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "canteen";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname);
$newamountup=0;
if(isset($_SESSION['role']) && $_SESSION['role'] ==1);
date_default_timezone_set("Asia/Kuching");
$date = date('Y/m/d H:i:s');
$onlydat=date('Y/m/d');

if(isset($_POST['proceed'])){
	
	$newamount=0;
	$radio=$_POST['radio'];
	$balance=$_POST['balance'];
	$userid=$_SESSION['idnum'];
	 $fetch=mysqli_query($mysqli,"SELECT * FROM account WHERE userid='$userid'");
	$row=mysqli_fetch_assoc($fetch);
$currentamount=$row['amount'];
if($currentamount >= $balance ){
	if(isset($_SESSION['alert'])){
		unset($_SESSION['alert']);
	}
$newamount=$currentamount-$balance;
mysqli_query($mysqli,"UPDATE account SET amount='$newamount' WHERE userid='$userid'");

if($radio=='dinein'){
	$tableno=$_POST['table'];
	
	$array = array();
$fetch=mysqli_query($mysqli,"SELECT * FROM cart WHERE user_id='$userid'");
$number=mysqli_num_rows($fetch);

while($row=mysqli_fetch_assoc($fetch)){
	
	
	
	$array[] = $row;
  

	
	
	
	
}
	
	for( $i=0; $i<$number; $i++){
		
		$id=$array[$i]['user_id'];
		  $name=$array[$i]['user_name'];
		   $fid=$array[$i]['id_food'];
		    $fname=$array[$i]['name_food'];
			 $famount=$array[$i]['amount_food'];
			 $fquantity=$array[$i]['quantity'];
			 $stalf=$array[$i]['stall'];
			
	mysqli_query($mysqli,"INSERT INTO orders(date,userid,username,foodid,foodname,quantity,stall,ordertype,foodamount)VALUES('$date','$id','$name','$fid',' $fname',' $fquantity','$stalf','$tableno','$famount')");	
	mysqli_query($mysqli,"INSERT INTO history(userid,username,amount,food,time,stall,quantity)VALUES('$id','$name','$famount',' $fname','$date','$stalf','$fquantity')");
			mysqli_query($mysqli,"INSERT INTO historyadmin(userid,username,amount,food,time,stall,quantity)VALUES('$id','$name','$famount',' $fname','$date','$stalf','$fquantity')");
$datefound=mysqli_query($mysqli,"SELECT * FROM map WHERE date='$onlydat'");
		if(mysqli_num_rows($datefound)==1){
			
		while($row=mysqli_fetch_assoc($datefound)){
			$newamountup=$famount+$row['amount'];
			
		}
mysqli_query($mysqli,"UPDATE map SET amount='$newamountup' WHERE date='$onlydat'");


	}else{	
		mysqli_query($mysqli,"INSERT INTO map(date,stall,amount,food,user)VALUES('$onlydat','$stalf','$famount','$fname','$id')");
		
	}
	
	mysqli_query($mysqli,"DELETE FROM cart WHERE user_id='$userid'");
	header("location:cartselection.php");
	
	}
	

}
else if($radio=='takeaway'){
	$tableno=$_POST['radio'];
	
	$array = array();
$fetch=mysqli_query($mysqli,"SELECT * FROM cart WHERE user_id='$userid'");
$number=mysqli_num_rows($fetch);

while($row=mysqli_fetch_assoc($fetch)){
	
	
	
	$array[] = $row;
  

	
	
	
	
}
	
	for( $i=0; $i<$number; $i++){
		
		$id=$array[$i]['user_id'];
		  $name=$array[$i]['user_name'];
		   $fid=$array[$i]['id_food'];
		    $fname=$array[$i]['name_food'];
			 $famount=$array[$i]['amount_food'];
			 $fquantity=$array[$i]['quantity'];
			 $stalf=$array[$i]['stall'];
			

			
		mysqli_query($mysqli,"INSERT INTO orders(date,userid,username,foodid,foodname,quantity,stall,ordertype,foodamount)VALUES('$date','$id','$name','$fid','$fname','$fquantity','$stalf','$tableno','$famount')");
		mysqli_query($mysqli,"INSERT INTO history(userid,username,amount,food,time,stall,quantity)VALUES('$id','$name','$famount',' $fname','$date','$stalf','$fquantity')");
			mysqli_query($mysqli,"INSERT INTO historyadmin(userid,username,amount,food,time,stall,quantity)VALUES('$id','$name','$famount',' $fname','$date','$stalf','$fquantity')");
		$datefound=mysqli_query($mysqli,"SELECT * FROM map WHERE date='$onlydat'");
		if(mysqli_num_rows($datefound)==1){
			echo "found";
		while($row=mysqli_fetch_assoc($datefound)){
			$newamountup=$famount+$row['amount'];
			
		}
mysqli_query($mysqli,"UPDATE map SET amount='$newamountup' WHERE date='$onlydat'");
echo "updated";

	}else{	
		mysqli_query($mysqli,"INSERT INTO map(date,stall,amount,food,user)VALUES('$onlydat','$stalf','$famount','$fname','$id')");
		echo "inserted";
	}

	mysqli_query($mysqli,"DELETE FROM cart WHERE user_id='$userid'");
	
		
	
	
	}
	header("location:cartselection.php");

}

//print_r($array);
	//echo $newamount;

	//header("Location:stdPage.php");
		
		
//}
	
}
else{
$cart='no money';
$_SESSION['alert']=$cart;
	header("Location:cart.php");
	
}
	
	
	
	
	
	
	
}



















?>


