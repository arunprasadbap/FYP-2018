<?php
session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "canteen";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname) or die($mysqli->error);
if(isset($_SESSION['role']) && $_SESSION['role'] ==1);

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
			header("location:indian.php");
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


<?php require 'navAdmin.php'; ?>
<div class="container">
<?php $fetch=mysqli_query($mysqli,"SELECT * FROM indian");
while($row=mysqli_fetch_assoc($fetch)){ 
$id=$row['id'];

 ?>

<div class="gallery">
  <a>
    <img src="images/indian/<?php echo $row['img']; ?>" id="image1" alt="indian" width="300" height="200">
  </a>
  <div class="desc"><h6><?php echo '<b>'.$row['foodname'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$row['amount']; ?></h6><a href="updateindian.php?edit=<?php echo $id; ?>"  ><button type="button" name="editindian" class="btn btn-primary">EDIT</button></a> &nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="indian.php?delete=<?php echo $id; ?>"  ><button type="button"  name="editlunch" class="btn btn-danger" >DELETE</button></a></div>
</div>

<?php
 }
 ?>

<form action="indianadd.php" method="post">
<div id="button"><button type="submit" name="addingindian" class="btn btn-primary btn-sm btn-block">ADD BREAKFAST</button></div>
</form>


</body>

</html>
