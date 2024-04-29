<?php
include("db_connect.php");

// Check if ID is received through POST
if(isset($_POST['id'])) {
    // Fetch the item details based on the received ID
    $id = $_POST['id'];
    $fetch_query = "SELECT 
                        requesteditem_name AS name, 
                        requesteditem_type AS type, 
                        requesteditem_measurment AS measurement, 
                        SUM(requesteditem_quantity) AS quantity, 
                        SUM(price) AS price, 
                        SUM(total_price) AS total_price
                    FROM 
                        report 
                    WHERE 
                        id = $id";

    $result = $conn->query($fetch_query);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Store fetched values in variables
        $name = $row['name'];
        $type = $row['type'];
        $measurement = $row['measurement'];
        $quantity = $row['quantity'];
        $price = $row['price'];
        $total_price = $row['total_price'];

        // Prepare the insert query
        $insert_query = "INSERT INTO auctionitem (requesteditem_name, requesteditem_type, requesteditem_measurement, requesteditem_quantity, price, total_price) 
                        VALUES (?, ?, ?, ?, ?, ?)";
        
        // Prepare and bind parameters for the insert query
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("sssiid", $name, $type, $measurement, $quantity, $price, $total_price);

        // Execute the insert query
        if ($stmt->execute()) {
            // Return success response
            echo "Item added to auctionitem table successfully!";
        } else {
            // Return error response if insertion fails
            echo "Error: Unable to add item to auctionitem table.";
        }

        // Close prepared statement
        $stmt->close();
    } else {
        // Return error response if no data found for the given ID
        echo "Error: No data found for the given ID.";
    }
} else {
    // Return error response if ID is not received
    echo "Error: ID is not received.";
}

// Close the database connection
$conn->close();
?>
