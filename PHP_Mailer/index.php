<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

/* 
WITH MAILTRAP
*/ 
// $mail = new PHPMailer();
// $mail->isSMTP();
// $mail->Host = 'smtp.mailtrap.io';
// $mail->SMTPAuth = true;
// $mail->Port = 2525;
// $mail->Username = '576fcffb076810';
// $mail->Password = '1db404aca8edd2';


/*
WITHOUT MAILTRAP
*/
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'prshah966@gmail.com';                 // SMTP username
$mail->Password = 'gegpivjentzmqwat';                           // SMTP password
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'prshah966@gmail.com';
$mail->FromName = 'Test phpmailer';
$mail->addAddress('prshah966@gmail.com');               // Name is optional

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

// Reference : https://www.youtube.com/watch?v=Kjn5vBbBsi8
// gegpivjentzmqwat