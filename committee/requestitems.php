<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Requested Items</title>
<style>
    /* CSS for styling */
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    .verify-btn, .reject-btn {
        padding: 6px 10px;
        cursor: pointer;
    }
    .verify-btn {
        background-color: yellow;
    }
    .reject-btn {
        background-color: red;
    }
    .popup {
        display: none;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        background-color: #fefefe;
        padding: 20px;
        border: 1px solid #888;
        z-index: 1;
    }
    .toast-success, .toast-reject {
        position: fixed;
        top: 30px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #4CAF50; /* Green for success, red for rejection */
        color: white;
        padding: 16px;
        border-radius: 5px;
        z-index: 9999;
        display: none; /* Hide initially */
        animation: fade 20 ease-out; /* Animation for fade-in and fade-out */
    }

    @keyframes fade {
        0% { opacity: 6; }
        10% { opacity: 9; }
        90% { opacity: 9; }
        100% { opacity: 6; }
    }
</style>
</head>
<body>
<?php
// PHP code to fetch requested items from database
include 'db_connect.php'; 

$sql = "SELECT id, name, type, measurment, description, quantity, depname FROM requesteditem WHERE status = 0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Name</th><th>Type</th><th>Measurement</th><th>Description</th><th>Quantity</th><th>Department</th><th>Action</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["type"] . "</td>";
        echo "<td>" . $row["measurment"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . $row["depname"] . "</td>";
        echo "<td>";
        echo "<button class='verify-btn' onclick='showVerifyPopup(\"" . $row["name"] . "\", " . $row["id"] . ")'>Verify</button>";
        echo "<button class='reject-btn' onclick='showRejectPopup(\"" . $row["name"] . "\", " . $row["id"] . ")'>Reject</button>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No requested items found.";
}
$conn->close();
?>

<!-- Popup for verification -->
<div id="verifyPopup" class="popup">
    <h2>Verification</h2>
    <p>Are you sure you want to verify <span id="verifyItemName"></span>?</p>
    <button onclick="updateStatus('verify')">Yes</button>
    <button onclick="hidePopup()">No</button>
</div>

<!-- Popup for rejection -->
<div id="rejectPopup" class="popup">
    <h2>Rejection</h2>
    <p>Please provide reason for rejecting <span id="rejectItemName"></span>:</p>
    <textarea id="rejectReason" rows="4" cols="50"></textarea><br>
    <button onclick="updateStatus('reject')">Reject</button>
    <button onclick="hidePopup()">Cancel</button>
</div>

<!-- Toast alert for success -->
<div id="toastSuccess" class="toast-success"></div>

<!-- Toast alert for rejection -->
<div id="toastReject" class="toast-reject"></div>

<script>
    // JavaScript functions to show/hide popups and perform actions
    function showVerifyPopup(itemName, itemId) {
        document.getElementById('verifyItemName').innerText = itemName;
        document.getElementById('verifyPopup').style.display = 'block';
        // Store the current item ID in a hidden field
        document.getElementById('currentItemId').value = itemId;
    }

    function showRejectPopup(itemName, itemId) {
        document.getElementById('rejectItemName').innerText = itemName;
        document.getElementById('rejectPopup').style.display = 'block';
        // Store the current item ID in a hidden field
        document.getElementById('currentItemId').value = itemId;
    }

    function hidePopup() {
        document.getElementById('verifyPopup').style.display = 'none';
        document.getElementById('rejectPopup').style.display = 'none';
    }

    function updateStatus(action) {
        var status;
        if (action === 'verify') {
            status = 1; // Set status to 1 for verification
        } else {
            status = 2; // Set status to 2 for rejection
        }

        // Get the current item ID from the hidden field
        var itemId = document.getElementById('currentItemId').value;

        // Get the reason for rejection
        var reason = document.getElementById('rejectReason').value;

        // Send an AJAX request to update the status
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                hidePopup();
                if (action === 'verify') {
                    // Show a toast alert for successful verification
                    var toast = document.getElementById('toastSuccess');
                    toast.textContent = "Item verified successfully.";
                    toast.style.display = 'block';
                    // Hide the toast after 3 seconds
                    setTimeout(function() {
                        toast.style.display = 'none';
                    }, 20000);
                } else {
                    // Show a toast alert for successful rejection
                    var toast = document.getElementById('toastReject');
                    toast.textContent = "Item rejected successfully.";
                    toast.style.display = 'block';
                    // Hide the toast after 3 seconds
                    setTimeout(function() {
                        toast.style.display = 'none';
                    }, 20000);
                }
                // Reload the page after status update
                location.reload();
            }
        };
        xhr.open("GET", "update_status.php?itemID=" + itemId + "&status=" + status + "&reason=" + reason, true);
        xhr.send();
    }
</script>

<!-- Hidden field to store the current item ID -->
<input type="hidden" id="currentItemId" value="">

</body>
</html>
