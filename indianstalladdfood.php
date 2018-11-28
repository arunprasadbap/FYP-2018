<?php
session_start();
require 'script/db.php';
if(isset($_SESSION['role']) && $_SESSION['role'] ==6);

if(isset($_GET['delete'])){
	
		$id=$_GET['delete'];
		
		 $fetch=mysqli_query($mysqli,"SELECT * FROM indian WHERE id='$id'");
$row=mysqli_fetch_assoc($fetch);  
$image1=$row['img'];
$target2="images/indian/".$image1;


		if(mysqli_query($mysqli,"DELETE FROM indian WHERE id='$id'")){
			if(!unlink($target2)){
				echo "error deleting";
			} else{
			header("location:indianstalladdfood.php");
			}
		}else{
		echo "error";}
		
	} 













?>

<html>

<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  <link rel="stylesheet" type="text/css" href="css/styleviewfood.css">

    <title>Add Indian Food</title>

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
<?php $fetch=mysqli_query($mysqli,"SELECT * FROM indian");
while($row=mysqli_fetch_assoc($fetch)){ 
$id=$row['id'];

 ?>

<div class="gallery">
  <a>
    <img src="images/indian/<?php echo $row['img']; ?>" id="image1" alt="indian" width="300" height="200">
  </a>
  <div class="desc"><h6><?php echo '<b>'.$row['foodname'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$row['amount']; ?></h6><a href="updatestallindian.php?edit=<?php echo $id; ?>"  ><button type="button" name="editindian" class="btn btn-primary">EDIT</button></a> &nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="indianstalladdfood.php?delete=<?php echo $id; ?>"  ><button type="button"  name="editlunch" class="btn btn-danger" >DELETE</button></a></div>
</div>

<?php
 }
 ?>

<form action=" indianaddstallfood.php" method="post">
<div id="button"><button type="submit" name="addingindian" class="btn btn-primary btn-sm btn-block">ADD BREAKFAST</button></div>
</form>
 <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>
