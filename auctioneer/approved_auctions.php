<?php include("db_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved Items</title>
    <style>
        /* CSS styles */
        .history-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .history-table th,
        .history-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .history-table th {
            background-color: #3498db;
            color: #fff;
        }
        .message {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div>
        <?php
        // Approved items
        $sql_approved = "SELECT requesteditem_id, requesteditem_name, requesteditem_quantity, requesteditem_type, requesteditem_measurment, price, total_price, id FROM report WHERE status = 1 AND auctionstatus != 0";
        $result_approved = $conn->query($sql_approved);

        if ($result_approved->num_rows > 0) {
            echo "<h2>Approved Items</h2>";
            echo "<table class='history-table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Item ID</th>";
            echo "<th>Name</th>";
            echo "<th>Quantity</th>";
            echo "<th>Type</th>";
            echo "<th>Measurment</th>";
            echo "<th>Price</th>";
            echo "<th>Total Price</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row_approved = $result_approved->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_approved['id'] . "</td>";
                echo "<td>" . $row_approved['requesteditem_name'] . "</td>";
                echo "<td>" . $row_approved['requesteditem_quantity'] . "</td>";
                echo "<td>" . $row_approved['requesteditem_type'] . "</td>";
                echo "<td>" . $row_approved['requesteditem_measurment'] . "</td>";
                echo "<td>" . $row_approved['price'] . "</td>";
                echo "<td>" . $row_approved['total_price'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='message'>No approved items available</p>";
        }
        ?>
    </div>
    <p class="message">Since these items have been confirmed by the president, the auction can proceed!</p>
</body>
</html>
