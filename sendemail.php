<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

$mail = new PHPMailer();

//SMTP Settings
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "nciganovic52@gmail.com";
$mail->Password = "cigadeveloper53";
$mail->Port = 465;
$mail->SMTPSecure = "ssl";

//Email Settings
$mail->isHTML(true);
$mail->setFrom($email, "Forum team");
$mail->addAddress($email);
$mail->Subject = "Confirm your email for Forum";
$mail->Body = $message;

if($mail->send()){
    echo json_encode([
        "msg" => "Email sent successfuly.", 
        "result" => "1"
    ]);
}else{
    echo json_encode([
        "msg" => "Email sent failed.", 
        "result" => "0"
    ]);
}

