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
<?php 
include("db_connect.php");

// Function to fetch and display bidders
function fetchBidders() {
    global $conn;

    // Query to fetch bidders from the users table where type=2
    $sql = "SELECT name, gender, age FROM users WHERE type = 2";
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully
    if ($result) {
        // Check if there are any bidders
        if (mysqli_num_rows($result) > 0) {
            // Start table
            echo "<h3>Total Bidders: " . mysqli_num_rows($result) . "</h3>";
            echo "<table class='report-table'>";
            echo "<tr><th>Name</th><th>Gender</th><th>Age</th></tr>";

            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["gender"]."</td>";
                echo "<td>".$row["age"]."</td>";
                echo "</tr>";
            }

            // End table
            echo "</table>";
        } else {
            echo "No bidders found.";
        }
    } else {
        echo "Error fetching bidders: " . mysqli_error($conn);
    }
}

// Function to fetch and display requested items with status 2 from requesteditem table
function fetchRequestedItemsStatus2() {
    global $conn;

    // Query to fetch requested items with status 2 from the requesteditem table
    $sql = "SELECT name, measurment, quantity, deptname, depheadname, reason FROM requesteditem WHERE status = 2";
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully
    if ($result) {
        // Check if there are any requested items
        if (mysqli_num_rows($result) > 0) {
            // Start table
            echo "<h3>Requested Items (Status 2)</h3>";
            echo "<table class='report-table'>";
            echo "<tr><th>Name</th><th>Measurement</th><th>Quantity</th><th>Department Name</th><th>Department Head Name</th><th>Reason</th></tr>";

            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["measurment"]."</td>";
                echo "<td>".$row["quantity"]."</td>";
                echo "<td>".$row["deptname"]."</td>";
                echo "<td>".$row["depheadname"]."</td>";
                echo "<td>".$row["reason"]."</td>";
                echo "</tr>";
            }

            // End table
            echo "</table>";
        } else {
            echo "No requested items found with status 2.";
        }
    } else {
        echo "Error fetching requested items with status 2: " . mysqli_error($conn);
    }
}

// Function to fetch and display requested items with status 1 from report table
function fetchRequestedItemsStatus1() {
    global $conn;

    // Query to fetch requested items with status 1 from the report table
    $sql = "SELECT requesteditem_name, requesteditem_type, requesteditem_measurment, requesteditem_quantity, price, total_price FROM report WHERE status = 1";
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully
    if ($result) {
        // Check if there are any requested items
        if (mysqli_num_rows($result) > 0) {
            // Start table
            echo "<h3>Requested Items (Status 1)</h3>";
            echo "<table class='report-table'>";
            echo "<tr><th>Name</th><th>Type</th><th>Measurement</th><th>Quantity</th><th>Price</th><th>Total Price</th></tr>";

            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row["requesteditem_name"]."</td>";
                echo "<td>".$row["requesteditem_type"]."</td>";
                echo "<td>".$row["requesteditem_measurment"]."</td>";
                echo "<td>".$row["requesteditem_quantity"]."</td>";
                echo "<td>".$row["price"]."</td>";
                echo "<td>".$row["total_price"]."</td>";
                echo "</tr>";
            }

            // End table
            echo "</table>";
        } else {
            echo "No requested items found with status 1.";
        }
    } else {
        echo "Error fetching requested items with status 1: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Reports</title>
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
                <form action="generate_reports.php" method="post">
                    <label for="selection">Select an Option:</label>
                    <div class="dropdown">
                        <select id="selection" name="selection">
                            <option value="bidder">Bidder</option>
                            <option value="requested_items_status_2">Requested Items (Status 2)</option>
                            <option value="requested_items_status_1">Requested Items (Status 1)</option>
                        </select>
                        <button type="submit">Submit</button>
                    </div>
                </form>
                <?php
                    // Process the selected option
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selection"])) {
                        switch ($_POST["selection"]) {
                            case "bidder":
                                fetchBidders();
                                break;
                            case "requested_items_status_2":
                                fetchRequestedItemsStatus2();
                                break;
                            case "requested_items_status_1":
                                fetchRequestedItemsStatus1();
                                break;
                            default:
                                echo "Invalid selection.";
                                break;
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
