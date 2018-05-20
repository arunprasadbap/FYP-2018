<?php
ob_start();
session_start();

require 'db.php';
include_once "send_emailfunction.php";

include_once "function.php";
$id=$_POST['userid'];
$realpassword=$_POST['password'];
$id    = $mysqli->escape_string($_POST['userid']);
$name  = $mysqli->escape_string($_POST['name']);
$pass  = hash_password($mysqli->escape_string($_POST['password'])); //hasing pawwsord
$email = $mysqli->escape_string($_POST['email']);

 $subject = 'Account Registration';
   $message .= '<h3>Dear '.$name.' </h3><br>';
    $message .='You have Successfully Registered with our system<br>';
      $message .= '<h4>Your id is '.$id.'</h4> ';
    $message .= '<h4>Your Password is '.$realpassword.' </h4>';
    
   
        $message .= '<p><a href="https://swincashlesscanteen.000webhostapp.com/"><button>Please Click Here To Login</button></a></p><br>';
        $message .= '<p>Regards,<br>Cashless Canteen</p>';
       

	




//check email existance
$result = $mysqli->query("SELECT * FROM Account WHERE userid='$id'");

$resultemail = mysqli_query($mysqli,"SELECT * FROM Account WHERE email='$email'");
if (strlen($name) < 15)
{

if(mysqli_num_rows($resultemail)==0 ){
	    
	    
	
if ($result->num_rows > 0){
	$_SESSION['error'] = "ID already exists!"; 
	 
}else{
   
	$sql = "INSERT INTO Account (userid,username,userpass,email,role) VALUES ('$id','$name','$pass','$email','2')";
	
	if ($mysqli->query($sql)==TRUE){
	 
	 	$_SESSION['success'] = 'Registration Successful!';
	 	   
	 	  send_email($email,$message, $subject);
	 
	}else{
       	$_SESSION['error'] = 'Registration Failed, Please Try Again!';
	}
}
}
else{
    
  	$_SESSION['error'] = "Email Already Exists"; 
}
}
else{
  $_SESSION['error'] = "Too many characters in your name max 15";  
    
}
header("Location: ../adduser.php");
exit();
ob_end_flush();
?>
