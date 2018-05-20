<?php session_start(); require 'script/edit2.php'; $the_item= $edit->fetch_assoc();?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==4 ): ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SCR</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
	<?php require 'navSCR.php'; ?>



    <!-- Page Content -->

    <div class="container">
      <div class="sellframe">
      <div class="row my-4 text-center text-lg-left">

<form class="form2" method="post" action="script/update2.php?product_id=<?php echo $the_item['id']?>" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Edit Lunch Page</legend>

<!-- Text input-->

<!-- Text input-->





<div class="form-group">
  <label class="col-lg-9 control-label" >Food Amount</label>  
  <div class="col-lg-9">
  <input  name="stock"   required="required" type="number"  value="<?php echo $the_item['quantity']; ?>">
    
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" ></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Update!</button>
  </div>
  </div>



  


</fieldset>
</form>
</div>
</div>
</div>
  

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