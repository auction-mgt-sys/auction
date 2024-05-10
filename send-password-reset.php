v<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form
    $email = $_POST["email"];

    // You should validate the email here before proceeding further.
    // Example validation:
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // If email is not valid, display an error message
        echo "Error: Invalid email address.";
        exit;
    }

    // Load PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Set SMTP server configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'beyeneeleni2@gmail.com'; // Your Gmail address
        $mail->Password = 'Beyeneeleni2@#$'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Compose the email message
        $mail->setFrom('yourwebsite@example.com', 'Your Website');
        $mail->addAddress($email);
        $mail->Subject = 'Password Reset';
        $mail->Body = 'Click the following link to reset your password: http://yourwebsite.com/reset-password.php';

        // Send the email
        $mail->send();
        echo "Password reset instructions have been sent to your email address.";
    } catch (Exception $e) {
        echo "Error: Unable to send password reset instructions. Please try again later. Error: {$mail->ErrorInfo}";
    }
} else {
    // If the form is not submitted via POST method, display an error message
    echo "Error: Invalid request.";
}
?>
