<?php
session_start();
$host = "localhost"; //databse connection arun
$dbusername = "root";
$dbpassword = "";
$dbname = "canteen";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname) or die($mysqli->error);
if(isset($_SESSION['role']) && $_SESSION['role'] ==1);


?>
<!--------- inserting into table -----------------  ------->


<?php

if(isset($_POST['addbreakfast'])){
	$breakname=$_POST['newbreak'];
	$breakamount=$_POST['breakamount'];
	$seller=1;
	$filename=$_FILES['breakfile']['name'];
	
	$filelocation=$_FILES['breakfile']['tmp_name'];
	$filesize=$_FILES['breakfile']['size'];
	$filetype=$_FILES['breakfile']['type'];

	$filenamesep = explode(".",$filename);
	
		//print_r($filenamesep);
	$fileactualextension=strtolower(end($filenamesep));
	$allow=array('jpg','jpeg','png');
	if(in_array($fileactualextension,$allow)){ 
		
		$filenewname= uniqid('breakfast',false).".".$fileactualextension;       
	$sql="INSERT INTO scrbreakfast(breakfast,breakfast_amount,img,seller)VALUES('$breakname','$breakamount','$filenewname','$seller')";
		$target="images/breakfast/".$filenewname;
	if(mysqli_query($mysqli,$sql)){
		
		
		if(move_uploaded_file($filelocation,$target)){// this function moves from one location to another location 
			header("location:scr.php?break=1");
			
		}
		else{
			
			echo "error uploading";
		}
		
		
		
	}
	else{
		
		echo "error";
	}
	
		
	}else{
		
		echo "this type of file cannot be uploaded";
	}
	
}
//lunch.......
if(isset($_POST['addlunch'])){
	$lunchname=$_POST['newlunch'];
	$lunchamount=$_POST['lunchamount'];
	$seller=1;
	$filename=$_FILES['lunchfile']['name'];
	
	$filelocation=$_FILES['lunchfile']['tmp_name'];
	$filesize=$_FILES['lunchfile']['size'];
	$filetype=$_FILES['lunchfile']['type'];

	$filenamesep = explode(".",$filename);
	
		//print_r($filenamesep);
	$fileactualextension=strtolower(end($filenamesep));
	$allow=array('jpg','jpeg','png');
	if(in_array($fileactualextension,$allow)){ 
		
		$filenewname= uniqid('lunch',false).".".$fileactualextension;       
	$sql="INSERT INTO scrlunch(lunch,lunch_amount,img,seller)VALUES('$lunchname','$lunchamount','$filenewname','$seller')";
		$target="images/lunch/".$filenewname;
	if(mysqli_query($mysqli,$sql)){
		
		
		if(move_uploaded_file($filelocation,$target)){// this function moves from one location to another location 
			header("location:scr.php?lunch=2");
			
		}
		else{
			
			echo "error uploading";
		}
		
		
		
	}
	else{
		
		echo "error";
	}
	
		
	}else{
		
		echo "this type of file cannot be uploaded";
	}
	
}
//drink.......
if(isset($_POST['adddrink'])){
	$drinkname=$_POST['newdrink'];
	$drinkamount=$_POST['drinkamount'];
	$seller=1;
	$filename=$_FILES['drinkfile']['name'];
	
	$filelocation=$_FILES['drinkfile']['tmp_name'];
	$filesize=$_FILES['drinkfile']['size'];
	$filetype=$_FILES['drinkfile']['type'];

	$filenamesep = explode(".",$filename);
	
		//print_r($filenamesep);
	$fileactualextension=strtolower(end($filenamesep));
	$allow=array('jpg','jpeg','png');
	if(in_array($fileactualextension,$allow)){ 
		
		$filenewname= uniqid('drink',false).".".$fileactualextension;       
	$sql="INSERT INTO scrdrinks(drinks,drink_amount,img,seller)VALUES('$drinkname','$drinkamount','$filenewname','$seller')";
		$target="images/drink/".$filenewname;
	if(mysqli_query($mysqli,$sql)){
		
		
		if(move_uploaded_file($filelocation,$target)){// this function moves from one location to another location 
			header("location:scr.php?drink=3");
			
		}
		else{
			
			echo "error uploading";
		}
		
		
		
	}
	else{
		
		echo "error";
	}
	
		
	}else{
		
		echo "this type of file cannot be uploaded";
	}
	
}
















