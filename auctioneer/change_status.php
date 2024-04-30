<?php
// Include your database connection file
include("db_connect.php");

// Check if the status parameter is set and not empty
if (isset($_POST['status']) && !empty($_POST['status'])) {
    // Sanitize the status value to prevent SQL injection
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Update the status in the database
    $sql = "UPDATE auctionitem SET statuss = '$statuss' WHERE 1"; // Replace your_table_name and your_condition with actual values
    if ($conn->query($sql) === TRUE) {
        // If the update is successful, send a success response
        echo "Status updated successfully";
    } else {
        // If there's an error, send an error response
        echo "Error updating status: " . $conn->error;
    }
} else {
    // If the status parameter is not set or empty, send an error response
    echo "Status parameter is missing or empty";
}

// Close the database connection
$conn->close();
?>
