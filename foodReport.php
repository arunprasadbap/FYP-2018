<?php session_start();
ob_start();?>
<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1): ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

<meta http-equiv="Refresh" content="5">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Ordered Food Analysis</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->

    <link href="css/layout.css" rel="stylesheet">

     
        

    </head>

    <body>

    <!--Nav-->
    <?php require 'navAdmin.php'; ?>
    <!-- Page Content -->
    <div class="container">
        <br>
        
        <h1>Top Ten Ordered Food</h1>
        
                   

        <table class="table table-hover" border="1">
            <thead class="thead-dark">
            <tr>
                <th>Food Name</th>
                <th>Number Of user ordered</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $host = "localhost";
            $dbusername = "id5215770_adminrat";
            $dbpassword = "cashlesscanteenrat";
            $dbname = "id5215770_cashlesscanteenswin";
            $mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname);
            foreach($mysqli->query('SELECT foodname,COUNT(*)
            FROM orders
            GROUP BY foodname ORDER BY COUNT(*) desc limit 10;') as $row) {
                ?>
                <tr>
                    <td><?php echo $row['foodname']; ?></td>
                    <td><?php echo $row['COUNT(*)']; ?></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
 <p align="center">
    <a href="foodAnalysis.php" class="analysis btn btn-primary">Food Analysis</a>
    <a href="favReport.php" class="analysis btn btn-info">Fav Analysis</a>
</p>
    

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php //require 'footer.php'; ?>

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
<?php else:
    header("Location: index.php");
    die(); ?>
<?php endif; ?>
<style>
    .table {
        position: relative;
    }

    .thead-dark {
        height: 250px;
        overflow: auto;
        margin-top: 20px;
    }


</style>