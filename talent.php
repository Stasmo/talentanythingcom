<?php

require 'vendor/autoload.php';

if(array_key_exists('message', $_POST)) {
    $message = $_POST['message'];
} else {
    die('No message to send');
}

$emailAddress = 'admin@talentanything.com';
$emailPassword = 'talent';
$smtpServer = 'smtp.talentanything.com';

$sendToEmail = "liz.naso@gmail.com";
$sendToName = "Elizabeth Naso"

$mailer = new PHPMailer();

$mailer->isSMTP();

//Set the hostname of the mail server
$mailer->Host = $smtpServer;
$mailer->Port = 26;
$mailer->SMTPAuth = true;
$mailer->Username = $emailAddress;
$mailer->Password = $emailPassword;
$mailer->setFrom($emailAddress, 'Talent Anything');
$mailer->addReplyTo($emailAddress, 'Talent Anything');
$mailer->addAddress($sendToEmail, $sendToName);
$mailer->msgHTML("<p>Here's what they have to say!</p>\n\n<blockquote>" . $message . "</blockquote>");
$mailer->Subject = 'ANOTHER BEAUTIFUL TALENT ANYTHING CUSTOMER MESSAGE';

//send the message, check for errors
if (!$mailer->send()) {
    echo "Mailer Error: " . $mailer->ErrorInfo;
} else {
    echo "Message sent!";
}