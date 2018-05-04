<?php session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "canteen";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname);



?>
<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 4): ?>
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
    <?php require 'navSCR.php'; ?>

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
                <th colspan="2" style="text-align: center; width: 4%">Options</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stall = 4;

            $fetch = mysqli_query($mysqli, "SELECT * FROM orders WHERE stall='$stall' AND order_status = 'delivered' ORDER BY date DESC");
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
                    <a href="javascript:void(0)">
                        <button type="button" class="btn btn-primary">Delivered</button>
                    </a>
                    </td>
                      <td class="contact-delete">
                            <form action='delivery.delete.php?name="<?php echo $row['orderid']; ?>"' method="post">
                                <input type="hidden" name="name" value="<?php echo $row['userid']; ?>">
                                <input type="submit" onClick="if(confirm('Are you sure want to delete this user ?')) { return true; } else { return false; }" class="btn btn-danger" name="submit" value="Delete">
                            </form>
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