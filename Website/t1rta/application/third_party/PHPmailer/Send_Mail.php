<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from = "from@esgotado.com";
$mail = new PHPMailer();
$mail->IsSMTP(true); // SMTP
$mail->SMTPAuth   = true;  // SMTP authentication
$mail->Mailer = "smtp";
$mail->Host       = "tls://smtp.gmail.com"; // Amazon SES server, note "tls://" protocol
$mail->Port       = 465;                    // set the SMTP port
$mail->Username   = "order@esgotado@gmail.com";  // SES SMTP  username
$mail->Password   = "esgotadobag123";  // SES SMTP password
$mail->SetFrom($from, 'Esgotado Bag');
$mail->AddReplyTo($from,'Esgotado Bag');
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);

if(!$mail->Send())
return false;
else
return true;

}
?>