<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once "../../config/connection.php";
require_once "../../PHPMailer/PHPMailer.php";
require_once "../../PHPMailer/SMTP.php";
require_once "../../PHPMailer/Exception.php";

function create_email($from, $email, $subject, $message){

    $mail = new PHPMailer();

    //SMTP Settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = EMAIL;
    $mail->Password = EMAIL_PSW;
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email, $from);
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body = $message;
    
    return $mail;
}
