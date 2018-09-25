<?php session_start(); 
require 'script/db.php';
function getFileExtension($fileName){

	$file_ext 		    = explode(".", $fileName);

	$file_final_ext 	= strtolower(end($file_ext));

	return $file_final_ext;

}

if(isset($_POST['submit'])){

  $id = $_POST['id'];
  $quantity = trim($_POST['quantity']);
  $item_name = $_POST['item_name'];
  $amount = trim($_POST['amount']);
  $img    = trim($_POST['img']);

  $type = $_POST['type'];

  $_SESSION['message'] = "<div class='alert alert-success'>Data Updated Successfully</div>";

 
  mysqli_query($mysqli, "UPDATE sandwich SET quantity = '$quantity', name = '$item_name', amount = '$amount' WHERE id = '$id'");

  if(!empty($_FILES['image']['name'])){

  	$file_extension = getFileExtension($_FILES['image']['name']);

  	$file_type_allow = array('jpeg','png','jpg','gif');

  	if (in_array($file_extension, $file_type_allow)){

	if ($_FILES['image']['error'] === 0){

		if ($_FILES['image']['size'] < 10000000){

			$check=1;

			$file_new_name = uniqid('sandwich', false).".".$file_extension;

			$file_des = "images/sandwich/".$file_new_name;

			move_uploaded_file($_FILES['image']['tmp_name'], $file_des);
			unlink("images/sandwich/$img");	
			mysqli_query($mysqli, "UPDATE sandwich SET img = '$file_new_name'  WHERE id = '$id'");

		}else{

			$_SESSION['message'] = "<div class='alert alert-danger'>File very large</div>";

		}

	}else{

		$_SESSION['message'] = "<div class='alert alert-danger'>Error occured while upload</div>";	
		

	}

	}else{

		$_SESSION['message'] = "<div class='alert alert-danger'>Invalid file type</div>";	

	}	
}

}

?>

<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==1 ): ?>

<!DOCTYPE html>

<html lang="en">



  <head>



    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>Add Breakfast</title>



    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">



    <!-- Custom styles for this template -->

    <link href="css/layout.css" rel="stylesheet">



  </head>



  <body>



   <!--Nav-->

   <?php 

   $type = $_GET['type'];

   $id   = $_GET['id'];

//echo "SELECT * FROM sandwich where type = '$type' AND id = '$id'";

   $rows = mysqli_query($mysqli,"SELECT * FROM sandwich where type = '$type' AND id = '$id'"); 

   $result = mysqli_fetch_assoc($rows);

    require 'navAdmin.php'; ?>



    <!-- Page Content -->

    <div class="container">

      <h3 style="text-align: center;margin-top: 40px">Edit <?php echo ($type=="veg") ? "Veggi Sandwich" : "Non Veggi Sandwich" ?></h3>

      <div class="col-md-4">

      	<?php if(isset($_SESSION['message'])){

           echo $_SESSION['message']; unset($_SESSION['message']);

      } ?>

        <form action="adminSanEdit.php?type=<?php echo $type ?>&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">

          <div class="form-group">

            <label for="exampleInputEmail1">Name</label>

            <input type="text" class="form-control" value="<?php echo $result['name'] ?>" name="item_name"  >

          </div>



          <div class="form-group">

            <label for="exampleInputEmail1">Quantity</label>

            <input type="text" class="form-control" name="quantity" value="<?php echo $result['quantity'] ?>" required>

            <input type="hidden" name="id" value="<?php echo $result['id'] ?>">

            <input type="hidden" name="type" value="<?php echo $result['type'] ?>">
            <input type="hidden" name="img" value="<?php echo $result['img']; ?>">

          </div>

           <div class="form-group">

            <label for="exampleInputEmail1">Price</label>

            <input type="text" class="form-control" value="<?php echo $result['amount'] ?>" name="amount"  >

          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Insert Image</label>

            <input type="file" class="form-control" name="image" placeholder="Enter Item Price">

            <input type="hidden" name="type" value="<?php echo $type ?>">

          </div>





          <button type="submit" name="submit" class="btn btn-primary">Update</button>

        </form>

      </div>

    </div> 

 

    <!-- /.container -->



    <!-- Footer -->

    <!-- Bootstrap core JavaScript -->

    <script src="jquery/jquery.min.js"></script>

    <script src="js/bootstrap.bundle.min.js"></script>



  </body>



</html>



<?php else:   

header("Location: index.php");

die();?>

<?php endif; ?> 