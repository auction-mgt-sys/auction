<?php include("db_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown</title>
    <style>
        .white-container {
            background-color: #ffffff;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 35px;
        }

        /* Dropdown styles */
        .dropdown {
            display: inline-block;
            position: relative;
            margin-right: 20px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content select {
            display: block;
            padding: 10px;
            border: none;
            background-color: transparent;
            width: 100%;
            cursor: pointer;
        }

        .dropdown-content select:hover {
            background-color: #ddd;
        }

        .report-table {
            width: 100%;
            border-collapse: collapse;
        }

        .report-table th,
        .report-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .report-table th {
            background-color: #3498db;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="white-container">
        <div class="main-container">
            <div class="container">
                <h2>Generated Reports</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label for="selection">Select an Option:</label>
                    <div class="dropdown">
                        <select id="selection" name="selection">
                            <option value="auctions">Auctions</option>
                            <option value="requested_items">Requested Items</option>
                        </select>
                        <?php
                            // Display the submenu only when "Requested Items" is selected
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selection"]) && $_POST["selection"] === "requested_items") {
                                echo '<div class="dropdown-content">';
                                echo '<label for="requested_submenu">Select Submenu:</label>';
                                echo '<select id="requested_submenu" name="requested_submenu">';
                                echo '<option value="accepted">Accepted</option>';
                                echo '<option value="rejected">Rejected</option>';
                                echo '</select>';
                                echo '</div>';
                            }
                        ?>
                    </div>
                    <div class="dropdown">
                        <select id="second_selection" name="second_selection">
                            <option value="accepted">Accepted</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                </form>
                <?php
                    // Process the selected option
                        // Retrieve the selected option from the form
                
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Retrieve the selected option from the form
                        if (isset($_POST["requested_submenu"]) && $_POST["requested_submenu"] === "accepted") {
                            // Fetching accepted items from the database
                            $sql_accepted = "SELECT name, type, description, measurement, quantity, deptname, depheadname FROM requesteditem WHERE status = 1";
                            $result_accepted = $conn->query($sql_accepted);
                    
                            if ($result_accepted->num_rows > 0) {
                                echo "<h2>Accepted Items</h2>";
                                echo "<table class='history-table'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>Name</th>";
                                echo "<th>Type</th>";
                                echo "<th>Description</th>";
                                echo "<th>Measurement</th>";
                                echo "<th>Quantity</th>";
                                echo "<th>Department</th>";
                                echo "<th>Department Head</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                    
                                while ($row = $result_accepted->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['type'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td>" . $row['measurement'] . "</td>";
                                    echo "<td>" . $row['quantity'] . "</td>";
                                    echo "<td>" . $row['deptname'] . "</td>";
                                    echo "<td>" . $row['depheadname'] . "</td>";
                                    echo "</tr>";
                                }
                    
                                echo "</tbody>";
                                echo "</table>";
                            } else {
                                echo "<p class='message'>No accepted items available</p>";
                            }
                        }
                    }
                
                ?>
            </div>
        </div>
    </div>
</body>
</html>