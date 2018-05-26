<?php
require 'db.php';




$amount = $_SESSION['amount'];
$userid=$_SESSION['idnum'];
$result = $mysqli->query("Select amount FROM Account where userid ='$userid'");


if (isset($_SESSION['amount']) && $_SESSION['amount'] <6)
{
    
    $row=mysqli_fetch_assoc($result);
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Balance is low, please reload')
    </SCRIPT>");
}
  else
  {
      
  }
        
        
        
?>
