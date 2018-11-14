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

$query = "SELECT * FROM orderanalysis ORDER BY date DESC ";
$result = mysqli_query($conn,$query);
$chart_data = '';
$month='january';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ year:'".$row["date"]."', INDIAN:".$row["indian"].", SCR:".$row["scr"].", SANDWICH:".$row["sandwich"].",LAKSA:".$row["laksa"]."}, ";
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

    <title>Report Page</title>

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
          <h4 align="center"><b>Stall analysis</b></h4>
	</br>
	

	<div class="table-responsive" style="border: 15px solid grey;">
	 <h2 align="center"></h2>
   <h3 align="center"></h3>   
   <br /><br />
  <p><b>&nbsp;No of Orders</b><p><div id="chart"></div>
  <p align="center"><b>Date</b></p>
  
  
	</div>
	
	
	<p><h2 align="center">Total sales amount</h2></p>
		<table class="blueTable"" id="dev-table">
						<thead>
							<tr>
								<th>INDIAN</th>
								<th>SCR</th>
								<th>LAKSA</th>
								<th>SANDWICH</th>
								
							</tr>
						</thead>
						<tbody>
						<?php
						$query = "SELECT ROUND(SUM(indian),2) AS indian, ROUND(SUM(scr),2) AS scr, ROUND(SUM(laksa),2) AS lak,ROUND(SUM(sandwich),2) AS sand FROM overall";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result))
{ $test=max($row['indian'],$row['scr'],$row['lak'],$row['sand']);

if($test==$row['indian']){
						    $name="INDIAN";
						}
						else if($test==$row['scr']){
						    $name="SCR";
						}
						else if($test==$row['lak']){
						    $name="LAKSA";
						}
						else if($test==$row['sand']){
						   $name="SANDWICH";
						}
    ?>
							<tr>
								<td>	<?php echo 'RM '.$row['indian'];  ?></td>
								<td>	<?php echo  'RM '.$row['scr']; ?></td>
								<td>	<?php  echo 'RM '.$row['lak']; ?></td>
								<td>	<?php  echo 'RM '.$row['sand']; ?></td>
							
							</tr>
						
						<?php 
							
							
						
						
						} ?>
						</tbody>
					</table>
					</br>
					
					
				<?php 
							
							echo '<p align="center">No 1 stall as per the daily performance <b>'.$name.' '.$test.'</p></b>';
						
						
						 ?>
					</br></br></br></br>
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
ykeys:['INDIAN', 'SCR','SANDWICH','LAKSA'],

 labels:['INDIAN', 'SCR','SANDWICH','LAKSA'],
 barColors: ["#D09308", "#E8252B", "#047A5F", "#1E64EF"],
 hideHover:false,

gridTextWeight:'bold'

 
// stacked:true
 
 
});
</script> 

<style>
table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 15px;
  font-weight: bold;
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #075DA4;
  background: -moz-linear-gradient(top, #4585bb 0%, #1f6dad 66%, #075DA4 100%);
  background: -webkit-linear-gradient(top, #4585bb 0%, #1f6dad 66%, #075DA4 100%);
  background: linear-gradient(to bottom, #4585bb 0%, #1f6dad 66%, #075DA4 100%);
}
table.blueTable thead th {
  font-size: 18px;
  font-weight: bold;
  color: #FFFFFF;
}
table.blueTable tfoot td {
  font-size: 14px;
}
</style>
