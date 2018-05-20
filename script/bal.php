<?php

require 'db.php';

$amount = $_SESSION['amount'];
$result = $mysqli->query("Select * FROM Account WHERE amount = $amount") or die($mysqli->error);


if($amount<6)
{

	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Balance is low, please reload')

    </SCRIPT>");
}

        
        
        
        

?>
