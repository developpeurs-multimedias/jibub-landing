<?php

require 'PHPMailer-5.2.14/PHPMailerAutoload.php';
include("config-contact.php");

include("PHPMailer-5.2.14/class.phpmailer.php");
include ("PHPMailer-5.2.14/class.smtp.php");

//initialize logger
require_once 'log4php/Logger.php';
Logger::configure(__DIR__ . '/log4php/config.xml');
$logger = Logger::getLogger('main');

$firstname = trim(ucfirst(strtolower($_POST['name'])));
$email = trim(strtolower($_POST['from']));
$socity = trim(strtolower($_POST['societe']));

$message = (nl2br($_POST['message']));
$mail = new PHPMailer;

$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
//$mail->isMail();                                      // Set mailer to use SMTP
$mail->CharSet = 'UTF-8';
$mail->Host = MAILER_HOST;  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = MAILER_USERNAME;                 // SMTP username
$mail->Password = MAILER_PASSWORD;                           // SMTP password
$mail->SMTPSecure = MAILER_PROTOCOL;                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = MAILER_PORT;

$mail->setFrom(mb_convert_encoding(MAILER_FROM_EMAIL,"UTF-8", "auto"), MAILER_FROM_NAME);
$mail->addAddress($email);     // Add a recipient// Name is optional

$mail->isHTML(true);                                  // Set email format to HTML

$mail->setLanguage('fr');

$mail->Subject = MAILER_SUBJECT;
$mail->Body    = file_get_contents(MAILER_BODY);

//

// jibub mail ///////////////////////////////

//

$jibub_mail = new PHPMailer;

$jibub_mail->SMTPDebug = 3;                               // Enable verbose debug output

$jibub_mail->isSMTP();                                      // Set mailer to use SMTP
//$mail->isMail();                                      // Set mailer to use SMTP
$jibub_mail->CharSet = 'UTF-8';
$jibub_mail->Host = MAILER_HOST;  // Specify main and backup SMTP servers
$jibub_mail->SMTPAuth = true;                               // Enable SMTP authentication
$jibub_mail->Username = MAILER_USERNAME;                 // SMTP username
$jibub_mail->Password = MAILER_PASSWORD;                           // SMTP password
$jibub_mail->SMTPSecure = MAILER_PROTOCOL;                            // Enable TLS encryption, `ssl` also accepted
$jibub_mail->Port = MAILER_PORT;

$jibub_mail->setFrom(mb_convert_encoding($email,"UTF-8", "auto"), $firstname);
$jibub_mail->addAddress(MAILER_FROM_EMAIL);     // Add a recipient// Name is optional

$jibub_mail->isHTML(true);                                  // Set email format to HTML

$jibub_mail->setLanguage('fr');

$jibub_mail->Subject = $socity;
$jibub_mail->Body    = $message;

$logger->info("All email information is set up");


header('Location:./index.php#contact');


try {
    if(!$jibub_mail->send()) {
        throw new Exception();
    } else {
        $logger->info('Email has been sent');
        if(!$mail->send()) {
            throw new Exception();
        }
    }
} catch (Exception $e) {
    $message = $e->getMessage();
    $logger->fatal('Mailer Error: ' . $mail->ErrorInfo);
    $logger->fatal($message, $e);
}

?>