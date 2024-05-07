<?php
// Retrieve the email address from the AJAX request
$email = $_POST['email'];

// Generate a random password reset token (you may need to implement your own logic for generating tokens)
$token = bin2hex(random_bytes(16));

// Send the password reset email
$to = $email;
$subject = 'Password Reset Request';
$message = "Dear user,\n\n";
$message .= "You have requested to reset your password. Please click on the following link to reset your password:\n";
$message .= "http://example.com/reset_password.php?email=" . urlencode($email) . "&token=" . urlencode($token) . "\n\n";
$message .= "If you did not request a password reset, please ignore this email.\n\n";
$message .= "Best regards,\nYour Website Team";

$headers = 'From: YourWebsite <noreply@example.com>' . "\r\n";
$headers .= 'Reply-To: noreply@example.com' . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

// Send the email
if (mail($to, $subject, $message, $headers)) {
    // Email sent successfully
    echo 'success';
} else {
    // Email sending failed
    echo 'error';
}
?>
