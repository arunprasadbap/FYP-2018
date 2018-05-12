<?php session_start(); ?>

<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==1): ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add User Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

  </head>

  <body>
<?php 
 
require 'script/db.php';
$fetch=mysqli_query($mysqli,"SELECT count(*) FROM account WHERE role =2");
$row=mysqli_fetch_assoc($fetch);
$size = $row['count(*)'];

 ?>
    <!--Nav-->
    <?php require 'navAdmin.php'; ?>

    <div class="container">
	</br>
	</br>
	</br>
	</br>
	<a href="reports.php"><p align="center"><button type="button"  style="width:600px;height:50px;" class="btn btn-primary btn-block">SCR</button></p></a>
	</br>
	</br>
	<p align="center"><button type="button" style="width:600px;height:50px;" class="btn btn-primary btn-block">LAKSA</button></p>
	</br>
	</br>
	<p align="center"><button type="button" style="width:600px;height:50px;" class="btn btn-primary btn-block">INDIAN</button></p>
	</br>
	</br>
	<p align="center"><button type="button" style="width:600px;height:50px;" class="btn btn-primary btn-block">PIZZA</button></p>
	</br>
	</br>
	<p align="center"><button type="button" class="btn btn-info btn-block" data-toggle="popover" title="Active Users" data-content="Current Users: <?php echo $size;  ?>" style="width:250px;height:60px;" data-toggle="modal" data-target="#delete" >Active Users</button></p>
	
	</div>

    <!-- Footer -->
    <?php //require 'footer.php'; ?>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>
<?php else:   
header("Location: index.php");
die();?>
<?php endif; ?> 
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>