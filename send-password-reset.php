<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer autoload file
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form
    $email = $_POST["email"];

    // Generate a random verification code
    $verificationCode = rand(100000, 999999);

    // Get the current date
    $createdDate = date("Y-m-d H:i:s");

    // Connect to your database (replace with your database credentials)
    include('admin/db_connect.php');

    // Prepare and execute SQL statement to insert data into the database
    $sql = "INSERT INTO password (email, verification_code, created_at) VALUES ('$email', '$verificationCode', '$createdDate')";

    if ($conn->query($sql) === TRUE) {
        // Send email using PHPMailer
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com'; // Replace with your SMTP server hostname or IP address
            $mail->SMTPAuth = true;
            $mail->Username = 'your_smtp_username'; // Replace with your SMTP username
            $mail->Password = 'your_smtp_password'; // Replace with your SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption
            $mail->Port = 587; // TCP port to connect to

            //Recipients
            $mail->setFrom('your_email@example.com', 'Elshadai');
            $mail->addAddress($email); // Add a recipient

            //Content
            $mail->isHTML(false); // Set email format to HTML
            $mail->Subject = 'Password Reset Verification Code';
            $mail->Body = "Your verification code is: $verificationCode";

            $mail->send();
            echo "Verification code sent successfully. Please check your email.";
        } catch (Exception $e) {
            echo "Email sending failed. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
