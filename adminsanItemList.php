<?php 

session_start(); 

require 'script/db.php';



$type = mysqli_real_escape_string($mysqli,$_GET['type']);

$result  = mysqli_query($mysqli,"SELECT * FROM sandwich WHERE type = '$type'");

?>

<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==1): 

if(isset($_GET['delete']) && isset($_GET['id'])){

		$id = mysqli_real_escape_string($mysqli,$_GET['id']);
		$rows = mysqli_query($mysqli,"SELECT * FROM sandwich where id = '$id'"); 
        $result = mysqli_fetch_assoc($rows);	
        unlink("images/sandwich/".$result['img']);

        mysqli_query($mysqli,"DELETE FROM sandwich where id = '$id'");
        $_SESSION['message'] = "<div class='alert alert-success'>Data Deleted successfully</div>";	
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

  <?php require 'navAdmin.php'; ?>

    

    <!-- Page Content -->

    <h1 style="text-align: center;margin-bottom: 40px"><?php echo ($type=="veg") ? "Vegetable Sandwich Items": "Non Vegetable Sandwich Items"  ?></h1>

  

    <div class="container">

      <?php if(isset($_SESSION['message'])){

           echo $_SESSION['message']; unset($_SESSION['message']);

      } ?>

      <table class="table table-bordered">

          <thead>

            <tr>

              <th scope="col">#</th>

              

              <th scope="col">Item Image</th>

              <th scope="col">Item Name</th>

              <th scope="col">Item Amount</th>

              <th scope="col">Item Quantity</th>

              <th scope="col">Action</th>

            </tr>

          </thead>

       <?php $rows = mysqli_query($mysqli,"SELECT * FROM sandwich where type = '$type'"); ?>

          <tbody>

            <?php $sl = 1;

            while($result = mysqli_fetch_assoc($rows)){  ?>

            <tr>

              <th scope="row"><?php echo $sl ?></th>

              <td><img src="images/sandwich/<?php echo $result['img']; ?>" id="image" class="img-responsive" width="200" height="200"></td>

              <th><?php echo $result['name'] ?></th>

              <th><?php echo $result['amount'] ?></th>

              <th><?php echo $result['quantity'] ?></th>
              <th style="text-align: center;">
              	<a href="adminSanEdit.php?type=<?php echo $type ?>&id=<?php echo $result['id'] ?>" class="btn btn-primary" style='width:150px'>Edit</a>
              	  <br><br>
              	 <a href="adminsanItemList.php?type=<?php echo $type ?>&id=<?php echo $result['id'] ?>&delete=delete" class="btn btn-danger" onclick="return confirm('Are you sure you wish to delete this ?')"v style='width:150px'>Delete</a>
              </th>

            </tr>

          <?php } ?>

          </tbody>

        </table>
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

