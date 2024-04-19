<?php include("db_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelled Items</title>
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

        .cancelled-table {
            width: 100%;
            border-collapse: collapse;
        }

        .cancelled-table th,
        .cancelled-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .cancelled-table th {
            background-color: #e74c3c;
            color: #fff;
        }

        .message {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <?php
            // Fetching cancelled items from the database ordered by item ID in descending order
            $sql_cancelled = "SELECT requesteditem_id, requesteditem_name, requesteditem_quantity, requesteditem_deptname, price, total_price, id FROM report WHERE auctionstatus = 2 ORDER BY requesteditem_id DESC";
            $result_cancelled = $conn->query($sql_cancelled);

            if ($result_cancelled->num_rows > 0) {
                echo "<table class='cancelled-table'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th style='width: 10%;'>Item ID</th>"; 
                echo "<th style='width: 30%;'>Name</th>";
                echo "<th style='width: 10%;'>Quantity</th>";
                echo "<th style='width: 20%;'>Department</th>"; // Added Department column
                echo "<th style='width: 20%;'>Price</th>";
                echo "<th style='width: 20%;'>Total Price</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row_cancelled = $result_cancelled->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row_cancelled['requesteditem_id'] . "</td>";
                    echo "<td>" . $row_cancelled['requesteditem_name'] . "</td>";
                    echo "<td>" . $row_cancelled['requesteditem_quantity'] . "</td>";
                    echo "<td>" . $row_cancelled['requesteditem_deptname'] . "</td>"; // Added Department data
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
    </div>
</body>
</html>
