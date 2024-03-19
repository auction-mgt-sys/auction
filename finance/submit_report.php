<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if price and total_price arrays are set and have the same length
    if (isset($_POST['price']) && isset($_POST['total_price']) && count($_POST['price']) == count($_POST['total_price'])) {
        $prices = $_POST['price'];
        $total_prices = $_POST['total_price'];

        // Retrieve existing report data from the database
        $select_sql = "SELECT requesteditem_id FROM report";
        $existing_ids = array();
        $result = $conn->query($select_sql);
        while ($row = $result->fetch_assoc()) {
            $existing_ids[] = $row['requesteditem_id'];
        }

        // Update price and total price values for existing report data
        $update_sql = "UPDATE report SET price = ?, total_price = ? WHERE requesteditem_id = ?";
        $stmt = $conn->prepare($update_sql);

        // Bind parameters and execute the statement for each item
        $stmt->bind_param("ssi", $price, $total_price, $requesteditem_id);
        foreach ($prices as $key => $price) {
            $total_price = $total_prices[$key];
            $requesteditem_id = $existing_ids[$key];
            $stmt->execute();
        }

        // Close statement
        $stmt->close();

        echo "Report submitted successfully.";
    } else {
        echo "Error: Price and Total Price arrays are not set or have different lengths.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>