<?php 
session_start();
include_once 'db.php';
include_once "function.php";

if(isset($_POST['change_password'])){
    $pass       = $mysqli->escape_string($_POST['pass']);
    $compass    = $mysqli->escape_string($_POST['compass']);
    $oldPass    = hash_password($mysqli->escape_string(($_POST['old_password'])));

    $result     = $mysqli->query("SELECT `userpass` FROM `account` WHERE `username` = '$_SESSION[username]'");
    $row        = $result->fetch_assoc();

    if($oldPass != $row['userpass']){
        $_SESSION['error'] = "Please Provide your current password correctly";
    }elseif($pass != $compass){
        $_SESSION['error'] = "password miss matched";
    }else{
        $pass = hash_password($pass);
        $mysqli->query("UPDATE `account` SET `userpass` = '$pass' WHERE `username` = '$_SESSION[username]'");
        $_SESSION['success'] = 'Password Changed Successfully';
    }

    header("Location: ../reset-individual-password.php");
    exit();
}else{
    echo "invalid request";

}

?>