<?php
include 'db_connect.php'; 

$message = ""; // Initialize message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $items = $_POST['items'];
    
    // Assuming you have set the user_id in the session (replace it with your actual way of identifying the user)
    $userId = isset($_SESSION['login_id']) ? $_SESSION['login_id'] : 0; // Replace 'login_id' with your session variable name

    // Fetch department name and department head name from the users table
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
        $stmt = $conn->prepare("INSERT INTO requesteditem (name, type, description, measurment, quantity, deptname, depheadname) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiss", $name, $type, $description, $measurement, $quantity, $departmentName, $departmentHeadName);

        if ($stmt->execute()) {
            $message = "";
        } else {
            $message = "Error: " . $stmt->error;
            break; // Stop the loop if an error occurs
        }
    }
}
?>

<!-- The rest of your HTML code remains unchanged -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Request Form</title>
    <style>
        .container {
    position: relative;
    background-color: white; /* Light gray background */
    border-radius: 10px; /* Rounded corners */
    padding: 20px; /* Add some padding */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */

}
/* Your CSS styles here */
        
.toast {
            display: none;
            position: absolute;
            top: 90px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: white;
            padding: 50px;
            border-radius: 10px;
            z-index: 1;
            animation: fadeInOut 20s ease-in-out;
        }
        @keyframes fadeInOut {
            0% {opacity: 2;}
            10% {opacity: 6;}
            90% {opacity: 6;}
            100% {opacity: 2;}
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h2>Item Request Form</h2>
        <!-- Display success or error message -->
        <?php if (!empty($message)): ?>
            <div id="message"><?php echo $message; ?></div>
        <?php endif; ?>
        <!-- Form -->
        <form id="item-request-form" action="" method="post"> <!-- Set action to empty string to submit to the same page -->
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

    <div class="toast" id="toast">Successfully requested item</div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addItemBtn = document.getElementById('add-item-btn');
            const itemList = document.getElementById('item-list');
            const form = document.getElementById('item-request-form');

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
                    <td><input type="number" name="items[${itemCount}][quantity]" min="1" required></td>
                `;
                itemList.appendChild(newRow);
            });

            form.addEventListener('submit', function(event) {
                const toast = document.getElementById('toast');
                toast.style.display = 'block';
                setTimeout(function() {
                    toast.style.display = 'none';
                }, 3000); // Hide the toast after 3 seconds
            });
        });
    </script>
</body>
</html>