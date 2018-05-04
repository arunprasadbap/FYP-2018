<?php session_start();
include_once "script/db.php";
?>
<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 2): ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Refresh" content="5">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Transfer Amount</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/layout.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/custom.css" rel="stylesheet">

        <!-- Website Font style -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    </head>

    <body>
    <!--Nav-->
    <?php require 'navUser.php'; ?>

    <!-- Page Content -->
    <div class="container">
        <?php if(isset($_SESSION['success'])): ?>
            <div class="row main">
                <div class="main-login main-center">
                    <h1><?php echo $_SESSION['success'];
                        unset($_SESSION['success']) ?></h1>
                </div>
            </div>
        <?php else: ?>
            <?php
            $result = $mysqli->query("SELECT number FROM orders WHERE userid = '$_SESSION[idnum]' AND order_status = 'on the way' LIMIT 1");
            if ($result->num_rows > 0):
                $row = $result->fetch_assoc();
                ?>
                <div class="row main">
                    <div class="main-login main-center">
                        <h1>Order Conformation</h1>
                    </div>
                </div>
                <div style="width: 50%;margin: auto;">
                <hr>
                <form action="script/order-confirmation.php" method="post">
                    <table class="table table-bordered">
                        <tbody>
                        <tr style="text-align: center;">
                            <th><?php echo $row['number'];
                                $_SESSION['number'] = $row['number']; ?></th>
                        </tr>
                        <tr>
                            <th style="text-align: center;">
                                <button type="submit" name="confirm_order" class="btn btn-primary btn-sm center-block">
                                    Conform Order
                                </button>
                            </th>
                        </tr>
                        </tbody>
                    </table>
                </form>
                </div><?php else: ?>
                <div class="row main">
                    <div class="main-login main-center">
                        <h1>You don't have any notication</h1>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <!-- Footer -->
    <?php require 'footer.php'; ?>
    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>

    </body>
    </html>
<?php else:
    header("Location: index.php");
    die(); ?>
<?php endif; ?> 
