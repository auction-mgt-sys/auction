<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Requested Items</title>
<!-- Include jQuery and DataTables CSS and JavaScript -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<style>
    .professional-table {
        width: 80%;
        border-collapse: collapse;
    }
    .professional-table th, .professional-table td {
        border: 1px solid #dddddd;
        padding: 4px;
        text-align: left;
    }
    .professional-table th {
        background-color: #f2f2f2;
    }
    .professional-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>
<?php
// Assuming the connection to the database is already established
include 'db_connect.php';

// Fetch requested items with status = 3 from the database
$sql = "SELECT * FROM requesteditem where status = 0";
$result = $conn->query($sql);

// Check if there are any requested items
if ($result->num_rows > 0) {
    // Output table header and start table with CSS class
    echo "<table id='requested_items' class='professional-table'>
            <thead>
                <tr>
                    <th style='font-weight: bold;'>depname</th>
                    <th style='font-weight: bold;'>Name</th>
                    <th style='font-weight: bold;'>Type</th>
                    <th style='font-weight: bold;'>Description</th>
                    <th style='font-weight: bold;'>Measurement</th>
                    <th style='font-weight: bold;'>Quantity</th>
                    <th style='font-weight: bold;'>Actions</th>
                </tr>
            </thead>
            <tbody>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["depname"] . "</td>
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
    echo "</tbody></table>";
} else {
    echo "No requested items ";
}
?>


<!-- JavaScript for DataTables -->
<script>
    $(document).ready(function() {
        $('#requested_items').DataTable();
    });
</script>


</body>
</html>
