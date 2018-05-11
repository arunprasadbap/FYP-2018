<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "canteen";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['name'];

// sql to delete a record


$rs = "DELETE FROM account WHERE userid=$id";

if (mysqli_query($con, $rs)) {
    echo '<script language="javascript">';
echo 'alert("record SUCCESSFULLY DELETED!!!!!")';
echo '</script>';
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=vendor.php\">";
} 

mysqli_close($con);
?>