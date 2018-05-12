<?php
session_start();
include_once 'db.php';
//include_once "function.php";

if(isset($_POST['submit'])){
 	$userid       = $mysqli->escape_string($_POST['userid']);
 	$oldUserId    = $mysqli->escape_string($_POST['oldUserId']);
    $username     = $mysqli->escape_string($_POST['username']);
    $email        = $mysqli->escape_string($_POST['email']);
    $amount       = $mysqli->escape_string($_POST['amount']);

    $mysqli->query("UPDATE `account` SET `userid` = '$userid', `username` = '$username', `email`= '$email', `amount` =  '$amount' WHERE `userid` = '$oldUserId'");

    $_SESSION['success'] = 'User Information Edited Successfully';

     header("Location: ../viewuser.php");
     exit();	
}