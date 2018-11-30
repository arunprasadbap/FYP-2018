<?php
session_start();
require 'script/db.php';
if(isset($_SESSION['role']) && $_SESSION['role'] ==1);





if(isset($_POST['editlaksa'])){
	$id=$_POST['editlaks'];
	$name=$_POST['laksaname'];
	$amount=$_POST['laksaprice'];
	
	
	$filename=$_FILES['editlaksafile']['name'];
	
	$filelocation=$_FILES['editlaksafile']['tmp_name'];
	$filesize=$_FILES['editlaksafile']['size'];
	$filetype=$_FILES['editlaksafile']['type'];

	$filenamesep = explode(".",$filename);
	
		//print_r($filenamesep);
	$fileactualextension=strtolower(end($filenamesep));
	$allow=array('jpg','jpeg','png');
	if(in_array($fileactualextension,$allow)){ 
		
		$filenewname= uniqid('Laksa',false).".".$fileactualextension;       
	$sql="UPDATE Laksa SET FoodName='$name', FoodPrice='$amount', FoodPic='$filenewname' WHERE ID='$id'";
		$target="img/".$filenewname;
	if(mysqli_query($mysqli,$sql)){
		
		
		if(move_uploaded_file($filelocation,$target)){// this function moves from one location to another location 
			header("location:LaksaViewAdmin.php");
			
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
<?php   if(isset($_GET['edit']))
{    


$id=$_GET['edit'];
		
		 $fetch=mysqli_query($mysqli,"SELECT * FROM Laksa WHERE ID='$id'");
$row=mysqli_fetch_assoc($fetch);  
$laksafood=$row['FoodName'];
$amount=$row['FoodPrice'];
$image=$row['FoodPic'];
$target="img/".$image;

		

?>
<html>

<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  <link rel="stylesheet" type="text/css" href="style.css">

    <title>Edit Food Item</title>

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

<h2>UPDATE FOOD</h2>
</br>
</br>
<form action="updateLaksaAdmin.php" method="post" enctype="multipart/form-data">
<div class="form-group">
     
      <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="editlaks">
    </div>
<div class="form-group">
      <h4><label>Food:</label></h4>
      <input type="text" class="form-control" value="<?php echo $laksafood;	?>" name="laksaname">
    </div>
	</br>
	<div class="form-group">
      <h4><label>Amount:</label></h4>
      <input type="text" class="form-control" value="<?php echo $amount;	?>" name="laksaprice">
    </div>
	<div class="form-group">
      <h4><label>Choose a New Image:</label></h4>
      <input type="file" name="editlaksafile">
    </div>
<p align="center"><button type="submit" name="editlaksa" class="btn btn-lg">Update Food</button></p>
</form>


</div>





</body>

</html>

<?php } ?>