?>





<!-- -------------------------adding breakfast--------------------------------- -->
<?php 
if(isset($_POST['addingbreakfast'])){





 ?>
<html>

<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  <link rel="stylesheet" type="text/css" href="style.css">

    <title>Add User Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">
    
    

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
</head>
<body>

<?php require 'navAdmin.php'; ?>
<div class="container">

<h2>ADD NEW FOOD</h2>
</br>
</br>
<form action="scradd.php" method="post" enctype="multipart/form-data">
<div class="form-group">
      <h4><label>Food:</label></h4>
      <input type="text" class="form-control" placeholder="Enter Food Name" name="newbreak">
    </div>
	</br>
	<div class="form-group">
      <h4><label>Amount:</label></h4>
      <input type="text" class="form-control" placeholder="Enter Food Amount" name="breakamount">
    </div>
	<div class="form-group">
      <h4><label>Image:</label></h4>
      <input type="file" name="breakfile">
    </div>
<p align="center"><button type="submit" name="addbreakfast" class="btn btn-lg">ADD BREAKFAST</button></p>
</form>


</div>





</body>

</html>

<?php } ?>

<!------------------------------------- adding lunch ----------------------------------------->
<?php 
if(isset($_POST['addinglunch'])){





 ?>
<html>

<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  <link rel="stylesheet" type="text/css" href="style.css">

    <title>Add User Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">
    
    

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
</head>
<body>

<?php require 'navAdmin.php'; ?>
<div class="container">

<h2>ADD NEW FOOD</h2>
</br>
</br>
<form action="scradd.php" method="post" enctype="multipart/form-data">
<div class="form-group">
      <h4><label>Food:</label></h4>
      <input type="text" class="form-control" placeholder="Enter Food Name" name="newlunch">
    </div>
	</br>
	<div class="form-group">
      <h4><label>Amount:</label></h4>
      <input type="text" class="form-control" placeholder="Enter Food Amount" name="lunchamount">
    </div>
	<div class="form-group">
      <h4><label>Image:</label></h4>
      <input type="file" name="lunchfile">
    </div>
<p align="center"><button type="submit" name="addlunch" class="btn btn-lg">ADD LUNCH</button></p>
</form>


</div>





</body>

</html>

<?php } ?>

<!------------------------------------- adding drinks ----------------------------------------->
<?php 
if(isset($_POST['addingdrinks'])){





 ?>
<html>

<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  <link rel="stylesheet" type="text/css" href="style.css">

    <title>Add User Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">
    
    

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
</head>
<body>

<?php require 'navAdmin.php'; ?>
<div class="container">

<h2>ADD NEW FOOD</h2>
</br>
</br>
<form action="scradd.php" method="post" enctype="multipart/form-data">
<div class="form-group">
      <h4><label>Drink:</label></h4>
      <input type="text" class="form-control" placeholder="Enter Drink Name" name="newdrink">
    </div>
	</br>
	<div class="form-group">
      <h4><label>Amount:</label></h4>
      <input type="text" class="form-control" placeholder="Enter Drink Amount" name="drinkamount">
    </div>
	<div class="form-group">
      <h4><label>Image:</label></h4>
      <input type="file" name="drinkfile">
    </div>
<p align="center"><button type="submit" name="adddrink" class="btn btn-lg">ADD DRINK</button></p>
</form>


</div>





</body>

</html>

<?php } ?>