<?php  session_start();
include_once "db.php";


if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	 //echo "SELECT orderid,foodname, number, foodamount FROM orders WHERE userid = '$_SESSION[idnum]' AND order_status = 'on the way'";
	 $result = $mysqli->query("SELECT orderid,foodname, number, foodamount FROM orders WHERE userid = '$_SESSION[idnum]' AND order_status = 'on the way'");

	 if($result->num_rows > 0){
	 	echo "(".$result->num_rows.")";
	 }else{
	 	echo 0;
	 }
	
}




?>