<?php

require 'db.php';
session_start();


$id=$mysqli->escape_string($_POST['userid']);
$name=$mysqli->escape_string($_POST['name']);
$pass = $mysqli->escape_string($_POST['password']);
$email = $mysqli->escape_string($_POST['email']);
$role= $mysqli->escape_string($_POST['role']);




//check email existance
$result = $mysqli->query("SELECT * FROM Account WHERE userid='$id'");

if ($result->num_rows > 0)
{
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('ID already exists!')
    window.location.href='../adduser.php';
    </SCRIPT>");

}
else
{
	$sql = "INSERT INTO Account (userid,username,userpass,email,role) VALUES ('$id','$name','$pass','$email','$role')";
	
	if ($mysqli->query($sql))
	{
	 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Registration Successful!')
    window.location.href='../adduser.php';
    </SCRIPT>");
		
	}
	else
	{
       echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Registration Failed, Please Try Again!')
    window.location.href='../adduser.php';
    </SCRIPT>");
	}
}

?>