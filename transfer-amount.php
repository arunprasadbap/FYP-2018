<?php ob_start();
session_start();
include_once 'db.php';
include_once 'function.php';
include_once 'send_emailfunction.php';

function validation_process($param, $mysqli){
    $returnVal = false;

    if($_SESSION['idnum'] == $param[userid]){
        $_SESSION['error'] = "You can not transfer to your own account";
        return $returnVal;
    }
    
   

    $resultRec    = $mysqli->query("SELECT `username` FROM `account` WHERE `userid` = '".$mysqli->escape_string($param[userid])."'");

    if($resultRec->num_rows == 0){
        $_SESSION['error'] = "User not found";
        return $returnVal;
    }
    
    
   $result    = $mysqli->query("SELECT `amount` FROM `account` WHERE userid = '$_SESSION[idnum]' AND `userpass` = '".hash_password($mysqli->escape_string($param[pass]))."'");
    
    if($result->num_rows == 0){
        $_SESSION['error'] = "Incorrect password";
        return $returnVal;
    }
    
    $row = $result->fetch_assoc();

    if($param['amount'] > $row['amount']){
        $_SESSION['error'] = "Transfer amount exits your limit";
        return $returnVal;
    }
    $rows = $resultRec->fetch_assoc();

    return $returnVal['user_name_transfer'] = $rows['username'];
}

function getEmailId($param, $mysqli){
    $result = $mysqli->query("SELECT `email` FROM `account` WHERE `userid` = '".$mysqli->escape_string($param)."'");
    $row    = $result->fetch_assoc();
    return $row['email'];;
}

function transfer_process($param, $id, $mysqli, $term){
    $checkList = array();
    $checkList['credit'] = " amount + $param ";
    $checkList['deduct'] = " amount - $param ";

    $mysqli->query("UPDATE `account` SET amount = ".$checkList[$term]." WHERE `userid` = '$id'");
}

if(isset($_POST['transfer_amount'])){
    $result = validation_process($_POST, $mysqli);
    if($result){
          $_SESSION['transfer']['student_id'] = $_POST['userid'];
          $_SESSION['transfer']['user_name']   = $result;
          $_SESSION['transfer']['amount']     = $_POST['amount'];
          $_SESSION['transfer']['status']     = "preview";
    }
    header("Location: ../amount-transfer.php");
    exit();
}elseif(isset($_POST['transfer_amount_successful'])){
    //transfer process
    transfer_process($_SESSION['transfer']['amount'],$_SESSION['idnum'], $mysqli, "deduct");
    transfer_process($_SESSION['transfer']['amount'],$_SESSION['transfer']['student_id'], $mysqli, "credit");

    //Send mail to sender
    $to      = getEmailId($_SESSION['idnum'],$mysqli);
    $subject = "Transferred Amount";
    $message = "<h3>Dear " . $_SESSION['username'] . "</h3><br>";
    $message .= "<p>You have successfully transferred RM ".$_SESSION['transfer']['amount']." to ".$_SESSION['transfer']['user_name']."</p>";
    send_email($to, $message, $subject);

    //send mail to receiver
    $to      = getEmailId($_SESSION['transfer']['student_id'],$mysqli);
    $subject = "Received Amount";
    $message = "<h3>Dear " . $_SESSION['transfer']['user_name'] . "</h3><br>";
    $message .= "<p>You account has been credited with RM ".$_SESSION['transfer']['amount']." from ".$_SESSION['username']."</p>";
    send_email($to, $message, $subject);

    $_SESSION['amount'] = $_SESSION['amount'] - $_SESSION['transfer']['amount'];

    unset($_SESSION['transfer']);

    $_SESSION['success'] = "you have successfully transferred the amount";
    header("Location: ../amount-transfer.php");
    exit();
}elseif(isset($_POST['transfer_amount_cancel'])){
    unset($_SESSION['transfer']);
    $_SESSION['error'] = "Your request has been canceled";
    header("Location: ../amount-transfer.php");
    exit();
}else{
    echo "invalid request";
}