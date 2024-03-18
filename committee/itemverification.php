<?php
// itemverification.php

// Assuming the connection to the database is already established
include 'db_connect.php';

// Check if ID and action parameters are provided
if (isset($_GET['id']) && isset($_GET['action'])) {
    $itemId = $_GET['id'];
    $action = $_GET['action'];
    
    // Update status based on action
    switch ($action) {
        case 'verify':
            updateStatus($itemId, 1);
            break;
        case 'reject':
            updateStatus($itemId, 2);
            break;
        default:
            echo "Invalid action";
    }
}

// Function to update status in the database
function updateStatus($itemId, $status) {
    global $conn;
    // Update status for the specified item ID
    $sql = "UPDATE requesteditem SET status = $status WHERE id = $itemId";
    if ($conn->query($sql) === TRUE) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $conn->error;
    }
}
?>
