<?php
include("db_connect.php");

if (isset($_POST['cancel'])) {
    $item_id = $_POST['item_id'];
    $reason = $_POST['reason']; // Get the reason from the form

    // Update the report table with the cancellation status and reason
    $stmt = $conn->prepare("UPDATE report SET auctionstatus = 2, reason = ? WHERE id = ?");
    $stmt->bind_param("si", $reason, $item_id);
    $stmt->execute();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Request</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            position: relative;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
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

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 8px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
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
    // Replace these variables with your actual database connection details
    include("db_connect.php");
    
    // Example query to fetch reports from the database
    $sql = "SELECT r.requesteditem_id, r.requesteditem_name, r.requesteditem_quantity, r.requesteditem_deptname, r.requesteditem_depheadname, r.price, r.total_price, r.id, r.requesteditem_description, r.requesteditem_measurment, r.requesteditem_type FROM report r WHERE r.status = 1 AND r.auctionstatus = 0";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="card" id="report-<?php echo $row['id']; ?>">
                <div class="card-header">
                    Item ID: <?php echo $row['id']; ?>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> <?php echo $row['requesteditem_name']; ?></p>
                    <p><strong>Type:</strong> <?php echo $row['requesteditem_type']; ?></p>
                    <p><strong>Description:</strong> <?php echo $row['requesteditem_description']; ?></p>
                    <p><strong>Measurement:</strong> <?php echo $row['requesteditem_measurment']; ?></p>
                    <p><strong>Quantity:</strong> <?php echo $row['requesteditem_quantity']; ?></p>
                    <p><strong>Department:</strong> <?php echo $row['requesteditem_deptname']; ?></p>

                    <p><strong>Depheadname:</strong> <?php echo $row['requesteditem_depheadname']; ?></p>
                    <p><strong>Price:</strong> <?php echo $row['price']; ?></p>
                    <p><strong>Total Price:</strong> <?php echo $row['total_price']; ?></p>
                    <form method="post">
                        <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="approve">Approve Auction</button>
                        <button type="button" onclick="openModal('<?php echo $row['id']; ?>')">Cancel Auction</button>
                    </form>
                </div>
            </div>
            <?php
        }
        
        // Check if the approve button is clicked
        if (isset($_POST['approve'])) {
            // Perform approval action here (e.g., update database, send notification)
            $item_id = $_POST['item_id'];
            $conn->query("UPDATE report SET auctionstatus = 1 WHERE id = $item_id");
            ?>
            <script>
                document.getElementById('report-<?php echo $item_id; ?>').remove();
                const successMessage = document.createElement('div');
                successMessage.className = 'success-message';
                successMessage.textContent = 'Successfully approved auction!';
                document.body.appendChild(successMessage);
                setTimeout(function() {
                    successMessage.remove();
                }, 2000);
            </script>
            <?php
        }

    } else {
        echo "<p>No reports available now.</p>";
    }

    // Close connection
    $conn->close();
    ?>
    <div class="clearfix"></div>
</div>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Cancel Auction</h2>
        <form method="post">
            <input type="hidden" id="cancelItemId" name="item_id">
            <label for="reason">Please provide reason:</label>
            <textarea id="reason" name="reason" rows="4" cols="50"></textarea><br><br>
            <button type="submit" name="save">Save</button>
            <button type="button" onclick="cancelModal()">Cancel</button>
        </form>
    </div>
</div>

<script>
    function changePerPage(select) {
        var perPage = select.value;
        // Implement logic to change the number of items per page
        // For example, you can reload the page with a query parameter indicating the number of items per page
        // window.location.href = window.location.pathname + '?perPage=' + perPage;
    }

    function openModal(itemId) {
        document.getElementById('cancelItemId').value = itemId;
        document.getElementById('myModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }
</script>
</body>
</html>
