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
$fetch=mysqli_query($mysqli,"SELECT count(*) FROM Account WHERE role =2");
$row=mysqli_fetch_assoc($fetch);
$size = $row['count(*)'];

 ?>
    <!--Nav-->
    <?php require 'navAdmin.php'; ?>

    <div class="container">

	  <h3 align="center" class="my-4">Sales Reports</h3>

      
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 align="center" class="card-header"><div class="alert alert-info">
  <strong align="center">SCR</strong> 
</div></h4>
            <div class="card-body">
              <a href="reports.php"><img class="card-img-top" src="img/scr.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 align="center" class="card-header"><div class="alert alert-info">
  <strong align="center">LAKSA</strong> 
</div></h4>
            <div class="card-body">
              <a href="#"><img class="card-img-top" src="img/laksa.png" alt=""></a>
            </div>
            </div>
            </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 align="center" class="card-header"><div class="alert alert-info">
  <strong align="center">INDIAN</strong> 
</div></h4>
            <div class="card-body">
              <a href="#"><img class="card-img-top" src="img/indian2.jpg" alt=""></a>
        
          </div>
        </div>
        </div>
      </div>
  <hr>
	</br>

	<p align="center"><button type="button" class="btn btn-info btn-block" data-toggle="popover" title="Active Users" data-content="Current Users: <?php echo $size;  ?>" style="width:400px;height:60px;" data-toggle="modal" data-target="#delete" >Active Users</button></p>
	
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
