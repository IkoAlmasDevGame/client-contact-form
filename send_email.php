<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Jika menggunakan Composer
// require 'path/to/PHPMailer/src/Exception.php'; // Jika tidak menggunakan Composer
// require 'path/to/PHPMailer/src/PHPMailer.php'; // Jika tidak menggunakan Composer
// require 'path/to/PHPMailer/src/SMTP.php'; // Jika tidak menggunakan Composer

// Ambil data dari formulir
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.example.com'; // Ganti dengan server SMTP Anda
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your-email@example.com'; // Ganti dengan email Anda
    $mail->Password   = 'your-email-password'; // Ganti dengan password email Anda
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587; // Port untuk SMTP

    // Pengirim dan penerima
    $mail->setFrom('your-email@example.com', 'Your Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name'); // Ganti dengan penerima email

    // Konten email
    $mail->isHTML(true);
    $mail->Subject = 'Contact Form Submission';
    $mail->Body    = "Name: $name<br>Email: $email<br>Message: $message";
    $mail->AltBody = "Name: $name\nEmail: $email\nMessage: $message";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
