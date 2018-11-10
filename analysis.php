<?php session_start();
require 'script/db.php';
ob_start(); ?>

<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==1 ): ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Refresh" content="60">
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
         <h4 align="center"><b>TOP TEN USERS GRAPH</b></h4>
    

    </br>

   


       <!-- history-->
<?php

$rows=mysqli_query($mysqli,"select userid,username, ROUND(sum(amount),2) as total_amount from history group by userid order by 3 desc limit 10;");

$chart_data = '';
$month='january';

while($row = mysqli_fetch_array($rows)){
    //$chart_data .= "{ amount:'".$row["total_amount"]."',userid:".$row["userid"]."}, ";
    $chart_data .= "{ y:'".$row["username"]."',a:".$row["total_amount"]."}, ";
}  
// echo '<pre>';
// print_r($chart_data);
// echo "</pre>";
?>
<div id="chart"></div>

 <script>

// Morris.Bar({

//  element : 'chart',

// // barColors: ["#1AB244"],
//  data:[<?php echo $chart_data; ?>],
//  xkey:"userid",
//  ykeys:"amount",
//  labels:"userid",
//  barColors: ["#1AB244"],
//  hideHover:false
// // stacked:true
// });
Morris.Bar({
  element: 'chart',
  barColors: ["#1AB244"],
  data: [<?php echo $chart_data; ?>],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['RM', '']
});
</script> 



</div>
</br>
 <p align="center"><a href="useranalysis.php"><button type="button" class="btn btn-info"    >Back</button></p>

 

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

