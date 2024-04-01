<?php
include 'db_connect.php'; 

$message = ""; // Initialize message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $items = $_POST['items'];
    $departmentName = $_POST['department_name']; // Retrieve department name

    // Loop through each item and insert into the database
    foreach ($items as $item) {
        $name = $item['name'];
        $type = $item['type'];
        $description = $item['description'];
        $measurement = $item['measurement'];
        $quantity = $item['quantity'];

        // Prepare and execute SQL query to insert data into the database table using prepared statements
        $stmt = $conn->prepare("INSERT INTO requesteditem (name, type, description, measurment, quantity, depname) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssis", $name, $type, $description, $measurement, $quantity, $departmentName);
        
        if ($stmt->execute()) {
            $message = "";
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
        .container {
            position: relative;
        }
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
            <label for="department_name">Department Name:</label>
            <input type="text" id="department_name" name="department_name" required><br><br>
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
