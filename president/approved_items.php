<?php include("db_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved Items</title>
    <style>
        /* CSS styles */
        .approved-table {
            width: 80%; /* Adjust the width as needed */
            border-collapse: collapse;
            margin: 20px auto; /* Center the table horizontally */
        }
        .approved-table th,
        .approved-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .approved-table th {
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
    <?php
    // Fetching approved items from the database
    $sql_approved = "SELECT requesteditem_id, requesteditem_name, requesteditem_quantity, price, total_price, id FROM report WHERE auctionstatus = 1";
    $result_approved = $conn->query($sql_approved);

    if ($result_approved->num_rows > 0) {
        echo "<table class='approved-table'>";
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
        while ($row_approved = $result_approved->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row_approved['requesteditem_id'] . "</td>";
            echo "<td>" . $row_approved['requesteditem_name'] . "</td>";
            echo "<td>" . $row_approved['requesteditem_quantity'] . "</td>";
            echo "<td>" . $row_approved['price'] . "</td>";
            echo "<td>" . $row_approved['total_price'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p class='message'>No approved items found.</p>";
    }
    ?>
</body>
</html>
