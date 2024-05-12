<?php
include 'admin/db_connect.php'; // Include your database connection script

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $hint = $_POST['hint'];

    // Retrieve user information based on the provided username
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_hint = $row['hint'];

        // Check if the provided hint matches the stored hint
        if($hint == $stored_hint) {
            // If the hint matches, generate a random password
            $new_password = generateRandomPassword(); // You need to implement this function

            // Update the user's password in the database
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_query = "UPDATE users SET password = '$hashed_password' WHERE username = '$username'";
            $update_result = $conn->query($update_query);

            if($update_result) {
                // Send the new password to the user (you can send it via email or display it on the page)
                echo "Your new password is: " . $new_password;
            } else {
                echo "Failed to update password.";
            }
        } else {
            echo "Hint does not match.";
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid request.";
}

function generateRandomPassword($length = 8) {
    // Function to generate a random password
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}
?>
