<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            position: relative; /* Added */
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative; /* Added */
        }

        .card {
            width: 45%;
            margin: 10px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            float: left;
        }

        .card-header {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border-radius: 4px 4px 0 0;
        }

        .card-body {
            padding: 10px;
        }

        .card-body p {
            margin: 5px 0;
        }

        .card-body button {
            margin-top: 10px;
            display: block;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        .search-bar {
            margin-bottom: 10px;
        }

        .search-bar select {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
            margin-right: 10px;
        }

        .success-message {
            background-color: lightgreen;
            color: green;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
            position: absolute; /* Added */
            top: 50%; /* Added */
            left: 50%; /* Added */
            transform: translate(-50%, -50%); /* Added */
            z-index: 9999; /* Added */
        }

        .error-message {
            background-color: #ffcccc;
            color: red;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
            position: absolute; /* Added */
            top: 50%; /* Added */
            left: 50%; /* Added */
            transform: translate(-50%, -50%); /* Added */
            z-index: 9999; /* Added */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        .dropdown-arrow::after {
            content: '\25BE'; /* Unicode character for downward arrow */
            margin-left: 5px;
        }

        .history-dropdown {
            position: relative;
            display: inline-block;
            margin-top: 20px; /* Added */
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .history-dropdown:hover .dropdown-content {
            display: block;
        }

        .history-dropdown:hover .dropdown-arrow::after {
            content: '\25B4'; /* Unicode character for upward arrow */
        }
    </style>
</head>
<body>
    
<div class="container">
    <div class="search-bar">
        <span>Show:</span>
        <select onchange="changePerPage(this)">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
        </select>
    </div>

    <?php
    // Fetch current reports
    include("db_connect.php");

    $sql_current = "SELECT requesteditem_id, requesteditem_name, requesteditem_quantity, price, total_price, id FROM report where status = 1 and auctionstatus = 0";
    $result_current = $conn->query($sql_current);

    if ($result_current->num_rows > 0) {
        while ($row_current = $result_current->fetch_assoc()) {
            ?>
            <div class="card">
                <div class="card-header">
                    Item ID: <?php echo $row_current['id']; ?>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> <?php echo $row_current['requesteditem_name']; ?></p>
                    <p><strong>Quantity:</strong> <?php echo $row_current['requesteditem_quantity']; ?></p>
                    <p><strong>Price:</strong> <?php echo $row_current['price']; ?></p>
                    <p><strong>Total Price:</strong> <?php echo $row_current['total_price']; ?></p>
                    <form method="post">
                        <input type="hidden" name="item_id" value="<?php echo $row_current['id']; ?>">
                        <button type="submit" name="approve">Approve Auction</button>
                        <button type="submit" name="cancel">Cancel Auction</button>
                    </form>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p>No reports available now.</p>";
    }

    // Check if the approve button is clicked
    if (isset($_POST['approve'])) {
        $item_id = $_POST['item_id'];
        $conn->query("UPDATE report SET auctionstatus = 1 WHERE id = $item_id");
        echo '<div class="success-message">Successfully approved auction!</div>';
    }

    // Check if the cancel button is clicked
    if (isset($_POST['cancel'])) {
        $item_id = $_POST['item_id'];
        $conn->query("UPDATE report SET auctionstatus = 2 WHERE id = $item_id");
        echo '<div class="error-message">Auction cancelled!</div>';
    }

    $conn->close();
    ?>
    <div class="clearfix"></div>

    <div class="history-dropdown">
        <button onclick="toggleHistory()" class="dropdown-arrow">History</button>
        <div id="history" class="dropdown-content">
            <table id="history-table">
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch previous reports history from the database
                    include("db_connect.php");

                    $sql_history = "SELECT requesteditem_id, requesteditem_name, requesteditem_quantity, price, total_price, id FROM report where status = 1 and auctionstatus != 0";
                    $result_history = $conn->query($sql_history);

                    if ($result_history->num_rows > 0) {
                        while ($row_history = $result_history->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row_history['id'] . "</td>";
                            echo "<td>" . $row_history['requesteditem_name'] . "</td>";
                            echo "<td>" . $row_history['requesteditem_quantity'] . "</td>";
                            echo "<td>" . $row_history['price'] . "</td>";
                            echo "<td>" . $row_history['total_price'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No history available</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function toggleHistory() {
        var historyTable = document.getElementById("history");
        if (historyTable.style.display === "none") {
            historyTable.style.display = "block";
        } else {
            historyTable.style.display = "none";
        }
    }

    function changePerPage(select) {
        var perPage = select.value;
        // Implement logic to change the number of items per page
        // For example, you can reload the page with a query parameter indicating the number of items per page
        // window.location.href = window.location.pathname + '?perPage=' + perPage;
    }
</script>
</body>
</html>
