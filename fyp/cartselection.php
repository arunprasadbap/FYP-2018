<?php 
$size='';
session_start(); 
require 'script/db.php';
$userid=$_SESSION['idnum'];
$fetch=mysqli_query($mysqli,"SELECT count(*) FROM cart WHERE user_id =$userid;");
$row=mysqli_fetch_assoc($fetch);
$size = $row['count(*)'];


if($size==0){
	
		header("location:cartempty.php");
	
	
}else{
	
	header("location:cart.php");
}























?>