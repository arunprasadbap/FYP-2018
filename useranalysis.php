<?php session_start();
require 'script/db.php';
ob_start(); ?>

<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==1 ): ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Refresh" content="40">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cashless Canteen</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles-->
    <link href="css/layout.css" rel="stylesheet">
  </head>

  <body>
    <!-- Navigation -->
    <?php require 'navAdmin.php'; ?>

    <!-- Page Content -->
    <div class="container">
       
            
        
    
    </br>
      
       <h4 align="center"><b>TOP TEN USERS LIST</b></h4>
    </br>

    <div class="table-responsive">
      <table class="table" style="border:20px;">
        <thead class="thead-light">
          <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Total_Amount</th>
            <th colspan="4" style="text-align: center; width: 4%">Action</th>
          </tr>
        </thead>
      <tbody>
    <?php 
    $rows=mysqli_query($mysqli,"select userid,username, ROUND(sum(amount),2) as total_amount from history group by userid
order by 3 desc limit 10;");

    while($row=mysqli_fetch_assoc($rows)){
    $userid=$row['userid'];?>
      <tr>
          
        <td><?php echo $row['userid']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['total_amount']; ?></td>
        <td>
          <button data-toggle="modal" data-target="#<?php echo "dlv_".$row['userid'] ?>" class="btn btn-primary" type="button">view</button>
                            <div id="<?php echo "dlv_".$row['userid'] ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                   <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3>Details Information</h3>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                            <table class="table table-bordered table-striped">
                                                <tr>
                                                    <th>DATE</th>
            <th>User ID</th>
            <th>User Name</th>
            <th>food</th>
            <th>amount</th>
            
          </tr>
          <?php    $fetch=mysqli_query($mysqli,"select * from history where userid='$userid'");
          
          while($row=mysqli_fetch_assoc($fetch)){ ?>
                                                <tr>
                                                     <td><?php echo $row['time']; ?></td>
                                                    <td><?php echo $row['userid']; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                      <td><?php echo $row['food']; ?></td>
                                                       <td><?php echo $row['amount']; ?></td>
                                                </tr>
                                            <?php }  ?>
                                                  
                                                
                                            </table>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </td>
      </tr>
    <?php }  ?>
  </tbody>
</table>
<p align="center">
    <a href="analysis.php" class="analysis btn btn-info">Analysis</a>
</p>
</div>
</div>



<div class="modal fade" id="trans" role="dialog">

   <div class="modal-dialog modal-dialog-centered">
      <!-- Modal content-->

      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">User Graph</h2>
        </div>

        <div class="modal-body">
        <div class="table-responsive" style="border: 15px solid grey;">
         <h2 align="center"></h2>
         <h3 align="center"></h3>   
        <br /><br />
        <p><b>&nbsp;Amount in RM</b><p><div id="chart"></div>

  <p align="center"><b>UserID</b></p>

  </div>

  





    

        </div>

        <div class="modal-footer">

    

          <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>

        </div>

      </div>

      

    </div>

  </div>

</div>

 

    <!-- /.container -->



    <!-- Footer -->

    <?php //require 'footer.php'; ?>
    <!-- Bootstrap core JavaScript -->

    <script src="jquery/jquery.min.js"></script>

    <script src="js/bootstrap.bundle.min.js"></script>

     
    <script>
      
    </script>


  </body>



</html>

<?php else:   

header("Location: index.php");

die();?>

<?php endif; 

ob_end_flush();

?> 

