<?php session_start();

?>
<?php if(isset($_SESSION['role']) && ($_SESSION['role'] == 1) ): ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add User Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">
    
    

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>



  </head>

  <body>

    <!--Nav-->
    <?php require 'navAdmin.php'; ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row main">
				<div class="main-login main-center">
				<h5>Add new user for cashless system</h5>
					<form class="" method="post" action="script/register2.php">
						<?php if(isset($_SESSION['error'])): ?>
						<div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
						<?php elseif(isset($_SESSION['success'])): ?>
						<div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
						<?php endif; ?>	
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" pattern="[a-zA-Z]+" required title="First name and Alphabets only" maxlength="12" name="name" id="name"  placeholder="Enter Name" required="required"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter Email" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required title="use mail pattern e.g. user@mail.com" required="required"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">ID Num</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" pattern="[a-zA-Z0-9]+"  required title="can contain only alphanumeric characters" maxlength="9"  name="userid" id="username"  placeholder="Enter Username" required="required"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control"  pattern="[0-9a-zA-Z]{6,}" required title="min 6 characters and can only contain alphanumeric" name="password" id="password"  placeholder="Enter Password" required="required"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" pattern="[0-9a-zA-Z]{6,}" required title="min 6 characters and can only contain alphanumeric"  name="confirm" id="confirm"  placeholder="Confirm Password" required="required"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Role</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="number" class="form-control" name="role" id="role"   placeholder="Enter Role" required="required"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
						
					</form>
				</div>
			</div>
		</div>
    </div>
   
   <script language="javascript">
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Doesn't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

    <!-- Footer -->
   
    </footer>

    <!-- Bootstrap core JavaScript -->
   <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>
<?php else:   
header("Location: index.php");
exit();?>
<?php endif; ?> 
