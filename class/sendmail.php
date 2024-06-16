<?php
session_start();
require './PHPMailerAutoload.php';

$mail = new PHPMailer;                         // Set mailer to use SMTP
$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->Port = 587;                                    // TCP port to connect to
$mail->Username = 'johnnyharpertesting1@gmail.com';                 // SMTP username
$mail->Password = 'addweb123';                           // SMTP password
$mail->SMTPAuth = true;
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->setFrom('johnnyharpertesting1@gmail.com', 'Company Name');

$toemail = $_SESSION['login_user']['u_email_id'];
$address = "akash.padhiyar@gmail.com";
$mail->addAddress($toemail, 'OCR Akash');     // Add a recipient

$filename = $_GET['filename'];
$mail->addAttachment("../" . $filename);         // Add attachments
$mail->isHTML(true);                                  // Set email format to HTML


$mail->Subject = "OCR File";
$body = "Hi Please Download your OCR Converted File ";
$mail->msgHTML($body);
if (!$mail->send()) {
    echo "<script> alert ('Mail Error');</script>";
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo "<script> alert ('Mail  Sent');window.location='../mydocument.php';</script>";
}