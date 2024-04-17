<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Requested Items</title>
<style>
    /* CSS for styling */
    body {
        font-family: Arial, sans-serif;
    }
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
    top: 50px;
    left: 50%;
    transform: translateX(-50%);
    background-color: rgba(76, 175, 80, 0.9); /* Semi-transparent green for success */
    color: white;
    padding: 16px;
    border-radius: 5px;
    z-index: 10000; /* Increased z-index for higher visibility */
    display: none; /* Hide initially */
    animation: fade 0.5s ease-in-out; /* Animation for fade-in and fade-out */
    font-weight: bold; /* Make the text bold */
    font-size: 16px; /* Adjust font size for better visibility */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Add a subtle shadow for better contrast */
}

@keyframes fade {
    0% { opacity: 0; }
    10% { opacity: 1; }
    90% { opacity: 1; }
    100% { opacity: 0; }
}


    .search-container {
        margin-bottom: 20px;
    }
    .search-container input[type=text] {
        padding: 10px;
        width: 300px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: white;
        background-image: url('searchicon.png');
        background-position: 10px 10px; 
        background-repeat: no-repeat;
        padding-left: 40px;
    }
    .entries-select {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: white;
        cursor: pointer;
    }
    .entries-select option {
        padding: 8px;
    }
    .pagination {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .pagination-btn {
        padding: 6px 12px;
        margin: 0 5px;
        cursor: pointer;
    }
    .pagination-btn.disabled {
        cursor: not-allowed;
        opacity: 0.6;
    }
    .message {
        text-align: center;
        margin-top: 20px;
    }
   
</style>
</head>
<body>
<?php
// PHP code to fetch requested items from database
include 'db_connect.php'; 

$sql = "SELECT id, name, type, measurment, description, quantity, deptname FROM requesteditem WHERE status = 0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='search-container'>";
    echo "<input type='text' id='searchInput' onkeyup='searchItems()' placeholder='Search for items...'>";
    echo "</div>";
    echo "<div>";
    echo "<label>Show entries: </label>";
    echo "<select id='entriesSelect' onchange='changeEntries()'>";
    echo "<option value='5'>5</option>";
    echo "<option value='10' selected>10</option>";
    echo "<option value='25'>25</option>";
    echo "<option value='50'>50</option>";
    echo "</select>";
    echo "</div>";
    
    echo "<table id='itemTable'>";
    echo "<tr><th>Name</th><th>Type</th><th>Measurement</th><th>Description</th><th>Quantity</th><th>Department</th><th>Action</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["type"] . "</td>";
        echo "<td>" . $row["measurment"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . $row["deptname"] . "</td>";
        echo "<td>";
        echo "<button class='verify-btn' onclick='showVerifyPopup(\"" . $row["name"] . "\", " . $row["id"] . ")'>Verify</button>";
        echo "<button class='reject-btn' onclick='showRejectPopup(\"" . $row["name"] . "\", " . $row["id"] . ")'>Reject</button>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Pagination
    echo "<div class='pagination'>";
    echo "<button class='pagination-btn disabled' id='prevBtn' onclick='changePage(-1)'>Previous</button>";
    echo "<span id='pageNum'>1</span>";
    echo "<button class='pagination-btn' id='nextBtn' onclick='changePage(1)'>Next</button>";
    echo "</div>";
} else {
    echo "<div class='message'>No requested items found.</div>";
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
    var currentPage = 1;
    var itemsPerPage = 10;
    var totalItems = <?php echo $result->num_rows; ?>;

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
                    }, 9000);
                } else {
                    // Show a toast alert for successful rejection
                    var toast = document.getElementById('toastReject');
                    toast.textContent = "Item rejected successfully.";
                    toast.style.display = 'block';
                    // Hide the toast after 3 seconds
                    setTimeout(function() {
                        toast.style.display = 'none';
                    }, 9000);
                }
                // Reload the page after status update
                location.reload();
            }
        };
        xhr.open("GET", "update_status.php?itemID=" + itemId + "&status=" + status + "&reason=" + reason, true);
        xhr.send();
    }

    // Function to search items in the table
    function searchItems() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("itemTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0]; // Change index as per the column to be searched
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Function to change the number of entries displayed per page
    function changeEntries() {
        itemsPerPage = parseInt(document.getElementById("entriesSelect").value);
        currentPage = 1;
        updatePagination();
    }

    // Function to change page
    function changePage(change) {
        if (currentPage + change > 0 && (currentPage + change - 1) * itemsPerPage < totalItems) {
            currentPage += change;
            updatePagination();
        }
    }

    // Function to update pagination
    function updatePagination() {
        var table = document.getElementById("itemTable");
        var rows = table.getElementsByTagName("tr");
        var startIndex = (currentPage - 1) * itemsPerPage + 1;
        var endIndex = Math.min(currentPage * itemsPerPage, totalItems);

        for (var i = 1; i < rows.length; i++) {
            if (i >= startIndex && i <= endIndex) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }

        document.getElementById("pageNum").innerText = currentPage;
        var prevBtn = document.getElementById("prevBtn");
        var nextBtn = document.getElementById("nextBtn");

        if (currentPage === 1) {
            prevBtn.classList.add("disabled");
        } else {
            prevBtn.classList.remove("disabled");
        }

        if (currentPage * itemsPerPage >= totalItems) {
            nextBtn.classList.add("disabled");
        } else {
            nextBtn.classList.remove("disabled");
        }
    }
</script>

<!-- Hidden field to store the current item ID -->
<input type="hidden" id="currentItemId" value="">

</body>
</html>