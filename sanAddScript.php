<?php

require 'script/db.php';
session_start();

function getFileExtension($fileName){
	$file_ext 		    = explode(".", $fileName);
	$file_final_ext 	= strtolower(end($file_ext));
	return $file_final_ext;
}

$item_name  			= $mysqli->escape_string($_POST['item_name']);
$item_price 	        = $_POST['item_price'];
$staff_seller 			= $_SESSION['idnum'];
$type                   = $_POST['type'];
$file_extension         = getFileExtension($_FILES['image']['name']);
$check		  			= 0;
$file_type_allow 		= array('jpeg','png','jpg','gif');

//put file in server
if (in_array($file_extension, $file_type_allow)){
	if ($_FILES['image']['error'] === 0){
		if ($_FILES['image']['size'] < 10000000){
			$check=1;
			$file_new_name = uniqid('sandwich', false).".".$file_extension;
			$file_des = "images/sandwich/".$file_new_name;
			move_uploaded_file($_FILES['image']['tmp_name'], $file_des);
		}else{
			echo "File very large";
		}
	}else{
		echo "Error occured while upload";
	}
}else{
	echo "Invalid file type";
}

if ($check){
	$sqlString = "INSERT INTO sandwich (name, amount, img, seller, type) 
	VALUES ('$item_name', '$item_price ', '$file_new_name', '$staff_seller', '$type')";
	
	if ($mysqli->query($sqlString)){
		$_SESSION['message'] = "<div class='alert alert-success'>Data inserted successfully</div>";
		header("Location: view-sandwich.php?type=$type");
		exit();
	}else{
		$_SESSION['message'] = "<div class='alert alert-danger'>Something Went Wrong</div>";
		header("Location: addSAN.php?type=$type");
		exit();
	}	
}

?>