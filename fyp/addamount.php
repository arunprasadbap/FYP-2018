<?php
$name='';
$balance='';
 session_start(); ?>


  <?php  
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "canteen";
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if(isset($_SESSION['role']) && $_SESSION['role'] ==1);


?>

<html>

<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add User Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">
   
	
		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		
</head>
<body>
<?php require 'navAdmin.php'; ?>
 <?php
 if(isset($_SESSION['name'])){
	 
	$name=$_SESSION['name'];
	$balance=$_SESSION['amount'];
	?>
	 

 <div class="alert alert-success"><strong>Amount Successfully Updated</strong> &nbsp;&nbsp;Current User Balance is&nbsp;
  <strong><?php echo '<b>'.$balance.'</b>'; unset($_SESSION['name']); unset($_SESSION['amount']);?></strong><button type="button" onclick="location.href='addamount.php';" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>.
</div>
 <?php  }  ?>
 
<div class="container">
<form action="addamount2.php" method="POST">
<div>  
<label><b><h2>Student/Staff ID</h2></b></label> 
<p><input type="number" class="form-control input-lg" id="stid" name="id" placeholder="Student/Staff ID" onkeyup="validate()"></p>
 
</div>
<div >  
<label><b><h2>Amount</h2></b></label> 
<input type="number" class="form-control input-lg" id="stdamount" name="amount" placeholder="Amount" onkeyup="validate()" >
 </div>
</div >
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
       
          <h2 class="modal-title">Update Amount</h2>
        </div>
        <div class="modal-body">
          <p><b>Are you sure you want to update the User Amount?</b></p>
        </div>
        <div class="modal-footer">
		<button type="submit" name="viewamount" class="btn btn-primary">YES</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
        </div>
      </div>
      
    </div>
  </div>
<p align="center"><button type="button" name class="btn btn-default btn-lg" id="submitbutton" data-toggle="modal" data-target="#myModal" disabled >Submit</button></p>
  
</form>

</div>



<?php require 'footer.php'; ?>

</body>

</html>
<script type="text/javascript">
function validate(){
var id=document.getElementById("stid");
var amount=document.getElementById("stdamount");
if((id.value=="")||(amount.value==""))
    {
    document.getElementById("submitbutton").disabled=true;
    }
else
    document.getElementById("submitbutton").disabled=false;}
</script>