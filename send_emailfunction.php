<?php require("mail/PHPMailerAutoload.php");
function send_email($email, $message, $subject){
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 2;

    $mail->Host = "ssl://smtp.gmail.com";
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';

    $mail->Username = "cashless008007@gmail.com";
    $mail->Password = "canteen@123";

    $mail->From = "cashless008007@gmail.com";
    $mail->FromName = "Cashless Canteen";

    $mail->AddAddress($email);

    $mail->Subject = $subject;

    $mail->Body = $message;

    $mail->IsHTML(true);

    if($mail->Send()){
         $msg = true;
    }else{
         $msg = false;
    }

    return $msg;
}


?>