<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function sendmail($to,$subject,$body,$from)
{
    
    //Load Composer's autoloader
    require 'vendor/autoload.php';
    $mail = new PHPMailer(true);
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();    // enable SMTP authentication
    $mail->SMTPAuth = true;                  // GMAIL username
    $mail->Username = "suchi10091997@gmail.com";// GMAIL password
    $mail->Password = "10091997";
    $mail->SMTPSecure = "ssl";  // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";// set the SMTP port for the GMAIL server
    $mail->Port = "465";
    
    $mail->From='suchi10091997@gmail.com';
    $mail->FromName='Abhishek ghosh';
    $mail->AddAddress($to, '');
    $mail->Subject  =  $subject;
    $mail->IsHTML(true);
    $mail->Body =$body ;
    if($mail->Send())
    {
        //echo "Message was Successfully Sent";
		return true;
    }
    else
    {
        echo "Mail Error - >".$mail->ErrorInfo;
		return false;
    }  
}
?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['register']))
{
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$code=substr(md5(mt_rand()),0,15);
    
	$query="insert into verify (email,password,code) values('$email','$pass','$code')";
    if (mysqli_query($conn, $query)) {
        //echo "New record created successfully";
    } 
    else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
	$db_id=mysqli_insert_id($conn);
    //echo $db_id;
	$message = "Your Activation Code is ".$code."";
    $to=$email;
    $subject="Activation Code For Talkerscode.com";
    $from = "ghoshabhi787235@gmail.com";
    $body='Your Activation Code is '.$code.' Please Click On This link http://localhost/sample/emailVerification/Verify.php?id='.$db_id.'&code='.$code.' to activate your account.';
    if(sendmail($to,$subject,$body,$from))
    {
        echo "An Activation Code Is Sent To Your Emails";   
    }
}
?>