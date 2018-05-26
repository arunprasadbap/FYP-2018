<?php session_start(); ?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==4): ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Food & Drinks Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">

  </head>

  <body>

   <!--Nav-->
   <?php require 'navSCR.php'; ?>

    <!-- Page Content -->
    <div class="container">
      <div class="sellframe">
        <div class="row my-4 text-center text-lg-left">
          <form class="formLaksa" method="post" action="scrDrink.php" enctype="multipart/form-data">
            <fieldset>
            <!-- Form Name -->
            <h3 class="display-4">Add Drink</h3>
            <!-- Text input-->
              <div class="form-group">
                <label class="col-lg-9 control-label" >Name</label>  
                  <div class="col-lg-9">
                    <input  name="Name" pattern="[a-zA-Z_ ]+ [a-zA-Z_ ]+ [a-zA-Z_ ]+ [a-zA-Z]+" required title="Alphabets only"  required="required" type="text">
                   </div>
              </div>
                <div class="form-group">
                  <label class="col-lg-9 control-label" >Price (MYR)</label>  
                    <div class="col-lg-9">
                      <input name="Price"  required="required" type="number" step='0.01' value='0.00'>
                    </div>
 <!-- File Button --> 
                <div class="form-group">
                  <label class="col-lg-9 control-label" >Insert Image</label>
                     <div class="col-lg-9">
                        <input id="filebutton" name="pic" class="input-file" type="file" required="required">
                     </div>
                  </div>
<!-- Button -->
                <div class="form-group">
                  <label class="col-md-4 control-label" ></label>
                    <div class="col-md-4">
                      <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit!</button>
                    </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
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
