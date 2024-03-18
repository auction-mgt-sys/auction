<?php
// Assuming the connection to the database is already established
include 'db_connect.php';

// Fetch requested items from the database
$sql = "SELECT * FROM requesteditem";
$result = $conn->query($sql);

// Check if there are any requested items
if ($result->num_rows > 0) {
    // Output table header and start table with CSS class
    echo "<table class='professional-table'>
            <tr>
                <th style='font-weight: bold;'>ID</th>
                <th style='font-weight: bold;'>Name</th>
                <th style='font-weight: bold;'>Type</th>
                <th style='font-weight: bold;'>Description</th>
                <th style='font-weight: bold;'>Measurment</th>
                <th style='font-weight: bold;'>Quantity</th>
                <th style='font-weight: bold;'>Actions</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["type"] . "</td>
                <td>" . $row["description"] . "</td>
                <td>" . $row["measurment"] . "</td>
                <td>" . $row["quantity"] . "</td>
                <td>
                <a href='itemverification.php?id=" . $row["id"] . "&action=verify' style='background-color: yellow; display: inline-block; padding: 8px; font-weight: bold; text-decoration: none; color: black;'>Verify</a>
                <a href='itemverification.php?id=" . $row["id"] . "&action=reject' style='background-color: red; display: inline-block; padding: 8px; font-weight: bold; text-decoration: none; color: black;'>Reject</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No requested items";
}
?>

<!-- CSS Style -->
<style>
    .professional-table {
        width: 100%;
        border-collapse: collapse;
    }
    .professional-table th, .professional-table td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }
    .professional-table th {
        background-color: #f2f2f2;
    }
    .professional-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>




