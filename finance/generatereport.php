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
$query = "SELECT ri.id, ri.name, ri.type, ri.description, ri.status, COUNT(*) AS count_items, r.price, r.total_price, r.reported_date
          FROM requesteditem ri
          LEFT JOIN report r ON ri.id = r.requesteditem_id
          GROUP BY ri.id, ri.name, ri.type, ri.description, ri.status";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Include the previous CSS styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2>Your History</h2>
    <div class="container">
        <table class="table table-condensed table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Count</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Reported date</th>
                </tr>
            </thead>
            <tbody>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $itemName = $row['name'];
                    $itemType = $row['type'];
                    $itemDescription = $row['description'];
                    $itemStatus = $row['status'];
                    $itemCount = $row['count_items'];
                    $itemPrice = $row['price'];
                    $itemTotalPrice = $row['total_price'];
                    $reported_date = $row['reported_date'];

                    echo "<tr class='" . ($result->num_rows % 2 == 0 ? 'even' : 'odd') . "'>";
                    echo "<td>$itemName</td>";
                    echo "<td>$itemType</td>";
                    echo "<td>$itemDescription</td>";
                    echo "<td><span class='status-" . ($itemStatus == 1 ? 'accepted' : 'rejected') . "'>" . ($itemStatus == 1 ? 'Accepted' : 'Rejected') . "</span></td>";
                    echo "<td>$itemCount</td>";
                    echo "<td>$itemPrice</td>";
                    echo "<td>$itemTotalPrice</td>";
                    echo "<td>$reported_date</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No data available.</td></tr>";
            }

            $conn->close();
            ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $('table').dataTable();
        });
    </script>

    <style>
        tr.even {
            background-color: #f2f2f2;
            height: 30px; /* Decrease row height */
        }
        tr.odd {
            background-color: #ffffff;
            height: 30px; /* Decrease row height */
        }
    </style>
</body>
</html>