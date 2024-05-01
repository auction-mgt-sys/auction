<?php

// Function to retrieve user information by ID
function getUserById($conn, $user_id) {
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Function to update user's password
function updateUserPassword($conn, $user_id, $hashed_password) {
    $sql = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $hashed_password, $user_id);
    return $stmt->execute();
}

// Add more functions as needed for user-related operations
?>
