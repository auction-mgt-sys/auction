<?php
include 'db_connect.php'; 

$message = ""; // Initialize message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $items = $_POST['items'];
    
    // Assuming you have set the user_id in the session (replace it with your actual way of identifying the user)
    $userId = isset($_SESSION['login_id']) ? $_SESSION['login_id'] : 0; // Replace 'login_id' with your session variable name

    // Initialize variables
    $departmentName = ""; // Initialize department name variable
    $departmentHeadName = ""; // Initialize department head name variable
    
    // Fetch department name and department head name only if user_id is set
    if ($userId != 0) {
        $query = "SELECT deptname, CONCAT(name, ' ', lname) AS departmentHeadName FROM users WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($departmentName, $departmentHeadName);
        $stmt->fetch();
        $stmt->close();
    }

    // Loop through each item and insert into the database
    foreach ($items as $item) {
        $name = $item['name'];
        $type = $item['type'];
        $description = $item['description'];
        $measurement = $item['measurement'];
        $quantity = $item['quantity'];

        // Prepare and execute SQL query to insert data into the database table using prepared statements
        $stmt = $conn->prepare("INSERT INTO requesteditem (name, type, description, measurement, quantity, deptname, depheadname) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiss", $name, $type, $description, $measurement, $quantity, $departmentName, $departmentHeadName);

        if ($stmt->execute()) {
            $message = "";
        } else {
            $message = "Error: " . $stmt->error;
            break; // Stop the loop if an error occurs
        }
    }
}

// Fetch rejected items from the requesteditem table
$rejectedItems = array();
$query = "SELECT id, name, type, description, measurment, quantity FROM requesteditem WHERE status = '2'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rejectedItems[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejected Item View</title>
    <!-- Your CSS styles here -->
</head>
<body>
    <h2>Rejected Items</h2>
    <?php if (!empty($rejectedItems)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Measurement</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rejectedItems as $item): ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['type']; ?></td>
                        <td><?php echo $item['description']; ?></td>
                        <td><?php echo $item['measurment']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No rejected items found.</p>
    <?php endif; ?>
    <!-- Your HTML content here -->
</body>
</html>
