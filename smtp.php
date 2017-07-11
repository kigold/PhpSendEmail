<?php

//Load the PHPMAILER CLASS from the location it is saved
//require_once('vendor/autoload.php');
require_once('vendor/phpmailer/phpmailer/PHPMailerAutoload.php');


//Instantiating an instance of the class
$mail = new PHPMailer();
 function sendMail($to, $name, $subject, $body, $cc, $bcc, $attachments){
 	//$mail = new PHPMailer;
 	global $mail;
 	//get email configuration from .ini files, so that sensitive information is not placed inside of source code
 	$email_config = parse_ini_file("config.ini");

	$mail->SMTPDebug = 2;
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main SMTP servers
	$mail->Port = '587';
	//$mail->SMTPSecure = "ssl"; 
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username =$email_config['email'];                 // SMTP username
	$mail->Password = $email_config['password'];                           // SMTP password
	//$mail->SMTPSecure = 'StartTLS';  
	$mail->From = "localhost";                          // Enable encryption, 'ssl' also accepted
	$mail->SMTPSecure = 'StartTLS';   
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->setFrom($email_config['email'], 'Mailer');
	$mail->addAddress($to, $name);     // Add a recipient
	$mail->addAddress('kingsleybox@yahoo.com');               // Name is optional
	$mail->addReplyTo('kingsleyekoh@yahoo.com', 'Mailer');
	$mail->addCC($cc);
	$mail->addBCC($bcc);

	$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
	//$mail->addAttachment($attachments);         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $subject;
	$mail->Body    = $body;
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	 }
?>