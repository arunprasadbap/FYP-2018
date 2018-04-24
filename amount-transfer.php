<?php session_start(); ?>
<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 2):?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
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
            <div class="row main">
                <div class="main-login main-center">
                    <h1>Amount Transfer</h1>
                </div>
            </div>
            <div style="width: 50%;margin: auto;">
                <hr>
                <?php if(isset($_SESSION['transfer']['status']) && $_SESSION['transfer']['status'] == "preview"):
                        unset($_SESSION['transfer']['status']); ?>
                    <form action="script/transfer-amount.php" method="post">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Student Id:</th>
                                    <th><?php echo $_SESSION['transfer']['student_id']  ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Name:</th>
                                    <th><?php echo $_SESSION['transfer']['user_name'];  ?></th>
                                </tr>
                                <tr>
                                    <th>Amount:</th>
                                    <th><?php echo $_SESSION['transfer']['amount']  ?></th>
                                </tr>
                                <tr>
                                    <th style="text-align: center;"> <button type="submit" name="transfer_amount_cancel" class="btn btn-danger btn-sm center-block" >
                                            Cancel
                                        </button></th>
                                    <th style="text-align: center;"> <button type="submit" name="transfer_amount_successful" class="btn btn-primary btn-sm center-block" >
                                            Proceed
                                        </button></th>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                <?php else: ?>
                    <form action="script/transfer-amount.php" method="post">
                        <?php if(isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']) ?></div>
                        <?php elseif(isset($_SESSION['success'])): ?>
                            <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']) ?></div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label>Student Id:</label>
                            <input type="text" class="form-control" name="userid"/>
                        </div>
                        <div class="form-group">
                            <label>Amount:</label>
                            <input type="text" class="form-control" name="amount" />
                        </div>
                        <div class="form-group">
                            <label>Password :</label>
                            <input type="password" class="form-control" name="pass"/>
                        </div>
                        <button type="submit" name="transfer_amount" class="btn btn-primary btn-sm center-block">
                            Transfer
                        </button>
                    </form>
                <?php endif; ?>
            </div>
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
