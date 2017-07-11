<?php
require '/smtp.php';
//get smtp config $mail;
//sendMail($to, $name, $subject, $body, $cc, $bcc, $attachement){

$name = $_POST["lname"]." ".$_POST["fname"];
$to = $_POST["sendTo"];
$body = $_POST["content"];
$subject = $_POST["subject"];
sendMail($to, $name, $subject, $body, "kingsleyekoh@gmail.com", "kingsleybox@yahoo.com", 'pics.png');



if(!$mail->Send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>



