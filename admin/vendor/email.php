<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function send_email($email, $subject, $html)
{
    require_once 'autoload.php';
    $mail = new PHPMailer(true);


        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = 'mail.genderise.biz';
        $mail->SMTPAuth = true;
        $mail->Username = 'prison@genderise.biz';
        $mail->Password = 'prisonwer!@#';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('prison@genderise.biz', 'System Admin');
        $mail->addAddress($email);

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $html;

        $mail->send();


}