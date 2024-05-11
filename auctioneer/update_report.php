<?php
include("db_connect.php");

// Check if data is received
if (isset($_POST['itemName']) && isset($_POST['itemType']) && isset($_POST['itemMeasurement'])) {
    // Sanitize received data
    $itemName = $_POST['itemName'];
    $itemType = $_POST['itemType'];
    $itemMeasurement = $_POST['itemMeasurement'];

    // Update the report table
    $sql_update_report = "UPDATE report 
                         SET groupitem = 1
                         WHERE requesteditem_name = '$itemName' 
                         AND requesteditem_type = '$itemType' 
                         AND requesteditem_measurment = '$itemMeasurement'";
    
    if ($conn->query($sql_update_report) === TRUE) {
        echo "Report table updated successfully!";
    } else {
        echo "Error updating report table: " . $conn->error;
    }
} else {
    echo "Invalid request!";
}
?>
