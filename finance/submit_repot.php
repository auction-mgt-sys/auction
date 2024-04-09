<?php
include("db_connect.php");

if (isset($_POST['submit_price'])) {
    $prices = $_POST['price'];
    $totalPrices = $_POST['total_price'];

    // Update prices and status in the report table
    foreach ($prices as $requesteditemId => $price) {
        // Escape the values to prevent SQL injection
        $requesteditemId = $conn->real_escape_string($requesteditemId);
        $price = $conn->real_escape_string($price);
        $totalPrice = $conn->real_escape_string($totalPrices[$requesteditemId]);

        if ($price != 0 || $totalPrice != 0) {
            // Update the price and status for the specified requesteditem_id
            $update_sql = "UPDATE report SET price = '$price', total_price = '$totalPrice', status = 1 WHERE requesteditem_id = '$requesteditemId'";
            $conn->query($update_sql);
        }
    }

    // Display success message
    echo "<script>
            alert('Prices have been submitted successfully');
            window.history.back(); // Go back to the previous page
          </script>";
}

$conn->close();
?>