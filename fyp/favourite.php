<?php session_start();

ob_start(); ?>

<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==2 ): ?>

<!DOCTYPE html>

<html lang="en">



  <head>



    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>Cashless Canteen</title>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" >

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles-->

    <link href="css/layout.css" rel="stylesheet">

  </head>



  <body>



    <!-- Navigation -->

    <?php require 'navUser.php'; ?>

    

   

    <!-- Page Content -->

    <div class="container">

</br>

      

<div class="table-responsive">

    <table class="table" style="border:20px;">

	<thead class="thead-light">

    <tr>

      <th><h4>Image</h4></th>

      <th><h4>Food/Drink</h4></th>

      <th><h4>Amount</h4></th>

	  <th><h4>Options</h4></th>

    </tr>

  </thead>

  <tbody>

    <?php 

$userid=$_SESSION['idnum'];





$fetch=mysqli_query($mysqli,"SELECT * FROM favourites WHERE userid='$userid'");



while($row=mysqli_fetch_assoc($fetch)){ 

$idfav=$row['id'];



 ?>

      <tr>

	  <td><img src="images/favourite/<?php echo $row['img']; ?>" id="image" class="img-responsive" alt="lunch" width="130" height="70">

	  </td>

        <td><h5><?php echo $row['food']; ?></h5></td>

        <td><h5><?php echo $row['amount']; ?></h5></td>

		<td><button type="button" onclick="Addcart(this)" value="<?php  echo $row['id'];?>" class="btn btn-primary">Add To Cart</button>&nbsp;&nbsp;<button type="button" onclick="deleteItem(this)" value="<?php  echo $row['id'];?>" class="btn btn-danger">Delete</button></h5></td>

       

      </tr>

	  <?php }  ?>

	  

	  

	

<script>



function Addcart(b){
	//alert(b.value);

	var name=b.value;

		$.post("addtocart.php",{
			favtocart:name
		}, function(data, status){
			setInterval(function(){ location.reload(); }, 500);
		});

}



function deleteItem(b){

	

	//alert(b.value);

	var name=b.value;

	

	

	





	

		$.post("addtocart.php",{

			deletefav:name

			

		}, function(data, status){

			

			 

        	setInterval(function(){ location.reload(); }, 500);

		});



toastr.options.newestOnTop = false;



		

	toastr.options.closeMethod = 'slideUp';

	

}

</script>

		

  </tbody>

	

	

	

	</table>

</div>

    



   

      </div>

 

    <!-- /.container -->



    <!-- Footer -->

    <?php //require 'footer.php'; ?>

    



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

<?php endif; 

ob_end_flush();

?> 