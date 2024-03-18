<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>President Reports</title>
    <style>
        /* CSS styles remain unchanged */
    </style>
</head>
<body>
    <div class="container">
        <table>
        <thead>
    <tr>
        <th>&nbsp; ID</th>
        <th>Name</th>
        <th>&nbsp; Quantity</th>
        <th>&nbsp; Price</th>
        <th>&nbsp; Total Price</th>
        <th>&nbsp; Action</th>
    </tr>
</thead>
            <tbody>
                <?php
                    // Replace these variables with your actual database connection details
                    include("db_connect.php");

                    // Example query to fetch reports from the database
                    $sql = "SELECT requesteditem_id, requesteditem_name, requesteditem_quantity, price, total_price, id FROM report";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['requesteditem_name']}</td>";
                            echo "<td>{$row['requesteditem_quantity']}</td>";
                            echo "<td>{$row['price']}</td>";
                            echo "<td>{$row['total_price']}</td>";
                            echo "<td><form method='post'><input type='hidden' name='item_id' value='{$row['id']}'><button type='submit' name='approve'>Approve Auction</button></form></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No reports available now.</td></tr>";
                    }

                    // Check if the approve button is clicked
                    if (isset($_POST['approve'])) {
                        // Perform approval action here (e.g., update database, send notification)
                        // After performing the action, display success message
                        echo "<script>alert('Successfully approved auction!');</script>";
                    }
                    
                    // Close connection
                    $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>