<?php 
session_start(); 
require 'script/db.php';

$query = "SELECT * FROM scrbreakfast";
$result = $mysqli->query($query);

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
 <div style="margin:25px;"><h1 align="center"><mark>YOUR CART IS EMPTY</mark></h1><div>
	</br>
	</br>
	</br>
	</br>
	<?php
//for( $i=0; $i<$number; $i++){
		//echo $array[$i];
		//echo "</br>";
		
	//}
	
	?>
	
<?php 
$datee="2018-09-16 01:41:24";
$userid=$_SESSION['idnum'];
$stall=4;
$status="processing";
 $fetch=mysqli_query($mysqli,"SELECT * FROM orders WHERE stall='$stall' and order_status='$status' ORDER BY date ");
	$stall=4;
	$status="processing";
	 $fetching=mysqli_query($mysqli,"SELECT * FROM orders WHERE stall='$stall' and order_status='$status' ORDER BY date ");

$number=mysqli_num_rows($fetching);
$array = array();
$count=0;

while($rowing=mysqli_fetch_assoc($fetching)){
$array[$count]=$rowing['date'];
$count++;



}
	$another=0;
	$check=$another+1;

while($row=mysqli_fetch_assoc($fetch)){ 
if($row['userid']==$userid){
	$food=$row['foodname'];
	$date=$row['date'];
	
if($date==$array[$another]){
	//echo $another+1;
  ?>
  <?php   if($another == 0){ ?>
	<div id="myProg">
  <div id="my"></div>
</div>
<script>
var elem = document.getElementById("my"); 
	var position = document.getElementById("position").value; 
	console.log(position);
	 var elem = document.getElementById("my");
	 
		 var width=90;
		  elem.style.width = width + '%'; 
	 
	
	</script>
  <?php  }

  ?>
  <?php   if($another == 1){ ?>
	<div id="myProgress">
  <div id="myBar"></div>
</div>
<script>
var elem = document.getElementById("myBar"); 
	var position = document.getElementById("position").value; 
	console.log(position);
	 var elem = document.getElementById("myBar");
	 
		 var width=90;
		  elem.style.width = width + '%'; 
	 
	
	</script>
  <?php  }

  ?>
    <?php   if($another == 2){ ?>
	<div id="myProgres">
  <div id="myBa"></div>
</div>
<script>
var eleme = document.getElementById("myBa"); 
	var position = document.getElementById("position").value; 
	console.log(position);
	 var eleme = document.getElementById("myBa");
	 
		 var width=80;
		  eleme.style.width = width + '%'; 
	 
	
	</script>
  <?php  }

  ?>
   <?php   if($another == 3){ ?>
	<div id="threeprogress">
  <div id="threebar"></div>
</div>
<script>
var eleme = document.getElementById("threebar"); 
	var position = document.getElementById("position").value; 
	console.log(position);
	 var eleme = document.getElementById("threebar");
	 
		 var width=75;
		  eleme.style.width = width + '%'; 
	 
	
	</script>
  <?php  }

  ?>
  <?php   if($another == 4){ ?>
	<div id="fourprogress">
  <div id="fourbar"></div>
</div>
<script>
var eleme = document.getElementById("fourbar"); 
	var position = document.getElementById("position").value; 
	console.log(position);
	 var eleme = document.getElementById("fourbar");
	 
		 var width=66;
		  eleme.style.width = width + '%'; 
	 
	
	</script>
  <?php  }

  ?>
  <?php   if($another > 4 && $another <9){ ?>
	<div id="equal">
  <div id="equalbar"></div>
</div>
<script>
var eleme = document.getElementById("equalbar"); 
	var position = document.getElementById("position").value; 
	console.log(position);
	 var eleme = document.getElementById("equalbar");
	 
		//var width=20; 
		 // eleme.style.width = width + '%'; 
	 
	
	</script>
  <?php  }

  ?>
  <?php   if($another > 8){ ?>
	<div id="wait">
  <div id="waitbar"></div>
</div>
<script>
var eleme = document.getElementById("waitbar"); 
	var position = document.getElementById("position").value; 
	console.log(position);
	 var eleme = document.getElementById("waitbar");
	 
		//var width=20; 
		 // eleme.style.width = width + '%'; 
	 
	
	</script>
  <?php  }

  ?>

<input type="hidden" value="<?php  echo $another+1; ?>" id="position"></input>

	
<span id="value"><?php  echo $row['foodname']; ?> &nbsp;&nbsp;&nbsp;&nbsp;Order position : <b><?php echo $another+1; ?></b></span>
<?php 




 ?>
<br>
<br>
<?php 
}	//}
}
$another++;
} ?>

  <div class="modal fade" id="ratings" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title"><strong>Please Rate Our Application</strong></h4>
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


	
	
	
	
	
	
	
	
	
       
       
        
  
  
    <!-- /.container -->

    <!-- Footer -->
   
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
    font-size:300%;
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

<style>
#myProgress {
  width: 100%;
  background-color: #ddd;
}

#myBar {
  width: 50%;
  height: 30px;
  background-color: #4CAF50;
}
#myProgres {
  width: 100%;
  background-color: #ddd;
}

#myBa {
  width: 50%;
  height: 30px;
  background-color: #4CAF50;
}
#myProgre {
  width: 100%;
  background-color: #ddd;
}

#myB {
  width: 50%;
  height: 30px;
  background-color: #4CAF50;
}
#myProg {
  width: 100%;
  background-color: #ddd;
}

#my {
  width: 97%;
  height: 30px;
  background-color: #4CAF50;
}
#threeprogress {
  width: 100%;
  background-color: #ddd;
}

#threebar {
  width: 100%;
  height: 30px;
  background-color: #4CAF50;
}
#fourprogress {
  width: 100%;
  background-color: #ddd;
}

#fourbar {
  width: 100%;
  height: 30px;
  background-color: #4CAF50;
}
#waitbar {
  width: 100%;
  background-color: #ddd;
}

#waitbar {
  width: 40%;
  height: 30px;
  background-color: #4CAF50;
}
#equal {
  width: 100%;
  background-color: #ddd;
}

#equalbar {
  width: 55%;
  height: 30px;
  background-color: #4CAF50;
}
</style>