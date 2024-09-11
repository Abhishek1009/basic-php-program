<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP  
$mail->SMTPDebug = 2; 
$mail->SMTPSecure = "tls";  
$mail->Host='smtp.gmail.com';  
$mail->Port='995';   
$mail->Username   = 'ghoshabhi787235@gmail.com'; // SMTP account username
$mail->Password   = '10091997';  
$mail->SMTPAuth   = true;                  // enable SMTP authentication  
                          // Enable encryption, 'ssl' also accepted

 $mail->setFrom('from@example.com', 'Mailer');
$mail->FromName = 'Abhishek Ghosh';
$mail->AddAddress('suchi10091997@gmail.com');  // Add a recipient
//$mail->AddAddress('ellen@example.com');               // Name is optional

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <strong>in bold!</strong>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent';