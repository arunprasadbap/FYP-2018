<?php

require 'db.php';
include_once "function.php";
session_start();


$id    = $mysqli->escape_string($_POST['userid']);
$name  = $mysqli->escape_string($_POST['name']);
$pass  = hash_password($mysqli->escape_string($_POST['password'])); //hasing pawwsord
$email = $mysqli->escape_string($_POST['email']);

//check email existance
$result = $mysqli->query("SELECT * FROM account WHERE userid='$id'");

if ($result->num_rows > 0){
	$_SESSION['error'] = "ID already exists!"; 
}else{
   
	$sql = "INSERT INTO account (userid,username,userpass,email) VALUES ('$id','$name','$pass','$email')";
	
	if ($mysqli->query($sql)==TRUE){
	 	$_SESSION['success'] = 'Registration Successful!';
	}else{
       	$_SESSION['error'] = 'Registration Failed, Please Try Again!';
	}
}

header("Location: ../adduser.php");
exit();
?>