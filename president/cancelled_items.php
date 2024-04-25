<?php include("db_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelled Items</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <style>
        /* CSS styles */
        .container {
            width: 100%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .cancelled-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #3498db; /* Set background color */
            color: #fff; /* Set text color */
        }

        .cancelled-table th,
        .cancelled-table td {
            border: 1px solid #ddd;
            padding: 8px; /* Adjusted padding for better spacing */
            text-align: left;
        }

        .cancelled-table th {
            background-color:  #3498db; /* Changed background color */
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
        <div class="table-wrapper">
            <?php
            // Fetching cancelled items from the database ordered by item ID in descending order
            $sql_cancelled = "SELECT requesteditem_id, requesteditem_name, requesteditem_quantity, requesteditem_deptname, requesteditem_type, requesteditem_description, requesteditem_measurment, price, total_price, id FROM report WHERE auctionstatus = 2 ORDER BY requesteditem_id DESC";
            $result_cancelled = $conn->query($sql_cancelled);

            if ($result_cancelled->num_rows > 0) {
                echo "<h2>Cancelled Items</h2>";
                echo "<table class='cancelled-table' id='cancelled-table'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Item ID</th>";
                echo "<th>Name</th>";
                echo "<th>Type</th>";
                echo "<th>Description</th>";
                echo "<th>Measurement</th>";
                echo "<th>Quantity</th>";
                echo "<th>Department</th>"; 
                echo "<th>Price</th>";
                echo "<th>Total Price</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row_cancelled = $result_cancelled->fetch_assoc()) {
                    // Add bold class to the new entries
                    $bold_class = $row_cancelled['id'] > 1000 ? 'bold-entry' : '';
                    
                    echo "<tr class='$bold_class'>";
                    echo "<td>" . $row_cancelled['id'] . "</td>";
                    echo "<td>" . $row_cancelled['requesteditem_name'] . "</td>";
                    echo "<td>" . $row_cancelled['requesteditem_type'] . "</td>";
                    echo "<td>" . $row_cancelled['requesteditem_description'] . "</td>";
                    echo "<td>" . $row_cancelled['requesteditem_measurment'] . "</td>";
                    echo "<td>" . $row_cancelled['requesteditem_quantity'] . "</td>";
                    echo "<td>" . $row_cancelled['requesteditem_deptname'] . "</td>"; // Added Department data
                    echo "<td>" . $row_cancelled['price'] . "</td>";
                    echo "<td>" . $row_cancelled['total_price'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";

                // DataTables initialization script
                echo "<script>
                    $(document).ready(function() {
                        $('#cancelled-table').DataTable({
                            'paging': true,
                            'lengthChange': true,
                            'searching': true,
                            'ordering': true,
                            'info': true,
                            'autoWidth': false,
                            'pageLength': 5, // Default number of rows per page
                            'lengthMenu': [5, 10, 25, 50, 100] // Dropdown for changing number of rows per page
                        });
                    });
                </script>";
            } else {
                echo "<p class='message'>No cancelled items found.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
