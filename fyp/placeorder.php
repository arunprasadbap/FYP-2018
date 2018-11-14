<?php 
ob_start();

session_start();
$host = "localhost";
$dbusername = "id5215770_adminrat";
$dbpassword = "cashlesscanteenrat";
$dbname = "id5215770_cashlesscanteenswin";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname);
$newamountup=0;
$newquantity=0;
if(isset($_SESSION['role']) && $_SESSION['role'] ==1);
date_default_timezone_set("Asia/Kuching");
$date = date('Y/m/d H:i:s');
$onlydat=date('Y/m/d');

if(isset($_POST['proceed'])){
$newamount=0;
	$radio=$_POST['radio'];
	$balance=$_POST['balance'];
	$userid=$_SESSION['idnum'];
	 $fetch=mysqli_query($mysqli,"SELECT * FROM Account WHERE userid='$userid'");
	$row=mysqli_fetch_assoc($fetch);
	$currentamount=$row['amount'];
	$rating=$row['rating'];
if($rating==''){
	
	$_SESSION['rating']="rate";
	
}
	if($currentamount >= $balance ){
	if(isset($_SESSION['alert'])){
		unset($_SESSION['alert']);
	}

$newamount=$currentamount-$balance;
mysqli_query($mysqli,"UPDATE Account SET amount='$newamount' WHERE userid='$userid'");

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
			$breakfound=mysqli_query($mysqli,"SELECT * FROM scrbreakfast WHERE id='$fid' AND breakfast='$fname'");
		$lunchfound=mysqli_query($mysqli,"SELECT * FROM scrlunch WHERE id='$fid' AND lunch='$fname'");
			$sandfound=mysqli_query($mysqli,"SELECT * FROM sandwich WHERE id='$fid' AND name='$fname'");
		
		if(mysqli_num_rows($breakfound)==1){
			$row4=mysqli_fetch_assoc($breakfound);
			$oldquantity=$row4['quantity'];
			$newquantity=$oldquantity-$fquantity;
			mysqli_query($mysqli,"UPDATE scrbreakfast SET quantity='$newquantity' WHERE id='$fid' AND breakfast='$fname'");
			
			
		}
		if(mysqli_num_rows($sandfound)==1){
			$row9=mysqli_fetch_assoc($sandfound);
			$oldquantitysand=$row9['quantity'];
			$newquantity=$oldquantitysand-$fquantity;
			mysqli_query($mysqli,"UPDATE sandwich SET quantity='$newquantity' WHERE id='$fid' AND name='$fname'");
			
			
		}
		
		if(mysqli_num_rows($lunchfound)==1){
			$row5=mysqli_fetch_assoc($lunchfound);
			$oldquantityl=$row5['quantity'];
			$newquantityl=$oldquantityl-$fquantity;
			mysqli_query($mysqli,"UPDATE scrlunch SET quantity='$newquantityl' WHERE id='$fid' AND lunch='$fname'");
			
			
			
		}
		if($stalf==4){
		   	$datefoundsandorder=mysqli_query($mysqli,"SELECT * FROM orderanalysis  WHERE date='$onlydat'");

			$datefound=mysqli_query($mysqli,"SELECT * FROM map WHERE date='$onlydat'");
						$datefoundoverall=mysqli_query($mysqli,"SELECT * FROM overall WHERE date='$onlydat'");

//	$datefound=mysqli_query($mysqli,"SELECT * FROM map WHERE date//='$onlydat'");
		if(mysqli_num_rows($datefound)==1){
		
		while($row=mysqli_fetch_assoc($datefound)){
			$newamountup=$famount+$row['amount'];
			
		}
mysqli_query($mysqli,"UPDATE map SET amount='$newamountup' WHERE date='$onlydat'");

	}else{	
		mysqli_query($mysqli,"INSERT INTO map(date,stall,amount,food,user)VALUES('$onlydat','$stalf','$famount','$fname','$id')");
	
	}
	
	
		//overall
	
	
		if(mysqli_num_rows($datefoundoverall)==1){
			echo "found";
		while($row=mysqli_fetch_assoc($datefoundoverall)){
			$newamountup=$famount+$row['scr'];
			
		}
mysqli_query($mysqli,"UPDATE overall SET scr='$newamountup' WHERE date='$onlydat'");


	}else{	
		mysqli_query($mysqli,"INSERT INTO overall(date,scr)VALUES('$onlydat','$famount')");
	
	}
	//orderanalysis
		if(mysqli_num_rows($datefoundsandorder)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundsandorder)){
		
			$newquantity=$fquantity+$row4['scr'];
			
		}
mysqli_query($mysqli,"UPDATE orderanalysis SET scr='$newquantity' WHERE date='$onlydat'");


	}else{	
			mysqli_query($mysqli,"INSERT INTO orderanalysis(date,scr)VALUES('$onlydat','$fquantity')");
	
	}
		}
	
