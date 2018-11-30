<?php session_start();?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==1): ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View Suggestion</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">

  </head>

  <body>

   <!--Nav-->
   <?php require 'navAdmin.php'; ?>
    <?php require 'script/viewSuggestScript.php';?>
    <!-- Page Content -->
<div class="container">
        </br>
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Date/Time</th>
                <th>User ID</th>
                <th>User Name</th>
                <th align="center">Options</th>
            </tr>
            </thead>
            <tbody>
            
            <?php while($list = $result->fetch_assoc()):?>
            
                <tr>
                    <td><?php echo $list['reg_date']; ?></td>
                    <td><?php echo $list['userID']; ?></td>
                    <td><?php echo $list['Name']; ?></td>
                    <td><a href="Suggestion form2.php?suggest_id=<?php echo $list['id']?> " class="btn btn-primary"">View</a></td>
                </tr>


        </tbody>
        <?php endwhile;?>
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