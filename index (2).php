<?php 
ob_start();
session_start(); ?>

<!DOCTYPE html>

<html lang="en">
    
<head>
	<title>Log in page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
img {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
</style>

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	 <body class="inner-body">
      

   <div class="login-form">
    <form class="image-panel" action="script/login.php" method="post">
    

				<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				
					<img src="img/canteens.png" alt="IMG" style="width:50%">
				
                

				<form class="login100-form validate-form">
					<span class="login100-form-title">
					    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error']; //unset($_SESSION['error']) ?></div>
    <?php endif; ?>
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']) ?></div>
    <?php endif; 
    
    ?>
    </br>
    
						 Members Login
						
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid userID is required: ex@abc.xyz">
						<input class="input100" type="UserID" class="form-control"pattern="[a-zA-Z0-9]+" required title="can contain only alphanumeric characters" maxlength="9" name="idnum" placeholder="User ID">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-badge" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="clearfix">
            
                        <a href="forget_password.php" class="pull-right">Forgot Password?</a>
                    </div>

					
			
					<!-- Footer -->
    <?php require 'footer.php'; ?>
    </footer>
    </form>
		
			</div>
		</div>
	</div>
	 

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php
ob_end_flush();
?>