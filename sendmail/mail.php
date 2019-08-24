<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
//$mail->SMTPDebug = 2;                                 
// Enable verbose debug output
$mail->CharSet =  "utf-8";
$mail->IsSMTP();
// enable SMTP authentication
$mail->SMTPAuth = true;                  
// GMAIL username
$mail->Username = "suchi10091997@gmail.com";
// GMAIL password
$mail->Password = "10091997";
$mail->SMTPSecure = "ssl";  
// sets GMAIL as the SMTP server
$mail->Host = "smtp.gmail.com";
// set the SMTP port for the GMAIL server
$mail->Port = "465";
$mail->From='suchi10091997@gmail.com';
$mail->FromName='Abhishek ghosh';
$mail->AddAddress('ghoshabhi787235@gmail.com', 'Abhishek Ghosh');
$mail->Subject  =  'SMTP Mail Testing';
$mail->IsHTML(true);
$mail->Body    = '<p>Sample Image:</p>            
  <img src="https://imagejournal.org/wp-content/uploads/2018/09/brian-patrick-tagalog-692495-unsplash.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236">';
if($mail->Send())
{
	echo "Message was Successfully Send :)";
}
else
{
	echo "Mail Error - >".$mail->ErrorInfo;
}
?>