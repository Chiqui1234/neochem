---
permalink: enviar-email.php
render_with_liquid: false
---

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require('phpmailer/PHPMailer.php');
require('phpmailer/SMTP.php');
require('phpmailer/Exception.php');
$mail = new PHPMailer;
// SMTP
$mail->isSMTP();
$mail->Host = 'mail.neochem.com.ar';
$mail->SMTPAuth = true;
$mail->SMTPAutoTLS = false; // For disabling SSL/TLS
$mail->SMTPSecure = false; // For disabling SSL/TLS
$mail->Username = 'web@neochem.com.ar';
$mail->Password = 'Hernan69';
$mail->Port = 587;
// Mail
$mail->setFrom('web@neochem.com.ar', 'Neochem Web');
$mail->addAddress('santiagogimenez@outlook.com.ar', 'Santiago Gimenez');
$mail->Subject = 'Asunto';
$mail->isHTML(true);
$mail->Body = '<h1>Neochem web</h1>';
$mail->AltBody = "Neochem web";
// $mail->send();
header('Location: https://www.google.com.ar');
?>