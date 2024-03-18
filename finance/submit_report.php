<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if price and total_price arrays are set and have the same length
    if (isset($_POST['price']) && isset($_POST['total_price']) && count($_POST['price']) == count($_POST['total_price'])) {
        $prices = $_POST['price'];
        $total_prices = $_POST['total_price'];

        // Truncate report table to clear existing data
        $clear_sql = "TRUNCATE TABLE report";
        if ($conn->query($clear_sql) === TRUE) {
            // Insert new data into report table
            $insert_sql = "INSERT INTO report (requesteditem_name, requesteditem_type, requesteditem_description, requesteditem_measurment, requesteditem_quantity, requesteditem_id, price, total_price)
                            SELECT name, type, description, measurment, quantity, id, ?, ? FROM requesteditem WHERE status = 1";
            $stmt = $conn->prepare($insert_sql);

            // Bind parameters and execute the statement for each item
            $stmt->bind_param("ss", $price, $total_price);
            foreach ($prices as $key => $price) {
                $total_price = $total_prices[$key];
                $stmt->execute();
            }

            // Close statement
            $stmt->close();

            echo "Report submitted successfully.";
        } else {
            echo "Error clearing report table: " . $conn->error;
        }
    } else {
        echo "Error: Price and Total Price arrays are not set or have different lengths.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
