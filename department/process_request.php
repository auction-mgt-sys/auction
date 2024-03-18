<?php
// Here you would have database connection code

// Assuming form data is validated and sanitized before reaching this point
$requestItem = $_POST['request'];

// Insert request into database
// Replace this with your database insertion code

// Redirect back to index.php after processing
header("Location: index.php");
exit();
?>
