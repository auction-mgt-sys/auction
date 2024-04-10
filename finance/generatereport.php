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

        .report-card {
            display: inline-block;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .report-card h3 {
            margin: 0;
            padding: 0;
        }

        .report-card p {
            margin: 0;
            padding: 0;
            font-size: 14px;
        }

        .report-card .status-rejected {
            color: red;
        }

        .report-card .status-accepted {
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
    </style>
</head>
<body>
    <h2>Reports</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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

                echo "<div class='report-card'>";
                echo "<h3>$itemName</h3>";
                echo "<p>Type: $itemType</p>";
                echo "<p>Description: $itemDescription</p>";
                echo "<p>Status: <span class='status-" . ($itemStatus == 1 ? 'accepted' : 'rejected') . "'>" . ($itemStatus == 1 ? 'Accepted' : 'Rejected') . "</span></p>";
                echo "<p>Count: $itemCount</p>";
                echo "<p>Price: $itemPrice</p>";
                echo "<p>Total Price: $itemTotalPrice</p>";
                echo "</div>";
            }
            echo "<button type='submit' class='report-button'>Submit Report for All Items</button>";
        } else {
            echo "No data available.";
        }

        $conn->close();
        ?>
    </form>
</body>
</html>