//indian

	if($stalf==6){
	    	    	$datefoundsandorder=mysqli_query($mysqli,"SELECT * FROM orderanalysis  WHERE date='$onlydat'");

	 $datefoundindian=mysqli_query($mysqli,"SELECT * FROM indianreport WHERE date='$onlydat'");
	 			$datefoundoverall=mysqli_query($mysqli,"SELECT * FROM overall WHERE date='$onlydat'");

	if(mysqli_num_rows($datefoundindian)==1){
			echo "found";
		while($row3=mysqli_fetch_assoc($datefoundindian)){
			$newamountup=$famount+$row3['amount'];
			
		}
mysqli_query($mysqli,"UPDATE indianreport SET amount='$newamountup' WHERE date='$onlydat'");


	}else{	
		mysqli_query($mysqli,"INSERT INTO indianreport(date,stall,amount,food,user)VALUES('$onlydat','$stalf','$famount','$fname','$id')");
	
	}
	
		//overall
	
	if(mysqli_num_rows($datefoundoverall)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundoverall)){
			$newamountup=$famount+$row4['indian'];
			
		}
mysqli_query($mysqli,"UPDATE overall SET indian='$newamountup' WHERE date='$onlydat'");


	}else{	
		mysqli_query($mysqli,"INSERT INTO overall(date,indian)VALUES('$onlydat','$famount',)");
	
	}
	if(mysqli_num_rows($datefoundsandorder)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundsandorder)){
		
			$newquantity=$fquantity+$row4['indian'];
			
		}
mysqli_query($mysqli,"UPDATE orderanalysis SET indian='$newquantity' WHERE date='$onlydat'");


	}else{	
			mysqli_query($mysqli,"INSERT INTO orderanalysis(date,indian)VALUES('$onlydat','$fquantity')");
	
	}
	
	}
	//indian end
	
	//san
	if($stalf==5){
	    	$datefoundsandorder=mysqli_query($mysqli,"SELECT * FROM orderanalysis  WHERE date='$onlydat'");

		$datefoundsand=mysqli_query($mysqli,"SELECT * FROM sandwichreport  WHERE date='$onlydat'");
					$datefoundoverall=mysqli_query($mysqli,"SELECT * FROM overall WHERE date='$onlydat'");

	if(mysqli_num_rows($datefoundsand)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundsand)){
			$newamountup=$famount+$row4['amount'];
			
		}
mysqli_query($mysqli,"UPDATE sandwichreport SET amount='$newamountup' WHERE date='$onlydat'");


	}else{	
		mysqli_query($mysqli,"INSERT INTO sandwichreport(date,stall,amount,food,user)VALUES('$onlydat','$stalf','$famount','$fname','$id')");
	
	}
	
	//overall
	
		if(mysqli_num_rows($datefoundoverall)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundoverall)){
			$newamountup=$famount+$row4['sandwich'];
			
		}
