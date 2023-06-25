<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $message = $_POST['message'];

//     $to = '3349609284@mail.gov.ua';
//     $subject = 'Сообщение с формы контакта';
//     $message = "Имя: $name\nEmail: $email\nСообщение: $message";

//     $headers = 'From: ' . $email . "\r\n" .
//         'Reply-To: ' . $email . "\r\n" .
//         'X-Mailer: PHP/' . phpversion();

//     if (mail($to, $subject, $message, $headers)) {
//         echo 'success';
//     } else {
//         echo 'error';
//     }
// } else {
//     echo 'error';
// }


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/SMTP.php';

$data = json_decode(file_get_contents('php://input'), true);

$mail = new PHPMailer(true);

if (!empty($data)) {
    
// Получение данных из пейлоада
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Создание объекта PHPMailer


// Настройка параметров SMTP-сервера
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'kseniyals1609@gmail.com';
$mail->Password = 'jivzzpczdkttbhfb';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Установка отправителя и получателя
$mail->setFrom('kseniyals1609@gmail.com');
$mail->addAddress('kseniyals1609@gmail.com');

// Установка темы письма и его содержимого
$mail->Subject = 'New Message from Contact Form';
$mail->Body = "Name: $name\nEmail: $email\nMessage: $message";

// Отправка письма
if ($mail->send()) {
    echo 'Success: Email sent';
} else {
    echo 'Error: Email not sent. ' . $mail->ErrorInfo;
}
}




?>
