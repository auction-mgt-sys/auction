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
                $message = "";
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
?>

<!-- Your HTML content for single auction item page here -->

<!-- Display success or error message -->
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
