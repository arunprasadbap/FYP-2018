<?php session_start(); ?>
<?php 

$host = "localhost";
$dbusername = "id5215770_adminrat";
$dbpassword = "cashlesscanteenrat";
$dbname = "id5215770_cashlesscanteenswin";
$conn= mysqli_connect($host,$dbusername,$dbpassword,$dbname);
if(!$conn){
	
	
	die("cannot connect");
}

$query = "SELECT * FROM indianreport ORDER BY date DESC";
$result = mysqli_query($conn,$query);
$chart_data = '';
$month='january';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ year:'".$row["date"]."', amount:".$row["amount"]."}, ";
}

?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==1): ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add User Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/layout.css" rel="stylesheet">
    <!-- Custom styles for this template -->
   
    <link href="css/custom.css" rel="stylesheet">
    
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
		<!-- Website Font style -->
	   
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

  </head>

  <body>

    <!--Nav-->
    <?php require 'navAdmin.php'; ?>

      <div class="container">
          	</br>
          <h4 align="center"><b>Daily Report Indian</b></h4>
	</br>
	

	<div class="table-responsive" style="border: 15px solid grey;">
	 <h2 align="center"></h2>
   <h3 align="center"></h3>   
   <br /><br />
  <p><b>&nbsp;Amount in RM</b><p><div id="chart"></div>
  <p align="center"><b>Date</b></p>
	</div>
	
		</br>
	
	<p align="center"><a href="overall.php"><button type="button" class="btn btn-info"    >Compare with other stalls</button></p>
		</br>
	</div>
	    
	

    <!-- Footer -->
    <?php //require 'footer.php'; ?>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>
<?php else:   
header("Location: index.php");
die();?>
<?php endif; ?> 
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:"year",
 ykeys:[ 'amount'],
 labels:[ 'amount'],
 hideHover:'auto',
 stacked:true
});
</script>
