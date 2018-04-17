<?php
session_start();
include_once 'db.php';
include_once "function.php";

if(isset($_POST['reset_password_submit'])){
    $pass       = $mysqli->escape_string($_POST['pass']);
    $compass    = $mysqli->escape_string($_POST['compass']);
    $code       = $_SESSION['code'];
    $newCode    = uniqid();

    if($pass == $compass){
        $pass = hash_password($pass);
        $mysqli->query("UPDATE `account` SET `userpass` = '$pass', `code` = '$newCode'  WHERE `code` = '$code'");
        unset($_SESSION['code']);

        //new session set
        $_SESSION['success'] = 'success';
        header("Location: ../password-reset-successful.php");
        exit();
    }else{
        $_SESSION['error'] = "password miss matched";
        header("Location: ../reset-password.php?code=".$code);
        exit();
    }


}else{
    echo "invalid request";

}