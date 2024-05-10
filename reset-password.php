<?php
// Database connection
$conn = mysqli_connect("localhost", "username", "password", "auction_mgt_sys");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email and new password from the form
    $email = $_POST["email"];
    $newPassword = $_POST["new_password"];

    // You should validate the email and password here before proceeding further.
    // Example validation:
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // If email is not valid, display an error message
        echo "Error: Invalid email address.";
        exit;
    }

    // Generate MD5 hash of the new password
    $hashedPassword = md5($newPassword);

    // Update the password in the database
    $sql = "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Password updated successfully
        echo "Password updated successfully.";
    } else {
        // If there was an error updating the password, display an error message
        echo "Error: Unable to update password. Please try again later.";
    }
}
?>
