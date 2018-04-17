<?php session_start(); ?>

<?php if(isset($_GET['code']) && !empty($_GET['code'])):
    include_once 'script/db.php';
    $code = $mysqli->escape_string($_GET['code']);

    $result = $mysqli->query("SELECT `userid`,`username` FROM account WHERE code='$code'");

    if($result->num_rows == 0){
        echo "invalid Request";
        exit();
    }else{
        $_SESSION['code'] = $code;
    }

    ?>


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

  </head>

  <body>

   <div class="login-form">
    <form action="script/reset-password.php" method="post">
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']) ?></div>
    <?php endif; ?>
        <h2 class="text-center">Reset Password</h2>
        <div class="form-group">
            <input type="password" class="form-control" name="pass" placeholder="New Password" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="compass" placeholder="Retype Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="reset_password_submit">Submit</button>
        </div>
    </form>
    
</div>

    <!-- Footer -->
    <?php require 'footer.php'; ?>
    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>
<?php
else:
echo "this page is not valid";
endif;
?>
