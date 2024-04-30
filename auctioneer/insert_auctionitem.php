<?php
include("db_connect.php");

// Check if data is received
if (isset($_POST['itemName']) && isset($_POST['itemType']) && isset($_POST['itemMeasurement']) && isset($_POST['quantity']) && isset($_POST['price']) && isset($_POST['totalPrice'])) {
    // Sanitize received data
    $itemName = $_POST['itemName'];
    $itemType = $_POST['itemType'];
    $itemMeasurement = $_POST['itemMeasurement'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $totalPrice = $_POST['totalPrice'];

    // Insert data into auctionitem table
    $sql_insert = "INSERT INTO auctionitem (common_name, common_type, common_measurement, total_quantity, price, total_price, staup)
                   VALUES ('$itemName', '$itemType', '$itemMeasurement', $quantity, $price, $totalPrice, 1)";

    // Update the report table
    $sql_update_report = "UPDATE report 
                      SET groupitem = 1
                      WHERE auctionstatus = 1 
                      AND MONTH(dateapprove) = $currentMonth 
                      AND YEAR(dateapprove) = $currentYear
                      GROUP BY requesteditem_name, requesteditem_type, requesteditem_measurment";


    // Perform the insertion and update
    $success = true;
    if ($conn->query($sql_insert) !== TRUE) {
        echo "Error inserting item into auctionitem table: " . $conn->error;
        $success = false;
    }

    if ($conn->query($sql_update_report) !== TRUE) {
        echo "Error updating report table: " . $conn->error;
        $success = false;
    }

    if ($success) {
        echo "Item added to auctionitem list successfully!";
    }
} else {
    echo "Invalid request!";
}
?>
