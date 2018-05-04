<?php session_start(); ?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==2 ): ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cashless Canteen</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles-->
    <link href="css/layout.css" rel="stylesheet">
  </head>

  <body>

    <!-- Navigation -->
    <?php require 'navUser.php'; ?>
    
   
    <!-- Page Content -->
    <div class="table-responsive">

      
<div class="table-responsive">
    <table class="table" style="border:20px;">
	<thead>
    <tr>
      <th>Date/Time</th>
      <th>Food/Drink</th>
	  <th>Quantity</th>
      <th>Amount</th>
    </tr>
  </thead>
  <tbody>
    <?php 
$userid=$_SESSION['idnum'];
if(isset($_POST['deletehistory'])){
	
	if(mysqli_query($mysqli,"DELETE FROM history WHERE userid='$userid'")){
		header("location:history.php");
		
	}
	
	
	
}

$fetch=mysqli_query($mysqli,"SELECT * FROM history WHERE userid='$userid' ORDER BY time DESC");

while($row=mysqli_fetch_assoc($fetch)){ 


 ?>
      <tr>
	  <td><?php echo $row['time']; ?></td>
        <td><?php echo $row['food']; ?></td>
		<td><?php echo $row['quantity']; ?></td>
        <td><?php echo $row['amount']; ?></td>
       
      </tr>
	  <?php }  ?>
	  
	  
	  
  </tbody>
	
	
	
	</table>
</div>
    <?php if(mysqli_num_rows($fetch)>0){  ?>
	<p align="center"><button type="button" class="btn btn-danger btn-block"  style="width:250px;height:60px;" data-toggle="modal" data-target="#delete" >CLEAR ORDER HISTORY</button>
	</br><a href="pdf.php"><button type="button" class="btn btn-info btn-block"  style="width:250px;height:60px;" ><b>Download PDF</b></button></a></p>
	
	
	
	<div class="modal fade" id="delete" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
       
          <h2 class="modal-title">Clear Order History</h2>
        </div>
        <div class="modal-body">
          <p><b>Are you sure you want to clear your order history?</b></p>
        </div>
        <div class="modal-footer">
		<form action="history.php" method="post">
		<button type="submit" name="deletehistory" class="btn btn-primary">YES</button>
		</form>
          <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
        </div>
      </div>
      
    </div>
  </div>
    <?php } ?>
      </div>
 
    <!-- /.container -->

    <!-- Footer -->
    <?php //require 'footer.php'; ?>
    

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>
<?php else:   
header("Location: index.php");
die();?>
<?php endif; ?> 