<?php include("db_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved Items</title>
    <style>
        /* CSS styles */
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
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

        .bold-entry td {
            font-weight: bold;
        }

        .message {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Approved items
        $sql_approved = "SELECT requesteditem_id, requesteditem_name, requesteditem_quantity, requesteditem_deptname, price, total_price, id FROM report WHERE auctionstatus = 1 ORDER BY id DESC";
        $result_approved = $conn->query($sql_approved);

        if ($result_approved->num_rows > 0) {
            echo "<h2>Approved Items</h2>";
            echo "<table class='history-table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Item ID</th>";
            echo "<th>Name</th>";
            echo "<th>Quantity</th>";
            echo "<th>Department</th>"; // Added Department column
            echo "<th>Price</th>";
            echo "<th>Total Price</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row_approved = $result_approved->fetch_assoc()) {
                // Add bold class to the new entries
                $bold_class = $row_approved['id'] > 1000 ? 'bold-entry' : '';
                
                echo "<tr class='$bold_class'>";
                echo "<td>" . $row_approved['id'] . "</td>";
                echo "<td>" . $row_approved['requesteditem_name'] . "</td>";
                echo "<td>" . $row_approved['requesteditem_quantity'] . "</td>";
                echo "<td>" . $row_approved['requesteditem_deptname'] . "</td>"; // Added Department data
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
</body>
</html>
