<?php
session_start();
require 'script/db.php';
if(isset($_SESSION['role']) && $_SESSION['role'] ==6);




if(isset($_POST['addindian'])){
	$indianname=$_POST['newindian'];
	$indianamount=$_POST['indianamount'];
	$type=$_POST['option'];
	$seller=6;
	$filename=$_FILES['indianfile']['name'];
	
	$filelocation=$_FILES['indianfile']['tmp_name'];
	$filesize=$_FILES['indianfile']['size'];
	$filetype=$_FILES['indianfile']['type'];

	$filenamesep = explode(".",$filename);
	
		//print_r($filenamesep);
	$fileactualextension=strtolower(end($filenamesep));
	$allow=array('jpg','jpeg','png');
	if(in_array($fileactualextension,$allow)){ 
		
		$filenewname= uniqid('indian',false).".".$fileactualextension;       
	$sql="INSERT INTO indian(foodname,amount,img,seller,category)VALUES('$indianname','$indianamount','$filenewname','$seller','$type')";
		$target="images/indian/".$filenewname;
	if(mysqli_query($mysqli,$sql)){
		
		
		if(move_uploaded_file($filelocation,$target)){// this function moves from one location to another location 
			header("Location:indianstalladdfood.php");
			
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



<?php
if(isset($_POST['addingindian'])){

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

<?php require 'navindian.php'; ?>
<div class="container">

<h2>ADD NEW INDIAN FOOD</h2>
</br>
</br>
<form action="indianaddstallfood.php" method="post" enctype="multipart/form-data">
<div class="form-group">
      <h4><label>Food:</label></h4>
      <input type="text" class="form-control" placeholder="Enter Food Name" name="newindian">
    </div>
	</br>
	<div class="form-group">
      <h4><label>Amount:</label></h4>
      <input type="text" class="form-control" placeholder="Enter Food Amount" name="indianamount">
    </div>
    	<div class="form-group">
      <h4><label>Category:</label></h4>
	  <label class="radio-inline"><input type="radio" value="Chicken" name="option">Chicken</label>
&nbsp;<label class="radio-inline"><input type="radio" value="Gravy" name="option">Gravy</label>
&nbsp;<label class="radio-inline"><input type="radio" value="Noodles" name="option">Noodles</label>
<label class="radio-inline"><input type="radio" value="Fish" name="option">Fish</label>
<label class="radio-inline"><input type="radio" value="Others" name="option">Others</label>
<label class="radio-inline"><input type="radio" value="main" name="option">Main Dish</label>
<label class="radio-inline"><input type="radio" value="side" name="option">Side Dish</label>

    </div>
	<div class="form-group">
      <h4><label>Image:</label></h4>
      <input type="file" name="indianfile">
    </div>
<p align="center"><button type="submit" name="addindian" class="btn btn-lg">ADD MEAL</button></p>
</form>


</div>





</body>

</html>

<?php } ?>
















