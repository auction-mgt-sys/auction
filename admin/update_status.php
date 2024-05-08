<?php
// Check if the request is made via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the ID and status are set in the POST data
    if (isset($_POST["id"]) && isset($_POST["status"])) {
        // Sanitize the input data
        $id = $_POST["id"];
        $status = $_POST["status"];

        // Define the new status value for database update
        $db_status = $status == 0 ? 0 : 1; // Set sta as 0 if active, and 2 if inactive

        // Perform database update
        require 'db_connect.php'; // Include your database connection file

        // Prepare and execute the SQL update statement
        $stmt = $conn->prepare("UPDATE users SET sta = ? WHERE id = ?");
        $stmt->bind_param("ii", $db_status, $id); // Assuming 'sta' is an integer field
        $result = $stmt->execute();

        // Check if the update was successful
        if ($result) {
            echo 1; // Echo 1 to indicate success
        } else {
            echo 0; // Echo 0 to indicate failure
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    } else {
        // Echo 0 if ID or status is not set
        echo 0;
    }
} else {
    // Echo 0 if request method is not POST
    echo 0;
}
?>
