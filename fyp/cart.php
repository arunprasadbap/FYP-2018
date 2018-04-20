<?php 
$total=0;
$size='';
session_start(); 
require 'script/db.php';


?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==2): ?>
<?php 

if(isset($_GET['remove'])){
	$id=$_GET['remove'];
	$userid=$_SESSION['idnum'];
	
	if(mysqli_query($mysqli,"DELETE FROM cart WHERE user_id='$userid' AND id_food='$id'")){
		header("location:cartselection.php");
	}
	
	
	
}





?>
<?php  
if(isset($_POST['updatequan'])){
	
	$id=$_POST['ipid'];
	$quant=$_POST['quantity'];
	echo $id;
	echo '</br>';
	echo $quant;
	
	
	
}




?>
 
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <h1><title>Cashless Canteen</title></h1>

    <!-- Bootstrap core CSS -->
	 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cashless Canteen</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="styleuserfood.css">
    <!-- Custom styles-->
    <link href="css/layout.css" rel="stylesheet">
  </head>

  <body>

    <!-- Navigation -->
   <?php require 'navUser.php'; ?>
    
    
    <!-- Page Content -->

   
      
    <div class="container">
       </br></br>
<table class="table table-striped">
    <thead>
        <tr>
           
            <th>ITEM NAME</th>
            <th>QUANTITY</th>
            <th>AMOUNT</th>
			<th>SELLER</th>
			<th>REMOVE</th>
			
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
	<?php 


$fetch=mysqli_query($mysqli,"SELECT * FROM cart WHERE user_id='$userid'");
while($row=mysqli_fetch_assoc($fetch)){ 
$id=$row['id_food'];

 ?>
        <tr>
           
            <td><?php echo $row['name_food'];  ?></td>
            <td><?php echo $row['quantity'];  ?></td>
        
		   <td><?php echo $row['amount_food'].'RM';  ?></td>
			<td><?php echo $row['stall'];  ?></td>
            <td><a href="cart.php?remove=<?php echo $id; ?>"  ><button type="button"  name="editlunch" class="btn btn-danger" >REMOVE</button></a></td>
			
        </tr>
		<?php $total= $total+$row['amount_food']; ?>
<?php }  ?>


    </tbody>
    <!--Table body-->

</table>
<!--Table-->
	
<p align="center" ><div id="info" class="alert alert-info"  style="width:180px;">
  <strong>Total:&nbsp;</strong> <?php echo $total;  ?>&nbsp;RM
</div></p>
</br>
<form action="placeorder.php" method="post">
<input type="hidden" name="balance" value="<?php echo $total; ?>">

<h4> DINE IN <input type="radio" onclick="javascript:orderselection();" name="radio" value="dinein" id="yesCheck" required> TAKE AWAY <input type="radio" onclick="javascript:orderselection();" name="radio" value="take away" id="noCheck" required><br>
    </br>
	<div id="ifYes" style="visibility:hidden">
        <b>SEAT NO:</b><input type='text' class="form-control" id='yes' name='table'><br></h4>
       
    </div>
	
	<script>
	function orderselection() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
    }
    else document.getElementById('ifYes').style.visibility = 'hidden';

}
	</script>
</br></br></br></br></br></br></br>
<p align="center"><button type="button" class="btn btn-success btn-block"  style="width:250px;height:60px;" data-toggle="modal" data-target="#exampleModalCenter" >PLACE ORDER</button></p>

<div class="modal fade" id="exampleModalCenter" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
       
          <h2 class="modal-title">CHECKOUT</h2>
        </div>
        <div class="modal-body">
          <p><b>Total of <?php  echo $total;?> RM will be deducted from your Account</b></p>
        </div>
        <div class="modal-footer">
		<button type="submit" name="proceed" class="btn btn-primary">Proceed</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		</div>
      </div>
      
    </div>
  </div>
</form>



</div>


	
	
	
	
	
	
	
	
	
	
       
       
        
  
  
    <!-- /.container -->

    <!-- Footer -->
   
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>
</html>
<?php else:   
header("Location: index.php");
die();?>
<?php endif; ?> 

