<?php include("db_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelled Items</title>
    <style>
        /* CSS styles */
        .cancelled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto; /* Center the table horizontally */
        }
        .cancelled-table th,
        .cancelled-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .cancelled-table th {
            background-color: #e74c3c; /* Red color for cancelled items */
            color: #fff;
        }
        .message {
            margin-top: 20px;
            text-align: center;
        }
        .table-wrapper {
            max-height: 400px; /* Adjust the maximum height as needed */
            overflow-y: auto;
            border: 1px solid #ddd; /* Add border for better appearance */
            margin: 0 auto; /* Center the wrapper */
        }
    </style>
</head>
<body>
    <div class="table-wrapper">
        <?php
        // Fetching cancelled items from the database
        $sql_cancelled = "SELECT requesteditem_id, requesteditem_name, requesteditem_quantity, price, total_price, id FROM report WHERE auctionstatus = 2";
        $result_cancelled = $conn->query($sql_cancelled);

        if ($result_cancelled->num_rows > 0) {
            echo "<table class='cancelled-table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Item ID</th>";
            echo "<th>Name</th>";
            echo "<th>Quantity</th>";
            echo "<th>Price</th>";
            echo "<th>Total Price</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row_cancelled = $result_cancelled->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_cancelled['requesteditem_id'] . "</td>";
                echo "<td>" . $row_cancelled['requesteditem_name'] . "</td>";
                echo "<td>" . $row_cancelled['requesteditem_quantity'] . "</td>";
                echo "<td>" . $row_cancelled['price'] . "</td>";
                echo "<td>" . $row_cancelled['total_price'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='message'>No cancelled items found.</p>";
        }
        ?>
    </div>
</body>
</html>
