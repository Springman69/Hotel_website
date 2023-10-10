<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;
    $mail->Username = 'deamonmailer1@gmail.com';  
    $mail->Password = 'balbfjbgwntkqnej';  
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->SMTPDebug = 2;

    // Recipients
    $mail->setFrom('deamonmailer1@gmail.com', 'Hotel Restwel'); 
    $mail->addAddress('darkinre123@wp.pl');  

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Zgloszenie hotelowe - ' . $_POST['subject'];
    $mail->Body = 'Wiadomosc od klienta: ' . $_POST['name'] . '<br>' . 'E-mail klienta: ' . $_POST['email'] . '<br>' . 'Tresc wiadomosci: ' . $_POST['message'];

    $mail->send();
    echo 'Wiadomość została wysłana';
    header('Location: kontakt.php');  
} catch (Exception $e) {
    echo "Wiadomość nie mogła zostać wysłana. Błąd Mailera: {$mail->ErrorInfo}";
}
?>