<?php
// Include your database connection file
include 'db_connection.php';

// Get current datetime
$current_datetime = date('Y-m-d H:i:s');

// Count the number of events from the product table that occur on or after the current datetime
$event_count_query = $conn->query("SELECT COUNT(*) AS event_count FROM products WHERE bid_end_datetime >= '$current_datetime'");
$event_count_row = $event_count_query->fetch_assoc();
$event_count = $event_count_row['event_count'];

// Return the event count
echo $event_count;
?>
