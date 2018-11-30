<?php

require 'db.php';
session_start();



$FoodName = $mysqli->escape_string($_POST['Name']);
$FoodPrice = (double)$_POST['Price'];
$Seller = $_SESSION['idnum'];
$pic = $_FILES['pic'];
$fileName = $_FILES['pic']['name'];
$fileTmpName = $_FILES['pic']['tmp_name'];
$fileSize = $_FILES['pic']['size'];
$fileError = $_FILES['pic']['error'];
$fileType = $_FILES['pic']['type'];
$fileExt = explode('.', $fileName);
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
			$fileNameNew = uniqid('laksa', false).".".$fileActualExt;
			$fileDestination = '../img/'.$fileNameNew;
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
	$sql = "INSERT INTO Laksa (Seller, FoodName, FoodPrice, FoodPic) 
	VALUES ('$Seller', '$FoodName', '$FoodPrice', '$fileNameNew')";
	
	
	if ($mysqli->query($sql))
	{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Product details successfully uploaded')
    window.location.href='../productLaksa1.php';
    </SCRIPT>");
	}
	else
	{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Product details Failed to upload')
    //window.location.href='../addFoodLaksa.php';
    </SCRIPT>");
	}
	
}

?>