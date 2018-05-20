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
	
	if(mysqli_query($mysqli,"DELETE FROM cart WHERE user_id='$userid' AND cartid='$id'")){
		header("location:cartselection.php");
	}
	
	
	
}
if(isset($_GET['min'])){
	$food=0;
	$amount=0;
	$id=$_GET['min'];
	$userid=$_SESSION['idnum'];
	$fetch=mysqli_query($mysqli,"SELECT * FROM cart WHERE user_id='$userid' AND cartid='$id'");
	$row=mysqli_fetch_assoc($fetch);
	$row['quantity'];
	$singleamount=$row['price'];
	$actamount=$row['amount_food'];
	if($row['quantity']>1){
		if($row['quantity']>=2){
			$food=$row['amount_food'];
	
	$food=$food-$singleamount;
		}
	$amount=$row['quantity']-1;
	if(mysqli_query($mysqli,"UPDATE cart SET quantity='$amount', amount_food='$food' WHERE user_id='$userid' AND cartid='$id'")){
		header("location:cartselection.php");
	}
	}else{
		header("location:cartselection.php");
	}
	
	
}
if(isset($_GET['max'])){
	$amount=0;
	$food=0;
	
	$id=$_GET['max'];
	$userid=$_SESSION['idnum'];
	$fetch=mysqli_query($mysqli,"SELECT * FROM cart WHERE user_id='$userid' AND cartid='$id'");
	$row=mysqli_fetch_assoc($fetch);
	$fid=$row['id_food'];
	$fname=$row['name_food'];
	$row['quantity'];
	$singleamount=$row['price'];
	$actamount=$row['amount_food'];
	$amount=$row['quantity']+1;
	$food=$row['amount_food'];
	
	$food=$food+$singleamount;
	$breakfound=mysqli_query($mysqli,"SELECT * FROM scrbreakfast WHERE id='$fid' AND breakfast='$fname'");
		$lunchfound=mysqli_query($mysqli,"SELECT * FROM scrlunch WHERE id='$fid' AND lunch='$fname'");
		
		if(mysqli_num_rows($breakfound)==1){
			$row4=mysqli_fetch_assoc($breakfound);
			$oldquantitybr=$row4['quantity'];
			if($amount>$oldquantitybr){
				header("location:cart.php?ofs=1");
				
			}else{
				
				mysqli_query($mysqli,"UPDATE cart SET quantity='$amount', amount_food='$food' WHERE user_id='$userid' AND cartid='$id'");

	header("location:cartselection.php");
	
			}
			
			
			
		}
		
		if(mysqli_num_rows($lunchfound)==1){
			$row5=mysqli_fetch_assoc($lunchfound);
			$oldquantityl=$row5['quantity'];
			if($amount>$oldquantityl){
				header("location:cart.php?ofsl=1");
				
			}else{
				
				mysqli_query($mysqli,"UPDATE cart SET quantity='$amount', amount_food='$food' WHERE user_id='$userid' AND cartid='$id'");

	header("location:cartselection.php");
			}
			
			
			
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
if(isset($_GET['alert'])){
	
	unset($_SESSION['alert']);
	header("Location:cart.php");
}



?>
 
<html lang="en">

  <head>


    <!-- Bootstrap core CSS -->
	 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cashless Canteen</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	

<link rel="stylesheet" type="text/css" href="css/styleuserfood.css">
    <!-- Custom styles-->
    <link href="css/layout.css" rel="stylesheet">
  </head>

  <body>

    <!-- Navigation -->
   <?php require 'navUser.php'; ?>
    
    
    <!-- Page Content -->

   
      
    <div class="container">
       </br></br>
<div class="table-responsive">
    <table class="table" >
    <thead  >
        <tr>
           
            <th>ITEM NAME</th>
            <th>QUANTITY</th>
            <th>AMOUNT</th>
			
			<th>REMOVE</th>
			
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody >
	<?php 


$fetch=mysqli_query($mysqli,"SELECT * FROM cart WHERE user_id='$userid'");
while($row=mysqli_fetch_assoc($fetch)){ 
$id=$row['cartid'];

 ?>
        <tr>
           
            <td><?php echo $row['name_food'];  ?></td>
            <td><a href="cart.php?min=<?php echo $id; ?>"  ><button class="btn btn-danger">-</button></a>&nbsp;&nbsp;&nbsp;<?php echo $row['quantity'];  ?>&nbsp;&nbsp;&nbsp;<a href="cart.php?max=<?php echo $id; ?>"  ><button class="btn btn-success">+</button></a></td>
        
		   <td><?php echo 'RM '.$row['amount_food'];  ?></td>
			
            <td><a href="cart.php?remove=<?php echo $id; ?>"  ><button type="button"  name="editlunch" class="btn btn-danger" >REMOVE</button></a>
			</td>
			
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

<h4> DINE IN <input type="radio" onclick="javascript:orderselection();" name="radio" value="dinein" id="yesCheck" required> TAKE AWAY <input type="radio" onclick="javascript:orderselection();" name="radio" value="takeaway" id="noCheck" required><br>
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
    <div class="modal fade" id="ofs" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
  <div class="modal-header">
  <h2 class="modal-title"><strong>Out Of Stock</strong></h2>
  </div>
 
  <div class="modal-body">
  <div class="alert alert-danger">
  <h4><p align="center"><strong>Sorry you cant add anymore</strong></p></h4>
</div>
    
  </div>
  <div class="modal-footer">
    <a href="cartselection.php" class="btn btn-danger">Close</a>
    
  </div>
  </div>
</div>
</div>




<div class="modal fade" id="exampleModalCenter" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
       
          <h2 class="modal-title">CHECKOUT</h2>
        </div>
        <div class="modal-body">
          <p><b>Total of <?php  echo $total;?>&nbsp;RM will be deducted from your Account</b></p>
        </div>
        <div class="modal-footer">
		<button type="submit" name="proceed" class="btn btn-primary">Proceed</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		</div>
      </div>
      
    </div>
  </div>
  <!-- new content-->
  <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
  <div class="modal-header">
  <h2 class="modal-title"><strong>UNABLE TO PLACE THE ORDER</strong></h2>
  </div>
 
  <div class="modal-body">
  <div class="alert alert-warning">
  <h6><p align="center"><strong>SORRY</strong> Insufficient funds to Place the Order.</p></h6>
</div>
    
  </div>
  <div class="modal-footer">
    <a href="cart.php?alert=balance" class="btn btn-danger">Close</a>
    
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
<?php if(isset($_SESSION['alert'])){        ?>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
<?php } 




?>
<?php if(isset($_GET['ofs'])){        ?>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#ofs').modal('show');
    });
</script>
<?php } 




?>
<?php if(isset($_GET['ofsl'])){        ?>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#ofs').modal('show');
    });
</script>
<?php } 




?>