mysqli_query($mysqli,"UPDATE overall SET sandwich='$newamountup' WHERE date='$onlydat'");


	}else{	
		mysqli_query($mysqli,"INSERT INTO overall(date,sandwich)VALUES('$onlydat','$famount',)");
	
	}
	
	//orderanalysis
		if(mysqli_num_rows($datefoundsandorder)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundsandorder)){
		
			$newquantity=$fquantity+$row4['sandwich'];
			
		}
mysqli_query($mysqli,"UPDATE orderanalysis SET sandwich='$newquantity' WHERE date='$onlydat'");


	}else{	
			mysqli_query($mysqli,"INSERT INTO orderanalysis(date,sandwich)VALUES('$onlydat','$fquantity')");
	
	}
	}
	
	
	//laksa
		
	if($stalf==1){
	    	   $datefoundsandorder=mysqli_query($mysqli,"SELECT * FROM orderanalysis  WHERE date='$onlydat'");

		$datefoundlaksa=mysqli_query($mysqli,"SELECT * FROM laksareport  WHERE date='$onlydat'");
			$datefoundoverall=mysqli_query($mysqli,"SELECT * FROM overall WHERE date='$onlydat'");
	if(mysqli_num_rows($datefoundlaksa)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundlaksa)){
			$newamountup=$famount+$row4['amount'];
			
		}
mysqli_query($mysqli,"UPDATE laksareport SET amount='$newamountup' WHERE date='$onlydat'");


	}else{	
		mysqli_query($mysqli,"INSERT INTO laksareport(date,stall,amount,food,user)VALUES('$onlydat','$stalf','$famount','$fname','$id')");
	
	}
	
	//overall
	
		if(mysqli_num_rows($datefoundoverall)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundoverall)){
			$newamountup=$famount+$row4['laksa'];
			
		}
mysqli_query($mysqli,"UPDATE overall SET laksa='$newamountup' WHERE date='$onlydat'");


	}else{	
		mysqli_query($mysqli,"INSERT INTO overall(date,laksa)VALUES('$onlydat','$famount',)");
	
	}
		if(mysqli_num_rows($datefoundsandorder)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundsandorder)){
		
			$newquantity=$fquantity+$row4['laksa'];
			
		}
