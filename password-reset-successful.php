<?php session_start(); ?>

<?php if(isset($_SESSION['success'])):
        unset($_SESSION['success']);
    ?>
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
        <p class="text-center">password has been reset successfully</p>
        <hr>
        <p style="text-align: center"><a href="index.php">Go to login page</a></p>
    </form>
</div>


<!-- Footer -->
<?php require 'footer.php'; ?>

<!-- Bootstrap core JavaScript -->
<script src="jquery/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php else:
    echo "invalid page";
endif;
?>
