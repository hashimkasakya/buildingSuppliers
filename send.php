
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your@gmail.com';        // Replace with your Gmail
    $mail->Password   = 'your_app_password';     // Replace with your Gmail App Password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('your@gmail.com', 'Website Contact');
    $mail->addAddress('your@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = nl2br($_POST['message']);

    $mail->Body = "<strong>Name:</strong> $name<br>
                   <strong>Email:</strong> $email<br>
                   <strong>Message:</strong><br>$message";

    $mail->send();
    echo 'Message sent successfully!';
} catch (Exception $e) {
    echo "Message failed. Mailer Error: {$mail->ErrorInfo}";
}
?>
