<?php include("db_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> VIEW REPORTS</title>
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
    $sql = "SELECT name, lname, username, gender, age, TIN_number, email, address, data_created FROM users WHERE type = 2";
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully
    if ($result) {
        // Check if there are any bidders
        if (mysqli_num_rows($result) > 0) {
            // Start table
            echo "<h3>Total Bidders: " . mysqli_num_rows($result) . "</h3>";
            echo "<table class='report-table'>";
            echo "<tr><th>First Name</th><th>Last Name</th><th>Username</th><th>Gender</th><th>Age</th><th>TIN</th><th>Email</th><th>Address</th><th>Rigisterd Date</th></tr>";

            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["lname"]."</td>";
                echo "<td>".$row["username"]."</td>";
                echo "<td>".$row["gender"]."</td>";
                echo "<td>".$row["age"]."</td>";
                echo "<td>".$row["TIN_number"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "<td>".$row["address"]."</td>";
                echo "<td>".$row["data_created"]."</td>";

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
    $sql = "SELECT name, type, description, measurment, quantity, deptname, depheadname, reason ,sent_date FROM requesteditem WHERE status = 2";
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully
    if ($result) {
        // Check if there are any requested items
        if (mysqli_num_rows($result) > 0) {
            // Start table
            echo "<h3>Requested Items (Status 2)</h3>";
            echo "<table class='report-table'>";
            echo "<tr><th>Name</th><th>Type</th><th>Description</th><th>Measurement</th><th>Quantity</th><th>Department Name</th><th>Department Head Name</th><th>Reason</th><th>Date</th></tr>";

            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["type"]."</td>";
                echo "<td>".$row["description"]."</td>";
                echo "<td>".$row["measurment"]."</td>";
                echo "<td>".$row["quantity"]."</td>";
                echo "<td>".$row["deptname"]."</td>";
                echo "<td>".$row["depheadname"]."</td>";
                echo "<td>".$row["reason"]."</td>";
                echo "<td>".$row["sent_date"]."</td>";

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
    $sql = "SELECT requesteditem_name, requesteditem_type, requesteditem_measurment, requesteditem_quantity, price, total_price, reported_date FROM report WHERE status = 1";
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully
    if ($result) {
        // Check if there are any requested items
        if (mysqli_num_rows($result) > 0) {
            // Start table
            echo "<h3>Requested Items (Status 1)</h3>";
            echo "<table class='report-table'>";
            echo "<tr><th>Name</th><th>Type</th><th>Measurement</th><th>Quantity</th><th>Price</th><th>Total Price</th><th>Reported Date</th></tr>";

            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row["requesteditem_name"]."</td>";
                echo "<td>".$row["requesteditem_type"]."</td>";
                echo "<td>".$row["requesteditem_measurment"]."</td>";
                echo "<td>".$row["requesteditem_quantity"]."</td>";
                echo "<td>".$row["price"]."</td>";
                echo "<td>".$row["total_price"]."</td>";
                echo "<td>".$row["reported_date"]."</td>";

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

// Function to fetch and display number of products and count of bidders for each product
function fetchAuctionDetails() {
    global $conn;

    // Query to fetch number of products and count of bidders for each product
    $sql = "SELECT id, name, quantity, price_for_form, description, total_price, measurement, regular_price, start_bid, date_created, bid_end_datetime FROM products";
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully
    if ($result) {
        // Check if there are any auction details
        if (mysqli_num_rows($result) > 0) {
            // Start table
            echo "<h3>Auction Details</h3>";
            echo "<table class='report-table'>";
            echo "<tr><th>ID</th><th>Name</th><th>Quantity</th><th>Price for Form</th><th>Description</th><th>Total Price</th><th>Measurement</th><th>Regular Price</th><th>Start Bid</th><th>Bid Start Date</th><th>Bid End Date</th></tr>";

            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["quantity"]."</td>";
                echo "<td>".$row["price_for_form"]."</td>";
                echo "<td>".$row["description"]."</td>";
                echo "<td>".$row["total_price"]."</td>";
                echo "<td>".$row["measurement"]."</td>";
                echo "<td>".$row["regular_price"]."</td>";
                echo "<td>".$row["start_bid"]."</td>";
                echo "<td>".$row["bid_end_datetime"]."</td>";

                echo "<td>".$row["date_created"]."</td>";
                echo "</tr>";
            }

            // End table
            echo "</table>";
        } else {
            echo "No auction details found.";
        }
    } else {
        echo "Error fetching auction details: " . mysqli_error($conn);
    }
}


// Function to fetch and display number of bidders for each product
function fetchBiddersPerProduct() {
    global $conn;

    // Query to fetch number of bidders for each product
    $sql = "SELECT p.id, 
    p.name, 
    COUNT(b.user_id) AS num_bidders,
    MIN(b.bid_amount) AS smallest_amount, -- Select the smallest amount
    CONCAT(u.name, ' ', u.lname) AS user_with_smallest_amount ,b.date_created-- Concatenate name and lname
FROM products p
LEFT JOIN bids b ON p.id = b.product_id
LEFT JOIN users u ON b.user_id = u.id -- Join with the users table to get user details
GROUP BY p.id, p.name
";
    
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully
    if ($result) {
        // Check if there are any products with bidders
        if (mysqli_num_rows($result) > 0) {
            // Start table
            echo "<h3>Number of Bidders Per Product</h3>";
            echo "<table class='report-table'>";
            echo "<tr><th>ID</th><th>Name</th><th>Number of Bidders</th><th>Win Amount</th><th>Winner</th><th>Date Bids</th></tr>";

            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["num_bidders"]."</td>";
                echo "<td>".$row["smallest_amount"]."</td>"; // Display the smallest amount
                echo "<td>".$row["user_with_smallest_amount"]."</td>"; // Display the user ID of the bidder with the smallest amount
                echo "<td>".$row["date_created"]."</td>";

                echo "</tr>";
                
            }

            // End table
            echo "</table>";
        } else {
            echo "No products with bidders found.";
        }
    } else {
        echo "Error fetching bidders per product: " . mysqli_error($conn);
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
        <div class="col-lg-3">
    <a href="index.php" class="text-start"><b>BACK To HOME</b></a>    
    </div>
            <div class="container">
                <h2>Generated Reports</h2>
                <form action="generate_reports.php" method="post">
                    <label for="selection">Select an Option:</label>
                    <div class="dropdown">
                        <select id="selection" name="selection">
                            <option value="bidder">Bidder</option>
                            <option value="requested_items_status_2">Requested Items and Rejected </option>
                            <option value="requested_items_status_1">Requested Items and Accept </option>
                            <option value="auction">Auction</option>
                            <option value="bidders_per_product">Number of Bidders Per Product</option>

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
                            case "auction":
                                fetchAuctionDetails();
                                break;
                                case "bidders_per_product":
                                    fetchBiddersPerProduct();
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
