<?php session_start();
require 'db.php';
include_once "function.php";


$userid = $mysqli->escape_string($_POST['idnum']);
$userpass = hash_password($mysqli->escape_string($_POST['pass'])); //Check the function.php file which is included above.

$result = $mysqli->query("SELECT * FROM account WHERE userid='$userid'");

//check email in db
if ($result->num_rows == 0){
	$_SESSION['error'] = "ID does not exist, Please Register!"; 
	header("Location: ../index.php"); //header is used for redirecting page
	exit();
}else{

	$user = $result->fetch_assoc();

	if ($userpass == $user['userpass']){

	  	$_SESSION['idnum'] = $user['userid'];
	    $_SESSION['username'] = $user['username'];
		$_SESSION['role'] = $user['role'];
		$_SESSION['logged_in'] = true;

		if ($user['role'] == 1){
         	echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Login Successful')
			window.location.href='../admin.php';
			</SCRIPT>");
        }else{
            echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Login Successful')
			window.location.href='../adduser.php';
			</SCRIPT>");
        }
	}else{
    	$_SESSION['error'] = "Wrong password, Please try again!";
		header("Location: ../index.php");
		exit();
	}
}
?>