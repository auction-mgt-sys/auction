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
    $sql_insert = "INSERT INTO auctionitem (common_name, common_type, common_measurement, total_quantity, price, total_price)
                   VALUES ('$itemName', '$itemType', '$itemMeasurement', $quantity, $price, $totalPrice)";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Item added to auctionitem table successfully!";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request!";
}
?>
