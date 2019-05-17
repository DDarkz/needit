<?php
include("bd/connexion.php");
session_start();
 require 'PHPMailerAutoload.php';
//  require '../vendor/autoload.php';
 function sendMail($emailClient,$sujet,$message){
    $mail = new PHPMailer;
 $mail->SMTPOptions = array(
     'ssl' => array(
         'verify_peer' => false,
         'verify_peer_name' => false,
         'allow_self_signed' => true
     ));
     $mail->SMTPDebug = 3;                                       // Enable verbose debug output
     $mail->isSMTP();                                            // Set mailer to use SMTP
     $mail->Host       = 'mail.joly-design.com';                 // Specify main and backup SMTP servers
     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
     $mail->Username   = 'projetecole@joly-design.com';          // SMTP username
     $mail->Password   = 'projetecole2019';                      // SMTP password
     $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
     $mail->Port       = 587;                                     // TCP port to connect to
 
 $mail->setFrom('ne-pas-repondre@gofor.com', 'Administrateur GoFor');
 $mail->addAddress($emailClient);     // Add a recipient
 //$mail->addAddress('ellen@example.com');               // Name is optional
 //$mail->addReplyTo('info@example.com', 'Information');
 //$mail->addCC('cc@example.com');
 //$mail->addBCC('bcc@example.com');
 
 //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
 //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 $mail->isHTML(true);                                  // Set email format to HTML
 
 $mail->Subject = $sujet;
 $mail->Body    = $message;
 //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
 if(!$mail->send()) {
     echo 'Message could not be sent.';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
 } else {
     echo 'Message has been sent';
 }
 }
?>