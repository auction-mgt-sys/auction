<?php include("db_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved Items</title>
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
            background-color: #fff; /* White background for header */
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
        $sql_approved = "SELECT requesteditem_id, requesteditem_name, requesteditem_quantity, requesteditem_deptname, requesteditem_type, requesteditem_description, requesteditem_measurment, price, total_price, dateapprove FROM report WHERE auctionstatus = 1 ORDER BY id DESC";
        $result_approved = $conn->query($sql_approved);

        if ($result_approved->num_rows > 0) {
            echo "<h2>Approved Items</h2>";
            echo "<table class='history-table' id='approved-table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Type</th>";
            echo "<th>Description</th>";
            echo "<th>Measurment</th>";
            echo "<th>Quantity</th>";
            echo "<th>Department</th>"; 
            echo "<th>Price</th>";
            echo "<th>Total Price</th>";

            echo "<th>AApproved Date</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row_approved = $result_approved->fetch_assoc()) {
                // Add bold class to the new entries
                
                echo "<td>" . $row_approved['requesteditem_name'] . "</td>";
                echo "<td>" . $row_approved['requesteditem_type'] . "</td>";
                echo "<td>" . $row_approved['requesteditem_description'] . "</td>";
                echo "<td>" . $row_approved['requesteditem_measurment'] . "</td>";
                echo "<td>" . $row_approved['requesteditem_quantity'] . "</td>";
                echo "<td>" . $row_approved['requesteditem_deptname'] . "</td>"; // Added Department data
                echo "<td>" . $row_approved['price'] . "</td>";
                echo "<td>" . $row_approved['total_price'] . "</td>";
                echo "<td>" . $row_approved['dateapprove'] . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";

            // DataTables initialization script
            echo "<script>
                $(document).ready(function() {
                    $('#approved-table').DataTable({
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
            echo "<p class='message'>No approved items available</p>";
        }
        ?>
    </div>
</body>
</html>
