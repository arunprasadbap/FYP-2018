<?php session_start();
require 'script/db.php';
ob_start(); ?>

<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==1 ): ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Refresh" content="5">
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
    <div class="container" >
        </br>
         <h4 align="center"><b>Top Ten Ordered Food</b></h4>
    

    </br>

   


     
<?php

$rows=mysqli_query($mysqli,"SELECT foodname,COUNT(*)
            FROM orders
            GROUP BY foodname ORDER BY COUNT(*) desc limit 10;");

$chart_data = '';
$month='january';

while($row = mysqli_fetch_array($rows)){
    
    $chart_data .= "{ y:'".$row["foodname"]."',a:".$row["COUNT(*)"]."}, ";
}  

?>
<div id="chart" style="height: 450px;width:250%"></div>

 <script>


Morris.Bar({
  element: 'chart',
  barColors: ["#8470ff"],
 
  data: [<?php echo $chart_data; ?>],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['User', '']
});
</script> 



</div>
</br>
 <p align="center"><a href="foodReport.php"><button type="button" class="btn btn-primary"    >Back</button></p>

 

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

die();?>

<?php endif; 

ob_end_flush();

?> 

