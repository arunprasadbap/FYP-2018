<?php session_start();
$host = "localhost";
$dbusername = "id5215770_adminrat";
$dbpassword = "cashlesscanteenrat";
$dbname = "id5215770_cashlesscanteenswin";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname);
?>

<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==3): ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Refresh" content="5">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Canteen Staff Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">

  </head>

  <body>

   <!--Nav-->
   <?php require 'navCanteen.php'; ?>

    <!-- Page Content -->
<div class="container">
        </br>
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Date/Time</th>
                <th>User ID</th>
                <th>User Name</th>
                <th>Food/Drink</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Table No</th>
                <th align="center">Options</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stall =1;

            $fetch = mysqli_query($mysqli, "SELECT * FROM orders WHERE stall='$stall' AND (order_status='processing' || order_status = 'on the way') ORDER BY date DESC");
            while ($row = mysqli_fetch_assoc($fetch)) {
                $id = $row['orderid'];
                ?>
                <tr>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['userid']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['foodname']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['foodamount']; ?></td>
                    <td><?php echo $row['ordertype']; ?></td>
                    <td>
                        <?php if($row['order_status'] == 'processing'): ?>
                            <a href="LaksaStaffOption.php?idready=<?php echo $id; ?>">
                                <button type="button" class="btn btn-success">Ready</button>
                            </a>
                            <?php elseif($row['order_status'] == 'on the way'): ?>
                            <a href="javascript:void(0)">
                                <button type="button" class="btn btn-warning">On the way</button>
                            </a>
                        <?php endif; ?>

                        <a href="LaksaStaffOption.php?idcancel=<?php echo $id; ?>">
                            <button type="button" class="btn btn-danger">Cancel</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>


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