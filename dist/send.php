<?php
$userName = $_POST['userName'];
$userEmail = $_POST['userEmail'];
$userPhone = $_POST['userPhone'];

// Load Composer's autoloader
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'vita19magnum@gmail.com';                     // SMTP username
    $mail->Password   = 'fhvtybz19';                               // SMTP password
    $mail->SMTPSecure = 'ssl';      // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('vita19magnum@gmail.com', 'Вита');
    $mail->addAddress('sarkisyan.violetta2013@yandex.ru');     // Add a recipient


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Новая заявка с сайта';
    $mail->Body    = "Имя пользователя: ${userName}, его телефон: ${userPhone}. Его почта: ${userEmail}";


    if ($mail->send()) {
        echo "ok";
    } else {
        echo "Письмо не отправленоб есть ошибкаю Код ошибки: {$mail->ErrorInfo}";
    }
} catch (Exception $e) {
    echo "Письмо не отправленоб есть ошибкаю Код ошибки: {$mail->ErrorInfo}";
}