mysqli_query($mysqli,"UPDATE orderanalysis SET laksa='$newquantity' WHERE date='$onlydat'");


	}else{	
			mysqli_query($mysqli,"INSERT INTO orderanalysis(date,laksa)VALUES('$onlydat','$fquantity')");
	
	}
	
	}
	
	// end
	
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
			
			$breakfound=mysqli_query($mysqli,"SELECT * FROM scrbreakfast WHERE id='$fid' AND breakfast='$fname'");
		$lunchfound=mysqli_query($mysqli,"SELECT * FROM scrlunch WHERE id='$fid' AND lunch='$fname'");
		$sandfound=mysqli_query($mysqli,"SELECT * FROM sandwich WHERE id='$fid' AND name='$fname'");
		if(mysqli_num_rows($breakfound)==1){
			$row4=mysqli_fetch_assoc($breakfound);
			$oldquantity=$row4['quantity'];
			$newquantity=$oldquantity-$fquantity;
			mysqli_query($mysqli,"UPDATE scrbreakfast SET quantity='$newquantity' WHERE id='$fid' AND breakfast='$fname'");
			
			
		}
			if(mysqli_num_rows($sandfound)==1){
			$row9=mysqli_fetch_assoc($sandfound);
			$oldquantity=$row9['quantity'];
			$newquantity=$oldquantity-$fquantity;
			mysqli_query($mysqli,"UPDATE sandwich SET quantity='$newquantity' WHERE id='$fid' AND name='$fname'");
			
			
		}
		
		if(mysqli_num_rows($lunchfound)==1){
			$row5=mysqli_fetch_assoc($lunchfound);
			$oldquantityl=$row5['quantity'];
			$newquantityl=$oldquantityl-$fquantity;
			mysqli_query($mysqli,"UPDATE scrlunch SET quantity='$newquantityl' WHERE id='$fid' AND lunch='$fname'");
			
			
			
		}
			if($stalf==4){
		$datefoundsandorder=mysqli_query($mysqli,"SELECT * FROM orderanalysis  WHERE date='$onlydat'");

	$datefound=mysqli_query($mysqli,"SELECT * FROM map WHERE date='$onlydat'");
	$datefoundoverall=mysqli_query($mysqli,"SELECT * FROM overall WHERE date='$onlydat'");

		if(mysqli_num_rows($datefound)==1){
			echo "found";
		while($row=mysqli_fetch_assoc($datefound)){
			$newamountup=$famount+$row['amount'];
			
		}
mysqli_query($mysqli,"UPDATE map SET amount='$newamountup' WHERE date='$onlydat'");


	}else{	
		mysqli_query($mysqli,"INSERT INTO map(date,stall,amount,food,user)VALUES('$onlydat','$stalf','$famount','$fname','$id')");
	
	}
	
	//overall
	
	
		if(mysqli_num_rows($datefoundoverall)==1){
			echo "found";
		while($row=mysqli_fetch_assoc($datefoundoverall)){
			$newamountup=$famount+$row['scr'];
			
		}
mysqli_query($mysqli,"UPDATE overall SET scr='$newamountup' WHERE date='$onlydat'");


	}else{	
		mysqli_query($mysqli,"INSERT INTO overall(date,scr)VALUES('$onlydat','$famount')");
	
	}
		//orderanalysis
		if(mysqli_num_rows($datefoundsandorder)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundsandorder)){
		
			$newquantity=$fquantity+$row4['scr'];
			
		}
mysqli_query($mysqli,"UPDATE orderanalysis SET scr='$newquantity' WHERE date='$onlydat'");


	}else{	
			mysqli_query($mysqli,"INSERT INTO orderanalysis(date,scr)VALUES('$onlydat','$fquantity')");
	
	}
			}
			
			
	//indian
	if($stalf==6){
	    $datefoundsandorder=mysqli_query($mysqli,"SELECT * FROM orderanalysis  WHERE date='$onlydat'");

		$datefoundindian=mysqli_query($mysqli,"SELECT * FROM indianreport WHERE date='$onlydat'");
			$datefoundoverall=mysqli_query($mysqli,"SELECT * FROM overall WHERE date='$onlydat'");

	if(mysqli_num_rows($datefoundindian)==1){
			echo "found";
		while($row3=mysqli_fetch_assoc($datefoundindian)){
			$newamountup=$famount+$row3['amount'];
			
		}
mysqli_query($mysqli,"UPDATE indianreport SET amount='$newamountup' WHERE date='$onlydat'");


	}else{	
		mysqli_query($mysqli,"INSERT INTO indianreport(date,stall,amount,food,user)VALUES('$onlydat','$stalf','$famount','$fname','$id')");
	
	}
	
	//overall
	
	if(mysqli_num_rows($datefoundoverall)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundoverall)){
			$newamountup=$famount+$row4['indian'];
			
		}
mysqli_query($mysqli,"UPDATE overall SET indian='$newamountup' WHERE date='$onlydat'");


	}else{	
		mysqli_query($mysqli,"INSERT INTO overall(date,indian)VALUES('$onlydat','$famount',)");
	
	}
		if(mysqli_num_rows($datefoundsandorder)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundsandorder)){
		
			$newquantity=$fquantity+$row4['indian'];
			
		}
