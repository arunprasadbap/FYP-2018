<?php

require 'script/db.php';
session_start();



$LunchName = $mysqli->escape_string($_POST['Name']);
$LunchPrice = (double)$_POST['Price'];
$Seller = $_SESSION['idnum'];
$pic = $_FILES['pic'];
$fileName = $_FILES['pic']['name'];
$fileTmpName = $_FILES['pic']['tmp_name'];
$fileSize = $_FILES['pic']['size'];
$fileError = $_FILES['pic']['error'];
$fileType = $_FILES['pic']['type'];
$fileExt = explode(".", $fileName);
$fileActualExt = strtolower(end($fileExt));
$imageCheck = false;
$allowed = array('jpg', 'jpeg', 'png', 'gif');


//put file in server
if (in_array($fileActualExt, $allowed))
{
	if ($fileError === 0)
	{
		if ($fileSize < 10000000)
		{
			$imageCheck = true;
			$fileNameNew = uniqid('lunch', false).".".$fileActualExt;
			$fileDestination = "images/lunch/".$fileNameNew;
			move_uploaded_file($fileTmpName, $fileDestination);
			
		}
		else
		{
			echo "File too big";
		}
	}
	else
	{
		echo "Error while upload";
	}
}
else
{
	echo "invalid file type";
}

if ($imageCheck)
{
	$sql = "INSERT INTO scrlunch (seller, lunch, lunch_amount, img) 
	VALUES ('$Seller', '$LunchName', '$LunchPrice', '$fileNameNew')";
	
	
	if ($mysqli->query($sql))
	{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Product details successfully uploaded')
    window.location.href='../lunchProduct1.php';
    </SCRIPT>");
	}
	else
	{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Product details Failed to upload')
    window.location.href='../addLunchSCR.php';
    </SCRIPT>");
	}
	
}

?>