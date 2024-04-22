<?php
// Assuming the connection to the database is already established
include 'db_connect.php';

// Initialize message variable
$message = '';

// Check if ID and action parameters are provided
if (isset($_GET['id']) && isset($_GET['action'])) {
    $itemId = $_GET['id'];
    $action = $_GET['action'];

    // Update status based on action
    switch ($action) {
        case 'verify':
            $message = updateStatus($itemId, 1, "Item successfully verified");
            break;
        case 'reject':
            // If reject action, check if reason is provided
            if (isset($_POST['reason']) && !empty(trim($_POST['reason']))) {
                $reason = $_POST['reason'];
                $message = updateStatus($itemId, 2, "Item successfully rejected with reason: $reason", $reason);
            } else {
                $message = "Reason for rejection is required";
            }
            break;
        default:
            $message = "Invalid action";
    }
}

// Function to update status and insert reason in the database
function updateStatus($itemId, $status, $successMessage, $reason = "") {
    global $conn;
    // Update status for the specified item ID
    $sql = "UPDATE requesteditem SET status = $status";
    if (!empty($reason)) {
        $sql .= ", reason = '$reason'";
    }
    $sql .= " WHERE id = $itemId";
    
    // Execute the SQL query to update status and insert reason
    if ($conn->query($sql) === TRUE) {
        return $successMessage;
    } else {
        return "Error updating status: " . $conn->error;
    }
}
// Fetch requested items from the database ordered by ID in descending order
$sql_requested = "SELECT id, name, type, description, quantity, deptname, measurment FROM requesteditem ORDER BY id DESC";
$result_requested = $conn->query($sql_requested);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requested Items</title>
    <style>
        /* CSS styles */
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .requested-table {
            width: 100%;
            border-collapse: collapse;
        }

        .requested-table th,
        .requested-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .requested-table th {
            background-color: #3498db;
            color: #fff;
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
        if ($result_requested->num_rows > 0) {
            echo "<h2>Requested Items</h2>";
            echo "<table class='requested-table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Type</th>";
            echo "<th>Description</th>";
            echo "<th>Quantity</th>";
            echo "<th>Department</th>";
            echo "<th>Measurement</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row_requested = $result_requested->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_requested['id'] . "</td>";
                echo "<td>" . $row_requested['name'] . "</td>";
                echo "<td>" . $row_requested['type'] . "</td>";
                echo "<td>" . $row_requested['description'] . "</td>";
                echo "<td>" . $row_requested['quantity'] . "</td>";
                echo "<td>" . $row_requested['deptname'] . "</td>";
                echo "<td>" . $row_requested['measurment'] . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='message'>No requested items available</p>";
        }
        ?>
    </div>
    <div id="message" class="toast" style="display: <?php echo $message ? 'block' : 'none'; ?>;">
        <?php echo $message; ?>
    </div>

    <!-- Form for rejecting with reason -->
    <div id="rejectForm" style="display: <?php echo isset($_GET['action']) && $_GET['action'] == 'reject' ? 'block' : 'none'; ?>;">
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $_GET['id'] . '&action=reject'; ?>" method="post">
            <label for="reason">Reason for rejection:</label><br>
            <textarea id="reason" name="reason" rows="4" cols="50"></textarea><br>
            <input type="submit" value="Reject">
        </form>
    </div>

    <script>
        // Function to hide the message after some time
        function hideMessage() {
            var messageBox = document.getElementById('message');
            messageBox.style.display = 'none';
        }

        // Call hideMessage function after 5 seconds
        setTimeout(hideMessage, 5000);
    </script>
</body>
</html>
