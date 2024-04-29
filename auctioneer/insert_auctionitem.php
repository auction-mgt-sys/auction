<?php
include("db_connect.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Fetch data based on the provided id
    $sql_fetch_data = "SELECT requesteditem_name, requesteditem_type, requesteditem_measurement, requesteditem_quantity, price, total_price FROM report WHERE id = $id";
    $result_fetch_data = $conn->query($sql_fetch_data);
    
    if ($result_fetch_data->num_rows > 0) {
        // Fetch the row
        $row = $result_fetch_data->fetch_assoc();
        
        // Insert fetched data into auctionitem table
        $requesteditem_name = $row['requesteditem_name'];
        $requesteditem_type = $row['requesteditem_type'];
        $requesteditem_measurement = $row['requesteditem_measurement'];
        $total_quantity = $row['requesteditem_quantity'];
        $price = $row['price'];
        $total_price = $row['total_price'];
        
        $sql_insert = "INSERT INTO auctionitem (requesteditem_name, requesteditem_type, requesteditem_measurement, total_quantity, price, total_price) 
                       VALUES ('$requesteditem_name', '$requesteditem_type', '$requesteditem_measurement', $total_quantity, $price, $total_price)";
                       
        if ($conn->query($sql_insert) === TRUE) {
            echo "Item added to auctionitem table successfully!";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    } else {
        echo "No data found for the provided ID.";
    }
} else {
    echo "ID parameter not provided.";
}
?>
