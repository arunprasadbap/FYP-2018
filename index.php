<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cashless Canteen Login Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">
      
    <link href="css/custom.css" rel="stylesheet">

     
  </head>

  <body class="inner-body">
      

   <div class="login-form">
    <form class="image-panel" action="script/login.php" method="post">
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']) ?></div>
    <?php endif; ?>
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']) ?></div>
    <?php endif; ?>
        
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control"pattern="[a-zA-Z0-9]+" required title="can contain only alphanumeric characters" maxlength="9" name="idnum"  placeholder="User ID" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" pattern="[0-9a-zA-Z]{6,}" required title="min 6 characters and can only contain alphanumeric" name="pass"  placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="forget_password.php" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
    
</div>
      
<div style="text-align:center;margin-top:20px;"><h2 style=" text-shadow: 2px 2px #000000;color:#ffffff">TEAM RAT 2018</h2></div>
    <!-- Footer -->
    

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>
<