mysqli_query($mysqli,"UPDATE orderanalysis SET indian='$newquantity' WHERE date='$onlydat'");


	}else{	
			mysqli_query($mysqli,"INSERT INTO orderanalysis(date,indian)VALUES('$onlydat','$fquantity')");
	
	}
	
	
	
	}
	
	//end
	
		//san
	if($stalf==5){
		$datefoundsand=mysqli_query($mysqli,"SELECT * FROM sandwichreport  WHERE date='$onlydat'");
		$datefoundsandorder=mysqli_query($mysqli,"SELECT * FROM orderanalysis  WHERE date='$onlydat'");
			$datefoundoverall=mysqli_query($mysqli,"SELECT * FROM overall WHERE date='$onlydat'");
	if(mysqli_num_rows($datefoundsand)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundsand)){
			$newamountup=$famount+$row4['amount'];
			
		}
mysqli_query($mysqli,"UPDATE sandwichreport SET amount='$newamountup' WHERE date='$onlydat'");


	}else{	
		mysqli_query($mysqli,"INSERT INTO sandwichreport(date,stall,amount,food,user)VALUES('$onlydat','$stalf','$famount','$fname','$id')");
		
	
	}
	
	//overall
	
		if(mysqli_num_rows($datefoundoverall)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundoverall)){
			$newamountup=$famount+$row4['sandwich'];
			
		}
mysqli_query($mysqli,"UPDATE overall SET sandwich='$newamountup' WHERE date='$onlydat'");


	}else{	
		mysqli_query($mysqli,"INSERT INTO overall(date,sandwich)VALUES('$onlydat','$famount',)");
	
	}
	//orderanalysis
		if(mysqli_num_rows($datefoundsandorder)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundsandorder)){
		
			$newquantity=$fquantity+$row4['sandwich'];
			
		}
mysqli_query($mysqli,"UPDATE orderanalysis SET sandwich='$newquantity' WHERE date='$onlydat'");


	}else{	
			mysqli_query($mysqli,"INSERT INTO orderanalysis(date,sandwich)VALUES('$onlydat','$fquantity')");
	
	}
	
	
	}
	//laksa
		
	if($stalf==1){
	    		$datefoundsandorder=mysqli_query($mysqli,"SELECT * FROM orderanalysis  WHERE date='$onlydat'");

		$datefoundlaksa=mysqli_query($mysqli,"SELECT * FROM laksareport  WHERE date='$onlydat'");
			$datefoundoverall=mysqli_query($mysqli,"SELECT * FROM overall WHERE date='$onlydat'");
	if(mysqli_num_rows($datefoundlaksa)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundlaksa)){
			$newamountup=$famount+$row4['amount'];
			
		}
mysqli_query($mysqli,"UPDATE laksareport SET amount='$newamountup' WHERE date='$onlydat'");


	}else{	
		mysqli_query($mysqli,"INSERT INTO laksareport(date,stall,amount,food,user)VALUES('$onlydat','$stalf','$famount','$fname','$id')");
	
	}
	
	//overall
	
		if(mysqli_num_rows($datefoundoverall)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundoverall)){
			$newamountup=$famount+$row4['laksa'];
			
		}
mysqli_query($mysqli,"UPDATE overall SET laksa='$newamountup' WHERE date='$onlydat'");


	}else{	
		mysqli_query($mysqli,"INSERT INTO overall(date,laksa)VALUES('$onlydat','$famount',)");
	
	}
	
		if(mysqli_num_rows($datefoundsandorder)==1){
			echo "found";
		while($row4=mysqli_fetch_assoc($datefoundsandorder)){
		
			$newquantity=$fquantity+$row4['laksa'];
			
		}
mysqli_query($mysqli,"UPDATE orderanalysis SET laksa='$newquantity' WHERE date='$onlydat'");


	}else{	
			mysqli_query($mysqli,"INSERT INTO orderanalysis(date,laksa)VALUES('$onlydat','$fquantity')");
	
	}
	}
	
	// end
	mysqli_query($mysqli,"DELETE FROM cart WHERE user_id='$userid'");
	
		
	header("location:cartselection.php");
	
	}
	

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


















ob_end_flush();


?>
