<?php session_start(); ?>
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

</head>

<body>

<div class="login-form">
    <form action="script/send_email.php" method="post">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?php echo $_SESSION['error'];
                unset($_SESSION['error']) ?></div>
        <?php endif; ?>
        <p class="text-center">Please enter your registered email address. You will receive a link to create a new password via email.</p>
        <hr>
        <div class="form-group">
            <input type="email" class="form-control" name="forget_email" placeholder="Email Address"
                   required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="submit_email">Send Email</button>
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
