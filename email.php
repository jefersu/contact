<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
	$name= $_POST['name'];
	$email= $_POST['email'];
	$message = $_POST['message'];


require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

//Load Composer's autoloader
require 'vendor/autoload.php';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->Host = 'email-ssl.com.br';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'contato@unisolucao.com.br';                 // SMTP username
    $mail->Password = '@Unisenha1455';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('jefersoon.faaria@gmail.com', 'Joe User');     // Add a recipient
    $mail->addAddress('jefersoon.faaria@gmail.com');               // Name is optional
    $mail->addReplyTo('jefersoon.faaria@gmail.com', 'Information');
    $mail->addCC('jefersoon.faaria@gmail.com');
    $mail->addBCC('jefersoon.faaria@gmail.com');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
   

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}