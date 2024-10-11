<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-6.9.2/src/Exception.php';
require 'PHPMailer-6.9.2/src/PHPMailer.php';
require 'PHPMailer-6.9.2/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Създаване на инстанция на PHPMailer
    $mail = new PHPMailer(true);

    try {
        // SMTP конфигурация
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Вашият SMTP сървър
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com'; // Вашият имейл
        $mail->Password = 'your-app-password'; // Вашата парола на приложение
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Настройки на имейла
        $mail->setFrom($email, $name); // Изпращач
        $mail->addAddress('recipient@example.com'); // Получател

        // Съдържание на имейла
        $mail->isHTML(true);
        $mail->Subject = 'Съобщение от контактната форма';
        $mail->Body = "Име: $name<br>Email: $email<br>Съобщение: $message";

        // Изпращане на имейла
        $mail->send();
        echo 'Съобщението беше изпратено успешно!';
    } catch (Exception $e) {
        echo "Съобщението не можа да бъде изпратено. Грешка: {$mail->ErrorInfo}";
    }
}
?>
