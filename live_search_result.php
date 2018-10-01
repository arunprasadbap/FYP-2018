<?php ob_start();
session_start(); 
require 'script/db.php';
?>

<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==2): 

if(isset($_POST['search']) || isset($_SESSION['tags']) ){

  $_POST['tags'] = isset($_SESSION['tags']) ? $_SESSION['tags'] : $_POST['tags'];
  
  $tags   = mysqli_real_escape_string($mysqli,$_POST['tags']);  
  
  $result = mysqli_query($mysqli,"SELECT * FROM `food_listing` WHERE `name` LIKE '%$tags%' ORDER BY `name` ASC"); 

  $folderList                 = array();
  $folderList['sandwich']     = 'images/sandwich/';
  $folderList['scrbreakfast']  = 'images/breakfast/'; 
  $folderList['scrdrinks']    = 'images/drink/';
  $folderList['scrlunch']     = 'images/lunch/'; 
  $folderList['indian']       = 'images/indian/'; 
  $folderList['laksa']        = 'img/'; 

  if(isset($_SESSION['tags'])){
    unset($_SESSION['tags']);
  }

}else{

  header("Location:stdPage.php");
  exit();
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

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" >

   

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

    <h1 style="text-align: center;margin-bottom: 40px">Search Results</h1>

  

    <div class="container">

      

  <?php

if(isset($_SESSION['mmessage'])){

    echo $_SESSION['mmessage']; unset($_SESSION['mmessage']);

  } 

  $index = 1;

if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_assoc($result)){  

      if($index==1){

        echo "<div class='row'>";

      }



      ?>

   <div class="col-md-4">

        <figure class="card card-product">

          <div class="img-wrap">

            <img src='<?php echo $folderList[trim($row['sandwich'])]."/".$row['img'] ?>' style="height: 230px;"></div>

          <figcaption class="info-wrap">

            <h6 class="title" style='text-align: center'><?php echo $row['name']; ?></h6>

          </figcaption>

        <!--  <button type="button" id="fav" onclick="select(this)" style="color:#000000;font-weight: bold;" value="<?php  echo $row['id'];?>" class="btn btn-outline-danger">Add to Favorites</button> -->

          <div class="bottom-wrap">

            <form action="addToCartLive.php" method="post">

              <input type="hidden" value="<?php echo $row['id'] ?>" name="card_id">
              <input type="hidden" value="<?php echo $row['seller'] ?>" name='seller'>
              <input type="hidden" value="<?php echo trim($row['sandwich']) ?>" name='table'>  
              <input type="hidden" value="<?php echo $_POST['tags']; ?>" name="tags">

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
}else{
  echo "now result found";
}





if($index < 3){

  echo "</div>";

}



?>



</div>

<script>



function select(b){

	

	//alert(b.value);

	var name=b.value;

	

	b.style.backgroundColor = "E57474";

	





	

		$.post("addfav.php",{

			sandwich:name

			

		}, function(data, status){

			toastr.success(data);

			

		});



toastr.options.newestOnTop = false;



		

	toastr.options.closeMethod = 'slideUp';

	

}

</script>

  

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

