<?php

require 'script/db.php';
session_start();



$BfastName = $mysqli->escape_string($_POST['Name']);
$BfastPrice = (double)$_POST['Price'];
$Seller = $_SESSION['idnum'];
$pic = $_FILES['pic'];
$fileName = $_FILES['pic']['name'];
$fileTmpName = $_FILES['pic']['tmp_name'];
$fileSize = $_FILES['pic']['size'];
$fileError = $_FILES['pic']['error'];
$fileType = $_FILES['pic']['type'];
$fileExt = explode(".", $fileName);
$fileActualExt = strtolower(end($fileExt));
$imageCheck=false;
$allowed = array('jpg', 'jpeg', 'png', 'gif');


//put file in server
if (in_array($fileActualExt, $allowed))
{
	if ($fileError === 0)
	{
		if ($fileSize < 10000000)
		{
			$imageCheck=true;
			$fileNameNew = uniqid('breakfast', false).".".$fileActualExt;
			$fileDestination = "images/breakfast/".$fileNameNew;
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
	$sql = "INSERT INTO scrbreakfast (seller, breakfast, breakfast_amount, img) 
	VALUES ('$Seller', '$BfastName', '$BfastPrice', '$fileNameNew')";
	
	
	if ($mysqli->query($sql))
	{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Product details successfully uploaded')
    window.location.href='../bfastProduct1.php';
    </SCRIPT>");
	}
	else
	{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Product details Failed to upload')
    window.location.href='../addBfastSCR.php';
    </SCRIPT>");
	}
	
}

?>