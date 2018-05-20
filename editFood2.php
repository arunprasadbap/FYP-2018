<?php session_start(); ?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==4 ): ?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Sell</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">

  </head>
  <body>
    <!-- Navigation -->
    <?php require 'navSCR.php'; ?>
    <?php require 'script/editFoodStaff2.php';?>
    
    
    
		<div class="container">
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th align="center">Options</th>
            </tr>
            </thead>
            <tbody>
                <?php while($item = $result->fetch_assoc()):?>
		<tr>
		<td><?php echo $item['lunch']; ?></td>
        <td><?php echo $item['quantity']; ?></td>
        <td><a href="editing2.php?product_id=<?php echo $item['id']?> " class="btn btn-info"">Edit</a></td>
		</tr>
		  </tbody>
		  <?php endwhile;?>
        </table>
    </div>
  </div>
  	
  </div>
 

    <!-- /.container -->

    <!-- Footer -->
   

    <!-- Bootstrap core JavaScript -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

  </body>

</html>

	<?php else:   
header("Location: index.php");
die();?>
<?php endif; ?> 
