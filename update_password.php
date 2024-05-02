<?php
session_start();
include('admin/db_connect.php');

// Check if the current user is logged in
if (!isset($_SESSION['login_id'])) {
    // Redirect the user to the login page if not logged in
    header('location: index.php');
    exit();
}

// Get the current user's ID
$userId = $_SESSION['login_id'];

// Get the submitted current password, new password, and confirm new password
$currentPassword = isset($_POST['current_password']) ? $_POST['current_password'] : '';
$newPassword = isset($_POST['new_password']) ? $_POST['new_password'] : '';
$confirmNewPassword = isset($_POST['confirm_new_password']) ? $_POST['confirm_new_password'] : '';

// Validate input
if (empty($currentPassword) || empty($newPassword) || empty($confirmNewPassword)) {
    // Return an error response if any field is empty
    echo json_encode(array('status' => 'error', 'message' => 'Please fill in all fields.'));
    exit();
}

// Check if the new password and confirm new password match
if ($newPassword !== $confirmNewPassword) {
    // Return an error response if the new password and confirm new password do not match
    echo json_encode(array('status' => 'error', 'message' => 'New password and confirm new password do not match.'));
    exit();
}

// Retrieve the current user's data from the database
$userQuery = $conn->query("SELECT * FROM users WHERE id = $userId");
$userData = $userQuery->fetch_assoc();

// Check if the submitted current password matches the password stored in the database
if (!password_verify($currentPassword, $userData['password'])) {
    // Return an error response if the current password is incorrect
    echo json_encode(array('status' => 'error', 'message' => 'Incorrect current password.'));
    exit();
}

// Hash the new password
$newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

// Update the user's password in the database
$updateQuery = $conn->query("UPDATE users SET password = '$newPasswordHash' WHERE id = $userId");

if ($updateQuery) {
    // Password updated successfully
    echo json_encode(array('status' => 'success', 'message' => 'Password updated successfully.'));
} else {
    // Error updating password
    echo json_encode(array('status' => 'error', 'message' => 'Error updating password.'));
}

// Close database connection
$conn->close();
?>
