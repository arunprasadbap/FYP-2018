<?php 
session_start(); 
require 'script/db.php';



?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==2): ?>
 
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <h1><title>Cashless Canteen</title></h1>

    <!-- Bootstrap core CSS -->
	
    
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" >
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/layout.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/styleuserfood.css">
    <!-- Custom styles-->
    
  </head>

  <body>

    <!-- Navigation -->
    <?php require 'navUser.php'; ?>
    
    
    <!-- Page Content -->
   <h1 class="my-4"></h1>
   
      
    <div class="container">
        <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
  <div class="modal-header">
  <h2 class="modal-title" ><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Out Of Stock</strong></h2>
  </div>
 
  <div class="modal-body">
  <div class="alert alert-danger">
  <h5><p align="center"><strong>Sorry you cant add this item to your cart at the moment</strong></p></h5>
</div>
    
  </div>
  <div class="modal-footer">
    <a href="bfastProduct.php" class="btn btn-danger">Close</a>
    
  </div>
  </div>
</div>
</div>
    
	

	<?php $fetch=mysqli_query($mysqli,"SELECT * FROM scrbreakfast");
while($row=mysqli_fetch_assoc($fetch)){  

$id=$row['id'];
$userid=$_SESSION['idnum'];

?>

<div class="gallery">
  <a>
    <img src="images/breakfast/<?php echo $row['img']; ?>" id="image" class="img-responsive" alt="breakfast" width="300" height="200">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" id="fav" onclick="select(this)" style="color:#000000;font-weight: bold;" value="<?php  echo $row['id'];?>" class="btn btn-outline-danger">Add to Favorites</button>
  </a><form action="addtocart.php" method="post">
  <div class="desc"><h6><?php echo '<b>'.$row['breakfast'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$row['breakfast_amount']; ?></h6>
<input type="hidden" value="<?php  echo $id;  ?>" name="cartid" ><button type="submit" name="addcart" id="button" class="btn btn-primary">
         <span class="glyphicon glyphicon-shopping-cart"></span>  <span class="text">ADD TO CART</span>
        </button>
		<script>
 
 </script>
		
</form>
  </div>

</div>

<?php
} ?>
	
	<style>
.btn { 

	width:140px;
	height:0.5px;
	 padding: 8px 1px;
	 font-size: 13px;
	 margin:4px;
    cursor: pointer;
}
.btn:hover {
    background-color: #A9A9A9;
}
.fa fa-heart-o{
	 color: orange;
}
 

</style>
	
	
	<script>

function select(b){
	
	//alert(b.value);
	var name=b.value;
	
	b.style.backgroundColor = "E57474";
	


	
		$.post("addfav.php",{
			bnam:name
			
		}, function(data, status){
			toastr.success(data);
			
		});

toastr.options.newestOnTop = false;

		
	toastr.options.closeMethod = 'slideUp';
	
}
</script>
	
	
	
	
	
       
       
        
  
  
    <!-- /.container -->

    <!-- Footer -->
   
    </footer>

    <!-- Bootstrap core JavaScript -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js">
  </script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js">
  </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
    
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
     <script src="script/ajax-call.js"></script>

  </body>
</html>
<?php else:   
header("Location: index.php");
die();?>
<?php endif; ?> 
<?php if(isset($_GET['ofs'])){        ?>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
<?php } 




?>
