<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requested Items</title>
    <style>
        /* CSS for styling */
        /* ... (Your CSS styles remain unchanged) ... */
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

    <!-- Popups and Toasts -->
    <!-- ... (Your popup and toast HTML remains unchanged) ... -->

    <script>
        // JavaScript functions
        // ... (Your JavaScript functions remain unchanged) ...
    </script>
</body>
</html>
