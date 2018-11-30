<?php

require 'db.php';
session_start();

$the_item = $_GET['product_id'];
$stock = (int)$_POST['stock'];



$update = $mysqli->query("UPDATE Laksa SET foodQuantity='$stock' WHERE ID='$the_item' ");

	
	if ($update)
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Product Quantity Successfully Updated!')
    window.location.href='../editLaksaIndex.php';
    </SCRIPT>");
	}
	else
	{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Product Quantity Failed to update!')
    window.location.href='../LaksaStaff.php';
    </SCRIPT>");
	}
	





?>