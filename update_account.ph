<?php
session_start();

// Include database connection
include('admin/db_connect.php');
include('user_functions.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit;
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Get form data
$fullName = $_POST['fullName'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];

// Validate form inputs
if (empty($fullName)) {
    echo json_encode(['status' => 'error', 'message' => 'Full name is required']);
    exit;
}

// Check if a new password is provided
if (!empty($newPassword)) {
    // Check if new password matches the confirm password
    if ($newPassword !== $confirmPassword) {
        echo json_encode(['status' => 'error', 'message' => 'New password and confirm password do not match']);
        exit;
    }

    // Verify current password
    $user = getUserById($conn, $user_id);
    $currentPassword = $_POST['currentPassword'];

    if (!password_verify($currentPassword, $user['password'])) {
        echo json_encode(['status' => 'error', 'message' => 'Incorrect current password']);
        exit;
    }

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update user's password
    $updatePasswordQuery = "UPDATE users SET full_name = ?, password = ? WHERE id = ?";
    $stmt = $conn->prepare($updatePasswordQuery);
    $stmt->bind_param("ssi", $fullName, $hashedPassword, $user_id);
} else {
    // Update user's full name only (without changing the password)
    $updateQuery = "UPDATE users SET full_name = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("si", $fullName, $user_id);
}

// Execute the update query
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Account updated successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update account']);
}

// Close statement and database connection
$stmt->close();
$conn->close();
?>
