<?php
// Assuming the connection to the database is already established
include 'db_connect.php'; 

$message = ""; // Initialize message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $items = $_POST['items'];

    // Loop through each item and insert into the database
    foreach ($items as $item) {
        $name = $item['name'];
        $type = $item['type'];
        $description = $item['description'];
        $measurement = $item['measurement'];
        $quantity = $item['quantity'];

        // Prepare and execute SQL query to insert data into the database table using prepared statements
        $stmt = $conn->prepare("INSERT INTO requesteditem (name, type, description, measurment, quantity) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $name, $type, $description, $measurement, $quantity);
        
        if ($stmt->execute()) {
            $message = "Successfully requested item(s)";
        } else {
            $message = "Error: " . $stmt->error;
            break; // Stop the loop if an error occurs
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Request Form</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    
    <div class="container">
        <h2>Item Request Form</h2>
        <!-- Display success or error message -->
        <?php if (!empty($message)): ?>
            <div id="message"><?php echo $message; ?></div>
        <?php endif; ?>
        <!-- Form -->
        <form action="itemrequest.php" method="post">
            <table class="item-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Measurement</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody id="item-list">
                    <!-- Rows will be dynamically added here -->
                </tbody>
            </table>
            <button type="button" id="add-item-btn">Add Item <span>+</span></button>
            <button type="submit" id="submit-btn">Submit</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addItemBtn = document.getElementById('add-item-btn');
            const itemList = document.getElementById('item-list');
            let itemCount = 0;

            addItemBtn.addEventListener('click', function() {
                itemCount++;
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${itemCount}</td>
                    <td><input type="text" name="items[${itemCount}][name]" required></td>
                    <td><input type="text" name="items[${itemCount}][type]" required></td>
                    <td><input type="text" name="items[${itemCount}][description]" required></td>
                    <td><input type="text" name="items[${itemCount}][measurement]" required></td>
                    <td><input type="number" name="items[${itemCount}][quantity]" required></td>
                `;
                itemList.appendChild(newRow);
            });
        });
    </script>
</body>
</html>
