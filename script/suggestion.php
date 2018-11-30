<?php

require 'db.php';
session_start();

$userid=$_SESSION['idnum'];
$name=$mysqli->escape_string($_POST['name']);
$email = $mysqli->escape_string($_POST['email']);
$phone = $mysqli->escape_string($_POST['phone']);
$msg =$mysqli->escape_string($_POST['message']);


$sql = "INSERT INTO Suggestion (userID, Name, Email, Phone, Message) VALUES ('$userid','$name', '$email','$phone','$msg')";
	
	if ($mysqli->query($sql))
	{
	 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thanks for your suggestion.')
    window.location.href='../stdPage.php';
    </SCRIPT>");
		
	}
	else
	{
       echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Submission failed, Please Try Again Later!')
    window.location.href='../Suggestion form.php';
    </SCRIPT>");
	}

?>