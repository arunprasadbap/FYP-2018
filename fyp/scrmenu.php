<?php

session_start();
$host = "localhost"; //databse connection arun
$dbusername = "root";
$dbpassword = "";
$dbname = "canteen";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname) or die($mysqli->error);
if(isset($_SESSION['role']) && $_SESSION['role'] ==1);

if(isset($_POST['addfood'])){
	
	$sum++;
	$newfood=$_POST['newfood'];
	$amount=$_POST['amount'];
	
	mysqli_query($mysqli,"INSERT INTO scr(foodname,amount)VALUES('$newfood','$amount')");

	
	
}


?>
<?php

if(isset($_GET['id'])){
	
	$id=$_GET['id'];
	
	$fetch=mysqli_query($mysqli,"SELECT * FROM scr WHERE id='$id'");
	$row=mysqli_fetch_assoc($fetch);
	$food=$row['foodname'];
	$amount=$row['amount'];
	
}






?>
<?php
if(isset($_POST['updatefoodbtn'])){
	$id=$_POST['updatefoodid'];
	$updatefood=$_POST['updatefood'];
	$updateamount=$_POST['updateamount'];
	
	mysqli_query($mysqli,"UPDATE scr SET foodname='$updatefood', amount='$updateamount' WHERE id='$id'");
		header("location:scr.php");
	}
?>
<?php
if(isset($_GET['iddelete'])){
	$id=$_GET['iddelete'];
	
	
	mysqli_query($mysqli,"DELETE FROM scr WHERE id='$id' ");
		header("location:scr.php");
	}
?>
<html>

<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  <link rel="stylesheet" type="text/css" href="stylemenu.css">

    <title>Add User Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">
    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
</head>
<body>
<?php require 'navAdmin.php'; ?>

<div class="container">


  <div id="myCarousel" class="carousel" data-ride="carousel"  >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
	 <a  href="scr.php?break=1">
    <img src="breakfast.jpg" style="width:100%;height:100%;" alt="breakfast" >
	<div class="carousel-caption">
          <h3>BREAKFAST</h3>
          
        </div>
  </a>
 
      </div>

      <div class="item">
         <a  href="scr.php?lunch=2">
<img src="lunch.jpg"  style="width:100%;height:100%;" alt="lunch" > 
	<div class="carousel-caption">
          <h3>LUNCH</h3>
          
        </div>
 </a>
 

      </div>
    
      <div class="item">
       <a href="scr.php?drink=3">
<img src="drinks.jpg"  style="width:100%;height:100%;" alt="breakfast" >
 
	<div class="carousel-caption">
          <h3>DRINKS</h3>
          
        </div>
 </a>
  
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  



 


  

</div>









</body>

</html>
