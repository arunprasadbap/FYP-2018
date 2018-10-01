<?php session_start(); ?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==2 ): ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cashless Canteen</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">
   
	
		<!-- Website Font style -->
	    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
  </head>

  <body>

    <!-- Navigation -->
    <?php require 'navUser.php'; ?>
    
  

   <!-- Page Content -->
    <div class="container">

      <h1 class="my-4">SCR Menu</h1>

      
      <div class="row">
        <div class="col-lg-6 mb-6">
          <div class="card h-100">
            <h4 class="card-header">Breakfast</h4>
            <div class="card-body">
              <a href="bfastProduct.php"><img class="card-img-top" src="img/bfast1.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-6">
          <div class="card h-100">
            <h4 class="card-header">Lunch</h4>
            <div class="card-body">
              <a href="lunchProduct.php?idr=1""><img class="card-img-top" src="img/lunch1.png" alt=""></a>
            </div>
          </div>
        </div>
        </div>
      </div>
  <hr>

    <!-- Footer -->
   
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>
 <script type="text/javascript">
var LHCChatOptions = {};
LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
po.src = '//swincashlesscanteen.000webhostapp.com/lhc_web/index.php/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true/(department)/1?r='+referrer+'&l='+location;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
</html>
<?php else:   
header("Location: index.php");
die();?>
<?php endif; ?> 