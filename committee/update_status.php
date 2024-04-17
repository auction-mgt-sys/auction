<?php
// Include your database connection file
include 'db_connect.php';

// Check if the itemID and status are set in the URL parameters
if (isset($_GET['itemID']) && isset($_GET['status'])) {
    // Sanitize input to prevent SQL injection
    $itemID = mysqli_real_escape_string($conn, $_GET['itemID']);
    $status = mysqli_real_escape_string($conn, $_GET['status']);

    // Check if the status is for rejection and if reason is provided
    if ($status == 2 && isset($_GET['reason'])) {
        $reason = mysqli_real_escape_string($conn, $_GET['reason']);
        // Update the status and reason in the database
        $sql = "UPDATE requesteditem SET status = $status, reason = '$reason' WHERE id = '$itemID'";
    } else {
        // Update only the status in the database
        $sql = "UPDATE requesteditem SET status = $status WHERE id = '$itemID'";
    }

    if ($conn->query($sql) === TRUE) {
        // If the update was successful, return success message
        if ($status == 2 && isset($_GET['reason'])) {
            echo "Item rejected successfully with reason: " . $_GET['reason'];
        } else {
            echo "Status updated successfully";
        }
    } else {
        // If there was an error, return error message
        echo "Error updating status: " . $conn->error;
    }
} else {
    // If itemID or status is not provided in the URL parameters, return error message
    echo "Invalid request parameters";
}

// Close the database connection
$conn->close();
?>
