<?php
session_start();

// Include database connection or any necessary files
// Include database configuration
include_once 'db_connect.php'; // Assuming you have a file named db_connect.php for database connection

// Assuming 'users' table contains a column named 'photo' to store the image filename

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'signup') {
    // Your existing signup logic goes here

    // Handle file upload
    $target_dir = "uploads/"; // Specify the target directory where you want to store the images
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["img"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            // Update the database with the filename
            $photo = basename($_FILES["img"]["name"]); // Assuming your database field name is 'photo'
            // Update the user record in the database with $photo variable
            // Example query: UPDATE users SET photo = '$photo' WHERE id = $user_id;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>



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

        // Prepare and execute SQL query to select data from the users table
        $stmt = $conn->prepare("SELECT CONCAT(name, ' ', lname) AS full_name FROM users WHERE type = 5 AND deptname = ?");
        $stmt->bind_param("s", $departmentName);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $deptHeadName = $row['full_name'];

        // Prepare and execute SQL query to insert data into the database table using prepared statements
        $stmt = $conn->prepare("INSERT INTO requesteditem (name, type, description, measurment, quantity, deptname, depheadname) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiss", $name, $type, $description, $measurement, $quantity, $departmentName, $deptHeadName);
        
        
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
