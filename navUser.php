<?php


$size='';
$host = "localhost"; //databse connection arun
$dbusername = "root";
$dbpassword = "";
$dbname = "canteen";
$userid=$_SESSION['idnum'];
$mysqli = new mysqli ($host, $dbusername, $dbpassword, $dbname) or die($mysqli->error);

$fetch=mysqli_query($mysqli,"SELECT count(*) FROM cart WHERE user_id =$userid;");
$row=mysqli_fetch_assoc($fetch);
$size = $row['count(*)'];

?>
 
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
	  <?php if($size > 0){ ?>
				<a class="navbar-brand" href="stdPage.php">Cashless Canteen</a>
        <button class="navbar-toggler navbar-toggler-right" type="button"  data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span><span class="badge" style="color:white;font-weight:bold"><?php echo $size; ?></span> 
        </button>
			<?php } else { ?> 
            <a class="navbar-brand" href="stdPage.php">Cashless Canteen</a>
        <button class="navbar-toggler navbar-toggler-right" type="button"  data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
			<?php } ?>
        
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="stdPage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="history.php">Order History</a>
            </li>
			<?php if($size==0){ ?>
				<li class="nav-item">
              <a class="nav-link" href="cartempty.php"><span class="glyphicon glyphicon-shopping-cart"></span>  <span class="text"></span><span class="badge"><?php echo $size; ?></span></a>
            </li>
			<?php } else { ?> 
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span><span class="badge badge-notify" style="font-size:16px; font-color:white;"><?php echo $size; ?></span></a>
            </li>
			<?php } ?>
             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Setting
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="#">Change Password</a>
                <a class="dropdown-item" href="#">Transfer Credit</a>
              </div>
            </li>
             <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>
             <li class="nav-item">
              <a class="nav-link" href="#">Hello, <?php echo  $_SESSION['username']; ?>!</a>
            </li>
			<?php $fetch=mysqli_query($mysqli,"SELECT * FROM account WHERE userid ='$userid'");
$row=mysqli_fetch_assoc($fetch); ?>
            <li class="nav-item">
              <a class="nav-link" href="#">BAL: RM<?php echo  $row['amount']; ?></a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="script/logout.php">Logout</a>
            </li>
            <?php endif; ?> 
          </ul>
        </div>
      </div>
    </nav>
	<style>
.badge-notify{
 
  
   top:18px;
  }
  </style>
