<?php 
session_start(); 
require 'script/db.php';



?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==2): ?>
 
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/">
    <meta name="description" content="">
    <meta name="author" content="">

    <h1><title>Cashless Canteen</title></h1>

    <!-- Bootstrap core CSS -->
	
    
	
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
       
    
	

	<?php $fetch=mysqli_query($mysqli,"SELECT * FROM indian");
while($row=mysqli_fetch_assoc($fetch)){  

$id=$row['id'];
$userid=$_SESSION['idnum'];

?>

<div class="gallery">
  <a>
    <img src="images/indian/<?php echo $row['img']; ?>" id="image" class="img-responsive" alt="indian" >
  </a><form action="addtocart.php" method="post">
  <div class="desc"><h6><?php echo '<b>'.$row['foodname'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$row['amount']; ?></h6>
<input type="hidden" value="<?php  echo $id;  ?>" name="cartid" ><button data-toggle="modal" data-target="#<?php echo $row['id'] ?>"  type="button" name="addcart" id="button" class="btn btn-primary">
         <span class="glyphicon glyphicon-shopping-cart"></span>  <span class="text">ADD ON</span>
        </button>
		
		<div class="modal fade"  id="<?php echo $row['id'] ?>" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
  <div class="modal-header">
  <h3 class="modal-title"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add On with <?php echo $row['foodname']; ?></strong></h3>
  </div>
 
  <div class="modal-body">
  <div style="overflow-x:auto;">
  
  <?php
  $fetch1=mysqli_query($mysqli,"SELECT * FROM indian");
  while($row1=mysqli_fetch_assoc($fetch1)){  

$id=$row1['id'];

?>

<table>
   
      
    
    <tr>
      <td><img src="images/indian/<?php echo $row1['img']; ?>" id="image1" class="img-responsive" alt="indian" width="100" height="100"></div></td>
	 <td><p><?php echo '<b>'.'&nbsp;'.'&nbsp;'.$row1['foodname'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$row1['amount']; ?></p></td>
	 <td><label class="containeri">
  <input type="checkbox" name="checkbox[]" value="<?php echo $row1['foodname']; ?>">
  <span class="checkmark"></span>
</label></h5></td>
      
    </tr>
    


 <?php
echo "</br>";

  }
?>
  </table>
  
</div>
    
  </div>
  <div align=center" "class="modal-footer">
 
  <input type="hidden" name="mainfood" value="<?php echo $row['foodname']; ?>">
     <input type="hidden" name="amount" value="<?php echo $row['amount']; ?>">

   <button type="submit" align="center" class="btn btn-primary" name="testing">ADD TO CART</button>
    
  </div>
  </div>
</div>
</div>

		
		
		<script>
 
 </script>
		
</form>
  </div>

</div>

<?php
} ?>
	
	
	
	
	
	
	
	
	
	
       
       
        
  
  
    <!-- /.container -->

    <!-- Footer -->
   
    </footer>

    <!-- Bootstrap core JavaScript -->
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
<style>
#image1 {
	position: relative;
    float: left;
    width:  120px;
    height: 120px;
    background-position: 50% 50%;
    background-repeat:   no-repeat;
    background-size:     cover;
		

	
}
#addon {
	
	
  position:fixed;
  left:170px;
margin-top:-70px;

}

.containeri {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
	left:50px;
	
	margin-top:-20px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.containeri input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}


.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #3C4F4D;
}


.containeri:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.containeri input:checked ~ .checkmark {
    background-color: #2196F3;
}


.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}


.containeri input:checked ~ .checkmark:after {
    display: block;
}


.containeri .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
#try{
	
	
	overflow: visible;
}
@viewport {
  width: device-width ;
  zoom: 1.0 ;
}

p{
	font-size: 20px;
	
	
	
}

</style>