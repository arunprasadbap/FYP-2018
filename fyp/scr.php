<?php
$sum='';
session_start();
$host = "localhost"; //databse connection arun
$dbusername = "root";
$dbpassword = "";
$dbname = "canteen";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname) or die($mysqli->error);
if(isset($_SESSION['role']) && $_SESSION['role'] ==1);


?>



<?php  if(isset($_GET['id'])){
	
		$id=$_GET['id'];
		
		 $fetch=mysqli_query($mysqli,"SELECT * FROM scrbreakfast WHERE id='$id'");
$row=mysqli_fetch_assoc($fetch);  
$image=$row['img'];
$target="images/breakfast/".$image;


		if(mysqli_query($mysqli,"DELETE FROM scrbreakfast WHERE id='$id'")){
			if(!unlink($target)){
				echo "error deleting";
			} else{
			header("location:scr.php?break=1");
			}
		}else{
		echo "error";}
		
	}  
	
	
	?>
<?php  if(isset($_GET['id2'])){
	
		$id=$_GET['id2'];
		
		 $fetch=mysqli_query($mysqli,"SELECT * FROM scrlunch WHERE id='$id'");
$row=mysqli_fetch_assoc($fetch);  
$image1=$row['img'];
$target2="images/lunch/".$image1;


		if(mysqli_query($mysqli,"DELETE FROM scrlunch WHERE id='$id'")){
			if(!unlink($target2)){
				echo "error deleting";
			} else{
			header("location:scr.php?lunch=1");
			}
		}else{
		echo "error";}
		
	}  
	
	
	?>
	<?php  if(isset($_GET['id3'])){
	
		$id=$_GET['id3'];
		
		 $fetch=mysqli_query($mysqli,"SELECT * FROM scrdrinks WHERE id='$id'");
$row=mysqli_fetch_assoc($fetch);  
$image2=$row['img'];
$target3="images/drink/".$image2;


		if(mysqli_query($mysqli,"DELETE FROM scrdrinks WHERE id='$id'")){
			if(!unlink($target3)){
				echo "error deleting";
			} else{
			header("location:scr.php?drink=1");
			}
		}else{
		echo "error";}
		
	}  
	
	
	?>

<!------------------------------------- edit breakfast ----------------------------------------->















<!------------------------------------- breakfast ----------------------------------------->
<?php if(isset($_GET['break'])){?>
	
	
	
	<html>

<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  <link rel="stylesheet" type="text/css" href="styleviewfood.css">

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
<?php $fetch=mysqli_query($mysqli,"SELECT * FROM scrbreakfast");
while($row=mysqli_fetch_assoc($fetch)){  

$id=$row['id'];

?>

<div class="gallery">
  <a>
    <img src="images/breakfast/<?php echo $row['img']; ?>" id="image" alt="breakfast" width="300" height="200">
  </a>
  <div class="desc"><h4><?php echo '<b>'.$row['breakfast'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$row['breakfast_amount']; ?></h4><a href="update.php?edit1=<?php echo $id; ?>"  ><button type="button" name="editlunch" class="btn btn-primary">EDIT</button></a> &nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="scr.php?id=<?php echo $id; ?>"  ><button type="button"  name="editlunch" class="btn btn-danger" >DELETE</button></a></div>

  </div>



<?php } ?>
<form action="scradd.php" method="post">
<div id="button"><button type="submit" name="addingbreakfast" class="btn btn-primary btn-sm btn-block">ADD BREAKFAST</button></div>
</form>

</body>

</html>
	
	
  <?php } ?>

<!------------------------------------- lunch ----------------------------------------->
  <?php if(isset($_GET['lunch'])){ ?>
	
	
	
	
	
	
	<html>

<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  <link rel="stylesheet" type="text/css" href="styleviewfood.css">

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
<?php $fetch=mysqli_query($mysqli,"SELECT * FROM scrlunch");
while($row=mysqli_fetch_assoc($fetch)){ 
$id=$row['id'];

 ?>

<div class="gallery">
  <a>
    <img src="images/lunch/<?php echo $row['img']; ?>" id="image1" alt="lunch" width="300" height="200">
  </a>
  <div class="desc"><h4><?php echo '<b>'.$row['lunch'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$row['lunch_amount']; ?></h4><a href="update.php?edit2=<?php echo $id; ?>"  ><button type="button" name="editlunch" class="btn btn-primary">EDIT</button></a> &nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="scr.php?id2=<?php echo $id; ?>"  ><button type="button"  name="editlunch" class="btn btn-danger" >DELETE</button></a></div>
</div>

<?php } ?>


<form action="scradd.php" method="post">
<div id="button"><button type="submit" name="addinglunch" class="btn btn-primary btn-sm btn-block">ADD LUNCH</button></div>
</form>

</body>

</html>
	
	
  <?php } ?>

<!------------------------------------- drink ----------------------------------------->

  <?php if(isset($_GET['drink'])){ ?>
	
	
	
	
	
	
	<html>

<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  <link rel="stylesheet" type="text/css" href="styleviewfood.css">

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

<?php $fetch=mysqli_query($mysqli,"SELECT * FROM scrdrinks");
while($row=mysqli_fetch_assoc($fetch)){ 
$id=$row['id'];
 ?>

<div class="gallery">
  <a>
    <img src="images/drink/<?php echo $row['img']; ?>" id="image1" alt="drink" width="300" height="200">
  </a>
  <div class="desc"><h4><?php echo '<b>'.$row['drinks'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$row['drink_amount']; ?></h4><a href="update.php?edit3=<?php echo $id; ?>"  ><button type="button" name="editlunch" class="btn btn-primary">EDIT</button></a> &nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="scr.php?id3=<?php echo $id; ?>"  ><button type="button"  name="editlunch" class="btn btn-danger" >DELETE</button></a></div>
</div>



<?php } ?>


<form action="scradd.php" method="post">
<div id="button"><button type="submit" name="addingdrinks" class="btn btn-primary btn-sm btn-block">ADD DRINKS</button></div>
</form>

</body>

</html>
	
	
  <?php } ?>




