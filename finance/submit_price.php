<?php
include("db_connect.php");

// Variable to store success message
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare update statement
    $update_sql = "UPDATE report SET price = ?, total_price = ?, status = CASE WHEN price != 0 AND total_price != 0 THEN 1 ELSE 0 END WHERE requesteditem_id = ?";
    $stmt = $conn->prepare($update_sql);

    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
    } else {
        // Bind parameters outside the loop
        $stmt->bind_param("dds", $price, $total_price, $requesteditem_id);

        // Loop through each submitted item
        foreach ($_POST['price'] as $requesteditem_id => $price) {
            // Check if the requested item ID exists in the POST data
            if (isset($_POST['total_price'][$requesteditem_id])) {
                // Escape and assign values
                $price = mysqli_real_escape_string($conn, $price);
                $total_price = mysqli_real_escape_string($conn, $_POST['total_price'][$requesteditem_id]);
                $requesteditem_id = mysqli_real_escape_string($conn, $requesteditem_id);

                // Execute the statement
                if (!$stmt->execute()) {
                    echo "Error updating record: " . $stmt->error;
                } else {
                    // Set success message
                    $successMessage = '<div class="success-message">Report submitted successfully</div>';
                }
            }
        }
        // Close the statement
        $stmt->close();
        // Close the database connection
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Price</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            position: relative; /* Added */
        }

        .success-message {
            background-color: lightgreen;
            color: green;
            padding: 10px;
            border-radius: 4px;
            position: absolute; /* Changed */
            top: calc(100% + 10px); /* Changed */
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Your HTML form for submitting price -->
    <form method="post">
        <!-- Your form elements here -->
        <!-- For example: -->
        <input type="text" name="price[1]" placeholder="Price for Item 1">
        <input type="text" name="total_price[1]" placeholder="Total Price for Item 1">
        <!-- End of your form elements -->

        <button type="submit">Submit Price</button>
    </form>

    <!-- Success message display -->
    <?php echo $successMessage; ?>
</div>

<script>
    // Remove success message after 2 seconds
    setTimeout(function() {
        var successMessage = document.querySelector('.success-message');
        if (successMessage) {
            successMessage.remove();
        }
    }, 2000);
</script>
</body>
</html>
