<?php
session_start();

include_once 'db.php';
include_once "send_emailfunction.php";

if(isset($_POST['submit_email'])) {
    $forget_email = $mysqli->escape_string($_POST['forget_email']);

//check the email address registered or not
    $result = $mysqli->query("SELECT `userid`,`username` FROM account WHERE email='$forget_email'");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $uniqueId = uniqid();
        $generateLink = "http://" . $_SERVER['SERVER_NAME'] . "/fyp2018/fyp/reset-password.php?code=" . $uniqueId;
        // $generateLink = "http://" . $_SERVER['SERVER_NAME'] . "/reset-password.php?code=" . $uniqueId;    
        $subject = "Password recovery mail from Cashless Canteen";
        $message = "<h3>Dear " . $row['username'] . "</h3><br>";
        $message .= "<p>Please click the following link to reset your password</p>";
        $message .= "<p><a href='$generateLink'>Please Click Here</a></p><br><br><br>";
        $message .= "<p>Regards,<br>Cashless Canteen</p>";

        if (send_email($forget_email, $message, $subject)) { //send mail function

            $id = $row['userid'];
            $mysqli->query("UPDATE `account` SET `code` = '$uniqueId' WHERE `userid` = '$id'");

            $_SESSION['success'] = "Resent link has been sent to your email.";

            header('Location:../index.php');
            exit();
        } else {
            $_SESSION['error'] = "Something went wrong please try again later";
            header('Location:../forget_password.php');
            exit();
        }
    } else {
        $_SESSION['error'] = "Sorry Email is not registered";
        header('Location:../forget_password.php');
        exit();
    }
}else{
    echo "Invalid Request";
    exit();
}



