<?php
// Check if the request is made via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the ID and status are set in the POST data
    if (isset($_POST["id"]) && isset($_POST["status"])) {
        // Sanitize the input data
        $id = $_POST["id"];
        $status = $_POST["status"];

        // Define the new status value for database update
        $db_status = $status == 0 ? 1 : 0; // Toggle status between 0 and 1

        // Perform database update
        require 'db_connect.php'; // Include your database connection file

        // Prepare and execute the SQL update statement
        $stmt = $conn->prepare("UPDATE users SET sta = ? WHERE id = ?");
        $stmt->bind_param("ii", $db_status, $id); // Assuming 'sta' is an integer field
        $result = $stmt->execute();

        // Check if the update was successful
        if ($result) {
            echo $db_status; // Echo the new status value
        } else {
            echo $status; // Echo the original status value in case of failure
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    } else {
        // Echo the original status value if ID or status is not set
        echo $status;
    }
} else {
    // Echo the original status value if request method is not POST
    echo $status;
}
?>
