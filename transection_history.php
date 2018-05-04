<?php session_start(); ?>
<?php if(isset($_SESSION['role']) && ($_SESSION['role'] == 2) ): ?>

<?php

$con = mysqli_connect("localhost","root","","canteen");
$rs=mysqli_query($con,"SELECT * FROM transection_history WHERE formid = '$_SESSION[idnum]'");

$userid=$_SESSION['idnum'];
if(isset($_POST['deletehistory'])){
	
	if(mysqli_query($con,"DELETE FROM transection_history WHERE formid='$userid'")){
		header("location:transection_history.php");
		
	}
	
	
}


$data=array();
while($row=mysqli_fetch_assoc($rs)){
    $data[]=$row;
}

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Transection History Page</title>
        <!-- Bootstrap core CSS -->

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/layout.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/custom.css" rel="stylesheet">

        <!-- Website Font style -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    </head>

    <body>

    <!--Nav-->
    <?php require 'navUser.php'; ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row main">
            <div class="main-login main-center">
                <h1>Transection History</h1>
            </div>
        </div>
        
        <div class="table-listing table-responsive">
            <table id="table" border="1em" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Date/Time</th>
                    <th>Amount</th>
                    
                    
                </tr>
                </thead>

                <tbody id="transection_history">
                <?php foreach ($data as $transection) { ?>
                    <tr id="row<?php echo $transection['userid']; ?>">
                        <td><?php echo $transection['userid']; ?></td>
                        <td class="uname"><?php echo $transection['username']; ?></td>
                        <td class="dt"><?php echo $transection['date_time']; ?></td>
                        <td class="amnt"><?php echo $transection['amount']; ?></td>
                        
                        
                      
                    </tr>
                <?php } ?>
                </tbody>
            </table>
     
            <p align="center"><button type="button" class="btn btn-danger btn-block"  style="width:250px;height:60px;" data-toggle="modal" data-target="#delete"  >CLEAR TRANSACTION HISTORY</button>
            </p>
                
            
        </div>
       
    </div>
    <!-- Trigger the modal with a button -->
<div class="modal fade" id="delete" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
       
          <h2 class="modal-title">Clear Order History</h2>
        </div>
        <div class="modal-body">
          <p><b>Are you sure you want to clear your order history?</b></p>
        </div>
        <div class="modal-footer">
		<form action="transection_history.php" method="post">
		<button type="submit" name="deletehistory" class="btn btn-primary">YES</button>
		</form>
          <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
        </div>
      </div>
      
    </div>
  </div>
        

        <!-- Bootstrap core JavaScript -->
        <script src="jquery/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        
<!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->

       

    </body>
    </html>
<?php else:
    header("Location: index.php");
    die(); ?>
<?php endif; ?> 