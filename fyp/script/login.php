<?php
require 'db.php';
session_start();


$userid = $mysqli->escape_string($_POST['idnum']);
$userpass = $mysqli->escape_string($_POST['pass']);
$result = $mysqli->query("SELECT * FROM Account WHERE userid='$userid'");

//check email in db
if ($result->num_rows == 0)
{
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('ID does not exist, Please Register!')
    window.location.href='../index.php';
    </SCRIPT>");
}
else
{
	//get user array
	$user = $result->fetch_assoc();
	
	if ($userpass == $user['userpass'])
	{
	   
	    $_SESSION['idnum'] = $user['userid'];
	    $_SESSION['username'] = $user['username'];
		$_SESSION['role'] = $user['role'];
		$_SESSION['logged_in'] = true;
		
		if ($user['role'] == 1)
		{
         	echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Login Successful')
			window.location.href='../admin.php';
			</SCRIPT>");
        }
        else
        {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Login Successful')
			window.location.href='../adduser.php';
			</SCRIPT>");
        }
	}
	else
	{echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Wrong password, Please try again!')
    window.location.href='../index.php';
    </SCRIPT>");
	}

	
}
?>