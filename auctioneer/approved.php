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

        .approval-message {
            margin-top: 20px;
            text-align: center;
            font-style: italic;
            color: #007bff;
        }

        .action-btn {
            padding: 6px 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .action-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Approved items with merged types
        $sql_approved = "SELECT id, requesteditem_name, requesteditem_type, requesteditem_measurment, 
                    SUM(requesteditem_quantity) as total_quantity, 
                    SUM(price) as price, 
                    SUM(total_price) as total_price, 
                    GROUP_CONCAT(requesteditem_type) as merged_types 
                    FROM report 
                    WHERE auctionstatus = 1 
                    GROUP BY requesteditem_type 
                    ORDER BY id DESC";

        $result_approved = $conn->query($sql_approved);

        if ($result_approved->num_rows > 0) {
            echo "<h2>Approved Items</h2>";
            echo "<table class='history-table' id='approved-table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Item name</th>";
            echo "<th>Type</th>";
            echo "<th>measurement</th>";
            echo "<th>Quantity</th>";
            echo "<th>price</th>";
            echo "<th>Total Price</th>";
            echo "<th>Action</th>"; // Action column
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

        
        
            while ($row_approved = $result_approved->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_approved['requesteditem_name'] . "</td>";
                echo "<td>" . $row_approved['merged_types'] . "</td>";
                echo "<td>" . $row_approved['requesteditem_measurment'] . "</td>";
                echo "<td>" . $row_approved['total_quantity'] . "</td>";
                echo "<td>" . $row_approved['price'] . "</td>";
                echo "<td>" . $row_approved['total_price'] . "</td>";
                echo "<td><button class='action-btn' onclick='performAction(" . $row_approved['id'] . ")'>See</button></td>"; // Using 'id' from the row
                echo "</tr>";
            }
        
            
                        echo "</tbody>";
            echo "</table>";

            // Show approval message
            echo "<p class='approval-message'>These items have been approved by the president. The auction can proceed now.</p>";

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

                function performAction(id) {
                    // Implement your action logic here, using the id parameter to identify the selected row
                    console.log('Performing action for row with id:', id);
                }
            </script>";
        } else {
            echo "<p class='message'>No approved items found</p>";
        }
        ?>
    </div>
</body>
</html>

<script>
    function performAction(id) {
        // AJAX request to insert data into auctionitem table
        $.ajax({
            url: 'insert_auctionitem.php',
            type: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                console.log(response);
                alert('Item added to auctionitem table successfully!');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error occurred while adding item to auctionitem table. Please try again.');
            }
        });
    }
</script>

