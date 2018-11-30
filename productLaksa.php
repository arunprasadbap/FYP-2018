<?php 
session_start(); 
require 'script/db.php';
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
	
    
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" >
   
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/layout.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/styleuserfood.css">
    <!-- Custom styles-->
    
  </head>

  <body>

    <!-- Navigation -->
    <?php require 'navUser.php'; ?>
    
    
    <!-- Page Content -->
   <h1 class="my-4"></h1>
   
      
    
    <div class="container">

	<?php $fetch=mysqli_query($mysqli,"SELECT * FROM Laksa");
while($row=mysqli_fetch_assoc($fetch)){  
$userid=$_SESSION['idnum'];
$id=$row['ID'];

?>

<div class="gallery">
  <a>
    <img src="img/<?php echo $row['FoodPic']; ?>" id="image" class="img-responsive" alt="" width="300" height="200">
  </a><form action="addtocart.php" method="post">
  <div class="desc"><h6><?php echo '<b>'.$row['FoodName'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$row['FoodPrice']; ?></h6>
  <div class="rw-ui-container"></div>
<input type="hidden" value="<?php  echo $id;  ?>" name="laksaid" ></input><button type="submit" name="laksabut" id="button" class="btn btn-primary">
   
         <span class="glyphicon glyphicon-shopping-cart"></span>  <span class="text">ADD TO CART</span>
        </button>
        </form>

		
</div>
</div>
<style>
.btn { 

	width:140px;
	height:0.5px;
	 padding: 8px 1px;
	 font-size: 13px;
	 margin:4px;
    cursor: pointer;
}
.btn:hover {
    background-color: #A9A9A9;
}
.fa fa-heart-o{
	 color: orange;
}
 

</style>


<script type="text/javascript">(function(d, t, e, m){
    
    // Async Rating-Widget initialization.
    window.RW_Async_Init = function(){
                
        RW.init({
            huid: "416885",
            uid: "a1f5fbb3854814bc28259e520315a0c7",
            options: { "style": "oxygen" } 
        });
        RW.render();
    };
        // Append Rating-Widget JavaScript library.
    var rw, s = d.getElementsByTagName(e)[0], id = "rw-js",
        l = d.location, ck = "Y" + t.getFullYear() + 
        "M" + t.getMonth() + "D" + t.getDate(), p = l.protocol,
        f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
        a = ("https:" == p ? "secure." + m + "js/" : "js." + m);
    if (d.getElementById(id)) return;              
    rw = d.createElement(e);
    rw.id = id; rw.async = true; rw.type = "text/javascript";
    rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
    s.parentNode.insertBefore(rw, s);
    }(document, new Date(), "script", "rating-widget.com/"));</script>
  
<?php
} ?>
  
 


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
<?php if(isset($_GET['ofs'])){        ?>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
<?php } 




?>