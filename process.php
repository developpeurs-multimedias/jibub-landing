<?php



require 'PHPMailer-5.2.14/PHPMailerAutoload.php';
include("config.php");
include("functions.php");

include("PHPMailer-5.2.14/class.phpmailer.php");
include ("PHPMailer-5.2.14/class.smtp.php");

//initialize logger
require_once 'log4php/Logger.php';
Logger::configure(__DIR__ . '/log4php/config.xml');
$logger = Logger::getLogger('main');

$firstname = trim(ucfirst(strtolower($_POST['firstname'])));
$lastname = trim(strtoupper(strtolower($_POST['name'])));
$email = trim(strtolower($_POST['email']));
<<<<<<< Updated upstream
$usertype = $_POST['user-type'];
=======
$usertype = trim(strtolower($_POST['user-type']));
>>>>>>> Stashed changes

$message = SubscribeMailChimp($email, $firstname, $lastname, $usertype, $id_list = MAILCHIMP_ID_LIST);
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


$logger->info("All email information is set up");


header('Location:./index.php#newsletter');



try {
    if(!$mail->send()) {
        throw new Exception();
    } else {
        $logger->info('Email has been sent');
    }
} catch (Exception $e) {
    $message = $e->getMessage();
    $logger->fatal('Mailer Error: ' . $mail->ErrorInfo);
    $logger->fatal($message, $e);
}

?>