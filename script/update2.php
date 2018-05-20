<?php

require 'db.php';
session_start();

$the_item = $_GET['product_id'];
$stock = (int)$_POST['stock'];



$update = $mysqli->query("UPDATE scrlunch SET quantity='$stock' WHERE id='$the_item' ");

	
	if ($update)
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Product Quantity Successfully Updated!')
    window.location.href='../editFood.php';
    </SCRIPT>");
	}
	else
	{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Product Quantity Failed to update!')
    window.location.href='../scrStaff.php';
    </SCRIPT>");
	}
	





?>