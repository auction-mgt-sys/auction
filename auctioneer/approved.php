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
    
        include("db_connect.php");
        
        // Get the current month and year
        $currentMonth = date('m');
        $currentYear = date('Y');

        
        // Approved items with merged types
        $sql_approved = "SELECT 
        id, 
        requesteditem_name AS common_name, 
        requesteditem_measurment AS common_measurement, 
        requesteditem_type AS common_type, 
        SUM(requesteditem_quantity) AS total_quantity, 
        SUM(price) AS price, 
        SUM(total_price) AS total_price
    FROM 
        report 
    WHERE 
        auctionstatus = 1 AND MONTH(dateapprove) = $currentMonth
        AND YEAR(dateapprove) = $currentYear AND 
        groupitem = 0
    GROUP BY 
        requesteditem_name, 
        requesteditem_measurment, 
        requesteditem_type 
    ORDER BY 
        id DESC";

        $result_approved = $conn->query($sql_approved);

        if ($result_approved->num_rows > 0) {
            echo "<h2>Approved Items</h2>";
            echo "<table class='history-table' id='approved-table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Item name</th>";
            echo "<th>Type</th>";
            echo "<th>Measurement</th>";
            echo "<th>Quantity</th>";
            echo "<th>Price</th>";
            echo "<th>Total Price</th>";
            echo "<th>Action</th>"; // Action column
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row_approved = $result_approved->fetch_assoc()) {
                echo "<tr id='row_" . $row_approved['id'] . "'>";
                echo "<td>" . $row_approved['common_name'] . "</td>"; // Use the directly selected column 'requesteditem_name'
                echo "<td>" . $row_approved['common_type'] . "</td>"; // Use the directly selected column 'requesteditem_type'
                echo "<td>" . $row_approved['common_measurement'] . "</td>"; // Use the directly selected column 'requesteditem_measurement'
                echo "<td>" . $row_approved['total_quantity'] . "</td>";
                echo "<td>" . $row_approved['price'] . "</td>";
                echo "<td>" . $row_approved['total_price'] . "</td>";
                echo "<td><button class='action-btn' onclick='performAction(" . $row_approved['id'] . ")'>Upload</button></td>"; // Using 'id' from the row
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
                    // Get the item details of the clicked row
                    var itemName = $('#approved-table').DataTable().row('#row_' + id).data()[0];
                    var itemType = $('#approved-table').DataTable().row('#row_' + id).data()[1];
                    var itemMeasurement = $('#approved-table').DataTable().row('#row_' + id).data()[2];
                    var quantity = $('#approved-table').DataTable().row('#row_' + id).data()[3];
                    var price = $('#approved-table').DataTable().row('#row_' + id).data()[4];
                    var totalPrice = $('#approved-table').DataTable().row('#row_' + id).data()[5];
                
                    // AJAX request to insert data into auctionitem table
                    $.ajax({
                        url: 'insert_auctionitem.php',
                        type: 'POST',
                        data: {
                            itemName: itemName,
                            itemType: itemType,
                            itemMeasurement: itemMeasurement,
                            quantity: quantity,
                            price: price,
                            totalPrice: totalPrice
                        },
                        success: function(response) {
                            console.log(response);
                            // Remove the row from the table
                            $('#approved-table').DataTable().row('#row_' + id).remove().draw();
                            // Display a toast message indicating success
                            showToast('Item added to auctionitem list successfully!', 'green');
                
                            // Update the report table
                            $.ajax({
                                url: 'update_report.php',
                                type: 'POST',
                                data: {
                                    itemName: itemName,
                                    itemType: itemType,
                                    itemMeasurement: itemMeasurement
                                },
                                success: function(response) {
                                    console.log(response);
                                },
                                error: function(xhr, status, error) {
                                    console.error(xhr.responseText);
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            // Display a toast message indicating error
                            showToast('Error occurred while adding item to auctionitem table. Please try again.', 'red');
                        }
                    });
                }
                
                // Function to display toast messages
                function showToast(message, color) {
                    // Create a toast element
                    var toast = document.createElement('div');
                    toast.textContent = message;
                    toast.style.backgroundColor = color;
                    toast.style.color = '#fff';
                    toast.style.padding = '10px';
                    toast.style.borderRadius = '4px';
                    toast.style.position = 'fixed';
                    toast.style.bottom = '20px';
                    toast.style.left = '50%';
                    toast.style.transform = 'translateX(-50%)';
                    toast.style.zIndex = '9999';

                    // Append toast to body
                    document.body.appendChild(toast);

                    // Automatically remove toast after 3 seconds
                    setTimeout(function() {
                        toast.parentNode.removeChild(toast);
                    }, 3000);
                }
            </script>";
        } else {
            echo "<p class='message'>No approved items found</p>";
        }
        ?>
    </div>
</body>
</html>
