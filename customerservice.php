<?php session_start();
$host = "localhost";
$dbusername = "id5215770_adminrat";
$dbpassword = "cashlesscanteenrat";
$dbname = "id5215770_cashlesscanteenswin";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname);

//echo "SELECT * FROM orders WHERE stall='4' AND (order_status='processing' || order_status = 'on the way') ORDER BY date DESC";
//die;

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
                
               <th>User ID</th>
                <th>Password</th>
                <th align="center">Options</th>
                
            </tr>
                <td>SANDWICH</td>
                <td>123456</td>
                <td><a href="http://swincashlesscanteen.000webhostapp.com/lhc_web/index.php/site_admin/user/login#!#%2Fchat-id-3">
                            <button type="button" class="btn btn-success">Click</button>
                        </a></td>
            </thead>
           
        </table>
<p><b>To activate chat with customer open the chat link by clicking the button and open in seperate tab and put your stall id and password</b></p>

                        

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