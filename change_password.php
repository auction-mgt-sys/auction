<?php
// Assuming you have a database connection established already

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the current password, new password, and confirm new password from the POST data
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    // You might want to add additional validation here, such as checking if passwords meet complexity requirements

    // Example: Check if the new password and confirm password match
    if ($newPassword !== $confirmNewPassword) {
        // Return an error response
        echo json_encode(array('success' => false, 'message' => 'New password and confirm password do not match.'));
        exit;
    }

    // You should also validate the current password before allowing the change
    // For demonstration purposes, let's assume the current password is stored in the database

    // Perform a database query to retrieve the user's current password
    $userId = $_SESSION['user_id']; // Assuming you have the user's ID stored in the session
    $query = "SELECT password FROM users WHERE id = '$userId'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];

        // Check if the current password matches the stored password
        if (password_verify($currentPassword, $storedPassword)) {
            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the user's password in the database
            $updateQuery = "UPDATE users SET password = '$hashedPassword' WHERE id = '$userId'";
            $updateResult = mysqli_query($connection, $updateQuery);

            if ($updateResult) {
                // Return a success response
                echo json_encode(array('success' => true, 'message' => 'Password changed successfully.'));
                exit;
            } else {
                // Return an error response
                echo json_encode(array('success' => false, 'message' => 'Error updating password.'));
                exit;
            }
        } else {
            // Return an error response
            echo json_encode(array('success' => false, 'message' => 'Current password is incorrect.'));
            exit;
        }
    } else {
        // Return an error response
        echo json_encode(array('success' => false, 'message' => 'Error retrieving user data.'));
        exit;
    }
} else {
    // Return an error response if request method is not POST
    echo json_encode(array('success' => false, 'message' => 'Invalid request method.'));
    exit;
}
?>
