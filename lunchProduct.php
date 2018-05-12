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
	
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/styleuserfood.css">
    <!-- Custom styles-->
   
  </head>

  <body>

    <!-- Navigation -->
  <?php require 'navUser.php'; ?>
    
    
    <!-- Page Content -->
   <h1 class="my-4"></h1>
   
      
    <div class="container">
       </br>
	   </br>
	   </br>
  <div class="dropdown">
  &nbsp;&nbsp;&nbsp;<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Categories
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="lunchProduct.php?idc=2">Rice Choice</a></li>
    <li><a href="lunchProduct.php?idcr=3">Chicken Rice</a></li>
    <li><a href="lunchProduct.php?idn=3">Noodles</a></li>
	    <li class="dropdown active"><a href="lunchProduct.php?idr=2">Show All</a></li>

  </ul>
</div>
	
<?php  if(isset($_GET['idr'])){  ?>
	<?php $fetch=mysqli_query($mysqli,"SELECT * FROM scrlunch");
while($row=mysqli_fetch_assoc($fetch)){  

$id=$row['id'];
$userid=$_SESSION['idnum'];
$_SESSION['dropname']='All';

?>

<div class="gallery" id="galleryy">
  <a>
    <img src="images/lunch/<?php echo $row['img']; ?>" id="image" class="img-responsive" alt="lunch" width="300" height="200">
  </a><form action="addtocart.php" method="post">
  <div class="desc" id="gal"><h3><?php echo '<b>'.$row['lunch'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$row['lunch_amount']; ?></h3>
 <input type="hidden" value="<?php  echo $id;  ?>" name="cartid" ><button type="submit" name="addcartlunch" id="button" class="btn btn-primary showArchived">
         <span class="glyphicon glyphicon-shopping-cart"></span>  <span class="text">ADD TO CART</span>
        </button>
</form>
  </div>

</div>

<?php
} ?>
	
	<?php
} ?>
	
	<?php  if(isset($_GET['idn'])){  
	
	?>
	
		<?php $fetch=mysqli_query($mysqli,"SELECT * FROM scrlunch WHERE Category='Noodles'");
while($row=mysqli_fetch_assoc($fetch)){  

$id=$row['id'];
$userid=$_SESSION['idnum'];

?>

<div class="gallery" id="galleryy">
  <a>
    <img src="images/lunch/<?php echo $row['img']; ?>" id="image" class="img-responsive" alt="lunch" width="300" height="200">
  </a><form action="addtocart.php" method="post">
  <div class="desc" id="gal"><h3><?php echo '<b>'.$row['lunch'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$row['lunch_amount']; ?></h3>
 <input type="hidden" value="<?php  echo $id;  ?>" name="cartid" ><button type="submit" name="addcartlunch" id="button" class="btn btn-primary showArchived">
         <span class="glyphicon glyphicon-shopping-cart"></span>  <span class="text">ADD TO CART</span>
        </button>
</form>
  </div>

</div>

<?php
} ?>
	
	
	
	
    <?php
} ?>
	   
  <?php  if(isset($_GET['idcr'])){  ?>
	
		<?php $fetch=mysqli_query($mysqli,"SELECT * FROM scrlunch WHERE Category='Chicken rice'");
while($row=mysqli_fetch_assoc($fetch)){  

$id=$row['id'];
$userid=$_SESSION['idnum'];

?>

<div class="gallery" id="galleryy">
  <a>
    <img src="images/lunch/<?php echo $row['img']; ?>" id="image" class="img-responsive" alt="lunch" width="300" height="200">
  </a><form action="addtocart.php" method="post">
  <div class="desc" id="gal"><h3><?php echo '<b>'.$row['lunch'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$row['lunch_amount']; ?></h3>
 <input type="hidden" value="<?php  echo $id;  ?>" name="cartid" ><button type="submit" name="addcartlunch" id="button" class="btn btn-primary showArchived">
         <span class="glyphicon glyphicon-shopping-cart"></span>  <span class="text">ADD TO CART</span>
        </button>
</form>
  </div>

</div>

<?php
} ?>
	
	
	
	
    <?php
} ?>
	   
     

  <?php  if(isset($_GET['idc'])){  ?>
	
		<?php $fetch=mysqli_query($mysqli,"SELECT * FROM scrlunch WHERE Category='Rice choice'");
while($row=mysqli_fetch_assoc($fetch)){  

$id=$row['id'];
$userid=$_SESSION['idnum'];

?>

<div class="gallery" id="galleryy">
  <a>
    <img src="images/lunch/<?php echo $row['img']; ?>" id="image" class="img-responsive" alt="lunch" width="300" height="200">
  </a><form action="addtocart.php" method="post">
  <div class="desc" id="gal"><h3><?php echo '<b>'.$row['lunch'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$row['lunch_amount']; ?></h3>
 <input type="hidden" value="<?php  echo $id;  ?>" name="cartid" ><button type="submit" name="addcartlunch" id="button" class="btn btn-primary showArchived">
         <span class="glyphicon glyphicon-shopping-cart"></span>  <span class="text">ADD TO CART</span>
        </button>
</form>
  </div>

</div>

<?php
} ?>
	
	
	
	
    <?php
} ?>
	   	 
      
        
  
  
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

 <script>
$(".dropdown-menu li a").click(function(){
  $(".btn:first-child").html($(this).text()+' <span class="caret"></span>');
});
</script>