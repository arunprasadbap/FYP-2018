<?php
session_start();
require 'script/db.php';
if(isset($_SESSION['role']) && $_SESSION['role'] ==1);

if(isset($_GET['delete'])){
  
    $id=$_GET['delete'];
    
     $fetch=mysqli_query($mysqli,"SELECT * FROM Laksa WHERE ID='$id'");
$row=mysqli_fetch_assoc($fetch);  
$image1=$row['FoodPic'];
$target2="img/".$image1;


    if(mysqli_query($mysqli,"DELETE FROM Laksa WHERE ID='$id'")){
      if(!unlink($target2)){
        echo "error deleting";
      } else{
      header("location:LaksaViewAdmin.php");
      }
    }else{
    echo "error";}
    
  } 

?>

<html>

<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  <link rel="stylesheet" type="text/css" href="css/styleviewfood.css">

    <title>Laksa Stall</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">
    
    
 
    <!-- Website Font style -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
</head>
<body>


  <?php require 'navAdmin.php'; ?>
<div class="container">
<?php $fetch=mysqli_query($mysqli,"SELECT * FROM Laksa");
while($row=mysqli_fetch_assoc($fetch)){ 
$id=$row['ID'];

 ?>

<div class="gallery">
  <a>
    <img src="img/<?php echo $row['FoodPic']; ?>" id="image1" alt="" width="300" height="200">
  </a>
  <div class="desc"><h6><?php echo '<b>'.$row['FoodName'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$row['FoodPrice']; ?></h6><a href="updateLaksaAdmin.php?edit=<?php echo $id; ?>"  ><button type="button" name="editlaksa" class="btn btn-primary">EDIT</button></a> &nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="LaksaViewAdmin.php?delete=<?php echo $id; ?>"  ><button type="button"  name="deletelaksa" class="btn btn-danger" >DELETE</button></a></div>
</div>

<?php
 }
 ?>


<!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>
