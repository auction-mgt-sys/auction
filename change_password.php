<?php
session_start();

// Include database connection and user functions
include('admin/db_connect.php');
include('user_functions.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit;
}

// Process password change request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $current_password = $_POST['currentPassword'];
    $new_password = $_POST['newPassword'];
    $confirm_password = $_POST['confirmPassword'];

    // Validate form inputs
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit;
    }

    // Verify current password
    $user = getUserById($conn, $user_id);
    if (!$user || !password_verify($current_password, $user['password'])) {
        echo json_encode(['status' => 'error', 'message' => 'Incorrect current password']);
        exit;
    }

    // Check if new password and confirm password match
    if ($new_password !== $confirm_password) {
        echo json_encode(['status' => 'error', 'message' => 'New password and confirm password do not match']);
        exit;
    }

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update user's password in the database
    if (updateUserPassword($conn, $user_id, $hashed_password)) {
        echo json_encode(['status' => 'success', 'message' => 'Password changed successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update password']);
    }
} else {
    // If request method is not POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
