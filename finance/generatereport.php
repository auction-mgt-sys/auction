<?php
include("db_connect.php");

// Check if the submit report form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the submitted report
    // Assuming all items need to be processed together
    // Perform necessary operations with the submitted report data
    // ...
    
    // Display success message
    echo "<h2>Report Submitted Successfully!</h2>";
    echo "<p>Thank you for submitting the report.</p>";
    exit; // Stop further execution of the script
}

// Query to fetch data
$query = "SELECT ri.id, ri.name, ri.type, ri.description, ri.status, COUNT(*) AS count_items, r.price, r.total_price
          FROM requesteditem ri
          LEFT JOIN report r ON ri.id = r.requesteditem_id
          GROUP BY ri.id, ri.name, ri.type, ri.description, ri.status";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <style>
      body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .status-rejected {
            color: red;
        }

        .status-accepted {
            color: green;
        }

        .report-button {
            display: block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin: 10px auto;
            cursor: pointer;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Your History</h2>
<div class="container">
    <table>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Description</th>
            <th>Status</th>
            <th>Count</th>
            <th>Price</th>
            <th>Total Price</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $itemId = $row['id']; // Assuming 'id' is the primary key of the requesteditem table
                $itemName = $row['name'];
                $itemType = $row['type'];
                $itemDescription = $row['description'];
                $itemStatus = $row['status'];
                $itemCount = $row['count_items'];
                $itemPrice = $row['price'];
                $itemTotalPrice = $row['total_price'];

                echo "<tr>";
                echo "<td>$itemName</td>";
                echo "<td>$itemType</td>";
                echo "<td>$itemDescription</td>";
                echo "<td><span class='status-" . ($itemStatus == 1 ? 'accepted' : 'rejected') . "'>" . ($itemStatus == 1 ? 'Accepted' : 'Rejected') . "</span></td>";
                echo "<td>$itemCount</td>";
                echo "<td>$itemPrice</td>";
                echo "<td>$itemTotalPrice</td>";
                echo "</tr>";
            }
            
        } else {
            echo "<tr><td colspan='7'>No data available.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
    </div>
</body>
</html>