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
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    </style>
</head>
<body>
<div class="container">
    <?php
    // Replace these variables with your actual database connection details
    include("db_connect.php");

    // Example query to fetch reports from the database
    $sql = "SELECT requesteditem_id, requesteditem_name, requesteditem_quantity, price, total_price, id FROM report where status = 1 and auctionstatus = 0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="card">
                <div class="card-header">
                    Item ID: <?php echo $row['id']; ?>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> <?php echo $row['requesteditem_name']; ?></p>
                    <p><strong>Quantity:</strong> <?php echo $row['requesteditem_quantity']; ?></p>
                    <p><strong>Price:</strong> <?php echo $row['price']; ?></p>
                    <p><strong>Total Price:</strong> <?php echo $row['total_price']; ?></p>
                    <form method="post">
                        <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">
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
        // Perform approval action here (e.g., update database, send notification)
        $item_id = $_POST['item_id'];
        $conn->query("UPDATE report SET auctionstatus = 1 WHERE id = $item_id");
        echo "<script>alert('Successfully approved auction!');</script>";
    }

    // Check if the cancel button is clicked
    if (isset($_POST['cancel'])) {
        // Perform cancellation action here (e.g., update database, send notification)
        $item_id = $_POST['item_id'];
        $conn->query("UPDATE report SET auctionstatus = 2 WHERE id = $item_id");
        echo "<script>alert('Auction cancelled!');</script>";
    }

    // Close connection
    $conn->close();
    ?>
    <div class="clearfix"></div>
</div>
</body>
</html>
