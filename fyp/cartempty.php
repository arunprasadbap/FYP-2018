<?php 
session_start(); 
require 'script/db.php';

$query = "SELECT * FROM scrbreakfast";
$result = $mysqli->query($query);

if(isset($_GET['later'])){
	
	unset($_SESSION['rating']);
	header("Location:cartempty.php");
}

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
		
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/styleuserfood.css">
    <!-- Custom styles-->
    <link href="css/layout.css" rel="stylesheet">
  </head>

  <body>

    <!-- Navigation -->
    <?php require 'navUser.php'; ?>
    
    
    <!-- Page Content -->

   
      
    <div class="container">
 <div style="margin:25px;"><h1 align="center"><mark>YOUR CART IS EMPTY</mark></h1></div>
	
  <div class="modal fade" id="ratings" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
  <div class="modal-header">
  <h2 class="modal-title"><strong>Please Rate Our Application</strong></h2>
  </div>
 
  <div class="modal-body" align="center">
  <form action="rating.php" method="post">
<fieldset class="rating">
   
    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
</fieldset>

</div>
  <button type="submit" name="rate" class="btn btn-success">Submit<button>
  
  </form>
  
  </div>
  </div>
  <div class="modal-footer">
    
    
  </div>
  
  </div>
  
</div>

</div>

</div>


	
	
	
	
	
	
	
	
	
	
       
       
        
  
  
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

<?php if(isset($_SESSION['rating'])){        ?>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#ratings').modal('show');
    });
</script>
<?php } 




?>
<style>

.rating {
    float:left;
	margin-left:40px
	
}


.rating:not(:checked) > input {
    position:absolute;
    top:-9999px;
    clip:rect(0,0,0,0);
}

.rating:not(:checked) > label {
    float:right;
    width:1em;
    padding:0 .1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:400%;
    line-height:1.2;
    color:#ddd;
    text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:before {
    content: '★ ';
}

.rating > input:checked ~ label {
    color: #f70;
    text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
    color: gold;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > input:checked + label:hover,
.rating > input:checked + label:hover ~ label,
.rating > input:checked ~ label:hover,
.rating > input:checked ~ label:hover ~ label,
.rating > label:hover ~ input:checked ~ label {
    color: #ea0;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > label:active {
    position:relative;
    top:2px;
    left:2px;
}

</style>
