<?php
// Database connection
include('admin/db_connect.php');

// Retrieve email from POST request
$email = $_POST['email'];

// Prepare SQL statement to check if email exists
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);

// Execute SQL statement
$stmt->execute();

// Store the result
$result = $stmt->get_result();

// Check if email exists
if ($result->num_rows > 0) {
    // Email exists in the database
    echo "exists";
} else {
    // Email doesn't exist in the database
    echo "not_exists";
}

// Close statement and database connection
$stmt->close();
$conn->close();
?>
