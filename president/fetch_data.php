<?php
// Include your database connection file
include("db_connect.php");

// Assuming you have a connection established

// Query to fetch data from the database
$query = "SELECT name, type, measurment, deptname, dept, reason FROM requested_item WHERE status = 2";

// Perform the query
$result = mysqli_query($connection, $query);

// Check if query executed successfully
if ($result) {
    // Start building the HTML table
    echo '<table class="report-table">';
    echo '<thead><tr><th>Column Name</th><th>Type</th><th>Measurement</th><th>Dept Name</th><th>Dept</th><th>Reason</th></tr></thead>';
    echo '<tbody>';
    
    // Loop through each row and display data in table rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['type'] . '</td>';
        echo '<td>' . $row['measurment'] . '</td>';
        echo '<td>' . $row['deptname'] . '</td>';
        echo '<td>' . $row['dept'] . '</td>';
        echo '<td>' . $row['reason'] . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
} else {
    // Error handling if query fails
    echo 'Error: ' . mysqli_error($connection);
}

// Close database connection
mysqli_close($connection);
?>


<div class="dropdown">
                        <select id="second_selection" name="second_selection">
                            <option value="accepted">Accepted</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>