<?php 
session_start(); 
require 'script/db.php';

$type = mysqli_real_escape_string($mysqli,$_GET['type']);
$result  = mysqli_query($mysqli,"SELECT * FROM sandwich WHERE type = '$type'");
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
    <link href="css/layout.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styleuserfood.css">
    <!-- Custom styles-->
    <style type="text/css">.card-product .img-wrap {
    border-radius: 3px 3px 0 0;
    overflow: hidden;
    position: relative;
    width: 100%;
    text-align: center;
    }
  .card-product .img-wrap img {
        max-height: 100%;
        max-width: 100%;
        object-fit: cover;
    }
  .card-product .info-wrap {
      overflow: hidden;
      padding: 15px;
      border-top: 1px solid #eee;
   }
  .card-product .bottom-wrap {
      padding: 15px;
      border-top: 1px solid #eee;
  }

  .label-rating { margin-right:10px;
      color: #333;
      display: inline-block;
      vertical-align: middle;
  }

  .card-product .price-old {
    color: #999;
  }
</style>
  </head>

  <body>
    <!-- Navigation -->
  <?php require 'navUser.php'; ?>
    
    <!-- Page Content -->
    <h1 style="text-align: center;margin-bottom: 40px"><?php echo ($type=="veg") ? "Vegetable Sandwich Items": "Non Vegetable Sandwich Items"  ?></h1>
  
    <div class="container">
      
  <?php
if(isset($_SESSION['mmessage'])){
    echo $_SESSION['mmessage']; unset($_SESSION['mmessage']);
  } 
	
  
  $index = 1;
  while($row = mysqli_fetch_assoc($result)){  
    if($index==1){
      echo "<div class='row'>";
    }

    ?>
 <div class="col-md-4">
      <figure class="card card-product">
        <div class="img-wrap">
          <img src='images/sandwich/<?php echo $row['img'] ?>'></div>
        <figcaption class="info-wrap">
          <h6 class="title" style='text-align: center'><?php echo $row['name']; ?></h6>
        </figcaption>
        <div class="bottom-wrap">
          <form action="addToSanCart.php" method="post">
            <input type="hidden" value="<?php echo $row['id'] ?>" name="card_id">
            <input type="hidden" value="<?php echo $type ?>" name='type'>
            <button type="submit" class="btn btn-sm btn-primary float-right" name="addToSanCart">Add to Cart</button> 
          </form>
          <div class="price-wrap h5">
            <span class="price-new" style="line-height: 1px">Price:RM <?php echo $row['amount']; ?></span>
          </div> <!-- price-wrap.// -->
        </div> <!-- bottom-wrap.// -->
      </figure>
    </div>
    <?php if($index == 3){
      echo "</div>"; $index = 1;
    }else{
      $index++;
    } ?>
  <?php
} 

if($index < 3){
  echo "</div>";
}

?>

</div>
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
